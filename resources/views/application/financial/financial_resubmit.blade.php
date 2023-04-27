  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
<body class="hold-transition sidebar-mini">
@include('application.includes.header')
@include('application.includes.sidebar')
<div class="content-wrapper">
@include('flash-message') 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-5">
            <h5 class="m-0 text-dark">Annual Financial Report Re-Submission</h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Religious Organization</li>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;">Annual Financial Report Details</h6>
      </div>
@foreach($fin as $doo)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_financial', $id) }}">
<input type="hidden" name="id" value="{{$id}}">
{{ csrf_field() }}
      <div class="card-body">
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Year:</dt>
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
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Total Income:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="opening_balance" name="opening_balance" value="{{ $doo->opening_balance }}"></dd> 
          </div>


<div class="col-md-12">    
<div class="card-body-body"> 
<p style="padding-bottom: -50px;">
<a class="btn btn-warning btn-xs" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
<i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;Details</a></p>
<div class="collapse" id="collapseExample1">
<div class="card card-body">
           <p style="font-weight: bold;color: orange;">Collections:</p><br>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Membership Fees:</dt> 
             <dd class="col-sm-6"><input type="text" class="form-control" id="membership_fees" name="membership_fees" value="{{ $doo->membership_fees }}"></dd>           
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Donations:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="donations" name="donations" value="{{ $doo->donations }}"></dd> 
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Others:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="other_collections" name="other_collections" value="{{ $doo->other_collections }}"></dd>
           </div>
</div>
</div>                            
</div>
</div>

       <div class="form-row">
         <dt class="col-sm-5 col-form-label" style="text-align: right;">Total Expenditure:</dt>
         <dd class="col-sm-6"><input type="text" class="form-control" id="total_expenditure" name="total_expenditure" value="{{ $doo->total_expenditure }}"></dd> 
       </div>

<div class="col-md-12">    
<div class="card-body-body"> 
<p style="padding-bottom: -50px;">
<a class="btn btn-warning btn-xs" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
<i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;Details</a></p>
<div class="collapse" id="collapseExample">
<div class="card card-body">
 <p style="font-weight: bold;color: orange;">Expenses:</p>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Salary & Wages:</dt> 
             <dd class="col-sm-6"><input type="text" class="form-control" id="salary" name="salary" value="{{ $doo->salary }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Rentals:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="rentals" name="rentals" value="{{ $doo->rentals }}"></dd> 
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Procurements:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="procurements" name="procurements" value="{{ $doo->procurements }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Travel:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="travel" name="travel" value="{{ $doo->travel }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Others:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="other_expenses" name="other_expenses" value="{{ $doo->other_expenses }}"></dd>
           </div>
</div>
</div>                            
</div>
</div>    
 
         <div class="form-row">
         <dt class="col-sm-5 col-form-label" style="text-align: right;">Total Balance:</dt>
         <dd class="col-sm-6"><input type="text" class="form-control" id="closing_balance" name="closing_balance" value="{{ $doo->closing_balance }}"></dd> 
         </div>   

    
    <div class="form-row">
    <dt class="col-sm-5 col-form-label" for="exampleInputFile">Financial Statement:</dt>
    <dd class="col-sm-6"><input type="file" id="exampleInputFile" class="form-control" name="financial_statement[]" multiple="" value=""></dd>
    </div>
@endforeach
  <div class="form-row">
  <button type="submit" class="btn btn-warning btn-bg">Re-Submit Application</a></button>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;">Document Uploads</h6>
      </div>
      <div class="box-body">
        @foreach($docs as $d)
          &nbsp;&nbsp;&nbsp;{{ $d->filecat }}        
          <a href="{{asset('/storage/'.$d->doc_path)}}" target="youriframe">
          <i class="fa fa-fw fa-file-pdf-o"></i>Preview</a><br>
        @endforeach
      <iframe name='youriframe' style="width:570px; height:840px;" frameborder="0" border="0" cellspacing="0">File Preview</iframe>
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
    <dt>Assessment Decision:<font color="red">*</font></dt>
    <dd>
    <select  name="approve" id="approve" class="form-control form-control-sm">
    <option value="">- select -</option>                        
    <option value="1">Approve</option>
    <option value="2">Reject</option>   
    </select>
    </dd> 
    <dt>Remarks:</dt>
    <dd><textarea id="remarks" type="text" class="form-control form-control-sm" name="remarks" rows="3" placeholder="Remarks ..."></textarea></dd>
    <!--<dt>Attach Order:</dt>
    <dd><input type="file" id="exampleInputFile8" class="form-control form-control-sm" name="order[]" multiple=""></dd>-->
    <div class="form-row">
    <button type="submit" class="btn btn-warning btn-sm">Save Assessment</a></button>
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
@include('application.includes.footer')
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


