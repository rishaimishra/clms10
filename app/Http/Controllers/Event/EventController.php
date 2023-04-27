<?php

namespace App\Http\Controllers\Event;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\tbl_event_information;
use App\tbl_event_information_doc;
use App\tbl_agency;
use Auth;
use Session;

use App\Http\Requests\event_informationRequest;
class EventController extends Controller
{
    public function __construct()
	{
	 $this->middleware('auth'); 		
	}

    public function event_info()
    {
     return view('application.event.eventinfo_home');
    }
    public function eventinfo_store(Request $request)
    {  
        $host = Auth::user()->organization;        
        $event = new tbl_event_information;      
        $event->event_name=$request->event_name;
        $event->discription=$request->discription;
        $event->venue=$request->venue;
        $event->dzongkhag=$request->type1;
        $event->dungkhag=$request->dungkhag;
        $event->gewog=$request->gewog;
        $event->village=$request->village;
        $event->startdate=$request->startdate;
        $event->enddate=$request->enddate;
        $event->host=$host;
        $event->created_by=Auth::user()->id;
        $event->created_at=date('Y-m-d');
        $event->save(); 
        $event_details = 'event_details';
         if($request->event_details != 0){
         foreach ($request->event_details as $file) {
            $path = $file->store('event_details');
            tbl_event_information_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $event->id,
                'filecat' => $event_details,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('event_info')->with('success','Event Information Details has been Saved & Submitted to CRO!');
    } 
    public function eventinfo_view()
    {
     $event = tbl_event_information::where('host', Auth::user()->organization)->get();
     $event_rowise=tbl_event_information::where('host',Auth::user()->organization)->get();
     return view('application.event.eventinfo_view', compact('event','event_rowise'));
    }
    public function eventinfo_viewdetails($id)
    {
     $id=$id;
     $eventview = tbl_event_information::where('id', $id)->get();
     $docs = tbl_event_information_doc::where('app_id', $id)->get();
     return view('application.event.eventinfo_viewdetails', compact('eventview','id','docs'));
    }
    public function ro_event_searching(Request $request)
    {
        $ro=$request->ro;
     	$event = tbl_event_information::where('host', Auth::user()->organization)->get();

        $skra1=array();
        $orga = tbl_agency::where('agency', $ro)->value('id');
        $skra_activity=tbl_event_information::where('host',$orga)->value('host');
        $skra_activity1=explode(',',$skra_activity);
        foreach($skra_activity1 as $skra)
        {
        $skra1[]=trim($skra,'[]');
        }
        $event_rowise=tbl_event_information::where('host',$skra1)->get();
        return view('application.event.eventinfo_view', compact('event','event_rowise'));
     }

/////////////////DZONGKHA///////////////
    public function eventinfo_view_dzo()
    {
     $event = tbl_event_information::where('host', Auth::user()->organization)->get();
     $event_rowise=tbl_event_information::where('host',Auth::user()->organization)->get();
     return view('application.event.eventinfo_view_dzo', compact('event','event_rowise'));
    }
    public function event_info_dzo()
    {
     return view('application.event.eventinfo_home_dzo');
    }
    public function eventinfo_viewdetails_dzo($id)
    {
     $id=$id;
     $eventview = tbl_event_information::where('id', $id)->get();
     $docs = tbl_event_information_doc::where('app_id', $id)->get();
     return view('application.event.eventinfo_viewdetails_dzo', compact('eventview','id','docs'));
    } 
    public function ro_event_searching_dzo(Request $request)
    {
        $ro=$request->ro;
        $event = tbl_event_information::where('host', Auth::user()->organization)->get();

        $skra1=array();
        $orga = tbl_agency::where('agency', $ro)->value('id');
        $skra_activity=tbl_event_information::where('host',$orga)->value('host');
        $skra_activity1=explode(',',$skra_activity);
        foreach($skra_activity1 as $skra)
        {
        $skra1[]=trim($skra,'[]');
        }
        $event_rowise=tbl_event_information::where('host',$skra1)->get();
        return view('application.event.eventinfo_view_dzo', compact('event','event_rowise'));
    }    
    public function eventinfo_store_dzo(Request $request)
    {  
        
        $host = Auth::user()->organization;        
        $event = new tbl_event_information;      
        $event->event_name=$request->event_name;
        $event->discription=$request->discription;
        $event->venue=$request->venue;
        $event->dzongkhag=$request->type1;
        $event->dungkhag=$request->dungkhag;
        $event->gewog=$request->gewog;
        $event->village=$request->village;
        $event->startdate=$request->startdate;
        $event->enddate=$request->enddate;

      /*$startdate = $request->input('startdate');
        $startdate =  implode('-', $startdate);
        $input = $request->except('startdate');
        $input['startdate'] = $startdate;
        $event->startdate=$startdate;

        $enddate = $request->input('enddate');
        $enddate =  implode('-', $enddate);
        $input = $request->except('enddate');
        $input['enddate'] = $enddate;
        $event->enddate=$enddate;
      */

        $event->host=$host;
        $event->created_by=Auth::user()->id;
        $event->created_at=date('Y-m-d');
        $event->save(); 
        $event_details = 'event_details';
         if($request->event_details != 0){
         foreach ($request->event_details as $file) {
            $path = $file->store('event_details');
            tbl_event_information_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $event->id,
                'filecat' => $event_details,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('event_info_dzo')->with('success','Event Information Details has been Saved & Submitted to CRO!');
    } 



}
