@extends('layouts.app')
@section('content')		
	 @foreach ($mark as $i)
        <h1>{{$i}}</h1>
    @endforeach
@endsection 