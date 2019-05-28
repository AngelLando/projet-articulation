<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function suppliers() {
        return $this->hasMany('App\Supplier');
    }

    public function regions() {
        return $this->hasMany('App\Region');
    }
}
