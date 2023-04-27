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
            <h5 class="m-0 text-dark"><h3>སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག།</h3></h5>
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
        <a class="btn btn-warning active" href="" data-filter="2"><h3>སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག།</h3></a>
        <a class="btn btn-warning" href="" data-filter="3"><h3>ལོག་སྟེ་ཕུལ་མི་ཞུ་ཚིག།</h3></a>
    </div>
    </div>
    <section class="content">
    <div class="container-fluid">
@if(Auth::user()->role_id == '3')
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
  <form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('visa_application_student_dzo') }}">
  <input type="hidden" name="ro_id" id="ro_id" value="<?php echo $ro_id = App\tbl_ro_detail::where('name', $agency)->value('ro_id');?>">
  {{ csrf_field() }} 
  <div class="form-group input-group-sm">
  <label for="student_visa"><h3>སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག།:<font color="red">*</font></h3></label>
  <input type="file" id="exampleInputFile2"  class="form-control" name="student_visa[]" multiple="" required="required"/>
  </div>
  <div class="form-group input-group-sm">
  <label for="student_permit"><h3>སློབ་ཕྲུག་གྱི་ཆོག་ཐམ་ཚིག།:<font color="red">*</font></h3></label>
  <input type="file" id="exampleInputFile2"  class="form-control" name="student_permit[]" multiple="" required="required"/>
  </div>
  <br>
  <div class="form-row">
    <button type="submit" class="btn btn-primary btn-sm"><h3>ཕུལ།</h3></button>
  </div>
  </form>         
</div>
</div>
</div>
      <div class="box-header">
      <h5 class="box-title"><h3>སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག་གྱི་ཐོ།</h3></h5>
      </div>
  <!-- /.box-header -->
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཟུར་སྦྲགས།</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
              <?php $id = 1;?>
              @foreach($visa_ro_wise as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>
                  <?php $doc = App\tbl_visa_application_doc::where('app_id', $dc->id)->where('filecat','student_visa')->orWhere('filecat','student_permit')->get();?>
                  @foreach($doc as $dd)
                  @if($dd->filecat == 'student_visa')
                  <h4>སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a><br>
                  @elseif($dd->filecat == 'student_permit')
                  <h4>སློབ་ཕྲུག་གྱི་ཆོག་ཐམ་ཚིག།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a><br>
                  @endif
                  @endforeach
                  </td>
                  <td>
                    <a href="{{ route('visaapplication_review_std_dzo',array($dc->application_no, $dc->id)) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><h4>ཞུན་དག་རྐྱབ།</h4></span></a>
                    @if($dc->approve == '0')
                    <span class="btn btn-info btn-sm"><h4> བསྣར་བཞག།</h4></span>
                    @elseif($dc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>
                    @elseif($dc->approve == '2')<span class="btn btn-danger btn-sm"><h4>ཕྱིར་བཏོན།</h4></span>
                    <a href="{{ route('visaapplication_resubmit_std_dzo',array($dc->application_no, $dc->id)) }}" title="View Details">
                    <span class="btn btn-success btn-sm"><h4>ལོག་ཕུལ་ནི།</h4></span></a>
                    @endif
                  </td>
              </tr>    
              @endforeach
            </table>   
  </div>
  </div>
@else
  <!-- /.box-header -->
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་སྡེ།</h3></th>
                  <th><h3>ཟུར་སྦྲགས།</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
              <?php $id = 1;?>
              @foreach($visa_all as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td><?php echo $ro = App\tbl_ro_detail::where('ro_id', $dc->ro_id)->value('name'); ?></td>
                  <td>
                  <?php $doc = App\tbl_visa_application_doc::where('app_id', $dc->id)->where('filecat','student_visa')->orWhere('filecat','student_permit')->get();?>
                  @foreach($doc as $dd)
                  @if($dd->filecat == 'student_visa')
                  <h4>སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a><br>
                  @elseif($dd->filecat == 'student_permit')
                  <h4>སློབ་ཕྲུག་གྱི་ཆོག་ཐམ་ཚིག།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a><br>
                  @endif
                  @endforeach
                  </td>
                  <td>
                    <a href="{{ route('visaapplication_review_std_dzo',array($dc->application_no, $dc->id)) }}" title="Assessment/Review">
                    <span class="btn btn-success btn-sm"><h4>ཞུན་དག་རྐྱབ།</h4></span></a>
                    @if($dc->approve == '0')
                    <span class="btn btn-info btn-sm"><h4> བསྣར་བཞག།</h4></span>
                    @elseif($dc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>
                    @elseif($dc->approve == '2')<span class="btn btn-danger btn-sm"><h4>ཕྱིར་བཏོན།</h4></span>
                    @endif
                    @if($dc->resubmission == '1')<span class="btn btn-danger btn-sm"><h4>ལོག་ཕུལ་ནི།</h4></span>
                    @endif
                  </td>
              </tr>    
              @endforeach
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


