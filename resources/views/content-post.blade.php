@extends('layouts.home-master')
@section('content-header')
    @foreach($contents as $content)
        <div id="post-header" class="page-header">
            <div class="background-img" style="background-image: url('{{asset('home/./img/post-page.jpg')}}');"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <div class="post-meta">
                            @if($content->name=='Donanım')
                                <a class="post-category cat-1" href="category.html">{{$content->name}}</a>
                            @elseif($content->name=='Mobil')
                                <a class="post-category cat-2" href="category.html">{{$content->name}}</a>
                            @elseif($content->name=='Oyun')
                                <a class="post-category cat-3" href="category.html">{{$content->name}}</a>
                            @elseif($content->name=='Yazılım')
                                <a class="post-category cat-4" href="category.html">{{$content->name}}</a>
                            @endif
                            <span class="post-date">{{date("d/m/Y",strtotime($content->published_at))}}</span>
                        </div>
                        <h1>{{$content->title}}</h1>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
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
                                <img class="img-responsive" src="{{(asset('/uploads/content/').'/'.$content->photo)}}"
                                     alt="">
                            </figure>
                            <p>{{$content->text}}</p>
                        </div>
                        @endforeach
                        <div class="post-shares sticky-shares">
                            <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="share-google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="share-pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
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
                                <div class="media-left">
                                    <img class="media-object" src="./img/author.png" alt="">
                                </div>
                                <div class="media-body">
                                    @foreach($user as $us)
                                        <div class="media-heading">
                                            <h3>{{$us->name}}</h3>
                                        </div>
                                        <ul class="author-social">
                                            <li><a href="mailto:{{$us->email}}"><i title="E-Mail"
                                                                                   class="fa fa-mail-forward"></i></a>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /author -->

                    <!-- comments -->
                    <div class="section-row">
                        <div class="section-title">
                            <h2>3 Comments</h2>
                        </div>

                        <div class="post-comments">
                            <!-- comment -->
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="./img/avatar.png" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>John Doe</h4>
                                        <span class="time">March 27, 2018 at 8:00 am</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.</p>


                                    <!-- /comment -->
                                </div>
                            </div>
                            <!-- /comment -->

                            <!-- comment -->
                            <div class="media">
                                <div class="media-left">
                                    <img class="media-object" src="./img/avatar.png" alt="">
                                </div>
                                <div class="media-body">
                                    <div class="media-heading">
                                        <h4>John Doe</h4>
                                        <span class="time">March 27, 2018 at 8:00 am</span>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat.</p>
                                </div>
                            </div>
                            <!-- /comment -->
                        </div>
                    </div>
                    <!-- /comments -->

                    <!-- reply -->
                    <div class="section-row">
                        <div class="section-title">
                            <h2>Leave a reply</h2>
                            <p>your email address will not be published. required fields are marked *</p>
                        </div>
                        <form class="post-reply">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Name *</span>
                                        <input class="input" type="text" name="name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Email *</span>
                                        <input class="input" type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <span>Website</span>
                                        <input class="input" type="text" name="website">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="input" name="message" placeholder="Message"></textarea>
                                    </div>
                                    <button class="primary-button">Submit</button>
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
