<!-- Top 10 sản phẩm bán chạy nhất -->
<h3 class="heading-top">Top 10 sản phẩm bán chạy nhất</h3>
<div class="product-clock">
  <div class="navigat">
    <div class="tab-watch">
      <button type="button" data-tab="clock-man" class="links current">Đồng hồ thời trang</button>
      <button type="button" data-tab="clock-woman" class="links">Đồng hồ thông minh</button>
      <button type="button" data-tab="clock-chain" class="links">Dây đồng hồ</button>
    </div>
    <div class="view-all">
      <a href="" title="">Xem thêm <b>Đồng hồ thời trang</b><i class="far fa-chevron-right"></i></a> 
    </div>
  </div>
  <div id="clock-man" class="contents current">
    <div class="owl-carousel slide-product w-max home-promo h-auto owl-theme" >
      @foreach ($f_watch_hots as $item_hot) 
        <div class="item">
          <a href="{{ route('home.product.detail', [$item_hot->category->slug, $item_hot->slug])}}" class="">
            <img class="lazyload" loading="lazy" data-src="{{ asset('images/products'.$item_hot->avatar)}}" alt="" width="180" height="180" >
            <h3>{{$item_hot->name }}</h3>
            <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
            <div class="product-price">
              @if ($item_hot->discount != 0)
                <strong>{{ number_format(round($item_hot->price - $item_hot->price * $item_hot->discount/100,-4), 0, ",", "." ) }} ₫</strong>
                <span>{{ number_format($item_hot->price, 0, ",", ".") }}₫</span>
                  <i>-{{ $item_hot->discount }}%</i>
              @else
                <strong>{{ number_format($item_hot->price,0,",", ".")  }}</strong>
              @endif                      
            </div>
            <div class="product-promo noimage">
              <!-- <p>Quà <b>100.000₫</b></p> -->
              <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
            </div>
            <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
            <!-- <label class="installment">Trả góp 0%</label> -->
            <!-- <label class="discount">GIẢM 49.000₫</label> -->
            @if (!empty($item_hot->icon)) 
              <img class="icon-imgNew cate2 lazyload" loading="lazy" data-src="{{ asset('images/icons'.$item_hot->icon) }}" alt="" >
            @endif
          </a>
        </div>
      @endforeach
    </div>
  </div>
  <div id="clock-woman" class="contents">
    <div class="owl-carousel home-promo slide-product h-auto owl-theme" >
      @foreach ($s_watch_hots as $item_hot) 
        <div class="item">
          <a href="{{ route('home.product.detail', [$item_hot->category->slug, $item_hot->slug])}}" class="">
            <img class="lazyload" loading="lazy" data-src="{{ asset('images/products'.$item_hot->avatar)}}" alt="" width="180" height="180" >
            <h3>{{$item_hot->name }}</h3>
            <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
            <div class="product-price">
              @if ($item_hot->discount != 0)
                <strong>{{ number_format(round($item_hot->price - $item_hot->price * $item_hot->discount/100,-4), 0, ",", "." ) }} ₫</strong>
                <span>{{ number_format($item_hot->price, 0, ",", ".") }}₫</span>
                  <i>-{{ $item_hot->discount }}%</i>
              @else
                <strong>{{ number_format($item_hot->price,0,",", ".")  }}</strong>
              @endif                      
            </div>
            <div class="product-promo noimage">
              <!-- <p>Quà <b>100.000₫</b></p> -->
              <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
            </div>
            <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
            <!-- <label class="installment">Trả góp 0%</label> -->
            <!-- <label class="discount">GIẢM 49.000₫</label> -->
            @if (!empty($item_hot->icon)) 
              <img class="icon-imgNew cate2 lazyload" loading="lazy" data-src="{{ asset('images/icons'.$item_hot->icon) }}" alt="" >
            @endif
          </a>
        </div>
      @endforeach
    </div>
  </div>
  <div id="clock-chain" class="contents">
    <div class="owl-carousel home-promo slide-product h-auto owl-theme" >
      @foreach ($watch_chain_hots as $item_hot)
          <div class="item">
            <a href="{{ route('home.product.detail', [$item_hot->category->slug, $item_hot->slug])}}" class="">
              <img class="lazyload" loading="lazy" data-src="{{ asset('images/products'.$item_hot->avatar)}}" alt="" width="180" height="180" >
              <h3>{{$item_hot->name }}</h3>
              <div class="product-price">
                @if ($item_hot->discount != 0)
                  <strong>{{ number_format(round($item_hot->price - $item_hot->price * $item_hot->discount/100,-4), 0, ",", "." ) }} ₫</strong>
                  <span>{{ number_format($item_hot->price, 0, ",", ".") }}₫</span>
                    <i>-{{ $item_hot->discount }}%</i>
                @else
                  <strong>{{ number_format($item_hot->price,0,",", ".")  }}</strong>
                @endif                      
              </div>
              <div class="product-promo noimage"></div>
              @if (!empty($item_hot->icon)) 
                <img class="icon-imgNew cate2 lazyload" loading="lazy" data-src="{{ asset('images/icons'.$item_hot->icon) }}" alt="" >
              @endif
            </a>
          </div>
        @endforeach
    </div>
  </div>
</div>