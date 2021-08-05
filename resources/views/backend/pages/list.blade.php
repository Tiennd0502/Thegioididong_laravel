<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-center">
        <th><input type="checkbox" name="selectAll"></th>
        <th>Tiêu đề</th>
        <th>Đường dẫn(link)</th>
        <th>Ngày thêm</th>
        <th>Ngày sửa</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item) 
        <tr class="text-center">
          <td><input type="checkbox" name="select[]"></td>
          <td style="max-width:200px">{{ $item->name }}</td>
          <td style="max-width:200px">{{ $item->link }}</td>
          <td>{{ $item->created_at->format('d/m/Y') }}</td>
          <td>{{ $item->updated_at->format('d/m/Y') }}</td>
          <td>
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
