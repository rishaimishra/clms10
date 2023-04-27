  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
@include('admin.includes.header')
@include('admin.includes.sidebar')
<div class="content-wrapper">
@include('flash-message')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0 text-dark"><h3>གོ་གནས།</h3></h4><h3>གོ་གནས་ བཙུགས་ནི།</h3>        
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Administrator</a></li>
                <li class="breadcrumb-item active">Add Designations</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
<!-- /.content-header -->
<div class="card direct-chat direct-chat-primary">
<div class="card-header">
 <a class='btn btn-warning  btn-sm pull-right' data-toggle='modal' data-target="#addCountryModal"><h3>གོ་གནས་གསརཔ་བཙུགས་ནི་ དོན་ལུ་ཨེབ་ནང༌།</h3></a> 

           <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                   <th><h3>གོ་རིམ་ཨང༌།</h3></th>
                   <th><h3>གོ་གནས།</h3></th>
                   <th><h3>དང་ལེན་འབད་ནི།</h3></th>
                </tr>   
               </thead>
               <tbody>
                <?php $id=1?>
                @foreach($designation as $occupations)
                
                <tr>
                  <td>{{$id++}}</td>
                  <td><h4>{{$occupations->designation_dzo}}</h4></td>               
                  <td width='200px'>
                  <form id='remove' class="form-group" action="{{route('designation_master.destroy_dzo',$occupations->id)}}" method='post'>
                  <input type="hidden" name="_method" value="delete">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <a class="btn btn-primary btn-xs" data-toggle='modal' data-target='#editModal' onclick='fun_edit({{$occupations->id}})'><h5> བསྒྱུར་བཅོས་འབད་ནི།</h5></a>
                  <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete this data??');" name='name'><h5>བཏོན་གཏང་ནི།</h5>
                  </button>
                  </form>
                  </td>
                </tr>

                @endforeach
             </tbody>
             </table>
             </div>
             <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('designation_dzo/view')}}">



</div>
</div> 

      
<!-- Add country modal begins-->
<div class="modal fade" id="addCountryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" ><h3>གོ་གནས་གསརཔ་བཙུགས་ནི</h3></h4>
      </div>
      <div class="modal-body">
        <form action="{{route('designation_master.store_dzo')}}" method="post">
                <div class='form-group'>
                    {{csrf_field()}}
                </div>
                <div class='form-group clearfix'>
                    <label for='designation' class='col-xs-3'><h3>གོ་གནས</h3></label>
                        <div class='col-xs-9 input-group'>
                            <input type="text" name="designation" class="form-control" placeholder="Enter designation type here" required>
                        </div>
                </div>
                        
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-xs"><h4>བསྲུང་བཞག་ནི།</h4></button>
                <button type="button" class="btn btn-warning btn-xs" data-dismiss="modal"><h4>ཆ་མེད་གཏང་</h4></button>
            </div>
            </form>
      </div>
    </div>
  </div>
</div>
<!-- Ends addCountry modal-->
<!-- starts editCOuntry modal -->
<div class="modal fade" id="editModal" role="dialog">
<div class="modal-dialog">
<div class="modal-content">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><h3>བསྒྱུར་བཅོས་འབད་ནི།</h3></h4>
          </div>
          <div class="modal-body">
          <form action="{{route('update_designation_dzo')}}" method="post">
              {{ csrf_field() }}
                <div class='form-group'>
                <label for='designation' class='col-xs-3'><h3>གོ་གནས</h3></label>
                <div class='col-xs-9 input-group'>
                <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter designation type here" required>
                </div>
                </div>

          <input type="hidden" id="edit_id" name="edit_id">
          
          <div class="modal-footer">
          <button type="submit" class="btn btn-primary btn-xs"><h4> བསྒྱུར་བཅོས་ བསྲུང་བཞག་ནི།</h4></button>
          <button type="button" class="btn btn-warning btn-xs" data-dismiss="modal"><h4>ཆ་མེད་གཏང་</h4></button>
          </div>
          </form>
          </div> 
</div>
</div>
</div> 

</div>
@include('application.includes.footer')
</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#user_table').DataTable(
           {
           "reponsive":true,
           "language": {
           "search": "Search User:"
          }
            }
          );        
    });
</script>
<script>
  $(function () {
    $("#example1").DataTable();
    ({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


   function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_id").val(result.id);
          $("#designation").val(result.designation_dzo);

        }
      });
    }
</script>
<script src="{{asset("/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/plugins/datatables/dataTables.bootstrap.css")}}">


