@extends("layouts.adminmaster")

 @section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blog Create</li>
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
                <h3 class="card-title">Blog Create <small>Give the details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
                          <!-- {{ csrf_field() }} -->
                          @csrf
                <div class="card-body">
                  @include('layouts.message')
                       <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name"  placeholder="Enter Blog name">
                  </div>
                   <div class="form-group">
                    <label>Tag</label>
                    <input type="text" class="form-control" name="tag"  placeholder="Enter Blog name">
                  </div>
                  <div class="form-group">
                    <label>Description 1</label>
                     <textarea class="textarea" name="description1" placeholder="Place some text here"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 20px;"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label>Description 2</label>
                     <textarea class="textarea" name="description2" placeholder="Place some text here"
                          style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 20px;"></textarea>
                  </div>


                
                <div class="form-group">
                  <label>Blog Image</label>
                  <div class="row">
                    <div class="col-md-4">
                      <input type="file" class="form-control" name="image">
                    </div>
                    
                  </div>
                </div>
              <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Blog</button>
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