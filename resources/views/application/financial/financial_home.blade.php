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
            <h5 class="m-0 text-dark">Annual Financial Report Submission</h5>
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
<br>
    <div>
    <div class="btn-group w-100 mb-2">
        <a class="btn btn-warning active" href="" data-filter="2">Annual Financial Report Submission</a>
        <a class="btn btn-warning" href="{{route('financial_all')}}" data-filter="3">Reviewed Annual Financial Report.</a>
    </div>
    </div>
    <section class="content">
    <div class="container-fluid">

<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('financialinfo_store') }}">  
{{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="year">Select Year:<font color="red">*</font></label>   
     <select name="year" class="form-control col-sm-6" id="year" required="required" value="">
     <?php 
     for($i = 2010 ; $i <= date('Y'); $i++){
     echo "<option >$i</option>";
     }
     ?>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="opening_balance">Total Income:<font color="red">*</font></label>
     <input type="text" class="form-control col-sm-6" name="opening_balance" id="opening_balance" required="required">
   </div>

<div class="col-md-12">    
<div class="card-body-body"> 
<p style="padding-bottom: -50px;">
<a class="btn btn-warning btn-xs" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
<i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;Details</a></p>
<div class="collapse" id="collapseExample1">
<div class="card card-body">

   <p style="font-weight: bold;color: orange;">Collections:</p><br>
   <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="membership_fees">Membership Fees:</label>
     <input type="text" class="form-control " name="membership_fees" id="membership_fees">
   </div>
 </div>
  <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="donations">Donations:</label>
     <input type="text" class="form-control " name="donations" id="donations">
   </div>
 </div>
   <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="other_collections">Others:</label>
     <input type="text" class="form-control" name="other_collections" id="other_collections">
   </div>
 </div>   

</div>
</div>                            
</div>
</div>

   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="opening_balance">Total Expenditure:<font color="red">*</font></label>
     <input type="text" class="form-control col-sm-6" name="total_expenditure" id="total_expenditure" required="required">
   </div>

<div class="col-md-12">    
<div class="card-body-body"> 
<p style="padding-bottom: -50px;">
<a class="btn btn-warning btn-xs" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
<i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;Details</a></p>
<div class="collapse" id="collapseExample">
<div class="card card-body">

   <p style="font-weight: bold;color: orange;">Expenses:</p><br>
   <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="salary">Salary & Wages:</label>
     <input type="text" class="form-control " name="salary" id="salary">
   </div>
 </div>
  <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="rentals">Rentals:</label>
     <input type="text" class="form-control " name="rentals" id="rentals">
   </div>
 </div>
   <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="procurements">Procurements:</label>
     <input type="text" class="form-control" name="procurements" id="procurements">
   </div>
 </div> 
 <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="travel">Travel:</label>
     <input type="text" class="form-control" name="travel" id="travel">
   </div>
 </div>
 <div class="col-md-6">
    <div class="form-group">
     <label class="form-label"  for="other_expenses">Others:</label>
     <input type="text" class="form-control" name="other_expenses" id="other_expenses">
   </div>
 </div>  

</div>
</div>                            
</div>
</div>

   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="closing_balance">Total Balance:<font color="red">*</font></label>
     <input type="text" class="form-control col-sm-6" name="closing_balance" id="closing_balance" required="required">
   </div>
<br>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="financial_statement">Financial Statement:<font color="red">*</font></label>
     <input type="file" id="exampleInputFile1"  class="form-control col-sm-6" name="financial_statement[]" multiple="" required/>
  </div>
  <br>

  <div class="form-row">
    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
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
@include('application.includes.footer')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>


