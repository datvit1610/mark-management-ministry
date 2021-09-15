@extends('layouts.app')
@section('content')	
	<div class="content">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Danh sách điểm các môn học</h4><br> 
                <form class="navbar-form navbar-left navbar-search-form" role="search">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" value="{{$searchSub}}" name="searchSub" class="form-control" placeholder="Tìm theo danh sách môn học">
                    </div>
                </form> 

                <form class="navbar-form navbar-left navbar-search-form" role="search">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="text" value="{{$searchGra}}" name="searchGra" class="form-control" placeholder="Tìm theo danh sách lớp">
                    </div>
                </form>
                <div class="text-right">
				<a href="mark/add-by-excel" class="btn btn-info btn-fill btn-wd">Thêm điểm bằng excel</a>
			    </div>  <br><br>
                <div class="text-right">
					<a href="mark/create" class="btn btn-info btn-fill btn-wd">Thêm điểm</a>
				</div>                     
                <div class="card-content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <th>Tên sinh viên</th>
                            <th>Lớp</th>
                            <th>Tên môn học</th>
                            <th>Final 1</th>
                            <th>Final 2</th>
                            <th>Skill 1</th>
                            <th>Skill 2</th>
                            <th>Trạng thái</th>
                            <th>Update</th>
                        </thead>
                        @foreach ($marks as $mark )
                        <tbody> 
                                <tr>    
                                    <td>{{$mark->lastName}} {{$mark->firstName}}</td>
                                        <td>{{$mark->nameGrade}}</td>
                                        <td>{{$mark->nameSubject}}</td> 
                                        
                                        <td>
                                            @if ($mark->final1 == NULL)
                                            <span class='ti-na'></span>  
                                        @else
                                            {{ $mark->final1 }}  
                                        @endif
                                        </td>
                                        <td>@if ($mark->final2 == NULL)
                                            <span class='ti-na'></span>  
                                        @else
                                            {{ $mark->final2 }}  
                                        @endif
                                        </td>
                                        <td>
                                            @if ($mark->skill1 == NULL)
                                            <span class='ti-na'></span>  
                                        @else
                                            {{ $mark->skill1 }}  
                                        @endif 
                                        </td>
                                        <td>
                                            @if ($mark->skill2 == NULL)
                                            <span class='ti-na'></span>  
                                        @else
                                            {{ $mark->skill2 }}  
                                        @endif
                                        </td>
                                        
                                        <td>    
                                            {{-- Có cả 2 --}}
                                            @if ($mark->final == 1 && $mark->skill == 1)

                                                @if ($mark->final1 >=5 && $mark->skill1 >= 5 && $mark->final2 == NULL && $mark->skill2 == NULL )
                                                    <span>Qua môn</span>

                                                @elseif ($mark->final1 >=5 && $mark->skill1 < 5 && $mark->final2 == NULL && $mark->skill2 == NULL )
                                                    <span>Thi lại</span>

                                                @elseif ($mark->final1 < 5 && $mark->skill1 >= 5 && $mark->final2 == NULL && $mark->skill2 == NULL )
                                                    <span>Thi lại</span>

                                                @elseif ($mark->final1 >= 5 && $mark->skill1 < 5 && $mark->final2 == NULL && $mark->skill2 >= 5 )
                                                    <span>Qua môn</span>
                                                
                                                @elseif ($mark->final1 < 5 && $mark->skill1 >= 5 && $mark->final2 >= 5 && $mark->skill2 == NULL )
                                                    <span>Qua môn</span>

                                                @elseif ($mark->final1 < 5 && $mark->skill1 >= 5 && $mark->final2 < 5  && $mark->skill2 == NULL)
                                                    <span>Học lại</span>
                                                
                                                @elseif ($mark->final1 == NULL && $mark->skill1 >= 5 && $mark->final2 == NULL  && $mark->skill2 == NULL)
                                                    <span>Học lại</span>

                                                @elseif ($mark->final1 >= 5 && $mark->skill1 < 5 && $mark->final2 == NULL && $mark->skill2 >= 5 )
                                                    <span>Qua môn</span>

                                                @elseif ($mark->final1 < 5 && $mark->skill1 < 5 && $mark->final2 == NULL && $mark->skill2 == NULL )
                                                    <span>Thi lại</span>

                                                @elseif ($mark->final1 < 5 && $mark->skill1 < 5 && $mark->final2 >= 5 && $mark->skill2 < 5 )
                                                    <span>Học lại</span>

                                                @elseif ($mark->final1 < 5 && $mark->skill1 < 5 && $mark->final2 >= 5 && $mark->skill2 >= 5 )
                                                    <span>Qua môn</span>

                                                @elseif ($mark->final1 < 5 && $mark->skill1 < 5 && $mark->final2 < 5 && $mark->skill2 >=5  )
                                                    <span>Học lại</span>
                                                
                                                @elseif ($mark->final1 < 5 && $mark->skill1 < 5 && $mark->final2 < 5 && $mark->skill2 < 5  )
                                                    <span>Học lại</span>

                                                @elseif ($mark->final1 < 5 && $mark->skill1 < 5 && $mark->final2 >=5 && $mark->skill2 == NULL )
                                                    <span>Thi lại</span>
                                                @endif
                                            @elseif ($mark->final == 1 && $mark->skill == 0)    
                                                @if ($mark->final1 >=5 && $mark->final2 == NULL )
                                                    <span>Qua môn</span>
                                                @elseif ($mark->final1 < 5 && $mark->final2 < 5 )
                                                    <span>Học lại</span>
                                                @elseif ($mark->final1 < 5 && $mark->final2 >= 5 )
                                                    <span>Qua môn</span>
                                                @elseif ($mark->final1 < 5 && $mark->final2 == NULL )
                                                    <span>Thi lại</span>
                                                @endif
                                            @elseif ($mark->final == 0 && $mark->skill == 1)    
                                                @if ($mark->skill1 >=5 && $mark->skill2 == NULL )
                                                    <span>Qua môn</span>
                                                @elseif ($mark->skill1 < 5 && $mark->skill2 < 5 )
                                                    <span>Học lại</span>
                                                @elseif ($mark->skill1 < 5 && $mark->skill2 >= 5 )
                                                    <span>Qua môn</span>
                                                @elseif ($mark->skill1 < 5 && $mark->skill2 == NULL )
                                                    <span>Thi lại</span>
                                                @endif
                                            @endif
                                                
                                        </td>
                                        <td>
                                            <a class="btn btn-warning ti-settings" href="{{ route('mark.edit',
                                            ['idStudent'=>$mark->idStudent, 'idSubject'=>$mark->idSubject])}}"></a
                                        ></td>
                                        
                                </tr> 

                                                   
                        </tbody>
                        @endforeach   
                    </table>
                    <div class="text-center">
                        {{ $marks->appends(['searchSub' => $searchSub])->links() }}
                    </div>
                    {{-- <div class="text-center">
                        {{ $marks->appends(['searchGra' => $searchGra])->links() }}
                    </div> --}}
 	</div>
@endsection          
	   