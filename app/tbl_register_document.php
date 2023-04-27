<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_register_document extends Model
{
     protected $fillable = ['ro_id', 'file_name', 'filecat', 'doc_path','applicantid'];
}
