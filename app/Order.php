<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function address() {
        return $this->belongsTo('App\Address');
    }

    public function shippingCost() {
        return $this->hasOne('App\ShippingCost');
    }

    public function orderItems() {
        return $this->hasMany('App\OrderItem');
    }
}
