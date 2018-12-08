@extends('BackEnd')

@section('title', 'Thêm tài khoản mới')

@section('content-backend')
    <div id="register">
        <p class="h2"><img src="{{ asset('upload/icon/Businessman_30px.png') }}"> Tạo tài khoản</p>
        <form method="POST" action="{{route('quanlytaikhoan.store')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group form-tuongtac">
                <div class="form-row">
                    <div class="form-group col-3"  style="text-align: center;">
                        <div class="AnhNV-modal">
                            <img id="AnhNV-show" name="AnhNV_1" src="{{ asset('upload/img/default_avatar.jpg') }}">
                        </div>
                        <label for="files" class="btn-chonAnh">Select Image</label>
                        <input type="file" name="anh" id="files" style="display: none;" accept="image/*" for="exampleInputPassword1">
                    </div>
                    <div class="form-group col">
                        <div class="form-group">
                            <label style="@if($errors->has('mail_address')) {{'color:red;'}} @endif">Email đăng nhập</label>
                            <input type="text" class="form-control @if($errors->has('mail_address')) {{ 'is-invalid'}} @endif" placeholder="nhập email đăng nhập" name="mail_address" value="{{ old('mail_address') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('mail_address') }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="@if($errors->has('name')) {{'color:red;'}} @endif">Tên</label>
                            <input type="text" class="form-control @if($errors->has('name')) {{ 'is-invalid'}} @endif"placeholder="Nhập tên" name="name" value="{{ old('name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>


                    </div>
                </div>

                <div class="form-group">
                    <label style="@if($errors->has('password')) {{'color:red;'}} @endif">Mật khẩu</label>
                    <input type="password" class="form-control @if($errors->has('password')) {{ 'is-invalid'}} @endif" placeholder="Nhập mật khẩu" name="password" value="{{  old('password') }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                </div>

                <div class="form-group">
                    <label style="@if($errors->has('password_confirmation')) {{'color:red;'}} @endif">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control @if($errors->has('password_confirmation')) {{ 'is-invalid'}} @endif" placeholder="Nhập lại mật khẩu" name="password_confirmation" value="{{ old('password_confirmation') }}">
                    <div class="invalid-feedback">
                       {{ $errors->first('password_confirmation') }}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label>Giới tính</label>
                        <select class="form-control" name="gioitinh" value="{{ old('GioiTinh') }}">
                            <option value="1" checked>Nam</option>
                            <option value="2" >Nữ</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label style="@if($errors->has('ngaysinh')) {{'color:red;'}} @endif">Ngày sinh</label>
                        <input type="date" class="form-control @if($errors->has('ngaysinh')) {{ 'is-invalid'}} @endif" placeholder="Ngày sinh" name="ngaysinh" value="{{ old('ngaysinh') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('ngaysinh') }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label style="@if($errors->has('address')) {{'color:red;'}} @endif">Địa chỉ</label>
                    <input type="text" class="form-control @if($errors->has('address')) {{ 'is-invalid'}} @endif" placeholder="Nhập địa chỉ" name="address" value="{{ old('address') }}">
                    <div class="invalid-feedback">
                       {{ $errors->first('address') }}
                    </div>
                </div>

                <div class="form-group">
                    <label style="@if($errors->has('phone')) {{'color:red;'}} @endif">Điện thoại</label>
                    <input type="text" class="form-control @if($errors->has('phone')) {{ 'is-invalid'}} @endif" placeholder="Nhập số điện thoại" name="phone" value="{{ old('phone') }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                </div>

                <div class="form-group">
                    <label style="@if($errors->has('cmnd')) {{'color:red;'}} @endif">Chứng minh nhân dân</label>
                    <input type="text" class="form-control @if($errors->has('cmnd')) {{ 'is-invalid'}} @endif" placeholder="Nhập chứng minh nhân dân" name="cmnd" value="{{ old('cmnd') }}">
                    <div class="invalid-feedback">
                        {{ $errors->first('cmnd') }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Quyền hạn</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="role_id">
                        @foreach ($roles as $role )
                            <option value="{{ $role->id }}" >{{ $role->TenPQ }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <button type="submit" class="btn btn-primary btn-center">Tạo mới</button>
                <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlytaikhoan.index')}}'">Hủy bỏ</button>
        </form>
    </div>
@endsection


