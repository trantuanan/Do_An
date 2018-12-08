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
<h4>Thống kê theo phiếu xuất</h4>
<br>
<table class="table table-bordered table-dark table-TKPX">
  <thead>
    <tr>
      <th scope="col" style="width: 3%">STT</th>
      <th scope="col" style="width: 8%">Mã Phiếu</th>
      <th scope="col" colspan="2" style="width: 12%">Người tạo</th>
      <th scope="col" colspan="2" style="width: 12%">Người nhận</th>
      <th scope="col" style="width: 8%">Mã kho</th>
      <th scope="col" colspan="3" style="width: 20%">Ghi chú</th>
      <th scope="col" colspan="2" style="width: 10%">Ngày tạo</th>
      <th scope="col" colspan="2" style="width: 10%">Ngày xuất</th>
      <th scope="col" colspan="2" style="width: 10%">Thành tiền</th>
    </tr>
  </thead>
  <tbody id="table-ncc">
    {{$tong = 0}}
    @foreach ($phieuxuats as $pn)
    <tr>
      <th scope="row" style="vertical-align:middle; text-align: center;">{{ $loop->iteration }}</th>
      <td align="center" style="vertical-align: middle;">PN{{ $pn->id }}</td>
      <td align="center" colspan="2" style="vertical-align: middle;">{{ $pn->ngtao }}</td>
      <td align="center" colspan="2" style="vertical-align: middle;">{{ $pn->nguoinhan }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->makho }}</td>
      <td align="center" colspan="3" style="vertical-align: middle;">{{ substr(strip_tags($pn->mota), 0, 70)}}{{ strlen(strip_tags($pn->mota)) > 70? '...': ''}}</td>
      <td align="center" colspan="2" style="vertical-align: middle;">{{ Helper::formatDate($pn->created_at)}}</td>
      <td align="center" colspan="2" style="vertical-align: middle;">{{ Helper::formatDate($pn->ngayxuat) }}</td>
      <td align="center" colspan="2" style="vertical-align: middle;" >
        {{ Helper::Tien($pn->thanhtien) }} VNĐ
      </td>
    </tr>
    {{$tong += $pn->thanhtien}}
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="14" style="text-align: center;"><span style="font-weight: bold;">Tổng tiền các phiếu:</span></td>
      <td colspan="2" align="center">
        <span  style="font-weight: bold; color: red; font-size: 16px;" id="tongtien_tkbc_nx">{{Helper::Tien($tong)}}</span> VNĐ
      </td>
    </tr>
 </tfoot>
</table>
</body>