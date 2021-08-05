@extends('frontend.master')
@section('title','Đồng hồ thời trang, smartWatch, chính hãng, giá rẻ ')
@section('content')
  {{-- slider --}}
  @include('frontend.f_watchs.slider')
  {{-- find watch --}}
  @include('frontend.f_watchs.find_watch')
  {{-- top selling product --}}
  @include('frontend.f_watchs.top_selling')
  <!-- fashion watch -->
  @include('frontend.f_watchs.fashion_watch')
  <!-- f watch -->
  @include('frontend.f_watchs.f_watch')
  <!-- s watch -->
  @include('frontend.f_watchs.s_watch')
  <!--  watch chain-->
  @include('frontend.f_watchs.watch_chain')
  <!--  watch chain-->
  @include('frontend.f_watchs.post')

  <link rel="stylesheet" type="text/css" href="{{ asset('css/f_watch.css') }}">
@endsection