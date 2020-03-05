<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Contender extends Model
{
    public $timestamps = true;
    protected $fillable = ['name','email','gender','status'];
    protected $guarded = ['status','token'];
    protected $hidden = ['token'];
    protected $visible = ['id','name','email','gender','status','gravatar'];
    protected $appends = ['gravatar'];

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
    /**
     * Gravatar
     * Returns the gravatar url based on user email
     */
    public function getGravatarAttribute()
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://www.gravatar.com/avatar/$hash?s=320&d=wavatar&r=r";
    }
    /**
     * Overwriting for setting a token
     */
    public function save(array $options = array())
    {
        if(empty($this->token)) {
            $this->token = Uuid::uuid4();
        }
        return parent::save($options);
    }
}
