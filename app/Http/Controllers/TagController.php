<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public static function index()
    {
        $all = Tag::all();
        return $all;
    }
}
