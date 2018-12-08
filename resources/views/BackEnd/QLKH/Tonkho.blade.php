@extends('BackEnd')

@section('title', 'Danh sách tồn kho hàng')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Warehouse_30px.png') }}"> Danh sách tồn kho hàng</p>

<div class="row" style="margin-top: 20px;">
    <form class="col-2" action="{{route('danhsachtonkho.index')}}" method="GET" id="form_khohang_tonkho">
        <select class="custom-select {{ $errors->has('khohang_id') ? ' is-invalid' : '' }}" name="khohang_id" id="select_khohang_tonkho">
          <option value=""> -- Chọn kho -- </option>
          <option value=""> Tất cả các kho </option>
          @foreach($khohang as $kh)
          <option value="{{$kh->id}}" >{{$kh->name}}</option>
          @endforeach
          
        </select>
    </form>
    <form class="col-4" action="{{route('danhsachtonkho.index')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
                <div class="form-group col-7">
                    <input type="text" class="form-control" placeholder="Tìm vật tư" name="search" value="{{  old('mail_address') }}">
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
      <th scope="col" rowspan="2" style="width: 7%; vertical-align: middle;">Mã VT</th>
      <th scope="col" rowspan="2" style="width: 10%; vertical-align: middle;">Tên vật tư</th>
      <th scope="col" rowspan="2" style="width: 7%; vertical-align: middle;">Đơn vị</th>
      <th scope="col" rowspan="2" style="width: 10%; vertical-align: middle;">Đơn giá</th>
      <th scope="col" colspan="2" style="width: 18%">Nhập kho</th>
      <th scope="col" colspan="2" style="width: 18%">Xuất kho</th>
      <th scope="col" colspan="2" style="width: 18%">Tồn kho</th>
      <th scope="col" rowspan="2" style="width: 10%; vertical-align: middle;">Tình trạng</th>
    </tr>
    <tr>
      <th scope="col" style="width: 8%">Số lượng</th>
      <th scope="col" style="width: 10%">Thành tiền</th>
      <th scope="col" style="width: 8%">Số lượng</th>
      <th scope="col" style="width: 10%">Thành tiền</th>
      <th scope="col" style="width: 8%">Số lượng</th>
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
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ $vt->nhap }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ Helper::Tien($vt->nhap*$vt->dongia) }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ $vt->xuat }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ Helper::Tien($vt->xuat*$vt->dongia) }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ $vt->ton }}</span></td>
      <td align="center" style="vertical-align: middle;"><span style="font-weight: bold;">{{ Helper::Tien(($vt->nhap - $vt->xuat)*$vt->dongia) }}</td>
      <td align="center" style="vertical-align: middle; {{ (($vt->nhap-$vt->xuat) < 1)? 'background-color: #E1846E;' : 'background-color: #87C98A;'}}" >{!! Helper::tinhtrangtonkho($vt->nhap - $vt->xuat) !!}</td>
   </tr>
   @endforeach
  </tbody>
</table>
{!! $vattu->links() !!}
@endsection
