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
            <h5 class="m-0 text-dark">Reinstate Religious Organization.</h5>
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

    

<section class="content">
    <div class="container-fluid">
       <div class="card card-solid">
        <div class="card-body">
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
@foreach($suspension as $dc)
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="ro_name">Organization:</label>
      <?php echo $dzo = App\tbl_agency::where('id', $dc->ro_name)->value('agency');?>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="reason">Suspension Reason:</label>
     {{$dc->reason}}
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="action">Action Taken:</label>
     {{$dc->action}}
   </div>
   <br>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="event_details">Suspension Order:</label>
        <?php $dzo = App\tbl_suspension_doc::where('id', $dc->id)->value('doc_path');?>
        @if($dzo == '')
        @else
        <a href="{{asset('/storage/'.$dzo)}}" target="youriframe">
        <i class="fa fa-fw fa-file-pdf"></i>Preview</a><br>
        @endif
   </div>
   
  <br>
<form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('reinstate_store') }}">  
{{ csrf_field() }}
<input type="hidden" name="id" value="{{$dc->id}}">
<input type="hidden" name="ro_name" value="{{$dc->ro_name}}">
@endforeach 
<p>REINSTATE ORGANIZATION.</p>  
  <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="reason">Remarks:</label>
     <textarea class="form-control col-sm-6" name="reinstate_remark" id="reinstate_remark" rows="4"></textarea>
  </div>

  <div class="form-row">
  <button type="submit" class="btn btn-primary btn-sm">Reinstate</button>
  <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
  </div>
</form>         
</div>
</div>
</div>

    </div>
    </div>
</div>
</section>
</div>
  

@include('application.includes.footer')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>


