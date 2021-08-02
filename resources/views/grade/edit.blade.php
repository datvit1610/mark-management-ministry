@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('grade.update', $grade->idGrade)}}">
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
                    <input type="text" name="name" class="form-control" value="{{ $grade->nameGrade}}">
                    <input type="text" name="name" class="form-control" value="{{ $grade->nameGrade}}">
                    <input type="text" name="name" class="form-control" value="{{ $grade->nameGrade}}">
                </div>
                <button type="submit" class="btn btn-fill btn-info">Sửa</button>
            </div>
	    </form>
	</div>
@endsection