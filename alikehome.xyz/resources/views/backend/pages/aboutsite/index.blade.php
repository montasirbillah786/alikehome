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
              <li class="breadcrumb-item active">About</li>
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
                <h3 class="card-title">About Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      <th scope="col">No</th>
                      <th scope="col">Description</th>
                      <th scope="col">Action</th>
                   
                      
                    </tr>
                  </thead>
                  <tbody>
                <?php $i=1; ?>
                  @foreach ($aboutsite as $aboutsite)
                 
                    <tr>
                      <th scope="row"><?php echo $i++ ?></th> 
                      <th scope="row">{!! $aboutsite->description !!}</th>
                      
                      
                      
                         
                     <td><a href="{{ route('admin.aboutsite.edit',$aboutsite->id) }}" class="btn btn-danger"> update </a></td>
                      
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