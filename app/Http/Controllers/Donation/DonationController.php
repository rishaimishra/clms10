<?php

namespace App\Http\Controllers\Donation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\tbl_donation;
use App\tbl_donationcollector;
use Session;
use Auth;
use DB;
use Image;
use App\user;

class DonationController extends Controller
{

    public function cid_search_donation(Request $request,$donation_id)
    {
        $cidno=$request->cidno;
        $donation_id = $donation_id;
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
        $host = Auth::user()->organization;

        $donation = new tbl_donationcollector;   
        $donation->donation_id=$request->donation_id;
        $donation->cid=$request->cid;
        $donation->name=$request->name;
        $donation->dzongkhag=$request->type1;
        $donation->gewog=$request->gewog;        
        $donation->host=$host;
        $donation->created_by=Auth::user()->id;
        $donation->created_at=date('Y-m-d');
        $donation->save();

        $donation_id=$request->donation_id;
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();         
        return view('application.donation.donation_add',compact('donation_id','member','cidno'));     
    }
    public function destroy_collector($id, $donation_id)
    {
        $id = $id;
        $donation_id = $donation_id;
        $cidno='';
        $user = new tbl_donationcollector;
        $user::where('id', $id)->delete();
        $member= tbl_donationcollector::where('donation_id', $donation_id )->get();
        return view('application.donation.donation_add',compact('cidno','id','member','donation_id'))->with('success','Details has been Removed!');
    }
    public function cid_search_donation_dzo(Request $request,$donation_id)
    {
        $cidno=$request->cidno;
        $donation_id = $donation_id;
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
        $host = Auth::user()->organization;

        $donation = new tbl_donationcollector;   
        $donation->donation_id=$request->donation_id;
        $donation->cid=$request->cid;
        $donation->name=$request->name;
        $donation->dzongkhag=$request->type1;
        $donation->gewog=$request->gewog;        
        $donation->host=$host;
        $donation->created_by=Auth::user()->id;
        $donation->created_at=date('Y-m-d');
        $donation->save();

        $donation_id=$request->donation_id;
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();         
        return view('application.donation.donation_add_dzo',compact('donation_id','member','cidno'));     
    }
    public function destroy_collector_dzo($id, $donation_id)
    {
        $id = $id;
        $donation_id = $donation_id;
        $cidno='';
        $user = new tbl_donationcollector;
        $user::where('id', $id)->delete();
        $member= tbl_donationcollector::where('donation_id', $donation_id )->get();
        return view('application.donation.donation_add_dzo',compact('cidno','id','member','donation_id'))->with('success','Details has been Removed!');
    }
   
    public function donation()
    {
        $donation= tbl_donation::where('host', Auth::user()->organization )->orderby('id','desc')->get();
        $donationall= tbl_donation::all();
        return view('application.donation.donation_dashboard',compact('donation','donationall'));
    }
    public function donation_add($donation_id)
    {
        $donation_id = $donation_id;
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
        return view('application.donation.donation_add',compact('donation_id','member'));
    }
    public function store_donationcollectors(Request $request) 
    { 
        $host = Auth::user()->organization;
        $donation = new tbl_donationcollector;       
        $donation->donation_id=$request->donation_id;
        $donation->cid=$request->cid;
        $donation->name=$request->name;
        $donation->dzongkhag=$request->type1;
        $donation->gewog=$request->gewog;        
        $donation->host=$host;
        $donation->created_by=Auth::user()->id;
        $donation->created_at=date('Y-m-d');
        $donation->save();
        $donation_id=$request->donation_id; 
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
       
       
        $host = Auth::user()->organization;
        $d_id=$request->donation_id;
        $dons = tbl_donation::where('donation_id', $d_id)->value('donation_id'); 
        if( ! $dons )
        {
        $donation = new tbl_donation; 
        $donation->donation_id=$request->donation_id;
        $donation->purpose=$request->purpose;
       
        $donation->host=$host;
        $donation->created_by=Auth::user()->id;
        $donation->created_at=date('Y-m-d');
        $donation->save();
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
        $donation_id=$request->donation_id; 
        return redirect()->route('donation_add',$donation_id)->with('success','Add More Team Members!');
        }
        else
        { 
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
        $donation_id=$request->donation_id; 
        return redirect()->route('donation_add',$donation_id)->with('success','Add More Team Members!');
        } 
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
        $donation_id=$request->donation_id;
        return redirect()->route('donation_add',$donation_id)->with('success','Add More Team Members!');

    }
    public function donation_review($id)
    {        
       $id = $id;
       $donation= tbl_donation::where('id', $id )->orderby('id','desc')->get();
       $donationcollector= tbl_donationcollector::where('donation_id', $id )->get();
       return view('application.donation.donation_review',compact('donation','id','donationcollector'));
    } 
    public function destroy($id, $donation_id)
    {
        $id = $id;
        $donation_id = $donation_id;
        $user = new tbl_donationcollector;
        $user::where('id', $id)->delete();
        $donation= tbl_donation::where('id', $donation_id )->get();
        $donationcollector= tbl_donationcollector::where('donation_id', $donation_id )->get();
        return view('application.donation.donation_review',compact('donation','id','donationcollector','donation_id'))->with('success','Details has been Removed!');
    }
    public function approve_donation(Request $request,$id)
    {
        $id = $id;
        $cda = tbl_donation::where('id', $id)->value('id'); 
        $cda = tbl_donation::where('id', $id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;

        if($request->hasFile('approval_letter_no'))
        {
            $file=$request->file('approval_letter_no');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $cda->approval_letter_no=$file->getClientOriginalName();
        }

        //$cda->approval_letter_no=$request->approval_letter_no;
        $cda->approved_on=date('Y-m-d');
        $cda->updated_at=date('Y-m-d');
        $cda->updated_by=Auth::user()->id;
        $cda->save();
       
        $donation= tbl_donation::where('host', Auth::user()->organization )->orderby('id','desc')->get();
        $donationall= tbl_donation::all();
        return redirect()->route('donation',compact('donation','donationall','id'))->with('success','Assessment Decision Save Successfully!');
    }
/////DZONGKHA///
    public function donation_dzo()
    {
        $donation= tbl_donation::where('host', Auth::user()->organization )->orderby('id','desc')->get();
        $donationall= tbl_donation::all();
        return view('application.donation.donation_dashboard_dzo',compact('donation','donationall'));
    }  
    public function donation_add_dzo($donation_id)
    {
        $donation_id = $donation_id;
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
        return view('application.donation.donation_add_dzo',compact('donation_id','member'));
    } 
    public function store_donationcollectors_dzo(Request $request) 
    { 
        $host = Auth::user()->organization;
        $donation = new tbl_donationcollector;       
        $donation->donation_id=$request->donation_id;
        $donation->cid=$request->cid;
        $donation->name=$request->name;
        $donation->dzongkhag=$request->type1;
        $donation->gewog=$request->gewog;        
        $donation->host=$host;
        $donation->created_by=Auth::user()->id;
        $donation->created_at=date('Y-m-d');
        $donation->save();
        $donation_id=$request->donation_id; 
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
       
       
        $host = Auth::user()->organization;
        $d_id=$request->donation_id;
        $dons = tbl_donation::where('donation_id', $d_id)->value('donation_id'); 
        if( ! $dons )
        {
        $donation = new tbl_donation; 
        $donation->donation_id=$request->donation_id;
        $donation->purpose=$request->purpose;
        
        $donation->host=$host;
        $donation->created_by=Auth::user()->id;
        $donation->created_at=date('Y-m-d');
        $donation->save();
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
        $donation_id=$request->donation_id; 
        return redirect()->route('donation_add_dzo',$donation_id)->with('success','Add More Team Members!');
        }
        else
        { 
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
        $donation_id=$request->donation_id; 
        return redirect()->route('donation_add_dzo',$donation_id)->with('success','Add More Team Members!');
        } 
        $member =  tbl_donationcollector::where('donation_id', $donation_id)->get();
        $donation_id=$request->donation_id;
        return redirect()->route('donation_add_dzo',$donation_id)->with('success','Add More Team Members!');

    }  
    public function donation_review_dzo($id)
    {        
       $id = $id;
       $donation= tbl_donation::where('id', $id )->orderby('id','desc')->get();
       $donationcollector= tbl_donationcollector::where('donation_id', $id )->get();
       return view('application.donation.donation_review_dzo',compact('donation','id','donationcollector'));
    }
    public function destroy_dzo($id, $donation_id)
    {
        $id = $id;
        $donation_id = $donation_id;
        $user = new tbl_donationcollector;
        $user::where('id', $id)->delete();
        $donation= tbl_donation::where('id', $donation_id )->get();
        $donationcollector= tbl_donationcollector::where('donation_id', $donation_id )->get();
        return view('application.donation.donation_review_dzo',compact('donation','id','donationcollector','donation_id'))->with('success','Details has been Removed!');
    }
    public function approve_donation_dzo(Request $request,$id)
    {
        $id = $id;
        $cda = tbl_donation::where('id', $id)->value('id'); 
        $cda = tbl_donation::where('id', $id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
         if($request->hasFile('approval_letter_no'))
        {
            $file=$request->file('approval_letter_no');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $cda->approval_letter_no=$file->getClientOriginalName();
        }
        $cda->approved_on=date('Y-m-d');
        $cda->updated_at=date('Y-m-d');
        $cda->updated_by=Auth::user()->id;
        $cda->save();
       
        $donation= tbl_donation::where('host', Auth::user()->organization )->orderby('id','desc')->get();
        $donationall= tbl_donation::all();
        return redirect()->route('donation_dzo',compact('donation','donationall','id'))->with('success','Assessment Decision Save Successfully!');
    }  
}
