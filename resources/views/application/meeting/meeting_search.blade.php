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
            <h5 class="m-0 text-dark">All Listed Meetings</h5>
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

@if(Auth::user()->role_id == '3')
      <div class="box-header">
      <h5 class="box-title"><b>Previous Meetings</b>:</h5>
      </div>
<div class="card">
  <div class="card-body">
  <form action="{{route('mom_yearly_searching')}}" method='post' id='view'>
  {{csrf_field()}} 
  <div class="form-row">
  <div class='col-md-12'>

  <option value="year" disabled selected>Select Year:</option>
  <select class='col-form-label col-sm-4' name='year' id='year'>
     <?php 
     for($i = 2010 ; $i <= date('Y'); $i++){
     echo "<option>$i</option>";
     }
     ?>
     </select>
  <button class='btn btn-warning btn-sm pull-right' type='submit' name='submit' value='view'>Search</button>
  </div>
  </form>
  </div>

    <a href="{{ route('meeting_add') }}" title="View Details">
    <span class="btn btn-success btn-bg"><i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;&nbsp;Click to Add New Minutes of Meeting</span></a>


</div>
<!--search boxend-->     
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th>No</th>
                  <th>Date</th>
                  <th>Venue</th>
                  <th>Meeting Type</th>
                  <th>Description</th>
                  <th>MOM documents</th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($event_rowise as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->date }}</td>
                  <td>{{ $dc->venue }}</td>
                  <td><?php 
                      if($dc->type == '1' )
                      {
                        echo 'Annual General Meeting';
                      }
                      elseif($dc->type == '2' )
                      {
                        echo 'Board Meeting';
                      }
                      elseif($dc->type == '3' )
                      {
                        echo 'Committee Meeting';
                      }
                      ?>
                  </td>
                  <td>{{ $dc->description }}</td>
              <?php $c = App\tbl_meeting_doc::where('app_id', $dc->id)->get(); ?>
              
              
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
              @endforeach   
                  </td>           
              </tr> 
              
            </tbody>
            </table> 
  </div>
  </div>
@elseif(Auth::user()->role_id == '2')
<div class="card">
  <div class="card-body">
  <form action="{{route('mom_yearly_searching')}}" method='post' id='view'>
  {{csrf_field()}} 
  <div class="form-row">
  <div class='col-md-12'>

  <option value="year" disabled selected>Select Year:</option>
  <select class='col-form-label col-sm-4' name='year' id='year'>
     <?php 
     for($i = 2010 ; $i <= date('Y'); $i++){
     echo "<option>$i</option>";
     }
     ?>
     </select>
  <button class='btn btn-warning btn-sm pull-right' type='submit' name='submit' value='view'>Search</button>
  </div>
  </form>
  </div>
  <a href="{{ route('meeting_commission') }}" title="View Details">
  <span class="btn btn-success btn-bg"><i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;&nbsp;Click to Add New Minutes of Meeting</span></a>
  </div>

  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th>No</th>
                  <th>Meeting Number</th>
                  <th>Date</th>
                  <th>Venue</th>
                  <th>Remarks</th>
                  <th>MOM documents</th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($event_rowise as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->meeting_no }}</td>
                  <td>{{ $dc->date }}</td>
                  <td>{{ $dc->venue }}</td>
                  <td>{{ $dc->description }}</td>
              <?php $c = App\tbl_meeting_doc::where('app_id', $dc->id)->get(); ?>
              
              
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
              @endforeach  
                  </td>           
              </tr>              
            </tbody>
            </table> 
  </div>
  </div>
@endif

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


