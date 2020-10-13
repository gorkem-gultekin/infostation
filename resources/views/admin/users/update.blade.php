@extends('layouts.admin-master')
@section('content')
<center>
    <div class="col-6 mt-5" >
        <div class="card ">
            <div class="card-body">
                <h4 class="header-title">User</h4>
                <form class="needs-validation" novalidate="" method="post" action="/update/{{$user->id}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom01">Name</label>
                            <input class=" form-control" id="cname" name="name" value="{{$user->name}}"
                                   minlength="2"
                                   type="text" required/>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="validationCustomUsername">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                </div>
                                <input type="text" class="form-control" id="validationCustomUsername"
                                       placeholder="Username" aria-describedby="inputGroupPrepend" required=""
                                       value="{{$user->username}}" name="username">
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="validationCustom03">Email</label>
                            <input class="form-control " id="cemail" type="email" name="email"
                                   value="{{$user->email}}"
                                   required/>
                        </div>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="validatedCustomFile"
                        >
                        <label class="custom-file-label" for="validatedCustomFile">Choose Profile Photo...</label>
                        <div class="invalid-feedback">Please select Picture.</div>
                    </div>
                    <div class="form-group">
                        <p align="center">
                            <button class="btn btn-success" type="submit">Save</button>
                            <a href="{{route('users')}}">
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </a>
                        </p>
                        @if (session('user-update'))
                           <br> <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Notification:</strong>&nbsp;{{ session('user-update') }}
                            </div>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </div>
</center>
@endsection
