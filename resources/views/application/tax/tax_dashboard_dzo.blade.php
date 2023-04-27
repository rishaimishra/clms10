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
            <h5 class="m-0 text-dark"><h3>ཁྲལ་ཡངས་ཆག།</h3></h5>
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
              <li class="breadcrumb-item"><a href="#"><h5>གདོང་ཤོག</h5></a></li>
              <li class="breadcrumb-item active"><h5>ཆོས་སྡེ་ལྷན་ཚོགས།</h5></li>
            </ol>
          </div>  
<div class="col-md-12">
<div class="card">
<br>

<section class="content">
<div class="container-fluid">
  @if(Auth::user()->role_id == '3')
   <a href="{{ route('taxexemption_add_dzo',$tax_id) }}" title="View Details">
   <span class="btn btn-success btn-bg"><i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;&nbsp;<h4>གསརཔ་བཙུགས་ནི་དོན་ལུ་ཨེབ།</h4></span></a>

  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་ཚོགས་ཀྱི་མཚན།</h3></th>
                  <th><h3>སྤྱི་ཚེས།</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($tax as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td><?php echo $dzo = App\tbl_agency::where('id', $dc->host)->value('agency');?></td>
                  <td>{{ $dc->country }}</td>
                  <td>{{ $dc->name }}</td>
                  <td><?php echo date('d/m/Y', strtotime($dc->created_at));?></td>
                  <td>
                    <a href="{{ route('taxexempt_review_dzo', $dc->id) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><i class="fa fa-fw fa-paste"></i><h4>ཁ་གསལ།</h4></span></a>
                    @if($dc->approve == '0')
                    <span class="btn btn-danger btn-sm"><h4>བསྣར་བཞག།</h4></span>
                    @elseif($dc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>
                    @elseif($dc->approve == '2')<span class="btn btn-warning btn-sm"><h4>ཟུར་བཏོན།</h4></span>
                    @endif
                    @if($dc->resubmit == '1')<span class="label label-warning"><h4>ལོག་ཕུལ་ཕུལཝ།</h4></span>
                    @endif
                  </td>           
              </tr> 
              @endforeach
              
            </tbody>
            </table> 
  </div>
  </div>
@elseif(Auth::user()->role_id == '2')

<!--search box-->
<div class="card">
  <div class="card-body">
  <form action="{{route('ro_tax_searching_dzo')}}" method='post' id='view'>
  {{csrf_field()}} 
  <div class="form-row">
  <div class='col-md-12'>
  <p class="col-sm-2 col-form-label"><h3>ཆོས་ཚོགས་ཀྱི་མཚན།</h3></p>
  <select class='col-form-label col-sm-4' name='ro' id='ro'>
  <option value="ro_tax_searching" disabled selected><h3>ཆོས་ཚོགས་ཀྱི་མཚན་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
  <?php 
  $ros=App\tbl_ro_detail::all();
  foreach($ros as $ro):
  ?>
  <option value="{{$ro->name}}">{{$ro->name}}</option>
  <?php endforeach ?>
  </select>
  <button class='btn btn-warning btn-sm pull-right' type='submit' name='submit' value='view'><h3>འཚོལ།</h3></button>
  </div>
  </form>
  </div>
</div>
<!--search boxend-->

  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་ཚོགས་ཀྱི་མཚན།</h3></th>
                  <th><h3>སྤྱི་ཚེས།</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($CROtax as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td><?php echo $dzo = App\tbl_agency::where('id', $dc->host)->value('agency');?></td>
                  <td><?php echo date('d/m/Y', strtotime($dc->created_at));?></td>
                  <td>
                    <a href="{{ route('taxexempt_review_dzo', $dc->id) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><h4>ཁ་གསལ།</h4></span></a>
                    @if($dc->approve == '0')
                    <span class="btn btn-danger btn-sm"><h4>བསྣར་བཞག།</h4></span>
                    @elseif($dc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>
                    @elseif($dc->approve == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>
                    @endif
                     @if($dc->resubmit == '1')<span class="label label-warning"><h4>ལོག་ཕུལ་ཕུལཝ།</h4></span>
                    @endif
                  </td>           
              </tr> 
              @endforeach
              
            </tbody>
            </table> 
  </div>
  </div>
@endif

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


