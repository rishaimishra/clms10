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
            <h5 class="m-0 text-dark">Subsidiary/Branch Details.</h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Religious Organization</li>
            </ol>
          </div>  
<div class="col-md-12">
<div class="card">
<br>

    <section class="content">
    <div class="container-fluid">

      <div>
      <div class="btn-group w-100 mb-2">
        <a class="btn btn-info active" href="{{route('chapter_add')}}" data-filter="1">Subsidiary Details </a>
        <a class="btn btn-info" href="" data-filter="2" onclick="return confirm('Please Fill details to continue to next form.')">Chairman Details</a>
        <a class="btn btn-info" href="" data-filter="4" onclick="return confirm('Please Fill details to continue to next form.')">Secretary Details</a>
        <a class="btn btn-info" href="" data-filter="6" onclick="return confirm('Please Fill details to continue to next form.')">Treasurer Details</a>
      </div>
      </div>
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('chapter_details_store') }}">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<input type="hidden" name="detties" value="{{Auth::user()->organization}}">
<div class="row">
<div class="col-md-4">
<div class="card-body">
    <div class="form-group input-group-sm">
    <label for="chapter_name">Subsidiary/Branch Name:</label><font color="red">*</font>
    <input type="text" class="form-control" id="chapter_name" name='chapter_name' placeholder="Enter Chapter Name"  required="required" />
    </div>
    <div class="form-group input-group-sm">
      <label for="branchtype">Type of Institute:</label><font color="red">*</font>
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
    <p>Official Address</p>
    <div class="form-group input-group-sm">
    <label for="dzongkhag">Dzongkhag/Thromde:</label><font color="red">*</font>
    <select class='form-control' name='type' id="type" required="required">
    <option disabled selected>Select Dzongkhag</option>
      <?php 
      $dzongkhag=App\dzongkhag::all();
      foreach($dzongkhag as $dzongkhags):
      ?>
    <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
    <?php endforeach ?>
    </select>
    </div>
    <div class="form-group input-group-sm">
      <label for="gewog">Gewog:</label><font color="red">*</font>
      <select name='gewog' id='gewog' class="form-control" required/>
      <option>Select Dzongkhag First</option>
      </select>
    </div>
    <div class="form-group input-group-sm">
      <label for="village">Village:</label><font color="red">*</font>
      <select name='village' id='village' class="form-control" required/>
      <option>Select Gewog First</option>
      </select>
    </div>
    
    </div>
    </div>

    <div class="col-md-4">
    <div class="card-body">
      
      <div class="form-group input-group-sm">
      <label for="location">Office Location:</label>
      <textarea class="form-control" id="location" name="location" placeholder="Enter Location" rows="4"></textarea>
      </div>
      <div class="form-group input-group-sm">
      <label for="postbox">Postbox Number:</label>
      <input type="text" class="form-control" id="postbox" name="postbox" placeholder="Enter Postbox Number">
      </div>
      <div class="form-group input-group-sm">
      <label for="phone">Phone Number:</label>
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone Number">
      </div>
      <div class="form-group input-group-sm">
      <label for="dzongkhag">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Email ID">
      </div> 
              
    </div>
    </div>

    <div class="col-md-4">
    <div class="card-body">
      
      <div class="form-group input-group-sm">
      <label for="objective">Objective:</label>
      <textarea class="form-control" id="objective" name="objective" placeholder="Enter objective" rows="4"></textarea>
      </div>
      <p>Uploads:</p>
      <div class="form-group input-group-sm">
      <label for="application">Upload Application:</label>
      <input type="file" id="exampleInputFile1"  class="form-control" name="app[]" multiple="">
      </div>
      <div class="form-group input-group-sm">
      <label for="assurance">Relevant Documents:</label>
      <input type="file" id="exampleInputFile8"  class="form-control" name="aoa[]" multiple="">
      </div>
      <div class="form-group input-group-sm">
      <label for="assurance">Assurance:</label>
      <input type="file" id="exampleInputFile7"  class="form-control" name="ass[]" multiple="" >
      </div>

                      
    </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary btn-sm">Save</button>
      <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
    </div>      
</form>

<input type="hidden" name="hidden_view"  id='hidden_view'  value="{{route('view_addressss')}}"> 
<input type="hidden" name="hidden_view1" id='hidden_view1' value="{{route('view1_addressss')}}"> 
<input type="hidden" name="hidden_view2" id='hidden_view2' value="{{route('view2_addressss')}}">

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
<script type="text/javascript">
  $('#type').change(function()
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
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>

