<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Admin | {{$title ?? ''}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/access/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/access/admin')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/access/admin')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="{{asset('/access/admin')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/access/admin')}}/dist/css/adminlte.min.css">
  <!-- jQuery -->
  <script src="{{asset('/access/admin')}}/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('/access/admin')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Ajax  Form-->
  <script src="{{asset('/access/admin')}}/jsCustom/ajaxForm.js"></script>
  <script src="{{asset('/access/admin')}}/dist/js/adminlte.min.js"></script>
  <!-- Sweetalert2-->
  <script src="{{asset('/access/admin')}}/plugins/sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="{{asset('/access/admin')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toast-->
  <script src="{{asset('/access/admin')}}/plugins/toastr/toastr.min.js"></script>
  <script src="{{asset('/access/admin')}}/jsCustom/toast.js"></script>
  <link rel="stylesheet" href="{{asset('/access/admin')}}/plugins/toastr/toastr.min.css">
  <!-- Address Ajax-->
  <script src="{{asset('/access/admin')}}/jsCustom/addressAjax.js"></script>
  <!-- Preview Ajax-->
  <script src="{{asset('/access/admin')}}/jsCustom/previewImage.js"></script>
  <!-- Error Element-->
  <script src="{{asset('/access/admin')}}/jsCustom/errorElement.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{asset('/access/admin')}}/index3.html" class="brand-link">
      <img src="{{asset('/access/admin')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/access/admin')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      @include('Admin.Layouts.sidebar')

    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('contents')
 
  @include('Admin.Layouts.footer')

</div>
<!-- ./wrapper -->

<!-- Page specific script -->

</body>
</html>
