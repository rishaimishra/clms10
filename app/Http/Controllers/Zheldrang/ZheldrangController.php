<?php

namespace App\Http\Controllers\Zheldrang;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\tbl_zheldrang;
use App\tbl_agency;
use Session;
use Auth;
use DB;
use App\user;

class ZheldrangController extends Controller
{
    public function cid_search_zheldrang(Request $request) 
    {     
        $cidno = $request->cidno;
        $zheldrang =  tbl_zheldrang::where('host', Auth::user()->organization)->get();
        return view('application.zheldrang.zheldrang_add_cid',compact('zheldrang','cidno'));  
    }
    public function cid_search_zheldrang_dzo(Request $request) 
    {     
        $cidno = $request->cidno;
        $zheldrang =  tbl_zheldrang::where('host', Auth::user()->organization)->get();
        return view('application.zheldrang.zheldrang_add_cid_dzo',compact('zheldrang','cidno'));  
    }
    public function updatezheldrang(Request $request)
    {
        $id = $request->edit_id;
        $contact = $request->econtact;
        $designation = $request->edesignation;
       
        $achieve = new tbl_zheldrang;
        $achieve::where('id',$id)
            ->update([
                'contact' => $contact,
                'designation'=> $designation,
                ]);
        return redirect()->route('zheldrang')->with('success','Data Edited Successfully!'); 
        
    }
    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_zheldrang::find($id);
            return response()->json($info);
        }
    }
      
    public function zheldrang()
    {
       // $zheldrang =  tbl_zheldrang::where('host', Auth::user()->organization)->get();
        
        $zheldrang = DB::table('tbl_zheldrangs')
                        ->join('tbl_designations', 'tbl_zheldrangs.designation', '=', 'tbl_designations.id')
                        ->select('tbl_designations.*','tbl_zheldrangs.*')
                        ->where('tbl_zheldrangs.host', Auth::user()->organization)
                        ->orderby('tbl_designations.order')
                        ->get();
        return view('application.zheldrang.zheldrang_dashboard',compact('zheldrang'));
    }
    public function zheldrang_add()
    {
        $zheldrang =  tbl_zheldrang::where('host', Auth::user()->organization)->get();
        return view('application.zheldrang.zheldrang_add',compact('zheldrang'));
    }
    public function zheldrang_store(Request $request)
    {        
        $host = Auth::user()->organization;
        $newm = new tbl_zheldrang; 
        $newm->cid=$request->cid;     
        $newm->name=$request->name;
        $newm->dzongkhag=$request->type1;
        $newm->gewog=$request->gewog;
        $newm->village=$request->village;
        $newm->contact=$request->contact;
        $newm->thramno=$request->thramno;
        $newm->houseno=$request->houseno;
        $newm->designation=$request->designation;
        $newm->religion=$request->religion;
       $newm->tshetshok=$request->tshetshok;


        $newm->created_at=date('Y-m-d');
        $newm->host=$host;
        $newm->created_by=Auth::user()->id;
        $newm->save(); 
        return redirect()->route('zheldrang')->with('success','New Zheldrang Registration Successfull!');
    } 
    public function destroy($id)
    {
        $id = $id;
        $user = new tbl_zheldrang;
        $user::where('id', $id)->delete();
        $zheldrang =  tbl_zheldrang::where('host', Auth::user()->organization)->get();
        return redirect()->route('zheldrang',compact('zheldrang'))->with('success','Zheldrang Deleted Successfully!');
    }
    public function zheldrang_searching(Request $request)
    {
        $ro=$request->ro;
        $zheldrang = tbl_zheldrang::where('host', Auth::user()->organization)->get();

        $skra1=array();
        $orga = tbl_agency::where('agency', $ro)->value('id');
        $skra_activity=tbl_zheldrang::where('host',$orga)->value('host');
        $skra_activity1=explode(',',$skra_activity);
        foreach($skra_activity1 as $skra)
        {
        $skra1[]=trim($skra,'[]');
        }
        $zheldrang_rowise=tbl_zheldrang::where('host',$skra1)->get();
        return view('application.zheldrang.zheldrang_searchresult', compact('zheldrang','zheldrang_rowise'));
     }

   public function ajaxRequestPost(Request $request)
            {
             
                 $cid = $request->cid;
                 $dup  = count(DB::table('tbl_zheldrangs')->where('cid',$cid)->get());       
                 if( $dup > 0)
                    {
                    return json_encode(['success'=>1]); // success => 1 for Already taken
                    }
                    else
                    {
                    return json_encode(['success'=>0]); // You can use this Email Name
                    }                    
            }

    
     //////DZONGKHA//////
    public function zheldrang_dzo()
    {
        $zheldrang =  tbl_zheldrang::where('host', Auth::user()->organization)->get();
        return view('application.zheldrang.zheldrang_dashboard_dzo',compact('zheldrang'));
    }
    public function zheldrang_add_dzo()
    {
        $zheldrang =  tbl_zheldrang::where('host', Auth::user()->organization)->get();
        return view('application.zheldrang.zheldrang_add_dzo',compact('zheldrang'));
    }
    public function destroy_dzo($id)
    {
        $id = $id;
        $user = new tbl_zheldrang;
        $user::where('id', $id)->delete();
        $zheldrang =  tbl_zheldrang::where('host', Auth::user()->organization)->get();
        return redirect()->route('zheldrang_dzo',compact('zheldrang'))->with('success','Zheldrang Deleted Successfully!');
    } 
    public function zheldrang_searching_dzo(Request $request)
    {
        $ro=$request->ro;
        $zheldrang = tbl_zheldrang::where('host', Auth::user()->organization)->get();

        $skra1=array();
        $orga = tbl_agency::where('agency', $ro)->value('id');
        $skra_activity=tbl_zheldrang::where('host',$orga)->value('host');
        $skra_activity1=explode(',',$skra_activity);
        foreach($skra_activity1 as $skra)
        {
        $skra1[]=trim($skra,'[]');
        }
        $zheldrang_rowise=tbl_zheldrang::where('host',$skra1)->get();
        return view('application.zheldrang.zheldrang_searchresult_dzo', compact('zheldrang','zheldrang_rowise'));
     }
    public function zheldrang_store_dzo(Request $request)
    {        
        $host = Auth::user()->organization;
        $newm = new tbl_zheldrang; 
        $newm->cid=$request->cid;     
        $newm->name=$request->name;
        $newm->dzongkhag=$request->type1;
        $newm->gewog=$request->gewog;
        $newm->village=$request->village;
        $newm->contact=$request->contact;
        $newm->thramno=$request->thramno;
        $newm->houseno=$request->houseno;
        $newm->designation=$request->designation;
        $newm->religion=$request->religion;
$newm->tshetshok=$request->tshetshok;

        $newm->created_at=date('Y-m-d');
        $newm->host=$host;
        $newm->created_by=Auth::user()->id;
        $newm->save(); 
        return redirect()->route('zheldrang_dzo')->with('success','New Zheldrang Registration Successfull!');
    } 
  

}
