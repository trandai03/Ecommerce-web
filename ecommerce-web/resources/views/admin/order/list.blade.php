@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders List</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.layouts._message')

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Orders List</h3>
                        </div>
                        <div class="card-body p-0" style="overflow: auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Postcode</th>
                                        <th>Created By</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Discount Code</th>
                                        <th>Discount Amount ($)</th>
                                        <th>Shipping Amount ($)</th>
                                        <th>Total Amount ($)</th>
                                        <th>Status</th>
                                        <th>Created Date</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                    <tr>
                                        <td>{{$value->id}}</td>
                                        <td>{{$value->first_name}} {{$value->last_name}}</td>
                                        <td>{{$value->address_one}} <br> {{$value->address_two}}</td>
                                        <td>{{$value->state}}</td>
                                        <td>{{$value->postcode}}</td>
                                        <td>{{$value->phone}}</td>
                                        <td>{{$value->email}}</td>
                                        <td>{{$value->discount_code}}</td>
                                        <td>{{number_format($value->discount_amount, 2)}}</td>
                                        <td>{{number_format($value->shipping_amount, 2)}}</td>
                                        <td>{{number_format($value->total_amount, 2)}}</td>
                                        <td>{{($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->created_at))}}</td>
                                        <td>
                                            <a href="{{url('admin/order/edit/'.$value->id)}}" class="btn btn-primary">Edit </a>
                                            <a onclick="return confirm('Are you want to delete?');" href="{{url('admin/order/delete/'.$value->id)}}" class="btn btn-danger">Delete </a>
                                        </td>
                                    @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>

        </div>
    </section>

</div>
@endsection

@section('script')
<!-- <script src="{{url('assets/dist/js/pages/dashboard3.js')}}"></script> -->
@endsection
