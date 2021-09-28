@extends('layouts.app')
@section('content')
    <div class="card">      
            <form method="post" action="{{ route('student.store') }}">
                @csrf 
                <div class="card-header">
                    <h4 class="card-title">
                       <label>Thêm sinh viên</label> 
                    </h4>
                </div>
                <div class="card-content">
                    <div class="form-group">
                        <label>Họ :</label>	 
                        <input type="text" name="lastName" class="form-control datetimepicker" placeholder="Nhập Họ" required autofocus="autofocus"/>
                    </div>                   
                </div>

                <div class="card-content">
                    <div class="form-group">
                        <label>Tên :</label>	 
                        <input type="text" name="firstName" class="form-control datetimepicker" placeholder="Nhập tên" required autofocus="autofocus"/>
                    </div>                   
                </div>

                <div class="card-content">
                    <div class="form-group">
                        <label>Email :</label>	 
                        <input type="text" name="email" class="form-control datetimepicker" placeholder="Nhập email" required autofocus="autofocus"/>
                    </div>                   
                </div>

                <div class="card-content">
                    <div class="form-group">
                        <label>Pass word :</label>	 
                        <input type="password" name="passWord" class="form-control datetimepicker" placeholder="Nhập password" id="myInput" required autofocus="autofocus"/>
                        <input type="checkbox" onclick="myFunction()">  Show Pass
                    </div>                   
                </div>

                <div class="card-content">
                    <div class="form-group">
                        <label>ngày sinh :</label>	 
                        <input type="date" name="DoB" class="form-control datetimepicker" placeholder="Nhập ngày sinh" required autofocus="autofocus"/>
                    </div>                   
                </div>

                <div class="card-content">
                    <div class="form-group">
                        <label>Giới tính :</label>	 
                        <div class="radio">
							<input type="radio" name="gender" value="1" required autofocus="autofocus">
							<label>Nam</label>
						</div>
                        <div class="radio">
							<input type="radio" name="gender" value="1" required autofocus="autofocus">
							<label>Nữ</label>
						</div>
                    </div>                   
                </div>

                {{-- <div class="card-content">
                    <div class="form-group">
                        <label>Số điện thoại :</label>	 
                        <input type="text" name="phone" class="form-control datetimepicker" placeholder="Nhập số điện thoại"/>
                    </div>                   
                </div> --}}

                <div class="card-content">
                    <label>Chọn Lớp:</label>
                    <select class="selectpicker" data-style="btn btn-danger btn-block" title="Lớp" data-size="7" name="idGrade" required autofocus="autofocus">
                        @foreach ($lop as $grade)
                            <option value="{{$grade->idGrade}}">{{$grade->nameGrade}}</option>                                   
                        @endforeach                       
                    </select>
                </div>
                
                <div class="card-content">
                    <div class="card-footer text-center">                                       
                    @if (Session::exists('error'))
                        <div class="alert alert-warning">
                            {{ Session::get('error.message')}}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-fill btn-info">Thêm</button> 
                </div>
                {{-- <button type="submit" class="btn btn-fill btn-info">Thêm lớp</button> --}}
                </div>
            </form>
    </div>
@endsection
