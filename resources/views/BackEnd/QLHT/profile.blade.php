@extends('BackEnd')

@section('title', 'Hồ sơ cá nhân')

@section('content-backend')
<p class="h2"><img src="{{ asset('upload/icon/Applicant_30px.png') }}"> Hồ sơ cá nhân</p>
<div class="content-tttk">
	@include('flash::message')
			<div class="row">
				<div class="col-md-3" align="center">
					<div class="image-nhanvien">
						<img src="{{ asset('/upload/avatarNV') }}/{{ Auth::user()->anh }}">
					</div>
				</div>
				<div class="col-md-9">
					<div class="content-nhanvien row">
						<div class="col-md-6">
							<table class="table-profile">
								<tr>
									<th>Họ tên:</th><td>{{Auth::user()->name}}</td>
								</tr>
								<tr>
									<th>Giới tính:</th><td>{{Helper::GioiTinh(Auth::user()->gioitinh)}}</td>
								</tr>
								<tr>
									<th>Ngày sinh:</th><td>{{Helper::formatDate(Auth::user()->ngaysinh)}}</td>
								</tr>
								<tr>
									<th>Địa chỉ:</th><td>{{Auth::user()->address}}</td>
								</tr>
								<tr>
									<th>CMND:</th><td>{{Auth::user()->cmnd}}</td>
								</tr>
								<tr>
									<th>Số điện thoại:</th><td>{{Auth::user()->phone}}</td>
								</tr>
								<tr>
									<th>Mail:</th><td>{{Auth::user()->mail_address}}</td>
								</tr>
							</table>
						</div>
						<div class="col-md-6">
							<p><b>Emai đăng nhập:</b> <span style="font-size: 17px; padding-left:10px;">{{Auth::user()->mail_address}}</span></p>
							<p><b>Ngày tạo:</b> <span style="font-size: 17px; padding-left:10px;">{{Auth::user()->created_at}}</span><p>
							<p><b>Chức vụ:</b> <span style="font-size: 17px; padding-left:10px;">{{Auth::user()->role_id}}</span><p>
							<form method="POST" action="{{route('quanlytaikhoan.profileEdit')}}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="hidden" value="{{ Auth::user()->id}}" name="id">
							  	<div class="form-group">
				                    <label style="@if($errors->has('password')) {{'color:red;'}} @endif"><b>Mật khẩu</b></label>
				                    <input type="password" class="form-control @if($errors->has('password')) {{ 'is-invalid'}} @endif" id="matkhau-edit" placeholder="Nhập mật khẩu" name="password" value="">
				                    <div class="invalid-feedback">
				                        {{ $errors->first('password') }}
				                    </div>
				                </div>

				                <div class="form-group">
				                    <label style="@if($errors->has('password_confirmation')) {{'color:red;'}} @endif"><b>Nhập lại mật khẩu</b></label>
				                    <input type="password" class="form-control @if($errors->has('password_confirmation')) {{ 'is-invalid'}} @endif" id="matkhau-confirm-edit" placeholder="Nhập lại mật khẩu" name="password_confirmation" value="">
				                    <div class="invalid-feedback">
				                       {{ $errors->first('password_confirmation') }}
				                    </div>
				                </div>
							  	<button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection