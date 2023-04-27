<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RO | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/jqvmap/jqvmap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css")}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/summernote/summernote-bs4.css")}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <img class="img-responsive" src="{{URL::asset('/images/download.png')}}"style="height:60px;width:80px;">
      <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         Commission for Religious Organizations</h5>
        
    </ul>
      <ul class="navbar-nav" style="margin-left: -260px;margin-top: 19px;">
         <h3>འབྲུག་གི་ཆོས་སྡེ་ལྷན་ཚོགས།</h3>
      </ul>





    <ul class="navbar-nav ml-auto">
      <!-- Language Dropdown Menu -->


      <?php $role = Auth::user()->role_id;?>
      @if($role == 2)
          <ion-icon src="{{URL::asset('/images/bhutan.svg')}}"style="height:15px;width:15px;"></ion-icon><a href="{{ route('application.home_dzo') }}" class="text-center">རྫོང་ཁ་&nbsp;&nbsp;</a>
          <ion-icon src="{{URL::asset('/images/united-states.svg')}}"style="height:15px;width:15px;"></ion-icon><a href="{{ route('application.home') }}" class="text-center">English</a></p>
      @elseif($role == 3)
          <ion-icon src="{{URL::asset('/images/bhutan.svg')}}"style="height:15px;width:15px;"></ion-icon><a href="{{ route('application.home_ro_dzo') }}" class="text-center">རྫོང་ཁ་&nbsp;&nbsp;</a>
          <ion-icon src="{{URL::asset('/images/united-states.svg')}}"style="height:15px;width:15px;"></ion-icon><a href="{{ route('application.home_ro') }}" class="text-center">English</a></p>
      @endif

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
    <a href="{{ route('logout') }}" class="btn btn-default btn-flat btn-sm"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
  </nav>
  <!-- /.navbar -->
