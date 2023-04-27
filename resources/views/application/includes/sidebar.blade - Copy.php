  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
     <img class="img-responsive" src="{{URL::asset('/images/rgoblogo.png')}}"style="height:50px;width:50px;">
      <span class="brand-text font-weight-dark">&nbsp;&nbsp;&nbsp;User | CRO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
        <?php $role = Auth::user()->role_id;?>
        @if($role == 2)
        <a href="{{route('application.home')}}" class="d-block"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;&nbsp;Home/<h4>གདོང་ཤོག</h4></a>
        @elseif($role == 3)
        <a href="{{route('application.home_ro')}}" class="d-block"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;&nbsp;Home/<h4>གདོང་ཤོག</h4></a>
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
          RO information/<h4>ཆོས་སྡེའི་ ཁ་གསལ་</h4>
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
                <a href="" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p>RO Information Update</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('view_registered_ro_all_dzo')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཐོ་བཀོད་ཚར་མི་ཆོས་སྡེའི་ ཁ་གསལ་</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཁ་གསལ་ བསྒྱུར་བཅོས།</p></p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          New RO Information/<h4>ཆོས་སྡེའི་ ཁ་གསལ་གསརཔ།</h4>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('newinfo_cro_home')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p>Add New</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('newinfo_cro_home')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཁ་གསལ་གསརཔ་ བཙུགས་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Visa Application/<h4>སྐྱོད་ཐམ་ ཞུ་ཚིག</h4>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visa_application')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Review Applications</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('visa_application')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">བསྐྱར་ཞིབ་འབད་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Financial Information/<h4>དངུལ་འབྲེལ་གྱི་ ཁ་གསལ། </h4>
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
          Event Information/<h4>དུས་སྟོན་ ཁ་གསལ</h4>
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
              <li class="nav-item">
                <a href="{{route('eventinfo_view')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">དུས་སྟོན་ བཙུགས་ཚར་མི།།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Religious Site Information/<h4>ཆོས་ལྡན་ ས་གནས།</h4>
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
              <li class="nav-item">
                <a href="{{route('siteinfo_view_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ས་གནས་ བཙུགས་ཚར་མི།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Complaints/<h4>ཉོག་བཤད།</h4>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('compliant_view')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Review Complaints</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('compliant_view_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཉོག་བཤད་ བསྐྱར་ཞིབ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Disciplinary Actions/<h4>ཉེས་ཁྲིམས་བཀལ་ནི།</h4>
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
              <li class="nav-item">
                <a href="{{route('discipline')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">དང་ལེན།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('suspension')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གནས་སྐབས་ཅིག་གི་བཀག་བཞག</p></p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Member Registration/<h4>འཐུས་མི་ ཐོ་བཀོད།</h4>
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
              <li class="nav-item">
                <a href="{{route('member_register')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཐོ་བཀོད་ གསརཔ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          De-Registration/<h4>ཐོ་བཀོད་ལས འཐོན་འགྱོ་ནི།</h4>
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
              <li class="nav-item">
                <a href="{{route('deregister')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">བསྐྱར་ཞིབ་འབད་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Minutes of Meeting/<h4>ཞལ་འཛོམས་ཚུ་གིས་ ཁ་གསལ</h4>
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
              <li class="nav-item">
                <a href="{{route('meeting_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས་ནི།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('meeting_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཁྲི་འཛིན།/ཨ་ཎེམོ་ ཞལ་འཛོམས</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('meeting_search_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཞལ་འཛོམས་ ཁ་གསལ་འཚོལ་ཞིབ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Donations/<h4>ཞལ་འདེབས།</h4>
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
              <li class="nav-item">
                <a href="{{route('donation')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">བསྐྱར་ཞིབ་འབད་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Zheldrang/<h4>ཞལ་གྲངས།</h4>
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
              <li class="nav-item">
                <a href="{{route('zheldrang')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས་ནི།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('zheldrang')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">འཚོལ་ཞིབ།</p></p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Tax Exemption/<h4>ཁྲལ་ ཡངས་ཆག</h4>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tax')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Review</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tax')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">བསྐྱར་ཞིབ་འབད་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          Local Chapters/<h4></h4>
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
              <li class="nav-item">
                <a href="{{route('local_chapter')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས་ནི།</p></p>
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
                RO information/<h4>ཆོས་སྡེའི་ ཁ་གསལ་</h4>
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
              <li class="nav-item">
                <a href="{{route('view_registered_ro')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཁ་གསལ་</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('infoupdate_home_dzo')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཁ་གསལ་ བསྒྱུར་བཅོས།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('patron_register')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">སྐྱབས་འཛིན་པ།</p></p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                New RO Information/<h4>ཆོས་སྡེའི་ ཁ་གསལ་གསརཔ།</h4>
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
              <li class="nav-item">
                
                <?php $org = Auth::user()->organization;?>
                <?php $ag = App\tbl_agency::where('id', $org)->value('agency');?>
                <?php $rr= App\tbl_ro_detail::where('name', $ag)->orderBy('id', 'desc')->value('ro_id'); ?>

                <a href="{{route('new_information',$rr)}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཁ་གསལ་གསརཔ་ བཙུགས་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Visa Application/<h4>སྐྱོད་ཐམ་ ཞུ་ཚིག</h4>
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
              <li class="nav-item">
                <a href="{{route('visa_application')}}" class="nav-link">
                   <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཞུ་ཚིག་ བཙུགས་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Financial Information/<h4>དངུལ་འབྲེལ་གྱི་ ཁ་གསལ། </h4>
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
                Event Information/<h4>དུས་སྟོན་ ཁ་གསལ</h4>
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
              <li class="nav-item">
                <a href="{{route('event_info_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">དུས་སྟོན་ བཙུགས་ནི།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('eventinfo_view_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">དུས་སྟོན་ བཙུགས་ཚར་མི།</p></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Religious Site Information/<h4>ཆོས་ལྡན་ ས་གནས།</h4>
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
              <li class="nav-item">
                <a href="{{route('religious_site_dzo')}}" class="nav-link">
                   <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ས་གནས་ བཙུགས་ནི།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('siteinfo_view_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ས་གནས་ བཙུགས་ཚར་མི།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Member Registration/<h4>འཐུས་མི་ ཐོ་བཀོད།</h4>
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
              <li class="nav-item">
                <a href="{{route('member_register')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཐོ་བཀོད་ གསརཔ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                De-Registration/<h4>ཐོ་བཀོད་ལས འཐོན་འགྱོ་ནི།</h4>
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
              <li class="nav-item">
                <a href="{{route('deregister')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཞུ་བ་བཀོད་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Minutes of Meeting/<h4>ཞལ་འཛོམས་ཚུ་གིས་ ཁ་གསལ</h4>
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
                <a href="{{route('meeting_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Donations/<h4>ཞལ་འདེབས།</h4>
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
              <li class="nav-item">
                <a href="{{route('donation')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Tax Exemption/<h4>ཁྲལ་ ཡངས་ཆག</h4>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tax')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p>Apply</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('tax')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཞུ་ཚིག་ཕུལ་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Local Chapters/<h4></h4>
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
              <li class="nav-item">
                <a href="{{route('local_chapter')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                Zheldrang/<h4>ཞལ་གྲངས།</h4>
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
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས་ནི།</p></p>
                </a>
              </li>
            </ul>
          </li>
      
      
  
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      @endif
    </div>
    <!-- /.sidebar -->
  </aside>
