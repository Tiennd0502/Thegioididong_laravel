@if (count($item->parameters))
  <h2>Thông số kỹ</h2>
  <div class="specification">
    @foreach ($item->parameters as $key => $parameter)
      @if ($key == 10)
          @break
      @endif
      <div class="specification-item">
        <span class="capitalize">{{ $parameter->name }}:</span>
        <span class="capitalize">{{ $parameter->value }}</span>  
      </div>
    @endforeach
  </div>
  <div class="view-detail-more">
    Xem thêm cấu hình chi tiết
  </div>
@endif
