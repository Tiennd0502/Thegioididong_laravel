@extends('frontend.master')
@section('title','Điện thoại, smartphone')
@section('content')
  {{-- slider --}}
  @include('frontend.mobiles.slider')
  {{-- fillter-trademark --}}
  @include('frontend.mobiles.filter')
  <h1 class="h1">Điện thoại nỗi bật nhất</h1>
  <div class="home-product" id="list-mobile">
  @php
    $index = 0;
  @endphp  
  @foreach ($items as $key => $item)
    @if ($key == 0 || $key == 3)
      <div class="feature">
        <a href="" class="large" data-slug="{{$item_hots[$index]->slug}}">
        {{-- Cach 2
            <a href="{{ route('dien-thoai.detail', $item_hots[$index]->slug) }}" class="large" data-slug="{{$item_hots[$index]->slug}}">
          --}}
        
          <img data-src="{{ asset('images/products'.$item_hots[$index]->image_hot) }}" alt="" width="600" height="275" class="lazyload" loading="lazy" >
          <h3>{{ $item_hots[$index]->name }}</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            @if ($item_hots[$index]->discount != 0)
              <strong>{{ number_format(round($item_hots[$index]->price - $item_hots[$index]->price * $item_hots[$index]->discount/100,-4), 0, ",", "." ) }}₫</strong>
              <span>{{ number_format($item_hots[$index]->price, 0, ",", ".") }}₫</span>
                <i>-{{ $item_hots[$index]->discount }}%</i>
            @else
              <strong>{{ number_format($item_hots[$index]->price,0,",", ".")  }}₫</strong>
            @endif
          </div>
          <!-- <div class="product-promo noimage">
            <p>Giảm thêm <b>500.000₫</b></p>
            <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p>
          </div> -->
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 45.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
          {{-- @if (!empty($item_hots[$index]->icon))
            <img class="icon-imgNew cate1 lazyload" data-src="{{ asset('images/icons'.$item_hots[$index]->icon) }}" alt="" loading="lazy" >
          @endif --}}
        </a>
      </div>
      @php
          $index++;
      @endphp
    @endif
    <div>
      <a href="" class="large">
      {{-- Cach 2
        <a href="{{ route('dien-thoai.detail',$item->slug) }}" class="large">
        --}}
        <img data-src="{{ asset('images/products'.$item->avatar) }}" alt="" width="180" height="180" class="lazyload" loading="lazy" >
        <h3>{{ $item->name }}</h3>
        <h6 class="text-promo">Hàng sắp về</h6>
        <div class="product-price">
          @if ($item->discount != 0)
            <strong>{{ number_format(round($item->price - $item->price * $item->discount/100,-4), 0, ",", "." ) }}₫</strong>
            <span>{{ number_format($item->price, 0, ",", ".") }}₫</span>
              <i>-{{ $item->discount }}%</i>
          @else
            <strong>{{ number_format($item->price,0,",", ".")  }}₫</strong>
          @endif                  
        </div>
        <div class="product-promo noimage">
          @if (!empty($item->gift))
            <p>Giảm thêm <b>{{ number_format($item->gift, 0,",",".") }}₫</b></p>
          @endif
        </div>
        <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
        <!-- <label class="installment">Trả góp 0%</label> -->
        <label class="discount">GIẢM 45.000₫</label>
        @if (!empty($item->icon))
          <img class="icon-imgNew cate1 lazyload" data-src="{{ asset('images/icons'.$item->icon) }}" alt="" loading="lazy" >
        @endif
      </a>
    </div>
  @endforeach
    </div>
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
  </div>
  {{-- slogan --}}
  @include('frontend.mobiles.slogan')
@endsection