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
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric',
        ];
        $messages = [
            'name.required' => 'name入れて',
            'mail.email' => 'mail入れて',
            'age.numeric' => 'ageは数値',
            'age.min' => 'ageの数値は0以上',
            'age.max' => 'ageの数値は200以下',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        $validator->sometimes('age', 'min:0', function ($input) {
            return !is_int($input->age);
        });
        $validator->sometimes('age', 'max:200', function ($input) {
            return !is_int($input->age);
        });
        if ($validator->fails()) {
            return redirect('/hello')
                ->withErrors($validator)
                ->withInput();
        }
        return view('hello.index', ['msg' => '正しく入力されました！']);
    }
}
