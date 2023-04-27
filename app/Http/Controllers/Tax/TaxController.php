<?php

namespace App\Http\Controllers\Tax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\tbl_taxexemption;
use App\tbl_taxexemption_recommendation_doc;
use App\tbl_agency;
use Session;
use Auth;
use DB;
use App\user;
use App\Http\Requests\Recommendation_LetterRequest;

class TaxController extends Controller
{
public function tax_exempt()
    {
        $tax= tbl_taxexemption::where('host', Auth::user()->organization )->orderby('id','desc')->get();
        $CROtax= tbl_taxexemption::orderby('id','desc')->get();
        return view('application.tax.tax_exempt',compact('tax','CROtax'));
    }
public function tax_exempt_add()
    {    
        return view('application.tax.tax_exempt_add');
    }
public function store_taxexempt(Request $request)
    {        
        $host = Auth::user()->organization;
        $meet = new tbl_taxexemption;              
        $meet->host=$host;
        $meet->created_by=Auth::user()->id;    
        $meet->created_at=date('Y-m-d');
        $meet->save(); 
        $application = 'application';
         if($request->application != 0){
         foreach ($request->application as $file) {
            $path = $file->store('Recommendation_Letter');
            tbl_taxexemption_recommendation_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $meet->id,
                'filecat' => $application,
                'doc_path' => $path
            ]);
            }
         }
         $invoice = 'invoice';
         if($request->invoice != 0){
         foreach ($request->invoice as $file) {
            $path = $file->store('Recommendation_Letter');
            tbl_taxexemption_recommendation_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $meet->id,
                'filecat' => $invoice,
                'doc_path' => $path
            ]);
            }
         }
        return redirect()->route('tax_exempt',compact('tax','CROtax','tax_id'))->with('success','Tax Exemption Details Saved Successfully and Sent to CRO!');
    } 
public function taxexempt_review($id)
    {        
       $id = $id;
       $taxreview = tbl_taxexemption::where('id',$id)->get();
       $docs= tbl_taxexemption_recommendation_doc::where('app_id', $id )->orderby('id','desc')->get();
       return view('application.tax.taxexempt_viewdetails',compact('taxreview','id','docs'));
    }
public function approve_taxexempt(Request $request,$id)
    {
        $id = $id;
        $cda = tbl_taxexemption::where('id', $id)->value('id'); 
        $cda = tbl_taxexemption::where('id', $id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $Recommendation_Letter = 'Recommendation_Letter';
         if($request->Recommendation_Letter != 0){
         foreach ($request->Recommendation_Letter as $file) {
            $path = $file->store('Recommendation_Letter');
            tbl_taxexemption_recommendation_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $Recommendation_Letter,
                'doc_path' => $path
            ]);
            }
         }
        $tax= tbl_taxexemption::where('host', Auth::user()->organization )->orderby('id','desc')->get();
        $CROtax= tbl_taxexemption::orderby('id','desc')->get();
        return view('application.tax.tax_exempt',compact('tax','CROtax','id'))->with('success','Tax Exemption Assessment Saved Successfully!');
    }
public function downloadImage(Request $request, $app_id)
    {
       $filename = tbl_taxexemption_recommendation_doc::where('app_id', $app_id)->where('filecat','Recommendation_Letter')->value('doc_path');
       $pathToFile=storage_path()."/app/".$filename;
       return response()->download($pathToFile);     
    }
public function delete_file($id)
    {
        $id = $id;
        $me = new tbl_taxexemption_recommendation_doc;
        $me::where('app_id', $id)->where('filecat','application')->delete();
        $fin = tbl_taxexemption::where('id', $id)->get();
        $docs = tbl_taxexemption_recommendation_doc::where('app_id', $id)->get();
        return redirect()->route('tax_exempt_re_add',$id)->with('success','Document Deleted Successfully!');
    }
public function delete_file2($id)
    {
        $id = $id;
        $me = new tbl_taxexemption_recommendation_doc;
        $me::where('app_id', $id)->where('filecat','invoice')->delete();
        $fin = tbl_taxexemption::where('id', $id)->get();
        $docs = tbl_taxexemption_recommendation_doc::where('app_id', $id)->get();
        return redirect()->route('tax_exempt_re_add',$id)->with('success','Document Deleted Successfully!');
    }
public function tax_exempt_re_add($id)
    {
        $id = $id;
        $fin = tbl_taxexemption::where('id', $id)->get();
        $docs = tbl_taxexemption_recommendation_doc::where('app_id', $id)->get();
        return view('application.tax.tax_exempt_re_add', compact('fin','docs','id'));
    }
public function update_tax_resubmit(Request $request,$id)
    {
        $id = $id;
        $st = new tbl_taxexemption;
        $st::where('id',$id) 
            ->update([
                'resubmit' => 1,
                'approve' => 0,
                'updated_by'=> Auth::user()->id, 
                'updated_at'=> date('Y-m-d'),            
                ]);
         $application = 'application';
         if($request->application != 0){
         foreach ($request->application as $file) {
            $path = $file->store('Recommendation_Letter');
            tbl_taxexemption_recommendation_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $application,
                'doc_path' => $path
            ]);
            }
         }
         $invoice = 'invoice';
         if($request->invoice != 0){
         foreach ($request->invoice as $file) {
            $path = $file->store('Recommendation_Letter');
            tbl_taxexemption_recommendation_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $invoice,
                'doc_path' => $path
            ]);
            }
         }
        $request->session()->flash('alert-info', 'Details Resubmimtted Successfully');
        return redirect()->route('tax_exempt')->with('success','Details has been Updated and Resubmimtted for Assessment!');
    } 
    public function ro_tax_searching(Request $request)
    {
        $ro=$request->ro;
        $event = tbl_taxexemption::where('host', Auth::user()->organization)->get();

        $skra1=array();
        $orga = tbl_agency::where('agency', $ro)->value('id');
        $skra_activity=tbl_taxexemption::where('host',$orga)->value('host');
        $skra_activity1=explode(',',$skra_activity);
        foreach($skra_activity1 as $skra)
        {
        $skra1[]=trim($skra,'[]');
        }
        $CROtax=tbl_taxexemption::where('host',$skra1)->get();
        return view('application.tax.tax_dashboard', compact('event','CROtax'));
     }

///////DZONGKHA NEW////
public function tax_exempt_dzo()
    {
        $tax= tbl_taxexemption::where('host', Auth::user()->organization )->orderby('id','desc')->get();
        $CROtax= tbl_taxexemption::orderby('id','desc')->get();
        return view('application.tax.tax_exempt_dzo',compact('tax','CROtax'));
    }
public function tax_exempt_add_dzo()
    {    
        return view('application.tax.tax_exempt_add_dzo');
    }
public function store_taxexempt_dzo(Request $request)
    {        
        $host = Auth::user()->organization;
        $meet = new tbl_taxexemption;              
        $meet->host=$host;
        $meet->created_by=Auth::user()->id;    
        $meet->created_at=date('Y-m-d');
        $meet->save(); 
        $application = 'application';
         if($request->application != 0){
         foreach ($request->application as $file) {
            $path = $file->store('Recommendation_Letter');
            tbl_taxexemption_recommendation_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $meet->id,
                'filecat' => $application,
                'doc_path' => $path
            ]);
            }
         }
         $invoice = 'invoice';
         if($request->invoice != 0){
         foreach ($request->invoice as $file) {
            $path = $file->store('Recommendation_Letter');
            tbl_taxexemption_recommendation_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $meet->id,
                'filecat' => $invoice,
                'doc_path' => $path
            ]);
            }
         }
        return redirect()->route('tax_exempt_dzo',compact('tax','CROtax','tax_id'))->with('success','Tax Exemption Details Saved Successfully and Sent to CRO!');
    } 
public function taxexempt_review_dzo($id)
    {        
       $id = $id;
       $taxreview = tbl_taxexemption::where('id',$id)->get();
       $docs= tbl_taxexemption_recommendation_doc::where('app_id', $id )->orderby('id','desc')->get();
       return view('application.tax.taxexempt_viewdetails_dzo',compact('taxreview','id','docs'));
    }
public function approve_taxexempt_dzo(Request $request,$id)
    {
        $id = $id;
        $cda = tbl_taxexemption::where('id', $id)->value('id'); 
        $cda = tbl_taxexemption::where('id', $id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $Recommendation_Letter = 'Recommendation_Letter';
         if($request->Recommendation_Letter != 0){
         foreach ($request->Recommendation_Letter as $file) {
            $path = $file->store('Recommendation_Letter');
            tbl_taxexemption_recommendation_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $Recommendation_Letter,
                'doc_path' => $path
            ]);
            }
         }
        $tax= tbl_taxexemption::where('host', Auth::user()->organization )->orderby('id','desc')->get();
        $CROtax= tbl_taxexemption::orderby('id','desc')->get();
        return view('application.tax.tax_exempt_dzo',compact('tax','CROtax','id'))->with('success','Tax Exemption Assessment Saved Successfully!');
    }
public function ro_tax_searching_dzo(Request $request)
    {
        $ro=$request->ro;
        $event = tbl_taxexemption::where('host', Auth::user()->organization)->get();
        $skra1=array();
        $orga = tbl_agency::where('agency', $ro)->value('id');
        $skra_activity=tbl_taxexemption::where('host',$orga)->value('host');
        $skra_activity1=explode(',',$skra_activity);
        foreach($skra_activity1 as $skra)
        {
        $skra1[]=trim($skra,'[]');
        }
        $CROtax=tbl_taxexemption::where('host',$skra1)->get();
        return view('application.tax.tax_dashboard_dzo', compact('event','CROtax'));
     }
public function delete_file_dzo($id)
    {
        $id = $id;
        $me = new tbl_taxexemption_recommendation_doc;
        $me::where('app_id', $id)->where('filecat','application')->delete();
        $fin = tbl_taxexemption::where('id', $id)->get();
        $docs = tbl_taxexemption_recommendation_doc::where('app_id', $id)->get();
        return redirect()->route('tax_exempt_re_add_dzo',$id)->with('success','Document Deleted Successfully!');
    }
public function delete_file2_dzo($id)
    {
        $id = $id;
        $me = new tbl_taxexemption_recommendation_doc;
        $me::where('app_id', $id)->where('filecat','invoice')->delete();
        $fin = tbl_taxexemption::where('id', $id)->get();
        $docs = tbl_taxexemption_recommendation_doc::where('app_id', $id)->get();
        return redirect()->route('tax_exempt_re_add_dzo',$id)->with('success','Document Deleted Successfully!');
    }
public function tax_exempt_re_add_dzo($id)
    {
        $id = $id;
        $fin = tbl_taxexemption::where('id', $id)->get();
        $docs = tbl_taxexemption_recommendation_doc::where('app_id', $id)->get();
        return view('application.tax.tax_exempt_re_add_dzo', compact('fin','docs','id'));
    }
public function update_tax_resubmit_dzo(Request $request,$id)
    {
        $id = $id;
        $st = new tbl_taxexemption;
        $st::where('id',$id) 
            ->update([
                'resubmit' => 1,
                'approve' => 0,
                'updated_by'=> Auth::user()->id, 
                'updated_at'=> date('Y-m-d'),            
                ]);
         $application = 'application';
         if($request->application != 0){
         foreach ($request->application as $file) {
            $path = $file->store('Recommendation_Letter');
            tbl_taxexemption_recommendation_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $application,
                'doc_path' => $path
            ]);
            }
         }
         $invoice = 'invoice';
         if($request->invoice != 0){
         foreach ($request->invoice as $file) {
            $path = $file->store('Recommendation_Letter');
            tbl_taxexemption_recommendation_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $invoice,
                'doc_path' => $path
            ]);
            }
         }
        $request->session()->flash('alert-info', 'Details Resubmimtted Successfully');
        return redirect()->route('tax_exempt_dzo')->with('success','Details has been Updated and Resubmimtted for Assessment!');
    }
   
}
