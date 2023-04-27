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
            <h3 class="m-0 text-dark">ཐོ་བཀོད་ཚར་མི་ཆོས་སྡེའི་ཁ་གསལ།</h3>
              <p><?php
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
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">ཆོས་སྡེའི་ཁ་གསལ།</h3></div>
          @foreach($updated_ro as $doo)
          <div class="card-body">
             <dt><h3>ཆོས་ཚོགས་ཀྱི་མཚན།</h3></dt>
             <dd>{{ $doo->name }}</dd>
             <p><h3 style="color: orange;">ཡིག་ཚང་གི་ཁ་བྱང་།</h3></p>
             <dt><h3>རྫོང་ཁག།</h3></dt>
             <dd><?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $doo->dzongkhag)->value('dzongkhag_name'); ?></dd> 
             <dt><h3>ས་གནས་།</h3></dt>            
             <dd>{{ $doo->location }}</dd>
             <dt><h3>འགྲེམ་སྒྲོམ་ཨང་།</h3></dt>
             <dd>{{ $doo->postbox }}</dd>
             <dt><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></dt>
             <dd>{{ $doo->phone }}</dd>
             <dt><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></dt>
             <dd>{{ $doo->email }}</dd>  
             <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
            @foreach($rd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'app')
             <h4>ཞུ་ཚིག</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @elseif($dd->filecat == 'ass')
              <h4>ཁས་ལེན།/བློ་གཏད།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @elseif($dd->filecat == 'aoa')
             <h4>ཡིག་ཆ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
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
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></div>
     
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
             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $doo->c_name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $doo->c_dzongkhag)->value('dzongkhag_name'); ?></dd>
             <dd><h3>དྲུང་ཁག།</h3>&nbsp;&nbsp;{{ $doo->c_dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $doo->c_gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $doo->c_village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $doo->c_houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $doo->c_thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $doo->c_dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $doo->c_qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $doo->c_phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $doo->c_email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་  སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $doo->c_appdate }}</dd>  
            <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
            @foreach($rdcd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'cd')
             <h4>ཁྲི་འཛིན་གྱི་ཁ་གསལ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
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
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">ཁྲི་འཛིན་འོགམ་གྱི་ཁ་གསལ།</h3></div>
       
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
             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $doo->dc_name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $doo->dc_dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><h3>དྲུང་ཁག།</h3>&nbsp;&nbsp;{{ $doo->dc_dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $doo->dc_gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $doo->dc_village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $doo->dc_houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $doo->dc_thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $doo->dc_dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $doo->dc_qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $doo->dc_phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $doo->dc_email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་  སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $doo->dc_appdate }}</dd> 
           <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
          @foreach($rddcd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'dcd')
             <h4>ཁྲི་འཛིན་འོག་མ་གྱི་ཁ་གསལ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
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
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">དྲུང་ཆེན་གྱི་ཁ་གསལ།</h3></div>
     
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
             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $doo->s_name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $doo->s_dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><h3>དྲུང་ཁག།</h3>&nbsp;&nbsp;{{ $doo->s_dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $doo->s_gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $doo->s_village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $doo->s_houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $doo->s_thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $doo->s_dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $doo->s_qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $doo->s_phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $doo->s_email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་  སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $doo->s_appdate }}</dd>
          <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
          @foreach($rdsd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'sd')
             <h4>དྲུང་ཆེན་གྱི་ཁ་གསལ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
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
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">དྲུང་ཆེན་འོགམ་གྱི་ཁ་གསལ། </h3></div>
       
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
             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $doo->ds_name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $doo->ds_dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><h3>དྲུང་ཁག།</h3>&nbsp;&nbsp;{{ $doo->ds_dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $doo->ds_gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $doo->ds_village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $doo->ds_houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $doo->ds_thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $doo->ds_dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $doo->ds_qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $doo->ds_phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $doo->ds_email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་ སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $doo->ds_appdate }}</dd> 
          <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
          @foreach($rddsd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'dsd')
             <h4>དྲུང་ཆེན་འོག་མ་གྱི་ཁ་གསལ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
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
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">རྩིས་འཛིན་གྱི་ཁ་གསལ།</h3></div>
        
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
             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $doo->t_name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $doo->t_dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><h3>དྲུང་ཁག།</h3>&nbsp;&nbsp;{{ $doo->t_dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $doo->t_gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $doo->t_village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $doo->t_houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $doo->t_thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $doo->t_dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $doo->t_qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $doo->t_phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $doo->t_email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་ སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $doo->t_appdate }}</dd>
          <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
          @foreach($rdtd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'td')
             <h4>རྩིས་འཛིན་གྱི་ཁ་གསལ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
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
             <div class="card-header"><h6 class="card-title" style="color: orange;font-weight: bold;"><h3> ཡིག་ཆ།</h3></h6></div>
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
             <h3>ཞུ་ཚིག</h3>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'cd')
             <h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'dcd')
             <h3>ཁྲི་འཛིན་འོག་མ་གྱི་ཁ་གསལ།</h3>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'sd')
             <h3>དྲུང་ཆེན་གྱི་ཁ་གསལ།</h3>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'dsd')
             <h3>དྲུང་ཆེན་འོག་མ་གྱི་ཁ་གསལ།</h3>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'td')
             <h3>རྩིས་འཛིན་གྱི་ཁ་གསལ།</h3>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'ass')
             <h3>ཁས་ལེན།/བློ་གཏད།</h3>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
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
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">ཆོས་སྡེའི་ཁ་གསལ།</h3></div>
          @foreach($ro as $doo)
          <div class="card-body">
             <dt><h3>ཆོས་ཚོགས་ཀྱི་མཚན།</h3></dt>
             <dd>{{ $doo->name }}</dd>
             <p><h3 style="color: orange;">ཡིག་ཚང་གི་ཁ་བྱང་།</h3></p>
             <dt><h3>རྫོང་ཁག།</h3></dt>
             <dd><?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $doo->dzongkhag)->value('dzongkhag_name'); ?></dd> 
             <dt><h3>ས་གནས་།</h3></dt>            
             <dd>{{ $doo->location }}</dd>
             <dt><h3>འགྲེམ་སྒྲོམ་ཨང་།</h3></dt>
             <dd>{{ $doo->postbox }}</dd>
             <dt><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></dt>
             <dd>{{ $doo->phone }}</dd>
             <dt><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></dt>
             <dd>{{ $doo->email }}</dd> 
             <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p> 
              @foreach($rd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'app')
             <h4>ཞུ་ཚིག:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @elseif($dd->filecat == 'ass')
              <h4>ཁས་ལེན།/བློ་གཏད།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @elseif($dd->filecat == 'aoa')
             <h4>ཡིག་ཆ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @endif 
             @endif
             </dd>
             @endforeach       
          </div>
          @endforeach
             </dl>
        </div>  
        </div> 

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></div>
          @foreach($cd as $d)   
          <div class="card-body">
            <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;"  src="{{ asset("/images/$d->photo") }}" alt="profile picture">
             </div>
             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $d->name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $d->dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><h3>དྲུང་ཁག།</h3>&nbsp;&nbsp;{{ $d->dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $d->gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $d->village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $d->houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $d->thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $d->dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $d->qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $d->phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $d->email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་  སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $d->appdate }}</dd>
           <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
           @foreach($rdcd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'cd')
             <h4>ཁྲི་འཛིན་གྱི་ཁ་གསལ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @endif 
             @endif
          </dd>
          @endforeach          
          </div>
          @endforeach
             </dl>
        </div>  
        </div> 

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">ཁྲི་འཛིན་འོགམ་གྱི་ཁ་གསལ།</h3></div>
          @foreach($dcd as $dda)
          <div class="card-body">
            <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$dda->photo") }}"  alt="profile picture">
             </div>
             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $dda->name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $dda->dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><h3>དྲུང་ཁག།</h3>&nbsp;&nbsp;{{ $dda->dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $dda->gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $dda->village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $dda->houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $dda->thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $dda->dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $dda->qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $dda->phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $dda->email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་  སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $dda->appdate }}</dd>  
          <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
          @foreach($rddcd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'dcd')
             <h4>ཁྲི་འཛིན་འོག་མ་གྱི་ཁ་གསལ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @endif 
             @endif
           </dd>
          @endforeach             
          </div>
          @endforeach
             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">དྲུང་ཆེན་གྱི་ཁ་གསལ།</h3></div>
          @foreach($sd as $ddd)
          <div class="card-body">
            <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$ddd->photo") }}"  alt="profile picture">
             </div>
             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $ddd->name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $ddd->dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><h3>དྲུང་ཁག།</h3>&nbsp;&nbsp;{{ $ddd->dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $ddd->gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $ddd->village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $ddd->houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $ddd->thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $ddd->dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $ddd->qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $ddd->phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $ddd->email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་  སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $ddd->appdate }}</dd> 
             <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
          @foreach($rdsd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'sd')
             <h4>དྲུང་ཆེན་གྱི་ཁ་གསལ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @endif 
             @endif
           </dd>
        @endforeach          
          </div>
          @endforeach
             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">དྲུང་ཆེན་འོགམ་གྱི་ཁ་གསལ། </h3></div>
          @foreach($dsd as $dddd)
          <div class="card-body">
            <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$dddd->photo") }}"  alt="profile picture">
             </div>
             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $dddd->name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $dddd->dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><h3>དྲུང་ཁག།</h3>&nbsp;&nbsp;{{ $dddd->dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $dddd->gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $dddd->village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $dddd->houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $dddd->thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $dddd->dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $dddd->qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $dddd->phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $dddd->email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་ སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $dddd->appdate }}</dd>
             <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
          @foreach($rddsd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'dsd')
             <h4>དྲུང་ཆེན་འོག་མ་གྱི་ཁ་གསལ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @endif 
             @endif
           </dd>
          @endforeach           
          </div>
          @endforeach
             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">རྩིས་འཛིན་པ་བཅས་ཀྱི་ཁ་གསལ།</h3></div>
          @foreach($td as $ddddd)
          <div class="card-body"><div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$ddddd->photo") }}"  alt="profile picture">
             </div>
             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $ddddd->name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $ddddd->dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><h3>དྲུང་ཁག།</h3>&nbsp;&nbsp;{{ $ddddd->dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $ddddd->gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $ddddd->village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $ddddd->houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $ddddd->thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $ddddd->dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $ddddd->qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $ddddd->phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $ddddd->email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་ སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $ddddd->appdate }}</dd> 
          <p style="color: orange;"><h3 style="color: orange;">ཡིག་ཆ། ཡིག་རིགས།</h3></p>
          @foreach($rdtd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'td')
             <h4>རྩིས་འཛིན་པ་བཅས་ཀྱི་ཁ་གསལ།:</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @endif 
             @endif
           </dd>
          @endforeach  
          </div>
          @endforeach
             </dl>
        </div>  
        </div>

        <div class="col-md-6">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">ཡིག་ཆ། ཡིག་རིགས།</h3></div>
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
             <h4>ཞུ་ཚིག</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'cd')
             <h4>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'dcd')
             <h4>ཁྲི་འཛིན་འོག་མ་གྱི་ཁ་གསལ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'sd')
             <h4>དྲུང་ཆེན་གྱི་ཁ་གསལ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'dsd')
             <h4>དྲུང་ཆེན་འོག་མ་གྱི་ཁ་གསལ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'td')
             <h4>རྩིས་འཛིན་པ་བཅས་ཀྱི་ཁ་གསལ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/images/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @elseif($dd->filecat == 'ass')
             <h4>ཁས་ལེན།/བློ་གཏད།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
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
