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
        <a class="btn btn-info" href="" data-filter="1"><h3>ཡན་ལག་ཆོས་སྡེ།</h3></a>
        <a class="btn btn-info" href="" data-filter="2"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></a>
        <a class="btn btn-info active" href="" data-filter="4"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ།</h3></a>
        <a class="btn btn-info" href="" data-filter="6"><h3>རྩིས་འཛིན་གྱི་ཁ་གསལ།</h3></a>
      </div>
      </div>

  
            <div class="row">
              <div class="col-md-12">
                <div class="col-md-6">
                  <form action="{{ route('chapter_treasurer_details_cid_dzo',$dets) }}" method="POST" enctype="multipart/form-data">
                   {{ csrf_field() }}
                        <div class="input-group input-group-sm mb-0">
                          <h4><label for="cid">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་</label>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                          <input class="form-control form-control-sm" name='cidno' placeholder="Enter CID number" required/>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger"><h4>འཚོལ།</h4></button>
                          </div>
                        </div>
                  </form>
                </div>
              </div>
                <div class="col-md-4">
                <div class="card-body">
                  
  <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('chapter_treasurer_details_store_dzo') }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
  <input type="hidden" name="det" value="{{$dets}}">
  <input type="hidden" name="detties" value="{{Auth::user()->organization}}">
  {{ csrf_field() }}  

 


                  <div class="form-group input-group-sm">
                    <label for="name"><h3>མིང་<font color="red">*</font></h3></label>
                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="required" >
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag"><h3>རྫོང་ཁག།<font color="red">*</font></h3></label>
                                       
                    <select name='type1' id='type1' class="form-control" required>
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
                    <label for="dungkhag"><h3>དྲུང་ཁག</h3></label>
                    <input type="text" class="form-control" name="dungkhag" placeholder="Enter dungkhag">
                  </div> 
                  <div class="form-group input-group-sm">
                     <label for="gewog"><h3>རྒེད་འོག།</h3></label>
                     <select name='gewog' id='gewog' class="form-control" required/>
                     <option><h3>དང་པ་ རྫོང་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
                     </select>
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="village"><h3>གཡུས</h3></label>
                     <select name='village' id='village' class="form-control " required/>
                     <option><h3>དང་པ་ རྒེད་འོག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
                     </select>
                  </div>            
                </div>

                </div>
                <div class="col-md-4">
                <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="houseno"><h3>གུང་ཨང་</h3></label>
                    <input type="text" class="form-control" name="houseno" placeholder="Enter House Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="thramno"><h3>ཁྲམ་ཨང་</h3></label>
                    <input type="text" class="form-control" name="thramno" placeholder="Enter Thram Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="dob"><h3>སྐྱེས་ཚེས</h3></label>
                    <input type="date" class="form-control" name="dob" placeholder="Enter DOB Number">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="qualification"><h3>ཤེས་ཚད</h3></label>
                    <input type="text" class="form-control" name="qualification" placeholder="Enter Qualification">
                  </div> 
                  <div class="form-group input-group-sm">
                    <label for="phoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
                    <input type="text" class="form-control" name="phoneno" placeholder="Enter Phone Number">
                  </div>      
                </div>
                </div>
                <div class="col-md-4">
                 <div class="card-body">
                  <div class="form-group input-group-sm">
                    <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
                    <input type="email" class="form-control" name="email" placeholder="Email ID">
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="responsibility"><h3>འགན་ཁག/འགན་ཁུར།</h3></label>
                    <textarea class="form-control" name="responsibility" placeholder="Enter Responsibilities" rows="4"></textarea>
                  </div>
                  <div class="form-group input-group-sm">
                    <label for="date"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས་</h3></label>
                    <input type="date" class="form-control" name="appdate" placeholder="Enter Date Of Election/Appointment">
                  </div>  
                  <div class="form-group input-group-sm">
                    <label for="photo"><h3>ངོ་པར།</h3></label>
                    <input type="file" name="photo" class="form-control" id='photo'>
                  </div>
                  <div class="form-group input-group-sm">
<label for="chairman"><h3>རྩིས་འཛིན་ཡིག་ཆ།<font color="red">*</font></h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="td[]" multiple="" required="required"/>
</div> 
                         
                </div>
                </div>
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">
            </div>
              <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-sm"><h4>བསྲུང་།</h4></button>
              <button type="submit" class="btn btn-danger btn-sm"><h4>ཆ་མེད</h4></button>
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
@include('application.includes.footer_dzo')
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

