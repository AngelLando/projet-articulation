<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appellation;

class AppellationController extends Controller
{
    public static function index()
    {
        $all = Appellation::all();
        return $all;
    }
}
