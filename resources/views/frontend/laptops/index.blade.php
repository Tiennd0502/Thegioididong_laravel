@extends('frontend.master')
@section('title','Laptop | Máy tính xách tay giá rẻ, trả góp 0%')
@section('content')
  {{-- <div id="tab-links">
    <div class="tab-links">
      <a href="" class="links-active">laptop</a>
      <a href="" class="">Máy tính bộ - Màn hình</a>
      <a href="" class="">Máy in - Mực in</a>
    </div>
    <div class="mac-hp-area">
      <a href=""><img src="{{ asset('images/macbook.png') }}"></a>
      <a href=""><img src="{{ asset('images/hp.png') }}"></a>
    </div>
  </div> --}}
  {{-- slider --}}
  @include('frontend.laptops.slider')
  {{-- fillter-trademark --}}
  @include('frontend.laptops.filter')

  <div class="demand">
    <h3 class="title" style="border-bottom: none">Chọn nhu cầu:</h3>
    <div class="property-need">
      <a href="">
        <img src="{{ asset('images/hoc-tap.jpg') }}" alt="">
        <span>Học tập - Văn phòng</span>
      </a>
      <a href="">
        <img src="{{ asset('images/do-hoa-(tgdd).jpg') }}" alt="">
        <span>Đồ họa - Kỹ thuật</span>
      </a>
      <a href="">
        <img src="{{ asset('images/mong-nhe.jpg') }}" alt="">
        <span>Mõng nhẹ</span>
      </a>
      <a href="">
        <img src="{{ asset('images/gaming.jpg') }}" alt="">
        <span>Laptop - Gaming</span>
      </a>
      <a href="">
        <img src="{{ asset('images/cao-cap.jpg')}}" alt="">
        <span>Cao cấp - Sang trọng</span>
      </a>
    </div>
  </div>

  <div class="img-title">
    <img src="{{ asset('images/FeatureLaptopShockPrice.png') }}" alt="">
  </div>

  {{-- discount --}}
  @include('frontend.laptops.laptop_shock')
  {{-- end discount --}}
  <div class="title-filter-sort">
    <h1 class="h1">Laptop bán chạy</h1>
    <div class="filter-sort">
      <span class="criteria js-sort" id="js-sort"> <span>Sắp xếp</span><i class="fa fa-caret-down"></i></span>
      <div class="content-sort js-content-sort" style="">
        <label class="closefilter js-closefilter "><i class="fal fa-times-circle"></i></label>
        <span><span class="check-sort"><i class="fal fa-check"></i></span> Nổi bật nhất</span>
        <span><span class="check-sort"></span> Bán chạy nhất</span>
        <span><span class="check-sort"></span> Giá cao đến thấp</span>
        <span><span class="check-sort"></span> Giá thấp đến cao</span>
      </div>
    </div>
  </div>
  <div class="home-product">
    <!-- Lấy 2 sản phẩm laptop nổi bật có image_hot -->
    @php
      $index = 0;
    @endphp 
    @foreach ($items as $key => $item)
      @if ($key == 0 || $key == 3)
        <div class="feature">
          <a href="" class="large" >
          {{-- Cach 2
              <a href="{{ route($item_hots[$index]->category->slug.'.detail', $item_hots[$index]->slug) }}" class="large">
            --}}
            <img src="{{ asset('images/products'.$item_hots[$index]->image_hot) }}" alt="" width="600" height="275">
            <h3>{{ $item_hots[$index]->name }}</h3>
            <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
            <div class="product-price">
              @if ($item_hots[$index]->discount != 0)
                <strong>{{ number_format(round($item_hots[$index]->price - $item_hots[$index]->price * $item_hots[$index]->discount/100,-4), 0, ",", "." ) }} ₫</strong>
                <span>{{ number_format($item_hots[$index]->price, 0, ",", ".") }}₫</span>
                  <i>-{{ $item_hots[$index]->discount }}%</i>
              @else
                <strong>{{ number_format($item_hots[$index]->price,0,",", ".")  }}</strong>
              @endif                    
            </div>
            <div class="product-promo noimage">
              @if(!empty($item_hots[$index]->gift) && is_numeric($item_hots[$index]->gift))
                <p>Giảm thêm <b>{{ number_format($item_hots[$index]->gift, 0,",",".") }}₫</b></p>
              @endif
            </div>
            <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
            <label class="installment">Trả góp 0%</label>
            <!-- <label class="discount">GIẢM 45.000₫</label> -->
            <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
          </a>
        </div>
        @php
          $index++;
        @endphp
      @endif
          <div>
            <a href="" class="laptop large" >
            {{-- Cach 2
                <a href="{{ route($item->category->slug.'.detail', $item->slug) }}" class="laptop large">
              --}}
              <img src="{{ asset('images/products'.$item->avatar) }}" alt="" width="180" height="180">
              <h3>{{ $item->name }}</h3>
              <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
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
                <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
              </div>
              <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
              <label class="installment">Trả góp 0%</label>
              <!-- <label class="discount">GIẢM 45.000₫</label> -->
              @if (!empty($item->icon))
                <img class="icon-imgNew cate1 lazyload" data-src="{{ asset('images/icons'.$item->icon) }}" alt="" loading="lazy" >
              @endif
            </a>
          </div>
    @endforeach  
  </div>
  <div class="show-more">
    <label for="">Xem thêm 125 laptop<i class="fa fa-caret-down"></i></label>
  </div>
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
  </div>
  {{-- Slogan --}}
  @include('frontend.mobiles.slogan')
@endsection