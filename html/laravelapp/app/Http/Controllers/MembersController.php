<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::select('select * from people');
        return view('members.index', ['items' => $items]);
    }
}
