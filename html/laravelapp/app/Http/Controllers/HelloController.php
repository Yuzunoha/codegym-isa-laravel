<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class HelloController extends Controller
{
    public function index()
    {
        return view('hello.index', ['msg' => 'フォームを入力：']);
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ]);
        if ($validator->fails()) {
            return redirect('/hello')
                ->withErrors($validator)
                ->withInput();
        }
        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}
