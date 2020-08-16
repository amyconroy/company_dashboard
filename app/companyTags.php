<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class companyTag extends Model
{
    protected $table = 'companytag';
    protected $fillable = ['company_id', 'tags_id'];
    public $timestamps = false;
}
