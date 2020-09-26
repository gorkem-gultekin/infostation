@extends('layouts.admin-master')
@section('title')
    <h4 class="page-title pull-left">Users</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="/admin">Home</a></li>
        <li><span>Users</span></li>
    </ul>
@endsection
@section('content')
    <!-- Progress Table start -->
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                @if (session('user-delete'))
                    <br> <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Notification:</strong>&nbsp;{{ session('user-delete') }}
                    </div><br>
                @endif
                <h4 class="header-title">Users Table</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table table-hover progress-table text-center">
                            <thead class="text-uppercase">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td><a>@</a>{{$user->username}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="update/{{$user->id}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>

                                            <li class="mr-3"><a href="/delete/{{$user->id}}" class="text-danger"><i class="ti-trash"></i></a></li>

                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <table>
                            <form action="{{route('user-import')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="input-group mb-3 col-md-4">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="file" class="custom-file-input"
                                                   id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                        &nbsp;&nbsp;<button type="submit" class="btn btn-outline-info mb-3">Upload
                                        </button>&nbsp;&nbsp;
                                        <button onclick="location.href='{{route('user-export')}}'" type="button"
                                                class="btn btn-outline-secondary mb-3">Download
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
