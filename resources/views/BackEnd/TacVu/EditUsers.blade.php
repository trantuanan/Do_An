@extends('BackEnd')

@section('title', 'Sửa thông tin tài khoản')

@section('content-backend')
    <div id="register">
        <p class="h2"><img src="{{ asset('upload/icon/Edit Property_16px.png') }}"> Sửa thông tin tài khoản</p>
        <form method="POST" action="{{route('quanlytaikhoan.update')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group form-tuongtac">
                @foreach ($users as $key => $user)
                <input type="hidden" value="{{ $user->mail_address}}" name="mail_address">
                <input type="hidden" value="{{ $user->id}}" name="id">
                <input type="hidden" value="{{ $user->anh}}" name="anh">
                <input type="hidden" value="{{ $user->password}}" name="password">
                <div class="form-row">
                    <div class="form-group col-3"  style="text-align: center;">
                        <div class="AnhNV-modal">
                            <img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/avatarNV') }}/{{ $user->anh }}">
                        </div>
                        <label for="files" class="btn-chonAnh">Select Image</label>
                        <input type="file" name="anh_1" id="files" style="display: none;" accept="image/*" for="exampleInputPassword1">
                    </div>
                    <div class="form-group col">
                        <div class="form-group">
                            <label>Email đăng nhập</label>
                            <input type="text" class="form-control" placeholder="nhập email đăng nhập" id="mail-edit" value="{{ $user->mail_address}}" name="mail_address" disabled>

                        </div>

                        <div class="form-group">
                            <label style="@if($errors->has('name')) {{'color:red;'}} @endif">Tên</label>
                            <input type="text" class="form-control @if($errors->has('name')) {{ 'is-invalid'}} @endif"placeholder="Nhập tên" id="ten-edit" name="name" value="{{ $user->name}}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label style="@if($errors->has('password_1')) {{'color:red;'}} @endif">Mật khẩu</label>
                    <input type="password" class="form-control @if($errors->has('password_1')) {{ 'is-invalid'}} @endif" id="matkhau-edit" placeholder="Nhập mật khẩu" name="password_1" value="">
                    <div class="invalid-feedback">
                        {{ $errors->first('password_1') }}
                    </div>
                </div>

                <div class="form-group">
                    <label style="@if($errors->has('password_confirmation')) {{'color:red;'}} @endif">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control @if($errors->has('password_confirmation')) {{ 'is-invalid'}} @endif" id="matkhau-confirm-edit" placeholder="Nhập lại mật khẩu" name="password_confirmation" value="">
                    <div class="invalid-feedback">
                       {{ $errors->first('password_confirmation') }}
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label>Giới tính</label>
                        <select class="form-control" name="gioitinh" id="gioitinh-edit" value="{{ $user->gioitinh}}"">
                            <option value="1" checked>Nam</option>
                            <option value="2" >Nữ</option>
                        </select>
                    </div>

                    <div class="form-group col">
                        <label style="@if($errors->has('ngaysinh')) {{'color:red;'}} @endif">Ngày sinh</label>
                        <input type="date" class="form-control @if($errors->has('ngaysinh')) {{ 'is-invalid'}} @endif" placeholder="Ngày sinh" id="ngaysinh-edit" name="ngaysinh" value="{{ $user->ngaysinh}}">
                        <div class="invalid-feedback">
                            {{ $errors->first('ngaysinh') }}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label style="@if($errors->has('address')) {{'color:red;'}} @endif">Địa chỉ</label>
                    <input type="text" class="form-control @if($errors->has('address')) {{ 'is-invalid'}} @endif" id="diachi-edit" placeholder="Nhập địa chỉ" name="address" value="{{ $user->address}}">
                    <div class="invalid-feedback">
                       {{ $errors->first('address') }}
                    </div>
                </div>

                <div class="form-group">
                    <label style="@if($errors->has('phone')) {{'color:red;'}} @endif">Điện thoại</label>
                    <input type="text" class="form-control @if($errors->has('phone')) {{ 'is-invalid'}} @endif" id="dienthoai-edit" placeholder="Nhập số điện thoại" name="phone" value="{{ $user->phone}}">
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                </div>

                <div class="form-group">
                    <label style="@if($errors->has('cmnd')) {{'color:red;'}} @endif">Chứng minh nhân dân</label>
                    <input type="text" class="form-control @if($errors->has('cmnd')) {{ 'is-invalid'}} @endif" id="cmnd-edit" placeholder="Nhập chứng minh nhân dân" name="cmnd" value="{{ $user->cmnd}}">
                    <div class="invalid-feedback">
                        {{ $errors->first('cmnd') }}
                    </div>
                </div>

                <div class="form-group">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Quyền hạn</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="role_id">
                        @foreach ($roles as $role )
                        <option value="{{ $role->id }}" @if($role->id == $user->role_id) {{'selected'}} @endif >{{ $role->TenPQ }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @endforeach
                <button type="submit" class="btn btn-primary btn-center">Lưu thay đổi</button>
                <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlytaikhoan.index')}}'">Hủy bỏ</button>
        </form>
    </div>
@endsection


