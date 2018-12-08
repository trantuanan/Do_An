@extends('BackEnd')

@section('title', 'Yêu cầu sản xuất')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Maintenance_30px.png') }}"> Yêu cầu sản xuất</p>
<div class="row">
    <form class="col-6" action="{{ route('yeucausanxuat.create') }}">
        <button type="submit" class="btn btn-primary" id="btn-update-donhang">Thêm yêu cầu</button>        
    </form>
    <form class="col-2" action="{{route('yeucausanxuat.index')}}" method="GET" id="form_loaitk_donhang">
        <select class="custom-select {{ $errors->has('khohang_id') ? ' is-invalid' : '' }}" name="loai" id="select_loaitk_donhang">
          <option value="" > Tất cả công đoạn</option>
          <option value="1" {{ ($a['loai'] == 1)? 'selected' : ''}}> Chờ sản xuất </option>
          <option value="2" {{ ($a['loai'] == 2)? 'selected' : ''}}> Đang sản xuất </option>
          <option value="3" {{ ($a['loai'] == 3)? 'selected' : ''}}> Hoàn thành </option>
        </select>
    </form>
    <form class="col-4 " action="{{ route('yeucausanxuat.index') }}" method="GET">
        <div id="search_user">
            <div class="form-row pull-right">
                <div class="form-group col-8">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên yêu cầu" name="search" value="{{  old('title') }}">
                </div>
                <div class="form-group col-4">
                    <input type="submit" class="btn btn-primary form-control" value="Tìm Kiếm">    
                </div>
            </div>   
        </div>
    </form>
</div>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col" style="width: 5%; vertical-align: middle;">Mã Y/C</th>
      <th scope="col" style="width: 10%; vertical-align: middle;">Tên yêu cầu</th>
      <th scope="col" style="width: 15%; vertical-align: middle;">Mô tả</th>
      <th scope="col" style="width: 10%; vertical-align: middle;">Người tạo</th>
      <th scope="col" style="width: 7%; vertical-align: middle;">Đơn hàng</th>
      <th scope="col" style="width: 8%; vertical-align: middle;">Ngày y/c</th>
      <th scope="col" style="width: 7%; vertical-align: middle;">Ngày hẹn (Dự kiến)</th>      
      <th scope="col" style="width: 8%; vertical-align: middle;">Ngày trả (Thực tế)</th>
      <th scope="col" style="width: 8%; vertical-align: middle;">Trạng thái</th>
      <th scope="col" style="width: 8%; vertical-align: middle;">Sản xuất</th>
      <th scope="col" style="width: 5%; vertical-align: middle;">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-donhang">
    @foreach ($ycsx as $key => $yc)
    <tr class="dong">
      <th scope="row" style="vertical-align: middle;">{{ $yc->maycsx }}</th>
      <td>{{ $yc->name }}</td>
      <td>{{ substr(strip_tags($yc->mota), 0, 55)}}{{ strlen(strip_tags($yc->mota)) > 55? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ $yc->ngtao }}</td>
      <td align="center" style="vertical-align: middle;">{{ isset($yc->bill_id)? $yc->madh : '' }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($yc->created_at) }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($yc->ngayhen) }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($yc->ngaytra) }}</td>
      <td align="center" style="vertical-align: middle;">{!! Helper::trangthaisanxuat($yc->trangthai)!!}</td>
      <td align="center" style="vertical-align: middle;">
        @if($yc->trangthai == 1)
        <form action="{{ route('yeucausanxuat.show',$yc->id) }}" method="GET">
          <button type="submit" class="btn btn-success btn-sm"  id="btn_sanxuat_ycsx">Sản xuất</button>
        </form>
        @else
        <span style="color: #E0A800; font-weight: bold;">Đã duyệt</span>
        @endif
      </td>
      <td align="center" style="vertical-align: middle; font-size: 16px;">
        <form action="{{ route('yeucausanxuat.edit',$yc->id) }}" method="GET" style="margin-bottom: 5px;">
          <button type="submit" class="btn btn-primary btn-sm" ><span class="ion-compose tacvu-icon"></span></button>
        </form>
        <form action="{{ route('yeucausanxuat.destroy',$yc->id) }}" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger btn-sm"><span class="ion-trash-a tacvu-icon"></span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
  {!! $ycsx->links() !!}
@endsection
