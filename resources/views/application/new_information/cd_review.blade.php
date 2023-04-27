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
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">New Information of Registered RO's</h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Commission for Religious Organizations</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="col-md-12">
<div class="card">
<br>
    <div>
      <a href="{{ route('newinfo_cro_home') }}" class="btn btn-info btn-flat btn-xs" style="float: left;"><i class="fa fa-fw fa-arrow-left"></i>Back</a>
    <div class="btn-group w-100 mb-2">
        <a class="btn btn-warning active" href="" data-filter="2">Chairman Details</a>
    </div>
    </div>
    <section class="content">
    <div class="container-fluid">
    <div class="row">

    <div class="col-md-6">
    <div class="card"> 
      <dl class="dl-horizontal">
      <div class="card-header">
        <h6 class="card-title" style="color: orange;font-weight: bold;">New Chairman Details</h6>
      </div>
      @foreach($app as $doo)
      <div class="card-body">
             <dd><b>Name:</b>&nbsp;&nbsp;{{ $doo->name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->dzongkhag)->value('dzongkhag_name'); ?></dd> 
             <dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $doo->dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $doo->gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $doo->village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $doo->houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $doo->thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $doo->dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $doo->qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $doo->phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $doo->email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $doo->appdate }}</dd>
      
      </div>
      </dl>
    </div>
<!--decision-->
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_cd', $id) }}" onSubmit="return validateThisFrom (this);">
<input type="hidden" name="id" id="id" value="{{$doo->id}}">
{{ csrf_field() }} 
<div class="card">
  <div class="card-body">     
    <dt>Assessment Decision:<font color="red">*</font></dt>
    <dd>
    <select  name="approval_status" id="approval_status" class="form-control form-control-sm" required="required">
    <option value="">- select -</option>                        
    <option value="1">Approve</option>
    <option value="2">Reject</option>   
    </select>
    </dd> 
    <dt>Remarks:</dt>
    <dd><textarea id="remarks" type="text" class="form-control form-control-sm" name="remarks" rows="3" placeholder="Remarks ..."></textarea></dd>
    <div class="form-row">
    <button type="submit" class="btn btn-warning btn-sm">Save Assessment</button>
    </div>
  </div>        
</div>
</form>
<!--decision end--> 

    </div>

@endforeach 
<!--file preview-->
<div class="col-md-6">
  <div class="card"> 
      <dl class="dl-horizontal">
      <div class="card-header">
        <h6 class="card-title" style="color: orange;font-weight: bold;">Document Uploads</h6>
      </div>
      <div class="box-body">
       @foreach($app as $dd)
           <dd>
            <b>Uploaded Photo:</b><a href="{{ asset("/images/$dd->photo") }}" target="youriframe">
            <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
           </dd>
       @endforeach 
       @foreach($doc as $dd)
           <dd>
             @if($dd->filecat == 'cd')
             <b>Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif
           </dd>
       @endforeach  
      <iframe name='youriframe' style="width:570px; height:840px;" frameborder="0" border="0" cellspacing="0">File Preview</iframe>
      </div>            
      </dl>
  </div>
</div>
<!--file preview end-->
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


