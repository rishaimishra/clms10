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
        <a class="btn btn-info" href="" data-filter="1">Subsidiary Details </a>
        <a class="btn btn-info" href="" data-filter="2">Chairman Details</a>
        <a class="btn btn-info active" href="" data-filter="4">Secretary Details</a>
        <a class="btn btn-info" href="" data-filter="6">Treasurer Details</a>
      </div>
      </div>

          <div class="row">
                <div class="col-md-4">
                <div class="card-body">
                  
                  <form action="{{ route('chapter_secretary_details_cid',$dets) }}" method="POST" enctype="multipart/form-data">
                   {{ csrf_field() }}
                   <div class="input-group input-group-sm mb-0">
                          <label for="cid">CID</label>&nbsp;&nbsp;&nbsp;&nbsp;
                          <input class="form-control form-control-sm" name='cidno' placeholder="Enter CID number" required/>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">SEARCH</button>
                          </div>
                        </div>
                   </form>
  <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('chapter_secretary_details_store') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="hidden" name="det" value="{{$dets}}">
  <input type="hidden" name="detties" value="{{Auth::user()->organization}}">
  {{ csrf_field() }}  

 


                  <div class="form-group input-group-sm">
                    <label for="name">Name:</label><font color="red">*</font>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="required">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag">Dzongkhag:</label><font color="red">*</font>
                                       
                    <select name='type1' id='type1' class="form-control" required>
                    <option disabled selected>Select Dzongkhag/Thromde</option>
                    <?php 
                    $dzongkhag=App\dzongkhag::all();
                    foreach($dzongkhag as $dzongkhags):
                    ?>
                    <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
                    <?php endforeach ?>
                    </select>
                  
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dungkhag">Dungkhag:</label>
                    <input type="text" class="form-control" name="dungkhag" placeholder="Enter dungkhag">
                  </div> 
                  <div class="form-group input-group-sm">
                     <label for="gewog">Gewog:</label><font color="red">*</font>
                     <select name='gewog' id='gewog' class="form-control" required/>
                     <option>Select Dzongkhag First</option>
                     </select>
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="village">Village:</label><font color="red">*</font>
                     <select name='village' id='village' class="form-control " required/>
                     <option>Select Gewog First</option>
                     </select>
                  </div>            
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="houseno">House Number:</label>
                    <input type="text" class="form-control" name="houseno" placeholder="Enter House Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="thramno">Thram Number:</label>
                    <input type="text" class="form-control" name="thramno" placeholder="Enter Thram Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dob">Date Of Birth:</label>
                    <input type="date" class="form-control" name="dob" placeholder="Enter DOB Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="qualification">Qualification:</label>
                    <input type="text" class="form-control" name="qualification" placeholder="Enter Qualification">
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="phoneno">Phone Number:</label>
                    <input type="text" class="form-control" name="phoneno" placeholder="Enter Phone Number">
                  </div>      
                </div>
                </div>
                <div class="col-md-4">
                 <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Email ID">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="date">Date Of Election/Appointment:</label><font color="red">*</font>
                    <input type="date" class="form-control" name="appdate" placeholder="Enter Date Of Election/Appointment" required="required">
                  </div>  
                  <div class="form-group input-group-sm">
                    <label for="photo">Upload Passport Photo:</label><font color="red">*</font>
                    <input type="file" name="photo" class="form-control" id='photo' required="required">
                  </div> 
<div class="form-group input-group-sm">
<label for="chairman">Upload Secretary Details Document:</label><font color="red">*</font>
<input type="file" id="exampleInputFile2"  class="form-control" name="sd[]" multiple="" required="required"/>
</div>
                         
                </div>
                </div>
<input type="hidden" name="hidden_view"  id='hidden_view'  value="{{route('view_addressss')}}"> 
<input type="hidden" name="hidden_view1" id='hidden_view1' value="{{route('view1_addressss')}}"> 
<input type="hidden" name="hidden_view2" id='hidden_view2' value="{{route('view2_addressss')}}">
            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm">Save</button>
              <button type="submit" class="btn btn-danger btn-sm">Cancel</button>
              </div>                   
            </form>

     




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
<!-- jQuery -->
<script src={{asset("/bower_components/admin-lte/plugins/jquery/jquery.min.js")}}"></script>
<!-- Bootstrap -->
<script src={{asset("/bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- jQuery UI -->
<script src={{asset("/bower_components/admin-lte/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<!-- Ekko Lightbox -->
<script src={{asset("/bower_components/admin-lte/plugins/ekko-lightbox/ekko-lightbox.min.js")}}"></script>
<!-- AdminLTE App -->
<script src={{asset("/bower_components/admin-lte/dist/js/adminlte.min.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src={{asset("/bower_components/admin-lte/dist/js/demo.js")}}"></script>
<!-- Filterizr-->
<script src={{asset("/bower_components/admin-lte/plugins/filterizr/jquery.filterizr.min.js")}}"></script>
<!-- Page specific script -->
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
