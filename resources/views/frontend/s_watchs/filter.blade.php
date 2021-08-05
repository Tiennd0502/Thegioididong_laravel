{{-- thương hiệu --}}
<div class="filter-trademark trademark-watch">
  @foreach ($brands as $key => $brand)
    <a href="javascript:void(0)" class="js-trademark {{ ($key > 5) ? 'name-trandemark' : '' }}" data-id="{{ $brand->id }}" data-name="{{ $brand->name }}"><img src="{{ asset('images/brands'.$brand->avatar) }}" alt=""></a>
  @endforeach
   <a href="javascript:void(0);" id="trademark-more" style="border-top: 1px solid #eee">Xem thêm</a>
</div>
<div class="filter-other trademark-watch">
  <div class="filter-price">
    <label>Chọn mức giá: </label>
    <a href="">Dưới 1 triệu</a>
    <a href="">Từ 1 - 4 triệu</a>
    <a href="">Từ 4 - 8 triệu</a>
    <a href="">Trên 8 triệu</a>
  </div>
  <div class="filter-feature">
    <label class="criteria js-filter-feature" id="js-filter-feature"> <span>Tính năng</span><i class="fa fa-caret-down"></i>
    </label>
    <div class="content-feature printer js-content-feature" style="display: none">
      <label class="closefeature"><i class="fal fa-times-circle"></i></label>
      <div class="content-feature-list">
        <div class="content-feature-item">
          <label>Loại sản phẩm</label>
          <div class="barpage-item">
            <label class="barpage-title">Đồng hồ thông minh
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Vòng tay thông minh
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Đồng hồ định vị trẻ em
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="content-feature-item">
          <label>Tính năng cho sức khỏe</label>
          <div class="barpage-item">
            <label class="barpage-title">Đo nhịp tim
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Theo dõi giấc ngủ
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Tính lượng calories tiêu thụ
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Đếm số bước chân
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Chế độ luyện tập
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
      </div>
      <div class="content-feature-list">
        <div class="content-feature-item">
          <label>Tiện ích khác</label>
          <div class="barpage-item">
            <label class="barpage-title">Định vị
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Hỗ trợ eSIM
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Nghe gọi trên đồng hồ
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Nghe nhạc với tai nghe bluetooth
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Màn hình luôn hiển thị
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Lộ trình đường đi
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="content-feature-item">
          <label>Đường kính mặt</label>
          <div class="barpage-item">
            <label class="barpage-title">38 mm
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">40 mm
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">42 mm
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">44 mm
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">46 mm
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
      </div>
      <div class="content-feature-list">
        <div class="content-feature-item">
          <label>Ngôn ngữ</label>
          <div class="barpage-item">
            <label class="barpage-title">Tiếng việt
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Tiếng Anh
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="content-feature-item">
          <label>Chất liệu dây</label>
          <div class="barpage-item">
            <label class="barpage-title">Kim loại
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Da
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Silicon
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
      </div>
      <div class="result">
        <button type="button" class="view-result">Xem 6 kết quả</button>
        <button type="reset" class="clear-prop">Bỏ tất cả lựa chọn</button>
      </div>
    </div>
  </div>
  <div class="filter-barpage">
    <div class="barpage-item">
      <label class="barpage-title">Mới
        <input type="checkbox" >
        <span class="checkmark"></span>
      </label>
    </div>
    <div class="barpage-item">
      <label class="barpage-title">Trả góp 0%
        <input type="checkbox" >
        <span class="checkmark"></span>
      </label>
    </div>
    <div class="barpage-item">
      <label class="barpage-title">Đồng hồ thời trang
        <input type="checkbox" >
        <span class="checkmark"></span>
      </label>
      <span class="new">MỚI</span>
    </div>
  </div>
  <div class="filter-sort">
    <span class="criteria js-sort" id="js-sort"> <span>Sắp xếp</span><i class="fa fa-caret-down"></i></span>
    <div class="content-sort js-content-sort" style="">
      <label class="closefilter js-closefilter "><i class="fal fa-times-circle"></i></label>
      <span><span class="check-sort"><i class="fal fa-check"></i></span> Nổi bật nhất</span>
      <span><span class="check-sort"></span> Bán chạy nhất</span>
      <span><span class="check-sort"></span> Giá cao đến thấp</span>
      <span><span class="check-sort"></span> Giá thấp đến cao</span>
    </div>
  </div>
</div>