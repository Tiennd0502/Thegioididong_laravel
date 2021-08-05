<div class="table-responsive mt-4">
  <table class="table table-hover">
    <thead class="text-left text-uppercase">
      <tr class="text-center">
        <th><input type="checkbox" name="selectAll"></th>
        <th> Ảnh SP</th>
        <th> Tên SP</th>
        <th> Số sao</th>
        <th> Số lần </th>
        <th> Thao tác</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($items as $item) 
        <tr class="text-center">
          <td><input type="checkbox" name="select[]"></td>
          <td><img src="{{ asset('images/products'.$item->product_avatar) }}" alt=""></td>
          <td> {{ $item->product_name }}</td>
          <td> {{ round($item->avg_rating, 1, PHP_ROUND_HALF_EVEN) }} <i class=" ml-1 text-warning fas fa-star voted"></i></td>
          <td> {{ $item->number_reviews }}</td>
          <td>
            @can('show-'.$controllerName)
              <a class="btn btn-outline-success" href="{{ route($controllerName.'.show',$item->product_id ) }}"><i class="fad fa-eye"></i> Xem </a>
            @endcan
            @can('delete-'.$controllerName)
              <a class="btn btn-outline-danger js-btn-delete" data-url="{{ route($controllerName.'.destroys', $item->product_id ) }}"><i class="fad fa-trash-alt"></i> Xóa</a>
            @endcan
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>