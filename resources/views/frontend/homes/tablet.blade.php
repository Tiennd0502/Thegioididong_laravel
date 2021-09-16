<div class="navigat">
  <h2>Tablet nỗi bật nhất</h2>
  <div class="view-all">
    <a href="" title="">Máy tính bảng iPad</a>
    <a href="" title="">Máy tính bảng Samsung</a>
    <a href="" title="">iPad 10.2 inch</a>
    <a href="" title="">Samsung Galaxy Tab S6 Lite</a>
    <a href="" title="">Lenovo Tab E10</a>
    <a href="tablet" title="">Xem tất cả <b>27</b> tablet</a>
  </div>
</div>
<div class="home-product">
  @foreach ($tablets as $key=> $item)
    @if($key == 0)
      <div class="feature">
        <a href="{{ route('home.product.detail', [$tablet_hot->category->slug, $tablet_hot->slug])}}" class="large">
        {{-- Cach 2
            <a href="{{ route($tablet_hot->category->slug.'.detail', $tablet_hot->slug) }}" class="large">
          --}}
          <img class="lazyload" loading="lazy" data-src="{{ asset('images/products'.$tablet_hot->image_hot) }}" alt="" width="600" height="275">
          <h3 style="white-space: nowrap;">{{ $tablet_hot->name }}</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            @if ($tablet_hot->discount != 0)
              <strong>{{ number_format(round($tablet_hot->price - $tablet_hot->price * $tablet_hot->discount/100,-4), 0, ",", "." ) }}₫</strong>
              <span>{{ number_format($tablet_hot->price, 0, ",", ".") }}₫</span>
                <i>-{{ $tablet_hot->discount }}%</i>
            @else
              <strong>{{ number_format($tablet_hot->price,0,",", ".")  }}₫</strong>
            @endif
          </div>
          <div class="product-promo noimage">
            @if (!empty($tablet_hot->gift))
              <p>Giảm thêm <b>{{ number_format($tablet_hot->gift, 0,",",".") }}₫</b></p>
            @endif
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 45.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
          @if (!empty($tablet_hot->icon))
            <img class="icon-imgNew cate1 lazyload" data-src="{{ asset('images/icons'.$tablet_hot->icon) }}" alt="" loading="lazy" >
          @endif
        </a>
      </div>
    @endif
    <div class="">
      <a href="{{ route('home.product.detail', [$item->category->slug, $item->slug])}}" class="large">
      {{-- Cach 2
          <a href="{{ route($item->category->slug.'.detail', $item->slug) }}" class="large">
        --}}
        <img class="lazyload" loading="lazy" data-src="{{ asset('images/products'.$item->avatar) }}" alt="" width="600" height="275">
        <h3 class="product-name">{{ $item->name }}</h3>
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
        </div>
        <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
        <label class="installment">Trả góp 0%</label>
        <!-- <label class="discount">GIẢM 45.000₫</label> -->
        <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        @if (!empty($item->icon))
          <img class="icon-imgNew cate1 lazyload" data-src="{{ asset('images/icons'.$item->icon) }}" alt="" loading="lazy" >
        @endif
      </a>
    </div>
  @endforeach
</div>