<!-- fwatch -->
<div class="box-watches watch man wag">
  <div class="man-heading">
    <div>
      <h2>Đồng hồ thời trang</h2>
      <a href="">Xem tất cả <i class="far fa-chevron-right"></i></a>
    </div>
    <img class="lazyload" loading="lazy" data-src="{{asset('images/banner-fashionwatch-min.png')}}" alt="">
  </div>
  <div class="content-watches">

    <div class="tabs">
      <div class="tabs-link">
        <span class="current">Nam</span>
        <span >Nữ</span>
        <span >Cặp</span>
        <span >Trẻ em</span>
      </div>
      <div class="tabs-link">
        <a href="">Xem thêm <b>Đồng hồ thời trang nam</b><i class="far fa-chevron-right"></i></a>
      </div>
    </div>

    <div id="manpro" class="tab-content current">
      <div class="owl-carousel home-promo h-auto w-max owl-watch owl-theme" >
        @foreach ($f_watch_hots as $item)
          <div class="item">
            <a href="{{ route('home.product.detail', [$item->category->slug, $item->slug])}}" class="">
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
      <!-- ----------- -->
      <div class="owl-carousel home-promo h-auto w-max owl-watch owl-theme" style="display: none;">
        @for($i=0; $i < 4; $i++)
          <div class="item">
            <a href="" class="">
              <img class="lazyload" loading="lazy" data-src="{{asset('images/jacques-du-manoir-nro-23-nu-400x400.jpg')}}" alt="" width="180" height="180">
              <div class="product-props">
                <span class="dotted lower">36 mm</span>
              </div>
              <h3>Jacques du Manoir NRO.23 - Nữ</h3>
              <div class="product-price">
                <strong>2.116.000₫</strong>
                <span>5.290.000₫</span>
                <i>-20%</i>                      
              </div>
              <h6 class="text-promo">Online giá rẻ</h6>
              <div class="product-promo noimage">
                <!-- <p>Quà <b>100.000₫</b></p> -->
                <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
              </div>
              <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
              <!-- <label class="installment">Trả góp 0%</label> -->
              <!-- <label class="discount">GIẢM 49.000₫</label> -->
              <img class="icon-imgNew cate2" src="{{asset('images/icon-thuy-sy.png')}}" alt="">
            </a>
          </div>
          <div class="item">
            <a href="" class="">
              <img class="lazyload" loading="lazy" data-src="{{asset('images/elio-el003-01-nu-1-1-400x400.jpg') }}" alt="" width="180" height="180">
              <div class="product-props">
                <span class="dotted ">Pin</span>
                <span class="dotted lower">35.3 mm</span>
              </div>
              <h3>Elio EL003-01 - Nữ</h3>
              <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
              <div class="product-price">
                <strong>680.000₫</strong>
                <span>850.000₫</span>
                <i>-20%</i>                      
              </div>
              <div class="product-promo noimage">
                <!-- <p>Quà <b>100.000₫</b></p> -->
                <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
              </div>
              <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
              <!-- <label class="installment">Trả góp 0%</label> -->
              <!-- <label class="discount">GIẢM 49.000₫</label> -->
              <!-- <img class="icon-imgNew cate2" src="{{ asset('images/icon-thuy-sy.png') }}" alt=""> -->
            </a>
          </div>
        @endfor
      </div>
      <!-- -------------- -->
      <div class="owl-carousel home-promo h-auto owl-watch-couple owl-theme" style="display: none;">
        @for($i=0; $i < 4; $i++)
          <div class="item">
            <a href="" class="">
              <img class="lazyload" loading="lazy" data-src="{{ asset('images/casio-ltp-v006l-7budf-mtp-v006l-7budf-nam-nu-400x400.jpg') }}" alt="" width="180" height="180">
              <div class="product-props">
                <span class="dotted lower">25 mm</span>
                <span class="dotted lower">38 mm</span>
              </div>
              <h3>Casio LTP-V006L-7BUDF/MTP-V006L-7BUDF - Nam, Nữ</h3>
              <div class="product-price">
                <strong>1.240.000₫</strong>
                <span>1.552.000₫</span>
                <!-- <i>-20%</i>                       -->
              </div>
              <h6 class="text-promo"></h6>
              <div class="product-promo noimage">
                <!-- <p>Quà <b>100.000₫</b></p> -->
                <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
              </div>
              <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
              <!-- <label class="installment">Trả góp 0%</label> -->
              <!-- <label class="discount">GIẢM 49.000₫</label> -->
              <!-- <img class="icon-imgNew cate2" src="{{ asset('images/icon-thuy-sy.png') }}" alt=""> -->
            </a>
          </div>
          <div class="item">
            <a href="" class="">
              <img class="lazyload" loading="lazy" data-src="{{ asset('images/casio-ltp-v005d-2budf-mtp-v005d-2b1udf-nam-nu-1-400x400.jpg') }}" alt="" width="180" height="180">
              <div class="product-props">
                <span class="dotted lower">28.2 mm</span>
                <span class="dotted lower">40 mm</span>
              </div>
              <h3>Casio LTP-V005D-2BUDF/MTP-V005D-2B1UDF - Nam, Nữ</h3>
              <div class="product-price">
                <strong>954.000₫</strong>
                <span>1.458.000₫</span>
                <!-- <i>-20%</i>                       -->
              </div>
              <h6 class="text-promo"></h6>
              <div class="product-promo noimage">
                <!-- <p>Quà <b>100.000₫</b></p> -->
                <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
              </div>
              <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
              <!-- <label class="installment">Trả góp 0%</label> -->
              <!-- <label class="discount">GIẢM 49.000₫</label> -->
              <!-- <img class="icon-imgNew cate2" src="{{ asset('images/icon-thuy-sy.png') }}" alt=""> -->
            </a>
          </div>
          <div class="item">
            <a href="" class="">
              <img class="lazyload" loading="lazy" data-src="{{ asset('images/citizen-eu6090-54h-bi5070-57h-nam-nu-avatar-1-1-400x400.jpg') }}" alt="" width="180" height="180">
              <div class="product-props">
                <span class="dotted lower">28.1 mm</span>
                <span class="dotted lower">40.6 mm</span>
              </div>
              <h3>Citizen EU6090-54H/BI5070-57H - Nam, Nữ</h3>
              <div class="product-price">
                <strong>3.538.000₫</strong>
                <span>6.940.000₫</span>
                <!-- <i>-20%</i>                       -->
              </div>
              <h6 class="text-promo"></h6>
              <div class="product-promo noimage">
                <!-- <p>Quà <b>100.000₫</b></p> -->
                <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
              </div>
              <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
              <!-- <label class="installment">Trả góp 0%</label> -->
              <!-- <label class="discount">GIẢM 49.000₫</label> -->
              <!-- <img class="icon-imgNew cate2" src="{{ asset('images/icon-thuy-sy.png') }}" alt=""> -->
            </a>
          </div>
          @endfor
      </div>
    </div>
  </div>
</div>