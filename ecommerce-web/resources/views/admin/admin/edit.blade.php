@extends('admin.layouts.app')
@section('style')
@endsection

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Admin</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">

                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="card-body">
                                    <div class="form-group">
                                        <label >Name</label>
                                        <input type="text" class="form-control" value="{{old('name',$getRecord->name)}}" name="name" required placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label >Email</label>
                                        <input type="email" class="form-control" value="{{old('email',$getRecord->email)}}" name="email" required placeholder="Enter Email">
                                    </div>

                                    <div class="form-group">
                                        <label >Password</label>
                                        <input type="password" class="form-control"  name="password" required placeholder="Password">
                                    </div>

                                    <div class="form-group">
                                        <label >Status</label>
                                        <select class="form-group" name="status"  required>
                                            <option {{($getRecord->status == 0) ? 'selected' : ''}} value="0">Active</option>
                                            <option {{($getRecord->status == 1) ? 'selected' : ''}} value="1">Inactive</option>

                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>
                </div>

            </div>
        </section>

    </div>
@endsection

@section('script')
    <!-- <script src="{{url('assets/dist/js/pages/dashboard3.js')}}"></script> -->
@endsection
