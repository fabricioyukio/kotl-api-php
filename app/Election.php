<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    public $timestamps = true;
    protected $fillable = ['status','type','available_at','started_at','ended_at'];
    protected $guarded = ['status','token'];
    // protected $hidden = [];
    protected $visible = ['id','status','type','available_at','started_at','ended_at'];
    // protected $appends = [];

    public function scopeDaily($query)
    {
        return $query->where('type','DAILY')->orderBy('available_at','asc')->orderBy('id','desc');
    }

    public function scopeWeekly($query)
    {
        return $query->where('type','WEEKLY')->orderBy('available_at','asc')->orderBy('id','desc');
    }

    public function scopeOpen($query)
    {
        return $query->where('status','OPEN')->orderBy('available_at','asc')->orderBy('id','desc');
    }

    public function scopeClosed($query)
    {
        return $query->where('status','CLOSED')->orderBy('ended_at','desc')->orderBy('id','desc');
    }
}
