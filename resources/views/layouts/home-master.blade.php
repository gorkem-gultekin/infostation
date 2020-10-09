<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>WebMag HTML Template</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('home/css/style.css')}}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
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
                    <a href="/" class="logo"><img src="{{asset('home/./img/logo.png')}}" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- nav -->
                <ul class="nav-menu nav navbar-nav">
                    <li><a href="/">Anasayfa</a></li>
                    <li><a href="category.html">Popüler</a></li>
                    <li class="cat-1"><a href="/category/donanim">Donanım</a></li>
                    <li class="cat-2"><a href="/category/mobil">Mobil</a></li>
                    <li class="cat-3"><a href="/category/oyun">Oyun</a></li>
                    <li class="cat-4"><a href="/category/yazilim">Yazılım</a></li>
                </ul>
                <!-- /nav -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </div>
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
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="#">Join Us</a></li>
                    <li><a href="#">Advertisement</a></li>
                    <li><a href="contact.html">Contacts</a></li>
                </ul>
            </div>
            <!-- /nav -->

            <!-- widget posts -->
            <div class="section-row">
                <h3>Recent Posts</h3>
                <div class="post post-widget">
                    <a class="post-img" href="blog-post.html"><img src="{{asset('home/./img/widget-2.jpg')}}"
                                                                   alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="blog-post.html">Pagedraw UI Builder Turns Your Website Design
                                Mockup Into Code Automatically</a></h3>
                    </div>
                </div>

                <div class="post post-widget">
                    <a class="post-img" href="blog-post.html"><img src="{{asset('home/./img/widget-3.jpg')}}"
                                                                   alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="blog-post.html">Why Node.js Is The Coolest Kid On The Backend
                                Development Block!</a></h3>
                    </div>
                </div>

                <div class="post post-widget">
                    <a class="post-img" href="blog-post.html"><img src="{{asset('home/./img/widget-4.jpg')}}"
                                                                   alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="blog-post.html">Tell-A-Tool: Guide To Web Design And Development
                                Tools</a></h3>
                    </div>
                </div>
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
                            <a class="post-img" href="blog-post.html"><img
                                    src="{{asset('home/./img/widget-1.jpg')}}" alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title"><a href="blog-post.html">{{$most->title}}</a></h3>
                            </div>
                            Görüntülenme: <span class="visible">{{$most->viewing}}</span>
                        </div>
                    @endforeach
                </div>
                <!-- /post widget -->

                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Featured Posts</h2>
                    </div>
                    <div class="post post-thumb">
                        <a class="post-img" href="blog-post.html"><img src="{{asset('home/./img/post-2.jpg')}}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-3" href="category.html">Jquery</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="blog-post.html">Ask HN: Does Anybody Still Use JQuery?</a>
                            </h3>
                        </div>
                    </div>

                </div>
                <!-- /post widget -->

                <!-- ad -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="./img/ad-1.jpg" alt="">
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
                            <li><a href="/category/donanim" class="cat-1">Donanım<span>{{$viewing[1]}}</span></a></li>
                            <li><a href="/category/mobil" class="cat-2">Mobil<span>{{$viewing[2]}}</span></a></li>
                            <li><a href="/category/oyun" class="cat-3">Oyun<span>{{$viewing[3]}}</span></a></li>
                            <li><a href="/category/yazilim" class="cat-4">Yazılım<span>{{$viewing[4]}}</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /catagories -->
                <!-- tags -->
                <div class="aside-widget">
                    <div class="tags-widget">
                        <ul>
                            <li><a href="#">Chrome</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">Tutorial</a></li>
                            <li><a href="#">Backend</a></li>
                            <li><a href="#">JQuery</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">Website</a></li>
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
                        <a href="/" class="logo"><img src="{{asset('home/./img/logo.png')}}" alt=""></a>
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
                            <h3 class="footer-title">About Us</h3>
                            <ul class="footer-links">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="#">Join Us</a></li>
                                <li><a href="contact.html">İletişim</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="footer-widget">
                            <h3 class="footer-title">Kategoriler</h3>
                            <ul class="footer-links">
                                <li><a href="category.html">Donanım</a></li>
                                <li><a href="category.html">Mobil</a></li>
                                <li><a href="category.html">Oyun</a></li>
                                <li><a href="category.html">Yazılım</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="footer-widget">
                    <h3 class="footer-title">Bültenimize Katılın</h3>
                    <div class="footer-newsletter">
                        <form>
                            <input class="input" type="email" name="newsletter" placeholder="E-postanızı Giriniz.">
                            <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
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
