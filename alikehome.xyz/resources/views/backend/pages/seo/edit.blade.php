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
                            <li class="breadcrumb-item active">Seo Edit</li>
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
                                <h3 class="card-title">Edit <small>Give the details</small></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post" action="{{ route('backend.pages.seoSystemIdPost',$data->id) }}" enctype="multipart/form-data">

                                @csrf

                                <div class="form-group">

                                    @include('layouts.message')


                                </div>
                                <div class="form-group">
                                    <label>Seo Title</label>
                                    <input type="text" class="form-control" name="seo_title"  placeholder="Enter Note" value="{{$data->seo_title}}" >
                                </div>
                                <div class="form-group">
                                    <label>Seo keyword</label>
                                    <textarea class="form-control" name="seo_keyword">{{$data->seo_keyword}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Seo Description</label>
                                    <textarea class="form-control" name="seo_description">{{$data->seo_description}}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary" style="margin: 20px;">Edit seo</button>
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
