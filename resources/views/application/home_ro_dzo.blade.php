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
            <h3 class="m-0 text-dark">བརྡ་འཕྲིན་ངོས་པང་།</h3>/Dashboard.
             <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>
              
             
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

         @foreach($ro as $dx)
          @if($dx->registration_no == '')
            <div class="card text-white bg-danger mb-3" style="padding: 0px;">
            <div class="card-header"><b><h3>གསལ་བསྒྲགས།</h3></b></div>
            <p class="card-text">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;ཆོས་སྡེ་ལྷན་ཚོགས་་ཀྱི་ཐོ་བཀོད་ཨང་གྲངས་བཙུགས་གནང་</h3></p>
            </div>
            <form action="{{route('registrationno_store_dzo') }}" method="POST">
            <input type="hidden" name="ro_id" value="{{$dx->ro_id}}">
            {{ csrf_field() }}
            <div class="col-md-6">
            <div class="input-group input-group-sm mb-0">
            <label for="cid"><h3>ཐོ་བཀོད་ཨང་གྲངས</h3></label><font color="red">*</font>&nbsp;&nbsp;&nbsp;&nbsp;
            <input class="form-control form-control-sm" name='registration_no' placeholder="Enter Registration number" required/>
            <div class="input-group-append">
            <button type="submit" class="btn btn-warning"><h4>ཕུལ་</h4></button>
            </div>
            </div>
            </div>
            </form>      
          @else
            <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="phoneno"><h3>ཐོ་བཀོད་ཨང་གྲངས</h3></label>
            :{{$dx->registration_no}}
            </div>
            </div>
          @endif
          @endforeach


        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-clipboard"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><h3>ཆོས་སྡེ་ཁ་གསལ།</h3></span>
                <span class="info-box-number">
                  <a href="{{route('view_ro_details_dzo')}}" title="View RO Information">
                  <span class="btn btn-warning btn-sm"><i class="fa fa-fw fa-paste"></i><h4>ཁ་གསལ་བལྟ་ནི།</h4></span></a>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><i class="ion ion-pie-graph"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><h3>མཛད་རིམ་ཁ་གསལ།</h3></span>
                <span class="info-box-number">
                  <a href="{{route('eventinfo_view_dzo')}}" title="View Event Information">
                  <span class="btn btn-warning btn-sm"><i class="fa fa-fw fa-paste"></i><h4>ཁ་གསལ་བལྟ་ནི།</h4></span></a>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><i class="ion ion-stats-bars"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><h3>གནས་ཐོ་ཁ་གསལ།</h3></span>
                <span class="info-box-number">
                  <a href="{{route('siteinfo_view_dzo')}}" title="View Religious Site Information">
                  <span class="btn btn-warning btn-sm"><i class="fa fa-fw fa-paste"></i><h4>ཁ་གསལ་བལྟ་ནི།</h4></span></a>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3" style="background-image: linear-gradient(to bottom right,  #fa9761, #eb9902);">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><h3>ལོ་བསྟར་དངུལ་གྱི་སྙན་ཞུ། </h3></span>
                  <a href="{{route('financial_all_dzo')}}" title="View Religious Site Information">
                  <span class="btn btn-warning btn-sm"><i class="fa fa-fw fa-paste"></i><h4>ཁ་གསལ་བལྟ་ནི།</h4></span></a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
             


<!-- Main row -->
<div class="row">
<section class="col-lg-12 connectedSortable">

<!-- Registration -->
<div class="card direct-chat direct-chat-primary">
<div class="card-header">
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-warning active" href="" data-filter="1"><h3>ཆོས་སྡེ་ཐོ་བཀོད་ཞུ་ཚིག</h3></a>
                    @foreach($ro as $dx)
                    <a class="btn btn-warning" href="{{route('update_ro_info_dzo',$dx->ro_id)}}" data-filter="2"><h3>ཁ་གསལ་བསྒྱུར་བཅོས།</h3></a>
                    <a class="btn btn-warning" href="{{route('new_information_dzo',$dx->ro_id)}}" data-filter="5"><h3>ཁ་གསལ་གསརཔ།</h3></a>
                    <a class="btn btn-warning" href="{{route('financial_dzo',$dx->ro_id)}}" data-filter="3"><h3>དངུལ་འབྲེལ་སྙན་ཞུ།</h3></a>
                    @endforeach
                    <a class="btn btn-warning" href="{{route('visa_application_dzo')}}" data-filter="4"><h3>visa/སྐྱོད་ཐམ་ཞུ་ཚིག</h3></a>
                  </div>
                </div>           
              

            <div class="box-header">
            <h6 class="box-title"><h3>ཆོས་སྡེ་ཐོ་བཀོད་ཞུ་ཚིག</h3></h6>
            </div>
            <!-- /.box-header -->
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་ཚོགས་ཀྱི་མཚན</h3></th>
                  <th style="width: 5cm;"><h3>ཡིག་ཚང་གི་ཁ་བྱང་།</h3></th>
                  <th><h3>ཁྲི་འཛིན།</h3></th>
                  <th><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($ro as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td style="width: 5cm;">{{ $dc->location }}</td>
                  <td><?php echo $c = App\tbl_chairman_detail::where('ro_id', $dc->ro_id)->value('name'); ?></td>
                  <td>{{ $dc->phone }}</td>
                  <td>
                   

                    @if($dc->approve == 1)
                    <span class="btn btn-success btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span><br>

<?php $path = App\tbl_register_document::where('ro_id', $dc->ro_id)->where('filecat','order')->get(); ?>
@foreach($path as $p)
<a href="{{asset('/storage/'.$p->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>ལག་ཁྱེར།</a>
<a href="{{ route('certificate.download', $p->ro_id) }}" class="btn btn-outline-warning btn-xs"><i class="fa fa-fw fa-download"></i><h4>གནས་སྡུད་སྤོ་</h4></a>
@endforeach

                    @elseif($dc->approve == 2)
                    <span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>
                    @else
                    <a href="{{ route('edit_ro', $dc->ro_id) }}" title="Assessment/Review">
                    <span class="btn btn-success btn-sm"><i class="fa fa-fw fa-paste"></i><h4>ཞུན་དག་རྐྱབ།</h4></span></a>
                    <span class="btn btn-warning btn-sm"><h4>བསྣར་བཞག།</h4></span>                
                    @endif

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


 
