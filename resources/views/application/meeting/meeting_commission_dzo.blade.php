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
            <h5 class="m-0 text-dark"><h3>ཞལ་འཛོམས་གསརཔ་བཙུགས་ནི།</h3></h5>
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
<form class="col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('meeting_store_dzo') }}">  
{{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="meeting_no"><h3>ཞལ་འཛོམས་ཨང་གྲངས།</h3></label>   
     <input type="text" class="form-control col-sm-6" name="meeting_no" id="meeting_no">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="date"><h3>སྤྱི་ཚེས།</h3></label>
     <input type="date" class="form-control col-sm-6" name="date" id="date">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="venue"><h3>ས་གནས།</h3></label>
     <input type="text" class="form-control col-sm-6" name="venue" id="venue">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="description"><h3>བཤད་པ།</h3></label>
     <textarea type="text" id="description" class="form-control col-sm-6" name="description" rows="3"></textarea>
   </div>
  <h4>ཟུར་དྲག།</h4>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="financial_statement"><h3>གྲོས་གཞི།</h3></label>
     <input type="file" id="exampleInputFile1"  class="form-control col-sm-6" name="Agenda[]" multiple="">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="financial_statement"><h3>གྲོས་ཆ།</h3></label>
     <input type="file" id="exampleInputFile1"  class="form-control col-sm-6" name="MoM[]" multiple="">
   </div>
  

  <br>

  <div class="form-row">
    <button type="submit" class="btn btn-primary btn-sm"><h3>ཕུལ།</h3></button>
    <button type="submit" class="btn btn-danger btn-sm"><h3>ཆ་མེད།</h3></button>
  </div>
  </form>         
</div>
</div>
</div>


         
        


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


