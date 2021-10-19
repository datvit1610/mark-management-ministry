@extends('layouts.app')
@section('content')		
<div class="card">
	                            <div class="card-header">
	                                <h4 class="card-title">Chỉnh sửa thông tin cá nhân </h4>
	                            </div>
	                            <div class="card-content">
	                                <form method="post" action="{{ route('profile.update', $profile->idMinistry) }}">
										@method("PUT")
           								@csrf 
	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Tên giáo vụ</label>
	                                            <div class="col-sm-10">
	                                                <input type="text" name="name" class="form-control" 
													value="{{ $profile->nameMinistry}}" >
	                                            </div>
	                                        </div>
	                                    </fieldset>

	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Email</label>
	                                            <div class="col-sm-10">
	                                                <input type="text" name="email" class="form-control" 
													value="{{ $profile->email }}">
	                                            </div>
	                                        </div>
	                                    </fieldset>

	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Password</label>
	                                            <div class="col-sm-10">
	                                                <input type="password" name="password" class="form-control" value="{{$profile->passWord}}" id="myInput">
                    								<input type="checkbox" onclick="myFunction()">  Show Pass
	                                            </div>
	                                        </div>
	                                    </fieldset>

	                                    <fieldset>
	                                        <div class="form-group">
	                                            <label class="col-sm-2 control-label">Số điện thoại</label>
	                                            <div class="col-sm-10">
	                                                <input type="text" name="phone"  class="form-control" value="{{ $profile->phone }}" >
	                                            </div>
	                                        </div>
	                                    </fieldset>
										<button type="submit" class="btn btn-info btn-fill btn-wd">Lưu thay đổi</button>
	                                </form>
	                            </div>
	                        </div>
@endsection 