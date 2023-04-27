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
<br>
<div class="container-fluid">
        <div class="row">         
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <div class="card-title">
                  <h3>ཆོས་སྡེ་ཐོ་བཀོད།</h3>
                </div>
                <a href="{{ route('login') }}" class="btn btn-default btn-flat btn-sm" style="float: right;">EXIT</a>
              </div>
@if($matchedTerm != '')
       
      @foreach($data as $app)

      <div class="card-body">
          <div>
                <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="" data-filter="1"><h3>ཆོས་ཚོགས་ཀྱི་ཁ་གསལ།</h3></a>
                     <a class="btn btn-info" href="{{route('chairman_details_dzo',$app->ro_id)}}" data-filter="2"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></a>
                    <a class="btn btn-info" href="{{route('dychairman_details_dzo',$app->ro_id)}}" data-filter="3"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('secretary_details_dzo',$app->ro_id)}}" data-filter="4"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('dysecretary_details_dzo',$app->ro_id)}}" data-filter="5"><h3>དྲུང་ཆེན་འོགམ་གྱི་ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('treasurer_details_dzo',$app->ro_id)}}" data-filter="6"><h3>རྩིས་འཛིན་ཁ་གསལ།</h3></a>
                  </div>
                </div>
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('ro_details_store_edit_dzo') }}">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<input type="hidden" name="matchedTerm" id="matchedTerm" value="{{ $matchedTerm }}">
<input type="hidden" name="matchedTerm2" id="matchedTerm2" value="{{ $app->ro_id }}">
{{csrf_field()}}
            <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                  <label for="ro_name"><h3>ཆོས་ཚོགས་ཀྱི་མཚན</h3></label><font color="red">*</font>
                  <input type="text" class="form-control" id="ro_name" name='ro_name' value="{{$app->name}}" placeholder="Enter Organization Name"  required="required"/>
                  </div>
                  <p><h3>ཡིག་ཚང་གི་ཁ་བྱང་།</h3></p>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag"><h3>རྫོང་ཁག</h3></label><font color="red">*</font>
                    <select class='form-control' name='type' id="type" required="required"/>
                    <option value=""><h3>གདམ་ཁ་རྐྱབ་ནི།</h3></option>
                      <?php 
                  $dzongkhag=App\dzongkhag_dzo::all();
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
                     <label for="gewog"><h3>རྒེད་འོག</h3></label><font color="red">*</font>
                     <select name='gewog' id='gewog' class="form-control" required="required"/>
                     <option value=""><h3>དང་པ་ རྫོང་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
                     <?php 
                  $gewog=App\gewog_dzo::all();
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
                    <label for="location"><h3>ས་གནས།</h3></label>
                    <textarea class="form-control" id="location" name="location" value="{{$app->location}}" placeholder="Enter Location" rows="4">{{$app->location}}</textarea>
                  </div>            
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="postbox"><h3>འགྲེམ་སྒྲོམ་ཨང་།</h3></label>
                    <input type="text" class="form-control" id="postbox" name="postbox" value="{{$app->postbox}}" placeholder="Enter Postbox Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="phone"><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$app->phone}}" placeholder="Enter Phone Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label><font color="red">*</font>
                    <input type="email" class="form-control" id="email" name="email" value="{{$app->email}}" placeholder="Email ID"  required/>
                  </div>
                                 
<?php  $droid=  DB::table('tbl_register_documents')->where('ro_id', $app->ro_id )->get(); ?>

<?php  $droidcount =  count(DB::table('tbl_register_documents')->where('ro_id', $app->ro_id )->where('filecat','app')->get()); ?>
@if($droidcount == 0)
<div class="form-group input-group-sm">
<label for="application"><h3>ཞུ་ཡིག:</h3></label><font color="red">*</font>
<input type="file" id="exampleInputFile1"  class="form-control" name="app[]" multiple="" required="required">
</div>
@else

<div class="form-group input-group-sm">
<label for="application"><h3>ཞུ་ཡིག:</h3></label>
<input type="file" id="exampleInputFile1"  class="form-control" name="app[]" multiple="">
</div>
@foreach($droid as $dd)
@if($dd->filecat == 'app')
<h4>ཞུ་ཡིག:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
@endif
@endforeach

@endif

              </div>
              </div>
              <div class="col-md-4">
              <div class="card-body">

<?php  $droidcount =  count(DB::table('tbl_register_documents')->where('ro_id', $app->ro_id )->where('filecat','aoa')->get()); ?>
@if($droidcount == 0)
<div class="form-group input-group-sm">
<label for="assurance"><h3>ཡིག་ཆ།:</h3></label><font color="red">*</font>
<input type="file" id="exampleInputFile8"  class="form-control" name="aoa[]" multiple="" required="required">
</div>
@else

              <div class="form-group input-group-sm">
              <label for="assurance"><h3>ཡིག་ཆ།:</h3></label>
              <input type="file" id="exampleInputFile8"  class="form-control" name="aoa[]" multiple="">
              </div>
@foreach($droid as $dd)
@if($dd->filecat == 'aoa')
<h4>ཡིག་ཆ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
@endif
@endforeach

@endif
<?php  $droidcount =  count(DB::table('tbl_register_documents')->where('ro_id', $app->ro_id )->where('filecat','ass')->get()); ?>
@if($droidcount == 0)
<div class="form-group input-group-sm">
<label for="assurance"><h3>ཁས་ལེན།/བློ་གཏད།:</h3></label><font color="red">*</font>
<input type="file" id="exampleInputFile7"  class="form-control" name="ass[]" multiple="" required="required">
</div>
@else

              <div class="form-group input-group-sm">
              <label for="assurance"><h3>ཁས་ལེན།/བློ་གཏད།:</h3></label>
              <input type="file" id="exampleInputFile7"  class="form-control" name="ass[]" multiple="" >
              </div>
@foreach($droid as $dd)
@if($dd->filecat == 'ass')
<h4>ཁས་ལེན།/བློ་གཏད།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>              
@endif
@endforeach

@endif
              </div>
              </div>
          
            </div>
            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm"><h3> བསྲུང་།</h3></button>
              <button type="submit" class="btn btn-danger btn-sm"><h3>ཆ་མེད།</h3></button>
              </div>      
            </form>
      @endforeach





@else
<section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"><i class="fas fa-frown"></i></h2>
        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i>&nbsp;&nbsp;&nbsp;ཆ་མེད་ཨང་།</h3>
          <p>
           <h2>ཐོག་བཀོད་ཨང་གྲངས་འདི་ ཆ་མེད/ལག་ལེན་ཐབས་ཚརཝ།</h2>
          </p>

        </div>
      </div>
</section><br><br><br>


@endif
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">
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
<script type="text/javascript">
  $('#type').change(function()
  {
    var gewog_id=$(this).val();
    var view1_url = $("#hidden_view1_dzo").val();
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
    var view2_url = $("#hidden_view2_dzo").val();
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
    var view_url = $("#hidden_view_dzo").val();
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
</script><script>
function myFunction() {
  alert("Please Fill  RO details to continue to next form.!");
}
</script>
