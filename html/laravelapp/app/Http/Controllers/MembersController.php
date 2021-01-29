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

    public function post(Request $request)
    {
        // _token, name, mail, age
        $requestData = $request->input();
        unset($requestData['_token']);
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $requestData);

        // getにリダイレクトする
        return redirect('members');
    }
}
