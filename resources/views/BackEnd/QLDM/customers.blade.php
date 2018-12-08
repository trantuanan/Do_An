@extends('BackEnd')

@section('title', 'Quản lý khách hàng')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Customer_30px.png') }}"> Quản lý khách hàng</p>

<div class="row">
    <form class="col-3" action="{{route('quanlykhachhang.create')}}">
            <input type="submit" class="btn btn-success add" value="Thêm khách">
            <button type="button" class="btn btn-danger" id="btn-delete-kh">Xóa</button>
    </form>
    <form class="col-9" action="{{route('quanlykhachhang.index')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
                <div class="form-group col-3">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="mail_address" value="{{  old('mail_address') }}">
                </div>
                <div class="form-group col-2">
                    <input type="text" class="form-control" id="inputname4" placeholder="Tên" name="name" value="{{  old('name') }}">
                </div>
                <div class="form-group col-3">
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Địa chỉ" name="address" value="{{  old('address') }}">
                </div>
                <div class="form-group col-2">
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Số điện thoại" name="phone" value="{{  old('phone') }}">
                </div>
                <div class="form-group col-2">
                    <input type="submit" name="search" class="btn btn-primary form-control" value="Tìm Kiếm">    
                </div>
            </div>   
        </div>
    </form>
</div>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col" style="width: 2%"><input type="checkbox" name="select-all-nv" id="select-all"></th>
      <th scope="col" style="width: 5%">Mã KH</th>
      <th scope="col" style="width: 17%">Mail</th>
      <th scope="col" style="width: 15%">Tên</th>
      <th scope="col" style="width: 8%">Giới tính</th>
      <th scope="col" style="width: 8%">Ngày sinh</th>
      <th scope="col" style="width: 25%">Địa chỉ</th>
      <th scope="col" style="width: 8%">SĐT</th>
      <th scope="col" style="width: 5%">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-khachhang">
   @foreach ($customers as $cs)
    <tr>
      <th scope="row" style="vertical-align: middle;"><input type="checkbox" data-id="{{ $cs->id }}" name="checkbox-1"></th>
      <td align="center" style="vertical-align: middle;">{{ $cs->makh }}</td>
      <td align="center" style="vertical-align: middle;">{{ $cs->mail_address }}</td>
      <td align="center" style="vertical-align: middle;">{{ $cs->name }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::GioiTinh($cs->gioitinh)}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($cs->ngaysinh)}}</td>
      <td>{{ $cs->address }}</td>
      <td align="center" style="vertical-align: middle;">{{ $cs->phone }}</td>
      <td align="center" style="vertical-align: middle;"><a id="btn-select-kh-tba" data-id="{{ $cs->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $customers->links() !!}
@endsection
