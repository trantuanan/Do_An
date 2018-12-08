@extends('BackEnd')

@section('title', 'Thêm sản phẩm mới')

@section('content-backend')
<script type="text/javascript">
    tinymce.init({
        selector: '#form-noidung'
    })
</script>
    <div id="register">
        
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Tạo sản phẩm đặt hàng mới</p>
        <form method="POST" action="{{ route('quanlysanpham.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form_post col-md-6">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Tên SP') }}</label>

                        <div class="col-md-10">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="size" class="col-md-2 col-form-label text-md-right">{{ __('Size') }}</label>

                        <div class="col-md-10">
                            <input id="size" type="text" class="form-control {{ $errors->has('size') ? ' is-invalid' : '' }}" name="size" value="{{ old('size') }}" >

                            @if ($errors->has('size'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('size') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="baohanh" class="col-md-2 col-form-label text-md-right">{{ __('Bảo hành') }}</label>

                        <div class="col-md-10 row">
                            <div class="col-md-8">
                                <input id="baohanh" type="number" class="form-control {{ $errors->has('baohanh') ? ' is-invalid' : '' }}" name="baohanh" value="0" >
                                @if ($errors->has('baohanh'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('baohanh') }}</strong>
                                    </span>
                                @endif
                            </div >
                            <div class="col-md-4" style="padding-left: 0px;">
                                <label for="baohanh" class=" col-form-label"><strong>{{ __('Tháng') }}</strong></label>
                            </div>

                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="category_id" class="col-md-2 col-form-label text-md-right">{{ __('Loại SP') }}</label>

                        <div class="col-md-10">
                            <select class="custom-select {{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id">
                              <option value="">--- Chọn loại sản phẩm ---</option>
                              @foreach($categories as $cg)
                                <option value="{{ $cg->id }}">{{ $cg->name }}</option>
                              @endforeach
                            </select>

                            @if ($errors->has('category_id'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="mota" class="col-md-2 col-form-label text-md-right">{{ __('Hiển thị') }}</label>

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
                              <input type="file" id="select_image_post" accept="image/*" class="custom-file-input {{ $errors->has('anh') ? ' is-invalid' : '' }}" name="anh">
                              <label class="custom-file-label" id="name_image_post" for="anh">Choose file</label>
                              @if ($errors->has('anh'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('anh') }}</strong>
                                </span>
                                @endif
                            </div>

                            
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dongia" class="col-md-2 col-form-label text-md-right">{{ __('Đơn giá') }}</label>

                        <div class="col-md-10 row">
                            <div class="col-md-8">
                                <input id="dongia" type="number" class="form-control {{ $errors->has('dongia') ? ' is-invalid' : '' }}" name="dongia" value="0" >
                                @if ($errors->has('dongia'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dongia') }}</strong>
                                    </span>
                                @endif
                            </div >
                            <div class="col-md-4" style="padding-left: 0px;">
                                <label for="dongia" class=" col-form-label"><strong>{{ __('VND') }}</strong></label>
                            </div>

                            
                        </div>
                    </div>

                </div>

                <div class=" col-md-6">
                    <div class="anhproduct_show">
                        <img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/imagePost') }}/default_avatar.jpg">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="form-noidung" class="col-md-1 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                <div class="col-md-9">
                    <textarea style="height: 250px;" class="form-control{{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" id="form-noidung"></textarea>

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
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlysanpham.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        </form>
    </div>



@endsection


