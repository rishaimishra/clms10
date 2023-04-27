  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
<body class="hold-transition sidebar-mini">
@include('application.includes.header')
@include('application.includes.sidebar_dzo')
<div class="content-wrapper">
@include('flash-message')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark"><h3>visa /སྐྱོད་ཐམ་ཞུ་ཚིག་ བཀང་ཤོག།</h3></h5>
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

<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
  <form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('visaapplication_store_dzo') }}">
  <input type="hidden" name="purposeid"  id="purposeid" value="{{$purposeid}}">
  @foreach($agency as $ag)
  <input type="hidden" name="ro_id" id="ro_id" value="<?php echo $ro_id = App\tbl_ro_detail::where('name', $ag->agency)->value('ro_id');?>">
  @endforeach
  {{ csrf_field() }}
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="name"><h3>མིང༌།<font color="red">*</font></h3><h4>(མི་ཁུངས་ལག་དེབ་ ན་ཡོད་མི།)</h4></label>
     <input type="text" class="form-control col-sm-6" name="name" id="name" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="dob"><h3>སྐྱེ་བའི་ སྤྱི་ཚེས།<font color="red">*</font></h3></label>
     <input type="date" class="form-control col-sm-6" name="dob" id="dob" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="pob"><h3>སྐྱེ་བའི་ ས་གནས།<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-6" name="pob" id="pob" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="cob"><h3>སྐྱེ་བའི་ རྒྱལ་ཁབ།<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-6" name="cob" id="cob" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="current_nationality"><h3>ད་ལྟོའི་ རྒྱལ་ཁབ་ཀྱི་མི་ཁུངས།<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-6" name="current_nationality" id="current_nationality" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="birth_nationality"><h3>སྐྱེ་བའི་  རྒྱལ་ཁབ་ཀྱི་མི་ཁུངས།<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-6" name="birth_nationality" id="birth_nationality" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="sex"><h3>ཕོ་མོའི་དབྱེ་བ།<font color="red">*</font></h3></label>
     <select class="form-control col-sm-6" name="sex" id="sex" required="required">
      <option></option>
      <option value="1"><h4>ཕོ།</h4></option>
      <option value="2"><h4>མོ།</h4></option>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="marital_status"><h3>གཉེན་འབྲེལ་གནས་སྟངས།<font color="red">*</font></h3></label>
     <select class="form-control col-sm-6" name="marital_status" id="marital_status" required="required">
      <option></option>
      <option value="1"><h4> གཉེན་རྐྱབ་རྐྱབཔ།</h4></option>
      <option value="2"><h4>གཉེན་མ་རྐྱབ།</h4></option>
     </select>
   </div>
    <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="passport_type"><h3>མི་ཁུངས་ལག་དེབ་ དབྱེ་བ།།<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-6" name="passport_type" id="passport_type" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="passport"><h3>མི་ཁུངས་ལག་དེབ་ ཨང་།<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-6" name="passportno" id="passportno" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="issueplace"><h3>ལག་དེབ་བྱིན་སའི་ ས་གནས།<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-6" name="issueplace" id="issueplace" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="issuedate"><h3>བྱིན་མའི་ སྤྱི་ཚེས། </h3></label>
     <input type="date" class="form-control col-sm-6" name="issuedate" id="issuedate" >
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="validity"><h3>ཆ་འཇོག་ཡུན་གནས།<font color="red">*</font></h3></label>
     <input type="date" class="form-control col-sm-6" name="validity" id="validity" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="per_address"><h3>རྟག་བརྟན་གྱི་ ཁ་བྱང༌།<font color="red">*</font></h3></label>
     <textarea type="text" id="per_address" class="form-control col-sm-6" name="per_address" value="" rows="3" required="required"></textarea>
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="telephone"><h3>བརྒྱུད་འཕྲིན་ཨང༌།</h3></label>
     <input type="text" class="form-control col-sm-6" name="telephone" id="telephone" >
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="occupation"><h3>ལཱ་གཡོག </h3></label>
     <input type="text" class="form-control col-sm-6" name="occupation" id="occupation" >
   </div>
   <p><h3 style="color: orange;">visa /སྐྱོད་ཐམ་ཞུ་ཚིག་དགོ་པའི་ དུས་ཡུན།</h3></p>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="from"><h3>འགོ་བཙུགས་ཚེས<font color="red">*</font></h3></label>
     <input type="date" class="form-control col-sm-6" name="from" id="from" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="to"><h3>མཇུག་བསྡུ་ཚེས<font color="red">*</font></h3></label>
     <input type="date" class="form-control col-sm-6" name="to" id="to" required="required">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="entryport"><h3>འཛུལ་སའི་ས་གནས།</h3></label>
     <input type="text" class="form-control col-sm-6" name="entryport" id="entryport">
   </div>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="exitport"><h3>འཐོན་སའི་ས་གནས།</h3></label>
     <input type="text" class="form-control col-sm-6" name="exitport" id="exitport">
   </div>
   <div class="checkbox"> 
      <label for="accompany" class="col-sm-12 col-form-label" >
      <h4>མགྱོནམོ་དང༌མཉམ་གཅིག་ གཉེན་ཟླ།/ཕམ།/ཨ་ལུ་ཚུ་ ཡོད་ག?</h4></label>
      &nbsp;&nbsp;&nbsp;&nbsp;<h4>ཡོད།</h4> <input type="radio" onclick="javascript:yesnoCheck();" name="accompany" id="yesCheck" value="yes"> 
      <h4>མེད།</h4>  <input type="radio" onclick="javascript:yesnoCheck();" name="accompany" id="noCheck" value="no"><br>
      <div id="ifYes" style="visibility:hidden" value="yes">
        <div class="form-row">
        <label class="col-sm-4 col-form-label"  for="accompanyname"><h3>མིང༌།</h3></label>
        <input type="text" class="form-control col-sm-6" name="accompanyname" id="accompanyname">
        </div>

            <div id="file_div">
            <div class="col-sm-9 col-form-label">
            <div class="form-group">
            <input type="button" onclick="add_file();" value="Add More" class="btn btn-success btn-xs" style="float: right;">
            </div>
            </div>         
            </div>


      </div>
   </div>
   <div class="checkbox2"> 
      <label for="firstvisit" class="col-sm-12 col-form-label" ><h4>འབྲུག་ལུ་གཟིགས་སྐོར་ གོ་དང་པ་ཨིན་ན?</h4></label>
      &nbsp;&nbsp;&nbsp;&nbsp;<h4>ཨིན།</h4> <input type="radio" onclick="javascript:noyesnoCheck();" name="firstvisit" id="yesCheck1" value="yes"> 
      <h4>མེན།</h4>  <input type="radio" onclick="javascript:noyesnoCheck();" name="firstvisit" id="noCheck1" value="no"><br>
      <div id="ifNo1" style="visibility:hidden" value="no1">
        <div class="form-row">
        <label class="col-sm-4 col-form-label"  for="firstvisit"><h4>མེན་པར་ཅིན ཁ་གསལ་ཕུལ།</h4></label>
        <textarea type="text" id="visitdetails" class="form-control col-sm-6" name="visitdetails" value="" rows="3"></textarea>
        </div>
      </div>
   </div>
   <p><h4>ཡིག་ཆ་ཚུ་ སྦྱར་ནི།</h4></p>
   <div class="form-row">
   <label class="col-sm-4 col-form-label" for="exampleInputFile"><h3>རྟགས་བཀལ་མི་ visa /སྐྱོད་ཐམ་ཞུ་ཚིག<font color="red">*</font></h3></label>
   <input type="file" id="exampleInputFile"  class="form-control col-sm-6" name="visa_application[]" multiple="" required="required"> 
   </div>
   <div class="form-row">
   <label class="col-sm-4 col-form-label" for="exampleInputFile"><h3>མི་ཁུངས་ལག་དེབ་<font color="red">*</font></h3></label>
   <input type="file" id="exampleInputFile"  class="form-control col-sm-6" name="passport[]" multiple="" required="required"> 
   </div>
   <div class="form-row">
   <label class="col-sm-4 col-form-label" for="exampleInputFile"><h3>ངོ་པར།<font color="red">*</font></h3></label>
   <input type="file" id="exampleInputFile"  class="form-control col-sm-6" name="passportphoto[]" multiple="" required="required">   
   </div>
  <br>
  <div class="form-row">
    <button type="submit" class="btn btn-warning btn-sm"> <h3>བསྲུང་། </h3></a></button>
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
@include('application.includes.footer_dzo')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script type="text/javascript">
function yesnoCheck() {
    if (document.getElementById('yesCheck').checked) {
        document.getElementById('ifYes').style.visibility = 'visible';
    }
    else document.getElementById('ifYes').style.visibility = 'hidden';

}
function noyesnoCheck() {
    if (document.getElementById('noCheck1').checked) {
        document.getElementById('ifNo1').style.visibility = 'visible';
    }
    else document.getElementById('ifNo1').style.visibility = 'hidden';

}
function add_file()
{
    $("#file_div").append("<br><div class='form-row'><label class='col-sm-3 col-form-label' for='accompanyname2'><h3>མིང༌།</h3></label><input type='text' class='form-control col-sm-4' name='accompanyname2' id='accompanyname2'><input class='col-sm-2 col-form-label' type='button' value='Remove' onclick=remove_file(this);><div id='file_div2'><div class='col-md-12'><div class='form-group'><input type='button' onclick='add_file2();' value='Add More' class='btn btn-success btn-xs' style='float: right;'></div></div></div></div>");
}
function remove_file(ele)
{
 $(ele).parent().remove();
}
</script>


