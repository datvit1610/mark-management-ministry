@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('student.update', $student->idStudent)}}">
            @method("PUT")
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Sửa thông tin sinh viên
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Họ</label>
                    <input type="text" name="lastName" class="form-control" value="{{$student->lastName}}" required autofocus="autofocus">
                </div>
                
                 <div class="form-group">
                    <label>Tên</label>
                    <input type="text" name="firstName" class="form-control" value="{{$student->firstName}}" required autofocus="autofocus">
                </div>
                 <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control" value="{{$student->email}}" required autofocus="autofocus">
                </div>
                 <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="passWord" class="form-control" value="{{$student->passWord}}" id="myInput" required autofocus="autofocus">
                    <input type="checkbox" onclick="myFunction()">  Show Pass
                </div>
                 <div class="form-group">
                    <label>Ngày sinh</label>
                    <input type="date" name="DoB" class="form-control" value="{{$student->DoB}}" required autofocus="autofocus">
                </div>
                <div class="form-group">
                    <label>giới tính</label>
                        <div class="radio">
							<input type="radio" name="gender" value="1" <?= $student->gender == 1 ? "checked" : "" ?> required autofocus="autofocus">
							<label>Nam</label>
						</div>
                        <div class="radio">
							<input type="radio" name="gender" value="0" <?= $student->gender == 0 ? "checked" : "" ?> required autofocus="autofocus">
							<label>Nữ</label>
                        </div>
                </div>
                
                <div class="card-content">
                    <label>Chọn Lớp:</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Lớp"  name="idGrade" required autofocus="autofocus">
                        @foreach ($lop as $students)
                            <option value="{{$students->idGrade}}">{{$students->nameGrade}}
                                
                            </option>                                   
                        @endforeach                       
                    </select>
                </div>
                <div class="card-footer text-center">                                       
                    @if (Session::exists('error'))
                        <div class="alert alert-warning">
                            {{ Session::get('error.message')}}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-fill btn-info">Thêm</button> 
                </div>
                {{-- <button type="submit" class="btn btn-fill btn-info">Cập nhật</button> --}}
            </div>
	    </form>
	</div>
@endsection