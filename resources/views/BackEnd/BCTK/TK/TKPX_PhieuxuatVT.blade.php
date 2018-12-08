@extends('BackEnd.BCTK.Thongkephieuxuat')

@section('content-1')
<table class="table table-bordered table-dark table-TKPX">
  <thead>
    <tr>
      <th scope="col" style="width: 5%; vertical-align: middle;">Mã VT</th>
      <th scope="col" style="width: 5%">Phiếu xuất</th>
      <th scope="col" style="width: 13%; vertical-align: middle;">Tên vật tư</th>
      <th scope="col" style="width: 6%; vertical-align: middle;">Đơn vị</th>
      <th scope="col" style="width: 10%; vertical-align: middle;">Đơn giá</th>
      <th scope="col" style="width: 7%; vertical-align: middle;">Số lượng</th>
      <th scope="col" style="width: 7%; vertical-align: middle;">Mã kho</th>
      <th scope="col" style="width: 10%; vertical-align: middle;">Ngày xuất</th>
      <th scope="col" style="width: 10%; vertical-align: middle;">Thành tiền</th>
    </tr>
  </thead>
  <tbody id="table-ncc">
     @foreach ($PhieuXuatDetails as $pn)
    <tr>
      <th scope="row" style="vertical-align:middle; text-align: center;">{{ $pn->mavt }}</th>
      <td align="center" style="vertical-align: middle;">{{ $pn->mapx }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->tenvt }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->donvi }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($pn->dongia) }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->soluong }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->makho }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($pn->ngayxuat) }}</td>
      <td align="center" style="vertical-align: middle;" >
        {{ Helper::Tien($pn->dongia*$pn->soluong) }}
        <input type="hidden" value="{{$pn->dongia*$pn->soluong}}" class="thanhtien_tkbc_nx">
      </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="8" style="text-align: center;"><span style="font-weight: bold;">Tổng tiền vật liệu nhập:</span></td>
      <td colspan="2" align="center">
        <span  style="font-weight: bold; color: red; font-size: 16px;" id="tongtien_tkbc_nx">0</span> VNĐ
      </td>
    </tr>
 </tfoot>
</table>
@endsection