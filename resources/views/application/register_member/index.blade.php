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
            <h5 class="m-0 text-dark">Registered Members</h5>
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
{{ csrf_field() }} 
    <section class="content">
    <div class="container-fluid">
      <div class="box-header">
      <h5 class="box-title"><b>List of Registered Members</b>:</h5>
      </div>
        <a href="{{ route('register_new') }}" title="View Details">
        <span class="btn btn-warning btn-bg"><i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;&nbsp;Click to Register New Member</span></a>
  
<div id='printarea'>

  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th>No</th>
                  <th>CID</th>
                  <th>Name</th>
                  <th>Dzongkhag</th>
                  <th>Gewog</th>
                  <th>Village</th>
                  <th>Registration Date</th>
<th>Member Type</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($member as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->cid }}</td>
                  <td>{{ $dc->name }}</td>
                  <td><?php echo $dzo = App\dzongkhag::where('dzongkhag_id', $dc->dzongkhag)->value('dzongkhag_name');?></td>
                  <td><?php echo $dzo = App\gewog::where('gewog_id', $dc->gewog)->value('gewog_name');?></td>
                  <td><?php echo $dzo = App\village::where('village_id', $dc->village)->value('village_name');?></td>
                  <td>{{ $dc->registration_date }}</td>
                  <td>@if($dc->membertype == '1')<?php echo 'RO' ?>@elseif($dc->membertype == '2') Subsidary/Branch<br>NAME:{{ $dc->branch_name }}@endif</td>

                  <td>
                    <a href="{{ route('delete_member', $dc->id) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
                    <span class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Remove</span></a>
                  </td>           
              </tr> 
              @endforeach
    
            </tbody>
            </table> 
  </div>
  </div>


<input type='button' id='btn' value='Print' onclick='printFunc();' style="background-color: red;">
</div>
<script type="text/javascript">
  function printFunc() {
    var divToPrint = document.getElementById('printarea');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write("<h3 align='center'>Zheldrang List</h3>");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
    }
</script>

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


