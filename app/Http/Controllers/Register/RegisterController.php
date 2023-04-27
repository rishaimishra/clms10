<?php

namespace App\Http\Controllers\Register;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendEmail;
use App\Mail\SendRejectEmail;
use App\user;
use App\tbl_patron;
use App\tbl_ro_detail;
use App\tbl_chairman_detail;
use App\tbl_dychairman_detail;
use App\tbl_secretary_detail;
use App\tbl_dysecretary_detail;
use App\tbl_treasurer_detail;
use App\tbl_register_document;
use App\tbl_info_update;
use App\tbl_agency;
use App\dzongkhag;
use App\dzongkhag_dzo;
use App\gewog;
use App\gewog_dzo;
use App\village;
use App\token;
use App\tbl_newmember;
use App\tbl_deregister;
use App\tbl_deregister_doc;
use Auth;
use Session;
use Mail;
use DB;
use Image;

use App\Http\Requests\RegisterDocumentRequest;
use App\Http\Requests\DeRegisterDocumentRequest;

class RegisterController extends Controller
{
    public function registrationno_store(Request $request)
    {
        $id = $request->ro_id;
        $agency2 = tbl_ro_detail::where('ro_id', $id)->latest()->firstOrFail();
        $agency2->registration_no=$request->registration_no;  
        $agency2->updated_by=Auth::user()->id;
        $agency2->updated_at=date('Y-m-d');
        $agency2->save();
        $request->session()->flash('alert-info', 'Registration number Saved Successfully');
        return redirect()->route('application.home_ro')->with('success','Registration number has been saved!');
    }
      public function registrationno_store_dzo(Request $request)
    {
        $id = $request->ro_id;
        $agency2 = tbl_ro_detail::where('ro_id', $id)->latest()->firstOrFail();
        $agency2->registration_no=$request->registration_no;  
        $agency2->updated_by=Auth::user()->id;
        $agency2->updated_at=date('Y-m-d');
        $agency2->save();
        $request->session()->flash('alert-info', 'Registration number Saved Successfully');
        return redirect()->route('application.home_ro_dzo')->with('success','Registration number has been saved!');
    }




    public function cid_search(Request $request) 
    {  
        $cidno = $request->cidno;
        return view('application.register_member.register_new_cid', compact('cidno'));  
    }
    public function cid_search_dzo(Request $request) 
    {
        $cidno = $request->cidno;
        return view('application.register_member.register_new_cid_dzo', compact('cidno'));  
    }
    public function cid_search_cdreg(Request $request, $det)
    {   $cidno = $request->cidno;
        $dets = $det;
        $croid=  DB::table('tbl_chairman_details')->where('ro_id', $dets )->where('approval_status','!=' , 1)->value('ro_id');  
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=' , 1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=' , 1)->value('ro_id'); 
        $data=  DB::table('tbl_chairman_details')->where('ro_id', $dets )->where('approval_status','!=' , 1)->get(); 
        return view('application.register.chairman_details_cid',compact('dets','croid','token_no','ro_id','data','cidno'));
    }
    public function cid_search_cdreg_dzo(Request $request, $det)
    {   $cidno = $request->cidno;
        $dets = $det;
        $croid=  DB::table('tbl_chairman_details')->where('ro_id', $dets )->where('approval_status','!=' , 1)->value('ro_id');  
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=' , 1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=' , 1)->value('ro_id'); 
        $data=  DB::table('tbl_chairman_details')->where('ro_id', $dets )->where('approval_status','!=' , 1)->get(); 
        return view('application.register.chairman_details_cid_dzo',compact('dets','croid','token_no','ro_id','data','cidno'));
    }
    public function cid_search_dcdreg(Request $request,$dets)
    {
        $cidno = $request->cidno;
        $dets = $dets; 
        $dcroid=  DB::table('tbl_dychairman_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id');
        $data=  DB::table('tbl_dychairman_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get(); 
        return view('application.register.dychairman_details_cid',compact('dets','dcroid','token_no','ro_id','data','cidno'));
    }
    public function cid_search_dcdreg_dzo(Request $request,$dets)
    {
        $cidno = $request->cidno;
        $dets = $dets; 
        $dcroid=  DB::table('tbl_dychairman_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id');
        $data=  DB::table('tbl_dychairman_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get(); 
        return view('application.register.dychairman_details_cid_dzo',compact('dets','dcroid','token_no','ro_id','data','cidno'));
    }
    public function cid_search_sdreg(Request $request,$dets)
    {
        $cidno = $request->cidno;
        $dets = $dets; 
        $sroid=  DB::table('tbl_secretary_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id');
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no');
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id'); 
        $data=  DB::table('tbl_secretary_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get();  
        return view('application.register.secretary_details_cid',compact('dets','sroid','token_no','ro_id','data','cidno'));
    }
    public function cid_search_sdreg_dzo(Request $request,$dets)
    {
        $cidno = $request->cidno;
        $dets = $dets; 
        $sroid=  DB::table('tbl_secretary_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id');
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no');
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id'); 
        $data=  DB::table('tbl_secretary_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get();  
        return view('application.register.secretary_details_cid_dzo',compact('dets','sroid','token_no','ro_id','data','cidno'));
    }
    public function cid_search_dsdreg(Request $request,$dets)
    {
        $cidno = $request->cidno;
        $dets = $dets; 
        $dsroid=  DB::table('tbl_dysecretary_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id'); 
        $data=  DB::table('tbl_dysecretary_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get();
        return view('application.register.dysecretary_details_cid',compact('dets','dsroid','token_no','ro_id','data','cidno'));
    }
    public function cid_search_dsdreg_dzo(Request $request,$dets)
    {
        $cidno = $request->cidno;
        $dets = $dets; 
        $dsroid=  DB::table('tbl_dysecretary_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id'); 
        $data=  DB::table('tbl_dysecretary_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get();
        return view('application.register.dysecretary_details_cid_dzo',compact('dets','dsroid','token_no','ro_id','data','cidno'));
    }
    public function cid_search_tdreg(Request $request,$dets)
    {
        $cidno = $request->cidno;
        $dets = $dets;
        $troid=  DB::table('tbl_treasurer_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no');  
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id');
        $data=  DB::table('tbl_treasurer_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get(); 
        return view('application.register.treasurer_details_cid',compact('dets','troid','token_no','ro_id','data','cidno'));
    }
    public function cid_search_tdreg_dzo(Request $request,$dets)
    {
        $cidno = $request->cidno;
        $dets = $dets;
        $troid=  DB::table('tbl_treasurer_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no');  
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id');
        $data=  DB::table('tbl_treasurer_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get(); 
        return view('application.register.treasurer_details_cid_dzo',compact('dets','troid','token_no','ro_id','data','cidno'));
    }




//////MEMBER REGISTER/////
    public function member_register()
    {
        $member= tbl_newmember::where('host', Auth::user()->organization )->get();
        return view('application.register_member.index',compact('member'));
    }
    public function register_new()
    {
    return view('application.register_member.register_new');
    }
    public function newmember_store(Request $request)
    {        
        $host = Auth::user()->organization;
        $newm = new tbl_newmember; 
        $newm->cid=$request->cid;     
        $newm->name=$request->name;
        $newm->dzongkhag=$request->type1;
        $newm->gewog=$request->gewog;
        $newm->village=$request->village;
        $newm->contact=$request->contact;
        $newm->thramno=$request->thramno;
        $newm->houseno=$request->houseno;
        $newm->registration_date=$request->registration_date;
        $newm->membertype=$request->membertype;
        $newm->branch_name=$request->branch_name;
        $newm->created_at=date('Y-m-d');
        $newm->host=$host;
        $newm->created_by=Auth::user()->id;
        $newm->save(); 
        return redirect()->route('member_register')->with('success','New Member Registration Successfull!');
    } 
    public function delete_member($id)
    {
        $me = new tbl_newmember;
        $me::where('id', $id)->delete();
        return redirect()->route('member_register')->with('success','Member Deleted Successfully!');
    }
       public function ajaxRequestPost(Request $request)
            {
             
                 $cid = $request->cid;
                 $dup  = count(DB::table('tbl_newmembers')->where('cid',$cid)->get());       
                 if( $dup > 0)
                    {
                    return json_encode(['success'=>1]); // success => 1 for Already taken
                    }
                    else
                    {
                    return json_encode(['success'=>0]); // You can use this Email Name
                    }                    
            }
//////DEREGISTERATION/////
    public function deregister()
    {
        return view('application.deregister.index');
    }
    public function deregister_store(Request $request)
    {        
        $host = Auth::user()->organization;
        $de = new tbl_deregister;      
        $de->deregister_date=$request->deregister_date;
        $de->reason=$request->reason;
        $de->details=$request->details;
        $de->created_at=date('Y-m-d');
        $de->host=$host;
        $de->created_by=Auth::user()->id;
        $de->save(); 
        $request_letter = 'request_letter';
         if($request->request_letter != 0){
         foreach ($request->request_letter as $file) {
            $path = $file->store('request_letter');
            tbl_deregister_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $de->id,
                'filecat' => $request_letter,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('deregister')->with('success','De-registration Request Submitted to Chhoedey Lhentshog!');
    } 
    public function deregister_view()
    {
        $deregister= tbl_deregister::all();
        $deregisterdoc= tbl_deregister_doc::all();
        return view('application.deregister.deregister_view',compact('deregister','deregisterdoc'));
    }
    public function deregister_viewdetails($id)
    {        
       $id = $id;
       $deregister = tbl_deregister::where('id',$id)->get();
       $deregisterdoc= tbl_deregister_doc::where('app_id',$id)->get();
       return view('application.deregister.deregister_viewdetails',compact('deregister','deregisterdoc','id'));
    }
    public function approve_deregister(Request $request,$id)
    {
        $id = $id;
        $der = tbl_deregister::where('id', $id)->value('id'); 
        $der = tbl_deregister::where('id', $id)->firstOrFail();
        $der->approve=$request->approve;
        $der->remarks=$request->remarks;
        $der->updated_by=Auth::user()->id;
        $der->updated_at=date('Y-m-d');
        $der->save();
        $order = 'order';
         if($request->order != 0){
         foreach ($request->order as $file) {
            $path = $file->store('order');
            tbl_deregister_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $order,
                'doc_path' => $path
            ]);
            }
         }
    //statustogglein tbl_ro_detail//
        $org = tbl_deregister::where('id', $id)->value('host'); 
        $agency = tbl_agency::where('id', $org)->value('agency');
        $agency2 = tbl_ro_detail::where('name', $agency)->latest()->firstOrFail();
        $agency2->approve='0';
        $agency2->updated_by=Auth::user()->id;
        $agency2->updated_at=date('Y-m-d');
        $agency2->save();
    //statustogglein tbl_agency//
        $approve=$request->approve;
        if($approve == '1')
        {
        $org = tbl_deregister::where('id', $id)->value('host'); 
        $anc = tbl_agency::where('id', $org)->latest()->firstOrFail();
        $anc->status='0';
        $anc->created_by=Auth::user()->id;
        $anc->created_at=date('Y-m-d');
        $anc->updated_at=date('Y-m-d');
        $anc->save();
        }
    ///user login deactivate//
        $org = tbl_deregister::where('id', $id)->value('host'); 
        $cd = user::where('organization', $org)->value('organization');
        $cd = user::where('organization', $org)->get();
        foreach($cd as $cds)
        {
        $cds->status ='0';
        $cds->save();
        }
        $request->session()->flash('alert-info', 'Assessment Successful');
        return redirect()->route('deregister_view')->with('success','Assessment of De-Registration Request has been saved!');
    }





















//////REGISTER RO/////////
    public function enter_token()
    {
    return view('application.register.enter_token');
    }
    public function search_token(Request $request)
    {
      $det='';
      $searchterm =  $request->token_no;
      $matchedTerm=  DB::table('tokens')->where('token_no', $searchterm )->where('status', '!=' , 1)->value('token_no');
      $detail=  DB::table('tbl_ro_details')->where('token_no', $searchterm )->where('approve','!=' , 1)->value('token_no');
      $ro_id=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve', '!=' , 1)->value('ro_id');
      $data=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->get(); 
    return view('application.register.index', compact('searchterm','matchedTerm','detail','det','ro_id','data'))->with('success','Token Number Accepted,Please Proceed with the Registration Process!');
    }
    public function register_home($matchedTerm)
    {
        $det='';
        $matchedTerm =$matchedTerm;
        $searchterm ='';
        $detail=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve', '!=' , 1)->value('token_no');
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve', '!=' , 1)->value('ro_id');
        $data=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->get(); 
    return view('application.register.index', compact('searchterm','matchedTerm','detail','ro_id','det','data'));
    }
    public function register_home_a($matchedTerm)
    {
        $det='';
        $matchedTerm =$matchedTerm;
        $searchterm ='';
        $detail=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve','!=' , 1)->value('token_no');
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve','!=' , 1)->value('ro_id');
        $data=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->get(); 
        return view('application.register.index', compact('searchterm','matchedTerm','detail','ro_id','det','data'));
    }
    public function ro_details_store_edit(Request $request)
    {  
        $det = $request->matchedTerm2; 
        $tkn = $request->matchedTerm;
        $permit = tbl_ro_detail::where('token_no', $tkn)->value('token_no'); 
        $permit = tbl_ro_detail::where('token_no', $tkn)->latest()->firstOrFail();
        $permit->name=$request->ro_name;
        $permit->dzongkhag=$request->type;
        $permit->gewog=$request->gewog;
        $permit->location=$request->location;
        $permit->postbox=$request->postbox;
        $permit->phone=$request->phone;
        $permit->email=$request->email;
        $permit->save();
        $det = $request->matchedTerm2; 
          $app = 'app';
         if($request->app != 0){
         foreach ($request->app as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $app,
                'doc_path' => $path
            ]);
            }
         }  
         $ass = 'ass';
         if($request->ass != 0){
         foreach ($request->ass as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $ass,
                'doc_path' => $path
            ]);
            }
         }  
         $aoa = 'aoa';
         if($request->aoa != 0){
         foreach ($request->aoa as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $aoa,
                'doc_path' => $path
            ]);
            }
         }  
         $det = $request->matchedTerm2; 
        $request->session()->flash('alert-info', 'RO details Added Successfully');
        return redirect()->route('chairman_details', $det)->with('success','RO details has been Saved Proceed with Chairman Details!');
    }
    public function chairman_details_store_edit(Request $request)
    {  
        $croid = $request->matchedTerm2;
        $permit = tbl_chairman_detail::where('ro_id', $croid)->value('ro_id'); 
        $permit = tbl_chairman_detail::where('ro_id', $croid)->latest()->firstOrFail();
        $permit->ro_id=$request->matchedTerm2;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
         $permit->save(); 
        $dets = $request->matchedTerm2;   
         $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $cd,
                'doc_path' => $path
            ]);
            }
         } 
        $request->session()->flash('alert-info', 'Chairman details Added Successfully');
        return redirect()->route('dychairman_details', $dets)->with('success','Chairman details has been Saved,Proceed with the next Form!');
    }
    public function dychairman_details_store_edit(Request $request)
    {  
        $dcroid = $request->matchedTerm2;
        $permit = tbl_dychairman_detail::where('ro_id', $dcroid)->value('ro_id'); 
        $permit = tbl_dychairman_detail::where('ro_id', $dcroid)->latest()->firstOrFail();
        $permit->ro_id=$request->matchedTerm2;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
        $permit->save(); 
        $dets = $request->matchedTerm2; 
         $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dcd,
                'doc_path' => $path
            ]);
            }
         }                 
        $request->session()->flash('alert-info', 'Chairman details Added Successfully');
        return redirect()->route('secretary_details', $dets)->with('success','Proceed with the next Form!');
    }
     public function secretary_details_store_edit(Request $request)
    {  
        $sroid = $request->matchedTerm2;
        $permit = tbl_secretary_detail::where('ro_id', $sroid)->value('ro_id'); 
        $permit = tbl_secretary_detail::where('ro_id', $sroid)->latest()->firstOrFail();
        $permit->ro_id=$request->matchedTerm2;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
         $permit->save(); 
        $dets = $request->matchedTerm2;  
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $sd,
                'doc_path' => $path
            ]);
            }
         }  


$ro_id=$request->matchedTerm2;
$permitchk = tbl_dychairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
//$permitchk = tbl_dychairman_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
if($permitchk == '')
{
$permit= new tbl_dychairman_detail;
$permit->ro_id=$request->matchedTerm2;
}
$permit->save();

        $request->session()->flash('alert-info', 'Secretary details Added Successfully');
        return redirect()->route('dysecretary_details', $dets)->with('success','Secretary details has been Saved and sent for Approval!');
    }
     public function dysecretary_details_store_edit(Request $request)
    {  
        $dsroid = $request->matchedTerm2;
        $per = tbl_dysecretary_detail::where('ro_id', $dsroid)->value('ro_id'); 
        $per = tbl_dysecretary_detail::where('ro_id', $dsroid)->latest()->firstOrFail();
        $per->ro_id=$request->matchedTerm2;
        $per->name=$request->name;
        $per->dzongkhag=$request->type1;
        $per->dungkhag=$request->dungkhag;
        $per->gewog=$request->gewog;
        $per->village=$request->village;
        $per->houseno=$request->houseno;
        $per->thramno=$request->thramno;
        $per->dob=$request->dob;
        $per->qualification=$request->qualification;
        $per->phoneno=$request->phoneno;
        $per->email=$request->email;
        $per->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $per->photo=$file->getClientOriginalName();
        }
       $per->save(); 
        $dets = $request->matchedTerm2;  
        $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dsd,
                'doc_path' => $path
            ]);
            }
         }                         
        $request->session()->flash('alert-info', 'Deputy Secretary details Added Successfully');
        return redirect()->route('treasurer_details', $dets)->with('success','Proceed with the next Form!');
    }
    public function treasurer_details_store_edit(Request $request)
    {  
        $troid = $request->matchedTerm2;
        $per = tbl_treasurer_detail::where('ro_id', $troid)->value('ro_id'); 
        $per = tbl_treasurer_detail::where('ro_id', $troid)->latest()->firstOrFail();
        $per->ro_id=$request->matchedTerm2;
        $per->name=$request->name;
        $per->dzongkhag=$request->type1;
        $per->dungkhag=$request->dungkhag;
        $per->gewog=$request->gewog;
        $per->village=$request->village;
        $per->houseno=$request->houseno;
        $per->thramno=$request->thramno;
        $per->dob=$request->dob;
        $per->qualification=$request->qualification;
        $per->phoneno=$request->phoneno;
        $per->email=$request->email;
        $per->appdate=$request->appdate;

$status = $request->status;
$per = tbl_ro_detail::where('ro_id', $troid)->value('ro_id'); 
$per = tbl_ro_detail::where('ro_id', $troid)->latest()->firstOrFail();
if($status == '2')
{
$per->approve = '0';
}


        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $per->photo=$file->getClientOriginalName();
        }
        $per->save(); 
        $dets = $request->matchedTerm2;      
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $td,
                'doc_path' => $path
            ]);
            }
         } 

$ro_id=$request->matchedTerm2;
$permitchk = tbl_dysecretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
if($permitchk == '')
{
$permit= new tbl_dysecretary_detail;
$permit->ro_id=$request->matchedTerm2;
$permit->save();
}


        $dets = $request->matchedTerm2;
        $request->session()->flash('alert-info', 'Treasurer details Added Successfully');
        return redirect()->route('treasurer_details', $dets)->with('success','All Forms has been Saved and sent for Approval and an Email will be sent by Choegdey Lhentsho on the Registration Status, Thank You!');
    }


    public function ro_details_store(Request $request)
    {      
        $dettkn = $request->matchedTerm;
        $iid = tbl_ro_detail::where('token_no', $dettkn)->value('token_no');
        $permit = tbl_ro_detail::where('token_no', $iid)->latest()->firstOrFail();
        $permit->name=$request->ro_name;
        $permit->dzongkhag=$request->type;
        $permit->gewog=$request->gewog;
        $permit->location=$request->location;
        $permit->postbox=$request->postbox;
        $permit->phone=$request->phone;
        $permit->email=$request->email;
        $permit->token_no=$request->matchedTerm;
        $permit->save();
        $det = tbl_ro_detail::where('token_no', $dettkn)->value('ro_id');
        $app = 'app';
         if($request->app != 0){
         foreach ($request->app as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $app,
                'doc_path' => $path
            ]);
            }
         }  
         $ass = 'ass';
         if($request->ass != 0){
         foreach ($request->ass as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $ass,
                'doc_path' => $path
            ]);
            }
         }  
         $aoa = 'aoa';
         if($request->aoa != 0){
         foreach ($request->aoa as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $aoa,
                'doc_path' => $path
            ]);
            }
         }  
    /*  $det = $app_no;
        $dettkn = $request->matchedTerm;
        //tokenstatustoggle//
        $ca = token::where('token_no', $dettkn)->value('token_no'); 
        $ca = token::where('token_no', $dettkn)->latest()->firstOrFail();
        $ca->status='1';
        $ca->save();
    */  
        $request->session()->flash('alert-info', 'RO details Added Successfully');
        return redirect()->route('chairman_details', $det)->with('success','RO details has been Saved Proceed with Chairman Details!');
    }
 
    public function chairman_details($det)
    {
        $dets = $det;
        $croid=  DB::table('tbl_chairman_details')->where('ro_id', $dets )->where('approval_status','!=' , 1)->value('ro_id');  
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=' , 1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=' , 1)->value('ro_id'); 
        $data=  DB::table('tbl_chairman_details')->where('ro_id', $dets )->where('approval_status','!=' , 1)->get(); 
        return view('application.register.chairman_details',compact('dets','croid','token_no','ro_id','data'));
    }
    public function chairman_details_store(Request $request)
    {  
        $permit= new tbl_chairman_detail;
        $permit->ro_id=$request->det;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
        $permit->save(); 
        $dets = $request->det; 
         $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $cd,
                'doc_path' => $path
            ]);
            }
         }                       
        $request->session()->flash('alert-info', 'Chairman details Added Successfully');
        return redirect()->route('dychairman_details', $dets)->with('success','Chairman details has been Saved ,Proceed with the next Form!');
    }
    public function dychairman_details($dets)
    {
        $dets = $dets; 
        $dcroid=  DB::table('tbl_dychairman_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id');
        $data=  DB::table('tbl_dychairman_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get(); 
        return view('application.register.dychairman_details',compact('dets','dcroid','token_no','ro_id','data'));
    }
    public function dychairman_details_store(Request $request)
    {  
        $permit= new tbl_dychairman_detail;
        $permit->ro_id=$request->dets;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
        $permit->save(); 
        $dets = $request->dets; 
         $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dcd,
                'doc_path' => $path
            ]);
            }
         }  
        $request->session()->flash('alert-info', 'Chairman details Added Successfully');
        return redirect()->route('secretary_details', $dets)->with('success','Proceed with the next Form!');
    }
    public function secretary_details($dets)
    {
        $dets = $dets; 
        $sroid=  DB::table('tbl_secretary_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id');
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no');
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id'); 
        $data=  DB::table('tbl_secretary_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get();  
        return view('application.register.secretary_details',compact('dets','sroid','token_no','ro_id','data'));
    }
    public function secretary_details_store(Request $request)
    {  
        $permit= new tbl_secretary_detail;
        $permit->ro_id=$request->dets;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;

        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }

         $permit->save(); 
        $dets = $request->dets; 
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $sd,
                'doc_path' => $path
            ]);
            }
         } 




$ro_id=$request->dets;
$permitchk = tbl_dychairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
//$permitchk = tbl_dychairman_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
if($permitchk == '')
{
$permit= new tbl_dychairman_detail;
$permit->ro_id=$request->dets;
}
$permit->save();





        $request->session()->flash('alert-info', 'Secretary details Added Successfully');
        return redirect()->route('dysecretary_details', $dets)->with('success','Secretary details has been Saved and sent for Approval!');
    }
    public function dysecretary_details($dets)
    {
        $dets = $dets; 
        $dsroid=  DB::table('tbl_dysecretary_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id'); 
        $data=  DB::table('tbl_dysecretary_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get();
        return view('application.register.dysecretary_details',compact('dets','dsroid','token_no','ro_id','data'));
    }
    public function dysecretary_details_store(Request $request)
    {  
        $per= new tbl_dysecretary_detail;
        $per->ro_id=$request->dets;
        $per->name=$request->name;
        $per->dzongkhag=$request->type1;
        $per->dungkhag=$request->dungkhag;
        $per->gewog=$request->gewog;
        $per->village=$request->village;
        $per->houseno=$request->houseno;
        $per->thramno=$request->thramno;
        $per->dob=$request->dob;
        $per->qualification=$request->qualification;
        $per->phoneno=$request->phoneno;
        $per->email=$request->email;
        $per->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $per->photo=$file->getClientOriginalName();
        }
        $per->save(); 
        $dets = $request->dets; 
        $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dsd,
                'doc_path' => $path
            ]);
            }
         }                          
        $request->session()->flash('alert-info', 'Deputy Secretary details Added Successfully');
        return redirect()->route('treasurer_details', $dets)->with('success','Proceed with the next Form!');
    }
    public function treasurer_details($dets)
    {
        $dets = $dets;
        $troid=  DB::table('tbl_treasurer_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no');  
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id');
        $data=  DB::table('tbl_treasurer_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get(); 
        return view('application.register.treasurer_details',compact('dets','troid','token_no','ro_id','data'));
    }
    public function treasurer_details_store(Request $request)
    {  
        $per= new tbl_treasurer_detail;
        $per->ro_id=$request->dets;
        $per->name=$request->name;
        $per->dzongkhag=$request->type1;
        $per->dungkhag=$request->dungkhag;
        $per->gewog=$request->gewog;
        $per->village=$request->village;
        $per->houseno=$request->houseno;
        $per->thramno=$request->thramno;
        $per->dob=$request->dob;
        $per->qualification=$request->qualification;
        $per->phoneno=$request->phoneno;
        $per->email=$request->email;
        $per->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $per->photo=$file->getClientOriginalName();
        }
        $per->save(); 
        $dets = $request->dets;    
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $td,
                'doc_path' => $path
            ]);
            }
         }   

$ro_id=$request->dets;
$permitchk = tbl_dysecretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
//$permitchk = tbl_dysecretary_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
if($permitchk == '')
{
$per= new tbl_dysecretary_detail;
$per->ro_id=$request->dets;
$per->save();

}
        $dets = $request->dets; 
        $request->session()->flash('alert-info', 'Treasurer details Added Successfully');
        return redirect()->route('treasurer_details', $dets)->with('success','All Forms has been Saved and sent for Approval and an Email will be sent by Chhoedey Lhentshog on the Registration Status, Thank You!');
    
    }
    public function document_details($dets)
    {
        $dets = $dets; 
        return view('application.register.document_details',compact('dets'));
    }
    public function document_details_store(Request $request)
    {  
        $dets = $request->dets; 
                                               
        $app = 'app';
         if($request->app != 0){
         foreach ($request->app as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $app,
                'doc_path' => $path
            ]);
            }
         } 
        $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $cd,
                'doc_path' => $path
            ]);
            }
         } 
        $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dcd,
                'doc_path' => $path
            ]);
            }
         }
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $sd,
                'doc_path' => $path
            ]);
            }
         } 
         $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dsd,
                'doc_path' => $path
            ]);
            }
         } 
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $td,
                'doc_path' => $path
            ]);
            }
         } 
         $ass = 'ass';
         if($request->ass != 0){
         foreach ($request->ass as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $ass,
                'doc_path' => $path
            ]);
            }
         }  
         $aoa = 'aoa';
         if($request->aoa != 0){
         foreach ($request->aoa as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $aoa,
                'doc_path' => $path
            ]);
            }
         }  

        $request->session()->flash('alert-info', 'Documents Added Successfully');
        return redirect()->route('document_details', $dets)->with('success','Documents have been Saved and sent for Approval!');
    }
    public function edit_ro($ro_id)
    {
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.register.register_edit.edit_ro', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
    public function view(Request $request) 
    {
        if($request->ajax())
        {
        $id = $request->id;
        $info = dzongkhag::where('dzongkhag_id', $id)->get();
        return response()->json($info);
        }
    }
    public function view1(Request $request)
    {
        if($request->ajax())
        {
        $id = $request->id;
        $info = gewog::where('dzongkhag_id', $id)->get();
        return response()->json($info);
        }
    }
    public function view12(Request $request)
    {
        if($request->ajax())        
        {
        $id = $request->id;
        $info = village::where('gewog_id', $id)->get();
        return response()->json($info);
        }
    }
   
    public function update_ro(Request $request,$ro_id)
    {
        $ro_id = $ro_id;
        $applicant = tbl_ro_detail::where('ro_id', $ro_id)->value('ro_id');
        $applicant = tbl_ro_detail::where('ro_id', $ro_id)->firstOrFail(); 
        $applicant->name=$request->ro_name;
        $applicant->dzongkhag=$request->type;
        $applicant->location=$request->location; 
        $applicant->postbox=$request->postbox; 
        $applicant->phone=$request->phone;
        $applicant->email=$request->email;
        $applicant->updated_by=Auth::user()->id;
        $applicant->updated_at=date('Y-m-d');
        $applicant->save();

        $ro_id = $ro_id;
        $dcd = tbl_chairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $dcd = tbl_chairman_detail::where('ro_id', $ro_id)->firstOrFail(); 
        $dcd->name=$request->cname;
        $dcd->dzongkhag=$request->ctype1;
        $dcd->village=$request->cvillage; 
        $dcd->gewog=$request->cgewog; 
        $dcd->dungkhag=$request->cdungkhag;
        $dcd->houseno=$request->chouseno;
        $dcd->thramno=$request->cthramno;
        $dcd->dob=$request->cdob;
        $dcd->qualification=$request->cqualification;
        $dcd->phoneno=$request->cphoneno;
        $dcd->email=$request->cemail;
        $dcd->appdate=$request->cappdate;
        $dcd->updated_by=Auth::user()->id;
        $dcd->updated_at=date('Y-m-d');
        $dcd->save();

        $ro_id = $ro_id;
        $cdd = tbl_dychairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $cdd = tbl_dychairman_detail::where('ro_id', $ro_id)->firstOrFail();
        $cdd->name=$request->dc_name;
        $cdd->dzongkhag=$request->dc_type1;
        $cdd->village=$request->dc_village; 
        $cdd->gewog=$request->dc_gewog; 
        $cdd->dungkhag=$request->dc_dungkhag;
        $cdd->houseno=$request->dc_houseno;
        $cdd->thramno=$request->dc_thramno;
        $cdd->dob=$request->dc_dob;
        $cdd->qualification=$request->dc_qualification;
        $cdd->phoneno=$request->dc_phoneno;
        $cdd->email=$request->dc_email;
        $cdd->appdate=$request->dc_appdate;
        $cdd->updated_by=Auth::user()->id;
        $cdd->updated_at=date('Y-m-d');
        $cdd->save();

        $ro_id = $ro_id;
        $cxd = tbl_secretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $cxd = tbl_secretary_detail::where('ro_id', $ro_id)->firstOrFail();
        $cxd->name=$request->s_name;
        $cxd->dzongkhag=$request->s_type1;
        $cxd->village=$request->s_village; 
        $cxd->gewog=$request->s_gewog; 
        $cxd->dungkhag=$request->s_dungkhag;
        $cxd->houseno=$request->s_houseno;
        $cxd->thramno=$request->s_thramno;
        $cxd->dob=$request->s_dob;
        $cxd->qualification=$request->s_qualification;
        $cxd->phoneno=$request->s_phoneno;
        $cxd->email=$request->s_email;
        $cxd->appdate=$request->s_appdate;
        $cxd->updated_by=Auth::user()->id;
        $cxd->updated_at=date('Y-m-d');
        $cxd->save();

        $ro_id = $ro_id;
        $cvd = tbl_dysecretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $cvd = tbl_dysecretary_detail::where('ro_id', $ro_id)->firstOrFail();
        $cvd->name=$request->ds_name;
        $cvd->dzongkhag=$request->ds_type1;
        $cvd->village=$request->ds_village; 
        $cvd->gewog=$request->ds_gewog; 
        $cvd->dungkhag=$request->ds_dungkhag;
        $cvd->houseno=$request->ds_houseno;
        $cvd->thramno=$request->ds_thramno;
        $cvd->dob=$request->ds_dob;
        $cvd->qualification=$request->ds_qualification;
        $cvd->phoneno=$request->ds_phoneno;
        $cvd->email=$request->ds_email;
        $cvd->appdate=$request->ds_appdate;
        $cvd->updated_by=Auth::user()->id;
        $cvd->updated_at=date('Y-m-d');
        $cvd->save();

        $ro_id = $ro_id;
        $cod = tbl_treasurer_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $cod = tbl_treasurer_detail::where('ro_id', $ro_id)->firstOrFail();
        $cod->name=$request->td_name;
        $cod->dzongkhag=$request->td_type1;
        $cod->village=$request->td_village; 
        $cod->gewog=$request->td_gewog; 
        $cod->dungkhag=$request->td_dungkhag;
        $cod->houseno=$request->td_houseno;
        $cod->thramno=$request->td_thramno;
        $cod->dob=$request->td_dob;
        $cod->qualification=$request->td_qualification;
        $cod->phoneno=$request->td_phoneno;
        $cod->email=$request->td_email;
        $cod->appdate=$request->td_appdate;
        $cod->updated_by=Auth::user()->id;
        $cod->updated_at=date('Y-m-d');
        $cod->save();
        $request->session()->flash('alert-info', 'Details Updated Successfully');
        return redirect()->route('edit_ro',$ro_id)->with('success','Details has been Updated!');
    }
    public function approve_ro(Request $request,$ro_id)
    {
        $ro_id = $ro_id;
        $cda = tbl_ro_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $cda = tbl_ro_detail::where('ro_id', $ro_id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_by=Auth::user()->id;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $order = 'order';
         if($request->order != 0){
         foreach ($request->order as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $order,
                'doc_path' => $path
            ]);
            }
         }
    //chairmanapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_chairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_chairman_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save();
    //dychairmanapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_dychairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_dychairman_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save();
    //secretaryapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_secretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_secretary_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save(); 
    //dysecretaryapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_dysecretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_dysecretary_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save();
    //dysecretaryapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_dysecretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_dysecretary_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save();
    //treasurerapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_treasurer_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_treasurer_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save(); 
    //tokendisable// 
        $ro_id = $ro_id;
        $tok = tbl_ro_detail::where('ro_id', $ro_id)->value('token_no'); 
        $tok = token::where('token_no', $tok)->value('token_no'); 
        $tok = token::where('token_no', $tok)->latest()->firstOrFail();

        $tok->status=$request->approve;

        $tok->save();                             
    //agencycreation//
        $approve=$request->approve;
        if($approve == '1')
        {
        $st = new tbl_agency;
        $st->agency=$request->agency;
        $st->created_by=Auth::user()->id;
        $st->created_at=date('Y-m-d');
        $st->updated_at=date('Y-m-d');
        $st->save();
    //Auto user creation//
        $agency=$request->agency;
        $user = new user;
        $user->name = $request->agency;
        $user->email = $request->email;
        $c = tbl_agency::where('agency', $agency)->value('id');
        $user->organization=$c;
        $user->role_id = '3';
        $user->dzongkhag_id=$request->dzongkhag;
        $password = 'pass@123';
        $user->password = Hash::make($password);
        $user->save(); 
        $myEmail = $request->email;
        Mail::to($myEmail)->send(new SendEmail($user, $password));        
        $users = user::all();
        $msg = 0;        
        }
        elseif($approve == '2')
        {


        $remarks = $request->remarks;
        $myEmail = $request->email;
        Mail::to($myEmail)->send(new SendRejectEmail($remarks));        
                

        }
        else
        {
        return redirect()->route('edit_ro',$ro_id)->with('success','Assessment of RO has been saved and the Status/Assessment has been sent via an Email to the Applicant!');    
        } 
        $request->session()->flash('alert-info', 'Assessment Successful');
        return redirect()->route('edit_ro',$ro_id)->with('success','Assessment of RO has been saved and the Status/Assessment has been sent via an Email to the Applicant!');
    }
    public function SendMail(Request $request)
    {
        //$email =  tbl_user::where('id', $id)->value('email');
        $myEmail = 'tobgyalsonam44@gmail.com';
        Mail::to($myEmail)->send(new MyTestMail());        
        dd("Mail Send Successfully");
    }


    public function view_registered_ro()
    {  
       $org_id = tbl_agency::where('id', Auth::user()->organization)->value('agency');
       $ro = tbl_ro_detail::where('name',$org_id)->get();
       $roid = tbl_ro_detail::where('name',$org_id)->value('ro_id');
       $cd =  tbl_chairman_detail::where('ro_id', $roid)->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $roid)->get();
       $sd =  tbl_secretary_detail::where('ro_id', $roid)->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $roid)->get();
       $td =  tbl_treasurer_detail::where('ro_id', $roid)->get();
       $rd =  tbl_register_document::where('ro_id', $roid)->get();
       return view('application.register.register_edit.view_registered_ro', compact('ro','cd','dcd','sd','dsd','td','rd'));
    }
    public function view_ro_details()
    {        
       $org_id = tbl_agency::where('id', Auth::user()->organization)->value('agency');
       $ro = tbl_ro_detail::where('name',$org_id)->get();
       $roid = tbl_ro_detail::where('name',$org_id)->value('ro_id');
       $cd =  tbl_chairman_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $sd =  tbl_secretary_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $td =  tbl_treasurer_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
      
       $rd =  tbl_register_document::where('ro_id', $roid)->orderby('id','desc')->get();
       $rdcd =  tbl_register_document::where('ro_id', $roid)->where('filecat','cd')->orderby('id','desc')->limit(1)->get();
       $rddcd =  tbl_register_document::where('ro_id', $roid)->where('filecat','dcd')->orderby('id','desc')->limit(1)->get();
       $rdsd =  tbl_register_document::where('ro_id', $roid)->where('filecat','sd')->orderby('id','desc')->limit(1)->get();
       $rddsd =  tbl_register_document::where('ro_id', $roid)->where('filecat','dsd')->orderby('id','desc')->limit(1)->get();
       $rdtd =  tbl_register_document::where('ro_id', $roid)->where('filecat','td')->orderby('id','desc')->limit(1)->get();
      
       $uro =tbl_info_update::where('ro_id',$roid )->pluck('ro_id')->last();
       $updated_ro = tbl_info_update::where('ro_id',$uro )->get();
       $uprodetail = tbl_info_update::where('ro_id',$uro )->value('ro_id');

       $uprodetaildate = tbl_info_update::where('ro_id',$uro )->value('created_at'); 
       $rochangedate = tbl_ro_detail::where('ro_id',$roid )->value('updated_at');

       return view('application.register.register_edit.view_ro_details', compact('ro','cd','dcd','sd','dsd','td','rd','updated_ro','roid','uprodetail','uprodetaildate','rochangedate','rdcd','rddcd','rdsd','rddsd','rdtd'));
    }
    public function view_registered_ro_all()
    {  
       $ro = tbl_ro_detail::where('approve', 1)->get();
       return view('application.register.register_edit.view_registered_ro_all', compact('ro'));
    }
    public function view_ro_details_all($ro_id)
    {        
       $ro = tbl_ro_detail::where('ro_id',$ro_id)->get();
       $roid = tbl_ro_detail::where('ro_id',$ro_id)->value('ro_id');
       $cd =  tbl_chairman_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $sd =  tbl_secretary_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $td =  tbl_treasurer_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       
       $rd =  tbl_register_document::where('ro_id', $roid)->orderby('id','desc')->get();
       $rdcd =  tbl_register_document::where('ro_id', $roid)->where('filecat','cd')->orderby('id','desc')->limit(1)->get();
       $rddcd =  tbl_register_document::where('ro_id', $roid)->where('filecat','dcd')->orderby('id','desc')->limit(1)->get();
       $rdsd =  tbl_register_document::where('ro_id', $roid)->where('filecat','sd')->orderby('id','desc')->limit(1)->get();
       $rddsd =  tbl_register_document::where('ro_id', $roid)->where('filecat','dsd')->orderby('id','desc')->limit(1)->get();
       $rdtd =  tbl_register_document::where('ro_id', $roid)->where('filecat','td')->orderby('id','desc')->limit(1)->get();

       $uro =tbl_info_update::where('ro_id',$ro_id )->pluck('ro_id')->last();
       $updated_ro = tbl_info_update::where('ro_id',$uro )->orderby('id','desc')->limit(1)->get();
       $uprodetail = tbl_info_update::where('ro_id',$uro )->orderby('id','desc')->limit(1)->value('ro_id'); 

       $uprodetaildate = tbl_info_update::where('ro_id',$uro )->orderby('id','desc')->limit(1)->value('created_at'); 
       $rochangedate = tbl_ro_detail::where('ro_id',$ro_id )->value('updated_at');     
       return view('application.register.register_edit.view_ro_details', compact('ro','cd','dcd','sd','dsd','td','rd','updated_ro','roid','uprodetail','uprodetaildate','rochangedate','rdcd','rddcd','rdsd','rddsd','rdtd'));     
    }


/////REGISTER dzongkha////


    public function enter_token_dzo()
    {
    return view('application.register.enter_token_dzo');
    }

    public function search_token_dzo(Request $request)
    {
      $det='';
      $searchterm =  $request->token_no;
      $matchedTerm=  DB::table('tokens')->where('token_no', $searchterm )->where('status', '!=' , 1)->value('token_no');
      $detail=  DB::table('tbl_ro_details')->where('token_no', $searchterm )->where('approve','!=' , 1)->value('token_no');
      $ro_id=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve', '!=' , 1)->value('ro_id');
      $data=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->get(); 
    return view('application.register.index_dzo', compact('searchterm','matchedTerm','detail','det','ro_id','data'))->with('success','Token Number Accepted,Please Proceed with the Registration Process!');
    }
     public function register_home_dzo($matchedTerm)
    {
        $det='';
        $matchedTerm =$matchedTerm;
        $searchterm ='';
        $detail=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve', '!=' , 1)->value('token_no');
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve', '!=' , 1)->value('ro_id');
        $data=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->get(); 
    return view('application.register.index_dzo', compact('searchterm','matchedTerm','detail','ro_id','det','data'));
    }
    public function register_home_a_dzo($matchedTerm)
    {
        $det='';
        $matchedTerm =$matchedTerm;
        $searchterm ='';
        $detail=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve','!=' , 1)->value('token_no');
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->where('approve','!=' , 1)->value('ro_id');
        $data=  DB::table('tbl_ro_details')->where('token_no', $matchedTerm )->get(); 
        return view('application.register.index_dzo', compact('searchterm','matchedTerm','detail','ro_id','det','data'));
    }
     public function ro_details_store_edit_dzo(Request $request)
    {  
        $det = $request->matchedTerm2; 
        $tkn = $request->matchedTerm;
        $permit = tbl_ro_detail::where('token_no', $tkn)->value('token_no'); 
        $permit = tbl_ro_detail::where('token_no', $tkn)->latest()->firstOrFail();
        $permit->name=$request->ro_name;
        $permit->dzongkhag=$request->type;
        $permit->gewog=$request->gewog;
        $permit->location=$request->location;
        $permit->postbox=$request->postbox;
        $permit->phone=$request->phone;
        $permit->email=$request->email;
        $permit->save();
        $det = $request->matchedTerm2; 
          $app = 'app';
         if($request->app != 0){
         foreach ($request->app as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $app,
                'doc_path' => $path
            ]);
            }
         }  
         $ass = 'ass';
         if($request->ass != 0){
         foreach ($request->ass as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $ass,
                'doc_path' => $path
            ]);
            }
         }  
         $aoa = 'aoa';
         if($request->aoa != 0){
         foreach ($request->aoa as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $aoa,
                'doc_path' => $path
            ]);
            }
         }  
         $det = $request->matchedTerm2; 
        $request->session()->flash('alert-info', 'RO details Added Successfully');
        return redirect()->route('chairman_details_dzo', $det)->with('success','RO details has been Saved Proceed with Chairman Details!');
    }
    public function chairman_details_store_edit_dzo(Request $request)
    {  
        $croid = $request->matchedTerm2;
        $permit = tbl_chairman_detail::where('ro_id', $croid)->value('ro_id'); 
        $permit = tbl_chairman_detail::where('ro_id', $croid)->latest()->firstOrFail();
        $permit->ro_id=$request->matchedTerm2;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
         $permit->save(); 
        $dets = $request->matchedTerm2;   
         $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $cd,
                'doc_path' => $path
            ]);
            }
         } 
        $request->session()->flash('alert-info', 'Chairman details Added Successfully');
        return redirect()->route('dychairman_details_dzo', $dets)->with('success','Chairman details has been Saved,Proceed with the next Form!');
    }
    public function dychairman_details_store_edit_dzo(Request $request)
    {  
        $dcroid = $request->matchedTerm2;
        $permit = tbl_dychairman_detail::where('ro_id', $dcroid)->value('ro_id'); 
        $permit = tbl_dychairman_detail::where('ro_id', $dcroid)->latest()->firstOrFail();
        $permit->ro_id=$request->matchedTerm2;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
        $permit->save(); 
        $dets = $request->matchedTerm2; 
         $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dcd,
                'doc_path' => $path
            ]);
            }
         }                 
        $request->session()->flash('alert-info', 'Chairman details Added Successfully');
        return redirect()->route('secretary_details_dzo', $dets)->with('success','Proceed with the next Form!');
    }
    public function secretary_details_store_edit_dzo(Request $request)
    {  
        $sroid = $request->matchedTerm2;
        $permit = tbl_secretary_detail::where('ro_id', $sroid)->value('ro_id'); 
        $permit = tbl_secretary_detail::where('ro_id', $sroid)->latest()->firstOrFail();
        $permit->ro_id=$request->matchedTerm2;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
         $permit->save(); 
        $dets = $request->matchedTerm2;  
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $sd,
                'doc_path' => $path
            ]);
            }
         }  


$ro_id=$request->matchedTerm2;
$permitchk = tbl_dychairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
//$permitchk = tbl_dychairman_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
if($permitchk == '')
{
$permit= new tbl_dychairman_detail;
$permit->ro_id=$request->matchedTerm2;
}
$permit->save();  


        $request->session()->flash('alert-info', 'Secretary details Added Successfully');
        return redirect()->route('dysecretary_details_dzo', $dets)->with('success','Secretary details has been Saved and sent for Approval!');
    }
    public function dysecretary_details_store_edit_dzo(Request $request)
    {  
        $dsroid = $request->matchedTerm2;
        $per = tbl_dysecretary_detail::where('ro_id', $dsroid)->value('ro_id'); 
        $per = tbl_dysecretary_detail::where('ro_id', $dsroid)->latest()->firstOrFail();
        $per->ro_id=$request->matchedTerm2;
        $per->name=$request->name;
        $per->dzongkhag=$request->type1;
        $per->dungkhag=$request->dungkhag;
        $per->gewog=$request->gewog;
        $per->village=$request->village;
        $per->houseno=$request->houseno;
        $per->thramno=$request->thramno;
        $per->dob=$request->dob;
        $per->qualification=$request->qualification;
        $per->phoneno=$request->phoneno;
        $per->email=$request->email;
        $per->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $per->photo=$file->getClientOriginalName();
        }
       $per->save(); 
        $dets = $request->matchedTerm2;  
        $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dsd,
                'doc_path' => $path
            ]);
            }
         }                         
        $request->session()->flash('alert-info', 'Deputy Secretary details Added Successfully');
        return redirect()->route('treasurer_details_dzo', $dets)->with('success','Proceed with the next Form!');
    }

    public function treasurer_details_store_edit_dzo(Request $request)
    {  
        $troid = $request->matchedTerm2;
        $per = tbl_treasurer_detail::where('ro_id', $troid)->value('ro_id'); 
        $per = tbl_treasurer_detail::where('ro_id', $troid)->latest()->firstOrFail();
        $per->ro_id=$request->matchedTerm2;
        $per->name=$request->name;
        $per->dzongkhag=$request->type1;
        $per->dungkhag=$request->dungkhag;
        $per->gewog=$request->gewog;
        $per->village=$request->village;
        $per->houseno=$request->houseno;
        $per->thramno=$request->thramno;
        $per->dob=$request->dob;
        $per->qualification=$request->qualification;
        $per->phoneno=$request->phoneno;
        $per->email=$request->email;
        $per->appdate=$request->appdate;
///statustoggle//
$status = $request->status;
$per = tbl_ro_detail::where('ro_id', $troid)->value('ro_id'); 
$per = tbl_ro_detail::where('ro_id', $troid)->latest()->firstOrFail();
if($status == '2')
{
$per->approve = '0';
}
////

        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $per->photo=$file->getClientOriginalName();
        }
         $per->save(); 
        $dets = $request->matchedTerm2;      
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $td,
                'doc_path' => $path
            ]);
            }
         }   

$ro_id=$request->matchedTerm2;
$permitchk = tbl_dysecretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
//$permitchk = tbl_dysecretary_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
if($permitchk == '')
{
$permit= new tbl_dysecretary_detail;
$permit->ro_id=$request->matchedTerm2;
}
$permit->save(); 
        $dets = $request->matchedTerm2;
        $request->session()->flash('alert-info', 'Treasurer details Added Successfully');
         return redirect()->route('treasurer_details_dzo', $dets)->with('success','All Forms has been Saved and sent for Approval and an Email will be sent by Choegdey Lhentsho on the Registration Status, Thank You!');
    }





    public function register_chairman_dzo()
    {
        $dets = '';
    return view('application.register.chairman_details_dzo',compact('dets'));
    }
    public function register_dychairman_dzo()
    {
        $dets = '';
    return view('application.register.dychairman_details_dzo',compact('dets'));
    }
    public function register_secretary_dzo()
    {
        $dets = '';
    return view('application.register.secretary_details_dzo',compact('dets'));
    }
    public function register_dysecretary_dzo()
    {
        $dets = '';
    return view('application.register.dysecretary_details_dzo',compact('dets'));
    }
    public function register_treasurer_dzo()
    {
        $dets = '';
    return view('application.register.treasurer_details_dzo',compact('dets'));
    }
    public function register_documents_dzo()
    {
        $dets = '';
    return view('application.register.document_details_dzo',compact('dets'));
    }    
    public function ro_details_store_dzo(Request $request)
    {  
       $dettkn = $request->matchedTerm;
        $iid = tbl_ro_detail::where('token_no', $dettkn)->value('token_no');
        $permit = tbl_ro_detail::where('token_no', $iid)->latest()->firstOrFail();
        $permit->name=$request->ro_name;
        $permit->dzongkhag=$request->type;
        $permit->gewog=$request->gewog;
        $permit->location=$request->location;
        $permit->postbox=$request->postbox;
        $permit->phone=$request->phone;
        $permit->email=$request->email;
        $permit->token_no=$request->matchedTerm;
        $permit->save();
        $det = tbl_ro_detail::where('token_no', $dettkn)->value('ro_id');
        $app = 'app';
         if($request->app != 0){
         foreach ($request->app as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $app,
                'doc_path' => $path
            ]);
            }
         }  
         $ass = 'ass';
         if($request->ass != 0){
         foreach ($request->ass as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $ass,
                'doc_path' => $path
            ]);
            }
         }  
         $aoa = 'aoa';
         if($request->aoa != 0){
         foreach ($request->aoa as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'filecat' => $aoa,
                'doc_path' => $path
            ]);
            }
         }  
    /*  $det = $app_no;
        $dettkn = $request->matchedTerm;
        //tokenstatustoggle//
        $ca = token::where('token_no', $dettkn)->value('token_no'); 
        $ca = token::where('token_no', $dettkn)->latest()->firstOrFail();
        $ca->status='1';
        $ca->save();
    */  
        $request->session()->flash('alert-info', 'RO details Added Successfully');
        return redirect()->route('chairman_details_dzo', $det)->with('success','RO details has been Saved Proceed with Chairman Details!');
    }
     public function chairman_details_dzo($det)
    {
        $dets = $det;
        $croid=  DB::table('tbl_chairman_details')->where('ro_id', $dets )->where('approval_status','!=' , 1)->value('ro_id');  
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=' , 1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=' , 1)->value('ro_id'); 
        $data=  DB::table('tbl_chairman_details')->where('ro_id', $dets )->where('approval_status','!=' , 1)->get(); 
        return view('application.register.chairman_details_dzo',compact('dets','croid','token_no','ro_id','data'));
    }
    public function chairman_details_store_dzo(Request $request)
   {  
        $permit= new tbl_chairman_detail;
        $permit->ro_id=$request->det;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
        $permit->save(); 
        $dets = $request->det; 
         $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $cd,
                'doc_path' => $path
            ]);
            }
         }                       
        $request->session()->flash('alert-info', 'Chairman details Added Successfully');
        return redirect()->route('dychairman_details_dzo', $dets)->with('success','Chairman details has been Saved ,Proceed with the next Form!');
    }
    public function dychairman_details_dzo($dets)
    {
         $dets = $dets; 
        $dcroid=  DB::table('tbl_dychairman_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id');
        $data=  DB::table('tbl_dychairman_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get(); 
        return view('application.register.dychairman_details_dzo',compact('dets','dcroid','token_no','ro_id','data'));
    }
    public function dychairman_details_store_dzo(Request $request)
    {  
        $permit= new tbl_dychairman_detail;
        $permit->ro_id=$request->dets;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
        $permit->save(); 
        $dets = $request->dets; 
         $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dcd,
                'doc_path' => $path
            ]);
            }
         }  
        $request->session()->flash('alert-info', 'Chairman details Added Successfully');
        return redirect()->route('secretary_details_dzo', $dets)->with('success','Proceed with the next Form!');
    }
    public function secretary_details_dzo($dets)
    {
         $dets = $dets; 
        $sroid=  DB::table('tbl_secretary_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id');
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no');
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id'); 
        $data=  DB::table('tbl_secretary_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get();  
        return view('application.register.secretary_details_dzo',compact('dets','sroid','token_no','ro_id','data'));
    }
    public function secretary_details_store_dzo(Request $request)
    {  
        $permit= new tbl_secretary_detail;
        $permit->ro_id=$request->dets;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;

        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }

         $permit->save(); 
        $dets = $request->dets; 
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $sd,
                'doc_path' => $path
            ]);
            }
         }  


$ro_id=$request->dets;
$permitchk = tbl_dychairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
//$permitchk = tbl_dychairman_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
if($permitchk == '')
{
$permit= new tbl_dychairman_detail;
$permit->ro_id=$request->dets;
}
$permit->save();

        $request->session()->flash('alert-info', 'Secretary details Added Successfully');
        return redirect()->route('dysecretary_details_dzo', $dets)->with('success','Secretary details has been Saved and sent for Approval!');
    }
    public function dysecretary_details_dzo($dets)
    {
        $dets = $dets; 
        $dsroid=  DB::table('tbl_dysecretary_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no'); 
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id'); 
        $data=  DB::table('tbl_dysecretary_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get();
        return view('application.register.dysecretary_details_dzo',compact('dets','dsroid','token_no','ro_id','data'));
    }
    public function dysecretary_details_store_dzo(Request $request)
    {  
        $per= new tbl_dysecretary_detail;
        $per->ro_id=$request->dets;
        $per->name=$request->name;
        $per->dzongkhag=$request->type1;
        $per->dungkhag=$request->dungkhag;
        $per->gewog=$request->gewog;
        $per->village=$request->village;
        $per->houseno=$request->houseno;
        $per->thramno=$request->thramno;
        $per->dob=$request->dob;
        $per->qualification=$request->qualification;
        $per->phoneno=$request->phoneno;
        $per->email=$request->email;
        $per->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $per->photo=$file->getClientOriginalName();
        }
        $per->save(); 
        $dets = $request->dets; 
        $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dsd,
                'doc_path' => $path
            ]);
            }
         }                          
        $request->session()->flash('alert-info', 'Deputy Secretary details Added Successfully');
        return redirect()->route('treasurer_details_dzo', $dets)->with('success','Proceed with the next Form!');
    }
    public function treasurer_details_dzo($dets)
    {
         $dets = $dets;
        $troid=  DB::table('tbl_treasurer_details')->where('ro_id', $dets )->where('approval_status','!=',1)->value('ro_id'); 
        $token_no=  DB::table('tbl_ro_details')->where('ro_id', $dets )->where('approve','!=',1)->value('token_no');  
        $ro_id=  DB::table('tbl_ro_details')->where('token_no', $token_no )->where('approve','!=',1)->value('ro_id');
        $data=  DB::table('tbl_treasurer_details')->where('ro_id', $ro_id )->where('approval_status','!=',1)->get(); 
        return view('application.register.treasurer_details_dzo',compact('dets','troid','token_no','ro_id','data'));
    }
    public function treasurer_details_store_dzo(Request $request)
    {
        $per= new tbl_treasurer_detail;
        $per->ro_id=$request->dets;
        $per->name=$request->name;
        $per->dzongkhag=$request->type1;
        $per->dungkhag=$request->dungkhag;
        $per->gewog=$request->gewog;
        $per->village=$request->village;
        $per->houseno=$request->houseno;
        $per->thramno=$request->thramno;
        $per->dob=$request->dob;
        $per->qualification=$request->qualification;
        $per->phoneno=$request->phoneno;
        $per->email=$request->email;
        $per->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $per->photo=$file->getClientOriginalName();
        }
        $per->save(); 
        $dets = $request->dets;    
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $td,
                'doc_path' => $path
            ]);
            }
         } 

$ro_id=$request->dets;
$permitchk = tbl_dysecretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
//$permitchk = tbl_dysecretary_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
if($permitchk == '')
{
$permit= new tbl_dysecretary_detail;
$permit->ro_id=$request->dets;
}
$permit->save(); 
        $dets = $request->dets;
        $request->session()->flash('alert-info', 'Treasurer details Added Successfully');
        return redirect()->route('treasurer_details_dzo', $dets)->with('success','All Forms has been Saved and sent for Approval and an Email will be sent by Chhoedey Lhentshog on the Registration Status, Thank You!');
    }
    public function document_details_dzo($dets)
    {
        $dets = $dets; 
        return view('application.register.document_details_dzo',compact('dets'));
    }
    public function document_details_store_dzo(Request $request)
    {  
        $dets = $request->dets; 
                                               
        $app = 'app';
         if($request->app != 0){
         foreach ($request->app as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $app,
                'doc_path' => $path
            ]);
            }
         } 
        $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $cd,
                'doc_path' => $path
            ]);
            }
         } 
        $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dcd,
                'doc_path' => $path
            ]);
            }
         }
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $sd,
                'doc_path' => $path
            ]);
            }
         } 
         $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $dsd,
                'doc_path' => $path
            ]);
            }
         } 
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $td,
                'doc_path' => $path
            ]);
            }
         } 
         $ass = 'ass';
         if($request->ass != 0){
         foreach ($request->ass as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $ass,
                'doc_path' => $path
            ]);
            }
         }  
         $aoa = 'aoa';
         if($request->aoa != 0){
         foreach ($request->aoa as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'filecat' => $aoa,
                'doc_path' => $path
            ]);
            }
         }  

        $request->session()->flash('alert-info', 'Documents Added Successfully');
        return redirect()->route('document_details_dzo', $dets)->with('success','Documents have been Saved and sent for Approval!');
    }

///////////////////////DZONGKHA/////////////////////////
    public function edit_ro_dzo($ro_id)
    {
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.register.register_edit.edit_ro_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    } 
    public function view_registered_ro_all_dzo()
    {  
       $ro = tbl_ro_detail::where('approve', 1)->get();
       return view('application.register.register_edit.view_registered_ro_all_dzo', compact('ro'));
    } 
    public function view_ro_details_all_dzo($ro_id)
    {        

       $ro = tbl_ro_detail::where('ro_id',$ro_id)->get();
       $roid = tbl_ro_detail::where('ro_id',$ro_id)->value('ro_id');
       $cd =  tbl_chairman_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $sd =  tbl_secretary_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $td =  tbl_treasurer_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();

       $rd =  tbl_register_document::where('ro_id', $roid)->orderby('id','desc')->get();
       $rdcd =  tbl_register_document::where('ro_id', $roid)->where('filecat','cd')->orderby('id','desc')->limit(1)->get();
       $rddcd =  tbl_register_document::where('ro_id', $roid)->where('filecat','dcd')->orderby('id','desc')->limit(1)->get();
       $rdsd =  tbl_register_document::where('ro_id', $roid)->where('filecat','sd')->orderby('id','desc')->limit(1)->get();
       $rddsd =  tbl_register_document::where('ro_id', $roid)->where('filecat','dsd')->orderby('id','desc')->limit(1)->get();
       $rdtd =  tbl_register_document::where('ro_id', $roid)->where('filecat','td')->orderby('id','desc')->limit(1)->get();
       
       $uro =tbl_info_update::where('ro_id',$ro_id )->pluck('ro_id')->last();
       $updated_ro = tbl_info_update::where('ro_id',$uro )->orderby('id','desc')->limit(1)->get();
       $uprodetail = tbl_info_update::where('ro_id',$uro )->orderby('id','desc')->limit(1)->value('ro_id'); 
       $uprodetaildate = tbl_info_update::where('ro_id',$uro )->orderby('id','desc')->limit(1)->value('created_at'); 
       $rochangedate = tbl_ro_detail::where('ro_id',$ro_id )->value('updated_at');     
       return view('application.register.register_edit.view_ro_details_dzo', compact('ro','cd','dcd','sd','dsd','td','rd','updated_ro','roid','uprodetail','uprodetaildate','rochangedate','rdcd','rddcd','rdsd','rddsd','rdtd'));     
    }
    public function view_registered_ro_dzo()
    {  
       $org_id = tbl_agency::where('id', Auth::user()->organization)->value('agency');
       $ro = tbl_ro_detail::where('name',$org_id)->get();
       $roid = tbl_ro_detail::where('name',$org_id)->value('ro_id');
       $cd =  tbl_chairman_detail::where('ro_id', $roid)->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $roid)->get();
       $sd =  tbl_secretary_detail::where('ro_id', $roid)->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $roid)->get();
       $td =  tbl_treasurer_detail::where('ro_id', $roid)->get();
       $rd =  tbl_register_document::where('ro_id', $roid)->get();
       return view('application.register.register_edit.view_registered_ro_dzo', compact('ro','cd','dcd','sd','dsd','td','rd'));
    }
    public function view_ro_details_dzo()
    {        
       $org_id = tbl_agency::where('id', Auth::user()->organization)->value('agency');
       $ro = tbl_ro_detail::where('name',$org_id)->get();
       $roid = tbl_ro_detail::where('name',$org_id)->value('ro_id');
       $cd =  tbl_chairman_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $sd =  tbl_secretary_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();
       $td =  tbl_treasurer_detail::where('ro_id', $roid)->orderby('id','desc')->where('approval_status','1')->limit(1)->get();

       $rd =  tbl_register_document::where('ro_id', $roid)->orderby('id','desc')->get();
       $rdcd =  tbl_register_document::where('ro_id', $roid)->where('filecat','cd')->orderby('id','desc')->limit(1)->get();
       $rddcd =  tbl_register_document::where('ro_id', $roid)->where('filecat','dcd')->orderby('id','desc')->limit(1)->get();
       $rdsd =  tbl_register_document::where('ro_id', $roid)->where('filecat','sd')->orderby('id','desc')->limit(1)->get();
       $rddsd =  tbl_register_document::where('ro_id', $roid)->where('filecat','dsd')->orderby('id','desc')->limit(1)->get();
       $rdtd =  tbl_register_document::where('ro_id', $roid)->where('filecat','td')->orderby('id','desc')->limit(1)->get();      
       
       $uro =tbl_info_update::where('ro_id',$roid )->pluck('ro_id')->last();
       $updated_ro = tbl_info_update::where('ro_id',$uro )->get();
       $uprodetail = tbl_info_update::where('ro_id',$uro )->value('ro_id');

       $uprodetaildate = tbl_info_update::where('ro_id',$uro )->value('created_at'); 
       $rochangedate = tbl_ro_detail::where('ro_id',$roid )->value('updated_at');

       return view('application.register.register_edit.view_ro_details_dzo', compact('ro','cd','dcd','sd','dsd','td','rd','updated_ro','roid','uprodetail','uprodetaildate','rochangedate','rdcd','rddcd','rdsd','rddsd','rdtd'));
    }
    public function update_ro_dzo(Request $request,$ro_id)
    {
        $ro_id = $ro_id;
        $applicant = tbl_ro_detail::where('ro_id', $ro_id)->value('ro_id');
        $applicant = tbl_ro_detail::where('ro_id', $ro_id)->firstOrFail(); 
        $applicant->name=$request->ro_name;
        $applicant->dzongkhag=$request->type;
        $applicant->location=$request->location; 
        $applicant->postbox=$request->postbox; 
        $applicant->phone=$request->phone;
        $applicant->email=$request->email;
        $applicant->updated_by=Auth::user()->id;
        $applicant->updated_at=date('Y-m-d');
        $applicant->save();

        $ro_id = $ro_id;
        $dcd = tbl_chairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $dcd = tbl_chairman_detail::where('ro_id', $ro_id)->firstOrFail(); 
        $dcd->name=$request->cname;
        $dcd->dzongkhag=$request->ctype1;
        $dcd->village=$request->cvillage; 
        $dcd->gewog=$request->cgewog; 
        $dcd->dungkhag=$request->cdungkhag;
        $dcd->houseno=$request->chouseno;
        $dcd->thramno=$request->cthramno;
        $dcd->dob=$request->cdob;
        $dcd->qualification=$request->cqualification;
        $dcd->phoneno=$request->cphoneno;
        $dcd->email=$request->cemail;
        $dcd->appdate=$request->cappdate;
        $dcd->updated_by=Auth::user()->id;
        $dcd->updated_at=date('Y-m-d');
        $dcd->save();

        $ro_id = $ro_id;
        $cdd = tbl_dychairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $cdd = tbl_dychairman_detail::where('ro_id', $ro_id)->firstOrFail();
        $cdd->name=$request->dc_name;
        $cdd->dzongkhag=$request->dc_type1;
        $cdd->village=$request->dc_village; 
        $cdd->gewog=$request->dc_gewog; 
        $cdd->dungkhag=$request->dc_dungkhag;
        $cdd->houseno=$request->dc_houseno;
        $cdd->thramno=$request->dc_thramno;
        $cdd->dob=$request->dc_dob;
        $cdd->qualification=$request->dc_qualification;
        $cdd->phoneno=$request->dc_phoneno;
        $cdd->email=$request->dc_email;
        $cdd->appdate=$request->dc_appdate;
        $cdd->updated_by=Auth::user()->id;
        $cdd->updated_at=date('Y-m-d');
        $cdd->save();

        $ro_id = $ro_id;
        $cxd = tbl_secretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $cxd = tbl_secretary_detail::where('ro_id', $ro_id)->firstOrFail();
        $cxd->name=$request->s_name;
        $cxd->dzongkhag=$request->s_type1;
        $cxd->village=$request->s_village; 
        $cxd->gewog=$request->s_gewog; 
        $cxd->dungkhag=$request->s_dungkhag;
        $cxd->houseno=$request->s_houseno;
        $cxd->thramno=$request->s_thramno;
        $cxd->dob=$request->s_dob;
        $cxd->qualification=$request->s_qualification;
        $cxd->phoneno=$request->s_phoneno;
        $cxd->email=$request->s_email;
        $cxd->appdate=$request->s_appdate;
        $cxd->updated_by=Auth::user()->id;
        $cxd->updated_at=date('Y-m-d');
        $cxd->save();

        $ro_id = $ro_id;
        $cvd = tbl_dysecretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $cvd = tbl_dysecretary_detail::where('ro_id', $ro_id)->firstOrFail();
        $cvd->name=$request->ds_name;
        $cvd->dzongkhag=$request->ds_type1;
        $cvd->village=$request->ds_village; 
        $cvd->gewog=$request->ds_gewog; 
        $cvd->dungkhag=$request->ds_dungkhag;
        $cvd->houseno=$request->ds_houseno;
        $cvd->thramno=$request->ds_thramno;
        $cvd->dob=$request->ds_dob;
        $cvd->qualification=$request->ds_qualification;
        $cvd->phoneno=$request->ds_phoneno;
        $cvd->email=$request->ds_email;
        $cvd->appdate=$request->ds_appdate;
        $cvd->updated_by=Auth::user()->id;
        $cvd->updated_at=date('Y-m-d');
        $cvd->save();

        $ro_id = $ro_id;
        $cod = tbl_treasurer_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $cod = tbl_treasurer_detail::where('ro_id', $ro_id)->firstOrFail();
        $cod->name=$request->td_name;
        $cod->dzongkhag=$request->td_type1;
        $cod->village=$request->td_village; 
        $cod->gewog=$request->td_gewog; 
        $cod->dungkhag=$request->td_dungkhag;
        $cod->houseno=$request->td_houseno;
        $cod->thramno=$request->td_thramno;
        $cod->dob=$request->td_dob;
        $cod->qualification=$request->td_qualification;
        $cod->phoneno=$request->td_phoneno;
        $cod->email=$request->td_email;
        $cod->appdate=$request->td_appdate;
        $cod->updated_by=Auth::user()->id;
        $cod->updated_at=date('Y-m-d');
        $cod->save();
        $request->session()->flash('alert-info', 'Details Updated Successfully');
        return redirect()->route('edit_ro_dzo',$ro_id)->with('success','Details has been Updated!');
    }

    public function approve_ro_dzo(Request $request,$ro_id)
    {
        $ro_id = $ro_id;
        $cda = tbl_ro_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $cda = tbl_ro_detail::where('ro_id', $ro_id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_by=Auth::user()->id;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $order = 'order';
         if($request->order != 0){
         foreach ($request->order as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $order,
                'doc_path' => $path
            ]);
            }
         }
    //chairmanapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_chairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_chairman_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save();
    //dychairmanapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_dychairman_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_dychairman_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save();
    //secretaryapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_secretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_secretary_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save(); 
    //dysecretaryapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_dysecretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_dysecretary_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save();
    //dysecretaryapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_dysecretary_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_dysecretary_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save();
    //treasurerapprovalstatustoggle//
        $ro_id = $ro_id;
        $ca = tbl_treasurer_detail::where('ro_id', $ro_id)->value('ro_id'); 
        $ca = tbl_treasurer_detail::where('ro_id', $ro_id)->latest()->firstOrFail();
        $ca->approval_status=$request->approve;
        $ca->remarks=$request->remarks;
        $ca->updated_by=Auth::user()->id;
        $ca->updated_at=date('Y-m-d');
        $ca->save(); 
    //tokendisable// 
        $ro_id = $ro_id;
        $tok = tbl_ro_detail::where('ro_id', $ro_id)->value('token_no'); 
        $tok = token::where('token_no', $tok)->value('token_no'); 
        $tok = token::where('token_no', $tok)->latest()->firstOrFail();

        $tok->status=$request->approve;

        $tok->save();                             
    //agencycreation//
        $approve=$request->approve;
        if($approve == '1')
        {
        $st = new tbl_agency;
        $st->agency=$request->agency;
        $st->created_by=Auth::user()->id;
        $st->created_at=date('Y-m-d');
        $st->updated_at=date('Y-m-d');
        $st->save();
    //Auto user creation//
        $agency=$request->agency;
        $user = new user;
        $user->name = $request->agency;
        $user->email = $request->email;
        $c = tbl_agency::where('agency', $agency)->value('id');
        $user->organization=$c;
        $user->role_id = '3';
        $user->dzongkhag_id=$request->dzongkhag;
        $password = 'pass@123';
        $user->password = Hash::make($password);
        $user->save(); 
        $myEmail = $request->email;
        Mail::to($myEmail)->send(new SendEmail($user, $password));        
        $users = user::all();
        $msg = 0;        
        }
        elseif($approve == '2')
        {


        $remarks = $request->remarks;
        $myEmail = $request->email;
        Mail::to($myEmail)->send(new SendRejectEmail($remarks));        
                

        }
        else
        {
        return redirect()->route('edit_ro_dzo',$ro_id)->with('success','Assessment of RO has been saved and the Status/Assessment has been sent via an Email to the Applicant!');    
        } 
        $request->session()->flash('alert-info', 'Assessment Successful');
        return redirect()->route('edit_ro_dzo',$ro_id)->with('success','Assessment of RO has been saved and the Status/Assessment has been sent via an Email to the Applicant!');
    }

//////PATRON REGISTER/////
    public function patron_register()
    {
        $patron= tbl_patron::where('host', Auth::user()->organization )->get();
        return view('application.register_member.patron',compact('patron'));
    }
    public function register_patron()
    {
    return view('application.register_member.register_patron');
    }
    public function patron_store(Request $request)
    {        
        $host = Auth::user()->organization;
        $newm = new tbl_patron; 
        $newm->name=$request->name;
        $newm->info=$request->info;   
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $newm->photo=$file->getClientOriginalName();
        }
        $newm->created_at=date('Y-m-d');
        $newm->host=$host;
        $newm->created_by=Auth::user()->id;
        $newm->save(); 
        return redirect()->route('patron_register')->with('success','Patron Registration Successfull!');
    }  
    public function delete_patron($id)
    {
        $me = new tbl_patron;
        $me::where('id', $id)->delete();
        return redirect()->route('patron_register')->with('success','Patron Deleted Successfully!');
    }
    public function patron_register_view($patronid)
    {  
       $patronid=$patronid;
       $pp = tbl_patron::where('id', $patronid)->get();
       return view('application.register_member.patron_register_view', compact('patronid','pp'));
    }
//////PATRON REGISTER DZONGKHA/////
    public function patron_register_dzo()
    {
        $patron= tbl_patron::where('host', Auth::user()->organization )->get();
        return view('application.register_member.patron_dzo',compact('patron'));
    }
    public function register_patron_dzo()
    {
    return view('application.register_member.register_patron_dzo');
    }
    public function delete_patron_dzo($id)
    {
        $me = new tbl_patron;
        $me::where('id', $id)->delete();
        return redirect()->route('patron_register_dzo')->with('success','Patron Deleted Successfully!');
    }
    public function patron_register_view_dzo($patronid)
    {  
       $patronid=$patronid;
       $pp = tbl_patron::where('id', $patronid)->get();
       return view('application.register_member.patron_register_view_dzo', compact('patronid','pp'));
    }
    public function patron_store_dzo(Request $request)
    {        
        $host = Auth::user()->organization;
        $newm = new tbl_patron; 
        $newm->name=$request->name;
        $newm->info=$request->info;   
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $newm->photo=$file->getClientOriginalName();
        }
        $newm->created_at=date('Y-m-d');
        $newm->host=$host;
        $newm->created_by=Auth::user()->id;
        $newm->save(); 
        return redirect()->route('patron_register_dzo')->with('success','Patron Registration Successfull!');
    } 





/////DZONGKHA DEREGISTERATION/////
    public function deregister_dzo()
    {
        return view('application.deregister.index_dzo');
    }
    public function deregister_store_dzo(Request $request)
    {        
        $host = Auth::user()->organization;
        $de = new tbl_deregister;      
        $de->deregister_date=$request->deregister_date;
        $de->reason=$request->reason;
        $de->details=$request->details;
        $de->created_at=date('Y-m-d');
        $de->host=$host;
        $de->created_by=Auth::user()->id;
        $de->save(); 
        $request_letter = 'request_letter';
         if($request->request_letter != 0){
         foreach ($request->request_letter as $file) {
            $path = $file->store('request_letter');
            tbl_deregister_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $de->id,
                'filecat' => $request_letter,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('deregister_dzo')->with('success','De-registration Request Submitted to Chhoedey Lhentshog!');
    } 
    public function deregister_view_dzo()
    {
        $deregister= tbl_deregister::all();
        $deregisterdoc= tbl_deregister_doc::all();
        return view('application.deregister.deregister_view_dzo',compact('deregister','deregisterdoc'));
    }
    public function deregister_viewdetails_dzo($id)
    {        
       $id = $id;
       $deregister = tbl_deregister::where('id',$id)->get();
       $deregisterdoc= tbl_deregister_doc::where('app_id',$id)->get();
       return view('application.deregister.deregister_viewdetails_dzo',compact('deregister','deregisterdoc','id'));
    }
    public function approve_deregister_dzo(Request $request,$id)
    {
        $id = $id;
        $der = tbl_deregister::where('id', $id)->value('id'); 
        $der = tbl_deregister::where('id', $id)->firstOrFail();
        $der->approve=$request->approve;
        $der->remarks=$request->remarks;
        $der->updated_by=Auth::user()->id;
        $der->updated_at=date('Y-m-d');
        $der->save();
        $order = 'order';
         if($request->order != 0){
         foreach ($request->order as $file) {
            $path = $file->store('order');
            tbl_deregister_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $order,
                'doc_path' => $path
            ]);
            }
         }
//statustogglein tbl_ro_detail//
        $org = tbl_deregister::where('id', $id)->value('host'); 
        $agency = tbl_agency::where('id', $org)->value('agency');
        $agency2 = tbl_ro_detail::where('name', $agency)->latest()->firstOrFail();
        $agency2->approve='0';
        $agency2->updated_by=Auth::user()->id;
        $agency2->updated_at=date('Y-m-d');
        $agency2->save();
//statustogglein tbl_agency//
        $approve=$request->approve;
        if($approve == '1')
        {
        $org = tbl_deregister::where('id', $id)->value('host'); 
        $anc = tbl_agency::where('id', $org)->latest()->firstOrFail();
        $anc->status='0';
        $anc->created_by=Auth::user()->id;
        $anc->created_at=date('Y-m-d');
        $anc->updated_at=date('Y-m-d');
        $anc->save();
        }
///user login deactivate//
        $org = tbl_deregister::where('id', $id)->value('host'); 
        $cd = user::where('organization', $org)->value('organization');
        $cd = user::where('organization', $org)->get();
        foreach($cd as $cds)
        {
        $cds->status ='0';
        $cds->save();
        }
        $request->session()->flash('alert-info', 'Assessment Successful');
        return redirect()->route('deregister_view_dzo')->with('success','Assessment of De-Registration Request has been saved!');
    }

//////MEMBER REGISTER DZONGKHA/////
    public function member_register_dzo()
    {
        $member= tbl_newmember::where('host', Auth::user()->organization )->get();
        return view('application.register_member.index_dzo',compact('member'));
    }
    public function register_new_dzo()
    {
    return view('application.register_member.register_new_dzo');
    }
    public function newmember_store_dzo(Request $request)
    {        
        $host = Auth::user()->organization;
        $newm = new tbl_newmember; 
        $newm->cid=$request->cid;     
        $newm->name=$request->name;
        $newm->dzongkhag=$request->type1;
        $newm->gewog=$request->gewog;
        $newm->village=$request->village;
        $newm->contact=$request->contact;
        $newm->thramno=$request->thramno;
        $newm->houseno=$request->houseno;
        $newm->registration_date=$request->registration_date;
        $newm->membertype=$request->membertype;
        $newm->branch_name=$request->branch_name;
        $newm->created_at=date('Y-m-d');
        $newm->host=$host;
        $newm->created_by=Auth::user()->id;
        $newm->save(); 
        return redirect()->route('member_register_dzo')->with('success','New Member Registration Successfull!');
    } 
    public function delete_member_dzo($id)
    {
        $me = new tbl_newmember;
        $me::where('id', $id)->delete();
        return redirect()->route('member_register_dzo')->with('success','Member Deleted Successfully!');
    }


    ///////deletion///
        public function register_chairman()
    {
        $dets = '';
        $det = '';
    return view('application.register.chairman_details',compact('dets','det'));
    }
    public function register_dychairman()
    {
        $dets = '';
    return view('application.register.dychairman_details',compact('dets'));
    }
    public function register_secretary()
    {
        $dets = '';
    return view('application.register.secretary_details',compact('dets'));
    }
    public function register_dysecretary()
    {
        $dets = '';
    return view('application.register.dysecretary_details',compact('dets'));
    }
    public function register_treasurer()
    {
        $dets = '';
    return view('application.register.treasurer_details',compact('dets'));
    }
    public function register_documents()
    {
        $dets = '';
    return view('application.register.document_details',compact('dets'));
    }

    public function downloadceritficate(Request $request, $ro_id)
    {
       $filename = tbl_register_document::where('ro_id', $ro_id)->where('filecat','order')->value('doc_path');
       $pathToFile=storage_path()."/app/".$filename;
       return response()->download($pathToFile);     
    }
}
