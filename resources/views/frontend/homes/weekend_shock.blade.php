<div class="">
  <div id="owl-promo" class="owl-carousel home-promo weekend owl-theme">
    @foreach ($weekend_shock as $key => $item)
    <div class="item">
      <a href="{{ route('home.product.detail', [$item->category->slug, $item->slug])}}" class="{{($item->category_id ==2)? 'laptop ': ''}}large">
      {{-- Cach 2
        <a href="{{ route($item->category->slug.'.detail', $item->slug) }}" class="{{($item->category_id ==2)? 'laptop ': ''}}large"> 
      --}}
        <img @if($key > 5) class="lazyload" loading="lazy" data-src="{{ asset('images/products'.$item->avatar) }}" @else src="{{ asset('images/products'.$item->avatar) }}" @endif  alt="" width="180" height="180" >
        <h3 class="product-name">{{ $item->name }}</h3>
        <div class="product-price">
          @if ($item->discount != 0)
            <strong>{{ number_format(round($item->price - $item->price * $item->discount/100,-4), 0, ",", "." ) }}₫</strong>
            <span>{{ number_format($item->price, 0, ",", ".") }}₫</span>
              <i>-{{ $item->discount }}%</i>
          @else
            <strong>{{ number_format($item->price,0,",", ".")  }}</strong>
          @endif
        </div>
        <div class="product-promo noimage">
          @if (!empty($item->gift))
            <p>Giảm thêm <b>{{ number_format($item->gift, 0,",",".") }}₫</b></p>
          @endif
          <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
        </div>
        <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
        <!-- <label class="installment">Trả góp 0%</label> -->
        @if (!empty($item->discount))
          {{-- <label class="discount">GIẢM 45.000₫</label> --}}
        @endif
        <label class="discount">GIẢM 45.000₫</label>
        @if (!empty($item->icon))
          <img class="icon-imgNew cate1" src="{{ asset('images/icons'.$item->icon) }}" alt="" >
        @endif
      </a>
    </div>
    @endforeach
  </div>
</div>
