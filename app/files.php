<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    protected $table = 'files';
    protected $guarded = ['id'];
    protected $fillable = ['fileName', 'filePath', 'userId'];
}
