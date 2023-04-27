<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_visaapproval_order_doc extends Model
{
    protected $fillable = ['application_id', 'file_name', 'filecat', 'doc_path','id'];
}
