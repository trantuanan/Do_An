@extends('BackEnd')

@section('title', 'Thêm thiết kế mới')

@section('content-backend')
    <div id="register">
        
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Thêm thiết kế mới</p>
        <form method="POST" action="{{ route('quanlythietke.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form_post col-md-6">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('File') }}</label>

                        <div class="col-md-10">
                            <div class="custom-file">
                              <input type="file" id="select_file_designs" class="custom-file-input {{ $errors->has('file') ? ' is-invalid' : '' }}" name="file">
                              <label class="custom-file-label" id="name_file_designs" for="select_file_designs">Chọn file</label>
                              @if ($errors->has('file'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('file') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="vatlieu" class="col-md-2 col-form-label text-md-right">{{ __('Type') }}</label>

                        <div class="col-md-10">
                            <input id="type_file_designs" type="text" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('vatlieu') }}"  readonly="true">

                            @if ($errors->has('type'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('type') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="size" class="col-md-2 col-form-label text-md-right">{{ __('Size') }}</label>

                        <div class="col-md-10">
                            <input id="size_file_designs" type="text" class="form-control {{ $errors->has('size') ? ' is-invalid' : '' }}" value="{{ old('size') }}" readonly="true">
                            <input id="size_file_designs_1" type="hidden" class="form-control" name="size" value="{{ old('size') }}" readonly="true">
                            @if ($errors->has('size'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('size') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class=" col-md-6">
                    <div class="anhdesigns_show">
                        <img id="AnhNV-show" src="{{ asset('/upload/imagePost') }}/default_avatar.jpg">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="form-noidung" class="col-md-1 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                <div class="col-md-7">
                    <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin..."></textarea>

                    @if ($errors->has('mota'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('mota') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Thêm mới') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlythietke.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        </form>
    </div>
@endsection


