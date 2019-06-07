<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    protected $fillable = ['name'];

    public function packagings() {
        return $this->belongsToMany('App\Packaging');
    }

    public function products() {
        return $this->hasMany('App\Product');
    }
}
