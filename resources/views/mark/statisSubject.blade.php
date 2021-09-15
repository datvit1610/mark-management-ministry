@extends('layouts.app')
@section('content')
	
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title btn-center">
				{{-- Danh sách các môn của lớp .... --}}
						@foreach ($grades as $grade)
							@if ($grade->idGrade == $idGrade)
								Danh sách các môn học của lớp <label> {{$grade->nameGrade}} </label>
							@endif
						@endforeach
					
			</h4><br> 
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
	                    <th>Mã</th>
	                    <th>Tên môn học</th>                       
						<th>Xem</th>
						
	                </thead>
	                <tbody>
	                    @foreach ($subject as $subjects)
                            <tr>
                                <td>{{$subjects->idSubject}}</td> 
                                <td>{{$subjects->nameSubject}}</td>                                                         
								<td>
								<form action="{{ route('mark.statisMark') }}" method="get">
									<input type="hidden" name="idGrade" value="{{ $subjects->idGrade}}">
									<input type="hidden" name="idSubject" value="{{ $subjects->idSubject}}">
									<button class="btn btn-facebook ti-eye"></button>
								</form>
							</td>								
                            </tr> 
                        @endforeach                                       
	                </tbody>
	            </table>
				{{-- <div class="text-center">
					<td><a class="btn btn-facebook ti-eye" href="{{ route('mark.statisMark',
								['grade' => $grades->idGrade]) }}"></a></td>
					{{ $subjects->appends(['search' => $search])->links() }}
				</div> --}}
	        </div>
	    </div>
    
@endsection