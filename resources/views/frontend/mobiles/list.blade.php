<div class="home-product" id="list-mobile">
    @foreach ($items as $key => $item)
      @if ($key == 0 || $key == 3)
        <div class="feature">
          <a href="{{ route('home.product.detail', [$item_hots[$key == 0 ? 0 : 1]->category->slug, $item_hots[$key == 0 ? 0 : 1]->slug])}}" class="large" data-slug="{{$item_hots[$key == 0 ? 0 : 1]->slug}}">
          {{-- Cach 2
              <a href="{{ route('dien-thoai.detail', $item_hots[$key == 0 ? 0 : 1]->slug) }}" class="large" data-slug="{{$item_hots[$key == 0 ? 0 : 1]->slug}}">
            --}}
          
            <img data-src="{{ asset('images/products'.$item_hots[$key == 0 ? 0 : 1]->image_hot) }}" alt="" width="600" height="275" class="lazyload" loading="lazy" >
            <h3>{{ $item_hots[$key == 0 ? 0 : 1]->name }}</h3>
            <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
            <div class="product-price">
              @if ($item_hots[$key == 0 ? 0 : 1]->discount != 0)
                <strong>{{ number_format(round($item_hots[$key == 0 ? 0 : 1]->price - $item_hots[$key == 0 ? 0 : 1]->price * $item_hots[$key == 0 ? 0 : 1]->discount/100,-4), 0, ",", "." ) }}₫</strong>
                <span>{{ number_format($item_hots[$key == 0 ? 0 : 1]->price, 0, ",", ".") }}₫</span>
                  <i>-{{ $item_hots[$key == 0 ? 0 : 1]->discount }}%</i>
              @else
                <strong>{{ number_format($item_hots[$key == 0 ? 0 : 1]->price,0,",", ".")  }}₫</strong>
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
            {{-- @if (!empty($item_hots[$key == 0 ? 0 : 1]->icon))
              <img class="icon-imgNew cate1 lazyload" data-src="{{ asset('images/icons'.$item_hots[$key == 0 ? 0 : 1]->icon) }}" alt="" loading="lazy" >
            @endif --}}
          </a>
        </div>
      @endif
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