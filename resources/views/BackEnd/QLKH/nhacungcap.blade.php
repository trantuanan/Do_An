@extends('BackEnd')

@section('title', 'Quản lý nhà cung cấp')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Tags_30px.png') }}"> Quản lý nhà cung cấp</p>

<div class="row">
    <form class="col-3" action="{{route('quanlyncc.create')}}">
            <input type="submit" class="btn btn-success add" value="Thêm khách">
            <button type="button" class="btn btn-danger" id="btn-delete-ncc">Xóa</button>
    </form>
    <form class="col-9" action="{{route('quanlyncc.index')}}" method="GET">
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
      <th scope="col" style="width: 5%">Mã NCC</th>
      <th scope="col" style="width: 10%">Tên NCC</th>
      <th scope="col" style="width: 15%">Địa chỉ</th>
      <th scope="col" style="width: 8%">Mail</th>
      <th scope="col" style="width: 8%">Số điện thoại</th>
      <th scope="col" style="width: 20%">Mô tả</th>
      <th scope="col" style="width: 5%">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-ncc">
    @foreach ($nccs as $nc)
    <tr>
      <th align="center" scope="row" style="vertical-align: middle;"><input type="checkbox" data-id="{{ $nc->id }}" name="checkbox-1"></th>
      <td align="center" style="vertical-align: middle;">{{ $nc->mancc }}</td>
      <td align="center" style="vertical-align: middle;">{{ $nc->name }}</td>
      <td>{{ $nc->address }}</td>
      <td align="center" style="vertical-align: middle;">{{ $nc->mail_address }}</td>
      <td align="center" style="vertical-align: middle;">{{ $nc->phone }}</td>
      <td>{{ substr(strip_tags($nc->mota), 0, 70)}}{{ strlen(strip_tags($nc->mota)) > 70? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;"><a id="btn-select-ncc-tba" data-id="{{ $nc->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $nccs->links() !!}
@endsection
