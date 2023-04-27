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
            <h5 class="m-0 text-dark"><h3>ཞལ་འཛོམས་ཁ་གསལ་འཚོལ་ཞིབ། </h3></h5>
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
<div class="card-body-body"> 

<a class="btn btn-success btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
<h3>ཞལ་འཛོམས་འཚོལ་ནིདོན་ལུ་ཨེབ།</h3></a>
</br></br>
<div class="collapse" id="collapseExample">
<div class="card card-body">
<form action="{{ route('meeting_search_functionality_dzo') }}" method="POST">
{{ csrf_field() }}
<div class="row">
    <div class="col-md-3">
    <div class="form-group">
      <h3><option value="type" disabled selected>དབྱེ་བ།</option></h3>
      <select name='type' id='type' type="text" class="form-control">
          <option value=''></option>
          <option value="1"><h3>ལོ་བསྟར་སྤྱིར་བཏང༌ཞལ་འཛོམས།</h3></option>
          <option value="2">Board<h3> བཀོད་ཚོགས་ཞལ་འཛོམས།</h3></option>
          <option value="3"><h3>ཚོགས་ཆུང༌ཞལ་འཛོམས།</h3></option>
      </select>
    </div>
    </div>
    <div class="col-md-3">
    <div class="form-group">
      <h3><option value="ro_name" disabled selected>ལྷན་ཚོགས།</option><h3>
      <select class="form-control" id="ro_name" name="ro_name" required>
          <option disabled selected><h3>ཆོས་ཚོགས་ཀྱི་མཚན་ གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
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
      <h3><option value="year" disabled selected> ལོ་ན་ བཙུགས་ནང༌།</option></h3>
      <input type="text" class="form-control" name="year" id="year">
    </div>
    </div> 




    <div class="col-md-3">
    <div class="form-group"><br>
    <button class='btn btn-warning btn-bg pull-right' type='submit' name='submit' value='view' id="submit"><i class="fas fa-search"></i>&nbsp;<h3>འཚོལ།</h3></button>
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
                  <th><h3>ཨང༌།</h3></th>
                  <th style="width: 3.5cm;"><h3>ཆོས་ཚོགས།</h3></th>
                  <th><h3>དབྱེ་བ།</h3></th>
                  <th><h3>སྤྱི་ཚེས།</h3></th>
                  <th style="width: 2.5cm;"><h3>ས་གནས།</h3></th>
                  <th><h3>ཡིག་ཆ།</h3></th>
              </tr>
            </thead>
            <tbody>
            <?php $id=1; ?>
            @foreach($typesearch as $searchs)
            <tr>
                  <td>{{$id++}}</td> 
                  <td><?php echo $na = App\tbl_agency::where('id', $searchs->host)->value('agency'); ?></td>
                  <td><h4><?php 
                      if($searchs->type == '1' )
                      {
                        echo 'ལོ་བསྟར་སྤྱིར་བཏང༌ཞལ་འཛོམས།';
                      }
                      elseif($searchs->type == '2' )
                      {
                        echo 'བཀོད་ཚོགས་ཞལ་འཛོམས།';
                      }
                      elseif($searchs->type == '3' )
                      {
                        echo 'ཚོགས་ཆུང༌ཞལ་འཛོམས།';
                      }
                      elseif($searchs->type == '' )
                      {
                        echo 'ལྷན་ཚོགས༌ཞལ་འཛོམས།';
                      }
                      ?></h4>
                  </td>
                  <td>{{$searchs->date}}</td> 
                  <td>{{$searchs->venue}}</td> 
                  <?php $c = App\tbl_meeting_doc::where('app_id', $searchs->id)->get(); ?>
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


