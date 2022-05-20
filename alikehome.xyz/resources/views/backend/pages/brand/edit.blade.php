
@extends("layouts.adminmaster")

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
              <li class="breadcrumb-item active">Institute Create</li>
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
                <h3 class="card-title">Institute Create <small>Edit the details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('admin.brand.update',$brand->id) }}}" enctype="multipart/form-data">
                          <!-- {{ csrf_field() }} -->
                          @csrf
                <div class="card-body">
                  @include('layouts.message')
                     <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Institute name" value="{{ $brand->name }}" >
                      </div>
                   <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" cols="80" rows="8" class="form-control">{{ $brand->description }}</textarea>
                      </div>

					  <div class="form-group">
					    <label>Institute old Image</label>
					    <div class="row">
					      <div class="col-md-4">

					        <img src="{{getImage($brand->image,'brand')}}" alt="product" width="100"> <br>

					    <label>Institute  Image</label>
					        <input type="file" class="form-control" name="image">
					      </div>

					    </div>
					  </div>
                    </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Upadate Brand</button>
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
