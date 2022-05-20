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
              <li class="breadcrumb-item active">Slider Create</li>
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
                <h3 class="card-title">Slider Create <small>Give the details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('admin.image2.update',$store->id) }}" enctype="multipart/form-data">

              @csrf

        <div class="form-group">
      

      @include('layouts.message')
      
    </div>
    
    <div class="form-group">
      <label>Link</label>
      <input type="text" class="form-control" name="link"  placeholder="Enter Product Link" value="{{ $store->link }}">
    </div>

  <div class="form-group">
    <label>banner old Image</label>
    <div class="row">
      <div class="col-md-4">

        <img src="{{getImage($store->image,'banner2')}}" alt="product" width="100"> <br>

    <label>banner  Image</label>
        <input type="file" class="form-control" name="image">
      </div>
      
    </div>
  </div>

    <select class="form-control" name="active">
  <option value=" "> @if ( $store->active == 1 )
             ON
        @else
           OFF
           

         @endif </option>
  <option value="1">On</option>
  <option value="0">off</option>
  
</select>
   
   
  <button type="submit" class="btn btn-primary" style="margin: 20px;">Add Banner Image</button>
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