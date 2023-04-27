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
            <h5 class="m-0 text-dark"><h3>ཞལ་གྲངས།</h3></h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><h5>གདོང་ཤོག</h5></a></li>
              <li class="breadcrumb-item active"><h5>ཆོས་སྡེ་ལྷན་ཚོགས།</h5></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="col-md-12">
<div class="card">
<br>
    <section class="content">
    <div class="container-fluid">
            <form action="{{ route('cid_search_zheldrang_dzo') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group input-group-sm mb-0">
            <h4><label for="cid">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་།</label>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
            <input class=" col-sm-3" name="cidno" placeholder="Enter CID number">
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
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('zheldrang_store_dzo') }}">  
{{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="cid"><h3>ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་།<font color="red">*</font></h3></label>

     <input id="cid" type="text" class="form-control col-sm-6" id="cid" name="cid" value="<?php echo $cDetail1[0]['cid']; ?>" required="required" onfocusout="checkdup()" >
   </div>
 <script type="text/javascript">
   function checkdup()  
    {   
        var cid = document.getElementById('cid').value;
        var token = "{{ csrf_token() }}";

        $.ajax({
        method :"post",
        url : "{{ route('zheldrang_check') }}",
        data : {_token:token,cid:cid},
        dataType:'json',
        success:function(response){
            var result = response.success;
            if (result == 1) {
                alert("The Applicant is Already Registered.");
            }   
            else{ 
              alert("First Registration");
                 }
       },
       error:function(err){
      },
      
    });
    }
 </script>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="name"><h3>མིང་།</h3></label>
     <input type="text" class="form-control col-sm-6" name="name" id="name" value="<?php echo $cDetail1[0]['firstDzoName'];?>" readonly required/>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="type1"><h3>རྫོང་ཁག།</h3></label>
     <input type="text" name='type1' id='type1' class="form-control col-sm-6" value="<?php echo $cDetail1[0]['dzongkhagName'];?>" readonly required/>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="gewog"><h3>རྒེད་འོག།</h3></label>
      <input type="text" class="form-control col-sm-6" name='gewog' id='gewog' value="<?php echo $cDetail1[0]['gewogName'];?>" readonly required/>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="village"><h3>གཡུས།</h3></label>
     <input type="text" class="form-control col-sm-6" name='village' id='village' value="<?php echo $cDetail1[0]['villageName'];?>" readonly required/>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="thramno"><h3>ཁྲམ་ཨང་།</h3></label>
          <input type="text" class="form-control col-sm-6" name="thramno" id="thramno" value="<?php echo $cDetail1[0]['thramNo'];?>"readonly required/>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="houseno"><h3>གུང་ཨང་།</h3></label>
     <input type="text" class="form-control col-sm-6" name="houseno" id="houseno" value="<?php echo $cDetail1[0]['houseNo'];?>"readonly required/>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="contact"><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></label>
     <input type="text" class="form-control col-sm-6" name="contact" id="contact">
   </div>
   <div class="form-row">
     <<label class="col-sm-3 col-form-label"  for="designation"><h3>གོ་གནས།<font color="red">*</font></h3></label>
     <select name='designation' id='designation' class="form-control col-sm-6" required>
     <option disabled selected><h3>གོ་གནས་ གདམ་ཁ་རྐྱབ་ནི།</h3></option>
     <?php 
     $des=App\tbl_designation::all();
     foreach($des as $dess):
     ?>
     <option value="{{$dess->id}}">{{$dess->designation_dzo}}</option>
     <?php endforeach ?>
     </select>

   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="religion"><h3>ཆོས་ལུགས།</h3></label>
     <input type="text" class="form-control col-sm-6" name="religion" id="religion">
   </div> 
     <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="religion"><h3>ཆོས་ཆོགས།</h3></label>
     <input type="text" class="form-control col-sm-6" name="tshetshok" id="tshetshok">
   </div>
 
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">
  <br>
  <div class="form-row">
  <button type="submit" class="btn btn-primary btn-sm"><h4>བསྲུང་།</h4></button>
  <button type="submit" class="btn btn-danger btn-sm"><h4>ཆ་མེད།</h4></button>
  </div>
</form>         
</div>
</div>
</div>

  </div>
  </section>  

</div>
</div>
          
</div>
@include('application.includes.footer')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>


