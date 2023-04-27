<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dzongkhag extends Model
{
   protected $primaryKey='dzongkhag_id';
   
    public function displaygewog()
    {
    	return $this->belongsTo('App\gewog','gewog_id','gewog_name','App\dzongkhag','dzongkhag_id','dzongkhag_name');
    }
    public function displaydzongkhag()
    {
    	return $this->belongsTo('App\gewog','App\dzongkhag','gewog_id','gewog_name','dzongkhag_id','dzongkhag_name');
    }
}


