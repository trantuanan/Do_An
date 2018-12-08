<html>
<head>
  <style> 
    table, td {border:2px solid black} table {border-collapse:collapse}
  </style>
</head>
<body>
@if($a != null)
<h2>Báo cáo tồn kho (Từ {{ $a['tungay'].' đến '.$a['denngay']}} )</h2>
@else 
<h2>Báo cáo tồn kho </h2>
@endif
<br>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col" rowspan="2" > Mã VT</th>
      <th scope="col" rowspan="2" colspan="2" style="width: 10%; vertical-align: middle;">Tên vật tư</th>
      <th scope="col" rowspan="2"style="width: 7%; vertical-align: middle;">Đơn vị</th>
      <th scope="col" rowspan="2" colspan="2"  style="width: 10%; vertical-align: middle;">Đơn giá</th>
      <th scope="col" colspan="3" style="width: 19%">Tồn đầu kỳ</th>
      <th scope="col" colspan="3" style="width: 19%">Nhập kho</th>
      <th scope="col" colspan="3" style="width: 19%">Xuất kho</th>
      <th scope="col" colspan="3" style="width: 19%">Tồn cuối kỳ</th>
    </tr>
    <tr>
      <th scope="col" style="width: 100px">Số lượng</th>
      <th scope="col" colspan="2" style="width: 10%">Thành tiền</th>
      <th scope="col" style="width: 9%">Số lượng</th>
      <th scope="col" colspan="2" style="width: 10%">Thành tiền</th>
      <th scope="col" style="width: 9%">Số lượng</th>
      <th scope="col" colspan="2" style="width: 10%">Thành tiền</th>
      <th scope="col" style="width: 9%">Số lượng</th>
      <th scope="col" colspan="2" style="width: 10%">Thành tiền</th>
    </tr>
  </thead>
  <tbody >
  	@foreach($vattu as $vt)
   <tr>
      <td align="left">{{ $vt->mavt }}</td>
      <td align="center"  colspan="2" style="vertical-align: middle;">{{ $vt->name }}</td>
      <td align="center" style="vertical-align: middle;">{{ $vt->donvi }}</td>
      <td align="center"  colspan="2" style="vertical-align: middle;"><span style="font-weight: bold;">{{ Helper::Tien($vt->dongia)}} VNĐ</span></td>
      <td align="center" ><span style="font-weight: bold;">{{ ($vt->dauky == '')? '0' : $vt->dauky }}</span></td>
      <td align="center" colspan="2" ><span style="font-weight: bold;">{{ Helper::Tien($vt->dauky*$vt->dongia) }} VNĐ</span></td>
      <td align="center" ><span style="font-weight: bold;">{{ $vt->nhap }}</span></td>
      <td align="center" colspan="2" ><span style="font-weight: bold;">{{ Helper::Tien($vt->nhap*$vt->dongia) }} VNĐ</span></td>
      <td align="center" ><span style="font-weight: bold;">{{ $vt->xuat }}</span></td>
      <td align="center" colspan="2" ><span style="font-weight: bold;">{{ Helper::Tien($vt->xuat*$vt->dongia) }} VNĐ</span></td>
      <td align="center" ><span style="font-weight: bold;">{{ $vt->ton }}</span></td>
      <td align="center" colspan="2"><span style="font-weight: bold;">{{ Helper::Tien(($vt->ton)*$vt->dongia) }} VNĐ</td>
   </tr>
   @endforeach
  </tbody>
</table>
</body>