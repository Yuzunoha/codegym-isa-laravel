<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $sort = $request->sort ?? 'id'; // デフォルトのソートキー
        $items = Person::orderBy($sort, 'asc')->paginate(5);
        $param = ['items' => $items, 'sort' => $sort, 'user' => $user];
        return view('hello.index', $param);
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
        // DB::insert('insert into people (name, mail, age) values (:name, :mail, :age)', $param);
        DB::table('people')->insert($param);
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
        $id = $request->id;
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        // DB::update('update people set name =:name, mail = :mail, age = :age where id = :id', $param);
        DB::table('people')->where('id', $id)->update($param);
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
        $item = DB::table('people')->where('id', $id)->delete();
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
        $page = $request->page;
        $items = DB::table('people')->offset($page * 3)->limit(3)->get();
        return view('hello/show', ['items' => $items]);
    }

    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $msg = $request->input;
        $request->session()->put('msg', $msg);
        return redirect('hello/session');
    }

    public function getAuth(Request $request)
    {
        return view('hello.auth', ['message' => 'ログインしてください。']);
    }

    public function postAuth(Request $request)
    {
        $authResult = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if ($authResult) {
            $msg = 'ログインしました。(' . Auth::user()->name . ')';
        } else {
            $msg = 'ログインに失敗しました。';
        }
        return view('hello.auth', ['message' => $msg]);
    }
}
