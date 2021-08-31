@extends('layouts.app')
@section('content')
	
			<br>
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title">Danh sách các lớp</h4><br> 
               <form class="navbar-form navbar-left navbar-search-form" role="search">
	    			<div class="input-group">
	    				<span class="input-group-addon"><i class="fa fa-search"></i></span>
	    				<input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
	    			</div>
	    		</form>  
				<div class="text-right">
					<a href="{{ route('grade.create') }}" class="btn btn-info btn-fill btn-wd">Thêm lớp</a>
				</div>                         
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
	                    <th>Mã</th>
	                    <th>Lớp</th>
                        <th>Khóa</th>
                        <th>Ngành</th>
						<th>Xem</th>
						
	                </thead>
	                <tbody>
	                    @foreach ($grade as $grades)
                            <tr>
                                <td>{{$grades->idGrade}}</td> 
                                <td>{{$grades->nameGrade}}</td>
								<td>k{{$grades->nameCourse}}</td>
								<td>{{$grades->nameMajor}}</td>
								<td><a class="btn btn-facebook ti-eye" href="{{ route('student.index',
								['grade'=> $grades->idGrade]) }}"></a></td>
								{{-- <td>
									<form action="{{ route('grade.destroy',$grades->idGrade) }}" method="post">
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
					{{ $grade->appends(['search' => $search])->links() }}
				</div>
	        </div>
	    </div> 
@endsection