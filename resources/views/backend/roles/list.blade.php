<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-center">
        <th><input type="checkbox" name="selectAll"></th>
        <th>Id</th>
        <th>Tên vai trò</th>
        <th>Mô tả vai trò</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody class="">
      @foreach ($items as $item) 
        <tr class="text-center">
          <td><input type="checkbox" name="select[]"></td>
          <td>{{ $item->id}}</td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->display_name }}</td>
          <td>
            @can('show-'.$controllerName)
              <a class="btn btn-outline-success" href="{{ route($controllerName.'.show',$item->id ) }}"><i class="fad fa-eye"></i> Xem </a>
            @endcan
            @can('edit-'.$controllerName)
              <a class="btn btn-outline-primary" href="{{ route($controllerName.'.edit',$item->id ) }}"><i class="fas fa-pencil-alt"></i> Sửa</a>
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
