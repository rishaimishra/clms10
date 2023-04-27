<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\tbl_site_information;
use App\tbl_site_information_doc;
use App\tbl_agency;
use App\dzongkhag_dzo;
use App\gewog_dzo;
use App\village_dzo;
use App\tbl_zheldrang;
use App\tbl_donation;
use App\tbl_visa_application;
use App\tbl_financial_information;
use App\tbl_event_information;
use App\tbl_newmember;
use App\tbl_deregister;
use App\tbl_meeting;
use App\tbl_taxexemption;
use App\tbl_chapter_detail;
use Auth;
use Session;

use App\Http\Requests\site_informationRequest;
class ReportController extends Controller
{
 public function eventreport_searchall(Request $request)
    {
        $year=$request->year;

        if(!empty($request->year))
        {
            $typesearch= tbl_event_information::where('created_at', 'LIKE', '%' . $request->year . '%')->get();
             return view('application.report.report_event_result',compact('typesearch')); 
        }
    }
     public function donationreport_searchall(Request $request)
    {
        $year=$request->year;

        if(!empty($request->year))
        {
            $typesearch= tbl_donation::where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->get();
             return view('application.report.report_donation_result',compact('typesearch')); 
        }
     }
      public function memberreport_searchall(Request $request)
    {
        $year=$request->year;

        if(!empty($request->year))
        {
            $typesearch= tbl_newmember::where('created_at', 'LIKE', '%' . $request->year . '%')->get();
             return view('application.report.report_member_result',compact('typesearch')); 
        }
    }



    public function report()
    {
     return view('application.report.report');
    }
    public function report_zheldrang()
    {
        $zheldrang =  tbl_zheldrang::all();
        return view('application.report.report_zheldrang',compact('zheldrang'));
    }
    public function zheldrangreport_search(Request $request)
    {
        $ro_name=$request->ro_name;
        $ro_name1=$request->ro_name1;
        $designation=$request->designation;
        $designation1=$request->designation1;
        $year=$request->year;
        $year1=$request->year1; 

        if(!empty($request->ro_name))
        {
            $typesearch1='';
            $typesearch2='';
            $typesearch3='';
            $typesearch= tbl_zheldrang::where('host',$request->ro_name)->where('designation',$request->designation)->where('created_at', 'LIKE', '%' . $request->year . '%')->get();
             return view('application.report.report_zheldrang_result',compact('typesearch','typesearch1','typesearch2','typesearch3')); 
        }
        elseif(!empty($request->ro_name1))
        {
            $typesearch='';
            $typesearch2='';
            $typesearch3='';
            $typesearch1= tbl_zheldrang::where('host',$request->ro_name1)->get();
            Session::put('host',$request->ro_name1);
             return view('application.report.report_zheldrang_result',compact('typesearch1','typesearch','typesearch2','typesearch3'));
        }
        elseif(!empty($request->designation1))
        {
            $typesearch='';
            $typesearch1='';
            $typesearch3='';
            $typesearch2= tbl_zheldrang::where('designation',$request->designation1)->get();
            Session::put('designation',$request->designation1);
             return view('application.report.report_zheldrang_result',compact('typesearch','typesearch1','typesearch2','typesearch3'));
        }
        else if(!empty($request->year1))
        {
            $typesearch='';
            $typesearch1='';
            $typesearch3='';
            $typesearch= tbl_zheldrang::where('created_at', 'LIKE', '%' . $request->year1 . '%')->get();
            Session::put('created_at',$request->year1);
            return view('application.report.report_zheldrang_result',compact('typesearch','typesearch1','typesearch2','typesearch3')); 
        }
     }
    public function report_donation()
    {
        $donation =  tbl_donation::all();
        return view('application.report.report_donation',compact('donation'));
    }
    public function donationreport_search(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_donation::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->get();
             return view('application.report.report_donation_result',compact('typesearch')); 
        }
     }
    public function report_visa()
    {
        $visa =  tbl_visa_application::all();
        return view('application.report.report_visa',compact('visa'));
    }
    public function visareport_search(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_visa_application::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->get();
             return view('application.report.report_visa_result',compact('typesearch')); 
        }
    }
    public function report_financial()
    {
        $financial =  tbl_financial_information::all();
        return view('application.report.report_financial',compact('financial'));
    }
    public function financialreport_search(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_financial_information::where('host',$request->ro_name)->where('year',$request->year)->where('approve',1)->get();
             return view('application.report.report_financial_result',compact('typesearch')); 
        }
    }
    public function report_event()
    {
        $event =  tbl_event_information::all();
        return view('application.report.report_event',compact('event'));
    }
    public function eventreport_search(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_event_information::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->get();
             return view('application.report.report_event_result',compact('typesearch')); 
        }
    }
    public function report_member()
    {
        $member =  tbl_newmember::all();
        return view('application.report.report_member',compact('member'));
    }
    public function memberreport_search(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_newmember::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->get();
             return view('application.report.report_member_result',compact('typesearch')); 
        }
    }
    public function report_deregistration()
    {
        $deregistration =  tbl_deregister::all();
        return view('application.report.report_deregistration',compact('deregistration'));
    }
    public function deregistrationreport_search(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_deregister::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->get();
             return view('application.report.report_deregistration_result',compact('typesearch')); 
        }
    }
    public function report_mom()
    {
        $mom =  tbl_meeting::all();
        return view('application.report.report_mom',compact('mom'));
    }
    public function momreport_search(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_meeting::where('host',$request->ro_name)->where('year', $request->year )->get();
             return view('application.report.report_mom_result',compact('typesearch')); 
        }
     }
    public function report_tax()
    {
        $tax =  tbl_taxexemption::all();
        return view('application.report.report_tax',compact('tax'));
    }
    public function taxreport_search(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_taxexemption::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->get();
             return view('application.report.report_tax_result',compact('typesearch')); 
        }
    } 
    public function report_chapter()
    {
        $chapter =  tbl_chapter_detail::all();
        return view('application.report.report_chapter',compact('chapter'));
    }
    public function chapterreport_search(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;
        $type=$request->type;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_chapter_detail::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->where('branchtype',$request->type)->get();
             return view('application.report.report_chapter_result',compact('typesearch')); 
        }
     }  

     ///////Dzongkha////
      public function report_dzo()
    {
     return view('application.report.report_dzo');
    }
    public function report_zheldrang_dzo()
    {
        $zheldrang =  tbl_zheldrang::all();
        return view('application.report.report_zheldrang_dzo',compact('zheldrang'));
    }
    public function zheldrangreport_search_dzo(Request $request)
    {
        $ro_name=$request->ro_name;
        $ro_name1=$request->ro_name1;
        $designation=$request->designation;
        $designation1=$request->designation1;
        $year=$request->year;
        $year1=$request->year1; 

        if(!empty($request->ro_name))
        {
            $typesearch1='';
            $typesearch2='';
            $typesearch3='';
            $typesearch= tbl_zheldrang::where('host',$request->ro_name)->where('designation',$request->designation)->where('created_at', 'LIKE', '%' . $request->year . '%')->get();
             return view('application.report.report_zheldrang_result_dzo',compact('typesearch','typesearch1','typesearch2','typesearch3')); 
        }
        elseif(!empty($request->ro_name1))
        {
            $typesearch='';
            $typesearch2='';
            $typesearch3='';
            $typesearch1= tbl_zheldrang::where('host',$request->ro_name1)->get();
            Session::put('host',$request->ro_name1);
             return view('application.report.report_zheldrang_result_dzo',compact('typesearch1','typesearch','typesearch2','typesearch3'));
        }
        elseif(!empty($request->designation1))
        {
            $typesearch='';
            $typesearch1='';
            $typesearch3='';
            $typesearch2= tbl_zheldrang::where('designation',$request->designation1)->get();
            Session::put('designation',$request->designation1);
             return view('application.report.report_zheldrang_result_dzo',compact('typesearch','typesearch1','typesearch2','typesearch3'));
        }
        else if(!empty($request->year1))
        {
            $typesearch='';
            $typesearch1='';
            $typesearch3='';
            $typesearch= tbl_zheldrang::where('created_at', 'LIKE', '%' . $request->year1 . '%')->get();
            Session::put('created_at',$request->year1);
            return view('application.report.report_zheldrang_result_dzo',compact('typesearch','typesearch1','typesearch2','typesearch3')); 
        }
     }
     public function report_donation_dzo()
    {
        $donation =  tbl_donation::all();
        return view('application.report.report_donation_dzo',compact('donation'));
    }
    public function donationreport_search_dzo(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_donation::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->get();
             return view('application.report.report_donation_result_dzo',compact('typesearch')); 
        }
     }
      public function report_visa_dzo()
    {
        $visa =  tbl_visa_application::all();
        return view('application.report.report_visa_dzo',compact('visa'));
    }
    public function visareport_search_dzo(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_visa_application::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->get();
             return view('application.report.report_visa_result_dzo',compact('typesearch')); 
        }
    }
    public function report_financial_dzo()
    {
        $financial =  tbl_financial_information::all();
        return view('application.report.report_financial_dzo',compact('financial'));
    }
    public function financialreport_search_dzo(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_financial_information::where('host',$request->ro_name)->where('year',$request->year)->where('approve',1)->get();
             return view('application.report.report_financial_result_dzo',compact('typesearch')); 
        }
    } 
    public function report_event_dzo()
    {
        $event =  tbl_event_information::all();
        return view('application.report.report_event_dzo',compact('event'));
    }
    public function eventreport_search_dzo(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_event_information::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->get();
             return view('application.report.report_event_result_dzo',compact('typesearch')); 
        }
    } 
    public function report_member_dzo()
    {
        $member =  tbl_newmember::all();
        return view('application.report.report_member_dzo',compact('member'));
    }
    public function memberreport_search_dzo(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_newmember::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->get();
             return view('application.report.report_member_result_dzo',compact('typesearch')); 
        }
    }
    public function report_deregistration_dzo()
    {
        $deregistration =  tbl_deregister::all();
        return view('application.report.report_deregistration_dzo',compact('deregistration'));
    }
    public function deregistrationreport_search_dzo(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_deregister::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->get();
             return view('application.report.report_deregistration_result_dzo',compact('typesearch')); 
        }
    }  
     public function report_mom_dzo()
    {
        $mom =  tbl_meeting::all();
        return view('application.report.report_mom_dzo',compact('mom'));
    }
    public function momreport_search_dzo(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_meeting::where('host',$request->ro_name)->where('year', 'LIKE', '%' . $request->year . '%')->get();
             return view('application.report.report_mom_result_dzo',compact('typesearch')); 
        }
     }
     public function report_tax_dzo()
    {
        $tax =  tbl_taxexemption::all();
        return view('application.report.report_tax_dzo',compact('tax'));
    }
    public function taxreport_search_dzo(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_taxexemption::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->get();
             return view('application.report.report_tax_result_dzo',compact('typesearch')); 
        }
    }  
     public function report_chapter_dzo()
    {
        $chapter =  tbl_chapter_detail::all();
        return view('application.report.report_chapter_dzo',compact('chapter'));
    }
    public function chapterreport_search_dzo(Request $request)
    {
        $ro_name=$request->ro_name;
        $year=$request->year;
        $type=$request->type;

        if(!empty($request->ro_name))
        {
            $typesearch= tbl_chapter_detail::where('host',$request->ro_name)->where('created_at', 'LIKE', '%' . $request->year . '%')->where('approve',1)->where('branchtype',$request->type)->get();
             return view('application.report.report_chapter_result_dzo',compact('typesearch')); 
        }
     }  


}
