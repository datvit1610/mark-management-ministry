@extends('layouts.app')
@section('content')
    <div class="card">
       
            <form method="post" action="{{ route('grade.store') }}">
                @csrf 
                <div class="card-header">
                    <h4 class="card-title">
                       <label>Thêm Lớp học</label> 
                    </h4>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label>Tên lớp:</label>	 
                        <input type="text" name="nameGrade" class="form-control datetimepicker" placeholder="Nhập tên lớp" required autofocus="autofocus"/>
                    </div>                   
                </div>

                <div class="col-sm-6">
                    <label>Chọn khóa:</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Khóa" data-size="7" name="idCourse" required autofocus="autofocus">
                        @foreach ($course as $courses)
                            <option value="{{$courses->idCourse}}">{{$courses->nameCourse}}</option>                                   
                        @endforeach                       
                    </select>
                </div>
                
                <div class="col-sm-6">
                    <label>Chọn Ngành:</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Ngành" data-size="7" name="idMajor" required autofocus="autofocus">
                        @foreach ($major as $majors)
                                <option value="{{$majors->idMajor}}">{{$majors->nameMajor}}</option>                                   
                            @endforeach                       
                    </select>
                </div>
                <br>

                <div class="card-content">
                <button type="submit" class="btn btn-fill btn-info">Thêm lớp</button>
                </div>
            </form>
    </div>
@endsection
