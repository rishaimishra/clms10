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
<div class="wrapper" style="background-color: lightgray;overflow:auto">

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
                <a href="{{ route('login') }}" class="btn btn-default btn-flat btn-sm" style="float: right;">EXIT</a>
              </div>
@if($token_no != '' && $troid == '')
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info" href="{{route('register_home_a',$token_no)}}" data-filter="1">RO Details </a>
                    <a class="btn btn-info" href="{{route('chairman_details',$ro_id)}}" data-filter="2">Chairman Details</a>
                    <a class="btn btn-info" href="{{route('dychairman_details',$ro_id)}}" data-filter="3">Dy. Chairman Details</a>
                    <a class="btn btn-info" href="{{route('secretary_details',$ro_id)}}" data-filter="4">Secretary Details</a>
                    <a class="btn btn-info " href="{{route('dysecretary_details',$ro_id)}}" data-filter="5">Dy. Secretary Details</a>
                    <a class="btn btn-info active" href="{{route('treasurer_details',$ro_id)}}" data-filter="6">Treasurer Details</a>
                  </div>
                </div>
            <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                  
                  <form action="{{ route('cid_search_tdreg',$ro_id) }}" method="POST" enctype="multipart/form-data">
                   {{ csrf_field() }}
                        <div class="input-group input-group-sm mb-0">
                          <label for="cid">CID</label>&nbsp;&nbsp;&nbsp;&nbsp;
                          <input class="form-control form-control-sm" name='cidno' placeholder="Enter CID number" required/>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">SEARCH</button>
                          </div>
                        </div>
                  </form>
  <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('treasurer_details_store') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="hidden" name="dets" value="{{$dets}}">
  {{ csrf_field() }}
                  <div class="form-group input-group-sm">
                    <label for="name">Name:</label><font color="red">*</font>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="required"/>
                  </div>
                   <div class="form-group input-group-sm">
                    <label for="dzongkhag">Dzongkhag:</label><font color="red">*</font>                                       
                    <select name='type1' id='type1' class="form-control" required/>
                    <option value="">Select Dzongkhag/Thromde</option>
                    <?php 
                    $dzongkhag=App\dzongkhag::all();
                    foreach($dzongkhag as $dzongkhags):
                    ?>
                    <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
                    <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dungkhag">Dungkhag:</label>
                    <input type="text" class="form-control" name="dungkhag" placeholder="Enter dungkhag">
                  </div> 
                  <div class="form-group input-group-sm">
                     <label for="gewog">Gewog:</label>
                     <select name='gewog' id='gewog' class="form-control" required/>
                     <option>Select Dzongkhag First</option>
                     </select>
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="village">Village:</label>
                     <select name='village' id='village' class="form-control " required/>
                     <option>Select Gewog First</option>
                     </select>
                  </div>            
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="houseno">House Number:</label>
                    <input type="text" class="form-control" name="houseno" placeholder="Enter House Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="thramno">Thram Number:</label>
                    <input type="text" class="form-control" name="thramno" placeholder="Enter Thram Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dob">Date Of Birth:</label>
                    <input type="date" class="form-control" name="dob" placeholder="Enter DOB Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="qualification">Qualification:</label>
                    <input type="text" class="form-control" name="qualification" placeholder="Enter Qualification">
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="phoneno">Phone Number:</label>
                    <input type="text" class="form-control" name="phoneno" placeholder="Enter Phone Number">
                  </div>      
                </div>
                </div>
                <div class="col-md-4">
                 <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag">Email:</label><font color="red">*</font>
                    <input type="email" class="form-control" name="email" placeholder="Email ID" required="required"/>
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="date">Date Of Election/Appointment:</label>
                    <input type="date" class="form-control" name="appdate" placeholder="Enter Date Of Election/Appointment">
                  </div>   
                  <div class="form-group input-group-sm">
                    <label for="photo">Upload Passport Photo:</label>
                    <input type="file" name="photo" class="form-control" id='photo'>
                  </div>  
<div class="form-group input-group-sm">
<label for="chairman">Upload Treasurer Details Document:</label><font color="red">*</font>
<input type="file" id="exampleInputFile2"  class="form-control" name="td[]" multiple="" required="required"/>
</div>
                </div>
                </div>
<input type="hidden" name="hidden_view"  id='hidden_view'  value="{{route('view_addressss')}}"> 
<input type="hidden" name="hidden_view1" id='hidden_view1' value="{{route('view1_addressss')}}"> 
<input type="hidden" name="hidden_view2" id='hidden_view2' value="{{route('view2_addressss')}}">
            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm">Save</button>
              <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
              </div>      
            </form>
            </div>
@elseif($troid != '')
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info" href="{{route('register_home_a',$token_no)}}" data-filter="1">RO Details </a>
                    <a class="btn btn-info" href="{{route('chairman_details',$ro_id)}}" data-filter="2">Chairman Details</a>
                    <a class="btn btn-info" href="{{route('dychairman_details',$ro_id)}}" data-filter="3">Dy. Chairman Details</a>
                    <a class="btn btn-info" href="{{route('secretary_details',$ro_id)}}" data-filter="4">Secretary Details</a>
                    <a class="btn btn-info" href="{{route('dysecretary_details',$ro_id)}}" data-filter="5">Dy. Secretary Details</a>
                    <a class="btn btn-info active" href="{{route('treasurer_details',$ro_id)}}" data-filter="6">Treasurer Details</a>
                  </div>
                </div>
@foreach($data as $app)
  <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('treasurer_details_store_edit') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="hidden" name="matchedTerm2" id="matchedTerm2" value="{{ $app->ro_id }}">

  <?php $approve=  DB::table('tbl_ro_details')->where('ro_id', $dets )->value('approve'); ?>
  <input type="hidden" name="status" id="status" value="{{ $approve }}">

  {{ csrf_field() }}
  <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="name">Name</label><font color="red">*</font>
                    <input type="text" class="form-control" name="name" value="{{ $app->name }}" required="required"/>
                  </div>
                   <div class="form-group input-group-sm">
                    <label for="dzongkhag">Dzongkhag:</label>
                    <select name='type1' id='type1' class="form-control">
                    <option disabled selected>Select Dzongkhag/Thromde</option>
                    <?php 
                  $dzongkhag=App\dzongkhag::all();
                  foreach($dzongkhag as $dzo):
                  ?>
                  <option value="{{$dzo->dzongkhag_id}}"
                  <?php 
                  if($dzo->dzongkhag_id == $app->dzongkhag){?> selected <?php } ?> >
                  {{$dzo->dzongkhag_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                    </select>
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dungkhag">Dungkhag:</label>
                    <input type="text" class="form-control" name="dungkhag" value="{{ $app->dungkhag }}">
                  </div> 
                  <div class="form-group input-group-sm">
                     <label for="gewog">Gewog:</label>
                     <select name='gewog' id='gewog' class="form-control">
                     <?php 
                  $gewog=App\gewog::all();
                  foreach($gewog as $g):
                  ?>
                  <option value="{{$g->gewog_id}}"
                  <?php 
                  if($g->gewog_id == $app->gewog){?> selected <?php } ?> >
                  {{$g->gewog_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                     </select>
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="village">Village:</label>
                     <select name='village' id='village' class="form-control">
                     <?php 
                  $gewog=App\village::all();
                  foreach($gewog as $g):
                  ?>
                  <option value="{{$g->village_id}}"
                  <?php 
                  if($g->village_id == $app->village){?> selected <?php } ?> >
                  {{$g->village_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                     </select>
                  </div>            
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="houseno">House Number:</label>
                    <input type="text" class="form-control" name="houseno" value="{{ $app->houseno }}">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="thramno">Thram Number:</label>
                    <input type="text" class="form-control" name="thramno" value="{{ $app->thramno }}">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dob">Date Of Birth:</label>
                    <input type="date" class="form-control" name="dob" value="{{ $app->dob }}">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="qualification">Qualification:</label>
                    <input type="text" class="form-control" name="qualification" value="{{ $app->qualification }}">
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="phoneno">Phone Number:</label>
                    <input type="text" class="form-control" name="phoneno" value="{{ $app->phoneno }}">
                  </div>      
                </div>
                </div>
                <div class="col-md-4">
                 <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag">Email:</label><font color="red">*</font>
                    <input type="email" class="form-control" name="email" value="{{ $app->email }}" required="required"/>
                  </div>

                  <div class="form-group input-group-sm">
                    <label for="date">Date Of Election/Appointment:</label>
                    <input type="date" class="form-control" name="appdate" value="{{ $app->appdate }}">
                  </div>   

                  <div class="form-group input-group-sm">
                    <label for="photo">Upload Passport Photo:</label>
                    <input type="file" name="photo" class="form-control" value="{{ $app->photo }}" id='photo'>
                  </div> 

Uploaded Passport Photo:&nbsp;&nbsp;&nbsp;{{ $app->photo }}
@if( $app->photo == '')
No Photo!
@else
<a href="{{asset('/images/'.$app->photo)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>                   
@endif
<?php  $droid=  DB::table('tbl_register_documents')->where('ro_id', $dets )->get(); ?> 
<div class="form-group input-group-sm">
<label for="chairman">Upload Treasurer Details Document:</label>
<input type="file" id="exampleInputFile2"  class="form-control" name="td[]" multiple="">
</div>
@foreach($droid as $dd)
@if($dd->filecat == 'td')
Treasurer Details:&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>                   
@endif
@endforeach   

                         
                </div>
                </div>
<input type="hidden" name="hidden_view"  id='hidden_view'  value="{{route('view_addressss')}}"> 
<input type="hidden" name="hidden_view1" id='hidden_view1' value="{{route('view1_addressss')}}"> 
<input type="hidden" name="hidden_view2" id='hidden_view2' value="{{route('view2_addressss')}}">
            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm">Submit</button>
              <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
              </div>      
            </form>

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
<script type="text/javascript">
  $('#type1').change(function()
  {
    var gewog_id=$(this).val();
    var view1_url = $("#hidden_view1").val();
    $.ajax({
      url: view1_url,
      type:"GET", 
      data: {"id":gewog_id}, 
      success: function(result){
      $('#gewog').empty();
      $("#gewog").prepend("<option disabled selected>Select Gewog</option>");
      $.each(result,function(key,val)
      {
      $('#gewog').append('<option value="'+val.gewog_id+'">'+val.gewog_name+'</option>');
      });
      }
    });
  });
  $('#gewog').change(function()
  {
    var village_id=$(this).val();
    var view2_url = $("#hidden_view2").val();
    $.ajax({
      url: view2_url,
      type:"GET", 
      data: {"id":village_id}, 
      success: function(result){
      $('#village').empty();
      $("#village").prepend("<option disabled selected>Select village</option>");
      $.each(result,function(key,val)
      {
      $('#village').append('<option value="'+val.village_id+'">'+val.village_name+'</option>');
      });
      }
    });
  });
  $('#type').change(function()
  {
    var dzongkhag_id=$(this).val();
    var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":dzongkhag_id}, 
        success: function(result){
          $('#Cdungkhag').empty();
          $("#Cdungkhag").prepend("<option disabled selected>Select Dungkhag</option>");
          $.each(result,function(key,val)
          {
          $('#Cdungkhag').append('<option value="'+val.dungkhag_id+'">'+val.dungkhag_name+'</option>');
          });
        }
      });
  }); 
</script>
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
