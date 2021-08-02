@extends('layouts.app')
@section('content')
	<div class="text-right">
		<a href="{{ route('grade.create') }}" class="btn btn-info btn-fill btn-wd">Thêm lớp</a>
	</div>
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
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
	                    <th>Mã</th>
	                    <th>tên lớp</th>
                        <th>Tên khóa</th>
                        <th>Tên nghành</th>
						<th>Xem</th>
						<th>Xóa</th>
	                </thead>
	                <tbody>
	                    @foreach ($grades as $grade)
                            <tr>
                                <td>{{$grade->idGrade}}</td> 
                                <td>{{$grade->nameGrade}}</td>
								<td>k{{$grade->nameCourse}}</td>
								<td>{{$grade->nameMajor}}</td>
								<td><a class="btn btn-facebook" href="{{ route('grade.show',$grade->idGrade) }}">Xem</a></td>
								<td>
									<form action="{{ route('grade.destroy',$grade->idGrade) }}" method="post">
										@method('DELETE')
										@csrf
										<button class="btn btn-danger">Xoá</button>
									</form>
								</td>
                            </tr> 
                        @endforeach                                       
	                </tbody>
	            </table>
				<div class="text-center">
					{{-- {{ $grade->appends(['search' => $search])->links() }} --}}
				</div>
	        </div>
	    </div>
    
@endsection