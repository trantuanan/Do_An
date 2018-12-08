@extends('BackEnd')

@section('title', 'Quản lý sản phẩm hoàn thiện')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Product_30px.png') }}"> Quản lý sản phẩm hoàn thiện</p>

<div class="row">
    <form class="col-3" action="{{ route('quanlysanphamht.create') }}">
            <input type="submit" class="btn btn-success add" value="Thêm sản phẩm">
            <button type="button" class="btn btn-danger" id="btn-delete-sanphamht">Xóa</button>
    </form>
    <form class="col-9 " action="{{ route('quanlysanphamht.index') }}" method="GET">
        <div id="search_user">
            <div class="form-row pull-right">
                <div class="form-group col-8">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tiêu đề" name="search" value="{{  old('title') }}">
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
      <th scope="col" style="width: 5%">Mã SP</th>
      <th scope="col" style="width: 8%">Ảnh bìa</th>
      <th scope="col" style="width: 12%">Tên sản phẩm</th>
      <th scope="col" style="width: 12%">Mô tả</th>
      <th scope="col" style="width: 15%">Địa điểm</th>
      <th scope="col" style="width: 8%">Thời gian</th>
      <th scope="col" style="width: 8%">Trạng thái</th>
      <th scope="col" style="width: 8%">Loại SP</th>
      <th scope="col" style="width: 5%">Sửa</th>
    </tr>
  </thead>
  <tbody id="table-sanphamht">
    @foreach ($productcomplete as $pc)
    <tr>
      <th scope="row" style="vertical-align: middle;"><input type="checkbox" data-id="{{ $pc->id }}" name="checkbox-1"></th>
      <td align="center" style="vertical-align: middle;">{{ $pc->maspht }}</td>
      <td><div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/imageProductComplete') }}/{{ $pc->anh }}"></div></td>
      <td>{{ substr(strip_tags($pc->name), 0, 50)}}{{ strlen(strip_tags($pc->name)) > 50? '...': ''}}</td>
      <td>{{ substr(strip_tags($pc->mota), 0, 50)}}{{ strlen(strip_tags($pc->mota)) > 50? '...': ''}}</td>
      <td>{{ $pc->diadiem }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($pc->thoigian)}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::trangthaiTT($pc->trangthai)}}</td>
      <td align="center" style="vertical-align: middle;">{{ $pc->loaisp }}</td>
      <td align="center" style="vertical-align: middle;"><a id="btn-select-sanphamht" data-id="{{ $pc->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $productcomplete->links() !!}
@endsection
