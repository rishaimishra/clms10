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
            <h5 class="m-0 text-dark"><h3>ཡན་ལག་ཆོས་སྡེ།</h3></h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><h5>གདོང་ཤོག</h5></a></li>
              <li class="breadcrumb-item active"><h5>ཆོས་སྡེ་ལྷན་ཚོགས།</h5></li>
            </ol>
          </div>  
<div class="col-md-12">
<div class="card">
<br>

    <section class="content">
    <div class="container-fluid">

      <div>
      <div class="btn-group w-100 mb-2">
        <a class="btn btn-info active" href="{{route('chapter_add_dzo')}}" data-filter="1"><h3>ཡན་ལག་ཆོས་སྡེ།</h3> </a>
        <a class="btn btn-info" href="" data-filter="2" onclick="return confirm('Please Fill details to continue to next form.')"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></a>
        <a class="btn btn-info" href="" data-filter="4" onclick="return confirm('Please Fill details to continue to next form.')"><h3>དྲུང་ཆེན་གྱི ་ཁ་གསལ། </h3></a>
        <a class="btn btn-info" href="" data-filter="6" onclick="return confirm('Please Fill details to continue to next form.')"><h3>རྩིས་འཛིན་གྱི་ཁ་གསལ།</h3></a>
      </div>
      </div>
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('chapter_details_store_dzo') }}">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="row">
<div class="col-md-4">
<div class="card-body">
    <div class="form-group input-group-sm">
    <label for="chapter_name"><h3>ཡན་ལག་ཆོས་སྡེ་མིང་<font color="red">*</font></h3></label>
    <input type="text" class="form-control" id="chapter_name" name='chapter_name' placeholder="Enter Chapter Name"  required/>
    </div>
    <div class="form-group input-group-sm">
      <label for="branchtype"><h3>དབྱེ་ཁག།<font color="red">*</font></h3></label>
      <select class="form-control" name="branchtype" id="branchtype" required="required"/>
      <option value=""></option>
      <option value="1">Drubdey</option>
      <option value="2">Shedra</option>
      <option value="3">Lobdra</option>
      <option value="4">Gomdey</option>
      <option value="5">Gyendra</option>
      <option value="6">Others</option>
     </select>
    </div>
    <h3>ཡིག་ཚང་གི་ཁ་བྱང་།</h3>
    <div class="form-group input-group-sm">
    <label for="dzongkhag"><h3>རྫོང་ཁག།<font color="red">*</font></h3></label>
    <select class='form-control' name='type' id="type" required>
    <option disabled selected><h3>གདམ་ཁ་རྐྱབ་ནི།</h3></option>
      <?php 
      $dzongkhag=App\dzongkhag_dzo::all();
      foreach($dzongkhag as $dzongkhags):
      ?>
    <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
    <?php endforeach ?>
    </select>
    </div>
    <div class="form-group input-group-sm">
    <label for="gewog"><h3>རྒེད་འོག།</h3></label>
    <select name='gewog' id='gewog' class="form-control" required/>
    <option><h3>དང་པ་ རྫོང་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
    </select>
    </div>
    <div class="form-group input-group-sm">
      <label for="village"><h3>གཡུས</h3></label>
      <select name='village' id='village' class="form-control" required/>
      <option><h3>དང་པ་ རྒེད་འོག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
      </select>
    </div>
    </div>
    </div>

    <div class="col-md-4">
    <div class="card-body">
      <div class="form-group input-group-sm">
      <label for="location"><h3>ས་གནས</h3></label>
      <textarea class="form-control" id="location" name="location" placeholder="Enter Location" rows="4"></textarea>
      </div>
      <div class="form-group input-group-sm">
      <label for="postbox"><h3>འགྲེམ་སྒྲོམ་ཨང་</h3></label>
      <input type="text" class="form-control" id="postbox" name="postbox" placeholder="Enter Postbox Number">
      </div>
      <div class="form-group input-group-sm">
      <label for="phone"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
      </div>  
      <div class="form-group input-group-sm">
      <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email ID"  required/>
      </div>       
    </div>
    </div>

    <div class="col-md-4">
    <div class="card-body">
      
      <div class="form-group input-group-sm">
      <label for="objective"><h3>དམིགས་དོན།</h3></label>
      <textarea class="form-control" id="objective" name="objective" placeholder="Enter objective" rows="4"></textarea>
      </div> 
       <p><h3>ཡིག་ཆ། ཡིག་རིགས།</h3></p>
      <div class="form-group input-group-sm">
      <label for="application"><h4>ཞུ་ཚིག<font color="red">*</font></h4></label>
      <input type="file" id="exampleInputFile1"  class="form-control" name="app[]" multiple="" required="required">
      </div>
      <div class="form-group input-group-sm">
      <label for="assurance"><h4>ཡིག་ཆ།<font color="red">*</font></h4></label>
      <input type="file" id="exampleInputFile8"  class="form-control" name="aoa[]" multiple="" required="required">
      </div>
      <div class="form-group input-group-sm">
      <label for="assurance"><h4>ཁས་ལེན།/བློ་གཏད།<font color="red">*</font></h4></label>
      <input type="file" id="exampleInputFile7"  class="form-control" name="ass[]" multiple="" required="required">
      </div>

    </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-sm"><h4>བསྲུང་།</h4></button>
      <button type="submit" class="btn btn-danger btn-sm"><h4>ཆ་མེད།</h4></button>
    </div>      
</form>

<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">

</div>
</div>
</div>


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
<script type="text/javascript">
  $('#type').change(function()
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
  $('#type1').change(function()
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

