<div class="filter-trademark">
  @foreach ($brands as $key => $brand)
    <a href="javascript:void(0)" class="js-trademark {{ ($key > 6) ? 'name-trandemark' : '' }}" data-id="{{ $brand->id }}" data-name="{{ $brand->name }}"><img src="{{ asset('images/brands'.$brand->avatar) }}" alt=""></a>
  @endforeach
   <a href="javascript:;" id="trademark-more" style="border-top: 1px solid #eee">Xem thêm</a>
</div>
<div class="filter-other trademark-watch">
  <div class="filter-price">
    <label>Chọn mức giá: </label>
    <a href="">Dưới 5 triệu</a>
    <a href="">Từ 5 - 10 triệu</a>
    <a href="">Từ 10 - 15 triệu</a>
    <a href="">Từ 15 - 20 triệu</a>
    <a href="">Trên 20 triệu</a>
  </div>
  <div class="filter-barpage ">
    <div class="barpage-item">
      <label class="barpage-title" for="js-discount">Giảm giá
        <input type="checkbox" id="js-discount">
        <span class="checkmark"></span>
      </label>
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