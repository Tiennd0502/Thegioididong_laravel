@extends('frontend.master')
@section('title','Mua máy in laser phun màu chính hãng, giá rẻ có trả góp')
@section('content')
  {{-- slider --}}
  @include('frontend.pc_printers.slider')
  {{-- Danh mục con --}}
  @include('frontend.pc_printers.category')
  {{-- Brand --}}
  @include('frontend.pc_printers.filter')
  {{-- list product  --}}
  @include('frontend.pc_printers.list')
  
  <link rel="stylesheet" href="{{ asset('css/pc_printer.css')}}">
@endsection