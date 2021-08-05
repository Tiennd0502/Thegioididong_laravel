@extends('backend.master')
@section('title','Thêm thông số')

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
						<span>Thêm thông số</span>
					</li>
        </ol>
      </nav>
    </div>
  </div>
  @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>{{ session('message') }} </strong>
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
	<!-- form thêm thông số -->
	<form action="{{ route($controllerName.'.store') }}" method="POST" id="createCategory" autocomplete="on" enctype="multipart/form-data">
		@csrf
		
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="exampleInputName">Tên thông số</label>
				<input type="text" name="name" class="form-control" value='{{ old('name') }}' id="exampleInputName" placeholder="Tên thông số">
				@error('name')
					<div class='error-text'> {{ $message }} </div>
				@enderror
			</div>
      <div class="form-group col-md-6">
				<label for="value">Giá trị</label>
				<input type="text" name="value" class="form-control" value='{{ old('value') }}' id="value" placeholder='OLED6.7"Super Retina XDR'>
				@error('value')
					<div class='error-text'> {{ $message }} </div>
				@enderror
			</div>
      
		</div>
    <button type="submit" name="create" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="{{ route($controllerName.'.index')}}" class="btn btn-primary">Danh sách thông số</a>
  </form>
@endsection