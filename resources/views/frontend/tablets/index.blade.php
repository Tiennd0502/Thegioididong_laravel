@extends('frontend.master')
@section('title','Tablet | Máy tính bảng giá rẻ, trả góp 0%')
@section('content')
  {{-- slider --}}
  @include('frontend.tablets.slider')
  {{-- // slider --}}

  {{-- fillter-trademark --}}
  @include('frontend.tablets.filter')
  {{-- // fillter-trademark --}}

  {{-- list product --}}
  @include('frontend.tablets.list')
  {{-- // list product --}}

  <!-- Block tin tức cho laptop -->
  @include('frontend.laptops.post')
  <!-- /Block tin tức cho laptop -->
  <div class="catetag">
    <a href="">Laptop Asus</a>
    <a href="">Laptop HP</a>
    <a href="">Laptop Lenovo</a>
    <a href="">Macbook Pro</a>
    <a href="">Laptop Acer</a>
    <a href="">Dell inspiron</a>
    <a href="">Macbook Air</a>
    <a href="">Macbook Pro 2018</a>
    <a href="">Asus Zenbook</a>
    <a href="">HP Pavilion</a>
    <a href="">HP Envy</a>
    <a href="">Dell inspiron 15</a>
    <a href="">As</a>
  </div>

@endsection
@section('slogan')
  @include('frontend.shares.slogan')
@endsection
