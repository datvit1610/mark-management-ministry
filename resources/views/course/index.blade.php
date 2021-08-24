@extends('layouts.app')
@section('content')
	
			<br>
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title">Danh sách các khóa</h4><br> 
               <form class="navbar-form navbar-left navbar-search-form" role="search">
	    			<div class="input-group">
	    				<span class="input-group-addon"><i class="fa fa-search"></i></span>
	    				<input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
	    			</div>
	    		</form>
				<div class="text-right">
					<a href="{{ route('course.create') }}" class="btn btn-info btn-fill btn-wd">Thêm khóa</a>
				</div>                           
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
	                    <th>Mã</th>
	                    <th>Khóa</th>
						<th>Xem</th>
						{{-- <th>Sửa</th>
						<th>Xóa</th> --}}
	                </thead>
	                <tbody>
	                    @foreach ($courses as $course)
                            <tr>
                                <td>{{$course->idCourse}}</td> 
                                <td>K{{$course->nameCourse}}</td> 
								<td><a class="btn btn-facebook ti-eye"  href="{{ route('major.index') }}"></a></td>
								{{-- <td><a class="btn btn-warning" href="{{ route('course.edit',$course->idCourse) }}">Sửa</a></td>
								<td>
									<form action="{{ route('course.destroy',$course->idCourse) }}" method="post">
										@method('DELETE')
										@csrf
										<button class="btn btn-danger">Xoá</button>
									</form>
								</td> --}}
                            </tr> 
                        @endforeach                                       
	                </tbody>
	            </table>
				<div class="text-center">
					{{ $courses->appends(['search' => $search])->links() }}
				</div>
	        </div>
	    </div>
    
@endsection