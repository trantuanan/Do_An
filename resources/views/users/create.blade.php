@extends('layouts.default')

@section('title', 'Thêm mới người dùng')

@section('content')
    <div id="register">
        <b style="color: red;"></b>
        <form method="POST" action="{{route('admin.store')}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <div class="form-row">
                    <div class="form-group col-6">
                        <label style="@if($errors->has('mail_address')) {{'color:red;'}} @endif">Mail address</label>
                        <input type="text" class="form-control @if($errors->has('mail_address')) {{ 'is-invalid'}} @endif" placeholder="Enter mail address" name="mail_address" value="{{ old('mail_address') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('mail_address') }}
                        </div>
                    </div>
                    <div class="form-group col-6">
                        <label style="@if($errors->has('name')) {{'color:red;'}} @endif">Name</label>
                        <input type="text" class="form-control @if($errors->has('name')) {{ 'is-invalid'}} @endif"placeholder="Enter name" name="name" value="{{ old('name') }}">
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    </div>
                </div>

                <label style="@if($errors->has('password')) {{'color:red;'}} @endif">Password</label>
                <input type="password" class="form-control @if($errors->has('password')) {{ 'is-invalid'}} @endif" placeholder="Password" name="password" value="{{  old('password') }}">
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>


                <label style="@if($errors->has('password_confirmation')) {{'color:red;'}} @endif">Password confirmation</label>
                <input type="password" class="form-control @if($errors->has('password_confirmation')) {{ 'is-invalid'}} @endif" placeholder="Password confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}">
                <div class="invalid-feedback">
                   {{ $errors->first('password_confirmation') }}
                </div>


                <label style="@if($errors->has('address')) {{'color:red;'}} @endif">Address</label>
                <input type="text" class="form-control @if($errors->has('address')) {{ 'is-invalid'}} @endif" placeholder="Enter address" name="address" value="{{ old('address') }}">
                <div class="invalid-feedback">
                   {{ $errors->first('address') }}
                </div>

                <label style="@if($errors->has('phone')) {{'color:red;'}} @endif">Phone</label>
                <input type="text" class="form-control @if($errors->has('phone')) {{ 'is-invalid'}} @endif" placeholder="Enter phone" name="phone" value="{{ old('phone') }}">
                <div class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </div>

                <label class="mr-sm-2" for="inlineFormCustomSelect">role</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="role">
                    @foreach(App\Models\User::$role as $key => $role)
                        <option value="{{ $key }}">{{ $role }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-center">Tạo mới</button>
        </form>
    </div>
@endsection


