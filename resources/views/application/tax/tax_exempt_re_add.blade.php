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
            <h5 class="m-0 text-dark">Re-Apply for Tax Exemption.</h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Religious Organization</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

<div class="col-md-12">
<div class="card">
    <section class="content">
    <div class="container-fluid">
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="search-form" role="form" enctype="multipart/form-data" method="POST" action="{{ route('update_tax_resubmit',$id) }}"> 
<input type="hidden" name="id" value="{{$id}}"> 
{{ csrf_field() }}  
@foreach($docs as $dd)
@if($dd->filecat == 'application')
Uploaded Application:&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>&nbsp;&nbsp;&nbsp;
    <a href="{{ route('delete_file', $dd->app_id) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
    <span class="btn btn-outline-danger btn-xs"><i class="fa fa-fw fa-trash"></i>Remove File</span></a>
<br>
@elseif($dd->filecat == 'invoice')
Uploaded Invoice:&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>&nbsp;&nbsp;&nbsp;
    <a href="{{ route('delete_file2', $dd->app_id) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
    <span class="btn btn-outline-danger btn-xs"><i class="fa fa-fw fa-trash"></i>Remove File</span></a>
<br>
@endif
@endforeach
<br>
   <div class="form-row">
     <label for="chairman" class="col-sm-3 col-form-label">Upload Application:</label>
     <input type="file" id="exampleInputFile2" class="form-control col-sm-6" name="application[]" multiple="" >
   </div> 
   <div class="form-row">
     <label for="chairman" class="col-sm-3 col-form-label">Upload Invoice:</label>
     <input type="file" id="exampleInputFile2" class="form-control col-sm-6" name="invoice[]" multiple="">
   </div>
</div>
</div>
</div>
<div class="col-sm-3">
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
</div></br>
</form>         
</div>
</section>  

</div>
</div>     
 
</div>
@include('application.includes.footer')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>

