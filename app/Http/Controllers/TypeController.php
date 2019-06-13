<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    public static function index()
    {
        $all = Type::all();
        return $all;
    }
}
