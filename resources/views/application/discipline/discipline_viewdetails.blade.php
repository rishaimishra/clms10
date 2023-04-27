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
            <h5 class="m-0 text-dark">Details of Disciplinary Actions Taken</h5>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;">Disciplinary Actions Details</h6>
      </div>
      @foreach($discipline as $doo)
      <div class="card-body">
            <div class="form-row"> 
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Action Against:</dt>
             <dd class="col-form-label col-sm-6">{{ $doo->action_against }}</dd> 
            </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Religious Organization:</dt>
             <dd class="col-form-label col-sm-6"><?php echo $dzo = App\tbl_agency::where('id', $doo->ro_name)->value('agency');?></dd>
           </div>
           <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Reason:</dt>
             <dd class="col-form-label col-sm-6">{{ $doo->reason }}</dd>  
           </div>
            <div class="form-row">
             <dt class="col-sm-5 col-form-label" style="text-align: right;">Action Taken:</dt>
             <dd class="col-form-label col-sm-6">{{ $doo->action }}</dd>
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
        <h6 class="card-title" style="color: orange;font-weight: bold;">Disciplinary Document</h6>
      </div>
      <div class="box-body">
        @foreach($disciplinedocs as $d)
          &nbsp;&nbsp;&nbsp;{{ $d->filecat }}        
          <a href="{{asset('/storage/'.$d->doc_path)}}" target="youriframe">
          <i class="fa fa-fw fa-file-pdf-o"></i>Preview</a><br>
        @endforeach
      <iframe name='youriframe' style="width:500px; height:500px;" frameborder="0" border="0" cellspacing="0">File Preview</iframe>
      </div>            
      </dl>
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
