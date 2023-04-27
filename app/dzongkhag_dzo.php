<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dzongkhag_dzo extends Model
{
   protected $primaryKey='dzongkhag_id';
   
    public function displaygewog()
    {
    	return $this->belongsTo('App\gewog_dzo','gewog_id','gewog_name','App\dzongkhag_dzo','dzongkhag_id','dzongkhag_name');
    }
    public function displaydzongkhag()
    {
    	return $this->belongsTo('App\gewog_dzo','App\dzongkhag_dzo','gewog_id','gewog_name','dzongkhag_id','dzongkhag_name');
    }
}


