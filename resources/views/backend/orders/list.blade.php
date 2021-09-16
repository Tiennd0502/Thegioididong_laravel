<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-center">
        <th><input type="checkbox" name="selectAll"></th>
        <th>Tên KH</th>
        <th>SĐT</th>
        <th style="max-width:250px">Địa chỉ giao hàng</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item) 
        <tr class="text-center">
          <td><input type="checkbox" name="select[]"></td>
          <td >{{ $item->name }}</td>
          <td >{{ $item->phone }}</td>
          <td style="max-width:250px">{{ $item->address }}</td>
          <td>
            {{-- <a href="" class='text-decoration-none text-white {{$item->getStatus($item->status)['class']}}'>{{ $item->getStatus($item->status)['name'] }}</a> --}}
            <select class="form-control " id="js-order-status{{$item->id}}">
              <option value="0" {{ $item->status == 0 ? 'selected' : ''}}> Đơn mới đặt</option>
              <option value="1" {{ $item->status == 1 ? 'selected' : ''}}> Đang vận chuyển</option>
              <option value="2" {{ $item->status == 2 ? 'selected' : ''}}> Đã giao hàng</option>
              <option value="3" {{ $item->status == 3 ? 'selected' : ''}}> Đã hủy</option>
            </select>
          </td>
          <td>
            @can('show-'.$controllerName)
              <a class="btn btn-outline-success" href="{{ route($controllerName.'.show',$item->id ) }}"><i class="fad fa-eye"></i> Xem </a>
            @endcan
            @can('edit-'.$controllerName)
              <a class="btn btn-outline-primary js-btn-save-change-order-status" data-url="{{ route($controllerName.'.update',$item->id)}}" data-id="{{$item->id}}"><i class="fas fa-pencil-alt"></i> Lưu lại</a>
              @endcan
            @can('delete-'.$controllerName)
              <a class="btn btn-outline-danger js-btn-delete" data-url="{{ route($controllerName.'.destroy', $item->id ) }}"><i class="fad fa-trash-alt"></i> Xóa</a>
            @endcan

          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
