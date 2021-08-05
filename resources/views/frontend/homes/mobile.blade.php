<div class="navigat">
  <h2>Điện thoại nỗi bật nhất</h2>
  <div class="view-all">
    <a href="" title="">Điện thoại độc quyền</a>
    <a href="" title="">Điện thoại Samsung</a>
    <a href="" title="">iPhone 11 Pro Max</a>
    <a href="" title="">OPPO Reno3</a>
    <a href="" title="">Redmi 9</a>
    <a href="" title="">Xem tất cả <b>30</b> điện thoại</a>
  </div>
</div>
<div class="home-product">
  <!-- Lấy 2 sản phẩm điện thoại nổi bật có image_hot -->
  @php
      $index = 0;
  @endphp  
  @foreach ($mobiles as $key => $item)
      @if ($key == 0 || $key == 3)
        <div class="feature">
          <a href="" class="large">
          {{-- Cach 2
             <a href="{{ route($mobile_hots[$index]->category->slug.'.detail', $mobile_hots[$index]->slug) }}" class="large">
           --}}
            <img data-src="{{ asset('images/products'.$mobile_hots[$index]->image_hot) }}" alt="" width="600" height="275" class="lazyload" loading="lazy" >
            <h3>{{ $mobile_hots[$index]->name }}</h3>
            <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
            <div class="product-price">
              @if ($mobile_hots[$index]->discount != 0)
                <strong>{{ number_format(round($mobile_hots[$index]->price - $mobile_hots[$index]->price * $mobile_hots[$index]->discount/100,-4), 0, ",", "." ) }}₫</strong>
                <span>{{ number_format($mobile_hots[$index]->price, 0, ",", ".") }}₫</span>
                  <i>-{{ $mobile_hots[$index]->discount }}%</i>
              @else
                <strong>{{ number_format($mobile_hots[$index]->price,0,",", ".") }}₫</strong>
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
            @if (!empty($mobile_hots[$index]->icon))
              <img class="icon-imgNew cate1 lazyload" data-src="{{ asset('images/icons'.$mobile_hots[$index]->icon) }}" alt="" loading="lazy" >
            @endif
          </a>
        </div>
        @php
            $index++;
        @endphp
      @endif
      <div>
        <a href="" class="large">
          {{-- Cach 2
             <a href="{{ route($mobile_hots[$index]->category->slug.'.detail', $mobile_hots[$index]->slug) }}" class="large">
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