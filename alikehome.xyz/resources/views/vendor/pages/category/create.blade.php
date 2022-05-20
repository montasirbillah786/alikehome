@extends("layouts.vendormaster")

 @section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Validation</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">category Create</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">category Create <small>Give the details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('vendor.admin.category.store') }}" enctype="multipart/form-data">
                          <!-- {{ csrf_field() }} -->
                          @csrf
                <div class="card-body">
                  @include('layouts.message')
                     <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter Category name">
                      </div>
                   <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" cols="80" rows="8" class="form-control"></textarea>
                      </div>

                      <div class="form-group">
                        <label>Parent Category</label>

                        <select class="form-control" name="parent_id">
                          <option value=" "> Choce a Category </option>
                          @foreach ($main_categories as $main_categories)
                          <option value="{{ $main_categories->id }}"> {{ $main_categories->name }} </option>

                          @endforeach
                        </select>
                            </div>


                    <div class="form-group">
                      <label>Category Image</label>
                      <div class="row">
                        <div class="col-md-4">
                          <input type="file" class="form-control" name="image">
                        </div>

                      </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


 @endsection
