  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css")}}">
  <link rel="stylesheet" href="{{asset("https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
  <link rel="stylesheet" href="{{asset("/bower_components/admin-lte/dist/css/adminlte.min.css")}}">
    <!--oncahnge-->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.5.1.min.js"></script>
<body class="hold-transition sidebar-mini">
@include('application.includes.header')
@include('application.includes.sidebar')
<div class="content-wrapper">
@include('flash-message')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h5 class="m-0 text-dark">New Donation Request</h5>
              <p>
              <?php
              echo $dzo = App\tbl_agency::where('id', Auth::user()->organization)->value('agency');
              echo ", ";
              echo $dzo = App\dzongkhag::where('dzongkhag_id', Auth::user()->dzongkhag_id)->value('dzongkhag_name');
              ?>
             </p>             
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Religious Organization</li>
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
     <label class="col-sm-3 col-form-label"  for="purpose">Purpose:</label>
     {{ $dc->purpose }}
   </div><br>
@endforeach
</div>
</div>
</div>

<div class="row">
<div class="col-sm-2"></div>
<div class="col-sm-8 form-group"> 

<p>Donation Collection Team.</p>
<br>
   
    <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr style="text-align: left;">  
                  <th>No</th>
                  <th>CID</th>
                  <th>Name</th>
                  <th>Dzongkhag</th>
                  <th>Gewog</th>
                  <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $id = 1;?>
              @foreach($donationcollector as $dc)
              <tr>
                  <td>{{$id++}}</td>
                  <td>{{ $dc->cid }}</td>
                  <td>{{ $dc->name }}</td>
                  <td>
                  <?php if (is_numeric($dc->dzongkhag)) { echo "<?php echo $dzo = App\dzongkhag::where('dzongkhag_id',$dc->dzongkhag)->value('dzongkhag_name');?>"; } else { echo "$dc->dzongkhag"; } ?>
                  </td>
                  <td>
                  <?php if (is_numeric($dc->gewog)) { echo "<?php echo $dzo = App\gewog::where('gewog_id',$dc->gewog)->value('gewog_name');?>"; } else { echo "$dc->gewog"; } ?></td>
                  <td>
                    @foreach($donation as $dooc)
                    @if( $dooc->approve == '0') 
                    <a href="{{ route('destroy', array($dc->id, $dc->donation_id)) }}" title="Remove" onclick="return confirm('Are you sure to Remove this Data');"><i class="fa fa-fw fa-trash" style="color: red;"></i>Delete 
                    @else
                    Reviewed.
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
<form role="form" method="POST" action="{{ route('approve_donation', $dooc->id) }}" enctype="multipart/form-data" onSubmit="return validateThisFrom (this);">
<input type="hidden" name="id" value="{{$dooc->id}}">
{{ csrf_field() }}       
@if(Auth::user()->role_id == '2') 

@if( $dooc->approve == '0') 

<!--Assessment-->
        <div class="card" style="background-image: linear-gradient(to bottom right,  #f7c443, #fcbe21);">              
             {{ csrf_field() }}
             <dl class="dl-horizontal">
             <div class="col-md-6">
             <div class="card-header"><h6 class="card-title">Assessment/Review Decision</h6></div>
          <div class="card-body">
             <dt>Assessment Decision:<font color="red">*</font></dt>
             <dd>
             <select  name="approve" id="approve"  class="form-control">
                <option value="">- select -</option>                        
                <option value="1">Approve</option>
                <option value="2">Reject</option>   
             </select>
             </dd> 
             <dt>Approval Letter:<font color="red">*</font></dt>
             <dd><input type="file" id="approval_letter_no"  class="form-control" name="approval_letter_no" required="required"></dd>
             <dt>Approval Date:</dt>
             <dd><input type="date" id="approval_date" class="form-control" name="approval_date" <?php echo " value='".date('Y-m-d')."'";?> readonly></dd>
             <dt>Remarks:</dt>
             <dd><textarea id="remarks" type="text" class="form-control" name="remarks" rows="4" placeholder="Remarks ..."></textarea></dd>
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
 <div class="form-row"> 
            <dt class="col-sm-6 col-form-label" style="text-align: right;">Assessment/Review Decision:</dt>
             <dd class="col-form-label col-sm-6">
                  @if($dooc->approve == '0')
                  <span class="btn btn-danger btn-sm">Review Pending</span>
                  @elseif($dooc->approve == '1')<span class="btn btn-warning btn-sm">Approved</span>
                  @elseif($dooc->approve == '2')<span class="btn btn-warning btn-sm">Rejected</span>
                  @endif
             </dd> 
            </div>
            <div class="form-row">
             <dt class="col-sm-6 col-form-label" style="text-align: right;">Approval Letter:</dt>
             <dd class="col-form-label col-sm-6">{{ $dooc->approval_letter_no }}
             <a href="{{asset('/images/'.$dooc->approval_letter_no)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a></dd>
            </div>
            <div class="form-row">
             <dt class="col-sm-6 col-form-label" style="text-align: right;">Approval Date:</dt>
             <dd class="col-form-label col-sm-6"><?php $date= strtotime($dooc->approved_on); echo date('d M Y', $date); ?></dd>
            </div>
            <div class="form-row"> 
             <dt class="col-sm-6 col-form-label" style="text-align: right;">Remarks:</dt>
             <dd class="col-form-label col-sm-6">{{ $dooc->remarks }}</dd> 
            </div>

          <div class="col-md-12 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
          <div class="info-box-content">
              <span class="info-box-text">Reminder</span>
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
                echo "</br>First Month's Report Pending!";
                } elseif($month >= '6') {
                echo "</br>Sixth Month's Report Pending!";
                }
                ?>
              </span>
          </div>
          </div>
          </div>             

           
@endif
@else
 
            <div class="form-row"> 
            <dt class="col-sm-6 col-form-label" style="text-align: right;">Assessment/Review Decision:</dt>
             <dd class="col-form-label col-sm-6">
                  @if($dooc->approve == '0')
                  <span class="btn btn-danger btn-sm">Review Pending</span>
                  @elseif($dooc->approve == '1')<span class="btn btn-warning btn-sm">Approved</span>
                  @elseif($dooc->approve == '2')<span class="btn btn-warning btn-sm">Rejected</span>
                  @endif
             </dd> 
            </div>
            <div class="form-row">
             <dt class="col-sm-6 col-form-label" style="text-align: right;">Approval Letter:</dt>
             <dd class="col-form-label col-sm-6">{{ $dooc->approval_letter_no }}
             <a href="{{asset('/images/'.$dooc->approval_letter_no)}}" target="youriframe">
             <i class="fa fa-fw fa-file-pdf"></i>Preview</a></dd>
            </div>
            <div class="form-row">
             <dt class="col-sm-6 col-form-label" style="text-align: right;">Approval Date:</dt>
             <dd class="col-form-label col-sm-6"><?php $date= strtotime($dooc->approved_on); echo date('d M Y', $date); ?></dd>
            </div>
            <div class="form-row"> 
             <dt class="col-sm-6 col-form-label" style="text-align: right;">Remarks:</dt>
             <dd class="col-form-label col-sm-6">{{ $dooc->remarks }}</dd> 
            </div>
          @if($dooc->approve == '1')
          <div class="col-md-12 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
          <span class="info-box-icon"><i class="fa fa-calendar"></i></span>
          <div class="info-box-content">
              <span class="info-box-text">Reminder</span>
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
                echo "</br>First Month's Report Pending!";
                } elseif($month >= '6') {
                echo "</br>Sixth Month's Report Pending!";
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
@include('application.includes.footer')
</body>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js")}}"></script>
<link rel="stylesheet" href="{{asset("/bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}">
<script src="{{asset("/bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
