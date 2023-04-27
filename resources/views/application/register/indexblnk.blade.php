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



<section class="content">
<br>
<div class="container-fluid">
        <div class="row">         
          <div class="col-12">
            <div class="card card-warning">
              <div class="card-header">
                <div class="card-title">
                  Registration of Religious Organizations.
                </div>
              </div>

@if($matchedTerm != '')
 
  
    @if($matchedTerm == '$detail')
      <?php $data=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve',0)->get(); ?> 
        @foreach($data as $app)
            <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="{{route('register_home_a',$detail)}}" data-filter="1">ROyestoken Details </a>
                    <a class="btn btn-info" href="{{route('register_chairman')}}" data-filter="2">Chairman Details</a>
                    <a class="btn btn-info" href="{{route('register_dychairman')}}" data-filter="3">Dy. Chairman Details</a>
                    <a class="btn btn-info" href="{{route('register_secretary')}}" data-filter="4">Secretary Details</a>
                    <a class="btn btn-info" href="{{route('register_dysecretary')}}" data-filter="5">Dy. Secretary Details</a>
                    <a class="btn btn-info" href="{{route('register_treasurer')}}" data-filter="6">Treasurer Details</a>
                    <a class="btn btn-info" href="{{route('register_documents')}}" data-filter="7">Documents</a>
                  </div>
                </div>
  <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('ro_details_store') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="text" name="matchedTerm" id="matchedTerm" value="{{ $matchedTerm }}">
{{csrf_field()}} 
            <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="ro_name">Proposed Name of RO:</label><font color="red">*</font>
                    <input type="text" class="form-control" id="ro_name" name='ro_name' value="{{$app->ro_name}}" placeholder="Enter Organization Name"  required="required"/>
                  </div>
                  <p>Official Address</p>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag">Dzongkhag/Thromde:</label><font color="red">*</font>
                    <select class='form-control' name='type' id="type" required="required"/>
                    <option disabled selected>Select Dzongkhag</option>
                    <?php 
                    $dzongkhag=App\dzongkhag::all();
                    foreach($dzongkhag as $dzongkhags):
                    ?>
                    <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
                    <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group input-group-sm">
                     <label for="gewog">Gewog:</label><font color="red">*</font>
                     <select name='gewog' id='gewog' class="form-control" required="required"/>
                     <option>Select Dzongkhag Frist</option>
                     </select>
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="location">Office Location:</label>
                    <textarea class="form-control" id="location" name="location" placeholder="Enter Location" rows="4"></textarea>
                  </div>            
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="postbox">Postbox Number:</label>
                    <input type="text" class="form-control" id="postbox" name="postbox" placeholder="Enter Postbox Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="phone">Phone Number:</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="fax">Fax Number:</label>
                    <input type="text" class="form-control" id="fax" name="fax" placeholder="Enter Fax Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag">Email:</label><font color="red">*</font>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email ID"  required/>
                  </div>           
                </div>
                </div>
            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm">Next</button>
              <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
              </div>      
            </form>
</div>
@endforeach
@endif
     @else
      <div class="card-body">
            <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="{{route('register_home_a',$matchedTerm)}}" data-filter="1">ROnotoken Details </a>
                    <a class="btn btn-info" href="" data-filter="2" onclick="return confirm('Please Fill details to continue to next form.')">Chairman Details</a>
                    <a class="btn btn-info" href="" data-filter="2" onclick="return confirm('Please Fill details to continue to next form.')">Dy. Chairman Details</a>
                    <a class="btn btn-info" href="" data-filter="2" onclick="return confirm('Please Fill details to continue to next form.')">Secretary Details</a>
                    <a class="btn btn-info" href="" data-filter="2" onclick="return confirm('Please Fill details to continue to next form.')">Dy. Secretary Details</a>
                    <a class="btn btn-info" href="" data-filter="2" onclick="return confirm('Please Fill details to continue to next form.')">Treasurer Details</a>
                    <a class="btn btn-info" href="" data-filter="2" onclick="return confirm('Please Fill details to continue to next form.')">Documents</a>
                  </div>
                </div>
                <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('ro_details_store') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="text" name="matchedTerm" id="matchedTerm" value="{{ $matchedTerm }}">
{{csrf_field()}} 
            <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="ro_name">Proposed Name of RO:</label><font color="red">*</font>
                    <input type="text" class="form-control" id="ro_name" name='ro_name' placeholder="Enter Organization Name"  required="required"/>
                  </div>
                  <p>Official Address</p>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag">Dzongkhag/Thromde:</label><font color="red">*</font>
                    <select class='form-control' name='type' id="type" required="required"/>
                    <option disabled selected>Select Dzongkhag</option>
                    <?php 
                    $dzongkhag=App\dzongkhag::all();
                    foreach($dzongkhag as $dzongkhags):
                    ?>
                    <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
                    <?php endforeach ?>
                    </select>
                  </div>
                  <div class="form-group input-group-sm">
                     <label for="gewog">Gewog:</label><font color="red">*</font>
                     <select name='gewog' id='gewog' class="form-control" required="required"/>
                     <option>Select Dzongkhag Frist</option>
                     </select>
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="location">Office Location:</label>
                    <textarea class="form-control" id="location" name="location" placeholder="Enter Location" rows="4"></textarea>
                  </div>            
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="postbox">Postbox Number:</label>
                    <input type="text" class="form-control" id="postbox" name="postbox" placeholder="Enter Postbox Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="phone">Phone Number:</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="fax">Fax Number:</label>
                    <input type="text" class="form-control" id="fax" name="fax" placeholder="Enter Fax Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag">Email:</label><font color="red">*</font>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email ID"  required/>
                  </div>           
                </div>
                </div>
            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm">Next</button>
              <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
              </div>      
            </form>
         
     



      @endif



@endif
<input type="hidden" name="hidden_view"  id='hidden_view'  value="{{route('view_addressss')}}"> 
<input type="hidden" name="hidden_view1" id='hidden_view1' value="{{route('view1_addressss')}}"> 
<input type="hidden" name="hidden_view2" id='hidden_view2' value="{{route('view2_addressss')}}">
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
