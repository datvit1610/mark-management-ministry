@extends('layouts.app')
@section('content')
	{{-- <div class="text-right">
		<a href="{{ route('student.create') }}" class="btn btn-info btn-fill btn-wd">Thêm sinh viên</a>
	</div>
			<br> --}}
    <div class="card">
	    <div class="card-header">
	        
               <form action="">
				   <label for="">Chọn lớp</label>
				   <select name="grade" id="">
					   <option value="">------</option>
					   @foreach ($grades as $grade)
						   <option value="{{$grade->idGrade}}"
							@if ($grade->idGrade == $idGrade)
								{{"selected"}}
							@endif
							>
								{{$grade->nameGrade}}
							</option>
					   @endforeach
				   </select>
				   <button>Chọn</button>
			   </form>
			   <div class="text-right">
				<a href="{{ route('student.add-by-excel') }}" class="btn btn-info btn-fill btn-wd">Thêm sinh viên bằng excel</a>
			</div>
			   <h4 class="card-title">
				    @foreach ($grades as $grade)
				@if ($grade->idGrade == $idGrade)
				   Danh sách sinh viên lớp {{$grade->nameGrade}}
			   @else
				   
			   @endif 
			@endforeach
			</h4><br>
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
	                    
	                    <th>Tên sinh viên</th>
						<th>Email</th>
						<th>Ngày sinh</th>
						<th>Giới tính</th>
						
	                </thead>
	                <tbody>
	                    @foreach ($students as $student)
                            <tr>
                                
								<td>{{$student->FullName}}</td>
								<td>{{$student->email}}</td>
								<td>{{$student->DoB}}</td> 
                                <td>{{$student->GenderName}}</td> 
								 
								{{-- <td><a class="btn btn-facebook" href="{{ route('major.show',$major->idMajor) }}">Xem</a></td>
								<td><a class="btn btn-warning" href="{{ route('major.edit',$major->idMajor) }}">Sửa</a></td> --}}
								{{-- <td>
									<form action="{{ route('student.destroy',$student->idStudent) }}" method="post">
				 						@method('DELETE')
										@csrf
										<button class="btn btn-danger">Xoá</button>
									</form>
								</td> --}}
                            </tr> 
                        @endforeach                                       
	                </tbody>
	            </table>
				{{-- <div class="text-center">
					{{ $majors->appends(['search' => $search])->links() }}
				</div> --}}
	        </div>
	    </div>
    
@endsection