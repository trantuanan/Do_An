@extends('BackEnd')

@section('title', 'Sửa thông tin bảo hành')

@section('content-backend')
<script type="text/javascript">
    tinymce.init({
        selector: '#form-noidung'
    })
</script>
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Businessman_30px.png') }}"> Sửa thông tin bảo hành</p>
        @foreach($warranties as $wr )
        <form method="POST" action="{{ route('quanlybaohanh.update', $wr->id) }}">
            @csrf
            {{ method_field('PUT') }}
            <input type="hidden" name="id" value="{{$wr->id}}">
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Mã bảo hành') }}</label>

                <div class="col-md-4">
                    <input id="bill" type="text" class="form-control" value="{{ $wr->mabh }}" readonly="true">
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Hóa đơn') }}</label>

                <div class="col-md-4">
                    <input id="bill" type="text" class="form-control" value="{{ $wr->mahd }}" readonly="true">
                    <input id="bill_id_hidden" type="hidden" class="form-control" name="mahd" value="{{ $wr->mahd }}">

                    @if ($errors->has('mahd'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('mahd') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Người tạo') }}</label>

                <div class="col-md-4">
                    <input  type="text" class="form-control {{ $errors->has('users_id') ? ' is-invalid' : '' }}" value="{{ $wr->ngtao }}" readonly="true">
                    <input  type="hidden" name="users_id" value="{{ $wr->users_id }}">
                    @if ($errors->has('users_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('users_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="ngaybh" class="col-md-2 col-form-label text-md-right">{{ __('Ngày bảo hành') }}</label>

                <div class="col-md-4">
                    <input id="ngaybh" type="date" class="form-control{{ $errors->has('ngaybh') ? ' is-invalid' : '' }}" name="ngaybh" value="{{ $wr->ngaybh }}" >

                    @if ($errors->has('ngaybh'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('ngaybh') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="ngaytra" class="col-md-2 col-form-label text-md-right">{{ __('Ngày trả') }}</label>

                <div class="col-md-4">
                    <input id="ngaytra" type="date" class="form-control{{ $errors->has('ngaytra') ? ' is-invalid' : '' }}" name="ngaytra" value="{{ $wr->ngaytra }}" >

                    @if ($errors->has('ngaytra'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('ngaytra') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-md-2 col-form-label text-md-right">{{ __('Phụ chi') }}</label>

                <div class="col-md-4">
                    <input id="address" type="number" class="form-control{{ $errors->has('phuchi') ? ' is-invalid' : '' }}" name="phuchi" value="{{ $wr->phuchi }}" >

                    @if ($errors->has('phuchi'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('phuchi') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="gioitinh" class="col-md-2 col-form-label text-md-right">{{ __('Trạng thái') }}</label>

                <div class="col-md-4">
                    <select class="form-control" name="trangthai">
                        <option value="1" {{ ($wr->trangthai == 1) ? 'selected' : '' }}>Chưa thanh toán</option>
                        <option value="2" {{ ($wr->trangthai == 2) ? 'selected' : '' }}>Đã thanh toán</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="form-noidung" class="col-md-2 col-form-label text-md-right">{{ __('Lý do') }}</label>

                <div class="col-md-8">
                    <textarea style="height: 250px;" class="form-control{{ $errors->has('lydo') ? ' is-invalid' : '' }}" name="lydo" id="form-noidung">{{ $wr->lydo }}</textarea>

                    @if ($errors->has('lydo'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('lydo') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Lưu thông tin') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlybaohanh.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        @endforeach
        </form>
    </div>

@endsection


