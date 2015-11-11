<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

    public $timestamps = false;


    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }


}
