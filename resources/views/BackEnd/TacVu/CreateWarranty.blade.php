@extends('BackEnd')

@section('title', 'Thêm bảo hành mới')

@section('content-backend')
<script type="text/javascript">
    tinymce.init({
        selector: '#form-noidung'
    })
</script>
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Businessman_30px.png') }}"> Tạo bảo hành</p>
        <form method="POST" action="{{ route('quanlybaohanh.store') }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Hóa đơn') }}</label>

                <div class="col-md-2">
                    <input id="bill" type="text" class="form-control{{ $errors->has('invoices_id') ? ' is-invalid' : '' }}" placeholder="Chọn hóa đơn" value="{{ old('invoices_id') }}" readonly="true">
                    <input id="bill_id_hidden" type="hidden" class="form-control" name="invoices_id" value="">

                    @if ($errors->has('invoices_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('invoices_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-primary form-control" id="btn-chon-khach" data-toggle="modal" data-target="#modal_bill">Chọn hóa đơn</button>
                </div>
            </div>

            <div class="form-group row">
                <label for="mail_address" class="col-md-2 col-form-label text-md-right">{{ __('Người tạo') }}</label>

                <div class="col-md-4">
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
                <label for="ngaybh" class="col-md-2 col-form-label text-md-right">{{ __('Ngày bảo hành') }}</label>

                <div class="col-md-4">
                    <input id="ngaybh" type="date" class="form-control{{ $errors->has('ngaybh') ? ' is-invalid' : '' }}" name="ngaybh" value="{{ old('ngaybh') }}" >

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
                    <input id="ngaytra" type="date" class="form-control{{ $errors->has('ngaytra') ? ' is-invalid' : '' }}" name="ngaytra" value="{{ old('ngaytra') }}" >

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
                    <input id="address" type="number" class="form-control{{ $errors->has('phuchi') ? ' is-invalid' : '' }}" name="phuchi" value="0" >

                    @if ($errors->has('phuchi'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('phuchi') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="gioitinh" class="col-md-2 col-form-label text-md-right">{{ __('Tình trạng') }}</label>

                <div class="col-md-4">
                    <select class="form-control" name="trangthai">
                        <option value="1" checked>Chưa thanh toán</option>
                        <option value="2">Đã thanh toán</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="form-noidung" class="col-md-2 col-form-label text-md-right">{{ __('Lý do') }}</label>

                <div class="col-md-8">
                    <textarea style="height: 250px;" class="form-control{{ $errors->has('lydo') ? ' is-invalid' : '' }}" name="lydo" id="form-noidung"></textarea>

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
                        {{ __('Thêm mới') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlybaohanh.index')}}'">Hủy bỏ</button>
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
                    <button class="btn btn-primary my-2" type="button" id="btn-select-bh" data-dismiss="modal" style="margin-left: 10px;">Chọn đơn hàng</button>
                </form>
            </nav>
            <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col" style="width: 5%">Chọn</th>
                  <th scope="col" style="width: 5%">Mã HĐ</th>
                  <th scope="col" style="width: 5%">Mã ĐH</th>
                  <th scope="col" style="width: 10%">Khách hàng</th>
                  <th scope="col" style="width: 10%">Người tạo</th>
                  <th scope="col" style="width: 15%">Mô tả</th>
                  <th scope="col" style="width: 10%">Thành tiền</th>
                  <th scope="col" style="width: 10%">Thanh toán</th>
                  <th scope="col" style="width: 10%">Giảm trừ</th>      
                  <th scope="col" style="width: 5%">Thuế</th>
                </tr>
              </thead>
              <tbody class="table-donhang-baohanh">
                    @foreach ($invoices as $key => $iv)
                    <tr class="dong">
                      <th scope="row" align="center" style="vertical-align: middle;"><input type="radio" data-ma="{{ $iv->mahd }}" data-id="{{ $iv->id }}" name="radio-bh"></th>
                      <td align="center" style="vertical-align: middle;">{{ $iv->mahd }}</td>
                      <td align="center" style="vertical-align: middle;">{{ $iv->madh }}</td>
                      <td align="center" style="vertical-align: middle;">{{ $iv->tenkh }}</td>
                      <td align="center" style="vertical-align: middle;">{{ $iv->ngtao }}</td>
                      <td>{!! substr(strip_tags($iv->mota), 0, 50)!!}{{ strlen(strip_tags($iv->mota)) > 50? '...': ''}}</td>
                      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($iv->thanhtien) }} VNĐ</td>
                      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($iv->thanhtoan) }} VNĐ</td>
                      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($iv->giamtru) }} VNĐ</td>
                      <td align="center" style="vertical-align: middle;">{{ $iv->thue }}%</td>
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


