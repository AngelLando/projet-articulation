<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable=['id','delivery_method','tva','discount', 'payment_method', 'gift','comment', 'address_id_1', 'address_id_2', 'address_id_3', 'shipping_cost_id'];
    public $timestamps=true;

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
