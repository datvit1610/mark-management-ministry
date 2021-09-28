@extends('layouts.app')
@section('content')
	
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title btn-center">
				@foreach ($subjects as $subject)
					@if ($subject->idSubject == $idSubject)
						Bảng điểm môn <label>{{$subject->nameSubject}}</label>
					@endif	
				@endforeach
                
                @foreach ($grades as $grade)
					@if ($grade->idGrade == $idGrade)
						của lớp <label>{{$grade->nameGrade}}</label>
					@else
					@endif	
				@endforeach
			</h4><br>
            @php
                $qua = 0;
                $hoclai = 0;
                $thilai = 0;
            @endphp 
            @foreach ($mark as $s)
                @if (($s->final1 >= 5 || $s->final2 >=5) && ($s->skill1 >=5 || $s->skill2 >= 5))
                    @php $qua++ @endphp
                @elseif(((($s->final1 < 5 || $s->final1 == null) && $s->final2 == null) || 
                (($s->skill1 < 5 || $s->skill1 == null) && $s->skill2 == null)) && 
                ((($s->final2)) == 0 || 
                (($s->skill2)) == 0))
                    @php $thilai++ @endphp
                @elseif($all - $qua - $thilai) 
                    @php $hoclai++ @endphp
                @endif
            @endforeach
            {{-- <div class="progress" title ="{{number_format( $dem/$mark * 100, 2 )}}% Passed
            {{$dem}}/{{$all}}">
                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{number_format( $dem/$all * 100, 2 ) }}" aria-valuemin="0" aria-valuemax="100" style="width: {{number_format( $dem/$all * 100, 2 )}}%;">
                    <span class="sr-only"></span>
                </div>
            </div> --}}
            <form class="text-right">
            <h6><span class="text-primary"> Qua môn: {{$qua}} bạn  chiếm {{number_format( $qua/$all * 100 , 1 )}} %</span></h6>
            
            <h6><span class="text-warning"> Thi lại: {{$thilai}} bạn  chiếm {{number_format( $thilai/$all * 100 , 1 )}} %</span></h6>
            
            <h6><span class="text-danger"> Học lại: {{$hoclai}} bạn  chiếm {{number_format( $hoclai/$all * 100 , 1 )}} %</span></h6>
            </form>
               {{-- <form class="navbar-form navbar-left navbar-search-form" role="search">
	    			<div class="input-group">
	    			    <span class="input-group-addon"><i class="fa fa-search"></i></span>
	    				<input type="bg" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
	    		</div>
	    		</form>                            --}}
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
                        <th class="text-center">STT</th>
	                    <th class="text-center">Tên sinh viên</th>
                        <th class="text-center">Final 1</th>
                        <th class="text-center">Final 2</th>
                        <th class="text-center">Skill 1</th>
                        <th class="text-center">Skill 2</th>
                        <th class="text-center">Trạng thái</th>						
	                </thead>
	                <tbody>
	                    @foreach ($mark as $marks)
                            <tr>
                                <th class="text-center">{{$marks->idStudent}}</th>
                            	<th class="text-center">
									{{$marks->lastName}} {{$marks->firstName}}</th>
                             	<th class="text-center">
                                        @if ($marks->final1 == NULL)
                                        <span class='ti-na'></span>  
                                        @else
                                            {{ $marks->final1 }}  
                                        @endif
                                        </th>
                                        <th class="text-center">@if ($marks->final2 == NULL)
                                            <span class='ti-na'></span>  
                                        @else
                                            {{ $marks->final2 }}  
                                        @endif
                                        </th>
                                        <th class="text-center">
                                            @if ($marks->skill1 == NULL)
                                            <span class='ti-na'></span>  
                                        @else
                                            {{ $marks->skill1 }}  
                                        @endif 
                                        </th>
                                        <th class="text-center">
                                            @if ($marks->skill2 == NULL)
                                            <span class='ti-na'></span>  
                                        @else
                                            {{ $marks->skill2 }}  
                                        @endif
                            	</th>
                                <th class="text-center">    
                                            {{-- Có cả 2 --}}
                                            @if ($marks->final == 1 && $marks->skill == 1)

                                                @if ($marks->final1 >=5 && $marks->skill1 >= 5 && $marks->final2 == NULL && $marks->skill2 == NULL )
                                                    <h6><h6><span class="text-primary">Qua môn</span></h6></h6>

                                                @elseif ($marks->final1 >=5 && $marks->skill1 < 5 && $marks->final2 == NULL && $marks->skill2 == NULL )
                                                    <h6><span class="bg-warning text-warning">Thi lại</span></h6>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 >= 5 && $marks->final2 == NULL && $marks->skill2 == NULL )
                                                    <h6><span class="bg-warning text-warning">Thi lại</span></h6>

                                                @elseif ($marks->final1 >= 5 && $marks->skill1 < 5 && $marks->final2 == NULL && $marks->skill2 >= 5 )
                                                    <h6><span class="text-primary">Qua môn</span></h6>
                                                
                                                @elseif ($marks->final1 < 5 && $marks->skill1 >= 5 && $marks->final2 >= 5 && $marks->skill2 == NULL )
                                                    <h6><span class="text-primary">Qua môn</span></h6>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 >= 5 && $marks->final2 < 5  && $marks->skill2 == NULL)
                                                    <h6><span class="text-danger bg-danger">Học lại</span></h6>
                                                
                                                @elseif ($marks->final1 == NULL && $marks->skill1 >= 5 && $marks->final2 == NULL  && $marks->skill2 == NULL)
                                                    <h6><span class="text-danger bg-danger">Học lại</span></h6>

                                                @elseif ($marks->final1 >= 5 && $marks->skill1 < 5 && $marks->final2 == NULL && $marks->skill2 >= 5 )
                                                    <h6><span class="text-primary">Qua môn</span></h6>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 < 5 && $marks->final2 == NULL && $marks->skill2 == NULL )
                                                    <h6><span class="bg-warning text-warning">Thi lại</span></h6>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 < 5 && $marks->final2 >= 5 && $marks->skill2 < 5 )
                                                    <h6><span class="text-danger bg-danger">Học lại</span></h6>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 < 5 && $marks->final2 >= 5 && $marks->skill2 >= 5 )
                                                    <h6><span class="text-primary">Qua môn</span></h6>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 < 5 && $marks->final2 < 5 && $marks->skill2 >=5  )
                                                    <h6><span class="text-danger bg-danger">Học lại</span></h6>

                                                @elseif ($marks->final1 < 5 && $marks->skill1 < 5 && $marks->final2 >=5 && $marks->skill2 == NULL )
                                                    <h6><span class="bg-warning text-warning">Thi lại</span></h6>
                                                @endif
                                            @elseif ($marks->final == 1 && $marks->skill == 0)    
                                                @if ($marks->final1 >=5 && $marks->final2 == NULL )
                                                    <h6><span class="text-primary">Qua môn</span></h6>
                                                @elseif ($marks->final1 < 5 && $marks->final2 < 5 )
                                                    <h6><span class="text-danger bg-danger">Học lại</span></h6>
                                                @elseif ($marks->final1 < 5 && $marks->final2 >= 5 )
                                                    <h6><span class="text-primary">Qua môn</span></h6>
                                                @elseif ($marks->final1 < 5 && $marks->final2 == NULL )
                                                    <h6><span class="bg-warning text-warning">Thi lại</span></h6>
                                                @endif
                                            @elseif ($marks->final == 0 && $marks->skill == 1)    
                                                @if ($marks->skill1 >=5 && $marks->skill2 == NULL )
                                                    <h6><span class="text-primary">Qua môn</span></h6>
                                                @elseif ($marks->skill1 < 5 && $marks->skill2 < 5 )
                                                    <h6><span class="text-danger bg-danger">Học lại</span></h6>
                                                @elseif ($marks->skill1 < 5 && $marks->skill2 >= 5 )
                                                    <h6><span class="text-primary">Qua môn</span></h6>
                                                @elseif ($marks->skill1 < 5 && $marks->skill2 == NULL )
                                                    <h6><span class="bg-warning text-warning">Thi lại</span></h6>
                                                @endif
                                            @endif
                                                
                                        </th>								
                            </tr> 
                        @endforeach                                       
	                </tbody>
	            </table>
				{{-- <div class="bg-center">
					{{ $subjects->appends(['search' => $search])->links() }}
				</div> --}}
	        </div>
	    </div>
    
@endsection