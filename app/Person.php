<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'prefix', 'gender'
    ];

    public function address() {
        return $this->hasMany('App\Address');
    }

    public function users() {
        return $this->hasMany('App\User');
    }
}
