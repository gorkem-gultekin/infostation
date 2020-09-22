@extends('layouts.admin-master')
@section('title')
    <h4 class="page-title pull-left">Deleted Content</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="/admin">Home</a></li>
        <li><span>Deleted Content</span></li>
    </ul>
@endsection
@section('content')
    <div class="main-content-inner">
        <div class="row">
            @foreach($contents as $content)
                <div class="col-lg-6 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="media mb-5">
                                <img class="img-fluid mr-4" src="{{asset('/uploads/content/').'/'.$content->photo}}"
                                     alt="image" width="100" height="150">
                                <div class="media-body">
                                    <h4 class="mb-3">{{$content->title}}</h4>{{$content->text}}
                                </div>
                            </div>
                        </div>
                        <p align="right">
                            <button type="button" class="btn btn-outline-warning mb-3">EDİT</button>
                            <button type="button" class="btn btn-outline-success mb-3"
                                    onclick="location.href='/content-published/{{$content->id}}'">PUBLISH
                            </button>
                            <button type="button" class="btn btn-outline-danger mb-3"
                                    onclick="location.href='/content-hard-delete/{{$content->id}}'">HARD DELETE
                            </button>
                        </p>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
    </div>
@endsection
