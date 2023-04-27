<?php

namespace App\Http\Controllers\Visa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\tbl_agency;
use App\tbl_visa_purpose;
use App\tbl_visaapproval_order_doc;
use App\tbl_visa_application;
use App\tbl_visa_application_doc;
use Auth;
use Session;
use App\tbl_visa_application_student;
use App\Http\Requests\visa_applicationRequest;
use App\Http\Requests\visaapproval_orderRequest;

class VisaController extends Controller
{  

    public function downloadImage(Request $request, $application_id)
    {
       $filename = tbl_visaapproval_order_doc::where('application_id', $application_id)->where('filecat','order')->value('doc_path');
       $pathToFile=storage_path()."/app/".$filename;
       return response()->download($pathToFile);     
    }
     public function downloadImagestd(Request $request, $application_id)
    {
       $filename = tbl_visaapproval_order_doc::where('application_id', $application_id)->where('filecat','student_visa_order')->value('doc_path');
       $pathToFile=storage_path()."/app/".$filename;
       return response()->download($pathToFile);     
    }
    public function visa_application()
    {
        $visa_all = tbl_visa_application::where('approve','0')->groupby('purposeid')->get();
        $visa_ro_wise = tbl_visa_application::where('host', Auth::user()->organization)->get();
        return view('application.visa.visa_application', compact('visa_all','visa_ro_wise'));
    }
    public function visa_application_purpose(Request $request) 
    {     
        $v = new tbl_visa_purpose;
        $v->purpose= $request->purpose;
        $v->created_by=Auth::user()->id;
        $v->created_at=date('Y-m-d');
        $v->save();
         $itenary = 'itenary';
         if($request->itenary != 0){
         foreach ($request->itenary as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $v->id,
                'filecat' => $itenary,
                'doc_path' => $path
            ]);
            }
         }  
        $purposeid = $v->id;  
        return redirect()->route('apply_visa_page', compact('purposeid'))->with('success','Fill Visa Form and Subit for Review!');   
    } 
    public function apply_visa_page($purposeid)
    {
         $agency = tbl_agency::all();
         return view('application.visa.apply_visa', compact('purposeid','agency'));
    } 
    public function visaapplication_store(Request $request)
    {  
        $ro_id = $request->ro_id;
        $purposeid = $request->purposeid;
        $host = Auth::user()->organization;     
        $lastid = $purposeid;
        $year = date("Y");
        $app_no = $year.''.$lastid;      
        $visa = new tbl_visa_application;      
        $visa->application_no=$app_no;
        $visa->ro_id=$ro_id;            
        $visa->purposeid=$purposeid;

        $visa->name=$request->name;
        $visa->dob=$request->dob;
        $visa->pob=$request->pob;
        $visa->cob=$request->cob;
        $visa->current_nationality=$request->current_nationality;
        $visa->birth_nationality=$request->birth_nationality;
        $visa->sex=$request->sex;
        $visa->marital_status=$request->marital_status;
        $visa->passport_type=$request->passport_type;
        $visa->passportno=$request->passportno;
        $visa->issueplace=$request->issueplace;
        $visa->issuedate=$request->issuedate;
        $visa->validity=$request->validity;
        $visa->per_address=$request->per_address;
        $visa->telephone=$request->telephone;
        $visa->occupation=$request->occupation;
        $visa->from=$request->from;
        $visa->to=$request->to;
        $visa->entryport=$request->entryport;
        $visa->exitport=$request->exitport;
        $visa->accompany=$request->accompany;
        $visa->accompanyname=$request->accompanyname;
        $visa->accompanyname2=$request->accompanyname2;
        $visa->firstvisit=$request->firstvisit;
        $visa->visitdetails=$request->visitdetails;
       //$visa->email=$request->email;             
        $visa->created_by=Auth::user()->id;
        $visa->created_at=date('Y-m-d');
        $visa->host=$host;
        $visa->save(); 
        $visa_application = 'visa_application';
         if($request->visa_application != 0){
         foreach ($request->visa_application as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $visa->id,
                'filecat' => $visa_application,
                'doc_path' => $path
            ]);
            }
         }  
        $passport = 'passport';
         if($request->passport != 0){
         foreach ($request->passport as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $visa->id,
                'filecat' => $passport,
                'doc_path' => $path
            ]);
            }
         }  
        $passportphoto = 'passportphoto';
         if($request->passportphoto != 0){
         foreach ($request->passportphoto as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $visa->id,
                'filecat' => $passportphoto,
                'doc_path' => $path
            ]);
            }
         }
        return redirect()->route('visaapplication_list', compact('purposeid'))->with('success','Visa Application Details Saved,Add more Guests!');
    } 
    public function visaapplication_list($purposeid)
    {
        $agency = tbl_agency::all();
        $purpose = tbl_visa_purpose::where('id', $purposeid)->value('purpose');
        $visa = tbl_visa_application::where('purposeid', $purposeid)->get();
        return view('application.visa.visaapplication_list', compact('purposeid','agency','visa','purpose'));
    } 
    public function visaapplication_review($purposeid,$id)
    {
        $agency = tbl_agency::all();
        $purpose = tbl_visa_purpose::where('id', $purposeid)->value('purpose');
        $visa = tbl_visa_application::where('purposeid', $purposeid)->where('id',$id)->get();
        $docs = tbl_visa_application_doc::where('app_id', $id)->get();
        return view('application.visa.visaapplication_review', compact('purposeid','agency','visa','purpose','docs'));
    } 
    public function approve_visa(Request $request,$id)
    {
        $id = $id;
        $purposeid = $request->purposeid;
        $cda = tbl_visa_application::where('id', $id)->value('id'); 
        $cda = tbl_visa_application::where('id', $id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $order = 'order';
         if($request->order != 0){
         foreach ($request->order as $file) {
            $path = $file->store('visaapproval_order');
            tbl_visaapproval_order_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'application_id' => $id,
                'filecat' => $order,
                'doc_path' => $path
            ]);
            }
         }
        return redirect()->route('visaapplication_list', compact('id','purposeid'))->with('success','Visa Application Assessment Saved!');
    }
    public function visaapplication_resubmit($purposeid,$id)
    {
        $agency = tbl_agency::all();
        $purpose = tbl_visa_purpose::where('id', $purposeid)->value('purpose');
        $visa = tbl_visa_application::where('purposeid', $purposeid)->where('id',$id)->get();
        $docs = tbl_visa_application_doc::where('app_id', $id)->get();
        return view('application.visa.visaapplication_resubmit', compact('purposeid','agency','visa','purpose','docs','id'));
    } 
     public function update_visa(Request $request,$id)
    {
        $id = $id;
        $st = new tbl_visa_application;
        $st::where('id',$id) 
            ->update([
                'name' => $request->name,
                'dob'=> $request->dob,
                'pob'=> $request->pob,
                'cob'=> $request->cob,
                'current_nationality'=> $request->current_nationality,
                'birth_nationality'=> $request->birth_nationality,
                'sex'=> $request->sex,
                'marital_status'=> $request->marital_status,
                'passport_type'=> $request->passport_type,
                'passportno'=> $request->passportno,
                'issueplace'=> $request->issueplace,
                'issuedate'=> $request->issuedate,
                'validity'=> $request->validity,
                'per_address'=> $request->per_address,
                'telephone'=>$request->telephone,
                'occupation'=>$request->occupation,
                'from'=>$request->from,
                'to'=>$request->to,
                'entryport'=>$request->entryport,
                'exitport'=>$request->exitport,
                'accompany'=>$request->accompany,
                'accompanyname'=>$request->accompanyname,
                'firstvisit'=>$request->firstvisit,
                'visitdetails'=>$request->visitdetails,
                'approve' => 0,   
                'resubmission' => 1,             
                'updated_by'=> Auth::user()->id, 
                'updated_at'=> date('Y-m-d'),            
                ]);

            $visa_application = 'visa_application';
            if($request->visa_application != 0){
            foreach ($request->visa_application as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $visa_application,
                'doc_path' => $path
            ]);
            }
            }  
            $passport = 'passport';
            if($request->passport != 0){
            foreach ($request->passport as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $passport,
                'doc_path' => $path
            ]);
            }
            }  
            $passportphoto = 'passportphoto';
            if($request->passportphoto != 0){
            foreach ($request->passportphoto as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $visa->id,
                'filecat' => $passportphoto,
                'doc_path' => $path
            ]);
            }
            }


        $request->session()->flash('alert-info', 'Details Updated Successfully');
        return redirect()->route('visa_application')->with('success','Details has been Updated and Resubmimtted for Assessment!');
    }

////////DZONGKHA///////////
    public function visa_application_dzo()
    {
        $visa_all = tbl_visa_application::where('approve','0')->groupby('purposeid')->get();
        $visa_ro_wise = tbl_visa_application::where('host', Auth::user()->organization)->get();
        return view('application.visa.visa_application_dzo', compact('visa_all','visa_ro_wise'));
    }
    public function visa_application_purpose_dzo(Request $request) 
    {     
        $v = new tbl_visa_purpose;
        $v->purpose= $request->purpose;
        $v->created_by=Auth::user()->id;
        $v->created_at=date('Y-m-d');
        $v->save();
        $itenary = 'itenary';
         if($request->itenary != 0){
         foreach ($request->itenary as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $v->id,
                'filecat' => $itenary,
                'doc_path' => $path
            ]);
            }
         } 
        $purposeid = $v->id;  
        return redirect()->route('apply_visa_page_dzo', compact('purposeid'))->with('success','Fill Visa Form and Subit for Review!');   
    } 
    public function apply_visa_page_dzo($purposeid)
    {
         $agency = tbl_agency::all();
         return view('application.visa.apply_visa_dzo', compact('purposeid','agency'));
    } 
    public function visaapplication_store_dzo(Request $request)
    {  
        $ro_id = $request->ro_id;
        $purposeid = $request->purposeid;
        $host = Auth::user()->organization;     
        $lastid = $purposeid;
        $year = date("Y");
        $app_no = $year.''.$lastid;      
        $visa = new tbl_visa_application;      
        $visa->application_no=$app_no;
        $visa->ro_id=$ro_id;            
        $visa->purposeid=$purposeid;

        $visa->name=$request->name;
        $visa->dob=$request->dob;
        $visa->pob=$request->pob;
        $visa->cob=$request->cob;
        $visa->current_nationality=$request->current_nationality;
        $visa->birth_nationality=$request->birth_nationality;
        $visa->sex=$request->sex;
        $visa->marital_status=$request->marital_status;
        $visa->passport_type=$request->passport_type;
        $visa->passportno=$request->passportno;
        $visa->issueplace=$request->issueplace;
        $visa->issuedate=$request->issuedate;
        $visa->validity=$request->validity;
        $visa->per_address=$request->per_address;
        $visa->telephone=$request->telephone;
        $visa->occupation=$request->occupation;
        $visa->from=$request->from;
        $visa->to=$request->to;
        $visa->entryport=$request->entryport;
        $visa->exitport=$request->exitport;
        $visa->accompany=$request->accompany;
        $visa->accompanyname=$request->accompanyname;
        $visa->accompanyname2=$request->accompanyname2;
        $visa->firstvisit=$request->firstvisit;
        $visa->visitdetails=$request->visitdetails;
       //$visa->email=$request->email;             
        $visa->created_by=Auth::user()->id;
        $visa->created_at=date('Y-m-d');
        $visa->host=$host;
        $visa->save(); 
        $visa_application = 'visa_application';
         if($request->visa_application != 0){
         foreach ($request->visa_application as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $visa->id,
                'filecat' => $visa_application,
                'doc_path' => $path
            ]);
            }
         }  
        $passport = 'passport';
         if($request->passport != 0){
         foreach ($request->passport as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $visa->id,
                'filecat' => $passport,
                'doc_path' => $path
            ]);
            }
         }  
        $passportphoto = 'passportphoto';
         if($request->passportphoto != 0){
         foreach ($request->passportphoto as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $visa->id,
                'filecat' => $passportphoto,
                'doc_path' => $path
            ]);
            }
         }
        return redirect()->route('visaapplication_list_dzo', compact('purposeid'))->with('success','Visa Application Details Saved,Add more Guests!');
    } 
    public function visaapplication_list_dzo($purposeid)
    {
        $agency = tbl_agency::all();
        $purpose = tbl_visa_purpose::where('id', $purposeid)->value('purpose');
        $visa = tbl_visa_application::where('purposeid', $purposeid)->get();
        return view('application.visa.visaapplication_list_dzo', compact('purposeid','agency','visa','purpose'));
    } 
    public function visaapplication_review_dzo($purposeid,$id)
    {
        $agency = tbl_agency::all();
        $purpose = tbl_visa_purpose::where('id', $purposeid)->value('purpose');
        $visa = tbl_visa_application::where('purposeid', $purposeid)->where('id',$id)->get();
        $docs = tbl_visa_application_doc::where('app_id', $id)->get();
        return view('application.visa.visaapplication_review_dzo', compact('purposeid','agency','visa','purpose','docs'));
    } 
    public function approve_visa_dzo(Request $request,$id)
    {
        $id = $id;
        $purposeid = $request->purposeid;
        $cda = tbl_visa_application::where('id', $id)->value('id'); 
        $cda = tbl_visa_application::where('id', $id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $order = 'order';
         if($request->order != 0){
         foreach ($request->order as $file) {
            $path = $file->store('visaapproval_order');
            tbl_visaapproval_order_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'application_id' => $id,
                'filecat' => $order,
                'doc_path' => $path
            ]);
            }
         }
        return redirect()->route('visaapplication_list_dzo', compact('id','purposeid'))->with('success','Visa Application Assessment Saved!');
    }
    public function visaapplication_resubmit_dzo($purposeid,$id)
    {
        $agency = tbl_agency::all();
        $purpose = tbl_visa_purpose::where('id', $purposeid)->value('purpose');
        $visa = tbl_visa_application::where('purposeid', $purposeid)->where('id',$id)->get();
        $docs = tbl_visa_application_doc::where('app_id', $id)->get();
        return view('application.visa.visaapplication_resubmit_dzo', compact('purposeid','agency','visa','purpose','docs','id'));
    } 
     public function update_visa_dzo(Request $request,$id)
    {
        $id = $id;
        $st = new tbl_visa_application;
        $st::where('id',$id) 
            ->update([
                'name' => $request->name,
                'dob'=> $request->dob,
                'pob'=> $request->pob,
                'cob'=> $request->cob,
                'current_nationality'=> $request->current_nationality,
                'birth_nationality'=> $request->birth_nationality,
                'sex'=> $request->sex,
                'marital_status'=> $request->marital_status,
                'passport_type'=> $request->passport_type,
                'passportno'=> $request->passportno,
                'issueplace'=> $request->issueplace,
                'issuedate'=> $request->issuedate,
                'validity'=> $request->validity,
                'per_address'=> $request->per_address,
                'telephone'=>$request->telephone,
                'occupation'=>$request->occupation,
                'from'=>$request->from,
                'to'=>$request->to,
                'entryport'=>$request->entryport,
                'exitport'=>$request->exitport,
                'accompany'=>$request->accompany,
                'accompanyname'=>$request->accompanyname,
                'firstvisit'=>$request->firstvisit,
                'visitdetails'=>$request->visitdetails,
                'approve' => 0,   
                'resubmission' => 1,             
                'updated_by'=> Auth::user()->id, 
                'updated_at'=> date('Y-m-d'),            
                ]);

            $visa_application = 'visa_application';
            if($request->visa_application != 0){
            foreach ($request->visa_application as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $visa_application,
                'doc_path' => $path
            ]);
            }
            }  
            $passport = 'passport';
            if($request->passport != 0){
            foreach ($request->passport as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $passport,
                'doc_path' => $path
            ]);
            }
            }  
            $passportphoto = 'passportphoto';
            if($request->passportphoto != 0){
            foreach ($request->passportphoto as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $visa->id,
                'filecat' => $passportphoto,
                'doc_path' => $path
            ]);
            }
            }


        $request->session()->flash('alert-info', 'Details Updated Successfully');
        return redirect()->route('visa_application_dzo')->with('success','Details has been Updated and Resubmimtted for Assessment!');
    }
    ////STUDENT VISA///
    public function visa_application_std()
    {
        $visa_all = tbl_visa_application_student::where('approve','0')->get();
        $visa_ro_wise = tbl_visa_application_student::where('host', Auth::user()->organization)->get();
        $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        return view('application.visa.visa_application_std', compact('visa_all','visa_ro_wise','agency'));
    }
     public function visa_application_student(Request $request) 
    {     
        $ro_id = $request->ro_id;
        $host = Auth::user()->organization;  
        $application_no = $this->get_spvisa_id();      
        $v = new tbl_visa_application_student; 
        $v->application_no=$application_no;
        $v->ro_id=$ro_id;            
        $v->created_by=Auth::user()->id;
        $v->created_at=date('Y-m-d');
        $v->host=$host;
        $v->save();
         $student_visa = 'student_visa';
         if($request->student_visa != 0){
         foreach ($request->student_visa as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $v->id,
                'filecat' => $student_visa,
                'doc_path' => $path
            ]);
            }
         }  
         $student_permit = 'student_permit';
         if($request->student_permit != 0){
         foreach ($request->student_permit as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $v->id,
                'filecat' => $student_permit,
                'doc_path' => $path
            ]);
            }
         }  
         $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $visa_all = tbl_visa_application_student::where('approve','0')->get();
        $visa_ro_wise = tbl_visa_application_student::where('host', Auth::user()->organization)->get();  
        return view('application.visa.visa_application_std', compact('visa_all','visa_ro_wise','agency'))->with('success','Student Visa Form Sent for Review!');   
    } 
     public function get_spvisa_id()
    {  
        $y = date('Y'); 
        $lastno = tbl_visa_application_student::orderBy('id', 'desc')->first();
        if ( ! $lastno ){
        $number = 0;}
        else {$number = substr($lastno->application_no,4); }           
        $newnumber = sprintf(intval($number) + 1);              
        $result = sprintf("%s%s", $y, $newnumber);   
        return $result;  
    }
    public function visaapplication_review_std($application_no,$id)
    {
        $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $visa = tbl_visa_application_student::where('application_no', $application_no)->where('id',$id)->get();
        $docs = tbl_visa_application_doc::where('app_id', $id)->get();
        return view('application.visa.visaapplication_review_std', compact('application_no','agency','visa','docs'));
    } 
    public function approve_visa_std(Request $request,$id)
    {
        $id = $id;
        $application_no = $request->application_no;
        $cda = tbl_visa_application_student::where('id', $id)->value('id'); 
        $cda = tbl_visa_application_student::where('id', $id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $student_visa_order = 'student_visa_order';
         if($request->student_visa_order != 0){
         foreach ($request->student_visa_order as $file) {
            $path = $file->store('visaapproval_order');
            tbl_visaapproval_order_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'application_id' => $id,
                'filecat' => $student_visa_order,
                'doc_path' => $path
            ]);
            }
         }
        return redirect()->route('visa_application_std')->with('success','Student Visa Application Assessment Saved!');
    } 

    public function visaapplication_resubmit_std($application_no,$id)
    {
        $visa_all = tbl_visa_application_student::where('approve','0')->get();
        $visa_ro_wise = tbl_visa_application_student::where('host', Auth::user()->organization)->get();
        $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $docs = tbl_visa_application_doc::where('app_id', $id)->get();

        return view('application.visa.visaapplication_resubmit_std', compact('visa_all','visa_ro_wise','agency','docs','id','application_no'));
    } 
    public function delete_stdvisa($application_no,$id,$deleteid)
    {
        $me = new tbl_visa_application_doc;
        $me::where('app_id', $deleteid)->where('filecat','student_visa')->delete();
        $application_no = $application_no;
        $id = $id;
        $visa_all = tbl_visa_application_student::where('approve','0')->get();
        $visa_ro_wise = tbl_visa_application_student::where('host', Auth::user()->organization)->get();
        $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $docs = tbl_visa_application_doc::where('app_id', $deleteid)->get();

        return view('application.visa.visaapplication_resubmit_std', compact('visa_all','visa_ro_wise','agency','docs','id','application_no'));
    }
     public function delete_stdpermit($application_no,$id,$deleteid)
    {
        $me = new tbl_visa_application_doc;
        $me::where('app_id', $deleteid)->where('filecat','student_permit')->delete();
        $application_no = $application_no;
        $id = $id;
        $visa_all = tbl_visa_application_student::where('approve','0')->get();
        $visa_ro_wise = tbl_visa_application_student::where('host', Auth::user()->organization)->get();
        $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $docs = tbl_visa_application_doc::where('app_id', $deleteid)->get();

        return view('application.visa.visaapplication_resubmit_std', compact('visa_all','visa_ro_wise','agency','docs','id','application_no'));
    }
     public function update_visa_std(Request $request,$id)
    {
        $id = $id;
        $st = new tbl_visa_application_student;
        $st::where('id',$id) 
            ->update([
                'approve' => 0,   
                'resubmission' => 1,             
                'updated_at'=> date('Y-m-d'),            
                ]);

            $student_visa = 'student_visa';
            if($request->student_visa != 0){
            foreach ($request->student_visa as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $student_visa,
                'doc_path' => $path
            ]);
            }
            }  
            $student_permit = 'student_permit';
            if($request->student_permit != 0){
            foreach ($request->student_permit as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $student_permit,
                'doc_path' => $path
            ]);
            }
            }  

        $request->session()->flash('alert-info', 'Details Updated Successfully');
        return redirect()->route('visa_application_std')->with('success','Details has been Updated and Resubmimtted for Assessment!');
    }
    ////STUDENT VISA DZONGKHA///
    public function visa_application_std_dzo()
    {
        $visa_all = tbl_visa_application_student::where('approve','0')->get();
        $visa_ro_wise = tbl_visa_application_student::where('host', Auth::user()->organization)->get();
        $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        return view('application.visa.visa_application_std_dzo', compact('visa_all','visa_ro_wise','agency'));
    }
    public function visa_application_student_dzo(Request $request) 
    {     
        $ro_id = $request->ro_id;
        $host = Auth::user()->organization;  
        $application_no = $this->get_spvisa_id();      
        $v = new tbl_visa_application_student; 
        $v->application_no=$application_no;
        $v->ro_id=$ro_id;            
        $v->created_by=Auth::user()->id;
        $v->created_at=date('Y-m-d');
        $v->host=$host;
        $v->save();
         $student_visa = 'student_visa';
         if($request->student_visa != 0){
         foreach ($request->student_visa as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $v->id,
                'filecat' => $student_visa,
                'doc_path' => $path
            ]);
            }
         }  
         $student_permit = 'student_permit';
         if($request->student_permit != 0){
         foreach ($request->student_permit as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $v->id,
                'filecat' => $student_permit,
                'doc_path' => $path
            ]);
            }
         }  
         $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $visa_all = tbl_visa_application_student::where('approve','0')->get();
        $visa_ro_wise = tbl_visa_application_student::where('host', Auth::user()->organization)->get();  
        return view('application.visa.visa_application_std_dzo', compact('visa_all','visa_ro_wise','agency'))->with('success','Student Visa Form Sent for Review!');   
    }   
    public function visaapplication_review_std_dzo($application_no,$id)
    {
        $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $visa = tbl_visa_application_student::where('application_no', $application_no)->where('id',$id)->get();
        $docs = tbl_visa_application_doc::where('app_id', $id)->get();
        return view('application.visa.visaapplication_review_std_dzo', compact('application_no','agency','visa','docs'));
    } 
    public function approve_visa_std_dzo(Request $request,$id)
    {
        $id = $id;
        $application_no = $request->application_no;
        $cda = tbl_visa_application_student::where('id', $id)->value('id'); 
        $cda = tbl_visa_application_student::where('id', $id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $student_visa_order = 'student_visa_order';
         if($request->student_visa_order != 0){
         foreach ($request->student_visa_order as $file) {
            $path = $file->store('visaapproval_order');
            tbl_visaapproval_order_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'application_id' => $id,
                'filecat' => $student_visa_order,
                'doc_path' => $path
            ]);
            }
         }
        return redirect()->route('visa_application_std_dzo')->with('success','Student Visa Application Assessment Saved!');
    } 

    public function visaapplication_resubmit_std_dzo($application_no,$id)
    {
        $visa_all = tbl_visa_application_student::where('approve','0')->get();
        $visa_ro_wise = tbl_visa_application_student::where('host', Auth::user()->organization)->get();
        $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $docs = tbl_visa_application_doc::where('app_id', $id)->get();

        return view('application.visa.visaapplication_resubmit_std_dzo', compact('visa_all','visa_ro_wise','agency','docs','id','application_no'));
    } 
    public function delete_stdvisa_dzo($application_no,$id,$deleteid)
    {
        $me = new tbl_visa_application_doc;
        $me::where('app_id', $deleteid)->where('filecat','student_visa')->delete();
        $application_no = $application_no;
        $id = $id;
        $visa_all = tbl_visa_application_student::where('approve','0')->get();
        $visa_ro_wise = tbl_visa_application_student::where('host', Auth::user()->organization)->get();
        $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $docs = tbl_visa_application_doc::where('app_id', $deleteid)->get();

        return view('application.visa.visaapplication_resubmit_std_dzo', compact('visa_all','visa_ro_wise','agency','docs','id','application_no'));
    }
     public function delete_stdpermit_dzo($application_no,$id,$deleteid)
    {
        $me = new tbl_visa_application_doc;
        $me::where('app_id', $deleteid)->where('filecat','student_permit')->delete();
        $application_no = $application_no;
        $id = $id;
        $visa_all = tbl_visa_application_student::where('approve','0')->get();
        $visa_ro_wise = tbl_visa_application_student::where('host', Auth::user()->organization)->get();
        $agency = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $docs = tbl_visa_application_doc::where('app_id', $deleteid)->get();

        return view('application.visa.visaapplication_resubmit_std_dzo', compact('visa_all','visa_ro_wise','agency','docs','id','application_no'));
    }
     public function update_visa_std_dzo(Request $request,$id)
    {
        $id = $id;
        $st = new tbl_visa_application_student;
        $st::where('id',$id) 
            ->update([
                'approve' => 0,   
                'resubmission' => 1,             
                'updated_at'=> date('Y-m-d'),            
                ]);

            $student_visa = 'student_visa';
            if($request->student_visa != 0){
            foreach ($request->student_visa as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $student_visa,
                'doc_path' => $path
            ]);
            }
            }  
            $student_permit = 'student_permit';
            if($request->student_permit != 0){
            foreach ($request->student_permit as $file) {
            $path = $file->store('visa_applications');
            tbl_visa_application_doc::create([
                'file_name' => $file->getClientOriginalName(),
                'app_id' => $id,
                'filecat' => $student_permit,
                'doc_path' => $path
            ]);
            }
            }  

        $request->session()->flash('alert-info', 'Details Updated Successfully');
        return redirect()->route('visa_application_std_dzo')->with('success','Details has been Updated and Resubmimtted for Assessment!');
       
    }

}
