<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin.index')}}" class="nav-link">Home</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

      </li>
    </ul>

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->

      <!-- Notifications Dropdown Menu -->

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin.index')}}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<li class="nav-header">Important</li>

<li class="nav-item has-treeview">
            <a href="{{route('admin.index')}}" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Dashboard

              </p>
            </a>
            </li>
               <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Display
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


              <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                CATEGORY
                <i class="fas fa-angle-left right"></i>
             <!--    <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('backend.pages.category.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD CATEGORY</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('backend.pages.Category.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SHOW CATEGORY</p>
                </a>
              </li>
            </ul>
          </li>


            <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p>
                ROOMS
                <i class="fas fa-angle-left right"></i>
             <!--    <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('backend.pages.product.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD ROOMS</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('backend.pages.product.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SHOW ROOMS</p>
                </a>
              </li>
             


            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                  Institute
                <i class="fas fa-angle-left right"></i>
             <!--    <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.brand.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD Institute</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.brand')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SHOW Institute</p>
                </a>
              </li>

            </ul>
          </li>
            </ul>
          </li>

<li class="nav-header">Order</li>

         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Order Details
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('backend.pages.ads.order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Ads Order</p>
                </a>
                <a href="{{route('backend.pages.order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Order</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('test.show') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Data</p>
                </a>
              </li>
{{--              <li class="nav-item">--}}
{{--                <a href="{{route('backend.pages.inventory_support_with_date') }}" class="nav-link">--}}
{{--                  <i class="far fa-circle nav-icon"></i>--}}
{{--                  <p>Inventory</p>--}}
{{--                </a>--}}
{{--              </li>--}}
              <li class="nav-item">
                    <a href="{{route('backend.pages.vendor_support_product') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Send Vendor</p>
                    </a>
              </li>

            </ul>
          </li>
<li class="nav-header" >Galary</li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-image"></i>

              <p>
              Diverse  Ad Type
                <i class="fas fa-angle-left right"></i>
             <!--    <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('image.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD Ads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('image.manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SHOW Ads</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>
                Side Banner
                <i class="fas fa-angle-left right"></i>
             <!--    <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('image2.show')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                  <p>ADD Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('image2.manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SHOW Banner</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

              <i class="nav-icon far fa-circle text-success"></i>
              <p>
                Big Banner
                <i class="fas fa-angle-left right"></i>
             <!--    <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('image3.manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SHOW Banner</p>
                </a>
              </li>

            </ul>
          </li>

            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

              <i class="nav-icon far fa-circle text-warning"></i>
              <p>
                Side Banner
                <i class="fas fa-angle-left right"></i>
             <!--    <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('image4.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD Banner</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('image4.manage')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SHOW Banner</p>
                </a>
              </li>

            </ul>
          </li>
            <li class="nav-item has-treeview">
                <!--<a href="{{route('backend.pages.seoSystem')}}" class="nav-link">-->

                <!--    <i class="nav-icon far fa-circle text-warning"></i>-->
                <!--    <p>-->
                <!--        Seo-->
                <!--    </p>-->
                <!--</a>-->
<li class="nav-header" >Pages</li>

          <!--<li class="nav-item has-treeview">-->
          <!--  <a href="#" class="nav-link">-->
          <!--    <i class="nav-icon fas fa-book"></i>-->
             <!-- <p>-->
             <!--   BLOG-->
             <!--   <i class="fas fa-angle-left right"></i>-->
             <!--    <span class="badge badge-info right">6</span> -->
             <!-- </p>-->
          <!--  </a>-->
    

          <!--</li>-->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
               <i class="nav-icon far fa-plus-square"></i>
              <p>
                Comments
                <i class="fas fa-angle-left right"></i>
              
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.index_comment')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>show comment</p>
                </a>
              </li>
             <!--<li class="nav-item">-->
             <!--   <a href="{{route('newslater.details.show')}}" class="nav-link">-->
             <!--     <i class="far fa-circle nav-icon"></i>-->
             <!--     <p>Show Newslater Message</p>-->
             <!--   </a>-->
             <!-- </li>-->

            </ul>

          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                About/Contact
                <i class="fas fa-angle-left right"></i>
             <!--    <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.contacts')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Show Contact</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.aboutsite')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SHOW About</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.policy')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Policy Info</p>
                </a>
              </li>


              <!--<li class="nav-item">-->
              <!--  <a href="{{route('admin.delivery')}}" class="nav-link">-->
              <!--    <i class="far fa-circle nav-icon"></i>-->
              <!--    <p>change Delivery Info</p>-->
              <!--  </a>-->
              <!--</li>-->

            </ul>
          </li>

<li class="nav-header" >Hostels</li>

          <li class="nav-item has-treeview menu-open">

             <ul class="nav nav-treeview">
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Hostels
                <i class="fas fa-angle-left right"></i>
             <!--    <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.vendor.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>ADD Hostels</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.vendor.show')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SHOW Hostels</p>
                </a>
              </li>

            </ul>
          </li>













        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  @yield("content")


  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="#">AlikeHome</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-pre
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<!-- daterangepicker -->
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('dist/js/demo.js')}}"></script>

<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@stack('js')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
