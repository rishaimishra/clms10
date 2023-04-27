<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class village_dzo extends Model
{
    protected $primaryKey='village_id';
    
    public function displaygewog()
    {
    	return $this->belongsTo('App\gewog_dzo','gewog_id','gewog_id');
    }



}



