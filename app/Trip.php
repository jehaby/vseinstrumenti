<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Trip extends Model
{
    public $timestamps = false;

    public $fillable = ['courier_id', 'region_id', 'departure_date', 'arrival_date', 'return_date'];


    public function courier()
    {
        return $this->belongsTo('App\Courier');
    }


    public function region()
    {
        return $this->belongsTo('App\Region');
    }


}
