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
            <h5 class="m-0 text-dark"><h3>ཉེས་ཁྲིམས་བཀལ་ནི།</h3></h5>
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
        <a href="{{ route('discipline_view_dzo') }}" title="View Details">
        <span class="btn btn-warning btn-bg"><i class="fa fa-fw fa-eye"></i>&nbsp;&nbsp;&nbsp;<h3>ཉེས་ཁྲིམས་བཀལ་མི་ ཚུ་གི་ཐོ། </h3></span></a>
      </div><!-- /.container-fluid -->
    </div>

    

    <section class="content">
    <div class="container-fluid">


<div class="card-body">
<form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('discipline_store_dzo') }}">  
{{ csrf_field() }} 
        <div class="card card-solid">
        <div class="card-body">
        <div class="row">
<div class="col-12 col-sm-6">
    <div class="checkbox"> 
      <h3><label for="action_against" class="col-sm-6 col-form-label">ཉེས་ཁྲིམས་བཀལ་དགོཔ།:</label>
      &nbsp;&nbsp;&nbsp;&nbsp;ཆོས་སྡེ
      <input type="radio" onclick="javascript:yesnoCheck();" name="roCheck" id="roCheck" value="ཆོས་སྡེ"> 
      &nbsp;&nbsp;&nbsp;&nbsp;མི་ངོ་།
      <input type="radio" onclick="javascript:yesnoCheck1();" name="indiCheck" id="indiCheck" value="མི་ངོ་།"></h3><br>
      <div id="ifro" style="visibility:hidden" value="ཆོས་སྡེ">
       <div class="form-row">
       <label class="col-sm-5 col-form-label"  for="ro_name"><h3>ཆོས་ཚོགས་ཀྱི་མཚན</h3></label>
       <select class="form-control col-sm-6" id="ro_name" name="ro_name" required>
          <option disabled selected><h3>ཆོས་ཚོགས་ཀྱི་མཚན་ གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
          <?php 
          $ag=App\tbl_agency::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">{{$ags->agency}}</option>
          <?php endforeach ?>
       </select>
       </div>
       <div class="form-row">
       <label class="col-sm-5 col-form-label"  for="reason"><h3>རྒྱུ་མཚན།</h3></label>
       <textarea class="form-control col-sm-6" name="reason" id="reason" rows="4"></textarea>
       </div>
       <div class="form-row">
       <label class="col-sm-5 col-form-label"  for="action"><h3>ཉེས་ཁྲིམས་དང་ལེན་འབད་འོསཔ།</h3></label>
       <textarea class="form-control col-sm-6" name="action" id="action" rows="4"></textarea>
       </div>
       <div class="form-row">
       <label class="col-sm-5 col-form-label"  for="event_details"><h3>བཀའ་རྒྱ་གནང་མི་ཡི་གུ།</h3></label>
       <input type="file" id="exampleInputFile1"  class="form-control col-sm-6" name="discipline_action[]" multiple="">
       </div>
      </div>
    </div>
</div>

<div class="col-12 col-sm-6">
    <div class="checkbox">      
      <div id="ifindi" style="visibility:hidden" value="མི་ངོ་།"><br>
      <div class="form-row">
       <label class="col-sm-5 col-form-label"  for="discription"><h3>ཆོས་ཚོགས་ཀྱི་མཚན</h3></label>
       <select class="form-control col-sm-6" id="ro_name2" name="ro_name2" required>
          <option disabled selected><h3>ཆོས་ཚོགས་ཀྱི་མཚན་ གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
          <?php 
          $ag=App\tbl_agency::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">{{$ags->agency}}</option>
          <?php endforeach ?>
       </select>
       </div>
       <div class="form-row">
       <label class="col-sm-5 col-form-label"  for="individual_name"><h3>མི་ངོ་ </h3></label>
        <select class="form-control col-sm-6" id="individual_name" name="individual_name">
        <option disabled selected><h4>གདམ་ཁ་རྐྱབ༌ནང༌།</h4></option>        
          <?php 
          $ag=App\tbl_chairman_detail::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">Chairman:{{$ags->name}}</option>
          <?php endforeach ?>
          <?php 
          $ag=App\tbl_dychairman_detail::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">Deputy chairman:{{$ags->name}}</option>
          <?php endforeach ?> 
          <?php 
          $ag=App\tbl_secretary_detail::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">Secretary:{{$ags->name}}</option>
          <?php endforeach ?>
          <?php 
          $ag=App\tbl_dysecretary_detail::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">Deputy Secretary:{{$ags->name}}</option>
          <?php endforeach ?>
          <?php 
          $ag=App\tbl_treasurer_detail::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">Treasurer:{{$ags->name}}</option>
          <?php endforeach ?>
        </select>
       </div>
       <div class="form-row">
       <label class="col-sm-5 col-form-label"  for="reason"><h3>རྒྱུ་མཚན།</h3></label>
       <textarea class="form-control col-sm-6" name="reason2" id="reason2" rows="4"></textarea>
       </div>
       <div class="form-row">
       <label class="col-sm-5 col-form-label"  for="action"><h3>ཉེས་ཁྲིམས་ དང་ལེན་འབད་འོསཔ།</h3></label>
       <textarea class="form-control col-sm-6" name="action2" id="action2" rows="4"></textarea>
       </div>
       <div class="form-row">
       <label class="col-sm-5 col-form-label"  for="event_details"><h3>བཀའ་རྒྱ་གནང་མི་ཡི་གུ།</h3></label>
       <input type="file" id="exampleInputFile12"  class="form-control col-sm-6" name="discipline_action[]" multiple="">
       </div>
      </div>
    </div>
</div>




   
  <br>
  <div class="form-row">
  <button type="submit" class="btn btn-primary btn-sm"><h3>ཕུལ།</h3></button>
  <button type="submit" class="btn btn-danger btn-sm"><h3>ཆ་མེད</h3></button>
  </div>
</form>         
</div>
    </div>
    </div>
    </div>

  </div>
  </section>  


          
</div>
@include('application.includes.footer_dzo')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script type="text/javascript">
function yesnoCheck() {
    if (document.getElementById('roCheck').checked) {
        document.getElementById('ifro').style.visibility = 'visible';
         document.getElementById('ifindi').style.visibility = 'hidden';
    }
   

} 


function yesnoCheck1() {
    if (document.getElementById('indiCheck').checked) {
        document.getElementById('ifindi').style.visibility = 'visible';
        document.getElementById('ifro').style.visibility = 'hidden';
    }
   

}


</script>

