<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_taxexemption_recommendation_doc extends Model
{
    protected $fillable = ['ro_id', 'file_name', 'filecat', 'doc_path','app_id'];
}
