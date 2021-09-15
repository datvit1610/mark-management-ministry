@extends('layouts.app')
@section('content')
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title btn-center">Bảng tổng hợp số lượng các hạng mục</h4><br> 
               
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped text-center">
	                <thead class="card-title btn-center">
	                    <th>Tên mục</th>                       
						          <th>Số lượng</th>						
	                </thead>
	                <tbody>
                        <tr>
                          <th>Khóa</th>
                          <th>{{$course}}</th>
                        </tr>
                        <tr>
                          <th>Ngành</th>
                          <th>{{$major}}</th>
                        </tr>
                        <tr>
                          <th>Lớp</th>
                          <th>{{$grade}}</th>
                        </tr>
                        <tr>
                          <th>Học sinh</th>
                          <th>{{$student}}</th>
                        </tr>                                                             
                        <tr>
                          <th>Môn học</th>
                          <th>{{$subject}}</th>
                        </tr>
	                </tbody>
	            </table>
	        </div>
	    </div>
    </div>
@endsection