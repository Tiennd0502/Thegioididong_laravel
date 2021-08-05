@extends('backend.master')
@section('title','Thông số')
@section('content')
  <!-- Page Heading -->
	<div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Quản lý thông số của sản phẩm
        {{-- <small class="text-secondary">Thống kê tổng quan</small> --}}
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
							Thông số
						</a>
					</li>
					<li class="breadcrumb-item active">
						<span>Danh sách thông số</span>
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
    <div class="col-9">
      <form class="form-inline" action="" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm thông số" aria-label="Search" style="width: 25%" name='name' value="{{Request::get('name')}}">
        <button class="btn btn-dark my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
      </form>
    </div>
    
    <div class="col-3 text-right">
      @can('add-'.$controllerName)
        <a href="{{ route($controllerName . '.create') }}" class="text-success p-2" data-toggle="tooltip" data-placement="top"
      title data-original-title="Thêm mới"><i class="fad fa-2x fa-plus-circle"></i></a>
    @endcan
    </div>
  </div>
  <!-- Danh sách thông số -->
  
  <!-- Danh sách danh mục -->
  @include('backend.'.$controllerName.'s.list')
  
  {{ $items->links() }}

  @can('delete-'.$controllerName)
    <button type="button" class="btn btn-outline-dark" id="js-selectAll">Chọn tất cả</button>
    <button type="button" class="btn btn-outline-dark" id="js-deselectAll">Bỏ chọn tất cả</button>
    <button type="submit" class="btn btn-outline-dark">Xóa các mục đã chọn</button>
  @endcan

  @can('add-'.$controllerName)
  <a href="{{ route($controllerName.'.create') }}" class="btn btn-success" >Thêm thông số sản phẩm</a>
  @endcan
  
@endsection
