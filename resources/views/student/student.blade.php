@extends('layouts.app')
@section('content')		
	 @foreach ($student as $i)
        <h1>{{$i}}</h1>
    @endforeach
@endsection