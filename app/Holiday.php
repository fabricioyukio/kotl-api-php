<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    public $timestamps = false;
    protected $fillable = ['date','name','public'];
    // protected $guarded = [];
    // protected $hidden = [];
    protected $visible = ['id','date','name','public'];
    // protected $appends = [];
}
