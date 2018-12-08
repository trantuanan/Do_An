@extends('BackEnd')

@section('title', 'Thêm đơn hàng mới')

@section('content-backend')
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Tạo đơn hàng mới</p>
        <form method="POST" action="{{ route('quanlydonhang.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="customer_id" id="idkh_donhang">
            <input type="hidden" name="tiendo" id="congdoan_donhang" value="1">
            <div class="container form_donhang">
                  <div class="form-row">
                    <div class="col-md-7">
                      <div class="form-group row">
                        <div class="col-md-9">
                          <label for="tenkh_donhang">Tên khách hàng</label>
                          <input type="text" class="form-control  {{ $errors->has('customer_id') ? ' is-invalid' : '' }}" id="tenkh_donhang" placeholder="Nhập tên khách hàng" readonly="true"  value="">
                          @if ($errors->has('customer_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('customer_id') }}</strong>
                            </span>
                          @endif
                        </div>
                        <div class="col-md-3">
                          <label for="chonkh" style="visibility: hidden;">Chọn khách</label>
                          <button type="button" class="btn btn-primary form-control" id="btn-chon-khach" data-toggle="modal" data-target="#modal_customer">Chọn khách</button>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="ngayht_donhang">Địa chỉ</label>
                        <input type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" id="address_donhang" name="address" value="{{ old('address') }}">
                          @if ($errors->has('address'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('address') }}</strong>
                              </span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="ngayht_donhang">Số điện thoại</label>
                        <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone_donhang" name="phone" value="{{ old('phone') }}">
                          @if ($errors->has('phone'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('phone') }}</strong>
                              </span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="ngayht_donhang">Ngày hẹn (dự kiến)</label>
                        <input type="date" class="form-control {{ $errors->has('ngaytra') ? ' is-invalid' : '' }}" id="ngayht_donhang" name="ngaytra" value="{{ old('ngaytra') }}">
                          @if ($errors->has('ngaytra'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('ngaytra') }}</strong>
                              </span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="ngayht_donhang">Ngày trả (dự kiến)</label>
                        <input type="date" class="form-control {{ $errors->has('ngayht') ? ' is-invalid' : '' }}" id="ngaytra_donhang" name="ngayht" value="{{ old('ngayht') }}" readonly="true">
                          @if ($errors->has('ngayht'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('ngayht') }}</strong>
                              </span>
                          @endif
                      </div>
                      <div class="form-group">
                        <label for="inputEmail4">Trạng thái</label>
                        <select class="custom-select" id="trangthai_donhang" name="trangthai" >
                          <option value="1">Hoạt động</option>
                          <option value="2">Dừng</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-1">
                      <label for="thue_donhang">Thuế( % )</label>
                      <input type="number" class="form-control {{ $errors->has('thue') ? ' is-invalid' : '' }}" id="thue_donhang" value="10" name="thue">
                        @if ($errors->has('thue'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('thue') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                      <label for="thanhtien_donhang">Tổng tiền</label>
                      <input type="text" class="form-control {{ $errors->has('thanhtien') ? ' is-invalid' : '' }}" id="thanhtien_donhang" value="0" readonly="true">
                      <input type="hidden"  id="thanhtien_donhang_hidden" value="0" name="thanhtien">
                      @if ($errors->has('thanhtien'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('thanhtien') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="form-noidung">Nội dung</label>
                        <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin...">{{ old('mota') }}</textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Thêm mới') }}
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlydonhang.index')}}'">Hủy bỏ</button>
                    </div>
                  </div>
            </div>
        </form>
    </div>



<!-- Modal chọn khách hàng -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Danh sách khách hàng</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i aria-hidden="true">&times;</i>
            </button>
          </div>
          <div class="modal-body">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                    <input class="form-control mr-sm-2 my-sm-0" id="search-khachhang" type="search" placeholder="Tìm kiếm khách hàng" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="btn-search-kh">Tìm kiếm</button>
                    <button class="btn btn-primary my-2" type="button" id="btn-select-kh" data-dismiss="modal" style="margin-left: 10px;">Chọn khách hàng</button>
                </form>
            </nav>
            <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col" style="width: 2%">Chọn</th>
                  <th scope="col" style="width: 17%">Mail</th>
                  <th scope="col" style="width: 15%">Tên</th>
                  <th scope="col" style="width: 8%">Giới tính</th>
                  <th scope="col" style="width: 8%">Ngày sinh</th>
                  <th scope="col" style="width: 25%">Địa chỉ</th>
                  <th scope="col" style="width: 8%">SĐT</th>
                </tr>
              </thead>
              <tbody class="tbody-search-kh">
                @foreach ($customers as $cs)
                    <tr class="dong">
                      <th scope="row"><input type="radio" data-name="{{ $cs->name }}" data-id="{{ $cs->id }}" name="radio-kh"></th>
                      <td>{{ $cs->mail_address }}</td>
                      <td>{{ $cs->name }}</td>
                      <td align="center">{{ Helper::GioiTinh($cs->gioitinh)}}</td>
                      <td align="center">{{ Helper::formatDate($cs->ngaysinh)}}</td>
                      <td>{{ $cs->address }}</td>
                      <td align="center">{{ $cs->phone }}</td>
                    </tr>
                @endforeach
              </tbody>
            </table>
        </form>
        </div>
      </div>
    </div>
</div>

@endsection


