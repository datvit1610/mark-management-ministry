@extends('layouts.app')
@section('content')
	<div class="text-right">
		<a href="{{ route('ministry.create') }}" class="btn btn-info btn-fill btn-wd">Thêm giáo vụ</a>
	</div>
			<br>
    <div class="card">
	    <div class="card-header">
	        <h4 class="card-title">Danh sách các giáo vụ</h4><br> 
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
	                    <th>Tên giáo vụ</th>
						<th>Email</th>
						<th>Số điện thoại</th>
                        <th>Quyền</th>
						<th>Trạng thái</th>
						<th>Sửa</th>
	                </thead>
					
	                <tbody>
						
	                    @foreach ($ministrys as $ministry)
                            <tr>
                                <td>{{$ministry->idMinistry}}</td> 
                                <td>{{$ministry->nameMinistry}}</td>
                                <td>{{$ministry->email}}</td>
                                <td>{{$ministry->phone}}</td>
                                <td>{{$ministry->RoleName}}</td> 
								<td>{{$ministry->BlockName}}</td>								
								<td>	
									@if($ministry->role == 1)
									<a class="btn btn-warning ti-settings" href="{{ route('ministry.edit',$ministry->idMinistry) }}"></a>
									@else 
									<span></span>
									@endif 
								</td>								
                            </tr> 
                        @endforeach  
						                                   
	                </tbody>
					
	            </table>
				<div class="text-center">
					{{ $ministrys->appends(['search' => $search])->links() }}
				</div>
	        </div>
	    </div>
    
@endsection