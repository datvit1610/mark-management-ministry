@extends('layouts.app')
@section('content')		
	 @foreach ($myProfile as $i)
        <h1>{{$i}}</h1>
    @endforeach
@endsection 