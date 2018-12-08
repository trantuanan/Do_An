@extends('BackEnd')

@section('title', 'Danh sách vật tư')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Layers_30px.png') }}"> Danh sách vật tư</p>

<div class="row">
    <form class="col-9" action="{{route('quanlyvattu.create')}}">
            <input type="submit" class="btn btn-success add" value="Thêm vật tư">
            <button type="button" class="btn btn-danger" id="btn-delete-vattu">Xóa</button>
    </form>
    <form class="col-3" action="{{route('quanlyvattu.index')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
                <div class="form-group col-7">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên vật tư" name="search" value="{{  old('search') }}">
                </div>
                <div class="form-group col-5">
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
      <th scope="col" style="width: 5%">Mã VT</th>
      <th scope="col" style="width: 10%">Tên vật tư</th>
      <th scope="col" style="width: 8%">Màu sắc</th>
      <th scope="col" style="width: 15%">Mô tả</th>
      <th scope="col" style="width: 12%">Thương hiệu</th>
      <th scope="col" style="width: 12%">Nhà cung cấp</th>
      <th scope="col" style="width: 10%">loại vật tư</th>
      <th scope="col" style="width: 10%">Đơn giá</th>
      <th scope="col" style="width: 7%">Đơn vị</th>
      <th scope="col" style="width: 5%">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-vattu">
    @foreach ($supplies as $sp)
    <tr>
      <th align="center" style="vertical-align: middle;" scope="row"><input type="checkbox" data-id="{{ $sp->id }}" name="checkbox-1"></th>
      <td align="center" style="vertical-align: middle;">{{ $sp->mavt }}</td>
      <td align="center" style="vertical-align: middle;">{{ $sp->name }}</td>
      <td align="center" style="vertical-align: middle;">{{ $sp->mausac }}</td>
      <td>{{ substr(strip_tags($sp->mota), 0, 50)}}{{ strlen(strip_tags($sp->mota)) > 50? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ $sp->thuonghieu }}</td>
      <td align="center" style="vertical-align: middle;">{{ $sp->ncc }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::loaivattu($sp->loaivt) }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($sp->dongia)}} VNĐ</td>
      <td align="center" style="vertical-align: middle;">{{ $sp->donvi }}</td>
      <td align="center" style="vertical-align: middle;"><a id="btn-select-vattu" data-id="{{ $sp->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $supplies->links() !!}
@endsection
