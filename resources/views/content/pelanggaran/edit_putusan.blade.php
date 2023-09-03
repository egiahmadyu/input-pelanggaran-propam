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
                                    <h4>Penyelesaian</h4>
                                        <div class="form-group">
                                            <select class="form-control" id="penyelesaian" style="width: 100%"
                                                name="penyelesaian" onchange="check_penyelesaian()">
                                                <option value="">Pilih</option>
                                                <option value="sidang" {{$list_petusan['penyelesaian'] == 'sidang' ? 'selected' : ''}}>Sidang</option>
                                                <option value="dihentikan" {{$list_petusan['penyelesaian'] == 'dihentikan' ? 'selected' : ''}}>Dihentikan</option>
                                            </select>
                                        </div>
                                        <hr>
                                        <div id="sidang_div">
                                            <h5>Sidang</h5>
                                    <div class="form-group">
                                        <label>No Kep</label>
                                        <input type="text" name="no_kep" id="no_kep" class="form-control putusan"
                                            value="{{ $list_petusan['no_kep'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Tgl Kep</label>
                                        <input type="date" name="tgl_kep" id="tgl_kep" class="form-control datePicker putusan">
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
                                                        <option value="{{ $alasan_berhenti->id }}">
                                                            {{ $alasan_berhenti->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>No. Kep SP3 / SP4</label>
                                                <input type="text" name="nokepsp3" id="nokepsp3"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Tgl. Kep SP3 / SP4</label>
                                                <input type="text" name="tglkepsp3" placeholder="0" id="tglkepsp3"
                                                    class="form-control" data-toggle="datepicker">
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
        });

        function check_penyelesaian() {
            var val = $('#penyelesaian').val();
            if (val == 'sidang') {
                $('#sidang_div').css('display', 'block')
                $('#dihentikan_div').css('display', 'none')
            } else if(val == 'dihentikan'){
                $('.putusan').val('')
                // $('.putusan').trigger('change');
                $('#sidang_div').css('display', 'none')
                $('#dihentikan_div').css('display', 'block')
            } else {
                $('#dihentikan_div').css('display', 'none')
                $('.putusan').val('')
                // $('.putusan').trigger('change');
                $('#sidang_div').css('display', 'none')
            }
        }
    </script>
@endpush
