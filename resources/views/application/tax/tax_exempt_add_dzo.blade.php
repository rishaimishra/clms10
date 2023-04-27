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
    <section class="content">
    <div class="container-fluid">
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="search-form" role="form" enctype="multipart/form-data" method="POST" action="{{ route('store_taxexempt_dzo') }}">  
{{ csrf_field() }} 
<h3>ཟུར་དྲག</h3> 
   <div class="form-row">
     <label for="chairman" class="col-sm-3 col-form-label"><h3>ཞུ་ཡིག:<font color="red">*</font></h3></label>
     <input type="file" id="exampleInputFile2" class="form-control col-sm-6" name="application[]" multiple="" required="required"/>
   </div> 
   <div class="form-row">
     <label for="chairman" class="col-sm-3 col-form-label"><h3>ཚོང་ཟོག་ཐོ་ཡིག:<font color="red">*</font></h3></label>
     <input type="file" id="exampleInputFile2" class="form-control col-sm-6" name="invoice[]" multiple="" required="required"/>
   </div>
</div>
</div>
</div>
<div class="col-sm-3">
    <button type="submit" class="btn btn-primary btn-sm"><h3>ཕུལ།</h3></button>
  <button type="submit" class="btn btn-danger btn-sm"><h3>ཆ་མེད།</h3></button>
</div></br>
</form>         
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

