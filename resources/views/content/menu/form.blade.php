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
                                    <h4 class="mb-1">Menu</h4>
                                </div>
                                <div><a href="/manage/sidebar/save" class="align-self-center mx-3"><button
                                            class="btn btn-primary ">Add
                                            Menu</button></a></div>
                            </div>
                            <div class="card-body">
                                <form action="/manage/sidebar/save" method="post">
                                    @csrf
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">icon</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="icon" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-email">url</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input type="text" name="url" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-email">Order</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <input type="number" name="sort" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-email">Permission</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                                                <select class="form-control" name="permission">
                                                    <option value="">Open this select menu</option>
                                                    @foreach ($permissions as $value)
                                                        <option value="{{ $value->name }}">{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Type</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" aria-label="Default select example" name="type">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Parent</option>
                                                <option value="2">Dropdown</option>
                                                <option value="3">child</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-message">Parent</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="parent_id">
                                                <option value="">Open this select menu</option>
                                                @foreach ($dropdowns as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <div class="form-text">if the parent does not need to be filled in</div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-primary">Send</button>
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
