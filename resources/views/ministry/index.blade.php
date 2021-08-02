@extends('layouts.app')
@section('content')		
<div class="card">
	                            <div class="card-header">
	                                <h4 class="card-title">Thông tin cá nhân </h4>
	                            </div>
	                            <div class="card-content">
	                                <form method="get" action="/" class="form-horizontal">
	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Tên giáo vụ</label>
	                                            <div class="col-sm-10">
	                                                <input type="text" name="name" class="form-control" 
													value="{{ $ministry->nameMinistry}}" readonly>
	                                            </div>
	                                        </div>
	                                    </fieldset>

	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Email</label>
	                                            <div class="col-sm-10">
	                                                <input type="text" name="email" class="form-control" 
													value="{{ $ministry->email }}" readonly>
	                                            </div>
	                                        </div>
	                                    </fieldset>

	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Password</label>
	                                            <div class="col-sm-10">
	                                                <input type="password" name="password" class="form-control" value="{{ $ministry->passWord }}" readonly>
	                                            </div>
	                                        </div>
	                                    </fieldset>

	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Số điện thoại</label>
	                                            <div class="col-sm-10">
	                                                <input type="text" name="phone" disabled="" class="form-control" value="{{ $ministry->phone }}" readonly>
	                                            </div>
	                                        </div>
	                                    </fieldset>
										<a class="btn btn-info btn-fill btn-wd" href="{{ route('ministry.edit',$ministry->idMinistry) }}">Cập nhật</a>
	                                </form>
	                            </div>
	                        </div>
@endsection 