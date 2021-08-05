<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-center">
        <th><input type="checkbox" name="checkAll"></th>
        <th>Tên thông số</th>
        <th class="text-center">Giá trị</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item)
        <tr class="text-center">
          <td><input type="checkbox" name="check[]"></td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->value }}</td>
          <td>
            @can('show-'.$controllerName)
            <a class="btn btn-outline-success" href="{{ route($controllerName.'.copy',$item->id ) }}"><i class="fad fa-copy"></i> Copy</a>
            @endcan
            @can('edit-'.$controllerName)
              <a class="btn btn-outline-primary" href="{{ route($controllerName.'.edit',$item->id)}}"><i class="fas fa-pencil-alt"></i> Sửa</a>
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