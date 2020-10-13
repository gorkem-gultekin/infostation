@extends('layouts.home-master')
@section('category-title')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    @foreach($categoryPost->slice(0,1) as $post)
                        <ul class="page-header-breadcrumb">
                            <li><a href="/">Anasayfa</a></li>
                            <li>{{$post->name}}</li>
                        </ul>
                        <h1>{{$post->name}}</h1>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('category-post')
    @foreach($categoryPost->slice(0,2) as $post)
        <div class="col-md-6">
            <div class="post">
                <a class="post-img" href="/content-post/{{$post->id}}"><img src="{{asset('/uploads/content/').'/'.$post->photo}}"
                                                                            height="250" alt=""></a>
                <div class="post-body">
                    <div class="post-meta">
                        @if($post->name=='Donanım')
                            <a class="post-category cat-1">{{$post->name}}</a>
                        @elseif($post->name=='Mobil')
                            <a class="post-category cat-2">{{$post->name}}</a>
                        @elseif($post->name=='Oyun')
                            <a class="post-category cat-3">{{$post->name}}</a>
                        @elseif($post->name=='Yazılım')
                            <a class="post-category cat-4">{{$post->name}}</a>
                        @endif
                        <span class="post-date">{{date("d/m/Y",strtotime($post->published_at))}}</span>
                    </div>
                    <h3 class="post-title"><a href="/content-post/{{$post->id}}">{{$post->title}}</a></h3>
                </div>
            </div>
        </div>
    @endforeach
    <!-- ad -->
    <div class="col-md-12">
        <div class="section-row">
            <a href="#">
                <center>REKLAM ALANI</center>
                <img class="img-responsive center-block" src="#" alt="">
            </a>
        </div>
    </div>
    <!-- ad -->
    @foreach($categoryPost->slice(2) as $post)
        <div class="col-md-12">
            <div class="post post-row">
                <a class="post-img" href="/content-post/{{$post->id}}"><img src="{{asset('/uploads/content/').'/'.$post->photo}}"
                                                                            height="250" alt=""></a>
                <div class="post-body">
                    <div class="post-meta">
                        @if($post->$post=='Donanım')
                            <a class="post-category cat-1">{{$post->$post}}</a>
                        @elseif($post->$post=='Mobil')
                            <a class="post-category cat-2">{{$post->$post}}</a>
                        @elseif($post->$post=='Oyun')
                            <a class="post-category cat-3">{{$post->$post}}</a>
                        @elseif($post->$post=='Yazılım')
                            <a class="post-category cat-4" >{{$post->$post}}</a>
                        @endif
                        <span class="post-date">{{date("d/m/Y",strtotime($post->published_at))}}</span>
                    </div>
                    <h3 class="post-title"><a href="/content-post/{{$post->id}}">{{$post->title}}</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
