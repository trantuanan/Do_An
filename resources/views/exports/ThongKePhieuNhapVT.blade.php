<html>
<head>
  <style> 
    table, td {border:2px solid black} table {border-collapse:collapse}
  </style>
</head>
<body>
@if(isset($a['denngay']))
<h2>Thống kê phiếu nhập(Từ {{ $a['tungay'].' đến '.$a['denngay']}} )</h2>
@else 
<h2>Thống kê phiếu nhập</h2>
@endif
<br>
<h4>Thống kê theo vật tư</h4>
<br>
<table class="table table-bordered table-dark table-TKPX">
  <thead>
    <tr>
      <th scope="col" style="width: 7%; vertical-align: middle;">Mã VT</th>
      <th scope="col" style="width: 8%">Phiếu nhập</th>
      <th scope="col" colspan="2" style="width: 10%; vertical-align: middle;">Tên vật tư</th>
      <th scope="col" style="width: 6%; vertical-align: middle;">Đơn vị</th>
      <th scope="col" colspan="2" style="width: 10%; vertical-align: middle;">Đơn giá</th>
      <th scope="col" style="width: 7%">Số lượng</th>
      <th scope="col" style="width: 7%">Bảo hành</th>
      <th scope="col" style="width: 7%">Mã kho</th>
      <th scope="col" colspan="2" style="width: 10%">Ngày nhập</th>
      <th scope="col" style="width: 10%">Thành tiền</th>
    </tr>
  </thead>
  <tbody id="table-ncc">
    {{$tong = 0}}
    @foreach ($PhieuNhapDetails as $pn)
    <tr>
      <th scope="row" style="vertical-align:middle; text-align: center;">{{ $pn->supplie_id }}</th>
      <td align="center" style="vertical-align: middle;">PN{{ $pn->phieunhap_id }}</td>
      <td align="center" colspan="2" style="vertical-align: middle;">{{ $pn->tenvt }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->donvi }}</td>
      <td align="center" colspan="2" style="vertical-align: middle;">{{ Helper::Tien($pn->dongia) }}  VNĐ</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->soluong }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->baohanh }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->makho }}</td>
      <td align="center" colspan="2" style="vertical-align: middle;">{{ Helper::formatDate($pn->ngaynhap) }}</td>
      <td align="center" colspan="2" style="vertical-align: middle;" >
        {{ Helper::Tien($pn->dongia*$pn->soluong) }}  VNĐ
      </td>
    </tr>
    {{$tong += ($pn->dongia*$pn->soluong) }}
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="12" style="text-align: center;"><span style="font-weight: bold;">Tổng tiền vật liệu nhập:</span></td>
      <td colspan="2" align="center">
        <span  style="font-weight: bold; color: red; font-size: 16px;" id="tongtien_tkbc_nx">{{Helper::Tien($tong)}}</span> VNĐ
      </td>
    </tr>
 </tfoot>
</table>
</body>