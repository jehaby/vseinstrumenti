<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public $timestamps = false;


    public function schedules()
    {
        return $this->hasMany('App\Schedule');
    }

    public function fullName()
    {
        return $this->first_name . ' ' . $this->surname . ' ' . $this->last_name;
    }
}
