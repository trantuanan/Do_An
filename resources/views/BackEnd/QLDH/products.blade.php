@extends('BackEnd')

@section('title', 'Quản lý sản phẩm đặt')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/New Product_30px.png') }}"> Quản lý sản phẩm đặt</p>

<div class="row">
    <form class="col-3" action="{{ route('quanlysanpham.create') }}">
            <input type="submit" class="btn btn-success add" value="Thêm sản phẩm">
            <button type="button" class="btn btn-danger" id="btn-delete-sanpham">Xóa</button>
    </form>
    <form class="col-9 " action="{{ route('quanlysanpham.index') }}" method="GET">
        <div id="search_user">
            <div class="form-row pull-right">
                <div class="form-group col-8">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên sản phẩm" name="search" value="{{  old('title') }}">
                </div>
                <div class="form-group col-4">
                    <input type="submit" class="btn btn-primary form-control" value="Tìm Kiếm">    
                </div>
            </div>   
        </div>
    </form>
</div>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col" style="width: 2%"><input type="checkbox" name="select-all-nv" id="select-all"></th>
      <th scope="col" style="width: 7%">Mã SP</th>
      <th scope="col" style="width: 8%">Ảnh bìa</th>
      <th scope="col" style="width: 12%">Tên sản phẩm</th>
      <th scope="col" style="width: 12%">Mô tả</th>
      <th scope="col" style="width: 15%">Vật liệu</th>
      <th scope="col" style="width: 8%">kích thước</th>
      <th scope="col" style="width: 8%">Bảo hành</th>
      <th scope="col" style="width: 12%">Đơn giá</th>
      <th scope="col" style="width: 8%">Trạng thái</th>
      <th scope="col" style="width: 8%">Loại SP</th>
      <th scope="col" style="width: 5%">Sửa</th>
    </tr>
  </thead>
  <tbody id="table-sanpham">
    @foreach ($products as $pd)
    <tr>
      <th style="vertical-align: middle;" scope="row"><input type="checkbox" data-id="{{ $pd->id }}" name="checkbox-1"></th>
      <td style="vertical-align: middle;">{{ $pd->masp }}</td>
      <td><div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/imageProducts') }}/{{ $pd->anh }}"></div></td>
      <td>{{ substr(strip_tags($pd->name), 0, 50)}}{{ strlen(strip_tags($pd->name)) > 50? '...': ''}}</td>
      <td>{{ substr(strip_tags($pd->mota), 0, 50)}}{{ strlen(strip_tags($pd->mota)) > 50? '...': ''}}</td>
      <td>{{ $pd->vatlieu }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pd->size }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pd->baohanh }} tháng</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($pd->dongia)}} VNĐ</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::trangthaiTT($pd->trangthai)}}</td>
      <td align="center" style="vertical-align: middle;">{{ $pd->loaisp }}</td>
      <td align="center" style="vertical-align: middle;"><a id="btn-select-sanpham" data-id="{{ $pd->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $products->links() !!}
@endsection
