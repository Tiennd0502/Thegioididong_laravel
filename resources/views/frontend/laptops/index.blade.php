@extends('frontend.master')
@section('title','Laptop | Máy tính xách tay giá rẻ, trả góp 0%')
@section('content')
  {{-- <div id="tab-links">
    <div class="tab-links">
      <a href="" class="links-active">laptop</a>
      <a href="" class="">Máy tính bộ - Màn hình</a>
      <a href="" class="">Máy in - Mực in</a>
    </div>
    <div class="mac-hp-area">
      <a href=""><img src="{{ asset('images/macbook.png') }}"></a>
      <a href=""><img src="{{ asset('images/hp.png') }}"></a>
    </div>
  </div> --}}
  {{-- slider --}}
  @include('frontend.laptops.slider')
  {{-- fillter-trademark --}}
  @include('frontend.laptops.filter')

  <div class="demand">
    <h3 class="title" style="border-bottom: none">Chọn nhu cầu:</h3>
    <div class="property-need">
      <a href="">
        <img src="{{ asset('images/hoc-tap.jpg') }}" alt="">
        <span>Học tập - Văn phòng</span>
      </a>
      <a href="">
        <img src="{{ asset('images/do-hoa-(tgdd).jpg') }}" alt="">
        <span>Đồ họa - Kỹ thuật</span>
      </a>
      <a href="">
        <img src="{{ asset('images/mong-nhe.jpg') }}" alt="">
        <span>Mõng nhẹ</span>
      </a>
      <a href="">
        <img src="{{ asset('images/gaming.jpg') }}" alt="">
        <span>Laptop - Gaming</span>
      </a>
      <a href="">
        <img src="{{ asset('images/cao-cap.jpg')}}" alt="">
        <span>Cao cấp - Sang trọng</span>
      </a>
    </div>
  </div>

  <div class="img-title">
    <img src="{{ asset('images/FeatureLaptopShockPrice.png') }}" alt="">
  </div>

  {{-- discount --}}
  @include('frontend.laptops.laptop_shock')
  {{-- end discount --}}
  
  {{-- list product --}}
  @include('frontend.laptops.list')
  {{-- end list product --}}

  <!-- Block tin tức cho laptop -->
  @include('frontend.laptops.post')
  <!-- /Block tin tức cho laptop -->
  <div class="catetag">
    <a href="">Laptop Asus</a>
    <a href="">Laptop HP</a>
    <a href="">Laptop Lenovo</a>
    <a href="">Macbook Pro</a>
    <a href="">Laptop Acer</a>
    <a href="">Dell inspiron</a>
    <a href="">Macbook Air</a>
    <a href="">Macbook Pro 2018</a>
    <a href="">Asus Zenbook</a>
    <a href="">HP Pavilion</a>
    <a href="">HP Envy</a>
    <a href="">Dell inspiron 15</a>
    <a href="">As</a>
  </div>
@endsection

@section('slogan')
  @include('frontend.shares.slogan')
@endsection