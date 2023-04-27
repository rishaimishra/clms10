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
            <h5 class="m-0 text-dark">Edit Subsidiary/Branch Details</h5>
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
@foreach($chapter as $doo)
 @if($doo->approve == '2') 
 Status:REJECTED<br>
 REMARKS:{{ $doo->remarks }} 
 @endif
@endforeach
<div class="col-md-12">
<div class="card"><br>
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_chapter', $chapter_id) }}">
<input type="hidden" name="chapter_id" value="{{$chapter_id}}">
<input type="hidden" name="detties" value="{{Auth::user()->organization}}">
{{ csrf_field() }}
    <section class="content">
    <div class="container-fluid">
    <div class="row">

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Subsidiary/Branch</h6></div>
          @foreach($chapter as $doo)
          <div class="card-body">
             <dt>Subsidiary/Branch Name:</dt>
             <dd><input type="text" class="form-control" id="chapter_name" name='chapter_name' value="{{ $doo->chapter_name }}"></dd>
             <dt>Institute Type:</dt>
             <dd><select class="form-control" name="branchtype" id="branchtype" value="{{ $doo->branchtype }}">
                 <option value="{{ $doo->branchtype }}"><?php if($doo->branchtype == '1')
                  {echo 'Drubdey';}
                  elseif($doo->branchtype == '2')
                  {echo 'Shedra';}
                  elseif($doo->branchtype == '3')
                  {echo 'Lobdra';}
                  elseif($doo->branchtype == '4')
                  {echo 'Gomdey';}
                  elseif($doo->branchtype == '5')
                  {echo 'Gyendra';}
                  elseif($doo->branchtype == '6')
                  {echo 'Others';}?></option>
                 <option value="1">Drubdey</option>
                 <option value="2">Shedra</option>
                 <option value="3">Lobdra</option>
                 <option value="4">Gomdey</option>
                 <option value="5">Gyendra</option>
                 <option value="6">Others</option>
             </select></dd>
             <p>Official Address</p>
             <dt>Dzongkhag/Thromde:</dt>
             <dd>
                <select class='form-control' name='type' id="type" required>
                    <option disabled selected>Select Dzongkhag</option>
                    <?php 
                    $dzongkhag=App\dzongkhag::all();
                    foreach($dzongkhag as $dzongkhags):
                    ?>
                    <option value="{{$doo->dzongkhag}}"
                    <?php 
                    if($dzongkhags->dzongkhag_id == $doo->dzongkhag){?> selected <?php } ?> >
                    {{$dzongkhags->dzongkhag_name}}</option>
                    <?php endforeach ?>
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
             <dt>Objective:</dt>
             <dd><input type="text" class="form-control" id="objective" name="objective" value="{{ $doo->objective }}"></dd>         
          </div>
          @endforeach

<div class="form-group input-group-sm">
<label for="chairman">Upload New Application:</label>
<input type="file" id="exampleInputFile1"  class="form-control" name="app[]" multiple="">
</div>
Uploaded Application:<br>
@foreach($rd as $dd)
  @if($dd->filecat == 'app')
  <dd>{{ $dd->file_name }}
  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
  <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
  <a href="{{ route('delete_chapterdoc', array($dd->id,$chapter_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a>
  </dd><br>
@endif
@endforeach
<div class="form-group input-group-sm">
<label for="chairman">Upload New Assurance:</label>
<input type="file" id="exampleInputFile8"  class="form-control" name="ass[]" multiple="">
</div>
Uploaded Assurance:<br>
@foreach($rd as $dd)
  @if($dd->filecat == 'ass')
  <dd>{{ $dd->file_name }}
  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
  <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
  <a href="{{ route('delete_chapterdoc', array($dd->id,$chapter_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a>
  </dd><br>
@endif
@endforeach
<div class="form-group input-group-sm">
<label for="chairman">Upload New Documents:</label>
<input type="file" id="exampleInputFile7"  class="form-control" name="aoa[]" multiple="">
</div>
Uploaded Documents:<br>
@foreach($rd as $dd)
  @if($dd->filecat == 'aoa')
  <dd>{{ $dd->file_name }}</dd>
  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
  <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
  <a href="{{ route('delete_chapterdoc', array($dd->id,$chapter_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a>
  </dd><br>
@endif
@endforeach
  
             </dl>
        </div>  
        </div> 

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Chairman Details</h6></div>
          @foreach($cd as $d)   
          <div class="card-body">           
            <div class="text-center">
            <img class="profile-user-img img-fluid" src="{{ asset("/images/$d->photo") }}" alt="User profile picture">
            </div>
             <dt>Name:</dt>
             <dd><input type="text" class="form-control" id="cname" name='cname' value="{{ $d->name }}"></dd>
             <dt>Dzongkhag:</dt>
             <dd><select name='ctype1' id='ctype1' class="form-control input-sm" >
                  <option disabled selected><?php echo $cd =  App\tbl_chairman_detail::where('chapter_id', $chapter_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('dzongkhag');?></option>
                  <?php 
                  $dzongkhag=App\dzongkhag::all();
                  foreach($dzongkhag as $dzo):
                  ?>
                  <option value="{{$dzo->dzongkhag_id}}"
                  <?php 
                  if($dzo->dzongkhag_id == $d->dzongkhag){?> selected <?php } ?> >
                  {{$dzo->dzongkhag_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select>
             </dd>         
             <dt>Dungkhag:</dt>            
             <dd><input type="text" class="form-control" id="cdungkhag" name="cdungkhag" value="{{ $d->dungkhag }}"></dd>             
             <dt>Gewog:</dt>
             <dd><select name='cgewog' id='cgewog' class="form-control input-sm">
                  <option disabled selected><?php echo $cd =  App\tbl_chairman_detail::where('chapter_id', $chapter_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('gewog');?></option>
                  <?php 
                  $gewog=App\gewog::all();
                  foreach($gewog as $g):
                  ?>
                  <option value="{{$g->gewog_id}}"
                  <?php 
                  if($g->gewog_id == $d->gewog){?> selected <?php } ?> >
                  {{$g->gewog_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select></dd>
             <dt>Village:</dt>
             <dd><select name='cvillage' id='cvillage' class="form-control input-sm" >
                  <option disabled selected><?php echo $cd =  App\tbl_chairman_detail::where('chapter_id', $chapter_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('village');?></option>
                  <?php 
                  $village=App\village::all();
                  foreach($village as $v):
                  ?>
                  <option value="{{$v->village_id}}"
                  <?php 
                  if($v->village_id == $d->village){?> selected <?php } ?> >
                  {{$v->village_name}}
                  </option>
                  <?php 
                    endforeach
                  ?>
                </select>
             </dd>
             <dt>House Number:</dt>
             <dd><input type="text" class="form-control" id="chouseno" name="chouseno" value="{{ $d->houseno }}"></dd>
             <dt>Thram Number:</dt>
             <dd><input type="text" class="form-control" name="cthramno" id="cthramno" value="{{ $d->thramno }}"></dd>
             <dt>Date Of Birth:</dt>
             <dd><input type="date" class="form-control" id="cdob" name="cdob" value="{{ $d->dob }}"></dd>
             <dt>Qualification:</dt>
             <dd><input type="text" class="form-control" id="cqualification" name="cqualification" value="{{ $d->qualification }}"></dd>
             <dt>Phone Number:</dt>
             <dd><input type="text" class="form-control" id="cphoneno" name="cphoneno" value="{{ $d->phoneno }}"></dd>
             <dt>Email:</dt>
             <dd><input type="text" class="form-control" id="cemail" name="cemail" value="{{ $d->email }}"></dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd><input type="date" class="form-control" id="cappdate" name="cappdate" value="{{ $d->appdate }}"></dd>  
             <dt>Photo:</dt>
             <dd><input type="text" class="form-control" id="cphoto" name="cphoto" value="{{ $d->photo }}"></dd> 
             <dt>Upload New Photo:</dt>
             <dd><input type="file" class="form-control" id="cnewphoto" name="cnewphoto"></dd>
          </div>
          @endforeach

<div class="form-group input-group-sm">
<label for="chairman">Upload Chairman Documents:</label>
<input type="file" id="exampleInputFile1"  class="form-control" name="cd[]" multiple="">
</div>
Uploaded Documents:<br>
@foreach($rdcd as $dd)
@if($dd->filecat == 'cd')
  <dd>{{ $dd->file_name }}
  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
  <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
  <a href="{{ route('delete_chapterdoc', array($dd->id,$chapter_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a>
  </dd><br>
@endif
@endforeach
             </dl>
        </div>  
        </div> 

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Secretary Details</h6></div>
          @foreach($sd as $ddd)
          <div class="card-body">
            
            <div class="text-center">
            <img class="profile-user-img img-fluid" src="{{ asset("/images/$ddd->photo") }}" alt="User profile picture">
            </div>

             <dt>Name:</dt>
             <dd><input type="text" class="form-control" id="s_name" name='s_name' value="{{ $ddd->name }}"></dd>
             <dt>Dzongkhag:</dt>
             <dd><select name='s_type1' id='s_type1' class="form-control input-sm" >
                  <option disabled selected><?php echo $cd =  App\tbl_secretary_detail::where('chapter_id', $chapter_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('dzongkhag');?></option>
                  <?php 
                  $dzongkhag=App\dzongkhag::all();
                  foreach($dzongkhag as $dzo):
                  ?>
                  <option value="{{$dzo->dzongkhag_id}}"
                  <?php 
                  if($dzo->dzongkhag_id == $ddd->dzongkhag){?> selected <?php } ?> >
                  {{$dzo->dzongkhag_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select></dd>             
             <dt>Dungkhag:</dt>            
             <dd><input type="text" class="form-control" id="s_dungkhag" name="s_dungkhag" value="{{ $ddd->dungkhag }}"></dd>             
             <dt>Gewog:</dt>
             <dd><select name='s_gewog' id='s_gewog' class="form-control input-sm">
                  <option disabled selected><?php echo $cd =  App\tbl_secretary_detail::where('chapter_id', $chapter_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('gewog');?></option>
                  <?php 
                  $gewog=App\gewog::all();
                  foreach($gewog as $g):
                  ?>
                  <option value="{{$g->gewog_id}}"
                  <?php 
                  if($g->gewog_id == $ddd->gewog){?> selected <?php } ?> >
                  {{$g->gewog_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select>
             </dd>
             <dt>Village:</dt>
             <dd><select name='s_village' id='s_village' class="form-control input-sm" >
                  <option disabled selected><?php echo $cd =  App\tbl_secretary_detail::where('chapter_id', $chapter_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('village');?></option>
                  <?php 
                  $village=App\village::all();
                  foreach($village as $v):
                  ?>
                  <option value="{{$v->village_id}}"
                  <?php 
                  if($v->village_id == $ddd->village){?> selected <?php } ?> >
                  {{$v->village_name}}
                  </option>
                  <?php 
                    endforeach
                  ?>
                </select></dd>
             <dt>House Number:</dt>
             <dd><input type="text" class="form-control" id="s_houseno" name="s_houseno" value="{{ $ddd->houseno }}"></dd>
             <dt>Thram Number:</dt>
             <dd><input type="text" class="form-control" id="s_thramno" name="s_thramno" value="{{ $ddd->thramno }}"></dd>
             <dt>Date Of Birth:</dt>
             <dd><input type="date" class="form-control" id="s_dob" name="s_dob" value="{{ $ddd->dob }}"></dd>
             <dt>Qualification:</dt>
             <dd><input type="text" class="form-control" id="s_qualification" name="s_qualification" value="{{ $ddd->qualification }}"></dd>
             <dt>Phone Number:</dt>
             <dd><input type="text" class="form-control" id="s_phoneno" name="s_phoneno" value="{{ $ddd->phoneno }}"></dd>
             <dt>Responsibility:</dt>
             <dd><input type="text" class="form-control" id="s_responsibility" name="s_responsibility" value="{{ $ddd->responsibility }}"></dd>
             <dt>Email:</dt>
             <dd><input type="text" class="form-control" id="s_email" name="s_email" value="{{ $ddd->email }}"></dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd><input type="date" class="form-control" id="s_appdate" name="s_appdate" value="{{ $ddd->appdate }}"></dd>   
             <dt>Photo:</dt>
             <dd><input type="text" class="form-control" id="s_photo" name="s_photo" value="{{ $ddd->photo }}"></dd> 
             <dt>Upload New Photo:</dt>
             <dd><input type="file" class="form-control" id="s_newphoto" name="s_newphoto"></dd>
          </div>
          @endforeach
<div class="form-group input-group-sm">
<label for="chairman">Upload Secretary Documents:</label>
<input type="file" id="exampleInputFile1"  class="form-control" name="sd[]" multiple="">
</div>
Uploaded Documents:<br>
@foreach($rdsd as $dd)
@if($dd->filecat == 'sd')
  <dd>{{ $dd->file_name }}
  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
  <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
  <a href="{{ route('delete_chapterdoc', array($dd->id,$chapter_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a>
  </dd><br>
@endif
@endforeach
             </dl>
        </div>  
        </div>

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title">Treasurer Details</h6></div>
          @foreach($td as $ddddd)
          <div class="card-body">

            <div class="text-center">
             <img class="profile-user-img img-fluid" src="{{ asset("/images/$ddddd->photo") }}" alt="User profile picture">
             </div>

             <dt>Name:</dt>
             <dd><input type="text" class="form-control" id="td_name" name='td_name' value="{{ $ddddd->name }}"></dd>
             <dt>Dzongkhag:</dt>
             <dd><select name='td_type1' id='td_type1' class="form-control input-sm" >
                  <option disabled selected><?php echo $cd =  App\tbl_treasurer_detail::where('chapter_id', $chapter_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('dzongkhag');?></option>
                  <?php 
                  $dzongkhag=App\dzongkhag::all();
                  foreach($dzongkhag as $dzo):
                  ?>
                  <option value="{{$dzo->dzongkhag_id}}"
                  <?php 
                  if($dzo->dzongkhag_id == $ddddd->dzongkhag){?> selected <?php } ?> >
                  {{$dzo->dzongkhag_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select></dd>         
             <dt>Dungkhag:</dt>            
             <dd><input type="text" class="form-control" id="td_dungkhag" name="td_dungkhag" value="{{ $ddddd->dungkhag }}"></dd>             
             <dt>Gewog:</dt>
             <dd><select name='td_gewog' id='td_gewog' class="form-control input-sm">
                  <option disabled selected><?php echo $cd =  App\tbl_treasurer_detail::where('chapter_id', $chapter_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('gewog');?></option>
                  <?php 
                  $gewog=App\gewog::all();
                  foreach($gewog as $g):
                  ?>
                  <option value="{{$g->gewog_id}}"
                  <?php 
                  if($g->gewog_id == $ddddd->gewog){?> selected <?php } ?> >
                  {{$g->gewog_name}}
                  </option>
                  <?php 
                  endforeach
                  ?>
                </select>
             </dd>
             <dt>Village:</dt>
             <dd><select name='td_village' id='td_village' class="form-control input-sm" >
                  <option disabled selected><?php echo $cd =  App\tbl_treasurer_detail::where('chapter_id', $chapter_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('village');?></option>
                  <?php 
                  $village=App\village::all();
                  foreach($village as $v):
                  ?>
                  <option value="{{$v->village_id}}"
                  <?php 
                  if($v->village_id == $ddddd->village){?> selected <?php } ?> >
                  {{$v->village_name}}
                  </option>
                  <?php 
                    endforeach
                  ?>
                </select></dd>
             <dt>House Number:</dt>
             <dd><input type="text" class="form-control" id="td_houseno" name="td_houseno" value="{{ $ddddd->houseno }}"></dd>
             <dt>Thram Number:</dt>
             <dd><input type="text" class="form-control" id="td_thramno" name="td_thramno" value="{{ $ddddd->thramno }}"></dd>
             <dt>Date Of Birth:</dt>
             <dd><input type="date" class="form-control" id="td_dob" name="td_dob" value="{{ $ddddd->dob }}"></dd>
             <dt>Qualification:</dt>
             <dd><input type="text" class="form-control" id="td_qualification" name="td_qualification" value="{{ $ddddd->qualification }}"></dd>
             <dt>Phone Number:</dt>
             <dd><input type="text" class="form-control" id="td_phoneno" name="td_phoneno" value="{{ $ddddd->phoneno }}"></dd>
             <dt>Responsibility:</dt>
             <dd><input type="text" class="form-control" id="td_responsibility" name="td_responsibility" value="{{ $ddddd->responsibility }}"></dd>
             <dt>Email:</dt>
             <dd><input type="text" class="form-control" id="td_email" name="td_email" value="{{ $ddddd->email }}"></dd>
             <dt>Date Of Election/Appointment:</dt>
             <dd><input type="date" class="form-control" id="td_appdate" name="td_appdate" value="{{ $ddddd->appdate }}"></dd> 
             <dt>Photo:</dt>
             <dd><input type="text" class="form-control" id="td_photo" name="td_photo" value="{{ $ddddd->photo }}"></dd> 
             <dt>Upload New Photo:</dt>
             <dd><input type="file" class="form-control" id="td_newphoto" name="td_newphoto"></dd>
          </div>
          @endforeach
<div class="form-group input-group-sm">
<label for="chairman">Upload Treasurer Documents:</label>
<input type="file" id="exampleInputFile1"  class="form-control" name="td[]" multiple="">
</div>
Uploaded Documents:<br>
@foreach($rdtd as $dd)
@if($dd->filecat == 'td')
  <dd>{{ $dd->file_name }}
  <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
  <i class="fa fa-fw fa-file-pdf"></i>Preview</a>
  <a href="{{ route('delete_chapterdoc', array($dd->id,$chapter_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a>
  </dd><br>
@endif
@endforeach
             </dl>
        </div>  
        </div>

<input type="hidden" name="edit_id" id='edit_id'>
<div class="col-md-12" "modal-footer">
<button type="submit" class="btn btn-primary btn-bg">Save Changes</button>
</div> 
          

    </div>
    </div>
    </section> 
    </form>   
    </div> 
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
        if (thisForm.approve.value == "") {
            alert("Please Provide Assessment Decision");
            thisForm.approve.focus();
            return false;
        }      
    }
 
</script>
