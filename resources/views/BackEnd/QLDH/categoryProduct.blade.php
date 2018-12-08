@extends('BackEnd')

@section('title', 'Danh mục loại sản phẩm')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Report Card_30px.png') }}"> Danh mục loại sản phẩm</p>

<div class="row">
    <form class="col-3">
            <input type="button" class="btn btn-success add" data-toggle="modal" data-target="#modal-themloai" value="Thêm loại">
            <button type="button" class="btn btn-danger" id="btn-delete-loaisp">Xóa</button>
    </form>
    <form class="col-9 " action="{{ route('quanlyloaisanpham.index') }}" method="GET" >
        <div id="search_user">
            <div class="form-row pull-right">
                <div class="form-group col-8">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên loại" name="search" value="{{  old('title') }}">
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
      <th scope="col" style="width: 8%">Ảnh bìa</th>
      <th scope="col" style="width: 12%">Tên loại</th>
      <th scope="col" style="width: 15%">Mô tả</th>
      <th scope="col" style="width: 8%">Ngày tạo</th>
      <th scope="col" style="width: 8%">Ngày sửa</th>
      <th scope="col" style="width: 5%">Sửa</th>
    </tr>
  </thead>
  <tbody id="table-loaisp">
    @foreach ($categories as $ca)
    <tr>
      <th scope="row"><input type="checkbox" data-id="{{ $ca->id }}" name="checkbox-1"></th>
      <td><div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/imageCategoryProduct') }}/{{ $ca->anh }}"></div></td>
      <td>{{ $ca->name }}</td>
      <td>{{substr(strip_tags($ca->mota), 0, 70)}}{{ strlen(strip_tags($ca->mota)) > 70? '...': ''}}</td>
      <td align="center">{{ $ca->created_at }}</td>
      <td align="center">{{ $ca->updated_at}}</td>
      <td align="center"><a id="btn-select-loaisp" data-toggle="modal" data-target="#modal-sualoai" data-id="{{ $ca->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $categories->links() !!}

<!-- modal thêm loại -->
<div class="modal fade" id="modal-themloai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Thêm loại sản phẩm</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
        <div class="form-group">
            <label>Tên loại tin tức</label>
            <input type="text" class="form-control" id="add_name" placeholder="Tên loại tin tức" name="name" value="{{ old('name')}}">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <input type="text" class="form-control " id="add_mota" placeholder="Mô tả loại tin tức" name="mota" value="{{ old('mota')}}">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
        <button type="button" class="btn btn-primary" id="btn-add-loaisp">Thêm mới</button>
      </div>      
      </form>
    </div>
  </div>
</div>

<!-- modal sửa loại -->
<div class="modal fade" id="modal-sualoai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Sửa loại sản phẩm</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
        <input type="hidden" id="edit_id" name="id" value="">
        <div class="form-group">
            <label>Tên loại tin tức</label>
            <input type="text" class="form-control" id="edit_name" placeholder="Tên loại tin tức" name="name" value="">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <input type="text" class="form-control " id="edit_mota" placeholder="Mô tả loại tin tức" name="mota" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
        <button type="button" class="btn btn-primary" id="btn-edit-loaisp">Lưu thay đổi</button>
      </div>      
      </form>
    </div>
  </div>
</div>
@endsection
