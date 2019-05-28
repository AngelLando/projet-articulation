<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Packaging extends Model
{
    public function formats() {
        return $this->belongsToMany('App\Format');
    }
}
