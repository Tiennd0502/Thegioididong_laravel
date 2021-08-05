<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-center">
        <th><input type="checkbox" name="selectAll"></th>
        <th >Ảnh</th>
        <th>Tiêu đề</th>
        {{-- <th>Mô tả</th> --}}
        <th >Trạng thái</th>
        <th >Ngày tạo</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
       
      @foreach ($items as $item) 
        <tr class="text-center">
          <td><input type="checkbox" name="select[]"></td>
          <td>
            @if(!empty($item->avatar))
              <img src="{{ asset('images/posts'.$item->avatar) }}" alt="IMG">
            @endif
          </td>
          <td style="max-width:150px">{{ $item->name }}</td>
          {{-- <td class="" style="max-width:300px;">{{ $item->description }}</td> --}}

          <td ><a href="{{route($controllerName.'.status',['active', $item->id] )}}" class='text-decoration-none text-white {{$item->getStatus($item->active)['class']}}'>{{ $item->getStatus($item->active)['name'] }}</a></td>
          <td >{{$item->created_at}}</td>
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
