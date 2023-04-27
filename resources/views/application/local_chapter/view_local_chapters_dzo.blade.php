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
            <h5 class="m-0 text-dark"><h3>ཡན་ལག་ཆོས་སྡེ།</h3></h5>
              <p><?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag_dzo::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
              </p>
              
             
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><h5>གདོང་ཤོག</h5></a></li>
              <li class="breadcrumb-item active"><h5>ཆོས་སྡེ་ལྷན་ཚོགས།</h5></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


<div class="col-md-12">
    <div class="card">
    <br>
     
    <section class="content">
    <div class="container-fluid">
    <div class="row">

        <div class="col-md-3">
        <div class="card">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">ཡན་ལག་ཆོས་སྡེ།</h3></div>
          @foreach($chapter as $doo)
          <div class="card-body">
             <dt><h3>ཡན་ལག་ཆོས་སྡེ།</h3></dt>
             <dd>{{ $doo->chapter_name }}</dd>
             <dt><h3>དབྱེ་ཁག།</h3></dt>
             <dd><?php if($doo->branchtype == '1')
                  {
                    echo 'Drubdey';
                  }
                  elseif($doo->branchtype == '2')
                  {
                    echo 'Shedra';
                  }
                  elseif($doo->branchtype == '3')
                  {
                    echo 'Lobdra';
                  }
                  elseif($doo->branchtype == '4')
                  {
                    echo 'Gomdey';
                  }
                  elseif($doo->branchtype == '5')
                  {
                    echo 'Gyendra';
                  }
                  elseif($doo->branchtype == '6')
                  {
                    echo 'Others';
                  }
                  ?> </dd>
             <p><h3 style="color: orange;">ཡིག་ཚང་གི་ཁ་བྱང་།</h3></p>
             <dt><h3>རྫོང་ཁག།</h3></dt>
             <dd><?php echo $c = App\dzongkhag::where('dzongkhag_id', $doo->dzongkhag)->value('dzongkhag_name'); ?></dd> 
             <dt><h3>ས་གནས་།</h3></dt>            
             <dd>{{ $doo->location }}</dd>
             <dt><h3>འགྲེམ་སྒྲོམ་ཨང་།</h3></dt>
             <dd>{{ $doo->postbox }}</dd>
             <dt><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3></dt>
             <dd>{{ $doo->phone }}</dd>
             <dt><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></dt>
             <dd>{{ $doo->email }}</dd>
             <dt><h3>དམིགས་དོན།</h3></dt>
             <dd>{{ $doo->objective }}</dd>         
          </div>
          @endforeach
          <p><h3 style="color: orange;">ཟུར་སྦྲགས</h3></p>
            @foreach($rd as $dd)
             <dd>    
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
             </dd>
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
            <img class="profile-user-img img-fluid" style="height: 100px;width: 100px;" src="{{ asset("/images/$d->photo") }}" alt="User profile picture">
            </div>

             <dd><h3>ངོ་མིང་།</h3>&nbsp;&nbsp;{{ $d->name }}</dd>
             <dd><h3>རྫོང་ཁག།</h3>&nbsp;&nbsp;<?php echo $c = App\dzongkhag_dzo::where('dzongkhag_id', $d->dzongkhag)->value('dzongkhag_name'); ?></dd>                 
             <dd><h3>དྲུང་ཁག།</h3></b>&nbsp;&nbsp;{{ $d->dungkhag }}</dd>             
             <dd><h3>རྒེད་འོག།</h3>&nbsp;&nbsp;<?php echo $c = App\gewog_dzo::where('gewog_id', $d->gewog)->value('gewog_name'); ?></dd>
             <dd><h3>གཡུས།</h3>&nbsp;&nbsp;<?php echo $c = App\village_dzo::where('village_id', $d->village)->value('village_name'); ?></dd>
             <dd><h3>གུང་ཨང་།</h3>&nbsp;&nbsp;{{ $d->houseno }}</dd>
             <dd><h3>ཁྲམ་ཨང་།</h3>&nbsp;&nbsp;{{ $d->thramno }}</dd>
             <dd><h3>སྐྱེས་ཚེས།</h3>&nbsp;&nbsp;{{ $d->dob }}</dd>
             <dd><h3>ཤེས་ཚད།</h3>&nbsp;&nbsp;<br>{{ $d->qualification }}</dd>
             <dd><h3>བརྒྱུད་འཕྲིན་ཨང་།</h3>&nbsp;&nbsp;<br>{{ $d->phoneno }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $d->email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་ སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $d->appdate }}</dd>         
          </div>
          @endforeach
           <p><h3 style="color: orange;">ཟུར་སྦྲགས</h3></p>
           @foreach($rdcd as $dd)
             <dd>
             @if($dd->filecat == 'cd')
             <h4>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>  
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
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">དྲུང་ཆེན་གྱི་ཁ་གསལ།</h3></div>
          @foreach($sd as $ddd)
          <div class="card-body">
            <div class="text-center">
            <img class="profile-user-img img-fluid" style="height: 100px;width: 100px;" src="{{ asset("/images/$ddd->photo") }}" alt="User profile picture">
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
             <dd><h3>བསྐོ་བཞག་གི་ སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $ddd->appdate }}</dd>          
          </div>
          @endforeach
           <p><h3 style="color: orange;">ཟུར་སྦྲགས</h3></p>
           @foreach($rdsd as $dd)
             <dd>
             @if($dd->filecat == 'sd')
             <h4>དྲུང་ཆེན་གྱི་ཁ་གསལ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>  
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
             <div class="card-header"><h3 style="color: orange;font-weight: bold;">རྩིས་འཛིན་གྱི་ཁ་གསལ།</h3></div>
          @foreach($td as $ddddd)
          <div class="card-body">
             <div class="text-center">
             <img class="profile-user-img img-fluid" style="height: 100px;width: 100px;" src="{{ asset("/images/$ddddd->photo") }}" alt="User profile picture">
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
             <dd><h3>འགན་ཁག/འགན་ཁུར།</h3>&nbsp;&nbsp;<br>{{ $ddddd->responsibility }}</dd>
             <dd><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3>&nbsp;&nbsp;<br>{{ $ddddd->email }}</dd>
             <dd><h3>བསྐོ་བཞག་གི་ སྤྱི་ཚེས།</h3>&nbsp;&nbsp;{{ $ddddd->appdate }}</dd>   
          </div>
          @endforeach
          <p><h3 style="color: orange;">ཟུར་སྦྲགས</h3></p>
          @foreach($rdtd as $dd)
             <dd>
             @if($dd->filecat == 'td')
             <h4>རྩིས་འཛིན་གྱི་ཁ་གསལ།</h4>&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>  
             @endif
          </dd>
          @endforeach
             </dl>
        </div>  
        </div>

<!--Assessment-->
<div class="col-md-12"> 
<div class="card">
@foreach($chapter as $dooc)
<form role="form" method="POST" enctype="multipart/form-data" action="{{ route('approve_chapter_dzo', $dooc->chapter_id) }}" onSubmit="return validateThisFrom (this);">
{{ csrf_field() }}       
@if(Auth::user()->role_id == '2' && $dooc->approve != '1')        
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
 
@elseif(Auth::user()->role_id == '3')

 <div class="card">              
        {{ csrf_field() }}
        <dl class="dl-horizontal">
        <div class="col-md-12">
             <div class="card-header"><h6 class="card-title"><h3>བརྟག་ཞིབ།/ཐག་གཅད།:</h3></h6></div>
        <div class="card-body">
             <dt><h3>ཐག་གཅད།:</h3></dt>
             <dd>
                @if($dooc->approve == '0')
                <span class="btn btn-danger btn-sm"><h4>བསྣར་བཞག</h4></span>
                @elseif($dooc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>
                @elseif($dooc->approve == '2')<span class="btn btn-warning btn-sm"><h4>ཟུར་བཏོན།</h4></span>
                @endif
             </dd> 
             <dt><h3>བསམ་འཆར།:</h3></dt>
             <dd>{{ $dooc->remarks }}</dd>
             <dt><h3>ཟུར་དྲག (བཀའ་རྒྱ།):</h3></dt>
             <dd>
             <?php  
             $taxdoc= App\tbl_chapterregister_document::where('ro_id', $dooc->chapter_id)->where('filecat','order')->get();?> 
             @foreach($taxdoc as $dd)   
             {{ $dd->file_name }}
             <a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
             @endforeach
             </dd>
        </div>
        </div> 
        </dl>
        </div> 

@endif
@endforeach
</form>
</div>
</div>  
<!--Assess End-->        

    </div>
    </section>   

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
