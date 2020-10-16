@extends('layouts.admin-master')
@section('page-title')
    Bulletin
@endsection
@section('bulletin-active')
    active
@endsection
@section('title')
    <h4 class="page-title pull-left">Bulletin</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="/admin">Home</a></li>
        <li><span>Bulletin</span></li>
    </ul>
@endsection
@section('content')
    @if (session('bulletin-members-delete'))
        <br>
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Notification:</strong>&nbsp;{{ session('bulletin-members-delete') }}
        </div>
        <br>
    @endif
    <div class="main-content-inner">
        <div class="card-area">
            <div class="row">
                <div class="card-body">

                    <h4 class="header-title">Bulletin Members</h4> <p align="right"><button type="button" class="btn btn-rounded btn-success mb-3" onclick="location.href='/deneme'">Mail Send</button></p>

                    <div class="single-table">
                        <div class="table-responsive">

                            <table class="table table-striped text-center">
                                <thead class="text-uppercase">

                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bulletin_members as $members)
                                    <tr>
                                        <td>{{$members->id}}</td>
                                        <td><a href="mailto:{{$members->email}}">{{$members->email}}</a></td>
                                        <td><a href="/bulletin-members-delete/{{$members->id}}" class="text-danger"><i class="ti-trash"></i></a></td>
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
@endsection
