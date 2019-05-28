<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function address() {
        return $this->hasMany('App\Address');
    }

    public function users() {
        return $this->hasMany('App\User');
    }
}
