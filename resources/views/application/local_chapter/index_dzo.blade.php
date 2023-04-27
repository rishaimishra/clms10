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
@if(Auth::user()->role_id == '3')
    <a href="{{ route('chapter_add_dzo') }}" title="View Details">
    <span class="btn btn-success btn-bg"><i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;&nbsp;<h4>ཐོ་བཀོད་ནི་དོན་ལུ་ཨེབ།</h4></span></a>

  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཡན་ལག་ཆོས་སྡེ</h3></th>
                  <th><h3>དབྱེ་ཁག།</h3></th>
                  <th><h3>རྫོང་ཁག།</h3></th>
                  <th><h3>རྒེད་འོག།</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
               @foreach($chapter as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->chapter_name }}</td>
                  <td><?php if($dc->branchtype == '1')
                  {echo 'Drubdey';}
                  elseif($dc->branchtype == '2')
                  {echo 'Shedra';}
                  elseif($dc->branchtype == '3')
                  {echo 'Lobdra';}
                  elseif($dc->branchtype == '4')
                  {echo 'Gomdey';}
                  elseif($dc->branchtype == '5')
                  {echo 'Gyendra';}
                  elseif($dc->branchtype == '6')
                  {echo 'Others';}?></td>
                  <td><?php echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', $dc->dzongkhag)->value('dzongkhag_name');?></td>
                  <td><?php echo $dzo = App\gewog_dzo::where('gewog_id', $dc->gewog)->value('gewog_name');?></td>
                  <td>
                    <a href="{{ route('view_chapters_dzo', $dc->chapter_id) }}" title="View Details">
                    <span class="btn btn-warning btn-sm"><h4>ཁ་གསལ།</h4></span></a>
                    @if($dc->approve != '1')
                    <a href="{{ route('edit_chapters_dzo', $dc->chapter_id) }}" title="View Details">
                    <span class="btn btn-primary btn-sm"><h4>ཞུན་དག་རྐྱབ།</h4></span></a> 
                    @else
                    གནང་བ་འགྲོལ། 
                    @endif
                  </td>
              </tr> 
              @endforeach              
            </tbody>
            </table> 
  </div>
  </div>
@elseif(Auth::user()->role_id == '2')

  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཡན་ལག་ཆོས་སྡེ</h3></th>
                  <th><h3>དབྱེ་ཁག།</h3></th>
                  <th><h3>རྫོང་ཁག།</h3></th>
                  <th><h3>རྒེད་འོག།</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
               @foreach($chapterall as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->chapter_name }}</td>
                  <td><?php if($dc->branchtype == '1')
                  {echo 'Drubdey';}
                  elseif($dc->branchtype == '2')
                  {echo 'Shedra';}
                  elseif($dc->branchtype == '3')
                  {echo 'Lobdra';}
                  elseif($dc->branchtype == '4')
                  {echo 'Gomdey';}
                  elseif($dc->branchtype == '5')
                  {echo 'Gyendra';}
                  elseif($dc->branchtype == '6')
                  {echo 'Others';}?></td>
                  <td><?php echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', $dc->dzongkhag)->value('dzongkhag_name');?></td>
                  <td><?php echo $dzo = App\gewog_dzo::where('gewog_id', $dc->gewog)->value('gewog_name');?></td>
                  <td>
                    <a href="{{ route('view_chapters_dzo', $dc->chapter_id) }}" title="View Details">
                    <span class="btn btn-warning btn-sm"><h4>ཁ་གསལ།</h4></span></a>
                    @if($dc->approve != '1')
                    <a href="{{ route('view_chapters_dzo', $dc->chapter_id) }}" title="View Details">
                    <span class="btn btn-warning btn-sm"><h4>དབྱེ་ཞིབ།</h4></span></a>
                    @else
                     གནང་བ་འགྲོལ། 
                    @endif
                  </td>
              </tr> 
              @endforeach              
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