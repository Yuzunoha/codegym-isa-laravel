<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HelloController extends Controller
{
    function index($id = 0, Request $request)
    {
        dd($id, $request->id);
        $data = [
            'msg' => 'これはコントローラから渡されたメッセージです。',
            'id' => $request->id,
        ];
        return view('hello.index', $data);
    }
}
