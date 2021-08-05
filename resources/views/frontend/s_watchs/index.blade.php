@extends('frontend.master')
@section('title','Đồng hồ thông minh, smartWatch, chính hãng, giá rẻ ')
@section('content')
  {{-- slider --}}
  @include('frontend.s_watchs.slider')
  {{-- filter product --}}
  @include('frontend.s_watchs.filter')
  {{-- list product  --}}
  @include('frontend.s_watchs.list')
  
  <link rel="stylesheet" type="text/css" href="{{ asset('css/s_watch.css') }}">
@endsection