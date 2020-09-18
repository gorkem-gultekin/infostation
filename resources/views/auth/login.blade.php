@extends('layouts.app')
@section('content')
    <!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/images/icon/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all"/>
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
<!-- login area start -->
<div class="login-area login-s2">
    <div class="container">
        <div class="login-box ptb--100">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login-form-head">
                    <h4>Sign In</h4>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputEmail1">{{ __('E-Mail Address') }}</label>
                        <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror"
                               required autocomplete="email" autofocus>
                        <i class="ti-email"></i>
                        @error('email')
                        <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">{{ __('Password') }}</label>
                        <input type="password" id="password" name="password"
                               class="@error('password') is-invalid @enderror" required autocomplete="current-password">
                        <i class="ti-lock"></i>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <div class="text-danger"></div>
                    </div>
                    <div class="row mb-4 rmber-area">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox mr-sm-2">

                            </div>
                        </div>
                        <div class="col-6 text-right">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="submit-btn-area">
                        @csrf
                        <button id="form_submit" type="submit">{{ __('Login') }} <i class="ti-arrow-right"></i></button>
                    </div>
                    <div class="form-footer text-center mt-5">
                        <p class="text-muted">Don't have an account? <a href="{{ route('register') }}">Sign up</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->

<!-- jquery latest version -->
<script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
<!-- bootstrap 4 js -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>

<!-- others plugins -->
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
</body>
</html>
@endsection
