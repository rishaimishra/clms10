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
            <h5 class="m-0 text-dark"><h3>མཛད་རིམ་ཐོ་བཀོད་བཀང་ཤོག།</h3></h5>
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

<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
<form class="form-horizontal col-12" role="form" method="POST" enctype="multipart/form-data" action="{{ route('eventinfo_store_dzo') }}">  
{{ csrf_field() }} 
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="event_name"><h3>མཛད་རིམ་མིང༌།</h3></label>
     <input type="text" class="form-control col-sm-6" name="event_name" id="event_name">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="discription"><h3>བཤད་པ།</h3></label>
     <textarea class="form-control col-sm-6" name="discription" id="discription" rows="4"></textarea>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="venue"><h3>ས་གནས།</h3></label>
     <input type="text" class="form-control col-sm-6" name="venue" id="venue">
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="type1"><h3>རྫོང་ཁག།</h3></label>
     <select name='type1' id='type1' class="form-control col-sm-6" required>
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
     <label class="col-sm-3 col-form-label" for="dungkhag"><h3>དྲུང་ཁག།</h3></label>
     <input type="text" class="form-control col-sm-6" name="dungkhag" id='dungkhag'>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="gewog"><h3>རྒེད་འོག།</h3></label>
     <select name='gewog' id='gewog' class="form-control col-sm-6" required/>
     <option><h3>དང་པ་ རྫོང་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="village"><h3>གཡུས།</h3></label>
     <select name='village' id='village' class="form-control col-sm-6" required>
     <option><h3>དང་པ་ རྒེད་འོག་གདམ་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
     </select>
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="startdate"><h3>འགོ་བཙུགསཔ་ཚེས།</h3></label>
    <input type="date" class="form-control col-sm-6" name="startdate" id="startdate" placeholder = "ལོ་བཙུགས་ནི།" >
   </div>
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="enddate"><h3>རྫོགས་ཚེས།</h3></label>
     <input type="date" class="form-control col-sm-6" name="enddate" id="enddate" placeholder = "ལོ་བཙུགས་ནི།" >
   </div>

   <br>
   <h4>ཟུར་དྲག</h4>
   <div class="form-row">
     <label class="col-sm-4 col-form-label"  for="event_details"><h3>ཡིག་ཆ།</h3></label>
     <input type="file" id="exampleInputFile1"  class="form-control col-sm-5" name="event_details[]" multiple="">
   </div>
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">
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

