<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.head')
</head>

<style>
.image-box-insert{
    display: flex;
    width: 250px;
    height: 200px;
    background-color: white;
    border: 1px solid black;
    color: black;
}
</style>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ ('../../../../../images/logo.png') }}" alt="HTX Xóm Đồng 2" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    @include('admin.navbar')
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    @include('admin.menu')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">WELLCOME TO WEBSITE </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"> <a href="{{ url('lang/en') }}">English</a></li>
              <li class="breadcrumb-item"> <a href="{{ url('lang/vi') }}">Tiếng Việt</a></li> --}}
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @include('admin.table-content')
    <!-- /.content -->
    <div class="container">
      @yield('content')
    </div>
  </div>
  
 
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
   @include('admin.footer')
  </footer>
</div>
<!-- ./wrapper -->
  @include('admin.script')
</body>
</html>
