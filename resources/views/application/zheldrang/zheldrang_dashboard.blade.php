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
            <h5 class="m-0 text-dark">Enumeration/Zheldrangs list</h5>
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


@if(Auth::user()->role_id == '2')
<!--search box-->
<div class="card">
  <div class="card-body">
  <form action="{{route('zheldrang_searching')}}" method='post' id='view'>
  {{csrf_field()}} 
  <div class="form-row">
  <div class='col-md-12'>
  <p class="col-sm-2 col-form-label">Religious Organization:</p>
  <select class='col-form-label col-sm-4' name='ro' id='ro'>
  <option value="ro_event_searching" disabled selected>Select Religious organization</option>
  <?php 
  $ros=App\tbl_ro_detail::all();
  foreach($ros as $ro):
  ?>
  <option value="{{$ro->name}}">{{$ro->name}}</option>
  <?php endforeach ?>
  </select>
  <button class='btn btn-warning btn-sm pull-right' type='submit' name='submit' value='view'>Search</button>
  </div>
  </form>
  </div>
</div>
<!--search boxend-->
<a href="{{ route('zheldrang_add') }}" title="View Details">
   <span class="btn btn-success btn-bg"><i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;&nbsp;Click to Add New</span></a>

  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th>No</th>
                  <th>CID</th>
                  <th>Name</th>
                  <th>Dzongkhag</th>
                  <th>Occupation</th>
                  <th>Contact</th>
<th>Subsidary/Branch/Chhoetshog</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($zheldrang as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->cid }}</td>
                  <td>{{ $dc->name }}</td>
                  <td><?php echo $dzo = App\dzongkhag::where('dzongkhag_id', $dc->dzongkhag)->value('dzongkhag_name');?></td>
                  <td><?php echo $dzo = App\tbl_designation::where('id', $dc->designation)->value('designation');?></td>
                  <td>{{ $dc->contact }}</td>
              <td>{{ $dc->tshetshok }}</td>


                  <td>
                    <a href="{{ route('destroy_zheldrang', $dc->id) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
                    <span class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Remove</span></a>
                  </td>           
              </tr> 
              @endforeach
              
            </tbody>
            </table> 
  </div>
  </div>
@elseif(Auth::user()->role_id == '3')



   <a href="{{ route('zheldrang_add') }}" title="View Details">
   <span class="btn btn-success btn-bg"><i class="fa fa-fw fa-hand-pointer"></i>&nbsp;&nbsp;&nbsp;Click to Add New</span></a>

<div id='printarea'>

  <div class="content-header">
  <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th>No</th>
                  <th>CID</th>
                  <th>Name</th>
                  <th>Dzongkhag</th>
                  <th>Designation</th>
                  <th>Contact</th>
                  <th>Subsidary/Branch/Chhoetshog</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($zheldrang as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->cid }}</td>
                  <td>{{ $dc->name }}</td>
                  <td><?php echo $dzo = App\dzongkhag::where('dzongkhag_id', $dc->dzongkhag)->value('dzongkhag_name');?></td>
                  <td><?php echo $dzo = App\tbl_designation::where('id', $dc->designation)->value('designation');?></td>
                  <td>{{ $dc->contact }}</td>
                  <td>{{ $dc->tshetshok }}</td>

                  <td>
<a class="btn btn-warning btn-sm" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$dc->id}})'>Edit</a>
                    <a href="{{ route('destroy_zheldrang', $dc->id) }}" onclick="return confirm('Are you sure, you want to Delete ?')">
                    <span class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Remove</span></a>
                  </td>           
              </tr> 
              @endforeach
              
            </tbody>
            </table> 
  </div>
  </div>

<input type='button' id='btn' value='Print' onclick='printFunc();' style="background-color: red;">
</div>
<script type="text/javascript">
  function printFunc() {
    var divToPrint = document.getElementById('printarea');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
        'padding;0.5em;' +
        '}' +
        '</style>';
    htmlToPrint += divToPrint.outerHTML;
    newWin = window.open("");
    newWin.document.write("<h3 align='center'>Zheldrang List</h3>");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
    }
</script>

@endif

    </div>
    </section>  
</div>
</div>
</div>
</div>
</div>
</div>

<input type="hidden" name="hidden_view" id="hidden_view" value="{{url('zheldrang/view')}}">
<!-- edit achieve model-->
<div class="modal fade" id="editModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
          <div class="modal-header">
          <h6 class="modal-title">Edit Zheldrang</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form action="{{ route('update_zheldrang') }}" method="post">
              {{ csrf_field() }}

    
                <div class='form-group'>
                <label for='performance' class='col-xs-3'>Contact Number:</label>
                <div class='col-xs-9 input-group'>
                <input type="text" name="econtact" id="econtact" class="form-control" required>
                </div>
                </div>
                <div class='form-group'>
                <label for='fin_stars' class='col-xs-3'>Designation:</label>
                <div class='col-xs-9 input-group'>
                 <select name='edesignation' id='edesignation' class="form-control" required>
     <option disabled selected>Select Designation</option>
     <?php 
     $des=App\tbl_designation::all();
     foreach($des as $dess):
     ?>
     <option value="{{$dess->id}}">{{$dess->designation}}</option>
     <?php endforeach ?>
     </select>
                </div>
                </div>
          <input type="hidden" id="edit_id" name="edit_id">          
          <div class="modal-footer">
          <button type="submit" class="btn btn-warning btn-sm">Update</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
          </div>
          </form>
          </div> 
</div>
</div>
</div> 
<!-- edit achieve model ends-->
<script src="jquery.js"></script>  
<script src="jquery_tables.js"></script>  
<link href="{{ asset('css/app_tables.css') }}" rel="stylesheet">
<script>
  function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          $("#edit_id").val(result.id);
          $("#econtact").val(result.contact);
          $("#edesignation").val(result.designation);
          
        }
      });
    }
   $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

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


