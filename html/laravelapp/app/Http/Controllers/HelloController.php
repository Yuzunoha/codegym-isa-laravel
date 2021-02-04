<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        // $items = DB::select('select * from people');
        $items = Db::table('people')->get();
        return view('hello.index', ['items' => $items]);
    }

    public function post(Request $request)
    {
        $items = DB::select('select * from people');
        return view('hello.index', ['items' => $items]);
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $person = $this->getPersonFromId($id);
        $view = view('hello.edit', ['form' => $person]);
        return $view;
    }

    public function update(Request $request)
    {
        $param = [
            'id' => $request->id,
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        DB::update('update people set name =:name, mail = :mail, age = :age where id = :id', $param);
        return redirect('/hello');
    }

    public function del(Request $request)
    {
        $id = $request->id;
        $person = $this->getPersonFromId($id);
        return view('hello.del', ['form' => $person]);
    }

    public function remove(Request $request)
    {
        $id = $request->id;
        $param = ['id' => $id];
        DB::delete('delete from people where id = :id', $param);
        return redirect('/hello');
    }

    private function getPersonFromId($id)
    {
        $param = ['id' => $id];
        $people = Db::select('select * from people where id = :id', $param);
        $person = $people[0];
        return $person;
    }

    public function show(Request $request)
    {
        $name = $request->name;
        $items = DB::table('people')
            ->where('name', 'like', '%' . $name . '%')
            ->orWhere('mail', 'like', '%' . $name . '%')
            ->get();
        return view('hello/show', ['items' => $items]);
    }
}
