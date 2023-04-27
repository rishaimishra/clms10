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
            <h5 class="m-0 text-dark"><h3> ཐོ་བཀོད་ལས་ཕྱིར་འཐོན་སྙན་ཞུ་བཟོ་སྐྲུན། </h3></h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><h4>གདོང་ཤོག</h4></a></li>
              <li class="breadcrumb-item active"><h4>ཆོས་སྡེ་ལྷན་ཚོགས།</h4></li>
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
<form action="{{ route('deregistrationreport_search_dzo') }}" method="POST">
{{ csrf_field() }}
<div class="row">
    <div class="col-md-3">
    <div class="form-group">
      <p class="col-sm-2 col-form-label"><h3>ཆོས་ཚོགས་ཀྱི་མཚན།<font color="red">*</font></h3></p>
      <select class="form-control" id="ro_name" name="ro_name" required>
          <option disabled selected value=""><h3>ཆོས་ཚོགས་ཀྱི་མཚན་ གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
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
      <p class="col-sm-2 col-form-label"><h3>རྩིས་ལོ།<font color="red">*</font></h3></p>
      <select name="year" class="form-control" id="year" required="required" value="">
     <?php 
     for($i = 2010 ; $i <= date('Y'); $i++){
     echo "<option value=''>$i</option>";
     }
     ?>
     </select>
    </div>
    </div>   
    <div class="col-md-3">
    <div class="form-group"><br><br>
    <button class='btn btn-warning btn-bg pull-right' type='submit' name='submit' value='view' id="submit"><h3>འཚོལ།</h3></button>
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
@include('application.includes.footer_dzo')
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


