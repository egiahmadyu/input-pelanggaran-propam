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
                                    <h4 class="mb-1">Data Pelanggar</h4>
                                </div>
                                <div><a href="/tambah-data" class="align-self-center mx-3"><button
                                            class="btn btn-primary ">Tambah Data</button></a></div>
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
                                <h6>Filter</h6>
                                <form action="/pelanggaran-data/export" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nama Pelanggar</label>
                                                <input type="text" class="form-control" id="nama_pelanggar">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">NRP</label>
                                                <input type="text" class="form-control" id="nrp">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Jenis Pelanggaran</label>
                                                <select class="form-control" id="jenis_pelanggaran">
                                                    <option value="">Semua</option>
                                                    @foreach ($jenis_pelanggarans as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @if (auth()->user()->getRoleNames()[0] == 'admin')
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Kesatuan / Polda</label>
                                                <select class="form-control" id="polda">
                                                    <option value="">Semua</option>
                                                    @foreach ($poldas as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Wujud Perbuatan</label>
                                                <select class="form-control" id="wujud_perbuatan">
                                                    <option value="">Semua</option>
                                                    @foreach ($wujud_perbuatans as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Jenis Kelamin</label>
                                                <select class="form-control" id="jenis_kelamin">
                                                    <option value="">Semua</option>
                                                    @foreach ($jenis_kelamins as $value)
                                                        <option value="{{ $value->id }}">{{ $value->gender }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Pangkat</label>
                                                <select class="form-control" id="pangkat">
                                                    <option value="">Semua</option>
                                                    @foreach ($pangkats as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Jabatan / Satker</label>
                                                <input type="text" class="form-control" id="jabatan" name="jabatan">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tanggal Mulai</label>
                                                <input type="date" class="form-control" id="tanggal_mulai">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tanggal Akhir</label>
                                                <input type="date" class="form-control" id="tanggal_akhir">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button class="btn btn-secondary" id="kt_reset" type="button">Reset</button> |
                                            <button class="btn btn-primary" id="kt_search" type="button">Filter</button> |
                                            <button class="btn btn-success" type="submit">Export</button>
                                        </div>

                                    </div>
                                </form>
                                <table class="table table-striped table-bordered" id="list-pelanggaran">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>NRP / NIP</th>
                                            <th>Nama Pelanggar</th>
                                            <th>Jenis Pelanggaran</th>
                                            <th>Polda</th>
                                            <th>Pangkat</th>
                                            <th>No LP</th>
                                            <th>Pidana</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal_detail">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Pelanggaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Pelanggar</label>
                                <input type="text" class="form-control" id="detail_name" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jenis Pelanggaran</label>
                                <input type="text" class="form-control" id="detail_jenis_pelanggaran" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Polda</label>
                                <input type="text" class="form-control" id="detail_polda" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Diktuk</label>
                                <input type="text" class="form-control" id="detail_diktuk" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Jabatan</label>
                                <input type="text" class="form-control" id="detail_jabatan" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pasal Pelanggaran</label>
                                <input type="text" class="form-control" id="detail_pasal" readonly>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Kronologi Singkat</label>
                                <input type="text" class="form-control" id="kronologi_singkat" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('select').select2({
                theme: "bootstrap4"
            });
            getData()
            const dayText = {
                en: "Su,Mo,Tu,We,Th,Fr,Sa".split(","),
                id: "Mi,Se,Sl,Ra,Ka,Ju,Sa".split(","),
                };

                const monthText = {
                en: "January,February,March,April,May,June,July,Augustus,September,October,November,December".split(
                    ","
                ),
                id: "Januari,Februari,Maret,April,Mei,Juni,Juli,Agustus,September,Oktober,November,Desember".split(
                    ","
                ),
                };

                const todayText = {
                en: "Today",
                id: "Hari ini",
            };

            $("#tanggal_akhir").pDatePicker({
                lang: "id"
            });
            $("#tanggal_mulai").pDatePicker({
                lang: "id"
            });
        });

        function getData() {

            var table = $('#list-pelanggaran').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                search: {
        "regex": true
      },
                ajax: {
                    url: "{{ route('pelanggaran.show') }}",
                    method: "post",
                    data: function(data) {
                        data._token = '{{ csrf_token() }}',
                            data.polda = $('#polda').val(),
                            data.jenis_kelamin = $('#jenis_kelamin').val(),
                            data.jenis_pelanggaran = $('#jenis_pelanggaran').val(),
                            data.pangkat = $('#pangkat').val(),
                            data.wujud_perbuatan = $('#wujud_perbuatan').val(),
                            data.nama_pelanggar = $('#nama_pelanggar').val(),
                            data.nrp = $('#nrp').val(),
                            data.tanggal_mulai = $('#tanggal_mulai').val(),
                            data.tanggal_akhir = $('#tanggal_akhir').val(),
                            data.jabatan = $('#jabatan').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nrp_nip',
                        name: 'nrp_nip'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jenis_pelanggarans.name',
                        name: 'jenis_pelanggarans.name'
                    },
                    {
                        data: 'satuan_poldas.name',
                        name: 'satuan_poldas.name'
                    },
                    {
                        data: 'pangkats.name',
                        name: 'pangkats.name'
                    },
                    {
                        data: 'nolp',
                        name: 'nolp'
                    },
                    {
                        data: 'pidana',
                        name: 'pidana'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]


            });
            $('#kt_search').on('click', function(e) {
                e.preventDefault();
                table.table().draw();
            });

            $('#kt_reset').on('click', function(e) {
                $('.form-control').val('')
                table.table().draw();

            });
        }

        function openDetail(id) {

            $.ajax({
                url: "/pelanggaran-data/detail/" + id,
            }).done(function(data) {
                console.log(data)
                var data = data.data
                $('#detail_name').val(data.nama)
                $('#detail_polda').val(data.satuan_poldas.name)
                $('#detail_jenis_pelanggaran').val(data.jenis_pelanggarans.name)
                $('#detail_diktuk').val(data.get_diktuk.name)
                $('#detail_jabatan').val(data.jabatan)
                $('#detail_pasal').val(data.pasal_pelanggaran)
                $('#kronologi_singkat').val(data.kronologi_singkat)
                console.log(data.nama)
            });
            $('#modal_detail').modal('show')
        }

        function deletePelanggaran(id) {
            Swal.fire({
                title: 'Apa kamu yakin?',
                text: "Data tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/pelanggaran-data/delete/" + id,
                        method: "get"
                    }).done(function(data) {
                        console.log(data)
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        $("#kt_search").click();
                    });

                }
            })
        }
    </script>
@endpush
