<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-left">
        <th><input type="checkbox" name="selectAll"></th>
        <th>Tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>Email</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item) 
        <tr class="text-left">
          <td><input type="checkbox" name="select[]"></td>
          <td >{{ $item->name }}</td>
          <td >{{ $item->phone }}</td>
          <td>{{ $item->email }}</td>
          <td></td>
          <td>
            @can('delete-'.$controllerName)
              <a class="btn btn-outline-danger js-btn-delete" data-url="{{ route($controllerName.'.destroy', $item->id ) }}"><i class="fad fa-trash-alt"></i> Xóa</a>
            @endcan
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>