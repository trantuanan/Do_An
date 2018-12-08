@extends('BackEnd')

@section('title', 'Tạo hóa đơn')

@section('content-backend')
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}">Tạo hóa đơn</p>

        <form method="POST" action="" >
            @csrf
            
            <input type="hidden" name="id" id="id_donhang" value="">
            <input type="hidden" name="customer_id" id="idkh_donhang" value="">
            <div class=" form_donhang">
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="tenkh_donhang">Hóa đơn</label>
                      <input type="text" class="form-control {{ $errors->has('bill_id') ? ' is-invalid' : '' }}" id="dh_hoadon" placeholder="Chọn đơn hàng" readonly="true" value="">
                      <input type="hidden" id="dh_hidden_hoadon" name="bill_id">
                      @if ($errors->has('bill_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('bill_id') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group col-md-1">
                      <label for="chonkh" style="visibility: hidden;">Chọn </label>
                      <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#modal_bill"> Đơn hàng </button>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="ngayht_donhang">Khách hàng</label>
                      <input type="text" class="form-control {{ $errors->has('customers_id') ? ' is-invalid' : '' }}" id="tenkh_hoadon" placeholder="Khách đặt hàng" value="" readonly="true">
                      <input type="hidden" id="kh_hidden_hoadon" name="customers_id">
                        @if ($errors->has('customers_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('customers_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                      <label for="ngayht_donhang">Người tạo</label>
                      <input type="text" class="form-control {{ $errors->has('users_id') ? ' is-invalid' : '' }}" id="ngayht_donhang"  value="{{ Auth::user()->name }}"  readonly="true">
                      <input type="hidden" value="{{ Auth::user()->id }}" name="users_id">
                        @if ($errors->has('users_id'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('users_id') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputEmail4">Loại thanh toán</label>
                      <select class="custom-select" id="trangthai_donhang" name="trangthai">
                        <option value="1" >Tiền mặt</option>
                        <option value="2" >Chuyển khoản</option>
                      </select>
                    </div>
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="thue_donhang">Thuế( % )</label>
                      <input type="number" class="form-control {{ $errors->has('thue') ? ' is-invalid' : '' }}" id="thue_donhang" value="" name="thue">
                        @if ($errors->has('thue'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('thue') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                      <label for="thanhtien_donhang">Thành tiền</label>
                      <input type="text" class="form-control" id="thanhtien_donhang"  readonly="true">
                      <input type="hidden"  id="thanhtien_donhang_hidden" value="" name="thanhtien">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="giamtru_donhang">Số điện thoại</label>
                      <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone_donhang" value="" name="phone">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                      <label for="giamtru_donhang">Địa chỉ</label>
                      <input type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" id="giamtru_donhang" value="" name="address">
                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-row">
                    <button type="button" class="btn btn-primary" id="btn-chon-khach" data-toggle="modal" data-target="#modal_product" style="margin-bottom: 10px;">Thêm sản phẩm</button>
                    <table class="table table-bordered table-bill-details" style="margin-bottom: 30px;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 3%">STT</th>
                                <th scope="col" style="width: 30%" >Tên sản phẩm</th>
                                <th scope="col" style="width: 10%" >Đơn giá</th>
                                <th scope="col" style="width: 10%" >Số lượng</th>
                                <th scope="col" style="width: 10%" >Tổng</th>
                                <th scope="col" style="width: 12%" >Thiết kế</th>
                                <th  scope="col" style="width: 5%; text-align: center;" ><a>Xóa</a></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="4" style="text-align: right;"><span style="font-weight: bold;">Tổng tiền:</span></td>
                            <td colspan="2" >
                              <span style="font-weight: bold; color: red; font-size: 16px;" id="subtotal-donhang">0</span> VNĐ
                            </td>
                          </tr>
                          <tr>
                            <td colspan="4" style="text-align: right;"><span style="font-weight: bold;">Thuế (10%):</span></td>
                            <td colspan="3" >
                              <span style="font-weight: bold; color: red; font-size: 16px;" id="tax-donhang">0</span>  VNĐ
                            </td>
                          </tr>
                        </tfoot>
                    </table>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="form-noidung">Nội dung</label>
                        <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin..."></textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Lưu thay đổi') }}
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlydonhang.index')}}'">Hủy bỏ</button>
                    </div>
                  </div>
            </div>

        </form>
    </div>
    <form action="{{ route('quanlychitietdh.destroy') }}" method="POST" id="xoa_billdetails">
      {{ csrf_field() }}
      <!-- {{ method_field('PUT') }} -->
      <input type="hidden" name="id" id='id_billdetails' value="">
      <input type="hidden" name="bill_id" id='bill_id_billdetails' value="">
    </form>

    <form action="{{ route('quanlychitietdh.edit') }}" method="POST" id="edit_billdetails">
      {{ csrf_field() }}
      <!-- {{ method_field('PUT') }} -->
      <input type="hidden" name="id" id='id_edit_billdetails' value="">
      <input type="hidden" name="soluong" id='soluong_billdetails' value="">
      <input type="hidden" name="bill_id" id='bill_id_edit_billdetails' value="">
    </form>



   <!-- Modal chọn đơn hàng -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_bill" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Danh sách đơn hàng hoàn thành</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i aria-hidden="true">&times;</i>
            </button>
          </div>
          <div class="modal-body">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                    <button class="btn btn-primary my-2" type="button" id="btn-select-hd" data-dismiss="modal" style="margin-left: 10px;">Chọn đơn hàng</button>
                </form>
            </nav>
            <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col" style="width: 2%">chọn</th>
                  <th scope="col" style="width: 10%">Khách hàng</th>
                  <th scope="col" style="width: 10%">Địa chỉ</th>
                  <th scope="col" style="width: 7%">Điện thoại</th>
                  <th scope="col" style="width: 12%">Mô tả</th>
                  <th scope="col" style="width: 8%">Tổng tiền</th>      
                  <th scope="col" style="width: 8%">Ngày hẹn</th>
                  <th scope="col" style="width: 5%">Xem</th>
                </tr>
              </thead>
              <tbody class="table-donhang-hoadon">
                    @foreach ($bills as $key => $bl)
                    <tr class="dong">
                      <th scope="row" align="center" style="vertical-align: middle;"><input type="radio" data-khach="{{ $bl->customer_id }}" data-tenkh="{{ $bl->tenkh }}" data-id="{{ $bl->id }}" name="radio-bh"></th>
                      <td align="center" style="vertical-align: middle;">{{ $bl->tenkh }}</td>
                      <td>{{ substr(strip_tags($bl->address), 0, 50)}}{{ strlen(strip_tags($bl->address)) > 50? '...': ''}}</td>
                      <td align="center" style="vertical-align: middle;">{{ $bl->phone }}</td>
                      <td>{{ substr(strip_tags($bl->mota), 0, 50)}}{{ strlen(strip_tags($bl->mota)) > 50? '...': ''}}</td>
                      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($bl->thanhtien) }}</td>
                      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($bl->ngayht) }}</td>
                      <td align="center" style="vertical-align: middle;"><a id="btn-select-donhang" data-id="{{ $bl->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
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


