<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRO | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <img class="img-responsive" src="{{URL::asset('/images/rgoblogo.png')}}"style="height:80px;width:85px; "></img><br>
    <a href="../../index2.html"><h1>འབྲུག་གི་ཆོས་སྡེ་ལྷན་ཚོགས།</h1></a>
  </div>

<p style="text-align: center;"><ion-icon src="{{URL::asset('/images/bhutan.svg')}}"style="height:20px;width:20px;"></ion-icon><a href="{{ route('dzo_login') }}" class="text-center">
རྫོང་ཁ&nbsp;&nbsp;</a>
<ion-icon src="{{URL::asset('/images/united-states.svg')}}"style="height:20px;width:20px;"></ion-icon><a href="{{ route('login') }}" class="text-center">English</a></p>

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      @include('flash-message')
    <form method="POST" action="{{ route('login') }}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


     
      <p class="mb-0">
      <span class="right badge badge-warning">གསརཔ་བཙུགས།</span>
      <a href="{{ route('enter_token_dzo') }}" class="text-center"><h3>ཆོས་སྡེ་ཐོ་བཀོད་ཀྱི་དོན་ལུ་དགོ་པའི་ཡིག་ཆས།</h3></a>
      </p>

      <p class="mb-0">
      <span class="right badge badge-warning">གསརཔ་བཙུགས།</span>
      <a href="{{ route('compliant_dzo') }}" class="text-center"><h3>ཉོག་བཤད་ བཀོད་ནི།</h3></a>
      </p>


    </div>
</div>
</div>
<!-- jQuery -->
<script src="{{asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("/bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>

</body>
</html>
