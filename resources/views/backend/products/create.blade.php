@extends('backend.master')
@section('title', 'Thêm sản phẩm')

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
              Sản phẩm
            </a>
          </li>
          <li class="breadcrumb-item active">
            <span>Thêm sản phẩm</span>
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
  <form action="{{ route($controllerName . '.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
          <label for="Name">Tên sản phẩm</label>
          <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="Name"
            placeholder="Tên sản phẩm">
          @error('name')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Mô tả ngắn về sản phẩm</label>
          <textarea class="form-control" id="description" rows="4" name='description'></textarea>
          @error('description')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>

        <div class="form-group">
          <label for="title_seo">Metal title</label>
          <input type="text" name="title_seo" class="form-control" value="{{ old('title_seo') }}" id="title_seo"
            placeholder="Meta title">
          @error('title_seo')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="description_seo">Meta description</label>
          <input type="text" name="description_seo" class="form-control" value="{{ old('description_seo') }}"
            id="description_seo" placeholder="Meta description ">
          @error('description_seo')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="keyword_seo">Meta Keyword</label>
          <input type="text" name="keyword_seo" class="form-control" value="{{ old('keyword_seo') }}" id="keyword_seo"
            placeholder="Meta keyword">
        </div>
        <div class="form-row" id="form-row">
          <div class="form-group col-md-6">
            <label for="Price">Đơn giá</label>
            <input type="text" name="price" class="form-control" id="Price" placeholder="Đơn giá"
              value="{{ old('price') }}">
            @error('price')
              <div class='error-text'> {{ $message }} </div>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="Discount">Giảm giá( %)</label>
            <input type="text" name="discount" class="form-control" id="Discount" value="{{ old('discount') }}"
              placeholder="Giảm giá">
          </div>
          <div class="form-group col-md-6">
            <label for="Gift">Quà tặng kèm</label>
            <input type="text" name="gift" class="form-control" id="Gift" placeholder="Quà tặng kèm"
              value="{{ old('gift') }}">
          </div>

          <div class="form-group col-md-6 ">
            <label for="parameter">Tùy chỉnh thông số sản phẩm</label>

            {{-- <input type="hidden" name="check-parameter" id="js-total-parameter" value='@if (!empty($parameters))@foreach ($parameters as $key =>$item)@if($key == 0){{trim($item->name)}}@else{{trim('@'.$item->name)}}@endif @endforeach @endif'> --}}

            <div class="form-row">
              <div class="col">
                <select name='parameter' id='js-parameter-value' class="w-100 h-100 " >
                  <option value="">Chọn thông số sản phẩm</option>
                  @php
                    $totalParameter = '';
                  @endphp  
                  @if (!empty($parameters))
                    @foreach ($parameters as $key => $parameter)
                      <option value="{{ $parameter->name }}">{{ $parameter->name }}</option>
                      @php
                        if($key == 0){
                          $totalParameter .=trim($parameter->name);
                        }else{
                          $totalParameter .= trim('@'.$parameter->name);
                        }
                      @endphp
                    @endforeach
                  @endif
                </select>
              </div>
              <button type="button" id="js-addParameterForPrd" class="btn btn-outline-success outline-none col-3">Thêm </button>

              <input type="hidden" id="js-total-parameter" value='{{$totalParameter}}'>
              <input type="hidden" id="js-check-parameter" value=''>
              <input type="hidden" id="js-temp-parameter" value=''>
            </div>
          </div>
          {{-- content parameter --}}
          <div class="form-group col-md-12 view-parameter" style="display:none" id='js-view-parameter'>
            <label for="parameter" class="font-weight-bold">Các thông số của sản phẩm</label>
            <div class="accordion" id="js-parameter" data-count='0'></div>
          </div>
          {{-- End content parameter --}}

        </div>
        <div class="form-group">
          <label for="Content">Bài viết về sản phẩm</label>
          <textarea name="content" id="Content">
            {{ old('content') }}
          </textarea>
          @error('content')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
      </div>

      <div class="col-md-4 border-left">
        <div class="form-group mb-3 ">
          <label for="category">Danh mục sản phẩm</label>
          <select id="js-category-id" name="category_id" class="w-100 h-auto">
            <option value="">Chọn danh mục cho sản phẩm</option>
            @if (!empty($categories))
              @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                  {{ $category->name }}</option>
              @endforeach
            @endif
          </select>
          @error('category_id')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>

        <div class="form-group mb-3">
          <label for="brands">Thương hiệu</label>
          <select id="js-brand-id" name="brand_id" class="w-100 h-auto">
            <option value="">Chọn thương hiệu cho sản phẩm</option>
            {{-- @if (!empty($brands))
              @foreach ($brands as $brand)
                <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                  {{ $brand->name }}</option>
              @endforeach
            @endif --}}
          </select>
          @error('brand_id')
            <div class='error-text'> {{ $message }} </div>
          @enderror
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" id="hot" name="hot" value='1'>
          <label class="form-check-label" for="hot">
            Sản phẩm nổi bật
          </label>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" name="active" id="active" value='1' checked>
          <label class="form-check-label" for="active">
            Hiển thị
          </label>
        </div>

        <div class="form-group mb-3">
          <div class="form-upload" id="Avatar">
            <label class="insert-attach" for="image-avatar"><i class="fas fa-camera-retro mr-2"></i> Ảnh đại diện( Chỉ
              chọn 1 ảnh)</label>
          </div>
          <div class="list-attach">
            <ul class="attach-view">
              <li class="img-box d-none">
                <input type="file" id="image-avatar" value="" name="avatar" class="form-control js-image-item d-none">
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
        <div class="form-group mb-3 ">
          <div class="form-upload" id="Icon">
            <label class="insert-attach" for="image-icon"><i class="fas fa-camera-retro mr-2"></i> Icon( Chỉ chọn 1
              ảnh)</label>
          </div>
          <div class="list-attach">
            <ul class="attach-view">
              <li class="img-box d-none">
                <input type="file" id="image-icon" value="" name="icon" class="form-control js-image-item d-none">
                <span class="icon-close"><i class="fas fa-times-circle"></i></span>
                <img src="" class="delete_img">
              </li>
              <li class="" id="insert-attach-image">
                <label class="insert-attach" for="image-icon"><i class="fas fa-plus"></i></label>
              </li>
            </ul>
          </div>
        </div>
        <div class="form-group mb-3 ">
          <div class="form-upload" id="Image_hot">
            <label class="insert-attach" for="image-hot"><i class="fas fa-camera-retro mr-2"></i> Ảnh nổi bật nhất( Chỉ chọn 1 ảnh)</label>
          </div>
          <div class="list-attach img-carousel">
            <ul class="attach-view" id="attach-view-image_hot">
              <li class="img-box d-none">
                <input type="file" id="image-hot" value="" name="image_hot" class="form-control js-image-item d-none">
                <span class="icon-close"><i class="fas fa-times-circle"></i></span>
                <img src="" class="delete_img">
              </li>
              <li class="" id="insert-attach-image">
                <label class="insert-attach" for="image-hot"><i class="fas fa-plus"></i></label>
              </li>
            </ul>
          </div>
        </div>
        <div class="form-group mb-3 ">
          <div class="form-upload" id="Library">
            <label class="insert-attach js-insert-attach" data-name='library'><i class="fas fa-camera-retro mr-2"></i> Ảnh chi tiết</label>
          </div>
          <div class="list-attach">
            <ul class="attach-view" id="attach-view-library">
              <li class="" id="insert-attach-library">
                <label class="insert-attach js-insert-attach" data-name='library'><i class="fas fa-plus"></i></label>
              </li>
            </ul>
          </div>
        </div>
        
        <div class="form-group mb-3">
          <div class="form-upload" id="Carousel">
            <label class="insert-attach js-insert-attach" data-name='carousel'><i class="fas fa-camera-retro mr-2"></i>
              Ảnh carousel( ảnh slide)</label>
          </div>
          <div class="list-attach img-carousel">
            <ul class="attach-view" id="attach-view-carousel">
              <li class="" id="insert-attach-carousel">
                <label class="insert-attach js-insert-attach" data-name='carousel'><i class="fas fa-plus"></i></label>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <button type="submit" name="create" class="btn btn-primary" id="submitProduct">Lưu lại</button>
      <button type="reset" class="btn btn-primary">Nhập lại</button>
      <a href="{{ route($controllerName . '.index') }}" class="btn btn-primary">Danh sách sản phẩm</a>
    </div>
  </form>


  {{-- include modal --}}
  @include('backend.products.parameter_modal')

  <script type="text/javascript" src="{{ asset('libs/ckeditor/ckeditor.js') }}"></script>
  <script>
    CKEDITOR.replace('Content');
  </script>

@endsection
