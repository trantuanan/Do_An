@extends('Customer')

@section('content-1')
@foreach( $bills as $bl)
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Sửa thông tin đơn hàng</p>
        
        <form method="POST" action="{{ route('customer.update',$bl->id) }}" >
            @csrf
            {{ method_field('PUT') }}
            <input type="hidden" name="id" id="id_donhang" value="{{ $bl->id }}">
            <input type="hidden" name="customer_id" id="idkh_donhang" value="{{ $bl->customer_id }}">
            <div class=" form_donhang">
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="tenkh_donhang">Tên khách hàng</label>
                      <input type="text" class="form-control {{ $errors->has('customer_id') ? ' is-invalid' : '' }}" id="tenkh_donhang" placeholder="Nhập tên khách hàng" readonly="true" value="{{$bl->tenkh}}">
                      @if ($errors->has('customer_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('customer_id') }}</strong>
                        </span>
                      @endif
                    </div>
                    <div class="form-group col-md-2">
                      <label for="ngayht_donhang">Ngày hẹn (dự kiến)</label>
                      <input type="date" class="form-control {{ $errors->has('ngayht') ? ' is-invalid' : '' }}" id="ngayht_donhang"  value="{{$bl->ngayht}}" name="ngayht" {{($bl->tiendo > 1)? 'readonly="true"' : ''}}>
                        @if ($errors->has('ngayht'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('ngayht') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                      <label for="ngayht_donhang">Ngày trả (dự kiến)</label>
                      <input type="date" class="form-control {{ $errors->has('ngayht') ? ' is-invalid' : '' }}"  value="{{$bl->ngaytra}}" name="ngaytra" readonly="true" >
                        @if ($errors->has('ngayht'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('ngayht') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputEmail4">Trạng thái</label>
                      <div class="form-control" readonly="true" align="center">{!!Helper::trangthaiDH($bl->trangthai)!!}</div>
                      <input type="hidden" name="trangthai" value="{{ $bl->trangthai }}">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="tenkh_donhang">Công đoạn</label>
                      <div class="form-control" readonly="true" align="center">{!!Helper::tiendo($bl->tiendo)!!}</div>
                      <input type="hidden" name="tiendo" value="{{ $bl->tiendo }}">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-1">
                      <label for="thue_donhang">Thuế( % )</label>
                      <input type="number" class="form-control {{ $errors->has('thue') ? ' is-invalid' : '' }}" id="thue_donhang" value="{{ $bl->thue}}" name="thue" readonly="true">
                        @if ($errors->has('thue'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('thue') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-3">
                      <label for="thanhtien_donhang">Thành tiền</label>
                      <input type="text" class="form-control" id="thanhtien_donhang"  readonly="true">
                      <input type="hidden"  id="thanhtien_donhang_hidden" value="{{ $bl->thanhtien}}" name="thanhtien">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="giamtru_donhang">Số điện thoại</label>
                      <input type="text" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" id="phone_donhang" value="{{$bl->phone}}" name="phone" {{($bl->tiendo > 1)? 'readonly="true"' : ''}}>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                      <label for="giamtru_donhang">Địa chỉ</label>
                      <input type="text" class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" id="giamtru_donhang" value="{{$bl->address}}" name="address" {{($bl->tiendo > 1)? 'readonly="true"' : ''}}>
                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>
                  </div>
                  <div class="form-row">
                    <button type="button" class="btn btn-primary" id="btn-chon-khach" data-toggle="modal" data-target="#modal_product" style="margin-bottom: 10px;" {{ ($bl->tiendo > 1) ? 'disabled' : '' }}>Thêm sản phẩm</button>
                    <table class="table table-bordered table-bill-details" style="margin-bottom: 30px;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 3%">STT</th>
                                <th scope="col" style="width: 30%" >Tên sản phẩm</th>
                                <th scope="col" style="width: 10%" >Đơn giá</th>
                                <th scope="col" style="width: 10%" >Số lượng</th>
                                <th scope="col" style="width: 10%" >Tổng</th>
                                <th scope="col" style="width: 10%" >Thiết kế</th>
                                <th  scope="col" style="width: 5%; text-align: center;" ><a>Xóa</a></th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($billsDetails as $bd)
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
                                  <input type="hidden" id="price" value="{{ $bd->dongia }}">
                                  <span style="font-weight: bold;">{{ Helper::Tien($bd->dongia) }}</span> VNĐ
                                </td>
                                <td style="vertical-align:middle; text-align: center;">
                                  <input type="number" class="form-control soluong_billdetails_customer" data-id="{{ $bd->id }}" data-name="{{ $bl->id}}" value="{{ $bd->soluong }}" {{($bl->tiendo > 1)? 'readonly="true"' : ''}}>
                                </td>
                                <td style="vertical-align:middle; text-align: center;"><span style="font-weight: bold;" class="amount">0</span> VNĐ</td>
                                <td align="center"  style="vertical-align:middle;">
                              
                                   <button type="button" class="btn btn-info btn-sm" id="btn_xem_file_cus" data-toggle="modal" data-target="#modal_design_upload" data-id="{{ $bd->design_id }}">Xem</button>
                                </td>
                                <td align="center"  style="vertical-align:middle;">
                                  <button type="button" class="btn btn-primary" data-id="{{ $bd->id}}" data-name="{{ $bl->id}}" id="btn_xoa_billdetails_customer" {{ ($bl->tiendo > 1) ? 'disabled' : '' }}><span class="icon ion-ios-trash""></span></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                          <tr>
                            <td colspan="4" style="text-align: right;"><span style="font-weight: bold;">Tổng tiền:</span></td>
                            <td colspan="2" >
                              <span style="font-weight: bold; color: red; font-size: 16px;" class="subtotal-donhang">0</span> VNĐ
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
                        <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin..." {{($bl->tiendo > 1)? 'readonly="true"' : ''}}>{{$bl->mota}}</textarea>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary {{ ($bl->tiendo > 1) ? 'disabled' : '' }}" >
                            {{ __('Lưu thay đổi') }}
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="goBack()" >Hủy bỏ</button>
                    </div>
                  </div>
            </div>
            @endforeach
        </form>
    </div>
    <form action="{{ route('customer.destroy') }}" method="POST" id="xoa_billdetails_customer">
      {{ csrf_field() }}
      <!-- {{ method_field('PUT') }} -->
      <input type="hidden" name="id" id='id_billdetails' value="">
      <input type="hidden" name="bill_id" id='bill_id_billdetails' value="">
    </form>

    <form action="{{ route('customer.edit') }}" method="POST" id="edit_billdetails_customer">
      {{ csrf_field() }}
      <!-- {{ method_field('PUT') }} -->
      <input type="hidden" name="id" id='id_edit_billdetails' value="">
      <input type="hidden" name="soluong" id='soluong_billdetails' value="">
      <input type="hidden" name="bill_id" id='bill_id_edit_billdetails' value="">
    </form>


<!-- Modal chọn sản phẩm -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Danh sách sản phẩm</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i aria-hidden="true">&times;</i>
            </button>
          </div>
          <div class="modal-body">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline" id="create_billdetails" method="POST" action="{{ route('customer.store') }}">
                    @csrf
                    <input class="form-control mr-sm-2" id="search-sanpham" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="btn-search-sp-customer">Tìm kiếm</button>
                    <input type="hidden" name="bill_id" id="bill_id_chonsp">
                    <input type="hidden" name="product_id" id="product_id_chonsp">
                    <input type="hidden" name="dongia" id="dongia_chonsp">
                    <input type="hidden" name="design_id" value="1">
                    <button class="btn btn-primary my-2 my-sm-0" type="button" id="btn-select-sp" data-dismiss="modal" style="margin-left: 10px;">Thêm sản phẩm</button>
                </form>
            </nav>
            <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col" style="width: 2%">Chọn</th>
                  <th scope="col" style="width: 8%">Ảnh bìa</th>
                  <th scope="col" style="width: 12%">Tên sản phẩm</th>
                  <th scope="col" style="width: 12%">Mô tả</th>
                  <th scope="col" style="width: 15%">Vật liệu</th>
                  <th scope="col" style="width: 8%">kích thước</th>
                  <th scope="col" style="width: 8%">Bảo hành</th>
                  <th scope="col" style="width: 12%">Đơn giá</th>
                  <th scope="col" style="width: 8%">Trạng thái</th>
                  <th scope="col" style="width: 8%">Loại SP</th>
                </tr>
              </thead>
              <tbody class="tbody-search-sp">
                @foreach ($products as $pd)
                <tr>
                  <th scope="row"><input type="radio" data-price="{{ $pd->dongia }}" data-id="{{ $pd->id }}" name="radio-sp"></th>
                  <td><div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/imageProducts') }}/{{ $pd->anh }}"></div></td>
                  <td>{{ substr(strip_tags($pd->name), 0, 50)}}</td>
                  <td>{{ substr(strip_tags($pd->mota), 0, 50)}}</td>
                  <td>{{ $pd->vatlieu }}</td>
                  <td align="center">{{ $pd->size }}</td>
                  <td align="center">{{ $pd->baohanh }} tháng</td>
                  <td align="center">{{ $pd->dongia }}</td>
                  <td align="center">{{ Helper::trangthaiTT($pd->trangthai)}}</td>
                  <td align="center">{{ $pd->loaisp }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </form>
        </div>
      </div>
    </div>
</div>


<!-- Modal upload thiết kế -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_design_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered  modal-lg" style="width: 800px !important" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Danh sách thiết kế</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i aria-hidden="true">&times;</i>
            </button>
          </div>
          <div class="modal-body">
            <script type="text/javascript">
                tinymce.init({
                    selector: '#form-mota',
                    readonly : 1
                })
            </script>
            <form method="POST" action="{{ route('quanlythietke.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="form_post col-md-8">
                      <div class="form-group row">
                          <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('File') }}</label>

                          <div class="col-md-10">
                              <div class="custom-file">
                                <input id="name_file_designs_xem" type="text" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" name="file" value="{{ old('vatlieu') }}"  readonly="true">
                                @if ($errors->has('file'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('file') }}</strong>
                                  </span>
                                  @endif
                              </div>
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="vatlieu" class="col-md-2 col-form-label text-md-right">{{ __('Type') }}</label>

                          <div class="col-md-10">
                              <input id="type_file_designs_xem" type="text" class="form-control {{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" value="{{ old('vatlieu') }}"  readonly="true">

                              @if ($errors->has('type'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('type') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="size" class="col-md-2 col-form-label text-md-right">{{ __('Size') }}</label>

                          <div class="col-md-10">
                              <input id="size_file_designs_xem" type="text" class="form-control {{ $errors->has('size') ? ' is-invalid' : '' }}" value="{{ old('size') }}" readonly="true">
                              <input id="size_file_designs_1_xem" type="hidden" class="form-control" name="size" value="{{ old('size') }}" readonly="true">
                              @if ($errors->has('size'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('size') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                  </div>

                  <div class=" col-md-3">
                      <div class="anhdesigns_show_xem">
                          <img id="AnhNV-show" src="{{ asset('/upload/imagePost') }}/default_avatar.jpg">
                      </div>
                      <div style="margin-top: 10px;">
                        <a href="" download="" id="download_file_xem">
                          <button type="button" class="btn form-control btn-primary">Tải xuống</button>
                        </a>
                      </div>
                  </div>
              </div>

              <div class="form-group row">
                <div class="form-group row col-md-8">
                  <label for="form-noidung" class="col-md-2 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                  <div class="col-md-10">
                      <textarea style="height: 150px;" class="form-control{{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" id="form-mota" ></textarea>

                      @if ($errors->has('mota'))
                          <span class="invalid-feedback">
                              <strong>{{ $errors->first('mota') }}</strong>
                          </span>
                      @endif
                  </div>
                </div>
              </div>
          </form>
          </div>

        </div>
      </div>
    </div>
</div>
@endsection