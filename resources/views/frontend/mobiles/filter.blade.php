<div class="filter-trademark">
  @php 
      $index = 0;
  @endphp
  @foreach ($brands as $brand)
    <!-- class="check" -->
    <a href="javascript:void(0)" class="js-trademark {{ ($index > 6) ? 'name-trandemark' : '' }}" data-id="{{ $brand->id }}" data-name="{{ $brand->name }}"><img src="{{ asset('images/brands'.$brand->avatar) }}" alt=""></a>
    @php 
      $index++;
    @endphp
  @endforeach
   <a href="javascript:;" id="trademark-more" style="border-top: 1px solid #eee">Xem thêm</a>
</div>
<!-- filter other -->
<div class="filter-other">
  <div class="filter-price">
    <label>Chọn mức giá: </label>
    <a href="">Dưới 2 triệu</a>
    <a href="">Từ 2 - 4 triệu</a>
    <a href="">Từ 4 - 7 triệu</a>
    <a href="">Từ 7 - 13 triệu</a>
    <a href="">Trên 13 triệu</a>
  </div>
  <div class="filter-feature">
    <label class="criteria js-filter-feature" id="js-filter-feature"> <span>Bộ lọc</span><i class="fa fa-caret-down"></i>
    </label>
    <div class="content-feature js-content-feature" style="display: none">
      <label class="closefeature"><i class="fal fa-times-circle"></i></label>
      <div class="content-feature-list">
        <div class="content-feature-item">
          <label>Loại điện thoại</label>
          <div class="barpage-item">
            <label class="barpage-title">Điện thoại phổ thông
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Android
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">iPhone (IOS)
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="content-feature-item">
          <label>Dung lượng pin</label>
          <div class="barpage-item">
            <label class="barpage-title">Từ 3000 đến 5000 mAh
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Pin khủng trên 5000 mAh
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="content-feature-item">
          <label>Dung lượng RAM</label>
          <div class="barpage-item">
            <label class="barpage-title">Dưới 4GB
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Từ 4 - 6GB
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">8GB Trở lên
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
      </div>
      <div class="content-feature-list">
        <div class="content-feature-item">
          <label>Bộ nhớ trong</label>
          <div class="barpage-item">
            <label class="barpage-title">Dưới 32GB
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Từ 32-64GB
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Từ 128-256GB
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">512GB Trở lên
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="content-feature-item">
          <label>Tính năng Camera</label>
          <div class="barpage-item">
            <label class="barpage-title">Camera góc rộng
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Camera xóa phông
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Camera zoom chụp xa
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Camera macro chụp cận cảnh
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="content-feature-item">
          <label>Tính năng đặc biệt</label>
          <div class="barpage-item">
            <label class="barpage-title">Bảo mật khuôn mặt
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Bảo mật vân tay
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Sạc pin nhanh 
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Sạc không dây
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Chống nước, bụi
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
      </div>
      <div class="filter-feature-more js-filter-feature-more">
        Xem thêm tính năng khác <i class="fa fa-caret-down" ></i>
      </div>
      <div class="content-feature-list" style="border-bottom: none; display: none;">
        <div class="content-feature-item">
          <label>Kiểu màn hình</label>
          <div class="barpage-item">
            <label class="barpage-title">Siêu tràn viền
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Tràn viền(tai thỏ, giọt nước,..)
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="content-feature-item">
          <label>Kích thước màn hình</label>
          <div class="barpage-item">
            <label class="barpage-title">Màn hình lớn 6 in trở lên
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Nhỏ gọn, dễ cầm
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="content-feature-item">
          <label>Chất liệu vỏ</label>
          <div class="barpage-item">
            <label class="barpage-title">Kim loại
              <input type="checkbox" >
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="barpage-item">
            <label class="barpage-title">Kim loại và kính
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
      <label class="barpage-title">Độc quyền
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