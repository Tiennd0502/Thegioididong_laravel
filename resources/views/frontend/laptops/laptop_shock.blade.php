<div class="laptop-shock">
  <div class="owl-carousel home-promo owl-theme" id="owl-laptop">
    @foreach ($item_discounts as $item) 
      <div class="item">
        <a href="{{ route('home.product.detail', [$item->category->slug, $item->slug])}}" class="laptop large" >
        {{-- Cach 2
            <a href="{{ route($item->category->slug.'.detail', $item->slug) }}" class="laptop large">
          --}}
          <img src="{{ asset('images/products'.$item->avatar) }}" alt="" width="180" height="180">
          <div class="product-props">
            <span class="dotted ">RAM {{ 'ram'  }}</span>
            <span class="dotted ">Ổ CỨNG {{ 'oor cungx'  }}</span>
          </div>
          <h3>{{ $item->name }}</h3>
          <div class="product-price">
            <strong>{{ number_format(round($item->price - $item->price * $item->discount / 100, -4),0,",", ".")   }}₫</strong>
            <span>{{ number_format($item->price,0,",",".")  }}₫</span>
            <i>-{{ $item->discount  }}%</i>                      
          </div>
          <div class="product-promo noimage">
            @if(!empty($item->gift) && is_numeric($item->gift))
                <p>Giảm thêm <b>{{ number_format($item->gift, 0,",",".") }}₫</b></p>
            @endif
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 45.000₫</label> -->
          @if(!empty($item->icon))
            <img class="icon-imgNew cate2" src="{{ asset('images/icons'.$item->icon)  }}" alt="">
          @endif
        </a>
      </div>
    @endforeach
  </div>
</div>