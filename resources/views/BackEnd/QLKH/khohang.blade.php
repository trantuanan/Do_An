@extends('BackEnd')

@section('title', 'Quản lý kho hàng')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Tags_30px.png') }}"> Quản lý kho hàng</p>

<div class="row">
    <form class="col-8" action="{{route('quanlykhohang.create')}}">
            <input type="submit" class="btn btn-success add" value="Thêm kho mới">
    </form>
    <form class="col-4" action="{{route('quanlykhohang.index')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
                <div class="form-group col-7">
                    <input type="text" class="form-control" placeholder="Tên kho hàng" name="search" value="{{  old('mail_address') }}">
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
      <th scope="col" style="width: 7%">Mã kho</th>
      <th scope="col" style="width: 10%">Tên kho</th>
      <th scope="col" style="width: 15%">Địa chỉ</th>
      <th scope="col" style="width: 10%">Số điện thoại</th>
      <th scope="col" style="width: 20%">Mô tả</th>
      <th scope="col" style="width: 10%">Ngày tạo</th>
      <th scope="col" style="width: 5%">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-ncc">
    @foreach ($khohangs as $kh)
    <tr>
      <td align="center" style="vertical-align: middle;">{{ $kh->makho }}</td>
      <td align="center" style="vertical-align: middle;">{{ $kh->name }}</td>
      <td align="center" style="vertical-align: middle;">{{ $kh->address }}</td>
      <td align="center" style="vertical-align: middle;">{{ $kh->phone }}</td>
      <td align="center" style="vertical-align: middle;">{{ substr(strip_tags($kh->mota), 0, 70)}}{{ strlen(strip_tags($kh->mota)) > 70? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($kh->created_at) }}</td>
      <td align="center" style="vertical-align: middle;">
        <form action="{{ route('quanlykhohang.edit',$kh->id) }}" method="GET" style="margin-bottom: 10px;">
          <button type="submit" class="btn btn-primary btn-sm" id="btn-edit-hoadon"><span class="ion-compose tacvu-icon"></span></button>
        </form>
        <form action="{{ route('quanlykhohang.destroy',$kh->id) }}" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger btn-sm" id="btn-delete-hoadon"><span class="ion-trash-a tacvu-icon"></span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $khohangs->links() !!}
@endsection
