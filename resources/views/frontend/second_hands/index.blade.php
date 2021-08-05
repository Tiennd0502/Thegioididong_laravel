@extends('frontend.master')
@section('title','Điện thoại, máy tính bảng, laptop cũ giá rẻ, có bán trả góp')
@section('content')
  {{-- slider --}}
  @include('frontend.second_hands.slider')
  {{-- tab_link --}}
  @include('frontend.second_hands.tab_link')
  {{-- mobile second hand--}}
  @include('frontend.second_hands.mobile')
  {{-- laptop second hand--}}
  @include('frontend.second_hands.laptop')
  {{-- tablet second hand--}}
  @include('frontend.second_hands.tablet')
  {{-- s_watch second hand--}}
  @include('frontend.second_hands.s_watch')

  <link rel="stylesheet" href="{{ asset('css/second_hand.css')}}">
@endsection