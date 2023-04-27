<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_financial_information_doc extends Model
{
     protected $fillable = ['app_id', 'file_name', 'filecat', 'doc_path','id'];
}
