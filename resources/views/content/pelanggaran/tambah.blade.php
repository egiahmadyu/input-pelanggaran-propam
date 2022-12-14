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
                                <form action="" method="post" class="f1">
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
                                            <label>Jenis Pelanggaran</label>
                                            <select class="form-control" id="jenis_pelanggaran">
                                                <option>Disiplin</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
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
                                            <input type="text" name="nip" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama_r" placeholder="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <textarea name="jenis_kelamin" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Pangkat</label>
                                            <textarea name="pangkat" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <textarea name="pangkat" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Diktuk</label>
                                            <textarea name="pangkat" class="form-control"></textarea>
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
                                        <h4>Alamat Lengkap</h4>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" placeholder="Tempat Lahir"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Rumah</label>
                                            <input type="text" name="alamat_rumah" placeholder="Alamat Rumah"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Kantor</label>
                                            <textarea name="alamat_kantor" placeholder="Alamat Kantor" class="form-control"></textarea>
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
                                        <h4>Buat Akun</h4>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" placeholder="Email"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" placeholder="Password"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Ulangi password</label>
                                            <input type="password" name="ulangi_password" placeholder="Ulangi password"
                                                class="form-control">
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
                                        <h4>Sosial Media</h4>
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            <input type="text" name="facebook" placeholder="Facebook"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Twitter</label>
                                            <input type="text" name="twitter" placeholder="Twitter"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Google plus</label>
                                            <input type="text" name="google_plus" placeholder="Google plus"
                                                class="form-control">
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
            color: #deebe4;
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
                parent_fieldset.find('input[type="text"], input[type="password"], textarea').each(
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
                $(this).find('input[type="text"], input[type="password"], textarea').each(function() {
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
@endpush
