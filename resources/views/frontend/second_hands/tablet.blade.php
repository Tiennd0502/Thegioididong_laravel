<!-- Máy cũ nỗi bật -->
<div class="navigat border-none">
  <h2>Laptop cũ giá sốc</h2>
  <div class="view-all">
    <a href="" title="">MacBook</a>
    <a href="" title="">Asus</a>
    <a href="" title="">HP</a>
    <a href="" title="">Lenovo</a>
    <a href="" title="">Xem tất cả</a>
  </div>
</div>
<div class="home-product second_hand">
  @foreach ($tablet_old as $item)
    <div class="">
      <a href="" class="">
        <span class="discount-top">-15%</span>
        <span class="quantity">52 máy</span>
        <img src="{{ asset('images/products/'.$item->avatar)}}" alt="" >
        <h3> {{ $item->name }} </h3>
        <div class="oldprice">
          <span>Giá từ: </span>{{ number_format(round($item->price - $item->price * $item->discount/100,-4), 0, ",", "." ) }}₫
          <span class="price-line">{{ number_format($item->price,0,",", ".") }}₫</span>
        </div>
        <div class="newprice">Máy mới đã ngừng kinh doanh</div>
        <div class="newprice">
          Rẻ hơn máy mới: <span>1.510.000₫ (42%)</span>
        </div>
      </a>
    </div>
  @endforeach
</div>
