@extends('backend.master')
@section('title', 'Thêm trang')
@section('content')
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="" class="text-decoration-none "><i class="fas fa-tachometer-alt mr-1"></i> Trang chủ</a>
					</li>
					<li class="breadcrumb-item">
						<a href="{{ route($controllerName.'.index') }}" class="text-decoration-none ">
							Trang
						</a>
					</li>
					
					<li class="breadcrumb-item active">
						<span>Danh sách trang</span>
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
  <!-- form thêm slider -->
	<form action="{{ route($controllerName.'.store') }}" method="POST" id="createSlider" autocomplete="off" enctype="multipart/form-data">
    @csrf
    {{-- <input type="hidden" name="created_by" value='MyAdmin' id="created_by"> --}}
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="exampleInputName">Tên trang</label>
				<input type="text" name="name" class="form-control" value='{{ old('name') }}' id="exampleInputName" placeholder="Tên trang">
				@error('name')
					<div class='error-text'> {{ $message }} </div>
				@enderror
      </div>
      {{-- <div class="form-group col-md-6">
				<label for="link">Link</label>
				<input type="text" name='link' class="form-control" value='{{ old('link') }}' id="link" placeholder="Link liên kết">
				@error('link')
					<div class='error-text'> {{ $message }} </div>
				@enderror
      </div> --}}
		</div>
    <button type="submit" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="{{ route($controllerName.'.index')}}" class="btn btn-primary">Danh sách trang</a>
  </form>
@endsection