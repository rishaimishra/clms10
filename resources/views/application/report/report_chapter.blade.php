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
            <h5 class="m-0 text-dark">Report on Subsidiary/Branches.</h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Commission for Religious Organizations</li>
            </ol>
          </div>  
<div class="col-md-12">
<div class="card">
<br>

    <section class="content">
    <div class="container-fluid">


<!--search box-->
<div class="card">
<div class="card-body">
<form action="{{ route('chapterreport_search') }}" method="POST">
{{ csrf_field() }}
<div class="row">
    <div class="col-md-3">
    <div class="form-group">
      <option value="ro_name" disabled selected>Organization<font color="red">*</font>:</option>
      <select class="form-control" id="ro_name" name="ro_name" required>
          <option disabled selected value="">Select Organization</option>
          <?php 
          $ag=App\tbl_agency::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">{{$ags->agency}}</option>
          <?php endforeach ?>
      </select>
    </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
      <option value="type" disabled selected>Institute Type<font color="red">*</font>:</option>
      <select name='type' id='type' type="type" class="form-control" required>
        <option disabled selected value="">Select Type</option>
        <option value="1">Drubdey</option>
        <option value="2">Shedra</option>
        <option value="3">Lobdra</option>
        <option value="4">Gomdey</option>
        <option value="5">Gyendra</option>
        <option value="6">Others</option>
      </select>
    </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
      <option value="year" disabled selected>Year<font color="red">*</font>:</option>
      <input type="text" class="form-control" name="year" id="year" required>
    </div>
    </div>   
    <div class="col-md-3">
    <div class="form-group"><br>
    <button class='btn btn-warning btn-bg pull-right' type='submit' name='submit' value='view' id="submit"><i class="fas fa-search"></i>&nbsp;Search</button>
    </div>
    </div>
</div>
</form>
</div>
</div>
<!--search boxend-->




    </div>
    </section>  
</div>
</div>

</div>
</div>
</div>
</div>
@include('application.includes.footer')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    ({
     
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  }); 
</script>


