@extends('BackEnd')

@section('title', 'Thêm loại tin tức mới')

@section('content-backend')
    <div id="register">
        
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Tạo loại tin tức mới</p>
        <form method="POST" action="{{ route('quanlytintuc.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form_post col-md-6">
                    <input type="hidden" name="users_id" value="{{ Auth::user()->id}}">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Tên loại') }}</label>

                        <div class="col-md-10">
                            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                            @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mota" class="col-md-2 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                        <div class="col-md-10">
                            <input id="mota" type="text" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" value="{{ old('mota') }}" >

                            @if ($errors->has('mota'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('mota') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Thêm mới') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlytintuc.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        </form>
    </div>
@endsection


