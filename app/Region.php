<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function products() {
        return $this->belongsTo('App\Product');
    }
}
