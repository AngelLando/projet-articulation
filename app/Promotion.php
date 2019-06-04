<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['type', 'amount'];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
