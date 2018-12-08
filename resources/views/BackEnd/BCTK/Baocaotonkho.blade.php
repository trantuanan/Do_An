@extends('BackEnd')

@section('title', 'Báo cáo tồn kho hàng')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Pie Chart_30px.png') }}"> Báo cáo tồn kho hàng</p>
<div class="row" style="margin-top: 20px;">
    <form class="col-7" action="{{route('baocaotonkho.index')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
            	<label for="staticEmail" class="col-sm-2 col-form-label" style="text-align: center;">Từ ngày</label>
                <div class="form-group col-3">
                    <input type="date" class="form-control" name="tungay" value="{{ $a['tungay'] }}">
                </div>
                <label for="staticEmail" class="col-sm-2 col-form-label" style="text-align: center;">Đến ngày</label>
                <div class="form-group col-3">
                    <input type="date" class="form-control" name="denngay" value="{{ $a['denngay'] }}">
                </div>
                <div class="form-group col-2">
                    <button type="submit" class="btn btn-primary form-control"><span class="ion-ios-search-strong"></span> Tìm kiếm</button> 
                </div>
            </div>   
        </div>
    </form>
    <form class="col-2" action="{{route('baocaotonkho.export')}}" method="POST" id="form_khohang_tonkho">
    	 @csrf
    	<input type="hidden" class="form-control" name="tungay" value="{{ $a['tungay'] }}">
    	<input type="hidden" class="form-control" name="denngay" value="{{ $a['denngay'] }}">
        <div class="form-group col-12">
            <button type="submit" class="btn btn-success form-control"><img src="{{ asset('upload/icon/Microsoft Excel_15px.png') }}"> Xuất Excel</button>     
        </div>
    </form>
</div>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col" rowspan="2" style="width: 7%; vertical-align: middle;">Mã VT</th>
      <th scope="col" rowspan="2" style="width: 10%; vertical-align: middle;">Tên vật tư</th>
      <th scope="col" rowspan="2" style="width: 7%; vertical-align: middle;">Đơn vị</th>
      <th scope="col" rowspan="2" style="width: 10%; vertical-align: middle;">Đơn giá</th>
      <th scope="col" colspan="2" style="width: 15%">Tồn đầu kỳ</th>
      <th scope="col" colspan="2" style="width: 15%">Nhập kho</th>
      <th scope="col" colspan="2" style="width: 15%">Xuất kho</th>
      <th scope="col" colspan="2" style="width: 15%">Tồn cuối kỳ</th>
    </tr>
    <tr>
      <th scope="col" style="width: 5%">Số lượng</th>
      <th scope="col" style="width: 10%">Thành tiền</th>
      <th scope="col" style="width: 5%">Số lượng</th>
      <th scope="col" style="width: 10%">Thành tiền</th>
      <th scope="col" style="width: 5%">Số lượng</th>
      <th scope="col" style="width: 10%">Thành tiền</th>
      <th scope="col" style="width: 5%">Số lượng</th>
      <th scope="col" style="width: 10%">Thành tiền</th>
    </tr>
  </thead>
  <tbody >
  	@foreach($vattu as $vt)
   <tr>
      <td align="center" style="vertical-align: middle;">{{ $vt->mavt }}</td>
      <td align="center" style="vertical-align: middle;">{{ $vt->name }}</td>
      <td align="center" style="vertical-align: middle;">{{ $vt->donvi }}</td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ Helper::Tien($vt->dongia)}}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ ($vt->dauky == '')? '0' : $vt->dauky }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ Helper::Tien($vt->dauky*$vt->dongia) }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ $vt->nhap }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ Helper::Tien($vt->nhap*$vt->dongia) }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ $vt->xuat }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ Helper::Tien($vt->xuat*$vt->dongia) }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ $vt->ton }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ Helper::Tien(($vt->ton)*$vt->dongia) }}</td>
   </tr>
   @endforeach
  </tbody>
</table>
@endsection
