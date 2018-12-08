@extends('BackEnd')

@section('title', 'Sửa thông tin nhà cung cấp')

@section('content-backend')
    @foreach ($nccs as $nc)
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Businessman_30px.png') }}"> Sửa thông tin nhà cung cấp</p>
        <form method="POST" action="{{ route('quanlyncc.update',$nc->id) }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Tên nhà cung cấp') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $nc->name }}"  >

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Địa chỉ liên hệ') }}</label>

                <div class="col-md-6">
                    <input id="mail_address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $nc->address }}" >

                    @if ($errors->has('address'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Hộp thư điện tử') }}</label>

                <div class="col-md-6">
                    <input id="mail_address" type="text" class="form-control{{ $errors->has('mail_address') ? ' is-invalid' : '' }}" name="mail_address" value="{{ $nc->mail_address }}" >

                    @if ($errors->has('mail_address'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('mail_address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="phone" class="col-md-2 col-form-label text-md-right">{{ __('Điện thoại') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ $nc->phone }}"  >

                    @if ($errors->has('phone'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                <div class="col-md-6">
                    <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin...">{{ $nc->mota }}</textarea>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Lưu thay đổi') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlyncc.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        </form>
    </div>
@endforeach
@endsection


