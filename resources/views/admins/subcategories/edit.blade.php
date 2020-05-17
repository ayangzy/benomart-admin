
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
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form class="form-horizontal" action="{{ route('subcategories.update', $subcategory->id) }}" method="post">
                  @csrf
                <div class="box-body">
                    {{method_field('PUT')}}
                    <div class="form-group row">
                      <label for="categories" class="col-sm-2 control-label">Select Category :</label>
                      <div class="col-md-10">
                      <select class="form-control select2 @error('category_id') is-invalid @enderror " style="width: 100%;" name="category_id">
                     @foreach ($categories as $category)
                        <option value="{{$category->id}}"

                        @if($subcategory->category->id == $category->id)
                            selected
                        @endif
                        >
                        {{$category->name}}
                        </option>

                     @endforeach
                      </select>
                       @error('category_id')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>

                    </div>
                  <div class="form-group  has-feedback">
                    <label for="name" class="col-sm-2 control-label">Subcategory Name</label>

                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category Name" value="{{ $subcategory->name }}">

                      @error('name')
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
                            <button type="submit" class="btn btn-info pull-left">Update Subcategory</button>
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



