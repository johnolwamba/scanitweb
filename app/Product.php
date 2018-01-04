<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    public function scan()
    {
        return $this->hasMany('App\Scan');
    }

    public function lineitems()
    {
        return $this->hasMany('App\OrderLineItem');
    }

}
