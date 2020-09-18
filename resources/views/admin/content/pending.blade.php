@extends('layouts.admin-master')
@section('title')
    <h4 class="page-title pull-left">Pending Approval</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="/admin">Home</a></li>
        <li><span>Pending Approval</span></li>
    </ul>
@endsection
@section('content')

    <div class="main-content-inner">
        <div class="row">
            @foreach($pendingApproval as $pending)
            <div class="col-lg-6 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="media mb-5">
                            <img class="img-fluid mr-4" src="{{asset('/uploads/content/').'/'.$pending->photo}}" alt="image" width="100" height="150">
                            <div class="media-body">
                                <h4 class="mb-3">{{$pending->title}}</h4>{{$pending->text}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


@endsection
