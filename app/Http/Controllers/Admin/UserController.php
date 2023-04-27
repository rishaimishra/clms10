<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use App\Mail\SendEmail;
use App\Mail\tokenSendEmail;
use App\user;
use App\token;
use App\tbl_ro_detail;
use DB;
use Mail;
use Session;
use App\Mail\PassResetSendEmail;

use App\tbl_designation;

class UserController extends Controller
{
   

    public function index()
    {
        $users = user::all();
        $msg = 0;
        return view('admin.user.index', compact('users', 'msg'));
    }
    public function postUser(Request $request)
    {
        try
        {
        $user = new user;
        $user->name = $request->uname;
        $user->email = $request->email;
        $user->organization=$request->organization;
        $user->role_id = $request->role_id;
        $user->dzongkhag_id=$request->type;
        $password = 'pass@123';
        $user->password = Hash::make($password);
        $user->save(); 
        $myEmail = $request->email;
        Mail::to($myEmail)->send(new SendEmail($user, $password));        
        $users = user::all();
        $msg = 0;
     //   \LogActivity::addToLog('created an User', $request->uname);
        return view('admin.user.index', compact('users', 'msg'))->with('success','Email Successfully Sent!');
      }
      catch(QueryException $e) {

        if($e->errorInfo[1] == 1062) {
            $msg = 1;
            $users = user::all();
            $notification = array(
            'message' => 'Duplicate e-Mail Not Allowed', 
            'alert-type' => 'error'
        );
        session()->put('notification',$notification);
        return view('admin.user.index', compact('users', 'msg'))->with('danger','Duplicate e-Mail Not Allowed!');
        } else {
            throw $e;
        }
      }

    } 
    public function view(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = user::find($id);
            return response()->json($info);
        }
    } 
    public function updateUser(Request $request)
     {
        try
        {
        $id = $request->edit_id;
        $name = $request->uname;
        $email = $request->email;
        $organization = $request->organization;
        $dzongkhag_id=$request->type;
        $role_id =  $request->role_id;
        $user = new user;
        $user::where('id',$id)
            ->update([
                'organization' => $organization,
                'name'=> $name,
                'email'=> $email,
                'dzongkhag_id'=> $dzongkhag_id,
                'role_id' =>$role_id
                ]);
        $users = user::all();
        $msg = 0;
        return view('admin.user.index', compact('users', 'msg'));
       }
        catch(QueryException $e) {
        if($e->errorInfo[1] == 1062) {
            $msg = 1;
            $users = user::all();
            $notification = array(
            'message' => 'Duplicate e-Mail Not Allowed', 
            'alert-type' => 'error'
        );
        session()->put('notification',$notification);
        return view('admin.user.index', compact('users', 'msg'));
        } else {
            throw $e;
        }
      }
    }
    public function deleteUser($id)
    {
        $user = new user;
        $user::where('id', $id)->delete();
        return redirect()->route('view_user');
    }
    public function SendMail(Request $request)
    {
        //$email =  tbl_user::where('id', $id)->value('email');
        $myEmail = 'tobgyalsonam44@gmail.com';
        Mail::to($myEmail)->send(new MyTestMail());        
        dd("Mail Send Successfully");
    }
    public function token_generation()
    {
        $token = token::all();
        $msg = 0;
        return view('admin.user.token_generation', compact('msg','token'));
    }
    public function generate_token(Request $request)
    {
        $token_no = $this->get_token_id();
        $user = new token;
        $user->token_no = $token_no;
        $user->email = $request->email;

        $email = $request->email;
        $users = user::all();

 
        $token_no = $token_no;
        $user->save(); 
        $myEmail = $request->email;
        Mail::to($myEmail)->send(new tokenSendEmail($user,$token_no));        
        $token = token::all();
        $msg = 0;

///////
        $token_noss = $user->token_no;
        $a = new tbl_ro_detail;
        $a->token_no = $token_no;
        $a->save(); 
       


        $lastid = tbl_ro_detail::orderBy('id', 'desc')->value('id');
        $year = date("Y");
        $app_no = $year.''.$lastid;
        $iid = tbl_ro_detail::where('token_no', $token_noss)->value('token_no');
        $nnn = tbl_ro_detail::where('token_no', $iid)->latest()->firstOrFail();
        $nnn->ro_id=$app_no;
        $nnn->save();
///////

        return view('admin.user.token_generation', compact('users', 'msg','token_no','email','token'));
    }
    public function get_token_id()
    {  
        $y = date('Y'); 
        $lastno = token::orderBy('id', 'desc')->first();
        if ( ! $lastno ){
        $number = 0;}
        else {$number = substr($lastno->token_no,4); }           
        $newnumber = sprintf(intval($number) + 1);              
        $result = sprintf("%s%s", $y, $newnumber);   
        return $result;  
    } 
   /* public function get_ro_id()
    {  
        $y = date('Y'); 
        $lastno = tbl_ro_detail::orderBy('id', 'desc')->first();
        if ( ! $lastno ){
        $number = 0;}
        else {$number = substr($lastno->ro_id,4); }           
        $newnumber = sprintf(intval($number) + 1);              
        $result = sprintf("%s%s",$y, $newnumber);    
        return $result;  

    } */


  /*  public function getEmployee(Request $request)
    {
      $id=$request->name;  
      Session::put('employeeID',$id);
      return view('admin.user.add_user');
    }
   

    
    public function ResetPassword($id)
     { 
      try
        {
        $email =  tbl_user::where('id', $id)->value('email');
        $uname =  tbl_user::where('id', $id)->value('email');      
        $password = 'pass@123';
        $hpassword = Hash::make($password); 
        $user = new tbl_user;
        $user::where('id',$id)
            ->update([
                'password' => $hpassword
                ]);
        //LogActivity::addToLog('Password Reset', $uname);       
        Mail::to($email)->send(new PassResetSendEmail($uname, $password)); 
        $msg = 1;       
        $users = tbl_user::all();
        $notification = array(
            'message' => 'Password Reset Successful, password sent to '.$email.'', 
            'alert-type' => 'success'
        );
        session()->put('notification',$notification);
        return view('admin.user.view', compact('users', 'msg'));
       }
        catch(QueryException $e) {

        if($e->errorInfo[1] == 1062) {
            $msg = 1;
            $users = tbl_user::all();
            $notification = array(
            'message' => 'Some Error Occured', 
            'alert-type' => 'error'
        );
        session()->put('notification',$notification);
        return view('admin.user.view', compact('users', 'msg'));
        } else {
            throw $e;
        }
      }
  }

*/
 ///DESIGNATION ENGLISH/// 
    public function designation()
    {
        $designation=tbl_designation::all();
        return view('admin.designation_master.index',compact('designation'));
    }
    public function view_designation(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_designation::find($id);
            return response()->json($info);
        }
    }
    public function destroy($id)
    {
        $designation = new tbl_designation;
        $designation::where('id', $id)->delete();
        Session::flash('success', 'Designation has been deleted successfully');
        return redirect()->route('designation_master.index');
    }

    public function store(Request $request)
    {    
        $designation = new tbl_designation;
        $designation->designation=$request->designation;
        $designation->save();
        Session::flash('success', 'Designation has been created successfully');
        return redirect()->route('designation_master.index');
    }
    public function update(Request $request)
    {
        $id = $request ->edit_id;
        $designation = tbl_designation::find($id);
        $designation ->designation = $request ->designation;      
        $designation -> save();
        Session::flash('success', 'Designation has been updated successfully');
        return redirect()->route('designation_master.index');
    }
///DESIGNATION DZONGKHA///
    public function designation_dzo()
    {
        $designation=tbl_designation::all();
        return view('admin.designation_master.index_dzo',compact('designation'));
    }
    public function view_designation_dzo(Request $request)
    {
        if($request->ajax()){
            $id = $request->id;
            $info = tbl_designation::find($id);
            return response()->json($info);
        }
    }
    public function destroy_dzo($id)
    {
        $designation = new tbl_designation;
        $designation::where('id', $id)->delete();
        Session::flash('success', 'Designation has been deleted successfully');
        return redirect()->route('designation_master.index_dzo');
    }

    public function store_dzo(Request $request)
    {    
        $designation = new tbl_designation;
        $designation->designation=$request->designation;
        $designation->save();
        Session::flash('success', 'Designation has been created successfully');
        return redirect()->route('designation_master.index_dzo');
    }
    public function update_dzo(Request $request)
    {
        $id = $request ->edit_id;
        $designation = tbl_designation::find($id);
        $designation ->designation = $request ->designation;      
        $designation -> save();
        Session::flash('success', 'Designation has been updated successfully');
        return redirect()->route('designation_master.index_dzo');
    }

}
