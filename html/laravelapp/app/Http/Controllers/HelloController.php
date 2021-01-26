<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $sql = 'select * from people';
        $items = DB::select($sql);
        $view = view('hello.index', ['items' => $items]);
        return $view;
    }
}
