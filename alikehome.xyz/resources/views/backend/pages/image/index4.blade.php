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
      <th scope="col">#</th>
      
     <!--  <th scope="col">Note</th>
      <th scope="col">Sell Description</th>
      <th scope="col">Sell Note</th> -->
      <th scope="col">Product Link</th>
      <th scope="col">image Active</th>
      <th scope="col">Action</th>
      <th scope="col">Date</th>
   
      
    </tr>
  </thead>
  <tbody>

  <?php $i=1; ?>
  @foreach ($image as $image)
 
    <tr>
      <th scope="row"><?php echo $i++ ?></th> 
   <!--    <th scope="row">{{ $image->note }}</th>
      <td>{{ $image->sell_description }}</td> 
      <td>{{ $image->sell_note }}</td> -->
      <td>{{ $image->link }}</td>
      <td>
        <img src="{{getImage($image->image,'banner4')}}" alt="product" width="100">
      </td>
      <td>
        
     @if ( $image->active == 1 )
             ON
        @else
           OFF
           

         @endif
         

      </td>

           
<td><a href="{{ route('admin.image4.edit',$image->id) }}" class="btn btn-success"> Edit </a></td>
<td>{{ $image->created_at }}</td>   
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