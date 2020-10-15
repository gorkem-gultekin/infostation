@extends('layouts.admin-master')
@section('page-title')
    Comments
@endsection
@section('comment-active')
    active
@endsection
@section('title')
    <h4 class="page-title pull-left">Comments</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="/admin">Home</a></li>
        <li><span>Comments</span></li>
    </ul>
@endsection
@section('content')
    <div class="main-content-inner">
        <div class="card-area">
            <div class="row">
                <div class="card-body">
                    <h4 class="header-title">News</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Comment Count</th>
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contents as $content)
                                <tr>
                                    <td>{{$content->id}}</td>
                                    <td><img src="{{asset('/uploads/content/').'/'.$content->photo}}" height="100" width="100" alt=""></td>
                                    <td>{{$content->title}}</td>
                                    <td></td>
                                    <td><a href="/comments-edit/{{$content->id}}"><i class="fa fa-edit"></i></a></td>
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
