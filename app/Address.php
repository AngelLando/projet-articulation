<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable=['id','street','npa','city', 'region', 'country','person_id'];
    public $timestamps=false;

    public function person() {
        return $this->belongsTo('App\Person');
    }

    public function order() {
        return $this->hasMany('App\Order');
    }
}
