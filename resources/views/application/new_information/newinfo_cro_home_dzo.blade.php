  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
    <!--oncahnge-->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
<body class="hold-transition sidebar-mini">
@include('application.includes.header')
@include('application.includes.sidebar_dzo')
<div class="content-wrapper">
@include('flash-message')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark"><h3>ཆོས་སྡེའི་ཁ་གསལ་གསརཔ།</h3></h5>
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
              <li class="breadcrumb-item"><a href="#"><h4>གདོང་ཤོག</h4></a></li>
              <li class="breadcrumb-item active"><h4>ཆོས་སྡེ་ལྷན་ཚོགས།</h4></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<div class="col-md-12">
    <div class="card">
    <br>
    <div>
    <div class="btn-group w-100 mb-2">
        <a class="btn btn-warning active" href="" data-filter="2"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></a>
        <a class="btn btn-warning" href="#tab_2" data-filter="3"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ཁ་གསལ། </h3></a>
        <a class="btn btn-warning" href="#tab_3" data-filter="4"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ། </h3></a>
        <a class="btn btn-warning" href="#tab_4" data-filter="5"><h3>དྲུང་ཆེན་འོགམ་གྱི་ཁ་གསལ། </h3></a>
        <a class="btn btn-warning" href="#tab_5" data-filter="6"><h3>རྩིས་འཛིན་གྱི་ཁ་གསལ།</h3></a>
    </div>
    </div>
    <section class="content">
    <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <b style="color: blue;"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ་གསརཔ།</h3></b>
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་སྡེའི་མིང་</h3></th>
                  <th><h3>དབྱེ་ཁག</h3></th>
                  <th><h3>སྤྱི་ཚེས།</h3></th>
                  <th><h3>གནས་སྟངས།/དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($app as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td><?php echo $c = App\tbl_ro_detail::where('ro_id', $dc->ro_id)->value('name'); ?></td>
                  <td><h4>ཁ་གསལ་གསརཔ།</h4></td>
                  <td>{{ $dc->created_at }}</td>
                  <td>
                    @if($dc->approval_status == '0')
                    <?php $cd =  App\tbl_chairman_detail::where('ro_id', $dc->ro_id)->orderBy('id', 'desc')->limit(1)->get(); ?>
                    @foreach($cd as $cc)
                   
                    <a href="{{ route('cd_review_dzo', $cc->id) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><h4>ཞུན་དག།</h4></span></a>
                    @endforeach
                    <span class="btn btn-warning btn-sm"><h4>བསྣར་བཞག</h4></span>@endif
                    @if($dc->approval_status == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif 
                    @if($dc->approval_status == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>@endif  
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>   
    </div>
    </section>    
</div> 
</div>           
        

<!--DY secretary tab -->
<div class="tab-pane" id="tab_2">
<div class="col-md-12">
<div class="card"><br>
    <div class="content-header">
    <div class="container-fluid">
            <table id="example2" class="table table-bordered table-striped">
            <b style="color: blue;"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ཁ་གསལ་གསརཔ།</h3></b>
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་སྡེའི་མིང་</h3></th>
                  <th><h3>དབྱེ་ཁག</h3></th>
                  <th><h3>སྤྱི་ཚེས།</h3></th>
                  <th><h3>གནས་སྟངས།/དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($dcd as $dcx)
              <tr>
                  <td>{{$id++}}</td>
                  <td><?php echo $c = App\tbl_ro_detail::where('ro_id', $dcx->ro_id)->value('name'); ?></td>
                  <td><h4>ཁ་གསལ་གསརཔ།</h4></td>
                  <td>{{ $dcx->created_at }}</td>
                  <td>
                    @if($dcx->approval_status == '0')
                    <?php $cd =  App\tbl_dychairman_detail::where('ro_id', $dcx->ro_id)->orderBy('id', 'desc')->limit(1)->get(); ?>
                    @foreach($cd as $cc)
                    <a href="{{ route('dcd_review_dzo', $cc->id) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><h4>ཞུན་དག།</h4></span></a>
                    @endforeach
                    <span class="btn btn-warning btn-sm"><h4>བསྣར་བཞག</h4></span>@endif
                    @if($dcx->approval_status == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif 
                    @if($dcx->approval_status == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>@endif 
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>  
            
    </div>
    </div>
</div>
</div>
</div>
<!--Secretary tab -->
<div class="tab-pane" id="tab_3">
<div class="col-md-12">
<div class="card"><br>
    <div class="content-header">
    <div class="container-fluid">
            <table id="example3" class="table table-bordered table-striped">
            <b style="color: blue;"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ་གསརཔ།</h3></b>
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་སྡེའི་མིང་</h3></th>
                  <th><h3>དབྱེ་ཁག</h3></th>
                  <th><h3> སྤྱི་ཚེས།</h3></th>
                  <th><h3>གནས་སྟངས།/དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($sd as $dca)
              <tr>
                  <td>{{$id++}}</td>
                  <td><?php echo $c = App\tbl_ro_detail::where('ro_id', $dca->ro_id)->value('name'); ?></td>
                  <td><h4>ཁ་གསལ་གསརཔ།</h4></td>
                  <td>{{ $dca->created_at }}</td>
                  <td>
                    @if($dca->approval_status == '0')
                    <?php $cd =  App\tbl_secretary_detail::where('ro_id', $dca->ro_id)->orderBy('id', 'desc')->limit(1)->get(); ?>
                    @foreach($cd as $cc)
                    <a href="{{ route('sd_review_dzo', $cc->id) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><h4>ཞུན་དག།</h4></span></a>
                    @endforeach
                    <span class="btn btn-warning btn-sm"><h4>བསྣར་བཞག</h4></span>@endif
                    @if($dca->approval_status == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif 
                    @if($dca->approval_status == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>@endif  
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>  
     
    </div>
    </div>
</div> 
</div>
</div>

<!--Deputy Secretary tab -->
<div class="tab-pane" id="tab_4">
<div class="col-md-12">
<div class="card"><br>
    <div class="content-header">
    <div class="container-fluid">
            <table id="example4" class="table table-bordered table-striped">
            <b style="color: blue;"><h3>དྲུང་ཆེན་འོགམ་གྱི་ཁ་གསལ་གསརཔ།</h3></b>
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་སྡེའི་མིང་</h3></th>
                  <th><h3>དབྱེ་ཁག</h3></th>
                  <th><h3>ཟླ་ཚེས།</h3></th>
                  <th><h3>གནས་སྟངས།/དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($dsd as $dca)
              <tr>
                  <td>{{$id++}}</td>
                  <td><?php echo $c = App\tbl_ro_detail::where('ro_id', $dca->ro_id)->value('name'); ?></td>
                  <td><h4>ཁ་གསལ་གསརཔ།</h4></td>
                  <td>{{ $dca->created_at }}</td>
                  <td>
                    @if($dca->approval_status == '0')
                    <?php $cd =  App\tbl_dysecretary_detail::where('ro_id', $dca->ro_id)->orderBy('id', 'desc')->limit(1)->get(); ?>
                    @foreach($cd as $cc)
                     <a href="{{ route('dsd_review_dzo', $cc->id) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><h4>ཞུན་དག།</h4></span></a>
                    @endforeach
                    <span class="btn btn-warning btn-sm"><h4>ཐག་མ་ཆོདཔ།</h4></span>@endif
                    @if($dca->approval_status == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif 
                    @if($dca->approval_status == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>@endif  
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>  
     </div>
    </div>
</div> 
</div>
</div>

<!--Treasurur tab -->
<div class="tab-pane" id="tab_5">
<div class="col-md-12">
<div class="card"><br>
    <div class="content-header">
    <div class="container-fluid">
            <table id="example5" class="table table-bordered table-striped">
            <b style="color: blue;"><h3>རྩིས་འཛིན་གྱི་ཁ་གསལ་གསརཔ།</h3></b>
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་སྡེའི་མིང་</h3></th>
                  <th><h3>དབྱེ་ཁག</h3></th>
                  <th><h3>ཟླ་ཚེས།</h3></th>
                  <th><h3>གནས་སྟངས།/དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($td as $dca)
              <tr>
                  <td>{{$id++}}</td>
                  <td><?php echo $c = App\tbl_ro_detail::where('ro_id', $dca->ro_id)->value('name'); ?></td>
                  <td><h4>ཁ་གསལ་གསརཔ།</h4></td>
                  <td>{{ $dca->created_at }}</td>
                  <td>
                    @if($dca->approval_status == '0')
                    <?php $cd =  App\tbl_treasurer_detail::where('ro_id', $dca->ro_id)->orderBy('id', 'desc')->limit(1)->get(); ?>
                    @foreach($cd as $cc)
                     <a href="{{ route('td_review_dzo', $cc->id) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><h4>ཞུན་དག།</h4></span></a>
                    @endforeach
                    <span class="btn btn-warning btn-sm"><h4>བསྣར་བཞག</h4></span>@endif
                    @if($dca->approval_status == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif 
                    @if($dca->approval_status == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>@endif   
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>  
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
  $(function () {
    $("#example2").DataTable();
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
  $(function () {
    $("#example3").DataTable();
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
   $(function () {
    $("#example4").DataTable();
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
  $(function () {
    $("#example5").DataTable();
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
<script language='JavaScript' type='text/javascript'>
    function validateThisFrom(thisForm) {
        if (thisForm.approved.value == "") {
            alert("Please Provide Assessment Decision");
            thisForm.approved.focus();
            return false;
        }      
    }
</script>
