@extends('layouts.admin-master')
@section('content')
<center>
    <div class="col-6 mt-5" >
        <div class="card ">
            <div class="card-body">
                <h4 class="header-title">User</h4>
                <form class="needs-validation" novalidate="" method="post" action="/update/{{$user->id}}">
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
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <p align="center">
                            <button class="btn btn-success" type="submit">Save</button>
                            <a href="{{route('users')}}">
                                <button type="button" class="btn btn-danger">Cancel</button>
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</center>
@endsection