<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{ asset('images/favicon.ico') }}" rel="apple-touch-icon">
<link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon">
<title>My Admin | @yield('title')</title>
<!-- Fontawesome -->
<link rel="stylesheet" href="{{ asset('fonts/fontawesome-pro-5.14.0-web/css/all.min.css') }}">
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<!-- Select -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2.css') }}">
<!-- Sweetalert2 -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/plugins/sweetAlert/sweetalert2.min.css') }}">
<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin.css') }}">

@if($current_page == 'dashboard')
  <link href="{{ asset('libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css">
@endif