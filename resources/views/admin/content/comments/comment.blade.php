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
        <li><a href="/comments">Comments</a></li>
        <li><span>{{$content[0]->title}}</span></li>
    </ul>
@endsection
@section('content')
    <div class="main-content-inner">
        <div class="card-area">
            <div class="row">
            <center>
                <div class="col-lg-6 col-md-6 mt-6">
                    <br>
                    @foreach($content as $co)
                        <div class="card card-bordered">
                            <img class="card-img-top img-fluid" src="{{(asset('/uploads/content/').'/'.$co->photo)}}"
                                 alt="image">
                            <div class="card-body">
                                <h5 class="title">{{$co->title}}</h5>
                                <p class="card-text">{{$co->text}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </center>

                <div class="card-body">
                    @if (session('comment-ok'))
                        <br>
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Notification:</strong>&nbsp;{{ session('comment-ok') }}
                        </div>
                        <br>
                    @endif @if (session('comment-del'))
                        <br>
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>Notification:</strong>&nbsp;{{ session('comment-del') }}
                        </div>
                        <br>
                    @endif
                    <h4 class="header-title">waiting comments </h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">message</th>
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($waiting_comments as $comment)
                                    <tr>
                                        <td>{{$comment->name}}</td>
                                        <td>{{$comment->email}}</td>
                                        <td>{{$comment->comment}}</td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3"><a class="text-success" href="/comments-ok/{{$comment->id}}"><i class="ti-check"></i></a></li>
                                                <li class="mr-3"><a class="text-danger" href="/comments-del/{{$comment->id}}"><i class="ti-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                       <br> <h4 class="header-title">Published Comments</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">message</th>
                                        <th scope="col">action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($published_comments as $comment)
                                        <tr>
                                            <td>{{$comment->name}}</td>
                                            <td>{{$comment->email}}</td>
                                            <td>{{$comment->comment}}</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a class="text-danger" href="/comments-del/{{$comment->id}}"><i class="ti-trash"></i></a></li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br><h4 class="header-title">Deleted Comments</h4>
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead class="text-uppercase">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">message</th>
                                        <th scope="col">action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($deleted_comments as $comment)
                                        <tr>
                                            <td>{{$comment->name}}</td>
                                            <td>{{$comment->email}}</td>
                                            <td>{{$comment->comment}}</td>
                                            <td>
                                                <ul class="d-flex justify-content-center">
                                                    <li class="mr-3"><a class="text-success" href="/comments-ok/{{$comment->id}}"><i class="ti-check"></i></a></li>
                                                    <li class="mr-3"><a class="text-danger" href="/comments-hard-del/{{$comment->id}}"><i class="ti-trash"></i></a></li>
                                                </ul>
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
@endsection
