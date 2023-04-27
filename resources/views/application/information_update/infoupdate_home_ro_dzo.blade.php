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
            <h5 class="m-0 text-dark"><h3>ཁ་གསལ་བསྒྱུར་བཅོས།</h3></h5>
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


<div class="col-md-12">
    <div class="card">
    <br>
    <section class="content">
    <div class="container-fluid">
@if(Auth::user()->role_id == '2')
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་ཚོགས་ཀྱི་མཚན</h3></th>
                  <th><h3>དབྱེ་བ</h3></th>
                  <th><h3>སྤྱི་ཚེས།</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($app as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td><h4>ཁ་གསལ་གསརཔ།</h4></td>
                  <td>{{ $dc->created_at }}</td>
                  <td>
                    @if($dc->approve == '0')
                    <a href="{{ route('view_updateinfo_details_dzo', $dc->ro_id) }}" title="Assessment/Review">
                    <span class="btn btn-success btn-sm"><i class="fa fa-fw fa-paste"></i><h4>བསྐྱར་ཞིབ།</h4></span>@endif
                    @if($dc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif
                    @if($dc->approve == '2')<span class="btn btn-danger btn-sm"><h4>ཕྱིར་བཏོན།</h4></span>@endif  
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table> 
  @elseif(Auth::user()->role_id == '3')   
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་ཚོགས་ཀྱི་མཚན</h3></th>
                  <th><h3>དབྱེ་བ</h3></th>
                  <th><h3>སྤྱི་ཚེས།</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($app2 as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td><h4>ཁ་གསལ་གསརཔ།</h4></td>
                  <td>{{ $dc->created_at }}</td>
                  <td>
                    @if($dc->approve == '0')
                    <a href="{{ route('view_updateinfo_details_dzo', $dc->ro_id) }}" title="Assessment/Review">
                    <span class="btn btn-success btn-sm"><i class="fa fa-fw fa-paste"></i><h4>བསྐྱར་ཞིབ།</h4></span>@endif
                    @if($dc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif
                    @if($dc->approve == '2')<span class="btn btn-danger btn-sm"><h4>ཕྱིར་བཏོན།</h4></span>@endif  
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table> 
    @endif         

    </div>
    </section>    
 
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
<script language='JavaScript' type='text/javascript'>
    function validateThisFrom(thisForm) {
        if (thisForm.approved.value == "") {
            alert("Please Provide Assessment Decision");
            thisForm.approved.focus();
            return false;
        }      
    }
</script>
