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
            <h5 class="m-0 text-dark"><h3>ཐོ་བཀོད་ལས་ འཐོན་འགྱོ་ནི་ཞུ་བ་ ཚུ་གི་ཁ་གསལ།</h3></h5>
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

    <div class="col-md-6">
    <div class="card"> 
      <dl class="dl-horizontal">
      <div class="card-header">
        <h6 class="card-title" style="color: orange;font-weight: bold;"><h3>ཞུ་བ་ ཚུ་གི་ཁ་གསལ།</h3></h6>
      </div>
      @foreach($deregister as $dc)
      <div class="card-body">
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>ཆོས་སྡེ་</h3></dt>
             <dd class="col-form-label col-sm-6"><?php echo $dzo = App\tbl_agency::where('id', $dc->host)->value('agency');?></dd>
            </div>
            <div class="form-row"> 
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>ཐོ་བཀོད་ལས་འཐོན་འགྱོ་ནི་སྤྱི་ཚེས།</h3></dt>
             <dd class="col-form-label col-sm-6">{{ $dc->deregister_date }}</dd> 
            </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>འཐོན་འགྱོ་དགོ་མི་ རྒྱུ་མཚན།</h3></dt>
             <dd class="col-form-label col-sm-6">{{ $dc->reason }}</dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;"><h3>ཁ་གསལ།</h3></dt>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;"><h3>ཞུ་བའི་ཡི་གུ།</h3></h6>
      </div>
      <div class="box-body">
        @foreach($deregisterdoc as $d)
          &nbsp;&nbsp;&nbsp;{{ $d->filecat }}        
          <a href="{{asset('/storage/'.$d->doc_path)}}" target="youriframe">
          <i class="fa fa-fw fa-file-pdf-o"></i>སྔོན་ཞིབ།</a><br>
        @endforeach
      <iframe name='youriframe' style="width:500px; height:500px;" frameborder="0" border="0" cellspacing="0">སྔོན་ཞིབ།</iframe>
      </div>            
      </dl>
  </div>
</div>


<!--DECISION-->
<div class="col-md-12"> 
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_deregister_dzo', $id) }}" onSubmit="return validateThisFrom (this);">
{{ csrf_field() }}          
<!--Assessment-->
        <div class="card" style="background-image: linear-gradient(to bottom right,  #f7c443, #fcbe21);">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="col-md-6">
             <div class="card-header"><h6 class="card-title"><h3>བརྟག་ཞིབ།/ཐག་གཅད།</h3></h6></div>
          <div class="card-body">
             <dt><h3>ཐག་གཅད།<font color="red">*</font></h3></dt>
             <dd>
             <select  name="approve" id="approve"  class="form-control">
                <option value="">- select -</option>                        
                <option value="1"><h4>གནང་བ་འགྲོལ</h4></option>
                <option value="2"><h4> ཕྱིར་བཏོན</h4></option>   
             </select>
             </dd> 
             <dt><h3>བསམ་འཆར།</h3></dt>
             <dd><textarea id="remarks" type="text" class="form-control" name="remarks" rows="4" placeholder="Remarks ..."></textarea></dd>
             <dt><h3>བཀའ་རྒྱ།</h3></dt>
             <dd><input type="file" id="exampleInputFile8"  class="form-control" name="order[]" multiple=""></dd>
          </div>
             <input type="hidden" name="edit_id" id='edit_id'>
             <div class="col-md-12" "modal-footer">
             <button type="submit" class="btn btn-success btn-bg" style="float:left;"><h4>བསྲུང་།</h4></button>
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
@include('application.includes.footer_dzo')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
