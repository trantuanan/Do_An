@extends('BackEnd')

@section('title', 'Quản lý bản thiết kế')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Drawing Compass_30px.png') }}"> Quản lý bản thiết kế</p>

<div class="row">
    <form class="col-3" action="{{ route('quanlythietke.create') }}">
            <input type="submit" class="btn btn-success add" value="Thêm thiết kế">
            <button type="button" class="btn btn-danger" id="btn-delete-thietke">Xóa</button>
    </form>
    <form class="col-9 " action="{{ route('quanlythietke.index') }}" method="GET">
        <div id="search_user">
            <div class="form-row pull-right">
                <div class="form-group col-8">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên file thiết kế" name="search" value="{{  old('title') }}">
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
      <th scope="col" style="width: 5%">Mã TK</th>
      <th scope="col" style="width: 8%">Ảnh bìa</th>
      <th scope="col" style="width: 12%">Tên file</th>
      <th scope="col" style="width: 7%">loại file</th>
      <th scope="col" style="width: 7%">kích thước</th>
      <th scope="col" style="width: 17%">Mô tả</th>
      <th scope="col" style="width: 8%">Ngày tạo</th>
      <th scope="col" style="width: 8%">Ngày cập nhật</th>
      <th scope="col" style="width: 5%">Sửa</th>
    </tr>
  </thead>
  <tbody id="table-thietke">
    @foreach ($designs as $ds)
    <tr>
      <th scope="row" style="vertical-align: middle;"><input type="{{( $ds->id == 1 )? 'radio' : 'checkbox'}}" data-id="{{ $ds->id }}" name="checkbox-1"  @if ($ds->id == 1) {{ 'disabled' }} @endif></th>
      <td align="center" style="vertical-align: middle;">{{ $ds->matk }}</td>
      <td>
        @if($ds->type == '.jpg' || $ds->type == '.png')
          <div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/fileDesigns') }}/{{ $ds->file }}{{ $ds->type }}"></div>
        @else
          <div class="img_table"><img id="AnhNV-show" name="AnhNV_1" src="{{ asset('/upload/icon/Docs-icon.png') }}"></div>
        @endif
      </td>
      <td align="center" style="vertical-align: middle;">{{ $ds->file }}</td>
      <td align="center" style="vertical-align: middle;">{{ $ds->type }}</td>
      <td align="center" style="vertical-align: middle;">{{ $ds->size }}KB</td>
      <td >{{ substr(strip_tags($ds->mota), 0, 50)}}{{ strlen(strip_tags($ds->mota)) > 50? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ $ds->created_at }}</td>
      <td align="center" style="vertical-align: middle;">{{ $ds->updated_at }}</td>
      <td align="center" style="vertical-align: middle;"><a id="btn-select-thietke-tba" data-id="{{ $ds->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $designs->links() !!}
@endsection
