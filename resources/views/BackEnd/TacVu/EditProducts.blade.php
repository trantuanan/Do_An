@extends('BackEnd')

@section('title', 'Sửa sản phẩm đặt')

@section('content-backend')
<script type="text/javascript">
    tinymce.init({
        selector: '#form-noidung'
    })
</script>
    <div id="register">
        
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Add File_30px.png') }}"> Sửa sản phẩm đặt hàng</p>
        <form method="POST" action="{{ route('quanlysanpham.update') }}" enctype="multipart/form-data">
            @csrf
            @foreach($products as $pd)
            <input type="hidden" name="id" value="{{ $pd->id }}">
            <input type="hidden" name="anh" value="{{ $pd->anh }}">
            <div class="row">
                <div class="form_post col-md-6">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Tên SP') }}</label>

                        <div class="col-md-10">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $pd->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="size" class="col-md-2 col-form-label text-md-right">{{ __('Size') }}</label>

                        <div class="col-md-10">
                            <input id="size" type="text" class="form-control {{ $errors->has('size') ? ' is-invalid' : '' }}" name="size" value="{{ $pd->size }}" >

                            @if ($errors->has('size'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('size') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="baohanh" class="col-md-2 col-form-label text-md-right">{{ __('Bảo hành') }}</label>

                        <div class="col-md-10 row">
                            <div class="col-md-8">
                                <input id="baohanh" type="number" class="form-control {{ $errors->has('baohanh') ? ' is-invalid' : '' }}" name="baohanh" value="{{ $pd->baohanh }}" >
                                @if ($errors->has('baohanh'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('baohanh') }}</strong>
                                    </span>
                                @endif
                            </div >
                            <div class="col-md-4" style="padding-left: 0px;">
                                <label for="baohanh" class=" col-form-label"><strong>{{ __('Tháng') }}</strong></label>
                            </div>

                            
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="category_id" class="col-md-2 col-form-label text-md-right">{{ __('Loại SP') }}</label>

                        <div class="col-md-10">
                            <select class="custom-select {{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id">
                              <option value="">--- Chọn loại tin tức ---</option>
                              @foreach($categories as $cg)
                                <option value="{{ $cg->id }}"  @if($cg->id == $pd->category_id) {{ 'selected'}} @endif>{{ $cg->name }}</option>
                              @endforeach
                            </select>

                            @if ($errors->has('category_id'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('category_id') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="mota" class="col-md-2 col-form-label text-md-right">{{ __('Hiển thị') }}</label>

                        <div class="col-md-10">
                            <select class="custom-select {{ $errors->has('trangthai') ? ' is-invalid' : '' }}" name="trangthai">
                              <option value="1" @if($pd->trangthai == 1) {{ 'selected'}} @endif>Hiển thị</option>
                              <option value="2" @if($pd->trangthai == 2) {{ 'selected'}} @endif>Ẩn</option>
                            </select>

                            @if ($errors->has('trangthai'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('trangthai') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="dongia" class="col-md-2 col-form-label text-md-right">{{ __('Đơn giá') }}</label>

                        <div class="col-md-10 row">
                            <div class="col-md-8">
                                <input id="dongia" type="number" class="form-control {{ $errors->has('dongia') ? ' is-invalid' : '' }}" name="dongia" value="{{ $pd->dongia }}" >
                                @if ($errors->has('dongia'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('dongia') }}</strong>
                                    </span>
                                @endif
                            </div >
                            <div class="col-md-4" style="padding-left: 0px;">
                                <label for="dongia" class=" col-form-label"><strong>{{ __('VND') }}</strong></label>
                            </div>

                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="vatlieu" class="col-md-2 col-form-label text-md-right">{{ __('Vật liệu') }}</label>

                        <div class="col-md-7">
                            <input id="vatlieu" type="text" class="form-control {{ $errors->has('vatlieu') ? ' is-invalid' : '' }}" name="vatlieu" value="{{ $pd->vatlieu }}" >

                            @if ($errors->has('vatlieu'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('vatlieu') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="col-md-3">
                            <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#modal_supplies"> Chọn vật liệu </button>
                        </div>
                    </div>

                    <div class="form-group row">
                        <table class="table table-bordered table-bill-details offset-md-1" id="table_material_product" style="margin-bottom: 30px;">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col" >STT</th>
                                    <th scope="col" style="width: 50%">Tên vật liệu</th>
                                    <th scope="col" >Số lượng</th>
                                    <th scope="col" style="width: 5%; text-align: center;" ><a>Xóa</a></th>
                                </tr>
                            </thead>
                            <tbody >
                             @foreach($materials as $ma)
                                 <tr>
                                    <th scope="row" style="vertical-align:middle; text-align: center;">{{ $loop->iteration }}</th>
                                    <td style="vertical-align:middle; text-align: center;">
                                        <input type="text" class="form-control"  id="tenvl_table" value="{{ $ma->tenvl }}" readonly="true">
                                    </td>
                                    <td style="vertical-align:middle; text-align: center;">
                                      <input type="number" class="form-control soluong_vatlieu" min="1" data-id="{{ $ma->id }}" value="{{ $ma->soluong }}">
                                    </td>
                                    <td align="center"  style="vertical-align:middle;">
                                      <button type="button" class="btn btn-primary" data-id="{{ $ma->id}}" id="btn_xoa_vatlieu"><span class="icon ion-ios-trash""></span></button>
                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="form-group row">
                        <label for="anh" class="col-md-2 col-form-label text-md-right">{{ __('Ảnh bìa') }}</label>

                        <div class="col-md-10">
                            <div class="custom-file">
                              <input type="file" id="select_image_post" accept="image/*" class="custom-file-input {{ $errors->has('anh_1') ? ' is-invalid' : '' }}" name="anh_1">
                              <label class="custom-file-label" id="name_image_post" for="anh">Choose file</label>
                              @if ($errors->has('anh'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('anh') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" col-md-6">
                    <div class="anhproduct_show">
                        <img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/imageProducts') }}/{{ $pd->anh}}">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="form-noidung" class="col-md-1 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                <div class="col-md-9">
                    <textarea style="height: 250px;" class="form-control{{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" id="form-noidung">{{ $pd->mota }}</textarea>

                    @if ($errors->has('mota'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('mota') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Lưu thay đổi') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlysanpham.index')}}'">Hủy bỏ</button>
                </div>
            </div>
            
        </form>
    </div>

    <form method="POST" action="{{ route('vatlieu.store') }}" id="form-add-vatlieu">
        @csrf
        <input type="hidden" name="product_id" value="{{ $pd->id }}">
        <input type="hidden" name="supplie_id" id="id_vatlieu_sanpham">
        <input type="hidden" name="soluong" value="1">
    </form>

    <form method="POST" action="{{ route('vatlieu.editsl') }}" id="form-soluong-vatlieu">
        @csrf
        <input type="hidden" name="product_id" value="{{ $pd->id }}">
        <input type="hidden" name="id" id="id_vattu_sanpham">
        <input type="hidden" name="soluong" id="sl_vatlieu_sanpham">
    </form>

    <form method="POST" action="{{ route('vatlieu.destroy') }}" id="form-delete-vatlieu">
        @csrf
        <input type="hidden" name="product_id" value="{{ $pd->id }}">
        <input type="hidden" name="id" id="id_vattu_xoa_sanpham">
    </form>

@endforeach
   <!-- Modal chọn vật tư -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_supplies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <button class="btn btn-primary my-2" type="button" id="btn-select-vt" data-dismiss="modal" style="margin-left: 10px;">Chọn đơn hàng</button>
                </form>
            </nav>
            <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col" style="width: 2%">Chọn</th>
                  <th scope="col" style="width: 10%">Tên vật tư</th>
                  <th scope="col" style="width: 8%">Màu sắc</th>
                  <th scope="col" style="width: 15%">Mô tả</th>
                  <th scope="col" style="width: 12%">Thương hiệu</th>
                  <th scope="col" style="width: 12%">Nhà cung cấp</th>
                  <th scope="col" style="width: 10%">loại vật tư</th>
                  <th scope="col" style="width: 10%">Đơn giá</th>
                </tr>
              </thead>
              <tbody class="table-sanpham-vt">
                    @foreach ($supplies as $sp)
                    <tr>
                      <th align="center" style="vertical-align: middle;" scope="row"><input type="radio" data-id="{{ $sp->id }}" name="radio-1"></th>
                      <td align="center" style="vertical-align: middle;">{{ $sp->name }}</td>
                      <td align="center" style="vertical-align: middle;">{{ $sp->mausac }}</td>
                      <td>{{ substr(strip_tags($sp->mota), 0, 50)}}{{ strlen(strip_tags($sp->mota)) > 50? '...': ''}}</td>
                      <td align="center" style="vertical-align: middle;">{{ $sp->thuonghieu }}</td>
                      <td align="center" style="vertical-align: middle;">{{ $sp->ncc }}</td>
                      <td align="center" style="vertical-align: middle;">{{ Helper::loaivattu($sp->loaivt) }}</td>
                      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($sp->dongia)}} VNĐ</td>
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


