@extends('BackEnd')

@section('title', 'Thêm yêu cầu sản xuất')

@section('content-backend')

    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Tạo yêu cầu sản xuất mới</p>
        <form method="POST" action="{{ route('yeucausanxuat.store') }}" enctype="multipart/form-data">
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
                              <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                              @if ($errors->has('name'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('name') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label  class="col-md-2 col-form-label text-md-right">{{ __('Đơn hàng') }}</label>

                          <div class="col-md-5">
                              <input  type="text" class="form-control {{ $errors->has('bill_id') ? ' is-invalid' : '' }}" id="bill" value="" readonly="true">
                              <input type="hidden" name="bill_id" id="bill_id_hidden">

                              @if ($errors->has('bill_id'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('bill_id') }}</strong>
                                  </span>
                              @endif
                          </div>

                          <div class="col-md-3">
                              <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#modal_bill"> Chọn đơn </button>
                          </div>
                      </div>
                      
                  
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="mail_address" class="col-md-3 col-form-label text-md-right">{{ __('Ngày hẹn') }}</label>

                        <div class="col-md-8">
                            <input type="date" class="form-control {{ $errors->has('ngayhen') ? ' is-invalid' : '' }}" name="ngayhen" value="{{ old('ngayhen') }}">
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
                            <input type="date" class="form-control {{ $errors->has('ngaytra') ? ' is-invalid' : '' }}" name="ngaytra" value="{{ old('ngaytra') }}">
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

                      <div class="col-md-9">
                          <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin...">{{ old('mota') }}</textarea>
                      </div>
                  </div>
              </div>
              <div class="form-group row mb-0" style="margin-top: 20px;">
                <div class="col-md-6 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Thêm mới') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('yeucausanxuat.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal chọn đơn hàng -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_bill" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Danh sách đơn hàng</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i aria-hidden="true">&times;</i>
            </button>
          </div>
          <div class="modal-body">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                    <button class="btn btn-primary my-2" type="button" id="btn-select-ycsx" data-dismiss="modal" style="margin-left: 10px;">Chọn đơn hàng</button>
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
                </tr>
              </thead>
              <tbody class="table-donhang-ycsx">
                    @foreach ($bills as $key => $bl)
                    <tr class="dong">
                      <th scope="row" align="center" style="vertical-align: middle;"><input type="radio"  data-id="{{ $bl->id }}" name="radio-yc"></th>
                      <td align="center" style="vertical-align: middle;">{{ $bl->tenkh }}</td>
                      <td>{{ substr(strip_tags($bl->address), 0, 50)}}{{ strlen(strip_tags($bl->address)) > 50? '...': ''}}</td>
                      <td align="center" style="vertical-align: middle;">{{ $bl->phone }}</td>
                      <td>{{ substr(strip_tags($bl->mota), 0, 50)}}{{ strlen(strip_tags($bl->mota)) > 50? '...': ''}}</td>
                      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($bl->thanhtien) }}</td>
                      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($bl->ngayht) }}</td>
                    @endforeach
              </tbody>
            </table>
        </form>
        </div>
      </div>
    </div>
</div>

@endsection


