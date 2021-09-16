@extends('frontend.master')
@section('title','Điện thoại, smartphone')
@section('content')
  {{-- slider --}}
  @include('frontend.mobiles.slider')
  {{-- // slider --}}

  {{-- fillter-trademark --}}
  @include('frontend.mobiles.filter')
  {{-- //fillter-trademark --}}

  <h1 class="h1">Điện thoại nỗi bật nhất</h1>

  {{-- list product --}}
  @include('frontend.mobiles.list')
  {{-- // list product --}}

  <div class="show-more">
    <label for="" class="js-show-more" data-page="1" data-category="1">Xem thêm sản phẩm <i class="fa fa-caret-down"></i></label>
  </div>
  <div class="catetag">
    <a href="">Samsung Galaxy Note Mới</a>
    <a href="">iPhone 11 Pro Max</a>
    <a href="">iPhone 11</a>
    <a href="">Redmi Note 9S</a>
    <a href="">OPPO Reno4</a>
    <a href="">Điện thoại độc quyền</a>
    <a href="">OnePlus</a>
    <a href="">Điện thoại Energizer</a>
    <a href="">Điện thoại thông minh</a>
    <a href="">Điện thoại pin trâu</a>
  </div>
@endsection

@section('slogan')
  @include('frontend.shares.slogan')
@endsection