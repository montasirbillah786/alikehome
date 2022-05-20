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
              <li class="breadcrumb-item active">Contact</li>
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
                <h3 class="card-title">Contact Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Email</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                   
                      
                    </tr>
                  </thead>
                  <tbody>
                <?php $i=1; ?>
                  @foreach ($newslater as $newslater)
                 
                    <tr>
                      <th scope="row"><?php echo $i++ ?></th> 
                      <th scope="row">{{ $newslater->email }}</th>
                      <th>{{$newslater->created_at }}</th>
                      
                      
                         
                     
                     <td><a href="{{route('newslater.details.delete',$newslater->id)}}" class="btn btn-danger"> Delete </a></td>
                      
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