<!-- thương hiệu -->
<div class="filter-trademark trademark-watch">
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