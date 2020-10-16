@extends('layouts.home-master')
@section('page-title')
    Popüler Haberler
@endsection
@section('category-post')
    @foreach($mostRead->slice(0,2) as $post)
        <div class="col-md-12">
            <div class="post post-row">
                <a class="post-img" href="/content-post/{{$post->search_title}}"><img
                        src="{{asset('/uploads/content/').'/'.$post->photo}}"
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
                    <h3 class="post-title"><a href="/content-post/{{$post->search_title}}">{{$post->title}}</a></h3>
                    <div class="text-abbreviation">
                        {{$post->text}}
                    </div>
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
    @foreach($mostRead->slice(2-10) as $post)
        <div class="col-md-12">
            <div class="post post-row">

                <a class="post-img" href="/content-post/{{$post->search_title}}"><img
                        src="{{asset('/uploads/content/').'/'.$post->photo}}"
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
                    <h3 class="post-title"><a href="/content-post/{{$post->search_title}}">{{$post->title}}</a></h3>
                    <div class="text-abbreviation">
                        {{$post->text}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

