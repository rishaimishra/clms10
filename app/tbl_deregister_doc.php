<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_deregister_doc extends Model
{
     protected $fillable = ['app_id', 'file_name', 'filecat', 'doc_path','id'];
}
