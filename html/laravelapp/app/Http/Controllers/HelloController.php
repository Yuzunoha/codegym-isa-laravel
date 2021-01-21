<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    function index()
    {
        return view('hello.index', ['data' => ['one', 'two', 'three', 'four', 'five', 'six']]);
    }
}
