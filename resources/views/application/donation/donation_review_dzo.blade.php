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
            <h5 class="m-0 text-dark"><h3>ཞལ་འདེབས།</h5>
              <p>
              <?php
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

    <section class="content">
    <div class="container-fluid">



<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-8 form-group">
<div class="card-body">
@foreach($donation as $dc)
   <div class="form-row">
     <label class="col-sm-3 col-form-label"  for="purpose"><h3>དགོས་དོན།</h3></label>
     <h4>{{ $dc->purpose }}</h4>
   </div><br>   
@endforeach
</div>
</div>
</div>

<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 form-group"> 

<h3 style="color: orange;">མཁོ་སྤྲོད་འབད་མི།</h3>
<br>
   
    <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th><h3>ཨང༌།</h3></th>
                  <th><h3>ལག་ཁྱེར་ཨང༌།</h3></th>
                  <th><h3>ངོ་མིང་</h3></th>
                  <th><h3>རྫོང་ཁག</h3></th>
                  <th><h3>རྒེད་འོག</h3></th>
                  <th><h3>དང་ལེན།</h3></th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($donationcollector as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->cid }}</td>
                  <td><h4>{{ $dc->name }}</h4></td>
                  <td><h4><?php if (is_numeric($dc->dzongkhag)) { echo "<?php echo $dzo = App\dzongkhag::where('dzongkhag_id',$dc->dzongkhag)->value('dzongkhag_name');?>"; } else { echo "$dc->dzongkhag"; } ?></h4></td>
                  <td><h4><?php if (is_numeric($dc->gewog)) { echo "<?php echo $dzo = App\gewog::where('gewog_id',$dc->gewog)->value('gewog_name');?>"; } else { echo "$dc->gewog"; } ?></h4></td>
                  <td>
                  <td>
                    @foreach($donation as $dooc)
                    @if( $dooc->approve == '0') 
                    <a href="{{ route('destroy_dzo', array($dc->id, $dc->donation_id)) }}" title="Remove" onclick="return confirm('Are you sure to Remove this Data');"><i class="fa fa-fw fa-trash" style="color: red;"></i>བཏོན་གཏང་། 
                    @else
                    <h4>གནང་བ་འགྲོལ། </h4>
                    @endif
                    @endforeach                
                  </td>
              </tr>
               @endforeach
            </tbody>
    </table> 
</div>
</div> 
</div> 



<div class="col-md-12">
<div class="card"> 
<dl class="dl-horizontal">

@foreach($donation as $dooc)
<form role="form" method="POST" action="{{ route('approve_donation_dzo', $dooc->id) }}" enctype="multipart/form-data" onSubmit="return validateThisFrom (this);">
<input type="hidden" name="id" value="{{$dooc->id}}">
{{ csrf_field() }}       
@if(Auth::user()->role_id == '2') 

@if( $dooc->approve == '0') 

<!--Assessment-->
        <div class="card" style="background-image: linear-gradient(to bottom right,  #f7c443, #fcbe21);">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="col-md-6">
             <div class="card-header"><h6 class="card-title"><h3>བརྟག་ཞིབ།/ཐག་གཅད།</h3></h6></div>
          <div class="card-body">
             <dt><h3>ཐག་གཅད།:<font color="red">*</font></h3></dt>
             <dd>
             <select  name="approve" id="approve"  class="form-control" required="required">
                <option value="">- select -</option>                        
                <option value="1"><h4>གནང་བ་འགྲོལ།</h4></option>
                <option value="2"><h4> ཕྱིར་བཏོན།</h4></option>   
             </select>
             </dd> 
             <dt><h3>ངོས་ལེན་ཡི་གུ།:<font color="red">*</font></h3></dt>
             <dd><input type="file" id="approval_letter_no"  class="form-control" name="approval_letter_no" required="required"></dd>
             <dt><h3>གནང་བ་གནང་མི་སྤྱི་ཚེས:</h3></dt>
             <dd><input type="date" id="approval_date" class="form-control" name="approval_date" <?php echo " value='".date('Y-m-d')."'";?> readonly></dd>
             <dt><h3>བསམ་འཆར་བཤད།</h3></dt>
             <dd><textarea id="remarks" type="text" class="form-control" name="remarks" rows="4" placeholder="Remarks ..."></textarea></dd>
          </div>
             <input type="hidden" name="edit_id" id='edit_id'>
             <div class="col-md-12" "modal-footer">
             <button type="submit" class="btn btn-success btn-bg" style="float:left;"><h3> བསྲུང་། </h3></button>
             </div>
             </div> 
             </dl>
        </div> 
<!--Assess End--> 
@else
 <div class="form-row"> 
            <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>བརྟག་ཞིབ།/ཐག་གཅད།:</h3></dt>
             <dd class="col-form-label col-sm-6">
                  @if($dooc->approve == '0')
                  <span class="btn btn-danger btn-sm"><h4>བསྣར་བཞག།</h4></span>
                  @elseif($dooc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>
                  @elseif($dooc->approve == '2')<span class="btn btn-danger btn-sm"><h4>ཕྱིར་བཏོན།</h4></span>
                  @endif
             </dd> 
            </div>
            <div class="form-row">
             <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>ངོས་ལེན་ཡི་གུ།:</h3></dt>
             <dd class="col-form-label col-sm-6">{{ $dooc->approval_letter_no }}
             <a href="{{asset('/images/'.$dooc->approval_letter_no)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a></dd>
            </div>
            <div class="form-row">
             <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>གནང་བ་གནང་མི་སྤྱི་ཚེས:</h3></dt>
             <dd class="col-form-label col-sm-6"><?php $date= strtotime($dooc->approved_on); echo date('d M Y', $date); ?></dd>
            </div>
            <div class="form-row"> 
             <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>བསམ་འཆར།:</h3></dt>
             <dd class="col-form-label col-sm-6">{{ $dooc->remarks }}</dd> 
            </div>

          <div class="col-md-12 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
                         <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
          <div class="info-box-content">
              <span class="info-box-text"><h2>དྲན་གསོ།</h2></span>
              <span class="info-box-number">
                <?php   
                $valid = date_create($dooc->approved_on); 
                $curdate = date_create(date('Y-m-d')); 
                $interval = date_diff($valid, $curdate);    
                $convert = $interval->format('%a'); 
                $month = ($convert % 365) / 30; // I choose 30.5 for Month (30,31) ;)
                $month = floor($month); // Remove all decimals
                $days = ($convert % 365) % 30; // the rest of days
                echo $month.' month - '.$days.' days';echo " : Since Approval from Chhoedey Lhentshog.";
                if ($month < '1') {
                echo "</br>First Month's Report Pending<h3> སྙན་ཞུ་དངམ་བསྐྱལ་དགོཔ་ཡོདཔ།</h3>";
                } elseif($month >= '6') {
                echo "</br>Sixth Month's Report Pending!<h3>ཟླཝ་དྲུ་ཚརཝ་ལས་ སྙན་ཞུ་བསྐྱལ་དགོཔ་ཡོདཔ།</h3>";
                }
                ?>
              </span>
          </div>
          </div>
          </div>   

@endif
@else

            <div class="form-row"> 
            <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>བརྟག་ཞིབ།/ཐག་གཅད།:</h3></dt>
             <dd class="col-form-label col-sm-6">
                  @if($dooc->approve == '0')
                  <span class="btn btn-danger btn-sm"><h4>བསྣར་བཞག།</h4></span>
                  @elseif($dooc->approve == '1')<span class="btn btn-warning btn-sm"><h4>གནང་བ་འགྲོལ།</h4></span>
                  @elseif($dooc->approve == '2')<span class="btn btn-danger btn-sm"><h4>ཕྱིར་བཏོན།</h4></span>
                  @endif
             </dd> 
            </div>
            <div class="form-row">
             <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>ངོས་ལེན་ཡི་གུ།:</h3></dt>
             <dd class="col-form-label col-sm-6">{{ $dooc->approval_letter_no }}
             <a href="{{asset('/images/'.$dooc->approval_letter_no)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>སྔོན་ཞིབ།</a></dd>
            </div>
            <div class="form-row">
             <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>གནང་བ་གནང་མི་སྤྱི་ཚེས:</h3></dt>
             <dd class="col-form-label col-sm-6"><?php $date= strtotime($dooc->approved_on); echo date('d M Y', $date); ?></dd>
            </div>
            <div class="form-row"> 
             <dt class="col-sm-6 col-form-label" style="text-align: right;"><h3>བསམ་འཆར།:</h3></dt>
             <dd class="col-form-label col-sm-6">{{ $dooc->remarks }}</dd> 
            </div>
          @if($dooc->approve == '1')
          <div class="col-md-12 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
                         <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
          <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
          <div class="info-box-content">
              <span class="info-box-text"><h2>དྲན་གསོ།</h2></span>
              <span class="info-box-number">
                <?php   
                $valid = date_create($dooc->approved_on); 
                $curdate = date_create(date('Y-m-d')); 
                $interval = date_diff($valid, $curdate);    
                $convert = $interval->format('%a'); 
                $month = ($convert % 365) / 30; // I choose 30.5 for Month (30,31) ;)
                $month = floor($month); // Remove all decimals
                $days = ($convert % 365) % 30; // the rest of days
                echo $month.' month - '.$days.' days';echo " : Since Approval from Chhoedey Lhentshog.";
                if ($month < '1') {
                  echo "</br>First Month's Report Pending!<h3> སྙན་ཞུ་དངམ་བསྐྱལ་དགོཔ་ཡོདཔ།</h3>";
                } elseif($month >= '6') {
                echo "</br>Sixth Month's Report Pending!<h3>ཟླཝ་དྲུ་ཚརཝ་ལས་ སྙན་ཞུ་བསྐྱལ་དགོཔ་ཡོདཔ།</h3>";
                }
                ?>
              </span>
          </div>
          </div>
          </div>
          @endif 
           
          
@endif
@endforeach  
</form>  

</dl>
</div>
</div>    

    </div>
    </section> 

</div>
</div>    
</div>
@include('application.includes.footer_dzo')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
