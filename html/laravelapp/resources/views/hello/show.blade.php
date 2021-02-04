@extends('layouts.helloapp')

@section('title', 'Show')

@section('menubar')
   @parent
   詳細ページ
@endsection

@section('content')
   @if ($items != null)
       @foreach($items as $item)
       <table>
       <tr>
       <th width="50px">id:</th>
       <td width="50px">{{$item->id}}</td>
       <th width="50px">name:</th>
       <td width="200px">{{$item->name}}</td>
       <th width="50px">age:</th>
       <td width="50px">{{$item->age}}</td>
       <th width="50px">mail:</th>
       <td width="300px">{{$item->mail}}</td>
       </tr>
       </table>
       @endforeach
   @endif
@endsection

@section('footer')
copyright 2017 tuyano.
@endsection
