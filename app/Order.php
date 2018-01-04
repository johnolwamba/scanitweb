<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function payment()
    {
        return $this->hasMany('App\Payment');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function lineitems()
    {
        return $this->hasMany('App\OrderLineItem');
    }

}
