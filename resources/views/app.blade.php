<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <link rel="stylesheet" href="{{ asset('adminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/dist/css/skins/skin-blue.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('adminLTE/plugins/datepicker/datepicker3.css') }}">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <!-- Header -->
  <header class="main-header">

    <a href="#" class="logo">
      <span class="logo-mini"><b>AA</b></span>
     <span class="logo-lg"><b>Kp DT.AA</span>
    </a>


    
  </header>
  <!-- End Header -->


  <!-- Sidebar -->
  <aside class="main-sidebar">

    <section class="sidebar">
      <ul class="sidebar-menu">
        <li class="header">MENU NAVIGASI</li>

        <li><a href=""><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li><a href=""><i class="fa fa-cube"></i> <span>Nilai Murid</span></a></li>
        <li><a href=""><i class="fa fa-cubes"></i> <span>Data Murid</span></a></li>
        <li><a href=""><i class="fa fa-credit-card"></i> <span>Comment Orang Tua</span></a></li>
      </ul>
    </section>
  </aside>
  <!-- End Sidebar -->

  <!-- Content  -->
  <div class="content-wrapper">
   <section class="content-header">
      <h1>
        @yield('title')
      </h1>
      <ol class="breadcrumb">
        @section('breadcrumb')
        <li><a href="#"><i class="fa fa-home"></i>Home</a></li>
        @show
      </ol>
    </section>

    <section class="content">
        @yield('content')
    </section>
  </div>
  <!-- End Content -->

  <!-- Footer -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Sistem Penjualan Berbasis Web
    </div>
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
  <!-- End Footer -->
 
<script src="{{ asset('adminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<script src="{{ asset('adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('adminLTE/dist/js/app.min.js') }}"></script>

<script src="{{ asset('adminLTE/plugins/chartjs/Chart.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('adminLTE/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('js/validator.min.js') }}"></script>

@yield('script')

</body>
</html>