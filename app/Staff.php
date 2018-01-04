<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function station()
    {
        return $this->belongsTo('App\Station');
    }

}
