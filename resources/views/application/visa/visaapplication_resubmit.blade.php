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
            <h5 class="m-0 text-dark">Visa Application Re-Submission</h5>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;">Visa Application Details</h6>
      </div>
      @foreach($visa as $doo)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_visa', $id) }}">
<input type="hidden" name="id" value="{{$id}}">
{{ csrf_field() }}
      <div class="card-body">
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Name as in passport:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="name" name="name" value="{{ $doo->name }}"></dd>
           </div>
           <div class="form-row"> 
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Date of Birth:</dt>
             <dd class="col-sm-6"><input type="date" class="form-control" id="dob" name="dob" value="{{ $doo->dob }}"></dd> 
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Place of Birth:</dt> 
             <dd class="col-sm-6"><input type="text" class="form-control" id="pob" name="pob" value="{{ $doo->pob }}"></dd>           
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Country of Birth:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="cob" name="cob" value="{{ $doo->cob }}"></dd> 
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Current Nationality:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="current_nationality" name="current_nationality" value="{{ $doo->current_nationality }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Nationality at Birth:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="birth_nationality" name="birth_nationality" value="{{ $doo->birth_nationality }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Sex:</dt>
             <dd class="col-sm-6">
                <select name='sex' id='sex' class="form-control" value="{{ $doo->sex }}" >
                  
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                  <option value="{{ $doo->sex }}"
                  <?php if($doo->sex == '1')
                  {
                    echo 'Male';
                  }
                  else
                  {
                    echo 'Female';
                  }
                  ?>  >                 
                  </option>
                </select>
             </dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Marital Status:</dt>
             <dd class="col-sm-6">
             <select name='marital_status' id='marital_status' class="form-control" value="{{ $doo->marital_status }}" >
                  <option value="1">Married</option>
                  <option value="2">Single</option>
                  <option value="{{ $doo->marital_status }}"
                  <?php if($doo->marital_status == '1')
                  {
                    echo 'Married';
                  }
                  else
                  {
                    echo 'Single';
                  }
                  ?>   >               
                  </option>
                </select>
             </dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Passport Type:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="passport_type" name="passport_type" value="{{ $doo->passport_type }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Passport Number:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="passportno" name="passportno" value="{{ $doo->passportno }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Place of Issue:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="issueplace" name="issueplace" value="{{ $doo->issueplace }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Date of Issue:</dt>
             <dd class="col-sm-6"><input type="date" class="form-control" id="issuedate" name="issuedate" value="{{ $doo->issuedate }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Valid Till:</dt>
             <dd class="col-sm-6"><input type="date" class="form-control" id="validity" name="validity" value="{{ $doo->validity }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Permanent Address:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="per_address" name="per_address" value="{{ $doo->per_address }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Telephone Number:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="telephone" name="telephone" value="{{ $doo->telephone }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Current Occupation:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="occupation" name="occupation" value="{{ $doo->occupation }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">From:</dt>
             <dd class="col-sm-6"><input type="date" class="form-control" id="from" name="from" value="{{ $doo->from }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">To:</dt>
             <dd class="col-sm-6"><input type="date" class="form-control" id="to" name="to" value="{{ $doo->to }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Entry Port:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="entryport" name="entryport" value="{{ $doo->entryport }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Exit Port:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="exitport" name="exitport" value="{{ $doo->exitport }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Is the guest accompanied by spouse/parents/children?:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="accompany" name="accompany" value="{{ $doo->accompany }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Name:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="accompanyname" name="accompanyname" value="{{ $doo->accompanyname }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Is this your First Visit to Bhutan?:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="firstvisit" name="firstvisit" value="{{ $doo->firstvisit }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">If No, Please provide details of Previous visit:</dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="visitdetails" name="visitdetails" value="{{ $doo->visitdetails }}"></dd>
           </div>
    

    <div class="form-row">
    <dt class="col-sm-5 col-form-label" for="exampleInputFile">Signed Visa Application:</dt>
    <dd class="col-sm-6"><input type="file" id="exampleInputFile" class="form-control" name="visa_application[]" multiple="" value=""></dd> 
    </div>
    <div class="form-row">
    <dt class="col-sm-5 col-form-label" for="exampleInputFile">Passport:</dt>
    <dd class="col-sm-6"><input type="file" id="exampleInputFile"  class="form-control" name="passport[]" multiple=""  value=""></dd>
    </div>
    <div class="form-row">
    <dt class="col-sm-5 col-form-label" for="exampleInputFile">Passport Size Photo:</dt>
    <dd class="col-sm-6"><input type="file" id="exampleInputFile"  class="form-control" name="passportphoto[]" multiple=""  value=""></dd>   
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

  <!--decisiondisplay-->
@foreach($visa as $dooc)
        <div class="form-row"> 
            <dt class="col-sm-5 col-form-label" style="text-align: right;">Assessment/Review Decision:</dt>
             <dd class="col-form-label col-sm-6">
                  @if($dooc->approve == '0')
                  <span class="btn btn-danger btn-sm">Review Pending</span>
                  @elseif($dooc->approve == '1')<span class="btn btn-warning btn-sm">Approved</span>
                  @elseif($dooc->approve == '2')<span class="btn btn-warning btn-sm">Rejected</span>
                  @endif
             </dd> 
            </div>
            <div class="form-row"> 
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Remarks:</dt>
             <dd class="col-form-label col-sm-6">{{ $dooc->remarks }}</dd> 
            </div>
            <div class="form-row"> 
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Attached Order:</dt>
             <dd class="col-form-label col-sm-6">
             <?php  
             $taxdoc= App\tbl_visaapproval_order_doc::where('application_id', $dooc->id)->where('filecat','order')->get();     
             $dcount = count(App\tbl_visaapproval_order_doc::where('application_id', $dooc->id)->where('filecat','order')->get());
             ?> 
             @foreach($taxdoc as $dd)                    
             @if($dcount == 0) 
             No Docments!    
             @else
             {{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>

             <a href="{{ route('approvalorder.download', $dd->application_id) }}" class="btn btn-outline-warning btn-xs"><i class="fa fa-fw fa-download"></i>
             Download</a>


             @endif
             @endforeach
             </dd> 
        </div>
@endforeach        


@if(Auth::user()->role_id == '2')
<!--decision-->
@foreach($visa as $do)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_visa', $do->id) }}" onSubmit="return validateThisFrom (this);">
<input type="hidden" name="id" value="{{$do->id}}">
  {{ csrf_field() }} 
@endforeach
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
    <dt>Attach Order:</dt>
    <dd><input type="file" id="exampleInputFile8" class="form-control form-control-sm" name="order[]" multiple=""></dd>
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


