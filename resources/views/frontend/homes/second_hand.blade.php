<div class="navigat">
  <h2>MÁY CŨ NỔI BẬT</h2>
  <div class="view-all">
    <a href="" title="">Điện thoại cũ</a>
    <a href="" title="">Tablet cũ</a>
    <a href="" title="">Laptop cũ</a>
    <a href="" title="">Đồng hồ cũ</a>
    <a href="" title="">Phụ kiện cũ</a>
  </div>
</div>
<div class="">
  <div class="owl-carousel home-promo owl-theme" id="owl-promo-old">
    @for($i=0; $i<15; $i++)
      <div class="item">
        <div class="div-extend ">
          <span class="quantity">1.152 máy</span>
        </div>
        {{-- <a href="{{ route('home.product.detail', [$item->category->slug, $item->slug])}}" class=""> --}}
        <a href="" class=""> 
          <span class="labelshock-top">-15%</span>
          <img class="lazyload" loading="lazy" data-src="{{ asset('images/accessories/sieu-pham-galaxy-s-black-400x400.jpg')}}" alt="" >
          <h3>Samsung Galaxy S10</h3>
          <div class="oldprice">
            <span>Giá từ: </span>9.400.000₫
            <span class="price-line">11.060.000₫</span>
          </div>
          <div class="newprice">Máy mới đã ngừng kinh doanh</div>
          <div class="newprice">
            Rẻ hơn máy mới: <span>1.510.000₫ (42%)</span>
          </div>
        </a>
      </div>
    @endfor
  </div>
</div>