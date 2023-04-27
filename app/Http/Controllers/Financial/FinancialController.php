<?php

namespace App\Http\Controllers\Financial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\tbl_financial_information;
use App\tbl_financial_information_doc;
use Auth;
use Session;

use App\Http\Requests\financial_statementRequest;

class FinancialController extends Controller
{
    public function financial_home()
    {
     return view('application.financial.financial_home');
    }
    public function financialinfo_store(Request $request)
    {  
        $financial_id = $this->get_financial_id();
        $host = Auth::user()->organization;        
        $event = new tbl_financial_information;  
        $event->financial_id=$financial_id;
        $event->year=$request->year;
        $event->opening_balance=$request->opening_balance;
        $event->total_expenditure=$request->total_expenditure;
        $event->membership_fees=$request->membership_fees;
        $event->donations=$request->donations;
        $event->other_collections=$request->other_collections;
        $event->salary=$request->salary;
        $event->rentals=$request->rentals;
        $event->procurements=$request->procurements;
        $event->travel=$request->travel;
        $event->other_expenses=$request->other_expenses;
        $event->closing_balance=$request->closing_balance;
        $event->host=$host;
        $event->created_by=Auth::user()->id;
        $event->created_at=date('Y-m-d');
        $event->save(); 
        $financial_statement = 'financial_statement';
         if($request->financial_statement != 0){
         foreach ($request->financial_statement as $file) {
            $path = $file->store('financial_statement');
            tbl_financial_information_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $event->id,
                'filecat' => $financial_statement,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('application.home_ro')->with('success','Financial Information Details has been Saved & Submitted to CRO!');
    } 
    public function get_financial_id()
    {  
        $y = date('Y'); 
        $lastno = tbl_financial_information::orderBy('id', 'desc')->first();
        if ( ! $lastno ){
        $number = 0;}
        else {$number = substr($lastno->financial_id,4); }           
        $newnumber = sprintf(intval($number) + 1);              
        $result = sprintf("%s%s",$y, $newnumber);    
        return $result;  
    }
    public function financial_all()
    {
        $financial = tbl_financial_information::all();
        $financial2 = tbl_financial_information::where('host', Auth::user()->organization)->get(); 
        return view('application.financial.financial_all', compact('financial','financial2'));
    }  
    public function financial_review($id)
    {
         $id = $id; 
         $financial = tbl_financial_information::where('id',$id)->get();
         $docs = tbl_financial_information_doc::where('app_id',$id)->get();
        return view('application.financial.financial_review', compact('financial','id','docs'));
    }  
    public function approve_financial(Request $request,$id)
    {
        $id = $id;
        $cda = tbl_financial_information::where('id', $id)->value('id'); 
        $cda = tbl_financial_information::where('id', $id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $financial = tbl_financial_information::all();
        $financial2 = tbl_financial_information::where('host', Auth::user()->organization)->get(); 
        return redirect()->route('financial_all', compact('id','financial','financial2'))->with('success','Financial Assessment Saved!');
    }
    public function financial_resubmit($id)
    {
        $id = $id;
        $fin = tbl_financial_information::where('id', $id)->get();
        $docs = tbl_financial_information_doc::where('app_id', $id)->get();
        return view('application.financial.financial_resubmit', compact('fin','docs','id'));
    }
    public function update_financial(Request $request,$id)
    {
        $id = $id;
        $st = new tbl_financial_information;
        $st::where('id',$id) 
            ->update([
                'year' => $request->year,
                'opening_balance'=> $request->opening_balance,
                'total_expenditure'=> $request->total_expenditure,
                'membership_fees'=> $request->membership_fees,
                'donations'=> $request->donations,
                'other_collections'=> $request->other_collections,
                'salary'=> $request->salary,
                'rentals'=> $request->rentals,
                'procurements'=> $request->procurements,
                'travel'=> $request->travel,
                'other_expenses'=> $request->other_expenses,
                'closing_balance'=> $request->closing_balance,
                'approve' => 0,   
                'resubmission' => 1,             
                'updated_by'=> Auth::user()->id, 
                'updated_at'=> date('Y-m-d'),            
                ]);
            $financial_statement = 'financial_statement';
            if($request->financial_statement != 0){
            foreach ($request->financial_statement as $file) {
            $path = $file->store('financial_statement');
            tbl_financial_information_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $financial_statement,
                'doc_path' => $path
            ]);
            }
            }  
        $request->session()->flash('alert-info', 'Details Updated Successfully');
        return redirect()->route('financial_all')->with('success','Details has been Updated and Resubmimtted for Assessment!');
    } 

//////////////DZONGKHA///////////////
    public function financial_home_dzo()
    {
     return view('application.financial.financial_home_dzo');
    }  

    public function financialinfo_store_dzo(Request $request)
    {  
        $financial_id = $this->get_financial_id();
        $host = Auth::user()->organization;        
        $event = new tbl_financial_information;  
        $event->financial_id=$financial_id;
        $event->year=$request->year;
        $event->opening_balance=$request->opening_balance;
        $event->total_expenditure=$request->total_expenditure;
        $event->membership_fees=$request->membership_fees;
        $event->donations=$request->donations;
        $event->other_collections=$request->other_collections;
        $event->salary=$request->salary;
        $event->rentals=$request->rentals;
        $event->procurements=$request->procurements;
        $event->travel=$request->travel;
        $event->other_expenses=$request->other_expenses;
        $event->closing_balance=$request->closing_balance;
        $event->host=$host;
        $event->created_by=Auth::user()->id;
        $event->created_at=date('Y-m-d');
        $event->save(); 
        $financial_statement = 'financial_statement';
         if($request->financial_statement != 0){
         foreach ($request->financial_statement as $file) {
            $path = $file->store('financial_statement');
            tbl_financial_information_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $event->id,
                'filecat' => $financial_statement,
                'doc_path' => $path
            ]);
            }
         }  
        return redirect()->route('application.home_ro_dzo')->with('success','Financial Information Details has been Saved & Submitted to CRO!');
    } 
    public function financial_all_dzo()
    {
        $financial = tbl_financial_information::all();
        $financial2 = tbl_financial_information::where('host', Auth::user()->organization)->get(); 
        return view('application.financial.financial_all_dzo', compact('financial','financial2'));
    }  
    public function financial_review_dzo($id)
    {
         $id = $id; 
         $financial = tbl_financial_information::where('id',$id)->get();
         $docs = tbl_financial_information_doc::where('app_id',$id)->get();
        return view('application.financial.financial_review_dzo', compact('financial','id','docs'));
    }  
    public function approve_financial_dzo(Request $request,$id)
    {
        $id = $id;
        $cda = tbl_financial_information::where('id', $id)->value('id'); 
        $cda = tbl_financial_information::where('id', $id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $financial = tbl_financial_information::all();
        $financial2 = tbl_financial_information::where('host', Auth::user()->organization)->get(); 
        return redirect()->route('financial_all_dzo', compact('id','financial','financial2'))->with('success','Financial Assessment Saved!');
    }
    public function financial_resubmit_dzo($id)
    {
        $id = $id;
        $fin = tbl_financial_information::where('id', $id)->get();
        $docs = tbl_financial_information_doc::where('app_id', $id)->get();
        return view('application.financial.financial_resubmit_dzo', compact('fin','docs','id'));
    }
    public function update_financial_dzo(Request $request,$id)
    {
        $id = $id;
        $st = new tbl_financial_information;
        $st::where('id',$id) 
            ->update([
                'year' => $request->year,
                'opening_balance'=> $request->opening_balance,
                'total_expenditure'=> $request->total_expenditure,
                'membership_fees'=> $request->membership_fees,
                'donations'=> $request->donations,
                'other_collections'=> $request->other_collections,
                'salary'=> $request->salary,
                'rentals'=> $request->rentals,
                'procurements'=> $request->procurements,
                'travel'=> $request->travel,
                'other_expenses'=> $request->other_expenses,
                'closing_balance'=> $request->closing_balance,
                'approve' => 0,   
                'resubmission' => 1,             
                'updated_by'=> Auth::user()->id, 
                'updated_at'=> date('Y-m-d'),            
                ]);
            $financial_statement = 'financial_statement';
            if($request->financial_statement != 0){
            foreach ($request->financial_statement as $file) {
            $path = $file->store('financial_statement');
            tbl_financial_information_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $financial_statement,
                'doc_path' => $path
            ]);
            }
            }  
        $request->session()->flash('alert-info', 'Details Updated Successfully');
        return redirect()->route('financial_all_dzo')->with('success','Details has been Updated and Resubmimtted for Assessment!');
    } 
     

}
