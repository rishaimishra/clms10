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
            <h5 class="m-0 text-dark">New Meeting Details</h5>
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

    <section class="content">
    <div class="container-fluid">

<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('meeting_store') }}">  
{{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="type">Meeting Type:</label>   
      <select class="form-control col-sm-6" name="type" id="type" required autofocus>
      <option></option>
      <option value="1">Annual General Meeting</option>
      <option value="2">Board Meeting</option>
      <option value="3">Committee Meeting</option>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="date">Meeting Date:</label>
     <input type="date" class="form-control col-sm-6" name="date" id="date">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="venue">Meeting Venue:</label>
     <input type="text" class="form-control col-sm-6" name="venue" id="venue">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="description">Meeting Description:</label>
     <textarea type="text" id="description" class="form-control col-sm-6" name="description" rows="4"></textarea>
   </div>
  
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="financial_statement">Attach Agenda:</label>
     <input type="file" id="exampleInputFile1"  class="form-control col-sm-6" name="Agenda[]" multiple="">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="financial_statement">Attach MoM:</label>
     <input type="file" id="exampleInputFile1"  class="form-control col-sm-6" name="MoM[]" multiple="">
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


