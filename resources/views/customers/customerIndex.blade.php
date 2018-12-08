@extends('Customer')

@section('content-1')
<h2>Thông tin khách hàng</h2>
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
    <form method="POST" action="{{route('customer.changepassword.submit')}}">
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
@endsection