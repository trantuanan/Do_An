@extends('BackEnd')

@section('title', 'Thêm tài khoản mới')

@section('content-backend')
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Businessman_30px.png') }}"> Sửa thông tin khách hàng</p>
        <form method="POST" action="{{ route('quanlykhachhang.update') }}">
            @foreach($customer as $cs)
            @csrf
            <input type="hidden" value="{{ $cs->mail_address }}" name="mail_address">
            <input type="hidden" value="{{ $cs->id }}" name="id">
            <input type="hidden" value="{{ $cs->password }}" name="password">
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Họ tên') }}</label>

                <div class="col-md-4">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $cs->name }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Email đăng nhập') }}</label>

                <div class="col-md-4">
                    <input id="mail_address" type="text" class="form-control{{ $errors->has('mail_address') ? ' is-invalid' : '' }}" name="mail_address" value="{{ $cs->mail_address }}" disabled>

                    @if ($errors->has('mail_address'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('mail_address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="gioitinh" class="col-md-2 col-form-label text-md-right">{{ __('Giới tính') }}</label>

                <div class="col-md-4">
                    <select class="form-control" name="gioitinh" >
                        <option value="1" @if($cs->gioitinh == 1) {{ 'selected' }} @endif>Nam</option>
                        <option value="2" @if($cs->gioitinh == 2) {{ 'selected' }} @endif>Nữ</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="ngaysinh" class="col-md-2 col-form-label text-md-right">{{ __('Ngày sinh') }}</label>

                <div class="col-md-4">
                    <input id="ngaysinh" type="date" class="form-control{{ $errors->has('ngaysinh') ? ' is-invalid' : '' }}" name="ngaysinh" value="{{ $cs->ngaysinh }}" required autofocus>

                    @if ($errors->has('ngaysinh'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('ngaysinh') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Địa chỉ') }}</label>

                <div class="col-md-4">
                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $cs->address }}" >

                    @if ($errors->has('address'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Điện thoại') }}</label>

                <div class="col-md-4">
                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $cs->phone }}" required autofocus>

                    @if ($errors->has('phone'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password_1" class="col-md-2 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                <div class="col-md-4">
                    <input id="password_1" type="password" class="form-control{{ $errors->has('password_1') ? ' is-invalid' : '' }}" name="password_1">

                    @if ($errors->has('password_1'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_1') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password_confirmation" class="col-md-2 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>

                <div class="col-md-4">
                    <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_1">

                    @if ($errors->has('password_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Lưu thay đổi') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlykhachhang.index')}}'">Hủy bỏ</button>
                </div>
            </div>
            @endforeach
        </form>
    </div>
@endsection


