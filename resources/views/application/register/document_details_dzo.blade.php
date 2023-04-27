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
<div class="wrapper" style="background-color: lightgray;">



<section class="content">
<br>
<div class="container-fluid">
        <div class="row">         
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <div class="card-title">
                  <h3>ཆོས་སྡེ་ཐོ་བཀོད་ཀྱི་དོན་ལུ་དགོ་པའི་ཡིག་ཆས།</h3>
                </div>
                <a href="{{ route('login') }}" class="btn btn-default btn-flat btn-sm" style="float: right;"><h4>གདོང་ཤོག</h4></a>
              </div>
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info" href="" data-filter="1"><h3>ཆོས་ཚོགས་ཀྱི་ ཁ་གསལ།</h3></a>
                    <a class="btn btn-info" href="{{route('register_chairman_dzo')}}" data-filter="2"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></a>
                    <a class="btn btn-info" href="{{route('register_dychairman_dzo')}}" data-filter="3"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('register_secretary_dzo')}}" data-filter="4"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('register_dysecretary_dzo')}}" data-filter="5"><h3>དྲུང་ཆེན་འོགམ་གྱི་ ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('register_treasurer_dzo')}}" data-filter="6"><h3>དངུལ་འཛིན་གྱི་ཁ་གསལ།</h3></a>
                    <a class="btn btn-info active" href="{{route('register_documents_dzo')}}" data-filter="7"><h3>ཡིག་ཆ། ཡིག་རིགས།</h3></a>
                  </div>
                </div>

 <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('document_details_store_dzo') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="hidden" name="dets" value="{{$dets}}">
            <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <h3><label for="application">ཞུ་ཚིག</label></h3>
                    <input type="file" id="application"  class="form-control" name="application[]" multiple="">
                  </div>
                  <div class="form-group input-group-sm">
                    <h3><label for="chairman">ཁྲི་འཛིན་གྱི་ཁ་གསལ།</label></h3>
                    <input type="file" id="chairman"  class="form-control" name="chairman[]" multiple="">
                  </div>
                  <div class="form-group input-group-sm">
                    <h3><label for="dychairman">ཁྲི་འཛིན་འོགམ་གྱི་ ཁ་གསལ།</label></h3>
                    <input type="file" id="dychairman"  class="form-control" name="dychairman[]" multiple="">
                  </div> 
                  <div class="form-group input-group-sm">
                    <h3><label for="secretary">དྲུང་ཆེན་གྱི་ ཁ་གསལ། </label></h3>
                    <input type="file" id="secretary"  class="form-control" name="secretary[]" multiple="">
                  </div>           
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <h3><label for="dysecretary">དྲུང་ཆེན་འོགམ་གྱི་ ཁ་གསལ། </label></h3>
                    <input type="file" id="dysecretary"  class="form-control" name="dysecretary[]" multiple="">
                  </div>
                  <div class="form-group input-group-sm">
                    <h3><label for="treasurer">རྩིས་འཛིན་པ་བཅས་ཀྱི་ཁ་གསལ།</label></h3>
                    <input type="file" id="treasurer"  class="form-control" name="treasurer[]" multiple="">
                  </div>
                  <div class="form-group input-group-sm">
                    <h3><label for="assurance">ཁས་ལེན།/བློ་གཏད།</label></h3>
                    <input type="file" id="assurance"  class="form-control" name="assurance[]" multiple="">
                  </div>     
                </div>
                </div>

            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm"><h3>རྟིང་མ།</h3></button>
              <button type="submit" class="btn btn-danger btn-sm"><h3>ཆ་མེད་གཏང་</h3></button>
              </div>      
            </form>

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
