<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model for the company table in the database. Used to insert and query data.

class company extends Model
{
    /** 
     * table associated with the model.
     * @var string
     */
    protected $table = 'company';
    // not mass assignable, prevents security issues
    protected $guarded = ['id'];
    protected $fillable = ['companyName', 'companyDescription', 'userId'];
    public $timestamps = false;

    public function tags()
    {
        return $this->belongsToMany('App\tags');
    }
}
