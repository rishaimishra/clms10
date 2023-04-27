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
            <h5 class="m-0 text-dark"><h3>visa /སྐྱོད་ཐམ་ཞུ་ཡིག།</h3></h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div>
@if(Auth::user()->role_id == '3')<!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><h5>གདོང་ཤོག</h5></a></li>
              <li class="breadcrumb-item active"><h5>ཆོས་སྡེ་ལྷན་ཚོགས།</h5></li>
            </ol>
          </div>
@else
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><h5>གདོང་ཤོག</h5></a></li>
              <li class="breadcrumb-item active"><h5>ཆོས་སྡེ་ལྷན་ཚོགས།</h5></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endif    
<div class="col-md-12">
<div class="card">
<br>
    <div>
    <div class="btn-group w-100 mb-2">
        <a class="btn btn-warning active" href="" data-filter="2"><h3>visa /སྐྱོད་ཐམ་ ཞུ་ཚིག་གསརཔ།</h3></a>
        <a class="btn btn-warning" href="" data-filter="3"><h3>ཞུ་ཚིག་ལོག་སྟེ་ ཕུལ་ནི།</h3></a>
    </div>
    </div>
    <section class="content">
    <div class="container-fluid">
@if(Auth::user()->role_id == '3')
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
  <form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('visa_application_purpose_dzo') }}">
  {{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-6 col-form-label"  for="year"><h3>གཟིགས་སྐོར་གྱི་གནད་དོན།:<font color="red">*</font></h3></label>   
     <textarea type="text" id="purpose" class="form-control" name="purpose" value="" rows="3" cols="30" required="required" ></textarea>
   </div>
  <div class="form-group input-group-sm">
  <label for="chairman"><h3>འགྲུལ་ཡིག (ཟུར་དྲག):<font color="red">*</font></h3></label>
  <input type="file" id="exampleInputFile2"  class="form-control" name="itenary[]" multiple="" required="required"/>
  </div>
  <br>
  <div class="form-row">
    <button type="submit" class="btn btn-primary btn-sm"><h3>མི་ངོ་/མགྱོནམོ་བཙུགས་ནི་དོན་ལུ་ཨེབ།</h3></button>
  </div>
  </form>         
</div>
</div>
</div>
      <div class="box-header">
      <h5 class="box-title"><h3>visa /སྐྱོད་ཐམ་ ཞུ་ཡིག་ཚུ་གི་ཐོ།</h3></h5>
      </div>
  <!-- /.box-header -->
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>མིང༌།</h3></th>
                  <th><h3>མི་ཁུངས།</h3></th>
                  <th><h3>མི་ཁུངས་ལག་དེབ།</h3>/Passport</th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($visa_ro_wise as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td>{{ $dc->current_nationality }}</td>
                  <td>{{ $dc->passportno }}</td>
                  <td>
                    <a href="{{ route('visaapplication_review_dzo',array($dc->purposeid, $dc->id)) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><h4>ཞུན་དག་རྐྱབ།</h4></span></a>
                    @if($dc->approve == '0')
                    <span class="btn btn-info btn-sm"><h4> བསྣར་བཞག།</h4></span>
                    @elseif($dc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>
                    @elseif($dc->approve == '2')<span class="btn btn-danger btn-sm"><h4>ཕྱིར་བཏོན།</h4></span>
                    <a href="{{ route('visaapplication_resubmit_dzo',array($dc->purposeid, $dc->id)) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><h3>ལོག་ཕུལ་ནི།</h3></span></a>
                    @endif
                  </td>
              </tr>    
              @endforeach
            </tbody>
            </table>   
  </div>
  </div>
@else
      <div class="box-header">
      <h5 class="box-title"><b><h3>མགྱོནམོ་ཚུ་གི་ཐོ།</h3></b></h5>
      </div>
  <!-- /.box-header -->
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th style="width: 3cm;"><h3>ཆོས་ཚོགས་མཚན།</h3></th>
                  <th style="width: 1.5cm;"><h3>གྱངས་ཁ།</h3></th>
                  <th style="width: 3.5cm;"><h3>གཟིགས་སྐོར་གྱི་གནད་དོན།</h3></th>
                  <th style="width: 2cm;"><h3>སྤྱི་ཚེས།</h3></th>
                  <th style="width: 3cm;"><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($visa_all as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td><?php echo $ro = App\tbl_ro_detail::where('ro_id', $dc->ro_id)->value('name'); ?></td>
                  <td><?php echo $dcount = count(App\tbl_visa_application::where('application_no', $dc->application_no)->get());?></td>
                  <td><?php echo $ro = App\tbl_visa_purpose::where('id', $dc->purposeid)->value('purpose'); ?></td>
                  <td><?php echo date('d/m/Y', strtotime($dc->created_at));?></td>
                  <td>
                    <a href="{{ route('visaapplication_list_dzo',$dc->purposeid) }}" title="Assessment/Review">
                    <span class="btn btn-success btn-sm"><h4>བསྐྱར་ཞིབ་འབད།</h4></span>
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


