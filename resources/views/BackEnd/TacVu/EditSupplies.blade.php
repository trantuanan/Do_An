@extends('BackEnd')

@section('title', 'Sửa thông tin vật tư')

@section('content-backend')

    <div id="register">
        <p class="h2" style="margin-bottom: 20px;"><img src="{{ asset('upload/icon/Businessman_30px.png') }}"> Sửa thông tin vật tư</p>
        @foreach( $supplies as $sp)
        <form method="POST" action="{{ route('quanlyvattu.update',$sp->id) }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Tên vật tư') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Tên vật tư" name="name" value="{{ $sp->name }}"  >

                    @if ($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="mausac" class="col-md-2 col-form-label text-md-right">{{ __('Màu sắc') }}</label>

                <div class="col-md-6">
                    <input id="mausac" type="text" class="form-control{{ $errors->has('mausac') ? ' is-invalid' : '' }}" placeholder="Màu sắc vật tư" name="mausac" value="{{ $sp->mausac }}" >

                    @if ($errors->has('mausac'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('mausac') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="thuonghieu" class="col-md-2 col-form-label text-md-right">{{ __('Thương hiệu') }}</label>

                <div class="col-md-6">
                    <input id="thuonghieu" type="text" class="form-control{{ $errors->has('thuonghieu') ? ' is-invalid' : '' }}" placeholder="Thương hiệu" name="thuonghieu" value="{{ $sp->thuonghieu }}" >

                    @if ($errors->has('thuonghieu'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('thuonghieu') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="dongia" class="col-md-2 col-form-label text-md-right">{{ __('Đơn giá') }}</label>

                <div class="col-md-6">
                    <div class="input-group">
                      <input type="number" class="form-control {{ $errors->has('dongia') ? ' is-invalid' : '' }}" name="dongia" placeholder="Đơn giá" aria-describedby="inputGroupPrepend" value="{{ $sp->dongia }}">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupPrepend">VNĐ</span>
                      </div>
                    </div>

                    @if ($errors->has('dongia'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('dongia') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="donvi" class="col-md-2 col-form-label text-md-right">{{ __('Đơn vị') }}</label>

                <div class="col-md-6">
                    <input id="donvi" type="text" class="form-control{{ $errors->has('donvi') ? ' is-invalid' : '' }}" placeholder="Đơn vị" name="donvi" value="{{  $sp->donvi }}" >

                    @if ($errors->has('donvi'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('donvi') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="dongia" class="col-md-2 col-form-label text-md-right">{{ __('Loại vật tư') }}</label>

                <div class="col-md-6">
                    <select class="custom-select {{ $errors->has('loaivt') ? ' is-invalid' : '' }}" name="loaivt">
                      <option value="1" {{ ($sp->loaivt == 1)? 'seleted' : '' }}>Vật liệu sản xuất</option>
                      <option value="2" {{ ($sp->loaivt == 2)? 'seleted' : '' }}>Công cụ sản xuất</option>
                    </select>

                    @if ($errors->has('loaivt'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('loaivt') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="ncc_id" class="col-md-2 col-form-label text-md-right">{{ __('Nhà cung cấp') }}</label>

                <div class="col-md-4">
                    <input type="text" class="form-control{{ $errors->has('ncc_id') ? ' is-invalid' : '' }}" placeholder="Nhà cung cấp" value="{{ $sp->ncc }}" readonly="true" id="ncc_name">
                    <input type="hidden" name="ncc_id" id="ncc_id_hidden" value="{{ $sp->ncc_id }}">
                    @if ($errors->has('ncc_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('ncc_id') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-2">
                    <button type="button" class="btn btn-primary form-control" id="btn-chon-khach" data-toggle="modal" data-target="#modal_ncc">Chọn nhà cung cấp</button>
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Mô tả') }}</label>

                <div class="col-md-6">
                    <textarea style="height: 150px; color: black !important; font-size: 15px !important;" class="form-control {{ $errors->has('mota') ? ' is-invalid' : '' }}" name="mota" placeholder="Ghi chú thông tin...">{{ $sp->mota }}</textarea>

                    @if ($errors->has('mota'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('mota') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Lưu thay đổi') }}
                    </button>
                    <button type="button" class="btn btn-secondary" onclick="javascript:location.href='{{route('quanlyvattu.index')}}'">Hủy bỏ</button>
                </div>
            </div>
        </form>
        @endforeach
    </div>

<!-- Modal chọn nhà cung cấp -->
<div class="modal_customer_donhang">
    <div class="modal fade bd-example-modal-lg" id="modal_ncc" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalCenterTitle">Danh sách nhà cung cấp</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <i aria-hidden="true">&times;</i>
            </button>
          </div>
          <div class="modal-body">
            <nav class="navbar navbar-light bg-light">
                <form class="form-inline">
                    <input class="form-control mr-sm-2 my-sm-0" id="search-ncc" type="search" placeholder="Tìm kiếm nhà cung cấp" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="button" id="btn-search-ncc">Tìm kiếm</button>
                    <button class="btn btn-primary my-2" type="button" id="btn-select-ncc" data-dismiss="modal" style="margin-left: 10px;">Chọn nhà cung cấp</button>
                </form>
            </nav>
            <table class="table table-bordered table-dark">
              <thead>
                <tr>
                  <th scope="col" style="width: 2%">Chọn</th>
                  <th scope="col" style="width: 10%">Tên NCC</th>
                  <th scope="col" style="width: 15%">Địa chỉ</th>
                  <th scope="col" style="width: 8%">Mail</th>
                  <th scope="col" style="width: 8%">Số điện thoại</th>
                  <th scope="col" style="width: 20%">Mô tả</th>
                </tr>
              </thead>
              <tbody class="tbody-search-ncc">
                @foreach ($nccs as $nc)
                <tr>
                  <th align="center" style="vertical-align: middle;" scope="row"><input type="radio" data-id="{{ $nc->id }}" data-name="{{ $nc->name }}" name="radio-1"></th>
                  <td align="center" style="vertical-align: middle;">{{ $nc->name }}</td>
                  <td>{{ $nc->address }}</td>
                  <td align="center" style="vertical-align: middle;">{{ $nc->mail_address }}</td>
                  <td align="center" style="vertical-align: middle;">{{ $nc->phone }}</td>
                  <td>{{ substr(strip_tags($nc->mota), 0, 70)}}{{ strlen(strip_tags($nc->mota)) > 70? '...': ''}}</td>
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


