@extends('frontend.master')
@section('title','Giỏ hàng | Thegioididong.com')
@section('content')
<section class="empty-cart">
	<div class="icon-cart">
		<i class="fas fa-shopping-cart"></i>
		Không có sản phẩm nào trong giỏ hàng
		<a href="{{ route('home.index')}}">Về trang chủ</a>
	</div>
	<div class="call-ship">
    Khi cần trợ giúp vui lòng gọi <a href="">1800.1060</a> hoặc <a href="">028.3622.1060</a> (7h30 - 22h)
	</div>
</section>
@endsection