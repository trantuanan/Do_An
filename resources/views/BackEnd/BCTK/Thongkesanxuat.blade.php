@extends('BackEnd')

@section('title', 'Thống kê sản xuất')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Pie Chart_30px.png') }}"> Thống kê sản xuất</p>
<div class="row" style="margin-top: 20px;">
    <form class="col-2" action="{{route('thongkesanxuat.index')}}" method="GET" id="form_loaitk_tkbc">
        <select class="custom-select {{ $errors->has('khohang_id') ? ' is-invalid' : '' }}" name="loai" id="select_loaitk_tkbc">
          <option value="1" {{ ($a['loai'] == 1)? 'selected' : ''}}> Thực tế sản xuất </option>
          <option value="2" {{ ($a['loai'] == 2)? 'selected' : ''}}> Sản phẩm lỗi </option>
        </select>
    </form>
    <form class="col-2" action="{{route('baocaotonkho.export')}}" method="POST" id="form_khohang_tonkho">
    	 @csrf

        <div class="form-group col-12">
            <button type="submit" class="btn btn-success form-control"><img src="{{ asset('upload/icon/Microsoft Excel_15px.png') }}"> File Excel</button>     
        </div>
    </form>
</div>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col" style="width: 5%; vertical-align: middle;">Mã phiếu</th>
      <th scope="col" style="width: 5%; vertical-align: middle;">Mã TDSX</th>
      <th scope="col" style="width: 5%; vertical-align: middle;">Mã SP</th>
      <th scope="col" style="width: 12%; vertical-align: middle;">Tên sản phẩm</th>
      <th scope="col" style="width: 5%">Số lượng</th>
      <th scope="col" style="width: 8%">Ngày sản xuất</th>
      <th scope="col" style="width: 8%">Ngày hoàn thành</th>
      <th scope="col" style="width: 8%">Người tạo</th>
    </tr>
  </thead>
  <tbody >
    @foreach ($ttsxs as $tt)
    <tr>
      <td align="center" style="vertical-align: middle;">{{ (isset($tt->mattsx))? $tt->mattsx : $tt->maspl }}</td>
      <td align="center" style="vertical-align: middle;">{{ $tt->matdsx}}</td>
      <td align="center" style="vertical-align: middle;">{{ $tt->masp}}</td>
      <td>{{ $tt->tensp}}</td>
      <td align="center" style="vertical-align: middle;">{{ $tt->soluong }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($tt->ngaybd)}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($tt->ngayht)}}</td>
      <td align="center" style="vertical-align: middle;">{{ $tt->ngtao}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
