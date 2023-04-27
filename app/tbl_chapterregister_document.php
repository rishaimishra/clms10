<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbl_chapterregister_document extends Model
{
     protected $fillable = ['ro_id', 'file_name', 'filecat', 'doc_path','applicantid','chapter','organization'];
}
