@extends('backend.master')
@section('title', 'Thành viên quản trị')
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
				Quản lý thành viên
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="admin/" class="text-decoration-none ">
              <i class="fas fa-tachometer-alt mr-1"></i> 
              Trang chủ</a>
					</li>
					<li class="breadcrumb-item">
						<a href="{{ route($controllerName.'.index') }}" class="text-decoration-none ">
							Thành viên
						</a>
					</li>
					<li class="breadcrumb-item active">
						<span>Danh sách thành viên</span>
					</li>
        </ol>
      </nav>
    </div>
  </div>
  @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('message')}} </strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <div class="row mb-2">
    <div class="col-10">
      <form class="form-inline" action="" method="GET">
        @csrf
        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm slider" aria-label="Search" style="width: 25%" name="name" value='{{ \Request::get('name')}}'>
        <select class="form-control mr-2" id="page" name="page_id">
          <option value="">Xem tất cả các quyền</option>
          {{-- @if(!empty($pages))
            @foreach ($pages as $page)
              <option value="{{ $page->id }}" {{( \Request::get('page_id') == $page->id ) ? 'selected' :'' }}>{{ $page->name }}</option>
            @endforeach 
          @endif  --}}
          </select>
        <button class="btn btn-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
    <div class="col-md-2 text-right">
      @can('add-'.$controllerName)
          <a href="{{ route($controllerName . '.create') }}" class="text-success p-2" data-toggle="tooltip" data-placement="top"
          title data-original-title="Thêm mới"><i class="fad fa-2x fa-plus-circle"></i></a>
        @endcan
      </div>
  </div>
<!-- Danh sách  -->
  @include('backend.'.$controllerName.'s.list')
  
  {{ $items->links() }}

  @can('delete-'.$controllerName)
    <button type="button" class="btn btn-outline-dark" id="js-selectAll">Chọn tất cả</button>
    <button type="button" class="btn btn-outline-dark" id="js-deselectAll">Bỏ chọn tất cả</button>
    <button type="submit" class="btn btn-outline-dark">Xóa các mục đã chọn</button>
  @endcan

  @can('add-'.$controllerName)
  <a href="{{ route($controllerName.'.create') }}" class="btn btn-success" >Thêm trang</a>
  @endcan
@endsection