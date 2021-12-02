@extends('layouts.app')
@section('content')

			<br>
    <div class="card">
	    <div class="card-header">

               <form action="" >
				   <label for="">Chọn lớp</label>
				   <select name="grade" id="" class="btn btn-fill ti-angle-down">
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
				   <button class="btn btn-xs btn-fill">Chọn</button>
			   </form>
			   <div class="text-right">
					<a href="{{ route('student.create') }}" class="btn btn-info btn-fill btn-wd">Thêm sinh viên</a>
				</div><br>
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
	                    <th>STT</th>
	                    <th>Tên sinh viên</th>
						<th>Email</th>
						<th>Ngày sinh</th>
						<th>Giới tính</th>
						{{-- <th>Xem điểm</th> --}}
						<th>Sửa</th>
	                </thead>
	                <tbody>
						@php
							$index = 0;
						@endphp
	                    @foreach ($students as $student)
                            <tr>
								<td>{{$index+=1}}</td>
								<td>{{$student->FullName}}</td>
								<td>{{$student->email}}</td>
								<td>{{$student->DoB}}</td>
                                <td>{{$student->GenderName}}</td>

								{{-- <td>
									<a class="btn btn-facebook ti-eye" href="{{ route('mark.index',
									['student' => $student->idStudent]) }}"></a>
								</td> --}}

								<td>
									<a class="btn btn-warning ti-settings" href="{{ route('student.edit',$student->idStudent) }}"></a>
								</td>

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
