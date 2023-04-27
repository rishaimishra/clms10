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
<br>@include('flash-message')
<div class="container-fluid">
        <div class="row">         
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <div class="card-title">
                  Registration of Religious Organizations.
                </div>
          <a href="{{ route('login') }}" class="btn btn-default btn-flat btn-sm" style="float: right;">Home</a>
              </div>
<?php  $droid=  DB::table('tbl_register_documents')->where('ro_id', $dets )->value('ro_id'); ?>
<?php  $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve',0)->value('token_no'); ?> 
       @if($token_no != '' && $droid == '')
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <?php  $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve',0)->value('ro_id'); ?>
                    <a class="btn btn-info" href="{{route('register_home_a',$token_no)}}" data-filter="1">ROyes Details </a>
                    <a class="btn btn-info" href="{{route('chairman_details',$ro_id)}}" data-filter="2">Chairman Details</a>
                    <a class="btn btn-info" href="{{route('dychairman_details',$ro_id)}}" data-filter="3">Dy. Chairman Details</a>
                    <a class="btn btn-info" href="{{route('secretary_details',$ro_id)}}" data-filter="4">Secretary Details</a>
                    <a class="btn btn-info " href="{{route('dysecretary_details',$ro_id)}}" data-filter="5">Dy. Secretary Details</a>
                    <a class="btn btn-info " href="{{route('treasurer_details',$ro_id)}}" data-filter="6">Treasurer Details</a>
                    <a class="btn btn-info active" href="{{route('document_details',$ro_id)}}" data-filter="7">Documents</a>
                  </div>
                </div>

  <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('document_details_store') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="hidden" name="dets" value="{{$dets}}">
            <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="application">Application:</label>
                    <input type="file" id="exampleInputFile1"  class="form-control" name="app[]" multiple="">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="chairman">Chairman Details:</label>
                    <input type="file" id="exampleInputFile2"  class="form-control" name="cd[]" multiple="">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dychairman">Deputy Chairman Details:</label>
                    <input type="file" id="exampleInputFile3"  class="form-control" name="dcd[]" multiple="">
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="secretary">Secretary Details:</label>
                    <input type="file" id="exampleInputFile4"  class="form-control" name="sd[]" multiple="">
                  </div>           
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="dysecretary">Deputy Secretary Details:</label>
                    <input type="file" id="exampleInputFile5"  class="form-control" name="dsd[]" multiple="">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="treasurer">Treasurer Details:</label>
                    <input type="file" id="exampleInputFile6"  class="form-control" name="td[]" multiple="">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="assurance">Assurance:</label>
                    <input type="file" id="exampleInputFile7"  class="form-control" name="ass[]" multiple="">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="assurance">Articles of Association(AOA):</label><font color="red">*</font>
                    <input type="file" id="exampleInputFile8"  class="form-control" name="aoa[]" multiple="" required="required"/>
                  </div>     
                </div>
                </div>

            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
              <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
              </div>      
            </form>

              </div>
@elseif($droid != '')
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <?php  $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve',0)->value('ro_id'); ?>
                    <a class="btn btn-info" href="{{route('register_home_a',$token_no)}}" data-filter="1">ROyes Details </a>
                    <a class="btn btn-info" href="{{route('chairman_details',$ro_id)}}" data-filter="2">Chairman Details</a>
                    <a class="btn btn-info" href="{{route('dychairman_details',$ro_id)}}" data-filter="3">Dy. Chairman Details</a>
                    <a class="btn btn-info" href="{{route('secretary_details',$ro_id)}}" data-filter="4">Secretary Details</a>
                    <a class="btn btn-info " href="{{route('dysecretary_details',$ro_id)}}" data-filter="5">Dy. Secretary Details</a>
                    <a class="btn btn-info " href="{{route('treasurer_details',$ro_id)}}" data-filter="6">Treasurer Details</a>
                    <a class="btn btn-info active" href="{{route('document_details',$ro_id)}}" data-filter="7">Documents</a>
                  </div>
                </div>

  <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('document_details_store') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="hidden" name="dets" value="{{$dets}}">
            <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="application">Application:</label>
                    <input type="file" id="exampleInputFile1"  class="form-control" name="app[]" multiple="">
                  </div>
<?php $data=  DB::table('tbl_register_documents')->where('ro_id', $ro_id )->get(); ?> 
@foreach($data as $dd)
@if($dd->filecat == 'app')
<b> Submitted Application:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="http://localhost/cro_lms/storage/app/<?php echo $dd->doc_path;?>" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
                  <div class="form-group input-group-sm">
                    <label for="chairman">Chairman Details:</label>
                    <input type="file" id="exampleInputFile2"  class="form-control" name="cd[]" multiple="">
                  </div>
@elseif($dd->filecat == 'cd')
<b>Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="http://localhost/cro_lms/storage/app/<?php echo $dd->doc_path;?>" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>                  
                  <div class="form-group input-group-sm">
                    <label for="dychairman">Deputy Chairman Details:</label>
                    <input type="file" id="exampleInputFile3"  class="form-control" name="dcd[]" multiple="">
                  </div> 
@elseif($dd->filecat == 'dcd')
<b>Deputy Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="http://localhost/cro_lms/storage/app/<?php echo $dd->doc_path;?>" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>                  
                  <div class="form-group input-group-sm">
                    <label for="secretary">Secretary Details:</label>
                    <input type="file" id="exampleInputFile4"  class="form-control" name="sd[]" multiple="">
                  </div> 
@elseif($dd->filecat == 'sd')
<b>Secretary Detail:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="http://localhost/cro_lms/storage/app/<?php echo $dd->doc_path;?>" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>                            
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="dysecretary">Deputy Secretary Details:</label>
                    <input type="file" id="exampleInputFile5"  class="form-control" name="dsd[]" multiple="">
                  </div>
@elseif($dd->filecat == 'dsd')
<b>Deputy Secretary Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="http://localhost/cro_lms/storage/app/<?php echo $dd->doc_path;?>" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>                  
                  <div class="form-group input-group-sm">
                    <label for="treasurer">Treasurer Details:</label>
                    <input type="file" id="exampleInputFile6"  class="form-control" name="td[]" multiple="">
                  </div>
@elseif($dd->filecat == 'td')
<b>Treasurer Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="http://localhost/cro_lms/storage/app/<?php echo $dd->doc_path;?>" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>                  
                  <div class="form-group input-group-sm">
                    <label for="assurance">Assurance:</label>
                    <input type="file" id="exampleInputFile7"  class="form-control" name="ass[]" multiple="">
                  </div>
@elseif($dd->filecat == 'ass')
<b>Assurance:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="http://localhost/cro_lms/storage/app/<?php echo $dd->doc_path;?>" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>                  
                  <div class="form-group input-group-sm">
                    <label for="assurance">Articles of Association(AOA):</label><font color="red">*</font>
                    <input type="file" id="exampleInputFile8"  class="form-control" name="aoa[]" multiple="" required="required"/>
                  </div>
@elseif($dd->filecat == 'aoa')
<b>Article of Association:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="http://localhost/cro_lms/storage/app/<?php echo $dd->doc_path;?>" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>                       
                </div>
                </div>

            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
              <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
              </div>      
            </form>

@endif
@endforeach

              </div>
@endif
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
