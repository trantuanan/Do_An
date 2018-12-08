@extends('layouts.default')

@section('title', 'Khách hàng đăng ký')

@section('content')
<div class="container container-customer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header" align="center">{{ __('Khách hàng đăng ký') }}</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('customer.register.submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Họ tên') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mail_address" class="col-md-4 col-form-label text-md-right">{{ __('Email đăng nhập') }}</label>

                            <div class="col-md-6">
                                <input id="mail_address" type="text" class="form-control{{ $errors->has('mail_address') ? ' is-invalid' : '' }}" name="mail_address" value="{{ old('mail_address') }}" required>

                                @if ($errors->has('mail_address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mail_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gioitinh" class="col-md-4 col-form-label text-md-right">{{ __('Giới tính') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="gioitinh">
                                    <option value="1" checked>Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ngaysinh" class="col-md-4 col-form-label text-md-right">{{ __('Ngày sinh') }}</label>

                            <div class="col-md-6">
                                <input id="ngaysinh" type="date" class="form-control{{ $errors->has('ngaysinh') ? ' is-invalid' : '' }}" name="ngaysinh" value="{{ old('ngaysinh') }}" required autofocus>

                                @if ($errors->has('ngaysinh'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ngaysinh') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Điện thoại') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Đăng ký') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
