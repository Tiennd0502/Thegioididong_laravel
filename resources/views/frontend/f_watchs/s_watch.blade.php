<!-- bộ sưu tập đồng hồ thông minh -->
<div class="box-watches watch women wag">
  <div class="man-heading">
    <div>
      <h2>Đồng hồ thông minh</h2>
      <a href="">Xem tất cả <i class="far fa-chevron-right"></i></a>
    </div>
    <img class="lazyload" loading="lazy" data-src="{{asset('images/banner-smartwatch-min.png')}}" alt="">
  </div>
  <div class="content-watches">
    <div class="tabs">
      <div class="tabs-link">
        <span class="current">Apple</span>
        <span>Samsung</span>
        <span>Xiaomi</span>
        <span>Huawei</span>
        <span>Zeblaze</span>
      </div>
      <div class="tabs-link">
        <a href="">Xem thêm <b>Đồng hồ thời trang nam</b><i class="far fa-chevron-right"></i></a>
      </div>
    </div>
    <div id="girlpro" class="tab-content current">
      <div class="owl-carousel home-promo h-auto owl-watch owl-theme" >
        @foreach ($s_watch_hots as $item)
          <div class="item">
            <a href="" class="">
              <img class="lazyload" loading="lazy" data-src="{{ asset('images/products'.$item->avatar)}}" alt="" width="180" height="180">
              <h3>{{$item->name }}</h3>
              <div class="product-price">
                @if ($item->discount != 0)
                  <strong>{{ number_format(round($item->price - $item->price * $item->discount/100,-4), 0, ",", "." ) }} ₫</strong>
                  <span>{{ number_format($item->price, 0, ",", ".") }}₫</span>
                    <i>-{{ $item->discount }}%</i>
                @else
                  <strong>{{ number_format($item->price,0,",", ".")  }}</strong>
                @endif                     
              </div>
              <div class="product-promo noimage">
              </div>
              @if (!empty($item->icon)) 
                <img class="icon-imgNew cate2 lazyload" loading="lazy" data-src="{{ asset('images/icons'.$item->icon) }}" alt="" >
              @endif
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>