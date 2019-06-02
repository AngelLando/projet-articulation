<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['product_id', 'cart_id', 'quantity'];

    public function cart() {
        return $this->belongsTo('App\Cart');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }
}
