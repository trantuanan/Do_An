@extends('BackEnd')

@section('title', 'Thông tin hóa đơn')

@section('content-backend')
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}">Thông tin hóa đơn</p>
        @foreach($invoices as $iv)
        <form method="POST" action="{{ route('quanlyhoadon.update',$iv->id)}}" >
            @csrf
            {{ method_field('PUT') }}
            <input type="hidden" name="id" id="id_donhang" value="{{ $iv->id }}">
            <div class=" form_donhang">
                  <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="tenkh_donhang">Đơn hàng</label>
                      <input type="text" class="form-control {{ $errors->has('bill_id') ? ' is-invalid' : '' }}" id="dh_hoadon" placeholder="Chọn đơn hàng" readonly="true" value="{{ $iv->madh }}">
                      @if ($errors->has('bill_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('bill_id') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group col-md-3">
                      <label for="ngayht_donhang">Khách hàng</label>
                      <input type="text" class="form-control {{ $errors->has('customers_id') ? ' is-invalid' : '' }}" id="tenkh_hoadon" placeholder="Khách đặt hàng" value="{{ $iv->tenkh }}" readonly="true">
                      <input type="hidden" id="kh_hidden_hoadon">
                        @if ($errors->has('customers_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('customers_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                      <label for="ngayht_donhang">Người tạo</label>
                      <input type="text" class="form-control {{ $errors->has('users_id') ? ' is-invalid' : '' }}" id="ngayht_donhang"  value="{{ $iv->ngtao }}"  readonly="true">
                        @if ($errors->has('users_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('users_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Loại thanh toán</label>
                      <select class="custom-select" id="trangthai_donhang" name="loaitt">
                        <option value="1" >Tiền mặt</option>
                        <option value="2" >Chuyển khoản</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-1">
                      <label for="thue_donhang">Thuế( % )</label>
                      <input type="number" class="form-control {{ $errors->has('thue') ? ' is-invalid' : '' }}" id="thue_donhang" value="{{ $iv->thue }}" readonly="true" name="thue">
                        @if ($errors->has('thue'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('thue') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                      <label for="thanhtien_donhang">Thành tiền</label>
                      <div class="input-group">
                          <input type="hidden" id="thanhtien_hoadon_hidden" value="{{ $iv->thanhtien }}" >
                          <input type="text" readonly="true" class="form-control" placeholder="Tổng tiền" aria-describedby="inputGroupPrepend" value="{{ Helper::Tien($iv->thanhtien) }}">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">VNĐ</span>
                          </div>
                      </div>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="giamtru_donhang">Thanh toán</label>
                        <div class="input-group">
                          <input type="number" class="form-control" id="thanhtoan_hoadon_edit" name="thanhtoan" placeholder="Tiền thanh toán" aria-describedby="inputGroupPrepend" value="{{ $iv->thanhtoan }}">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">VNĐ</span>
                          </div>
                        </div>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                      <label for="giamtru_donhang">Giảm trừ</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="giamtru_hoadon_edit" name="giamtru" placeholder="Tiền thanh toán" aria-describedby="inputGroupPrepend" value="{{ $iv->giamtru }}">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="inputGroupPrepend">VNĐ</span>
                        </div>
                      </div>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                      <label for="thanhtien_donhang">Còn nợ</label>
                      <div class="input-group">
                          <input type="text" readonly="true" class="form-control" id="conno_hoadon"  placeholder="Tiền còn nợ" aria-describedby="inputGroupPrepend" value="0">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">VNĐ</span>
                          </div>
                      </div>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="giamtru_donhang">Trạng thái</label>
                      <div class="form-control" readonly="true" id="trangthai_hoadon" align="center">{!!Helper::trangthaiHD($iv->trangthai)!!}</div>
                      <input type="hidden" name="trangthai" id="trangthai_hoadon_hidden" value="{{ $iv->trangthai }}">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-row">
                    <table class="table table-bordered table-bill-details" style="margin-bottom: 30px;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 3%">STT</th>
                                <th scope="col" style="width: 30%" >Tên sản phẩm</th>
                                <th scope="col" style="width: 10%" >Đơn giá</th>
                                <th scope="col" style="width: 10%" >Số lượng</th>
                                <th scope="col" style="width: 10%" >Tổng</th>

                            </tr>
                        </thead>
                        <tbody>
                           @foreach($invoiceDetails as $bd)
                            <tr>
                                <th scope="row" style="vertical-align:middle; text-align: center;">{{ $loop->iteration }}</th>
                                <td>                                 
                                  <div class="row">
                                    <div class="col-md-2" id="cart_item_img" style="padding-right: 0px !important; max-height: 60px;">
                                      <img  title="{{$bd->name}}" src="{{ asset('upload/imageProducts') }}/{{ $bd->anh }}">
                                    </div>
                                    <div class="col-md-10 tt_cart">
                                      <h5  title="{{$bd->name}}" >{{ substr(strip_tags($bd->name), 0, 50)}}</h5>
                                      <p><span style="font-weight: bold;">Kích thước:</span> {{ $bd->size }}</p>
                                      <p><span style="font-weight: bold;">Vật liệu:</span> {{ $bd->vatlieu }}</p>
                                    </div>
                                  </div>
                                </td>
                                <td style="vertical-align:middle; text-align: center;">
                                  <input type="hidden" id="price" value="{{ $bd->dongia }}" >
                                  <span style="font-weight: bold;">{{ Helper::Tien($bd->dongia) }}</span> VNĐ
                                </td>
                                <td style="vertical-align:middle; text-align: center;">
                                  <input type="number" class="form-control soluong_billdetails" data-id="{{ $bd->id }}" data-name="" value="{{ $bd->soluong }}" readonly="true">
                                </td>
                                <td style="vertical-align:middle; text-align: center;"><span style="font-weight: bold;" class="amount">0</span> VNĐ</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="3" style="text-align: right;"><span style="font-weight: bold;">Tổng tiền:</span></td>
                            <td colspan="2" >
                              <span style="font-weight: bold; color: red; font-size: 16px;" class ="subtotal-donhang">0</span> VNĐ
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3" style="text-align: right;"><span style="font-weight: bold;">Thuế (10%):</span></td>
                            <td colspan="2" >
                              <span style="font-weight: bold; color: red; font-size: 16px;" id="tax-donhang">0</span>  VNĐ
                            </td>
                          </tr>
                        </tfoot>
                    </table>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="form-noidung">Nội dung</label>
                        <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin...">{{ $iv->mota }}</textarea>
                    </div>

                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Lưu thay đổi') }}
                        </button>
                        <button type="button" class="btn btn-success" id="print-invoice" data-id="{{$iv->id}}">
                            {{ __('In hóa đơn') }}
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlyhoadon.index')}}'">Hủy bỏ</button>
                    </div>
                  </div>
            </div>
        </form>
        <form action="{{ route('quanlyhoadon.edit',$iv->id) }}" method="GET" id="form-print-invoice">
        </form>
        @endforeach
    </div>


@endsection


