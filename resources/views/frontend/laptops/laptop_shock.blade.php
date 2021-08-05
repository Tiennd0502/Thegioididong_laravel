<div class="laptop-shock">
  <div class="owl-carousel home-promo owl-theme" id="owl-laptop">
    @foreach ($item_discounts as $product) 
        <div class="item">
          <a href="" class="laptop large" >
          {{-- Cach 2
              <a href="{{ route($product->category->slug.'.detail', $product->slug) }}" class="laptop large">
            --}}
            <img src="{{ asset('images/products'.$product->avatar) }}" alt="" width="180" height="180">
            <div class="product-props">
              <span class="dotted ">RAM {{ 'ram'  }}</span>
              <span class="dotted ">Ổ CỨNG {{ 'oor cungx'  }}</span>
            </div>
            <h3>{{ $product->name }}</h3>
            <div class="product-price">
              <strong>{{ number_format(round($product->price - $product->price * $product->discount / 100, -4),0,",", ".")   }}₫</strong>
              <span>{{ number_format($product->price,0,",",".")  }}₫</span>
              <i>-{{ $product->discount  }}%</i>                      
            </div>
            <div class="product-promo noimage">
              @if(!empty($product->gift) && is_numeric($product->gift))
                  <p>Giảm thêm <b>{{ number_format($product->gift, 0,",",".") }}₫</b></p>
              @endif
              <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
            </div>
            <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
            <label class="installment">Trả góp 0%</label>
            <!-- <label class="discount">GIẢM 45.000₫</label> -->
            @if(!empty($product->icon))
              <img class="icon-imgNew cate2" src="{{ asset('images/icons'.$product->icon)  }}" alt="">
            @endif
          </a>
        </div>
    @endforeach
  </div>
</div>