  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
  <!--oncahnge-->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
<body class="hold-transition sidebar-mini">
@include('application.includes.header')
@include('application.includes.sidebar')
<div class="content-wrapper">
@include('flash-message')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">New Member Information</h5>
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
    <section class="content">
    <div class="container-fluid">
            <form action="{{ route('cid_search') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group input-group-sm mb-0">
            <label class="col-sm-1 col-form-label" for="cid">CID:</label>
            <input class=" col-sm-3" name="cidno" placeholder="Enter CID number">
            <div class="input-group-append">
             <button type="submit" class="btn btn-danger">SEARCH</button>
            </div>
            </div>
            </form>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('newmember_store') }}">  
{{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="cid">CID:<font color="red">*</font></label>
     <input id="cid" type="text" class="form-control col-sm-6" id="cid" name="cid" value="" required="required" onfocusout="checkdup()" >
   </div>
   <script type="text/javascript">
   function checkdup()  
    {   
        var cid = document.getElementById('cid').value;
        var token = "{{ csrf_token() }}";

        $.ajax({
        method :"post",
        url : "{{ route('member_check') }}",
        data : {_token:token,cid:cid},
        dataType:'json',
        success:function(response){
            var result = response.success;
            if (result == 1) {
                alert("The Applicant is Already Registered.");
            }   
            else{ 
              alert("First Registration");
                 }
       },
       error:function(err){
      },
      
    });
    }
 </script>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="name">Name:</label>
     <input type="text" class="form-control col-sm-6" name="name" id="name">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="type1">Dzongkhag:</label>
     <select name='type1' id='type1' class="form-control col-sm-6">
     <option disabled selected>Select Dzongkhag/Thromde</option>
     <?php 
     $dzongkhag=App\dzongkhag::all();
     foreach($dzongkhag as $dzongkhags):
     ?>
     <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
     <?php endforeach ?>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="gewog">Gewog:</label>
     <select name='gewog' id='gewog' class="form-control col-sm-6">
     <option>Select Dzongkhag First</option>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="village">Village:</label>
     <select name='village' id='village' class="form-control col-sm-6">
     <option>Select Gewog First</option>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="thramno">Thram Number:</label>
     <input type="text" class="form-control col-sm-6" name="thramno" id="thramno">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="houseno">House Number:</label>
     <input type="text" class="form-control col-sm-6" name="houseno" id="houseno">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="contact">Contact Number:</label>
     <input type="text" class="form-control col-sm-6" name="contact" id="contact">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="registration_date">Registration Date:</label>
     <input type="date" class="form-control col-sm-6" name="registration_date" id="registration_date">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="membertype">Member Type:</label>
      <select class="form-control col-sm-6" name="membertype" id="membertype" onchange="checkOptions(this)">
      <option value=""></option>
      <option value="1">RO</option>
      <option value="2">Subsidiary/Branch</option>
     </select>
   </div>


   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="branch_name"></label>
     <input type="text" class="form-control col-sm-6" name="branch_name" id="branch_name" style="display: none" placeholder="Enter Branch Name">
   </div>

<input type="hidden" name="hidden_view"  id='hidden_view'  value="{{route('view_addressss')}}"> 
<input type="hidden" name="hidden_view1" id='hidden_view1' value="{{route('view1_addressss')}}"> 
<input type="hidden" name="hidden_view2" id='hidden_view2' value="{{route('view2_addressss')}}">
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
<script type="text/javascript">
  $('#type1').change(function()
  {
    var gewog_id=$(this).val();
    var view1_url = $("#hidden_view1").val();
    $.ajax({
      url: view1_url,
      type:"GET", 
      data: {"id":gewog_id}, 
      success: function(result){
      $('#gewog').empty();
      $("#gewog").prepend("<option disabled selected>Select Gewog</option>");
      $.each(result,function(key,val)
      {
      $('#gewog').append('<option value="'+val.gewog_id+'">'+val.gewog_name+'</option>');
      });
      }
    });
  });
  $('#gewog').change(function()
  {
    var village_id=$(this).val();
    var view2_url = $("#hidden_view2").val();
    $.ajax({
      url: view2_url,
      type:"GET", 
      data: {"id":village_id}, 
      success: function(result){
      $('#village').empty();
      $("#village").prepend("<option disabled selected>Select village</option>");
      $.each(result,function(key,val)
      {
      $('#village').append('<option value="'+val.village_id+'">'+val.village_name+'</option>');
      });
      }
    });
  });
  $('#type').change(function()
  {
    var dzongkhag_id=$(this).val();
    var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":dzongkhag_id}, 
        success: function(result){
          $('#Cdungkhag').empty();
          $("#Cdungkhag").prepend("<option disabled selected>Select Dungkhag</option>");
          $.each(result,function(key,val)
          {
          $('#Cdungkhag').append('<option value="'+val.dungkhag_id+'">'+val.dungkhag_name+'</option>');
          });
        }
      });
  }); 
</script>
<script type="text/javascript">
    var branch_name;
function checkOptions(select) {
  branch_name = document.getElementById('branch_name');
  if (select.options[select.selectedIndex].value == "2") {
    branch_name.style.display = 'block';
    
  }
  else {
    branch_name.style.display = 'none';
  }
}
</script>
