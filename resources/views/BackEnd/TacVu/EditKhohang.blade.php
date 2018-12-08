@extends('BackEnd')

@section('title', 'Sửa thông tin kho hàng mới')

@section('content-backend')
    <div id="register">
      @foreach($khohangs as $kh)
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Sửa thông tin kho hàng mới</p>
        <form method="POST" action="{{ route('quanlykhohang.update',$kh->id) }}" >
            @csrf
            {{ method_field('PUT') }}
            <div class="">
                  <div class="form-row" style="padding-top: 10px; margin-bottom: 10px;">
                    <div class="col-md-9">
                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Tên kho hàng') }}</label>

                          <div class="col-md-5">
                              <input  type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Tên kho hàng" value="{{ $kh->name }}">
                              @if ($errors->has('name'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Điện thoại') }}</label>

                          <div class="col-md-5">
                              <input  type="number" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Số điện thoại" value="{{ $kh->phone }}">
                              @if ($errors->has('phone'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('phone') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Địa chỉ') }}</label>

                          <div class="col-md-5">
                              <input  type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Địa chỉ" value="{{ $kh->address }}">
                              @if ($errors->has('address'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('address') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                          <div class="col-md-7">
                              <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Mô tả">{{ $kh->mota }}</textarea>
                          </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-2"></div>

                        <div class="col-md-5">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Lưu thay đổi') }}
                          </button>
                          <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlykhohang.index')}}'">Hủy bỏ</button>
                        </div>
                      </div>
                  
                </div>
              <div class="form-group row mb-0" style="margin-top: 20px;">
                
            </div>
        </form>
        @endforeach
    </div>



@endsection


