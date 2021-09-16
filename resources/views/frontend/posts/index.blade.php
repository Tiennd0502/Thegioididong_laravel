@extends('frontend.master')
@section('title','Tin tức công nghệ cập nhật 24h - Thegioididong.com')
@section('content')
  <section class="post">
    <div class="post-left">
      <section class="post-top">
        <article class="post-new">
          <a href="">
            <img class="post-image" src="{{ asset('images/posts/vsmart-aris-8gb-1_800x450-600x400.jpg')}}" alt="">
            <h3 class="post-title">Chốt liền ưu đãi xịn với bộ đôi Vsmart Aris và Aris Pro, hỗ trợ hết mình mùa dịch với mức giảm tiền triệu ngon không tưởng</h3>
            <div class="post-short-description">
              Mở màn ưu đãi tháng 8 là chương trình đồng hành mùa dịch đang diễn ra tại Thế Giới Di Động với mức giảm kịch sàn đến 2.5 triệu đồng dành cho bộ đôi Vsmart Aris 8GB và Aris Pro. Hàng Việt chất lượng cao với giá rẻ khó đỡ thế kia là deal hết sức lý tưởng đấy.
            </div>
            <div class="time-post">
              <time> 1 ngày trước</time>
            </div>
          </a>
        </article>
        <section class="post-list">
          <article class="post-item">
            <a href="">
              <img class="post-image" src="{{ asset('images/posts/thumbgooglepixel6_800x450-600x400.jpg')}}" alt="">
              <h3 class="post-title ">Nghe Đồn Là: Google Pixel 6 được Google hé lộ về thiết kế, cấu hình và sẽ ra mắt chính thức vào tháng 10/2021 (liên tục cập nhật)</h3>
              <div class="time-post">
                <time> 1 ngày trước</time>
              </div>
            </a>
          </article>
          <article class="post-item">
            <a href="">
              <h3 class="post-title sub-post-title">Nghe Đồn Là: Google Pixel 6 Pro sẽ sử dụng con chip do Google tùy biến, màn hình 120 Hz, ra mắt tháng 10 năm nay (liên tục cập nhật)</h3>
            </a>
          </article>
          <article class="post-item">
            <a href="">
              <h3 class="post-title sub-post-title">Hàng hiệu giảm giá tiền triệu: iPhone ưu đãi thích mê với mức giá siêu hời cùng quà tặng khủng, deal thế này iFans sao nỡ bỏ lỡ</h3>
            </a>
          </article>
          <article class="post-item">
            <a href="">
              <h3 class="post-title sub-post-title">Cách đăng ký các gói cước được tăng gấp đôi data, giúp bạn thoải mái học tập và giải trí tại nhà trong mùa dịch</h3>
            </a>
          </article>
        </section>
      </section>
      <section class="main-posts">
        @for($i= 0; $i < 9; $i++)
          <article class="post-item">
            <a href="">
              <img src="{{ asset('images/posts/realme-v25-5g_1280x720-300x200.jpg')}}" alt="" class="post-image">
              <div class="post-content">
                <h3 class="post-title">
                  🎧 24h công nghệ có gì HOT 4/8: Realme V25 5G sắp ra mắt sẽ chạy Dimensity 810, Apple đang phát triển MacBook Pro mới và Watch S7 
                </h3>
                <div class="time-post">
                  <div class="user-info">
                    <img src="{{ asset('images/users/myavatar.jpg')}}" alt="" class="user-avatar">
                    <span class="user-name">Tiến Nguyễn</span>
                    <time> 1 ngày trước</time>
                  </div>
                </div>
              </div>
            </a>
          </article>
        @endfor
        <div class="result mt-2">
          <button type="button" class="view-result">Xem thêm <i class="fa fa-caret-down" id="iconfoot"></i></button>
        </div>
      </section>
    </div>
    <div class="post-right">
      <div class="banner">
        <a href=""><img class="banner-image" src="{{ asset('images/banner/380x215-380x215.jpg') }}" alt=""></a>
      </div>
      <div class="hot-tag">
        <h3 class="title-tag">CHỦ ĐỀ HÓT</h3>
        <a class="see-more" href="">Xem tất cả chủ đề <i class="far fa-angle-double-right"></i></a>
      </div>
      <ul class="tag-list">
        <li class="tag-item">
          <a href="">Dịch COVID-19</a>
        </li>
        <li class="tag-item">
          <a href="">Mẹo không phải ai cũng biết</a>
        </li>
        <li class="tag-item">
          <a href="">Dịch COVID-19</a>
        </li>
        <li class="tag-item">
          <a href="">Mẹo không phải ai cũng biết</a>
        </li>
      </ul>
      <div class="hot-tag border-b">
        <h3 class="title-tag">Thảo luận nhiều</h3>
      </div>
      <div class="summary-comment">
        <a class="comment-item" href="">
          <div class="index">1</div>
          <h3 class="comment-title">iPhone trả bảo hành - sự lựa chọn hợp lý cho những ai muốn sở hữu một chiếc iPhone mới 100% với một mức giá tiết kiệm hơn<span class="number-comment"><i class="fas fa-comment-alt-lines"></i> 84</span></h3>
        </a>
        <a class="comment-item" href="">
          <div class="index">2</div>
          <h3 class="comment-title">Cách tạo hiệu ứng sạc pin cho Android và iOS vừa đẹp, vừa giúp bạn dễ dàng theo dõi mức phần trăm pin<span class="number-comment"><i class="fas fa-comment-alt-lines"></i> 46</span></h3>
        </a>
        <a class="comment-item" href="">
          <div class="index">3</div>
          <h3 class="comment-title">Chia sẻ khó khăn mùa dịch, MobiFone miễn phí một tháng dùng 4G với 45GB tốc độ cao cho bà con miền Tây<span class="number-comment"><i class="fas fa-comment-alt-lines"></i> 33</span></h3>
        </a>
        <a class="comment-item" href="">
          <div class="index">4</div>
          <h3 class="comment-title">Mở hộp và trên tay Nokia XR20: Thiết kế chống va đập, bền bỉ chuẩn quân đội nhưng vẫn đẹp, vẫn cuốn hút<span class="number-comment"><i class="fas fa-comment-alt-lines"></i> 29</span></h3>
        </a>
      </div>
      <div class="hot-tag border-b">
        <h3 class="title-tag">TUYỂN DỤNG TẠI MWG</h3>
        <a class="see-more" href="">Xem thêm <i class="far fa-angle-double-right"></i></a>
      </div>
      <div class="recruitments">
        @for($i=0; $i<= 3; $i++)
          <a class="recruitment @if($i < 3) border-b @endif">
            <div class="recruitment-place">
              <span class="company-name">Tổng Đài Giải Quyết Khiếu Nại </span><br>
              <span class="company-address">Hồ Chí Minh</span>
            </div>
            <div class="deadline">
              <span class="deadline-text"> Hạn nộp </span><br>
              <time>18/08/2021</time>
            </div>
          </a>
        @endfor
      </div>
      {{-- post new product --}}
      <div class="hot-tag border-b ">
        <h3 class="title-tag text-primary">Bài viết về sản phẩm mới</h3>
      </div>
      <section class="main-posts">
        @for($i= 0; $i < 4; $i++)
          <article class="post-item post-product border-none">
            <a href="">
              <img src="{{ asset('images/products/iphone-11-pro-max-512gb-gold-400x460.png')}}" alt="" class="post-image">
              <div class="post-content">
                <h3 class="post-title"> Vivo iQOO 8 </h3>
                <p>Tin đồn</p>
                <span> 6 bài viết</span>
              </div>
            </a>
          </article>
        @endfor
      </section>
      {{-- end post new product --}}
      {{-- Post sale --}}
      <div class="hot-tag">
        <h3 class="title-tag text-primary">Khuyến mãi</h3>
      </div>
      <section class="post-list post-sale">
        <article class="post-item border-b">
          <a href="">
            <img class="post-image" src="{{ asset('images/posts/thumbgooglepixel6_800x450-600x400.jpg')}}" alt="">
            <h3 class="post-title ">Nghe Đồn Là: Google Pixel 6 được Google hé lộ về thiết kế, cấu hình và sẽ ra mắt chính thức vào tháng 10/2021 (liên tục cập nhật)</h3>
          </a>
        </article>
        <article class="post-item w-50 border-none">
          <a href="">
            <img class="post-image" src="{{ asset('images/posts/thumbgooglepixel6_800x450-600x400.jpg')}}" alt="">
            <h3 class="post-title sub-post-title">Nghe Đồn Là: Google Pixel 6 Pro sẽ sử dụng con chip do Google tùy biến, màn hình 120 Hz, ra mắt tháng 10 năm nay (liên tục cập nhật)</h3>
          </a>
        </article>
        <article class="post-item w-50 border-none">
          <a href="">
            <img class="post-image" src="{{ asset('images/posts/thumbgooglepixel6_800x450-600x400.jpg')}}" alt="">
            <h3 class="post-title sub-post-title">Hàng hiệu giảm giá tiền triệu: iPhone ưu đãi thích mê với mức giá siêu hời cùng quà tặng khủng, deal thế này iFans sao nỡ bỏ lỡ</h3>
          </a>
        </article>
        <article class="post-item w-50 border-none">
          <a href="">
            <img class="post-image" src="{{ asset('images/posts/thumbgooglepixel6_800x450-600x400.jpg')}}" alt="">
            <h3 class="post-title sub-post-title">Cách đăng ký các gói cước được tăng gấp đôi data, giúp bạn thoải mái học tập và giải trí tại nhà trong mùa dịch</h3>
          </a>
        </article>
        <article class="post-item w-50 border-none">
          <a href="">
            <img class="post-image" src="{{ asset('images/posts/thumbgooglepixel6_800x450-600x400.jpg')}}" alt="">
            <h3 class="post-title sub-post-title">Cách đăng ký các gói cước được tăng gấp đôi data, giúp bạn thoải mái học tập và giải trí tại nhà trong mùa dịch</h3>
          </a>
        </article>
      </section>

    </div>
    

  </section>
  
  <link rel="stylesheet" href="{{ asset('css/post.css')}}">
@endsection