@extends('BackEnd')

@section('title', 'Danh mục tin tức')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Paper_30px.png') }}"> Danh mục tin tức</p>

<div class="row">
    <form class="col-3" action="{{ route('quanlytintuc.create') }}">
            <input type="submit" class="btn btn-success add" value="Thêm tin tức">
            <button type="button" class="btn btn-danger" id="btn-delete-tt">Xóa</button>
    </form>
    <form class="col-9 " action="{{ route('quanlytintuc.index') }}" method="GET">
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
      <th scope="col" style="width: 5%">Mã TT</th>
      <th scope="col" style="width: 8%">Ảnh bìa</th>
      <th scope="col" style="width: 12%">Tiêu đề</th>
      <th scope="col" style="width: 12%">Mô tả</th>
      <th scope="col" style="width: 25%">Nội dung</th>
      <th scope="col" style="width: 8%">Trạng thái</th>
      <th scope="col" style="width: 8%">Loại tin</th>
      <th scope="col" style="width: 8%">Ngày đăng</th>
      <th scope="col" style="width: 5%">Sửa</th>
    </tr>
  </thead>
  <tbody id="table-tintuc">
   @foreach ($posts as $pt)
    <tr>
      <th scope="row"  style="vertical-align: middle;"><input type="checkbox" data-id="{{ $pt->id }}" name="checkbox-1"></th>
      <td align="center" style="vertical-align: middle;">{{ $pt->matt }}</td>
      <td><div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/imagePost') }}/{{ $pt->anh }}"></div></td>
      <td>{{ substr(strip_tags($pt->title), 0, 30)}}{{ strlen(strip_tags($pt->title)) > 30? '...': ''}}</td>
      <td>{{ substr(strip_tags($pt->mota), 0, 30)}}{{ strlen(strip_tags($pt->mota)) > 30? '...': ''}}</td>
      <td class=".td_noidung">{{ substr(strip_tags($pt->noidung), 0, 50)}}{{ strlen(strip_tags($pt->noidung)) > 50? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::trangthaiTT($pt->trangthai) }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pt->loaitt }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($pt->created_at)}}</td>
      <td align="center" style="vertical-align: middle;"><a id="btn-select-tt" data-id="{{ $pt->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $posts->links() !!}
@endsection
