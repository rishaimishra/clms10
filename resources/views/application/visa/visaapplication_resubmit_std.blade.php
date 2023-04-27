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
            <h5 class="m-0 text-dark">Student Visa Application Re-Submission</h5>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;">Student Visa Application Details</h6>
      </div>
      @foreach($visa_ro_wise as $doo)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_visa_std', $id) }}">
<input type="hidden" name="id" value="{{$id}}">
<input type="hidden" name="application_no" value="{{$application_no}}">
{{ csrf_field() }}
      <div class="card-body">
           

  <div class="form-group input-group-sm">
  <label for="student_visa">Upload Student Visa Application:</label>
  <input type="file" id="exampleInputFile2"  class="form-control" name="student_visa[]" multiple="" >
  </div>
  <div class="form-group input-group-sm">
  <label for="student_permit">Upload Student Permit Copy:</label>
  <input type="file" id="exampleInputFile2"  class="form-control" name="student_permit[]" multiple="" >
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
        @foreach($docs as $dd)
                  @if($dd->filecat == 'student_visa')
                  <b>Student Visa Application:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
                  <a href="{{ route('delete_stdvisa', array($application_no, $dd->id,$id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
                  <i class="fa fa-fw fa-trash"></i>Remove</a><br>
                  @elseif($dd->filecat == 'student_permit')
                  <b>Student Permit Copy:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
                  <a href="{{ route('delete_stdpermit', array($application_no, $dd->id,$id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
                  <i class="fa fa-fw fa-trash"></i>Remove</a><br>
                  @endif
                  @endforeach
      <iframe name='youriframe' style="width:570px; height:840px;" frameborder="0" border="0" cellspacing="0">File Preview</iframe>
      </div>            
      </dl>
  </div>

  <!--decisiondisplay-->
@foreach($visa_ro_wise as $dooc)
        <div class="form-row"> 
            <dt class="col-sm-5 col-form-label" style="text-align: right;">Assessment/Review Decision:</dt>
             <dd class="col-form-label col-sm-6">
                  @if($dooc->approve == '0')
                  <span class="btn btn-danger btn-sm">Review Pending</span>
                  @elseif($dooc->approve == '1')<span class="btn btn-warning btn-sm">Approved</span>
                  @elseif($dooc->approve == '2')<span class="btn btn-danger btn-sm">Rejected</span>
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
             $taxdoc= App\tbl_visaapproval_order_doc::where('application_id', $dooc->id)->where('filecat','student_visa_order')->get();     
             $dcount = count(App\tbl_visaapproval_order_doc::where('application_id', $dooc->id)->where('filecat','student_visa_order')->get());
             ?> 
             @foreach($taxdoc as $dd)                    
             @if($dcount == 0) 
             No Docments!    
             @else
             {{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>

             <a href="{{ route('approvalorderstd.download', $dd->application_id) }}" class="btn btn-outline-warning btn-xs"><i class="fa fa-fw fa-download"></i>
             Download</a>


             @endif
             @endforeach
             </dd> 
        </div>
@endforeach        


@if(Auth::user()->role_id == '2')
<!--decision-->
@foreach($visa_ro_wise as $do)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_visa_std', $do->id) }}" onSubmit="return validateThisFrom (this);">
<input type="text" name="id" value="{{$do->id}}">
<input type="text" name="application_no" value="{{$do->application_no}}">
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


