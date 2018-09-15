@php
if(Session::get('locale') == '' || !Session::get('locale')){
\Session::put('locale', App::getLocale());
}

if(Session::get('locale') == 'en'){ $talign = "left"; $tdir = "ltr"; }
else{ $talign = "right"; $tdir = "rtl"; }

if (App::isLocale('en')) { $langbutton = "عربي"; $lang = "ar"; }
else { $langbutton = "English"; $lang = "en";}

@endphp

<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield("title") / {{ __("Novelist Abdullah Tayeh") }}</title>

<!-- Bootstrap core CSS -->
<link href="{{asset('front-theme/creative/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
	
<!-- Custom fonts for this template -->
<link href="{{asset('front-theme/creative/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

<!-- Plugin CSS -->
<link href="{{asset('front-theme/creative/vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="{{asset('front-theme/creative/css/creative.min.css')}}" rel="stylesheet">
<link href="{{asset('front-theme/fonts/cairo/cairo.css')}}" rel="stylesheet">
</head>

<body id="page-top" onload="startTime()">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
<div class="container"> 
<a href="/lang/{{$lang}}" id="langbu">{{$langbutton}}</a>
        
<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span></button>

<div class="collapse navbar-collapse" id="navbarResponsive">        
<ul class="navbar-nav ml-auto" dir="{{$tdir}}">
<li><a href="{{asset('/')}}" id="nv">{{ __("Home")}}</a></li>
<li><a href="{{asset('page/1')}}" id="nv">{{ __("Writer")}}</a></li>
<li><a href="{{asset('category/30')}}" id="nv">{{ __("News") }}</a></li>
<li><a href="{{asset('category/28')}}" id="nv">{{ __("Activities") }}</a></li>
<li><a href="{{asset('category/27')}}" id="nv">{{ __("Articles") }}</a></li>
<li><a href="{{asset('category/26')}}" id="nv">{{ __("Studies") }}</a></li>
<li><a href="{{asset('category/25')}}" id="nv">{{ __("Novels") }}</a></li>
<li><a href="{{asset('category/24')}}" id="nv">{{ __("Short Stories") }}</a></li>
<li><a href="{{asset('category/22')}}" id="nv">{{ __("Photos") }}</a></li>
<li><a href="{{asset('category/21')}}" id="nv">{{ __("Vedio") }}</a></li>
</ul>
</div>
      </div>
    </nav>

<header class="masthead text-center text-white d-flex">
<div class="container my-auto">
<div class="row">
<div class="col-lg-10 mx-auto">
<h1 id="writer">{{ __("Novelist Abdullah Tayeh") }}</h1>
</div>
</div>
</div>
</header>    

<section id="services">
<div class="container">
<div class="row" style="direction:rtl; margin-bottom:20px;">
  <div class="col-lg-9 col-md-6" style="text-align:{{$talign}}; direction:{{$tdir}}">
  @yield('content')
  </div>
    <div class="col-lg-3 col-md-6">
    @include('front.layouts.rightside')
    </div>
</div>
</div>
</section>

<section class="bg-dark text-white">
<div class="container text-center">
@include('front.layouts.footer')
</div>
</section>

   
<!-- Bootstrap core JavaScript -->  
<script src="{{asset('front-theme/creative/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('front-theme/creative/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Plugin JavaScript -->
<script src="{{asset('front-theme/creative/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('front-theme/creative/vendor/scrollreveal/scrollreveal.min.js')}}"></script>
<script src="{{asset('front-theme/creative/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<!-- Custom scripts for this template -->
<script src="{{asset('front-theme/creative/js/creative.min.js')}}"></script>

</body></html>