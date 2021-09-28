@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('course.update', $course->idCourse)}}">
            @method("PUT")
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Sửa khóa
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Sửa khóa</label>
                    <input type="text" name="name" class="form-control" value="{{ $course->nameCourse}}" required autofocus="autofocus">
                </div>
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </div>
	    </form>
	</div>
@endsection