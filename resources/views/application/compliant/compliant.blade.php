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
  <!--oncahnge-->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
</head>
<div class="wrapper" style="background-color: lightgray;">
@include('flash-message')
{{ csrf_field() }}
<section class="content">
<br>
<div class="container-fluid">
        <div class="row">         
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <div class="card-title">
                  Suggestions / Feedback
                </div>
              </div>

<div class="card-body">
   
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('compliant_store') }}">  
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="ro_name">Religious Organization:</label>
     <select class="form-control col-sm-6" id="ro_name" name="ro_name" required>
          <option disabled selected>Select Organization</option>
          <?php 
          $ag=App\tbl_agency::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">{{$ags->agency}}</option>
          <?php endforeach ?>
          </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="subject">Subject:</label>
     <input type="text" class="form-control col-sm-6" name="subject" id="subject">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="discription">Details:</label>
     <textarea class="form-control col-sm-6" name="discription" id="discription" rows="4" placeholder="Do not exceed more than 2500 words."></textarea>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="submitted_by">Submitted By:</label>
     <input type="text" class="form-control col-sm-6" name="submitted_by" id="submitted_by">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label" for="phone">Phone Number:</label>
     <input type="text" class="form-control col-sm-6" id="phone" name="phone" placeholder="Enter phone Number">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label" for="dzongkhag">Email:</label>
     <input type="email" class="form-control col-sm-6" id="email" name="email" placeholder="Email ID">
   </div>   
   <br>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="compliant_details">Attach Document:</label>
     <input type="file" id="exampleInputFile1"  class="form-control col-sm-5" name="compliant_details[]" multiple="">
   </div>
  <br>
  <div class="form-row">
  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
  <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
  </div>
</form>         
</div>
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








 
