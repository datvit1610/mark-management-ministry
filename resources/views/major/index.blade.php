@extends('layouts.app')
@section('content')
	
			<br>
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title">Danh sách các ngành</h4><br> 
               <form class="navbar-form navbar-left navbar-search-form" role="search">
	    					<div class="input-group">
	    						<span class="input-group-addon"><i class="fa fa-search"></i></span>
	    						<input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
	    					</div>
	    		</form> 
				<div class="text-right">
					<a href="{{ route('major.create') }}" class="btn btn-info btn-fill btn-wd">Thêm ngành</a>
				</div>                          
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
	                    <th>Mã</th>
	                    <th>tên</th>
						<th>Sửa</th>
						{{-- <th>Xóa</th> --}}
						
	                </thead>
	                <tbody>
						@php
							 $index = 0;
						@endphp
	                    @foreach ($majors as $major)
                            <tr>
                                <td>{{$index+=1}}</td> 
                                <td>{{$major->nameMajor}}</td> 
								{{-- <td><a class="btn btn-facebook ti-eye" href="{{ route('grade.index',$major->idMajor) }}"></a></td> --}}
								<td><a class="btn btn-warning ti-settings" href="{{ route('major.edit',['major' =>$major->idMajor]) }}"></a></td>
								{{-- <td>
									<form action="{{ route('major.destroy',$major->idMajor) }}" method="post">
										@method('DELETE')
										@csrf
										<button class="btn btn-danger ti-trash"></button>
									</form>
								</td> --}}
                            </tr> 
                        @endforeach                                       
	                </tbody>
	            </table>
				<div class="text-center">
					{{ $majors->appends(['search' => $search])->links() }}
				</div>
	        </div>
	    </div>
    
@endsection