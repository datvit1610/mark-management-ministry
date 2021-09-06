@extends('layouts.app')
@section('content')
	
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title">
				{{-- @foreach ($subject as $subjects)
					@if ($subjects->idSubject == $idSubject)
						Bảng điểm môn {{$subjects->nameSubject}}
					@else
					@endif	
				@endforeach
                @foreach ($grade as $grades)
					@if ($grades->idGrade == $idGrade)
						Lớp {{$grades->nameGrade}}
					@else
					@endif	
				@endforeach --}}
				{{-- Bảng điểm môn {{$marks->nameSubject}} của lớp {{$marks->nameGrade}} --}}
			</h4><br> 
               {{-- <form class="navbar-form navbar-left navbar-search-form" role="search">
	    			<div class="input-group">
	    			    <span class="input-group-addon"><i class="fa fa-search"></i></span>
	    				<input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
	    		</div>
	    		</form>                            --}}
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
	                    <th>Tên sinh viên</th>
                        <th>Final 1</th>
                        <th>Final 2</th>
                        <th>Skill 1</th>
                        <th>Skill 2</th>
                        <th>Trạng thái</th>						
	                </thead>
	                <tbody>
	                    @foreach ($mark as $marks)
                            <tr>
                            	<td>
									{{$marks->lastName}} {{$marks->firstName}}</td>
                             	<td>
                                        @if ($marks->final1 == NULL)
                                        <span class='ti-na'></span>  
                                        @else
                                            {{ $marks->final1 }}  
                                        @endif
                                        </td>
                                        <td>@if ($marks->final2 == NULL)
                                            <span class='ti-na'></span>  
                                        @else
                                            {{ $marks->final2 }}  
                                        @endif
                                        </td>
                                        <td>
                                            @if ($marks->skill1 == NULL)
                                            <span class='ti-na'></span>  
                                        @else
                                            {{ $marks->skill1 }}  
                                        @endif 
                                        </td>
                                        <td>
                                            @if ($marks->skill2 == NULL)
                                            <span class='ti-na'></span>  
                                        @else
                                            {{ $marks->skill2 }}  
                                        @endif
                            	</td>
                                <td>    
                                            {{-- Có cả 2 --}}
                                            @if ($marks->final == 1 && $marks->skill == 1)

                                                @if ($marks->final1 >=5 && $marks->skill1 >= 5 && $marks->final2 == NULL && $marks->skill2 == NULL )
                                                    <span>Qua môn</span>

                                                @elseif ($marks->final1 >=5 && $marks->skill1 < 5 && $marks->final2 == NULL && $marks->skill2 == NULL )
                                                    <span>Thi lại</span>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 >= 5 && $marks->final2 == NULL && $marks->skill2 == NULL )
                                                    <span>Thi lại</span>

                                                @elseif ($marks->final1 >= 5 && $marks->skill1 < 5 && $marks->final2 == NULL && $marks->skill2 >= 5 )
                                                    <span>Qua môn</span>
                                                
                                                @elseif ($marks->final1 < 5 && $marks->skill1 >= 5 && $marks->final2 >= 5 && $marks->skill2 == NULL )
                                                    <span>Qua môn</span>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 >= 5 && $marks->final2 < 5  && $marks->skill2 == NULL)
                                                    <span>Học lại</span>
                                                
                                                @elseif ($marks->final1 == NULL && $marks->skill1 >= 5 && $marks->final2 == NULL  && $marks->skill2 == NULL)
                                                    <span>Học lại</span>

                                                @elseif ($marks->final1 >= 5 && $marks->skill1 < 5 && $marks->final2 == NULL && $marks->skill2 >= 5 )
                                                    <span>Qua môn</span>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 < 5 && $marks->final2 == NULL && $marks->skill2 == NULL )
                                                    <span>Thi lại</span>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 < 5 && $marks->final2 >= 5 && $marks->skill2 < 5 )
                                                    <span>Học lại</span>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 < 5 && $marks->final2 >= 5 && $marks->skill2 >= 5 )
                                                    <span>Qua môn</span>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 < 5 && $marks->final2 < 5 && $marks->skill2 >=5  )
                                                    <span>Học lại</span>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 < 5 && $marks->final2 >=5 && $marks->skill2 == NULL )
                                                    <span>Thi lại</span>
                                                @endif
                                            @elseif ($marks->final == 1 && $marks->skill == 0)    
                                                @if ($marks->final1 >=5 && $marks->final2 == NULL )
                                                    <span>Qua môn</span>
                                                @elseif ($marks->final1 < 5 && $marks->final2 < 5 )
                                                    <span>Học lại</span>
                                                @elseif ($marks->final1 < 5 && $marks->final2 >= 5 )
                                                    <span>Qua môn</span>
                                                @elseif ($marks->final1 < 5 && $marks->final2 == NULL )
                                                    <span>Thi lại</span>
                                                @endif
                                            @elseif ($marks->final == 0 && $marks->skill == 1)    
                                                @if ($marks->skill1 >=5 && $marks->skill2 == NULL )
                                                    <span>Qua môn</span>
                                                @elseif ($marks->skill1 < 5 && $marks->skill2 < 5 )
                                                    <span>Học lại</span>
                                                @elseif ($marks->skill1 < 5 && $marks->skill2 >= 5 )
                                                    <span>Qua môn</span>
                                                @elseif ($marks->skill1 < 5 && $marks->skill2 == NULL )
                                                    <span>Thi lại</span>
                                                @endif
                                            @endif
                                                
                                        </td>								
                            </tr> 
                        @endforeach                                       
	                </tbody>
	            </table>
				{{-- <div class="text-center">
					{{ $subjects->appends(['search' => $search])->links() }}
				</div> --}}
	        </div>
	    </div>
    
@endsection