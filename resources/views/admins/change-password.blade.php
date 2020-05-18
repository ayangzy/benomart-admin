
@extends('layouts.app')


@section('content')
<div class="wrapper">

    <header class="main-header">
        @include('includes.header')
    </header>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        @include('includes.sidebar')
        <!-- /.sidebar -->
      </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Subcategories
          <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><a href="#">Subcategories</a></li>

        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Create a Subcategory</h3>
                <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                  @csrf
                <div class="box-body">

                    <form action="{{ route('newPassword') }}" method="POST" class="form-horizontal">
                        @csrf
                    <div class="form-group row">
                        <label for="old_password" class="col-sm-2 control-label">Old Password</label>
                        <div class="col-md-10">
                            <input type="text" name="old_password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" placeholder="Enter old password" value="{{ old('old_password') }}">

                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="new_password" class="col-sm-2 control-label">New password </label>
                        <div class="col-md-10">
                            <input type="text" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" placeholder="Enter new_password" value="{{ old('new_password') }}">

                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="new_confirm_password" class="col-sm-2 control-label">New Confirm Password</label>
                        <div class="col-md-10">
                            <input type="text" name="new_confirm_password" class="form-control @error('new_confirm_password') is-invalid @enderror" id="new_confirm_password" placeholder="Enter confirm password" value="{{ old('new_confirm_password') }}">

                            @error('new_confirm_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <div class="form-group">
                        <label for="submit" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary pull-left">Change Password</button>
                        </div>
                      </div>

                </div>
                <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box -->


          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
     @include('includes.footer')
    </footer>


    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
@endsection



