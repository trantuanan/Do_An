@extends('BackEnd')

@section('title', 'Tạo phiếu xuất kho')

@section('content-backend')
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Tạo phiếu xuất kho</p>
        
            <div class="">
                   
                  <form method="POST" action="{{ route('quanlyphieuxuat.store') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="form-row" style=" margin-bottom: 10px;">
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
                          <label  class="col-md-2 col-form-label text-md-right">{{ __('Kho hàng') }}</label>

                          <div class="col-md-8">
                              <select class="custom-select {{ $errors->has('khohang_id') ? ' is-invalid' : '' }}" name="khohang_id" id="select_khohang_xuatkho">
                                <option value=""> -- Chọn Kho hàng -- </option>
                                @foreach($khohang as $kh)
                                <option value="{{$kh->id}}" >{{$kh->name}}</option>
                                @endforeach
                                
                              </select>

                              @if ($errors->has('khohang_id'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('khohang_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      
                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Người nhận') }}</label>

                          <div class="col-md-8">
                              <input  type="text" class="form-control {{ $errors->has('nguoinhan') ? ' is-invalid' : '' }}" name="nguoinhan" placeholder="Người nhận hàng" >
                              @if ($errors->has('nguoinhan'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('nguoinhan') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="mail_address" class="col-md-4 col-form-label text-md-right">{{ __('Ngày xuất') }}</label>

                        <div class="col-md-7">
                            <input type="date" class="form-control {{ $errors->has('ngayxuat') ? ' is-invalid' : '' }}" name="ngayxuat" value="{{ old('ngayxuat') }}">
                            @if ($errors->has('ngayxuat'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('ngayxuat') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mail_address" class="col-md-4 col-form-label text-md-right">{{ __('Tổng tiền') }}</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('thanhtien') ? ' is-invalid' : '' }}" value="0" readonly="true" id="tongtien_phieunhap">
                            <input type="hidden" name="thanhtien" id="thanhtien_hidden_phieunhap">
                            @if ($errors->has('thanhtien'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('thanhtien') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
              </div>
              <div class="form-row" style="margin-top: 20px;">
                    <div class="row col-md-12">
                          <div class="col-md-1">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_supplies" >Vật tư</button>
                          </div>

                          <div class="col-md-9">
                              <table class="table table-bordered table-nhapxuat-details" style="margin-bottom: 30px;">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" style="width: 3%">STT</th>
                                        <th scope="col" style="width: 20%" >Tên vật tư</th>
                                        <th scope="col" style="width: 15%" >Đơn giá</th>
                                        <th scope="col" style="width: 8%" >Số lượng</th>
                                        <th scope="col" style="width: 15%" >Tổng</th>
                                        <th  scope="col" style="width: 5%; text-align: center;" ><a>Xóa</a></th>
                                    </tr>
                                </thead>
                                <tbody class="tbody_xuatkho">
                                  @if($vattu != null)
                                  @foreach($vattu as $key => $vt)
                                    <tr>
                                        <th scope="row" style="vertical-align:middle; text-align: center;">{{ $loop->iteration }}</th>
                                        <td style="vertical-align:middle; text-align: center;">
                                          <span style="font-weight: bold;">{{ $vt['name'] }}</span>
                                        </td>
                                        <td style="vertical-align:middle; text-align: center;">
                                          <input type="hidden" class="dongia_nhapxuat" value="{{$vt['dongia']}}">
                                          <span style="font-weight: bold;" >{{ Helper::Tien($vt['dongia']) }}</span> VNĐ
                                        </td>
                                        <td style="vertical-align:middle; text-align: center;">
                                          <input type="number" name="soluong_session" class="form-control soluong_phieuxuat" id="" data-id="{{$key}}" value="{{ $vt['soluong'] }}">
                                        </td>
                                        <td style="vertical-align:middle; text-align: center;">
                                          <span style="font-weight: bold;" class="amount_nhapxuat">0</span> VNĐ
                                        </td>
                                        <td align="center"  style="vertical-align:middle;">
                                          <button type="button" data-id="{{ $key }}" class="btn btn-primary btn_delete_session_xuatkho"><span class="icon ion-ios-trash""></span></button>
                                        </td>
                                    </tr>
                                  @endforeach
                                  @endif
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td colspan="4" style="text-align: right;"><span style="font-weight: bold;">Tổng tiền:</span></td>
                                    <td colspan="3" >
                                      <span style="font-weight: bold; color: red; font-size: 16px;" id="subtotal-donhang">0</span> VNĐ
                                    </td>
                                  </tr>
                                </tfoot>
                            </table>
                          </div>
                      </div>
                  </div>
              <div class="form-row">
                <div class="row col-md-12">
                      <label for="mail_address" class="col-md-1 col-form-label text-md-right">{{ __('Ghi chú') }}</label>

                      <div class="col-md-9">
                          <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin..." ></textarea>
                      </div>
                  </div>
              </div>
             
              <div class="form-group row mb-0" style="margin-top: 20px;">
                <div class="col-md-6 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Thêm mới') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlyphieuxuat.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        </form>
    </div>


  <!-- Modal chọn vật tư -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_supplies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Danh sách vật tư </h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i aria-hidden="true">&times;</i>
            </button>
          </div>
          <div class="modal-body">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                    <button class="btn btn-primary my-2" type="button" id="btn-select-vt-pn" data-dismiss="modal" style="margin-left: 10px;">Chọn vật tư</button>
                </form>
            </nav>
            <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col" style="width: 2%">Chọn</th>
                  <th scope="col" style="width: 10%">Tên vật tư</th>
                  <th scope="col" style="width: 8%">Màu sắc</th>
                  <th scope="col" style="width: 8%">Còn lại</th>
                  <th scope="col" style="width: 15%">Mô tả</th>
                  <th scope="col" style="width: 12%">Thương hiệu</th>
                  <th scope="col" style="width: 12%">Nhà cung cấp</th>
                  <th scope="col" style="width: 10%">loại vật tư</th>
                  <th scope="col" style="width: 10%">Đơn giá</th>
                </tr>
              </thead>
              <tbody class="table-sanpham-vt">
                    <td align="center" colspan="8">Hãy chọn kho hàng</td>
              </tbody>
            </table>
        </form>
        </div>
      </div>
    </div>
</div>
@endsection


