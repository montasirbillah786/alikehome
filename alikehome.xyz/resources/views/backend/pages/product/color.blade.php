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
              <li class="breadcrumb-item active">Color Create</li>
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
          <div class="col-md-6">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">color Create <small>Give the details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('admin.color.store') }}" enctype="multipart/form-data">
                          <!-- {{ csrf_field() }} -->
                          @csrf
                <div class="card-body">
                  @include('layouts.message')
                     <div class="form-group">
                        <label>Color</label>
                        <input type="hidden" class="form-control" name="product_id"  value="{{$products->id}}"placeholder="Enter color name">
                        <input type="text" class="form-control" name="name"  placeholder="Enter Color name">
                      </div>
               
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Color</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
           <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$products->title}} Details</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th>Color</th>
                    <th scope="col">Action</th>

                  </tr>
                  </thead>
                  <tbody>
                 <?php $i=1; ?>
                  @foreach (App\Color::where('product_id',$products->id)->get() as $color)
                 
                    <tr>
                      <th scope="row"><?php echo $i++ ?></th> 
                      <td>{{ $color->colors }}</td>
                      

                          
                          <td><a href="{{ route('backend.pages.product_color.delete',$color->id) }}" class="btn btn-danger"> Delete </a></td>

                      
                    </tr>
              
              @endforeach
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


 @endsection