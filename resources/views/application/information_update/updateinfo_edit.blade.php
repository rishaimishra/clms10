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
            <h5 class="m-0 text-dark">Review/Assessment of RO Information Updates</h5>
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
              <li class="breadcrumb-item active">Religious Organizations</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

@if(Auth::user()->role_id == '2') 
<div class="col-md-12">
<div class="card"><br>
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('updateinfo_edit', $ro_id) }}">
<input type="hidden" name="ro_id" value="{{$ro_id}}">
{{ csrf_field() }}
    <section class="content">
    <div class="container-fluid">
    <div class="row">

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">RO Application</h6></div>
          @foreach($app as $doo)
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

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Chairman Details</h6></div>
 
          <div class="card-body">
             <dt>Name:</dt>
             <dd>{{ $doo->c_name }}</dd>
             <dt>Dzongkhag:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->c_dzongkhag)->value('dzongkhag_name'); ?>
             </dd>         
             <dt>Dungkhag:</dt>            
             <dd>{{ $doo->c_dungkhag }}</dd>             
             <dt>Gewog:</dt>
             <dd><?php echo $c = App\gewog::where('gewog_id', $doo->c_gewog)->value('gewog_name'); ?></dd>
             <dt>Village:</dt>
             <dd><?php echo $c = App\village::where('village_id', $doo->c_village)->value('village_name'); ?>
             </dd>
             <dt>House Number:</dt>
             <dd>{{ $doo->c_houseno }}</dd>
             <dt>Thram Number:</dt>
             <dd>{{ $doo->c_thramno }}</dd>
             <dt>Date Of Birth:</dt>
             <dd>{{ $doo->c_dob }}</dd>
             <dt>Qualification:</dt>
             <dd>{{ $doo->c_qualification }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $doo->c_phoneno }}</dd>
             <dt>Email:</dt>
             <dd>{{ $doo->c_email }}</dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd>{{ $doo->c_appdate }}</dd> 

Uploaded Photo:&nbsp;&nbsp;&nbsp;{{ $doo->c_photo }}
@if($doo->c_photo == '')
No Photo!
@else
<a href="{{asset('/images/'.$doo->c_photo)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
@endif

           <p style="color: orange;"> Uploaded Documents:</p>
             @foreach($rd as $dd)
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

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Deputy Chairman Details</h6></div>

          <div class="card-body">
             <dt>Name:</dt>
             <dd>{{ $doo->dc_name }}</dd>
             <dt>Dzongkhag:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->dc_dzongkhag)->value('dzongkhag_name'); ?></dd>      
             <dt>Dungkhag:</dt>            
             <dd>{{ $doo->dc_dungkhag }}</dd>             
             <dt>Gewog:</dt>
             <dd><?php echo $c = App\gewog::where('gewog_id', $doo->dc_gewog)->value('gewog_name'); ?>            </dd>
             <dt>Village:</dt>
             <dd><?php echo $c = App\village::where('village_id', $doo->dc_village)->value('village_name'); ?></dd>
             <dt>House Number:</dt>
             <dd>{{ $doo->dc_houseno }}</dd>
             <dt>Thram Number:</dt>
             <dd>{{ $doo->dc_thramno }}</dd>
             <dt>Date Of Birth:</dt>
             <dd>{{ $doo->dc_dob }}</dd>
             <dt>Qualification:</dt>
             <dd>{{ $doo->dc_qualification }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $doo->dc_phoneno }}</dd>
             <dt>Email:</dt>
             <dd>{{ $doo->dc_email }}</dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd>{{ $doo->dc_appdate }}</dd> 
             Uploaded Photo:&nbsp;&nbsp;&nbsp;{{ $doo->dc_photo }}
@if($doo->dc_photo == '')
No Photo!
@else
<a href="{{asset('/images/'.$doo->dc_photo)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
@endif
             <p style="color: orange;"> Uploaded Documents:</p>
             @foreach($rd as $dd)
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

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Secretary Details</h6></div>

          <div class="card-body">
             <dt>Name:</dt>
             <dd>{{ $doo->s_name }}</dd>
             <dt>Dzongkhag:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->s_dzongkhag)->value('dzongkhag_name'); ?></dd>             
             <dt>Dungkhag:</dt>            
             <dd>{{ $doo->s_dungkhag }}</dd>             
             <dt>Gewog:</dt>
             <dd><?php echo $c = App\gewog::where('gewog_id', $doo->s_gewog)->value('gewog_name'); ?>
             </dd>
             <dt>Village:</dt>
             <dd><?php echo $c = App\village::where('village_id', $doo->s_village)->value('village_name'); ?></dd>
             <dt>House Number:</dt>
             <dd>{{ $doo->s_houseno }}</dd>
             <dt>Thram Number:</dt>
             <dd>{{ $doo->s_thramno }}</dd>
             <dt>Date Of Birth:</dt>
             <dd>{{ $doo->s_dob }}></dd>
             <dt>Qualification:</dt>
             <dd>{{ $doo->s_qualification }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $doo->s_phoneno }}</dd>
             <dt>Email:</dt>
             <dd>{{ $doo->s_email }}</dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd>{{ $doo->s_appdate }}</dd> 
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{ $doo->s_photo }}
@if($doo->s_photo == '')
No Photo!
@else
<a href="{{asset('/images/'.$doo->s_photo)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
@endif

             <p style="color: orange;"> Uploaded Documents:</p>
             @foreach($rd as $dd)
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

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Deputy Secretary Details</h6></div>

          <div class="card-body">
             <dt>Name:</dt>
             <dd>{{ $doo->ds_name }}</dd>
             <dt>Dzongkhag:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->ds_dzongkhag)->value('dzongkhag_name'); ?></dd>
             <dt>Dungkhag:</dt>            
             <dd>{{ $doo->ds_dungkhag }}</dd>             
             <dt>Gewog:</dt>
             <dd><?php echo $c = App\gewog::where('gewog_id', $doo->ds_gewog)->value('gewog_name'); ?>
             </dd>
             <dt>Village:</dt>
             <dd>    <?php echo $c = App\village::where('village_id', $doo->ds_village)->value('village_name'); ?>         </dd>
             <dt>House Number:</dt>
             <dd>{{ $doo->ds_houseno }}</dd>
             <dt>Thram Number:</dt>
             <dd>{{ $doo->ds_thramno }}</dd>
             <dt>Date Of Birth:</dt>
             <dd>{{ $doo->ds_dob }}</dd>
             <dt>Qualification:</dt>
             <dd>{{ $doo->ds_qualification }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $doo->ds_phoneno }}</dd>
             <dt>Email:</dt>
             <dd>{{ $doo->ds_email }}</dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd>{{ $doo->ds_appdate }}</dd>
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{ $doo->ds_photo }}
@if($doo->ds_photo == '')
No Photo!
@else
<a href="{{asset('/images/'.$doo->ds_photo)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
@endif

             <p style="color: orange;"> Uploaded Documents:</p>
             @foreach($rd as $dd)
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

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Treasurer Details</h6></div>

          <div class="card-body">
             <dt>Name:</dt>
             <dd>{{ $doo->t_name }}</dd>
             <dt>Dzongkhag:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->t_dzongkhag)->value('dzongkhag_name'); ?></dd>         
             <dt>Dungkhag:</dt>            
             <dd>{{ $doo->t_dungkhag }}</dd>             
             <dt>Gewog:</dt>
             <dd><?php echo $c = App\gewog::where('gewog_id', $doo->t_gewog)->value('gewog_name'); ?>            </dd>
             <dt>Village:</dt>
             <dd><?php echo $c = App\village::where('village_id', $doo->t_village)->value('village_name'); ?></dd>
             <dt>House Number:</dt>
             <dd>{{ $doo->t_houseno }}</dd>
             <dt>Thram Number:</dt>
             <dd>{{ $doo->t_thramno }}</dd>
             <dt>Date Of Birth:</dt>
             <dd>{{ $doo->t_dob }}</dd>
             <dt>Qualification:</dt>
             <dd>{{ $doo->t_qualification }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $doo->t_phoneno }}</dd>
             <dt>Email:</dt>
             <dd>{{ $doo->t_email }}</dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd>{{ $doo->t_appdate }}</dd>
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{ $doo->t_photo }}
@if($doo->t_photo == '')
No Photo!
@else
<a href="{{asset('/images/'.$doo->t_photo)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
@endif
             <p style="color: orange;"> Uploaded Documents:</p>
              @foreach($rd as $dd)
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

      
<input type="hidden" name="edit_id" id='edit_id'>

 @endforeach        

    </div>
    </div>
    </section> 
    </form>   
    </div> 
</div>


@elseif(Auth::user()->role_id == '3')


<div class="col-md-12">
<div class="card"><br>
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('updateinfo_edit', $ro_id) }}">
<input type="hidden" name="ro_id" value="{{$ro_id}}">
{{ csrf_field() }}
    <section class="content">
    <div class="container-fluid">
    <div class="row">

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">RO Application</h6></div>
          @foreach($app as $doo)
          <div class="card-body">
             <dt>Proposed Name of RO:</dt>
             <dd><input type="text" class="form-control" id="ro_name" name='ro_name' value="{{ $doo->name }}"></dd>
             <p>Official Address</p>
             <dt>Dzongkhag/Thromde:</dt>
             <dd>
                <select class='form-control' name='type' id="type" required>
                  <?php 
                  $dzongkhag=App\dzongkhag::all();
                  foreach($dzongkhag as $dzo):
                  ?>
                  <option value="{{$dzo->dzongkhag_id}}"
                  <?php 
                  if($dzo->dzongkhag_id == $doo->dzongkhag){?> selected <?php } ?> >
                  {{$dzo->dzongkhag_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select>
             </dd> 
             <dt>Office Location:</dt>            
             <dd><input type="text" class="form-control" id="location" name="location" value="{{ $doo->location }}"></dd>
             <dt>Postbox Number:</dt>
             <dd><input type="text" class="form-control" id="postbox" name="postbox" value="{{ $doo->postbox }}"></dd>
             <dt>Phone Number:</dt>
             <dd><input type="text" class="form-control" id="phone" name="phone" value="{{ $doo->phone }}"></dd>
             <dt>Email:</dt>
             <dd><input type="text" class="form-control" id="email" name="email" value="{{ $doo->email }}"></dd>         
          </div>

             </dl>
        </div>  
        </div> 

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Chairman Details</h6></div>
 
          <div class="card-body">
             <dt>Name:</dt>
             <dd><input type="text" class="form-control" id="cname" name='cname' value="{{ $doo->c_name }}"></dd>
             <dt>Dzongkhag:</dt>
             <dd><select name='ctype1' id='ctype1' class="form-control input-sm" >
                  <option disabled selected>Select Dzongkhag</option>
                  <?php 
                  $dzongkhag=App\dzongkhag::all();
                  foreach($dzongkhag as $dzo):
                  ?>
                  <option value="{{$dzo->dzongkhag_id}}"
                  <?php 
                  if($dzo->dzongkhag_id == $doo->c_dzongkhag){?> selected <?php } ?> >
                  {{$dzo->dzongkhag_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select>
             </dd>         
             <dt>Dungkhag:</dt>            
             <dd><input type="text" class="form-control" id="cdungkhag" name="cdungkhag" value="{{ $doo->c_dungkhag }}"></dd>             
             <dt>Gewog:</dt>
             <dd><select name='cgewog' id='cgewog' class="form-control input-sm">
                  <option disabled selected>Select Gewog</option>
                  <?php 
                  $gewog=App\gewog::all();
                  foreach($gewog as $g):
                  ?>
                  <option value="{{$g->gewog_id}}"
                  <?php 
                  if($g->gewog_id == $doo->c_gewog){?> selected <?php } ?> >
                  {{$g->gewog_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select></dd>
             <dt>Village:</dt>
             <dd><select name='cvillage' id='cvillage' class="form-control input-sm" >
                  <option disabled selected>Select village</option>
                  <?php 
                  $village=App\village::all();
                  foreach($village as $v):
                  ?>
                  <option value="{{$v->village_id}}"
                  <?php 
                  if($v->village_id == $doo->c_village){?> selected <?php } ?> >
                  {{$v->village_name}}
                  </option>
                  <?php 
                    endforeach
                  ?>
                </select>
             </dd>
             <dt>House Number:</dt>
             <dd><input type="text" class="form-control" id="chouseno" name="chouseno" value="{{ $doo->c_houseno }}"></dd>
             <dt>Thram Number:</dt>
             <dd><input type="text" class="form-control" name="cthramno" id="cthramno" value="{{ $doo->c_thramno }}"></dd>
             <dt>Date Of Birth:</dt>
             <dd><input type="date" class="form-control" id="cdob" name="cdob" value="{{ $doo->c_dob }}"></dd>
             <dt>Qualification:</dt>
             <dd><input type="text" class="form-control" id="cqualification" name="cqualification" value="{{ $doo->c_qualification }}"></dd>
             <dt>Phone Number:</dt>
             <dd><input type="text" class="form-control" id="cphoneno" name="cphoneno" value="{{ $doo->c_phoneno }}"></dd>
             <dt>Email:</dt>
             <dd><input type="text" class="form-control" id="cemail" name="cemail" value="{{ $doo->c_email }}"></dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd><input type="date" class="form-control" id="cappdate" name="cappdate" value="{{ $doo->c_appdate }}"></dd>         
  
<?php $pp=$doo->c_photo; ?>
@if($pp=='')
<div class="form-group input-group-sm">
<label for="photo">Upload Passport Photo:</label>
<input type="file" name="ephoto" class="form-control" value="{{$pp}}" id='ephoto'>
</div>
@else
<div class="form-group input-group-sm">
<label for="photo">Upload Passport Photo:</label>
<input type="text" class="form-control" value="{{$pp}}">
</div>
@endif
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{$pp}}
@if($pp == '')
No Photo!
@else
<a href="{{asset('/images/'.$pp)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
<a href="{{ route('delete_photo', array($doo->id, $doo->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i>Delete</a><br>
@endif



        </div>

             </dl>
        </div>  
        </div> 

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Deputy Chairman Details</h6></div>

          <div class="card-body">
             <dt>Name:</dt>
             <dd><input type="text" class="form-control" id="dc_name" name='dc_name' value="{{ $doo->dc_name }}"></dd>
             <dt>Dzongkhag:</dt>
             <dd><select name='dc_type1' id='dc_type1' class="form-control input-sm" >
                  <option disabled selected>Select Dzongkhag</option>
                  <?php 
                  $dzongkhag=App\dzongkhag::all();
                  foreach($dzongkhag as $dzo):
                  ?>
                  <option value="{{$dzo->dzongkhag_id}}"
                  <?php 
                  if($dzo->dzongkhag_id == $doo->dc_dzongkhag){?> selected <?php } ?> >
                  {{$dzo->dzongkhag_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select></dd>      
             <dt>Dungkhag:</dt>            
             <dd><input type="text" class="form-control" id="dc_dungkhag" name="dc_dungkhag" value="{{ $doo->dc_dungkhag }}"></dd>             
             <dt>Gewog:</dt>
             <dd><select name='dc_gewog' id='dc_gewog' class="form-control input-sm">
                  <option disabled selected>Select Gewog</option>
                  <?php 
                  $gewog=App\gewog::all();
                  foreach($gewog as $g):
                  ?>
                  <option value="{{$g->gewog_id}}"
                  <?php 
                  if($g->gewog_id == $doo->dc_gewog){?> selected <?php } ?> >
                  {{$g->gewog_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select>
             </dd>
             <dt>Village:</dt>
             <dd><select name='dc_village' id='dc_village' class="form-control input-sm" >
                  <option disabled selected>Select village</option>
                  <?php 
                  $village=App\village::all();
                  foreach($village as $v):
                  ?>
                  <option value="{{$v->village_id}}"
                  <?php 
                  if($v->village_id == $doo->dc_village){?> selected <?php } ?> >
                  {{$v->village_name}}
                  </option>
                  <?php 
                    endforeach
                  ?>
                </select></dd>
             <dt>House Number:</dt>
             <dd><input type="text" class="form-control" id="dc_houseno" name="dc_houseno" value="{{ $doo->dc_houseno }}"></dd>
             <dt>Thram Number:</dt>
             <dd><input type="text" class="form-control" id="dc_thramno" name="dc_thramno" value="{{ $doo->dc_thramno }}"></dd>
             <dt>Date Of Birth:</dt>
             <dd><input type="date" class="form-control" id="dc_dob" name="dc_dob" value="{{ $doo->dc_dob }}"></dd>
             <dt>Qualification:</dt>
             <dd><input type="text" class="form-control" id="dc_qualification" name="dc_qualification" value="{{ $doo->dc_qualification }}"></dd>
             <dt>Phone Number:</dt>
             <dd><input type="text" class="form-control" id="dc_phoneno" name="dc_phoneno" value="{{ $doo->dc_phoneno }}"></dd>
             <dt>Email:</dt>
             <dd><input type="text" class="form-control" id="dc_email" name="dc_email" value="{{ $doo->dc_email }}"></dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd><input type="date" class="form-control" id="dc_appdate" name="dc_appdate" value="{{ $doo->dc_appdate }}"></dd>         
      

<?php $ppdc=$doo->dc_photo; ?>
@if($ppdc=='')
<div class="form-group input-group-sm">
<label for="photo">Upload Passport Photo:</label>
<input type="file" name="ephotodc" class="form-control" value="{{$ppdc}}" id='ephotodc'>
</div>
@else
<div class="form-group input-group-sm">
<label for="photo">Upload Passport Photo:</label>
<input type="text" class="form-control" value="{{$ppdc}}">
</div>
@endif
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{$ppdc}}
@if($ppdc == '')
No Photo!
@else
<a href="{{asset('/images/'.$ppdc)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
<a href="{{ route('delete_photodc', array($doo->id, $doo->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i>Delete</a><br>
@endif




    </div>

             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Secretary Details</h6></div>

          <div class="card-body">
             <dt>Name:</dt>
             <dd><input type="text" class="form-control" id="s_name" name='s_name' value="{{ $doo->s_name }}"></dd>
             <dt>Dzongkhag:</dt>
             <dd><select name='s_type1' id='s_type1' class="form-control input-sm" >
                  <option disabled selected>Select Dzongkhag</option>
                  <?php 
                  $dzongkhag=App\dzongkhag::all();
                  foreach($dzongkhag as $dzo):
                  ?>
                  <option value="{{$dzo->dzongkhag_id}}"
                  <?php 
                  if($dzo->dzongkhag_id == $doo->s_dzongkhag){?> selected <?php } ?> >
                  {{$dzo->dzongkhag_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select></dd>             
             <dt>Dungkhag:</dt>            
             <dd><input type="text" class="form-control" id="s_dungkhag" name="s_dungkhag" value="{{ $doo->s_dungkhag }}"></dd>             
             <dt>Gewog:</dt>
             <dd><select name='s_gewog' id='s_gewog' class="form-control input-sm">
                  <option disabled selected>Select Gewog</option>
                  <?php 
                  $gewog=App\gewog::all();
                  foreach($gewog as $g):
                  ?>
                  <option value="{{$g->gewog_id}}"
                  <?php 
                  if($g->gewog_id == $doo->s_gewog){?> selected <?php } ?> >
                  {{$g->gewog_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select>
             </dd>
             <dt>Village:</dt>
             <dd><select name='s_village' id='s_village' class="form-control input-sm" >
                  <option disabled selected>Select village</option>
                  <?php 
                  $village=App\village::all();
                  foreach($village as $v):
                  ?>
                  <option value="{{$v->village_id}}"
                  <?php 
                  if($v->village_id == $doo->s_village){?> selected <?php } ?> >
                  {{$v->village_name}}
                  </option>
                  <?php 
                    endforeach
                  ?>
                </select></dd>
             <dt>House Number:</dt>
             <dd><input type="text" class="form-control" id="s_houseno" name="s_houseno" value="{{ $doo->s_houseno }}"></dd>
             <dt>Thram Number:</dt>
             <dd><input type="text" class="form-control" id="s_thramno" name="s_thramno" value="{{ $doo->s_thramno }}"></dd>
             <dt>Date Of Birth:</dt>
             <dd><input type="date" class="form-control" id="s_dob" name="s_dob" value="{{ $doo->s_dob }}"></dd>
             <dt>Qualification:</dt>
             <dd><input type="text" class="form-control" id="s_qualification" name="s_qualification" value="{{ $doo->s_qualification }}"></dd>
             <dt>Phone Number:</dt>
             <dd><input type="text" class="form-control" id="s_phoneno" name="s_phoneno" value="{{ $doo->s_phoneno }}"></dd>
             <dt>Email:</dt>
             <dd><input type="text" class="form-control" id="s_email" name="s_email" value="{{ $doo->s_email }}"></dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd><input type="date" class="form-control" id="s_appdate" name="s_appdate" value="{{ $doo->s_appdate }}"></dd>         
<?php $ppdc=$doo->s_photo; ?>
@if($ppdc=='')
<div class="form-group input-group-sm">
<label for="photo">Upload Passport Photo:</label>
<input type="file" name="ephotos" class="form-control" value="{{$ppdc}}" id='ephotos'>
</div>
@else
<div class="form-group input-group-sm">
<label for="photo">Upload Passport Photo:</label>
<input type="text" class="form-control" value="{{$ppdc}}">
</div>
@endif
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{$ppdc}}
@if($ppdc == '')
No Photo!
@else
<a href="{{asset('/images/'.$ppdc)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
<a href="{{ route('delete_photos', array($doo->id, $doo->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i>Delete</a><br>
@endif      



    </div>

             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Deputy Secretary Details</h6></div>

          <div class="card-body">
             <dt>Name:</dt>
             <dd><input type="text" class="form-control" id="ds_name" name='ds_name' value="{{ $doo->ds_name }}"></dd>
             <dt>Dzongkhag:</dt>
             <dd><select name='ds_type1' id='ds_type1' class="form-control input-sm" >
                  <option disabled selected>Select Dzongkhag</option>
                  <?php 
                  $dzongkhag=App\dzongkhag::all();
                  foreach($dzongkhag as $dzo):
                  ?>
                  <option value="{{$dzo->dzongkhag_id}}"
                  <?php 
                  if($dzo->dzongkhag_id == $doo->ds_dzongkhag){?> selected <?php } ?> >
                  {{$dzo->dzongkhag_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select></dd>
             <dt>Dungkhag:</dt>            
             <dd><input type="text" class="form-control" id="ds_dungkhag" name="ds_dungkhag" value="{{ $doo->ds_dungkhag }}"></dd>             
             <dt>Gewog:</dt>
             <dd><select name='ds_gewog' id='ds_gewog' class="form-control input-sm">
                  <option disabled selected>Select Gewog</option>
                  <?php 
                  $gewog=App\gewog::all();
                  foreach($gewog as $g):
                  ?>
                  <option value="{{$g->gewog_id}}"
                  <?php 
                  if($g->gewog_id == $doo->ds_gewog){?> selected <?php } ?> >
                  {{$g->gewog_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select>
             </dd>
             <dt>Village:</dt>
             <dd><select name='ds_village' id='ds_village' class="form-control input-sm" >
                  <option disabled selected>Select village</option>
                  <?php 
                  $village=App\village::all();
                  foreach($village as $v):
                  ?>
                  <option value="{{$v->village_id}}"
                  <?php 
                  if($v->village_id == $doo->ds_village){?> selected <?php } ?> >
                  {{$v->village_name}}
                  </option>
                  <?php 
                    endforeach
                  ?>
                </select>
             </dd>
             <dt>House Number:</dt>
             <dd><input type="text" class="form-control" id="ds_houseno" name="ds_houseno" value="{{ $doo->ds_houseno }}"></dd>
             <dt>Thram Number:</dt>
             <dd><input type="text" class="form-control" id="ds_thramno" name="ds_thramno" value="{{ $doo->ds_thramno }}"></dd>
             <dt>Date Of Birth:</dt>
             <dd><input type="date" class="form-control" id="ds_dob" name="ds_dob" value="{{ $doo->ds_dob }}"></dd>
             <dt>Qualification:</dt>
             <dd><input type="text" class="form-control" id="ds_qualification" name="ds_qualification" value="{{ $doo->ds_qualification }}"></dd>
             <dt>Phone Number:</dt>
             <dd><input type="text" class="form-control" id="ds_phoneno" name="ds_phoneno" value="{{ $doo->ds_phoneno }}"></dd>
             <dt>Email:</dt>
             <dd><input type="text" class="form-control" id="ds_email" name="ds_email" value="{{ $doo->ds_email }}"></dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd><input type="date" class="form-control" id="ds_appdate" name="ds_appdate" value="{{ $doo->ds_appdate }}"></dd>         
      

<?php $ppdc=$doo->ds_photo; ?>
@if($ppdc=='')
<div class="form-group input-group-sm">
<label for="photo">Upload Passport Photo:</label>
<input type="file" name="ephotods" class="form-control" value="{{$ppdc}}" id='ephotods'>
</div>
@else
<div class="form-group input-group-sm">
<label for="photo">Upload Passport Photo:</label>
<input type="text" class="form-control" value="{{$ppdc}}">
</div>
@endif
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{$ppdc}}
@if($ppdc == '')
No Photo!
@else
<a href="{{asset('/images/'.$ppdc)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
<a href="{{ route('delete_photods', array($doo->id, $doo->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i>Delete</a><br>
@endif



    </div>

             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Treasurer Details</h6></div>

          <div class="card-body">
             <dt>Name:</dt>
             <dd><input type="text" class="form-control" id="td_name" name='td_name' value="{{ $doo->t_name }}"></dd>
             <dt>Dzongkhag:</dt>
             <dd><select name='td_type1' id='td_type1' class="form-control input-sm" >
                  <option disabled selected>Select Dzongkhag</option>
                  <?php 
                  $dzongkhag=App\dzongkhag::all();
                  foreach($dzongkhag as $dzo):
                  ?>
                  <option value="{{$dzo->dzongkhag_id}}"
                  <?php 
                  if($dzo->dzongkhag_id == $doo->t_dzongkhag){?> selected <?php } ?> >
                  {{$dzo->dzongkhag_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select></dd>         
             <dt>Dungkhag:</dt>            
             <dd><input type="text" class="form-control" id="td_dungkhag" name="td_dungkhag" value="{{ $doo->t_dungkhag }}"></dd>             
             <dt>Gewog:</dt>
             <dd><select name='td_gewog' id='td_gewog' class="form-control input-sm">
                  <option disabled selected>Select Gewog</option>
                  <?php 
                  $gewog=App\gewog::all();
                  foreach($gewog as $g):
                  ?>
                  <option value="{{$g->gewog_id}}"
                  <?php 
                  if($g->gewog_id == $doo->t_gewog){?> selected <?php } ?> >
                  {{$g->gewog_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select>
             </dd>
             <dt>Village:</dt>
             <dd><select name='td_village' id='td_village' class="form-control input-sm" >
                  <option disabled selected>Select village</option>
                  <?php 
                  $village=App\village::all();
                  foreach($village as $v):
                  ?>
                  <option value="{{$v->village_id}}"
                  <?php 
                  if($v->village_id == $doo->t_illage){?> selected <?php } ?> >
                  {{$v->village_name}}
                  </option>
                  <?php 
                    endforeach
                  ?>
                </select></dd>
             <dt>House Number:</dt>
             <dd><input type="text" class="form-control" id="td_houseno" name="td_houseno" value="{{ $doo->t_houseno }}"></dd>
             <dt>Thram Number:</dt>
             <dd><input type="text" class="form-control" id="td_thramno" name="td_thramno" value="{{ $doo->t_thramno }}"></dd>
             <dt>Date Of Birth:</dt>
             <dd><input type="date" class="form-control" id="td_dob" name="td_dob" value="{{ $doo->t_dob }}"></dd>
             <dt>Qualification:</dt>
             <dd><input type="text" class="form-control" id="td_qualification" name="td_qualification" value="{{ $doo->t_qualification }}"></dd>
             <dt>Phone Number:</dt>
             <dd><input type="text" class="form-control" id="td_phoneno" name="td_phoneno" value="{{ $doo->t_phoneno }}"></dd>
             <dt>Email:</dt>
             <dd><input type="text" class="form-control" id="td_email" name="td_email" value="{{ $doo->t_email }}"></dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd><input type="date" class="form-control" id="td_appdate" name="td_appdate" value="{{ $doo->t_appdate }}"></dd>         
      


<?php $ppdc=$doo->t_photo; ?>
@if($ppdc=='')
<div class="form-group input-group-sm">
<label for="photo">Upload Passport Photo:</label>
<input type="file" name="ephotot" class="form-control" value="{{$ppdc}}" id='ephotot'>
</div>
@else
<div class="form-group input-group-sm">
<label for="photo">Upload Passport Photo:</label>
<input type="text" class="form-control" value="{{$ppdc}}">
</div>
@endif
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{$ppdc}}
@if($ppdc == '')
No Photo!
@else
<a href="{{asset('/images/'.$ppdc)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>Preview</a>
<a href="{{ route('delete_photot', array($doo->id, $doo->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i>Delete</a><br>
@endif




    </div>

             </dl>
        </div>  
        </div>

        <div class="col-md-6">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Uploaded Documents</h6></div>
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
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'cd')
             <b>Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
              <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'dcd')
             <b>Deputy Chairman Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
              <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'sd')
             <b>Secretary Detail:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
              <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'dsd')
             <b>Deputy Secretary Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
              <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>>
             @elseif($dd->filecat == 'td')
             <b>Treasurer Details:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
              <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
             @elseif($dd->filecat == 'ass')
             <b>Assurance:</b>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
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
<input type="hidden" name="edit_id" id='edit_id'>
<div class="col-md-12" "modal-footer">
<button type="submit" class="btn btn-primary btn-bg">Submit Changes</button>
</div> 
 @endforeach        
    </div>
    </div>
    </section> 
    </form>   
    </div> 
</div> 



@endif





<div class="col-md-12"> 
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_updatedinfo', $ro_id) }}" onSubmit="return validateThisFrom (this);">
{{ csrf_field() }}       
@if(Auth::user()->role_id == '2')        
<!--Assessment-->
        <div class="card" style="background-image: linear-gradient(to bottom right,  #93bab9, #678584);">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
                <div class="col-md-6">
             <div class="card-header"><h6 class="card-title">Assessment/Review Decision</h6></div>
          <div class="card-body">
             <dt>Assessment Decision:<font color="red">*</font></dt>
             <dd>
             <select  name="approve" id="approve"  class="form-control" required="required"/>
                <option value="">- select -</option>                        
                <option value="1">Approve</option>
                <option value="2">Reject</option>   
             </select>
             </dd> 
             <dt>Remarks:</dt>
             <dd><textarea id="remarks" type="text" class="form-control" name="remarks" rows="4" placeholder="Remarks ..."></textarea></dd>
          </div>
             <input type="hidden" name="edit_id" id='edit_id'>
             <div class="col-md-12" "modal-footer">
             <button type="submit" class="btn btn-success btn-bg" style="float:left;">Save Assessment</button>
             </div></div> 
             </dl>
        </div> 
<!--Assess End--> 
@else
@endif
</div>

</form>            
 
    
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
