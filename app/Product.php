<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function appellations() {
        return $this->belongsToMany('App\Appellation');
    }

    public function cartItem() {
        return $this->hasMany('App\CartItem');
    }

    public function format() {
        return $this->hasOne('App\Format');
    }

    public function orderItem() {
        return $this->hasMany('App\OrderItem');
    }

    public function prices() {
        return $this->belongsToMany('App\Price');
    }

    public function productRatings() {
        return $this->hasMany('App\ProductRating');
    }

    public function region() {
        return $this->hasOne('App\Region');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function type() {
        return $this->belongsTo('App\Type');
    }
}
