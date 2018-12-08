@extends('BackEnd')

@section('title', 'Sửa tin tức')

@section('content-backend')
<script type="text/javascript">
    tinymce.init({
        selector: '#form-noidung'
    })
</script>
    <div id="register">
        
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Sửa bài viết tin tức</p>
        <form method="POST" action="{{ route('quanlytintuc.update') }}" enctype="multipart/form-data">
            @csrf
            @foreach($posts as $pt)
            <input type="hidden" name="users_id" value="{{ Auth::user()->id}}">
            <input type="hidden" name="id" value="{{ $pt->id }}">
            <input type="hidden" name="anh" value="{{ $pt->anh }}">
            <div class="row">
                <div class="form_post col-md-6">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Tiêu đề') }}</label>

                        <div class="col-md-10">
                            <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $pt->title }}" required autofocus>

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
                            <input id="mota" type="text" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" value="{{ $pt->title }}" >

                            @if ($errors->has('mota'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('mota') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mota" class="col-md-2 col-form-label text-md-right">{{ __('Loại tin') }}</label>

                        <div class="col-md-10">
                            <select class="custom-select {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="category_id">
                              <option value="">--- Chọn loại tin tức ---</option>
                            @foreach( $categories as $ca)
                              <option value="{{ $ca->id }}"  @if($ca->id == $pt->category_id) {{'selected'}} @endif>{{ $ca->name }}</option>
                            @endforeach
                            </select>

                            @if ($errors->has('mota'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('mota') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mota" class="col-md-2 col-form-label text-md-right">{{ __('Trạng thái') }}</label>

                        <div class="col-md-10">
                            <select class="custom-select {{ $errors->has('trangthai') ? ' is-invalid' : '' }}" name="trangthai">
                              <option value="1">Hiển thị</option>
                              <option value="2">Ẩn</option>
                            </select>

                            @if ($errors->has('trangthai'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('trangthai') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="anh" class="col-md-2 col-form-label text-md-right">{{ __('Ảnh bìa') }}</label>

                        <div class="col-md-10">
                            <div class="custom-file">
                              <input type="file" id="select_image_post" accept="image/*" class="custom-file-input {{ $errors->has('anh_1') ? ' is-invalid' : '' }}" name="anh_1">
                              <label class="custom-file-label" id="name_image_post" for="anh">Choose file</label>
                            </div>

                            @if ($errors->has('anh_1'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('anh_1') }}</strong>
                                </span>
                            @endif
                        </div>

                        
                    </div>
                </div>
            
                <div class=" col-md-6">
                    <div class="anhpost_show">
                        <img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/imagePost') }}/{{ $pt->anh }}">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="form-noidung"  class="col-md-1 col-form-label text-md-right">{{ __('Nội dung') }}</label>

                <div class="col-md-9">
                    <textarea style="height: 250px;" class="form-control{{ $errors->has('noidung') ? ' is-invalid' : '' }}" name="noidung" id="form-noidung">{{ $pt->noidung }}</textarea>

                    @if ($errors->has('noidung'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('noidung') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Lưu thay đổi') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlytintuc.index')}}'">Hủy bỏ</button>
                </div>
            </div>
            @endforeach
        </form>
    </div>
@endsection


