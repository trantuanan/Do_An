@extends('Customer')

@section('content-1')
<div style="min-height: 500px;">
  <h2>Danh sách đơn hàng</h2>
  @include('flash::message') 
  <div class="row" >
      <form class="form-group col-12" action="{{ route('home') }}">
          <button type="submit" class="btn btn-primary" id="btn-update-donhang">Thêm đơn hàng</button>
          <button type="button" class="btn btn-danger" id="btn-delete-donhang-customer">Xóa</button>
      </form>
  </div>
  <table class="table table-bordered table-dark">
    <thead>
      <tr>
        <th scope="col" style="width: 2%; text-align: center;">chọn</th>
        <th scope="col" style="width: 12%; text-align: center;">Mô tả</th>
        <th scope="col" style="width: 8%; text-align: center;">Tổng tiền</th>
        <th scope="col" style="width: 8%; text-align: center;">Đã trả</th>
        <th scope="col" style="width: 8%; text-align: center;">Giảm trừ</th>
        <th scope="col" style="width: 5%; text-align: center;">Thuế</th>
        <th scope="col" style="width: 8%; text-align: center;">Ngày hẹn</th>
        <th scope="col" style="width: 8%; text-align: center;">Công đoạn</th>
        <th scope="col" style="width: 8%; text-align: center;">Trạng thái</th>
        <th scope="col" style="width: 5%; text-align: center;">Xem</th>
      </tr>
    </thead>
    <tbody id="table-donhang-customer">
     @foreach ($bills as $key => $bl)
      <tr class="dong">
        <th scope="row" style="vertical-align: middle; text-align: center;"><input type="radio" data-tiendo="{{ $bl->tiendo }}" data-id="{{ $bl->id }}" name="radio-sp" @if($bl->tiendo > 1) {{'disabled'}} @endif></th>
        <td>{{ substr(strip_tags($bl->mota), 0, 30)}}{{ strlen(strip_tags($bl->mota)) > 30? '...': ''}}</td>
        <td align="center" style="vertical-align: middle;">{{ Helper::Tien($bl->thanhtien) }}</td>
        <td align="center" style="vertical-align: middle;">{{ Helper::Tien($bl->thanhtoan) }}</td>
        <td align="center" style="vertical-align: middle;">{{ Helper::Tien($bl->giamtru) }}</td>
        <td align="center" style="vertical-align: middle;">{{ $bl->thue }}%</td>
        <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($bl->ngayht) }}</td>
        <td align="center" style="vertical-align: middle;">{!! Helper::tiendo($bl->tiendo) !!}</td>
        <td align="center" style="vertical-align: middle;">{!! Helper::trangthaiDH($bl->trangthai)!!}</td>
        <td align="center" style="vertical-align: middle;"><a class="btn-select-custome"  data-id="{{ $bl->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection