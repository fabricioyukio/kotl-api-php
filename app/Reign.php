<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reign extends Model
{
    public $timestamps = true;
    protected $fillable = ['election_id','ruler_id','type','title','from','to'];
    protected $guarded = ['from','to'];
    // protected $hidden = [];
    protected $visible = ['id','election_id','ruler_id','type','title','from','to'];
    // protected $appends = [];

    public function scopeDaily($query)
    {
        return $query->where('type','DAY')->orderBy('id','desc');
    }

    public function scopeWeekly($query)
    {
        return $query->where('type','WEEK')->orderBy('id','desc');
    }

}
