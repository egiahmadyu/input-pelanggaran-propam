@extends('layouts.master')

{{-- @section('title', 'Roles') --}}

@section('content')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-header">Roles</h5>
                        <button class="btn btn-primary align-self-center mx-3" data-toggle="modal"
                            data-target="#modal-add-role">Add
                            Role</button>
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
                                {{ session('endif') }}
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
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($lists as $index => $list)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $list->name }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button"
                                                        class="btn btn-primary dropdown-toggle hide-arrow"
                                                        data-toggle="dropdown">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="/manage/roles/permission/{{ $list->id }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Set Permission</a>
                                                        <a class="dropdown-item"
                                                            href="/manage/roles/delete/{{ $list->id }}"><i
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
    <!-- Roles Table -->

    <!--/ Bordered Table -->

    <hr class="my-5">

    <div class="modal fade" id="modal-add-role" tabindex="-1" aria-labelledby="modal-add-role" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Role</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/manage/roles/save" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
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
