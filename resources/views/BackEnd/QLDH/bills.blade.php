@extends('BackEnd')

@section('title', 'Quản lý đơn hàng')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Ingredients_30px.png') }}"> Quản lý đơn hàng</p>
<div class="row">
    <form class="col-6" action="{{ route('quanlydonhang.create') }}">
        <button type="submit" class="btn btn-primary" id="btn-update-donhang">Thêm đơn hàng</button>
        <button type="button" class="btn btn-danger" id="btn-delete-donhang">Xóa</button>
        <button type="button" class="btn btn-success" value="" id="btn-duyet">Duyệt đơn</button>
        <button type="button" class="btn btn-warning" value="1" id="btn-huyduyet">Hủy duyệt</button>
    </form>
    <form class="col-2" action="{{route('quanlydonhang.index')}}" method="GET" id="form_loaitk_donhang">
        <select class="custom-select {{ $errors->has('khohang_id') ? ' is-invalid' : '' }}" name="loai" id="select_loaitk_donhang">
          <option value="" > Tất cả công đoạn</option>
          <option value="1" {{ ($a['loai'] == 1)? 'selected' : ''}}> Chờ duyệt </option>
          <option value="2" {{ ($a['loai'] == 2)? 'selected' : ''}}> Đã duyệt </option>
          <option value="3" {{ ($a['loai'] == 3)? 'selected' : ''}}> Chờ sản xuất </option>
          <option value="4" {{ ($a['loai'] == 4)? 'selected' : ''}}> Đang sản xuất </option>
          <option value="5" {{ ($a['loai'] == 5)? 'selected' : ''}}> Hoàn thành </option>
        </select>
    </form>
    <form class="col-4 " action="{{ route('quanlydonhang.index') }}" method="GET">
        <div id="search_user">
            <div class="form-row pull-right">
                <div class="form-group col-8">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên khách hàng" name="search" value="{{  old('title') }}">
                </div>
                <div class="form-group col-4">
                    <input type="submit" class="btn btn-primary form-control" value="Tìm Kiếm">    
                </div>
            </div>   
        </div>
    </form>
</div>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col" style="width: 2%">chọn</th>
      <th scope="col" style="width: 8%">Mã đơn</th>
      <th scope="col" style="width: 10%">Khách hàng</th>
      <th scope="col" style="width: 10%">Địa chỉ</th>
      <th scope="col" style="width: 7%">Điện thoại</th>
      <th scope="col" style="width: 12%">Mô tả</th>
      <th scope="col" style="width: 8%">Tổng tiền</th>
      <th scope="col" style="width: 5%">Thuế</th>      
      <th scope="col" style="width: 8%">Ngày hẹn</th>
      <th scope="col" style="width: 8%">Công đoạn</th>
      <th scope="col" style="width: 5%">Xem</th>
    </tr>
  </thead>
  <tbody id="table-donhang">
    @foreach ($bills as $key => $bl)
    <tr class="dong">
      <th scope="row" align="center" style="vertical-align: middle;"><input type="radio" data-tiendo="{{ $bl->tiendo }}" data-id="{{ $bl->id }}" data-ma="{{ $bl->madh }}" name="radio-sp"></th>
      <td align="center" style="vertical-align: middle;">{{ $bl->madh }}</td>
      <td align="center" style="vertical-align: middle;">{{ $bl->tenkh }}</td>
      <td>{{ substr(strip_tags($bl->address), 0, 50)}}{{ strlen(strip_tags($bl->address)) > 50? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ $bl->phone }}</td>
      <td>{{ substr(strip_tags($bl->mota), 0, 50)}}{{ strlen(strip_tags($bl->mota)) > 50? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($bl->thanhtien) }} VNĐ</td>
      <td align="center" style="vertical-align: middle;">{{ $bl->thue }}%</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($bl->ngayht) }}</td>
      <td align="center" style="vertical-align: middle;">{!! Helper::tiendo($bl->tiendo) !!}</td>
      <td align="center" style="vertical-align: middle;"><a id="btn-select-donhang" data-id="{{ $bl->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $bills->links() !!}

    <!-- Modal form yêu cầu sản xuất -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_createYcsx" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Tạo yêu cầu sản xuất</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i aria-hidden="true">&times;</i>
            </button>
          </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('quanlyhoadon.createYCSX') }}" id="form_create_ycsx_bill">
            @csrf
            <div class="">
                  <div class="form-row" style="padding-top: 10px; margin-bottom: 10px;">
                    <div class="col-md-6">
                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Tài khoản') }}</label>

                          <div class="col-md-8">
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
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">Tên Y/C</label>

                          <div class="col-md-8">
                              <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" id="name_yc_bill">
                              @if ($errors->has('name'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label  class="col-md-2 col-form-label text-md-right">{{ __('Đơn hàng') }}</label>

                          <div class="col-md-8">
                              <input  type="text" class="form-control {{ $errors->has('bill_id') ? ' is-invalid' : '' }}" id="bill_bill" value="" readonly="true">
                              <input type="hidden" name="bill_id" id="bill_id_hidden_bill">

                              @if ($errors->has('bill_id'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('bill_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      
                  
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="mail_address" class="col-md-3 col-form-label text-md-right">{{ __('Ngày hẹn') }}</label>

                        <div class="col-md-8">
                            <input type="date" class="form-control {{ $errors->has('ngayhen') ? ' is-invalid' : '' }}" name="ngayhen" value="{{ old('ngayhen') }}" id="ngayhen_bill">
                            @if ($errors->has('ngayhen'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('ngayhen') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mail_address" class="col-md-3 col-form-label text-md-right">{{ __('Ngày trả') }}</label>

                        <div class="col-md-8">
                            <input type="date" class="form-control {{ $errors->has('ngaytra') ? ' is-invalid' : '' }}" name="ngaytra" value="{{ old('ngaytra') }}" id="ngaytra_bill">
                            @if ($errors->has('ngaytra'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('ngaytra') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mail_address" class="col-md-3 col-form-label text-md-right">{{ __('Trạng thái') }}</label>

                        <div class="col-md-8">
                            <select class="custom-select" name="trangthai" >
                              <option value="1">Chờ sản xuất</option>
                              <option value="2">Đang sản xuất</option>
                              <option value="3">Hoàn Thành</option>
                            </select>
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-row">
                <div class="row col-md-12">
                      <label for="mail_address" class="col-md-1 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                      <div class="col-md-11">
                          <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin..." >{{ old('mota') }}</textarea>
                      </div>
                  </div>
              </div>
              <div class="form-group row mb-0" style="margin-top: 20px;">
                <div class="col-md-6 offset-md-1">
                    <button type="button" class="btn btn-primary" id="btn_create_ycsx_bill">
                        {{ __('Thêm mới') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('yeucausanxuat.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        </form>
        </div>
      </div>
    </div>
</div>
@endsection
