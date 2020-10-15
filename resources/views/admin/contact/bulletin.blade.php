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
    <div class="main-content-inner">
        <div class="card-area">
            <div class="row">
                <div class="card-body">
                    <h4 class="header-title">Bulletin Members</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bulletin_members as $members)
                                    <tr>
                                        <td>{{$members->id}}</td>
                                        <td><a href="mailto:{{$message->email}}">{{$message->email}}</a></td>
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
