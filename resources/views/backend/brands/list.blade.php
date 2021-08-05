<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-center">
        <th><input type="checkbox" name="checkAll"></th>
        <th class="text-center">Logo</th>
        <th>Tên thương hiệu</th>
        <th>Danh mục</th>
        <th class="text-center">Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item)
        <tr class="text-center">
          <td><input type="checkbox" name="check[]"></td>
          <td ><img src="{{ asset('images/brands'.$item->avatar) }}" alt=""></td>
          <td>{{ $item->name }}</td>
          <td>{{ $item->category->name }}</td>
          <td><a href="{{route($controllerName.'.status',['active', $item->id] )}}" class='text-decoration-none text-white {{$item->getStatus($item->active)['class']}}'>{{ $item->getStatus($item->active)['name'] }}</a></td>
          <td>
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