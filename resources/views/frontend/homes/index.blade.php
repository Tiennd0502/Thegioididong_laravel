@extends('frontend.master')
@section('title','Thegioididong.com')
@section('content')
  {{-- slider --}}
  <section>
    @include('frontend.homes.slider')
    <!-- postsbanner -->
  </section>
  {{-- // slider --}}
  <div class="promot-banner">
    <a href=""><img src="{{ asset('images/banner/1200-75-1200x75-2.png') }}" alt="" width="1200" height="75"></a>
  </div>
  {{-- weekend shock --}}
  @include('frontend.homes.weekend_shock')
  {{-- // weekend shock --}}

  {{-- mobile hot --}}
  @include('frontend.homes.mobile')
  {{-- // mobile hot --}}

  {{-- laptop hot --}}
  @include('frontend.homes.laptop')
  {{-- // laptop hot --}}

  {{-- tablet hot --}}
  @include('frontend.homes.tablet')
  {{-- // tablet hot --}}

  <!-- Phụ kiện giá rẻ -->
  <div class="navigat">
    <h2>Phụ kiện giá rẻ</h2>
    <div class="view-all">
      <a href="" title="">Pin sạc dự phòng</a>
      <a href="" title="">Cáp sạc</a>
      <a href="" title="">Tai nghe</a>
      <a href="" title="">Loa</a>
      <a href="" title="">Thẻ nhớ</a>
      <a href="" title="">Phụ kiện chính hãng</a>
      <a href="" title="">Ốp lưng điện thoại</a>
      <a href="" title="">Xem tất cả <b>3.529</b> phụ kiện</a>
    </div>
  </div>
  <div class="">
    <div class="owl-carousel home-promo acc h-auto owl-theme" >
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/hydrus-pj-jp196-ava-600x600.jpg')}}" alt="" width="180" height="180" >
          <h3>Hydrus PJ JP196</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>455.000₫</strong>
            <span>650.000₫</span>
            <i>-7%</i>                      
          </div>
          <div class="product-promo noimage">
            <!-- <p>Giảm thêm <b>500.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <label class="discount">GIẢM 49.000₫</label>
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/sac-du-phong-polymer-10000mah-qc-3-evalu-pa-f1-air-avatar-1-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>eValu PA F1 Air</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>51.000₫</strong>
            <span>100.000₫</span>
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Giảm thêm <b>500.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <label class="discount">GIẢM 49.000₫</label>
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/229958-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe Bluetooth Roman R552X Xanh</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>150.000₫</strong>
            <!-- <span>650.000₫</span>
            <i>-7%</i> -->                      
          </div>
          <div class="product-promo noimage">
            <!-- <p>Giảm thêm <b>500.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <!-- <label class="discount">GIẢM 49.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/hydrus-pj-jp196-ava-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Pin sạc dự phòng Polymer 10.000 mAh QC 3.0 eValu PA F1 Air Nhôm Bạc</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>455.000₫</strong>
            <span>650.000₫</span>
            <i>-7%</i>                      
          </div>
          <div class="product-promo noimage">
            <!-- <p>Giảm thêm <b>500.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <label class="discount">GIẢM 49.000₫</label>
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/sac-du-phong-polymer-10000mah-qc-3-evalu-pa-f1-air-avatar-1-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Cáp Micro 1m eValu LTM -01</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>51.000₫</strong>
            <span>100.000₫</span>
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Giảm thêm <b>500.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <label class="discount">GIẢM 49.000₫</label>
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/229958-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe Bluetooth Roman R552X Xanh</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>150.000₫</strong>
            <!-- <span>650.000₫</span>
            <i>-7%</i> -->                      
          </div>
          <div class="product-promo noimage">
            <!-- <p>Giảm thêm <b>500.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <!-- <label class="discount">GIẢM 49.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/sac-du-phong-polymer-10000mah-qc-3-evalu-pa-f1-air-avatar-1-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Cáp Micro 1m eValu LTM -01</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>51.000₫</strong>
            <span>100.000₫</span>
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Giảm thêm <b>500.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <label class="discount">GIẢM 49.000₫</label>
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/229958-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe Bluetooth Roman R552X Xanh</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>150.000₫</strong>
            <!-- <span>650.000₫</span>
            <i>-7%</i> -->                      
          </div>
          <div class="product-promo noimage">
            <!-- <p>Giảm thêm <b>500.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <!-- <label class="discount">GIẢM 49.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
    </div>
  </div>
  <!-- Phụ kiện chính hãng -->
  <div class="navigat">
    <h2>Phụ kiện chính hãng</h2>
    <div class="view-all">
      <a href="" title="">Xem tất cả <b>409</b> phụ kiện chính hãng</a>
    </div>
  </div>
  <div class="">
    <div class="owl-carousel home-promo acc h-auto owl-theme" >
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/chup-tai-gaming-rapoo-vh160-14-600x600.jpg')}}" alt="" width="180" height="180" >
          <h3>Tai nghe AirPods Pro sạc không dây Apple MWP22</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>6.990.000₫</strong>
            <!-- <span>650.000₫</span>
            <i>-7%</i> -->                      
          </div>
          <div class="product-promo noimage">
            <p>Quà <b>100.000₫</b></p>
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 49.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/ep-gaming-rapoo-vm150-den-do-ava-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe AirPods 2 sạc không dây Apple MRXJ2</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>4.990.000₫</strong>
            <span>5.900.000₫</span>
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Quà <b>100.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <label class="discount">GIẢM 1.000.000₫</label>
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/bluetooth-true-wireless-galaxy-buds-pro-bac-ava-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe Bluetooth True Wireless JBL LIVE 300TWS</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>3.990.000₫</strong>
            <!-- <span>5.900.000₫</span> -->
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Quà <b>100.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 1.000.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/chup-tai-gaming-rapoo-vh160-14-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe AirPods Pro sạc không dây Apple MWP22</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>6.990.000₫</strong>
            <!-- <span>650.000₫</span>
            <i>-7%</i> -->                      
          </div>
          <div class="product-promo noimage">
            <p>Quà <b>100.000₫</b></p>
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 49.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/ep-gaming-rapoo-vm150-den-do-ava-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe AirPods 2 sạc không dây Apple MRXJ2</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>4.990.000₫</strong>
            <span>5.900.000₫</span>
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Quà <b>100.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <label class="discount">GIẢM 1.000.000₫</label>
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/bluetooth-true-wireless-galaxy-buds-pro-bac-ava-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe Bluetooth True Wireless JBL LIVE 300TWS</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>3.990.000₫</strong>
            <!-- <span>5.900.000₫</span> -->
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Quà <b>100.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 1.000.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/chup-tai-gaming-rapoo-vh160-14-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe AirPods Pro sạc không dây Apple MWP22</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>6.990.000₫</strong>
            <!-- <span>650.000₫</span>
            <i>-7%</i> -->                      
          </div>
          <div class="product-promo noimage">
            <p>Quà <b>100.000₫</b></p>
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 49.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/ep-gaming-rapoo-vm150-den-do-ava-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe AirPods 2 sạc không dây Apple MRXJ2</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>4.990.000₫</strong>
            <span>5.900.000₫</span>
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Quà <b>100.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <label class="discount">GIẢM 1.000.000₫</label>
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/bluetooth-true-wireless-galaxy-buds-pro-bac-ava-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe Bluetooth True Wireless JBL LIVE 300TWS</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>3.990.000₫</strong>
            <!-- <span>5.900.000₫</span> -->
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Quà <b>100.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 1.000.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/chup-tai-gaming-rapoo-vh160-14-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe AirPods Pro sạc không dây Apple MWP22</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>6.990.000₫</strong>
            <!-- <span>650.000₫</span>
            <i>-7%</i> -->                      
          </div>
          <div class="product-promo noimage">
            <p>Quà <b>100.000₫</b></p>
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 49.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/ep-gaming-rapoo-vm150-den-do-ava-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe AirPods 2 sạc không dây Apple MRXJ2</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>4.990.000₫</strong>
            <span>5.900.000₫</span>
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Quà <b>100.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <!-- <label class="installment">Trả góp 0%</label> -->
          <label class="discount">GIẢM 1.000.000₫</label>
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
      <div class="item">
        <a href="" class="">
          <img src="{{ asset('images/accessories/bluetooth-true-wireless-galaxy-buds-pro-bac-ava-600x600.jpg')}}" alt="" width="180" height="180">
          <h3>Tai nghe Bluetooth True Wireless JBL LIVE 300TWS</h3>
          <!-- <h6 class="text-promo">Hàng sắp về</h6> -->
          <div class="product-price">
            <strong>3.990.000₫</strong>
            <!-- <span>5.900.000₫</span> -->
            <!-- <i>-7%</i>                       -->
          </div>
          <div class="product-promo noimage">
            <!-- <p>Quà <b>100.000₫</b></p> -->
            <!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
          </div>
          <!-- <label class="preorder">Đặt trước đến 24/09</label> -->
          <label class="installment">Trả góp 0%</label>
          <!-- <label class="discount">GIẢM 1.000.000₫</label> -->
          <!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
        </a>
      </div>
    </div>
  </div>

  {{-- s_watch hot --}}
  @include('frontend.homes.s_watch')
  {{-- // s_watch hot --}}

  {{-- f_watch hot --}}
  @include('frontend.homes.f_watch')
  {{-- // f_watch hot --}}
  
  <!-- Máy cũ nỗi bật -->
  @include('frontend.homes.second_hand')
</div>


@endsection