<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    function index()
    {
        return view('hello.index');
    }

    function post(Request $request)
    {
        $msg = $request->msg;
        $data = ['msg' => "こんにちは。${msg}さん。",];
        return view('hello.index', $data);
    }
}
