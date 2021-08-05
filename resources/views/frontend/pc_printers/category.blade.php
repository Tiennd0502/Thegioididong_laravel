<div class="quick-filter">
  <a href="{{ route('printer.index')}}" class="filter-item {{ $sub_current_page == 'may-in' ? 'active' : ''}}">
    <img src="{{ asset('images/Mayin2x-80x80-9.png')}}" alt="">
    <span>Máy in</span>
  </a>
  <a href="{{ route('printingInk.index')}}" class="filter-item {{ $sub_current_page == 'muc-in' ? 'active' : ''}}">
    <img src="{{ asset('images/Mucin2x-80x80.png')}}" alt="">
    <span>Mực in</span>
  </a>
  <a href="{{ route('computerScreen.index')}}" class="filter-item {{ $sub_current_page == 'man-hinh-may-tinh' ? 'active' : ''}}">
    <img src="{{ asset('images/manhinh-80x80.png')}}" alt="">
    <span>Màn hình máy tính</span>
  </a>
  <a href="{{ route('desktop.index')}}" class="filter-item {{ $sub_current_page == 'may-tinh-de-ban' ? 'active' : ''}}">
    <img src="{{ asset('images/maytinhbo-80x80.png')}}" alt="">
    <span>Máy tính để bàn</span>
  </a>
</div>
