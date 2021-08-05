<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-center">
        <th><input type="checkbox" name="selectAll"></th>
        <th>Ảnh</th>
        <th>Tên</th>
        <th style="max-width:200px">Email</th>
        <th>Quyền hạn</th>
        <th>Trạng thái</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody class="">
      @foreach ($items as $item) 
        <tr class="text-center">
          <td><input type="checkbox" name="select[]"></td>
          <td>
            @if($item->avatar != null)
              <img src="{{ asset('images/users'. $item->avatar) }}" alt="IMG">
            @else
              <img src="{{ asset('images/users/avatar.jpg' ) }}" alt="IMG">
            @endif
          </td>
          <td >{{ $item->name }}</td>
          <td style="max-width:200px">{{ $item->email }}</td>
          <td>quyền</td>
          <td><a href="{{route($controllerName.'.status',['active', $item->id] )}}" class='text-decoration-none text-white {{$item->getStatus($item->active)['class']}}'>{{ $item->getStatus($item->active)['name'] }}</a></td>
          <td>
            @can('edit-'.$controllerName)
              <a class="btn btn-outline-primary" href="{{ route($controllerName.'.edit',$item->id ) }}"><i class="fas fa-pencil-alt"></i> Sửa</a>
            @endcan
            @can('delete-'.$controllerName)
              <a class="btn btn-outline-danger js-btn-delete" href="{{ route($controllerName.'.destroy',$item->id ) }}" data-url="{{ route($controllerName.'.destroy', $item->id ) }}"><i class="fad fa-trash-alt"></i> Xóa</a>
            @endcan
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
