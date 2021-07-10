@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('course.store')}}">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Thêm khóa
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Thêm khóa</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <button type="submit" class="btn btn-fill btn-info">Thêm</button>
            </div>
	    </form>
	</div>
@endsection