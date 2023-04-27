<?php
Auth::routes();

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    echo "clear-cache".$exitCode;
    // return what you want
});

Route::get('/', function () { return view('welcome');} );
Route::post('/login', ['as' => '','uses' => 'Auth\LoginController@doLogin']);
Route::get('/login',['uses'=>'Auth\LoginController@doLogin','as'=>'login']);
Route::post('/login.dzo', ['as' => '','uses' => 'Auth\LoginController@dzo_login']);


Route::post('registrationno_store',['as'=>'registrationno_store','uses'=>'Register\RegisterController@registrationno_store']);
Route::post('registrationno_store_dzo',['as'=>'registrationno_store_dzo','uses'=>'Register\RegisterController@registrationno_store_dzo']);


Route::get('login.dzo',['uses'=>'Auth\LoginController@dzo_login','as'=>'dzo_login']);
Route::get('/admin_dashboard', function () { return view('admin.home');});
Route::get('/user_dashboard', function () { return view('application.home');});
Route::get('admin_dashboard',['uses'=>'HomeController@admin_dashboard','as'=>'admin_dashboard']);
Route::get('user_dashboard_dzo',['uses'=>'HomeController@home_dzo','as'=>'application.home_dzo']);
Route::get('user_dashboard',['uses'=>'HomeController@home','as'=>'application.home']);
Route::get('ro_dashboard',['uses'=>'HomeController@home_ro','as'=>'application.home_ro']);
Route::get('ro_dashboard_dzo',['uses'=>'HomeController@home_ro_dzo','as'=>'application.home_ro_dzo']);


Route::get('delete_photo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_photo','as'=>'delete_photo']);
Route::get('delete_photodc/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_photodc','as'=>'delete_photodc']);
Route::get('delete_photos/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_photos','as'=>'delete_photos']);
Route::get('delete_photods/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_photods','as'=>'delete_photods']);
Route::get('delete_photot/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_photot','as'=>'delete_photot']);

Route::get('delete_photo_dzo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_photo_dzo','as'=>'delete_photo_dzo']);
Route::get('delete_photodc_dzo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_photodc_dzo','as'=>'delete_photodc_dzo']);
Route::get('delete_photos_dzo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_photos_dzo','as'=>'delete_photos_dzo']);
Route::get('delete_photods_dzo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_photods_dzo','as'=>'delete_photods_dzo']);
Route::get('delete_photot_dzo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_photot_dzo','as'=>'delete_photot_dzo']);



//CID//
Route::post('cid_search',['uses'=>'Register\RegisterController@cid_search','as'=>'cid_search']);
Route::post('cid_search_dzo',['uses'=>'Register\RegisterController@cid_search_dzo','as'=>'cid_search_dzo']);

Route::post('cid_search_cdreg/{det}',['uses'=>'Register\RegisterController@cid_search_cdreg','as'=>'cid_search_cdreg']);
Route::post('cid_search_cdreg_dzo/{det}',['uses'=>'Register\RegisterController@cid_search_cdreg_dzo','as'=>'cid_search_cdreg_dzo']);
Route::post('cid_search_dcdreg/{det}',['uses'=>'Register\RegisterController@cid_search_dcdreg','as'=>'cid_search_dcdreg']);
Route::post('cid_search_dcdreg_dzo/{det}',['uses'=>'Register\RegisterController@cid_search_dcdreg_dzo','as'=>'cid_search_dcdreg_dzo']);
Route::post('cid_search_sdreg/{det}',['uses'=>'Register\RegisterController@cid_search_sdreg','as'=>'cid_search_sdreg']);
Route::post('cid_search_sdreg_dzo/{det}',['uses'=>'Register\RegisterController@cid_search_sdreg_dzo','as'=>'cid_search_sdreg_dzo']);
Route::post('cid_search_dsdreg/{det}',['uses'=>'Register\RegisterController@cid_search_dsdreg','as'=>'cid_search_dsdreg']);
Route::post('cid_search_dsdreg_dzo/{det}',['uses'=>'Register\RegisterController@cid_search_dsdreg_dzo','as'=>'cid_search_dsdreg_dzo']);
Route::post('cid_search_tdreg/{det}',['uses'=>'Register\RegisterController@cid_search_tdreg','as'=>'cid_search_tdreg']);
Route::post('cid_search_tdreg_dzo/{det}',['uses'=>'Register\RegisterController@cid_search_tdreg_dzo','as'=>'cid_search_tdreg_dzo']);

Route::post('cid_search_cdnewinfo/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@cid_search_cdnewinfo','as'=>'cid_search_cdnewinfo']);
Route::post('cid_search_cdnewinfo_dzo/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@cid_search_cdnewinfo_dzo','as'=>'cid_search_cdnewinfo_dzo']);
Route::post('cid_search_dcdnewinfo/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@cid_search_dcdnewinfo','as'=>'cid_search_dcdnewinfo']);
Route::post('cid_search_dcdnewinfo_dzo/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@cid_search_dcdnewinfo_dzo','as'=>'cid_search_dcdnewinfo_dzo']);
Route::post('cid_search_sdnewinfo/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@cid_search_sdnewinfo','as'=>'cid_search_sdnewinfo']);
Route::post('cid_search_sdnewinfo_dzo/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@cid_search_sdnewinfo_dzo','as'=>'cid_search_sdnewinfo_dzo']);
Route::post('cid_search_dsdnewinfo/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@cid_search_dsdnewinfo','as'=>'cid_search_dsdnewinfo']);
Route::post('cid_search_dsdnewinfo_dzo/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@cid_search_dsdnewinfo_dzo','as'=>'cid_search_dsdnewinfo_dzo']);
Route::post('cid_search_tdnewinfo/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@cid_search_tdnewinfo','as'=>'cid_search_tdnewinfo']);
Route::post('cid_search_tdnewinfo_dzo/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@cid_search_tdnewinfo_dzo','as'=>'cid_search_tdnewinfo_dzo']);

Route::post('cid_search_donation/{donation_id}',['uses'=>'Donation\DonationController@cid_search_donation','as'=>'cid_search_donation']);
Route::get('donation/destroy_collector/{id}/{donation_id}',['uses'=>'Donation\DonationController@destroy_collector','as'=>'destroy_collector']);
Route::post('cid_search_donation_dzo/{donation_id}',['uses'=>'Donation\DonationController@cid_search_donation_dzo','as'=>'cid_search_donation_dzo']);
Route::get('donation/destroy_collector_dzo/{id}/{donation_id}',['uses'=>'Donation\DonationController@destroy_collector_dzo','as'=>'destroy_collector_dzo']);

Route::post('cid_search_zheldrang',['uses'=>'Zheldrang\ZheldrangController@cid_search_zheldrang','as'=>'cid_search_zheldrang']);
Route::post('cid_search_zheldrang_dzo',['uses'=>'Zheldrang\ZheldrangController@cid_search_zheldrang_dzo','as'=>'cid_search_zheldrang_dzo']);

Route::post('chapter_chairman_details_cid/{det}',['as'=>'chapter_chairman_details_cid','uses'=>'LocalChapter\LocalChapterController@chapter_chairman_details_cid']);
Route::post('chapter_secretary_details_cid/{dets}',['as'=>'chapter_secretary_details_cid','uses'=>'LocalChapter\LocalChapterController@chapter_secretary_details_cid']);
Route::post('chapter_treasurer_details_cid/{dets}',['as'=>'chapter_treasurer_details_cid','uses'=>'LocalChapter\LocalChapterController@chapter_treasurer_details_cid']);
Route::post('chapter_chairman_details_cid_dzo/{det}',['as'=>'chapter_chairman_details_cid_dzo','uses'=>'LocalChapter\LocalChapterController@chapter_chairman_details_cid_dzo']);
Route::post('chapter_secretary_details_cid_dzo/{dets}',['as'=>'chapter_secretary_details_cid_dzo','uses'=>'LocalChapter\LocalChapterController@chapter_secretary_details_cid_dzo']);
Route::post('chapter_treasurer_details_cid_dzo/{dets}',['as'=>'chapter_treasurer_details_cid_dzo','uses'=>'LocalChapter\LocalChapterController@chapter_treasurer_details_cid_dzo']);

//


//ADMIN//
Route::get('user',['uses'=>'Admin\UserController@index','as'=>'view_user']);
Route::post('user_add',['uses'=>'Admin\UserController@postUser','as'=>'insert_user']);
Route::get('user/view', 'Admin\UserController@view')->name('useredit');
Route::post('update_user',['uses'=>'Admin\UserController@updateUser','as'=>'update_user']);
Route::get('delete_user/{id}',['uses'=>'Admin\UserController@deleteUser','as'=>'delete_user']);
Route::get('token_generation',['uses'=>'Admin\UserController@token_generation','as'=>'token_generation']);
Route::post('generate_token',['uses'=>'Admin\UserController@generate_token','as'=>'generate_token']);
//DESIGNATION ENGLISH//
Route::get('designation',['as'=>'designation_master.index','uses'=>'Admin\UserController@designation']);
Route::post('designation/store',['as'=>'designation_master.store','uses'=>'Admin\UserController@store']);
Route::delete('designation/destroy/{id}',['as'=>'designation_master.destroy','uses'=>'Admin\UserController@destroy']);
Route::get('designation/view', 'Admin\UserController@view_designation')->name('view_designation');
Route::post('designation/update', 'Admin\UserController@update')->name('update_designation');
//DESIGNATION DZONGKHA//
Route::get('designation_dzo',['as'=>'designation_master.index_dzo','uses'=>'Admin\UserController@designation_dzo']);
Route::post('designation_dzo/store',['as'=>'designation_master.store_dzo','uses'=>'Admin\UserController@store_dzo']);
Route::delete('designation_dzo/destroy/{id}',['as'=>'designation_master.destroy_dzo','uses'=>'Admin\UserController@destroy_dzo']);
Route::get('designation_dzo/view', 'Admin\UserController@view_designation_dzo')->name('view_designation_dzo');
Route::post('designation_dzo/update', 'Admin\UserController@update_dzo')->name('update_designation_dzo');

//SEARCH FUNCTIONALITY RO ENGLISH// 
Route::post('ro/search','Event\EventController@ro_event_searching')->name('ro_event_searching');
Route::post('ro_site/search','Site\SiteController@ro_site_searching')->name('ro_site_searching');
Route::post('mom_yearly/search','Meeting\MeetingController@mom_yearly_searching')->name('mom_yearly_searching');
Route::post('meeting_search_functionality','Meeting\MeetingController@meeting_search_functionality')->name('meeting_search_functionality');
Route::post('ro/taxsearch','Tax\TaxController@ro_tax_searching')->name('ro_tax_searching');
Route::post('zheldrang/search','Zheldrang\ZheldrangController@zheldrang_searching')->name('zheldrang_searching');
//SEARCH FUNCTIONALITY RO DZONGKHA// 
Route::post('ro/search_dzo','Event\EventController@ro_event_searching_dzo')->name('ro_event_searching_dzo');
Route::post('ro_site/search_dzo','Site\SiteController@ro_site_searching_dzo')->name('ro_site_searching_dzo');
Route::post('mom_yearly/search_dzo','Meeting\MeetingController@mom_yearly_searching_dzo')->name('mom_yearly_searching_dzo');
Route::post('meeting_search_functionality_dzo','Meeting\MeetingController@meeting_search_functionality_dzo')->name('meeting_search_functionality_dzo');
Route::post('zheldrang_dzo/search','Zheldrang\ZheldrangController@zheldrang_searching_dzo')->name('zheldrang_searching_dzo');
Route::post('ro/taxsearch_dzo','Tax\TaxController@ro_tax_searching_dzo')->name('ro_tax_searching_dzo');

///DZO,GEWOG,VILL ENGLISH///
Route::get('applicationss/view', ['as'=>'view_addressss', 'uses'=>  'Register\RegisterController@view']);
Route::get('applicationss/view1',['as'=>'view1_addressss','uses'=>  'Register\RegisterController@view1']);
Route::get('applicationss/view2',['as'=>'view2_addressss','uses'=>  'Register\RegisterController@view12']);
///DZO,GEWOG,VILL DZONGKHA///
Route::get('applicationss/view_dzo', ['as'=>'view_addressss_dzo', 'uses'=>  'Site\SiteController@view_dzo']);
Route::get('applicationss/view1_dzo',['as'=>'view1_addressss_dzo','uses'=>  'Site\SiteController@view1_dzo']);
Route::get('applicationss/view2_dzo',['as'=>'view2_addressss_dzo','uses'=>  'Site\SiteController@view12_dzo']);

//SITE INFORMATION ENGLISH//
Route::get('religious_site',['as'=>'religious_site','uses'=>'Site\SiteController@religious_site']);
Route::post('siteinfo_store',['as'=>'siteinfo_store','uses'=>'Site\SiteController@siteinfo_store']);
Route::get('siteinfo_view',['as'=>'siteinfo_view','uses'=>'Site\SiteController@siteinfo_view']);
Route::get('siteinfo_viewdetails/{id}',['as'=>'siteinfo_viewdetails','uses'=>'Site\SiteController@siteinfo_viewdetails']);
///SITE INFORMATION DZONGKHA//
Route::get('religious_site_dzo',['as'=>'religious_site_dzo','uses'=>'Site\SiteController@religious_site_dzo']);
Route::post('siteinfo_store_dzo',['as'=>'siteinfo_store_dzo','uses'=>'Site\SiteController@siteinfo_store_dzo']);
Route::get('siteinfo_view_dzo',['as'=>'siteinfo_view_dzo','uses'=>'Site\SiteController@siteinfo_view_dzo']);
Route::get('siteinfo_viewdetails_dzo/{id}',['as'=>'siteinfo_viewdetails_dzo','uses'=>'Site\SiteController@siteinfo_viewdetails_dzo']);

//COMPLIANT ENGLISH//


Route::get('compliant',['as'=>'compliant','uses'=>'Compliant\CompliantController@compliant']);


//Route::get('compliant',['uses'=>'Compliant\CompliantController@compliant','as'=>'compliant']);
Route::post('compliant_store',['as'=>'compliant_store','uses'=>'Compliant\CompliantController@compliant_store']);
Route::get('compliant_view',['as'=>'compliant_view','uses'=>'Compliant\CompliantController@compliant_view']);
Route::get('complaint_viewdetails/{id}',['as'=>'complaint_viewdetails','uses'=>'Compliant\CompliantController@complaint_viewdetails']);
//COMPLIANT DZONGKHA//
Route::get('compliant_view_dzo',['as'=>'compliant_view_dzo','uses'=>'Compliant\CompliantController@compliant_view_dzo']);
Route::post('compliant_store_dzo',['as'=>'compliant_store_dzo','uses'=>'Compliant\CompliantController@compliant_store_dzo']);
Route::get('complaint_viewdetails_dzo/{id}',['as'=>'complaint_viewdetails_dzo','uses'=>'Compliant\CompliantController@complaint_viewdetails_dzo']);
Route::get('compliant_dzo',['uses'=>'Compliant\CompliantController@compliant_dzo','as'=>'compliant_dzo']);

//EVENT INFORMATION ENGLISH//
Route::get('event_info',['as'=>'event_info','uses'=>'Event\EventController@event_info']);
Route::post('eventinfo_store',['as'=>'eventinfo_store','uses'=>'Event\EventController@eventinfo_store']);
Route::get('eventinfo_view',['as'=>'eventinfo_view','uses'=>'Event\EventController@eventinfo_view']);
Route::get('eventinfo_viewdetails/{id}',['as'=>'eventinfo_viewdetails','uses'=>'Event\EventController@eventinfo_viewdetails']);
//EVENT INFORMATION DZONGKHA//
Route::get('event_info_dzo',['as'=>'event_info_dzo','uses'=>'Event\EventController@event_info_dzo']);
Route::post('eventinfo_store_dzo',['as'=>'eventinfo_store_dzo','uses'=>'Event\EventController@eventinfo_store_dzo']);
Route::get('eventinfo_view_dzo',['as'=>'eventinfo_view_dzo','uses'=>'Event\EventController@eventinfo_view_dzo']);
Route::get('eventinfo_viewdetails_dzo/{id}',['as'=>'eventinfo_viewdetails_dzo','uses'=>'Event\EventController@eventinfo_viewdetails_dzo']);

//PATRON REGISTER ENGLISH//
Route::get('patron_register',['uses'=>'Register\RegisterController@patron_register','as'=>'patron_register']);
Route::get('register_patron',['uses'=>'Register\RegisterController@register_patron','as'=>'register_patron']);
Route::post('patron_store',['as'=>'patron_store','uses'=>'Register\RegisterController@patron_store']);
Route::get('delete_patron/{id}',['as'=>'delete_patron','uses'=>'Register\RegisterController@delete_patron']);
Route::get('patron_register_view/{patronid}',['as'=>'patron_register_view','uses'=>'Register\RegisterController@patron_register_view']);
//PATRON REGISTER DZONGKHA//
Route::get('patron_register_dzo',['uses'=>'Register\RegisterController@patron_register_dzo','as'=>'patron_register_dzo']);
Route::get('register_patron_dzo',['uses'=>'Register\RegisterController@register_patron_dzo','as'=>'register_patron_dzo']);
Route::post('patron_store_dzo',['as'=>'patron_store_dzo','uses'=>'Register\RegisterController@patron_store_dzo']);
Route::get('delete_patron_dzo/{id}',['as'=>'delete_patron_dzo','uses'=>'Register\RegisterController@delete_patron_dzo']);
Route::get('patron_register_view_dzo/{patronid}',['as'=>'patron_register_view_dzo','uses'=>'Register\RegisterController@patron_register_view_dzo']);

//MOM ENGLISH//
Route::get('meeting',['uses'=>'Meeting\MeetingController@meeting','as'=>'meeting']);
Route::get('meeting_add',['uses'=>'Meeting\MeetingController@meeting_add','as'=>'meeting_add']);
Route::post('meeting_store',['as'=>'meeting_store','uses'=>'Meeting\MeetingController@meeting_store']);
Route::get('meeting_commission',['uses'=>'Meeting\MeetingController@meeting_commission','as'=>'meeting_commission']);
Route::get('meeting_search',['uses'=>'Meeting\MeetingController@meeting_search','as'=>'meeting_search']);
//MOM DZONGKHA//
Route::get('meeting_dzo',['uses'=>'Meeting\MeetingController@meeting_dzo','as'=>'meeting_dzo']);
Route::get('meeting_add_dzo',['uses'=>'Meeting\MeetingController@meeting_add_dzo','as'=>'meeting_add_dzo']);
Route::post('meeting_store_dzo',['as'=>'meeting_store_dzo','uses'=>'Meeting\MeetingController@meeting_store_dzo']);
Route::get('meeting_commission_dzo',['uses'=>'Meeting\MeetingController@meeting_commission_dzo','as'=>'meeting_commission_dzo']);
Route::get('meeting_search_dzo',['uses'=>'Meeting\MeetingController@meeting_search_dzo','as'=>'meeting_search_dzo']);

//DONATION ENGLISH//
Route::get('donation',['uses'=>'Donation\DonationController@donation','as'=>'donation']);
Route::get('donation_add/{donation_id}',['uses'=>'Donation\DonationController@donation_add','as'=>'donation_add']);
Route::post('store_donationcollectors',['as'=>'store_donationcollectors','uses'=>'Donation\DonationController@store_donationcollectors']);
Route::get('donation_review/{id}',['as'=>'donation_review','uses'=>'Donation\DonationController@donation_review']);
Route::get('donation/destroy/{id}/{donation_id}',['uses'=>'Donation\DonationController@destroy','as'=>'destroy']);
Route::post('approve_donation/{id}',['as'=>'approve_donation','uses'=>'Donation\DonationController@approve_donation']);
//DONATION DZONGKHA//
Route::get('donation_dzo',['uses'=>'Donation\DonationController@donation_dzo','as'=>'donation_dzo']);
Route::get('donation_add_dzo/{donation_id}',['uses'=>'Donation\DonationController@donation_add_dzo','as'=>'donation_add_dzo']);
Route::post('store_donationcollectors_dzo',['as'=>'store_donationcollectors_dzo','uses'=>'Donation\DonationController@store_donationcollectors_dzo']);
Route::get('donation_review_dzo/{id}',['as'=>'donation_review_dzo','uses'=>'Donation\DonationController@donation_review_dzo']);
Route::get('donation/destroy_dzo/{id}/{donation_id}',['uses'=>'Donation\DonationController@destroy_dzo','as'=>'destroy_dzo']);
Route::post('approve_donation_dzo/{id}',['as'=>'approve_donation_dzo','uses'=>'Donation\DonationController@approve_donation_dzo']);

//DEREGISTERATION ENGLISH//
Route::get('deregister',['uses'=>'Register\RegisterController@deregister','as'=>'deregister']);
Route::post('deregister_store',['as'=>'deregister_store','uses'=>'Register\RegisterController@deregister_store']);
Route::get('deregister_view',['uses'=>'Register\RegisterController@deregister_view','as'=>'deregister_view']);
Route::get('deregister_viewdetails/{id}',['as'=>'deregister_viewdetails','uses'=>'Register\RegisterController@deregister_viewdetails']);
Route::post('approve_deregister/{id}',['as'=>'approve_deregister','uses'=>'Register\RegisterController@approve_deregister']);
//DEREGISTERATION DZONGKHA//
Route::get('deregister_dzo',['uses'=>'Register\RegisterController@deregister_dzo','as'=>'deregister_dzo']);
Route::post('deregister_store_dzo',['as'=>'deregister_store_dzo','uses'=>'Register\RegisterController@deregister_store_dzo']);
Route::get('deregister_view_dzo',['uses'=>'Register\RegisterController@deregister_view_dzo','as'=>'deregister_view_dzo']);
Route::get('deregister_viewdetails_dzo/{id}',['as'=>'deregister_viewdetails_dzo','uses'=>'Register\RegisterController@deregister_viewdetails_dzo']);
Route::post('approve_deregister_dzo/{id}',['as'=>'approve_deregister_dzo','uses'=>'Register\RegisterController@approve_deregister_dzo']);

//MEMBER REGISTER ENGLISH//
Route::get('member_register',['uses'=>'Register\RegisterController@member_register','as'=>'member_register']);
Route::get('register_new',['uses'=>'Register\RegisterController@register_new','as'=>'register_new']);
Route::post('newmember_store',['as'=>'newmember_store','uses'=>'Register\RegisterController@newmember_store']);
Route::get('delete_member/{id}',['as'=>'delete_member','uses'=>'Register\RegisterController@delete_member']);
//MEMBER REGISTER DZONGKHA//
Route::get('member_register_dzo',['uses'=>'Register\RegisterController@member_register_dzo','as'=>'member_register_dzo']);
Route::get('register_new_dzo',['uses'=>'Register\RegisterController@register_new_dzo','as'=>'register_new_dzo']);
Route::post('newmember_store_dzo',['as'=>'newmember_store_dzo','uses'=>'Register\RegisterController@newmember_store_dzo']);
Route::get('delete_member_dzo/{id}',['as'=>'delete_member_dzo','uses'=>'Register\RegisterController@delete_member_dzo']);

Route::post('member_check',['as'=>'member_check','uses'=>'Register\RegisterController@ajaxRequestPost']);

//Disciplinary ENGLISH//
Route::get('discipline',['uses'=>'Compliant\CompliantController@discipline','as'=>'discipline']);
Route::post('discipline_store',['as'=>'discipline_store','uses'=>'Compliant\CompliantController@discipline_store']);
Route::get('discipline_view',['as'=>'discipline_view','uses'=>'Compliant\CompliantController@discipline_view']);
Route::get('discipline_viewdetails/{id}',['as'=>'discipline_viewdetails','uses'=>'Compliant\CompliantController@discipline_viewdetails']);
//Disciplinary ENGLISH//
Route::get('discipline_dzo',['uses'=>'Compliant\CompliantController@discipline_dzo','as'=>'discipline_dzo']);
Route::post('discipline_store_dzo',['as'=>'discipline_store_dzo','uses'=>'Compliant\CompliantController@discipline_store_dzo']);
Route::get('discipline_view_dzo',['as'=>'discipline_view_dzo','uses'=>'Compliant\CompliantController@discipline_view_dzo']);
Route::get('discipline_viewdetails_dzo/{id}',['as'=>'discipline_viewdetails_dzo','uses'=>'Compliant\CompliantController@discipline_viewdetails_dzo']);

//SUSPENSION ENGLISH//
Route::get('suspension',['uses'=>'Compliant\CompliantController@suspension','as'=>'suspension']);
Route::post('suspension_store',['as'=>'suspension_store','uses'=>'Compliant\CompliantController@suspension_store']);
Route::get('suspension_view',['as'=>'suspension_view','uses'=>'Compliant\CompliantController@suspension_view']);
Route::get('reinstate/{id}',['as'=>'reinstate','uses'=>'Compliant\CompliantController@reinstate']);
Route::post('reinstate_store',['as'=>'reinstate_store','uses'=>'Compliant\CompliantController@reinstate_store']);
//SUSPENSION DZONGKHA//
Route::get('suspension_dzo',['uses'=>'Compliant\CompliantController@suspension_dzo','as'=>'suspension_dzo']);
Route::post('suspension_store_dzo',['as'=>'suspension_store_dzo','uses'=>'Compliant\CompliantController@suspension_store_dzo']);
Route::get('suspension_view_dzo',['as'=>'suspension_view_dzo','uses'=>'Compliant\CompliantController@suspension_view_dzo']);
Route::get('reinstate_dzo/{id}',['as'=>'reinstate_dzo','uses'=>'Compliant\CompliantController@reinstate_dzo']);
Route::post('reinstate_store_dzo',['as'=>'reinstate_store_dzo','uses'=>'Compliant\CompliantController@reinstate_store_dzo']);

//VISA APPLICATION//
Route::get('visa_application',['as'=>'visa_application','uses'=>'Visa\VisaController@visa_application']);
Route::post('visa_application_purpose',['as'=>'visa_application_purpose','uses'=>'Visa\VisaController@visa_application_purpose']);
Route::get('apply_visa_page/{purposeid}',['as'=>'apply_visa_page','uses'=>'Visa\VisaController@apply_visa_page']);
Route::post('visaapplication_store',['as'=>'visaapplication_store','uses'=>'Visa\VisaController@visaapplication_store']);
Route::get('visaapplication_list/{purposeid}',['as'=>'visaapplication_list','uses'=>'Visa\VisaController@visaapplication_list']);
Route::get('visaapplication_review/{purposeid}/{id}',['as'=>'visaapplication_review','uses'=>'Visa\VisaController@visaapplication_review']);
Route::post('approve_visa/{id}',['as'=>'approve_visa','uses'=>'Visa\VisaController@approve_visa']);
Route::get('visaapplication_resubmit/{purposeid}/{id}',['as'=>'visaapplication_resubmit','uses'=>'Visa\VisaController@visaapplication_resubmit']);
Route::post('update_visa/{id}',['as'=>'update_visa','uses'=>'Visa\VisaController@update_visa']);
//VISA APPLICATION DZONGKHA//
Route::get('visa_application_dzo',['as'=>'visa_application_dzo','uses'=>'Visa\VisaController@visa_application_dzo']);
Route::post('visa_application_purpose_dzo',['as'=>'visa_application_purpose_dzo','uses'=>'Visa\VisaController@visa_application_purpose_dzo']);
Route::get('apply_visa_page_dzo/{purposeid}',['as'=>'apply_visa_page_dzo','uses'=>'Visa\VisaController@apply_visa_page_dzo']);
Route::post('visaapplication_store_dzo',['as'=>'visaapplication_store_dzo','uses'=>'Visa\VisaController@visaapplication_store_dzo']);
Route::get('visaapplication_list_dzo/{purposeid}',['as'=>'visaapplication_list_dzo','uses'=>'Visa\VisaController@visaapplication_list_dzo']);
Route::get('visaapplication_review_dzo/{purposeid}/{id}',['as'=>'visaapplication_review_dzo','uses'=>'Visa\VisaController@visaapplication_review_dzo']);
Route::post('approve_visa_dzo/{id}',['as'=>'approve_visa_dzo','uses'=>'Visa\VisaController@approve_visa_dzo']);
Route::get('visaapplication_resubmit_dzo/{purposeid}/{id}',['as'=>'visaapplication_resubmit_dzo','uses'=>'Visa\VisaController@visaapplication_resubmit_dzo']);
Route::post('update_visa_dzo/{id}',['as'=>'update_visa_dzo','uses'=>'Visa\VisaController@update_visa_dzo']);
Route::get('approvalorder.download/{id}',['as' => 'approvalorder.download', 'uses' => 'Visa\VisaController@downloadImage']);

//STUDENT VISA APPLICATION ENGLISH//
Route::get('visa_application_std',['as'=>'visa_application_std','uses'=>'Visa\VisaController@visa_application_std']);
Route::post('visa_application_student',['as'=>'visa_application_student','uses'=>'Visa\VisaController@visa_application_student']);
Route::get('visaapplication_review_std/{application_no}/{id}',['as'=>'visaapplication_review_std','uses'=>'Visa\VisaController@visaapplication_review_std']);
Route::post('approve_visa_std/{id}',['as'=>'approve_visa_std','uses'=>'Visa\VisaController@approve_visa_std']);
Route::get('visaapplication_resubmit_std/{application_no}/{id}',['as'=>'visaapplication_resubmit_std','uses'=>'Visa\VisaController@visaapplication_resubmit_std']);
Route::get('approvalorderstd.download/{id}',['as' => 'approvalorderstd.download', 'uses' => 'Visa\VisaController@downloadImagestd']);
Route::get('visaapplication_resubmit_std/{application_no}/{id}',['as'=>'visaapplication_resubmit_std','uses'=>'Visa\VisaController@visaapplication_resubmit_std']);
Route::get('delete_stdvisa/{id}/{application_no}/{deleteid}',['as'=>'delete_stdvisa','uses'=>'Visa\VisaController@delete_stdvisa']);
Route::get('delete_stdpermit/{id}/{application_no}/{deleteid}',['as'=>'delete_stdpermit','uses'=>'Visa\VisaController@delete_stdpermit']);
Route::post('update_visa_std/{id}',['as'=>'update_visa_std','uses'=>'Visa\VisaController@update_visa_std']);
//STUDENT VISA APPLICATION DZONGKHA//
Route::get('visa_application_std_dzo',['as'=>'visa_application_std_dzo','uses'=>'Visa\VisaController@visa_application_std_dzo']);
Route::post('visa_application_student_dzo',['as'=>'visa_application_student_dzo','uses'=>'Visa\VisaController@visa_application_student_dzo']);
Route::get('visaapplication_review_std_dzo/{application_no}/{id}',['as'=>'visaapplication_review_std_dzo','uses'=>'Visa\VisaController@visaapplication_review_std_dzo']);
Route::post('approve_visa_std_dzo/{id}',['as'=>'approve_visa_std_dzo','uses'=>'Visa\VisaController@approve_visa_std_dzo']);
Route::get('visaapplication_resubmit_std_dzo/{application_no}/{id}',['as'=>'visaapplication_resubmit_std_dzo','uses'=>'Visa\VisaController@visaapplication_resubmit_std_dzo']);
Route::get('visaapplication_resubmit_std_dzo/{application_no}/{id}',['as'=>'visaapplication_resubmit_std_dzo','uses'=>'Visa\VisaController@visaapplication_resubmit_std_dzo']);
Route::get('delete_stdvisa_dzo/{id}/{application_no}/{deleteid}',['as'=>'delete_stdvisa_dzo','uses'=>'Visa\VisaController@delete_stdvisa_dzo']);
Route::get('delete_stdpermit_dzo/{id}/{application_no}/{deleteid}',['as'=>'delete_stdpermit_dzo','uses'=>'Visa\VisaController@delete_stdpermit_dzo']);
Route::post('update_visa_std_dzo/{id}',['as'=>'update_visa_std_dzo','uses'=>'Visa\VisaController@update_visa_std_dzo']);

//FINANCIAL INFORMATION ENGLISH//
Route::get('financial/{ro_id}',['as'=>'financial','uses'=>'Financial\FinancialController@financial_home']);
Route::post('financialinfo_store',['as'=>'financialinfo_store','uses'=>'Financial\FinancialController@financialinfo_store']);
Route::get('financial_all',['as'=>'financial_all','uses'=>'Financial\FinancialController@financial_all']);
Route::get('financial_review/{id}',['as'=>'financial_review','uses'=>'Financial\FinancialController@financial_review']);
Route::post('approve_financial/{id}',['as'=>'approve_financial','uses'=>'Financial\FinancialController@approve_financial']);
Route::get('financial_resubmit/{id}',['as'=>'financial_resubmit','uses'=>'Financial\FinancialController@financial_resubmit']);
Route::post('update_financial/{id}',['as'=>'update_financial','uses'=>'Financial\FinancialController@update_financial']);
//FINANCIAL INFORMATION DZONGKHA//
Route::get('financial_dzo/{ro_id}',['as'=>'financial_dzo','uses'=>'Financial\FinancialController@financial_home_dzo']);
Route::post('financialinfo_store_dzo',['as'=>'financialinfo_store_dzo','uses'=>'Financial\FinancialController@financialinfo_store_dzo']);
Route::get('financial_all_dzo',['as'=>'financial_all_dzo','uses'=>'Financial\FinancialController@financial_all_dzo']);
Route::get('financial_review_dzo/{id}',['as'=>'financial_review_dzo','uses'=>'Financial\FinancialController@financial_review_dzo']);
Route::post('approve_financial_dzo/{id}',['as'=>'approve_financial_dzo','uses'=>'Financial\FinancialController@approve_financial_dzo']);
Route::get('financial_resubmit_dzo/{id}',['as'=>'financial_resubmit_dzo','uses'=>'Financial\FinancialController@financial_resubmit_dzo']);
Route::post('update_financial_dzo/{id}',['as'=>'update_financial_dzo','uses'=>'Financial\FinancialController@update_financial_dzo']);

//VIEW REGISTERED ROS ENGLISH//
Route::get('view_registered_ro',['as'=>'view_registered_ro','uses'=>'Register\RegisterController@view_registered_ro']);
Route::get('view_registered_ro_all',['as'=>'view_registered_ro_all','uses'=>'Register\RegisterController@view_registered_ro_all']);
Route::get('view_ro_details_all/{ro_id}',['as'=>'view_ro_details_all','uses'=>'Register\RegisterController@view_ro_details_all']);
//VIEW REGISTERED ROS DZONGKHA//
Route::get('view_registered_ro_dzo',['as'=>'view_registered_ro_dzo','uses'=>'Register\RegisterController@view_registered_ro_dzo']);
Route::get('view_registered_ro_all_dzo',['as'=>'view_registered_ro_all_dzo','uses'=>'Register\RegisterController@view_registered_ro_all_dzo']);
Route::get('view_ro_details_all_dzo/{ro_id}',['as'=>'view_ro_details_all_dzo','uses'=>'Register\RegisterController@view_ro_details_all_dzo']);

//NEW INFORMATION ENGLISH//
Route::get('new_information/{ro_id}',['as'=>'new_information','uses'=>'InfoUpdate\InfoUpdateController@new_information']);
Route::post('new_chairman_details_store/{ro_id}',['as'=>'new_chairman_details_store','uses'=>'InfoUpdate\InfoUpdateController@new_chairman_details_store']);
Route::get('newinfo_cro_home',['uses'=>'InfoUpdate\InfoUpdateController@newinfo_cro_home','as'=>'newinfo_cro_home']);
Route::get('cd/view', 'InfoUpdate\InfoUpdateController@viewcd')->name('cdedit');
Route::post('update_cd',['uses'=>'InfoUpdate\InfoUpdateController@update_cd','as'=>'update_cd']);
Route::post('new_dychairman_details_store/{ro_id}',['as'=>'new_dychairman_details_store','uses'=>'InfoUpdate\InfoUpdateController@new_dychairman_details_store']);
Route::get('dcd/view', 'InfoUpdate\InfoUpdateController@viewdcd')->name('dcdedit');
Route::post('update_dcd',['uses'=>'InfoUpdate\InfoUpdateController@update_dcd','as'=>'update_dcd']);
Route::post('new_secretary_details_store/{ro_id}',['as'=>'new_secretary_details_store','uses'=>'InfoUpdate\InfoUpdateController@new_secretary_details_store']);
Route::get('sd/view', 'InfoUpdate\InfoUpdateController@viewsd')->name('sdedit');
Route::post('update_sd',['uses'=>'InfoUpdate\InfoUpdateController@update_sd','as'=>'update_sd']);
Route::post('new_dysecretary_details_store/{ro_id}',['as'=>'new_dysecretary_details_store','uses'=>'InfoUpdate\InfoUpdateController@new_dysecretary_details_store']);
Route::get('dsd/view', 'InfoUpdate\InfoUpdateController@viewdsd')->name('dsdedit');
Route::post('update_dsd',['uses'=>'InfoUpdate\InfoUpdateController@update_dsd','as'=>'update_dsd']);
Route::post('new_treasurer_details_store/{ro_id}',['as'=>'new_treasurer_details_store','uses'=>'InfoUpdate\InfoUpdateController@new_treasurer_details_store']);
Route::get('td/view', 'InfoUpdate\InfoUpdateController@viewtd')->name('tdedit');
Route::post('update_td',['uses'=>'InfoUpdate\InfoUpdateController@update_td','as'=>'update_td']);
Route::get('delete_cd/{id}/{ro_id}',['as'=>'delete_cd','uses'=>'InfoUpdate\InfoUpdateController@delete_cd']);
Route::get('delete_pp/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_pp','as'=>'delete_pp']);
Route::get('delete_ppc/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_ppc','as'=>'delete_ppc']);
Route::get('delete_pps/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_pps','as'=>'delete_pps']);
Route::get('delete_ppsd/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_ppsd','as'=>'delete_ppsd']);
Route::get('delete_ppt/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_ppt','as'=>'delete_ppt']);
//NEW INFORMATION DZONGKHA//
Route::get('new_information_dzo/{ro_id}',['as'=>'new_information_dzo','uses'=>'InfoUpdate\InfoUpdateController@new_information_dzo']);
Route::post('new_chairman_details_store_dzo/{ro_id}',['as'=>'new_chairman_details_store_dzo','uses'=>'InfoUpdate\InfoUpdateController@new_chairman_details_store_dzo']);
Route::get('newinfo_cro_home_dzo',['uses'=>'InfoUpdate\InfoUpdateController@newinfo_cro_home_dzo','as'=>'newinfo_cro_home_dzo']);
Route::get('cd/view_dzo', 'InfoUpdate\InfoUpdateController@viewcd_dzo')->name('cdedit_dzo');
Route::post('update_cd_dzo',['uses'=>'InfoUpdate\InfoUpdateController@update_cd_dzo','as'=>'update_cd_dzo']);
Route::post('new_dychairman_details_store_dzo/{ro_id}',['as'=>'new_dychairman_details_store_dzo','uses'=>'InfoUpdate\InfoUpdateController@new_dychairman_details_store_dzo']);
Route::get('dcd/view_dzo', 'InfoUpdate\InfoUpdateController@viewdcd_dzo')->name('dcdedit_dzo');
Route::post('update_dcd_dzo',['uses'=>'InfoUpdate\InfoUpdateController@update_dcd_dzo','as'=>'update_dcd_dzo']);
Route::post('new_secretary_details_store_dzo/{ro_id}',['as'=>'new_secretary_details_store_dzo','uses'=>'InfoUpdate\InfoUpdateController@new_secretary_details_store_dzo']);
Route::get('sd/view_dzo', 'InfoUpdate\InfoUpdateController@viewsd_dzo')->name('sdedit_dzo');
Route::post('update_sd_dzo',['uses'=>'InfoUpdate\InfoUpdateController@update_sd_dzo','as'=>'update_sd_dzo']);
Route::post('new_dysecretary_details_store_dzo/{ro_id}',['as'=>'new_dysecretary_details_store_dzo','uses'=>'InfoUpdate\InfoUpdateController@new_dysecretary_details_store_dzo']);
Route::get('dsd/view_dzo', 'InfoUpdate\InfoUpdateController@viewdsd_dzo')->name('dsdedit_dzo');
Route::post('update_dsd_dzo',['uses'=>'InfoUpdate\InfoUpdateController@update_dsd_dzo','as'=>'update_dsd_dzo']);
Route::post('new_treasurer_details_store_dzo/{ro_id}',['as'=>'new_treasurer_details_store_dzo','uses'=>'InfoUpdate\InfoUpdateController@new_treasurer_details_store_dzo']);
Route::get('td/view_dzo', 'InfoUpdate\InfoUpdateController@viewtd_dzo')->name('tdedit_dzo');
Route::post('update_td_dzo',['uses'=>'InfoUpdate\InfoUpdateController@update_td_dzo','as'=>'update_td_dzo']);
Route::get('delete_cd_dzo/{id}/{ro_id}',['as'=>'delete_cd_dzo','uses'=>'InfoUpdate\InfoUpdateController@delete_cd_dzo']);
Route::get('delete_pp_dzo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_pp_dzo','as'=>'delete_pp_dzo']);
Route::get('delete_ppc_dzo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_ppc_dzo','as'=>'delete_ppc_dzo']);
Route::get('delete_pps_dzo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_pps_dzo','as'=>'delete_pps_dzo']);
Route::get('delete_ppsd_dzo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_ppsd_dzo','as'=>'delete_ppsd_dzo']);
Route::get('delete_ppt_dzo/{id}/{ro_id}',['uses'=>'InfoUpdate\InfoUpdateController@delete_ppt_dzo','as'=>'delete_ppt_dzo']);

///new info reviewCRO ENGLISH//
Route::get('cd_review/{id}',['as'=>'cd_review','uses'=>'InfoUpdate\InfoUpdateController@cd_review']);
Route::post('approve_cd/{id}',['as'=>'approve_cd','uses'=>'InfoUpdate\InfoUpdateController@approve_cd']);
Route::get('dcd_review/{id}',['as'=>'dcd_review','uses'=>'InfoUpdate\InfoUpdateController@dcd_review']);
Route::post('approve_dcd/{id}',['as'=>'approve_dcd','uses'=>'InfoUpdate\InfoUpdateController@approve_dcd']);
Route::get('sd_review/{id}',['as'=>'sd_review','uses'=>'InfoUpdate\InfoUpdateController@sd_review']);
Route::post('approve_sd/{id}',['as'=>'approve_sd','uses'=>'InfoUpdate\InfoUpdateController@approve_sd']);
Route::get('dsd_review/{id}',['as'=>'dsd_review','uses'=>'InfoUpdate\InfoUpdateController@dsd_review']);
Route::post('approve_dsd/{id}',['as'=>'approve_dsd','uses'=>'InfoUpdate\InfoUpdateController@approve_dsd']);
Route::get('td_review/{id}',['as'=>'td_review','uses'=>'InfoUpdate\InfoUpdateController@td_review']);
Route::post('approve_td/{id}',['as'=>'approve_td','uses'=>'InfoUpdate\InfoUpdateController@approve_td']);
///new info reviewCRO DZONGKHA//
Route::get('cd_review_dzo/{id}',['as'=>'cd_review_dzo','uses'=>'InfoUpdate\InfoUpdateController@cd_review_dzo']);
Route::post('approve_cd_dzo/{id}',['as'=>'approve_cd_dzo','uses'=>'InfoUpdate\InfoUpdateController@approve_cd_dzo']);
Route::get('dcd_review_dzo/{id}',['as'=>'dcd_review_dzo','uses'=>'InfoUpdate\InfoUpdateController@dcd_review_dzo']);
Route::post('approve_dcd_dzo/{id}',['as'=>'approve_dcd_dzo','uses'=>'InfoUpdate\InfoUpdateController@approve_dcd_dzo']);
Route::get('sd_review_dzo/{id}',['as'=>'sd_review_dzo','uses'=>'InfoUpdate\InfoUpdateController@sd_review_dzo']);
Route::post('approve_sd_dzo/{id}',['as'=>'approve_sd_dzo','uses'=>'InfoUpdate\InfoUpdateController@approve_sd_dzo']);
Route::get('dsd_review_dzo/{id}',['as'=>'dsd_review_dzo','uses'=>'InfoUpdate\InfoUpdateController@dsd_review_dzo']);
Route::post('approve_dsd_dzo/{id}',['as'=>'approve_dsd_dzo','uses'=>'InfoUpdate\InfoUpdateController@approve_dsd_dzo']);
Route::get('td_review_dzo/{id}',['as'=>'td_review_dzo','uses'=>'InfoUpdate\InfoUpdateController@td_review_dzo']);
Route::post('approve_td_dzo/{id}',['as'=>'approve_td_dzo','uses'=>'InfoUpdate\InfoUpdateController@approve_td_dzo']);

//REGISTER ENGLISH//
Route::get('enter_token',['uses'=>'Register\RegisterController@enter_token','as'=>'enter_token']);
Route::post('search_token',['uses'=>'Register\RegisterController@search_token','as'=>'search_token']);
//Route::get('search_token',['uses'=>'Register\RegisterController@search_token_blnk','as'=>'search_token_blnk']);
Route::get('register.home',['uses'=>'Register\RegisterController@register_home','as'=>'register_home']);
Route::get('register.chairman',['uses'=>'Register\RegisterController@register_chairman','as'=>'register_chairman']);
Route::get('register.dychairman',['uses'=>'Register\RegisterController@register_dychairman','as'=>'register_dychairman']);
Route::get('register.secretary',['uses'=>'Register\RegisterController@register_secretary','as'=>'register_secretary']);
Route::get('register.dysecretary',['uses'=>'Register\RegisterController@register_dysecretary','as'=>'register_dysecretary']);
Route::get('register.treasurer',['uses'=>'Register\RegisterController@register_treasurer','as'=>'register_treasurer']);
Route::get('register.documents',['uses'=>'Register\RegisterController@register_documents','as'=>'register_documents']);
//REGISTER DZONGKHA//
Route::get('enter_token_dzo',['uses'=>'Register\RegisterController@enter_token_dzo','as'=>'enter_token_dzo']);
Route::post('search_token_dzo',['uses'=>'Register\RegisterController@search_token_dzo','as'=>'search_token_dzo']);
Route::get('register_dzo.home',['uses'=>'Register\RegisterController@register_home_dzo','as'=>'register_home_dzo']);
Route::get('register_dzo.chairman',['uses'=>'Register\RegisterController@register_chairman_dzo','as'=>'register_chairman_dzo']);
Route::get('register_dzo.dychairman',['uses'=>'Register\RegisterController@register_dychairman_dzo','as'=>'register_dychairman_dzo']);
Route::get('register_dzo.secretary',['uses'=>'Register\RegisterController@register_secretary_dzo','as'=>'register_secretary_dzo']);
Route::get('register_dzo.dysecretary',['uses'=>'Register\RegisterController@register_dysecretary_dzo','as'=>'register_dysecretary_dzo']);
Route::get('register_dzo.treasurer',['uses'=>'Register\RegisterController@register_treasurer_dzo','as'=>'register_treasurer_dzo']);
Route::get('register_dzo.documents',['uses'=>'Register\RegisterController@register_documents_dzo','as'=>'register_documents_dzo']);
//register edit new english
Route::get('register.home_a/{token_no}',['uses'=>'Register\RegisterController@register_home_a','as'=>'register_home_a']);
Route::post('ro_details_store_edit',['as'=>'ro_details_store_edit','uses'=>'Register\RegisterController@ro_details_store_edit']);
Route::post('chairman_details_store_edit',['as'=>'chairman_details_store_edit','uses'=>'Register\RegisterController@chairman_details_store_edit']);
Route::post('dychairman_details_store_edit',['as'=>'dychairman_details_store_edit','uses'=>'Register\RegisterController@dychairman_details_store_edit']);
Route::post('secretary_details_store_edit',['as'=>'secretary_details_store_edit','uses'=>'Register\RegisterController@secretary_details_store_edit']);
Route::post('dysecretary_details_store_edit',['as'=>'dysecretary_details_store_edit','uses'=>'Register\RegisterController@dysecretary_details_store_edit']);
Route::post('treasurer_details_store_edit',['as'=>'treasurer_details_store_edit','uses'=>'Register\RegisterController@treasurer_details_store_edit']);
//register edit new dzongkha
Route::get('register.home_a_dzo/{token_no}',['uses'=>'Register\RegisterController@register_home_a_dzo','as'=>'register_home_a_dzo']);
Route::post('ro_details_store_edit_dzo',['as'=>'ro_details_store_edit_dzo','uses'=>'Register\RegisterController@ro_details_store_edit_dzo']);
Route::post('chairman_details_store_edit_dzo',['as'=>'chairman_details_store_edit_dzo','uses'=>'Register\RegisterController@chairman_details_store_edit_dzo']);
Route::post('dychairman_details_store_edit_dzo',['as'=>'dychairman_details_store_edit_dzo','uses'=>'Register\RegisterController@dychairman_details_store_edit_dzo']);
Route::post('secretary_details_store_edit_dzo',['as'=>'secretary_details_store_edit_dzo','uses'=>'Register\RegisterController@secretary_details_store_edit_dzo']);
Route::post('dysecretary_details_store_edit_dzo',['as'=>'dysecretary_details_store_edit_dzo','uses'=>'Register\RegisterController@dysecretary_details_store_edit_dzo']);
Route::post('treasurer_details_store_edit_dzo',['as'=>'treasurer_details_store_edit_dzo','uses'=>'Register\RegisterController@treasurer_details_store_edit_dzo']);

Route::get('certificate.download/{ro_id}',['as' => 'certificate.download', 'uses' => 'Register\RegisterController@downloadceritficate']);

//REGISTER STORE//
Route::post('ro_details_store',['as'=>'ro_details_store','uses'=>'Register\RegisterController@ro_details_store']);
Route::get('chairman_details/{det}',['as'=>'chairman_details','uses'=>'Register\RegisterController@chairman_details']);
Route::post('chairman_details_store',['as'=>'chairman_details_store','uses'=>'Register\RegisterController@chairman_details_store']);
Route::get('dychairman_details/{dets}',['as'=>'dychairman_details','uses'=>'Register\RegisterController@dychairman_details']);
Route::post('dychairman_details_store',['as'=>'dychairman_details_store','uses'=>'Register\RegisterController@dychairman_details_store']);
Route::get('secretary_details/{dets}',['as'=>'secretary_details','uses'=>'Register\RegisterController@secretary_details']);
Route::post('secretary_details_store',['as'=>'secretary_details_store','uses'=>'Register\RegisterController@secretary_details_store']);
Route::get('dysecretary_details/{dets}',['as'=>'dysecretary_details','uses'=>'Register\RegisterController@dysecretary_details']);
Route::post('dysecretary_details_store',['as'=>'dysecretary_details_store','uses'=>'Register\RegisterController@dysecretary_details_store']);
Route::get('treasurer_details/{dets}',['as'=>'treasurer_details','uses'=>'Register\RegisterController@treasurer_details']);
Route::post('treasurer_details_store',['as'=>'treasurer_details_store','uses'=>'Register\RegisterController@treasurer_details_store']);
Route::get('document_details/{dets}',['as'=>'document_details','uses'=>'Register\RegisterController@document_details']);
Route::post('document_details_store',['as'=>'document_details_store','uses'=>'Register\RegisterController@document_details_store']);
//REGISTER STORE//
Route::post('ro_details_store_dzo',['as'=>'ro_details_store_dzo','uses'=>'Register\RegisterController@ro_details_store_dzo']);
Route::get('chairman_details_dzo/{det}',['as'=>'chairman_details_dzo','uses'=>'Register\RegisterController@chairman_details_dzo']);
Route::post('chairman_details_store_dzo',['as'=>'chairman_details_store_dzo','uses'=>'Register\RegisterController@chairman_details_store_dzo']);
Route::get('dychairman_details_dzo/{dets}',['as'=>'dychairman_details_dzo','uses'=>'Register\RegisterController@dychairman_details_dzo']);
Route::post('dychairman_details_store_dzo',['as'=>'dychairman_details_store_dzo','uses'=>'Register\RegisterController@dychairman_details_store_dzo']);
Route::get('secretary_details_dzo/{dets}',['as'=>'secretary_details_dzo','uses'=>'Register\RegisterController@secretary_details_dzo']);
Route::post('secretary_details_store_dzo',['as'=>'secretary_details_store_dzo','uses'=>'Register\RegisterController@secretary_details_store_dzo']);
Route::get('dysecretary_details_dzo/{dets}',['as'=>'dysecretary_details_dzo','uses'=>'Register\RegisterController@dysecretary_details_dzo']);
Route::post('dysecretary_details_store_dzo',['as'=>'dysecretary_details_store_dzo','uses'=>'Register\RegisterController@dysecretary_details_store_dzo']);
Route::get('treasurer_details_dzo/{dets}',['as'=>'treasurer_details_dzo','uses'=>'Register\RegisterController@treasurer_details_dzo']);
Route::post('treasurer_details_store_dzo',['as'=>'treasurer_details_store_dzo','uses'=>'Register\RegisterController@treasurer_details_store_dzo']);
Route::get('document_details_dzo/{dets}',['as'=>'document_details_dzo','uses'=>'Register\RegisterController@document_details_dzo']);
Route::post('document_details_store_dzo',['as'=>'document_details_store_dzo','uses'=>'Register\RegisterController@document_details_store_dzo']);

//EDIT REGISTER ENGLISH//
Route::get('edit_ro/{ro_id}',['as'=>'edit_ro','uses'=>'Register\RegisterController@edit_ro']);
Route::post('update_ro/{id}',['as'=>'update_ro','uses'=>'Register\RegisterController@update_ro']);
Route::post('approve_ro/{id}',['as'=>'approve_ro','uses'=>'Register\RegisterController@approve_ro']);
Route::get('view_ro_details',['as'=>'view_ro_details','uses'=>'Register\RegisterController@view_ro_details']);
//EDIT REGISTER DZONGKHA//
Route::get('edit_ro_dzo/{ro_id}',['as'=>'edit_ro_dzo','uses'=>'Register\RegisterController@edit_ro_dzo']);
Route::post('update_ro_dzo/{id}',['as'=>'update_ro_dzo','uses'=>'Register\RegisterController@update_ro_dzo']);
Route::post('approve_ro_dzo/{id}',['as'=>'approve_ro_dzo','uses'=>'Register\RegisterController@approve_ro_dzo']);
Route::get('view_ro_details_dzo',['as'=>'view_ro_details_dzo','uses'=>'Register\RegisterController@view_ro_details_dzo']);

//INFORMATION UPDATE//
Route::get('update_ro_info/{ro_id}',['as'=>'update_ro_info','uses'=>'InfoUpdate\InfoUpdateController@update_ro_info']);
Route::post('change_ro_info/{id}',['as'=>'change_ro_info','uses'=>'InfoUpdate\InfoUpdateController@change_ro_info']);
Route::get('infoupdate_home.home',['uses'=>'InfoUpdate\InfoUpdateController@infoupdate_home','as'=>'infoupdate_home']);
Route::get('view_updateinfo_details/{ro_id}',['as'=>'view_updateinfo_details','uses'=>'InfoUpdate\InfoUpdateController@view_updateinfo_details']);
Route::post('approve_updatedinfo/{id}',['as'=>'approve_updatedinfo','uses'=>'InfoUpdate\InfoUpdateController@approve_updatedinfo']);
Route::post('updateinfo_edit/{id}',['as'=>'updateinfo_edit','uses'=>'InfoUpdate\InfoUpdateController@updateinfo_edit']);
Route::get('infoupdate_home_ro.home',['uses'=>'InfoUpdate\InfoUpdateController@infoupdate_home_ro','as'=>'infoupdate_home_ro']);
//INFORMATION UPDATE DZONGKHA//
Route::get('update_ro_info_dzo/{ro_id}',['as'=>'update_ro_info_dzo','uses'=>'InfoUpdate\InfoUpdateController@update_ro_info_dzo']);
Route::post('change_ro_info_dzo/{id}',['as'=>'change_ro_info_dzo','uses'=>'InfoUpdate\InfoUpdateController@change_ro_info_dzo']);
Route::get('infoupdate_home.home_dzo',['uses'=>'InfoUpdate\InfoUpdateController@infoupdate_home_dzo','as'=>'infoupdate_home_dzo']);
Route::get('view_updateinfo_details_dzo/{ro_id}',['as'=>'view_updateinfo_details_dzo','uses'=>'InfoUpdate\InfoUpdateController@view_updateinfo_details_dzo']);
Route::post('approve_updatedinfo_dzo/{id}',['as'=>'approve_updatedinfo_dzo','uses'=>'InfoUpdate\InfoUpdateController@approve_updatedinfo_dzo']);
Route::post('updateinfo_edit_dzo/{id}',['as'=>'updateinfo_edit_dzo','uses'=>'InfoUpdate\InfoUpdateController@updateinfo_edit_dzo']);
Route::get('infoupdate_home_ro_dzo.home',['uses'=>'InfoUpdate\InfoUpdateController@infoupdate_home_ro_dzo','as'=>'infoupdate_home_ro_dzo']);

/////////////TAX/////
Route::get('tax_exempt',['uses'=>'Tax\TaxController@tax_exempt','as'=>'tax_exempt']);
Route::get('tax_exempt_add',['uses'=>'Tax\TaxController@tax_exempt_add','as'=>'tax_exempt_add']);
Route::post('store_taxexempt',['as'=>'store_taxexempt','uses'=>'Tax\TaxController@store_taxexempt']);
Route::get('taxexempt_review/{id}',['as'=>'taxexempt_review','uses'=>'Tax\TaxController@taxexempt_review']);
Route::post('approve_taxexempt/{id}',['as'=>'approve_taxexempt','uses'=>'Tax\TaxController@approve_taxexempt']);
Route::get('tax_exempt_re_add/{id}',['as'=>'tax_exempt_re_add','uses'=>'Tax\TaxController@tax_exempt_re_add']);
Route::get('delete_file/{id}',['as'=>'delete_file','uses'=>'Tax\TaxController@delete_file']);
Route::get('delete_file2/{id}',['as'=>'delete_file2','uses'=>'Tax\TaxController@delete_file2']);
Route::post('update_tax_resubmit/{id}',['as'=>'update_tax_resubmit','uses'=>'Tax\TaxController@update_tax_resubmit']);
/////////////TAX DZONGKHA/////
Route::get('tax_exempt_dzo',['uses'=>'Tax\TaxController@tax_exempt_dzo','as'=>'tax_exempt_dzo']);
Route::get('tax_exempt_add_dzo',['uses'=>'Tax\TaxController@tax_exempt_add_dzo','as'=>'tax_exempt_add_dzo']);
Route::post('store_taxexempt_dzo',['as'=>'store_taxexempt_dzo','uses'=>'Tax\TaxController@store_taxexempt_dzo']);
Route::get('taxexempt_review_dzo/{id}',['as'=>'taxexempt_review_dzo','uses'=>'Tax\TaxController@taxexempt_review_dzo']);
Route::post('approve_taxexempt_dzo/{id}',['as'=>'approve_taxexempt_dzo','uses'=>'Tax\TaxController@approve_taxexempt_dzo']);
Route::get('tax_exempt_re_add_dzo/{id}',['as'=>'tax_exempt_re_add_dzo','uses'=>'Tax\TaxController@tax_exempt_re_add_dzo']);
Route::get('delete_file_dzo/{id}',['as'=>'delete_file_dzo','uses'=>'Tax\TaxController@delete_file_dzo']);
Route::get('delete_file2_dzo/{id}',['as'=>'delete_file2_dzo','uses'=>'Tax\TaxController@delete_file2_dzo']);
Route::post('update_tax_resubmit_dzo/{id}',['as'=>'update_tax_resubmit_dzo','uses'=>'Tax\TaxController@update_tax_resubmit_dzo']);

Route::get('approval.download/{id}',['as' => 'approval.download', 'uses' => 'Tax\TaxController@downloadImage']);



Route::post('zheldrang.update',['uses'=>'Zheldrang\ZheldrangController@updatezheldrang','as'=>'update_zheldrang']);
Route::get('zheldrang/view', 'Zheldrang\ZheldrangController@view')->name('zheldrangedit');
Route::post('eventreport_searchall','Report\ReportController@eventreport_searchall')->name('eventreport_searchall');
Route::post('donationreport_searchall','Report\ReportController@donationreport_searchall')->name('donationreport_searchall');
Route::post('memberreport_searchall','Report\ReportController@memberreport_searchall')->name('memberreport_searchall');

//ZHELDRANG ENGLISH//
Route::get('zheldrang',['uses'=>'Zheldrang\ZheldrangController@zheldrang','as'=>'zheldrang']);
Route::get('zheldrang_add',['uses'=>'Zheldrang\ZheldrangController@zheldrang_add','as'=>'zheldrang_add']);
Route::post('zheldrang_store',['as'=>'zheldrang_store','uses'=>'Zheldrang\ZheldrangController@zheldrang_store']);
Route::get('zheldrang/destroy/{id}',['uses'=>'Zheldrang\ZheldrangController@destroy','as'=>'destroy_zheldrang']);
//ZHELDRANG DZONGKHA//
Route::get('zheldrang_dzo',['uses'=>'Zheldrang\ZheldrangController@zheldrang_dzo','as'=>'zheldrang_dzo']);
Route::get('zheldrang_add_dzo',['uses'=>'Zheldrang\ZheldrangController@zheldrang_add_dzo','as'=>'zheldrang_add_dzo']);
Route::post('zheldrang_store_dzo',['as'=>'zheldrang_store_dzo','uses'=>'Zheldrang\ZheldrangController@zheldrang_store_dzo']);
Route::get('zheldrang_dzo/destroy/{id}',['uses'=>'Zheldrang\ZheldrangController@destroy_dzo','as'=>'destroy_zheldrang_dzo']);

Route::post('zheldrang_check',['as'=>'zheldrang_check','uses'=>'Zheldrang\ZheldrangController@ajaxRequestPost']);

//LOCAL CHAPTER ENGLISH//
Route::get('local_chapter',['uses'=>'LocalChapter\LocalChapterController@local_chapter','as'=>'local_chapter']);
Route::get('chapter_add',['uses'=>'LocalChapter\LocalChapterController@chapter_add','as'=>'chapter_add']);
Route::post('chapter_details_store',['as'=>'chapter_details_store','uses'=>'LocalChapter\LocalChapterController@chapter_details_store']);
Route::get('chapter_chairman_details/{det}',['as'=>'chapter_chairman_details','uses'=>'LocalChapter\LocalChapterController@chapter_chairman_details']);
Route::post('chapter_chairman_details_store',['as'=>'chapter_chairman_details_store','uses'=>'LocalChapter\LocalChapterController@chapter_chairman_details_store']);
Route::get('chapter_secretary_details/{dets}',['as'=>'chapter_secretary_details','uses'=>'LocalChapter\LocalChapterController@chapter_secretary_details']);
Route::post('chapter_secretary_details_store',['as'=>'chapter_secretary_details_store','uses'=>'LocalChapter\LocalChapterController@chapter_secretary_details_store']);
Route::get('chapter_treasurer_details/{dets}',['as'=>'chapter_treasurer_details','uses'=>'LocalChapter\LocalChapterController@chapter_treasurer_details']);
Route::post('chapter_treasurer_details_store',['as'=>'chapter_treasurer_details_store','uses'=>'LocalChapter\LocalChapterController@chapter_treasurer_details_store']);
Route::get('view_chapters/{chapter_id}',['as'=>'view_chapters','uses'=>'LocalChapter\LocalChapterController@view_chapters']);
Route::get('edit_chapters/{chapter_id}',['as'=>'edit_chapters','uses'=>'LocalChapter\LocalChapterController@edit_chapters']);
Route::post('update_chapter/{id}',['as'=>'update_chapter','uses'=>'LocalChapter\LocalChapterController@update_chapter']);
Route::get('delete_chapterdoc/{id}/{chapter_id}',['as'=>'delete_chapterdoc','uses'=>'LocalChapter\LocalChapterController@delete_chapterdoc']);
Route::post('approve_chapter/{chapter_id}',['as'=>'approve_chapter','uses'=>'LocalChapter\LocalChapterController@approve_chapter']);
//LOCAL CHAPTER DZONGKHA//
Route::get('local_chapter_dzo',['uses'=>'LocalChapter\LocalChapterController@local_chapter_dzo','as'=>'local_chapter_dzo']);
Route::get('chapter_add_dzo',['uses'=>'LocalChapter\LocalChapterController@chapter_add_dzo','as'=>'chapter_add_dzo']);
Route::post('chapter_details_store_dzo',['as'=>'chapter_details_store_dzo','uses'=>'LocalChapter\LocalChapterController@chapter_details_store_dzo']);
Route::get('chapter_chairman_details_dzo/{det}',['as'=>'chapter_chairman_details_dzo','uses'=>'LocalChapter\LocalChapterController@chapter_chairman_details_dzo']);
Route::post('chapter_chairman_details_store_dzo',['as'=>'chapter_chairman_details_store_dzo','uses'=>'LocalChapter\LocalChapterController@chapter_chairman_details_store_dzo']);
Route::get('chapter_secretary_details_dzo/{dets}',['as'=>'chapter_secretary_details_dzo','uses'=>'LocalChapter\LocalChapterController@chapter_secretary_details_dzo']);
Route::post('chapter_secretary_details_store_dzo',['as'=>'chapter_secretary_details_store_dzo','uses'=>'LocalChapter\LocalChapterController@chapter_secretary_details_store_dzo']);
Route::get('chapter_treasurer_details_dzo/{dets}',['as'=>'chapter_treasurer_details_dzo','uses'=>'LocalChapter\LocalChapterController@chapter_treasurer_details_dzo']);
Route::post('chapter_treasurer_details_store_dzo',['as'=>'chapter_treasurer_details_store_dzo','uses'=>'LocalChapter\LocalChapterController@chapter_treasurer_details_store_dzo']);
Route::get('view_chapters_dzo/{chapter_id}',['as'=>'view_chapters_dzo','uses'=>'LocalChapter\LocalChapterController@view_chapters_dzo']);
Route::get('edit_chapters_dzo/{chapter_id}',['as'=>'edit_chapters_dzo','uses'=>'LocalChapter\LocalChapterController@edit_chapters_dzo']);
Route::post('update_chapter_dzo/{id}',['as'=>'update_chapter_dzo','uses'=>'LocalChapter\LocalChapterController@update_chapter_dzo']);
Route::get('delete_chapterdoc_dzo/{id}/{chapter_id}',['as'=>'delete_chapterdoc_dzo','uses'=>'LocalChapter\LocalChapterController@delete_chapterdoc_dzo']);
Route::post('approve_chapter_dzo/{chapter_id}',['as'=>'approve_chapter_dzo','uses'=>'LocalChapter\LocalChapterController@approve_chapter_dzo']);

//REPORT ENGLISH//
Route::get('report',['as'=>'report','uses'=>'Report\ReportController@report']);
Route::get('report_zheldrang',['uses'=>'Report\ReportController@report_zheldrang','as'=>'report_zheldrang']);
Route::post('zheldrangreport_search','Report\ReportController@zheldrangreport_search')->name('zheldrangreport_search');
Route::get('report_donation',['uses'=>'Report\ReportController@report_donation','as'=>'report_donation']);
Route::post('donationreport_search','Report\ReportController@donationreport_search')->name('donationreport_search');
Route::get('report_visa',['uses'=>'Report\ReportController@report_visa','as'=>'report_visa']);
Route::post('visareport_search','Report\ReportController@visareport_search')->name('visareport_search');
Route::get('report_financial',['uses'=>'Report\ReportController@report_financial','as'=>'report_financial']);
Route::post('financialreport_search','Report\ReportController@financialreport_search')->name('financialreport_search');
Route::get('report_event',['uses'=>'Report\ReportController@report_event','as'=>'report_event']);
Route::post('eventreport_search','Report\ReportController@eventreport_search')->name('eventreport_search');
Route::get('report_member',['uses'=>'Report\ReportController@report_member','as'=>'report_member']);
Route::post('memberreport_search','Report\ReportController@memberreport_search')->name('memberreport_search');
Route::get('report_deregistration',['uses'=>'Report\ReportController@report_deregistration','as'=>'report_deregistration']);
Route::post('deregistrationreport_search','Report\ReportController@deregistrationreport_search')->name('deregistrationreport_search');
Route::get('report_mom',['uses'=>'Report\ReportController@report_mom','as'=>'report_mom']);
Route::post('momreport_search','Report\ReportController@momreport_search')->name('momreport_search');
Route::get('report_tax',['uses'=>'Report\ReportController@report_tax','as'=>'report_tax']);
Route::post('taxreport_search','Report\ReportController@taxreport_search')->name('taxreport_search');
Route::get('report_chapter',['uses'=>'Report\ReportController@report_chapter','as'=>'report_chapter']);
Route::post('chapterreport_search','Report\ReportController@chapterreport_search')->name('chapterreport_search');
//REPORT Dzongkha//
Route::get('report_dzo',['as'=>'report_dzo','uses'=>'Report\ReportController@report_dzo']);
Route::get('report_zheldrang_dzo',['uses'=>'Report\ReportController@report_zheldrang_dzo','as'=>'report_zheldrang_dzo']);
Route::post('zheldrangreport_search_dzo','Report\ReportController@zheldrangreport_search_dzo')->name('zheldrangreport_search_dzo');
Route::get('report_donation_dzo',['uses'=>'Report\ReportController@report_donation_dzo','as'=>'report_donation_dzo']);
Route::post('donationreport_search_dzo','Report\ReportController@donationreport_search_dzo')->name('donationreport_search_dzo');
Route::get('report_visa_dzo',['uses'=>'Report\ReportController@report_visa_dzo','as'=>'report_visa_dzo']);
Route::post('visareport_search_dzo','Report\ReportController@visareport_search_dzo')->name('visareport_search_dzo');
Route::get('report_financial_dzo',['uses'=>'Report\ReportController@report_financial_dzo','as'=>'report_financial_dzo']);
Route::post('financialreport_search_dzo','Report\ReportController@financialreport_search_dzo')->name('financialreport_search_dzo');
Route::get('report_event_dzo',['uses'=>'Report\ReportController@report_event_dzo','as'=>'report_event_dzo']);
Route::post('eventreport_search_dzo','Report\ReportController@eventreport_search_dzo')->name('eventreport_search_dzo');
Route::get('report_member_dzo',['uses'=>'Report\ReportController@report_member_dzo','as'=>'report_member_dzo']);
Route::post('memberreport_search_dzo','Report\ReportController@memberreport_search_dzo')->name('memberreport_search_dzo');
Route::get('report_deregistration_dzo',['uses'=>'Report\ReportController@report_deregistration_dzo','as'=>'report_deregistration_dzo']);
Route::post('deregistrationreport_search_dzo','Report\ReportController@deregistrationreport_search_dzo')->name('deregistrationreport_search_dzo');
Route::get('report_mom_dzo',['uses'=>'Report\ReportController@report_mom_dzo','as'=>'report_mom_dzo']);
Route::post('momreport_search_dzo','Report\ReportController@momreport_search_dzo')->name('momreport_search_dzo');
Route::get('report_tax_dzo',['uses'=>'Report\ReportController@report_tax_dzo','as'=>'report_tax_dzo']);
Route::post('taxreport_search_dzo','Report\ReportController@taxreport_search_dzo')->name('taxreport_search_dzo');
Route::get('report_chapter_dzo',['uses'=>'Report\ReportController@report_chapter_dzo','as'=>'report_chapter_dzo']);
Route::post('chapterreport_search_dzo','Report\ReportController@chapterreport_search_dzo')->name('chapterreport_search_dzo');
