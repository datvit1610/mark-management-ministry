<div class="sidebar" data-background-color="brown" data-active-color="danger">
	    
			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text logo-mini">
					XĐ
				</a>

				<a href="../mark"  class="simple-text logo-normal">
					Xem điểm 
				</a>
			</div>
	    	<div class="sidebar-wrapper">
				<div class="user">
	                <div class="info">
						{{-- <div class="photo">
		                    {{ Session::get('avata') }}
		                </div> --}}

	                    <a href="{{ route('profile.index') }}">
	                        <span>
							<h4 > {{ Session::get('nameMinistry') }} </h4>
							</span>
	                    </a>
						<div class="clearfix"></div>
	                </div>
	            </div>
	            <ul class="nav">
					<li>
						<a href="{{ route ('ministry.index')}}">
	                        <i class="ti-clipboard"></i>
							<span class="sidebar-normal">Quản lý giáo vụ</span>	                       
	                    </a>
	                </li>

					<li>
						<a href="{{ route ('course.index')}}">
	                        <i class="ti-clipboard"></i>
							<span class="sidebar-normal">Khóa</span>	                       
	                    </a>
	                </li>

					<li>
						<a href="{{ route ('major.index')}}">
							<i class="ti-package"></i>
							<span class="sidebar-normal">Chuyên ngành</span>
						</a>
					</li>
					
	                <li>
						<a href="{{ route('grade.index') }}">
	                        <i class="ti-view-list-alt"></i>
	                        <span class="sidebar-normal">Quản lý lớp</span>
	                    </a>
					<li>
	                    <a href="{{ route ('student.index') }}">
							<i class="ti-package"></i>
							<span class="sidebar-normal">Quản lý sinh viên</span>
						</a>
	                </li>
	            </ul>
	    	</div>
	    </div>