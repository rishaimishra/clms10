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
            <h5 class="m-0 text-dark"><h3>ཞལ་འདེབས་གསརཔ་བཙུགས།</h5>
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
<section class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 form-group"> 
<p><h3 style="color: orange;">ཞལ་འདེབས་བསྡུ་ལེན་འབད་མི། </h3>(གྱངས་ཁ་ ༦ ལས་མ་བརྒལ།)</p>
<div class="row">
<form action="{{ route('cid_search_donation_dzo', $donation_id) }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }} 
          <div class="col-md-12">
          <div class="input-group input-group-sm mb-0">
            <label class="col-sm-2 col-form-label" for="cid"><h3>ངོ་སྤྲོད་ལག་ཁྱེར་ཨང༌།:</h3></label>&nbsp;&nbsp;&nbsp;&nbsp;
            <input class=" col-sm-3" name="cidno" placeholder="Enter CID number">
            <div class="input-group-append">
            <h2><button type="submit" name="submit" class="btn btn-warning btn-sm"><i class="fas fa-search"></i>&nbsp;འཚོལ།
            </button></h2>
            </div>
          </div>
          </div>
<input type="hidden" name="donation_id" value="{{$donation_id}}">
</div>
<?php
    require_once('/var/www/html/croweb/SwaggerClient-php/vendor/autoload.php');
    $token_url = "https://datahub-apim.dit.gov.bt/token";
    $test_api_url = "https://staging-datahub-apim.dit.gov.bt/dcrc_citizen_details_api/1.0.0";
    $client_id = "s5EeWEv37USBjEPofj7d28Gugzka";
    $client_secret = "HT4zMScc0EXEbZfcnAj9_TfugqEa";
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
<input id="cid" type="hidden" class="form-control" name="cid" value="<?php echo $cDetail1[0]['cid'];?>">
<input id="name" type="hidden" class="form-control" name="name" value="<?php echo $cDetail1[0]['firstDzoName'];?>">
<input type="hidden" name='type1' id='type1' class="form-control" value="<?php echo $cDetail1[0]['dzongkhagName'];?>">
<input type="hidden" name='gewog' id='gewog' class="form-control" value="<?php echo $cDetail1[0]['gewogName'];?>">

  <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h4>ཨང༌།</h4></th>
                  <th><h4>ངོ་སྤྲོད་ལག་ཁྱེར་ཨང༌།</h4></th>
                  <th><h4>ངོ་མིང་</h4></th>
                  <th><h4>རྫོང་ཁག</h4></th>
                  <th><h4>རྒེད་འོག</h4></th>
                  <th><h4>དང་ལེན།</h4></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($member as $dc)
              @if($dc->cid != '')
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->cid }}</td>
                  <td><h4>{{ $dc->name }}</h4></td>
                  <td><h4><?php if (is_numeric($dc->dzongkhag)) { echo "<?php echo $dzo = App\dzongkhag::where('dzongkhag_id',$dc->dzongkhag)->value('dzongkhag_name');?>"; } else { echo "$dc->dzongkhag"; } ?></h4></td>
                  <td><h4><?php if (is_numeric($dc->gewog)) { echo "<?php echo $dzo = App\gewog::where('gewog_id',$dc->gewog)->value('gewog_name');?>"; } else { echo "$dc->gewog"; } ?></h4></td>
                  <td>
                    <a href="{{ route('destroy_collector_dzo', array($dc->id, $dc->donation_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
                    <span class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i><h4>བཏོན་གཏང་།</h4></span></a>
                  </td>
              </tr>
              @endif
              @endforeach
            </tbody>
    </table> 
</div>
</div> 
</form>
</div> 
<form class="search-form" role="form" method="POST" action="{{ route('store_donationcollectors_dzo') }}">  
{{ csrf_field() }} 
<input type="hidden" name="donation_id" value="{{$donation_id}}">
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<?php $donss = App\tbl_donation::where('donation_id', $donation_id)->value('donation_id'); ?>
@if( ! $donss )
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="purpose"><h3>དགོས་དོན།<font color="red">*</font></h3></label>
     <textarea type="text" id="purpose" class="form-control col-sm-6" name="purpose" rows="3" required/></textarea>
   </div>
@else
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="purpose"><h3>དགོས་དོན།</h3></label>
     <h4><?php echo $donss = App\tbl_donation::where('donation_id', $donation_id)->value('purpose'); ?></h4>
   </div><br>
@endif    
<button type="submit" class="btn btn-primary btn-sm"><h3>ཕུལ།</h3></button><button class="btn btn-primary btn-bg"><h3><a href="{{ route('donation_dzo') }}" style="color: white;" title="Finish and return to dashboard"><i class="fa fa-fw fa-home"></i>&nbsp;གདོང་ཤོག</a></h3></button>
</div>
</div>
</div>
</form>
</div>
</div>
</section>  
</div>
</div>    
</div>
@include('application.includes.footer_dzo')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>

<script src={{asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/ekko-lightbox/ekko-lightbox.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/dist/js/demo.js")}}"></script>
<script src={{asset("/bower_components/admin-lte/plugins/filterizr/jquery.filterizr.min.js")}}"></script>


