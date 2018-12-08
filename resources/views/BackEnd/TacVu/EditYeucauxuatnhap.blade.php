@extends('BackEnd')

@section('title', 'Thông tin phiếu yêu cầu xuất nhập')

@section('content-backend')
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Thông tin phiếu yêu cầu xuất nhập kho</p>
        @foreach($ycxns as $yc)
            <div class="">
                  <form method="POST" action="{{ route('yeucauxuatnhap.store') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="form-row" style=" margin-bottom: 10px;">
                    <div class="col-md-6">
                      <div class="form-group row">
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Tài khoản') }}</label>

                          <div class="col-md-8">
                              <input  type="text" class="form-control {{ $errors->has('users_id') ? ' is-invalid' : '' }}" value="{{ $yc->ngtao }}" readonly="true">
                              <input  type="hidden" name="users_id" value="{{ $yc->users_id }}">
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
                              <select class="custom-select {{ $errors->has('khohang_id') ? ' is-invalid' : '' }}" name="khohang_id" disabled>
                                <option value=""> -- Chọn kho hàng -- </option>
                                @foreach($khohang as $kh)
                                <option value="{{$kh->id}}" {{($kh->id == $yc->khohang_id)? 'selected': ''}} >{{$kh->name}}</option>
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
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Loại phiếu') }}</label>

                          <div class="col-md-8">
                              <select class="custom-select {{ $errors->has('loaiphieu') ? ' is-invalid' : '' }}" name="loaiphieu" disabled>
                                <option value=""> -- Chọn loại phiếu -- </option>
                                <option value="1" {{($yc->loaiphieu == 1)? 'selected': ''}} > Phiếu yêu cầu xuất </option>
                                <option value="2" {{($yc->loaiphieu == 2)? 'selected': ''}} > Phiếu yêu cầu nhập </option>
                              </select>
                              @if ($errors->has('loaiphieu'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('loaiphieu') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="mail_address" class="col-md-4 col-form-label text-md-right">{{ __('Ngày lấy') }}</label>

                        <div class="col-md-7">
                            <input type="date" class="form-control {{ $errors->has('ngaylay') ? ' is-invalid' : '' }}" name="ngaylay" value="{{$yc->ngaylay}}"  readonly="true">
                            @if ($errors->has('ngaylay'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('ngaylay') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mail_address" class="col-md-4 col-form-label text-md-right">{{ __('Tổng tiền') }}</label>

                        <div class="col-md-7">
                            <input type="text" class="form-control {{ $errors->has('thanhtien') ? ' is-invalid' : '' }}" value="{{Helper::Tien($yc->thanhtien)}} VNĐ" readonly="true" id="tongtien_phieunhap">
                            <input type="hidden" name="thanhtien" id="thanhtien_hidden_phieunhap" value="{{$yc->thanhtien}}">
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
                                  @foreach($detai as $dt)
                                    <tr>
                                        <th scope="row" style="vertical-align:middle; text-align: center;">{{ $loop->iteration }}</th>
                                        <td style="vertical-align:middle; text-align: center;">
                                          <span style="font-weight: bold;">{{ $dt->tenvt }}</span>
                                        </td>
                                        <td style="vertical-align:middle; text-align: center;">
                                          <input type="hidden" class="dongia_nhapxuat" value="{{$dt->dongia}}">
                                          <span style="font-weight: bold;" >{{ Helper::Tien($dt->dongia) }}</span> VNĐ
                                        </td>
                                        <td style="vertical-align:middle; text-align: center;">
                                          <input type="number" name="soluong_session" class="form-control soluong_yeucau" id="" data-id="{{$dt->id}}" value="{{ $dt->soluong }}" readonly="true">
                                        </td>
                                        <td style="vertical-align:middle; text-align: center;">
                                          <span style="font-weight: bold;" class="amount_nhapxuat">0</span> VNĐ
                                        </td>
                                        <td align="center"  style="vertical-align:middle;">
                                          <button type="button" data-id="{{ $dt->id }}" class="btn btn-primary btn_delete_session_yeucau" disabled><span class="icon ion-ios-trash""></span></button>
                                        </td>
                                    </tr>
                                  @endforeach
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
                          <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin..." readonly="true">{{$yc->mota}}</textarea>
                      </div>
                  </div>
              </div>
             
              <div class="form-group row mb-0" style="margin-top: 20px;">
                <div class="col-md-6 offset-md-1">
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('yeucauxuatnhap.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        </form>
    </div>
    @endforeach

@endsection


