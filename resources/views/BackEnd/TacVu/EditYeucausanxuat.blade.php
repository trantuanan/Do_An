@extends('BackEnd')

@section('title', 'Thông tin yêu cầu sản xuất')

@section('content-backend')
    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Sửa yêu cầu sản xuất</p>
        @foreach($ycsx as $yc)
        <form method="POST" action="{{ route('yeucausanxuat.update',$yc->id ) }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="">
                  <div class="form-row" style="padding-top: 10px; margin-bottom: 10px;">
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
                          <label for="mail_address" class="col-md-2 col-form-label text-md-right">Tên Y/C</label>

                          <div class="col-md-8">
                              <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $yc->name }}">
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
                              <input  type="text" class="form-control {{ $errors->has('bill_id') ? ' is-invalid' : '' }}" id="bill" value="ĐH {{ $yc->bill_id }}" readonly="true">
                              <input type="hidden" name="bill_id" value="{{ $yc->bill_id }}">

                              @if ($errors->has('bill_id'))
                                  <span class="invalid-feedback">
                                      <strong>{{ $errors->first('bill_id') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      
                  
                </div>
                <div class="col-md-4">
                    <div class="form-group row">
                        <label for="mail_address" class="col-md-3 col-form-label text-md-right">{{ __('Ngày hẹn') }}</label>

                        <div class="col-md-8">
                            <input type="date" class="form-control {{ $errors->has('ngayhen') ? ' is-invalid' : '' }}" name="ngayhen" value="{{ $yc->ngayhen }}">
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
                            <input type="date" class="form-control {{ $errors->has('ngaytra') ? ' is-invalid' : '' }}" name="ngaytra" value="{{ $yc->ngaytra }}">
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
                              <option value="1" {{ ($yc->trangthai == 1)? 'selected' : '' }}>Chờ sản xuất</option>
                              <option value="2" {{ ($yc->trangthai == 2)? 'selected' : '' }}>Đang sản xuất</option>
                              <option value="3" {{ ($yc->trangthai == 3)? 'selected' : '' }}>Hoàn Thành</option>
                            </select>
                        </div>
                    </div>
                </div>
              </div>

              <div class="form-row">
                <div class="row col-md-9 offset-md-1">
                  <button type="button" class="btn btn-primary" id="btn-chon-khach" data-toggle="modal" data-target="#modal_product" style="margin-bottom: 10px;">Thêm sản phẩm</button>
                      <table class="table table-bordered table-bill-details" style="margin-bottom: 30px;">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" style="width: 3%">STT</th>
                                <th scope="col" style="width: 30%" >Tên sản phẩm</th>
                                <th scope="col" style="width: 10%" >Số lượng</th>
                                <th scope="col" style="width: 12%" >Thiết kế</th>
                                <th  scope="col" style="width: 5%; text-align: center;" ><a>Xóa</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ycsxDetails as $yd)
                            <tr>
                              <th scope="row" style="vertical-align:middle; text-align: center;">{{ $loop->iteration }}</th>
                              <td>                                 
                                <div class="row">
                                  <div class="col-md-2" id="cart_item_img" style="padding-right: 0px !important; max-height: 50px;">
                                    <img  title="{{$yd->name}}" src="{{ asset('upload/imageProducts') }}/{{ $yd->anh }}">
                                  </div>
                                  <div class="col-md-10 tt_cart">
                                    <h5  title="{{$yd->name}}" >{{ substr(strip_tags($yd->name), 0, 50)}}</h5>
                                    <p><span style="font-weight: bold;">Kích thước:</span> {{ $yd->size }}</p>
                                    <p><span style="font-weight: bold;">Vật liệu:</span> {{ $yd->vatlieu }}</p>
                                  </div>
                                </div>
                              </td>
                              <td style="vertical-align:middle; text-align: center;">                                 
                                <input type="number" class="form-control soluong_yeucausanxuat" data-id="{{ $yd->id }}" value="{{ $yd->soluong }}">
                              </td>
                              <td align="center"  style="vertical-align:middle;">
                                <div class="row">
                                  <div class="col-md-5" id="cart_item_img" style="padding-right: 0px !important; max-height: 60px;">
                                    @if($yd->type == '.jpg' || $yd->type == '.png')
                                      <div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/fileDesigns') }}/{{ $yd->file }}{{ $yd->type }}" style="max-height: 60px;"></div>
                                    @else
                                      <div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/icon/Docs-icon.png') }}" style="max-height: 60px;"></div>
                                    @endif
                                  </div>
                                  @if(isset($yc->bill_id))
                                  <div class="col-md-7 tt_cart" style="padding-left: 5px !important; margin: auto;">
                                    <button type="button" class="btn btn-info btn-sm" id="btn_xem_file" data-toggle="modal" data-target="#modal_design_upload" data-id="{{ $yd->design_id }}">Xem</button>
                                  </div>
                                  @else
                                  <div class="col-md-7 tt_cart" style="padding-left: 5px !important;">
                                    <button type="button" class="btn btn-success btn-sm " style="margin-bottom: 5px;" id="btn_chon_file" data-toggle="modal" data-target="#modal_design" data-id="{{ $yd->id }}">Chọn</button><br>
                                    <button type="button" class="btn btn-info btn-sm" id="btn_xem_file" data-toggle="modal" data-target="#modal_design_upload" data-id="{{ $yd->design_id }}">Xem</button>
                                  </div>
                                  @endif
                                </div>
                              </td>
                              <td align="center"  style="vertical-align:middle;">
                                  <button type="button" class="btn btn-primary" data-id="{{ $yd->id}}" id="btn_xoa_yeucausanxuat"><span class="icon ion-ios-trash""></span></button>
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
              </div>

              <div class="form-row">
                <div class="row col-md-12">
                      <label for="mail_address" class="col-md-1 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                      <div class="col-md-9">
                          <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin...">{{ $yc->mota }}</textarea>
                      </div>
                  </div>
              </div>

              <div class="form-group row mb-0" style="margin-top: 20px;">
                <div class="col-md-6 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Lưu thay đổi') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('yeucausanxuat.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        </form>
        
    </div>

<form action="{{ route('chitietycsx.update', $yc->id) }}" method="POST" id="edit_yeucausanxuat">
  {{ csrf_field() }}
  {{ method_field('PUT') }}
  <input type="hidden" name="id" id='id_yeucausanxuat' value="">
  <input type="hidden" name="soluong" id='soluong_yeucausanxuat' value="">
</form>

<form action="{{ route('chitietycsx.destroy') }}" method="POST" id="xoa_yeucausanxuat">
  {{ csrf_field() }}
  <input type="hidden" name="id" id='id_xoa_yeucausanxuat' value="">
  <input type="hidden" name="ycsx_id" value="{{ $yc->id }}">
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
                <form class="form-inline" id="create_billdetails" method="POST" action="{{ route('chitietycsx.store') }}">
                    @csrf
                    <input class="form-control mr-sm-2" id="search-sanpham" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="btn-search-sp">Tìm kiếm</button>
                    <input type="hidden" name="ycsx_id" value="{{ $yc->id }}">
                    <input type="hidden" name="product_id" id="product_id_chonsp">
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
                  <td align="center">{{ Helper::Tien($pd->dongia) }} VNĐ</td>
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


<!-- Modal chọn thiết kế -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_design" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Danh sách thiết kế</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i aria-hidden="true">&times;</i>
            </button>
          </div>
          <div class="modal-body">
            <nav class="navbar navbar-light bg-light">
              <input type="hidden" class="id_detail_bill">
                <form class="form-inline">
                    @csrf
                    <input class="form-control mr-sm-2" id="search-thietke" type="search" placeholder="Tìm kiếm thiết kế" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="btn-search-tk">Tìm kiếm</button>
                    <button class="btn btn-primary my-2 my-sm-0" type="button" id="btn-select-thietke-ycsx" data-dismiss="modal" style="margin-left: 10px;">Chọn thiết kế</button>
                </form>
            </nav>
            <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col" style="width: 2%">Chọn</th>
                  <th scope="col" style="width: 8%">Ảnh bìa</th>
                  <th scope="col" style="width: 12%">Tên file</th>
                  <th scope="col" style="width: 12%">loại file</th>
                  <th scope="col" style="width: 12%">kích thước</th>
                  <th scope="col" style="width: 15%">Mô tả</th>
                  <th scope="col" style="width: 8%">Ngày tạo</th>
                  <th scope="col" style="width: 8%">Ngày cập nhật</th>
                </tr>
              </thead>
              <tbody class="table-thietke">
                @foreach ($designs as $ds)
                <tr>
                  <th scope="row" style="vertical-align: middle;"><input type="radio" data-id="{{ $ds->id }}" data-name="{{ $ds->file }}" name="radio-tk"></th>
                  <td>
                    @if($ds->type == '.jpg' || $ds->type == '.png')
                      <div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/fileDesigns') }}/{{ $ds->file }}{{ $ds->type }}"></div>
                    @else
                      <div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/icon/Docs-icon.png') }}"></div>
                    @endif
                  </td>
                  <td align="center" style="vertical-align: middle;">{{ $ds->file }}</td>
                  <td align="center" style="vertical-align: middle;">{{ $ds->type }}</td>
                  <td align="center" style="vertical-align: middle;">{{ $ds->size }}</td>
                  <td >{{ substr(strip_tags($ds->mota), 0, 50)}}{{ strlen(strip_tags($ds->mota)) > 50? '...': ''}}</td>
                  <td align="center" style="vertical-align: middle;">{{ $ds->created_at }}</td>
                  <td align="center" style="vertical-align: middle;">{{ $ds->updated_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
        </form>
        </div>
      </div>
    </div>
</div>

@endforeach

@endsection


