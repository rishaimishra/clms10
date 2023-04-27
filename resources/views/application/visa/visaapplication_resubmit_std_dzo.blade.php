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
            <h5 class="m-0 text-dark"><h3>སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག།</h3></h5>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;"><h3>སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག།</h3></h6>
      </div>
      @foreach($visa_ro_wise as $doo)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_visa_std_dzo', $id) }}">
<input type="hidden" name="id" value="{{$id}}">
<input type="hidden" name="application_no" value="{{$application_no}}">
{{ csrf_field() }}
      <div class="card-body">
           

  <div class="form-group input-group-sm">
  <label for="student_visa"><h3>སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག།:</h3></label>
  <input type="file" id="exampleInputFile2"  class="form-control" name="student_visa[]" multiple="" >
  </div>
  <div class="form-group input-group-sm">
  <label for="student_permit"><h3>སློབ་ཕྲུག་གྱི་ཆོག་ཐམ་ཚིག།:</h3></label>
  <input type="file" id="exampleInputFile2"  class="form-control" name="student_permit[]" multiple="" >
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
        <h6 class="card-title" style="color: orange;font-weight: bold;"><h3>ཟུར་སྦྲགས</h3></h6>
      </div>
      <div class="box-body">
        @foreach($docs as $dd)
                  @if($dd->filecat == 'student_visa')
                  <h4>སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
                  <a href="{{ route('delete_stdvisa_dzo', array($application_no, $dd->id,$id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
                  <i class="fa fa-fw fa-trash"></i>བཏོན་གཏང་</a><br>
                  @elseif($dd->filecat == 'student_permit')
                  <h4>སློབ་ཕྲུག་གྱི་ཆོག་ཐམ་ཚིག།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
                  <a href="{{ route('delete_stdpermit_dzo', array($application_no, $dd->id,$id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
                  <i class="fa fa-fw fa-trash"></i>བཏོན་གཏང་</a><br>
                  @endif
                  @endforeach
      <iframe name='youriframe' style="width:570px; height:840px;" frameborder="0" border="0" cellspacing="0">སྔོན་ཞིབ།</iframe>
      </div>            
      </dl>
  </div>

  <!--decisiondisplay-->
@foreach($visa_ro_wise as $dooc)
        <div class="form-row"> 
            <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3 style="color: orange;">ཞུ་ཡིག་ གྲུབ་འབྲས/གནས་སྟངས།</h3></dt>
             <dd class="col-form-label col-sm-6">
                  @if($dooc->approve == '0')
                  <span class="btn btn-danger btn-sm"><h4>བསྣར་བཞག</h4></span>
                  @elseif($dooc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>
                  @elseif($dooc->approve == '2')<span class="btn btn-danger btn-sm"><h4>ཕྱིར་བཏོན</h4></span>
                  @endif
             </dd> 
            </div>
            <div class="form-row"> 
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>བསམ་འཆར།:</h3></dt>
             <dd class="col-form-label col-sm-6">{{ $dooc->remarks }}</dd> 
            </div>
            <div class="form-row"> 
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>བཀའ་རྒྱ་ ཡི་གུ།:</h3></dt>
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
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>

             <a href="{{ route('approvalorderstd.download', $dd->application_id) }}" class="btn btn-outline-warning btn-xs"><i class="fa fa-fw fa-download"></i>
             <h4>གནས་སྡུད་སྤོ་</h4></a>


             @endif
             @endforeach
             </dd> 
        </div>
@endforeach        


@if(Auth::user()->role_id == '2')
<!--decision-->
@foreach($visa_ro_wise as $do)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_visa_std_dzo', $do->id) }}" onSubmit="return validateThisFrom (this);">
<input type="text" name="id" value="{{$do->id}}">
<input type="text" name="application_no" value="{{$do->application_no}}">
  {{ csrf_field() }} 
@endforeach
<div class="card">
  <div class="card-body">     
    <dt><h3>བརྟག་ཞིབ།/ཐག་གཅད།:<font color="red">*</font></dt>
    <dd>
    <select  name="approve" id="approve" class="form-control form-control-sm">
    <option value="">- select -</option>                        
    <option value="1"><h3>གནང་བ་འགྲོལ།</h3></option>
    <option value="2"><h3>ཕྱིར་བཏོན།</h3></option>    
    </select>
    </dd> 
    <dt><h3>བསམ་འཆར།:</h3></dt>
    <dd><textarea id="remarks" type="text" class="form-control form-control-sm" name="remarks" rows="3" placeholder="Remarks ..."></textarea></dd>
    <dt><h3>བཀའ་རྒྱ་ ཡི་གུ།:</h3></dt>
    <dd><input type="file" id="exampleInputFile8" class="form-control form-control-sm" name="order[]" multiple=""></dd>
    <div class="form-row">
    <button type="submit" class="btn btn-warning btn-sm"><h3>བསྲུང་།</h3></a></button>
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


