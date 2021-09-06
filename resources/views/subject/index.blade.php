@extends('layouts.app')
@section('content')
	
			<br>
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title">Danh sách các môn</h4><br> 
               <form class="navbar-form navbar-left navbar-search-form" role="search">
	    			<div class="input-group">
	    			    <span class="input-group-addon"><i class="fa fa-search"></i></span>
	    				<input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
	    		</div>
	    		</form>  
                <div class="text-right">
		            <a href="{{ route('subject.create') }}" class="btn btn-info btn-fill btn-wd">Thêm môn học</a>
	            </div>                         
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
	                    <th>Mã</th>
	                    <th>tên môn học</th>
                        <th>Final</th>                       
                        <th>Skill</th>
                        <th>Số giờ</th>
						{{-- <th>Xem</th> --}}
						<th>Sửa</th>
	                </thead>
	                <tbody>
	                    @foreach ($subjects as $subject)
                            <tr>
                                <td>{{$subject->idSubject}}</td> 
                                <td>{{$subject->nameSubject}}</td>
                                <td>
                                    @if ($subject->final == 0)
                                        <span class='ti-na'></span>
                                    @else
                                        <span class='ti-check'></span>
                                    @endif
                                </td>
                                <td>
                                    @if ($subject->skill == 0)
                                        <span class='ti-na'></span>
                                    @else
                                        <span class='ti-check'></span>
                                    @endif
                                </td>
                                </td>
                                <td>{{$subject->duration}}</td>
                                
								{{-- <td><a class="btn btn-facebook ti-eye" href="{{ route('subject.show',$subject->idSubject) }}"></a></td> --}}
								<td><a class="btn btn-warning ti-settings" href="{{ route('subject.edit',$subject->idSubject) }}"></a></td>
								{{-- <td>
									<form action="{{ route('subject.destroy',$subject->idSubject) }}" method="post">
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
					{{ $subjects->appends(['search' => $search])->links() }}
				</div>
	        </div>
	    </div>
    
@endsection