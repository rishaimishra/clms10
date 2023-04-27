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
        <a href="{{route('application.home_dzo')}}" class="d-block"><h3 style="color: #007bff;"><i class="fa fa-fw fa-home" style="color: #007bff;"></i>&nbsp;&nbsp;&nbsp;གདོང་ཤོག</h3></a>
        @elseif($role == 3)
        <a href="{{route('application.home_ro_dzo')}}" class="d-block"><h4 style="color: #007bff;"><i class="fa fa-fw fa-home"></i>&nbsp;&nbsp;&nbsp;གདོང་ཤོག</h4></a>
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
          <h3>ཆོས་སྡེའི་ཁ་གསལ།</h3>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view_registered_ro_all_dzo')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;"> ཐོ་བཀོད་གྲུབ་པའི་ཆོས་སྡེ།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('infoupdate_home_dzo')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཁ་གསལ་བསྒྱུར་བཅོས།</p></p>
                </a>
              </li>



            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཆོས་སྡེའི་ཁ་གསལ་གསརཔ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('newinfo_cro_home_dzo')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>visa /སྐྱོད་ཐམ་ཞུ་ཚིག།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visa_application_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">སྐྱོད་ཐམ་ཞུ་ཚིག།</p></p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visa_application_std_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">སློབ་ཕྲུག་གྱི་སྐྱོད་ཐམ་ཞུ་ཚིག།</p></p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ལོ་བསྟར་དངུལ་གྱི་སྙན་ཞུ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('financial_all_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">བསྐྱར་ཞིབ།</p></p>
                </a>
              </li>
             
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>མཛད་རིམ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('eventinfo_view_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">མཛད་རིམ་ཐོ་བཀོད།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>གནས་ཐོ་ཁ་གསལ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('siteinfo_view_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གནས་ཐོ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཉོག་བཤད།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
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
          <h3>ཉེས་ཁྲིམས་བཀལ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('discipline_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">དང་ལེན།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('suspension_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གནས་སྐབས་ཅིག་གི་བཀག་བཞག</p></p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
         <h3>འཐུས་མི་ ཐོ་བཀོད།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('member_register_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཐོ་བཀོད་ གསརཔ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཐོ་བཀོད་ལས་ཕྱིར་འཐོན།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('deregister_view_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">བསྐྱར་ཞིབ་འབད།</p></p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཞལ་འཛོམས།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('meeting_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('meeting_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཁྲི་འཛིན།/ཨ་ཎེམོ་ཞལ་འཛོམས</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('meeting_search_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཞལ་འཛོམས་འཚོལ་ཞིབ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཞལ་འདེབས།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('donation_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">བསྐྱར་ཞིབ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཞལ་གྲངས། </h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('zheldrang_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཐོ་གསརཔ།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('zheldrang_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">འཚོལ་ཞིབ།</p></p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཁྲལ་ཡངས་ཆག།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tax_exempt_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">བསྐྱར་ཞིབ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཡན་ལག་ཆོས་སྡེ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('local_chapter_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">བསྐྱར་ཞིབ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>སྙན་ཞུ་བཟོ་སྐྲུན།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('report_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">འཚོལ་ཞིབ།</p></p>
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
          <h3>ཆོས་སྡེའི་ཁ་གསལ།</h3>
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view_registered_ro_dzo')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཁ་གསལ།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('infoupdate_home_ro_dzo')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཁ་གསལ་བསྒྱུར་བཅོས།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('patron_register_dzo')}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">སྐྱབས་འཛིན་པ།</p></p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཆོས་སྡེའི་ཁ་གསལ་གསརཔ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                
                <?php $org = Auth::user()->organization;?>
                <?php $ag = App\tbl_agency::where('id', $org)->value('agency');?>
                <?php $rr= App\tbl_ro_detail::where('name', $ag)->orderBy('id', 'desc')->value('ro_id'); ?>

                <a href="{{route('new_information_dzo',$rr)}}" class="nav-link">
                 <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>visa/སྐྱོད་ཐམ་ཞུ་ཚིག།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
             <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visa_application_dzo')}}" class="nav-link">
                   <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">སྐྱོད་ཐམ་ཞུ་ཚིག།</p></p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('visa_application_std_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">སློབ་ཕྲུགའི་སྐྱོད་ཐམ་ཞུ་ཚིག།</p></p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ལོ་བསྟར་དངུལ་གྱི་སྙན་ཞུ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('financial_dzo',$rr)}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i> 
                  <p><p style="font-size: 25;">བཀང་ཤོག།</p></p>
                </a>
              </li>

            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>མཛད་རིམ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('event_info_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">བཀང་ཤོག།</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('eventinfo_view_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">མཛད་རིམ་ཐོ་བཀོད།</p></p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>གནས་ཐོ་ཁ་གསལ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('religious_site_dzo')}}" class="nav-link">
                   <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;"> བཀང་ཤོག</p></p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('siteinfo_view_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གནས་ཐོ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>འཐུས་མི་ ཐོ་བཀོད།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('member_register_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཐོ་བཀོད་ གསརཔ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3> ཐོ་བཀོད་ལས་ཕྱིར་འཐོན།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('deregister_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསོལ་འདེབས་ཕུལ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཞལ་འཛོམས།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('meeting_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">གསརཔ་བཙུགས།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཞལ་འདེབས།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('donation_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཞུ་ཚིག།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
          <h3>ཁྲལ་ཡངས་ཆག།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('tax_exempt_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཞུ་ཚིག་ཕུལ།</p></p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
               <h3>ཡན་ལག་ཆོས་སྡེ།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('local_chapter_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཐོ་བཀོད།</p></p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <p>
                <h3>ཞལ་གྲངས།</h3>
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('zheldrang_dzo')}}" class="nav-link">
                  <i class="fas fa-arrow-circle-right"></i>
                  <p><p style="font-size: 25;">ཐོ་གསརཔ།</p></p>
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
