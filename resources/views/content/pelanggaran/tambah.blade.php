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
                                    <h4 class="mb-1">Tambah Pelanggaran</h4>
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
                                <form action="{{ route('pelanggaran.save') }}" method="post" class="f1">
                                    @csrf
                                    <div class="f1-steps" style="text-align: center;">
                                        <div class="f1-progress">
                                            <div class="f1-progress-line" data-now-value="20" data-number-of-steps="5"
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
                                        <div class="f1-step">
                                            <div class="f1-step-icon"><i class="fa fa-address-book"></i></div>
                                            <p>Penyelesaian</p>
                                        </div>
                                    </div>

                                    <fieldset>
                                        <h4>Jenis Pelanggaran</h4>
                                        <div class="form-group">
                                            <select class="form-control select2" id="jenis_pelanggaran" style="width: 100%"
                                                name="jenis_pelanggaran" onchange="getWujudPerbuatan()">
                                                @foreach ($jenis_pelanggarans as $jenis_pelanggaran)
                                                    <option value="{{ $jenis_pelanggaran->id }}">
                                                        {{ $jenis_pelanggaran->name }}</option>
                                                @endforeach
                                            </select>
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
                                            <label>NRP / NIP</label>
                                            <input type="text" name="nrp_nip" placeholder="" class="form-control"
                                                required="true">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control" id="jenis_kelamin" style="width: 100%"
                                                name="jenis_kelamin">
                                                @foreach ($genders as $gender)
                                                    <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pangkat</label>
                                            <select class="form-control" id="pangkat" style="width: 100%" name="pangkat">
                                                @foreach ($pangkats as $pangkat)
                                                    <option value="{{ $pangkat->id }}">{{ $pangkat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <textarea name="jabatan" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Diktuk</label>
                                            <select class="form-control" id="diktuk" style="width: 100%" name="diktuk">
                                                @foreach ($diktuks as $diktuk)
                                                    <option value="{{ $diktuk->id }}">{{ $diktuk->name }}</option>
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
                                        <h4>Kesatuan</h4>
                                        <div class="form-group">
                                            <label>Polda</label>
                                            <select class="form-control" id="polda" style="width: 100%" name="polda"
                                                onchange="getPolres()">
                                                @foreach ($poldas as $polda)
                                                    <option value="{{ $polda->id }}">{{ $polda->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Satker / Fungsi / Polres</label>
                                            <select class="form-control" id="polres" style="width: 100%"
                                                name="polres" onchange="getPolsek()">
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Polsek</label>
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
                                            <label>No Lp</label>
                                            <input type="text" name="nolp"
                                                id="nolp" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lp</label>
                                            <input type="date" name="tgllp" id="tgllp" class="form-control datePicker">
                                        </div>
                                        <div class="form-group">
                                            <label>Wujud Perbuatan</label>
                                            <select class="form-control" id="wujud_perbuatan" style="width: 100%"
                                                name="wujud_perbuatan">
                                                @foreach ($wujud_perbuatans as $wujud_perbuatan)
                                                    <option value="{{ $wujud_perbuatan->id }}">
                                                        {{ $wujud_perbuatan->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kronologis Singkat</label>
                                            <textarea name="kronologi_singkat" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>pasal Pelanggaran</label>
                                            <input type="text" name="pasal_pelanggaran" id="pasal_pelanggaran"
                                                class="form-control">
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label><b>Dilakukan Pidana</b></label>
                                            <select class="form-control" id="dilakukan_pidana" style="width: 100%"
                                                name="pidana" onchange="checkPidana()">
                                                <option value="YA">
                                                    YA</option>
                                                <option value="TIDAK">
                                                    TIDAK</option>
                                            </select>
                                        </div>
                                        <div class="form-group divCheckPidana">
                                            <label>No Lp Pidana</label>
                                            <input type="text" name="nolp_pidana"
                                                id="nolp_pidana" class="form-control"
                                                >
                                        </div>
                                        <div class="form-group divCheckPidana">
                                            <label>Tanggal LP Pidana</label>
                                            <input type="date" name="tgllp_pidana" id="tgllp_pidana"
                                                class="form-control datePicker">
                                        </div>
                                        <div class="form-group divCheckPidana">
                                            <label>Wujud Perbuatan Pidana</label>
                                            <select class="form-control" id="wujud_perbuatan_pidana" style="width: 100%"
                                                name="wujud_perbuatan_pidana" onchange="checkWPP()">
                                                <option value="">Pilih</option>
                                                @foreach ($wujud_perbuatanPidanas as $wujud_perbuatanPidana)
                                                    <option value="{{ $wujud_perbuatanPidana->id }}">
                                                        {{ $wujud_perbuatanPidana->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pasal Pidana</label>
                                            <input type="text" name="pasal_pidana" id="pasal_pidana"
                                                class="form-control">
                                        </div>
                                        <hr>
                                        <div id="narkobaDiv">
                                            <h5>Pelanggaran Narkoba</h5>
                                            <div class="form-group">
                                                <label>Peran Narkoba</label>
                                                <select class="form-control" id="peran_narkoba" style="width: 100%"
                                                    name="peran_narkoba">
                                                    <option value="">Pilih</option>
                                                    @foreach ($peran_narkobas as $peran_narkoba)
                                                        <option value="{{ $peran_narkoba->id }}">
                                                            {{ $peran_narkoba->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Narkoba</label>
                                                <select class="form-control" id="jenis_narkoba" style="width: 100%"
                                                    name="jenis_narkoba">
                                                    <option value="">Pilih</option>
                                                    @foreach ($jenis_narkobas as $jenis_narkoba)
                                                        <option value="{{ $jenis_narkoba->id }}">
                                                            {{ $jenis_narkoba->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="f1-buttons">
                                            <button type="button" class="btn btn-warning btn-previous"><i
                                                    class="fa fa-arrow-left"></i> Sebelumnya</button>
                                            <button type="button" class="btn btn-primary btn-next">Selanjutnya <i
                                                    class="fa fa-arrow-right"></i></button>
                                        </div>
                                    </fieldset>
                                    <!-- step 4 -->
                                    <fieldset>
                                        <h4>Penyelesaian</h4>
                                        <hr>
                                        <h5>Sidang</h5>
                                        <div class="form-group">
                                            <label>No Kep</label>
                                            <input type="text" name="no_kep" id="no_kep"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tgl Kep</label>
                                            <input type="date" name="tgl_kep" id="tgl_kep" class="form-control datePicker">
                                        </div>
                                        @for ($i = 1; $i < 13; $i++)
                                            <?php $putusans = Helper::getPutusan($i); ?>
                                            <div class="form-group">
                                                <label>Putusan {{ $i }}</label>
                                                <select class="form-control putusan" id="putusan_{{ $i }}"
                                                    style="width: 100%" name="putusan_{{ $i }}">
                                                    <option value="">Pilih</option>
                                                    {{-- @foreach ($putusans as $putusan)
                                                        <option value="{{ $putusan->id }}">
                                                            {{ $putusan->name }}</option>
                                                    @endforeach --}}
                                                </select>
                                            </div>
                                        @endfor
                                        <hr>
                                        <h5>Dihentikan</h5>
                                        <div class="form-group">
                                            <label>No. Kep SP3 / SP4</label>
                                            <input type="text" name="nokepsp3" id="nokepsp3"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tgl. Kep SP3 / SP4</label>
                                            <input type="date" name="tglkepsp3" placeholder="0" id="tglkepsp3"
                                                class="form-control datePicker">
                                        </div>
                                        <div class="f1-buttons">
                                            <button type="button" class="btn btn-warning btn-previous"><i
                                                    class="fa fa-arrow-left"></i> Sebelumnya</button>
                                            <button type="submit" class="btn btn-primary btn-submit"><i
                                                    class="fa fa-save"></i> Submit</button>
                                        </div>
                                    </fieldset>
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
            width: 20%;
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
    <script>
        $(document).ready(async function() {
            $('select').select2({
                theme: "bootstrap4"
            });
            await getPolres()
            getWujudPerbuatan()
            checkWPP()

        });

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

        $(document).ready(function() {
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

            $("#tgl_kep").pDatePicker({
                lang: "id"
            });
            $("#tglkepsp3").pDatePicker({
                lang: "id"
            });
            $("#tgllp").pDatePicker({
                lang: "id"
            });
            $("#tgllp_pidana").pDatePicker({
                lang: "id"
            });
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
    </script>

    <script>
        function getPolres() {
            var polda = $('#polda').val()
            $.ajax({
                url: "/api/polda/" + polda,
                success: function(data) {
                    var polres = data.data
                    var option = '<option value="">Pilih</option>'
                    for (let index = 0; index < polres.length; index++) {
                        option += `<option value="${polres[index].id}">${polres[index].name}</option>`

                    }
                    $('#polres').html(option)
                    getPolsek()
                }
            });
        }

        function getPolsek() {
            var polres = $('#polres').val()
            $.ajax({
                url: "/api/polres/" + polres,
                success: function(data) {
                    var polsek = data.data
                    var option = '<option value="">Pilih</option>'
                    for (let index = 0; index < polsek.length; index++) {
                        option += `<option value="${polsek[index].id}">${polsek[index].name}</option>`

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
                    var option = ''
                    for (let index = 0; index < wp.length; index++) {
                        option += `<option value="${wp[index].id}">${wp[index].name}</option>`

                    }
                    $('#wujud_perbuatan').html(option)
                    getPutusan()
                }
            });
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

        function checkWPP() {
            var wpp = $('#wujud_perbuatan_pidana').val()

            if (wpp == 1) {
                $('#narkobaDiv').css("display", "block");
            } else {
                $('#narkobaDiv').css("display", "none");
            }
        }

        function checkPidana() {
            var wpp = $('#dilakukan_pidana').val()

            if (wpp == 'YA') {
                $('#narkobaDiv').css("display", "block");
                $('.divCheckPidana').css("display", "block");
            } else {
                $('#narkobaDiv').css("display", "none");
                $('.divCheckPidana').css("display", "none");
            }
        }
    </script>
@endpush
