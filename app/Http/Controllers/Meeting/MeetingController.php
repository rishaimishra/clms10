<?php

namespace App\Http\Controllers\Meeting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\tbl_meeting;
use App\tbl_meeting_doc;
use Session;
use Auth;
use DB;
use App\user;
use App\Http\Requests\MeetingDocumentRequest;

class MeetingController extends Controller
{
   
    public function meeting()
    {
        $meeting= tbl_meeting::where('host', Auth::user()->organization )->limit(2)->orderby('id','desc')->get();
        $CROmeeting= tbl_meeting::all();
        return view('application.meeting.meeting_dashboard',compact('meeting','CROmeeting'));
    }
    public function meeting_add()
    {
    return view('application.meeting.meeting_add');
    }
    public function meeting_store(Request $request)
    {        
        $host = Auth::user()->organization;
        $meet = new tbl_meeting;  
        $meet->meeting_no=$request->meeting_no;    
        $meet->type=$request->type;
        $meet->date=$request->date;
        $meet->venue=$request->venue;
        $meet->description=$request->description;
        $meet->host=$host;
        $meet->created_by=Auth::user()->id;    
        $meet->created_at=date('Y-m-d');
        $meet->year=date('Y');
        $meet->save(); 
        $Agenda = 'Agenda';
         if($request->Agenda != 0){
         foreach ($request->Agenda as $file) {
            $path = $file->store('Agenda');
            tbl_meeting_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $meet->id,
                'filecat' => $Agenda,
                'doc_path' => $path
            ]);
            }
         }  
         $MoM = 'MoM';
         if($request->MoM != 0){
         foreach ($request->MoM as $file) {
            $path = $file->store('MoM');
            tbl_meeting_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $meet->id,
                'filecat' => $MoM,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('meeting')->with('success','Meeting Details Saved Successfully!');
    } 
    public function meeting_commission()
    {
    return view('application.meeting.meeting_commission');
    }
    public function mom_yearly_searching(Request $request)
    {
        $year=$request->year;
        $skra1=array();
        $skra_activity=tbl_meeting::where('year',$year)->value('year');
        $skra_activity1=explode(',',$skra_activity);
        foreach($skra_activity1 as $skra)
        {
        $skra1[]=trim($skra,'[]');
        }
        $event_rowise = DB::table('tbl_meetings')->where('year', $skra1)->where('host',Auth::user()->organization)->get();        
        $meeting= tbl_meeting::where('host', Auth::user()->organization )->limit(2)->orderby('id','desc')->get();
        $CROmeeting= tbl_meeting::all();
        return view('application.meeting.meeting_search',compact('meet','event_rowise','meeting','CROmeeting'));

    }
     public function meeting_search(Request $request)
    {
        
        $type=$request->type;
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->type))
        {
            $typesearch= tbl_meeting::where('type',$request->type)->get();
            Session::put('type',$request->type);
             return view('application.meeting.meeting_search_all',compact('typesearch'));
        }
        else if(!empty($request->ro_name))
        {
            $typesearch= tbl_meeting::where('host',$request->ro_name)->get();
             return view('application.meeting.meeting_search_all',compact('typesearch')); 
        }
        else if(!empty($request->year))
        {
            $typesearch= tbl_meeting::where('year',$request->year)->get();
            return view('application.meeting.meeting_search_all',compact('typesearch')); 
        }
        else
        {
             $typesearch=tbl_meeting::where('host','2')->get();
             return view('application.meeting.meeting_search_all',compact('typesearch')); 
        }
        
    }
    public function meeting_search_functionality(Request $request)
    {
        
        $type=$request->type;
        $ro_name=$request->ro_name;
        $year=$request->year; 

        if(!empty($request->type))
        {
            $typesearch= tbl_meeting::where('type',$request->type)->get();
            Session::put('type',$request->type);
             return view('application.meeting.meeting_search_all',compact('typesearch'));
        }
        else if(!empty($request->ro_name))
        {
            $typesearch= tbl_meeting::where('host',$request->ro_name)->get();
             return view('application.meeting.meeting_search_all',compact('typesearch')); 
        }
        else if(!empty($request->year))
        {
            $typesearch= tbl_meeting::where('year',$request->year)->get();
             return view('application.meeting.meeting_search_all',compact('typesearch')); 
        }
      

     }
//////////////////DZONGKHA///////////////
    public function meeting_dzo()
    {
        $meeting= tbl_meeting::where('host', Auth::user()->organization )->limit(2)->orderby('id','desc')->get();
        $CROmeeting= tbl_meeting::all();
        return view('application.meeting.meeting_dashboard_dzo',compact('meeting','CROmeeting'));
    }
    public function meeting_search_dzo(Request $request)
    {
        
        $type=$request->type;
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->type))
        {
            $typesearch= tbl_meeting::where('type',$request->type)->get();
            Session::put('type',$request->type);
             return view('application.meeting.meeting_search_all_dzo',compact('typesearch'));
        }
        else if(!empty($request->ro_name))
        {
            $typesearch= tbl_meeting::where('host',$request->ro_name)->get();
             return view('application.meeting.meeting_search_all_dzo',compact('typesearch')); 
        }
        else if(!empty($request->year))
        {
            $typesearch= tbl_meeting::where('year',$request->year)->get();
            return view('application.meeting.meeting_search_all_dzo',compact('typesearch')); 
        }
        else
        {
             $typesearch=tbl_meeting::where('host','2')->get();
             return view('application.meeting.meeting_search_all_dzo',compact('typesearch')); 
        }
        
    }
    public function mom_yearly_searching_dzo(Request $request)
    {
        $year=$request->year;
        $skra1=array();
        $skra_activity=tbl_meeting::where('year',$year)->value('year');
        $skra_activity1=explode(',',$skra_activity);
        foreach($skra_activity1 as $skra)
        {
        $skra1[]=trim($skra,'[]');
        }
        $event_rowise = DB::table('tbl_meetings')->where('year', $skra1)->where('host',Auth::user()->organization)->get();        
        $meeting= tbl_meeting::where('host', Auth::user()->organization )->limit(2)->orderby('id','desc')->get();
        $CROmeeting= tbl_meeting::all();
        return view('application.meeting.meeting_search_dzo',compact('meet','event_rowise','meeting','CROmeeting'));

    }
    public function meeting_search_functionality_dzo(Request $request)
    {
        
        $type=$request->type;
        $ro_name=$request->ro_name;
        $year=$request->year; 

        if(!empty($request->type))
        {
            $typesearch= tbl_meeting::where('type',$request->type)->get();
            Session::put('type',$request->type);
             return view('application.meeting.meeting_search_all_dzo',compact('typesearch'));
        }
        else if(!empty($request->ro_name))
        {
            $typesearch= tbl_meeting::where('host',$request->ro_name)->get();
             return view('application.meeting.meeting_search_all_dzo',compact('typesearch')); 
        }
        else if(!empty($request->year))
        {
            $typesearch= tbl_meeting::where('year',$request->year)->get();
             return view('application.meeting.meeting_search_all_dzo',compact('typesearch')); 
        }
      

     }
    public function meeting_commission_dzo()
    {
    return view('application.meeting.meeting_commission_dzo');
    }
    public function meeting_add_dzo()
    {
    return view('application.meeting.meeting_add_dzo');
    }
    public function meeting_store_dzo(Request $request)
    {        
        $host = Auth::user()->organization;
        $meet = new tbl_meeting;  
        $meet->meeting_no=$request->meeting_no;    
        $meet->type=$request->type;
        $meet->date=$request->date;
        $meet->venue=$request->venue;
        $meet->description=$request->description;
        $meet->host=$host;
        $meet->created_by=Auth::user()->id;    
        $meet->created_at=date('Y-m-d');
        $meet->year=date('Y');
        $meet->save(); 
        $Agenda = 'Agenda';
         if($request->Agenda != 0){
         foreach ($request->Agenda as $file) {
            $path = $file->store('Agenda');
            tbl_meeting_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $meet->id,
                'filecat' => $Agenda,
                'doc_path' => $path
            ]);
            }
         }  
         $MoM = 'MoM';
         if($request->MoM != 0){
         foreach ($request->MoM as $file) {
            $path = $file->store('MoM');
            tbl_meeting_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $meet->id,
                'filecat' => $MoM,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('meeting_dzo')->with('success','Meeting Details Saved Successfully!');
    } 

 

}
