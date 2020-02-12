<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contender extends Model
{
    public $timestamps = true;

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}
