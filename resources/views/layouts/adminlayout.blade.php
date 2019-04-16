<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ config('app.name', 'Balagbag Traverse') }}</title>
    <!-- Compiled CSS with dependencies -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
    <!-- Frameworks and Libraries -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bttn.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/iziToast.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/iziModal.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/_all-skins.css') }}">
    <!-- CDN Network -->
 {{--    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bttn.css/0.2.4/bttn.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.8/js/adminlte.min.js"> --}}

  <style type="text/css">
    *{
      font-weight: 300;
    }
    .navbar {
        position: relative;
        padding: 0 1em 0 0;
    }
    .user-panel{
      padding: 0;
    }
    .skin-blue .sidebar-menu > li > a:hover {
      border-left: 3px solid #ff5964;
    }
    .bttn-unite{
      border-radius: 3px;
    }
    .sidebar-menu li a i{
      padding-right: 2rem;
    }
    .sidebar-menu li a span{
      font-weight: 300;
      font-size: 1rem;
    }
    #registration_details tr{
      font-size: 1.2rem;
    }
  </style>
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="{{ asset('img/minilogo.png') }}"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><i class="fa fa-user-circle"></i> ADMIN PANEL</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>
       <!-- Navbar Right Menu -->
       <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">      
          <!-- Control Sidebar Toggle Button -->   
          <li>
            {{-- <a href="{{ route('admin.logout') }}">
               <button class="bttn bttn-bordered bttn-xs bttn-danger"> <i class="fa fa-power-off"></i> sign-out</button>
            </a> --}}
            {!!Form::open(['route' => ['admin.logout'], 'method' => 'POST'])!!}
              {{Form::button('<i class="fa fa-power-off"></i> log-out', ['class' => 'bttn bttn-stretch bttn-sm bttn-danger', 'type' => 'submit'])}}
            {!!Form::close()!!}
        </li>
        </ul>
      </div>
    </nav>
  </header>
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <!-- Optionally, you can add icons to the links -->
        <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-line-chart text-warning"></i> <span>DASHBOARD</span></a></li>
        <li><a href="{{ route('admin.inquiry') }}"><i class="fa fa-envelope-open text-warning"></i> <span>INBOX</span></a></li>
        <li><a href="{{ route('admin.cash' )}}"><i class="fa fa-money text-warning"></i> <span>CASH</span></a></li>
        <li><a href="{{ route('admin.registered' )}}"><i class="fa fa-database text-warning"></i> <span>SIGN-UP</span></a></li>
        <li><a href="{{ route('admin.logs') }}"><i class="fa fa-users text-warning"></i> <span>LOGS</span></a></li>
        <li><a href="{{ route('admin.qrcodescanner' )}}"><i class="fa fa-qrcode text-warning"></i> <span>QRCODE</span></a></li>
        <li><a href="{{ route('admin.qrcodetester') }}"><i class="fa fa-random text-warning"></i> <span>TEST</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <!-- Main content -->
      <section id="app" class="content container-fluid">

            @yield('content')

      </section>
        <!-- /.content -->
  </div>
      <!-- /.content-wrapper -->
      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- Default to the left -->
        <small class="class-muted">Copyright &copy; 2018 Balagbag Traverse. All rights reserved 2019</small>
      </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
  <script type="text/javascript" src="{{ asset('/js/app.js')}}"></script>
  <script type="text/javascript" src="{{ asset('/js/iziToast.min.js') }}"></script>
      {{-- Added script for AdminLTE  --}}
  <script src="{{ asset('/js/adminlte.min.js') }}"></script>

<script type="text/javascript">
    AOS.init({
        offset: 200,
        duration: 2000
    });
</script>   

<!-- // Message alert -->
@include('partials.messages')
