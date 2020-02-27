<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contender extends Model
{
    public $timestamps = true;
    protected $fillable = ['name','email','gender','status','token'];
    protected $guarded = ['status','token'];

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
    public function scopeActive($query)
    {
        return $query->where('status','ACTIVE')->orderBy('name','asc')->orderBy('id','desc');
    }
    public function scopeInactive($query)
    {
        return $query->where('status','!=','ACTIVE')->orderBy('name','asc')->orderBy('id','asc');
    }
}
