@extends('layouts.home-master')
@section('page-title')
    {{$contents[0]->title}}
@endsection
@section('category-title')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="/">Anasayfa</a></li>
                        <li>{{$contents[0]->name}}</li>
                    </ul>
                    <h1>{{$contents[0]->name}}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('index3')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Post content -->
                <div class="col-md-8">
                    <div class="section-row sticky-container">
                        @foreach($contents as $content)
                            <div class="main-post">
                                <h3>{{$content->title}}</h3>

                                {{--                            buraya ilk paragraf--}}
                                <figure class="figure-img">
                                    <img class="img-responsive"
                                         src="{{(asset('/uploads/content/').'/'.$content->photo)}}"
                                         alt="">
                                </figure>
                                @foreach($text as $te)
                                <p>{{$te}}</p>
                                @endforeach

                            </div>
                            {{--                        sosyal medyada paylaşma--}}
                            <div class="post-shares sticky-shares">
                                <a href="http://www.facebook.com/share.php?u=https://paylaşılacaksiteadresi.html"
                                   target="_blank" class="share-facebook"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/share" target="_blank"
                                   data-url="content-post/{{$content->search_title}}" data-lang="tr"
                                   class="share-twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
                                <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-envelope"></i></a>
                            </div>
                        @endforeach
                    </div>

                    <!-- ad -->
                    <div class="section-row text-center">
                        <a href="#" style="display: inline-block;margin: auto;">
                            <h1>REKLAM ALANI</h1>
                            <img class="img-responsive" src="{{asset('home/img/ad-2.jpg')}}" alt="">
                        </a>
                    </div>
                    <!-- ad -->
                    <!-- author -->
                    <div class="section-row">
                        <div class="post-author">
                            <div class="media">
                                @foreach($user as $us)
                                    <div class="media-left">
                                        <img class="media-object" src="{{asset('uploads/profiles/').'/'.$us->photo}}"
                                             alt="avatar">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h3>{{$us->name}}</h3>
                                        </div>
                                        <ul class="author-social">
                                            <li><a href="mailto:{{$us->email}}"><i title="E-Mail"
                                                                                   class="fa fa-mail-forward"></i></a>
                                            </li>
                                        </ul>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- /author -->

                    <!-- comments -->
                    <div class="section-row">
                        <div class="section-title">
                            <h2>Yorumlar ({{$count}})</h2>
                        </div>

                        <div class="post-comments">
                            <!-- comment -->
                            @foreach($comments as $com)
                                <div class="media">

                                    <div class="media-left">
                                        <img class="media-object" src="{{asset('home/./img/avatar.png')}}" alt="avatar">
                                    </div>
                                    <div class="media-body">
                                        <div class="media-heading">
                                            <h4>{{$com->name}}</h4>
                                            <span class="time">{{$com->published_at}}</span>
                                        </div>
                                        <p>{{$com->comment}}</p>
                                        <!-- /comment -->
                                    </div>

                                </div>
                        @endforeach
                        <!-- /comment -->

                        </div>
                    </div>
                    <!-- /comments -->
                    <!-- reply -->
                    <div class="section-row">
                        <div class="section-title">
                            <h2>Yorum Bırakın</h2>
                            <p>E-posta adresiniz yayınlanmayacaktır. Zorunlu alanlar işaretlendi *</p>
                        </div>
                        @if (session('comment-success'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    &times;
                                </button>
                                &nbsp;{{ session('comment-success') }}
                            </div>
                        @endif
                        <form class="post-reply" method="post" action="{{route('comment-create',$contents[0]->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>İsim *</span>
                                        <input class="input" type="text" name="name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>E-mail *</span>
                                        <input class="input" type="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <textarea class="input" name="comment"
                                                  placeholder="Yorumunuzu Yazınız.."></textarea>
                                    </div>
                                    <button class="primary-button" type="submit">Gönder</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /reply -->
                </div>
                <!-- /Post content -->
                <!-- aside -->
                <!-- /aside -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
