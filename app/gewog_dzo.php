<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gewog_dzo extends Model
{
    protected $primaryKey='gewog_id';
    
    public function displaydzongkhag()
    {
    	return $this->belongsTo('App\dzongkhag_dzo','dzongkhag_id','dzongkhag_id');
    }
 
}


