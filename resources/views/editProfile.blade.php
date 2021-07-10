@extends('layouts.app')
@section('content')		
	 @foreach ($editProfile as $i)
        <h1>{{$i}}</h1>
    @endforeach
@endsection