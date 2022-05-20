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
              <li class="breadcrumb-item active">Product Image Add</li>
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
                <h3 class="card-title">category Create <small>Edit the details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('backend.pages.productimage.add') }}" enctype="multipart/form-data">
                          <!-- {{ csrf_field() }} -->
                          @csrf
                <div class="card-body">
                  @include('layouts.message')
                   

                     

                    
                   <div class="form-group">
        
                  <div class="row">
                    <div class="col-md-4">
                       <label>product Image</label>
                      <input type="file" class="form-control" name="image">
                    </div>

                    <div class="col-md-4">
                      
                      <input type="hidden" class="form-control" name="id" value="{{$product_id}}">
                    </div>
                    
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add product Image</button>
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