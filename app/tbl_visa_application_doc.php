<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_visa_application_doc extends Model
{
    protected $fillable = ['ro_id', 'file_name', 'filecat', 'doc_path','app_id'];
}
