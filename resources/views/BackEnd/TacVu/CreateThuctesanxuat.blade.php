@extends('BackEnd')

@section('title', 'Thêm sản phẩm đã sản xuất')

@section('content-backend')
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Tạo sản phẩm đã sản xuất</p>
        <form method="POST" action="{{ route('quanlysanphamsx.store') }}" >
            @csrf
            <div class="">
                  <div class="form-row" style="padding-top: 10px; margin-bottom: 10px;">
                    <div class="col-md-9">
                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Người tạo') }}</label>

                          <div class="col-md-5">
                              <input  type="text" class="form-control {{ $errors->has('users_id') ? ' is-invalid' : '' }}" value="{{ Auth::user()->name }}" readonly="true">
                              <input  type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                              @if ($errors->has('users_id'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('users_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">Tiến độ</label>

                          <div class="col-md-5">
                              <select class="custom-select" name="tdsx_id" id="select_tdsx">
                                <option > -- Chọn tiến độ -- </option>
                                @foreach($tdsxs as $td)
                                <option value="{{$td->id}}" data-id="{{$td->product_id}}" data-name="{{$td->tensp}}" data-max="{{$td->conlai}}">{{$td->matdsx}} - {{$td->tensp}}</option>
                                @endforeach
                                
                              </select>
                              @if ($errors->has('tdsx_id'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('tdsx_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                    <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">Sản phẩm</label>

                          <div class="col-md-5">
                              <input  type="text" class="form-control {{ $errors->has('product_id') ? ' is-invalid' : '' }}" id="product_id_ttsx" value="" placeholder="Sản phẩm" readonly="true">
                              <input  type="hidden" name="product_id" value="" id="product_id_hidden_ttsx">
                              @if ($errors->has('product_id'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('product_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="soluong" class="col-md-2 col-form-label text-md-right">{{ __('Số lượng') }}</label>

                          <div class="col-md-5">
                              <input  type="number" id="soluong_ttsx" class="form-control {{ $errors->has('soluong') ? ' is-invalid' : '' }}" name="soluong" value="1" min="1" max="">

                              @if ($errors->has('soluong'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('soluong') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Ngày bắt đầu') }}</label>

                          <div class="col-md-5">
                              <input type="date" class="form-control {{ $errors->has('ngaybd') ? ' is-invalid' : '' }}" name="ngaybd" value="{{ old('ngaybd') }}">
                              @if ($errors->has('ngaybd'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('ngaybd') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Ngày hoàn thành') }}</label>

                          <div class="col-md-5">
                              <input type="date" class="form-control {{ $errors->has('ngayht') ? ' is-invalid' : '' }}" name="ngayht" value="{{ old('ngayht') }}">
                              @if ($errors->has('ngayht'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('ngayht') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-2"></div>

                        <div class="col-md-5">
                          <button type="submit" class="btn btn-primary">
                              {{ __('Thêm mới') }}
                          </button>
                          <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlysanphamsx.index')}}'">Hủy bỏ</button>
                        </div>
                      </div>
                  
                </div>
              <div class="form-group row mb-0" style="margin-top: 20px;">
                
            </div>
        </form>
    </div>



@endsection


