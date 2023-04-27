<?php

namespace App\Http\Controllers\Compliant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\tbl_ro_detail;
use App\tbl_agency;
use App\tbl_compliant;
use App\tbl_compliant_doc;
use App\tbl_discipline;
use App\tbl_discipline_doc;
use App\tbl_suspension_doc;
use App\tbl_suspension;
use App\user;
use Session;
use Auth;

use App\Http\Requests\compliant_detailsRequest;
use App\Http\Requests\discipline_actionRequest;
use App\Http\Requests\suspension_orderRequest;

class CompliantController extends Controller
{
   
    public function compliant()
    {
    return view('application.compliant.compliant')->with('success','Compliant Submitted to Chogdey Lhentsho!');
    }
    public function compliant_store(Request $request)
    {        
        $event = new tbl_compliant;      
        $event->ro_name=$request->ro_name;
        $event->subject=$request->subject;
        $event->discription=$request->discription;
        $event->submitted_by=$request->submitted_by;
        $event->phone=$request->phone;
        $event->email=$request->email;
        $event->created_at=date('Y-m-d');
        $event->save(); 
        $compliant_details = 'compliant_details';
         if($request->compliant_details != 0){
         foreach ($request->compliant_details as $file) {
            $path = $file->store('compliant_details');
            tbl_compliant_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $event->id,
                'filecat' => $compliant_details,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('compliant')->with('success','Compliant Submitted to Chogdey Lhentsho!');
    } 
    public function compliant_view()
    {
        $compliant = tbl_compliant::all();
        $compliantdocs = tbl_compliant_doc::all();
        return view('application.compliant.compliant_view',compact('compliant','compliantdocs'));
    } 
    public function complaint_viewdetails($id)
    {
        $id = $id;
        $compliant = tbl_compliant::where('id',$id)->get();
        $compliantdocs = tbl_compliant_doc::where('id',$id)->get();
        return view('application.compliant.complaint_viewdetails',compact('compliant','compliantdocs','id'));
    } 
    
///////DZONGKHA//
    public function compliant_view_dzo()
    {
        $compliant = tbl_compliant::all();
        $compliantdocs = tbl_compliant_doc::all();
        return view('application.compliant.compliant_view_dzo',compact('compliant','compliantdocs'));
    }
    public function complaint_viewdetails_dzo($id)
    {
        $id = $id;
        $compliant = tbl_compliant::where('id',$id)->get();
        $compliantdocs = tbl_compliant_doc::where('id',$id)->get();
        return view('application.compliant.complaint_viewdetails_dzo',compact('compliant','compliantdocs','id'));
    } 
    public function compliant_dzo()
    {
    return view('application.compliant.compliant_dzo')->with('success','Compliant Submitted to Chogdey Lhentsho!');
    }
    public function compliant_store_dzo(Request $request)
    {        
        $event = new tbl_compliant;      
        $event->ro_name=$request->ro_name;
        $event->subject=$request->subject;
        $event->discription=$request->discription;
        $event->submitted_by=$request->submitted_by;
        $event->phone=$request->phone;
        $event->email=$request->email;
        $event->created_at=date('Y-m-d');
        $event->save(); 
        $compliant_details = 'compliant_details';
         if($request->compliant_details != 0){
         foreach ($request->compliant_details as $file) {
            $path = $file->store('compliant_details');
            tbl_compliant_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $event->id,
                'filecat' => $compliant_details,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('compliant_dzo')->with('success','Compliant Submitted to Chogdey Lhentsho!');
    } 
//////DISCIPLINE////
    public function discipline()
    {
    return view('application.discipline.discipline')->with('success','Disciplinary Action Saved!');
    }
    public function discipline_store(Request $request)
    {  
        $host = Auth::user()->organization;      
        $disc = new tbl_discipline;

        $roCheck=$request->roCheck;
        if($roCheck == '')
        {
        $disc->action_against=$request->indiCheck;
        $disc->ro_name=$request->ro_name2;
        $disc->reason=$request->reason2;
        $disc->action=$request->action2;
        $disc->host=$host;
        $disc->created_by=Auth::user()->id;
        $disc->created_at=date('Y-m-d');
        }
        elseif($roCheck != '')
        {
        $disc->action_against=$request->roCheck;
        $disc->ro_name=$request->ro_name;
        $disc->individual_name=$request->individual_name;
        $disc->reason=$request->reason;
        $disc->action=$request->action;
        $disc->host=$host;
        $disc->created_by=Auth::user()->id;
        $disc->created_at=date('Y-m-d');
        }
        $disc->save(); 
        $discipline_action = 'discipline_action';
         if($request->discipline_action != 0){
         foreach ($request->discipline_action as $file) {
            $path = $file->store('discipline_action');
            tbl_discipline_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $disc->id,
                'filecat' => $discipline_action,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('discipline')->with('success','Disciplinary Action Details has been Saved!');
    } 
    public function discipline_view()
    {
        $discipline = tbl_discipline::all();
        $disciplinedocs = tbl_discipline_doc::all();
        return view('application.discipline.discipline_view',compact('discipline','disciplinedocs'));
    } 
    public function discipline_viewdetails($id)
    {
        $id = $id;
        $discipline = tbl_discipline::where('id',$id)->get();
        $disciplinedocs = tbl_discipline_doc::where('id',$id)->get();
        return view('application.discipline.discipline_viewdetails',compact('discipline','disciplinedocs','id'));
    }

    //////SUSPENSION////
    public function suspension()
    {
    return view('application.suspension.suspension')->with('success','Suspension Successfull, The Organization has been Suspended untill Re-instated!');
    } 
    public function suspension_store(Request $request)
    {  
        $host = Auth::user()->organization;        
        $event = new tbl_suspension;      
        $event->ro_name=$request->ro_name;
        $event->reason=$request->reason;
        $event->action=$request->action;
        $event->host=$host;
        $event->created_by=Auth::user()->id;
        $event->created_at=date('Y-m-d');
        $event->save(); 
        $suspension_order = 'suspension_order';
         if($request->suspension_order != 0){
         foreach ($request->suspension_order as $file) {
            $path = $file->store('suspension_order');
            tbl_suspension_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $event->id,
                'filecat' => $suspension_order,
                'doc_path' => $path
            ]);
            }
         }  

        $ro_name=$request->ro_name;
        $cda = user::where('organization', $ro_name)->value('organization');
        $cda = user::where('organization', $ro_name)->get();
        foreach($cda as $cd)
        {
        $cd->status ='0';
        $cd->save();
        }

        return redirect()->route('suspension')->with('success','Suspension Successfull, The Organization has been Suspended untill Re-instated!');
    } 
    public function suspension_view()
    {
        $suspension = tbl_suspension::where('status',1)->get();
        return view('application.suspension.suspension_view',compact('suspension'));
    }
    public function reinstate()
    {
        $suspension = tbl_suspension::where('status',1)->get();
        $suspensiondocs = tbl_suspension_doc::all();
        return view('application.suspension.reinstate',compact('suspension','suspensiondocs'));
    } 
     public function reinstate_store(Request $request)
    {  
        $id=$request->id;
        $cda = tbl_suspension::where('id', $id)->value('id');
        $cda = tbl_suspension::where('id', $id)->firstorfail();
        $cda->reinstate_remark=$request->reinstate_remark;
        $cda->status='0';
        $cda->updated_at=date('Y-m-d');
        $cda->save(); 

        $ro_name=$request->ro_name;
        $cd = user::where('organization', $ro_name)->value('organization');
        $cd = user::where('organization', $ro_name)->get();
        foreach($cd as $cds)
        {
        $cds->status ='1';
        $cds->save();
        }

        return redirect()->route('suspension_view')->with('success','Reinstatement Successfull, The Organization has been Reinstated!');
    } 
  
 //////DISCIPLINE DZONGKHA////
    public function discipline_dzo()
    {
    return view('application.discipline.discipline_dzo')->with('success','Disciplinary Action Saved!');
    }
    public function discipline_store_dzo(Request $request)
    {  
        $host = Auth::user()->organization;      
        $disc = new tbl_discipline;

        $roCheck=$request->roCheck;
        if($roCheck == '')
        {
        $disc->action_against=$request->indiCheck;
        $disc->ro_name=$request->ro_name2;
        $disc->reason=$request->reason2;
        $disc->action=$request->action2;
        $disc->host=$host;
        $disc->created_by=Auth::user()->id;
        $disc->created_at=date('Y-m-d');
        }
        elseif($roCheck != '')
        {
        $disc->action_against=$request->roCheck;
        $disc->ro_name=$request->ro_name;
        $disc->individual_name=$request->individual_name;
        $disc->reason=$request->reason;
        $disc->action=$request->action;
        $disc->host=$host;
        $disc->created_by=Auth::user()->id;
        $disc->created_at=date('Y-m-d');
        }
        $disc->save(); 
        $discipline_action = 'discipline_action';
         if($request->discipline_action != 0){
         foreach ($request->discipline_action as $file) {
            $path = $file->store('discipline_action');
            tbl_discipline_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $disc->id,
                'filecat' => $discipline_action,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('discipline_dzo')->with('success','Disciplinary Action Details has been Saved!');
    } 
    public function discipline_view_dzo()
    {
        $discipline = tbl_discipline::all();
        $disciplinedocs = tbl_discipline_doc::all();
        return view('application.discipline.discipline_view_dzo',compact('discipline','disciplinedocs'));
    } 
    public function discipline_viewdetails_dzo($id)
    {
        $id = $id;
        $discipline = tbl_discipline::where('id',$id)->get();
        $disciplinedocs = tbl_discipline_doc::where('id',$id)->get();
        return view('application.discipline.discipline_viewdetails_dzo',compact('discipline','disciplinedocs','id'));
    }

//////SUSPENSION DZONGKHA////
    public function suspension_dzo()
    {
    return view('application.suspension.suspension_dzo')->with('success','Suspension Successfull, The Organization has been Suspended untill Re-instated!');
    } 
    public function suspension_store_dzo(Request $request)
    {  
        $host = Auth::user()->organization;        
        $event = new tbl_suspension;      
        $event->ro_name=$request->ro_name;
        $event->reason=$request->reason;
        $event->action=$request->action;
        $event->host=$host;
        $event->created_by=Auth::user()->id;
        $event->created_at=date('Y-m-d');
        $event->save(); 
        $suspension_order = 'suspension_order';
         if($request->suspension_order != 0){
         foreach ($request->suspension_order as $file) {
            $path = $file->store('suspension_order');
            tbl_suspension_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $event->id,
                'filecat' => $suspension_order,
                'doc_path' => $path
            ]);
            }
         }  

        $ro_name=$request->ro_name;
        $cda = user::where('organization', $ro_name)->value('organization');
        $cda = user::where('organization', $ro_name)->get();
        foreach($cda as $cd)
        {
        $cd->status ='0';
        $cd->save();
        }

        return redirect()->route('suspension_dzo')->with('success','Suspension Successfull, The Organization has been Suspended untill Re-instated!');
    } 
    public function suspension_view_dzo()
    {
        $suspension = tbl_suspension::where('status',1)->get();
        return view('application.suspension.suspension_view_dzo',compact('suspension'));
    }
    public function reinstate_dzo()
    {
        $suspension = tbl_suspension::where('status',1)->get();
        $suspensiondocs = tbl_suspension_doc::all();
        return view('application.suspension.reinstate_dzo',compact('suspension','suspensiondocs'));
    } 
     public function reinstate_store_dzo(Request $request)
    {  
        $id=$request->id;
        $cda = tbl_suspension::where('id', $id)->value('id');
        $cda = tbl_suspension::where('id', $id)->firstorfail();
        $cda->reinstate_remark=$request->reinstate_remark;
        $cda->status='0';
        $cda->updated_at=date('Y-m-d');
        $cda->save(); 

        $ro_name=$request->ro_name;
        $cd = user::where('organization', $ro_name)->value('organization');
        $cd = user::where('organization', $ro_name)->get();
        foreach($cd as $cds)
        {
        $cds->status ='1';
        $cds->save();
        }

        return redirect()->route('suspension_view_dzo')->with('success','Reinstatement Successfull, The Organization has been Reinstated!');
    } 


}
