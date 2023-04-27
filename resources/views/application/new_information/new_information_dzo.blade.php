  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
  <!--oncahnge-->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
<body class="hold-transition sidebar-mini">
@include('application.includes.header')
@include('application.includes.sidebar_dzo')
<div class="content-wrapper">
@include('flash-message')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark"><h3>ཆོས་སྡེའི་ཁ་གསལ་གསརཔ།</h3></h5>
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
    <div>
    <div class="btn-group w-100 mb-2">
        <a class="btn btn-warning active" href="{{route('new_information_dzo',$ro_id)}}" data-filter="2"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></a>
        <a class="btn btn-warning" href="#tab_2" data-filter="3"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ཁ་གསལ། </h3></a>
        <a class="btn btn-warning" href="#tab_3" data-filter="4"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ། </h3></a>
        <a class="btn btn-warning" href="#tab_4" data-filter="5"><h3>དྲུང་ཆེན་འོགམ་གྱི་ཁ་གསལ། </h3></a>
        <a class="btn btn-warning" href="#tab_5" data-filter="6"><h3>རྩིས་འཛིན་གྱི་ཁ་གསལ།</h3></a>
    </div>
    </div>
    <div class="content-header">
    <div class="container-fluid">
            <table id="example1" class="table table-bordered table-striped">
            <b style="color: blue;"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ་གསརཔ།</h3></b>
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ངོ་མིང་</h3></th>
                  <th><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས་</h3></th>           
                  <th><h3>གནས་སྟངས།/དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($cd as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td>{{ $dc->appdate }}</td>
                  
                  <td>
                    @if($dc->approval_status == '0')
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateUserModal" onclick='fun_edit({{$dc->id}})'><h4>ཞུན་དག།</h4>
                    </button>
                    <span class="btn btn-warning btn-sm"><h4>བསྣར་བཞག</h4></span>@endif
                    @if($dc->approval_status == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif 
                    @if($dc->approval_status == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>@endif 
                                                                         
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>  
            <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('cd/view_dzo')}}"> 
    </div>
    </div>
            <div class="bootstrap-admin-box-title clearfix">
            <a class='btn btn-success  btn-bg' data-toggle='modal' data-target="#addRoleModel"><i class="fa fa-fw fa-plus"></i><h3>གསརཔ་བཙུགས་ནི་དོན་ལུ་ཨེབ།</h3></a>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
            </div>
            @endif
</div> 
</div> 
<!-- Add country modal begins-->
<div class="modal fade" id="addRoleModel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།</h3></h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
                 <form action="{{ route('cid_search_cdnewinfo_dzo',$ro_id) }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                      <div class="col-md-8">
                        <div class="input-group input-group-sm mb-0">
                          <h4><label for="cid">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་</label>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                          <input class="form-control form-control-sm" name='cidno' placeholder="Enter CID number" required/>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger"><h4>འཚོལ་ཞིབ།</h4></button>
                          </div>
                        </div>
                      </div>
                  </form>
      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('new_chairman_details_store_dzo',$ro_id) }}">
      <input type="hidden" name="ro_id" value="{{$ro_id}}">
      <input type="hidden" name="new_chairman" value="1">
      {{ csrf_field() }}
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <select name='type1' id='type1' class="form-control" required>
            <option disabled selected><h3>གདམ་ཁ་རྐྱབ་ནི།</h3></option>
              <?php 
              $dzongkhag=App\dzongkhag_dzo::all();
              foreach($dzongkhag as $dzongkhags):
              ?>
              <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
              <?php endforeach ?>
              </select>     
            </div>
            <div class="form-group input-group-sm">
            <label for="dungkhag"><h3>དྲུང་ཁག</h3></label>
            <input type="text" class="form-control" name="dungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="gewog"><h3>རྒེད་འོག</h3></label>
            <select name='gewog' id='gewog' class="form-control" required>
            <option><h3>དང་པ་ རྫོང་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
            </select>
            </div> 
            <div class="form-group input-group-sm">
            <label for="village"><h3>གཡུས</h3></label>
            <select name='village' id='village' class="form-control " required>
            <option><h3>དང་པ་ རྒེད་འོག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="houseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="houseno" placeholder="Enter House Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="thramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="thramno" placeholder="Enter Thram Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="dob" placeholder="Enter DOB Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="qualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="qualification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="phoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="phoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="email" placeholder="Email ID"  required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="date"><h3>བསྐོ་བཞག་གི་  སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="appdate" placeholder="Enter Date Of Election/Appointment">
            </div> 
            <div class="form-group input-group-sm">
            <label for="photo"><h3>ངོ་པར།</h3></label>
            <input type="file" name="photo" class="form-control" id='photo'>
            </div>
<div class="form-group input-group-sm">
<label for="chairman"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།:</h3></label><font color="red">*</font>
<input type="file" id="exampleInputFile2"  class="form-control" name="cd[]" multiple="" required="required"/>
</div> 
        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">    
      <div class="col-md-12 modal-footer">
      <button type="submit" class="btn btn-primary btn-sm"><h4>བསྲུང་།</h4></button>
      <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
      </div>
      </form>
      </div>
      </div>
      </div>
</div>
</div>
</div>
<!--Model end-->
<!--Edit Modal-->
<div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
        <div class="modal-header"><h4 class="modal-title" id="myModalLabel"><h4>ཞུན་དག་རྐྱབ།</h4></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_cd_dzo') }}">
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="ename" id="ename" placeholder="Enter Name">
            </div>
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <select name='etype1' id='etype1' class="form-control">
            <option disabled selected><?php echo $cd =  App\tbl_chairman_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('dzongkhag');?></option>
              <?php 
              $dzongkhag=App\dzongkhag_dzo::all();
              foreach($dzongkhag as $dzongkhags):
              ?>
              <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
              <?php endforeach ?>
              </select>     
            </div>
            <div class="form-group input-group-sm">
            <label for="dungkhag"><h3>དྲུང་ཁག</h3></label>
            <input type="text" class="form-control" name="edungkhag" id="edungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="gewog"><h3>རྒེད་འོག</h3></label>
            <select name='egewog' id='egewog' class="form-control">
            <option disabled selected><?php echo $cd =  App\tbl_chairman_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('gewog');?></option>
              <?php 
              $gewog=App\gewog_dzo::all();
              foreach($gewog as $gewogs):
              ?>
              <option value="{{$gewogs->gewog_id}}">{{$gewogs->gewog_name}}</option>
              <?php endforeach ?>
              </select>
            </select>
            </div> 
            <div class="form-group input-group-sm">
            <label for="village"><h3>གཡུས</h3></label>
            <select name='evillage' id='evillage' class="form-control ">
            <option disabled selected><?php echo $cd =  App\tbl_chairman_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('village');?></option>
              <?php 
              $village=App\village_dzo::all();
              foreach($village as $villages):
              ?>
              <option value="{{$villages->village_id}}">{{$villages->village_name}}</option>
              <?php endforeach ?>
              </select>
            </select>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="houseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="ehouseno" id="ehouseno" placeholder="Enter House Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="thramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="ethramno" id="ethramno" placeholder="Enter Thram Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="edob" id="edob" placeholder="Enter DOB Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="qualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="equalification" id="equalification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="phoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="ephoneno" id="ephoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="eemail" id="eemail" placeholder="Email ID"  required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="date"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="eappdate"  id="eappdate" placeholder="Enter Date Of Election/Appointment">
            </div> 

<?php $pp=  DB::table('tbl_chairman_details')->where('ro_id', $ro_id )->where('new_chairman',1)->orderby('id','desc')->value('photo'); ?>
@if($pp=='')
<div class="form-group input-group-sm">
<label for="photo"><h3>ངོ་པར།:</h3></label>
<input type="file" name="ephoto" class="form-control" value="{{$pp}}" id='ephoto'>
</div>
@else
<div class="form-group input-group-sm">
<label for="photo"><h3>ངོ་པར།:</h3></label>
<input type="text" class="form-control" value="{{$pp}}">
</div>
@endif
<h3>ངོ་པར།:</h3>&nbsp;&nbsp;&nbsp;{{$pp}}
@if($pp == '')
No Photo!
@else
<?php $pppp=  DB::table('tbl_chairman_details')->where('ro_id', $ro_id )->where('new_chairman',1)->orderby('id','desc')->limit(1)->get(); ?>
@foreach($pppp as $g)
<a href="{{asset('/images/'.$pp)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
<a href="{{ route('delete_ppc_dzo', array($g->id, $g->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a><br>
@endforeach
@endif

<div class="form-group input-group-sm">
<label for="chairman"><h3>ཁྲི་འཛིན་གྱི་ཁ་གསལ།:</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="cd[]" multiple="">
</div>
<?php  $ppid1=  DB::table('tbl_chairman_details')->where('ro_id', $ro_id )->where('new_chairman',1)->orderby('id','desc')->value('id'); ?>
<?php  $droid1=  DB::table('tbl_register_documents')->where('ro_id', $ro_id )->where('applicantid',$ppid1)->get(); ?> 
Uploaded Documents:<br>
@foreach($droid1 as $dd)
@if($dd->filecat == 'cd')
&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
<a href="{{ route('delete_cd_dzo', array($dd->id, $dd->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a><br>
@endif
@endforeach

        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">
        <input type="hidden" name="edit_id" id='edit_id'>
        </div>
      </div>
      </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-xs"><h4>བསྲུང་།</h4></button>
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
        </div>
        </form>
</div>
</div>
</div>
<!--Edit Modal End-->         
<!--DY Chairman tab -->
<div class="tab-pane" id="tab_2">
<div class="col-md-12">
<div class="card"><br>
    <div class="content-header">
    <div class="container-fluid">
            <table id="example2" class="table table-bordered table-striped">
            <b style="color: blue;"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ཁ་གསལ་གསརཔ།</h3></b>
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ངོ་མིང་</h3></th>
                  <th><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས་</h3></th>
                  
                  <th><h3>གནས་སྟངས།/དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($dcd as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td>{{ $dc->appdate }}</td>
                  
                  <td>
                    @if($dc->approval_status == '0')
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateUserModal2" onclick='fun_edit2({{$dc->id}})'><h4>ཞུན་དག།</h4>
                    </button>
                    <span class="btn btn-warning btn-sm"><h4>བསྣར་བཞག</h4></span>@endif
                    @if($dc->approval_status == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif 
                    @if($dc->approval_status == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>@endif 
                                                                         
                  </td>

              </tr> 
              @endforeach
            </tbody>
            </table>  
            <input type="hidden" name="hidden_view00" id="hidden_view00" value="{{url('dcd/view_dzo')}}"> 
    </div>
    </div>
            <div class="bootstrap-admin-box-title clearfix">
            <a class='btn btn-success  btn-bg' data-toggle='modal' data-target="#addRoleModel2"><i class="fa fa-fw fa-plus"></i><h3>གསརཔ་བཙུགས་ནི་དོན་ལུ་ཨེབ།</h3></a>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
            </div>
            @endif
<!-- Add Deputy Chairman begins-->
<div class="modal fade" id="addRoleModel2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel"><h3>ཁྲི་འཛིན་འོགམ་གྱི་ཁ་གསལ།</h3></h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
                  <form action="{{ route('cid_search_dcdnewinfo_dzo',$ro_id) }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                     <div class="col-md-8">
                        <div class="input-group input-group-sm mb-0">
                          <h4><label for="cid">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་</label>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                          <input class="form-control form-control-sm" name='cidno' placeholder="Enter CID number" required/>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger"><h4>འཚོལ་ཞིབ།</h4></button>
                          </div>
                        </div>
                      </div>
                  </form>
      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('new_dychairman_details_store_dzo',$ro_id) }}">
      <input type="hidden" name="ro_id" value="{{$ro_id}}">
      <input type="hidden" name="new_dychairman" value="1">
      {{ csrf_field() }}
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="dcname" placeholder="Enter Name">
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <select name='dctype1' id='dctype1' class="form-control" required>
            <option disabled selected><h3>གདམ་ཁ་རྐྱབ་ནི།</h3></option>
              <?php 
              $dzongkhag=App\dzongkhag_dzo::all();
              foreach($dzongkhag as $dzongkhags):
              ?>
              <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
              <?php endforeach ?>
              </select>     
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdungkhag"><h3>དྲུང་ཁག</h3></label>
            <input type="text" class="form-control" name="dcdungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="dcgewog"><h3>རྒེད་འོག</h3></label>
            <select name='dcgewog' id='dcgewog' class="form-control" required>
            <option><h3>དང་པ་ རྫོང་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
            </select>
            </div> 
            <div class="form-group input-group-sm">
            <label for="dcvillage"><h3>གཡུས</h3></label>
            <select name='dcvillage' id='dcvillage' class="form-control " required>
            <option><h3>དང་པ་ རྒེད་འོག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dchouseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="dchouseno" placeholder="Enter House Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dchramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="dcthramno" placeholder="Enter Thram Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="dcdob" placeholder="Enter DOB Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dcqualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="dcqualification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="dcphoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="dcphoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="dcemail" placeholder="Email ID"  required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdate"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="dcappdate" placeholder="Enter Date Of Election/Appointment">
            </div> 
            <div class="form-group input-group-sm">
                    <label for="photo"><h3>ངོ་པར།</h3></label>
                    <input type="file" name="photo" class="form-control" id='photo'>
                  </div> 

<div class="form-group input-group-sm">
<label for="chairman"><h4>ཁྲི་འཛིན་འོག་མ་གྱི་ཁ་གསལ།:</h4></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="dcd[]" multiple="">
</div>
        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">     
      <div class="col-md-12 modal-footer">
       <button type="submit" class="btn btn-primary btn-xs"><h4>བསྲུང་</h4></button>
       <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
      </div>
      </form>
      </div>
      </div>
      </div>
</div>
</div>
</div>
<!--Model end-->
<!--Edit Modal-->
<div class="modal fade" id="updateUserModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
        <div class="modal-header"><h4 class="modal-title" id="myModalLabel"><h4>ཞུན་དག་རྐྱབ།</h4></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form class="form-horizontal" role="form" method="POST"  enctype="multipart/form-data" action="{{ route('update_dcd_dzo') }}">
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="edcname" id="edcname" placeholder="Enter Name">
            </div>
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <select name='edctype1' id='edctype1' class="form-control">
            <option disabled selected><?php echo $cd =  App\tbl_dychairman_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('dzongkhag');?></option>
              <?php 
              $dzongkhag=App\dzongkhag_dzo::all();
              foreach($dzongkhag as $dzongkhags):
              ?>
              <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
              <?php endforeach ?>
              </select>     
            </div>
            <div class="form-group input-group-sm">
            <label for="dungkhag"><h3>དྲུང་ཁག</h3></label>
            <input type="text" class="form-control" name="edcdungkhag" id="edcdungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="gewog"><h3>རྒེད་འོག</h3></label>
            <select name='edcgewog' id='edcgewog' class="form-control">
            <option disabled selected>
            <?php echo $cd =  App\tbl_dychairman_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('gewog');?>
            </option>
              <?php 
              $gewog=App\gewog_dzo::all();
              foreach($gewog as $gewogs):
              ?>
              <option value="{{$gewogs->gewog_id}}">{{$gewogs->gewog_name}}</option>
              <?php endforeach ?>
              </select>
            </select>
            </div> 
            <div class="form-group input-group-sm">
            <label for="village"><h3>གཡུས</h3></label>
            <select name='edcvillage' id='edcvillage' class="form-control ">
            <option disabled selected><?php echo $cd =  App\tbl_dychairman_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('village');?></option>
              <?php 
              $village=App\village_dzo::all();
              foreach($village as $villages):
              ?>
              <option value="{{$villages->village_id}}">{{$villages->village_name}}</option>
              <?php endforeach ?>
              </select>
            </select>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="houseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="edchouseno" id="edchouseno" placeholder="Enter House Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="thramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="edcthramno" id="edcthramno" placeholder="Enter Thram Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="edcdob" id="edcdob" placeholder="Enter DOB Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="qualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="edcqualification" id="edcqualification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="phoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="edcphoneno" id="edcphoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="edcemail" id="edcemail" placeholder="Email ID"  required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="date"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="edcappdate"  id="edcappdate" placeholder="Enter Date Of Election/Appointment">
            </div> 

<?php $pp=  DB::table('tbl_dychairman_details')->where('ro_id', $ro_id )->where('new_dychairman',1)->orderby('id','desc')->value('photo'); ?>
@if($pp=='')
<div class="form-group input-group-sm">
<label for="photo"><h3>ངོ་པར།:</h3></label>
<input type="file" name="edcphoto" class="form-control" value="{{$pp}}" id='edcphoto'>
</div>
@else
<div class="form-group input-group-sm">
<label for="photo"><h3>ངོ་པར།:</h3></label>
<input type="text" class="form-control" value="{{$pp}}">
</div>
@endif
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{$pp}}
@if($pp == '')
No Photo!
@else
<?php $pppp=  DB::table('tbl_dychairman_details')->where('ro_id', $ro_id )->where('new_dychairman',1)->orderby('id','desc')->limit(1)->get(); ?>
@foreach($pppp as $g)
<a href="{{asset('/images/'.$pp)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
<a href="{{ route('delete_pp_dzo', array($g->id, $g->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a><br>
@endforeach
@endif

<div class="form-group input-group-sm">
<label for="chairman"><h3>ཁྲི་འཛིན་འོག་མ་གྱི་ཁ་གསལ།:</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="dcd[]" multiple="">
</div>
<?php  $ppid1=  DB::table('tbl_dychairman_details')->where('ro_id', $ro_id )->where('new_dychairman',1)->orderby('id','desc')->value('id'); ?>
<?php  $droid1=  DB::table('tbl_register_documents')->where('ro_id', $ro_id )->where('applicantid',$ppid1)->get(); ?> 
Uploaded Documents:<br>
@foreach($droid1 as $dd)
@if($dd->filecat == 'dcd')
&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
<a href="{{ route('delete_cd_dzo', array($dd->id, $dd->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a><br>
@endif
@endforeach

        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}"> 
        <input type="hidden" name="edit_id2" id='edit_id2'>
        </div>
      </div>
      </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-xs"><h4> བསྲུང་།</h4></button>
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
        </div>
        </form>
</div>
</div>
</div>
<!--Edit Modal End-->
</div>
<!--Secretary tab -->
<div class="tab-pane" id="tab_3">
<div class="col-md-12">
<div class="card"><br>
    <div class="content-header">
    <div class="container-fluid">
            <table id="example3" class="table table-bordered table-striped">
            <b style="color: blue;"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ་གསརཔ།</h3></b>
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ངོ་མིང་</h3></th>
                  <th><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས་</h3></th>
                  
                  <th><h3>གནས་སྟངས།/དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($sd as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td>{{ $dc->appdate }}</td>
                 
                  <td>
                    @if($dc->approval_status == '0')
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateUserModal3" onclick='fun_edit3({{$dc->id}})'><h4>ཞུན་དག།</h4>
                    </button>
                    <span class="btn btn-warning btn-sm"><h4>བསྣར་བཞག</h4></span>@endif
                    @if($dc->approval_status == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif 
                    @if($dc->approval_status == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>@endif 
                                                                         
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>  
            <input type="hidden" name="hidden_view000" id="hidden_view000" value="{{url('sd/view_dzo')}}"> 
    </div>
    </div>
            <div class="bootstrap-admin-box-title clearfix">
            <a class='btn btn-success  btn-bg' data-toggle='modal' data-target="#addRoleModel3"><i class="fa fa-fw fa-plus"></i><h3>གསརཔ་བཙུགས་ནི་དོན་ལུ་ཨེབ།</h3></a>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
            </div>
            @endif
<!-- Add Deputy sec begins-->
<div class="modal fade" id="addRoleModel3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ་གསརཔ།</h3></h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
                  <form action="{{ route('cid_search_sdnewinfo_dzo',$ro_id) }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                     <div class="col-md-8">
                        <div class="input-group input-group-sm mb-0">
                          <h4><label for="cid">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་</label>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                          <input class="form-control form-control-sm" name='cidno' placeholder="Enter CID number" required/>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger"><h4>འཚོལ་ཞིབ།</h4></button>
                          </div>
                        </div>
                      </div>
                  </form>
      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('new_secretary_details_store_dzo',$ro_id) }}">
      <input type="hidden" name="ro_id" value="{{$ro_id}}">
      <input type="hidden" name="new_secretary" value="1">
      {{ csrf_field() }}
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="sname" placeholder="Enter Name">
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <select name='stype1' id='stype1' class="form-control" required>
            <option disabled selected><h3>གདམ་ཁ་རྐྱབ་ནི།</h3></option>
              <?php 
              $dzongkhag=App\dzongkhag_dzo::all();
              foreach($dzongkhag as $dzongkhags):
              ?>
              <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
              <?php endforeach ?>
              </select>     
            </div>
            <div class="form-group input-group-sm">
            <label for="sdungkhag"><h3>དྲུང་ཁག</h3></label>
            <input type="text" class="form-control" name="sdungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="dcgewog"><h3>རྒེད་འོག</h3></label>
            <select name='sgewog' id='sgewog' class="form-control" required>
            <option><h3>དང་པ་ རྫོང་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
            </select>
            </div> 
            <div class="form-group input-group-sm">
            <label for="dcvillage"><h3>གཡུས</h3></label>
            <select name='svillage' id='svillage' class="form-control " required>
            <option><h3>དང་པ་ རྒེད་འོག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="shouseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="shouseno" placeholder="Enter House Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dchramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="sthramno" placeholder="Enter Thram Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="sdob" placeholder="Enter DOB Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dcqualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="squalification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="dcphoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="sphoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="semail" placeholder="Email ID"  required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdate"><h3>བསྐོ་བཞག་གི་  སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="sappdate" placeholder="Enter Date Of Election/Appointment">
            </div> 
            <div class="form-group input-group-sm">
                    <label for="photo"><h3>ངོ་པར།</h3></label>
                    <input type="file" name="photo" class="form-control" id='photo'>
                  </div> 
<div class="form-group input-group-sm">
<label for="chairman"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ:</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="sd[]" multiple="">
</div>                  
        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">     
      <div class="col-md-12 modal-footer">
       <button type="submit" class="btn btn-primary btn-xs"><h4>བསྲུང</h4></button>
       <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
      </div>
      </form>
      </div>
      </div>
      </div>
</div>
</div>
</div>
<!--Model end-->
<!--Edit Modal-->
<div class="modal fade" id="updateUserModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
        <div class="modal-header"><h4 class="modal-title" id="myModalLabel"><h4>ཞུན་དག་རྐྱབ།</h4></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_sd_dzo') }}">
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="esname" id="esname" placeholder="Enter Name">
            </div>
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <select name='estype1' id='estype1' class="form-control">
            <option disabled selected><?php echo $cd =  App\tbl_secretary_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('dzongkhag');?></option>
              <?php 
              $dzongkhag=App\dzongkhag_dzo::all();
              foreach($dzongkhag as $dzongkhags):
              ?>
              <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
              <?php endforeach ?>
              </select>     
            </div>
            <div class="form-group input-group-sm">
            <label for="dungkhag"><h3>དྲུང་ཁག</h3></label>
            <input type="text" class="form-control" name="esdungkhag" id="esdungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="gewog"><h3>རྒེད་འོག</h3></label>
            <select name='esgewog' id='esgewog' class="form-control">
            <option disabled selected><?php echo $cd =  App\tbl_secretary_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('gewog');?></option>
              <?php 
              $gewog=App\gewog_dzo::all();
              foreach($gewog as $gewogs):
              ?>
              <option value="{{$gewogs->gewog_id}}">{{$gewogs->gewog_name}}</option>
              <?php endforeach ?>
              </select>
            </select>
            </div> 
            <div class="form-group input-group-sm">
            <label for="village"><h3>གཡུས</h3></label>
            <select name='esvillage' id='esvillage' class="form-control ">
            <option disabled selected><?php echo $cd =  App\tbl_secretary_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('village');?></option>
              <?php 
              $village=App\village_dzo::all();
              foreach($village as $villages):
              ?>
              <option value="{{$villages->village_id}}">{{$villages->village_name}}</option>
              <?php endforeach ?>
              </select>
            </select>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="houseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="eshouseno" id="eshouseno" placeholder="Enter House Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="thramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="esthramno" id="esthramno" placeholder="Enter Thram Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="esdob" id="esdob" placeholder="Enter DOB Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="qualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="esqualification" id="esqualification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="phoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="esphoneno" id="esphoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="esemail" id="esemail" placeholder="Email ID"  required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="date"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="esappdate"  id="esappdate" placeholder="Enter Date Of Election/Appointment">
            </div> 

<?php $pp=  DB::table('tbl_secretary_details')->where('ro_id', $ro_id )->where('new_secretary',1)->orderby('id','desc')->value('photo'); ?>
@if($pp=='')
<div class="form-group input-group-sm">
<label for="photo"><h3>ངོ་པར།:</h3></label>
<input type="file" name="esphoto" class="form-control" value="{{$pp}}" id='esphoto'>
</div>
@else
<div class="form-group input-group-sm">
<label for="photo"><h3>ངོ་པར།:</h3></label>
<input type="text" class="form-control" value="{{$pp}}">
</div>
@endif
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{$pp}}
@if($pp == '')
No Photo!
@else
<?php $pppp=  DB::table('tbl_secretary_details')->where('ro_id', $ro_id )->where('new_secretary',1)->orderby('id','desc')->limit(1)->get(); ?>
@foreach($pppp as $g)
<a href="{{asset('/images/'.$pp)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
<a href="{{ route('delete_pp_dzo', array($g->id, $g->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a><br>
@endforeach
@endif

<div class="form-group input-group-sm">
<label for="chairman"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ:</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="sd[]" multiple="">
</div>
<?php  $ppid1=  DB::table('tbl_secretary_details')->where('ro_id', $ro_id )->where('new_secretary',1)->orderby('id','desc')->value('id'); ?>
<?php  $droid1=  DB::table('tbl_register_documents')->where('ro_id', $ro_id )->where('applicantid',$ppid1)->get(); ?> 
Uploaded Documents:<br>
@foreach($droid1 as $dd)
@if($dd->filecat == 'sd')
&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
<a href="{{ route('delete_cd_dzo', array($dd->id, $dd->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a><br>
@endif
@endforeach

        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}"> 
        <input type="hidden" name="edit_id3" id='edit_id3'>
        </div>
      </div>
      </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-xs"><h4>བསྲུང་</h4></button>
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
        </div>
        </form>
</div>
</div>
</div>
<!--Edit Modal End-->
</div>
<!--dySecretary tab -->
<div class="tab-pane" id="tab_4">
<div class="col-md-12">
<div class="card"><br>
    <div class="content-header">
    <div class="container-fluid">
            <table id="example4" class="table table-bordered table-striped">
            <b style="color: blue;"><h3>དྲུང་ཆེན་འོགམ་གྱི་ཁ་གསལ་གསརཔ།</h3></b>
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ངོ་མིང་</h3></th>
                  <th><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས་</h3></th>
                  
                  <th><h3>གནས་སྟངས།/དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($dsd as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td>{{ $dc->appdate }}</td>
                
                  <td>
                    @if($dc->approval_status == '0')
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateUserModal4" onclick='fun_edit4({{$dc->id}})'><h4>ཞུན་དག།</h4></button>
                    <span class="btn btn-warning btn-sm"><h4>བསྣར་བཞག</h4></span>@endif
                    @if($dc->approval_status == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif 
                    @if($dc->approval_status == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>@endif 
                                                                         
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>  
            <input type="hidden" name="hidden_view0000" id="hidden_view0000" value="{{url('dsd/view_dzo')}}"> 
    </div>
    </div>
            <div class="bootstrap-admin-box-title clearfix">
            <a class='btn btn-success  btn-bg' data-toggle='modal' data-target="#addRoleModel4"><i class="fa fa-fw fa-plus"></i><h3>གསརཔ་བཙུགས་ནི་དོན་ལུ་ཨེབ།</h3></a>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
            </div>
            @endif
</div> 
</div>
</div>
<!-- Add Deputy sec begins-->
<div class="modal fade" id="addRoleModel4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel"><h3>དྲུང་ཆེན་འོགམ་གྱི་ཁ་གསལ།</h3></h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
                  <form action="{{ route('cid_search_dsdnewinfo_dzo',$ro_id) }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                     <div class="col-md-8">
                        <div class="input-group input-group-sm mb-0">
                          <h4><label for="cid">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་</label>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                          <input class="form-control form-control-sm" name='cidno' placeholder="Enter CID number" required/>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger"><h4>འཚོལ་ཞིབ།</h4></button>
                          </div>
                        </div>
                      </div>
                  </form>
      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('new_dysecretary_details_store_dzo',$ro_id) }}">
      <input type="hidden" name="ro_id" value="{{$ro_id}}">
      <input type="hidden" name="new_dysecretary" value="1">
      {{ csrf_field() }}
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="dsname" placeholder="Enter Name">
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <select name='dstype1' id='dstype1' class="form-control" required>
            <option disabled selected><h3>གདམ་ཁ་རྐྱབ་ནི།</h3></option>
              <?php 
              $dzongkhag=App\dzongkhag_dzo::all();
              foreach($dzongkhag as $dzongkhags):
              ?>
              <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
              <?php endforeach ?>
              </select>     
            </div>
            <div class="form-group input-group-sm">
            <label for="dsdungkhag"><h3>དྲུང་ཁག</h3></label>
            <input type="text" class="form-control" name="dsdungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="dsgewog"><h3>རྒེད་འོག</h3></label>
            <select name='dsgewog' id='dsgewog' class="form-control" required>
            <option><h3>དང་པ་ རྫོང་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
            </select>
            </div> 
            <div class="form-group input-group-sm">
            <label for="dsvillage"><h3>གཡུས</h3></label>
            <select name='dsvillage' id='dsvillage' class="form-control " required>
            <option><h3>དང་པ་ རྒེད་འོག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dshouseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="dshouseno" placeholder="Enter House Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dchramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="dsthramno" placeholder="Enter Thram Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="dsdob" placeholder="Enter DOB Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dcqualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="dsqualification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="dcphoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="dsphoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="dsemail" placeholder="Email ID"  required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdate"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="dsappdate" placeholder="Enter Date Of Election/Appointment">
            </div> 
            <div class="form-group input-group-sm">
                    <label for="photo"><h3>ངོ་པར།</h3></label>
                    <input type="file" name="photo" class="form-control" id='photo'>
                  </div> 

<div class="form-group input-group-sm">
<label for="chairman"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ:</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="dsd[]" multiple="">
</div> 

        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">      
      <div class="col-md-12 modal-footer">
       <button type="submit" class="btn btn-primary btn-xs"><h4>བསྲུང་</h4></button>
       <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
      </div>
      </form>
      </div>
      </div>
      </div>
</div>
</div>
</div>
<!--Model end-->
<!--Edit Modal-->
<div class="modal fade" id="updateUserModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
        <div class="modal-header"><h4 class="modal-title" id="myModalLabel"><h4>ཞུན་དག་རྐྱབ།</h4></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_dsd_dzo') }}">
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="edsname" id="edsname" placeholder="Enter Name">
            </div>
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <select name='edstype1' id='edstype1' class="form-control">
            <option disabled selected><?php echo $cd =  App\tbl_dysecretary_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('dzongkhag');?></option>
              <?php 
              $dzongkhag=App\dzongkhag_dzo::all();
              foreach($dzongkhag as $dzongkhags):
              ?>
              <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
              <?php endforeach ?>
              </select>     
            </div>
            <div class="form-group input-group-sm">
            <label for="dungkhag"><h3>དྲུང་ཁག</h3></label>
            <input type="text" class="form-control" name="edsdungkhag" id="edsdungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="gewog"><h3>རྒེད་འོག</h3></label>
            <select name='edsgewog' id='edsgewog' class="form-control">
            <option disabled selected><?php echo $cd =  App\tbl_dysecretary_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('gewog');?></option>
              <?php 
              $gewog=App\gewog_dzo::all();
              foreach($gewog as $gewogs):
              ?>
              <option value="{{$gewogs->gewog_id}}">{{$gewogs->gewog_name}}</option>
              <?php endforeach ?>
              </select>
            </select>
            </div> 
            <div class="form-group input-group-sm">
            <label for="village"><h3>གཡུས</h3></label>
            <select name='edsvillage' id='edsvillage' class="form-control ">
            <option disabled selected><?php echo $cd =  App\tbl_dysecretary_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('village');?></option>
              <?php 
              $village=App\village_dzo::all();
              foreach($village as $villages):
              ?>
              <option value="{{$villages->village_id}}">{{$villages->village_name}}</option>
              <?php endforeach ?>
              </select>
            </select>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="houseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="edshouseno" id="edshouseno" placeholder="Enter House Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="thramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="edsthramno" id="edsthramno" placeholder="Enter Thram Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="edsdob" id="edsdob" placeholder="Enter DOB Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="qualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="edsqualification" id="edsqualification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="phoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="edsphoneno" id="edsphoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="edsemail" id="edsemail" placeholder="Email ID"  required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="date"><h3>བསྐོ་བཞག་གི་  སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="edsappdate"  id="edsappdate" placeholder="Enter Date Of Election/Appointment">
            </div> 

<?php $pp=  DB::table('tbl_dysecretary_details')->where('ro_id', $ro_id )->where('new_dysecretary',1)->orderby('id','desc')->value('photo'); ?>
@if($pp=='')
<div class="form-group input-group-sm">
<label for="photo"><h3>ངོ་པར།:</h3></label>
<input type="file" name="edsphoto" class="form-control" value="{{$pp}}" id='edsphoto'>
</div>
@else
<div class="form-group input-group-sm">
<label for="photo"><h3>ངོ་པར།:</h3></label>
<input type="text" class="form-control" value="{{$pp}}">
</div>
@endif
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{$pp}}
@if($pp == '')
No Photo!
@else
<?php $pppp=  DB::table('tbl_dysecretary_details')->where('ro_id', $ro_id )->where('new_dysecretary',1)->orderby('id','desc')->limit(1)->get(); ?>
@foreach($pppp as $g)
<a href="{{asset('/images/'.$pp)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
<a href="{{ route('delete_ppsd_dzo', array($g->id, $g->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a><br>
@endforeach
@endif

<div class="form-group input-group-sm">
<label for="chairman"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ:</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="dsd[]" multiple="">
</div>
<?php  $ppid1=  DB::table('tbl_dysecretary_details')->where('ro_id', $ro_id )->where('new_dysecretary',1)->orderby('id','desc')->value('id'); ?>
<?php  $droid1=  DB::table('tbl_register_documents')->where('ro_id', $ro_id )->where('applicantid',$ppid1)->get(); ?> 
Uploaded Documents:<br>
@foreach($droid1 as $dd)
@if($dd->filecat == 'dsd')
&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
<a href="{{ route('delete_cd_dzo', array($dd->id, $dd->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a><br>
@endif
@endforeach

        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}"> 
        <input type="hidden" name="edit_id4" id='edit_id4'>
        </div>
      </div>
      </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-xs"><h4>བསྲུང་</h4></button>
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
        </div>
        </form>
</div>
</div>
</div>
<!--Edit Modal End-->
</div>
<!--treasurer tab -->
<div class="tab-pane" id="tab_5">
<div class="col-md-12">
<div class="card"><br>
    <div class="content-header">
    <div class="container-fluid">
            <table id="example5" class="table table-bordered table-striped">
            <b style="color: blue;"><h3>དངུལ་འཛིན་གྱི་ཁ་གསལ་གསརཔ།</h3></b>
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ངོ་མིང་</h3></th>
                  <th><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས་</h3></th>
                 
                  <th><h3>གནས་སྟངས།/དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($td as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->name }}</td>
                  <td>{{ $dc->appdate }}</td>
                 
                  <td>
                    @if($dc->approval_status == '0')
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#updateUserModal5" onclick='fun_edit5({{$dc->id}})'><h4>ཞུན་དག།</h4></button>
                    <span class="btn btn-warning btn-sm"><h4>བསྣར་བཞག</h4></span>@endif
                    @if($dc->approval_status == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>@endif 
                    @if($dc->approval_status == '2')<span class="btn btn-danger btn-sm"><h4>ཟུར་བཏོན།</h4></span>@endif  
                                                                         
                  </td>
              </tr> 
              @endforeach
            </tbody>
            </table>  
            <input type="hidden" name="hidden_view00000" id="hidden_view00000" value="{{url('td/view_dzo')}}"> 
    </div>
    </div>
            <div class="bootstrap-admin-box-title clearfix">
            <a class='btn btn-success  btn-bg' data-toggle='modal' data-target="#addRoleModel5"><i class="fa fa-fw fa-plus"></i><h3>གསརཔ་བཙུགས་ནི་དོན་ལུ་ཨེབ།</h3></a>
            </div>
            @if(Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
            </div>
            @endif
</div> 
</div>
</div>
<!-- Add treasurer sec begins-->
<div class="modal fade" id="addRoleModel5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel"><h3>རྩིས་འཛིན་གྱི་ཁ་གསལ།</h3></h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
                   <form action="{{ route('cid_search_tdnewinfo_dzo',$ro_id) }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                     <div class="col-md-8">
                        <div class="input-group input-group-sm mb-0">
                          <h4><label for="cid">ངོ་སྤྲོད་ལག་ཁྱེར་ཨང་</label>&nbsp;&nbsp;&nbsp;&nbsp;</h4>
                          <input class="form-control form-control-sm" name='cidno' placeholder="Enter CID number" required/>
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger"><h4>འཚོལ་ཞིབ།</h4></button>
                          </div>
                        </div>
                      </div>
                  </form>
      <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('new_treasurer_details_store_dzo',$ro_id) }}">
      <input type="hidden" name="ro_id" value="{{$ro_id}}">
      <input type="hidden" name="new_treasurer" value="1">
      {{ csrf_field() }}
      <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="tname" placeholder="Enter Name">
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <select name='ttype1' id='ttype1' class="form-control" required>
            <option disabled selected><h3>གདམ་ཁ་རྐྱབ་ནི།</h3></option>
              <?php 
              $dzongkhag=App\dzongkhag_dzo::all();
              foreach($dzongkhag as $dzongkhags):
              ?>
              <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
              <?php endforeach ?>
              </select>     
            </div>
            <div class="form-group input-group-sm">
            <label for="tdungkhag"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="tdungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="dsgewog"><h3>རྒེད་འོག</h3></label>
            <select name='tgewog' id='tgewog' class="form-control" required>
            <option><h3>དང་པ་ རྫོང་ཁག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
            </select>
            </div> 
            <div class="form-group input-group-sm">
            <label for="dsvillage"><h3>གཡུས</h3></label>
            <select name='tvillage' id='tvillage' class="form-control " required>
            <option><h3>དང་པ་ རྒེད་འོག་གདམ་ཁ་རྐྱབ༌ནང༌།</h3></option>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="thouseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="thouseno" placeholder="Enter House Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="thramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="tthramno" placeholder="Enter Thram Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="tdob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="tdob" placeholder="Enter DOB Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="tqualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="tqualification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="tphoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="tphoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="temail" placeholder="Email ID"  required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="dcdate"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="tappdate" placeholder="Enter Date Of Election/Appointment">
            </div> 
            <div class="form-group input-group-sm">
                    <label for="photo"><h3>ངོ་པར།</h3></label>
                    <input type="file" name="photo" class="form-control" id='photo'>
                  </div> 

<div class="form-group input-group-sm">
<label for="chairman"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ:</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="td[]" multiple="">
</div>

        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">     
      <div class="col-md-12 modal-footer">
       <button type="submit" class="btn btn-primary btn-xs"><h4>བསྲུང་</h4></button>
       <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
      </div>
      </form>
      </div>
      </div>
      </div>
</div>
</div>
</div>
<!--Model end-->
<!--Edit Modal-->
<div class="modal fade" id="updateUserModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
        <div class="modal-header"><h4 class="modal-title" id="myModalLabel"><h4>ཞུན་དག།</h4></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ route('update_td_dzo') }}">
        {{ csrf_field() }}
        <div class="modal-body">
        <div class="container-fluid">
        <div class="row">
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="name"><h3>ངོ་མིང་</h3></label>
            <input type="text" class="form-control" name="tname" id="tname" placeholder="Enter Name">
            </div>
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>རྫོང་ཁག</h3></label>                              
            <select name='ttype1' id='ttype1' class="form-control">
            <option disabled selected><?php echo $cd =  App\tbl_treasurer_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('dzongkhag');?></option>
              <?php 
              $dzongkhag=App\dzongkhag_dzo::all();
              foreach($dzongkhag as $dzongkhags):
              ?>
              <option value="{{$dzongkhags->dzongkhag_id}}">{{$dzongkhags->dzongkhag_name}}</option>
              <?php endforeach ?>
              </select>     
            </div>
            <div class="form-group input-group-sm">
            <label for="dungkhag"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="tdungkhag" id="tdungkhag" placeholder="Enter dungkhag">
            </div> 
            <div class="form-group input-group-sm">
            <label for="gewog"><h3>རྒེད་འོག</h3></label>
            <select name='tgewog' id='tgewog' class="form-control">
            <option disabled selected><?php echo $cd =  App\tbl_treasurer_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('gewog');?></option>
              <?php 
              $gewog=App\gewog_dzo::all();
              foreach($gewog as $gewogs):
              ?>
              <option value="{{$gewogs->gewog_id}}">{{$gewogs->gewog_name}}</option>
              <?php endforeach ?>
              </select>
            </select>
            </div> 
            <div class="form-group input-group-sm">
            <label for="village"><h3>གཡུས</h3></label>
            <select name='tvillage' id='tvillage' class="form-control ">
            <option disabled selected>
            <?php echo $cd =  App\tbl_treasurer_detail::where('ro_id', $ro_id)->where('approval_status', 0)->orderBy('id', 'desc')->value('village');?>
            </option>
              <?php 
              $village=App\village_dzo::all();
              foreach($village as $villages):
              ?>
              <option value="{{$villages->village_id}}">{{$villages->village_name}}</option>
              <?php endforeach ?>
              </select>
            </select>
            </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="houseno"><h3>གུང་ཨང་</h3></label>
            <input type="text" class="form-control" name="thouseno" id="thouseno" placeholder="Enter House Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="thramno"><h3>ཁྲམ་ཨང་</h3></label>
            <input type="text" class="form-control" name="tthramno" id="tthramno" placeholder="Enter Thram Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="dob"><h3>སྐྱེས་ཚེས</h3></label>
            <input type="date" class="form-control" name="tdob" id="tdob" placeholder="Enter DOB Number">
            </div>
            <div class="form-group input-group-sm">
            <label for="qualification"><h3>ཤེས་ཚད</h3></label>
            <input type="text" class="form-control" name="tqualification" id="tqualification" placeholder="Enter Qualification">
            </div> 
            <div class="form-group input-group-sm">
            <label for="phoneno"><h3>བརྒྱུད་འཕྲིན་ཨང་</h3></label>
            <input type="text" class="form-control" name="tphoneno" id="tphoneno" placeholder="Enter Phone Number">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group input-group-sm">
            <label for="dzongkhag"><h3>གློག་འཕྲིན། གློག་རིག་ཐོག་གི་ཡིག་འཕྲིན།</h3></label>
            <input type="email" class="form-control" name="temail" id="temail" placeholder="Email ID"  required/>
            </div>
            <div class="form-group input-group-sm">
            <label for="date"><h3>བསྐོ་བཞག་གི་སྤྱི་ཚེས</h3></label>
            <input type="date" class="form-control" name="tappdate"  id="tappdate" placeholder="Enter Date Of Election/Appointment">
            </div> 
<?php $pp=  DB::table('tbl_treasurer_details')->where('ro_id', $ro_id )->where('new_treasurer',1)->orderby('id','desc')->value('photo'); ?>
@if($pp=='')
<div class="form-group input-group-sm">
<label for="photo"><h3>ངོ་པར།:</h3></label>
<input type="file" name="tphoto" class="form-control" value="{{$pp}}" id='tphoto'>
</div>
@else
<div class="form-group input-group-sm">
<label for="photo"><h3>ངོ་པར།:</h3></label>
<input type="text" class="form-control" value="{{$pp}}">
</div>
@endif
Uploaded Photo:&nbsp;&nbsp;&nbsp;{{$pp}}
@if($pp == '')
No Photo!
@else
<?php $pppp=  DB::table('tbl_treasurer_details')->where('ro_id', $ro_id )->where('new_treasurer',1)->orderby('id','desc')->limit(1)->get(); ?>
@foreach($pppp as $g)
<a href="{{asset('/images/'.$pp)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
<a href="{{ route('delete_ppt_dzo', array($g->id, $g->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a><br>
@endforeach
@endif

<div class="form-group input-group-sm">
<label for="chairman"><h3>དྲུང་ཆེན་གྱི་ཁ་གསལ:</h3></label>
<input type="file" id="exampleInputFile2"  class="form-control" name="td[]" multiple="">
</div>
<?php  $ppid1=  DB::table('tbl_treasurer_details')->where('ro_id', $ro_id )->where('new_treasurer',1)->orderby('id','desc')->value('id'); ?>
<?php  $droid1=  DB::table('tbl_register_documents')->where('ro_id', $ro_id )->where('applicantid',$ppid1)->get(); ?> 
Uploaded Documents:<br>
@foreach($droid1 as $dd)
@if($dd->filecat == 'td')
&nbsp;&nbsp;&nbsp;{{ $dd->file_name }}
<a href="{{asset('/storage/'.$dd->doc_path)}}" target="youriframe">
<i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a>
<a href="{{ route('delete_cd_dzo', array($dd->id, $dd->ro_id)) }}" onclick="return confirm('Are you sure, you want to Delete ?')"><i class="fa fa-fw fa-trash"></i></a><br>
@endif
@endforeach


        </div>            
<input type="hidden" name="hidden_view_dzo"  id='hidden_view_dzo'  value="{{route('view_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view1_dzo" id='hidden_view1_dzo' value="{{route('view1_addressss_dzo')}}"> 
<input type="hidden" name="hidden_view2_dzo" id='hidden_view2_dzo' value="{{route('view2_addressss_dzo')}}">
        <input type="hidden" name="edit_id5" id='edit_id5'>
        </div>
      </div>
      </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn-xs"><h4>བསྲུང་</h4></button>
        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"><h4>ཆ་མེད</h4></button>
        </div>
        </form>
</div>
</div>
</div>
<!--Edit Modal End-->
</div>

</div></div></div>
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
  $(function () {
    $("#example2").DataTable();
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
  $(function () {
    $("#example3").DataTable();
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
  $(function () {
    $("#example4").DataTable();
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
  $(function () {
    $("#example5").DataTable();
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
<script type="text/javascript">
  $('#type1').change(function()
  {
    var gewog_id=$(this).val();
    var view1_url = $("#hidden_view1_dzo").val();
    $.ajax({
      url: view1_url,
      type:"GET", 
      data: {"id":gewog_id}, 
      success: function(result){
      $('#gewog').empty();
      $("#gewog").prepend("<option disabled selected>Select Gewog</option>");
      $.each(result,function(key,val)
      {
      $('#gewog').append('<option value="'+val.gewog_id+'">'+val.gewog_name+'</option>');
      });
      }
    });
  });
  $('#gewog').change(function()
  {
    var village_id=$(this).val();
    var view2_url = $("#hidden_view2_dzo").val();
    $.ajax({
      url: view2_url,
      type:"GET", 
      data: {"id":village_id}, 
      success: function(result){
      $('#village').empty();
      $("#village").prepend("<option disabled selected>Select village</option>");
      $.each(result,function(key,val)
      {
      $('#village').append('<option value="'+val.village_id+'">'+val.village_name+'</option>');
      });
      }
    });
  });
  $('#type').change(function()
  {
    var dzongkhag_id=$(this).val();
    var view_url = $("#hidden_view_dzo").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":dzongkhag_id}, 
        success: function(result){
          $('#Cdungkhag').empty();
          $("#Cdungkhag").prepend("<option disabled selected>Select Dungkhag</option>");
          $.each(result,function(key,val)
          {
          $('#Cdungkhag').append('<option value="'+val.dungkhag_id+'">'+val.dungkhag_name+'</option>');
          });
        }
      });
  }); 

  ////////////////////////////////////////////////////
   $('#dctype1').change(function()
  {
    var gewog_id=$(this).val();
    var view1_url = $("#hidden_view1_dzo").val();
    $.ajax({
      url: view1_url,
      type:"GET", 
      data: {"id":gewog_id}, 
      success: function(result){
      $('#dcgewog').empty();
      $("#dcgewog").prepend("<option disabled selected>Select Gewog</option>");
      $.each(result,function(key,val)
      {
      $('#dcgewog').append('<option value="'+val.gewog_id+'">'+val.gewog_name+'</option>');
      });
      }
    });
  });
  $('#dcgewog').change(function()
  {
    var village_id=$(this).val();
    var view2_url = $("#hidden_view2_dzo").val();
    $.ajax({
      url: view2_url,
      type:"GET", 
      data: {"id":village_id}, 
      success: function(result){
      $('#dcvillage').empty();
      $("#dcvillage").prepend("<option disabled selected>Select village</option>");
      $.each(result,function(key,val)
      {
      $('#dcvillage').append('<option value="'+val.village_id+'">'+val.village_name+'</option>');
      });
      }
    });
  });
  $('#dctype').change(function()
  {
    var dzongkhag_id=$(this).val();
    var view_url = $("#hidden_view_dzo").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":dzongkhag_id}, 
        success: function(result){
          $('#dcCdungkhag').empty();
          $("#dcCdungkhag").prepend("<option disabled selected>Select Dungkhag</option>");
          $.each(result,function(key,val)
          {
          $('#dcCdungkhag').append('<option value="'+val.dungkhag_id+'">'+val.dungkhag_name+'</option>');
          });
        }
      });
  }); 
////////////////////////////////////////////////////
   $('#stype1').change(function()
  {
    var gewog_id=$(this).val();
    var view1_url = $("#hidden_view1_dzo").val();
    $.ajax({
      url: view1_url,
      type:"GET", 
      data: {"id":gewog_id}, 
      success: function(result){
      $('#sgewog').empty();
      $("#sgewog").prepend("<option disabled selected>Select Gewog</option>");
      $.each(result,function(key,val)
      {
      $('#sgewog').append('<option value="'+val.gewog_id+'">'+val.gewog_name+'</option>');
      });
      }
    });
  });
  $('#sgewog').change(function()
  {
    var village_id=$(this).val();
    var view2_url = $("#hidden_view2_dzo").val();
    $.ajax({
      url: view2_url,
      type:"GET", 
      data: {"id":village_id}, 
      success: function(result){
      $('#svillage').empty();
      $("#svillage").prepend("<option disabled selected>Select village</option>");
      $.each(result,function(key,val)
      {
      $('#svillage').append('<option value="'+val.village_id+'">'+val.village_name+'</option>');
      });
      }
    });
  });
  $('#stype').change(function()
  {
    var dzongkhag_id=$(this).val();
    var view_url = $("#hidden_view_dzo").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":dzongkhag_id}, 
        success: function(result){
          $('#sCdungkhag').empty();
          $("#sCdungkhag").prepend("<option disabled selected>Select Dungkhag</option>");
          $.each(result,function(key,val)
          {
          $('#sCdungkhag').append('<option value="'+val.dungkhag_id+'">'+val.dungkhag_name+'</option>');
          });
        }
      });
  }); 
  ////////////////////////////////////////////////////
   $('#dstype1').change(function()
  {
    var gewog_id=$(this).val();
    var view1_url = $("#hidden_view1_dzo").val();
    $.ajax({
      url: view1_url,
      type:"GET", 
      data: {"id":gewog_id}, 
      success: function(result){
      $('#dsgewog').empty();
      $("#dsgewog").prepend("<option disabled selected>Select Gewog</option>");
      $.each(result,function(key,val)
      {
      $('#dsgewog').append('<option value="'+val.gewog_id+'">'+val.gewog_name+'</option>');
      });
      }
    });
  });
  $('#dsgewog').change(function()
  {
    var village_id=$(this).val();
    var view2_url = $("#hidden_view2_dzo").val();
    $.ajax({
      url: view2_url,
      type:"GET", 
      data: {"id":village_id}, 
      success: function(result){
      $('#dsvillage').empty();
      $("#dsvillage").prepend("<option disabled selected>Select village</option>");
      $.each(result,function(key,val)
      {
      $('#dsvillage').append('<option value="'+val.village_id+'">'+val.village_name+'</option>');
      });
      }
    });
  });
  $('#dstype').change(function()
  {
    var dzongkhag_id=$(this).val();
    var view_url = $("#hidden_view_dzo").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":dzongkhag_id}, 
        success: function(result){
          $('#dsCdungkhag').empty();
          $("#dsCdungkhag").prepend("<option disabled selected>Select Dungkhag</option>");
          $.each(result,function(key,val)
          {
          $('#dsCdungkhag').append('<option value="'+val.dungkhag_id+'">'+val.dungkhag_name+'</option>');
          });
        }
      });
  }); 
   ////////////////////////////////////////////////////
   $('#ttype1').change(function()
  {
    var gewog_id=$(this).val();
    var view1_url = $("#hidden_view1_dzo").val();
    $.ajax({
      url: view1_url,
      type:"GET", 
      data: {"id":gewog_id}, 
      success: function(result){
      $('#tgewog').empty();
      $("#tgewog").prepend("<option disabled selected>Select Gewog</option>");
      $.each(result,function(key,val)
      {
      $('#tgewog').append('<option value="'+val.gewog_id+'">'+val.gewog_name+'</option>');
      });
      }
    });
  });
  $('#tgewog').change(function()
  {
    var village_id=$(this).val();
    var view2_url = $("#hidden_view2_dzo").val();
    $.ajax({
      url: view2_url,
      type:"GET", 
      data: {"id":village_id}, 
      success: function(result){
      $('#tvillage').empty();
      $("#tvillage").prepend("<option disabled selected>Select village</option>");
      $.each(result,function(key,val)
      {
      $('#tvillage').append('<option value="'+val.village_id+'">'+val.village_name+'</option>');
      });
      }
    });
  });
  $('#ttype').change(function()
  {
    var dzongkhag_id=$(this).val();
    var view_url = $("#hidden_view_dzo").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":dzongkhag_id}, 
        success: function(result){
          $('#tCdungkhag').empty();
          $("#tCdungkhag").prepend("<option disabled selected>Select Dungkhag</option>");
          $.each(result,function(key,val)
          {
          $('#tCdungkhag').append('<option value="'+val.dungkhag_id+'">'+val.dungkhag_name+'</option>');
          });
        }
      });
  }); 
</script>
<script>
   function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          $("#edit_id").val(result.id);
          $("#ename").val(result.name);
          $("#etype1").val(result.dzongkhag);
          $("#edungkhag").val(result.dungkhag);
          $("#evillage").val(result.village);
          $("#egewog").val(result.gewog);
          $("#ehouseno").val(result.houseno);
          $("#ethramno").val(result.thramno);
          $("#edob").val(result.dob);
          $("#equalification").val(result.qualification);
          $("#eemail").val(result.email);
          $("#eappdate").val(result.appdate);
          $("#ephoneno").val(result.phoneno);

        }
      });
    }
</script>
<script>
   function fun_edit2(id)
    {
      var view_url = $("#hidden_view00").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          $("#edit_id2").val(result.id);
          $("#edcname").val(result.name);
          $("#edctype1").val(result.dzongkhag);
          $("#edcdungkhag").val(result.dungkhag);
          $("#edcvillage").val(result.village);
          $("#edcgewog").val(result.gewog);
          $("#edchouseno").val(result.houseno);
          $("#edcthramno").val(result.thramno);
          $("#edcdob").val(result.dob);
          $("#edcqualification").val(result.qualification);
          $("#edcemail").val(result.email);
          $("#edcappdate").val(result.appdate);
          $("#edcphoneno").val(result.phoneno);

        }
      });
    }
</script>
<script>
   function fun_edit3(id)
    {
      var view_url = $("#hidden_view000").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          $("#edit_id3").val(result.id);
          $("#esname").val(result.name);
          $("#estype1").val(result.dzongkhag);
          $("#esdungkhag").val(result.dungkhag);
          $("#esvillage").val(result.village);
          $("#esgewog").val(result.gewog);
          $("#eshouseno").val(result.houseno);
          $("#esthramno").val(result.thramno);
          $("#esdob").val(result.dob);
          $("#esqualification").val(result.qualification);
          $("#esemail").val(result.email);
          $("#esappdate").val(result.appdate);
          $("#esphoneno").val(result.phoneno);

        }
      });
    }
</script>
<script>
   function fun_edit4(id)
    {
      var view_url = $("#hidden_view0000").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          $("#edit_id4").val(result.id);
          $("#edsname").val(result.name);
          $("#edstype1").val(result.dzongkhag);
          $("#edsdungkhag").val(result.dungkhag);
          $("#edsvillage").val(result.village);
          $("#edsgewog").val(result.gewog);
          $("#edshouseno").val(result.houseno);
          $("#edsthramno").val(result.thramno);
          $("#edsdob").val(result.dob);
          $("#edsqualification").val(result.qualification);
          $("#edsemail").val(result.email);
          $("#edsappdate").val(result.appdate);
          $("#edsphoneno").val(result.phoneno);

        }
      });
    }
</script>
<script>
   function fun_edit5(id)
    {
      var view_url = $("#hidden_view00000").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          $("#edit_id5").val(result.id);
          $("#tname").val(result.name);
          $("#ttype1").val(result.dzongkhag);
          $("#tdungkhag").val(result.dungkhag);
          $("#tvillage").val(result.village);
          $("#tgewog").val(result.gewog);
          $("#thouseno").val(result.houseno);
          $("#tthramno").val(result.thramno);
          $("#tdob").val(result.dob);
          $("#tqualification").val(result.qualification);
          $("#temail").val(result.email);
          $("#tappdate").val(result.appdate);
          $("#tphoneno").val(result.phoneno);

        }
      });
    }
</script>
