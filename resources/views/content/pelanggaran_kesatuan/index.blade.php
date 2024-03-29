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
                                <form action="/monitoring-data/export" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Nama Pelanggar</label>
                                                <input type="text" class="form-control" id="nama_pelanggar"
                                                    name="nama_pelanggar">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">NRP</label>
                                                <input type="text" class="form-control" id="nrp" name="nrp">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Jenis Pelanggaran</label>
                                                <select class="form-control" id="jenis_pelanggaran" name="jenis_pelanggaran"
                                                    onchange="getWujudPerbuatan()">
                                                    <option value="">Semua</option>
                                                    @foreach ($jenis_pelanggarans as $value)
                                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @if (auth()->user()->getRoleNames()[0] == 'admin' ||
                                                auth()->user()->getRoleNames()[0] == 'mabes')
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Kesatuan / Polda</label>
                                                    <select class="form-control" id="polda" name="polda">
                                                        <option value="">Semua</option>
                                                        @foreach ($poldas as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @elseif (auth()->user()->hasRole('polda'))
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="exampleFormControlInput1">Kesatuan / Polres</label>
                                                    <select class="form-control" id="polres" name="polres">
                                                        <option value="">Semua</option>
                                                        @foreach ($polres as $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif

                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Wujud Perbuatan</label>
                                                <select class="form-control" id="wujud_perbuatan" name="wujud_perbuatan">
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
                                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
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
                                                <select class="form-control" id="pangkat" name="pangkat">
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
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tanggal Laporan Polisi (Awal)
                                                </label>
                                                <input type="date" class="form-control" id="tanggal_mulai"
                                                    name="tanggal_mulai">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tanggal Laporan Polisi (Akhir)
                                                </label>
                                                <input type="date" class="form-control" id="tanggal_akhir"
                                                    name="tanggal_akhir">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tanggal Kep Sidang (Awal)</label>
                                                <input type="date" class="form-control" id="tanggal_mulai_kep"
                                                    name="tanggal_mulai_kep">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tanggal Kep Sidang (Akhir)</label>
                                                <input type="date" class="form-control" id="tanggal_akhir_kep"
                                                    name="tanggal_akhir_kep">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tanggal Kep Penghentian
                                                    (Awal)</label>
                                                <input type="date" class="form-control" id="tanggal_mulai_sp"
                                                    name="tanggal_mulai_sp">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Tanggal Kep Penghentian
                                                    (Akhir)</label>
                                                <input type="date" class="form-control" id="tanggal_akhir_sp"
                                                    name="tanggal_akhir_sp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <button class="btn btn-secondary" id="kt_reset"
                                                type="button">Reset</button>
                                            |
                                            <button class="btn btn-primary" id="kt_search" type="button">Filter</button>
                                            |
                                            <button class="btn btn-success" type="submit">Export</button>
                                        </div>

                                    </div>
                                </form>
                                <div>
                                    <table class="table table-striped table-bordered" id="list-pelanggaran"
                                        style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NRP / NIP</th>
                                                <th>Nama Pelanggar</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Jenis Pelanggaran</th>
                                                <th>Satker Yang Menangani</th>
                                                <th>Kesatuan Terduga</th>
                                                <th>Pangkat</th>
                                                <th>Jabatan</th>
                                                <th>No LP</th>
                                                <th>Tgl LP</th>
                                                <th>Pidana</th>
                                                <th>Wujud Perbuatan</th>
                                                <th>Di Buat Oleh</th>
                                                <th>Di Update Oleh</th>
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
                <div class="modal-body" id="body_detail_modal">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">NRP / NIP</label>
                                <input type="text" class="form-control" id="detail_nrp" readonly>
                            </div>
                        </div>
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
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Penyelesaian</label>
                                <input type="text" class="form-control" id="detail_penyelesaian" readonly>
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
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal_dokumen">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title_modal_dokumen">Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body_modal_dokumen">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal_limpah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Limpah</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/limpah/save" id="form_limpah" method="post">
                    <div class="modal-body" id="body_modal_limpah">

                    </div>
                    <div class="modal-footer">
                        <button type="submite" class="btn btn-success">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
@endpush

@push('script')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.colVis.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('select').select2({
                theme: "bootstrap4"
            });
            $("#form_limpah").submit(function() {
                $('.loading').css('display', 'block')
            });


            getData()
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

            $("#tanggal_akhir").pDatePicker({
                lang: "id"
            });
            $("#tanggal_mulai").pDatePicker({
                lang: "id"
            });
            $("#tanggal_akhir_kep").pDatePicker({
                lang: "id"
            });
            $("#tanggal_mulai_kep").pDatePicker({
                lang: "id"
            });

            $("#tanggal_akhir_sp").pDatePicker({
                lang: "id"
            });
            $("#tanggal_mulai_sp").pDatePicker({
                lang: "id"
            });
        });

        function getData() {
            var table = $('#list-pelanggaran').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                responsive: true,
                search: {
                    "regex": true
                },
                ajax: {
                    url: "{{ route('monitoring.show') }}",
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
                            data.tanggal_mulai_kep = $('#tanggal_mulai_kep').val(),
                            data.tanggal_akhir_kep = $('#tanggal_akhir_kep').val(),
                            data.tanggal_mulai_sp = $('#tanggal_mulai_sp').val(),
                            data.tanggal_akhir_sp = $('#tanggal_akhir_sp').val(),
                            data.jabatan = $('#jabatan').val(),
                            data.polres = $('#polres').val()
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        responsivePriority: 0
                    },
                    {
                        data: 'nrp_nip',
                        name: 'nrp_nip',
                        responsivePriority: -1
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        responsivePriority: -1
                    },
                    {
                        data: 'genders.gender',
                        name: 'genders.gender',
                        responsivePriority: -1,
                        className: "tablet-p"
                    },
                    {
                        data: 'jenis_pelanggarans.name',
                        name: 'jenis_pelanggarans.name',
                        width: '30%',
                        responsivePriority: -1
                    },
                    {
                        data: 'kesatuan_satker',
                        // responsivePriority: -1
                    },
                    {
                        data: 'kesatuan_terduga',
                    },
                    {
                        data: 'pangkats.name',
                        name: 'pangkats.name',
                        responsivePriority: -1
                    },
                    {
                        data: 'jabatan',
                        name: 'jabatan',
                        responsivePriority: -1,
                        className: "tablet-p"
                    },
                    {
                        data: 'nolp',
                        name: 'nolp',
                        responsivePriority: 1,
                        className: "tablet-p"
                    },
                    {
                        data: 'tgllp',
                        name: 'tgllp',
                        responsivePriority: 1,
                        className: "tablet-p"
                    },
                    {
                        data: 'pidana',
                        name: 'pidana',
                        responsivePriority: 1,
                        className: "tablet-p"
                    },
                    {
                        data: 'wujud_perbuatans.name',
                        name: 'wujud_perbuatans.name',
                        className: "tablet-p"
                    },
                    {
                        data: 'created',
                        orderable: false,
                        name: 'pembuat.name',
                        responsivePriority: 1,
                        className: "tablet-p"
                    },
                    {
                        data: 'updated',
                        orderable: false,
                        name: 'pengupdate.name',
                        width: Infinity,
                        responsivePriority: 1000,
                        className: "tablet-p"
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

        function showModalDokumen(id, nama) {
            console.log(nama)
            $('#title_modal_dokumen').html('Dokumen ' + nama)
            $.ajax({
                url: "/dokumen/modal/" + id,
                success: function(data) {
                    console.log(data)

                    $('#body_modal_dokumen').html(data.html)

                    $('#modal_dokumen').modal('show')
                }
            });
        }

        function getPolresLimpah() {
            var polda = $('#polda_limpah').val()
            $.ajax({
                url: "/api/polda/" + polda,
                success: function(data) {
                    var polres = data.data
                    var option = '<option value="">Pilih</option>'
                    for (let index = 0; index < polres.length; index++) {
                        option += `<option value="${polres[index].id}">${polres[index].name}</option>`

                    }
                    console.log(option)
                    $('#polres_limpah').html(option)
                    getPolsek()
                },
                error: function() {
                    console.log('error')
                }
            });
        }

        function getPolsek() {
            var polres = $('#polres_limpah').val()
            $.ajax({
                url: "/api/polres/" + polres,
                success: function(data) {
                    var polsek = data.data
                    var option = '<option value="">Pilih</option>'
                    for (let index = 0; index < polsek.length; index++) {
                        option += `<option value="${polsek[index].id}">${polsek[index].name}</option>`

                    }
                    $('#polsek_limpah').html(option)
                }
            });
        }

        function openModalLimpah(id) {
            $.ajax({
                url: "/limpah/modal/" + id,
                success: function(data) {
                    console.log(data)
                    $('#body_modal_limpah').html(data.html)
                    $('#modal_limpah').modal('show')
                }
            });
        }

        function openDetail(id) {
            $('.loading').css('display', 'block')

            $.ajax({
                url: "/pelanggaran-data/detail/" + id,
            }).done(function(data) {
                $('.loading').css('display', 'none')

                $('#body_detail_modal').html(data)
                $('#modal_detail').modal('show')
            });

        }

        function getWujudPerbuatan() {
            var jenis_pelanggaran = $('#jenis_pelanggaran').val()
            $.ajax({
                url: "/api/wujud_perbuatan/type/" + jenis_pelanggaran,
                success: function(data) {
                    var wp = data.data
                    var option = '<option value="">Semua</option>'
                    for (let index = 0; index < wp.length; index++) {
                        option += `<option value="${wp[index].id}">${wp[index].name}</option>`

                    }
                    $('#wujud_perbuatan').html(option)
                    option_wp = option
                    getPutusan()
                }
            });
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
                    Swal.fire({
                        title: 'Masukan Password',
                        input: 'password',
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Hapus Data',
                        showLoaderOnConfirm: true,
                        preConfirm: (password) => {
                            return fetch('/pelanggaran-data/delete', {
                                    method: 'POST',
                                    headers: {
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({
                                        _token: '{{ csrf_token() }}',
                                        password: password,
                                        id: id
                                    })
                                }).then(response => {
                                    if (!response.ok) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Terjadi Kesalahan Pada Server'
                                        })

                                    }
                                    return response.json()
                                })
                                .catch(error => {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Terjadi Kesalahan Pada Server'
                                    })
                                })
                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        console.log(result);
                        if (result.isConfirmed) {
                            if (result.value.status !== 200) {
                                return Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: result.value.message
                                })
                            }
                            Swal.fire(
                                'Deleted!',
                                'Data Berhasil Dihapus',
                                'success'
                            )
                            $("#kt_search").click();
                        }
                    })

                }
            })
        }
    </script>
@endpush
