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
            <h5 class="m-0 text-dark"><h3>ཡན་ལག་ཆོས་སྡེ།</h3></h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><h5>གདོང་ཤོག</h5></a></li>
              <li class="breadcrumb-item active"><h5>ཆོས་སྡེ་ལྷན་ཚོགས།</h5></li>
            </ol>
          </div>  
<div class="col-md-12">
<div class="card">
<br>

    <section class="content">
    <div class="container-fluid">

      <div>
      <div class="btn-group w-100 mb-2">
        <a class="btn btn-info" href="" data-filter="1"><h3>ཡན་ལག་ཆོས་སྡེ།</h3></a>
        <a class="btn btn-info active" href="" data-filter="2"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></a>
        <a class="btn btn-info" href="" data-filter="4"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ། </h3></a>
        <a class="btn btn-info" href="" data-filter="6"><h3>རྩིས་འཛིན་གྱི་ཁ་གསལ།</h3></a>
      </div>
      </div>

            <div class="row">
                <div class="col-md-4">
                <div class="card-body">

                   <form action="{{ route('chapter_chairman_details_cid_dzo',$dets) }}" method="POST" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="input-group input-group-sm mb-0">
                           <h4><label for="cid">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་</label>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                          <input class="form-control form-control-sm" name='cidno' placeholder="Enter CID number" required/>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger"><h4>འཚོལ།</h4></button>
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

<?php error_reporting(E_ALL & ~E_NOTICE);?>
 <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('chapter_chairman_details_store_dzo') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="hidden" name="det" value="{{$dets}}">
  <input type="hidden" name="detties" value="{{Auth::user()->organization}}">
  {{ csrf_field() }}  

 


                  <div class="form-group input-group-sm">
                    <label for="name"><h3>མིང་<font color="red">*</font></h3></label>
                    <input type="text" class="form-control" name="name" value="<?php echo $cDetail1[0]['firstDzoName'];?>" readonly required/> 
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag"><h3>རྫོང་ཁག།<font color="red">*</font></h3></label>        
                    <input name='type1' id='type1' class="form-control" value="<?php echo $cDetail1[0]['dzongkhagName'];?>" readonly required/>                  
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dungkhag"><h3>དྲུང་ཁག</h3></label>
                    <input type="text" class="form-control" name="dungkhag" placeholder="Enter dungkhag">
                  </div> 
                  <div class="form-group input-group-sm">
                     <label for="gewog"><h3>རྒེད་འོག།</h3></label>
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
                    <label for="thramno"><h3>ཁྲམ་ཨང་</h3></label>
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
                    <label for="date"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས་<font color="red">*</font></h3></label>
                    <input type="date" class="form-control" name="appdate" placeholder="Enter Date Of Election/Appointment">
                  </div>  
                  <div class="form-group input-group-sm">
                    <label for="photo"><h3>ངོ་པར།</h3></label>
                    <input type="file" name="photo" class="form-control" id='photo' required="required">
                  </div> 
<div class="form-group input-group-sm">
<label for="chairman"><h3>ཁྲི་འཛིན་གྱི་ཡིག་ཆ<font color="red">*</font>།</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="cd[]" multiple="" required="required"/>
</div>
                         
                </div>
                </div>
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">
            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm"><h4>བསྲུང་།</h4></button>
              <button type="submit" class="btn btn-danger btn-sm"><h4>ཆ་མེད།</h4></button>
              </div>                   
            </form>

     




    </div>
    </section>  
</div>
</div>
</div>
</div>
</div>
</div>
@include('application.includes.footer_dzo')
</body>
<!-- ./wrapper -->
<script src={{asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/ekko-lightbox/ekko-lightbox.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/dist/js/demo.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/filterizr/jquery.filterizr.min.js")}}"></script>
