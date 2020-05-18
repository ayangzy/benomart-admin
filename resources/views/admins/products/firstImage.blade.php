
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
         Products
          <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active"><a href="{{ route('products.edit', $product->slug) }}">Products</a></li>

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
                <h3 class="box-title">Add Product</h3>
                <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
              </div>
              <!-- /.box-header -->
              <!-- form start -->

                <div class="box-body">

                    <form action="{{ route('products.updateFirstImage', $product->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="productName" class="col-sm-2 col-form-label">Product Name </label>
                            <div class="col-md-10">
                                <input type="text" name="productName" class="form-control" id="productName" placeholder="Enter Product Name" value="{{ $product->productName }}" readonly>


                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="productImage1" class="col-sm-2 col-form-label">Product Image1</label>
                            <div class="col-md-10">
                                <img src="{{ asset($product->productImage1) }}" width="60">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productImage1" class="col-sm-2 col-form-label">New Product Image1</label>
                            <div class="col-md-10">

                                <input type="file" class="form-control"  name="productImage1">

                            </div>
                        </div>

                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group row">
                        <label for="submit" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary pull-left">Update Product Image</button>

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
  <script src="{{ asset('js/app.js') }}"></script>
@endsection



