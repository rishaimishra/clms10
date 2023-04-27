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
            <h5 class="m-0 text-dark">Student Visa Application Submission</h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div>
@if(Auth::user()->role_id == '3')<!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Religious Organization</li>
            </ol>
          </div>
@else
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Commission for Religious Organization</li>
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
        <a class="btn btn-warning active" href="" data-filter="2">New Student Visa Applications</a>
        <a class="btn btn-warning" href="" data-filter="3">Re-submission Applications</a>
    </div>
    </div>
    <section class="content">
    <div class="container-fluid">
@if(Auth::user()->role_id == '3')
<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
  <form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('visa_application_student') }}">
  <input type="hidden" name="ro_id" id="ro_id" value="<?php echo $ro_id = App\tbl_ro_detail::where('name', $agency)->value('ro_id');?>">
  {{ csrf_field() }} 
  <div class="form-group input-group-sm">
  <label for="student_visa">Upload Student Visa Application:</label><font color="red">*</font>
  <input type="file" id="exampleInputFile2"  class="form-control" name="student_visa[]" multiple="" required="required"/>
  </div>
  <div class="form-group input-group-sm">
  <label for="student_permit">Upload Student Permit Copy:</label><font color="red">*</font>
  <input type="file" id="exampleInputFile2"  class="form-control" name="student_permit[]" multiple="" required="required"/>
  </div>
  <br>
  <div class="form-row">
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
  </div>
  </form>         
</div>
</div>
</div>
      <div class="box-header">
      <h5 class="box-title">List of Applied Student Visa Applications.</h5>
      </div>
  <!-- /.box-header -->
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th>No</th>
                  <th>Uploads</th>
                  <th>Action</th>
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
                  <b>Student Visa Application:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>Preview</a><br>
                  @elseif($dd->filecat == 'student_permit')
                  <b>Student Permit Copy:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>Preview</a><br>
                  @endif
                  @endforeach
                  </td>
                  <td>
                    <a href="{{ route('visaapplication_review_std',array($dc->application_no, $dc->id)) }}" title="View Details">
                    <span class="btn btn-success btn-sm">View Details</span></a>
                    @if($dc->approve == '0')
                    <span class="btn btn-info btn-sm">Review Pending</span>
                    @elseif($dc->approve == '1')<span class="btn btn-warning btn-sm">Approved</span>
                    @elseif($dc->approve == '2')<span class="btn btn-danger btn-sm">Rejected</span>
                    <a href="{{ route('visaapplication_resubmit_std',array($dc->application_no, $dc->id)) }}" title="View Details">
                    <span class="btn btn-success btn-sm">Resubmit</span></a>
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
                  <th>No</th>
                  <th>RO Name</th>
                  <th>Uploads</th>
                  <th>Action</th>
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
                  <b>Student Visa Application:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>Preview</a><br>
                  @elseif($dd->filecat == 'student_permit')
                  <b>Student Permit Copy:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>Preview</a><br>
                  @endif
                  @endforeach
                  </td>
                  <td>
                    <a href="{{ route('visaapplication_review_std',array($dc->application_no, $dc->id)) }}" title="Assessment/Review">
                    <span class="btn btn-success btn-sm">Review</span></a>
                    @if($dc->approve == '0')
                    <span class="btn btn-info btn-sm">Review Pending</span>
                    @elseif($dc->approve == '1')<span class="btn btn-warning btn-sm">Approved</span>
                    @elseif($dc->approve == '2')<span class="btn btn-danger btn-sm">Rejected</span>
                    @endif
                    @if($dc->resubmission == '1')<span class="btn btn-danger btn-sm">Resubmission</span>
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


