@extends('layouts.home-master')
@section('page-title')
    İletişim
@endsection
@section('category-title')
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <ul class="page-header-breadcrumb">
                        <li><a href="/">Anasayfa</a></li>
                        <li>İletişim</li>
                    </ul>
                    <h1>İletişim</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('index3')
    @if (session('contact-success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;
            </button>
            &nbsp;{{ session('contact-success') }}
        </div>
    @endif
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-8 col-md-offset-1">
                    <div class="section-row">
                        <h3>Bize Ulaşın</h3>
                        <form action="/message" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <span>Email</span>
                                        <input class="input" type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <span>Konu</span>
                                        <input class="input" type="text" name="subject">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <textarea class="input" name="message" placeholder="Mesaj" rows="6"></textarea>
                                    </div>
                                    <button type="submit" class="primary-button">Gönder</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
