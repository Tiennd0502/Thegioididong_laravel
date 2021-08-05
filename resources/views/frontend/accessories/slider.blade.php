<div class="banner">
  <div id="owl-home" class="owl-carousel owl-theme">
    @foreach ($sliders as $slider)
      <div class="item">
        <a href="{{ $slider->link }}"><img src="{{ asset('images/sliders'.$slider->avatar) }}" width="800" height="170"></a>
      </div>
    @endforeach
  </div>
  <div class="right-banner">
    <a href="#">
      <img src="{{ asset('images/sticky-pk-390-97-390x97-1.png') }}" width="390" height="90" alt=""></a>
    <a href="#">
      <img src="{{ asset('images/sticky-pk-390-97-copy2-390x97.png') }}" width="390" height="90" alt="">
    </a>
  </div>
</div>