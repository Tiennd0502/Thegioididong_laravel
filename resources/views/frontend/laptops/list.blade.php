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
  @foreach ($items as $key => $item)
    @if ($key == 0 || $key == 3)
      <div class="feature">
        <a href="{{ route('home.product.detail', [$item_hots[$key == 0 ? 0 : 1]->category->slug, $item_hots[$key == 0 ? 0 : 1]->slug])}}" class="large" >
        {{-- Cach 2
            <a href="{{ route($item_hots[$key == 0 ? 0 : 1]->category->slug.'.detail', $item_hots[$key == 0 ? 0 : 1]->slug) }}" class="large">
          --}}
          <img src="{{ asset('images/products'.$item_hots[$key == 0 ? 0 : 1]->image_hot) }}" alt="" width="600" height="275">
          <h3>{{ $item_hots[$key == 0 ? 0 : 1]->name }}</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            @if ($item_hots[$key == 0 ? 0 : 1]->discount != 0)
              <strong>{{ number_format(round($item_hots[$key == 0 ? 0 : 1]->price - $item_hots[$key == 0 ? 0 : 1]->price * $item_hots[$key == 0 ? 0 : 1]->discount/100,-4), 0, ",", "." ) }} ₫</strong>
              <span>{{ number_format($item_hots[$key == 0 ? 0 : 1]->price, 0, ",", ".") }}₫</span>
                <i>-{{ $item_hots[$key == 0 ? 0 : 1]->discount }}%</i>
            @else
              <strong>{{ number_format($item_hots[$key == 0 ? 0 : 1]->price,0,",", ".")  }}</strong>
            @endif                    
          </div>
          <div class="product-promo noimage">
            @if(!empty($item_hots[$key == 0 ? 0 : 1]->gift) && is_numeric($item_hots[$key == 0 ? 0 : 1]->gift))
              <p>Giảm thêm <b>{{ number_format($item_hots[$key == 0 ? 0 : 1]->gift, 0,",",".") }}₫</b></p>
            @endif
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 45.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
    @endif
    <div>
      <a href="{{ route('home.product.detail', [$item->category->slug, $item->slug])}}" class="laptop large" >
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