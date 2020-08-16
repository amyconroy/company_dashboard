<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    protected $table = 'tags';
    protected $fillable = ['tagName'];
    public $timestamps = false;

    public function company()
    {
        return $this->belongsToMany('App\company');
    }
}
