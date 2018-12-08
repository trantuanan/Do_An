@extends('BackEnd')

@section('title', 'Thêm kho hàng mới')

@section('content-backend')
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Tạo kho hàng mới</p>
        <form method="POST" action="{{ route('quanlykhohang.store') }}" >
            @csrf
            <div class="">
                  <div class="form-row" style="padding-top: 10px; margin-bottom: 10px;">
                    <div class="col-md-9">
                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Tên kho hàng') }}</label>

                          <div class="col-md-5">
                              <input  type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Tên kho hàng">
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
                              <input  type="number" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" placeholder="Số điện thoại">
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
                              <input  type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Địa chỉ">
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
                              <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Mô tả"></textarea>
                          </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-2"></div>

                        <div class="col-md-5">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Thêm mới') }}
                          </button>
                          <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlykhohang.index')}}'">Hủy bỏ</button>
                        </div>
                      </div>
                  
                </div>
              <div class="form-group row mb-0" style="margin-top: 20px;">
                
            </div>
        </form>
    </div>



@endsection


