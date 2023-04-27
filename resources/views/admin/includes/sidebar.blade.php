  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
     <img class="img-responsive" src="{{URL::asset('/images/rgoblogo.png')}}"style="height:50px;width:50px;">
      <span class="brand-text font-weight-dark">&nbsp;&nbsp;&nbsp;Administrator | CRO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="{{route('admin_dashboard')}}" class="d-block"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

     
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class='fa fa-fw fa-user'></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view_user')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class='fas fa-tag'></i>
              <p>
                Token Generation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('token_generation')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generate Token</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class='fas fa-tag'></i>
              <p>
                Designations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('designation_master.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('designation_master.index_dzo')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">རྫོང་ཁ་ནང་ བཙུགས་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>


       
  
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
