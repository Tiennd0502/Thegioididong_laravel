<h3 class="tabs watchw"><a class="read-more" href=""></a></h3>
<div class="home-product">
  @foreach ($items as $item)
    <div class="">
      <div class="product-img">
        <a href="">
          <img src="{{asset('images/products'.$item->avatar)}}" alt="">
          @if($item->icon != '')
            <span><img src="{{asset('images/icons'.$item->icon)}}" alt=""></span>
          @endif
        </a>
      </div>
      <div class="product-name">
        <a href="">
          <h3>{{$item->name}}</h3>
        </a>
      </div>
      <div class="product-price">
        @if ($item->discount != 0)
          <strong>{{ number_format(round($item->price - $item->price * $item->discount/100,-4), 0, ",", "." ) }}₫</strong>
          <span>{{ number_format($item->price, 0, ",", ".") }}₫</span>
            <i>-{{ $item->discount }}%</i>
        @else
          <strong>{{ number_format($item->price,0,",", ".")  }}₫</strong>
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
      <div class="product-promo">
        @if($item->gift != '')
          <p>
            Giảm thêm <b>{{ number_format($item->gift, 0, ",", "." ) }}₫</b>
          </p>
        @endif
        <label class="installment">Trả góp 0%</label>
      </div>
    </div>
  @endforeach
</div>
<div class="show-more">
  <label for="">Xem thêm 45 đồng hồ thông minh<i class="fa fa-caret-down"></i></label>
</div>
<div class="catetag catetag-printer" style="background-color: #fff;padding: 5px 10px;margin-top: 0">
  <div>
    <a href="">Apple</a>
    <a href="">Samsung</a>
    <a href="">Huawei</a>
    <a href="">Xiaomi</a>
    <a href="">Oppo</a>
    <a href="">BeU</a>
    <a href="">Amazfit</a>
  </div>
</div>
