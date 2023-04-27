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
            <h5 class="m-0 text-dark">RO Application Review</h5>
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
<div class="card"><br>
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_ro', $ro_id) }}">
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
          @foreach($cd as $d)   
          <div class="card-body">
            <div class="text-center">
            <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$d->photo") }}"
            alt="profile picture">
            </div>
             <dt>Name:</dt>
             <dd>{{ $d->name }}</dd>
             <dt>Dzongkhag:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $d->dzongkhag)->value('dzongkhag_name'); ?></dd>         
             <dt>Dungkhag:</dt>            
             <dd>{{ $d->dungkhag }}</dd>             
             <dt>Gewog:</dt>
             <dd><?php echo $c = App\gewog::where('gewog_id', $d->gewog)->value('gewog_name'); ?></dd>
             <dt>Village:</dt>
             <dd><?php echo $c = App\village::where('village_id', $d->village)->value('village_name'); ?></dd>
             <dt>House Number:</dt>
             <dd>{{ $d->houseno }}</dd>
             <dt>Thram Number:</dt>
             <dd>{{ $d->thramno }}</dd>
             <dt>Date Of Birth:</dt>
             <dd>{{ $d->dob }}</dd>
             <dt>Qualification:</dt>
             <dd>{{ $d->qualification }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $d->phoneno }}</dd>
             <dt>Email:</dt>
             <dd>{{ $d->email }}</dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd>{{ $d->appdate }}</dd>         
          
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
          @foreach($dcd as $dda)
          <div class="card-body">
             <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$dda->photo") }}" alt="profile picture">
             </div>
             <dt>Name:</dt>
             <dd>{{ $dda->name }}</dd>
             <dt>Dzongkhag:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $dda->dzongkhag)->value('dzongkhag_name'); ?></dd>      
             <dt>Dungkhag:</dt>            
             <dd>{{ $dda->dungkhag }}</dd>             
             <dt>Gewog:</dt>
             <dd><?php echo $c = App\gewog::where('gewog_id', $dda->gewog)->value('gewog_name'); ?>
             </dd>
             <dt>Village:</dt>
             <dd><?php echo $c = App\village::where('village_id', $dda->village)->value('village_name'); ?></dd>
             <dt>House Number:</dt>
             <dd>{{ $dda->houseno }}</dd>
             <dt>Thram Number:</dt>
             <dd>{{ $dda->thramno }}</dd>
             <dt>Date Of Birth:</dt>
             <dd>{{ $dda->dob }}</dd>
             <dt>Qualification:</dt>
             <dd>{{ $dda->qualification }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $dda->phoneno }}</dd>
             <dt>Email:</dt>
             <dd>{{ $dda->email }}</dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd>{{ $dda->appdate }}</dd>         
         
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
          @foreach($sd as $ddd)
          <div class="card-body">
             <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$ddd->photo") }}" alt="profile picture">
             </div>
             <dt>Name:</dt>
             <dd>{{ $ddd->name }}</dd>
             <dt>Dzongkhag:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $ddd->dzongkhag)->value('dzongkhag_name'); ?></dd>             
             <dt>Dungkhag:</dt>            
             <dd>{{ $ddd->dungkhag }}</dd>             
             <dt>Gewog:</dt>
             <dd><?php echo $c = App\gewog::where('gewog_id', $ddd->gewog)->value('gewog_name'); ?>
             </dd>
             <dt>Village:</dt>
             <dd><?php echo $c = App\village::where('village_id', $ddd->village)->value('village_name'); ?></dd>
             <dt>House Number:</dt>
             <dd>{{ $ddd->houseno }}</dd>
             <dt>Thram Number:</dt>
             <dd>{{ $ddd->thramno }}</dd>
             <dt>Date Of Birth:</dt>
             <dd>{{ $ddd->dob }}</dd>
             <dt>Qualification:</dt>
             <dd>{{ $ddd->qualification }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $ddd->phoneno }}</dd>
             <dt>Email:</dt>
             <dd>{{ $ddd->email }}</dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd>{{ $ddd->appdate }}</dd>         
         
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
          @foreach($dsd as $dddd)
          <div class="card-body">
             <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$dddd->photo") }}" alt="profile picture">
             </div>
             <dt>Name:</dt>
             <dd>{{ $dddd->name }}</dd>
             <dt>Dzongkhag:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $dddd->dzongkhag)->value('dzongkhag_name'); ?></dd>
             <dt>Dungkhag:</dt>            
             <dd>{{ $dddd->dungkhag }}</dd>             
             <dt>Gewog:</dt>
             <dd> <?php echo $c = App\gewog::where('gewog_id', $dddd->gewog)->value('gewog_name'); ?>  </dd>
             <dt>Village:</dt>
             <dd><?php echo $c = App\village::where('village_id', $dddd->village)->value('village_name'); ?></dd>
             <dt>House Number:</dt>
             <dd>{{ $dddd->houseno }}</dd>
             <dt>Thram Number:</dt>
             <dd>{{ $dddd->thramno }}</dd>
             <dt>Date Of Birth:</dt>
             <dd>{{ $dddd->dob }}</dd>
             <dt>Qualification:</dt>
             <dd>{{ $dddd->qualification }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $dddd->phoneno }}</dd>
             <dt>Email:</dt>
             <dd>{{ $dddd->email }}</dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd>{{ $dddd->appdate }}</dd>         
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
          @foreach($td as $ddddd)
          <div class="card-body">
            <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$ddddd->photo") }}" alt="profile picture">
             </div>
             <dt>Name:</dt>
             <dd>{{ $ddddd->name }}</dd>
             <dt>Dzongkhag:</dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $ddddd->dzongkhag)->value('dzongkhag_name'); ?></dd>         
             <dt>Dungkhag:</dt>            
             <dd>{{ $ddddd->dungkhag }}</dd>             
             <dt>Gewog:</dt>
             <dd><?php echo $c = App\gewog::where('gewog_id', $ddddd->gewog)->value('gewog_name'); ?>
             </dd>
             <dt>Village:</dt>
             <dd><?php echo $c = App\village::where('village_id', $ddddd->village)->value('village_name'); ?></dd>
             <dt>House Number:</dt>
             <dd>{{ $ddddd->houseno }}</dd>
             <dt>Thram Number:</dt>
             <dd>{{ $ddddd->thramno }}</dd>
             <dt>Date Of Birth:</dt>
             <dd>{{ $ddddd->dob }}</dd>
             <dt>Qualification:</dt>
             <dd>{{ $ddddd->qualification }}</dd>
             <dt>Phone Number:</dt>
             <dd>{{ $ddddd->phoneno }}</dd>
             <dt>Email:</dt>
             <dd>{{ $ddddd->email }}</dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd>{{ $ddddd->appdate }}</dd>         

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



          

    </div>
    </div>
    </section> 
    </form>   
    </div> 
</div> 




<div class="col-md-12"> 
<div class="card">
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_ro', $ro_id) }}" onSubmit="return validateThisFrom (this);">
@foreach($app as $ag)      
<input type="hidden" name="agency" value="{{$ag->name}}">
<input type="hidden" name="organization" value="<?php echo $c = App\tbl_agency::where('agency', $ag->name)->value('id'); ?>">
<input type="hidden" name="dzongkhag" value="{{$ag->dzongkhag}}">
<input type="hidden" name="email" value="{{$ag->email}}">
@endforeach
{{ csrf_field() }}       
@if(Auth::user()->role_id == '2')        
<!--Assessment-->
        <div class="card" style="background-image: linear-gradient(to bottom right,  #f7c443, #fcbe21);">              
        {{ csrf_field() }}
        <dl class="dl-horizontal">
        <div class="col-md-6">
             <div class="card-header"><h6 class="card-title">Assessment/Review Decision</h6></div>
        <div class="card-body">
             <dt>Assessment Decision:</dt><font color="red">*</font>
             <dd>
             <select  name="approve" id="approve"  class="form-control" required="required">
                <option value="">- select -</option>                        
                <option value="1">Approve</option>
                <option value="2">Reject</option>   
             </select>
             </dd> 
             <dt>Remarks:</dt>
             <dd><textarea id="remarks" type="text" class="form-control" name="remarks" rows="4" placeholder="Remarks ..."></textarea></dd>
             <dt>Attach Order:</dt>
             <dd><input type="file" id="exampleInputFile8"  class="form-control" name="order[]" multiple=""></dd>
        </div>
             <input type="hidden" name="edit_id" id='edit_id'>
             <div class="col-md-12" "modal-footer">
             <button type="submit" class="btn btn-success btn-bg" style="float:left;">Save Assessment</button>
             </div>
        </div> 
        </dl>
        </div> 
<!--Assess End--> 
@else
@endif
</form>
</div>

</div>            
 
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
        if (thisForm.approve.value == "") {
            alert("Please Provide Assessment Decision");
            thisForm.approve.focus();
            return false;
        }      
    }
 
</script>
