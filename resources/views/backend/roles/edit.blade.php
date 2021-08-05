@extends('backend.master')
@section('title', 'Sửa vai trò')
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
              Vai trò
            </a>
          </li>
          <li class="breadcrumb-item active">
            <span>Sửa vai trò</span>
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
  <!-- form edit slider -->
  <form action="{{ route($controllerName . '.update', $item->id) }}" method="POST" id="createSlider" autocomplete="off"
    enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="exampleInputName">Tên vai trò</label>
        <input type="text" name="name" class="form-control"
          value='{{ !empty(old('name')) ? old('name') : $item->name }}' id="exampleInputName" placeholder="Tên vai trò">
        @error('name')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group col-md-8">
        <label for="display_name">Mô tả vai trò</label>
        <input type="text" name='display_name' class="form-control"
          value='{{ !empty(old('display_name')) ? old('display_name') : $item->display_name }}' id="display_name" placeholder="Mô tả vai trò">
        @error('display_name')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>
    <div class="row">
      <div class="form-group col-12">
        <h5 class="checkbox checkbox-success">
          <input id="check-all" class="js-check-all" type="checkbox" >
          <label for="check-all"> Chọn toàn bộ</label>
        </h5>
      </div>
      @foreach($permissions as $permission)
        <div class="col-4 col-md-3 mb-4">
          <div class="card h-100">
            <div class="card-header bg-info text-white">
              <div class="checkbox checkbox-success">
                  <input id="permission{{$permission->id}}" class="js-permission" type="checkbox" name="permission_id[]" value="{{$permission->id}}" {{$permissionsOfRole->contains('id',$permission->id) ? 'checked': ''}}>
                  <label for="permission{{$permission->id}}"> {{ $permission->name }}</label>
              </div>
            </div>
            <div class="card-body">
              @foreach($permission->permissionsChildren as $children)
                <div class="checkbox checkbox-success" >
                  <input id="permission{{$children->id}}" class="permission-children" type="checkbox" name="permission_id[]" value="{{$children->id}}" {{$permissionsOfRole->contains('id',$children->id) ? 'checked': ( !$permissionsOfRole->contains('id',$permission->id) ?'disabled' : '')}}>
                  <label for="permission{{$children->id}}"> {{ $children->name }}</label>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <button type="submit" name="create" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="{{ route($controllerName . '.index') }}" class="btn btn-primary">Danh sách vai trò</a>
  </form>
@endsection
