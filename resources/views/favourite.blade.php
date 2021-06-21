@extends('layouts.app')

@section('content')
    
    @foreach ($soThich as $i)
        <h1>{{$i}}</h1>
    @endforeach

@endsection