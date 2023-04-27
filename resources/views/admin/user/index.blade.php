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
            <h4 class="m-0 text-dark">User Management</h4>Create Users        
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
                    <a class='btn btn-warning  btn-sm pull-right' data-toggle='modal' data-target="#addRoleModel">Add User</a>
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
                    <th>Name</th>
                    <th>Organization</th>
                    <th>e-Mail/Username</th>
                    <th>User Role</th>
                    <th>Dzongkhag</th>
                    <th style='width:15%'>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i = 1; 
                foreach($users as $user):
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $user->name;?></td>
                    <td><?php echo $dzo = App\tbl_agency::where('id', $user->organization)->value('agency');?></td>
                    <td><?php echo $user->email;?></td>
                    <td><?php
                        $role = App\role::find($user->role_id);
                        echo $role->role_name;
                        ?></td>
                    <td><?php echo $dzo = App\dzongkhag::where('dzongkhag_id', $user->dzongkhag_id)->value('dzongkhag_name');?></td>
                    <td>
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#updateUserModal" onclick='fun_edit({{$user->id}})'><span class="glyphicon glyphicon-edit"></span>Edit
                    </button>
                    <a href="{{route('delete_user',['id'=>$user->id])}}" onclick='return confirm("Are you sure?")' class="btn btn-danger btn-xs">Delete</a>
                    </td>
                    </tr>
                    <?php $i++;
                    endforeach;
                    ?>
                </table>
                </div>
                <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('user/view')}}">
      </div>
</div>





      
<!-- Add country modal begins-->
<div class="modal fade" id="addRoleModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Add User</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" role="form" method="POST" action="{{ route('insert_user') }}">
      {{ csrf_field() }}
        <div class="form-group">
        <label for="description" class="col-xs-4 control-label">Name</label>
        <div class="col-xs-6">
        <input id="uname" type="input" class="form-control" name="uname" required>
        </div>
        </div>

        <div class='form-group'>
        <label for='type' class='col-xs-4 control-label'>Organization</label>
        <select class='form-control' id="organization" name="organization" required>
          <option disabled selected>Select Organization</option>
          <?php 
          $ag=App\tbl_agency::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">{{$ags->agency}}</option>
          <?php endforeach ?>
          </select>
        <div class='col-xs-6'>
        </div>
        </div>

        <div class="form-group">
        <label for="description" class="col-xs-4 control-label">Email</label>
        <div class="col-xs-6">
        <input type="email" id="email" class="form-control" name="email" required>
        </div>
        </div>

        <div class='form-group'>
        <label for='type' class='col-xs-4 control-label'>Dzongkhag</label>
        <div class='col-xs-6'>
          <select class='form-control' name='type' required>
          <option disabled selected>Select Dzongkhag</option>
          <?php 
          $dzongkhag=App\dzongkhag::all();
          foreach($dzongkhag as $dzongkhags):
          ?>
          <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
          <?php endforeach ?>
          </select>
        </div>
        </div>

        <div class="form-group">
        <label for="description" class="col-xs-4 control-label">User Role</label>
        <div class="col-xs-6">
          <select  name="role_id" id="role_id"  class="form-control" required>
          <option disabled selected>Select User Role</option>
          <?php
          $roles = App\role::all();
          foreach($roles as $r):
          ?>
          <option value="{{$r->id}}">{{$r->role_name}}</option>
          <?php endforeach;?>
          </select>
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

<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
        <div class="modal-header"><h4 class="modal-title" id="myModalLabel">Update User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" role="form" method="POST" action="{{ route('update_user') }}">
          {{ csrf_field() }}
          <div class="form-group">
          <label for="ename" class="col-xs-4 control-label">Name</label>
          <div class="col-xs-6">
          <input id="ename" type="text" class="form-control" name="uname">
          </div>
          </div>

          <div class='form-group'>
          <label for='type' class='col-xs-4 control-label'>Organization</label>
          <select class='form-control' id="eorganization" name="organization" required>
          <option disabled selected>Select Organization</option>
          <?php 
          $ag=App\tbl_agency::all();
          foreach($ag as $ags):
          ?>
          <option value="{{$ags->id}}">{{$ags->agency}}</option>
          <?php endforeach ?>
          </select>
          <div class='col-xs-6'>
          </div>
          </div>

          <div class="form-group">
          <label for="description" class="col-xs-4 control-label">Email</label>
          <div class="col-xs-6">
          <input type="email" id="eemail" class="form-control" name="email">
          </div>
          </div>
          
          <div class='form-group'>
          <label for='type' class='col-xs-4 control-label'>Dzongkhag</label>
          <div class='col-xs-6'>
            <select class='form-control' name='type' id='type'>
            <option disabled selected>Select Dzongkhag</option>
            <?php 
            $dzongkhag=App\dzongkhag::all();
            foreach($dzongkhag as $dzongkhags):
            ?>
            <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
            <?php endforeach ?>
            </select>
          </div>
          </div>
          
          <div class="form-group">
          <label for="user_role" class="col-xs-4 control-label">User Role</label>
          <div class="col-xs-6">
          <select  name="role_id" id="erole_id" class="col-xs-6 form-control">
          <option disabled selected>Select the User Role</option>
          <?php $roles = App\role::all();
          foreach($roles as $role):?>
          <option value="{{$role->id}}">{{$role->role_name}}</option>
          <?php endforeach;?>
          </select>
          </div>
          </div>

        <input type="hidden" name="edit_id" id='edit_id'>
        </div>

        <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-xs">Update</button>
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
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
          $("#ename").val(result.name);
          $("#eemail").val(result.email);
          $("#eorganization").val(result.organization);
          $("#erole_id").val(result.role_id);
          $("#type").val(result.dzongkhag_id);
        }
      });
    }
</script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>




