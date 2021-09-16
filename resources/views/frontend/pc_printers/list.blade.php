<div class="home-product" id="list-mobile"> 
  @foreach ($items as $key => $item)
    <div>
      <a href="{{ route('home.product.detail', [$item->category->slug, $item->slug])}}" class="large">
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
        <div class="rating-result">
          <i class="fas fa-star voted"></i>
          <i class="fas fa-star voted"></i>
          <i class="fas fa-star voted"></i>
          <i class="fas fa-star "></i>
          <i class="fas fa-star "></i>
          <span>9 đánh giá</span>
        </div>
        <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
        <!-- <label class="installment">Trả góp 0%</label> -->
        {{-- <label class="discount">GIẢM 45.000₫</label> --}}
        @if (!empty($item->icon))
          <img class="icon-imgNew cate1 lazyload" data-src="{{ asset('images/icons'.$item->icon) }}" alt="" loading="lazy" >
        @endif
      </a>
    </div>
  @endforeach
</div>