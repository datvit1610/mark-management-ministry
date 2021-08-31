@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('mark.store')}}">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Nhập điểm
                </h4>
            </div>
            <div class="card-content">
                
                                
                
                <div class="col-sm-6">
                    <label>Chọn sinh viên:</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Sinh viên" data-size="7" name="idStudent">
                        @foreach ($student as $students)
                            <option value="{{$students->idStudent}}">{{$students->lastName}} {{$students->firstName}}</option>                                   
                        @endforeach                       
                    </select>
                </div>
                
                <div class="col-sm-6">
                    <label>Chọn môn học:</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Môn" data-size="7" name="idSubject">
                        @foreach ($subject as $subjects)
                            <option value="{{$subjects->idSubject}}">{{$subjects->nameSubject}}</option>                                   
                        @endforeach                       
                    </select>
                </div>
                <div class="form-group">
                    <label>Final 1</label>
                    <input type="text" name="final1" class="form-control datetimepicker" placeholder="Nhập điểm lý thuyết lần 1">
                </div>
                <div class="form-group">
                    <label>Skill 1</label>
                    <input type="text" name="skill1" class="form-control datetimepicker" placeholder="Nhập điểm thực hành lần 1">
                </div>
                <div class="card-footer text-center">                                       
                                        @if (Session::exists('error'))
                                            <div class="alert alert-warning">
                                                {{ Session::get('error.message')}}
                                            </div>
                                        @endif

                                        <button type="submit" class="btn btn-fill btn-info">Thêm</button> 
                                    </div>
               
            </div>
	    </form>
	</div>
@endsection