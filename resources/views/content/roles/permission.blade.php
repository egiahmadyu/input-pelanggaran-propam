@extends('layouts.master')

@section('title', 'Roles')

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
                                <form action="/manage/roles/permission/{{ $role->id }}" method="post"
                                    style="min-height: 500px;">
                                    @csrf
                                    <div class="container-fluid">
                                        <div class="row">
                                            @foreach ($permissions as $value)
                                                <div class="col-2 mt-2 mb-2">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $value->name }}" name="permissions[]"
                                                        {{ in_array($value->name, $myPermissions) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="flexCheckIndeterminate">
                                                        {{ $value->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 mt-2 mb-2">
                                                <button type="submit" class="btn btn-primary mt-4 ">Update</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
