<html>
<head>
  <style> 
    table, td {border:2px solid black} table {border-collapse:collapse}
  </style>
</head>
<body>
@if(isset($a['denngay']))
<h2>Thống kê phiếu xuất(Từ {{ $a['tungay'].' đến '.$a['denngay']}} )</h2>
@else 
<h2>Thống kê phiếu xuất</h2>
@endif
<br>
<h4>Thống kê theo vật tư</h4>
<br>
<table class="table table-bordered table-dark table-TKPX">
  <thead>
    <tr>
      <th scope="col" style="width: 7%; vertical-align: middle;">Mã VT</th>
      <th scope="col" colspan="2" style="width: 8%">Phiếu xuất</th>
      <th scope="col" colspan="3" style="width: 13%; vertical-align: middle;">Tên vật tư</th>
      <th scope="col" style="width: 6%; vertical-align: middle;">Đơn vị</th>
      <th scope="col" colspan="2" style="width: 10%; vertical-align: middle;">Đơn giá</th>
      <th scope="col" style="width: 7%">Số lượng</th>
      <th scope="col" style="width: 7%">Mã kho</th>
      <th scope="col" colspan="2" style="width: 10%">Ngày xuất</th>
      <th scope="col" colspan="2" style="width: 10%">Thành tiền</th>
    </tr>
  </thead>
  <tbody id="table-ncc">
    {{$tong = 0}}
    @foreach ($PhieuXuatDetails as $pn)
    <tr>
      <th scope="row" style="vertical-align:middle; text-align: center;">{{ $pn->supplie_id }}</th>
      <td align="center" colspan="2" style="vertical-align: middle;">PX{{ $pn->phieuxuat_id }}</td>
      <td align="center" colspan="3" style="vertical-align: middle;">{{ $pn->tenvt }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->donvi }}</td>
      <td align="center" colspan="2" style="vertical-align: middle;">{{ Helper::Tien($pn->dongia) }}</td>
      <td align="center"  style="vertical-align: middle;">{{ $pn->soluong }}</td>
      <td align="center"  style="vertical-align: middle;">{{ $pn->makho }}</td>
      <td align="center" colspan="2" style="vertical-align: middle;">{{ Helper::formatDate($pn->ngayxuat) }}</td>
      <td align="center" colspan="2" style="vertical-align: middle;" >
        {{ Helper::Tien($pn->dongia*$pn->soluong) }}
        <input type="hidden" value="{{$pn->dongia*$pn->soluong}}" class="thanhtien_tkbc_nx">
      </td>
    </tr>
    {{$tong += ($pn->dongia*$pn->soluong)}}
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="13" style="text-align: center;"><span style="font-weight: bold;">Tổng tiền các vật tư:</span></td>
      <td colspan="2" align="center">
        <span  style="font-weight: bold; color: red; font-size: 16px;" id="tongtien_tkbc_nx">{{Helper::Tien($tong)}}</span> VNĐ
      </td>
    </tr>
 </tfoot>
</table>
</body>