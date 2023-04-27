<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\tbl_site_information;
use App\tbl_site_information_doc;
use App\tbl_agency;
use App\dzongkhag_dzo;
use App\gewog_dzo;
use App\village_dzo;
use Auth;
use Session;

use App\Http\Requests\site_informationRequest;
class SiteController extends Controller
{
    public function religious_site()
    {
     return view('application.site.religious_site');
    }
    public function siteinfo_store(Request $request)
    {  
        $host = Auth::user()->organization;        
        $event = new tbl_site_information;      
        $event->site_name=$request->site_name;
        $event->discription=$request->discription;
        $event->venue=$request->venue;
        $event->dzongkhag=$request->type1;
        $event->dungkhag=$request->dungkhag;
        $event->gewog=$request->gewog;
        $event->village=$request->village;
        $event->mapurl=$request->mapurl;
        $event->latitude=$request->latitude;
        $event->longitude=$request->longitude;
        $event->sitehistory=$request->sitehistory;
        $event->host=$host;
        $event->created_by=Auth::user()->id;
        $event->created_at=date('Y-m-d');
        $event->save(); 
        $site_details = 'site_details';
         if($request->site_details != 0){
         foreach ($request->site_details as $file) {
            $path = $file->store('site_details');
            tbl_site_information_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $event->id,
                'filecat' => $site_details,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('religious_site')->with('success','Religious Site Information Details has been Saved!');
    } 
    public function siteinfo_view()
    {
     $site = tbl_site_information::where('host', Auth::user()->organization)->get();
     $site_rowise=tbl_site_information::where('host',Auth::user()->organization)->get();
     return view('application.site.siteinfo_view', compact('site','site_rowise'));
    }
    public function siteinfo_viewdetails($id)
    {
     $id=$id;
     $siteview = tbl_site_information::where('id', $id)->get();
     $docs = tbl_site_information_doc::where('app_id', $id)->get();
     return view('application.site.siteinfo_viewdetails', compact('siteview','id','docs'));
    }
    public function ro_site_searching(Request $request)
    {
        $ro=$request->ro;
     	$site = tbl_site_information::where('host', Auth::user()->organization)->get();

        $skra1=array();
        $orga = tbl_agency::where('agency', $ro)->value('id');
        $skra_activity=tbl_site_information::where('host',$orga)->value('host');
        $skra_activity1=explode(',',$skra_activity);
        foreach($skra_activity1 as $skra)
        {
        $skra1[]=trim($skra,'[]');
        }
        $site_rowise=tbl_site_information::where('host',$skra1)->get();
        return view('application.site.siteinfo_view', compact('site','site_rowise'));
     }

     /////////DZONGKHA////////
    public function view_dzo(Request $request) 
    {
        if($request->ajax())
        {
        $id = $request->id;
        $info = dzongkhag_dzo::where('dzongkhag_id', $id)->get();
        return response()->json($info);
        }
    }
    public function view1_dzo(Request $request)
    {
        if($request->ajax())
        {
        $id = $request->id;
        $info = gewog_dzo::where('dzongkhag_id', $id)->get();
        return response()->json($info);
        }
    }
    public function view12_dzo(Request $request)
    {
        if($request->ajax())        
        {
        $id = $request->id;
        $info = village_dzo::where('gewog_id', $id)->get();
        return response()->json($info);
        }
    }
    public function religious_site_dzo()
    {
     return view('application.site.religious_site_dzo');
    }
    public function siteinfo_view_dzo()
    {
     $site = tbl_site_information::where('host', Auth::user()->organization)->get();
     $site_rowise=tbl_site_information::where('host',Auth::user()->organization)->get();
     return view('application.site.siteinfo_view_dzo', compact('site','site_rowise'));
    }
    public function siteinfo_viewdetails_dzo($id)
    {
     $id=$id;
     $siteview = tbl_site_information::where('id', $id)->get();
     $docs = tbl_site_information_doc::where('app_id', $id)->get();
     return view('application.site.siteinfo_viewdetails_dzo', compact('siteview','id','docs'));
    }
    public function ro_site_searching_dzo(Request $request)
    {
        $ro=$request->ro;
        $site = tbl_site_information::where('host', Auth::user()->organization)->get();

        $skra1=array();
        $orga = tbl_agency::where('agency', $ro)->value('id');
        $skra_activity=tbl_site_information::where('host',$orga)->value('host');
        $skra_activity1=explode(',',$skra_activity);
        foreach($skra_activity1 as $skra)
        {
        $skra1[]=trim($skra,'[]');
        }
        $site_rowise=tbl_site_information::where('host',$skra1)->get();
        return view('application.site.siteinfo_view_dzo', compact('site','site_rowise'));
    }
    public function siteinfo_store_dzo(Request $request)
    {  
        $host = Auth::user()->organization;        
        $event = new tbl_site_information;      
        $event->site_name=$request->site_name;
        $event->discription=$request->discription;
        $event->venue=$request->venue;
        $event->dzongkhag=$request->type1;
        $event->dungkhag=$request->dungkhag;
        $event->gewog=$request->gewog;
        $event->village=$request->village;
        $event->mapurl=$request->mapurl;
        $event->latitude=$request->latitude;
        $event->longitude=$request->longitude;
        $event->sitehistory=$request->sitehistory;
        $event->host=$host;
        $event->created_by=Auth::user()->id;
        $event->created_at=date('Y-m-d');
        $event->save(); 
        $site_details = 'site_details';
         if($request->site_details != 0){
         foreach ($request->site_details as $file) {
            $path = $file->store('site_details');
            tbl_site_information_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $event->id,
                'filecat' => $site_details,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('religious_site_dzo')->with('success','Religious Site Information Details has been Saved!');
    } 

}
