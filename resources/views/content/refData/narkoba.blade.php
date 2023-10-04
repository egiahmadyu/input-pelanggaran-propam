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
                                    <h4 class="mb-1">Data - Data Jenis Narkoba</h4>
                                </div>
                                {{-- <div><button class="btn btn-primary" data-toggle="modal" data-target="#tambah_data">Tambah
                                        Data</button></div> --}}
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
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        </button>
                                    </div>
                                @endif
                                <table class="table table-striped table-bordered" id="list-pelanggaran">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Jenis Narkoba</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        @foreach ($narkobas as $index => $value)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $value->name }}</td>
                                                <td><a href="/narkoba/delete/{{ $value->id }}"
                                                        class="btn btn-sm btn-danger">Delete</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
            $('#list-pelanggaran').DataTable()
        });

        // function modalEdit(id) {
        //     $('#edit_wp').val(id)
        //     $('#modalEdit').modal('show')
        // }

        // function getData() {

        //     var table = $('#list-pelanggaran').DataTable({
        //         processing: true,
        //         serverSide: true,
        //         searching: false,
        //         ajax: {
        //             url: "{{ route('refData.wujud_perbuatan.view') }}",
        //             method: "post",
        //             data: function(data) {
        //                 data._token = '{{ csrf_token() }}'
        //             }
        //         },
        //         columns: [{
        //                 data: 'DT_RowIndex',
        //                 name: 'DT_RowIndex',
        //                 orderable: false,
        //                 searchable: false
        //             },
        //             {
        //                 data: 'name',
        //                 name: 'name'
        //             },
        //             {
        //                 data: 'jenis_pelanggaran.name',
        //                 name: 'jenis_pelanggaran.name'
        //             },
        //             {
        //                 data: 'action',
        //                 name: 'action',
        //                 orderable: false,
        //                 searchable: false
        //             },
        //         ]


        //     });
        //     $('#kt_search').on('click', function(e) {
        //         e.preventDefault();
        //         table.table().draw();
        //     });
        // }
    </script>
@endpush
