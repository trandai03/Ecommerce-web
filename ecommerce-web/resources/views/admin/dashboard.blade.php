@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>

      </div>
    </div>
  </div>


  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Orders</span>
              <span class="info-box-number">{{$TotalOrder}}</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list-alt"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Today Orders</span>
              <span class="info-box-number">{{$TotalTodayOrder}}</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Amount</span>
              <span class="info-box-number">${{number_format($TotalAmount, 2)}}</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Today Amount</span>
              <span class="info-box-number">${{number_format($TotalTodayAmount, 2)}}</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Customers</span>
              <span class="info-box-number">{{$TotalCustomer}}</span>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Today Customers</span>
              <span class="info-box-number">{{$TotalTodayCustomer}}</span>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">Online Store Visitors</h3>
                <a href="javascript:void(0);">View Report</a>
              </div>
            </div>
            <div class="card-body">
              <div class="d-flex">
                <p class="d-flex flex-column">
                  <span class="text-bold text-lg">820</span>
                  <span>Visitors Over Time</span>
                </p>
                <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 12.5%
                  </span>
                  <span class="text-muted">Since last week</span>
                </p>
              </div>
              <!-- /.d-flex -->

              <div class="position-relative mb-4">
                <canvas id="visitors-chart" height="200"></canvas>
              </div>

              <div class="d-flex flex-row justify-content-end">
                <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> This Week
                </span>

                <span>
                  <i class="fas fa-square text-gray"></i> Last Week
                </span>
              </div>
            </div>
          </div>
          <!-- /.card -->

          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Latest Orders</h3>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Postcode</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Discount Amount ($)</th>
                                        <th>Shipping Amount ($)</th>
                                        <th>Total Amount ($)</th>
                                        <th>Created Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getLatestOrders as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->last_name}} {{$value->first_name}} </td>
                                        <td>{{$value->address_one}}</td>
                                        <td>{{$value->postcode}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{number_format($value->discount_amount, 2)}}</td>
                                        <td>{{number_format($value->shipping_amount, 2)}}</td>
                                        <td>{{number_format($value->total_amount, 2)}}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{url('admin/order/detail/'.$value->id)}}" class="btn btn-primary">Detail </a>
                                        </td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>

@endsection

@section('script')
<script src="{{url('assets/dist/js/pages/dashboard3.js')}}"></script>
@endsection