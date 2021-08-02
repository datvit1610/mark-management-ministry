@extends('layouts.app')
@section('content')		
<div class="card">
	                            <div class="card-header">
	                                <h4 class="card-title">Chỉnh sửa thông tin cá nhân </h4>
	                            </div>
	                            <div class="card-content">
	                                <form method="post" action="{{ route('ministry.update', $ministry->idMinistry) }}">
										@method("PUT")
           								@csrf 
	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Tên giáo vụ</label>
	                                            <div class="col-sm-10">
	                                                <input type="text" name="name" class="form-control" 
													value="{{ $ministry->nameMinistry}}" >
	                                            </div>
	                                        </div>
	                                    </fieldset>

	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Email</label>
	                                            <div class="col-sm-10">
	                                                <input type="text" name="email" class="form-control" 
													value="{{ $ministry->email }}" >
	                                            </div>
	                                        </div>
	                                    </fieldset>

	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Password</label>
	                                            <div class="col-sm-10">
	                                                <input type="text" name="password" class="form-control" value="{{ $ministry->passWord }}" >
	                                            </div>
	                                        </div>
	                                    </fieldset>

	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Số điện thoại</label>
	                                            <div class="col-sm-10">
	                                                <input type="text" name="phone"  class="form-control" value="{{ $ministry->phone }}" >
	                                            </div>
	                                        </div>
	                                    </fieldset>
										<button type="submit" class="btn btn-info btn-fill btn-wd">Lưu thay đổi</button>
	                                </form>
	                            </div>
	                        </div>
@endsection 