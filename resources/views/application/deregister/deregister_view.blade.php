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
            <h5 class="m-0 text-dark">All De-Registration Requests.</h5>
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
      <div class="box-header">
      <h5 class="box-title"><b>List of De-Registration Requests</b>:</h5>
      </div>

  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th>No</th>
                  <th>Religious Organization</th>
                  <th>Submitted On</th>
                  <th>Proposed Date of De-Registration</th>
                  <th>Status</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($deregister as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td><?php echo $dzo = App\tbl_agency::where('id', $dc->host)->value('agency');?></td>
                  <td><?php echo date('d/m/Y', strtotime($dc->created_at));?></td>
                  <td>{{ $dc->deregister_date }}</td>
                  <td>
                    @if($dc->approve == '')
                    <span class="btn btn-warning btn-sm">Pending</span>
                    @elseif($dc->approve == '1')<span class="btn btn-danger btn-sm">De-Registered</span>
                    @elseif($dc->approve == '2')<span class="btn btn-danger btn-sm">Request Rejected</span>@endif 
                  </td> 
                  <td>
                    <a href="{{ route('deregister_viewdetails', $dc->id) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><i class="fa fa-fw fa-paste"></i>Review</span></a>
                  </td>           
              </tr> 
              @endforeach
            </tbody>
            </table> 
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


