<div class="navigat">
  <h2>Đồng hồ thông minh</h2>
  <div class="view-all">
    <a href="" title="">Apple</a>
    <a href="" title="">Samsung</a>
    <a href="" title="">Huawei</a>
    <a href="" title="">Xiaomi</a>
    <a href="" title="">Oppo</a>
    <a href="" title="">Xem tất cả <b>75</b> đồng hồ thông minh</a>
  </div>
</div>
<div class="">
  <div class="owl-carousel home-promo h-auto swatch owl-theme" >
    @foreach ($swatchs as $item)
      <div class="item">
        <a href="{{ route('home.product.detail', [$item->category->slug, $item->slug])}}" class="">
          {{-- Cach 2
              <a href="{{ route($item->category->slug.'.detail', $item->slug) }}" class="">
            --}}
          <img class="lazyload" loading="lazy" data-src="{{ asset('images/products'.$item->avatar) }}" alt="" width="180" height="180" >
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
            <!-- <p>Quà <b>100.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <!-- <label class="discount">GIẢM 49.000₫</label> -->
          @if (!empty($item->icon))
            <img class="icon-imgNew cate1 lazyload" data-src="{{ asset('images/icons'.$item->icon) }}" alt="" loading="lazy" >
          @endif
        </a>
      </div>
    @endforeach
  </div>
</div>