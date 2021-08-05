@extends('frontend.master')
@section('title','Giỏ hàng | Thegioididong.com')
@section('content')
  <section id ="container-cart">
    <div class="bar-top">
      <a href="home"><i class="fal fa-chevron-left"></i>Mua thêm sản phẩm khác</a>
      <p>Giỏ hàng của bạn</p>
    </div>
    <div class="container-cart">
      <form method="POST" id="js-form-order" autocomplete="off">
        @if(count(session()->get('cart')) > 1)
          <label class="error-color">Dịch vụ mang thêm màu khác và sản phẩm để tham khảo chỉ áp dụng khi đặt mua duy nhất 1 sản phẩm.</label>
        @endif
        <div class="list-order">
          @php 
            $total = 0;
            $discount = 0; 
          @endphp
          @foreach (session()->get('cart') as $key => $item)
            <div class="order-item" id="js-order-item{{$key}}">
              <div class="">
                <a href="{{route($item["category_slug"].'.detail',$item["slug"])}}"><img src="{{ asset('images/products'.$item["avatar"]) }}" alt="">
                </a>
                <a href="#" class="delete js-delete" data-id= "{{$key}}" data-url="{{ route('delete-cart',$key) }}"><i class="fas fa-times-circle"></i>Xóa </a>
              </div>
              <div class="prd-infor">
                <div>
                  <a href="{{route($item["category_slug"].'.detail',$item["slug"])}}">{{$item["name"]}}</a>
                  <strong>{{ number_format($item["price"],0,",", ".") }}₫</strong>
                </div>
                <div class="promotion">
                  @if ($item["discount"] != 0) 
                      <span>Giảm giá {{ number_format(round($item["price"] * $item["discount"] / 100, -4),0,",", ".") }}đ</span>
                  @endif
                  <span>Phụ kiện mua kèm giảm 20% (không áp dụng phụ kiện hãng, không áp dụng đồng thời KM khác)</span>
                  <span>Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)<a href="">(click xem chi tiết)</a></span>
                </div>
                @if ($item["discount"] != 0) 
                  <div><span>Giảm 
                    <strong >{{number_format(round($item["price"] * $item["discount"] / 100, -4),0,",", ".") }}₫</strong>
                    còn 
                    <strong>{{number_format(round($item["price"] - $item["price"] * $item["discount"] / 100, -4),0,",", ".")  }}₫</strong>
                    </span>
                  </div>
                @endif
                
                <div class="" style="display: flex;justify-content: space-between;align-items: center">
                  <div class="choose-color">
                    <span class="js-cart-color">Màu: Đen <i class="fas fa-caret-down"></i></span>
                    <div class="content-choose">
                      <div class="choose-color-item js-color-item">
                        <img src="{{ asset('images/oppo-reno3-den-200x200-1-180x125.png') }}" alt="">
                        <span>Đen</span>
                      </div>
                      <div class="choose-color-item js-color-item">
                        <img src="{{ asset('images/oppo-reno3-den-200x200-1-180x125.png') }}" alt="">
                        <span>Trắng</span>
                      </div>
                      <div class="choose-color-item js-color-item">
                        <img src="{{ asset('images/oppo-reno3-den-200x200-1-180x125.png') }}" alt="">
                        <span>Xanh Dương</span>
                      </div>
                    </div>
                  </div>
                  <div class="choose-number">
                    <div class="abate js-change-quantity @if($item["quantity"] > 1) active @endif " data-change="abate" data-id="{{ $key }}" data-url="{{ route('updated-cart',[$key, 'abate'])}}"></div>
                    <div class="number" id="js-quantity{{ $key }}">{{ $item["quantity"] }}</div>
                    <div class="augment js-change-quantity @if($item["quantity"] < 5) active @endif " data-change="augment" data-id="{{ $key }}" data-url="{{ route('updated-cart',[$key, 'augment'])}}"></div>
                  </div>
                </div>
                <div class="barpage-item" style="margin-top: 10px;">
                  <label class="barpage-title">Mang nhiều màu để bạn lựa chọn
                    <input type="checkbox" class="js-show-vipservices">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div style="display: none">
                  <div class="addmore">
                    <p>Chọn màu sản phẩm (không mua không sao)</p>
                    <div class="theme">
                      <div class="option">
                        <div><img src="./images/oppo-reno3-den-200x200-1-180x125.png"></div>
                        <div class="barpage-item">
                          <label class="barpage-title">Đen
                            <input type="checkbox" class="js-chosse-color">
                            <span class="checkmark"></span>
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @php 
              $total +=  $item["price"] * $item["quantity"] ;
              $discount += round($item["price"] * $item["discount"] / 100, -4) * $item["quantity"] ; 
            @endphp
          @endforeach
        </div>
        
        <div class="area-total">
          <div >
            <span>Tổng tiền: </span>
            <span id="js-total" class="total" >{{ number_format($total,0,",", ".") }}₫</span>
          </div>
          @if ($discount != 0) 
              <div>
                <span>Giảm: </span>
                <span id="js-discount" class="all-discount">- {{number_format($discount,0,",", ".")}} ₫</span>
              </div>
          @endif
          <div>
            <span><b>Cần thanh toán: </b></span>
            <strong id="js-total-payment">{{ number_format($total - $discount,0,",", ".") }}₫</strong>
          </div>
          <div class="coupon-code">
            <div class="text-code js-text-code" id="js-text-code">Sử dụng mã giảm giá
            </div>
            <div class="input-code js-input-code" style="display: none">
              <input type="text" name="" placeholder="Nhập mã giảm giá">
              <span class="btn">Áp dụng</span>
            </div>
          </div>
        </div>
        <div class="infor-user">
          <div class="checkradio">
            <div class="barpage-item">
              <label class="barpage-title">Anh
                <input type="radio" name="gender" checked="">
                <span class="checkmark"></span>
              </label>
            </div>
            <div class="barpage-item">
              <label class="barpage-title">Chị
                <input type="radio" name="gender">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div class="custom-info">
            <div class="info-item">
              <input type="text" name="name" id="js-customer-name" placeholder="Họ và tên" >
              <span class="text-error"></span>
            </div>
            <div class="info-item">
              <input type="tel" name="phone" id="js-customer-phone" maxlength="10" placeholder="Số điện thoại">
              <span class="text-error"></span>
            </div>
            <div class="info-item w-100">
              <input type="email" name="email" id="js-customer-email" placeholder="Email của bạn">
              <span class="text-error"></span>
            </div>
            <div class="info-item w-100">
              <input type="text" name="note" placeholder="Yêu cầu khác (không bắt buộc)">
            </div>
          </div>
          <div class="area-orther">
            <div><b>Để được phục vụ nhanh hơn,</b> hãy chọn thêm:</div>
            <div class="checkradio">
              <div class="barpage-item">
                <label class="barpage-title">Địa chỉ giao hàng
                  <input type="radio" name='address_ship' data-name="delivery-address" checked="" class="js-change-address">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="barpage-item">
                <label class="barpage-title">Nhận tại siêu thị
                  <input type="radio"  name='address_ship' data-name="received-market" class="js-change-address">
                  <span class="checkmark"></span>
                </label>
              </div>
            </div>
            <div class="area-address js-delivery-address" >
              <div class="address-list">
                <div class="address-item">
                  <select id="js-province" name="province" required="">
                    <option value="">Tỉnh / Thành phố</option>
                  </select>
                  <span class="text-error"></span>
                </div>
                <div class="address-item">
                  <select id="js-district" name="district" required="">
                    <option value="">Quận / Huyện</option>
                  </select>
                  <span class="text-error"></span>
                </div>
                <div class="address-item">
                  <select id="js-commune" name="commune" required="">
                    <option value="">Phường / Xã</option>
                  </select>
                  <span class="text-error"></span>
                </div>
                <div class="address-item">
                  <input type="text" name="address" id="js-delivery-address" placeholder="Số nhà, tên, đường">
                  <span class="text-error"></span>
                </div>
              </div>
              <div class="delivery-time">
                <div class="guide">
                  <b>Hướng dẫn:</b> Chọn địa chỉ để biết chính xác thời gian giao hàng
                </div>
              </div>
              <div class="barpage-item">
                <label class="barpage-title">Gọi người khác nhận hàng nếu có
                  <input type="checkbox" class="js-show-vipservices">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div style="display: none; margin-bottom: 10px;" >
                <div class="addmore">
                  <div class="checkradio">
                    <div class="barpage-item">
                      <label class="barpage-title">Anh
                        <input type="radio" name="ortherGender" checked="">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="barpage-item">
                      <label class="barpage-title">Chị
                        <input type="radio" name="ortherGender">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="area-info">
                    <input type="text" name="name_two" placeholder="Họ và tên người nhận">
                    <input type="text" name="phone_two" placeholder="Số điện thoại">
                  </div>
                </div>
              </div>
              <div class="barpage-item">
                <label class="barpage-title">Chuyển danh bạ, dữ liệu qua máy mới
                  <input type="checkbox" class="">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="barpage-item">
                <label class="barpage-title">Mang thêm điện thoại khác để bạn xem
                  <input type="checkbox" class="js-show-vipservices">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="bring-more">
                <input type="text" name="" placeholder="Nhập tên điện thoại bạn muốn xem">
              </div>
              <div class="barpage-item">
                <label class="barpage-title">Xuất hóa đơn công ty
                  <input type="checkbox" class="js-show-vipservices">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="bring-more">
                <input type="text" name="" placeholder="Tên công ty">
                <input type="text" name="" placeholder="Địa chỉ">
                <input type="text" name="" placeholder="Mã số thuế">
              </div>
            </div>
            <div class="area-address area-market js-received-market" style="display: none">
              <div class="address-list">
                <div class="address-item">
                  <span>Hà Nội</span><i class="fas fa-caret-down"></i>
                </div>
                <div class="address-item">
                  <span>Chọn quận, huyện</span><i class="fas fa-caret-down"></i>
                </div>
              </div>
              <div class="bring-more" style="display: block;margin-top: 0;">
                <input type="text" name="" placeholder="Nhập tên đường để tìm nhanh siêu thị" style="margin: 0">
              </div>
              <div class="checkradio" style="display: flex;flex-direction: column">
                <div class="barpage-item">
                  <label class="barpage-title">Đạc 7, xã Thọ Xuân, H. Đan Phượng, TP. Hà Nội
                    <input type="radio" name="delivery-address" checked="">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div class="barpage-item">
                  <label class="barpage-title">Số 193 - 195 đường Cầu Diễn, Phường Phúc Diễn, Quận Bắc Từ Liêm, Thành phố Hà Nội
                    <input type="radio" name="delivery-address">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <div style="color:#288ad6; margin-bottom: 10px;">
                  <span style="margin-right: 10px">Xem thêm siêu thị</span><i class="fas fa-caret-down" style="font-size: 18px"></i>
                </div>
              </div>
              <div class="address-item" style="width: 100%">
                <span style="color: #333">Thời gian nhận: </span><span>Hôm nay 06/09</span><i class="fas fa-caret-down"></i>
              </div>
              <div class="barpage-item">
                <label class="barpage-title">Xuất hóa đơn công ty
                  <input type="checkbox" class="js-show-vipservices">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="bring-more">
                <input type="text" name="" placeholder="Tên công ty">
                <input type="text" name="" placeholder="Địa chỉ">
                <input type="text" name="" placeholder="Mã số thuế">
              </div>
            </div>
            <div class="choose-pay">
              <button type="button" class="pay-offline" id="js-pay-offline" data-url="{{ route('payment')}}">Đặt hàng</button>
              <p>Bạn có thể chọn hình thức thanh toán sau khi đặt hàng</p>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <p class="provision">Bằng cách đặt hàng, bạn đồng ý với <a href="/tos" target="_blank">Điều khoản sử dụng</a> của Thegioididong</p>

@endsection