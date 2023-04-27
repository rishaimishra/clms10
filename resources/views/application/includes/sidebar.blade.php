  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
     <img class="img-responsive" src="{{URL::asset('/images/rgoblogo.png')}}"style="height:50px;width:50px;">
      <span class="brand-text font-weight-dark">&nbsp;&nbsp;&nbsp;User</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <?php $role = Auth::user()->role_id;?>
        @if($role == 2)
        <a href="{{route('application.home')}}" class="d-block"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a>
        @elseif($role == 3)
        <a href="{{route('application.home_ro')}}" class="d-block"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;&nbsp;Home</a>
        @else
        @endif
         
        
        </div>
      </div>
      <!-- Sidebar Menu -->
      <?php $role = Auth::user()->role_id;?>
      @if($role == 2)
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

     
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <p>
          RO information
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view_registered_ro_all')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p>Registered RO's</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('infoupdate_home')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p>RO Information Updates</p>
                </a>
              </li>
             
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          New RO Information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('newinfo_cro_home')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p>Review New Information</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Visa Application
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visa_application')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Visa Applications</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visa_application_std')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Student Visa Applications</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Annual Financial Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('financial_all')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Review</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Event Information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('eventinfo_view')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Event List</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Religious Site Information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('siteinfo_view')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Religious Site List</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Suggestion/Feedback
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('compliant_view')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Review Suggestion/Feedback</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Disciplinary Actions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('discipline')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('suspension')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Suspension</p>
                </a>
              </li>
              
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Member Registration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('member_register')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>New Member</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          De-Registration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('deregister_view')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Review</p>
                </a>
              </li>

            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Minutes of Meeting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('meeting')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('meeting')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Chairperson/Anim MoM</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('meeting_search')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Search MoM</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Donations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('donation')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Review</p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Zheldrang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('zheldrang')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('zheldrang')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Search</p>
                </a>
              </li>
              
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Tax Exemption
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tax_exempt')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Review</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Subsidiary/Branch
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('local_chapter')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Review</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Report Generation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('report')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Search</p>
                </a>
              </li>
              
            </ul>
          </li>
          
      
  
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
       @elseif($role == 3)
            <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

     
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                RO information
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view_registered_ro')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p>RO Details</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('infoupdate_home_ro')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p>Updated RO Information</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('patron_register')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p>Add Patron</p>
                </a>
              </li>
             
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                New RO Information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                
                <?php $org = Auth::user()->organization;?>
                <?php $ag = App\tbl_agency::where('id', $org)->value('agency');?>
                <?php $rr= App\tbl_ro_detail::where('name', $ag)->orderBy('id', 'desc')->value('ro_id'); ?>

                <a href="{{route('new_information',$rr)}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p>Add New</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Visa Application
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visa_application')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Apply for Visa</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visa_application_std')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Apply for Student Visa</p>
                </a>
              </li> 
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Annual Financial Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('financial',$rr)}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Submission</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Event Information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('event_info')}}" class="nav-link">
                   <i class="fas fa-arrow-circle-right"></i>
                  <p>Submit Events</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('eventinfo_view')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Event List</p>
                </a>
              </li>
              
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Religious Site Information
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('religious_site')}}" class="nav-link">
                   <i class="fas fa-arrow-circle-right"></i>
                  <p>Submit Sites</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('siteinfo_view')}}" class="nav-link">
                   <i class="fas fa-arrow-circle-right"></i>
                  <p>Religious Site List</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Member Registration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('member_register')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>New Member</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                De-Registration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('deregister')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Request</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Minutes of Meeting
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('meeting')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Add New</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Donations
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('donation')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Add New</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Tax Exemption
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tax_exempt')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Apply</p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Subsidiary/Branch
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('local_chapter')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>New</p>
                </a>
              </li>

            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Zheldrang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('zheldrang')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Add New</p>
                </a>

            </ul>
          </li>
      
      
  
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      @endif
    </div>
    <!-- /.sidebar -->
  </aside>
