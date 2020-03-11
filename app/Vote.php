<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public $timestamps = true;
    protected $fillable = ['status','voter_email','election_id','contender_id'];
    protected $guarded = ['election_id','contender_id','voter_email',''];
    // protected $hidden = [];
    protected $visible = ['id','status','voter_email','election_id','contender_id','created_at','updated_at'];
    // protected $appends = [];

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['election','contender'];

    /**
     * Get the election that has this vote.
     */
    public function election()
    {
        return $this->belongsTo('App\Election');
    }
    /**
     * Get the contender that got this vote.
     */
    public function contender()
    {
        return $this->belongsTo('App\Contender');
    }
}
