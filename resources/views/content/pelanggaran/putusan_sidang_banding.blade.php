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
                                    <h4 class="mb-1">Putusan Sidang Banding</h4>
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
                                <form action="/pelanggaran-data/sidang_banding/{{ $id }}/save" method="post">
                                    @csrf
                                    <input type="text" value="{{ auth()->user()->id }}" name="updated_by" hidden>
                                    <hr>
                                    <div id="sidang_div">
                                        <h5>Sidang</h5>
                                        <div class="form-group">
                                            <label>No Put Sidang Banding</label>
                                            <input type="text" name="no_putusan" id="no_putusan"
                                                class="form-control putusan"
                                                value="{{ $sidang_banding ? $sidang_banding->no_putusan : '' }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Put Sidang Banding</label>
                                            <input type="date" name="tanggal_putusan" id="tanggal_putusan"
                                                class="form-control datePicker putusan" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Putusan 1</label>
                                            <select class="form-control putusan" id="putusan_sidang_banding"
                                                style="width: 100%" name="putusan_sidang_banding">
                                                <option value="">Pilih</option>
                                                <option value="Menolak Permohonan Banding">Menolak Permohonan Banding
                                                </option>
                                                <option value="Menerima Permohonan Banding"
                                                    {{ $sidang_banding ? ($sidang_banding->putusan_sidang_banding == 'Menerima Permohonan Banding' ? 'selected' : '') : '' }}>
                                                    Menerima Permohonan Banding
                                                </option>
                                            </select>
                                        </div>

                                        @for ($i = 2; $i < 10; $i++)
                                            <div class="form-group">
                                                <label>Putusan {{ $i }}</label>
                                                @if (isset($list_putusan) && array_key_exists($i - 2, $list_putusan))
                                                    <select class="form-control putusan" id="putusan_{{ $i }}"
                                                        style="width: 100%" name="putusan[{{ $i }}]">
                                                        <option value="">Pilih</option>
                                                        @foreach ($putusans as $index => $putusan)
                                                            <option value="{{ $putusan->id }}"
                                                                {{ $list_putusan[$i - 2]['putusan_id'] == $putusan->id ? 'selected' : '' }}>
                                                                {{ $putusan->name }} </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <select class="form-control putusan" id="putusan_{{ $i }}"
                                                        style="width: 100%" name="putusan[{{ $i }}]">
                                                        <option value="">Pilih</option>
                                                        @foreach ($putusans as $index => $putusan)
                                                            <option value="{{ $putusan->id }}">
                                                                {{ $putusan->name }}</option>
                                                        @endforeach
                                                    </select>
                                                @endif

                                            </div>
                                        @endfor
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
            $('select').select2({
                theme: "bootstrap4"
            });
            check_penyelesaian()
            <?php if($sidang_banding) {?>
            $("#tanggal_putusan").pDatePicker({
                lang: "id",
                selected: new Date(<?= date('Y', strtotime($sidang_banding->tanggal_putusan)) ?>,
                    <?= date('m', strtotime($sidang_banding->tanggal_putusan)) ?> - 1,
                    <?= date('d', strtotime($sidang_banding->tanggal_putusan)) ?>)
            });
            <?php } else { ?>
            $("#tanggal_putusan").pDatePicker({
                lang: "id",
            });
            <?php } ?>
        });

        function check_penyelesaian() {
            // var val = $('#penyelesaian').val();
            // if (val == 'sidang') {
            //     $('#sidang_div').css('display', 'block')
            //     $('#dihentikan_div').css('display', 'none')
            // } else if (val == 'dihentikan') {
            //     $('.putusan').val('')
            //     // $('.putusan').trigger('change');
            //     $('#sidang_div').css('display', 'none')
            //     $('#dihentikan_div').css('display', 'block')
            // } else {
            //     $('#dihentikan_div').css('display', 'none')
            //     $('.putusan').val('')
            //     // $('.putusan').trigger('change');
            //     $('#sidang_div').css('display', 'none')
            // }
        }
    </script>
@endpush
