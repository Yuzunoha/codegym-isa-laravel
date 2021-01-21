<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    function index()
    {
        $data = ['msg' => 'これはコントローラから渡されたメッセージです。'];
        return view('hello.index', $data);
    }
}
