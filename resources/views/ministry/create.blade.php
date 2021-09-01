@extends('layouts.app')
@section('content')
    <div class="card">
        <form method="post" action="{{ route('ministry.store')}}">
            @csrf 
            <div class="card-header">
                <h4 class="card-title">
                    Thêm giáo vụ
                </h4>
            </div>
            <div class="card-content">
                <div class="form-group">
                    <label>Tên giáo vụ</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="text" name="passWord" class="form-control">
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label>Quyền</label>
                        <div class="radio">
							<input type="radio" name="role" value="0">
							<label>Quản lý</label>
						</div>
                        <div class="radio">
							<input type="radio" name="role" value="1">
							<label>Giáo vụ</label>
                        </div>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                        <div class="radio">
							<input type="radio" name="block" value="0">
							<label>Hoạt động</label>
						</div>
                        <div class="radio">
							<input type="radio" name="block" value="1">
							<label>Khóa</label>
                        </div>
                </div>
                <button type="submit" class="btn btn-fill btn-info">Thêm</button>
            </div>
	    </form>
	</div>
@endsection