@extends('backend.master')
@section('title','Đánh giá chi tiết')
@section('content')
	<!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Quản lý đánh giá sản phẩm
        {{-- <small class="text-secondary">Thống kê tổng quan</small> --}}
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="" class="text-decoration-none ">
              <i class="fas fa-tachometer-alt mr-1"></i>
              Trang chủ</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ route($controllerName . '.index') }}" class="text-decoration-none ">
              Đánh giá sản phẩm
            </a>
          </li>
          <li class="breadcrumb-item active">
            <span>Đánh giá chi tiết sản phẩm </span>
          </li>
        </ol>
      </nav>
    </div>
  </div>
  @if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('message') }} </strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <div class="row mb-2">
    <div class="col-10">
      <form class="form-inline" action="" method="get">
        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm trang" aria-label="Search"
          style="width: 25%" name="name" value='{{ \Request::get('name')}}'>
        <button class="btn btn-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
    {{-- <div class="col-md-2 text-right">
      <a href="{{ route($controllerName . '.create') }}" class="text-success p-2" data-toggle="tooltip" data-placement="top"
        title data-original-title="Thêm mới"><i class="fad fa-2x fa-plus-circle"></i></a>
    </div> --}}
  </div>
  <div class="table-responsive mt-4">
    <table class="table table-hover">
      <thead class="text-left text-uppercase">
        <tr class="text-center">
          <th><input type="checkbox" name="selectAll"></th>
          <th> Mã đánh giá</th>
          <th> Tên khách hàng</th>
          <th> Số sao</th>
          <th style="max-width: 250px"> Nội dung </th>
          <th> Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($items as $item) 
          <tr class="text-center">
            <td><input type="checkbox" name="select[]"></td>
            <td> {{ $item->id }}</td>
            <td> {{ $item->customer->name }}</td>
            <td> {{ $item->rating }} <i class=" ml-1 text-warning fas fa-star voted"></i></td>
            <td style="max-width: 250px"> {{ $item->content }}</td>
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
  {{ $items->links() }}
  <button type="button" class="btn btn-outline-dark" id="js-selectAll">Chọn tất cả</button>
  <button type="button" class="btn btn-outline-dark" id="js-deselectAll">Bỏ chọn tất cả</button>
  <button type="submit" class="btn btn-outline-dark">Xóa các mục đã chọn</button>
@endsection