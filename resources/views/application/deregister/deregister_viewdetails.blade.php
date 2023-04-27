  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
  <!--oncahnge-->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
<body class="hold-transition sidebar-mini">
@include('application.includes.header')
@include('application.includes.sidebar')
<div class="content-wrapper">
@include('flash-message')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">Details of De-Registration Request</h5>
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
              <li class="breadcrumb-item active">Religious Organization</li>
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

    <div class="col-md-6">
    <div class="card"> 
      <dl class="dl-horizontal">
      <div class="card-header">
        <h6 class="card-title" style="color: orange;font-weight: bold;">De-Registration Details</h6>
      </div>
      @foreach($deregister as $dc)
      <div class="card-body">
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Religious Organization:</dt>
             <dd class="col-form-label col-sm-6"><?php echo $dzo = App\tbl_agency::where('id', $dc->host)->value('agency');?></dd>
            </div>
            <div class="form-row"> 
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Proposed Date of De-registration:</dt>
             <dd class="col-form-label col-sm-6">{{ $dc->deregister_date }}</dd> 
            </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Reason for De-registration:</dt>
             <dd class="col-form-label col-sm-6">{{ $dc->reason }}</dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Details:</dt>
             <dd class="col-form-label col-sm-6">{{ $dc->details }}</dd>  
           </div>
            
      @endforeach
      </div>
      </dl>
    </div>  
    </div> 


<!--file preview-->
<div class="col-md-6">
  <div class="card"> 
      <dl class="dl-horizontal">
      <div class="card-header">
        <h6 class="card-title" style="color: orange;font-weight: bold;">Attached Request Letter</h6>
      </div>
      <div class="box-body">
        @foreach($deregisterdoc as $d)
          &nbsp;&nbsp;&nbsp;{{ $d->filecat }}        
          <a href="{{asset('/storage/'.$d->doc_path)}}" target="youriframe">
          <i class="fa fa-fw fa-file-pdf-o"></i>Preview</a><br>
        @endforeach
      <iframe name='youriframe' style="width:500px; height:500px;" frameborder="0" border="0" cellspacing="0">File Preview</iframe>
      </div>            
      </dl>
  </div>
</div>


<!--DECISION-->
<div class="col-md-12"> 
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_deregister', $id) }}" onSubmit="return validateThisFrom (this);">
{{ csrf_field() }}          
<!--Assessment-->
        <div class="card" style="background-image: linear-gradient(to bottom right,  #f7c443, #fcbe21);">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="col-md-6">
             <div class="card-header"><h6 class="card-title">Assessment/Review Decision</h6></div>
          <div class="card-body">
             <dt>Assessment Decision:<font color="red">*</font></dt>
             <dd>
             <select  name="approve" id="approve"  class="form-control">
                <option value="">- select -</option>                        
                <option value="1">Approve</option>
                <option value="2">Reject</option>   
             </select>
             </dd> 
             <dt>Remarks:</dt>
             <dd><textarea id="remarks" type="text" class="form-control" name="remarks" rows="4" placeholder="Remarks ..."></textarea></dd>
             <dt>Attach Order:</dt>
             <dd><input type="file" id="exampleInputFile8"  class="form-control" name="order[]" multiple=""></dd>
          </div>
             <input type="hidden" name="edit_id" id='edit_id'>
             <div class="col-md-12" "modal-footer">
             <button type="submit" class="btn btn-success btn-bg" style="float:left;">Save Assessment</button>
             </div>
             </div> 
             </dl>
        </div>  
</div>
<!--Assess End-->


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
