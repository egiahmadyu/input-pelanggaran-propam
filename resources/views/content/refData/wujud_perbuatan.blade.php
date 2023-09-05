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
                                    <h4 class="mb-1">Data - Data Wujud Perbuatan</h4>
                                </div>
                                <div><button class="btn btn-primary" data-toggle="modal" data-target="#tambah_data">Tambah
                                        Data</button></div>
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
                                {{-- <h6>Filter</h6>
                                <div class="row">
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
                                            <label for="exampleFormControlInput1">Jabatan</label>
                                            <select class="form-control" id="jenis_pelanggaran">
                                                <option value="">Semua</option>jabatans
                                                @foreach ($jabatans as $value)
                                                    <option value="{{ $value->jabatan }}">{{ $value->jabatan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button class="btn btn-secondary">Reset</button> |
                                        <button class="btn btn-primary" id="kt_search">Filter</button>
                                    </div>

                                </div> --}}
                                <table class="table table-striped table-bordered" id="list-pelanggaran">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>WUjud Perbuatan</th>
                                            <th>Jenis Pelanggaran</th>
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

    <div class="modal" id="tambah_data">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Wujud Perbuatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/wujud-perbuatan/save">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Pelanggaran</label>
                            <select class="form-control" id="jenis_pelanggaran" name="jenis_pelanggaran_id">
                                @foreach ($jenis_pelanggaran as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Wujud Perbuatan</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="modalEdit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Wujud Perbuatan Pidana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/data-master/wujud-perbuatan/save/edit">
                        @csrf
                        <input type="text" class="form-control" name="id" hidden id="edit_wp">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Wujud Perbuatan</label>
                            <input type="text" class="form-control" name="name" id="nama_edit">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            $('select').select2({
                theme: "bootstrap4"
            });
            getData()
        });

        function modalEdit(id) {
            $('#edit_wp').val(id)
            $('#modalEdit').modal('show')
        }

        function getData() {

            var table = $('#list-pelanggaran').DataTable({
                processing: true,
                serverSide: true,
                searching: false,
                ajax: {
                    url: "{{ route('refData.wujud_perbuatan.view') }}",
                    method: "post",
                    data: function(data) {
                        data._token = '{{ csrf_token() }}'
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'jenis_pelanggaran.name',
                        name: 'jenis_pelanggaran.name'
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
        }
    </script>
@endpush
