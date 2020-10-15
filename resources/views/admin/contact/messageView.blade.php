@extends('layouts.admin-master')
@section('page-title')
    Contact
@endsection
@section('contact-active')
    active
@endsection
@section('title')
    <h4 class="page-title pull-left">Comments</h4>
    <ul class="breadcrumbs pull-left">
        <li><a href="/admin">Home</a></li>
        <li><span>Contact</span></li>
    </ul>
@endsection
@section('content')
    <div class="main-content-inner">
        <div class="card-area">
            <div class="row">
                <div class="card-body">
                    <h4 class="header-title">Messages</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-striped text-center">
                                <thead class="text-uppercase">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contact as $message)
                                    <tr>
                                        <td>{{$message->id}}</td>
                                        <td><a href="mailto:{{$message->email}}">{{$message->email}}</a></td>
                                        <td>{{$message->subject}}</td>
                                        <td>{{$message->message}}</td>
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
