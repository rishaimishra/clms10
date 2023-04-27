<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Auth;
use App\Models\User;
use Session;

class LoginController extends Controller

    {

public function doLogin(Request $request)
       {
         if(Auth::attempt(['email' =>$request->username, 'password' => $request->password]))

           {
            $user = User::where('email',$request->username)->first();
            session(['user_id' => $user->id]);
            session(['role' => $user->role_id]);
            $uid = $user->id;

            if($user->role()==1)
                {
                return redirect()->to('admin_dashboard')->with('success','You are logged in');
                }
                elseif($user->role() == 2)
                {
                    return redirect()->to('user_dashboard')->with('success','You are logged in');
                }
                elseif($user->role() == 3 && Auth::user()->status == 1) 
                {
                    return redirect()->to('ro_dashboard')->with('success','You are logged in');
                }
                else
                {
                return redirect()->to('/')->with('error','You are Not Authorised!');
                }
           }
        else
          {
           return redirect()->to('/')->with('error','Username or Password is Incorrect!');
          }
    }

public function showLogin()
        {

        // Form View

        return view('login');
        }
public function Logout()
        {
        Auth::logout(); // logging out user
        return redirect()->to('/')->with('error','You are logged out');
        }

        public function dzo_login()
        {

        // Form View

        return view('welcome_dzo');
        }


}
