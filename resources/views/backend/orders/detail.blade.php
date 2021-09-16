@extends('backend.master')
@section('title','Đơn hàng chi tiết')

@section('content')
	<!-- Page Heading -->
	<div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="" class="text-decoration-none ">
              <i class="fas fa-tachometer-alt mr-1"></i> 
              Trang chủ</a>
					</li>
					<li class="breadcrumb-item">
						<a href="{{ route($controllerName.'.index') }}" class="text-decoration-none ">
							Đơn hàng
						</a>
					</li>
					<li class="breadcrumb-item active">
						<span>Đơn hàng chi tiết</span>
					</li>
        </ol>
      </nav>
    </div>
	</div>
  <div class="row justify-content-end">
    <div class=" col-md-2 text-right">
      <a href="" class="btn btn-dark" target="_link">In hóa đơn</a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-3">
      <p><b>Người nhận</b></p>
      <p><b>Số điện thoại</b></p>
      <p><b>Địa chỉ</b></p>
      <p><b>Lời nhắn</b></p>
    </div>
    <div class="col-md-9">
      <p>{{$item->name}}</p>
      <p>{{$item->phone}}</p>
      <p>{{$item->address}}</p>
      <p>{{$item->note}}</p>
    </div>
  </div>
  <div class="table-responsive mt-4">
    <table class="table table-hover">
      <thead class="text-left text-uppercase">
        <tr class="text-center">
          <th>STT</th>
          <th>Hình ảnh </th>
          <th style="max-width:250px">Tên HH</th>
          <th>Đơn giá</th>
          <th>Giảm giá (%)</th>
          <th>Số lượng</th>
          <th style="color: #dc3545; text-shadow: 0 0 2px #000" >Thành tiền</th>
        </tr>
      </thead>
      <tbody>
        @php
          $total = 0;
          $discount = 0; 
        @endphp
        @foreach($item->products as $key => $product)
          @php
            $total        += $product->pivot->price * $product->pivot->quantity;
            $discount     +=  round($product->pivot->price * $product->pivot->quantity * $product->pivot->discount /100,-4);
          @endphp
             
          <tr class="text-center">
            <td>{{ $key + 1 }}</td>
            <td><img src="{{ asset('images/products'.$product->avatar)}}" /></td>
            <td  style="max-width:250px">{{ $product->name }}</td>
            <td >{{ number_format($product->pivot->price, 0, ",", ".") }} </td>
            <td >{{ $product->pivot->discount }}</td>
            <td >{{ $product->pivot->quantity }}</td>
            <td class="text-right pr-5">{{ number_format($product->pivot->price * $product->pivot->quantity  - round($product->pivot->price * $product->pivot->quantity * $product->pivot->discount /100,-4), 0, ",", ".") }} </td>
          </tr>
        @endforeach
      </tbody>
      <tr>
        <td colspan ="6" style="color: #dc3545; font-weight: 600" >Tổng</td>
        <td class="text-right pr-5" style="color: #dc3545;font-weight: 600">{{ number_format($total - $discount, 0, ",", ".") }}</td>
      </tr>
      {{-- <tr>
        <td colspan ="6" style="color: #dc3545;font-weight: 600" >Giảm giá</td>
        <td class="text-right pr-5" style="color: #dc3545;font-weight: 600">{{  number_format(0,0,",",".") }}</td>
      </tr> --}}
      <tr>
        <td colspan ="6" style="color: #dc3545;font-weight: 600" >Cần thanh toán</td>
        <td class="text-right pr-5" style="color: #dc3545;font-weight: 600">{{  number_format($total - $discount, 0, ",", ".") }}</td>
      </tr>
    </table>
  
  </div>
@endsection