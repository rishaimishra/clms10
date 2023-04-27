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
            <h3 class="m-0 text-dark">ཆོས་སྡེ་ཐོ་ཡིག</h3>
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
              <li class="breadcrumb-item"><a href="#"><h4>གདོང་ཤོག</h4></a></li>
              <li class="breadcrumb-item active"><h4>ཆོས་སྡེ་ལྷན་ཚོགས།</h4></li>
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

            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ཆོས་ཚོགས་ཀྱི་མཚན།</h3></th>
                  <th style="width: 5cm;"><h3>རྫོང་ཁག།</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($ro as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td style="width: 5cm;"><?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $dc->dzongkhag)->value('dzongkhag_name'); ?></td>
                  <td>
                    <a href="{{ route('view_ro_details_all_dzo', $dc->ro_id) }}" title="ཁ་གསལ་ བལྟ་ནི།/Review">
                    <span class="btn btn-success btn-sm"><i class="fa fa-fw fa-paste"></i><h4>ཁ་གསལ།</h4></span>
                    <?php $cc = App\tbl_agency::where('agency', $dc->name)->value('id'); ?>
                    <?php $c = count(App\tbl_patron::where('host', $cc)->get()); ?>
                    @if($c == 0) 
                    @else
                    <?php $patronid = App\tbl_patron::where('host', $cc)->value('id'); ?>
                    <a href="{{ route('patron_register_view_dzo', $patronid) }}" title="Assessment/Review">
                    <span class="btn btn-success btn-sm"><i class="fa fa-fw fa-paste"></i><h4>སྐྱབས་འཛིན།</h4></span>
                    @endif
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>   

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
<script language='JavaScript' type='text/javascript'>
    function validateThisFrom(thisForm) {
        if (thisForm.approved.value == "") {
            alert("Please Provide Assessment Decision");
            thisForm.approved.focus();
            return false;
        }      
    }
</script>
