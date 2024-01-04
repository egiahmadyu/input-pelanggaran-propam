@extends('layouts.master')

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0 d-flex justify-content-between">
                                <div>
                                    <h4 class="mb-1">Edit Pelanggaran</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-primary alert-dismissible" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        </button>
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        {{ session('endif') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        </button>
                                    </div>
                                @endif
                                <form action="/pelanggaran-data/edit/{{ $id }}/save" method="post"
                                    class="f1">
                                    @csrf
                                    <div class="f1-steps" style="text-align: center;">
                                        <div class="f1-progress">
                                            <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4"
                                                style="width: 20%;"></div>
                                        </div>
                                        <div class="f1-step active">
                                            <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                            <p>Jenis Pelanggaran</p>
                                        </div>
                                        <div class="f1-step">
                                            <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                            <p>Identitas Pelanggar</p>
                                        </div>
                                        <div class="f1-step">
                                            <div class="f1-step-icon"><i class="fa fa-home"></i></div>
                                            <p>Kesatuan</p>
                                        </div>
                                        <div class="f1-step">
                                            <div class="f1-step-icon"><i class="fa fa-key"></i></div>
                                            <p>Pelanggaran</p>
                                        </div>
                                    </div>

                                    <fieldset>
                                        <h4>Jenis Pelanggaran</h4>
                                        <div class="form-group">
                                            @if (auth()->user()->getRoleNames()[0] == 'mabes')
                                                <select class="form-control select2" id="jenis_pelanggaran"
                                                    style="width: 100%" name="jenis_pelanggaran"
                                                    onchange="getWujudPerbuatan()" required="true">
                                                    <option value="">Pilih</option>
                                                    @if (auth()->user()->mabes == 'provos')
                                                        <option value="1">Disiplin</option>
                                                    @elseif(auth()->user()->mabes == 'wabprof')
                                                        <option value="2">KEPP (Kode Etik Profesi Polri)</option>
                                                    @endif
                                                </select>
                                            @else
                                                <select class="form-control select2" id="jenis_pelanggaran"
                                                    style="width: 100%" name="jenis_pelanggaran"
                                                    onchange="getWujudPerbuatan()">
                                                    @foreach ($jenis_pelanggarans as $jenis_pelanggaran)
                                                        <option value="{{ $jenis_pelanggaran->id }}"
                                                            {{ $data->jenis_pelanggaran == $jenis_pelanggaran->id ? 'selected' : '' }}>
                                                            {{ $jenis_pelanggaran->name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif

                                        </div>
                                        <div class="f1-buttons">
                                            <button type="button" class="btn btn-primary btn-next">Selanjutnya <i
                                                    class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </fieldset>
                                    <!-- step 1 -->
                                    <fieldset>
                                        <h4>Identitas Pelanggar</h4>
                                        <div class="form-group">
                                            <label>Pelanggar</label>
                                            <input type="text" value="{{ auth()->user()->id }}" name="edited_by" hidden>
                                            <select class="form-control" id="pelanggar" style="width: 100%" name="pelanggar"
                                                onchange="check_pelanggar_orang()" required="true">
                                                <option value="">Pilih </option>
                                                <option value="polri" {{ $data->pelanggar == 'polri' ? 'selected' : '' }}>
                                                    Polri</option>
                                                <option value="asn" {{ $data->pelanggar == 'asn' ? 'selected' : '' }}>
                                                    ASN</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>NRP / NIP</label>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <input type="text" name="nrp_nip" placeholder="" class="form-control"
                                                        id="nrp_nip" required="true" maxlength="8" minlength="8"
                                                        value="{{ $data->nrp_nip }}">
                                                </div>
                                                <div class="col-lg-2">
                                                    <button class="btn btn-info" onclick="check_nrp()"
                                                        type="button">Check</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" placeholder="" class="form-control"
                                                value="{{ $data->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" id="jenis_kelamin" style="width: 100%"
                                                name="jenis_kelamin">
                                                @foreach ($genders as $gender)
                                                    <option value="{{ $gender->id }}"
                                                        {{ $data->jenis_kelamin == $gender->id ? 'selected' : '' }}>
                                                        {{ $gender->gender }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pangkat</label>
                                            <select class="form-control" id="pangkat" style="width: 100%"
                                                name="pangkat">
                                                @foreach ($pangkats as $pangkat)
                                                    <option value="{{ $pangkat->id }}"
                                                        {{ $data->pangkat == $pangkat->id ? 'selected' : '' }}>
                                                        {{ $pangkat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <textarea name="jabatan" class="form-control" value="{{ $data->jabatan }}">{{ $data->jabatan }}</textarea>
                                        </div>
                                        <div class="form-group" id="div_diktuk">
                                            <label>Diktuk</label>
                                            <select class="form-control" id="diktuk" style="width: 100%"
                                                name="diktuk">
                                                @foreach ($diktuks as $diktuk)
                                                    <option value="{{ $diktuk->id }}"
                                                        {{ $data->diktuk == $diktuk->id ? 'selected' : '' }}>
                                                        {{ $diktuk->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="f1-buttons">
                                            <button type="button" class="btn btn-warning btn-previous"><i
                                                    class="fa fa-arrow-left"></i> Sebelumnya</button>
                                            <button type="button" class="btn btn-primary btn-next">Selanjutnya <i
                                                    class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </fieldset>
                                    <!-- step 2 -->
                                    <fieldset>
                                        <h4>Kesatuan Asal Pelanggar</h4>
                                        <div class="form-group">
                                            <label>Mabes / Polda</label>
                                            @if (auth()->user()->getRoleNames()[0] !== 'admin' &&
                                                    auth()->user()->getRoleNames()[0] !== 'mabes')
                                                <select class="form-control" id="polda_terduga" style="width: 100%"
                                                    name="polda_terduga" required=true
                                                    onchange="{{ auth()->user()->getRoleNames()[0] !== 'polres'? 'getPolresPelanggar()': '' }}">>
                                                    <option value="">Pilih </option>
                                                    <option value="{{ auth()->user()->polda_id }}"
                                                        {{ $data->polda == auth()->user()->polda_id ? 'selected' : '' }}>
                                                        {{ auth()->user()->satuan_poldas->name }}</option>
                                                </select>
                                            @else
                                                <select class="form-control" id="polda_terduga" style="width: 100%"
                                                    name="polda_terduga" onchange="getPolresPelanggar()">
                                                    @foreach ($poldas as $polda)
                                                        <option value="{{ $polda->id }}"
                                                            {{ $data->polda_terduga == $polda->id ? 'selected' : '' }}>
                                                            {{ $polda->name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Satker</label>
                                            @if (auth()->user()->getRoleNames()[0] == 'polres')
                                                <select class="form-control" id="polres_terduga" style="width: 100%"
                                                    name="polres_terduga">
                                                    <option value="{{ auth()->user()->polres_id }}">
                                                        {{ auth()->user()->satuan_polres->name }}</option>
                                                </select>
                                            @else
                                                <select class="form-control" id="polres_terduga" style="width: 100%"
                                                    name="polres_terduga" onchange="getPolsekPelanggar()">
                                                </select>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Satker Polda/ Satker Polres/ Polsek</label>
                                            <select class="form-control" id="polsek_terduga" style="width: 100%"
                                                name="polsek_terduga">
                                                {{-- <option value="001">Polres Aceh Barat Daya</option> --}}
                                                {{-- @foreach ($diktuks as $diktuk)
                                                    <option value="{{ $diktuk->id }}">{{ $diktuk->name }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <h4>Kesatuan Yang Menangani</h4>
                                        <div class="form-group">
                                            <label>Mabes / Polda</label>
                                            @if (auth()->user()->getRoleNames()[0] !== 'admin' &&
                                                    auth()->user()->getRoleNames()[0] !== 'mabes')
                                                <select class="form-control" id="polda" style="width: 100%"
                                                    name="polda" required=true
                                                    onchange="{{ auth()->user()->getRoleNames()[0] !== 'polres'? 'getPolres()': '' }}">>
                                                    <option value="">Pilih </option>
                                                    <option value="{{ auth()->user()->polda_id }}"
                                                        {{ $data->polda == auth()->user()->polda_id ? 'selected' : '' }}>
                                                        {{ auth()->user()->satuan_poldas->name }}</option>
                                                </select>
                                            @else
                                                <select class="form-control" id="polda" style="width: 100%"
                                                    name="polda" onchange="getPolres()">
                                                    @foreach ($poldas as $polda)
                                                        <option value="{{ $polda->id }}"
                                                            {{ $data->polda == $polda->id ? 'selected' : '' }}>
                                                            {{ $polda->name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Satker</label>
                                            @if (auth()->user()->getRoleNames()[0] == 'polres')
                                                <select class="form-control" id="polres" style="width: 100%"
                                                    name="polres">
                                                    <option value="{{ auth()->user()->polres_id }}">
                                                        {{ auth()->user()->satuan_polres->name }}</option>
                                                </select>
                                            @else
                                                <select class="form-control" id="polres" style="width: 100%"
                                                    name="polres" onchange="getPolsek()">
                                                </select>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Satker Polda/ Satker Polres/ Polsek</label>
                                            <select class="form-control" id="polsek" style="width: 100%"
                                                name="polsek">
                                                {{-- <option value="001">Polres Aceh Barat Daya</option> --}}
                                                {{-- @foreach ($diktuks as $diktuk)
                                                    <option value="{{ $diktuk->id }}">{{ $diktuk->name }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        <div class="f1-buttons">
                                            <button type="button" class="btn btn-warning btn-previous"><i
                                                    class="fa fa-arrow-left"></i> Sebelumnya</button>
                                            <button type="button" class="btn btn-primary btn-next">Selanjutnya <i
                                                    class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </fieldset>
                                    <!-- step 3 -->
                                    <fieldset>
                                        <h4>Pelanggaran</h4>
                                        <div class="form-group">
                                            <label>Nomor Laporan Polisi</label>
                                            <input type="text" name="nolp" id="nolp" class="form-control"
                                                value="{{ $data->nolp }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Laporan Polisi</label>
                                            <input type="date" name="tgllp" id="tgllp" class="form-control"
                                                value="{{ $data->tgllp }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Wujud Perbuatan</label>
                                            <select class="form-control" id="wujud_perbuatan" style="width: 100%"
                                                name="wujud_perbuatan" onchange="checkWujudPerbuatan()">
                                                @foreach ($wujud_perbuatans as $wujud_perbuatan)
                                                    <option value="{{ $wujud_perbuatan->id }}"
                                                        {{ $data->wujud_perbuatan == $wujud_perbuatan->id ? 'selected' : '' }}>
                                                        {{ $wujud_perbuatan->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="narkobaDiv">
                                            <h5>Pelanggaran Narkoba</h5>
                                            <div class="form-group">
                                                <label>Peran Narkoba</label>
                                                <select class="form-control" id="peran_narkoba" style="width: 100%"
                                                    name="peran_narkoba">
                                                    <option value="">Pilih</option>
                                                    @foreach ($peran_narkobas as $peran_narkoba)
                                                        <option value="{{ $peran_narkoba->id }}"
                                                            {{ $data->peran_narkoba == $peran_narkoba->id ? 'selected' : '' }}>
                                                            {{ $peran_narkoba->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Narkoba</label>
                                                <select class="form-control" id="jenis_narkoba" style="width: 100%"
                                                    name="jenis_narkoba" onchange="check_jenis_narkoba()">
                                                    <option value="">Pilih</option>
                                                    @foreach ($jenis_narkobas as $jenis_narkoba)
                                                        <option value="{{ $jenis_narkoba->id }}"
                                                            {{ $data->jenis_narkoba == $jenis_narkoba->id ? 'selected' : '' }}>
                                                            {{ $jenis_narkoba->name }}</option>
                                                    @endforeach
                                                    <option value="0">Lain - Lain</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="jenis_narkoba_baru_div" style="display:none">
                                                <label>Tambah Jenis Narkoba</label>
                                                <input type="text" name="jenis_narkoba_baru" id="jenis_narkoba_baru"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Kronologis Singkat</label>
                                            <textarea name="kronologi_singkat" class="form-control">{{ $data->kronologi_singkat }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Pasal Pelanggaran</label>
                                            <input type="text" name="pasal_pelanggaran" id="pasal_pelanggaran"
                                                class="form-control" value="{{ $data->pasal_pelanggaran }}">
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label><b>Dilakukan Pidana</b></label>
                                            <select class="form-control" id="dilakukan_pidana" style="width: 100%"
                                                name="pidana" onchange="checkPidana()">
                                                <option value="YA" {{ $data->pidana == 'YA' ? 'selected' : '' }}>
                                                    YA</option>
                                                <option value="TIDAK" {{ $data->pidana == 'TIDAK' ? 'selected' : '' }}>
                                                    TIDAK</option>
                                            </select>
                                        </div>
                                        <div class="form-group divCheckPidana">
                                            <label>Nomor Laporan Polisi Pidana</label>
                                            <input type="text" name="nolp_pidana" id="nolp_pidana"
                                                class="form-control" value="{{ $data->nolp_pidana }}">
                                        </div>
                                        <div class="form-group divCheckPidana">
                                            <label>Tanggal Laporan Polisi Pidana</label>
                                            <input type="date" name="tgllp_pidana" id="tgllp_pidana"
                                                class="form-control" value="{{ $data->tgllp_pidana }}">
                                        </div>
                                        <div class="form-group divCheckPidana">
                                            <label>Wujud Perbuatan Pidana</label>
                                            <select class="form-control" id="wujud_perbuatan_pidana" style="width: 100%"
                                                name="wujud_perbuatan_pidana" onchange="checkWPP()">
                                                <option value="">Pilih</option>
                                                @foreach ($wujud_perbuatanPidanas as $wujud_perbuatanPidana)
                                                    <option value="{{ $wujud_perbuatanPidana->id }}"
                                                        {{ $data->wujud_perbuatan_pidana == $wujud_perbuatanPidana->id ? 'selected' : '' }}>
                                                        {{ $wujud_perbuatanPidana->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        <div class="form-group divCheckPidana">
                                            <label>Pasal Pidana</label>
                                            <input type="text" name="pasal_pidana" id="pasal_pidana"
                                                class="form-control" value="{{ $data->pasal_pidana }}">
                                        </div>
                                        <div class="form-group divCheckPidana">
                                            <label>Putusan Sidang Pidana</label>
                                            <input type="text" name="putusan_sidang_pidana" id="putusan_sidang_pidana"
                                                class="form-control" value="{{ $data->putusan_sidang_pidana }}">
                                        </div>
                                        <hr>

                                        <div class="f1-buttons">
                                            <button type="button" class="btn btn-warning btn-previous"><i
                                                    class="fa fa-arrow-left"></i> Sebelumnya</button>
                                            <button type="submit" class="btn btn-primary btn-submit"><i
                                                    class="fa fa-save"></i> Submit</button>
                                        </div>
                                    </fieldset>
                                    <!-- step 4 -->
                                    {{-- <fieldset>
                                        <h4>Penyelesaian</h4>
                                        <hr>
                                        <h5>Sidang</h5>
                                        <div class="form-group">
                                            <label>No Kep</label>
                                            <input type="text" name="no_kep" id="no_kep" class="form-control"
                                                value="{{ $data->no_kep }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tgl Kep</label>
                                            <input type="date" name="tgl_kep" id="tgl_kep" class="form-control"
                                                value="{{ date('Y-m-d', strtotime($data->tgl_kep)) }}">
                                        </div>
                                        @for ($i = 1; $i < 13; $i++)
                                            <div class="form-group">
                                                <label>Putusan {{ $i }}</label>
                                                <select class="form-control" id="putusan_{{ $i }}"
                                                    style="width: 100%" name="putusan_{{ $i }}">
                                                    <option value="">Pilih</option>
                                                    @foreach ($putusans as $index => $putusan)
                                                        <option value="{{ $putusan->id }}"
                                                            {{ $putusan->id == $list_petusan["putusan_{$i}"] ? 'selected ' : '' }}>
                                                            {{ $putusan->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endfor
                                        <hr>
                                        <h5>Dihentikan</h5>
                                        <div class="form-group">
                                            <label>No. Kep SP3 / SP4</label>
                                            <input type="text" name="nokepsp3" placeholder="0" id="nokepsp3"
                                                class="form-control" value="{{ $data->nokepsp3 }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tgl. Kep SP3 / SP4</label>
                                            <input type="date" name="tglkepsp3" placeholder="0" id="tglkepsp3"
                                                class="form-control" value="{{ $data->tglkepsp3 }}">
                                        </div>
                                        <div class="f1-buttons">
                                            <button type="button" class="btn btn-warning btn-previous"><i
                                                    class="fa fa-arrow-left"></i> Sebelumnya</button>
                                            <button type="submit" class="btn btn-primary btn-submit"><i
                                                    class="fa fa-save"></i> Submit</button>
                                        </div>
                                    </fieldset> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modal_check">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Check Pelanggar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body_detail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    {{-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> --}}
    <style>
        .f1-steps {
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }

        .f1-progress {
            position: absolute;
            top: 24px;
            left: 0;
            width: 100%;
            height: 1px;
            background: #ddd;
        }

        .f1-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 1px;
            background: #2110bd;
        }

        .f1-step {
            position: relative;
            float: left;
            width: 25%;
            padding: 0 5px;
        }

        .f1-step-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-top: 4px;
            background: #ddd;
            font-size: 16px;
            color: #fff;
            line-height: 40px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .f1-step.activated .f1-step-icon {
            background: #fff;
            border: 1px solid #1c148d;
            color: #1c148d;
            line-height: 38px;
        }

        .f1-step.active .f1-step-icon {
            width: 48px;
            height: 48px;
            margin-top: 0;
            background: #4d44cc;
            font-size: 22px;
            line-height: 48px;
        }

        .f1-step p {
            color: #ccc;
        }

        .f1-step.activated p {
            color: #338056;
        }

        .f1-step.active p {
            color: #338056;
        }

        .f1 fieldset {
            display: none;
            text-align: left;
        }

        .f1-buttons {
            text-align: right;
        }

        .f1 .input-error {
            border-color: #f35b3f;
        }
    </style>
@endpush

@push('script')
    <script></script>
    <script>
        $(document).ready(async function() {
            $('select').select2({
                theme: "bootstrap4"
            });
            await getPolres()
            await getPolresPelanggar()
            await getWujudPerbuatan()
            checkWPP()
            checkPidana()
            checkWujudPerbuatan()
            // check_pelanggar_orang()
            const dayText = {
                en: "Su,Mo,Tu,We,Th,Fr,Sa".split(","),
                id: "Mi,Se,Sl,Ra,Ka,Ju,Sa".split(","),
            };

            const monthText = {
                en: "January,February,March,April,May,June,July,Augustus,September,October,November,December"
                    .split(
                        ","
                    ),
                id: "Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember"
                    .split(
                        ","
                    ),
            };

            const todayText = {
                en: "Today",
                id: "Hari ini",
            };
            <?php if($data->tgl_kep) {?>
            $("#tgl_kep").pDatePicker({
                lang: "id",
                selected: new Date(<?= date('Y', strtotime($data->tgl_kep)) ?>,
                    <?= date('m', strtotime($data->tgl_kep)) ?> - 1,
                    <?= date('d', strtotime($data->tgl_kep)) ?>)
            });
            <?php } else { ?>
            $("#tgl_kep").pDatePicker({
                lang: "id",
            });
            <?php } ?>
            <?php if($data->tgllp_pidana) {?>
            $("#tgllp_pidana").pDatePicker({
                lang: "id",
                selected: new Date(<?= date('Y', strtotime($data->tgllp_pidana)) ?>,
                    <?= date('m', strtotime($data->tgllp_pidana)) ?> - 1,
                    <?= date('d', strtotime($data->tgllp_pidana)) ?>)
            });
            <?php } else { ?>
            $("#tgllp_pidana").pDatePicker({
                lang: "id",
            });
            <?php } ?>
            <?php if($data->tglkepsp3) {?>
            $("#tglkepsp3").pDatePicker({
                lang: "id",
                selected: new Date(<?= date('Y', strtotime($data->tglkepsp3)) ?>,
                    <?= date('m', strtotime($data->tglkepsp3)) ?> - 1,
                    <?= date('d', strtotime($data->tglkepsp3)) ?>)
            });
            <?php } else { ?>
            $("#tglkepsp3").pDatePicker({
                lang: "id",
            });
            <?php } ?>
            <?php if($data->tgllp) {?>
            $("#tgllp").pDatePicker({
                lang: "id",
                selected: new Date(<?= date('Y', strtotime($data->tgllp)) ?>,
                    <?= date('m', strtotime($data->tgllp)) ?> - 1,
                    <?= date('d', strtotime($data->tgllp)) ?>)
            });
            <?php } else { ?>
            $("#tgllp").pDatePicker({
                lang: "id",
            });
            <?php } ?>

        });

        function check_jenis_narkoba() {
            var val = $('#jenis_narkoba').val()
            if (val == '0') {
                $('#jenis_narkoba_baru_div').css('display', 'block')
            } else {
                $('#jenis_narkoba_baru_div').css('display', 'none')
            }
        }

        function check_nrp() {
            $('.loading').css('display', 'block')
            var nrp = $('#nrp_nip').val()
            $.ajax({
                url: "/pelanggaran-data/detailnrp/" + nrp,
                error: function(err) {
                    $('.loading').css('display', 'none')
                    Swal.fire(
                        'Data Not Found!',
                        'Data Tidak Ada.',
                        'success'
                    )
                },
            }).done(function(data) {
                $('.loading').css('display', 'none')
                if (data.status == 500) {
                    Swal.fire(
                        'Data Not Found!',
                        '',
                        'error'
                    )
                } else {
                    $('#modal_check').modal('show')
                    $('#body_detail').html(data)
                }
            });
        }

        function checkPidana() {
            var wpp = $('#dilakukan_pidana').val()

            if (wpp == 'YA') {
                $('#nolp_pidana').attr('required', 'true')
                $('#tgllp_pidana').attr('required', 'true')
                $('#wujud_perbuatan_pidana').attr('required', 'true')
                $('#pasal_pidana').attr('required', 'true')
                $('.divCheckPidana').css("display", "block");
            } else {
                $('#nolp_pidana').removeAttr('required')
                $('#tgllp_pidana').removeAttr('required')
                $('#wujud_perbuatan_pidana').removeAttr('required')
                $('#pasal_pidana').removeAttr('required')
                $('.divCheckPidana').css("display", "none");
            }
        }

        function getPolres() {
            var polda = $('#polda').val()
            $.ajax({
                url: "/api/polda/" + polda,
                success: function(data) {
                    var polres = data.data
                    var polres_ready = '{{ $data->polres ?? null }}';
                    var option = '<option value="">Pilih</option>'
                    for (let index = 0; index < polres.length; index++) {
                        option +=
                            `<option value="${polres[index].id}" ${polres_ready == polres[index].id ? 'selected' : ''}>${polres[index].name}</option>`

                    }
                    $('#polres').html(option)
                    getPolsek()
                }
            });
        }

        function checkWujudPerbuatan() {
            var val = $('#wujud_perbuatan').val();
            $.ajax({
                url: "/api/wujud_perbuatan/checkNarkoba/" + val,
                success: function(data) {
                    if (data.data == true) {
                        $('#narkobaDiv').css("display", "block");
                    } else {
                        $('#narkobaDiv').css("display", "none");
                        $('#peran_narkoba').val('')
                        $('#peran_narkoba').trigger('change');
                        $('#jenis_narkoba').val('')
                        $('#jenis_narkoba').trigger('change');
                    }
                }
            });
        }

        function getPolsek() {
            var polres = $('#polres').val()
            $.ajax({
                url: "/api/polres/" + polres,
                success: function(data) {
                    var polsek = data.data
                    var polsek_ready = '{{ $data->polsek ?? null }}';
                    var option = '<option value="">Pilih</option>'
                    for (let index = 0; index < polsek.length; index++) {
                        option +=
                            `<option value="${polsek[index].id}" ${polsek_ready == polsek[index].id ? 'selected' : ''}>${polsek[index].name}</option>`

                    }
                    $('#polsek').html(option)
                }
            });
        }

        function getWujudPerbuatan() {
            var jenis_pelanggaran = $('#jenis_pelanggaran').val()
            $.ajax({
                url: "/api/wujud_perbuatan/type/" + jenis_pelanggaran,
                success: function(data) {
                    var wp = data.data
                    var wp_ready = '{{ $data->wujud_perbuatan ?? null }}'
                    var option = ''
                    for (let index = 0; index < wp.length; index++) {
                        option +=
                            `<option value="${wp[index].id}" ${wp_ready == wp[index].id ? 'selected' : ''}>${wp[index].name}</option>`

                    }
                    $('#wujud_perbuatan').html(option)
                }
            });
        }

        function checkWPP() {
            var wpp = $('#wujud_perbuatan_pidana').val()

            // if (wpp == 1) {
            //     $('#narkobaDiv').css("display", "block");
            // } else {
            //     $('#narkobaDiv').css("display", "none");
            // }
        }

        function getPangkat(type) {
            $.ajax({
                url: "/api/pangkat/type/" + type,
                success: function(data) {
                    var pangkat = data.data
                    var option = '<option value="">Pilih</option>'
                    for (let index = 0; index < pangkat.length; index++) {
                        option += `<option value="${pangkat[index].id}">${pangkat[index].name}</option>`

                    }
                    $('#pangkat').html(option)
                }
            });
        }

        function check_pelanggar_orang() {
            var val = $('#pelanggar').val()
            getPangkat(val)
            if (val == 'asn') {
                $('#div_diktuk').css('display', 'none')
                $('#nrp_nip').val('')
                $('#diktuk').val('')
                $('#diktuk').trigger('change');
                $('#diktuk').removeAttr('required')
                $('#nrp_nip').attr('maxlength', 18)
            } else {
                $('#div_diktuk').css('display', 'block')
                $('#nrp_nip').val('')
                $('#diktuk').val('')
                $('#diktuk').attr('required', 'true')
                $('#diktuk').trigger('change');
                $('#nrp_nip').attr('maxlength', 8)
            }
        }

        function scroll_to_class(element_class, removed_height) {
            var scroll_to = $(element_class).offset().top - removed_height;
            if ($(window).scrollTop() != scroll_to) {
                $('html, body').stop().animate({
                    scrollTop: scroll_to
                }, 0);
            }
        }

        function bar_progress(progress_line_object, direction) {
            var number_of_steps = progress_line_object.data('number-of-steps');
            var now_value = progress_line_object.data('now-value');
            var new_value = 0;
            if (direction == 'right') {
                new_value = now_value + (100 / number_of_steps);
            } else if (direction == 'left') {
                new_value = now_value - (100 / number_of_steps);
            }
            progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
        }

        function getPutusan() {
            var jenis_pelanggaran = $('#jenis_pelanggaran').val()
            $.ajax({
                url: "/api/putusan/type/" + jenis_pelanggaran,
                success: function(data) {
                    var wp = data.data
                    var option = '<option value="">Pilih</option>'
                    for (let index = 0; index < wp.length; index++) {
                        option += `<option value="${wp[index].id}">${wp[index].name}</option>`

                    }
                    $('.putusan').html(option)
                }
            });
        }

        $(document).ready(function() {
            // Form
            $('.f1 fieldset:first').fadeIn('slow');

            $('.f1 input[type="text"], .f1 input[type="password"], .f1 textarea').on('focus', function() {
                $(this).removeClass('input-error');
            });

            // step selanjutnya (ketika klik tombol selanjutnya)
            $('.f1 .btn-next').on('click', function() {
                var parent_fieldset = $(this).parents('fieldset');
                var next_step = true;
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                // validasi form
                parent_fieldset.find('input[required="true"], textarea[required="true"]').each(
                    function() {
                        if ($(this).val() == "") {
                            $(this).addClass('input-error');
                            next_step = false;
                        } else {
                            $(this).removeClass('input-error');
                        }
                    });

                if (next_step) {
                    parent_fieldset.fadeOut(400, function() {
                        // change icons
                        current_active_step.removeClass('active').addClass('activated').next()
                            .addClass(
                                'active');
                        // progress bar
                        bar_progress(progress_line, 'right');
                        // show next step
                        $(this).next().fadeIn();
                        // scroll window to beginning of the form
                        scroll_to_class($('.f1'), 20);
                    });
                }
            });

            // step sbelumnya (ketika klik tombol sebelumnya)
            $('.f1 .btn-previous').on('click', function() {
                // navigation steps / progress steps
                var current_active_step = $(this).parents('.f1').find('.f1-step.active');
                var progress_line = $(this).parents('.f1').find('.f1-progress-line');

                $(this).parents('fieldset').fadeOut(400, function() {
                    // change icons
                    current_active_step.removeClass('active').prev().removeClass('activated')
                        .addClass(
                            'active');
                    // progress bar
                    bar_progress(progress_line, 'left');
                    // show previous step
                    $(this).prev().fadeIn();
                    // scroll window to beginning of the form
                    scroll_to_class($('.f1'), 20);
                });
            });

            // submit (ketika klik tombol submit diakhir wizard)
            $('.f1').on('submit', function(e) {
                // validasi form
                $(this).find('input[required="true"], textarea[required="true"]').each(function() {
                    if ($(this).val() == "") {
                        e.preventDefault();
                        $(this).addClass('input-error');
                    } else {
                        $(this).removeClass('input-error');
                    }
                });
            });
        });

        function getPolresPelanggar() {
            var polda = $('#polda_terduga').val()
            $.ajax({
                url: "/api/polda_terduga/" + polda,
                success: function(data) {
                    var polres = data.data
                    var polres_ready = '{{ $data->polres_terduga ?? null }}';
                    var option = '<option value="">Pilih</option>'
                    for (let index = 0; index < polres.length; index++) {
                        option +=
                            `<option value="${polres[index].id}" ${polres_ready == polres[index].id ? 'selected' : ''}>${polres[index].name}</option>`

                    }
                    $('#polres_terduga').html(option)
                    getPolsek()
                }
            });
        }

        function getPolsekPelanggar() {
            var polres = $('#polres_terduga').val()
            $.ajax({
                url: "/api/polres_terduga/" + polres,
                success: function(data) {
                    var polsek = data.data
                    var option = '<option value="">Pilih</option>'
                    for (let index = 0; index < polsek.length; index++) {
                        option += `<option value="${polsek[index].id}">${polsek[index].name}</option>`

                    }
                    $('#polsek_terduga').html(option)
                }
            });
        }
    </script>
@endpush