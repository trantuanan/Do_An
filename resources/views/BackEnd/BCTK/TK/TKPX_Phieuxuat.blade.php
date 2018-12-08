@extends('BackEnd.BCTK.Thongkephieuxuat')

@section('content-1')
<table class="table table-bordered table-dark table-TKPX">
  <thead>
    <tr>
      <th scope="col" style="width: 3%">STT</th>
      <th scope="col" style="width: 8%">Mã Phiếu</th>
      <th scope="col" style="width: 12%">Người tạo</th>
      <th scope="col" style="width: 12%">Người nhận</th>
      <th scope="col" style="width: 8%">Mã kho</th>
      <th scope="col" style="width: 20%">Ghi chú</th>
      <th scope="col" style="width: 10%">Ngày tạo</th>
      <th scope="col" style="width: 10%">Ngày xuất</th>
      <th scope="col" style="width: 10%">Thành tiền</th>
    </tr>
  </thead>
  <tbody id="table-ncc">
    @foreach ($phieuxuats as $pn)
    <tr>
      <th scope="row" style="vertical-align:middle; text-align: center;">{{ $loop->iteration }}</th>
      <td align="center" style="vertical-align: middle;">{{ $pn->mapx }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->ngtao }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->nguoinhan }}</td>
      <td align="center" style="vertical-align: middle;">{{ $pn->makho }}</td>
      <td align="center" style="vertical-align: middle;">{{ substr(strip_tags($pn->mota), 0, 70)}}{{ strlen(strip_tags($pn->mota)) > 70? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($pn->created_at)}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($pn->ngayxuat) }}</td>
      <td align="center" style="vertical-align: middle;" >
        {{ Helper::Tien($pn->thanhtien) }}
        <input type="hidden" value="{{$pn->thanhtien}}" class="thanhtien_tkbc_nx">
      </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
    <tr>
      <td colspan="7" style="text-align: center;"><span style="font-weight: bold;">Tổng tiền các phiếu xuất:</span></td>
      <td colspan="2" align="center">
        <span  style="font-weight: bold; color: red; font-size: 16px;" id="tongtien_tkbc_nx">0</span> VNĐ
      </td>
    </tr>
 </tfoot>
</table>
@endsection