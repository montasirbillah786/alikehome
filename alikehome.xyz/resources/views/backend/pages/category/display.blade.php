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
              <li class="breadcrumb-item active">Product</li>
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
                <h3 class="card-title">Product Details</h3>
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                 <tr>
                  <th scope="col">#</th>
                  <th scope="col">Category Name</th>

                  <th scope="col">Category Description</th>
                  <th scope="col">Active</th>
            
                 
                  
                </tr>
                  </thead>
                  <tbody>
           <?php $i=1; ?>
  @foreach ($category as $category)
 
    <tr>
      <th scope="row"><?php echo $i++ ?></th>
      <td>{{ $category->name }}</td>

      <td>{{ $category->description }}</td>
      <td><a href="{{ route('ondisplay.category.show.edit',$category->id) }}" class="btn btn-success"> <?php if ($category->display == 1) {?>

        <span style="color: Black;">ON Multi Category</span>
      
    <?php  } else{?>

     <span style="color: white;">ON Single Category</span>
     <?php  }?>

    </a></td>

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