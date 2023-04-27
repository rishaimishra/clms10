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
            <h5 class="m-0 text-dark">De-Registration Request</h5>
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
<div class="col-sm-2"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('deregister_store') }}">  
{{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-5 col-form-label"  for="deregister_date">Proposed Date of De-registration:</label>
     <input type="date" class="form-control col-sm-6" name="deregister_date" id="deregister_date">
   </div>
   <div class="form-row">
     <label class="col-sm-5 col-form-label"  for="reason">Reason for De-registration:</label>
     <input type="text" class="form-control col-sm-6" name="reason" id="reason">
   </div>
   <div class="form-row">
     <label class="col-sm-5 col-form-label"  for="details">Details:</label>
      <textarea class="form-control col-sm-6" name="details" id="details" rows="4" placeholder="Do not exceed more than 2500 words."></textarea>
   </div>
   <div class="form-row">
     <label class="col-sm-5 col-form-label"  for="request_letter">Attach Request Letter:</label>
     <input type="file" id="exampleInputFile1"  class="form-control col-sm-6" name="request_letter[]" multiple="">
   </div>
  <br>
  <div class="form-row">
  <button type="submit" class="btn btn-primary btn-sm">Submit</button>
  <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
  </div>
</form>         
</div>
</div>
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
