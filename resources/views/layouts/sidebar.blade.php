<div class="sidebar" data-background-color="brown" data-active-color="danger">
	    
			<div class="logo">
				<a href="http://www.creative-tim.com" class="simple-text logo-mini">
					XĐ
				</a>
				<a href="{{ route('doshboard.index') }}"  class="simple-text logo-normal">
					Xem điểm 
				</a>
			</div>
	    	<div class="sidebar-wrapper">
				<div class="user">
					<div class="photo">
	                    <img src="../../assets/img/faces/face-0.jpg" />
	                </div>
	                <div class="info">
	                    <a href="{{ route('profile.index') }}">
	                        <span>
							{{ Session::get('nameMinistry') }}
							</span>
	                    </a>
						{{-- <div class="clearfix"></div> --}}
	                </div>
	            </div>
	            <ul class="nav">
					<li>
						<a href="{{ route('doshboard.index') }}">
	                        <i class="ti-clipboard"></i>
							<span class="sidebar-normal">Trang chủ</span>	                       
	                    </a>
	                </li>
					@if (session()->get('role')==0)
						<li>
							<a href="{{ route ('ministry.index')}}">
								<i class="ti-clipboard"></i>
								<span class="sidebar-normal">Quản lý giáo vụ</span>	                       
							</a>
						</li>
					@endif		
					<li>
						<a href="{{ route ('course.index')}}">
	                        <i class="ti-clipboard"></i>
							<span class="sidebar-normal">Khóa</span>	                       
	                    </a>
	                </li>

					<li>
						<a href="{{ route ('major.index')}}">
							<i class="ti-clipboard"></i>
							<span class="sidebar-normal">Chuyên ngành</span>
						</a>
					</li>
					
	                <li>
						<a href="{{ route('grade.index') }}">
	                        <i class="ti-clipboard"></i>
	                        <span class="sidebar-normal">Quản lý lớp</span>
	                    </a>
					</li>

					<li>
	                    <a href="{{ route ('student.index') }}">
							<i class="ti-clipboard"></i>
							<span class="sidebar-normal">Quản lý sinh viên</span>
						</a>
	                </li>

					<li>
						<a href="{{ route ('subject.index') }}">
							<i class="ti-clipboard"></i>
							<span class="sidebar-normal">Quản lý môn học</span>
						</a>
					</li>

					<li>
	                    <a href="{{ route ('mark.index') }}">
							<i class="ti-clipboard"></i>
							<span class="sidebar-normal">Quản lý điểm</span>
						</a>
	                </li>

					<li>
	                    <a href="{{ route ('mark.statisGrade') }}">
							<i class="ti-server"></i>
							<span class="sidebar-normal">Thống kê</span>
						</a>
	                </li>
	            </ul>
	    	</div>
	    </div>