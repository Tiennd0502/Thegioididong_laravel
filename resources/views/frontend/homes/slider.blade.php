<section>
  <aside class="home-banner">
    <div id="sync1" class="owl-carousel owl-theme" style="opacity: 1; display: block">
      @foreach ($sliders as $slider)
        <div class="item" >
          <a href="{{ $slider->link }}"><img src="{{ asset('images/sliders'.$slider->avatar) }}" width="800" height="300"></a>
        </div>  
      @endforeach
    </div>
    <div id="sync2" class="owl-carousel owl-theme" style="opacity: 1; display: block">
      @foreach ($sliders as $slider)
        <div class="item">
          <h3>{{$slider->name}}</h3>
        </div>
      @endforeach
    </div>
  </aside>
  <!-- carousel -->
  <aside class="home-news">
    <figure>
      <h2><a href="#" title="">Tin công nghệ</a></h2>
    </figure>
    
    <div id="post-slide" class="news-post owl-carousel owl-theme">
      <div class="item">
        <a href="">
          <img src="{{ asset('images/posts/m31s_800x450-100x100.jpg') }}" alt="Galaxy M31s với pin 6.000 mAh, 4 camera 64MP mặt sau ấn định ngày ra mắt chính thức" width="100" height="70">
          <h3>Galaxy M31s với pin 6.000 mAh, 4 camera 64MP mặt sau ấn định ngày ra mắt chính thức</h3>
          <span>9 giờ trước</span>
        </a>
      </div>
      <div class="item">
        <a href="">
          <img src="{{ asset('images/posts/m31s_800x450-100x100.jpg') }}" alt="Galaxy M31s với pin 6.000 mAh, 4 camera 64MP mặt sau ấn định ngày ra mắt chính thức" width="100" height="70">
          <h3>Galaxy M31s với pin 6.000 mAh, 4 camera 64MP mặt sau ấn định ngày ra mắt chính thức</h3>
          <span>9 giờ trước</span>
        </a>
      </div>
      <div class="item">
        <a href="">
          <img src="{{ asset('images/posts/m31s_800x450-100x100.jpg') }}" alt="Galaxy M31s với pin 6.000 mAh, 4 camera 64MP mặt sau ấn định ngày ra mắt chính thức" width="100" height="70">
          <h3>Galaxy M31s với pin 6.000 mAh, 4 camera 64MP mặt sau ấn định ngày ra mắt chính thức</h3>
          <span>9 giờ trước</span>
        </a>
      </div>
    </div>
    <div class="tow-banner">
      <div id="slide-right-1" class="owl-carousel owl-theme">
        <div class="item">
          <a href=""><img src="{{ asset('images/banner/A21s-398-110-398x110.png') }}" alt=""></a>
        </div>
        <div class="item">
          <a href=""><img src="{{ asset('images/banner/A21s-398-110-398x110.png') }}" alt=""></a>
        </div>
        <div class="item">
          <a href=""><img src="{{ asset('images/banner/A21s-398-110-398x110.png') }}" alt=""></a>
        </div>
        <div class="item">
          <a href=""><img src="{{ asset('images/banner/A21s-398-110-398x110.png') }}" alt=""></a>
        </div>
      </div>
      <div id="slide-right-2" class="owl-carousel owl-theme">
        <div class="item">
          <a href=""><img src="{{ asset('images/banner/398-110-398x110.png') }}" alt=""></a>
        </div>
        <div class="item">
          <a href=""><img src="{{ asset('images/banner/398-110-398x110.png') }}" alt=""></a>
        </div>
        <div class="item">
          <a href=""><img src="{{ asset('images/banner/398-110-398x110.png') }}" alt=""></a>
        </div>
        <div class="item">
          <a href=""><img src="{{ asset('images/banner/398-110-398x110.png') }}" alt=""></a>
        </div>
      </div>
    </div>
  </aside>
</section>