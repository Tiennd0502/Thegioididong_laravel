@extends('frontend.master')
@section('title','Mua PC, máy in, mực in chính hãng, giá rẻ trả góp 0%')
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