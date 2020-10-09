@extends('layouts.home-master')
@section('category-title')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    @foreach($categoryName->slice(0,1) as $category)
                        <ul class="page-header-breadcrumb">
                            <li><a href="/">Anasayfa</a></li>
                            <li>{{$category->name}}</li>
                        </ul>
                        <h1>{{$category->name}}</h1>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('category-post')
    @foreach($categoryName->slice(0,2) as $category)
        <div class="col-md-6">
            <div class="post">
                <a class="post-img" href="blog-post.html"><img src="{{asset('/uploads/content/').'/'.$category->photo}}"
                                                               height="250" alt=""></a>
                <div class="post-body">
                    <div class="post-meta">
                        @if($category->name=='Donanım')
                            <a class="post-category cat-1">{{$category->name}}</a>
                        @elseif($category->name=='Mobil')
                            <a class="post-category cat-2">{{$category->name}}</a>
                        @elseif($category->name=='Oyun')
                            <a class="post-category cat-3">{{$category->name}}</a>
                        @elseif($category->name=='Yazılım')
                            <a class="post-category cat-4">{{$category->name}}</a>
                        @endif
                        <span class="post-date">{{date("d/m/Y",strtotime($category->published_at))}}</span>
                    </div>
                    <h3 class="post-title"><a href="blog-post.html">{{$category->title}}</a></h3>
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
    @foreach($categoryName->slice(2) as $category)
        <div class="col-md-12">
            <div class="post post-row">
                <a class="post-img" href="blog-post.html"><img src="{{asset('/uploads/content/').'/'.$category->photo}}"
                                                               height="250" alt=""></a>
                <div class="post-body">
                    <div class="post-meta">
                        @if($category->name=='Donanım')
                            <a class="post-category cat-1">{{$category->name}}</a>
                        @elseif($category->name=='Mobil')
                            <a class="post-category cat-2">{{$category->name}}</a>
                        @elseif($category->name=='Oyun')
                            <a class="post-category cat-3">{{$category->name}}</a>
                        @elseif($category->name=='Yazılım')
                            <a class="post-category cat-4" >{{$category->name}}</a>
                        @endif
                        <span class="post-date">{{date("d/m/Y",strtotime($category->published_at))}}</span>
                    </div>
                    <h3 class="post-title"><a href="blog-post.html">{{$category->title}}</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                </div>
            </div>
        </div>
    @endforeach
@endsection
