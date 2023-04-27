<?php

namespace App\Http\Controllers\LocalChapter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Mail\SendEmail;
use App\user;
use App\tbl_chapter_detail;
use App\tbl_chapterregister_document;
use Image;

use App\tbl_chairman_detail;
use App\tbl_secretary_detail;
use App\tbl_treasurer_detail;
use App\tbl_agency;
use App\dzongkhag;
use App\gewog;
use App\village;
use App\token;
use Auth;
use Session;
use Mail;
use App\Http\Requests\ChapterRegisterDocumentRequest;

class LocalChapterController extends Controller
{
public function chapter_chairman_details_cid(Request $request,$det)
    {
        $cidno = $request->cidno;
        $dets = $det; 
        return view('application.local_chapter.chapter_chairman_details_cid',compact('dets','cidno'));
    }
    public function chapter_secretary_details_cid(Request $request,$det)
    {
        $cidno = $request->cidno;
        $dets = $det; 
        return view('application.local_chapter.chapter_secretary_details_cid',compact('dets','cidno'));
    }
    public function chapter_treasurer_details_cid(Request $request,$det)
    {
        $cidno = $request->cidno;
        $dets = $det; 
        return view('application.local_chapter.chapter_treasurer_details_cid',compact('dets','cidno'));
    }
    public function chapter_chairman_details_cid_dzo(Request $request,$det)
    {
        $cidno = $request->cidno;
        $dets = $det; 
        return view('application.local_chapter.chapter_chairman_details_cid_dzo',compact('dets','cidno'));
    }
    public function chapter_secretary_details_cid_dzo(Request $request,$det)
    {
        $cidno = $request->cidno;
        $dets = $det; 
        return view('application.local_chapter.chapter_secretary_details_cid_dzo',compact('dets','cidno'));
    }
    public function chapter_treasurer_details_cid_dzo(Request $request,$det)
    {
        $cidno = $request->cidno;
        $dets = $det; 
        return view('application.local_chapter.chapter_treasurer_details_cid_dzo',compact('dets','cidno'));
    }


    public function local_chapter()
    {
       $chapter =  tbl_chapter_detail::where('host',Auth::user()->organization)->get();
       $chapterall =  tbl_chapter_detail::all();
       return view('application.local_chapter.index',compact('chapter','chapterall'));
    }
    public function chapter_add()
    {
       $dets = ''; 
       return view('application.local_chapter.chapter_add',compact('dets'));
    }
    public function chapter_details_store(Request $request)
    {  
        $host = Auth::user()->organization;
        $app_no = $this->get_chapter_id(); 
        $chp= new tbl_chapter_detail;
        $chp->chapter_id=$app_no;
        $chp->chapter_name=$request->chapter_name;
        $chp->branchtype=$request->branchtype;
        $chp->dzongkhag=$request->type;
        $chp->gewog=$request->gewog;
        $chp->village=$request->village;
        $chp->location=$request->location;
        $chp->postbox=$request->postbox;
        $chp->phone=$request->phone;
        $chp->objective=$request->objective;
        $chp->email=$request->email;
        $chp->host=$host;
        $chp->created_by=Auth::user()->id;
        $chp->save();
        $det = $app_no;
        $detty = $request->chapter_name;
        $detties = $request->detties;
         $app = 'app';
         if($request->app != 0){
         foreach ($request->app as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'organization' => $detties,
                'chapter' => $detty,
                'filecat' => $app,
                'doc_path' => $path
            ]);
            }
         }  
         $ass = 'ass';
         if($request->ass != 0){
         foreach ($request->ass as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'organization' => $detties,
                'chapter' => $detty,
                'filecat' => $ass,
                'doc_path' => $path
            ]);
            }
         }  
         $aoa = 'aoa';
         if($request->aoa != 0){
         foreach ($request->aoa as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'chapter' => $detty,
                'organization' => $detties,
                'filecat' => $aoa,
                'doc_path' => $path
            ]);
            }
         }  

        $request->session()->flash('alert-info', 'Subsidiary/Branch details Added Successfully');
        return redirect()->route('chapter_chairman_details', $det)->with('success','Subsidiary/Branch details has been Saved!');
    }
    public function get_chapter_id()
    {  
        $y = date('Y'); 
        $lastno = tbl_chapter_detail::orderBy('id', 'desc')->first();
        if ( ! $lastno ){
        $number = 0;}
        else {$number = substr($lastno->chapter_id,4); }           
        $newnumber = sprintf(intval($number) + 1);              
        $result = sprintf("%s%s",$y, $newnumber);    
        return $result;  
    }
    public function chapter_chairman_details($det)
    {
        $dets = $det; 
        return view('application.local_chapter.chapter_chairman_details',compact('dets'));
    } 
    public function chapter_chairman_details_store(Request $request)
    {  
        $permit= new tbl_chairman_detail;
        $permit->chapter_id=$request->det;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;     
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
        $permit->save(); 
        $dets = $request->det;  
        $detties = $request->detties;
        $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'organization' => $detties,
                'filecat' => $cd,
                'doc_path' => $path
            ]);
            }
         }     
        $request->session()->flash('alert-info', 'Chairman details For Subsidiary/Branch Added Successfully');
        return redirect()->route('chapter_secretary_details', $dets)->with('success','Chairman details For Subsidiary/Branch has been Saved!');
    }
    public function chapter_secretary_details($det)
    {
        $dets = $det; 
        return view('application.local_chapter.chapter_secretary_details',compact('dets'));
    }
    public function chapter_secretary_details_store(Request $request)
    {  
        $permit= new tbl_secretary_detail;
        $permit->chapter_id=$request->det;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
        $permit->save(); 
        $dets = $request->det; 
        $detties = $request->detties;
        $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'organization' => $detties,
                'filecat' => $sd,
                'doc_path' => $path
            ]);
            }
         }                              
        $request->session()->flash('alert-info', 'Secretary details For Subsidiary/Branch Added Successfully');
        return redirect()->route('chapter_treasurer_details', $dets)->with('success','Secretary details has been Saved For Subsidiary/Branch!');
    }
    public function chapter_treasurer_details($det)
    {
        $dets = $det; 
        return view('application.local_chapter.chapter_treasurer_details',compact('dets'));
    }
    public function chapter_treasurer_details_store(Request $request)
    {  
        $per= new tbl_treasurer_detail;
        $per->chapter_id=$request->det;
        $per->name=$request->name;
        $per->dzongkhag=$request->type1;
        $per->dungkhag=$request->dungkhag;
        $per->gewog=$request->gewog;
        $per->village=$request->village;
        $per->houseno=$request->houseno;
        $per->thramno=$request->thramno;
        $per->dob=$request->dob;
        $per->qualification=$request->qualification;
        $per->phoneno=$request->phoneno;
        $per->email=$request->email;
        $per->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $per->photo=$file->getClientOriginalName();
        }
        $per->save(); 
        $dets = $request->det;                          
        $detties = $request->detties;
        $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'organization' => $detties,
                'filecat' => $td,
                'doc_path' => $path
            ]);
            }
         }        
        $request->session()->flash('alert-info', 'Treasurer details For Subsidiary/Branch Added Successfully');
        return redirect()->route('local_chapter')->with('success','Details has been Saved and Sent to CRO!');
    }
    public function view_chapters($chapter_id)
    {  
       $chapter =  tbl_chapter_detail::where('chapter_id',$chapter_id)->get();
       $cd =  tbl_chairman_detail::where('chapter_id', $chapter_id)->get();
       $sd =  tbl_secretary_detail::where('chapter_id', $chapter_id)->get();
       $td =  tbl_treasurer_detail::where('chapter_id', $chapter_id)->get();
       $rd = tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','app')->orwhere('filecat','ass')->orwhere('filecat','aoa')->orderby('id','desc')->get();
       $rdcd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','cd')->orderby('id','desc')->get();
       $rdsd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','sd')->orderby('id','desc')->get();
       $rdtd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','td')->orderby('id','desc')->get();

       return view('application.local_chapter.view_local_chapters', compact('chapter','cd','sd','td','chapter_id','rd','rdcd','rdsd','rdtd'));
    }
    public function edit_chapters($chapter_id)
    {
       $chapter =  tbl_chapter_detail::where('chapter_id',$chapter_id)->get();
       $cd =  tbl_chairman_detail::where('chapter_id', $chapter_id)->get();
       $sd =  tbl_secretary_detail::where('chapter_id', $chapter_id)->get();
       $td =  tbl_treasurer_detail::where('chapter_id', $chapter_id)->get();
       $rd = tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','app')->orwhere('filecat','ass')->orwhere('filecat','aoa')->orderby('id','desc')->get();
       $rdcd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','cd')->orderby('id','desc')->get();
       $rdsd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','sd')->orderby('id','desc')->get();
       $rdtd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','td')->orderby('id','desc')->get();
       return view('application.local_chapter.edit_chapters', compact('chapter','cd','sd','td','chapter_id','rd','rdcd','rdsd','rdtd'));
    }

     public function delete_chapterdoc($id,$chapter_id)
    {
        $me = new tbl_chapterregister_document;
        $me::where('id', $id)->delete();
        $chapter =  tbl_chapter_detail::where('chapter_id',$chapter_id)->get();
        $cd =  tbl_chairman_detail::where('chapter_id', $chapter_id)->get();
        $sd =  tbl_secretary_detail::where('chapter_id', $chapter_id)->get();
        $td =  tbl_treasurer_detail::where('chapter_id', $chapter_id)->get();
        $rd = tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','app')->orwhere('filecat','ass')->orwhere('filecat','aoa')->orderby('id','desc')->get();
        $rdcd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','cd')->orderby('id','desc')->get();
        $rdsd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','sd')->orderby('id','desc')->get();
        $rdtd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','td')->orderby('id','desc')->get();
        return view('application.local_chapter.edit_chapters', compact('chapter','cd','sd','td','chapter_id','rd','rdcd','rdsd','rdtd'));
    }
    public function update_chapter(Request $request,$chapter_id)
    {
        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $applicant = tbl_chapter_detail::where('chapter_id', $chapter_id)->value('chapter_id');
        $applicant = tbl_chapter_detail::where('chapter_id', $chapter_id)->firstOrFail(); 
        $applicant->chapter_name=$request->chapter_name;
        $applicant->branchtype=$request->branchtype;
        $applicant->dzongkhag=$request->type;
        $applicant->location=$request->location; 
        $applicant->postbox=$request->postbox; 
        $applicant->phone=$request->phone;
        $applicant->email=$request->email;
        $applicant->objective=$request->objective;
        $applicant->updated_by=Auth::user()->id;
        $applicant->updated_at=date('Y-m-d');
        $applicant->save();
        $app = 'app';
         if($request->app != 0){
         foreach ($request->app as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $app,
                'doc_path' => $path
            ]);
            }
         }  
         $ass = 'ass';
         if($request->ass != 0){
         foreach ($request->ass as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $ass,
                'doc_path' => $path
            ]);
            }
         }  
         $aoa = 'aoa';
         if($request->aoa != 0){
         foreach ($request->aoa as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $aoa,
                'doc_path' => $path
            ]);
            }
         }  

        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $dcd = tbl_chairman_detail::where('chapter_id', $chapter_id)->value('chapter_id'); 
        $dcd = tbl_chairman_detail::where('chapter_id', $chapter_id)->firstOrFail(); 
        $dcd->name=$request->cname;
        $dcd->dzongkhag=$request->ctype1;
        $dcd->village=$request->cvillage; 
        $dcd->gewog=$request->cgewog; 
        $dcd->dungkhag=$request->cdungkhag;
        $dcd->houseno=$request->chouseno;
        $dcd->thramno=$request->cthramno;
        $dcd->dob=$request->cdob;
        $dcd->qualification=$request->cqualification;
        $dcd->phoneno=$request->cphoneno;
        $dcd->email=$request->cemail;
        $dcd->appdate=$request->cappdate;
        if($request->hasFile('cnewphoto'))
        {
        $file=$request->file('cnewphoto');
        $file->move(public_path().'/images/',$file->getClientOriginalName());
        $dcd->photo=$file->getClientOriginalName();
        }
        else
        {
        $dcd->photo=$request->cphoto;
        }
        $dcd->updated_by=Auth::user()->id;
        $dcd->updated_at=date('Y-m-d');
        $dcd->save();
        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $cd,
                'doc_path' => $path
            ]);
            }
         }          

        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $cxd = tbl_secretary_detail::where('chapter_id', $chapter_id)->value('chapter_id'); 
        $cxd = tbl_secretary_detail::where('chapter_id', $chapter_id)->firstOrFail();
        $cxd->name=$request->s_name;
        $cxd->dzongkhag=$request->s_type1;
        $cxd->village=$request->s_village; 
        $cxd->gewog=$request->s_gewog; 
        $cxd->dungkhag=$request->s_dungkhag;
        $cxd->houseno=$request->s_houseno;
        $cxd->thramno=$request->s_thramno;
        $cxd->dob=$request->s_dob;
        $cxd->qualification=$request->s_qualification;
        $cxd->phoneno=$request->s_phoneno;
        $cxd->email=$request->s_email;
        $cxd->appdate=$request->s_appdate;
        if($request->hasFile('s_newphoto'))
        {
        $file=$request->file('s_newphoto');
        $file->move(public_path().'/images/',$file->getClientOriginalName());
        $cxd->photo=$file->getClientOriginalName();
        }
        else
        {
        $cxd->photo=$request->s_photo;
        }
        $cxd->updated_by=Auth::user()->id;
        $cxd->updated_at=date('Y-m-d');
        $cxd->save();

        $detties = $request->detties;
        $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $sd,
                'doc_path' => $path
            ]);
            }
         }        

        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $cod = tbl_treasurer_detail::where('chapter_id', $chapter_id)->value('chapter_id'); 
        $cod = tbl_treasurer_detail::where('chapter_id', $chapter_id)->firstOrFail();
        $cod->name=$request->td_name;
        $cod->dzongkhag=$request->td_type1;
        $cod->village=$request->td_village; 
        $cod->gewog=$request->td_gewog; 
        $cod->dungkhag=$request->td_dungkhag;
        $cod->houseno=$request->td_houseno;
        $cod->thramno=$request->td_thramno;
        $cod->dob=$request->td_dob;
        $cod->qualification=$request->td_qualification;
        $cod->phoneno=$request->td_phoneno;
        $cod->email=$request->td_email;
        $cod->appdate=$request->td_appdate;
        if($request->hasFile('td_newphoto'))
        {
        $file=$request->file('td_newphoto');
        $file->move(public_path().'/images/',$file->getClientOriginalName());
        $cod->photo=$file->getClientOriginalName();
        }
        else
        {
        $cod->photo=$request->td_photo;
        }
        $cod->updated_by=Auth::user()->id;
        $cod->updated_at=date('Y-m-d');
        $cod->save();
        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $td,
                'doc_path' => $path
            ]);
            }
         } 
        $request->session()->flash('alert-info', 'Details Updated Successfully');
        return redirect()->route('local_chapter')->with('success','Details has been Updated!');
    }
    public function approve_chapter(Request $request,$chapter_id)
    {
        $chapter_id = $chapter_id;
        $cda = tbl_chapter_detail::where('chapter_id', $chapter_id)->value('chapter_id'); 
        $cda = tbl_chapter_detail::where('chapter_id', $chapter_id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_by=Auth::user()->id;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $order = 'order';
         if($request->order != 0){
         foreach ($request->order as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'filecat' => $order,
                'doc_path' => $path
            ]);
            }
         }
        $request->session()->flash('alert-info', 'Assessment Details Updated Successfully');
        return redirect()->route('local_chapter')->with('success','Assessment Details has been Updated!');
     }

    ///////DZONGKHA/////////
    public function local_chapter_dzo()
    {
       $chapter =  tbl_chapter_detail::where('host',Auth::user()->organization)->get();
       $chapterall =  tbl_chapter_detail::all();
       return view('application.local_chapter.index_dzo',compact('chapter','chapterall'));
    }
    public function chapter_add_dzo()
    {
       $dets = ''; 
       return view('application.local_chapter.chapter_add_dzo',compact('dets'));
    }
    public function chapter_details_store_dzo(Request $request)
        {  
        $host = Auth::user()->organization;
        $app_no = $this->get_chapter_id(); 
        $chp= new tbl_chapter_detail;
        $chp->chapter_id=$app_no;
        $chp->chapter_name=$request->chapter_name;
        $chp->branchtype=$request->branchtype;
        $chp->dzongkhag=$request->type;
        $chp->gewog=$request->gewog;
        $chp->village=$request->village;
        $chp->location=$request->location;
        $chp->postbox=$request->postbox;
        $chp->phone=$request->phone;
        $chp->objective=$request->objective;
        $chp->email=$request->email;
        $chp->host=$host;
        $chp->created_by=Auth::user()->id;
        $chp->save();
        $det = $app_no;
        $detty = $request->chapter_name;
        $detties = $request->detties;
         $app = 'app';
         if($request->app != 0){
         foreach ($request->app as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'organization' => $detties,
                'chapter' => $detty,
                'filecat' => $app,
                'doc_path' => $path
            ]);
            }
         }  
         $ass = 'ass';
         if($request->ass != 0){
         foreach ($request->ass as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'organization' => $detties,
                'chapter' => $detty,
                'filecat' => $ass,
                'doc_path' => $path
            ]);
            }
         }  
         $aoa = 'aoa';
         if($request->aoa != 0){
         foreach ($request->aoa as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $det,
                'chapter' => $detty,
                'organization' => $detties,
                'filecat' => $aoa,
                'doc_path' => $path
            ]);
            }
         }  

        $request->session()->flash('alert-info', 'Subsidiary/Branch details Added Successfully');
        return redirect()->route('chapter_chairman_details_dzo', $det)->with('success','Subsidiary/Branch details has been Saved!');
    }
    public function chapter_chairman_details_dzo($det)
    {
        $dets = $det; 
        return view('application.local_chapter.chapter_chairman_details_dzo',compact('dets'));
    } 
    public function chapter_chairman_details_store_dzo(Request $request)
    {  
        $permit= new tbl_chairman_detail;
        $permit->chapter_id=$request->det;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;     
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
        $permit->save(); 
        $dets = $request->det;  
        $detties = $request->detties;
        $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'organization' => $detties,
                'filecat' => $cd,
                'doc_path' => $path
            ]);
            }
         }     
        $request->session()->flash('alert-info', 'Chairman details For Subsidiary/Branch Added Successfully');
        return redirect()->route('chapter_secretary_details_dzo', $dets)->with('success','Chairman details For Subsidiary/Branch has been Saved!');
    }
    public function chapter_secretary_details_dzo($det)
    {
        $dets = $det; 
        return view('application.local_chapter.chapter_secretary_details_dzo',compact('dets'));
    }
    public function chapter_secretary_details_store_dzo(Request $request)
    {  
        $permit= new tbl_secretary_detail;
        $permit->chapter_id=$request->det;
        $permit->name=$request->name;
        $permit->dzongkhag=$request->type1;
        $permit->dungkhag=$request->dungkhag;
        $permit->gewog=$request->gewog;
        $permit->village=$request->village;
        $permit->houseno=$request->houseno;
        $permit->thramno=$request->thramno;
        $permit->dob=$request->dob;
        $permit->qualification=$request->qualification;
        $permit->phoneno=$request->phoneno;
        $permit->email=$request->email;
        $permit->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $permit->photo=$file->getClientOriginalName();
        }
        $permit->save(); 
        $dets = $request->det; 
        $detties = $request->detties;
        $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'organization' => $detties,
                'filecat' => $sd,
                'doc_path' => $path
            ]);
            }
         }                              
        $request->session()->flash('alert-info', 'Secretary details For Subsidiary/Branch Added Successfully');
        return redirect()->route('chapter_treasurer_details_dzo', $dets)->with('success','Secretary details has been Saved For Subsidiary/Branch!');
    }
    public function chapter_treasurer_details_dzo($det)
    {
        $dets = $det; 
        return view('application.local_chapter.chapter_treasurer_details_dzo',compact('dets'));
    }
    public function chapter_treasurer_details_store_dzo(Request $request)
    {  
        $per= new tbl_treasurer_detail;
        $per->chapter_id=$request->det;
        $per->name=$request->name;
        $per->dzongkhag=$request->type1;
        $per->dungkhag=$request->dungkhag;
        $per->gewog=$request->gewog;
        $per->village=$request->village;
        $per->houseno=$request->houseno;
        $per->thramno=$request->thramno;
        $per->dob=$request->dob;
        $per->qualification=$request->qualification;
        $per->phoneno=$request->phoneno;
        $per->email=$request->email;
        $per->appdate=$request->appdate;
        if($request->hasFile('photo'))
        {
            $file=$request->file('photo');
            $file->move(public_path().'/images/',$file->getClientOriginalName());
            $per->photo=$file->getClientOriginalName();
        }
        $per->save(); 
        $dets = $request->det;                          
        $detties = $request->detties;
        $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $dets,
                'organization' => $detties,
                'filecat' => $td,
                'doc_path' => $path
            ]);
            }
         }        
        $request->session()->flash('alert-info', 'Treasurer details For Subsidiary/Branch Added Successfully');
        return redirect()->route('local_chapter_dzo')->with('success','Details has been Saved and Sent to CRO!');
    }
    public function view_chapters_dzo($chapter_id)
    {  
       $chapter =  tbl_chapter_detail::where('chapter_id',$chapter_id)->get();
       $cd =  tbl_chairman_detail::where('chapter_id', $chapter_id)->get();
       $sd =  tbl_secretary_detail::where('chapter_id', $chapter_id)->get();
       $td =  tbl_treasurer_detail::where('chapter_id', $chapter_id)->get();
       $rd = tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','app')->orwhere('filecat','ass')->orwhere('filecat','aoa')->orderby('id','desc')->get();
       $rdcd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','cd')->orderby('id','desc')->get();
       $rdsd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','sd')->orderby('id','desc')->get();
       $rdtd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','td')->orderby('id','desc')->get();

       return view('application.local_chapter.view_local_chapters_dzo', compact('chapter','cd','sd','td','chapter_id','rd','rdcd','rdsd','rdtd'));
    }
    public function edit_chapters_dzo($chapter_id)
    {
       $chapter =  tbl_chapter_detail::where('chapter_id',$chapter_id)->get();
       $cd =  tbl_chairman_detail::where('chapter_id', $chapter_id)->get();
       $sd =  tbl_secretary_detail::where('chapter_id', $chapter_id)->get();
       $td =  tbl_treasurer_detail::where('chapter_id', $chapter_id)->get();
       $rd = tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','app')->orwhere('filecat','ass')->orwhere('filecat','aoa')->orderby('id','desc')->get();
       $rdcd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','cd')->orderby('id','desc')->get();
       $rdsd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','sd')->orderby('id','desc')->get();
       $rdtd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','td')->orderby('id','desc')->get();
       return view('application.local_chapter.edit_chapters_dzo', compact('chapter','cd','sd','td','chapter_id','rd','rdcd','rdsd','rdtd'));
    }
    public function delete_chapterdoc_dzo($id,$chapter_id)
    {
        $me = new tbl_chapterregister_document;
        $me::where('id', $id)->delete();
        $chapter =  tbl_chapter_detail::where('chapter_id',$chapter_id)->get();
        $cd =  tbl_chairman_detail::where('chapter_id', $chapter_id)->get();
        $sd =  tbl_secretary_detail::where('chapter_id', $chapter_id)->get();
        $td =  tbl_treasurer_detail::where('chapter_id', $chapter_id)->get();
        $rd = tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','app')->orwhere('filecat','ass')->orwhere('filecat','aoa')->orderby('id','desc')->get();
        $rdcd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','cd')->orderby('id','desc')->get();
        $rdsd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','sd')->orderby('id','desc')->get();
        $rdtd =  tbl_chapterregister_document::where('ro_id', $chapter_id)->where('filecat','td')->orderby('id','desc')->get();
        return view('application.local_chapter.edit_chapters_dzo', compact('chapter','cd','sd','td','chapter_id','rd','rdcd','rdsd','rdtd'));
    }
    public function update_chapter_dzo(Request $request,$chapter_id)
    {
        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $applicant = tbl_chapter_detail::where('chapter_id', $chapter_id)->value('chapter_id');
        $applicant = tbl_chapter_detail::where('chapter_id', $chapter_id)->firstOrFail(); 
        $applicant->chapter_name=$request->chapter_name;
        $applicant->branchtype=$request->branchtype;
        $applicant->dzongkhag=$request->type;
        $applicant->location=$request->location; 
        $applicant->postbox=$request->postbox; 
        $applicant->phone=$request->phone;
        $applicant->email=$request->email;
        $applicant->objective=$request->objective;
        $applicant->updated_by=Auth::user()->id;
        $applicant->updated_at=date('Y-m-d');
        $applicant->save();
        $app = 'app';
         if($request->app != 0){
         foreach ($request->app as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $app,
                'doc_path' => $path
            ]);
            }
         }  
         $ass = 'ass';
         if($request->ass != 0){
         foreach ($request->ass as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $ass,
                'doc_path' => $path
            ]);
            }
         }  
         $aoa = 'aoa';
         if($request->aoa != 0){
         foreach ($request->aoa as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $aoa,
                'doc_path' => $path
            ]);
            }
         }  

        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $dcd = tbl_chairman_detail::where('chapter_id', $chapter_id)->value('chapter_id'); 
        $dcd = tbl_chairman_detail::where('chapter_id', $chapter_id)->firstOrFail(); 
        $dcd->name=$request->cname;
        $dcd->dzongkhag=$request->ctype1;
        $dcd->village=$request->cvillage; 
        $dcd->gewog=$request->cgewog; 
        $dcd->dungkhag=$request->cdungkhag;
        $dcd->houseno=$request->chouseno;
        $dcd->thramno=$request->cthramno;
        $dcd->dob=$request->cdob;
        $dcd->qualification=$request->cqualification;
        $dcd->phoneno=$request->cphoneno;
        $dcd->email=$request->cemail;
        $dcd->appdate=$request->cappdate;
        if($request->hasFile('cnewphoto'))
        {
        $file=$request->file('cnewphoto');
        $file->move(public_path().'/images/',$file->getClientOriginalName());
        $dcd->photo=$file->getClientOriginalName();
        }
        else
        {
        $dcd->photo=$request->cphoto;
        }
        $dcd->updated_by=Auth::user()->id;
        $dcd->updated_at=date('Y-m-d');
        $dcd->save();
        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $cd = 'cd';
         if($request->cd != 0){
         foreach ($request->cd as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $cd,
                'doc_path' => $path
            ]);
            }
         }          

        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $cxd = tbl_secretary_detail::where('chapter_id', $chapter_id)->value('chapter_id'); 
        $cxd = tbl_secretary_detail::where('chapter_id', $chapter_id)->firstOrFail();
        $cxd->name=$request->s_name;
        $cxd->dzongkhag=$request->s_type1;
        $cxd->village=$request->s_village; 
        $cxd->gewog=$request->s_gewog; 
        $cxd->dungkhag=$request->s_dungkhag;
        $cxd->houseno=$request->s_houseno;
        $cxd->thramno=$request->s_thramno;
        $cxd->dob=$request->s_dob;
        $cxd->qualification=$request->s_qualification;
        $cxd->phoneno=$request->s_phoneno;
        $cxd->email=$request->s_email;
        $cxd->appdate=$request->s_appdate;
        if($request->hasFile('s_newphoto'))
        {
        $file=$request->file('s_newphoto');
        $file->move(public_path().'/images/',$file->getClientOriginalName());
        $cxd->photo=$file->getClientOriginalName();
        }
        else
        {
        $cxd->photo=$request->s_photo;
        }
        $cxd->updated_by=Auth::user()->id;
        $cxd->updated_at=date('Y-m-d');
        $cxd->save();

        $detties = $request->detties;
        $sd = 'sd';
         if($request->sd != 0){
         foreach ($request->sd as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $sd,
                'doc_path' => $path
            ]);
            }
         }        

        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $cod = tbl_treasurer_detail::where('chapter_id', $chapter_id)->value('chapter_id'); 
        $cod = tbl_treasurer_detail::where('chapter_id', $chapter_id)->firstOrFail();
        $cod->name=$request->td_name;
        $cod->dzongkhag=$request->td_type1;
        $cod->village=$request->td_village; 
        $cod->gewog=$request->td_gewog; 
        $cod->dungkhag=$request->td_dungkhag;
        $cod->houseno=$request->td_houseno;
        $cod->thramno=$request->td_thramno;
        $cod->dob=$request->td_dob;
        $cod->qualification=$request->td_qualification;
        $cod->phoneno=$request->td_phoneno;
        $cod->email=$request->td_email;
        $cod->appdate=$request->td_appdate;
        if($request->hasFile('td_newphoto'))
        {
        $file=$request->file('td_newphoto');
        $file->move(public_path().'/images/',$file->getClientOriginalName());
        $cod->photo=$file->getClientOriginalName();
        }
        else
        {
        $cod->photo=$request->td_photo;
        }
        $cod->updated_by=Auth::user()->id;
        $cod->updated_at=date('Y-m-d');
        $cod->save();
        $chapter_id = $chapter_id;
        $detties = $request->detties;
        $td = 'td';
         if($request->td != 0){
         foreach ($request->td as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'organization' => $detties,
                'filecat' => $td,
                'doc_path' => $path
            ]);
            }
         } 
        $request->session()->flash('alert-info', 'Details Updated Successfully');
        return redirect()->route('local_chapter_dzo')->with('success','Details has been Updated!');
    }
     public function approve_chapter_dzo(Request $request,$chapter_id)
    {
        $chapter_id = $chapter_id;
        $cda = tbl_chapter_detail::where('chapter_id', $chapter_id)->value('chapter_id'); 
        $cda = tbl_chapter_detail::where('chapter_id', $chapter_id)->firstOrFail();
        $cda->approve=$request->approve;
        $cda->remarks=$request->remarks;
        $cda->updated_by=Auth::user()->id;
        $cda->updated_at=date('Y-m-d');
        $cda->save();
        $order = 'order';
         if($request->order != 0){
         foreach ($request->order as $file) {
            $path = $file->store('chapter_register_documents');
            tbl_chapterregister_document::create([
                'file_name' => $file->getClientOriginalName(),
                'ro_id' => $chapter_id,
                'filecat' => $order,
                'doc_path' => $path
            ]);
            }
         }
        $request->session()->flash('alert-info', 'Assessment Details Updated Successfully');
        return redirect()->route('local_chapter_dzo')->with('success','Assessment Details has been Updated!');
     }

}
