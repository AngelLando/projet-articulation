<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentRating extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function productRating() {
        return $this->belongsTo('App\ProductRating');
    }
}
