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
            <h5 class="m-0 text-dark">RO Details</h5>
              <p><?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
              </p>
              
             
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Commission for Religious Organizations</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="col-md-12">
    <div class="card">
    <br>
<input type="hidden" name="id" value="{{$roid}}">
{{ csrf_field() }}
@if($uprodetail == $roid && $uprodetaildate > $rochangedate )      
<!--updatedRO-->
    <section class="content">
    <div class="container-fluid">
    <div class="row">

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Religious Organization</h6></div>
          @foreach($updated_ro as $doo)
          <div class="card-body">
             <dt>Proposed Name of RO:</dt>
             <dd>{{ $doo->name }}</dd>
             <p style="color: orange;">Official Address</p>
             <dt>Dzongkhag/Thromde:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->dzongkhag)->value('dzongkhag_name'); ?></dd> 
             <dt>Office Location:</dt>            
             <dd>{{ $doo->location }}</dd>
             <dt>Postbox Number:</dt>
             <dd>{{ $doo->postbox }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $doo->phone }}</dd>
             <dt>Email:</dt>
             <dd>{{ $doo->email }}</dd>  

            <p style="color: orange;"> Uploaded Documents:</p>
            @foreach($rd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'app')
             <b>Application:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">

             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @elseif($dd->filecat == 'ass')
             <b>Assurance:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @elseif($dd->filecat == 'aoa')
             <b>Documents:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
             </dd>
             @endforeach

          </div>
             </dl>
        </div>  
        </div> 

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Chairman Details</h6></div>
     
          <div class="card-body">
             <div class="text-center">
             @foreach($cd as $cdoo)
             

             @if($cdoo->photo != '')
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{asset('/images/'.$cdoo->photo)}}" alt="profile picture">
             @else
             <?php $app =  App\tbl_info_update::where('ro_id', $roid)->orderBy('id', 'desc')->limit(1)->value('c_photo'); ?>
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{asset('/images/'.$app)}}" alt="profile picture">
             @endif


             </div>
             @endforeach
             <dd><b>Name:</b>&nbsp;&nbsp;{{ $doo->c_name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->c_dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $doo->c_dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $doo->c_gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $doo->c_village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $doo->c_houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $doo->c_thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $doo->c_dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $doo->c_qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $doo->c_phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $doo->c_email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $doo->c_appdate }}</dd>  
           <p style="color: orange;"> Uploaded Documents:</p>
           @foreach($rdcd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'cd')
             <b>Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
          </dd>
          @endforeach       
          </div>
  
             </dl>
        </div>  
        </div> 

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Deputy Chairman Details</h6></div>
       
          <div class="card-body">
            <div class="text-center">
              @foreach($dcd as $dcdoo)
             
             @if($dcdoo->photo != '')
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{asset('/images/'.$dcdoo->photo)}}" alt="profile picture">
             @else
             <?php $app =  App\tbl_info_update::where('ro_id', $roid)->orderBy('id', 'desc')->limit(1)->value('dc_photo'); ?>
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{asset('/images/'.$app)}}" alt="profile picture">
             @endif


             </div>
             @endforeach
             <dd><b>Name:</b>&nbsp;&nbsp;{{ $doo->dc_name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->dc_dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $doo->dc_dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $doo->dc_gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $doo->dc_village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $doo->dc_houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $doo->dc_thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $doo->dc_dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $doo->dc_qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $doo->dc_phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $doo->dc_email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $doo->dc_appdate }}</dd> 
          <p style="color: orange;"> Uploaded Documents:</p>
          @foreach($rddcd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'dcd')
             <b>Deputy Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
           </dd>
          @endforeach             
          </div>
      
             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Secretary Details</h6></div>
     
          <div class="card-body">
            <div class="text-center">
                @foreach($sd as $sdoo)
             

             @if($sdoo->photo != '')
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{asset('/images/'.$sdoo->photo)}}" alt="profile picture">
             @else
             <?php $app =  App\tbl_info_update::where('ro_id', $roid)->orderBy('id', 'desc')->limit(1)->value('s_photo'); ?>
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{asset('/images/'.$app)}}" alt="profile picture">
             @endif

             </div>
             @endforeach
            <dd><b>Name:</b>&nbsp;&nbsp;{{ $doo->s_name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->s_dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $doo->s_dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $doo->s_gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $doo->s_village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $doo->s_houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $doo->s_thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $doo->s_dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $doo->s_qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $doo->s_phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $doo->s_email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $doo->s_appdate }}</dd>  
          <p style="color: orange;"> Uploaded Documents:</p>
          @foreach($rdsd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'sd')
             <b>Secretary Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
           </dd>
        @endforeach        
          </div>
        
             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Deputy Secretary Details</h6></div>
       
          <div class="card-body">
            <div class="text-center">
               @foreach($dsd as $dsdoo)
             
             @if($dsdoo->photo != '')
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{asset('/images/'.$dsdoo->photo)}}" alt="profile picture">
             @else
             <?php $app =  App\tbl_info_update::where('ro_id', $roid)->orderBy('id', 'desc')->limit(1)->value('ds_photo'); ?>
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{asset('/images/'.$app)}}" alt="profile picture">
             @endif

             </div>
             @endforeach
            <dd><b>Name:</b>&nbsp;&nbsp;{{ $doo->ds_name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->ds_dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $doo->ds_dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $doo->ds_gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $doo->ds_village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $doo->ds_houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $doo->ds_thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $doo->ds_dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $doo->ds_qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $doo->ds_phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $doo->ds_email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $doo->ds_appdate }}</dd>   
          <p style="color: orange;"> Uploaded Documents:</p>
          @foreach($rddsd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'dsd')
             <b>Deputy Secretary Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
           </dd>
          @endforeach      
          </div>
        
             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Treasurer Details</h6></div>
        
          <div class="card-body">
            <div class="text-center">
               @foreach($td as $tddoo)
             

             @if($tddoo->photo != '')
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{asset('/images/'.$tddoo->photo)}}" alt="profile picture">
             @else
             <?php $app =  App\tbl_info_update::where('ro_id', $roid)->orderBy('id', 'desc')->limit(1)->value('t_photo'); ?>
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{asset('/images/'.$app)}}" alt="profile picture">
             @endif

             </div>
             @endforeach
             <dd><b>Name:</b>&nbsp;&nbsp;{{ $doo->t_name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->t_dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $doo->t_dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $doo->t_gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $doo->t_village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $doo->t_houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $doo->t_thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $doo->t_dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $doo->t_qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $doo->t_phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $doo->t_email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $doo->t_appdate }}</dd>
          <p style="color: orange;"> Uploaded Documents:</p>
          @foreach($rdtd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'td')
             <b>Treasurer Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
           </dd>
          @endforeach   
          </div>
         
             </dl>
        </div>  
        </div>

        <div class="col-md-6">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">All Uploaded Documents</h6></div>
          @foreach($rd as $dd)
          <div class="card-body">           
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'app')
             <b>Application:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'cd')
             <b>Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'dcd')
             <b>Deputy Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'sd')
             <b>Secretary Detail:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'dsd')
             <b>Deputy Secretary Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'td')
             <b>Treasurer Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'ass')
             <b>Assurance:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'aoa')
             <b>Article of Association:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @endif 
             @endif
             </dd>        
          </div>
          @endforeach
             </dl>
        </div>  

    @endforeach  

    </div>
    </div>
    </section> 


    @else

<!--withoutupdate-->        
    <section class="content">
    <div class="container-fluid">
    <div class="row">

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Religious Organization</h6></div>
          @foreach($ro as $doo)
          <div class="card-body">
             <dt>Proposed Name of RO:</dt>
             <dd>{{ $doo->name }}</dd>
             <p style="color: orange;">Official Address</p>
             <dt>Dzongkhag/Thromde:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->dzongkhag)->value('dzongkhag_name'); ?></dd> 
             <dt>Office Location:</dt>            
             <dd>{{ $doo->location }}</dd>
             <dt>Postbox Number:</dt>
             <dd>{{ $doo->postbox }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $doo->phone }}</dd>
             <dt>Email:</dt>
             <dd>{{ $doo->email }}</dd>         
          </div>
          @endforeach
          <p style="color: orange;"> Uploaded Documents:</p>
            @foreach($rd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'app')
             <b>Applications:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<!--<a href="http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>" target="youriframehere">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @elseif($dd->filecat == 'ass')
             <b>Assurance:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<!--<a href="http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>" target="youriframehere">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @elseif($dd->filecat == 'aoa')
             <b>Documents:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<!--<a href="http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>" target="youriframehere">-->
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
             </dd>
             @endforeach
             </dl>
        </div>  
        </div> 

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Chairman Details</h6></div>
          @foreach($cd as $d)   
          <div class="card-body">
             <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$d->photo") }}" alt="profile picture">
             </div>
             <dd><b>Name:</b>&nbsp;&nbsp;{{ $d->name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $d->dzongkhag)->value('dzongkhag_name'); ?></dd><dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $d->dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $d->gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $d->village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $d->houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $d->thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $d->dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $d->qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $d->phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $d->email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $d->appdate }}</dd>         
          </div>
          @endforeach
          <p style="color: orange;"> Uploaded Documents:</p>
          @foreach($rdcd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'cd')
             <b>Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
           </dd>
          @endforeach
             </dl>
        </div>  
        </div> 

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Deputy Chairman Details</h6></div>
          @foreach($dcd as $dda)
          <div class="card-body">
             <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$dda->photo") }}" alt="profile picture">
             </div>
             <dd><b>Name:</b>&nbsp;&nbsp;{{ $dda->name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $dda->dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $dda->dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $dda->gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $dda->village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $dda->houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $dda->thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $dda->dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $dda->qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $dda->phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $dda->email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $dda->appdate }}</dd>             
          </div>
          @endforeach
          <p style="color: orange;"> Uploaded Documents:</p>
          @foreach($rddcd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'dcd')
             <b>Deputy Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
           </dd>
          @endforeach
             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Secretary Details</h6></div>
          @foreach($sd as $ddd)
          <div class="card-body">
            <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$ddd->photo") }}" alt="profile picture">
             </div>
            <dd><b>Name:</b>&nbsp;&nbsp;{{ $ddd->name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $ddd->dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $ddd->dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $ddd->gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $ddd->village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $ddd->houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $ddd->thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $ddd->dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $ddd->qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $ddd->phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $ddd->email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $ddd->appdate }}</dd>          
          </div>
          @endforeach
          <p style="color: orange;"> Uploaded Documents:</p>
          @foreach($rdsd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'sd')
             <b>Secretary Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
           </dd>
        @endforeach
             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Deputy Secretary Details</h6></div>
          @foreach($dsd as $dddd)
          <div class="card-body">
            <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$dddd->photo") }}" alt="profile picture">
             </div>
            <dd><b>Name:</b>&nbsp;&nbsp;{{ $dddd->name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $dddd->dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $dddd->dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $dddd->gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $dddd->village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $dddd->houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $dddd->thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $dddd->dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $dddd->qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $dddd->phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $dddd->email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $dddd->appdate }}</dd>         
          </div>
          @endforeach
          <p style="color: orange;"> Uploaded Documents:</p>
          @foreach($rddsd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'dsd')
             <b>Deputy Secretary Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
           </dd>
          @endforeach
             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">Treasurer Details</h6></div>
          @foreach($td as $ddddd)
          <div class="card-body">
             <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$ddddd->photo") }}" alt="profile picture">
             </div>
             <dd><b>Name:</b>&nbsp;&nbsp;{{ $ddddd->name }}</dd>
             <dd><b>Dzongkhag:</b>&nbsp;&nbsp;<?php echo $c = App\dzongkhag::where('dzongkhag_id', $ddddd->dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><b>Dungkhag:</b>&nbsp;&nbsp;{{ $ddddd->dungkhag }}</dd>             
             <dd><b>Gewog:</b>&nbsp;&nbsp;<?php echo $c = App\gewog::where('gewog_id', $ddddd->gewog)->value('gewog_name'); ?></dd>
             <dd><b>Village:</b>&nbsp;&nbsp;<?php echo $c = App\village::where('village_id', $ddddd->village)->value('village_name'); ?></dd>
             <dd><b>House Number:</b>&nbsp;&nbsp;{{ $ddddd->houseno }}</dd>
             <dd><b>Thram Number:</b>&nbsp;&nbsp;{{ $ddddd->thramno }}</dd>
             <dd><b>Date Of Birth:</b>&nbsp;&nbsp;{{ $ddddd->dob }}</dd>
             <dd><b>Qualification:</b>&nbsp;&nbsp;<br>{{ $ddddd->qualification }}</dd>
             <dd><b>Phone Number:</b>&nbsp;&nbsp;<br>{{ $ddddd->phoneno }}</dd>
             <dd><b>Email:</b>&nbsp;&nbsp;<br>{{ $ddddd->email }}</dd>
             <dd><b>Appointment Date:</b>&nbsp;&nbsp;{{ $ddddd->appdate }}</dd>   
          </div>
          @endforeach
          <p style="color: orange;"> Uploaded Documents:</p>
          @foreach($rdtd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'td')
             <b>Treasurer Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a> 
             @endif 
             @endif
           </dd>
          @endforeach
             </dl>
        </div>  
        </div>

        <div class="col-md-6">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;">All Uploaded Documents</h6></div>
          @foreach($rd as $dd)
          <div class="card-body">           
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'app')
             <b>Application:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'cd')
             <b>Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'dcd')
             <b>Deputy Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'sd')
             <b>Secretary Detail:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'dsd')
             <b>Deputy Secretary Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'td')
             <b>Treasurer Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'ass')
             <b>Assurance:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'aoa')
             <b>Article of Association:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<!--<a href= "http://www.crob.gov.bt/clms/storage/app/<?php echo $dd->doc_path;?>"target="youriframe">-->
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @endif 
             @endif
             </dd>        
          </div>
          @endforeach
             </dl>
        </div>  
    </div>
    </div>
    </section>   
    @endif 
    </div> 
</div>         
</section>
</div>
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
<script language='JavaScript' type='text/javascript'>
    function validateThisFrom(thisForm) {
        if (thisForm.approved.value == "") {
            alert("Please Provide Assessment Decision");
            thisForm.approved.focus();
            return false;
        }      
    }
</script>
