@extends("layouts.adminmaster")

 @section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Brand</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Brand Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      
                      <th scope="col">Blog Name</th>
                      <th scope="col">Tag</th>
                      <th scope="col">Blog Description1</th>
                      <th scope="col">Blog Description2</th>
                      <th scope="col">Blog Image</th>
                      
                  
                      <th scope="col">Action</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php $i=1; ?>
                    @foreach ($blog as $blog)
                   
                      <tr>
                        <th scope="row"><?php echo $i++ ?></th> 
                        
                        <td>{{ $blog->name }}</td>
                        <td>{{ $blog->tag }}</td>
                        <td>{!! $blog->description1 !!}</td>
                        <td>{!! $blog->description2 !!}</td>
                        <td>
                          <img src="{{asset('public/img/blog/'.$blog->image)}}" alt="product" width="100">
                        </td>
                        <td><a href="{{ route('admin.blog.edit',$blog->id) }}" class="btn btn-success"> Edit </a></td>
                       <td><a href="{{ route('admin.blog.delete',$blog->id) }}" class="btn btn-danger"> Delete </a></td>


                        
                      </tr>

              
              @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



 @endsection