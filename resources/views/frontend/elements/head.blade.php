<header class="header" id="top">
  <div class="container">
    <a href="{{ route('home.index')}}" class="header-logo"><img src="{{ asset('images/logo/logo-tgdd.png') }}" alt=""></a>
    <form class="header-search" id="search" method="Post" accept-charset="utf-8" autocomplete="off">
      <input type="text" name="keyword" id="js-search" data-url="{{ route('search')}}" placeholder="Bạn tìm gì...">
      <i class="fa fa-search"></i>
      <ul class="wrap-suggestion" id="js-wrap-suggestion"></ul>
    </form>
    <div class="header-infor">
      <a href="{{route('cart.index')}}" class="infor-cart">
        @if(session()->get('cart') != Null && count(session()->get('cart')) > 0)
          <i class='count-cart' id="js-count-cart">{{count(session()->get('cart'))}}</i>
        @else
          <i class="fal fa-shopping-cart"></i>
        @endif
        Giỏ hàng
      </a>
      <a href="History_cart" class="infor-history">LỊCH SỬ MUA HÀNG</a>
      <a href="" class="infor-new-hot"><span class="dot"><span class="ping"></span></span><span class="text">Trực tiếp ra mắt Realme C12</span></a>
    </div>
    <div class="box-right">
      <a href="{{ route('post.index')}}" class="infor-technology {{ $current_page == 'tin-tuc' ? 'active' : ''}}">24h CÔNG NGHỆ</a>
      <a href="" class="infor-contact">HỎI ĐÁP</a>
      <a href="" class="infor-game-ap">GAME APP</a>
    </div>
    @if (($current_page == 'dong-ho-thoi-trang' || $current_page == 'dong-ho-thong-minh') && !isset($detail_page)) 
      <a class="leftgame home" href="">
        <img src="{{ asset('images/home-left-min.png') }}" width="146" style="position: fixed; left: 611px; top: 120px;z-index: 2">
      </a>
      <a class="rightgame home" href="">
        <img src="{{ asset('images/home-right-min.png') }}" width="117" style="position: fixed; right: -0.5px; top: 120px;z-index: 2">
      </a>
    @endif
  </div>
</header><!-- /header -->