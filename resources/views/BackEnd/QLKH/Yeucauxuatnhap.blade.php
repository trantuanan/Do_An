@extends('BackEnd')

@section('title', 'Quản lý yêu cầu xuất nhập')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Literature_30px.png') }}"> Quản lý phiếu yêu cầu xuất nhập</p>

<div class="row" style="margin-top: 20px;">
    <form class="col-8" action="{{route('yeucauxuatnhap.create')}}">
            <button type="submit" class="btn btn-success add"><span class="ion-plus-round"></span> Thêm phiếu</button>
    </form>
    <form class="col-4" action="{{route('yeucauxuatnhap.index')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
                <div class="form-group col-7">
                    <input type="text" class="form-control" placeholder="Mã phiếu xuất" name="search" value="{{  old('mail_address') }}">
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
      <th scope="col" style="width: 7%">Mã Phiếu</th>
      <th scope="col" style="width: 7%">Loại phiếu</th>
      <th scope="col" style="width: 10%">Người tạo</th>
      <th scope="col" style="width: 7%">Mã kho</th>
      <th scope="col" style="width: 12%">Tên kho</th>
      <th scope="col" style="width: 17%">Ghi chú</th>
      <th scope="col" style="width: 10%">Ngày lấy</th>
      <th scope="col" style="width: 10%">Tổng tiền</th>
      <th scope="col" style="width: 5%">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-ncc">
    @foreach ($ycxns as $yc)
    <tr>
      <td align="center" style="vertical-align: middle;">{{ $yc->mayc }}</td>
      <td align="center" style="vertical-align: middle;">{!! Helper::LoaiPhieu($yc->loaiphieu) !!}</td>
      <td align="center" style="vertical-align: middle;">{{ $yc->ngtao }}</td>
      <td align="center" style="vertical-align: middle;">{{ $yc->khohang_id }}</td>
      <td align="center" style="vertical-align: middle;">{{ $yc->tenkho }}</td>
      <td>{{ substr(strip_tags($yc->mota), 0, 70)}}{{ strlen(strip_tags($yc->mota)) > 70? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ $yc->ngaylay }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($yc->thanhtien) }} VNĐ</td>
      <td align="center" style="vertical-align: middle;">
        <form action="{{ route('yeucauxuatnhap.edit',$yc->id) }}" method="GET" style="margin-bottom: 10px;">
          <button type="submit" class="btn btn-primary btn-sm" id="btn-edit-hoadon"><span class="ion-compose tacvu-icon"></span></button>
        </form>
        <form action="{{ route('yeucauxuatnhap.destroy',$yc->id) }}" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger btn-sm" id="btn-delete-hoadon"><span class="ion-trash-a tacvu-icon"></span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
