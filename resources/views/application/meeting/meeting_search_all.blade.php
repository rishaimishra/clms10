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
            <h5 class="m-0 text-dark">Search All Minute of Meetings.</h5>
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
<div class="card-body-body"> 
<p style="padding-bottom: -50px;">
<a class="btn btn-success btn-bg" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
<i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;Click Here to Filter Search</a></p>
<div class="collapse" id="collapseExample">
<div class="card card-body">
<form action="{{ route('meeting_search_functionality') }}" method="POST">
{{ csrf_field() }}
<div class="row">
    <div class="col-md-3">
    <div class="form-group">
      <option value="type" disabled selected>MoM Type:</option>
      <select name='type' id='type' type="text" class="form-control">
          <option value=''></option>
          <option value="1">Annual General Meeting</option>
          <option value="2">Board Meeting</option>
          <option value="3">Committee Meeting</option>
      </select>
    </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
      <option value="ro_name" disabled selected>Organization:</option>
      <select class="form-control" id="ro_name" name="ro_name" required>
          <option disabled selected>Select Organization</option>
          <?php 
          $ag=App\tbl_agency::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">{{$ags->agency}}</option>
          <?php endforeach ?>
      </select>
    </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
      <option value="year" disabled selected>Year:</option>
      <input type="text" class="form-control" name="year" id="year">
    </div>
    </div>   
    <div class="col-md-3">
    <div class="form-group"><br>
    <button class='btn btn-warning btn-bg pull-right' type='submit' name='submit' value='view' id="submit"><i class="fas fa-search"></i>&nbsp;Search</button>
    </div>
    </div>
</div>
</form>
</div>
</div>                            
</div>
</div>



<div class="col-md-12">
<div class="card">

<section class="content">
<div class="container-fluid">   
  <div class="content-header">
  <div class="container-fluid">
  @if(sizeof($typesearch)!=0)
  <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th>No</th>
                  <th>Organization</th>
                  <th>MoM Type</th>
                  <th>Meeting Date</th>
                  <th>Venue</th>
                  <th>MOM documents</th>
              </tr>
            </thead>
            <tbody>
            <?php $id=1; ?>
            @foreach($typesearch as $searchs)
            <tr>
                  <td>{{$id++}}</td> 
                  <td><?php echo $na = App\tbl_agency::where('id', $searchs->host)->value('agency'); ?></td>
                  <td><?php 
                      if($searchs->type == '1' )
                      {
                        echo 'Annual General Meeting';
                      }
                      elseif($searchs->type == '2' )
                      {
                        echo 'Board Meeting';
                      }
                      elseif($searchs->type == '3' )
                      {
                        echo 'Committee Meeting';
                      }
                      elseif($searchs->type == '' )
                      {
                        echo 'Commission Meeting';
                      }
                      ?>
                  </td>
                  <td>{{$searchs->date}}</td> 
                  <td>{{$searchs->venue}}</td> 
                  <?php $c = App\tbl_meeting_doc::where('app_id', $searchs->id)->get(); ?>
                  <td>
              @foreach($c as $dd)
                  @if($dd->filecat == 'Agenda')
                  <b>Agenda:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>Preview</a><br>
                  @elseif($dd->filecat == 'MoM')
                  <b>MoM:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
                  @endif
              @endforeach  
                  </td>          
            @endforeach  
            </tbody>
  </table>

@endif


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


