<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class village extends Model
{
    protected $primaryKey='village_id';
    
    public function displaygewog()
    {
    	return $this->belongsTo('App\gewog','gewog_id','gewog_id');
    }



}



