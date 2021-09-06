@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('subject.store')}}">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Thêm môn học
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Thêm môn</label>
                    <input type="text" name="nameSubject" class="form-control">
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label>Final :</label>	 
                        <div class="radio">
							<input type="radio" name="final" value="1">
							<label>Có</label>
						</div>
                        <div class="radio">
							<input type="radio" name="final" value="1">
							<label>Không</label>
						</div>
                    </div>                   
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label>Skill :</label>	 
                        <div class="radio">
							<input type="radio" name="skill" value="1">
							<label>Có</label>
						</div>
                        <div class="radio">
							<input type="radio" name="skill" value="0">
							<label>Không</label>
						</div>
                    </div>                   
                </div>
                <div class="form-group">
                    <label>Thời lượng</label>
                    <input type="text" name="duration" class="form-control">
                </div>
                <button type="submit" class="btn btn-fill btn-info">Thêm</button>
            </div>
	    </form>
	</div>
@endsection