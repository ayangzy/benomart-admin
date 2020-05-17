
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
         Profile
          <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><a href="#">Create Your Profile</a></li>

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
                <h3 class="box-title">Complete Your Profile -  @if(Auth::check()) {{ Auth::user()->name }} @endif</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ route('profile.store') }}" method="post" enctype="multipart/form-data">
                  @csrf

                <div class="box-body">
                  <div class="form-group  has-feedback">
                    <label for="name" class="col-sm-2 control-label">Businsess Name</label>

                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Business Name" value="{{ old('name') }}">

                      @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                     @enderror
                    </div>

                  </div>

                  <div class="form-group row">
                    <label for="phone" class="col-sm-2 control-label">Phone Number </label>
                    <div class="col-md-10">
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Enter Phone Number" value="{{ old('phone') }}">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                </div>

                  <div class="form-group row">
                    <label for="accountname" class="col-sm-2 control-label">Account name</label>
                    <div class="col-md-10">
                        <input type="text" name="accountname" class="form-control @error('accountname') is-invalid @enderror" id="accountname" placeholder="Enter Account Name" value="{{ old('accountname') }}">

                        @error('accountname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="accountno" class="col-sm-2 control-label">Account Number </label>
                    <div class="col-md-10">
                        <input type="text" name="accountno" class="form-control @error('accountno') is-invalid @enderror" id="accountno" placeholder="Enter Account number" value="{{ old('accountno') }}">

                        @error('accountno')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="bankname" class="col-sm-2 control-label">Bank Name</label>
                    <div class="col-md-10">
                        <input type="text" name="bankname" class="form-control @error('bankname') is-invalid @enderror" id="bankname" placeholder="Enter Bank Name" value="{{ old('bankname') }}">

                        @error('bankname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productColor" class="col-sm-2 control-label">Business Address</label>
                    <div class="col-md-10">
                        <textarea name="address" class="textarea form-control @error('address') is-invalid @enderror" colspan="10" rowspan="5" placeholder="Enter Business Address">{{ old('address') }}</textarea>

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                         @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="productImage1" class="col-sm-2 control-label">Profile Picture</label>
                    <div class="col-md-10">

                     <input type="file" class="form-control @error('image') is-invalid @enderror"  name="image" value="{{ old('image') }}">


                      @error('image')
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
                            <button type="submit" class="btn btn-info pull-left">Create Profile</button>
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

