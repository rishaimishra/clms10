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
            <h5 class="m-0 text-dark">Visa Application Submission</h5>
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
              <li class="breadcrumb-item active">Religious Organization</li>
            </ol>
          </div>  
<div class="col-md-12">
<div class="card">
<br>

    <section class="content">
    <div class="container-fluid">
      <h5 class="box-title"><b>Visa Application Details</b>:</h5>

      <p><b>Purpose of Visit:</b>&nbsp;&nbsp;&nbsp;{{$purpose}}</p>
      <p><b>Itinerary:</b>&nbsp;&nbsp;&nbsp;
      <?php  $droid=  DB::table('tbl_visa_application_docs')->where('app_id', $purposeid )->where('filecat','itenary')->value('doc_path'); ?> 
      <a href="{{asset('/storage/'.$droid)}}" target="youriframe">
      <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
      </p>

      <div class="box-header">
      <h5 class="box-title"><b>Guest List</b>:</h5>
      </div>
  <!-- /.box-header -->
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th>No</th>
                  <th>Name</th>
                  <th>Nationality</th>
                  <th>Passport</th>
                  <th>DOB</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($visa as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td>{{ $dc->current_nationality }}</td>
                  <td>{{ $dc->passportno }}</td>
                  <td>{{ $dc->dob }}</td>
                  <td>
                    <a href="{{ route('visaapplication_review',array($dc->purposeid, $dc->id)) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><i class="fa fa-fw fa-paste"></i>Details</span></a>
                    @if($dc->approve == '0')
                    <span class="btn btn-danger btn-sm">Review Pending</span>
                    @else<span class="btn btn-warning btn-sm">Assessed</span>@endif
                    @if($dc->resubmission == '1')<span class="btn btn-warning btn-sm">Re-submission</span>
                    @endif
                  </td>           
              </tr> 
              @endforeach
            </tbody>
            </table> 
@if(Auth::user()->role_id == '3')
    <div class="form-row">
    <a href="{{ route('apply_visa_page',$dc->purposeid) }}" target="_blank" class="btn btn-warning btn-bg"><i class="fas fa-arrow-circle-right"></i>&nbsp;Click to Add More Guest</a>
@endif
    </div>  

  </div>
  </div>


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


