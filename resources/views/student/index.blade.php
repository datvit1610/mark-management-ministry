@extends('layouts.app')

@section('content')
    <h1>Đây là sở thích</h1>
        <ul>
        @foreach ($soThich as $i)
            <h1><li>{{$i}}</li></h1>
        @endforeach
        </ul>
@endsection