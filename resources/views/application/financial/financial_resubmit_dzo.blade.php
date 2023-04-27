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
          <div class="col-sm-5">
            <h5 class="m-0 text-dark"><h3>ལོ་བསྟར་དངུལ་གྱི་སྙན་ཞུ་ལོག་སྟེ་ཕུལ།</h3></h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div>
          <div class="col-sm-5">
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
    <div class="row">

    <div class="col-md-5">
    <div class="card"> 
      <dl class="dl-horizontal">
      <div class="card-header">
        <h6 class="card-title" style="color: orange;font-weight: bold;"><h3>ལོ་བསྟར་དངུལ་གྱི་སྙན་ཞུ།</h3></h6>
      </div>
@foreach($fin as $doo)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_financial_dzo', $id) }}">
<input type="hidden" name="id" value="{{$id}}">
{{ csrf_field() }}
      <div class="card-body">
            <div class="form-row">
             <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3> རྩིས་ལོ</h3></dt>
             <dd class="col-sm-6">
               <select name="year" class="form-control" id="year" value="{{ $doo->year }}"> 
               <?php 
               for($i = 2010 ; $i <= date('Y'); $i++){
               echo "<option>$i</option>";
               }
               ?>
               </select>
             </dd>
           </div>

           <div class="form-row">
             <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>མ་དངུལ་བྱུང་ཐོ་བསྡོམས:</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="opening_balance" name="opening_balance" value="{{ $doo->opening_balance }}"></dd> 
          </div>

<div class="col-md-12">    
<div class="card-body-body"> 
<h4><p style="padding-bottom: -50px;">
<a class="btn btn-info btn-xs" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
<i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;ཁ་གསལ་བཀོད་ནི།</a></p></h4>
<div class="collapse" id="collapseExample1">
<div class="card card-body">
           <p style="font-weight: bold;color: orange;"><h3>བསྡུ་ལེན།</h3></p><br>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>འཐུས་མིའི་འཐུས།</h4></dt> 
             <dd class="col-sm-6"><input type="text" class="form-control" id="membership_fees" name="membership_fees" value="{{ $doo->membership_fees }}"></dd>           
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>ཞལ་འདེབས།</h4></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="donations" name="donations" value="{{ $doo->donations }}"></dd> 
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>གཞན་ལ་སོགས་པ།</h4></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="other_collections" name="other_collections" value="{{ $doo->other_collections }}"></dd>
           </div>
</div>
</div>                            
</div>
</div>

       <div class="form-row">
         <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>མ་དངུལ་ཟད་རྩིས་བསྡོམས:</h3></dt>
         <dd class="col-sm-6"><input type="text" class="form-control" id="total_expenditure" name="total_expenditure" value="{{ $doo->total_expenditure }}"></dd> 
       </div>

<div class="col-md-12">    
<div class="card-body-body"> 
<h4><p style="padding-bottom: -50px;">
<a class="btn btn-info btn-xs" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
<i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;ཁ་གསལ་བཀོད་ནི།</a></p></h4>
<div class="collapse" id="collapseExample">
<div class="card card-body">
 <p style="font-weight: bold;color: orange;"><h3>ཟད་འགྲོ།</h3></p>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>དངུལ་ཕོགས།</h4></dt> 
             <dd class="col-sm-6"><input type="text" class="form-control" id="salary" name="salary" value="{{ $doo->salary }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>ཁང་གླ།</h4></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="rentals" name="rentals" value="{{ $doo->rentals }}"></dd> 
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>མཁོ་སྒྲུབ།</h4></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="procurements" name="procurements" value="{{ $doo->procurements }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>ལམ་འགྲུལ།</h4></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="travel" name="travel" value="{{ $doo->travel }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>གཞན་ལ་སོགས་པ།</h4></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="other_expenses" name="other_expenses" value="{{ $doo->other_expenses }}"></dd>
           </div>
</div>
</div>                            
</div>
</div>          


         <div class="form-row">
         <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>མ་དངུལ་ལྷག་ལུས་བསྡོམས:</h3></dt>
         <dd class="col-sm-6"><input type="text" class="form-control" id="closing_balance" name="closing_balance" value="{{ $doo->closing_balance }}"></dd> 
         </div> 

<h4>ཟུར་དྲག</h4>
    <div class="form-row">
    <dt class="col-sm-6 col-form-label" for="exampleInputFile"><h3>རྩིས་བཤད།</h3></dt>
    <dd class="col-sm-6"><input type="file" id="exampleInputFile" class="form-control" name="financial_statement[]" multiple="" value=""></dd>
    </div>
@endforeach
  <div class="form-row">
  <button type="submit" class="btn btn-warning btn-bg"><h4>ལོག་ཕུལ།</h4></a></button>
  </div>
</form>

      </div>
      </dl>
    </div>  
    </div> 


<!--file preview-->
<div class="col-md-7">
  <div class="card"> 
      <dl class="dl-horizontal">
      <div class="card-header">
        <h6 class="card-title" style="color: orange;font-weight: bold;"><h3>དངུལ་འབྲེལ་གྱི་རྩིས་བཤད།(ཡིག་ཆ།)</h3></h6>
      </div>
      <div class="box-body">
        @foreach($docs as $d)
          &nbsp;&nbsp;&nbsp;{{ $d->filecat }}        
          <a href="{{asset('/storage/'.$d->doc_path)}}" target="youriframe">
          <i class="fa fa-fw fa-file-pdf-o"></i>སྔོན་ཞིབ།</a><br>
        @endforeach
      <iframe name='youriframe' style="width:570px; height:840px;" frameborder="0" border="0" cellspacing="0">སྔོན་ཞིབ།</iframe>
      </div>            
      </dl>
  </div>

@if(Auth::user()->role_id == '2')
<!--decision-->

<form role="form" method="POST" enctype="multipart/form-data" action="" onSubmit="return validateThisFrom (this);">
<input type="hidden" name="id" value="">
  {{ csrf_field() }} 

<div class="card">
  <div class="card-body">     
    <dt><h3>བརྟག་ཞིབ།/གནང་བ།</h3><font color="red">*</font></dt>
    <dd>
    <select  name="approve" id="approve" class="form-control form-control-sm">
    <option value="">- select -</option>                        
    <option value="1"><h4>གནང་བ་འགྲོལ།</h4></option>
    <option value="2"><h4>ཕྱིར་བཏོན།</h4></option>  
    </select>
    </dd> 
    <dt><h3>བསམ་འཆར།</h3></dt>
    <dd><textarea id="remarks" type="text" class="form-control form-control-sm" name="remarks" rows="3" placeholder="Remarks ..."></textarea></dd>
   <!--<dt><h3>བཀའ་རྒྱ་གནང་མི་ ཡི་གུ།</h3></dt>
    <dd><input type="file" id="exampleInputFile8" class="form-control form-control-sm" name="order[]" multiple=""></dd>-->
    <div class="form-row">
    <button type="submit" class="btn btn-warning btn-sm"><h4>བསྲུང་།</h4></a></button>
    </div>
  </div>        
</div>
</form>
@else
@endif
<!--decision end--> 
</div>
<!--file preview end-->




 
    </div>
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
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script language='JavaScript' type='text/javascript'>
    function validateThisFrom(thisForm) {
        if (thisForm.approve.value == "") {
            alert("Please Provide Assessment Decision");
            thisForm.approve.focus();
            return false;
        }      
    } 
</script>


