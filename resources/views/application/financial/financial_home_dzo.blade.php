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
            <h5 class="m-0 text-dark"> <h3>ལོ་བསྟར་དངུལ་གྱི་སྙན་ཞུ།</h3></h5>
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
    <div>
    <div class="btn-group w-100 mb-2">
        <a class="btn btn-warning active" href="" data-filter="2"><h3>ལོ་བསྟར་དངུལ་གྱི་སྙན་ཞུ།</h3></a>
        <a class="btn btn-warning" href="{{route('financial_all_dzo')}}" data-filter="3"><h3>གནང་བ་འགྲོལ་མི་ཚུ་གི་ཐོ།</h3></a>
    </div>
    </div>
    <section class="content">
    <div class="container-fluid">

<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('financialinfo_store_dzo') }}">  
{{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="year"><h3>རྩིས་ལོ།</h3> </label>  
     <select name="year" class="form-control col-sm-5" id="year" required="required" value="">
     <?php 
     for($i = 2010 ; $i <= date('Y'); $i++){
     echo "<option>$i</option>";
     }
     ?>
     </select>
   </div>


   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="opening_balance"><h3>མ་དངུལ་བྱུང་ཐོ་བསྡོམས:<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-5" name="opening_balance" id="opening_balance" required="required">
   </div>

<div class="col-md-12">    
<div class="card-body-body"> 
<h4><p style="padding-bottom: -50px;">
<a class="btn btn-warning btn-xs" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
<i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;ཁ་གསལ་བཀོད་ནི།</a></p></h4>
<div class="collapse" id="collapseExample1">
<div class="card card-body">

   <p style="font-weight: bold;color: orange;"><h3>བསྡུ་ལེན།</h3></p><br>
   <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="membership_fees"><h4>འཐུས་མིའི་འཐུས།</h4></label>
     <input type="text" class="form-control " name="membership_fees" id="membership_fees">
   </div>
 </div>
  <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="donations"><h4>ཞལ་འདེབས།</h4></label>
     <input type="text" class="form-control " name="donations" id="donations">
   </div>
 </div>
   <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="other_collections"><h4>གཞན་ལ་སོགས་པ།</h4></label>
     <input type="text" class="form-control" name="other_collections" id="other_collections">
   </div>
 </div>   

</div>
</div>                            
</div>
</div>

   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="opening_balance"><h3>མ་དངུལ་ཟད་རྩིས་བསྡོམས:<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-5" name="total_expenditure" id="total_expenditure" required="required">
   </div>

<div class="col-md-12">    
<div class="card-body-body"> 
<h4><p style="padding-bottom: -50px;">
<a class="btn btn-warning btn-xs" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
<i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;ཁ་གསལ་བཀོད་ནི།</a></p></h4>
<div class="collapse" id="collapseExample">
<div class="card card-body">

   <p style="font-weight: bold;color: orange;"><h3>ཟད་འགྲོ།</h3></p><br>
   <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="salary"><h4>དངུལ་ཕོགས།</h4></label>
     <input type="text" class="form-control " name="salary" id="salary">
   </div>
 </div>
  <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="rentals"><h4>ཁང་གླ།</h4></label>
     <input type="text" class="form-control " name="rentals" id="rentals">
   </div>
 </div>
   <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="procurements"><h4>མཁོ་སྒྲུབ།</h4></label>
     <input type="text" class="form-control" name="procurements" id="procurements">
   </div>
 </div> 
 <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="travel"><h4>ལམ་འགྲུལ།</h4></label>
     <input type="text" class="form-control" name="travel" id="travel">
   </div>
 </div>
 <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="other_expenses"><h4>གཞན་ལ་སོགས་པ།</h4></label>
     <input type="text" class="form-control" name="other_expenses" id="other_expenses">
   </div>
 </div>  

</div>
</div>                            
</div>
</div>

   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="closing_balance"><h3>མ་དངུལ་ལྷག་ལུས་བསྡོམས:<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-5" name="closing_balance" id="closing_balance" required="required">
   </div>
<br>
<h4>ཟུར་དྲག</h4>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="financial_statement"><h3>དངུལ་འབྲེལ་གྱི་རྩིས་བཤད།<font color="red">*</font></h3></label>
     <input type="file" id="exampleInputFile1"  class="form-control col-sm-5" name="financial_statement[]" multiple="" required/>
  </div>
  <br>

  <div class="form-row">
    <button type="submit" class="btn btn-primary btn-sm"><h4>ཕུལ།</h4></button>
  <button type="submit" class="btn btn-danger btn-sm"><h4>ཆ་མེད།</h4></button>
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


