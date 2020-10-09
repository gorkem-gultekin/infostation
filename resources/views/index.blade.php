@extends('layouts.home-master')
@section('index1')
    <div class="row">
        @foreach($contents->slice(0,2) as $content)
            <div class="col-md-6">
                <div class="post post-thumb">
                    <a class="post-img" href="blog-post.html"><img
                            src="{{asset('/uploads/content/').'/'.$content->photo}}" height="350" alt=""></a>
                    <div class="post-body">
                        <div class="post-meta">
                            @if($content->name=='Donanım')
                                <a class="post-category cat-1" href="category/donanim">{{$content->name}}</a>
                            @elseif($content->name=='Mobil')
                                <a class="post-category cat-2" href="category/mobil">{{$content->name}}</a>
                            @elseif($content->name=='Oyun')
                                <a class="post-category cat-3" href="category/oyun">{{$content->name}}</a>
                            @elseif($content->name=='Yazılım')
                                <a class="post-category cat-4" href="category/yazilim">{{$content->name}}</a>
                            @endif
                            <span class="post-date">{{date("d/m/Y",strtotime($content->published_at))}}</span>
                        </div>
                        <h3 class="post-title"><a href="blog-post.html">{{$content->title}}</a></h3>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('index2')
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h2>Recent Posts</h2>
            </div>
        </div>
        <!-- post -->
        @foreach($contents->slice(2,3) as $content)
            <div class="col-md-4">
                <div class="post">
                    <a class="post-img" href="blog-post.html"><img src="{{asset('/uploads/content/').'/'.$content->photo}}" height="200" alt=""></a>
                    <div class="post-body">
                        <div class="post-meta">
                            @if($content->name=='Donanım')
                                <a class="post-category cat-1" href="category/donanim">{{$content->name}}</a>
                            @elseif($content->name=='Mobil')
                                <a class="post-category cat-2" href="category/mobil">{{$content->name}}</a>
                            @elseif($content->name=='Oyun')
                                <a class="post-category cat-3" href="category/oyun">{{$content->name}}</a>
                            @elseif($content->name=='Yazılım')
                                <a class="post-category cat-4" href="category/yazilim">{{$content->name}}</a>
                            @endif
                            <span class="post-date">{{date("d/m/Y",strtotime($content->published_at))}}</span>
                        </div>
                        <h3 class="post-title"><a href="blog-post.html">{{$content->title}}</a></h3>
                    </div>
                </div>
            </div>
        @endforeach
    <!-- /post -->
        <div class="clearfix visible-md visible-lg"></div>
    </div>
@endsection
@section('index3')
    <!-- post -->
    @foreach($contents->slice(5) as $content)
    <div class="col-md-6">
        <div class="post">
            <a class="post-img" href="blog-post.html"><img src="{{asset('/uploads/content/').'/'.$content->photo}}" height="200" alt=""></a>
            <div class="post-body">
                <div class="post-meta">
                    @if($content->name=='Donanım')
                        <a class="post-category cat-1" href="category/donanim">{{$content->name}}</a>
                    @elseif($content->name=='Mobil')
                        <a class="post-category cat-2" href="category/mobil">{{$content->name}}</a>
                    @elseif($content->name=='Oyun')
                        <a class="post-category cat-3" href="category/oyun">{{$content->name}}</a>
                    @elseif($content->name=='Yazılım')
                        <a class="post-category cat-4" href="category/yazilim">{{$content->name}}</a>
                    @endif
                    <span class="post-date">{{date("d/m/Y",strtotime($content->published_at))}}</span>
                </div>
                <h3 class="post-title"><a href="blog-post.html">{{$content->title}}</a></h3>
            </div>
        </div>
    </div>
    @endforeach
    <!-- /post -->
@endsection

