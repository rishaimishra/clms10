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
            <h5 class="m-0 text-dark">ཆོས་སྡེ་ཐོ་བཀོད་ཞུ་ཚིག་ཞུན་དག་རྐྱབ།</h5>
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
<div class="card"><br>
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_ro_dzo', $ro_id) }}">
<input type="hidden" name="ro_id" value="{{$ro_id}}">
{{ csrf_field() }}
    <section class="content">
    <div class="container-fluid">
    <div class="row">

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title"><h3>ཆོས་སྡེ་ཐོ་བཀོད་ཞུ་ཚིག</h3></h6></div>
          @foreach($app as $doo)
          <div class="card-body">
             <dt><h3>ཆོས་ཚོགས་ཀྱི་མཚན</h3></dt>
             <dd>{{ $doo->name }}</dd>
             <p><h3>ཡིག་ཚང་གི་ཁ་བྱང་།</h3></p>
             <dt><h3>རྫོང་ཁག</h3></dt>
             <dd><?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $doo->dzongkhag)->value('dzongkhag_name'); ?></dd> 
             <dt><h3>ས་གནས</h3></dt>            
             <dd>{{ $doo->location }}</dd>
             <dt><h3>འགྲེམ་སྒྲོམ་ཨང་</h3></dt>
             <dd>{{ $doo->postbox }}</dd>
             <dt><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></dt>
             <dd>{{ $doo->phone }}</dd>
             <dt><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></dt>
             <dd>{{ $doo->email }}</dd>   
             @endforeach
             <p style="color: orange;"><h3>ཟུར་དྲག་ཡིག་ཆ།</h3></p>
             @foreach($rd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'app')
             <h4>ཞུ་ཡིག</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @elseif($dd->filecat == 'ass')
             <h4>ཡིག་ཆ། ཡིག་རིགས།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a> 
             @elseif($dd->filecat == 'aoa')
             <h4>ཁས་ལེན།/བློ་གཏད།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
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

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></h6></div>
          @foreach($cd as $d)   
          <div class="card-body">
            <div class="text-center">
            <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$d->photo") }}" alt="profile picture">
            </div>
             <dt><h3>ངོ་མིང་།</h3></dt>
             <dd>{{ $d->name }}</dd>
             <dt><h3>རྫོང་ཁག།</h3></dt>
             <dd><?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $d->dzongkhag)->value('dzongkhag_name'); ?></dd>         
             <dt><h3>དྲུང་ཁག།</h3></dt>            
             <dd>{{ $d->dungkhag }}</dd>             
             <dt><h3>རྒེད་འོག།</h3></dt>
             <dd><?php echo $c = App\gewog_dzo::where('gewog_id', $d->gewog)->value('gewog_name'); ?></dd>
             <dt><h3>གཡུས།</h3></dt>
             <dd><?php echo $c = App\village_dzo::where('village_id', $d->village)->value('village_name'); ?></dd>
             <dt><h3>གུང་ཨང་།</h3></dt>
             <dd>{{ $d->houseno }}</dd>
             <dt><h3>ཁྲམ་ཨང་།</h3></dt>
             <dd>{{ $d->thramno }}</dd>
             <dt><h3>སྐྱེས་ཚེས།</h3></dt>
             <dd>{{ $d->dob }}</dd>
             <dt><h3>ཤེས་ཚད།</h3></dt>
             <dd>{{ $d->qualification }}</dd>
             <dt><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></dt>
             <dd>{{ $d->phoneno }}</dd>
             <dt><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></dt>
             <dd>{{ $d->email }}</dd>
             <dt><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས།</h3></dt>
             <dd>{{ $d->appdate }}</dd>         
          
@endforeach
<p style="color: orange;"><h3>ཟུར་དྲག་ཡིག་ཆ།</h3></p>
@foreach($rd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'cd')
             <h4>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
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

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title"><h3>ཁྲི་འཛིན་འོག་མ་གྱི་ཁ་གསལ། </h3></h6></div>
          @foreach($dcd as $dda)
          <div class="card-body">
             <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$dda->photo") }}" alt="profile picture">
             </div>
             <dt><h3>ངོ་མིང་།</h3></dt>
             <dd>{{ $dda->name }}</dd>
             <dt><h3>རྫོང་ཁག།</h3></dt>
             <dd><?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $dda->dzongkhag)->value('dzongkhag_name'); ?></dd>      
             <dt><h3>དྲུང་ཁག།</h3></dt>            
             <dd>{{ $dda->dungkhag }}</dd>             
             <dt><h3>རྒེད་འོག།</h3></dt>
             <dd><?php echo $c = App\gewog_dzo::where('gewog_id', $dda->gewog)->value('gewog_name'); ?>
             </dd>
             <dt><h3>གཡུས།</h3></dt>
             <dd><?php echo $c = App\village_dzo::where('village_id', $dda->village)->value('village_name'); ?></dd>
             <dt><h3>གུང་ཨང་།</h3></dt>
             <dd>{{ $dda->houseno }}</dd>
             <dt><h3>ཁྲམ་ཨང་།</h3></dt>
             <dd>{{ $dda->thramno }}</dd>
             <dt><h3>སྐྱེས་ཚེས།</h3></dt>
             <dd>{{ $dda->dob }}</dd>
             <dt><h3>ཤེས་ཚད།</h3></dt>
             <dd>{{ $dda->qualification }}</dd>
             <dt><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></dt>
             <dd>{{ $dda->phoneno }}</dd>
             <dt><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></dt>
             <dd>{{ $dda->email }}</dd>
             <dt><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས།</h3></dt>
             <dd>{{ $dda->appdate }}</dd>         
         
@endforeach
<p style="color: orange;"><h3>ཟུར་དྲག་ཡིག་ཆ།</h3></p>
@foreach($rd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'dcd')
             <h4>ཁྲི་འཛིན་འོག་མ་གྱི་ཁ་གསལ། </h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
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

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ། </h3></h6></div>
          @foreach($sd as $ddd)
          <div class="card-body">
             <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$ddd->photo") }}" alt="profile picture">
             </div>
             <dt><h3>ངོ་མིང་།</h3></dt>
             <dd>{{ $ddd->name }}</dd>
             <dt><h3>རྫོང་ཁག།</h3></dt>
             <dd><?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $ddd->dzongkhag)->value('dzongkhag_name'); ?></dd>             
             <dt><h3>དྲུང་ཁག།</h3></dt>            
             <dd>{{ $ddd->dungkhag }}</dd>             
             <dt><h3>རྒེད་འོག།</h3></dt>
             <dd><?php echo $c = App\gewog_dzo::where('gewog_id', $ddd->gewog)->value('gewog_name'); ?>
             </dd>
             <dt><h3>གཡུས།</h3></dt>
             <dd><?php echo $c = App\village_dzo::where('village_id', $ddd->village)->value('village_name'); ?></dd>
             <dt><h3>གུང་ཨང་།</h3></dt>
             <dd>{{ $ddd->houseno }}</dd>
             <dt><h3>ཁྲམ་ཨང་།</h3></dt>
             <dd>{{ $ddd->thramno }}</dd>
             <dt><h3>སྐྱེས་ཚེས།</h3></dt>
             <dd>{{ $ddd->dob }}</dd>
             <dt><h3>ཤེས་ཚད།</h3></dt>
             <dd>{{ $ddd->qualification }}</dd>
             <dt><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></dt>
             <dd>{{ $ddd->phoneno }}</dd>
             <dt><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></dt>
             <dd>{{ $ddd->email }}</dd>
             <dt><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས།</h3></dt>
             <dd>{{ $ddd->appdate }}</dd>         
         
          @endforeach
<p style="color: orange;"><h3>ཟུར་དྲག་ཡིག་ཆ།</h3></p>
@foreach($rd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'sd')
             <h4>དྲུང་ཆེན་གྱི་ཁ་གསལ། </h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
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

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title"><h3>དྲུང་ཆེན་འོག་མ་གྱི་ཁ་གསལ། </h3></h6></div>
          @foreach($dsd as $dddd)
          <div class="card-body">
             <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$dddd->photo") }}" alt="profile picture">
             </div>
             <dt><h3>ངོ་མིང་།</h3></dt>
             <dd>{{ $dddd->name }}</dd>
             <dt><h3>རྫོང་ཁག།</h3></dt>
             <dd><?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $dddd->dzongkhag)->value('dzongkhag_name'); ?></dd>
             <dt><h3>དྲུང་ཁག།</h3></dt>            
             <dd>{{ $dddd->dungkhag }}</dd>             
             <dt><h3>རྒེད་འོག།</h3></dt>
             <dd> <?php echo $c = App\gewog_dzo::where('gewog_id', $dddd->gewog)->value('gewog_name'); ?>  </dd>
             <dt><h3>གཡུས།</h3></dt>
             <dd><?php echo $c = App\village_dzo::where('village_id', $dddd->village)->value('village_name'); ?></dd>
             <dt><h3>གུང་ཨང་།</h3></dt>
             <dd>{{ $dddd->houseno }}</dd>
             <dt><h3>ཁྲམ་ཨང་།</h3></dt>
             <dd>{{ $dddd->thramno }}</dd>
             <dt><h3>སྐྱེས་ཚེས།</h3></dt>
             <dd>{{ $dddd->dob }}</dd>
             <dt><h3>ཤེས་ཚད།</h3></dt>
             <dd>{{ $dddd->qualification }}</dd>
             <dt><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></dt>
             <dd>{{ $dddd->phoneno }}</dd>
             <dt><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></dt>
             <dd>{{ $dddd->email }}</dd>
             <dt><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས།</h3></dt>
             <dd>{{ $dddd->appdate }}</dd>         
          @endforeach
<p style="color: orange;"><h3>ཟུར་དྲག་ཡིག་ཆ།</h3></p>
@foreach($rd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'dsd')
            <h4>དྲུང་ཆེན་འོག་མ་གྱི་ཁ་གསལ། </h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
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

        <div class="col-md-4">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h6 class="card-title"><h3>རྩིས་འཛིན་པ་བཅས་ཀྱི་ཁ་གསལ།</h3></h6></div>
          @foreach($td as $ddddd)
          <div class="card-body">
            <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 80px;width:80px;" src="{{ asset("/images/$ddddd->photo") }}" alt="profile picture">
             </div>
             <dt><h3>ངོ་མིང་།</h3></dt>
             <dd>{{ $ddddd->name }}</dd>
             <dt><h3>རྫོང་ཁག།</h3></dt>
             <dd><?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $ddddd->dzongkhag)->value('dzongkhag_name'); ?></dd>         
             <dt><h3>དྲུང་ཁག།</h3></dt>            
             <dd>{{ $ddddd->dungkhag }}</dd>             
             <dt><h3>རྒེད་འོག།</h3></dt>
             <dd><?php echo $c = App\gewog_dzo::where('gewog_id', $ddddd->gewog)->value('gewog_name'); ?>
             </dd>
             <dt><h3>གཡུས།</h3></dt>
             <dd><?php echo $c = App\village_dzo::where('village_id', $ddddd->village)->value('village_name'); ?></dd>
             <dt><h3>གུང་ཨང་།</h3></dt>
             <dd>{{ $ddddd->houseno }}</dd>
             <dt><h3>ཁྲམ་ཨང་།</h3></dt>
             <dd>{{ $ddddd->thramno }}</dd>
             <dt><h3>སྐྱེས་ཚེས།</h3></dt>
             <dd>{{ $ddddd->dob }}</dd>
             <dt><h3>ཤེས་ཚད།</h3></dt>
             <dd>{{ $ddddd->qualification }}</dd>
             <dt><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></dt>
             <dd>{{ $ddddd->phoneno }}</dd>
             <dt><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></dt>
             <dd>{{ $ddddd->email }}</dd>
             <dt><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས།</h3></dt>
             <dd>{{ $ddddd->appdate }}</dd>         

          @endforeach
<p style="color: orange;"><h3>ཟུར་དྲག་ཡིག་ཆ།</h3></p>
@foreach($rd as $dd)
             <dd>
             <?php                             
             $dcount = count(App\tbl_register_document::where('ro_id', $dd->ro_id)->get());
             ?>                     
             @if($dcount == 0) 
             No Docments!    
             @else
             @if($dd->filecat == 'td')
             <h4>རྩིས་འཛིན་པ་བཅས་ཀྱི་ཁ་གསལ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
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



          

    </div>
    </div>
    </section> 
    </form>   
    </div> 
</div> 




<div class="col-md-12"> 
<div class="card">
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_ro_dzo', $ro_id) }}" onSubmit="return validateThisFrom (this);">
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
             <div class="card-header"><h6 class="card-title"><h3>བརྟག་ཞིབ།/ཐག་གཅད།:</h3></h6></div>
        <div class="card-body">
             <dt><h3>ཐག་གཅད།:<font color="red">*</font></h3></dt>
             <dd>
             <select  name="approve" id="approve"  class="form-control" required="required">
                <option value="">- select -</option>                        
                <option value="1"><h4>གནང་བ་འགྲོལ།</h4></option>
                <option value="2"><h4>ཟུར་བཏོན།</h4></option>   
             </select>
             </dd> 
             <dt><h3>བསམ་འཆར།:</h3></dt>
             <dd><textarea id="remarks" type="text" class="form-control" name="remarks" rows="4" placeholder="Remarks ..."></textarea></dd>
             <dt><h3>ཟུར་དྲག (བཀའ་རྒྱ།):</h3></dt>
             <dd><input type="file" id="exampleInputFile8"  class="form-control" name="order[]" multiple=""></dd>
        </div>
             <input type="hidden" name="edit_id" id='edit_id'>
             <div class="col-md-12" "modal-footer">
             <button type="submit" class="btn btn-success btn-bg" style="float:left;"><h4>བསྲུང་།</h4></button>
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
        if (thisForm.approve.value == "") {
            alert("Please Provide Assessment Decision");
            thisForm.approve.focus();
            return false;
        }      
    }
 
</script>
