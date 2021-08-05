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
                </div>
                <time> 1 ngày trước</time>
              </div>
            </div>

          </a>
        </article>
      </section>
    </div>
    <div class="post-right">
      
    </div>

  </section>
  
  <link rel="stylesheet" href="{{ asset('css/post.css')}}">
@endsection