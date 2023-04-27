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
            <h4 class="m-0 text-dark">Generate Token Number</h4>        
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Administrator</a></li>
                <li class="breadcrumb-item active">Create Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@if($msg =='1')
<script>
  @if(Session::has('notification'))
    var type = "{{ Session::get('notification.alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('notification.message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('notification.message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('notification.message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('notification.message') }}");
            break;
    }
  @endif
</script>
@endif
    <!-- /.content-header -->
<div class="card direct-chat direct-chat-primary">
<div class="card-header">

                  <div class="panel-heading">
                    <div class="text-muted bootstrap-admin-box-title clearfix">
                    <a class='btn btn-warning  btn-sm pull-right' data-toggle='modal' data-target="#addRoleModel">Generate Token</a>
                    </div>
                  </div>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                    {{ Session::get('success') }}
                    </div>
                    @endif
                    <br>
                <div class="box-body">
                <table class="table table-bordered table-striped table-hover" id="user_table">
                <thead>
                    <tr>
                    <th>Sl.No</th>
                    <th>Token Number</th>
                    <th>e-Mail</th>
                    </tr>
                </thead>
                <tbody>
                <?php $id = 1;?>
                @foreach($token as $dc)
                    <tr>
                    <td>{{$id++}}</td>
                    <td>{{ $dc->token_no }}</td>
                    <td>{{ $dc->email }}</td> 
                @endforeach             
                </table>
                </div>
      </div>
</div>





      
<!-- Add country modal begins-->
<div class="modal fade" id="addRoleModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Generate Token Number</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" method="POST" action="{{ route('generate_token') }}">
      {{ csrf_field() }}

        <div class="form-group">
        <label for="description" class="col-xs-4 control-label">Token Number</label>
        <div class="col-xs-6">
        <input type="input" id="token_no" class="form-control" name="token_no" placeholder="Auto Generated" style="background-color: #efdca5">
        </div>
        </div>

        <div class="form-group">
        <label for="description" class="col-xs-4 control-label">Email</label>
        <div class="col-xs-6">
        <input type="email" id="email" class="form-control" name="email" required>
        </div>
        </div>

      </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-xs">Save</button>
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancel</button>
        </div>
      </form>
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

<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>




