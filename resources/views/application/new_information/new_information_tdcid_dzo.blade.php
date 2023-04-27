  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
  <!--oncahnge-->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
<body class="hold-transition sidebar-mini">
@include('application.includes.header')
@include('application.includes.sidebar_dzo')
<div class="content-wrapper">
@include('flash-message')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             <h5 class="m-0 text-dark"><h3>ཆོས་སྡེའི་ཁ་གསལ་གསརཔ།</h3></h5>
             <p><?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
              </p> 
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><h4>གདོང་ཤོག</h4></a></li>
              <li class="breadcrumb-item active"><h4>ཆོས་སྡེ་ལྷན་ཚོགས།</h4></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="col-md-12">
<div class="card"><br>
    <div class="btn-group w-100 mb-2">
        <a class="btn btn-warning active" data-filter="2"><h3>དངུལ་འཛིན་གྱི་ཁ་གསལ་གསརཔ།</h3></a>
       
    </div>
            @if(Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
            </div>
            @endif
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
<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('new_treasurer_details_store_dzo',$ro_id) }}">
      <input type="hidden" name="ro_id" value="{{$ro_id}}">
      <input type="hidden" name="new_treasurer" value="1">
      <?php error_reporting(E_ALL & ~E_NOTICE);?>
      {{ csrf_field() }}
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="tname" id="tname" value="<?php echo $cDetail1[0]['firstDzoName'];?>" readonly required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <input type="text" class="form-control" name='ttype1' id='ttype1' value="<?php echo $cDetail1[0]['dzongkhagName'];?>" readonly required/>     
            </div>
            <div class="form-group input-group-sm">
            <label for="dungkhag"><h3>དྲུང་ཁག</h3></label>
            <input type="text" class="form-control" name="tdungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="gewog"><h3>རྒེད་འོག</h3></label>
            <input type="text" class="form-control" name='tgewog' id='tgewog' value="<?php echo $cDetail1[0]['gewogName'];?>" readonly required/>
            </div> 
            <div class="form-group input-group-sm">
            <label for="village"><h3>གཡུས</h3></label>
            <input type="text" class="form-control" name='tvillage' id='tvillage' value="<?php echo $cDetail1[0]['villageName'];?>" readonly required/>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="houseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="thouseno" id="thouseno" value="<?php echo $cDetail1[0]['houseNo'];?>"readonly required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="thramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="tthramno" id="tthramno" value="<?php echo $cDetail1[0]['thramNo'];?>"readonly required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="dob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="tdob" value="<?php echo $cDetail1[0]['dob'];?>">
            </div>
            <div class="form-group input-group-sm">
            <label for="qualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="tqualification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="phoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="tphoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="temail" placeholder="Email ID"  >
            </div>
            <div class="form-group input-group-sm">
            <label for="date"><h3>བསྐོ་བཞག་གི་  སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="tappdate" placeholder="Enter Date Of Election/Appointment">
            </div>
            <div class="form-group input-group-sm">
            <label for="photo"><h3>ངོ་པར།</h3></label>
            <input type="file" name="photo" class="form-control" id='photo'>
            </div> 

<div class="form-group input-group-sm">
<label for="chairman"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ:</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="td[]" multiple="">
</div>

        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">     
      <div class="col-md-12 modal-footer">
       <button type="submit" class="btn btn-primary btn-xs"><h4>བསྲུང་</h4></button>
       <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
      </div>
      </div>
    </div>
  </form>
</div>


@include('application.includes.footer')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
