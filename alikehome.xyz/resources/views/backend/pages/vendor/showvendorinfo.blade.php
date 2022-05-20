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
              <li class="breadcrumb-item active">Vendor</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Vendor Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 <tr>
                  <th scope="col">#</th>
                  <th scope="col">Shop Name</th>
                  <th scope="col">Customer Email</th>
                  <th scope="col">Shop Image</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                  
                </tr>
                  </thead>
                  <tbody>
           <?php $i=1; ?>
              @foreach ($vendor as $vendors)
             
                <tr>
                  <th scope="row"><?php echo $i++ ?></th>
                  <td>{{ $vendors->name }}</td>
                  <td>{{ $vendors->email }}</td>
                  <td>
                        <img src="{{getImage($vendors->image,'vendor')}}" alt="product" width="100"> 
                      </td>
                  <td><a href="{{ route('backend.pages.vendor.editvendorinfo',$vendors->id) }}" class="btn btn-success"> Edit </a></td>
                  <td><a href="{{route('admin.vendor.delete',$vendors->id)}}" class="btn btn-danger"> Delete </a></td>
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