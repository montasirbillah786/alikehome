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
              <li class="breadcrumb-item active">Product Image</li>
              <li class="breadcrumb-item active"><a href="{{ route('backend.pages.product.add_multiple_image',$product_image->id) }}" class="btn btn-success">Add Image</a></li>
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
                  <th scope="col">Product Image</th>
                  <th scope="col">Product Image</th>
                  <th scope="col">Action</th>
                  <th scope="col">Action</th>
                  
                </tr>
                  </thead>
                  <tbody>

           <?php $i=1; ?>
  @foreach (App\ProductImage::where('product_id',$product_image->id)->get() as $product_image)
 
    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td><img src="{{getImage($product_image->image,'product')}}" alt="product" width="100"></td>
      <td>{{$product_image->image}}</td>
     
     <td><a href="{{ route('backend.pages.productimage.edit',$product_image->id) }}" class="btn btn-success"> Edit </a></td>
      <td><a href="{{ route('backend.pages.productimage.delete',$product_image->id) }}" class="btn btn-danger"> Delete </a></td>

      
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