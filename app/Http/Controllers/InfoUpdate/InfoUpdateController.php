<?php

namespace App\Http\Controllers\InfoUpdate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
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
use App\gewog;
use App\village;
use Auth;
use Session;
use App\Http\Requests\RegisterDocumentRequest;

class InfoUpdateController extends Controller
{

public function cid_search_cdnewinfo(Request $request,$ro_id)
    {
       $cidno = $request->cidno;
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_cdcid', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','cidno'));
    } 
    public function cid_search_cdnewinfo_dzo(Request $request,$ro_id)
    {
       $cidno = $request->cidno;
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_cdcid_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','cidno'));
    } 
    public function cid_search_dcdnewinfo(Request $request,$ro_id)
    {
       $cidno = $request->cidno;
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dcdcid', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','cidno'));
    } 
    public function cid_search_dcdnewinfo_dzo(Request $request,$ro_id)
    {
       $cidno = $request->cidno;
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dcdcid_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','cidno'));
    }
    public function cid_search_sdnewinfo(Request $request,$ro_id)
    {
       $cidno = $request->cidno;
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_sdcid', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','cidno'));
    }
    public function cid_search_sdnewinfo_dzo(Request $request,$ro_id)
    {
       $cidno = $request->cidno;
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_sdcid_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','cidno'));
    } 
    public function cid_search_dsdnewinfo(Request $request,$ro_id)
    {
       $cidno = $request->cidno;
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dsdcid', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','cidno'));
    }
    public function cid_search_dsdnewinfo_dzo(Request $request,$ro_id)
    {
       $cidno = $request->cidno;
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dsdcid_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','cidno'));
    }
    public function cid_search_tdnewinfo(Request $request,$ro_id)
    {
       $cidno = $request->cidno;
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_tdcid', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','cidno'));
    }
    public function cid_search_tdnewinfo_dzo(Request $request,$ro_id)
    {
       $cidno = $request->cidno;
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_tdcid_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','cidno'));
    }


public function cd_review($id)
    {        
       $id = $id;
       $app =  tbl_chairman_detail::where('id',$id)->get();
       $doc= tbl_register_document::where('applicantid', $id )->get();
       return view('application.new_information.cd_review',compact('app','id','doc'));
    }
public function approve_cd(Request $request,$id)
    {
        $id = $id;
        $ro_id =  tbl_chairman_detail::where('id', $id )->value('ro_id');
        $approval_status=$request->approval_status;
        $remarks=$request->remarks;


          $cd = new tbl_chairman_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('newinfo_cro_home')->with('success','Assessment Decision Save Successfully!');
    }
public function dcd_review($id)
    {        
       $id = $id;
       $app =  tbl_dychairman_detail::where('id',$id)->get();
       $doc= tbl_register_document::where('applicantid', $id )->get();
       return view('application.new_information.dcd_review',compact('app','id','doc'));
    } 
public function approve_dcd(Request $request,$id)
    {
        $id = $id;
        $ro_id =  tbl_dychairman_detail::where('id', $id )->value('ro_id');
        $approval_status=$request->approval_status;
        $remarks=$request->remarks;


          $cd = new tbl_dychairman_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('newinfo_cro_home')->with('success','Assessment Decision Save Successfully!');
    }   
public function sd_review($id)
    {        
       $id = $id;
       $app =  tbl_secretary_detail::where('id',$id)->get();
       $doc= tbl_register_document::where('applicantid', $id )->get();
       return view('application.new_information.sd_review',compact('app','id','doc'));
    } 
public function approve_sd(Request $request,$id)
    {
        $id = $id;
        $ro_id =  tbl_secretary_detail::where('id', $id )->value('ro_id');
        $approval_status=$request->approval_status;
        $remarks=$request->remarks;


          $cd = new tbl_secretary_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('newinfo_cro_home')->with('success','Assessment Decision Save Successfully!');
    }   
public function dsd_review($id)
    {        
       $id = $id;
       $app =  tbl_dysecretary_detail::where('id',$id)->get();
       $doc= tbl_register_document::where('applicantid', $id )->get();
       return view('application.new_information.dsd_review',compact('app','id','doc'));
    } 
public function approve_dsd(Request $request,$id)
    {
        $id = $id;
        $ro_id =  tbl_dysecretary_detail::where('id', $id )->value('ro_id');
        $approval_status=$request->approval_status;
        $remarks=$request->remarks;


          $cd = new tbl_dysecretary_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('newinfo_cro_home')->with('success','Assessment Decision Save Successfully!');
    }  
public function td_review($id)
    {        
       $id = $id;
       $app =  tbl_treasurer_detail::where('id',$id)->get();
       $doc= tbl_register_document::where('applicantid', $id )->get();
       return view('application.new_information.td_review',compact('app','id','doc'));
    } 
public function approve_td(Request $request,$id)
    {
        $id = $id;
        $ro_id =  tbl_treasurer_detail::where('id', $id )->value('ro_id');
        $approval_status=$request->approval_status;
        $remarks=$request->remarks;


          $cd = new tbl_treasurer_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('newinfo_cro_home')->with('success','Assessment Decision Save Successfully!');
    }   

    public function update_ro_info($ro_id)
    {
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->limit(1)->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->where('approval_status','1')->limit(1)->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->where('approval_status','1')->limit(1)->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->where('approval_status','1')->limit(1)->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->where('approval_status','1')->limit(1)->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->where('approval_status','1')->limit(1)->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       

$x =  tbl_info_update::where('ro_id', $ro_id)->orderBy('id', 'desc')->limit(1)->get();
       
$xcount = count(tbl_info_update::where('ro_id', $ro_id)->orderBy('id', 'desc')->limit(1)->get());


       return view('application.information_update.update_ro_info', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','x','xcount'));
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
    public function change_ro_info(Request $request,$ro_id)
    {
        $ro_id = $ro_id;
        $up = new tbl_info_update;
        $up->ro_id=$request->ro_id;
        $up->name=$request->ro_name;
        $up->dzongkhag=$request->type;
        $up->location=$request->location; 
        $up->postbox=$request->postbox; 
        $up->phone=$request->phone;
        $up->email=$request->email;
       
        $up->c_name=$request->cname;
        $up->c_dzongkhag=$request->ctype1;
        $up->c_village=$request->cvillage; 
        $up->c_gewog=$request->cgewog; 
        $up->c_dungkhag=$request->cdungkhag;
        $up->c_houseno=$request->chouseno;
        $up->c_thramno=$request->cthramno;
        $up->c_dob=$request->cdob;
        $up->c_qualification=$request->cqualification;
        $up->c_phoneno=$request->cphoneno;
        $up->c_email=$request->cemail;
        $up->c_appdate=$request->cappdate;
       

if($request->hasFile('ephoto'))
{
$FileName = Input::file('ephoto')->getClientOriginalName();
$file=$request->file('ephoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photo = Input::file('ephoto')->getClientOriginalName();
$up->c_photo=$photo;
}

        $up->dc_name=$request->dc_name;
        $up->dc_dzongkhag=$request->dc_type1;
        $up->dc_village=$request->dc_village; 
        $up->dc_gewog=$request->dc_gewog; 
        $up->dc_dungkhag=$request->dc_dungkhag;
        $up->dc_houseno=$request->dc_houseno;
        $up->dc_thramno=$request->dc_thramno;
        $up->dc_dob=$request->dc_dob;
        $up->dc_qualification=$request->dc_qualification;
        $up->dc_phoneno=$request->dc_phoneno;
        $up->dc_email=$request->dc_email;
        $up->dc_appdate=$request->dc_appdate;


if($request->hasFile('ephotodc'))
{
$FileName = Input::file('ephotodc')->getClientOriginalName();
$file=$request->file('ephotodc');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photodc = Input::file('ephotodc')->getClientOriginalName();
$up->dc_photo=$photodc;
}
       
        $up->s_name=$request->s_name;
        $up->s_dzongkhag=$request->s_type1;
        $up->s_village=$request->s_village; 
        $up->s_gewog=$request->s_gewog; 
        $up->s_dungkhag=$request->s_dungkhag;
        $up->s_houseno=$request->s_houseno;
        $up->s_thramno=$request->s_thramno;
        $up->s_dob=$request->s_dob;
        $up->s_qualification=$request->s_qualification;
        $up->s_phoneno=$request->s_phoneno;
        $up->s_email=$request->s_email;
        $up->s_appdate=$request->s_appdate;


if($request->hasFile('ephotos'))
{
$FileName = Input::file('ephotos')->getClientOriginalName();
$file=$request->file('ephotos');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photos = Input::file('ephotos')->getClientOriginalName();
$up->s_photo=$photos;
}
        
        $up->ds_name=$request->ds_name;
        $up->ds_dzongkhag=$request->ds_type1;
        $up->ds_village=$request->ds_village; 
        $up->ds_gewog=$request->ds_gewog; 
        $up->ds_dungkhag=$request->ds_dungkhag;
        $up->ds_houseno=$request->ds_houseno;
        $up->ds_thramno=$request->ds_thramno;
        $up->ds_dob=$request->ds_dob;
        $up->ds_qualification=$request->ds_qualification;
        $up->ds_phoneno=$request->ds_phoneno;
        $up->ds_email=$request->ds_email;
        $up->ds_appdate=$request->ds_appdate;

if($request->hasFile('ephotods'))
{
$FileName = Input::file('ephotods')->getClientOriginalName();
$file=$request->file('ephotods');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photods = Input::file('ephotods')->getClientOriginalName();
$up->ds_photo=$photods;
}
       
        $up->t_name=$request->td_name;
        $up->t_dzongkhag=$request->td_type1;
        $up->t_village=$request->td_village; 
        $up->t_gewog=$request->td_gewog; 
        $up->t_dungkhag=$request->td_dungkhag;
        $up->t_houseno=$request->td_houseno;
        $up->t_thramno=$request->td_thramno;
        $up->t_dob=$request->td_dob;
        $up->t_qualification=$request->td_qualification;
        $up->t_phoneno=$request->td_phoneno;
        $up->t_email=$request->td_email;
        $up->t_appdate=$request->td_appdate;

if($request->hasFile('ephotot'))
{
$FileName = Input::file('ephotot')->getClientOriginalName();
$file=$request->file('ephotot');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photot = Input::file('ephotot')->getClientOriginalName();
$up->t_photo=$photot;
}


        $up->host=Auth::user()->organization;
        $up->updated_by=Auth::user()->id;
        $up->updated_at=date('Y-m-d');
        $up->save();
        $request->session()->flash('alert-info', 'Details Saved Successfully');
        return redirect()->route('update_ro_info',$ro_id)->with('success','Updated Details has been Sent for Review!');
    }
    public function infoupdate_home()
    {
       $app =  tbl_info_update::orderBy('id', 'desc')->latest()->get()->unique('ro_id'); 
       return view('application.information_update.infoupdate_home', compact('app'));
    }
    public function view_updateinfo_details($ro_id)
    {
       $ro_id = $ro_id;
       $app =  tbl_info_update::where('ro_id', $ro_id)->orderBy('id', 'desc')->limit(1)->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.information_update.updateinfo_edit', compact('ro_id','app','rd'));
    }
     public function delete_photo($id,$ro_id)
    {
        $me = new tbl_info_update;
        $me::where('id', $id)
         ->update([
                'c_photo'=> ''
                ]);
       $ro_id = $ro_id;
       return redirect()->route('view_updateinfo_details',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
    public function delete_photodc($id,$ro_id)
    {
        $me = new tbl_info_update;
        $me::where('id', $id)
         ->update([
                'dc_photo'=> ''
                ]);
       $ro_id = $ro_id;
       return redirect()->route('view_updateinfo_details',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
    public function delete_photos($id,$ro_id)
    {
        $me = new tbl_info_update;
        $me::where('id', $id)
         ->update([
                's_photo'=> ''
                ]);
       $ro_id = $ro_id;
       return redirect()->route('view_updateinfo_details',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
    public function delete_photods($id,$ro_id)
    {
        $me = new tbl_info_update;
        $me::where('id', $id)
         ->update([
                'ds_photo'=> ''
                ]);
       $ro_id = $ro_id;
       return redirect()->route('view_updateinfo_details',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
    public function delete_photot($id,$ro_id)
    {
        $me = new tbl_info_update;
        $me::where('id', $id)
         ->update([
                't_photo'=> ''
                ]);
       $ro_id = $ro_id;
       return redirect()->route('view_updateinfo_details',$ro_id)->with('success','Updated Details has been Reviewed!');
    }

      public function updateinfo_edit(Request $request,$ro_id)
    {
        $host = Auth::user()->organization;
        $ro_id = $ro_id;
        $upinfo = tbl_info_update::where('ro_id', $ro_id)->value('ro_id'); 
        $upinfo = tbl_info_update::where('ro_id', $ro_id)->firstOrFail();

        $upinfo->ro_id=$request->ro_id;
        $upinfo->name=$request->ro_name;
        $upinfo->dzongkhag=$request->type;
        $upinfo->location=$request->location; 
        $upinfo->postbox=$request->postbox; 
        $upinfo->phone=$request->phone;
        $upinfo->email=$request->email;
       
        $upinfo->c_name=$request->cname;
        $upinfo->c_dzongkhag=$request->ctype1;
        $upinfo->c_village=$request->cvillage; 
        $upinfo->c_gewog=$request->cgewog; 
        $upinfo->c_dungkhag=$request->cdungkhag;
        $upinfo->c_houseno=$request->chouseno;
        $upinfo->c_thramno=$request->cthramno;
        $upinfo->c_dob=$request->cdob;
        $upinfo->c_qualification=$request->cqualification;
        $upinfo->c_phoneno=$request->cphoneno;
        $upinfo->c_email=$request->cemail;
        $upinfo->c_appdate=$request->cappdate;

if($request->hasFile('ephoto'))
{
$FileName = Input::file('ephoto')->getClientOriginalName();
$file=$request->file('ephoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photo = Input::file('ephoto')->getClientOriginalName();
$upinfo->c_photo=$photo;
}

       
        $upinfo->dc_name=$request->dc_name;
        $upinfo->dc_dzongkhag=$request->dc_type1;
        $upinfo->dc_village=$request->dc_village; 
        $upinfo->dc_gewog=$request->dc_gewog; 
        $upinfo->dc_dungkhag=$request->dc_dungkhag;
        $upinfo->dc_houseno=$request->dc_houseno;
        $upinfo->dc_thramno=$request->dc_thramno;
        $upinfo->dc_dob=$request->dc_dob;
        $upinfo->dc_qualification=$request->dc_qualification;
        $upinfo->dc_phoneno=$request->dc_phoneno;
        $upinfo->dc_email=$request->dc_email;
        $upinfo->dc_appdate=$request->dc_appdate;


if($request->hasFile('ephotodc'))
{
$FileName = Input::file('ephotodc')->getClientOriginalName();
$file=$request->file('ephotodc');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photodc = Input::file('ephotodc')->getClientOriginalName();
$upinfo->dc_photo=$photodc;
}       
        $upinfo->s_name=$request->s_name;
        $upinfo->s_dzongkhag=$request->s_type1;
        $upinfo->s_village=$request->s_village; 
        $upinfo->s_gewog=$request->s_gewog; 
        $upinfo->s_dungkhag=$request->s_dungkhag;
        $upinfo->s_houseno=$request->s_houseno;
        $upinfo->s_thramno=$request->s_thramno;
        $upinfo->s_dob=$request->s_dob;
        $upinfo->s_qualification=$request->s_qualification;
        $upinfo->s_phoneno=$request->s_phoneno;
        $upinfo->s_email=$request->s_email;
        $upinfo->s_appdate=$request->s_appdate;
 

if($request->hasFile('ephotos'))
{
$FileName = Input::file('ephotos')->getClientOriginalName();
$file=$request->file('ephotos');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photos = Input::file('ephotos')->getClientOriginalName();
$upinfo->s_photo=$photos;
}
       
        $upinfo->ds_name=$request->ds_name;
        $upinfo->ds_dzongkhag=$request->ds_type1;
        $upinfo->ds_village=$request->ds_village; 
        $upinfo->ds_gewog=$request->ds_gewog; 
        $upinfo->ds_dungkhag=$request->ds_dungkhag;
        $upinfo->ds_houseno=$request->ds_houseno;
        $upinfo->ds_thramno=$request->ds_thramno;
        $upinfo->ds_dob=$request->ds_dob;
        $upinfo->ds_qualification=$request->ds_qualification;
        $upinfo->ds_phoneno=$request->ds_phoneno;
        $upinfo->ds_email=$request->ds_email;
        $upinfo->ds_appdate=$request->ds_appdate;


if($request->hasFile('ephotods'))
{
$FileName = Input::file('ephotods')->getClientOriginalName();
$file=$request->file('ephotods');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photods = Input::file('ephotods')->getClientOriginalName();
$upinfo->ds_photo=$photods;
}
       
        $upinfo->t_name=$request->td_name;
        $upinfo->t_dzongkhag=$request->td_type1;
        $upinfo->t_village=$request->td_village; 
        $upinfo->t_gewog=$request->td_gewog; 
        $upinfo->t_dungkhag=$request->td_dungkhag;
        $upinfo->t_houseno=$request->td_houseno;
        $upinfo->t_thramno=$request->td_thramno;
        $upinfo->t_dob=$request->td_dob;
        $upinfo->t_qualification=$request->td_qualification;
        $upinfo->t_phoneno=$request->td_phoneno;
        $upinfo->t_email=$request->td_email;
        $upinfo->t_appdate=$request->td_appdate;

if($request->hasFile('ephotot'))
{
$FileName = Input::file('ephotot')->getClientOriginalName();
$file=$request->file('ephotot');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photot = Input::file('ephotot')->getClientOriginalName();
$upinfo->t_photo=$photot;
}


        $upinfo->host=$host;
        $upinfo->updated_by=Auth::user()->id;
        $upinfo->updated_at=date('Y-m-d');
        $upinfo->save();
        $request->session()->flash('alert-info', 'Details Reviewed Successfully');
        return redirect()->route('view_updateinfo_details',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
    public function approve_updatedinfo(Request $request,$ro_id)
    {
        $ro_id = $ro_id;
        $cda = tbl_info_update::where('ro_id', $ro_id)->value('ro_id'); 
        $cda = tbl_info_update::where('ro_id', $ro_id)->latest()->firstOrFail();

       // $cda = tbl_info_update::where('ro_id', $ro_id)->where('approve',0)->get();

        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_by=Auth::user()->id;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $request->session()->flash('alert-info', 'Assessment Successful');
        return redirect()->route('view_updateinfo_details',$ro_id)->with('success','Assessment of RO has been saved!');
    }
    public function infoupdate_home_ro()
    {
       $app =  tbl_info_update::orderBy('id', 'desc')->get();
       $app2 =  tbl_info_update::where('host', Auth::user()->organization)->orderBy('id', 'desc')->get(); 

       return view('application.information_update.infoupdate_home_ro', compact('app','app2'));
    }
//NEW INFORMATION//  
    public function delete_cd($id,$ro_id)
    {
        $me = new tbl_register_document;
        $me::where('id', $id)->delete();
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
     public function delete_pp($id,$ro_id)
    {
        $me = new tbl_dychairman_detail;
        $me::where('id', $id)
         ->update([
                'photo'=> ''
                ]);
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
     public function delete_ppc($id,$ro_id)
    {
        $me = new tbl_chairman_detail;
        $me::where('id', $id)
         ->update([
                'photo'=> ''
                ]);
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
     public function delete_pps($id,$ro_id)
    {
        $me = new tbl_secretary_detail;
        $me::where('id', $id)
         ->update([
                'photo'=> ''
                ]);
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
     public function delete_ppsd($id,$ro_id)
    {
        $me = new tbl_dysecretary_detail;
        $me::where('id', $id)
         ->update([
                'photo'=> ''
                ]);
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
     public function delete_ppt($id,$ro_id)
    {
        $me = new tbl_treasurer_detail;
        $me::where('id', $id)
         ->update([
                'photo'=> ''
                ]);
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
    public function new_information($ro_id)
    {
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }  
    public function new_chairman_details_store(Request $request)
    {  
        $ro_id = $request->ro_id;
        $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $pe= new tbl_chairman_detail;
        $pe->ro_id=$request->ro_id;
        $pe->name=$request->name;
        $pe->dzongkhag=$request->type1;
        $pe->dungkhag=$request->dungkhag;
        $pe->gewog=$request->gewog;
        $pe->village=$request->village;
        $pe->houseno=$request->houseno;
        $pe->thramno=$request->thramno;
        $pe->dob=$request->dob;
        $pe->qualification=$request->qualification;
        $pe->phoneno=$request->phoneno;
        $pe->email=$request->email;
        $pe->appdate=$request->appdate;
        $pe->new_chairman=$request->new_chairman;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $pe->photo=$file->getClientOriginalName();
        }
        $pe->save();

        $ro_id = $request->ro_id;        
        $picid =  tbl_chairman_detail::where('ro_id', $ro_id )->where('new_chairman',1)->orderBy('id', 'desc')->value('id');
         $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $cd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }       
                         
        $request->session()->flash('alert-info', 'New Chairman details Added Successfully');
        return redirect()->route('application.home_ro')->with('success','New Chairman details has been Saved and sent for Approval!');
    }  
    public function newinfo_cro_home()
    {
        $app =  tbl_chairman_detail::where('new_chairman','1' AND 'approval_status','0')->orderBy('id', 'desc')->get();
        $dcd =  tbl_dychairman_detail::where('new_dychairman','1' AND 'approval_status','0')->orderBy('id', 'desc')->get();
        $sd =  tbl_secretary_detail::where('new_secretary','1' AND 'approval_status','0')->orderBy('id', 'desc')->get(); 
        $dsd =  tbl_dysecretary_detail::where('new_dysecretary','1' AND 'approval_status','0')->orderBy('id', 'desc')->get();
        $td =  tbl_treasurer_detail::where('new_treasurer','1' AND 'approval_status','0')->orderBy('id', 'desc')->get(); 
       return view('application.new_information.newinfo_cro_home', compact('app','dcd','sd','dsd','td'));
    } 
    public function viewcd(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_chairman_detail::find($id);
            return response()->json($info);
        }
    } 
    public function update_cd(Request $request)
     {
        $ro_id = $request->ro_id;
        $id = $request->edit_id;
        $name = $request->ename;
        $dzongkhag = $request->etype1;
        $dungkhag = $request->edungkhag;
        $village = $request->evillage;
        $gewog = $request->egewog;
        $houseno = $request->ehouseno;
        $thramno = $request->ethramno;
        $dob = $request->edob;
        $qualification = $request->equalification;
        $email = $request->eemail;
        $appdate = $request->eappdate;
        $approval_status = $request->eapproval_status;
        $remarks = $request->eremarks;
        $phoneno = $request->ephoneno;

if($request->hasFile('ephoto'))
{
$FileName = Input::file('ephoto')->getClientOriginalName();
$file=$request->file('ephoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
}
if($request->hasFile('ephoto'))
{
        $photo = Input::file('ephoto')->getClientOriginalName();
        $cd = new tbl_chairman_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                'photo'=> $photo
                ]);

        $edit_id = $request->edit_id;
        $ro_id =  tbl_chairman_detail::where('id', $edit_id )->value('ro_id');   
        $picid =  tbl_chairman_detail::where('ro_id', $ro_id )->where('new_chairman',1)->orderBy('id', 'desc')->value('id');
         $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $cd,
                'applicantid' => $picid,        
                'doc_path' => $path
            ]);
            }
         }

}
else
{  
        $cd = new tbl_chairman_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                ]);
        $edit_id = $request->edit_id;
        $ro_id =  tbl_chairman_detail::where('id', $edit_id )->value('ro_id');   
        $picid =  tbl_chairman_detail::where('ro_id', $ro_id )->where('new_chairman',1)->orderBy('id', 'desc')->value('id');
         $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $cd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }
}


        $cd = tbl_chairman_detail::all();

        $host =  Auth::user()->role_id;
        if($host == '2')
        {
            $cd = new tbl_chairman_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('application.home')->with('success','Chairman Edit Details has been saved!');
        }
        else
        {
        return redirect()->route('application.home_ro')->with('success','Chairman Edit Details has been saved!');
        }    
    }
    public function new_dychairman_details_store(Request $request)
    {  
        $ro_id = $request->ro_id;
        $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $dcd= new tbl_dychairman_detail;
        $dcd->ro_id=$request->ro_id;
        $dcd->name=$request->dcname;
        $dcd->dzongkhag=$request->dctype1;
        $dcd->dungkhag=$request->dcdungkhag;
        $dcd->gewog=$request->dcgewog;
        $dcd->village=$request->dcvillage;
        $dcd->houseno=$request->dchouseno;
        $dcd->thramno=$request->dcthramno;
        $dcd->dob=$request->dcdob;
        $dcd->qualification=$request->dcqualification;
        $dcd->phoneno=$request->dcphoneno;
        $dcd->email=$request->dcemail;
        $dcd->appdate=$request->dcappdate;
        $dcd->new_dychairman=$request->new_dychairman;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $dcd->photo=$file->getClientOriginalName();
        }
        $dcd->save();  
        $ro_id = $request->ro_id;        
        $picid =  tbl_dychairman_detail::where('ro_id', $ro_id )->where('new_dychairman',1)->orderBy('id', 'desc')->value('id');
         $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dcd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }   
        $request->session()->flash('alert-info', 'New Deputy Chairman details Added Successfully');
        return redirect()->route('application.home_ro')->with('success','New Deputy Chairman details has been Saved and sent for Approval!');
    }
    public function viewdcd(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_dychairman_detail::find($id);
            return response()->json($info);
        }
    }
    public function update_dcd(Request $request)
     {
        $ro_id = $request->ro_id;
        $id = $request->edit_id2;
        $name = $request->edcname;
        $dzongkhag = $request->edctype1;
        $dungkhag = $request->edcdungkhag;
        $village = $request->edcvillage;
        $gewog = $request->edcgewog;
        $houseno = $request->edchouseno;
        $thramno = $request->edcthramno;
        $dob = $request->edcdob;
        $qualification = $request->edcqualification;
        $email = $request->edcemail;
        $appdate = $request->edcappdate;
        $approval_status = $request->edcapproval_status;
        $remarks = $request->edcremarks;
        $phoneno = $request->edcphoneno;
        $approval_status = $request->edcapproval_status;
        $remarks = $request->edcremarks;

if($request->hasFile('edcphoto'))
{
$FileName = Input::file('edcphoto')->getClientOriginalName();
$file=$request->file('edcphoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
}
if($request->hasFile('edcphoto'))
{
        $photo = Input::file('edcphoto')->getClientOriginalName();
        $cd = new tbl_dychairman_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                'photo'=> $photo
                ]);

        $edit_id2 = $request->edit_id2;
        $ro_id =  tbl_dychairman_detail::where('id', $edit_id2 )->value('ro_id');   
        $picid =  tbl_dychairman_detail::where('ro_id', $ro_id )->where('new_dychairman',1)->orderBy('id', 'desc')->value('id');
         $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dcd,
                'applicantid' => $picid,        
                'doc_path' => $path
            ]);
            }
         }

}
else
{  
        $cd = new tbl_dychairman_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                ]);
        $edit_id2 = $request->edit_id2;
        $ro_id =  tbl_dychairman_detail::where('id', $edit_id2 )->value('ro_id');   
        $picid =  tbl_dychairman_detail::where('ro_id', $ro_id )->where('new_dychairman',1)->orderBy('id', 'desc')->value('id');
         $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dcd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }
}
        $cd = tbl_dychairman_detail::all();
        $host =  Auth::user()->role_id;
        if($host == '2')
        {
            $cd = new tbl_dychairman_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('application.home')->with('success','Chairman Edit Details has been saved!');
        }
        else
        {
        return redirect()->route('application.home_ro')->with('success','Chairman Edit Details has been saved!');
        }  
    }
    public function new_secretary_details_store(Request $request)
    {  
        $ro_id = $request->ro_id;
        $dcd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $dcd= new tbl_secretary_detail;
        $dcd->ro_id=$request->ro_id;
        $dcd->name=$request->sname;
        $dcd->dzongkhag=$request->stype1;
        $dcd->dungkhag=$request->sdungkhag;
        $dcd->gewog=$request->sgewog;
        $dcd->village=$request->svillage;
        $dcd->houseno=$request->shouseno;
        $dcd->thramno=$request->sthramno;
        $dcd->dob=$request->sdob;
        $dcd->qualification=$request->squalification;
        $dcd->phoneno=$request->sphoneno;
        $dcd->email=$request->semail;
        $dcd->appdate=$request->sappdate;
        $dcd->new_secretary=$request->new_secretary;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $dcd->photo=$file->getClientOriginalName();
        }
        $dcd->save();   
        $ro_id = $request->ro_id;        
        $picid =  tbl_secretary_detail::where('ro_id', $ro_id )->where('new_secretary',1)->orderBy('id', 'desc')->value('id');
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $sd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }                  
        $request->session()->flash('alert-info', 'New Secretary details Added Successfully');
        return redirect()->route('application.home_ro')->with('success','New Secretary details has been Saved and sent for Approval!');
    }
    public function viewsd(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_secretary_detail::find($id);
            return response()->json($info);
        }
    }
    public function update_sd(Request $request)
     {
        $ro_id = $request->ro_id;
        $id = $request->edit_id3;
        $name = $request->esname;
        $dzongkhag = $request->estype1;
        $dungkhag = $request->esdungkhag;
        $village = $request->esvillage;
        $gewog = $request->esgewog;
        $houseno = $request->eshouseno;
        $thramno = $request->esthramno;
        $dob = $request->esdob;
        $qualification = $request->esqualification;
        $email = $request->esemail;
        $appdate = $request->esappdate;
        $approval_status = $request->esapproval_status;
        $remarks = $request->esremarks;
        $phoneno = $request->esphoneno;
        $approval_status = $request->esapproval_status;
        $remarks = $request->esremarks;
        if($request->hasFile('esphoto'))
{
$FileName = Input::file('esphoto')->getClientOriginalName();
$file=$request->file('esphoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
}
if($request->hasFile('esphoto'))
{
        $photo = Input::file('esphoto')->getClientOriginalName();
        $cd = new tbl_secretary_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                'photo'=> $photo
                ]);

        $edit_id3 = $request->edit_id3;
        $ro_id =  tbl_secretary_detail::where('id', $edit_id3 )->value('ro_id');   
        $picid =  tbl_secretary_detail::where('ro_id', $ro_id )->where('new_secretary',1)->orderBy('id', 'desc')->value('id');
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $sd,
                'applicantid' => $picid,        
                'doc_path' => $path
            ]);
            }
         }

}
else
{  
        $cd = new tbl_secretary_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                ]);
        $edit_id3 = $request->edit_id3;
        $ro_id =  tbl_secretary_detail::where('id', $edit_id3 )->value('ro_id');   
        $picid =  tbl_secretary_detail::where('ro_id', $ro_id )->where('new_secretary',1)->orderBy('id', 'desc')->value('id');
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $sd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }
}
        $cd = tbl_secretary_detail::all();
        $host =  Auth::user()->role_id;
        if($host == '2')
        {
            $cd = new tbl_secretary_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('application.home')->with('success','Secretary Edit Details has been saved!');
        }
        else
        {
        return redirect()->route('application.home_ro')->with('success','Secretary Edit Details has been saved!');
        }    
    }
    public function new_dysecretary_details_store(Request $request)
    {  
        $ro_id = $request->ro_id;
        $dcd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $dcd= new tbl_dysecretary_detail;
        $dcd->ro_id=$request->ro_id;
        $dcd->name=$request->dsname;
        $dcd->dzongkhag=$request->dstype1;
        $dcd->dungkhag=$request->dsdungkhag;
        $dcd->gewog=$request->dsgewog;
        $dcd->village=$request->dsvillage;
        $dcd->houseno=$request->dshouseno;
        $dcd->thramno=$request->dsthramno;
        $dcd->dob=$request->dsdob;
        $dcd->qualification=$request->dsqualification;
        $dcd->phoneno=$request->dsphoneno;
        $dcd->email=$request->dsemail;
        $dcd->appdate=$request->dsappdate;
        $dcd->new_dysecretary=$request->new_dysecretary;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $dcd->photo=$file->getClientOriginalName();
        }
        $ro_id = $request->ro_id;        
        $picid =  tbl_dysecretary_detail::where('ro_id', $ro_id )->where('new_dysecretary',1)->orderBy('id', 'desc')->value('id');
         $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dsd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         } 
        $dcd->save();                  
        $request->session()->flash('alert-info', 'New Deputy Secretary details Added Successfully');
        return redirect()->route('application.home_ro')->with('success','New Deputy Secretary details has been Saved and sent for Approval!');
    }
    public function viewdsd(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_dysecretary_detail::find($id);
            return response()->json($info);
        }
    }
    public function update_dsd(Request $request)
    {
        $ro_id = $request->ro_id;
        $id = $request->edit_id4;
        $name = $request->edsname;
        $dzongkhag = $request->edstype1;
        $dungkhag = $request->edsdungkhag;
        $village = $request->edsvillage;
        $gewog = $request->edsgewog;
        $houseno = $request->edshouseno;
        $thramno = $request->edsthramno;
        $dob = $request->edsdob;
        $qualification = $request->edsqualification;
        $email = $request->edsemail;
        $appdate = $request->edsappdate;
        $approval_status = $request->edsapproval_status;
        $remarks = $request->edsremarks;
        $phoneno = $request->edsphoneno;
        $approval_status = $request->edsapproval_status;
        $remarks = $request->edsremarks;
if($request->hasFile('edsphoto'))
{
$FileName = Input::file('edsphoto')->getClientOriginalName();
$file=$request->file('edsphoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
}
if($request->hasFile('edsphoto'))
{
        $photo = Input::file('edsphoto')->getClientOriginalName();
        $cd = new tbl_dysecretary_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                'photo'=> $photo
                ]);

        $edit_id4 = $request->edit_id4;
        $ro_id =  tbl_dysecretary_detail::where('id', $edit_id4 )->value('ro_id');   
        $picid =  tbl_dysecretary_detail::where('ro_id', $ro_id )->where('new_dysecretary',1)->orderBy('id', 'desc')->value('id');
         $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dsd,
                'applicantid' => $picid,        
                'doc_path' => $path
            ]);
            }
         }

}
else
{  
        $cd = new tbl_dysecretary_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                ]);
        $edit_id4 = $request->edit_id4;
        $ro_id =  tbl_dysecretary_detail::where('id', $edit_id4 )->value('ro_id');   
        $picid =  tbl_dysecretary_detail::where('ro_id', $ro_id )->where('new_dysecretary',1)->orderBy('id', 'desc')->value('id');
         $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dsd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }
}
        $cd = tbl_dysecretary_detail::all();
        $host =  Auth::user()->role_id;
        if($host == '2')
        {
            $cd = new tbl_dysecretary_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('application.home')->with('success','Deputy Secretary Edit Details has been saved!');
        }
        else
        {
        return redirect()->route('application.home_ro')->with('success','Deputy Secretary Edit Details has been saved!');
        }    
    }
    public function new_treasurer_details_store(Request $request)
    {  
        $ro_id = $request->ro_id;
        $dcd =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $dcd= new tbl_treasurer_detail;
        $dcd->ro_id=$request->ro_id;
        $dcd->name=$request->tname;
        $dcd->dzongkhag=$request->ttype1;
        $dcd->dungkhag=$request->tdungkhag;
        $dcd->gewog=$request->tgewog;
        $dcd->village=$request->tvillage;
        $dcd->houseno=$request->thouseno;
        $dcd->thramno=$request->tthramno;
        $dcd->dob=$request->tdob;
        $dcd->qualification=$request->tqualification;
        $dcd->phoneno=$request->tphoneno;
        $dcd->email=$request->temail;
        $dcd->appdate=$request->tappdate;
        $dcd->new_treasurer=$request->new_treasurer;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $dcd->photo=$file->getClientOriginalName();
        }
        $ro_id = $request->ro_id;        
        $picid =  tbl_treasurer_detail::where('ro_id', $ro_id )->where('new_treasurer',1)->orderBy('id', 'desc')->value('id');
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $td,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         } 
        $dcd->save();                  
        $request->session()->flash('alert-info', 'New Treasurer details Added Successfully');
        return redirect()->route('application.home_ro')->with('success','New Treasurer details has been Saved and sent for Approval!');
    } 
    public function viewtd(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_treasurer_detail::find($id);
            return response()->json($info);
        }
    }
    public function update_td(Request $request)
    {
        $ro_id = $request->ro_id;
        $id = $request->edit_id5;
        $name = $request->tname;
        $dzongkhag = $request->ttype1;
        $dungkhag = $request->tdungkhag;
        $village = $request->tvillage;
        $gewog = $request->tgewog;
        $houseno = $request->thouseno;
        $thramno = $request->tthramno;
        $dob = $request->tdob;
        $qualification = $request->tqualification;
        $email = $request->temail;
        $appdate = $request->tappdate;
        $approval_status = $request->tapproval_status;
        $remarks = $request->tremarks;
        $phoneno = $request->tphoneno;
        $approval_status = $request->tapproval_status;
        $remarks = $request->tremarks;
if($request->hasFile('tphoto'))
{
$FileName = Input::file('tphoto')->getClientOriginalName();
$file=$request->file('tphoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
}
if($request->hasFile('tphoto'))
{
        $photo = Input::file('tphoto')->getClientOriginalName();
        $cd = new tbl_treasurer_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                'photo'=> $photo
                ]);

        $edit_id5 = $request->edit_id5;
        $ro_id =  tbl_treasurer_detail::where('id', $edit_id5 )->value('ro_id');   
        $picid =  tbl_treasurer_detail::where('ro_id', $ro_id )->where('new_treasurer',1)->orderBy('id', 'desc')->value('id');
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $td,
                'applicantid' => $picid,        
                'doc_path' => $path
            ]);
            }
         }

}
else
{  
        $cd = new tbl_treasurer_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                ]);
        $edit_id5 = $request->edit_id5;
        $ro_id =  tbl_treasurer_detail::where('id', $edit_id5 )->value('ro_id');   
        $picid =  tbl_treasurer_detail::where('ro_id', $ro_id )->where('new_treasurer',1)->orderBy('id', 'desc')->value('id');
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $td,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }
}
        $cd = tbl_treasurer_detail::all();
        $host =  Auth::user()->role_id;
        if($host == '2')
        {
            $cd = new tbl_treasurer_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('application.home')->with('success','Treasurer Edit Details has been saved!');
        }
        else
        {
        return redirect()->route('application.home_ro')->with('success','Treasurer Edit Details has been saved!');
        }    
    } 

//////////////////////DZONGKHA////////////////////
    public function infoupdate_home_dzo()
    {
       $app =  tbl_info_update::orderBy('id', 'desc')->get(); 
       return view('application.information_update.infoupdate_home_dzo', compact('app'));
    }
    public function update_ro_info_dzo($ro_id)
    {
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->where('approval_status','1')->limit(1)->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->where('approval_status','1')->limit(1)->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->where('approval_status','1')->limit(1)->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->where('approval_status','1')->limit(1)->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->where('approval_status','1')->limit(1)->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
$x =  tbl_info_update::where('ro_id', $ro_id)->orderBy('id', 'desc')->limit(1)->get();       
$xcount = count(tbl_info_update::where('ro_id', $ro_id)->orderBy('id', 'desc')->limit(1)->get());

       return view('application.information_update.update_ro_info_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd','x','xcount'));   
    }



//NEW INFORMATION DZONGKHA//  

public function cd_review_dzo($id)
    {        
       $id = $id;
       $app =  tbl_chairman_detail::where('id',$id)->get();
       $doc= tbl_register_document::where('applicantid', $id )->get();
       return view('application.new_information.cd_review_dzo',compact('app','id','doc'));
    }
public function approve_cd_dzo(Request $request,$id)
    {
        $id = $id;
        $ro_id =  tbl_chairman_detail::where('id', $id )->value('ro_id');
        $approval_status=$request->approval_status;
        $remarks=$request->remarks;


          $cd = new tbl_chairman_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('newinfo_cro_home_dzo')->with('success','Assessment Decision Save Successfully!');
    }
public function dcd_review_dzo($id)
    {        
       $id = $id;
       $app =  tbl_dychairman_detail::where('id',$id)->get();
       $doc= tbl_register_document::where('applicantid', $id )->get();
       return view('application.new_information.dcd_review_dzo',compact('app','id','doc'));
    } 
public function approve_dcd_dzo(Request $request,$id)
    {
        $id = $id;
        $ro_id =  tbl_dychairman_detail::where('id', $id )->value('ro_id');
        $approval_status=$request->approval_status;
        $remarks=$request->remarks;


          $cd = new tbl_dychairman_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('newinfo_cro_home_dzo')->with('success','Assessment Decision Save Successfully!');
    }   
public function sd_review_dzo($id)
    {        
       $id = $id;
       $app =  tbl_secretary_detail::where('id',$id)->get();
       $doc= tbl_register_document::where('applicantid', $id )->get();
       return view('application.new_information.sd_review_dzo',compact('app','id','doc'));
    } 
public function approve_sd_dzo(Request $request,$id)
    {
        $id = $id;
        $ro_id =  tbl_secretary_detail::where('id', $id )->value('ro_id');
        $approval_status=$request->approval_status;
        $remarks=$request->remarks;


          $cd = new tbl_secretary_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('newinfo_cro_home_dzo')->with('success','Assessment Decision Save Successfully!');
    }   
public function dsd_review_dzo($id)
    {        
       $id = $id;
       $app =  tbl_dysecretary_detail::where('id',$id)->get();
       $doc= tbl_register_document::where('applicantid', $id )->get();
       return view('application.new_information.dsd_review_dzo',compact('app','id','doc'));
    } 
public function approve_dsd_dzo(Request $request,$id)
    {
        $id = $id;
        $ro_id =  tbl_dysecretary_detail::where('id', $id )->value('ro_id');
        $approval_status=$request->approval_status;
        $remarks=$request->remarks;


          $cd = new tbl_dysecretary_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('newinfo_cro_home_dzo')->with('success','Assessment Decision Save Successfully!');
    }  
public function td_review_dzo($id)
    {        
       $id = $id;
       $app =  tbl_treasurer_detail::where('id',$id)->get();
       $doc= tbl_register_document::where('applicantid', $id )->get();
       return view('application.new_information.td_review_dzo',compact('app','id','doc'));
    } 
public function approve_td_dzo(Request $request,$id)
    {
        $id = $id;
        $ro_id =  tbl_treasurer_detail::where('id', $id )->value('ro_id');
        $approval_status=$request->approval_status;
        $remarks=$request->remarks;


          $cd = new tbl_treasurer_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('newinfo_cro_home_dzo')->with('success','Assessment Decision Save Successfully!');
    }   


    public function new_information_dzo($ro_id)
    {
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }  
    public function viewcd_dzo(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_chairman_detail::find($id);
            return response()->json($info);
        }
    } 
    public function new_chairman_details_store_dzo(Request $request)
    {  
        $ro_id = $request->ro_id;
        $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $pe= new tbl_chairman_detail;
        $pe->ro_id=$request->ro_id;
        $pe->name=$request->name;
        $pe->dzongkhag=$request->type1;
        $pe->dungkhag=$request->dungkhag;
        $pe->gewog=$request->gewog;
        $pe->village=$request->village;
        $pe->houseno=$request->houseno;
        $pe->thramno=$request->thramno;
        $pe->dob=$request->dob;
        $pe->qualification=$request->qualification;
        $pe->phoneno=$request->phoneno;
        $pe->email=$request->email;
        $pe->appdate=$request->appdate;
        $pe->new_chairman=$request->new_chairman;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $pe->photo=$file->getClientOriginalName();
        }
        $pe->save();   
        $ro_id = $request->ro_id;        
        $picid =  tbl_chairman_detail::where('ro_id', $ro_id )->where('new_chairman',1)->orderBy('id', 'desc')->value('id');
         $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $cd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }                    
        $request->session()->flash('alert-info', 'New Chairman details Added Successfully');
        return redirect()->route('application.home_ro_dzo')->with('success','New Chairman details has been Saved and sent for Approval!');
    }  
    public function newinfo_cro_home_dzo()
    {
        $app =  tbl_chairman_detail::where('new_chairman','1' AND 'approval_status','0')->orderBy('id', 'desc')->get();
        $dcd =  tbl_dychairman_detail::where('new_dychairman','1' AND 'approval_status','0')->orderBy('id', 'desc')->get();
        $sd =  tbl_secretary_detail::where('new_secretary','1' AND 'approval_status','0')->orderBy('id', 'desc')->get(); 
        $dsd =  tbl_dysecretary_detail::where('new_dysecretary','1' AND 'approval_status','0')->orderBy('id', 'desc')->get();
        $td =  tbl_treasurer_detail::where('new_treasurer','1' AND 'approval_status','0')->orderBy('id', 'desc')->get(); 
       return view('application.new_information.newinfo_cro_home_dzo', compact('app','dcd','sd','dsd','td'));
    } 
   
    public function update_cd_dzo(Request $request)
     {
        $ro_id = $request->ro_id;
        $id = $request->edit_id;
        $name = $request->ename;
        $dzongkhag = $request->etype1;
        $dungkhag = $request->edungkhag;
        $village = $request->evillage;
        $gewog = $request->egewog;
        $houseno = $request->ehouseno;
        $thramno = $request->ethramno;
        $dob = $request->edob;
        $qualification = $request->equalification;
        $email = $request->eemail;
        $appdate = $request->eappdate;
        $approval_status = $request->eapproval_status;
        $remarks = $request->eremarks;
        $phoneno = $request->ephoneno;

if($request->hasFile('ephoto'))
{
$FileName = Input::file('ephoto')->getClientOriginalName();
$file=$request->file('ephoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
}
if($request->hasFile('ephoto'))
{
        $photo = Input::file('ephoto')->getClientOriginalName();
        $cd = new tbl_chairman_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                'photo'=> $photo
                ]);

        $edit_id = $request->edit_id;
        $ro_id =  tbl_chairman_detail::where('id', $edit_id )->value('ro_id');   
        $picid =  tbl_chairman_detail::where('ro_id', $ro_id )->where('new_chairman',1)->orderBy('id', 'desc')->value('id');
         $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $cd,
                'applicantid' => $picid,        
                'doc_path' => $path
            ]);
            }
         }

}
else
{  
        $cd = new tbl_chairman_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                ]);
        $edit_id = $request->edit_id;
        $ro_id =  tbl_chairman_detail::where('id', $edit_id )->value('ro_id');   
        $picid =  tbl_chairman_detail::where('ro_id', $ro_id )->where('new_chairman',1)->orderBy('id', 'desc')->value('id');
         $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $cd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }
}


        $cd = tbl_chairman_detail::all();

        $host =  Auth::user()->role_id;
        if($host == '2')
        {
            $cd = new tbl_chairman_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('application.home_dzo')->with('success','Chairman Edit Details has been saved!');
        }
        else
        {
        return redirect()->route('application.home_ro_dzo')->with('success','Chairman Edit Details has been saved!');
        }    
    }
    public function new_dychairman_details_store_dzo(Request $request)
    {  
        $ro_id = $request->ro_id;
        $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $dcd= new tbl_dychairman_detail;
        $dcd->ro_id=$request->ro_id;
        $dcd->name=$request->dcname;
        $dcd->dzongkhag=$request->dctype1;
        $dcd->dungkhag=$request->dcdungkhag;
        $dcd->gewog=$request->dcgewog;
        $dcd->village=$request->dcvillage;
        $dcd->houseno=$request->dchouseno;
        $dcd->thramno=$request->dcthramno;
        $dcd->dob=$request->dcdob;
        $dcd->qualification=$request->dcqualification;
        $dcd->phoneno=$request->dcphoneno;
        $dcd->email=$request->dcemail;
        $dcd->appdate=$request->dcappdate;
        $dcd->new_dychairman=$request->new_dychairman;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $dcd->photo=$file->getClientOriginalName();
        }
        $dcd->save();  
        $ro_id = $request->ro_id;        
        $picid =  tbl_dychairman_detail::where('ro_id', $ro_id )->where('new_dychairman',1)->orderBy('id', 'desc')->value('id');
         $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dcd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }   
        $request->session()->flash('alert-info', 'New Deputy Chairman details Added Successfully');
        return redirect()->route('application.home_ro_dzo')->with('success','New Deputy Chairman details has been Saved and sent for Approval!');
    }
    public function viewdcd_dzo(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_dychairman_detail::find($id);
            return response()->json($info);
        }
    }
    public function update_dcd_dzo(Request $request)
     {
        $ro_id = $request->ro_id;
        $id = $request->edit_id2;
        $name = $request->edcname;
        $dzongkhag = $request->edctype1;
        $dungkhag = $request->edcdungkhag;
        $village = $request->edcvillage;
        $gewog = $request->edcgewog;
        $houseno = $request->edchouseno;
        $thramno = $request->edcthramno;
        $dob = $request->edcdob;
        $qualification = $request->edcqualification;
        $email = $request->edcemail;
        $appdate = $request->edcappdate;
        $approval_status = $request->edcapproval_status;
        $remarks = $request->edcremarks;
        $phoneno = $request->edcphoneno;
        $approval_status = $request->edcapproval_status;
        $remarks = $request->edcremarks;

if($request->hasFile('edcphoto'))
{
$FileName = Input::file('edcphoto')->getClientOriginalName();
$file=$request->file('edcphoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
}
if($request->hasFile('edcphoto'))
{
        $photo = Input::file('edcphoto')->getClientOriginalName();
        $cd = new tbl_dychairman_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                'photo'=> $photo
                ]);

        $edit_id2 = $request->edit_id2;
        $ro_id =  tbl_dychairman_detail::where('id', $edit_id2 )->value('ro_id');   
        $picid =  tbl_dychairman_detail::where('ro_id', $ro_id )->where('new_dychairman',1)->orderBy('id', 'desc')->value('id');
         $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dcd,
                'applicantid' => $picid,        
                'doc_path' => $path
            ]);
            }
         }

}
else
{  
        $cd = new tbl_dychairman_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                ]);
        $edit_id2 = $request->edit_id2;
        $ro_id =  tbl_dychairman_detail::where('id', $edit_id2 )->value('ro_id');   
        $picid =  tbl_dychairman_detail::where('ro_id', $ro_id )->where('new_dychairman',1)->orderBy('id', 'desc')->value('id');
         $dcd = 'dcd';
         if($request->dcd != 0){
         foreach ($request->dcd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dcd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }
}
        $cd = tbl_dychairman_detail::all();
        $host =  Auth::user()->role_id;
        if($host == '2')
        {
            $cd = new tbl_dychairman_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('application.home_dzo')->with('success','Chairman Edit Details has been saved!');
        }
        else
        {
        return redirect()->route('application.home_ro_dzo')->with('success','Chairman Edit Details has been saved!');
        }  
    }
    public function new_secretary_details_store_dzo(Request $request)
    {  
        $ro_id = $request->ro_id;
        $dcd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $dcd= new tbl_secretary_detail;
        $dcd->ro_id=$request->ro_id;
        $dcd->name=$request->sname;
        $dcd->dzongkhag=$request->stype1;
        $dcd->dungkhag=$request->sdungkhag;
        $dcd->gewog=$request->sgewog;
        $dcd->village=$request->svillage;
        $dcd->houseno=$request->shouseno;
        $dcd->thramno=$request->sthramno;
        $dcd->dob=$request->sdob;
        $dcd->qualification=$request->squalification;
        $dcd->phoneno=$request->sphoneno;
        $dcd->email=$request->semail;
        $dcd->appdate=$request->sappdate;
        $dcd->new_secretary=$request->new_secretary;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $dcd->photo=$file->getClientOriginalName();
        }
        $dcd->save();   
        $ro_id = $request->ro_id;        
        $picid =  tbl_secretary_detail::where('ro_id', $ro_id )->where('new_secretary',1)->orderBy('id', 'desc')->value('id');
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $sd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }                  
        $request->session()->flash('alert-info', 'New Secretary details Added Successfully');
        return redirect()->route('application.home_ro_dzo')->with('success','New Secretary details has been Saved and sent for Approval!');
    }
    public function viewsd_dzo(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_secretary_detail::find($id);
            return response()->json($info);
        }
    }
     public function update_sd_dzo(Request $request)
     {
        $ro_id = $request->ro_id;
        $id = $request->edit_id3;
        $name = $request->esname;
        $dzongkhag = $request->estype1;
        $dungkhag = $request->esdungkhag;
        $village = $request->esvillage;
        $gewog = $request->esgewog;
        $houseno = $request->eshouseno;
        $thramno = $request->esthramno;
        $dob = $request->esdob;
        $qualification = $request->esqualification;
        $email = $request->esemail;
        $appdate = $request->esappdate;
        $approval_status = $request->esapproval_status;
        $remarks = $request->esremarks;
        $phoneno = $request->esphoneno;
        $approval_status = $request->esapproval_status;
        $remarks = $request->esremarks;
        if($request->hasFile('esphoto'))
{
$FileName = Input::file('esphoto')->getClientOriginalName();
$file=$request->file('esphoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
}
if($request->hasFile('esphoto'))
{
        $photo = Input::file('esphoto')->getClientOriginalName();
        $cd = new tbl_secretary_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                'photo'=> $photo
                ]);

        $edit_id3 = $request->edit_id3;
        $ro_id =  tbl_secretary_detail::where('id', $edit_id3 )->value('ro_id');   
        $picid =  tbl_secretary_detail::where('ro_id', $ro_id )->where('new_secretary',1)->orderBy('id', 'desc')->value('id');
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $sd,
                'applicantid' => $picid,        
                'doc_path' => $path
            ]);
            }
         }

}
else
{  
        $cd = new tbl_secretary_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                ]);
        $edit_id3 = $request->edit_id3;
        $ro_id =  tbl_secretary_detail::where('id', $edit_id3 )->value('ro_id');   
        $picid =  tbl_secretary_detail::where('ro_id', $ro_id )->where('new_secretary',1)->orderBy('id', 'desc')->value('id');
         $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $sd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }
}
        $cd = tbl_secretary_detail::all();
        $host =  Auth::user()->role_id;
        if($host == '2')
        {
            $cd = new tbl_secretary_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('application.home_dzo')->with('success','Secretary Edit Details has been saved!');
        }
        else
        {
        return redirect()->route('application.home_ro_dzo')->with('success','Secretary Edit Details has been saved!');
        }    
    }
     public function new_dysecretary_details_store_dzo(Request $request)
    {  
        $ro_id = $request->ro_id;
        $dcd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $dcd= new tbl_dysecretary_detail;
        $dcd->ro_id=$request->ro_id;
        $dcd->name=$request->dsname;
        $dcd->dzongkhag=$request->dstype1;
        $dcd->dungkhag=$request->dsdungkhag;
        $dcd->gewog=$request->dsgewog;
        $dcd->village=$request->dsvillage;
        $dcd->houseno=$request->dshouseno;
        $dcd->thramno=$request->dsthramno;
        $dcd->dob=$request->dsdob;
        $dcd->qualification=$request->dsqualification;
        $dcd->phoneno=$request->dsphoneno;
        $dcd->email=$request->dsemail;
        $dcd->appdate=$request->dsappdate;
        $dcd->new_dysecretary=$request->new_dysecretary;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $dcd->photo=$file->getClientOriginalName();
        }
        $ro_id = $request->ro_id;        
        $picid =  tbl_dysecretary_detail::where('ro_id', $ro_id )->where('new_dysecretary',1)->orderBy('id', 'desc')->value('id');
         $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dsd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         } 
        $dcd->save();                  
        $request->session()->flash('alert-info', 'New Deputy Secretary details Added Successfully');
        return redirect()->route('application.home_ro_dzo')->with('success','New Deputy Secretary details has been Saved and sent for Approval!');
    }
    public function viewdsd_dzo(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_dysecretary_detail::find($id);
            return response()->json($info);
        }
    }
    public function update_dsd_dzo(Request $request)
    {
        $ro_id = $request->ro_id;
        $id = $request->edit_id4;
        $name = $request->edsname;
        $dzongkhag = $request->edstype1;
        $dungkhag = $request->edsdungkhag;
        $village = $request->edsvillage;
        $gewog = $request->edsgewog;
        $houseno = $request->edshouseno;
        $thramno = $request->edsthramno;
        $dob = $request->edsdob;
        $qualification = $request->edsqualification;
        $email = $request->edsemail;
        $appdate = $request->edsappdate;
        $approval_status = $request->edsapproval_status;
        $remarks = $request->edsremarks;
        $phoneno = $request->edsphoneno;
        $approval_status = $request->edsapproval_status;
        $remarks = $request->edsremarks;
if($request->hasFile('edsphoto'))
{
$FileName = Input::file('edsphoto')->getClientOriginalName();
$file=$request->file('edsphoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
}
if($request->hasFile('edsphoto'))
{
        $photo = Input::file('edsphoto')->getClientOriginalName();
        $cd = new tbl_dysecretary_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                'photo'=> $photo
                ]);

        $edit_id4 = $request->edit_id4;
        $ro_id =  tbl_dysecretary_detail::where('id', $edit_id4 )->value('ro_id');   
        $picid =  tbl_dysecretary_detail::where('ro_id', $ro_id )->where('new_dysecretary',1)->orderBy('id', 'desc')->value('id');
         $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dsd,
                'applicantid' => $picid,        
                'doc_path' => $path
            ]);
            }
         }

}
else
{  
        $cd = new tbl_dysecretary_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                ]);
        $edit_id4 = $request->edit_id4;
        $ro_id =  tbl_dysecretary_detail::where('id', $edit_id4 )->value('ro_id');   
        $picid =  tbl_dysecretary_detail::where('ro_id', $ro_id )->where('new_dysecretary',1)->orderBy('id', 'desc')->value('id');
         $dsd = 'dsd';
         if($request->dsd != 0){
         foreach ($request->dsd as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $dsd,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }
}
        $cd = tbl_dysecretary_detail::all();
        $host =  Auth::user()->role_id;
        if($host == '2')
        {
            $cd = new tbl_dysecretary_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('application.home_dzo')->with('success','Deputy Secretary Edit Details has been saved!');
        }
        else
        {
        return redirect()->route('application.home_ro_dzo')->with('success','Deputy Secretary Edit Details has been saved!');
        }    
    }
     public function new_treasurer_details_store_dzo(Request $request)
    {  
        $ro_id = $request->ro_id;
        $dcd =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
        $dcd= new tbl_treasurer_detail;
        $dcd->ro_id=$request->ro_id;
        $dcd->name=$request->tname;
        $dcd->dzongkhag=$request->ttype1;
        $dcd->dungkhag=$request->tdungkhag;
        $dcd->gewog=$request->tgewog;
        $dcd->village=$request->tvillage;
        $dcd->houseno=$request->thouseno;
        $dcd->thramno=$request->tthramno;
        $dcd->dob=$request->tdob;
        $dcd->qualification=$request->tqualification;
        $dcd->phoneno=$request->tphoneno;
        $dcd->email=$request->temail;
        $dcd->appdate=$request->tappdate;
        $dcd->new_treasurer=$request->new_treasurer;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $dcd->photo=$file->getClientOriginalName();
        }
        $ro_id = $request->ro_id;        
        $picid =  tbl_treasurer_detail::where('ro_id', $ro_id )->where('new_treasurer',1)->orderBy('id', 'desc')->value('id');
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $td,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         } 
        $dcd->save();                  
        $request->session()->flash('alert-info', 'New Treasurer details Added Successfully');
        return redirect()->route('application.home_ro_dzo')->with('success','New Treasurer details has been Saved and sent for Approval!');
    } 
    public function viewtd_dzo(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_treasurer_detail::find($id);
            return response()->json($info);
        }
    }
    public function update_td_dzo(Request $request)
    {
        $ro_id = $request->ro_id;
        $id = $request->edit_id5;
        $name = $request->tname;
        $dzongkhag = $request->ttype1;
        $dungkhag = $request->tdungkhag;
        $village = $request->tvillage;
        $gewog = $request->tgewog;
        $houseno = $request->thouseno;
        $thramno = $request->tthramno;
        $dob = $request->tdob;
        $qualification = $request->tqualification;
        $email = $request->temail;
        $appdate = $request->tappdate;
        $approval_status = $request->tapproval_status;
        $remarks = $request->tremarks;
        $phoneno = $request->tphoneno;
        $approval_status = $request->tapproval_status;
        $remarks = $request->tremarks;
if($request->hasFile('tphoto'))
{
$FileName = Input::file('tphoto')->getClientOriginalName();
$file=$request->file('tphoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
}
if($request->hasFile('tphoto'))
{
        $photo = Input::file('tphoto')->getClientOriginalName();
        $cd = new tbl_treasurer_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                'photo'=> $photo
                ]);

        $edit_id5 = $request->edit_id5;
        $ro_id =  tbl_treasurer_detail::where('id', $edit_id5 )->value('ro_id');   
        $picid =  tbl_treasurer_detail::where('ro_id', $ro_id )->where('new_treasurer',1)->orderBy('id', 'desc')->value('id');
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $td,
                'applicantid' => $picid,        
                'doc_path' => $path
            ]);
            }
         }

}
else
{  
        $cd = new tbl_treasurer_detail;
        $cd::where('id',$id)
            ->update([
                'name' => $name,
                'dzongkhag'=> $dzongkhag,
                'dungkhag'=> $dungkhag,
                'village'=> $village,
                'gewog'=> $gewog,
                'houseno'=> $houseno,
                'thramno'=> $thramno,
                'dob'=> $dob,
                'qualification'=> $qualification,
                'email'=> $email,
                'phoneno'=> $phoneno,
                'appdate'=> $appdate,
                ]);
        $edit_id5 = $request->edit_id5;
        $ro_id =  tbl_treasurer_detail::where('id', $edit_id5 )->value('ro_id');   
        $picid =  tbl_treasurer_detail::where('ro_id', $ro_id )->where('new_treasurer',1)->orderBy('id', 'desc')->value('id');
         $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('register_documents');
            tbl_register_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $ro_id,
                'filecat' => $td,
                'applicantid' => $picid,
                'doc_path' => $path
            ]);
            }
         }
}
        $cd = tbl_treasurer_detail::all();
        $host =  Auth::user()->role_id;
        if($host == '2')
        {
            $cd = new tbl_treasurer_detail;
            $cd::where('id',$id)
            ->update([
            'approval_status' => $approval_status,
            'remarks'=> $remarks
            ]);

            $cd = new tbl_ro_detail;
            $cd::where('ro_id',$ro_id)->orderby('id','desc')->limit(1)
            ->update([
            'updated_at' => date('Y-m-d')
            ]);
        return redirect()->route('application.home_dzo')->with('success','Treasurer Edit Details has been saved!');
        }
        else
        {
        return redirect()->route('application.home_ro_dzo')->with('success','Treasurer Edit Details has been saved!');
        }    
    } 


    public function change_ro_info_dzo(Request $request,$ro_id)
    {
        $ro_id = $ro_id;
        $up = new tbl_info_update;
        $up->ro_id=$request->ro_id;
        $up->name=$request->ro_name;
        $up->dzongkhag=$request->type;
        $up->location=$request->location; 
        $up->postbox=$request->postbox; 
        $up->phone=$request->phone;
        $up->email=$request->email;
       
        $up->c_name=$request->cname;
        $up->c_dzongkhag=$request->ctype1;
        $up->c_village=$request->cvillage; 
        $up->c_gewog=$request->cgewog; 
        $up->c_dungkhag=$request->cdungkhag;
        $up->c_houseno=$request->chouseno;
        $up->c_thramno=$request->cthramno;
        $up->c_dob=$request->cdob;
        $up->c_qualification=$request->cqualification;
        $up->c_phoneno=$request->cphoneno;
        $up->c_email=$request->cemail;
        $up->c_appdate=$request->cappdate;

if($request->hasFile('ephoto'))
{
$FileName = Input::file('ephoto')->getClientOriginalName();
$file=$request->file('ephoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photo = Input::file('ephoto')->getClientOriginalName();
$up->c_photo=$photo;
}

       
        $up->dc_name=$request->dc_name;
        $up->dc_dzongkhag=$request->dc_type1;
        $up->dc_village=$request->dc_village; 
        $up->dc_gewog=$request->dc_gewog; 
        $up->dc_dungkhag=$request->dc_dungkhag;
        $up->dc_houseno=$request->dc_houseno;
        $up->dc_thramno=$request->dc_thramno;
        $up->dc_dob=$request->dc_dob;
        $up->dc_qualification=$request->dc_qualification;
        $up->dc_phoneno=$request->dc_phoneno;
        $up->dc_email=$request->dc_email;
        $up->dc_appdate=$request->dc_appdate;

if($request->hasFile('ephotodc'))
{
$FileName = Input::file('ephotodc')->getClientOriginalName();
$file=$request->file('ephotodc');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photodc = Input::file('ephotodc')->getClientOriginalName();
$up->dc_photo=$photodc;
}

       
        $up->s_name=$request->s_name;
        $up->s_dzongkhag=$request->s_type1;
        $up->s_village=$request->s_village; 
        $up->s_gewog=$request->s_gewog; 
        $up->s_dungkhag=$request->s_dungkhag;
        $up->s_houseno=$request->s_houseno;
        $up->s_thramno=$request->s_thramno;
        $up->s_dob=$request->s_dob;
        $up->s_qualification=$request->s_qualification;
        $up->s_phoneno=$request->s_phoneno;
        $up->s_email=$request->s_email;
        $up->s_appdate=$request->s_appdate;


if($request->hasFile('ephotos'))
{
$FileName = Input::file('ephotos')->getClientOriginalName();
$file=$request->file('ephotos');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photos = Input::file('ephotos')->getClientOriginalName();
$up->s_photo=$photos;
}

        
        $up->ds_name=$request->ds_name;
        $up->ds_dzongkhag=$request->ds_type1;
        $up->ds_village=$request->ds_village; 
        $up->ds_gewog=$request->ds_gewog; 
        $up->ds_dungkhag=$request->ds_dungkhag;
        $up->ds_houseno=$request->ds_houseno;
        $up->ds_thramno=$request->ds_thramno;
        $up->ds_dob=$request->ds_dob;
        $up->ds_qualification=$request->ds_qualification;
        $up->ds_phoneno=$request->ds_phoneno;
        $up->ds_email=$request->ds_email;
        $up->ds_appdate=$request->ds_appdate;


if($request->hasFile('ephotods'))
{
$FileName = Input::file('ephotods')->getClientOriginalName();
$file=$request->file('ephotods');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photods = Input::file('ephotods')->getClientOriginalName();
$up->ds_photo=$photods;
}

       
        $up->t_name=$request->td_name;
        $up->t_dzongkhag=$request->td_type1;
        $up->t_village=$request->td_village; 
        $up->t_gewog=$request->td_gewog; 
        $up->t_dungkhag=$request->td_dungkhag;
        $up->t_houseno=$request->td_houseno;
        $up->t_thramno=$request->td_thramno;
        $up->t_dob=$request->td_dob;
        $up->t_qualification=$request->td_qualification;
        $up->t_phoneno=$request->td_phoneno;
        $up->t_email=$request->td_email;
        $up->t_appdate=$request->td_appdate;


if($request->hasFile('ephotot'))
{
$FileName = Input::file('ephotot')->getClientOriginalName();
$file=$request->file('ephotot');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photot = Input::file('ephotot')->getClientOriginalName();
$up->t_photo=$photot;
}



        $up->host=Auth::user()->organization;
        $up->updated_by=Auth::user()->id;
        $up->updated_at=date('Y-m-d');
        $up->save();
        $request->session()->flash('alert-info', 'Details Saved Successfully');
        return redirect()->route('update_ro_info_dzo',$ro_id)->with('success','Updated Details has been Sent for Review!');
    }    
    public function view_updateinfo_details_dzo($ro_id)
    {
       $ro_id = $ro_id;
       $app =  tbl_info_update::where('ro_id', $ro_id)->orderBy('id', 'desc')->limit(1)->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.information_update.updateinfo_edit_dzo', compact('ro_id','app','rd'));
    } 
    public function approve_updatedinfo_dzo(Request $request,$ro_id)
    {
        $ro_id = $ro_id;
        $cda = tbl_info_update::where('ro_id', $ro_id)->value('ro_id'); 
        $cda = tbl_info_update::where('ro_id', $ro_id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_by=Auth::user()->id;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $request->session()->flash('alert-info', 'Assessment Successful');
        return redirect()->route('view_updateinfo_details_dzo',$ro_id)->with('success','Assessment of RO has been saved!');
    } 

 public function delete_photo_dzo($id,$ro_id)
    {
        $me = new tbl_info_update;
        $me::where('id', $id)
         ->update([
                'c_photo'=> ''
                ]);
       $ro_id = $ro_id;
       return redirect()->route('view_updateinfo_details_dzo',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
    public function delete_photodc_dzo($id,$ro_id)
    {
        $me = new tbl_info_update;
        $me::where('id', $id)
         ->update([
                'dc_photo'=> ''
                ]);
       $ro_id = $ro_id;
       return redirect()->route('view_updateinfo_details_dzo',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
    public function delete_photos_dzo($id,$ro_id)
    {
        $me = new tbl_info_update;
        $me::where('id', $id)
         ->update([
                's_photo'=> ''
                ]);
       $ro_id = $ro_id;
       return redirect()->route('view_updateinfo_details_dzo',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
    public function delete_photods_dzo($id,$ro_id)
    {
        $me = new tbl_info_update;
        $me::where('id', $id)
         ->update([
                'ds_photo'=> ''
                ]);
       $ro_id = $ro_id;
       return redirect()->route('view_updateinfo_details_dzo',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
    public function delete_photot_dzo($id,$ro_id)
    {
        $me = new tbl_info_update;
        $me::where('id', $id)
         ->update([
                't_photo'=> ''
                ]);
       $ro_id = $ro_id;
       return redirect()->route('view_updateinfo_details_dzo',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
 
    public function updateinfo_edit_dzo(Request $request,$ro_id)
    {
        $host = Auth::user()->organization;
        $ro_id = $ro_id;
        $upinfo = tbl_info_update::where('ro_id', $ro_id)->value('ro_id'); 
        $upinfo = tbl_info_update::where('ro_id', $ro_id)->firstOrFail();

        $upinfo->ro_id=$request->ro_id;
        $upinfo->name=$request->ro_name;
        $upinfo->dzongkhag=$request->type;
        $upinfo->location=$request->location; 
        $upinfo->postbox=$request->postbox; 
        $upinfo->phone=$request->phone;
        $upinfo->email=$request->email;
       
        $upinfo->c_name=$request->cname;
        $upinfo->c_dzongkhag=$request->ctype1;
        $upinfo->c_village=$request->cvillage; 
        $upinfo->c_gewog=$request->cgewog; 
        $upinfo->c_dungkhag=$request->cdungkhag;
        $upinfo->c_houseno=$request->chouseno;
        $upinfo->c_thramno=$request->cthramno;
        $upinfo->c_dob=$request->cdob;
        $upinfo->c_qualification=$request->cqualification;
        $upinfo->c_phoneno=$request->cphoneno;
        $upinfo->c_email=$request->cemail;
        $upinfo->c_appdate=$request->cappdate;

if($request->hasFile('ephoto'))
{
$FileName = Input::file('ephoto')->getClientOriginalName();
$file=$request->file('ephoto');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photo = Input::file('ephoto')->getClientOriginalName();
$upinfo->c_photo=$photo;
}


       
        $upinfo->dc_name=$request->dc_name;
        $upinfo->dc_dzongkhag=$request->dc_type1;
        $upinfo->dc_village=$request->dc_village; 
        $upinfo->dc_gewog=$request->dc_gewog; 
        $upinfo->dc_dungkhag=$request->dc_dungkhag;
        $upinfo->dc_houseno=$request->dc_houseno;
        $upinfo->dc_thramno=$request->dc_thramno;
        $upinfo->dc_dob=$request->dc_dob;
        $upinfo->dc_qualification=$request->dc_qualification;
        $upinfo->dc_phoneno=$request->dc_phoneno;
        $upinfo->dc_email=$request->dc_email;
        $upinfo->dc_appdate=$request->dc_appdate;

if($request->hasFile('ephotodc'))
{
$FileName = Input::file('ephotodc')->getClientOriginalName();
$file=$request->file('ephotodc');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photodc = Input::file('ephotodc')->getClientOriginalName();
$upinfo->dc_photo=$photodc;
} 

       
        $upinfo->s_name=$request->s_name;
        $upinfo->s_dzongkhag=$request->s_type1;
        $upinfo->s_village=$request->s_village; 
        $upinfo->s_gewog=$request->s_gewog; 
        $upinfo->s_dungkhag=$request->s_dungkhag;
        $upinfo->s_houseno=$request->s_houseno;
        $upinfo->s_thramno=$request->s_thramno;
        $upinfo->s_dob=$request->s_dob;
        $upinfo->s_qualification=$request->s_qualification;
        $upinfo->s_phoneno=$request->s_phoneno;
        $upinfo->s_email=$request->s_email;
        $upinfo->s_appdate=$request->s_appdate;

if($request->hasFile('ephotos'))
{
$FileName = Input::file('ephotos')->getClientOriginalName();
$file=$request->file('ephotos');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photos = Input::file('ephotos')->getClientOriginalName();
$upinfo->s_photo=$photos;
}
        
        $upinfo->ds_name=$request->ds_name;
        $upinfo->ds_dzongkhag=$request->ds_type1;
        $upinfo->ds_village=$request->ds_village; 
        $upinfo->ds_gewog=$request->ds_gewog; 
        $upinfo->ds_dungkhag=$request->ds_dungkhag;
        $upinfo->ds_houseno=$request->ds_houseno;
        $upinfo->ds_thramno=$request->ds_thramno;
        $upinfo->ds_dob=$request->ds_dob;
        $upinfo->ds_qualification=$request->ds_qualification;
        $upinfo->ds_phoneno=$request->ds_phoneno;
        $upinfo->ds_email=$request->ds_email;
        $upinfo->ds_appdate=$request->ds_appdate;

if($request->hasFile('ephotods'))
{
$FileName = Input::file('ephotods')->getClientOriginalName();
$file=$request->file('ephotods');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photods = Input::file('ephotods')->getClientOriginalName();
$upinfo->ds_photo=$photods;
}

       
        $upinfo->t_name=$request->td_name;
        $upinfo->t_dzongkhag=$request->td_type1;
        $upinfo->t_village=$request->td_village; 
        $upinfo->t_gewog=$request->td_gewog; 
        $upinfo->t_dungkhag=$request->td_dungkhag;
        $upinfo->t_houseno=$request->td_houseno;
        $upinfo->t_thramno=$request->td_thramno;
        $upinfo->t_dob=$request->td_dob;
        $upinfo->t_qualification=$request->td_qualification;
        $upinfo->t_phoneno=$request->td_phoneno;
        $upinfo->t_email=$request->td_email;
        $upinfo->t_appdate=$request->td_appdate;

if($request->hasFile('ephotot'))
{
$FileName = Input::file('ephotot')->getClientOriginalName();
$file=$request->file('ephotot');
$file->move(public_path().'/images/',$file->getClientOriginalName());
$photot = Input::file('ephotot')->getClientOriginalName();
$upinfo->t_photo=$photot;
}


        $upinfo->host=$host;
        $upinfo->updated_by=Auth::user()->id;
        $upinfo->updated_at=date('Y-m-d');
        $upinfo->save();
        $request->session()->flash('alert-info', 'Details Reviewed Successfully');
        return redirect()->route('view_updateinfo_details_dzo',$ro_id)->with('success','Updated Details has been Reviewed!');
    }
    public function infoupdate_home_ro_dzo()
    {
       $app =  tbl_info_update::orderBy('id', 'desc')->get();
       $app2 =  tbl_info_update::where('host', Auth::user()->organization)->orderBy('id', 'desc')->get(); 
       return view('application.information_update.infoupdate_home_ro_dzo', compact('app','app2'));
    }


    public function delete_cd_dzo($id,$ro_id)
    {
        $me = new tbl_register_document;
        $me::where('id', $id)->delete();
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
     public function delete_pp_dzo($id,$ro_id)
    {
        $me = new tbl_dychairman_detail;
        $me::where('id', $id)
         ->update([
                'photo'=> ''
                ]);
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
     public function delete_ppc_dzo($id,$ro_id)
    {
        $me = new tbl_chairman_detail;
        $me::where('id', $id)
         ->update([
                'photo'=> ''
                ]);
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
     public function delete_pps_dzo($id,$ro_id)
    {
        $me = new tbl_secretary_detail;
        $me::where('id', $id)
         ->update([
                'photo'=> ''
                ]);
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
     public function delete_ppsd_dzo($id,$ro_id)
    {
        $me = new tbl_dysecretary_detail;
        $me::where('id', $id)
         ->update([
                'photo'=> ''
                ]);
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }
     public function delete_ppt_dzo($id,$ro_id)
    {
        $me = new tbl_treasurer_detail;
        $me::where('id', $id)
         ->update([
                'photo'=> ''
                ]);
       $ro_id = $ro_id;
       $app =  tbl_ro_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $cd =  tbl_chairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dcd =  tbl_dychairman_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $sd =  tbl_secretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $dsd =  tbl_dysecretary_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $td =  tbl_treasurer_detail::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       $rd =  tbl_register_document::where('ro_id', $ro_id)->orderBy('id', 'desc')->get();
       return view('application.new_information.new_information_dzo', compact('ro_id','app','cd','dcd','sd','dsd','td','rd'));
    }

}

