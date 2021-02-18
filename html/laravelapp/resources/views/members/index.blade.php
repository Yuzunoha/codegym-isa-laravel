@extends('layouts.helloapp')

@section('title', 'Add')

@section('menubar')
   @parent
   新規作成ページ
@endsection

@section('content')
   <h2>list</h2>   
   <table>
   <tr><th>Name</th><th>Mail</th><th>Age</th></tr>
   @foreach ($items as $item)
      <tr>
         <td>{{$item->name}}</td>
         <td>{{$item->mail}}</td>
         <td>{{$item->age}}</td>
      </tr>
   @endforeach
   </table>

   <h2>form</h2>
   <table>
   <form action="/members" method="post">
      {{ csrf_field() }}
      <tr><th>name: </th><td><input type="text" name="name"></td></tr>
      <tr><th>mail: </th><td><input type="text" name="mail"></td></tr>
      <tr><th>age: </th><td><input type="text" name="age"></td></tr>
      <tr><th></th><td><input type="submit" value="send"></td></tr>
   </form>
   </table>
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection
