@extends('backend.master')
@section('title', 'Thêm thành viên')
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
            <a href="{{ route($controllerName . '.index') }}" class="text-decoration-none ">
              Thành viên
            </a>
          </li>
          <li class="breadcrumb-item active">
            <span>Thêm thành viên</span>
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
  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{ session('error') }} </strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif
  <!-- form thêm slider -->
  <form action="{{ route($controllerName . '.store') }}" method="POST" id="createSlider" autocomplete="off" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="created_by" value='' id="created_by">
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="name">Tên đăng nhập</label>
        <input type="text" name="name" class="form-control" value='{{ old('name') }}' id="name"
          placeholder="Tên đăng nhập">
        @error('name')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-md-8 ">
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="********">
        @error('password')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-md-8 ">
        <label for="email">Email</label>
        <input type="text" name='email' class="form-control" value='{{ old('email') }}' id="email" placeholder="Email">
        @error('email')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-md-8">
        <label for="active">Trạng thái</label>
        <select id="active" class="form-control" name="active">
          <option value="1" {{ (old('active') == '1' ) ? 'selected' :'' }}>Kích hoạt</option>
          <option value="0" {{ (old('active') == '0' ) ? 'selected' :'' }}>Hủy kích hoạt</option>
        </select>
      </div>
      <div class="form-group col-md-8">
        <label for="js-role-id">Vai trò</label>
        <select class="w-100 h-auto rounded" name="role_id[]" id="js-role-id" multiple>
          <option value=""></option>
          @if(!empty($roles))
            @foreach ($roles as $role)
              <option value="{{ $role->id }}" {{ (old('role_id') == $role->id ) ? 'selected' :'' }}>{{ ucfirst($role->name) }}</option>
            @endforeach
          @endif
        </select>
        @error('role_id')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-md-8">
        <div class="form-upload" id="Avatar">
          <label class="insert-attach" for="image-avatar"><i class="fas fa-camera-retro mr-2"></i> Ảnh đại diện( Chỉ
            chọn 1 ảnh)</label>
        </div>
        <div class="list-attach">
          <ul class="attach-view avatar-image">
            <li class="img-box d-none">
              <input type="file" id="image-avatar" value="{{ old('avatar')}}" name="avatar" class="form-control js-image-item d-none">
              <span class="icon-close"><i class="fas fa-times-circle"></i></span>
              <img src="" class="delete_img">
            </li>
            <li class="" id="insert-attach-image">
              <label class="insert-attach" for="image-avatar"><i class="fas fa-plus"></i></label>
            </li>
          </ul>
        </div>
        @error('avatar')
          <div class='error-text'> {{ $message }} </div>
        @enderror
      </div>
      
    </div>
    <button type="submit" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="{{ route($controllerName . '.index') }}" class="btn btn-primary">Danh sách thành viên</a>
  </form>
@endsection
