@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('subject.update', $subject->idSubject)}}">
            @method("PUT")
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Sửa thông tin môn học
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên môn</label>
                    <input type="text" name="nameSubject" class="form-control" value="{{$subject->nameSubject}}">
                </div>
                
                <div class="form-group">
                    <label>Final</label>
                        <div class="radio">
							<input type="radio" name="final" value="1" <?= $subject->final == 1 ? "checked" : "" ?>>
							<label>Có</label>
						</div>
                        <div class="radio">
							<input type="radio" name="final" value="0" <?= $subject->final == 0 ? "checked" : "" ?>>
							<label>Không có</label>
                        </div>
                </div>
                <div class="form-group">
                    <label>Skill</label>
                        <div class="radio">
							<input type="radio" name="skill" value="1"  <?= $subject->skill == 1 ? "checked" : "" ?>>
							<label>Có </label>
						</div>
                        <div class="radio">
							<input type="radio" name="skill" value="0" <?= $subject->skill == 0 ? "checked" : "" ?>>
							<label>Không có</label>
                        </div>
                </div>
                 <div class="form-group">
                    <label>Thời lượng</label>
                    <input type="text" name="duration" class="form-control" value="{{$subject->duration}}">
                </div>
                <button type="submit" class="btn btn-fill btn-info">Cập nhật</button>
            </div>
	    </form>
	</div>
@endsection