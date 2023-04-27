<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class gewog extends Model
{
    protected $primaryKey='gewog_id';
    
    public function displaydzongkhag()
    {
    	return $this->belongsTo('App\dzongkhag','dzongkhag_id','dzongkhag_id');
    }
 
}


