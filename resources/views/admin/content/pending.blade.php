@extends('layouts.admin-master')
@section('page-title')
    Pending Approval
@endsection
@section('content-active')
    active
@endsection
@section('pending-active')
    active
@endsection
@section('title')
    <h4 class="page-title pull-left">Pending Approval</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="/admin">Home</a></li>
        <li><span>Pending Approval</span></li>
    </ul>
@endsection
@section('content')

    <div class="main-content-inner">
        @if (session('content-published'))
            <br>
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Notification:</strong>&nbsp;{{ session('content-published') }}
            </div>
            <br>
        @endif
        @if (session('content-delete'))
            <br>
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Notification:</strong>&nbsp;{{ session('content-delete') }}
            </div>
            <br>
        @endif
        <div class="row">
            @foreach($contents as $content)
                <div class="col-lg-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="media mb-5">
                                <img class="img-fluid mr-4" src="{{asset('/uploads/content/').'/'.$content->photo}}"
                                     alt="image" width="100" height="150">
                                <div class="media-body">

                                    <h4 class="mb-3">{{$content->title}}</h4><b>Published Date:</b> {{$content->created_at}}<br><div class="text-abbreviation-admin"> {{$content->text}}</div>
                                </div>
                            </div>
                            <p align="right">
                                <button type="button" class="btn btn-outline-warning mb-3"
                                        onclick="location.href='/edit/{{$content->id}}'">EDİT
                                </button>
                                <button type="button" class="btn btn-outline-success mb-3"
                                        onclick="location.href='/content-published/{{$content->id}}'">PUBLISH
                                </button>
                                <button type="button" class="btn btn-outline-danger mb-3"
                                        onclick="location.href='/content-delete/{{$content->id}}'">DELETE
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
