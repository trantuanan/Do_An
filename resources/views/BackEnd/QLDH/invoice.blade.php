@extends('BackEnd')

@section('title', 'Quản lý hóa đơn')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Receipt_30px.png') }}"> Quản lý hóa đơn</p>
<div class="row">
    <form class="col-8">
    </form>
    <form class="col-4 " action="{{ route('quanlyhoadon.index') }}" method="GET">
        <div id="search_user">
            <div class="form-row pull-right">
                <div class="form-group col-8">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên khách hàng" name="search" value="{{  old('title') }}">
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
      <th scope="col" style="width: 5%">Mã HĐ</th>
      <th scope="col" style="width: 5%">Mã ĐH</th>
      <th scope="col" style="width: 10%">Khách hàng</th>
      <th scope="col" style="width: 10%">Người tạo</th>
      <th scope="col" style="width: 15%">Mô tả</th>
      <th scope="col" style="width: 10%">Thành tiền</th>
      <th scope="col" style="width: 10%">Thanh toán</th>
      <th scope="col" style="width: 10%">Giảm trừ</th>      
      <th scope="col" style="width: 5%">Thuế</th>
      <th scope="col" style="width: 8%">Trạng thái</th>
      <th scope="col" style="width: 8%">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-hoadon">
    @foreach ($invoices as $key => $iv)
    <tr class="dong">
      <td align="center" style="vertical-align: middle;">{{ $iv->mahd }}</td>
      <td align="center" style="vertical-align: middle;">{{ $iv->madh }}</td>
      <td align="center" style="vertical-align: middle;">{{ $iv->tenkh }}</td>
      <td align="center" style="vertical-align: middle;">{{ $iv->ngtao }}</td>
      <td>{!! substr(strip_tags($iv->mota), 0, 50)!!}{{ strlen(strip_tags($iv->mota)) > 50? '...': ''}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($iv->thanhtien) }} VNĐ</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($iv->thanhtoan) }} VNĐ</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::Tien($iv->giamtru) }} VNĐ</td>
      <td align="center" style="vertical-align: middle;">{{ $iv->thue }}%</td>
      <td align="center" style="vertical-align: middle;">{!! Helper::trangthaiHD($iv->trangthai)!!}</td>
      <td align="center" style="vertical-align: middle;">
        <form action="{{ route('quanlyhoadon.edit',$iv->id) }}" method="GET">
          <button type="submit" class="btn btn-primary btn-sm" id="btn-edit-hoadon"><span class="ion-compose tacvu-icon"></span></button>
        </form>
        <form action="{{ route('quanlyhoadon.destroy',$iv->id) }}" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger btn-sm" id="btn-delete-hoadon"><span class="ion-trash-a tacvu-icon"></span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $invoices->links() !!}

@endsection
