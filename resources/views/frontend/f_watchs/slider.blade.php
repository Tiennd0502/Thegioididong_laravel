<div class="fwatch-carousel">
  <div class="banner">
    <div id="owl-home" class="owl-carousel owl-theme">
      @foreach ($sliders as $slider)
        <div class="item">
          <a href="{{ $slider->link }}"><img src="{{ asset('images/sliders/'.$slider->avatar) }}" width="1200"height="350"></a>
        </div>
      @endforeach
    </div>
  </div>
</div>