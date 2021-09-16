@extends('frontend.master')
@section('title','Thegioididong.com')
@section('content')
  {{-- slider --}}
    @include('frontend.homes.slider')
  {{-- // slider --}}
  
    <!-- postsbanner -->
  <div class="promot-banner">
    <a href=""><img src="{{ asset('images/banner/1200-75-1200x75-2.png') }}" alt="" width="1200" height="75"></a>
  </div>
  {{-- weekend shock --}}
  @include('frontend.homes.weekend_shock')
  {{-- // weekend shock --}}

  {{-- mobile hot --}}
  @include('frontend.homes.mobile')
  {{-- // mobile hot --}}

  {{-- laptop hot --}}
  @include('frontend.homes.laptop')
  {{-- // laptop hot --}}

  {{-- tablet hot --}}
  @include('frontend.homes.tablet')
  {{-- // tablet hot --}}

  {{-- Phụ kiện giá rẻ, Phụ kiệnchính hãng --}}
  @include('frontend.homes.accessory')
  {{-- // Phụ kiện giá rẻ, Phụ kiệnchính hãng --}}

  {{-- s_watch hot --}}
  @include('frontend.homes.s_watch')
  {{-- // s_watch hot --}}

  {{-- f_watch hot --}}
  @include('frontend.homes.f_watch')
  {{-- // f_watch hot --}}
  
  <!-- Máy cũ nỗi bật -->
  @include('frontend.homes.second_hand')
{{-- </div> --}}

@endsection