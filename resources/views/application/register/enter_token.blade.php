<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RO Registration | CRO</title>
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
</head>
<div class="wrapper" style="background-color: lightgray;overflow:auto">



<section class="content">
<br>
<div class="container-fluid">
        <div class="row">         
          <div class="col-12">
            <div class="card card-warning" >
              <div class="card-header">
                <div class="card-title">
                  Registration of Religious Organizations.
                </div>
              </div>
              <div class="card-body">
               <div class="col-4" style="position: relative;margin-left:11cm;">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                Registration of Religious Organizations.
                </div>
          <form class="form-horizontal" role="form" method="POST" action="{{ route('search_token') }}">
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
          {{ csrf_field() }} 
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-12">
                      <h2 class="lead"><b>Enter Your Registration Code:</b></h2>
                      <input type="text" class="form-control" name="token_no">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                <div class="text-left">
                <div class="input-group-append">
                <button type="submit" name="submit" class="btn btn-warning">ENTER&nbsp;&nbsp;<i class="fas fa-search"></i>
                </button>
                </div>

                  </div>
                </div>
          </form>      
              </div>
            </div>
  
              </div>
            </div>
          </div> 
        </div>
</div><!-- /.container-fluid -->
</section>    


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src={{asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap -->
<script src={{asset("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- jQuery UI -->
<script src={{asset("/bower_components/admin-lte/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Ekko Lightbox -->
<script src={{asset("/bower_components/admin-lte/plugins/ekko-lightbox/ekko-lightbox.min.js")}}"></script>
<!-- AdminLTE App -->
<script src={{asset("/bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset("/bower_components/admin-lte/dist/js/demo.js")}}"></script>
<!-- Filterizr-->
<script src={{asset("/bower_components/admin-lte/plugins/filterizr/jquery.filterizr.min.js")}}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
</body>
</html>
