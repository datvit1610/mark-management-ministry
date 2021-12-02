@extends('layouts.app')
@section('content')
	
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title btn-center">Hãy chọn lớp cần thống kê</h4><br> 
               {{-- <form class="navbar-form navbar-left navbar-search-form" role="search">
	    			<div class="input-group">
	    			    <span class="input-group-addon"><i class="fa fa-search"></i></span>
	    				<input type="text" value="{{$search}}" name="search" class="form-control" placeholder="Search...">
	    		</div>
	    		</form> --}}
	        <div class="card-content table-responsive table-full-width">
	            <table class="table table-striped">
	                <thead>
	                    <th>Mã</th>
	                    <th>Tên Lớp</th>                       
						<th>Xem</th>						
	                </thead>
	                <tbody>
	                    @foreach ($grade as $grades)
                            <tr>
                                <td>{{$grades->idGrade}}</td> 
                                <td>{{$grades->nameGrade}}                                                             
								<td><a class="btn btn-facebook ti-eye" href="{{ route('mark.statisSubject',
								['grade'=> $grades->idGrade])}}"></a></td>	
                            </tr> 
                        @endforeach                                       
	                </tbody>
	            </table>
				{{-- <div class="text-center">
					{{ $grades->appends(['search' => $search])->links() }}
				</div> --}}
	        </div>
	    </div>
    
@endsection