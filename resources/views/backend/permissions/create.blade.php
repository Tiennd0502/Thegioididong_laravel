@extends('backend.master')
@section('title', 'Thêm quyền')
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
              Quyền
            </a>
          </li>
          <li class="breadcrumb-item active">
            <span>Thêm quyền</span>
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
  <form action="{{ route($controllerName . '.store') }}" method="POST" autocomplete="off">
    @csrf
    {{-- <input type="hidden" name="created_by" value='' id="created_by"> --}}
    <div class="form-row">
      <div class="form-group col-md-8">
        <label for="js-role-id">Module </label>
        <select class="w-100 h-auto rounded" name="module_parent" id="js-module-id">
          <option value="">Chọn module</option>
          @if(!empty($modulesParent))
            @foreach ($modulesParent as $key => $itemParent)
              <option value="{{ $key}}" {{ (old('module_parent') == $key ) ? 'selected' :'' }}>{{ ucfirst($itemParent) }}</option>
            @endforeach
          @endif
        </select>
        @error('module_parent')
          <div class="error-text">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="col-md-8 mb-3">
        <div class="card">
          <div class="card-header bg-info text-white">
            <div class="checkbox checkbox-success">
                <input id="check-all" class="js-permission" type="checkbox" name="" value="">
                <label for="check-all"> Chọn tất cả</label>
            </div>
          </div>
          <div class="card-body">
            @foreach ($modulesChild as $key => $itemChild)
              <div class="checkbox checkbox-success d-inline-block mr-3">
                <input id="{{ $key }}" class="permission-children" type="checkbox" name="module_child[]" value="{{ $key }}">
                <label for="{{ $key }}" class="font-weight-bold">{{ $itemChild }}</label>
              </div>
            @endforeach
          </div>
        </div>
        @error('module_child')
          <div class="error-text d-block">
            {{ $message }}
          </div>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Lưu lại</button>
    <button type="reset" class="btn btn-primary">Nhập lại</button>
    <a href="{{ route($controllerName . '.index') }}" class="btn btn-primary">Danh sách quyền</a>
  </form>
@endsection
