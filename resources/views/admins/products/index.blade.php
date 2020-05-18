
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
          <li class="active"><a href="{{ route('products.create') }}">Add product</a></li>

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
                <h3 class="box-title">Product Lists</h3>
                <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
              </div>
              <!-- /.box-header -->
              <!-- form start -->

                <div class="box-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                            <th>Image</th>
                              <th>Category</th>
                              <th>SubCategory</th>
                              <th>Product Name</th>
                              <th>Product Price</th>
                              <th>Created Date</th>
                              <th>Last Updated</th>
                              <th colspan="2">Actions</th>

                            </tr>
                            </thead>
                           <tbody>

                            @foreach($products as $product)
                            <tr>
                                <td><a href=""><img src="{{ asset($product->productImage1) }}" width="40"></a></td>
                              <td>{{ $product->category->name }}</td>
                              <td>{{ $product->subcategory->name }}</td>
                              <td>{{$product->productName}}</td>
                              <td>{{ $product->productPrice }}</td>

                                <td>{{$product->created_at}}</td>
                                 <td>{{$product->updated_at}}</td>
                                <td class="text-center"><a href="{{ route('products.edit', $product->slug) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit {{ $product->productName }}">
                                  <i class="fas fa fa-edit"></i>
                                  </a></td>
                                <td class="text-center">
                                  <form action="{{ route('products.destroy', $product->id) }}"  method="POST" class="form-delete">
                                     @method('DELETE') @csrf

                                <button
                                  class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are Your sure you want to delete {{ $product->productName }}') "
                                  data-toggle="tooltip" data-placement="top" title="Delete {{ $product->productName }}">
                                  <i class="fas fa fa-trash"></i>
                                </button>
                              </form>
                                </td>
                            </tr>

                             @endforeach

                           </tbody>
                           <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Category</th>
                                <th>SubCategory</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Created Date</th>
                                <th>Last Updated</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </tfoot>
                      </table>

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



