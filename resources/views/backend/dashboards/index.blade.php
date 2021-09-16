@extends('backend.master')
@section('title', 'Trang')
@section('content')
  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Thông tin thống kê
        {{-- <small class="text-secondary">Thống kê tổng quan</small> --}}
      </h1>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="" class="text-decoration-none ">
              <i class="fas fa-tachometer-alt mr-1"></i>
              Trang chủ</a>
          </li>
          {{-- <li class="breadcrumb-item">
            <a href="{{ route($controllerName . '.index') }}" class="text-decoration-none ">
              Trang thống kê
            </a>
          </li> --}}
          <li class="breadcrumb-item active">
            <span>Trang thống kê</span>
          </li>
        </ol>
      </nav>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-md-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="mini-stat clearfix">
            <span class="mini-stat-icon bg-purple mr-0 float-right"><i class="fad fa-shopping-basket"></i></span>
            <div class="mini-stat-info">
              <span class="counter text-purple">{{ $total_sales }}</span>
              Tổng doanh số
            </div>
            {{-- <div class="clearfix"></div>
            <p class=" mb-0 mt-4 text-muted fs-15">Tổng thu: $22506 <span class="float-right"><i
                  class="fa fa-caret-up mr-1"></i>10.25%</span></p> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="mini-stat clearfix">
            <span class="mini-stat-icon bg-blue-grey mr-0 float-right"><i class="fad fa-cart-plus"></i></span>
            <div class="mini-stat-info">
              <span class="counter text-blue-grey">{{ $count_new_orders }}</span>
              Đơn hàng mới
            </div>
            {{-- <div class="clearfix"></div>
            <p class="text-muted mb-0 mt-4 fs-15">Tổng thu: $22506 <span class="float-right"><i
              class="fa fa-caret-up mr-1"></i>10.25%</span></p> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="mini-stat clearfix">
            <span class="mini-stat-icon bg-brown mr-0 float-right"><i class="fab fa-buffer"></i></span>
            <div class="mini-stat-info">
              <span class="counter text-brown">{{ $count_total_users }}</span>
              Người dùng mới
            </div>
            {{-- <div class="clearfix"></div>
            <p class="text-muted mb-0 mt-4 fs-15">Tổng thu: $22506 <span class="float-right"><i
                  class="fa fa-caret-up mr-1"></i>10.25%</span></p> --}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card">
        <div class="card-body">
          <div class="mini-stat clearfix">
            <span class="mini-stat-icon bg-teal mr-0 float-right"><i class="fad fa-mug-marshmallows"></i></span>
            <div class="mini-stat-info">
              <span class="counter text-teal">{{ $unique_visitors }}</span>
              Số lượng khách truy cập
            </div>
            {{-- <div class="clearfix"></div>
            <p class="text-muted mb-0 mt-4 fs-15">Tổng thu: $22506 <span class="float-right"><i
                  class="fa fa-caret-up mr-1"></i>10.25%</span></p> --}}
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="row mb-4">

    <div class="col-xl-9">

      <div class="row">
        <div class="col-md-9 monthly-earning-wid">
          <div class="card" style="height: 480px;">
            <div class="card-body">
              <h4 class="card-title">Thu nhập hàng tháng</h4>

              <div class="text-center">
                <div class="btn-group mt-4" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-secondary js-filter-order" data-key="day">Ngày</button>
                  <button type="button" class="btn btn-secondary js-filter-order" data-key="month">Tháng</button>
                  <button type="button" class="btn btn-secondary js-filter-order" data-key="year">Năm</button>
                </div>
              </div>

              <div id="combine-chart" dir="ltr"></div>

            </div>
          </div>
        </div>
        <div class="col-md-3 earning-wid">
          <div class="card" style="height: 480px;">
            <div class="card-body">
              <div class="mb-4">
                <p>Thu nhập tuần</p>
                <h5>$1,542</h5>
                <span class="peity-line" data-width="100%"
                  data-peity='{ "fill": ["rgba(103,168,228,0.3)"],"stroke": ["rgba(103,168,228,0.8)"]}'
                  data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
              </div>
              <div class="mb-4">
                <p>Thu nhập tháng</p>
                <h5>$6,451</h5>
                <span class="peity-line" data-width="100%"
                  data-peity='{ "fill": ["rgba(74,193,142,0.3)"],"stroke": ["rgba(74,193,142,0.8)"]}'
                  data-height="60">6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
              </div>
              <div class="mb-4">
                <p>Thu nhập năm</p>
                <h5>$84,574</h5>
                <span class="peity-line" data-width="100%"
                  data-peity='{ "fill": ["rgba(232, 65, 38,0.3)"],"stroke": ["rgba(232, 65, 38,0.8)"]}'
                  data-height="60">6,2,8,4,3,8,1,3,6,5,9,2,8,1,4,8,9,8,2,1</span>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="col-xl-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">Phân tích bán hàng</h4>

          <div class="row text-center mt-4 pt-3">
            <div class="col-6">
              <h5 class="mb-0 font-size-18">25610</h5>
              <p class="text-muted">Đã kích hoạt</p>
            </div>
            <div class="col-6">
              <h5 class="mb-0 font-size-18">56210</h5>
              <p class="text-muted">Chưa giải quyết</p>
            </div>
          </div>


          <div id="donut-chart" dir="ltr"></div>

        </div>
      </div>
    </div>

  </div>
  <!-- end row -->


  <div class="row mb-4">
    <div class="col-xl-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Cổ phiếu gần đây</h4>

          <div class="text-center">
            <div dir="ltr">
              <input class="knob" data-width="120" data-height="120" data-linecap=round data-fgColor="#ffbb44" value="80"
                data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />
            </div>

            <div class="clearfix"></div>
            <a href="#" class="btn btn-sm btn-warning mt-4">Xem tất cả dữ liệu</a>
            <ul class="list-inline row mt-4 clearfix">
              <li class="col-6">
                <p class="mb-1 font-size-18 font-weight-bold">7,541</p>
                <p class="mb-0">Điện thoại di động</p>
              </li>
              <li class="col-6">
                <p class="mb-1 font-size-18 font-weight-bold">125</p>
                <p class="mb-0">Máy tính để bàn</p>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Đơn đặt hàng</h4>

          <div class="text-center">
            <div dir="ltr">
              <input class="knob" data-width="120" data-height="120" data-linecap=round data-fgColor="#4ac18e" value="{{ $count_total_orders}}"
                data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />
            </div>

            <div class="clearfix"></div>
            <a href="#" class="btn btn-sm btn-success mt-4">Xem tất cả dữ liệu</a>
            <ul class="list-inline row mt-4 clearfix">
              <li class="col-6">
                <p class="mb-1 font-size-18 font-weight-bold">2,541</p>
                <p class="mb-0">Điện thoại di động</p>
              </li>
              <li class="col-6">
                <p class="mb-1 font-size-18 font-weight-bold">874</p>
                <p class="mb-0">Máy tính để bàn</p>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Đơn hàng đã giao</h4>

          <div class="text-center">
            <div dir="ltr">
              <input class="knob" data-width="120" data-height="120" data-linecap=round data-fgColor="#8d6e63" value="{{ $count_shipped_orders}}"
                data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />
            </div>

            <div class="clearfix"></div>
            <a href="#" class="btn btn-sm btn-brown mt-4">Xem tất cả dữ liệu</a>
            <ul class="list-inline row mt-4 clearfix">
              <li class="col-6">
                <p class="mb-1 font-size-18 font-weight-bold">1,154</p>
                <p class="mb-0">Điện thoại di động</p>
              </li>
              <li class="col-6">
                <p class="mb-1 font-size-18 font-weight-bold">89</p>
                <p class="mb-0">Máy tính để bàn</p>
              </li>
            </ul>

          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Đơn hàng đã hủy</h4>

          <div class="text-center">
            <div dir="ltr">
              <input class="knob" data-width="120" data-height="120" data-linecap=round data-fgColor="#90a4ae" value="{{ $count_cancel_orders}}"
                data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />
            </div>

            <div class="clearfix"></div>
            <a href="#" class="btn btn-sm btn-blue-grey mt-4">Xem tất cả dữ liệu</a>
            <ul class="list-inline row mt-4 clearfix">
              <li class="col-6">
                <p class="mb-1 font-size-18 font-weight-bold">95</p>
                <p class="mb-0">Điện thoại di động</p>
              </li>
              <li class="col-6">
                <p class="mb-1 font-size-18 font-weight-bold">25</p>
                <p class="mb-0">Máy tính để bàn</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- end row -->

  <div class="row mb-4">
    <div class="col-xl-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">Giao dịch mới nhất</h4>

          <div class="table-responsive">
            <table class="table table-centered table-vertical table-nowrap mb-0">

              <tbody>
                  <tr>
                    <td>
                      <img src="{{ asset('images/users/avatar-2.jpg') }}" alt="user-image" class="avatar-sm rounded-circle mr-2" />
                      Herbert C. Patton
                    </td>
                    <td><i class="fas fa-circle text-success"></i> Xác nhận</td>
                    <td>
                      $14,584
                      <p class="m-0 text-muted font-size-14">Tổng</p>
                    </td>
                    <td>
                      5/12/2016
                      <p class="m-0 text-muted font-size-14">Ngày đặt</p>
                    </td>
                    <td>
                      <button type="button" class="btn btn-secondary btn-sm waves-effect">Sửa</button>
                    </td>
                  </tr>

                <tr>
                  <td>
                    <img src="{{ asset('images/users/avatar-3.jpg') }}" alt="user-image" class="avatar-sm rounded-circle mr-2" />
                    Mathias N. Klausen
                  </td>
                  <td><i class="fas fa-circle text-warning"></i> Chờ thanh toán</td>
                  <td>
                    $8,541
                    <p class="m-0 text-muted font-size-14">Số lượng</p>
                  </td>
                  <td>
                    10/11/2016
                    <p class="m-0 text-muted font-size-14">Ngày tháng</p>
                  </td>
                  <td>
                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Sửa</button>
                  </td>
                </tr>

                <tr>
                  <td>
                    <img src="{{ asset('images/users/avatar-4.jpg') }}" alt="user-image" class="avatar-sm rounded-circle mr-2" />
                    Nikolaj S. Henriksen
                  </td>
                  <td><i class="fas fa-circle text-success"></i> Xác nhận</td>
                  <td>
                    $954
                    <p class="m-0 text-muted font-size-14">Số lượng</p>
                  </td>
                  <td>
                    8/11/2016
                    <p class="m-0 text-muted font-size-14">Ngày tháng</p>
                  </td>
                  <td>
                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Sửa</button>
                  </td>
                </tr>

                <tr>
                  <td>
                    <img src="{{ asset('images/users/avatar-5.jpg') }}" alt="user-image" class="avatar-sm rounded-circle mr-2" />
                    Lasse C. Overgaard
                  </td>
                  <td><i class="fas fa-circle text-danger"></i>Thanh toán đã hết hạn</td>
                  <td>
                    $44,584
                    <p class="m-0 text-muted font-size-14">Số lượng</p>
                  </td>
                  <td>
                    7/11/2016
                    <p class="m-0 text-muted font-size-14">Ngày tháng</p>
                  </td>
                  <td>
                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Sửa</button>
                  </td>
                </tr>

                <tr>
                  <td>
                    <img src="{{ asset('images/users/avatar-6.jpg') }}" alt="user-image" class="avatar-sm rounded-circle mr-2" />
                    Kasper S. Jessen
                  </td>
                  <td><i class="fas fa-circle text-success"></i> Xác nhận</td>
                  <td>
                    $8,844
                    <p class="m-0 text-muted font-size-14">Số lượng</p>
                  </td>
                  <td>
                    1/11/2016
                    <p class="m-0 text-muted font-size-14">Ngày tháng</p>
                  </td>
                  <td>
                    <button type="button" class="btn btn-secondary btn-sm waves-effect">Sửa</button>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-6">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title mb-4">Đơn đặt hàng mới nhất</h4>

          <div class="table-responsive">
            <table class="table table-centered table-vertical table-nowrap mb-0">
              <tbody>
                @foreach ($total_new_orders as $itemOrder)
                  @php
                    $total_payment = 0;
                    $total_discount = 0;
                  
                    foreach ($itemOrder->products as $product){
                        $total_payment        += $product->pivot->price * $product->pivot->quantity;
                        $total_discount     +=  round($product->pivot->price * $product->pivot->quantity * $product->pivot->discount /100, -4);
                    }
                  @endphp

                  <tr>
                    <td>#{{ $itemOrder->id}}</td>
                    <td>
                      {{-- <img src="{{ asset('images/products/1.jpg') }}" alt="user-image" style="height: 48px;" class="rounded mr-2" /> --}}
                      {{ $itemOrder->name}}
                    </td>
                    <td>
                      <span class="badge badge-pill badge-success {{$itemOrder->getStatus($itemOrder->status)['class']}}">{{ $itemOrder->getStatus($itemOrder->status)['name'] }}</span>
                    </td>
                    <td>
                      {{ number_format($total_payment - $total_discount, 0, ",", ".") }}
                    </td>
                    <td>
                      {{ date('d-m-Y',strtotime($itemOrder->updated_at))}}
                    </td>
                    <td>
                      <button type="button" class="btn btn-secondary btn-sm waves-effect">Sửa</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end row -->

  
  
@endsection
