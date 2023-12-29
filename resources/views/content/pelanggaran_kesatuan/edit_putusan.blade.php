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
                                    <h4 class="mb-1">Update Putusan Pelanggar</h4>
                                </div>
                                <div>
                                    {{-- <a href="/tambah-data" class="align-self-center mx-3"><button
                                            class="btn btn-primary ">Tambah Data</button></a> --}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    @if (session('success'))
                                        <div class="alert alert-primary alert-dismissible" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible" role="alert">
                                            {{ session('endif') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                    @endif
                                </div>
                                <form action="/pelanggaran-data/edit/{{ $id }}/save" method="post">
                                    @csrf
                                    <input type="text" value="{{ auth()->user()->id }}" name="updated_by" hidden>
                                    <h4>Penyelesaian</h4>


                                    <div class="form-group">
                                        <label for="">Jenis Penyelesaian</label>
                                        <select class="form-control" id="penyelesaian" style="width: 100%"
                                            name="penyelesaian" onchange="check_penyelesaian()">
                                            <option value="">Pilih</option>
                                            <option value="sidang"
                                                {{ $list_petusan['penyelesaian'] == 'sidang' ? 'selected' : '' }}>Sidang
                                            </option>
                                            <option value="dihentikan"
                                                {{ $list_petusan['penyelesaian'] == 'dihentikan' ? 'selected' : '' }}>
                                                Dihentikan</option>
                                        </select>
                                    </div>
                                    <hr>
                                    <div id="sidang_div">
                                        <h5>Sidang</h5>
                                        <div class="form-group">
                                            <label
                                                id="label_dp3d">{{ $list_petusan['jenis_pelanggaran'] == 1 ? 'No DP3D' : 'No BP3KEPP' }}</label>
                                            <input type="text" name="dp3d_bp3kkepp" id="dp3d_bp3kkepp"
                                                value="{{ $list_petusan['dp3d_bp3kkepp'] }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label
                                                id="tgl_label_dp3d">{{ $list_petusan['jenis_pelanggaran'] == 1 ? 'Tanggal DP3D' : 'Tanggal BP3KEPP' }}
                                            </label>
                                            <input type="date" name="tanggal_dp3d_bp3kkepp" id="tanggal_dp3d_bp3kkepp"
                                                class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>{{ $list_petusan['jenis_pelanggaran'] == 1 ? 'No KHD' : 'No PUT' }}</label>
                                            <input type="text" name="no_kep" id="no_kep" class="form-control putusan"
                                                value="{{ $list_petusan['no_kep'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ $list_petusan['jenis_pelanggaran'] == 1 ? 'Tanggal KHD' : 'Tanggal PUT' }}</label>
                                            <input type="date" name="tgl_kep" id="tgl_kep"
                                                class="form-control datePicker putusan">
                                        </div>
                                        @for ($i = 1; $i < 13; $i++)
                                            <div class="form-group">
                                                <label>Putusan {{ $i }}</label>
                                                <select class="form-control putusan" id="putusan_{{ $i }}"
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
                                    </div>
                                    <div id="dihentikan_div">
                                        <h5>Dihentikan</h5>
                                        <div class="form-group">
                                            <label>Alasan Dihentikan</label>
                                            <select class="form-control" id="alasan_dihentikan" style="width: 100%"
                                                name="alasan_dihentikan">
                                                <option value="">Pilih</option>
                                                @foreach ($alasan_berhentis as $alasan_berhenti)
                                                    <option value="{{ $alasan_berhenti->id }}"
                                                        {{ $list_petusan['alasan_dihentikan'] == $alasan_berhenti->id ? 'selected' : '' }}>
                                                        {{ $alasan_berhenti->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nomor Surat Ketetapan Penghentian</label>
                                            <input type="text" name="nokepsp3" id="nokepsp3" class="form-control"
                                                value="{{ $list_petusan['nokepsp3'] }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Surat Ketetapan Penghentian</label>
                                            <input type="date" name="tglkepsp3" id="tglkepsp3" class="form-control">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i>
                                        Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            // getData()
            check_penyelesaian()
            <?php if($list_petusan['tgl_kep']) {?>
            $("#tgl_kep").pDatePicker({
                lang: "id",
                selected: new Date(<?= date('Y', strtotime($list_petusan['tgl_kep'])) ?>,
                    <?= date('m', strtotime($list_petusan['tgl_kep'])) ?> - 1,
                    <?= date('d', strtotime($list_petusan['tgl_kep'])) ?>)
            });
            <?php } else { ?>
            $("#tgl_kep").pDatePicker({
                lang: "id",
            });
            <?php } ?>

            <?php if($list_petusan['tanggal_dp3d_bp3kkepp']) {?>
            $("#tanggal_dp3d_bp3kkepp").pDatePicker({
                lang: "id",
                selected: new Date(<?= date('Y', strtotime($list_petusan['tanggal_dp3d_bp3kkepp'])) ?>,
                    <?= date('m', strtotime($list_petusan['tanggal_dp3d_bp3kkepp'])) ?> - 1,
                    <?= date('d', strtotime($list_petusan['tanggal_dp3d_bp3kkepp'])) ?>)
            });
            <?php } else { ?>
            $("#tanggal_dp3d_bp3kkepp").pDatePicker({
                lang: "id",
            });
            <?php } ?>

            <?php if($list_petusan['tglkepsp3']) {?>
            $("#tglkepsp3").pDatePicker({
                lang: "id",
                selected: new Date(<?= date('Y', strtotime($list_petusan['tglkepsp3'])) ?>,
                    <?= date('m', strtotime($list_petusan['tglkepsp3'])) ?> - 1,
                    <?= date('d', strtotime($list_petusan['tglkepsp3'])) ?>)
            });
            <?php } else { ?>
            $("#tglkepsp3").pDatePicker({
                lang: "id",
            });
            <?php } ?>
        });

        function check_penyelesaian() {
            var val = $('#penyelesaian').val();
            if (val == 'sidang') {
                $('#sidang_div').css('display', 'block')
                $('#dihentikan_div').css('display', 'none')

                $('#alasan_dihentikan').removeAttr('required')
                $('#tglkepsp3').removeAttr('required')
                $('#nokepsp3').removeAttr('required')


                $('#dp3d_bp3kkepp').attr('required', 'true')
                $('#tanggal_dp3d_bp3kkepp').attr('required', 'true')


            } else if (val == 'dihentikan') {
                $('.putusan').val('')
                $('#sidang_div').css('display', 'none')
                $('#alasan_dihentikan').attr('required', 'true')
                $('#nokepsp3').attr('required', 'true')
                $('#tglkepsp3').attr('required', 'true')

                $('#dp3d_bp3kkepp').removeAttr('required')
                $('#tanggal_dp3d_bp3kkepp').removeAttr('required')

                $('#no_kep').removeAttr('required')
                $('#tgl_kep').removeAttr('required')
                $('#putusan_1').removeAttr('required')

                $('#dihentikan_div').css('display', 'block')
            } else {
                $('#alasan_dihentikan').removeAttr('required')
                $('#tglkepsp3').removeAttr('required')
                $('#nokepsp3').removeAttr('required')

                $('#no_kep').removeAttr('required')
                $('#tgl_kep').removeAttr('required')
                $('#putusan_1').removeAttr('required')

                $('#dihentikan_div').css('display', 'none')
                $('.putusan').val('')
                $('#sidang_div').css('display', 'none')

                $('#dp3d_bp3kkepp').removeAttr('required')
                $('#tanggal_dp3d_bp3kkepp').removeAttr('required')
            }
        }
    </script>
@endpush
