<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RO Registration | CRO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/jqvmap/jqvmap.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/summernote/summernote-bs4.css")}}">
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
                 <h3>ཆོས་སྡེ་ཐོ་བཀོད།</h3>
                </div>
                <a href="{{ route('login') }}" class="btn btn-default btn-flat btn-sm" style="float: right;">EXIT</a>
              </div>
@if($token_no != '' && $dcroid == '')
              <div class="card-body">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info" href="{{route('register_home_a_dzo',$token_no)}}" data-filter="1"><h3>ཆོས་ཚོགས་ཀྱི་ཁ་གསལ།</h3></a>
                    <a class="btn btn-info" href="{{route('chairman_details_dzo',$ro_id)}}" data-filter="2"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></a>
                    <a class="btn btn-info active" href="{{route('dychairman_details_dzo',$ro_id)}}" data-filter="3"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('secretary_details_dzo',$ro_id)}}" data-filter="4"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('dysecretary_details_dzo',$ro_id)}}" data-filter="5"><h3>དྲུང་ཆེན་འོགམ་གྱི་ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('treasurer_details_dzo',$ro_id)}}" data-filter="6"><h3>རྩིས་འཛིན་ཁ་གསལ།</h3></a>
                  </div>
                </div>
            <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                   <form action="{{ route('cid_search_dcdreg',$ro_id) }}" method="POST" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="input-group input-group-sm mb-0">
            <label class="col-sm-2 col-form-label" for="cid"><h3>???????????????????</h3></label>
            <input class=" col-sm-3" name="cidno" placeholder="Enter CID number">
            <div class="input-group-append">
             <button type="submit" class="btn btn-danger"><h3>?????????</h3></button>
            </div>
            </div>
                  </form>
<?php
  require_once('/var/www/html/croweb/SwaggerClient-php/vendor/autoload.php');

    $token_url = "https://datahub-apim.dit.gov.bt/token";
    $test_api_url = "https://staging-datahub-apim.dit.gov.bt/dcrc_citizen_details_api/1.0.0";

    $client_id = "s5EeWEv37USBjEPofj7d28Gugzka";
    $client_secret = "HT4zMScc0EXEbZfcnAj9_TfugqEa";
    //$access_token = getAccessToken($token_url, $client_id, $client_secret); 
    $access_token = "5b7220fb-f1d4-3d6a-ad0d-a42b18858054";

  echo "<br /><br />";
  function getAccessToken() {
    global $token_url, $client_id, $client_secret;

    $content = "grant_type=client_credentials";
    $authorization = base64_encode("$client_id:$client_secret");
    $header = array("Authorization: Basic {$authorization}","Content-Type: application/x-www-form-urlencoded");

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $token_url,
      CURLOPT_HTTPHEADER => $header,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => $content
    ));
    $response = curl_exec($curl);
    curl_close($curl);

    return json_decode($response)->access_token;
  }

  $config = Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken($access_token);
  $config->setHost($test_api_url);

  $apiInstance = new Swagger\Client\Api\DefaultApi(
    new GuzzleHttp\Client(['verify' => false]),
    $config
  );
 // $cid = "11701000328"; 
    $cid = $cidno; 
  try {
    $result1 = $apiInstance->citizendetailsCidGet($cid);
    $data1 = json_decode($result1, true);
    foreach ($data1['citizenDetailsResponse'] as $cDetails1){
       $cDetail1 = $cDetails1;
       
       // print_r($cDetail1);
    }
  } catch (Exception $e) {
    echo 'Exception when calling DefaultApi->citizendetailsCidGet: ', $e->getMessage(), PHP_EOL;
    }
?>

  <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('dychairman_details_store_dzo') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="hidden" name="dets" value="{{$dets}}">
    <?php error_reporting(E_ALL & ~E_NOTICE);?>
  {{ csrf_field() }}
                  <div class="form-group input-group-sm">
                    <label for="name"><h3>མིང་</h3></label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $cDetail1[0]['firstDzoName'];?>" readonly required/>
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag"><h3>རྫོང་ཁག</h3></label>
                                       
                    <input type="text" class="form-control" name='type1' id='type1' value="<?php echo $cDetail1[0]['dzongkhagName'];?>" readonly required/>
                  
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dungkhag"><h3>དྲུང་ཁག</h3></label>
                    <input type="text" class="form-control" name="dungkhag" placeholder="Enter dungkhag">
                  </div> 
                  <div class="form-group input-group-sm">
                     <label for="gewog"><h3>རྒེད་འོག</h3></label>
                    <input type="text" class="form-control" name='gewog' id='gewog' value="<?php echo $cDetail1[0]['gewogName'];?>" readonly required/>
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="village"><h3>གཡུས</h3></label>
                    <input type="text" class="form-control" name='village' id='village' value="<?php echo $cDetail1[0]['villageName'];?>" readonly required/>
                  </div>            
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="houseno"><h3>གུང་ཨང་</h3></label>
                    <input type="text" class="form-control" name="houseno" id="houseno" value="<?php echo $cDetail1[0]['houseNo'];?>"readonly required/>
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="thramno"><h3>གུང་ཨང་</h3></label>
                    <input type="text" class="form-control" name="thramno" id="thramno" value="<?php echo $cDetail1[0]['thramNo'];?>"readonly required/>
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dob"><h3>སྐྱེས་ཚེས</h3></label>
                    <input type="date" class="form-control" name="dob" value="<?php echo $cDetail1[0]['dob'];?>">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="qualification"><h3>ཤེས་ཚད</h3></label>
                    <input type="text" class="form-control" name="qualification" placeholder="Enter Qualification">
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="phoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
                    <input type="text" class="form-control" name="phoneno" placeholder="Enter Phone Number">
                  </div>      
                </div>
                </div>
                <div class="col-md-4">
                 <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
                    <input type="email" class="form-control" name="email" placeholder="Email ID">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="date"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས</h3></label>
                    <input type="date" class="form-control" name="appdate" placeholder="Enter Date Of Election/Appointment">
                  </div>   

                  <div class="form-group input-group-sm">
                    <label for="photo"><h3>ངོ་པར།</h3></label>
                    <input type="file" name="photo" class="form-control" id='photo'>
                  </div> 

<div class="form-group input-group-sm">
<label for="chairman"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ཡིག་ཆ།</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="dcd[]" multiple="">
</div>
                       
                </div>
                </div>
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">
            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm"><h3> བསྲུང་།</h3></button>
              <button type="submit" class="btn btn-danger btn-sm"><h3>ཆ་མེད།</h3></button>
              </div>      
            </form>

              </div>


          @elseif($dcroid != '')
              <div class="card-body">
                <div>
                   <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info" href="{{route('register_home_a_dzo',$token_no)}}" data-filter="1"><h3>ཆོས་ཚོགས་ཀྱི་ཁ་གསལ།</h3></a>
                    <a class="btn btn-info" href="{{route('chairman_details_dzo',$ro_id)}}" data-filter="2"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></a>
                    <a class="btn btn-info active" href="{{route('dychairman_details_dzo',$ro_id)}}" data-filter="3"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('secretary_details_dzo',$ro_id)}}" data-filter="4"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('dysecretary_details_dzo',$ro_id)}}" data-filter="5"><h3>དྲུང་ཆེན་འོགམ་གྱི་ཁ་གསལ། </h3></a>
                    <a class="btn btn-info" href="{{route('treasurer_details_dzo',$ro_id)}}" data-filter="6"><h3>རྩིས་འཛིན་ཁ་གསལ།</h3></a>
                  </div>
                </div>

@foreach($data as $app)
  <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('dychairman_details_store_edit_dzo') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> 
  <input type="hidden" name="matchedTerm2" id="matchedTerm2" value="{{ $app->ro_id }}">
  {{ csrf_field() }}
            <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="name"><h3>མིང་</h3></label>
                    <input type="text" class="form-control" name="name" value="{{ $app->name }}" placeholder="Enter Name">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag"><h3>རྫོང་ཁག</h3></label>
                    <select name='type1' id='type1' class="form-control">
                    <option disabled selected><h3>གདམ་ཁ་རྐྱབ་ནི།</h3></option>
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
                    <label for="dungkhag"><h3>དྲུང་ཁག</h3></label>
                    <input type="text" class="form-control" name="dungkhag" value="{{ $app->dungkhag }}" placeholder="Enter dungkhag">
                  </div> 
                  <div class="form-group input-group-sm">
                     <label for="gewog"><h3>རྒེད་འོག</h3></label>
                     <select name='gewog' id='gewog' class="form-control">
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
                    <label for="village"><h3>གཡུས</h3></label>
                     <select name='village' id='village' class="form-control">
                     <?php 
                  $gewog=App\village_dzo::all();
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
                    <label for="houseno"><h3>གུང་ཨང་</h3></label>
                    <input type="text" class="form-control" name="houseno" value="{{ $app->houseno }}" placeholder="Enter House Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="thramno"><h3>གུང་ཨང་</h3></label>
                    <input type="text" class="form-control" name="thramno" value="{{ $app->thramno }}" placeholder="Enter Thram Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dob"><h3>སྐྱེས་ཚེས</h3></label>
                    <input type="date" class="form-control" name="dob" value="{{ $app->dob }}" placeholder="Enter DOB Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="qualification"><h3>ཤེས་ཚད</h3></label>
                    <input type="text" class="form-control" name="qualification" value="{{ $app->qualification }}" placeholder="Enter Qualification">
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="phoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
                    <input type="text" class="form-control" name="phoneno" value="{{ $app->phoneno }}" placeholder="Enter Phone Number">
                  </div>      
                </div>
                </div>
                <div class="col-md-4">
                 <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
                    <input type="email" class="form-control" name="email" value="{{ $app->email }}" placeholder="Email ID">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="date"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས</h3></label>
                    <input type="date" class="form-control" name="appdate" value="{{ $app->appdate }}" placeholder="Enter Date Of Election/Appointment">
                  </div>   
                  <div class="form-group input-group-sm">
                    <label for="photo"><h3>ངོ་པར།</h3></label>
                    <input type="file" name="photo" class="form-control" value="{{ $app->photo }}" id='photo'>
                  </div>


                  <h4>ངོ་པར།</h4>:&nbsp;&nbsp;&nbsp;{{ $app->photo }}
                  @if( $app->photo == '')
                  No Photo!
                  @else
                  <a href="{{asset('/images/'.$app->photo)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
                  @endif
<?php  $droid=  DB::table('tbl_register_documents')->where('ro_id', $dets )->get(); ?> 
<div class="form-group input-group-sm">
<label for="chairman"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ཡིག་ཆ།</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="dcd[]" multiple="">
</div>
@foreach($droid as $dd)
@if($dd->filecat == 'dcd')
<h4>ཁྲི་འཛིན་འོགམ་གྱི་ཡིག་ཆ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
@endif
@endforeach                                             
                </div>
                </div>
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">
            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm"><h3> བསྲུང་།</h3></button>
              <button type="submit" class="btn btn-danger btn-sm"><h3>ཆ་མེད།</h3></button>
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
<script src={{asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/ekko-lightbox/ekko-lightbox.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/dist/js/demo.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/filterizr/jquery.filterizr.min.js")}}"></script>
<script type="text/javascript">
  $('#type1').change(function()
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
  $('#type1').change(function()
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
</script>
</body>
</html>
