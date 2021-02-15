<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(Request $request)
    {
        $items = Person::all();
        $view = view('person.index', ['items' => $items]);
        return $view;
    }

    public function find(Request $request)
    {
        return view('person.find', ['input' => '']);
    }

    public function search(Request $request)
    {
        $input = $request->input;

        $min = intval($input);
        $max = $min + 10;

        $item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
        $param = [
            'input' => $input,
            'item' => $item,
        ];
        return view('person.find', $param);
    }
}
