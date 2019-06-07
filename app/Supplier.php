<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'url_website', 'region_id'];
    
    public function products() {
        return $this->hasMany('App\Product');
    }

    public function region() {
        return $this->belongsTo('App\Region');
    }
}
