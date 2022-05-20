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
                      
                      <th scope="col">Email</th>
                      <th scope="col">Name</th>
                      <th scope="col">Blog Name</th>
                      <th scope="col">Blog comment</th>
                      <th scope="col">Active</th>
                      
                  
                      <th scope="col">Action</th>
                      <th scope="col">Action</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   <?php $i=1; ?>
                    @foreach ($blog as $blog)
                   
                      <tr>
                        <th scope="row"><?php echo $i++ ?></th> 
                        
                        <td>{{ $blog->email }}</td>
                        <td>{{ $blog->name }}</td>
                        <td>
                          @foreach(App\Blog::where('id',$blog->blog_id)->get() as $parent)

                          {{ $parent->name }}

                          @endforeach


                        </td>
                        <td>{{ $blog->comment }}</td>
                        <td><?php if($blog->active == 0) {?>
                          
                         <button class="btn btn-danger btn-sm">Inactive</button>

                       <?php } else { ?>

                          <button class="btn btn-success btn-sm">Active</button>
                        <?php } ?>


                        </td>
                        <td><a href="{{ route('admin.blogcomment.edit',$blog->id) }}" class="btn btn-success"> Edit </a></td>
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