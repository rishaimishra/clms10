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
            <h5 class="m-0 text-dark"><h3>འཐུས་མི་ཐོ་བཀོད།</h3></h5>
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
{{ csrf_field() }} 
    <section class="content">
    <div class="container-fluid">
      <div class="box-header">
      <h5 class="box-title"><b> <h3>འཐུས་མི་ཐོ་བཀོད།</h3></b></h5>
      </div>
        <a href="{{ route('register_new_dzo') }}" title="View Details">
        <span class="btn btn-warning btn-bg"><i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;&nbsp;<h3>ཁ་གསལ་བཙུགས་ནི་དོན་ལུ་ཨེབ་ནི།</h3></span></a>
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ལག་ཁྱེར་ཨང་</h3></th>
                  <th><h3>མིང༌།</h3></th>
                  <th><h3>རྫོང་ཁག།</h3></th>
                  <th><h3>རྒེད་འོག།</h3></th>
                  <th><h3>གཡུས</h3></th>
                  <th><h3>ཐོ་བཀོད་མི་སྤྱི་ཚེས། </h3></th>
                  <th><h3>འཐུས་མི་དབྱེ་ཁ། </h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($member as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->cid }}</td>
                  <td>{{ $dc->name }}</td>
                  <td><?php echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', $dc->dzongkhag)->value('dzongkhag_name');?></td>
                  <td><?php echo $dzo = App\gewog_dzo::where('gewog_id', $dc->gewog)->value('gewog_name');?></td>
                  <td><?php echo $dzo = App\village_dzo::where('village_id', $dc->village)->value('village_name');?></td>
                  <td>{{ $dc->registration_date }}</td>
                  <td>@if($dc->membertype == '1')<?php echo 'ཆོས་སྡེ།' ?>@elseif($dc->membertype == '2') ཡན་ལག་ཆོས་སྡེ།<br>མིང༌།:{{ $dc->branch_name }}@endif</td>
                  <td>
                    <a href="{{ route('delete_member_dzo', $dc->id) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
                    <span class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i><h4>བཏོན་གཏང་།</h4></span></a>
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

