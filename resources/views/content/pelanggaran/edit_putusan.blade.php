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
        });

        function getData() {
            var table = $('#list-pelanggaran').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pelanggaran.show') }}",
                    method: "post",
                    data: {
                        _token: '{{ csrf_token() }}'
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'get_jenis_pelanggar.name',
                        name: 'get_jenis_pelanggar.name'
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
        }
    </script>
@endpush
