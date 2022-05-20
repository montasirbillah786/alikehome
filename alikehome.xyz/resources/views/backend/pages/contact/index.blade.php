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
                      <th scope="col">Phone Number</th>
                      <th scope="col">Address</th>
                      <th scope="col">Facebook</th>
                      <th scope="col">Instagram</th>
                      <th scope="col">Twitter</th>
                  
                  
                      <th scope="col">Action</th>
                   
                      
                    </tr>
                  </thead>
                  <tbody>
                <?php $i=1; ?>
                  @foreach ($contact as $contact)
                 
                    <tr>
                      <th scope="row"><?php echo $i++ ?></th> 
                      <th scope="row">{{ $contact->email }}</th>
                      <td>{{ $contact->phone_number }}</td>
                      <td>{{ $contact->address }}</td>
                      <td>{{ $contact->facebook }}</td>
                      <td>{{ $contact->instagram }}</td>
                       <td>{{ $contact->twitter }}</td>
                      
                      
                         
                     <td><a href="{{ route('admin.contact.edit',$contact->id) }}" class="btn btn-danger"> update </a></td>
                      
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