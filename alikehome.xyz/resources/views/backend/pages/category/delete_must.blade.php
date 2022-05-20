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
              <li class="breadcrumb-item active">Product </li>
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
                  <th scope="col">Product Title</th>
                  <th scope="col">Product Description</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">Product Quantity</th>
                  <th scope="col">Product Category</th>
                  <th scope="col">Product Brand</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                </tr>
                  </thead>
                  <tbody>
           <?php $i=1; ?>
  @foreach ($products as $products)
 
    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td>{{ $products->title }}</td>
      <td>{{ $products->description }}</td>
      <td>{{ $products->price }}</td>
      <td>{{ $products->quantity }}</td>
      <td>{{$products->category->name}}</td>
      <td>{{$products->brand->name}}</td>
      <td><a href="{{ route('backend.pages.product.edit',$products->id) }}" class="btn btn-success"> Edit </a></td>
      <td><a href="{{ route('backend.pages.product.delete',$products->id) }}" class="btn btn-danger"> Delete </a></td>
      <td><a href="{{ route('backend.pages.product.show_image',$products->id) }}" class="btn btn-primary"> Show Image </a></td>
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