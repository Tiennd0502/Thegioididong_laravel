@extends('frontend.master')
@section('title', $item->category->name .' '.$item->brand->name)
@section('content')
{{-- <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=609494949900356&autoLogAppEvents=1"></script> --}}

<div class="submenu">
  <a href="{{ route('home.index') }}">Trang chủ </a><span> &rsaquo; </span><a href="{{ route('dien-thoai.index')}}">{{ $item->category->name }}</a><span> &rsaquo; </span><a href="">{{ $item->category->name .' '.$item->brand->name }}</a>
</div>
<div class="title">
  <h1 class="title-product"> {{ $item->category->name .' '.$item->name }} </h1>
  <div class="rating-result">
    <i class="fas fa-star voted"></i>
    <i class="fas fa-star voted"></i>
    <i class="fas fa-star voted"></i>
    <i class="fas fa-star "></i>
    <i class="fas fa-star "></i>
    <span>9 đánh giá</span>
  </div>
  <div class="like-share">
    <div class="fb-like" data-href="" data-width="344" data-layout="button_count" data-action="like" data-size="small" data-share="true">
    </div>
	</div>
</div>
<div class="detail">
  <aside class="left-image">
    <div class="avatar">
      <img src="{{ asset('images/products'.$item->avatar)}}" alt="">
      @if (!empty($item->icon))
      		<img src="{{ asset('images/icons'.$item->icon) }}" class="icon-imgNew cate1" alt="">
      @endif
    </div>
    <span class="text-view">Xem hình thực tế sản phẩm</span>
    <div class="theme">
    	@if (!empty($item->image_detail))
    		@foreach (json_decode($item->image_detail) as $key=> $value)
    			<div class="option">
		        <div><img src="{{ asset('images/products'.$value) }}"></div>
		        <!-- <span>Xanh Dương</span> -->
		      </div>
					@if($key > 5) @break @endif
    	  @endforeach	
    	@endif 
      {{-- <div class="video">
        <div><i class="fab fa-youtube"></i></div>
        <span>Video</span>
      </div>
      <div class="open-box">
        <div><i class="fal fa-box-open"></i></div>
        <span>Mở hộp, k.mãi</span>
      </div>
      <div class="view360">
        <div><i class="fas fa-undo-alt"></i></div>
        <span>Hình 360 <br>độ</span>
      </div> --}}
    </div>
  </aside>
  <aside class="center-sale">
    {{-- <p>Bạn đang xem phiên bản: <span><b>Reno3</b></span></p>
    <div class="version">
      <div class="option check">
        <label><i class="fas fa-check-circle"></i><span>Reno3</span></label>
        <span>7.490.000₫</span>
      </div>
      <div class="option">
        <label><i class="fal fa-circle"></i><span>Reno3 Pro</span></label>
        <span>10.590.000₫</span>
      </div>
    </div> --}}

		<div class="product-price">
			@if ($item->discount != 0)
			<strong>{{ number_format(round($item->price - $item->price * $item->discount/100,-4), 0, ",", "." ) }}</strong>
			<span>{{ number_format($item->price, 0, ",", ".") }}</span>
				<i>-{{ $item->discount }}%</i>
			@else
				<strong>{{ number_format($item->price,0,",", ".")  }}</strong>
			@endif
			<label class="installment">Trả góp 0%</label> 
		</div> 
    <div class="banner">
      <img src="{{asset('images/banner/DocquyenDes-380x100-1.png')}}" alt="">
    </div> 
    <div class="detail-promotion">
      <div class="promotion-title">
        Khuyễn mãi
        <i>Giá và khuyến mãi dự kiến áp dụng đến 31/08</i>
      </div>
      <div class="inforpr">
        <span><i class="fas fa-check-circle"></i>Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác) <a href="">(click xem chi tiết)</a></span>
        <span><i class="fas fa-check-circle"></i>Phụ kiện mua kèm giảm 20% (không áp dụng phụ kiện hãng, không áp dụng đồng thời KM khác)</span>
      </div>
      <div class="vipservices">
        <b>Chọn thêm các dịch vụ <span>miễn phí chỉ có ở TGDĐ</span></b>
        <div class="barpage-item">
          <label class="barpage-title">Giao hàng tử cửa hàng gần bạn nhất
            <input type="checkbox" checked="true">
            <span class="checkmark"></span>
          </label>
        </div>
        <div class="barpage-item">
          <label class="barpage-title">Chuyển danh bạ, dữ liệu qua máy mới
            <input type="checkbox" >
            <span class="checkmark"></span>
          </label>
        </div>
        <div class="barpage-item">
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
                <div><img src="{{asset('images/oppo-reno3-den-200x200-1-180x125.png')}}"></div>
                <div class="barpage-item">
                  <label class="barpage-title">Đen
                    <input type="checkbox" class="js-chosse-color">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="option">
                <div><img src="{{asset('images/oppo-reno3-trang-400x460-400x460.png')}}"></div>
                <div class="barpage-item">
                  <label class="barpage-title">Trắng
                    <input type="checkbox" class="js-chosse-color">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
              <div class="option">
                <div><img src="{{asset('images/oppo-reno3-xanh-200x200-2-180x125.png')}}"></div>
                <div class="barpage-item">
                  <label class="barpage-title">Xanh dương
                    <input type="checkbox" class="js-chosse-color">
                    <span class="checkmark"></span>
                  </label>
                </div>
              </div>
            </div>
          </div>
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
      </div>
    </div> 
    <div class="donate">
      <i class="fal fa-gift"></i>
      <span><b>Tặng 100.000₫</b> mua online tại Web thành viên BachhoaXANH.com, áp dụng tại Tp.HCM, Tp.Nha Trang, Tp.Phan Thiết <a href="" target="_blank">(click xem chi tiết)</a></span>
    </div> 
    <div class="discount">
      <div>
        <i class="fab fa-cc-jcb"></i>
        <span>Giảm thêm <b>600.000đ</b> khi thanh toán bằng thẻ JCB cho sản phẩm từ 6.000.000đ.</span><br>
        <a href="" target="_blank">Xem hướng dẫn</a>
      </div>
      <div>
        <span >Mua ngay</span>
      </div>
    </div>
    <p class="quotation"><i class="fal fa-comment-alt-exclamation"></i><a href="">Báo giá cao</a></p>
    <div class="area-order">
      <a class="buy-now" href="{{ route('cart.index')}}" data-url="{{ route('add-to-cart',$item->id ) }}"><b>Mua ngay</b><span>Giao tận nơi hoặc nhận tại siêu thị</span></a>
    </div>
    <div class="area-order">
      <a class="installment-cash" href=""><b>Mua Trả góp 0%</b><span>Thủ tục đơn giản</span></a>
      <a class="installment-card" href=""><b>Trả góp qua thẻ</b><span>Visa, Master, JBC</span></a>
    </div>
    <div class="call-order">
      <span>Gọi đặt mua: <a href="">1800.1060</a> (miễn phí - 7:30-22:00)</span>
    </div>
  </aside>
  <aside class="right-infor">
    <p class="map-check"><i class="far fa-map-marker-check"></i>Kiểm tra có hàng tại nơi bạn ở không?</p>
    <div class="accessories">
      <div class="donate">
        <i class="fal fa-box-full"></i>
        <span>Bộ sản phẩm gồm: <a href="" target="_blank"> Hộp, Sạc, Tai nghe, Sách hướng dẫn, Cáp, Cây lấy sim, Ốp lưng</a></span>
      </div>
      <div class="donate">
        <i class="fas fa-award"></i>
        <span>Bảo hành chính hãng 12 tháng</span>
      </div>
      <div class="donate">
        <i class="far fa-undo-alt"></i>
        <span>Lỗi là đổi mới trong 1 tháng tại hơn 2034 siêu thị toàn quốc <a href="" target="_blank">Xem chi tiết</a></span>
      </div>
    </div>
    <div class="product-old">
      <a href="">Xem OPPO Reno3 cũ</a>
      <span>Giá dưới: <strong>6.530.000₫</strong></span>
      <span>Bảo hành tới 10 tháng</span>
    </div>
  </aside>
</div>
<div class="box-content">
  <aside class="left-content">
    <h2 class="line-camp-2" style="line-height: 1.3">Đặc điểm nổi bật của {{ $item->name }} </h2>
    <div id="owl-detail" class="owl-carousel owl-detail owl-theme">
  	@if(!empty($item->image_carousel)) 
  		@foreach (json_decode($item->image_carousel) as $value)
  			<div class="item">
	    		<a href=""><img src="{{ asset('images/products'.$value) }}"></a>
	    	</div>
			@endforeach
  	@endif
    </div>
    <article class="area-article">
  		{!! $item->content !!}
  	</article>
  	<p class="read-more js-read-more">Đọc thêm <i class="fas fa-caret-down"></i></p>
  	<div class="bottom-order">
  		<div class="infor-product">
  			<img src="{{ asset('images/products'.$item->avatar)}}" alt="">
  			<div style="padding: 10px">
  				<h3 class="line-camp-2"> {{ $item->category->name.' '.$item->name }}</h3>
  				@if ($item->discount != 0)
		          <strong>{{ number_format(round($item->price - $item->price * $item->discount / 100, -4),0,",", ".") }}₫</strong>
		      @else
		          <strong>{{ number_format($item->price,0,",", ".") }}₫</strong>
		      @endif
  			</div>
  		</div>
  		<div class="area-order">
        <a class="buy-now" href="{{ route('cart.index')}}" data-url="{{ route('add-to-cart',$item->id ) }}"><b>Mua ngay</b></a>
        <a class="installment-cash" href=""><b>Mua Trả góp 0%</b></a>
        <a class="installment-card" href=""><b>Trả góp qua thẻ</b></a>
    	</div>
  	</div>
  	<div class="same-kind" id="same-kind">
  		<h4>Các sản phẩm cùng loại</h4>
  		<div class="home-product">
  			@foreach ($related_products as $product)
					<div>
						<a href="{{ route('dien-thoai.detail', $product->slug) }}" class="large @if($item->category->slug == 'laptop') laptop @endif">
							<img src="{{ asset('images/products'.$product->avatar)}}" alt="" width="180" height="180">
							<h3>{{ $product->name }} </h3>
							<!-- <h6 class="text-promo">Hàng sắp về</h6> -->
							<div class="product-price">
								@if ($product->discount != 0)
										<strong>{{number_format(round($product->price - $product->price * $product->discount / 100, -4),0,",", ".")  }}₫</strong>
										<br>
										<span style="margin-left: 0">{{number_format($product->price,0,",",".") }}₫</span>
										<i>-{{$product->discount }}%</i>
								@else
										<strong>{{number_format($product->price,0,",", ".") }}₫</strong>
								@endif                      
							</div>
							<div class="rating-result">
								<i class="fas fa-star voted"></i>
								<i class="fas fa-star voted"></i>
								<i class="fas fa-star voted"></i>
								<i class="fas fa-star "></i>
								<i class="fas fa-star "></i>
							</div>
							<div class="product-promo noimage">
								<p><b></b></p>
								<!-- <p>Ưu đãi đặc quyền Galaxy Z Elite và gói dịch vụ cao cấp</p> -->
							</div>
							<!-- <label class="preorder">Đặt trước đến 24/09</label> -->
							<!-- <label class="installment">Trả góp 0%</label> -->
							<!-- <label class="discount">GIẢM 45.000₫</label> -->
							<!-- <img class="icon-imgNew cate1" src="./images/Label_01-05.png" alt=""> -->
						</a>
					</div>
				@endforeach
  		</div>
  	</div>
  	<div class="evaluate">
  		<div class="evaluate-content">
  			<div class="rating-result">
  				<b> {{ $rating['avg']}} <i class="fas fa-star voted"></i></b>
  			</div>
  			<div class="evaluate-detail">
					@for($i=5; $i>0; $i--)
						<div class="evaluate-item">
							<span> {{$i}} <i class="fas fa-star voted"></i></span>
							<div class="bgb">
								<div class="bgb-in" style="width: {{ ($rating["sum"]) ? round($rating[$i] / $rating["sum"] *100,2,PHP_ROUND_HALF_EVEN)  : 0 }}%"></div>
							</div>
							<span><strong> {{ $rating[$i] }} </strong>đánh giá</span>
						</div>
  				@endfor
  			</div>
  			<div class="send-myevaluate">
  				<a href="javascript:void(0)" class="show-input">Gửi đánh giá của bạn</a>
  			</div>
  		</div>
  		<form class="input" style="display: none" method="POST" id="js-my-evaluate" enctype="multipart/form-data" data-url="{{ route('evaluate.create') }}">
    		<div class="myevaluate">
    			<span>Chọn đánh giá của bạn</span>
    			<input type="hidden" name="product_id" value="{{$item->id}}">
    			<input type="hidden" name="rating" id="hdfStar" value="0" data-value="0">
    			<span class="rating-result" id="js-myevaluate">
    				<i class="fas fa-star" id="s1"></i>
    				<i class="fas fa-star" id="s2"></i>
    				<i class="fas fa-star" id="s3"></i>
    				<i class="fas fa-star" id="s4"></i>
    				<i class="fas fa-star" id="s5"></i>
    			</span>
    			<span class="lsStar hide"> Không thích</span>
    		</div>
    		<div class="write-comment hide" id="js-write-commnet" >
    			<div class="write">
    				<textarea name="content" id ="js-content-evaluated" placeholder="Nhập đánh giá về sản phẩm (tối thiểu 80 ký tự)"></textarea>
    				<div class="attach-photo">
    					<div class="attach">
								<label class="js-insert-attach" data-name="evaluate"><i class="fas fa-camera-retro mr-2"></i> Đính kèm ảnh</label>
								<span class="ckeckWrite"></span>
							</div>
      			</div>
    			</div>
    			<div class="person-infor">
    				<input type="text" name="name" id="name" placeholder="Họ và tên">
    				<input type="tel" name="phone" id="phone" maxlength="10" required placeholder="Số điện thoại">
    				<input type="Email" name="email" id="email" placeholder="Email">
    				<button type="submit" id='js-sendEvaluate'>Gửi đánh giá</button>
    				<button type="reset" id="js-reset-evaluate" class="d-none"></button>
    			</div>
    			<div class="list-attach" style="width: 100%;">
						<ul class="attach-view" id="attach-view-evaluate">
							<li class="d-none" id="insert-attach-evaluate">
                <label class="insert-attach js-insert-attach" data-name='evaluate'><i class="fas fa-plus"></i>
								</label>
              </li>
						</ul>
					</div>
    			<div class="barpage-item share">
            <label class="barpage-title">Tôi sẽ giới thiệu sản phẩm này cho bạn bè người thân
              <input type="checkbox" name="share" value="1">
              <span class="checkmark"></span>
            </label>
          </div>
          <div id="js-error-message" style="color: #d0021b;width: 100%"></div>
    		</div>
  		</form>
  	</div>
  	<div class="view-evaluate">
  		<ul class="list-evaluate">
  				@foreach ($evaluates as $key => $evaluate) 
  					<li class="evaluate-ask">
		  				<div class="customer">
		  					<strong> {{ $evaluate->customer->name }} </strong>
		  					<label class="check-buy">
		  						<i class="fas fa-badge-check"></i> 
		  						Đã mua tại Thegioididong.com
		  					</label>
		  				</div>
		  				<div class="customer-evaluate">
		  					<span class="rating-result">
								@for ($i = 0; $i < 5; $i++) 
									@if ($i + 1 <= $evaluate->rating) 
										<i class="fas fa-star voted"></i>
										@else
										<i class="fas fa-star "></i>
										@endif
								@endfor
							  </span>
							  <i> {{$evaluate->content }}</i>
		  				</div>
							@if (!empty($evaluate->image))
								<div class="customer-evaluate-image">
									@foreach (json_decode($evaluate->image) as $image)
											<img src="{{ asset('images/evaluates'.$image) }}" alt="" class="image-item">
									@endforeach
								</div>
							@endif
							
		  				<div class="view-share">
		  					@if ($evaluate->share == 1) 
		  						<i class="fas fa-heart"></i> Sẽ giới thiệu sản phẩm này cho bạn bè, người thân
		  					@endif
		  				</div>
		  				<div class="answer">
		  					<a class="respondent" onclick="ShowReply(id)" href="javascript:void(0)">Thảo luận</a>
		  					<a class="time-respont" href="javascript:void(0)"> {{ date('H:i d/m/Y', strtotime($evaluate->created_at)) }} </a>
		  				</div>
		  			</li>
						@if($key > 8)
							@break
						@endif
  				@endforeach
  		</ul>
			<div style="padding: 0.5rem;">
				<a class="btn-bgc-none" href=""><i class="far fa-hand-point-right"></i> Xem tất cả đánh giá</a>
			</div>
  	</div>
  	{{-- <div class="comment" style="width: 100%; display:block">
      <div class="fb-comments" data-href="http://localhost/Web204_MVC/dtdd/detail/" data-numposts="7" data-width="100%"></div> 
    </div> --}}

  </aside>
  <aside class="right-content">
    {{-- info parameter --}}
		@include('frontend.elements.parameter')
    {{-- End info parameter --}}
    <div class="news-list">
      <h4 class='line-camp-2'>Tin tức về  {{ $item->name}} </h4>
      <ul>
      	<li>
      		<a href="">
          	<img src="{{ asset('images/articles/opporeno4tim-16_800x450-300x200.jpg') }}" alt="">
          	<h3>Trên tay OPPO Reno4 Tím Khói: Tôn lên vẻ sang trọng, quý phái cho các chị em, giá không thay đổi</h3>
          </a>
      	</li>
      	<li>
      		<a href="">
          	<img src="{{ asset('images/articles/oppo-sm-megamall-concept-store-with-coleen-garcia_800x450-300x200.jpg') }}" alt="">
          	<h3>OPPO hợp tác với América Móvil để thâm nhập thị trường smartphone Mỹ Latinh, đường đua quốc tế ai sẽ hụt hơi trước đây?</h3>
          </a>
      	</li>
      	<li>
      		<a href="">
          	<img src="{{ asset('images/articles/opporeno4tim-16_800x450-300x200.jpg') }}" alt="">
          	<h3>Trên tay OPPO Reno4 Tím Khói: Tôn lên vẻ sang trọng, quý phái cho các chị em, giá không thay đổi</h3>
          	<span><i class="fas fa-comment-alt"></i> 1 bình luận</span>
          </a>
      	</li>
      </ul>
      <a href="">Xem tất cả các tin liên quan</a>
    </div>
    <div class="news-list">
      <h4 class='line-camp-2'>Hướng dẫn về {{ $item->name}} </h4>
      <ul>
      	<li>
      		<a href="">
          	<img src="{{ asset('images/articles/huong-dan-cach-kich-hoat-bao-mat-khuon-mat-tren-oppo-reno3-thumb-1.jpg') }}" alt="">
          	<h3>Hướng dẫn cách kích hoạt bảo mật khuôn mặt trên OPPO Reno3</h3>
          </a>
      	</li>
      	<li>
      		<a href="">
          	<img src="{{ asset('images/articles/oppo-sm-megamall-concept-store-with-coleen-garcia_800x450-300x200.jpg') }}" alt="">
          	<h3>OPPO hợp tác với América Móvil để thâm nhập thị trường smartphone Mỹ Latinh, đường đua quốc tế ai sẽ hụt hơi trước đây?</h3>
          </a>
      	</li>
      	<li>
      		<a href="">
          	<img src="{{ asset('images/articles/oppo-sm-megamall-concept-store-with-coleen-garcia_800x450-300x200.jpg') }}" alt="">
          	<h3>So sánh OPPO Reno3 và Reno2 F: Cùng mức giá, nên chọn mua máy nào?</h3>
          	<span><i class="fas fa-comment-alt"></i> 1 bình luận</span>
          </a>
      	</li>
      </ul>
      <a href="">Xem thêm hướng dẫn</a>
    </div>

    <div class="acc-attach">
      <h4>Sản phẩm thường mua cùng </h4>
      <ul>
      	<li>
      		<a href="">
      			<img src="{{ asset('images/tai-nghe-ep-mozard-ds509-wb-xam-1-600x600.jpg') }}" alt="">
      			<h3>Tai nghe EP Mozard DS509-WB Xám</h3>
      			<strong>102.000₫</strong>
      		</a>
      	</li>
      	<li>
      		<a href="">
      			<img src="{{ asset('images/tai-nghe-ep-mozard-ds509-wb-xam-1-600x600.jpg') }}" alt="">
      			<h3>Tai nghe EP Mozard DS509-WB Xám</h3>
      			<strong>102.000₫</strong>
      		</a>
      	</li>
      	<li>
      		<a href="">
      			<img src="{{ asset('images/sac-du-phong-polymer-10000mah-xiaomi-mi-18w-den-1-600x600.jpg') }}" alt="">
      			<h3>Tai nghe EP Mozard DS509-WB Xám</h3>
      			<strong>449.000₫</strong>
      		</a>
      	</li>
      </ul>
      <a href="">Xem tất cả phụ kiện OPPO Reno3</a>
    </div>
  </aside>
</div>
@endsection