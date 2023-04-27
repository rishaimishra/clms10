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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark"><h3>བརྡ་འཕྲིན་ངོས་པང་།</h3></h3>/Dashboard.           
        </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><h5>གདོང་ཤོག</h5></a></li>
              <li class="breadcrumb-item active"><h5>ཆོས་སྡེ་ལྷན་ཚོགས།</h5></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <div class="row">


          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><i class="ion ion-clipboard"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>ཆོས་སྡེ་ཐོ་བཀོད།</h3></span>
                <span class="info-box-number">
                  <a href="{{route('application.home_dzo')}}" title="View RO Information">
                  <span class="btn btn-warning btn-sm" style="background-color: #f4b04a;">
                  <i class="fa fa fa-square" style="color: gray;"></i>
                  <b><?php echo $c = count(App\tbl_ro_detail::where('approve', '0')->get()); ?></b>&nbsp;&nbsp;<h4>བསྣར་བཞག།</h4><br>&nbsp;&nbsp;&nbsp;
                  <i class="fa fa fa-check-square" style="color: gray;"></i>
                  <b><?php echo $c = count(App\tbl_ro_detail::where('approve', '1')->get()); ?></b>&nbsp;&nbsp;<h4>གནང་བ་འགྲོལ་ཚརཔ།</h4>
                  </span></a>
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><ion-icon name="create-outline"></ion-icon></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>ཁ་གསལ་བསྒྱུར་བཅོས།</h3></span>
                <span class="info-box-number">
                  <a href="{{route('infoupdate_home_dzo')}}" title="View RO Information">
                  <span class="btn btn-warning btn-sm" style="background-color: #f4b04a;">
                  <i class="fa fa fa-square" style="color: gray;"></i>
                  <b><?php echo $c = count(App\tbl_info_update::where('approve', '0')->get()); ?></b>&nbsp;&nbsp;<h4>བསྣར་བཞག།</h4><br>&nbsp;&nbsp;
                  <i class="fa fa fa-check-square" style="color: gray;"></i>
                  <b><?php echo $c = count(App\tbl_info_update::where('approve', '1')->get()); ?></b>&nbsp;&nbsp;<h4>གནང་བ་འགྲོལ་ཚརཔ།</h4>
                  </span></a>
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><i class="ion ion-card"></i></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>visa/སྐྱོད་ཐམ་ཞུ་ཚིག།</h3></span>
                <span class="info-box-number">
                  <a href="{{route('visa_application_dzo')}}" title="View Visa Applications">
                  <span class="btn btn-warning btn-sm" style="background-color: #f4b04a;">
                  <i class="fa fa fa-square" style="color: gray;"></i>
                  <b><?php echo $c = count(App\tbl_visa_application::where('approve', '0')->get()); ?></b>&nbsp;&nbsp;<h4>བསྣར་བཞག།</h4><br>&nbsp;&nbsp;
                  <i class="fa fa fa-check-square" style="color: gray;"></i>
                  <b><?php echo $c = count(App\tbl_visa_application::where('approve', '1')->get()); ?></b>&nbsp;&nbsp;<h4>གནང་བ་འགྲོལ་ཚརཔ།</h4>
                  </span></a>
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
           <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><ion-icon name="information-circle-outline"></ion-icon></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>མཛད་རིམ་ཁ་གསལ།</h3></span>
                <span class="info-box-number"><br>
                  <a href="{{route('eventinfo_view_dzo')}}" title="View Event Details">
                  <span class="btn btn-warning btn-sm" style="background-color: #f4b04a;">
                  <i class="fa fa fa-check-square" style="color: gray;"></i><br>
                  <b><?php echo $c = count(App\tbl_event_information::all()); ?></b>&nbsp;&nbsp;<h4>གནང་བ་འགྲོལ་ཚརཔ།</h4><br>&nbsp;&nbsp;
                  </span></a>
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><ion-icon name="cash-outline"></ion-icon></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>ལོ་བསྟར་དངུལ་གྱི་སྙན་ཞུ།</h3></span>
                  <span class="info-box-number">
                  <a href="{{route('financial_all_dzo')}}" title="View Financial Submissions">
                  <span class="btn btn-warning btn-sm" style="background-color: #f4b04a;">
                  <i class="fa fa fa-square" style="color: gray;"></i>
                  <b><?php echo $c = count(App\tbl_financial_information::where('approve', '0')->get()); ?></b>&nbsp;&nbsp;<h4>བསྣར་བཞག།</h4><br>&nbsp;&nbsp;
                  <i class="fa fa fa-check-square" style="color: gray;"></i>
                  <b><?php echo $c = count(App\tbl_financial_information::where('approve', '1')->get()); ?></b>&nbsp;&nbsp;<h4>གནང་བ་འགྲོལ་ཚརཔ།</h4>
                  </span></a>
                </span>
              </div>
            </div>
          </div>
           <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><ion-icon name="mail-outline"></ion-icon></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>ཉོག་བཤད།</h3></span>
                <span class="info-box-number"><br>
                  <a href="{{route('compliant_view_dzo')}}" title="View Compliant Details">
                  <span class="btn btn-warning btn-sm" style="background-color: #f4b04a;">
                  <i class="fa fa fa-check-square" style="color: gray;"></i><br>
                  <b><?php echo $c = count(App\tbl_compliant::all()); ?></b>&nbsp;&nbsp;<h4>ཉོག་བཤད་འཐོབ་མི།</h4><br>&nbsp;&nbsp;
                  </span></a>
                </span>
              </div>
            </div>
          </div>
           <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><ion-icon name="location-outline"></ion-icon></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>གནས་ཐོ་ཁ་གསལ།</h3></span>
                <span class="info-box-number"><br>
                  <a href="{{route('siteinfo_view_dzo')}}" title="View Religious Site Details">
                  <span class="btn btn-warning btn-sm" style="background-color: #f4b04a;">
                  <i class="fa fa fa-check-square" style="color: gray;"></i><br>
                  <b><?php echo $c = count(App\tbl_site_information::all()); ?></b>&nbsp;&nbsp;<h4>གནས།</h4><br>&nbsp;&nbsp;
                  </span></a>
                </span>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><ion-icon name="people-circle-outline"></ion-icon></span>
              <div class="info-box-content">
                <span class="info-box-text"><h3>འཐུས་མི་ཐོ་བཀོད།</h3></span>
                <span class="info-box-number"><br>
                  <a href="{{route('member_register_dzo')}}" title="View Religious Members Details">
                  <span class="btn btn-warning btn-sm" style="background-color: #f4b04a;">
                  <i class="fa fa fa-check-square" style="color: gray;"></i><br>
                  <b><?php echo $c = count(App\tbl_newmember::all()); ?></b>&nbsp;&nbsp;<h4>ཐོ་བཀོད་གསརཔ།</h4><br>&nbsp;&nbsp;
                  </span></a>
                </span>
              </div>
            </div>
          </div>

</div><!--row end-->
             


<!-- Main row -->
<div class="row">
<section class="col-lg-12 connectedSortable">

<!-- Registration -->
<div class="card direct-chat direct-chat-primary">
<div class="card-header">
                  <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-warning active" href="{{route('register_home_dzo')}}" data-filter="1"><h3>ཆོས་སྡེ་ཐོ་བཀོད་ཞུ་ཚིག</h3></a>
                    <a class="btn btn-warning" href="{{route('infoupdate_home_dzo')}}" data-filter="2"><h3>ཁ་གསལ་བསྒྱུར་བཅོས།</h3></a>
                    <a class="btn btn-warning" href="{{route('financial_all_dzo')}}" data-filter="3"><h3>ལོ་བསྟར་དངུལ་གྱི་སྙན་ཞུ།</h3></a>
                    <a class="btn btn-warning" href="{{route('visa_application_dzo')}}" data-filter="4"><h3>visa/སྐྱོད་ཐམ་ཞུ་ཚིག</h3></a>
                  </div>
                </div>           
              

            <div class="box-header">
            <h3 class="box-title">ཆོས་སྡེ་ཐོ་བཀོད་ཞུ་ཚིག།</h3>
            </div>
            <!-- /.box-header -->
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་ཚོགས་ཀྱི་མཚན།</h3></th>
                  <th><h3>ཁ་བྱང་།</h3></th>
                  <th><h3>བརྒྱུད་འཕྲིན།</h3></th>
                  <th><h3>ཚེས།</h3></th>
                  <th style="width: 3cm;"><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($ro as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td style="width: 5cm;">{{ $dc->location }}</td>
                  <td>{{ $dc->phone }}</td>
                  <td><?php echo date('d/m/Y', strtotime($dc->created_at));?></td>
                  <td>
                  @if($dc->approve == '0')
                    <a href="{{ route('edit_ro_dzo', $dc->ro_id) }}" title="གནང་བ་མི་བྱིན་ནི།">
                    <span class="btn btn-success btn-sm"><h4>བསྐྱར་ཞིབ་འབད།</h4></span>@endif
                  @if($dc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif
                  @if($dc->approve == '2')<span class="btn btn-danger btn-sm"><h4> ཕྱིར་བཏོན།</h4></span>@endif  
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>   
          


  </div>
  </div>
</div>
</div>
          

</section>  
</div>


</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
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



