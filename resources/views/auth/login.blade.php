@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="card-header" align="center">{{ __('Đăng nhập') }}</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Email đăng nhập') }}</label>

                            <div class="col-md-6">
                                <input id="mail_address" type="email" class="form-control{{ $errors->has('mail_address') ? ' is-invalid' : '' }}" name="mail_address" value="{{ old('mail_address') }}" required autofocus>

                                @if ($errors->has('mail_address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('mail_address') }}</strong>
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
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Lưu tài khoản này.') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0" >
                            <button style="margin: auto;" type="submit" class="btn btn-primary">
                                {{ __('Đăng nhập') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
