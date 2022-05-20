@extends("layouts.vendormaster")

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
              <li class="breadcrumb-item active">Categories</li>
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
                <h3 class="card-title">Categories Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  	<th scope="col">No</th>
                    <th>Parent category Name</th>
                    <th>Category Name</th>
                    <th>Category Description</th>
                    <th>Category Image</th>
                    <th>Parent Category</th>

                    <th scope="col">Action</th>
                      <th scope="col">Action</th>

                  </tr>
                  </thead>
                  <tbody>
                 <?php $i=1; ?>
                  @foreach ($categories as $categories)
                 
                    <tr>
                      <th scope="row"><?php echo $i++ ?></th> 
                      <th scope="row">{{ $categories->id }}</th>
                      <td>{{ $categories->name }}</td>
                      <td>{{ $categories->description }}</td>
                      <td>
                        <img src="{{asset('public/img/categories/'.$categories->image)}}" alt="product" width="100">
                      </td>
                      <td>
                        

                        @if ( $categories->parent_id == NULL )
                             primary Category
                        @else
                           {{ $categories->parent->name }}
                           

                         @endif   

                      </td>

                          <td><a href="{{ route('vendor.pages.category.edit.delete',$categories->id) }}" class="btn btn-success"> Edit </a></td>
                          <td><a href="{{ route('vendor.pages.category.delete',$categories->id) }}" class="btn btn-danger"> Delete </a></td>

                      
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