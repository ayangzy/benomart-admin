
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
          <li class="active"><a href="#">Products</a></li>
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

                    <form action="{{ route('products.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="categories" class="col-sm-2 control-label">Category </label>
                            <div class="col-md-10">
                            <select class="form-control select2 @error('category') is-invalid @enderror " style="width: 100%;" name="category"  id="category_id">
                              <option  value="" selected="selected">Select a Category</option>

                            </select>
                             @error('category')
                              <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>

                          </div>

                          <div class="form-group row">
                            <label for="categories" class="col-md-2 control-label">Sub-Category </label>
                            <div class="col-md-10">
                            <select class="form-control select2 @error('subcategory') is-invalid @enderror " style="width: 100%;" name="subcategory" id="subcategory_id">
                                <option value="" selected="selected">Select subcategory</option>
                            </select>
                             @error('subcategory')
                              <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                              </span>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="productName" class="col-sm-2 control-label">Product Name </label>
                            <div class="col-md-10">
                                <input type="text" name="productName" class="form-control @error('productName') is-invalid @enderror" id="productName" placeholder="Enter Product Name" value="{{ old('productName') }}">

                                @error('productName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productPrice" class="col-sm-2 control-label">Product Price </label>
                            <div class="col-md-10">
                                <input type="text" name="productPrice" class="form-control @error('productPrice') is-invalid @enderror" id="productPrice" placeholder="Enter Product Price" value="{{ old('productPrice') }}">

                                @error('productPrice')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="productSize" class="col-sm-2 control-label">Product Quantity</label>
                            <div class="col-md-10">
                                <input type="text" name="productSize" class="form-control @error('productSize') is-invalid @enderror" id="productSize" placeholder="Enter Product Quantity (optional)" value="{{ old('productSize') }}">

                                @error('productSize')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div>


                        {{-- <div class="form-group row">
                            <label for="productColor" class="col-sm-2 control-label">Product Color </label>
                            <div class="col-md-10">
                                <input type="text" name="productColor" class="form-control @error('productColor') is-invalid @enderror" id="productColor" placeholder="Enter Product Color (optional)" value="{{ old('productColor') }}">

                                @error('productColor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div> --}}

                        <div class="form-group row">
                            <label for="productColor" class="col-sm-2 control-label">Product Description</label>
                            <div class="col-md-10">
                                <textarea name="productDescription" class="form-control @error('productDescription') is-invalid @enderror" id="editor1" name="editor1" rows="5" cols="5" placeholder="Enter Product Description">{{ old('productDescription') }}</textarea>

                                @error('productDescription')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productImage1" class="col-sm-2 control-label">Product Image1</label>
                            <div class="col-md-10">

                             <input type="file" class="form-control @error('productImage1') is-invalid @enderror"  name="productImage1">


                              @error('productImage1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productImage" class="col-sm-2 control-label">Product Image2 </label>
                            <div class="col-md-10">


                            <input type="file" class="form-control @error('productImage2') is-invalid @enderror" id="customFile" name="productImage2">

                            @error('productImage2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                             @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productPrice" class="col-sm-2 control-label">Product Image3 </label>
                            <div class="col-md-10">
                                <input type="file" class="form-control @error('productImage3') is-invalid @enderror" id="customFile" name="productImage3">

                                @error('productImage3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                 @enderror
                            </div>
                        </div>

                <!-- /.box-body -->

                <div class="box-footer">
                    <div class="form-group">
                        <label for="submit" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary pull-left">Save Product</button>
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



