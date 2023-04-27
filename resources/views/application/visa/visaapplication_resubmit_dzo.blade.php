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
            <h5 class="m-0 text-dark"><h3>visa /སྐྱོད་ཐམ་ ཞུ་ཚིག་ལོག་སྟེ་ ཕུལ་ནི།</h3></h5>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;"><h3>visa /སྐྱོད་ཐམ་ཞུ་ཚིག།</h6>
      </div>
      @foreach($visa as $doo)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_visa_dzo', $id) }}">
<input type="hidden" name="id" value="{{$id}}">
{{ csrf_field() }}
      <div class="card-body">
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>མིང༌།</h3><h4>(མི་ཁུངས་ལག་དེབ་ ན་ཡོད་མི།)</h4></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="name" name="name" value="{{ $doo->name }}"></dd>
           </div>
           <div class="form-row"> 
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>སྐྱེ་བའི་ ཟླ་ཚེས།</h3></dt>
             <dd class="col-sm-6"><input type="date" class="form-control" id="dob" name="dob" value="{{ $doo->dob }}"></dd> 
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>སྐྱེ་བའི་ ས་གནས།</h3></dt> 
             <dd class="col-sm-6"><input type="text" class="form-control" id="pob" name="pob" value="{{ $doo->pob }}"></dd>           
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>སྐྱེ་བའི་ རྒྱལ་ཁབ།</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="cob" name="cob" value="{{ $doo->cob }}"></dd> 
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>ད་ལྟོའི་ རྒྱལ་ཁབ་ཀྱི་མི་ཁུངས།</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="current_nationality" name="current_nationality" value="{{ $doo->current_nationality }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>སྐྱེ་བའི་  རྒྱལ་ཁབ་ཀྱི་མི་ཁུངས།</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="birth_nationality" name="birth_nationality" value="{{ $doo->birth_nationality }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>ཕོ་མོའི་དབྱེ་བ།</h3></dt>
             <dd class="col-sm-6">
                <select name='sex' id='sex' class="form-control" value="{{ $doo->sex }}" >
                  
                  <option value="1"><h4>ཕོ།</h4></option>
                  <option value="2"><h4>མོ།</h4></option>
                  <option value="{{ $doo->sex }}"
                  <?php if($doo->sex == '1')
                  {
                    echo 'ཕོ།';
                  }
                  else
                  {
                    echo 'མོ།';
                  }
                  ?>  >                 
                  </option>
                </select>
             </dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>གཉེན་འབྲེལ་གནས་སྟངས།</h3></dt>
             <dd class="col-sm-6">
             <select name='marital_status' id='marital_status' class="form-control" value="{{ $doo->marital_status }}" >
                  <option value="1"><h4> གཉེན་རྐྱབ་རྐྱབཔ།</h4></option>
                  <option value="2"><h4>གཉེན་མ་རྐྱབ།</h4></option>
                  <option value="{{ $doo->marital_status }}"
                  <?php if($doo->marital_status == '1')
                  {
                    echo 'གཉེན་རྐྱབ་རྐྱབཔ།';
                  }
                  else
                  {
                    echo 'གཉེན་མ་རྐྱབ།';
                  }
                  ?>   >               
                  </option>
                </select>
             </dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>མི་ཁུངས་ལག་དེབ་ དབྱེ་བ།།</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="passport_type" name="passport_type" value="{{ $doo->passport_type }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>མི་ཁུངས་ལག་དེབ་ ཨང་</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="passportno" name="passportno" value="{{ $doo->passportno }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>ལག་དེབ་ བྱིན་སའི་ས་གནས།</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="issueplace" name="issueplace" value="{{ $doo->issueplace }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>བྱིན་མའི་ སྤྱི་ཚེས།</h3></dt>
             <dd class="col-sm-6"><input type="date" class="form-control" id="issuedate" name="issuedate" value="{{ $doo->issuedate }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>ཆ་འཇོག་ཡུན་གནས།</h3></dt>
             <dd class="col-sm-6"><input type="date" class="form-control" id="validity" name="validity" value="{{ $doo->validity }}"></dd>
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>རྟག་བརྟན་གྱི་ ཁ་བྱང༌།</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="per_address" name="per_address" value="{{ $doo->per_address }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>བརྒྱུད་འཕྲིན་ཨང༌།</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="telephone" name="telephone" value="{{ $doo->telephone }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>ལཱ་གཡོག </h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="occupation" name="occupation" value="{{ $doo->occupation }}"></dd>
           </div>
            <p><h3 style="color: orange;">visa /སྐྱོད་ཐམ་ཞུ་ཚིག་དགོ་པའི་ དུས་ཡུན།</h3></p>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>འགོ་བཙུགས་ཚེས</h3></dt>
             <dd class="col-sm-6"><input type="date" class="form-control" id="from" name="from" value="{{ $doo->from }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>མཇུག་བསྡུ་ཚེས</h3></dt>
             <dd class="col-sm-6"><input type="date" class="form-control" id="to" name="to" value="{{ $doo->to }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>འཛུལ་སའི་ས་གནས།</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="entryport" name="entryport" value="{{ $doo->entryport }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>འཐོན་སའི་ས་གནས།</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="exitport" name="exitport" value="{{ $doo->exitport }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>མགྱོནམོ་དང༌མཉམ་གཅིག་ གཉེན་ཟླ།/ཕམ།/ཨ་ལུ་ཚུ་ ཡོད་ག?</h4></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="accompany" name="accompany" value="{{ $doo->accompany }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>མིང༌།</h3></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="accompanyname" name="accompanyname" value="{{ $doo->accompanyname }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>འབྲུག་ལུ་གཟིགས་སྐོར་ གོ་དང་པ་ཨིན་ན?</h4></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="firstvisit" name="firstvisit" value="{{ $doo->firstvisit }}"></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h4>མེན་པར་ཅིན ཁ་གསལ་ཕུལ།</h4></dt>
             <dd class="col-sm-6"><input type="text" class="form-control" id="visitdetails" name="visitdetails" value="{{ $doo->visitdetails }}"></dd>
           </div>
    

    <div class="form-row">
    <dt class="col-sm-5 col-form-label" for="exampleInputFile"><h3>རྟགས་བཀལ་མི་ visa /སྐྱོད་ཐམ་ཞུ་ཚིག</h3></dt>
    <dd class="col-sm-6"><input type="file" id="exampleInputFile" class="form-control" name="visa_application[]" multiple="" value=""></dd> 
    </div>
    <div class="form-row">
    <dt class="col-sm-5 col-form-label" for="exampleInputFile"><h3>མི་ཁུངས་ལག་དེབ་</h3></dt>
    <dd class="col-sm-6"><input type="file" id="exampleInputFile"  class="form-control" name="passport[]" multiple=""  value=""></dd>
    </div>
    <div class="form-row">
    <dt class="col-sm-5 col-form-label" for="exampleInputFile"><h3>ངོ་པར།</h3></dt>
    <dd class="col-sm-6"><input type="file" id="exampleInputFile"  class="form-control" name="passportphoto[]" multiple=""  value=""></dd>   
    </div>

      @endforeach
  <div class="form-row">
  <button type="submit" class="btn btn-warning btn-bg"><h3>ཞུ་ཚིག་ལོག་ཕུལ་ནི།</h3></a></button>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;"><h3>ཡིག་ཆ</h3></h6>
      </div>
      <div class="box-body">
        @foreach($docs as $d)
          &nbsp;&nbsp;&nbsp;{{ $d->filecat }}        
          <a href="{{asset('/storage/'.$d->doc_path)}}" target="youriframe">
          <i class="fa fa-fw fa-file-pdf-o"></i><h4>སྔ་གོང་བལྟ་ཞིབ།</h4></a><br>
        @endforeach
      <iframe name='youriframe' style="width:570px; height:840px;" frameborder="0" border="0" cellspacing="0"><h4>སྔ་གོང་བལྟ་ཞིབ།</h4></iframe>
      </div>            
      </dl>
  </div>

   <!--decisiondisplay-->
@foreach($visa as $dooc)
        <div class="form-row"> 
            <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>བརྟག་ཞིབ།/ཐག་གཅད།:</h3></dt>
             <dd class="col-form-label col-sm-6">
                  @if($dooc->approve == '0')
                  <span class="btn btn-danger btn-sm"><h4>བསྣར་བཞག</h4></span>
                  @elseif($dooc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>
                  @elseif($dooc->approve == '2')<span class="btn btn-warning btn-sm"><h4>ཕྱིར་བཏོན</h4></span>
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
             $taxdoc= App\tbl_visaapproval_order_doc::where('application_id', $dooc->id)->where('filecat','order')->get();     
             $dcount = count(App\tbl_visaapproval_order_doc::where('application_id', $dooc->id)->where('filecat','order')->get());
             ?> 
             @foreach($taxdoc as $dd)                    
             @if($dcount == 0) 
             No Docments!    
             @else
             {{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>

             <a href="{{ route('approvalorder.download', $dd->application_id) }}" class="btn btn-outline-warning btn-xs"><i class="fa fa-fw fa-download"></i>
             <h4>གནས་སྡུད་སྤོ་</h4></a>


             @endif
             @endforeach
             </dd> 
        </div>
@endforeach 

@if(Auth::user()->role_id == '2')
<!--decision-->
@foreach($visa as $do)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_visa_dzo', $do->id) }}" onSubmit="return validateThisFrom (this);">
<input type="hidden" name="id" value="{{$do->id}}">
  {{ csrf_field() }} 
@endforeach
<div class="card">
  <div class="card-body">     
    <dt><h3>བརྟག་ཞིབ།/ཐག་གཅད།<font color="red">*</font></h3></dt>
    <dd>
    <select  name="approve" id="approve" class="form-control form-control-sm">
    <option value="">- select -</option>                        
    <option value="1"><h4>གནང་བ་འགྲོལ།</h4></option>
    <option value="2"><h4>ཕྱིར་བཏོན</h4></option>   
    </select>
    </dd> 
    <dt><h3>བསམ་འཆར།</h3></dt>
    <dd><textarea id="remarks" type="text" class="form-control form-control-sm" name="remarks" rows="3" placeholder="Remarks ..."></textarea></dd>
    <dt><h3>བཀའ་རྒྱ་གནང་མི་ ཡི་གུ། </h3></dt>
    <dd><input type="file" id="exampleInputFile8" class="form-control form-control-sm" name="order[]" multiple=""></dd>
    <div class="form-row">
    <button type="submit" class="btn btn-warning btn-sm"><h3>བསྲུང་</h3></a></button>
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


