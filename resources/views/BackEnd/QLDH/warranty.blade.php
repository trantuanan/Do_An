@extends('BackEnd')

@section('title', 'Quản lý bảo hành')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Support_30px.png') }}"> Quản lý bảo hành</p>

<div class="row">
    <form class="col-3" action="{{ route('quanlybaohanh.create') }}">
            <input type="submit" class="btn btn-success add" value="Thêm bảo hành">
            <button type="button" class="btn btn-danger" id="btn-delete-baohanh">Xóa</button>
    </form>
    <form class="col-9 " action="{{ route('quanlybaohanh.index') }}" method="GET">
        <div id="search_user">
            <div class="form-row pull-right">
                <div class="form-group col-6">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên người tạo" name="user_name" value="{{  old('title') }}">
                </div>
                <div class="form-group col-3">
                    <input type="number" class="form-control" id="inputEmail4" placeholder="đơn hàng" name="bill_id" value="{{  old('title') }}">
                </div>
                <div class="form-group col-3">
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
      <th scope="col" style="width: 8%">Hóa đơn</th>
      <th scope="col" style="width: 12%">Người tạo</th>
      <th scope="col" style="width: 15%">Lý do</th>
      <th scope="col" style="width: 10%">Ngày bảo hành</th>
      <th scope="col" style="width: 10%">Ngày trả</th>
      <th scope="col" style="width: 8%">Phụ chi</th>
      <th scope="col" style="width: 10%">Trạng thái</th>
      <th scope="col" style="width: 5%">Sửa</th>
    </tr>
  </thead>
  <tbody id="table-baohanh">
    @foreach ($warranties as $wt)
    <tr>
      <th scope="row"><input type="checkbox" data-id="{{ $wt->id }}" name="checkbox-1"></th>
      <td align="center" style="vertical-align: middle;">{{ $wt->mahd }}</td>
      <td style="vertical-align: middle;">{{ $wt->ngtao }}</td>
      <td>{{ substr(strip_tags($wt->lydo), 0, 50)}}{{ strlen(strip_tags($wt->lydo)) > 50? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($wt->ngaybh) }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($wt->ngaytra) }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($wt->phuchi) }} VNĐ</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::trangthaibaohanh($wt->trangthai)}}</td>
      <td align="center" style="vertical-align: middle;"><a id="btn-select-baohanh" data-id="{{ $wt->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $warranties->links() !!}
@endsection
