<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_ro_detail;
use App\tbl_visa_application_doc;
use App\tbl_visa_application;
use App\User;
use App\tbl_agency;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home');
    }
    public function home_dzo()
    {
        $ro = tbl_ro_detail::whereNotNull('name')->orderBy('id', 'desc')->get();
        return view('application.home_dzo',compact('ro'));
    }
    public function home()
    {
        $ro = tbl_ro_detail::whereNotNull('name')->orderBy('id', 'desc')->get();
        return view('application.home',compact('ro'));
    }
    public function home_ro()
    {
        $org_id = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $ro = tbl_ro_detail::where('name',$org_id)->get();
        $visa = tbl_visa_application::where('host', Auth::user()->organization)->limit(1)->get();
        return view('application.home_ro',compact('ro','visa'));
    }
    public function home_ro_dzo()
    {
        $org_id = tbl_agency::where('id', Auth::user()->organization)->value('agency');
        $ro = tbl_ro_detail::where('name',$org_id)->get();
        $visa = tbl_visa_application::where('host', Auth::user()->organization)->limit(1)->get();
        return view('application.home_ro_dzo',compact('ro','visa'));
    }
    public function admin_dashboard()
    {
        
        return view('admin.home');
    }
}
