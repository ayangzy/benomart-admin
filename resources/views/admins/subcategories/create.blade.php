
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
              <div class="box-body">
              <form class="form-horizontal" action="{{ route('subcategories.store') }}" method="post">
                  @csrf

                    <div class="form-group row">
                        <label for="categories" class="col-sm-2 control-label">Select Category :</label>
                        <div class="col-md-10">
                        <select class="form-control select2 @error('category') is-invalid @enderror " style="width: 100%;" name="category">
                          <option selected="selected" value="">Select a Category</option>
                          @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                         @error('category')
                          <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                        </div>

                      </div>
                  <div class="form-group  has-feedback">
                    <label for="name" class="col-sm-2 control-label">Subcategory Name</label>

                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category Name">

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
                    <div class="form-group row">
                        <label for="submit" class="col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary pull-left">Save Subcategory</button>
                        </div>
                      </div>

                </div>
                <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box -->

            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">All Categories List</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Category Name</th>
                          <th>SubCategory</th>
                          <th>Created Date</th>
                          <th>Last Updated</th>
                          <th>Edit</th>
                          <th>Delete</th>

                        </tr>
                        </thead>
                       <tbody>
                       @foreach ($subcategories as $subcategory)
                           <tr>
                           <td>{{$subcategory->category->name}}</td>
                           <td>{{$subcategory->name}}</td>
                           <td>{{$subcategory->created_at}}</td>
                           <td>{{$subcategory->updated_at}}</td>
                           <td class="text-center"><a href="{{route('subcategories.edit', $subcategory->slug)}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit {{ $subcategory->name }} under {{$subcategory->category->name}}">
                              <i class="fas fa fa-edit"></i>
                              </a></td>
                            <td class="text-center">
                              <form
                            action="{{route('subcategories.destroy', $subcategory->id)}}"
                            method="POST"
                            class="form-delete"
                          >
                            @method('DELETE') @csrf
                            <button
                              class="btn btn-danger btn-sm"
                              onclick="return confirm('Are you sure you want to delete this category {{ $subcategory->name }}?')"
                              data-toggle="tooltip" data-placement="top" title="Delete {{ $subcategory->name }} under {{$subcategory->category->name}}">
                              <i class="fas fa fa-trash"></i>
                            </button>
                          </form>
                            </td>
                           </tr>
                       @endforeach

                       </tbody>
                        <tfoot>
                        <tr>
                          <th>Category Name</th>
                          <th>SubCategory</th>
                          <th>Created Date</th>
                          <th>Last Updated</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                        </tfoot>
                      </table>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
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



