<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{ asset('images/favicon.ico') }}" rel="apple-touch-icon">
	<link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">
	<title>@yield('title')</title>
	<!-- Fontawesome -->
	<link rel="stylesheet" href="{{ asset('fonts/fontawesome-pro-5.14.0-web/css/all.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugin/owlcarousel/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('plugin/owlcarousel/assets/owl.theme.default.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('css/accessories.css') }}"> --}}

</head>
<body class="{{ $current_page == 'dong-ho-thoi-trang' || $current_page == 'dong-ho-thong-minh' ? 'lunar' : ''}}">
  {{-- <div id="fb-root"></div> --}}
{{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=319982449176196&autoLogAppEvents=1" nonce="YD5P5cue"></script> --}}
  <div class="container-fluid" style="background-color: {{ isset($background) ? $background : '' }}">
  @include('frontend/elements/head')
  <!-- /header -->
  @include('frontend/elements/nav')
  <!--  /nav -->
    <div class="container">
      @yield('content')
    </div>
    @include('frontend/elements/foot')
  </div>

  <script type="text/javascript" src="{{ asset('js/jquery-3.5.0.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('plugin/owlcarousel/owl.carousel.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/districts.js') }}"></script>
    <!-- select2 -->
<script type="text/javascript" src="{{ asset('js/select2.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/javascript.js') }}"></script>

</body>
</html>