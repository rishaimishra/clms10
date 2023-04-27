  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
<body class="hold-transition sidebar-mini">
@include('application.includes.header')
@include('application.includes.sidebar_dzo')
<div class="content-wrapper">
@include('flash-message') 
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark"><h3>ཞལ་འཛོམས་ཚུ་གིས་ཁ་གསལ།</h3></h5>
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

@if(Auth::user()->role_id == '3')
      <div class="box-header">
      <h5 class="box-title"><b><h3>ཞལ་འཛོམས་འཚོལ་ཞིབ།</h3></b></h5>
      </div>
<div class="card">
  <div class="card-body">
  <form action="{{route('mom_yearly_searching_dzo')}}" method='post' id='view'>
  {{csrf_field()}} 
  <div class="form-row">
  <div class='col-md-12'>

  <h3><option value="year" disabled selected> ལོ་ན་གདམ་ཁ་རྐྱབ༌ནང༌།</option></h3>
  <select class='col-form-label col-sm-4' name='year' id='year'>
     <?php 
     for($i = 2010 ; $i <= date('Y'); $i++){
     echo "<option>$i</option>";
     }
     ?>
     </select>
  <button class='btn btn-warning btn-sm pull-right' type='submit' name='submit' value='view'><h3>འཚོལ།</h3></button>
  </div>
  </form>
  </div>

    <a href="{{ route('meeting_add_dzo') }}" title="View Details">
    <span class="btn btn-success btn-bg"><i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;&nbsp;<h3>ཞལ་འཛོམས་བཙུགས་ནི་དོན་ལུ་ཨེབ།</h3></span></a>


</div>
<!--search boxend-->     
  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>སྤྱི་ཚེས།</h3></th>
                  <th><h3>ས་གནས།</h3></th>
                  <th><h3>དབྱེ་བ།</h3></th>
                  <th><h3>བཤད་པ།</h3></th>
                  <th><h3>ཡིག་ཆ།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($meeting as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->date }}</td>
                  <td>{{ $dc->venue }}</td>
                  <td><h4><?php 
                      if($dc->type == '1' )
                      {
                        echo 'ལོ་བསྟར་སྤྱིར་བཏང༌ཞལ་འཛོམས།';
                      }
                      elseif($dc->type == '2' )
                      {
                        echo 'བཀོད་ཚོགས་ཞལ་འཛོམས།';
                      }
                      elseif($dc->type == '3' )
                      {
                        echo 'ཚོགས་ཆུང༌ཞལ་འཛོམས།';
                      }
                      ?></h4>
                  </td>
                  <td>{{ $dc->description }}</td>
              <?php $c = App\tbl_meeting_doc::where('app_id', $dc->id)->get(); ?>
              
              
                  <td>
              @foreach($c as $dd)
                  @if($dd->filecat == 'Agenda')
                  <b><h3>གྲོས་གཞི།</h3>:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a><br>
                  @elseif($dd->filecat == 'MoM')
                  <b><h3>གྲོས་ཆ།</h3>:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
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
  <form action="{{route('mom_yearly_searching_dzo')}}" method='post' id='view'>
  {{csrf_field()}} 
  <div class="form-row">
  <div class='col-md-12'>

  <h3><option value="year" disabled selected> ལོ་ན་ གདམ་ཁ་རྐྱབ༌ནང༌།</option></h3>
  <select class='col-form-label col-sm-4' name='year' id='year'>
     <?php 
     for($i = 2010 ; $i <= date('Y'); $i++){
     echo "<option>$i</option>";
     }
     ?>
     </select>
  <button class='btn btn-warning btn-sm pull-right' type='submit' name='submit' value='view'><h3>འཚོལ།</h3></button>
  </div>
  </form>
  </div>
  <a href="{{ route('meeting_commission_dzo') }}" title="View Details">
  <span class="btn btn-success btn-bg"><i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;&nbsp;<h3>ཞལ་འཛོམས་བཙུགས་ནི་དོན་ལུ་ཨེབ།</h3></span></a>
  </div>

  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th style="width: 3.5cm;"><h3>ཞལ་འཛོམས་ཨང་།</h3></th>
                  <th style="width: 2cm;"><h3>སྤྱི་ཚེས།</h3></th>
                  <th style="width: 2.5cm;"><h3>ས་གནས།</h3></th>
                  <th><h3>བཤད་པ།</h3></th>
                  <th><h3>ཡིག་ཆ།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($meeting as $dc)
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
                  <b><h3>གྲོས་གཞི།</h3>:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a><br>
                  @elseif($dd->filecat == 'MoM')
                  <b><h3>གྲོས་ཆ།</h3>:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
                  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
                  <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
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


