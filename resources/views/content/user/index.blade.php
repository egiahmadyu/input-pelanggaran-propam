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
                                    <h4 class="mb-1">Data User</h4>
                                </div>

                                <div><button class="btn btn-primary align-self-center mx-3" data-toggle="modal"
                                        data-target="#modal-add-user">Add
                                        User</button></div>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-primary alert-dismissible" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                        </button>
                                    </div>
                                @endif
                                @if (session('error'))
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                                        </button>
                                    </div>
                                @endif
                                <div class="table-responsive" style="min-height: 500px;">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>username</th>
                                                <th>Role</th>
                                                <th>Polda</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                            @foreach ($users as $index => $list)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $list->name }}</td>
                                                    <td>{{ $list->username }}</td>
                                                    <td>{{ $list->getRoleNames()[0] }}</td>
                                                    <td>{{ is_null($list->poldas) ? '' : $list->poldas->name }}</td>

                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                                data-toggle="dropdown" aria-expanded="false">
                                                                Action
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="javascript:void(0)"
                                                                    onclick="editUser({{ $list->id }})"><i
                                                                        class="bx bx-edit-alt me-1"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="/manage/user/delete/{{ $list->id }}"><i
                                                                        class="bx bx-trash me-1"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
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
    </div>

    <div class="modal fade" id="modal-add-user" tabindex="-1" aria-labelledby="modal-add-user" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/manage/user/save" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Role</label>
                            <select class="form-control" id="role_user" name="role" onchange="checkRole()">
                                <option value="">Semua</option>
                                @foreach ($roles as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 div_polda" style="display:none">
                            <label for="exampleFormControlInput1" class="form-label">Polda / Mabes</label>
                            <select class="form-control" id="polda" name="polda" onchange="getPolres()">
                                <option value="">Semua</option>
                                @foreach ($poldas as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 div_polres" style="display:none">
                            <label for="exampleFormControlInput1" class="form-label">Polres / Satker Mabes</label>
                            <select class="form-control" id="polres" name="polres">
                                <option value="">Semua</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-edit-user" tabindex="-1" aria-labelledby="modal-add-user" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/manage/user/update" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name_user" required>
                            <input type="text" class="form-control" name="id" id="id_user" required hidden>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email_user" required>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password_user">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Role</label>
                            <select class="form-control" id="role_user" name="role">
                                <option value="">Semua</option>
                                @foreach ($roles as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            {{-- <select class="form-select" aria-label="Default select example" id="role_user"
                                name="role">
                                <option value="">Open this select menu</option>
                                @foreach ($roles as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('style')
@endpush

@push('script')
    <script>
        $(document).ready(function() {
            // getData()
            // $('select').select2({
            //     // theme: "bootstrap4"
            // });
        });

        function editUser(id) {
            $('#modal-edit-user').modal('show')
            $.ajax({
                    url: "/manage/user/show/" + id,
                    method: 'get',
                })
                .done(function(data) {
                    console.log(data.data.id)
                    $('#id_user').val(data.data.id)
                    $('#name_user').val(data.data.name)
                    $('#email_user').val(data.data.email)
                    $('#role_user').val(data.role.id)
                });
        }

        function checkRole() {
            var val = $('#role_user').val()
            // Polda
            if (val == '2') {
                $('.div_polda').css('display', 'block')
                $("#polda").prop('required', 'required')

            } else if (val == '3') {
                $('.div_polda').css('display', 'block')
                $('.div_polres').css('display', 'block')
                $("#polda").prop('required', 'required')
                $("#polres").prop('required', 'required')
            } else {
                $('.div_polda').css('display', 'none')
                $('.div_polres').css('display', 'none')
                $("#polda").prop('required', false);
                $("#polres").prop('required', false);
            }
        }

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
    </script>
@endpush
