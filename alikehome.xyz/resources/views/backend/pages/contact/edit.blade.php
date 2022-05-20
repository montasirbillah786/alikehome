@extends("layouts.adminmaster")

 @section('content')


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact Create</li>
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
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Contact Create <small>Give the details</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('admin.contact.update',$contact->id) }}" enctype="multipart/form-data">
                          <!-- {{ csrf_field() }} -->
                          @csrf
                <div class="card-body">
                  @include('layouts.message')
                       <div class="form-group">
        <label>email</label>
        <input type="text" class="form-control" name="email"  placeholder="Enter contact name" value="{{ $contact->email }}" >
      </div>
      <div class="form-group">
        <label>Phone Number</label>
        <input type="text" class="form-control" name="phone_number"  placeholder="Enter contact name" value="{{ $contact->phone_number }}" >
      </div>
      <div class="form-group">
        <label>address</label>
        <input type="text" class="form-control" name="address"  placeholder="Enter contact name" value="{{ $contact->address }}" >
      </div>
      <div class="form-group">
        <label>facebook</label>
        <input type="text" class="form-control" name="facebook"  placeholder="Enter contact name" value="{{ $contact->facebook }}" >
      </div>
      <div class="form-group">
        <label>instagram</label>
        <input type="text" class="form-control" name="instagram"  placeholder="Enter contact name" value="{{ $contact->instagram }}" >
      </div>
      <div class="form-group">
        <label>twitter</label>
        <input type="text" class="form-control" name="twitter"  placeholder="Enter contact name" value="{{ $contact->twitter }}" >
      </div>


                
            
              <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Contact</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


 @endsection