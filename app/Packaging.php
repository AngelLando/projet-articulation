<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    protected $fillable = ['type', 'capacity'];

    public function formats() {
        return $this->belongsToMany('App\Format');
    }
}
