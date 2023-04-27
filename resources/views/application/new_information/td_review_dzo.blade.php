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
            <h5 class="m-0 text-dark"><h3>ཆོས་སྡེའི་ཁ་གསལ་གསརཔ།</h3></h5>
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
              <li class="breadcrumb-item"><a href="#"><h4>གདོང་ཤོག</h4></a></li>
              <li class="breadcrumb-item active"><h4>ཆོས་སྡེ་ལྷན་ཚོགས།</h4></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="col-md-12">
<div class="card">
<br>
    <div>
      <a href="{{ route('newinfo_cro_home_dzo') }}" class="btn btn-info btn-flat btn-xs" style="float: left;"><h5><i class="fa fa-fw fa-arrow-left"></i>རྒྱབ།</h5></a>
    <div class="btn-group w-100 mb-2">
        <a class="btn btn-warning active" href="" data-filter="2"><h3>རྩིས་འཛིན་གྱི་ཁ་གསལ།</h3></a>
    </div>
    </div>
    <section class="content">
    <div class="container-fluid">
    <div class="row">

    <div class="col-md-6">
    <div class="card"> 
      <dl class="dl-horizontal">
      <div class="card-header">
        <h6 class="card-title" style="color: orange;font-weight: bold;"><h3>རྩིས་འཛིན་གྱི་ཁ་གསལ་གསརཔ།</h3></h6>
      </div>
      @foreach($app as $d)
      <div class="card-body">
             <dt><h3>ངོ་མིང་།</h3></dt>
             <dd>{{ $d->name }}</dd>
             <dt><h3>རྫོང་ཁག།</h3></dt>
             <dd><?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $d->dzongkhag)->value('dzongkhag_name'); ?></dd>         
             <dt><h3>དྲུང་ཁག།</h3></dt>            
             <dd>{{ $d->dungkhag }}</dd>             
             <dt><h3>རྒེད་འོག།</h3></dt>
             <dd><?php echo $c = App\gewog_dzo::where('gewog_id', $d->gewog)->value('gewog_name'); ?></dd>
             <dt><h3>གཡུས།</h3></dt>
             <dd><?php echo $c = App\village_dzo::where('village_id', $d->village)->value('village_name'); ?></dd>
             <dt><h3>གུང་ཨང་།</h3></dt>
             <dd>{{ $d->houseno }}</dd>
             <dt><h3>ཁྲམ་ཨང་།</h3></dt>
             <dd>{{ $d->thramno }}</dd>
             <dt><h3>སྐྱེས་ཚེས།</h3></dt>
             <dd>{{ $d->dob }}</dd>
             <dt><h3>ཤེས་ཚད།</h3></dt>
             <dd>{{ $d->qualification }}</dd>
             <dt><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></dt>
             <dd>{{ $d->phoneno }}</dd>
             <dt><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></dt>
             <dd>{{ $d->email }}</dd>
             <dt><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས།</h3></dt>
             <dd>{{ $d->appdate }}</dd> 
      
      </div>
      </dl>
    </div>
<!--decision-->
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_td_dzo', $id) }}" onSubmit="return validateThisFrom (this);">
<input type="hidden" name="id" id="id" value="{{$d->id}}">
{{ csrf_field() }} 
<div class="card">
  <div class="card-body">     
    <dt><h3>ཐག་གཅད།:<font color="red">*</font></h3></dt>
    <dd>
    <select  name="approval_status" id="approval_status" class="form-control form-control-sm" required="required">
    <option value="">- select -</option>                        
    <option value="1"><h4>གནང་བ་འགྲོལ།</h4></option>
    <option value="2"><h4>ཟུར་བཏོན།</h4></option>   
    </select>
    </dd> 
    <dt><h3>བསམ་འཆར།:</h3></dt>
    <dd><textarea id="remarks" type="text" class="form-control form-control-sm" name="remarks" rows="3" placeholder="Remarks ..."></textarea></dd>
    <div class="form-row">
    <button type="submit" class="btn btn-warning btn-sm"><h4>བསྲུང་།</h4></button>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;"><h3>ཟུར་དྲག་ཡིག་ཆ།</h3></h6>
      </div>
      <div class="box-body">
       @foreach($app as $dd)
           <dd>
            <h4>ངོ་པར།:</h4><a href="{{ asset("/images/$dd->photo") }}" target="youriframe">
            <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
           </dd>
       @endforeach 
       @foreach($doc as $dd)
           <dd>
             @if($dd->filecat == 'td')
             <h3>དྲུང་ཆེན་གྱི་ཁ་གསལ:</h3>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @endif
           </dd>
       @endforeach  
      <iframe name='youriframe' style="width:570px; height:840px;" frameborder="0" border="0" cellspacing="0">སྔོན་ཞིབ།</iframe>
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
@include('application.includes.footer_dzo')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>


