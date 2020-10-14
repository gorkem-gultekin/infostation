@extends('layouts.admin-master')
@section('home-active')
    active
@endsection
@section('title')
    <h4 class="page-title pull-left">Home</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="/admin">Home</a></li>
    </ul>
@endsection
@section('content')
    <div class="col-lg-auto mt-5">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">News</h4>
                <div class="single-table">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead class="text-uppercase bg-dark">
                            <tr class="text-white">
                                <th scope="col">ID</th>
                                <th scope="col">Category</th>
                                <th scope="col">Title</th>
                                <th scope="col">Status</th>
                                <th scope="col">Create Date</th>
                                <th scope="col">Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <th>{{$post->id}}</th>
                                    <td>{{$post->name}}</td>
                                    <td>{{$post->title}}</td>
                                    @if($post->is_approve=='1')
                                        <td>Published</td>
                                    @else
                                        <td>Unreleased</td>
                                    @endif
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        <ul class="d-flex justify-content-center">
                                            <li class="mr-3"><a href="/edit/{{$post->id}}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <br>
                        <center>
                        <button onclick="location.href='{{route('content-export')}}'" type="button"
                                class="btn btn-outline-secondary mb-3">Download
                        </button>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
