@extends('backend.master')
@section('title','Sửa thông số')

@section('content')

	<!-- Page Heading -->
	<div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="" class="text-decoration-none ">
              <i class="fas fa-tachometer-alt mr-1"></i> 
              Trang chủ</a>
					</li>
					<li class="breadcrumb-item">
						<a href="{{ route($controllerName.'.index') }}" class="text-decoration-none ">
							Thông số
						</a>
					</li>
					<li class="breadcrumb-item active">
						<span>Sửa thông số</span>
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

	@if (session('error'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>{{ session('error') }} </strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	<!-- form thêm danh mục -->
	<form action="{{ route($controllerName.'.update', $item->id) }}" method="POST" id="createbrand" autocomplete="off" enctype="multipart/form-data">
		@csrf
		@method('PUT')
    
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="exampleInputName">Tên thông số</label>
				<input type="text" name="name" class="form-control" value='{{ !empty(old('name')) ? old('name') : $item->name }}' id="exampleInputName" placeholder="Tên danh mục">
				@error('name')
					<div class='error-text'> {{ $message }} </div>
				@enderror
			</div>
			
      <div class="form-group col-md-6">
				<label for="value">Giá trị</label>
				<input type="text" name="value" class="form-control" value='{{ old('value', $item->value) }}' id="value" placeholder="">
				@error('value')
					<div class='error-text'> {{ $message }} </div>
				@enderror
			</div>
      
		</div>
    <button type="submit" name="update" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="{{ route($controllerName.'.index')}}" class="btn btn-primary">Danh sách thông số</a>
  </form>
@endsection