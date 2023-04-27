  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
  <!--oncahnge-->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
<body class="hold-transition sidebar-mini">
@include('application.includes.header')
@include('application.includes.sidebar_dzo')
<div class="content-wrapper">
@include('flash-message')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark"><h3>ཞལ་གྲངས།</h3></h5>
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
    <section class="content">
    <div class="container-fluid">
                   <form action="{{ route('cid_search_zheldrang_dzo') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="input-group input-group-sm mb-0">
            <h4><label for="cid">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་།</label>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
            <input class=" col-sm-3" name="cidno" placeholder="Enter CID number">
            <div class="input-group-append">
             <button type="submit" class="btn btn-danger"><h4>འཚོལ།</h4></button>
            </div>
            </div>
            </form>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('zheldrang_store_dzo') }}">  
{{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="cid"><h3>ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་།<font color="red">*</font></h3></label>
     <input type="text" class="form-control col-sm-6" id="cid" name="cid" value="" required="required" onfocusout="checkdup()" >

 <script type="text/javascript">
   function checkdup()  
    {   
        var cid = document.getElementById('cid').value;
        var token = "{{ csrf_token() }}";

        $.ajax({
        method :"post",
        url : "{{ route('zheldrang_check') }}",
        data : {_token:token,cid:cid},
        dataType:'json',
        success:function(response){
            var result = response.success;
            if (result == 1) {
                alert("ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་འདི་ ཐོ་བཀོད་འབད་ཚར་ཚརཝ་ཨིན།");
            }   
            else{ 
              alert("ཐོ་བཀོད་ འགོ་དང་པ།");
                 }
       },
       error:function(err){
      },
      
    });
    }
 </script>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="name"><h3>མིང་།</h3></label>
     <input type="text" class="form-control col-sm-6" name="name" id="name">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="type1"><h3>རྫོང་ཁག།</h3></label>
     <select name='type1' id='type1' class="form-control col-sm-6">
     <option disabled selected><h3>གདམ་ཁ་རྐྱབ་ནི།</h3></option>
     <?php 
     $dzongkhag=App\dzongkhag_dzo::all();
     foreach($dzongkhag as $dzongkhags):
     ?>
     <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
     <?php endforeach ?>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="gewog"><h3>རྒེད་འོག།</h3></label>
     <select name='gewog' id='gewog' class="form-control col-sm-6" >
     <option><h3>དང་པ་ རྫོང་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="village"><h3>གཡུས།</h3></label>
     <select name='village' id='village' class="form-control col-sm-6" >
     <option><h3>དང་པ་ རྒེད་འོག་ གདམ་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="thramno"><h3>ཁྲམ་ཨང་།</h3></label>
     <input type="text" class="form-control col-sm-6" name="thramno" id="thramno">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="houseno"><h3>གུང་ཨང་།</h3></label>
     <input type="text" class="form-control col-sm-6" name="houseno" id="houseno">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="contact"><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></label>
     <input type="text" class="form-control col-sm-6" name="contact" id="contact">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="designation"><h3>གོ་གནས།<font color="red">*</font></h3></label>
     <select name='designation' id='designation' class="form-control col-sm-6" required>
     <option disabled selected><h3>གོ་གནས་ གདམ་ཁ་རྐྱབ་ནི།</h3></option>
     <?php 
     $des=App\tbl_designation::all();
     foreach($des as $dess):
     ?>
     <option value="{{$dess->id}}">{{$dess->designation_dzo}}</option>
     <?php endforeach ?>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="religion"><h3>ཆོས་ལུགས།</h3></label>
     <input type="text" class="form-control col-sm-6" name="religion" id="religion">
   </div> 


   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="religion"><h3>ཆོས་ཚོགས་།</h3></label>
     <input type="text" class="form-control col-sm-6" name="tshetshok" id="tshetshok">
   </div>

   
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">
  <br>
  <div class="form-row">
  <button type="submit" class="btn btn-primary btn-sm"><h4>བསྲུང་།</h4></button>
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
<script type="text/javascript">
  $('#type1').change(function()
  {
    var gewog_id=$(this).val();
    var view1_url = $("#hidden_view1_dzo").val();
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
    var view2_url = $("#hidden_view2_dzo").val();
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
    var view_url = $("#hidden_view_dzo").val();
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

