<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('page-title')</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">
    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}"/>
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}">
    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/style.css')}}"/>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/x-icon"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Header -->
<header id="header">
    <!-- Nav -->
    <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo">
                    <a href="/" class="logo"><img src="{{asset('home/img/logo.png')}}" alt=""></a>
                </div>
                <!-- /logo -->
                <!-- nav -->
                <ul class="nav-menu nav navbar-nav">
                    <li><a href="/">Anasayfa</a></li>
                    <li><a href="/populer">Popüler</a></li>
                    <li class="cat-1"><a href="/category/donanim">Donanım</a></li>
                    <li class="cat-2"><a href="/category/mobil">Mobil</a></li>
                    <li class="cat-3"><a href="/category/oyun">Oyun</a></li>
                    <li class="cat-4"><a href="/category/yazilim">Yazılım</a></li>
                    <li><a href="/forum">Forum</a></li>
                    <li><a href="/contact">İletişim</a></li>

                </ul>
                <!-- /nav -->
                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <form action="{{URL::to('/search')}}" method="POST" role="search">
                        @csrf
                        <div class="search-form">
                            <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                            <button class="search-close"><i class="fa fa-times"></i></button>
                        </div>
                    </form>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Main Nav -->
        <!-- Aside Nav -->
        <div id="nav-aside">
            <!-- nav -->
            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="/">Anasayfa</a></li>
                    <li><a href="/populer">Popüler</a></li>
                    <li><a href="/category/donanim">Donanım</a></li>
                    <li><a href="/category/mobil">Mobil</a></li>
                    <li><a href="/category/oyun">Oyun</a></li>
                    <li><a href="/category/yazilim">Yazılım</a></li>
                    <li><a href="/forum">Forum</a></li>

                    <li><a href="/contact">İletişim</a></li>
                </ul>
            </div>
            <!-- /nav -->
            <!-- widget posts -->
            <div class="section-row">
                <h3>Öne Çıkan Haberler</h3>
                @foreach($featuredPosts->slice(0,3) as $featured)
                    <div class="post post-widget">
                        <a class="post-img" href="/content-post/{{$featured->search_title}}"><img
                                src="{{(asset('/uploads/content/').'/'.$featured->photo)}}"
                                alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a
                                    href="/content-post/{{$featured->search_title}}">{{$featured->title}}</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- /widget posts -->
            <!-- social links -->
            <div class="section-row">
                <h3>Follow us</h3>
                <ul class="nav-aside-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
            <!-- /social links -->
            <!-- aside nav close -->
            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
            <!-- /aside nav close -->
        </div>
        <!-- Aside Nav -->
    </div>
    <!-- /Nav -->
    @yield('category-title')
</header>
<!-- /Header -->
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
    @yield('index1')
    <!-- /row -->
        <!-- row -->
    @yield('index2')
    <!-- /row -->
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @yield('index3')
                    @yield('category-post')
                </div>
            </div>
            <div class="col-md-4">
                <!-- ad -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <center>REKLAM ALANI</center>
                        <img class="img-responsive" src="{{asset('home/./img/ad-1.jpg')}}" alt="">
                    </a>
                </div>
                <!-- /ad -->
                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>En Çok Okunanlar</h2>
                    </div>
                    @foreach($mostRead->slice(0,4) as $most)
                        <div class="post post-widget">
                            <a class="post-img" href="/content-post/{{$most->search_title}}"><img
                                    src="{{(asset('/uploads/content/').'/'.$most->photo)}}" alt="" height="80"
                                    width="50"></a>
                            <div class="post-body">
                                <h3 class="post-title"><a
                                        href="/content-post/{{$most->search_title}}">{{$most->title}}</a></h3>
                            </div>
                            Görüntülenme: <span class="visible">{{$most->viewing}}</span>
                        </div>
                    @endforeach
                </div>
                <!-- /post widget -->
                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Öne Çıkan Haberler</h2>
                    </div>
                    @foreach($featuredPosts->slice(0,2) as $featured)
                        <div class="post post-thumb">

                            <a class="post-img" href="/content-post/{{$featured->search_title}}"><img
                                    src="{{(asset('/uploads/content/').'/'.$featured->photo)}}"
                                    alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    @if($featured->name=='Donanım')
                                        <a class="post-category cat-1" href="/category/donanim">{{$featured->name}}</a>
                                    @elseif($featured->name=='Mobil')
                                        <a class="post-category cat-2" href="/category/mobil">{{$featured->name}}</a>
                                    @elseif($featured->name=='Oyun')
                                        <a class="post-category cat-3" href="/category/oyun">{{$featured->name}}</a>
                                    @elseif($featured->name=='Yazılım')
                                        <a class="post-category cat-4" href="/category/yazilim">{{$featured->name}}</a>
                                    @endif
                                    <span class="post-date">{{date("d/m/Y",strtotime($featured->published_at))}}</span>
                                </div>
                                <h3 class="post-title"><a
                                        href="/content-post/{{$featured->search_title}}">{{$featured->title}}</a>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /post widget -->
                <!-- ad -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="{{asset('home/./img/ad-1.jpg')}}" alt="">
                    </a>
                </div>
                <!-- /ad -->
                <!-- catagories -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Kategoriler</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            <li><a href="/category/donanim" class="cat-1">Donanım<span>{{$piece[1]}}</span></a></li>
                            <li><a href="/category/mobil" class="cat-2">Mobil<span>{{$piece[2]}}</span></a></li>
                            <li><a href="/category/oyun" class="cat-3">Oyun<span>{{$piece[3]}}</span></a></li>
                            <li><a href="/category/yazilim" class="cat-4">Yazılım<span>{{$piece[4]}}</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /catagories -->
                <!-- tags -->
                <div class="aside-widget">
                    <div class="tags-widget">
                        <ul>
                            <li><a href="#">Teknoloji</a></li>
                            <li><a href="/category/donanim">Donanım</a></li>
                            <li><a href="/category/mobil">Mobil</a></li>
                            <li><a href="/category/oyun">Oyun</a></li>
                            <li><a href="/category/yazilim">Yazılım</a></li>
                            <li><a href="#">Bilgi</a></li>
                            <li><a href="/">infoStation</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /tags -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
<!-- Footer -->
<footer id="footer">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-5">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="/" class="logo"><img src="{{asset('home/./img/logo.png')}}" alt="logo"></a>
                    </div>
                    <div class="footer-copyright">
								<span>&copy;
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i
                                        class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                                                                            target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">Hakkımızda</h3>
                            <ul class="footer-links">

                                <li><a href="/contact">İletişim</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">Kategoriler</h3>
                            <ul class="footer-links">
                                <li><a href="/category/donanim">Donanım</a></li>
                                <li><a href="/category/mobil">Mobil</a></li>
                                <li><a href="/category/oyun">Oyun</a></li>
                                <li><a href="/category/yazilim">Yazılım</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Bültenimize Katılın</h3>
                    <div class="footer-newsletter">
                        <form method="POST" action="/bulletin">
                            @csrf
                            <input class="input" id="email" type="email" name="email"
                                   placeholder="E-postanızı Giriniz.">
                            <button type="submit" class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                            @if (session('bulletin-success'))
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        &times;
                                    </button>
                                    &nbsp;{{ session('bulletin-success') }}
                                </div>
                            @endif
                        </form>
                    </div>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</footer>
<!-- /Footer -->
<!-- jQuery Plugins -->
<script src="{{asset('home/js/jquery.min.js')}}"></script>
<script src="{{asset('home/js/bootstrap.min.js')}}"></script>
<script src="{{asset('home/js/main.js')}}"></script>
</body>
</html>
