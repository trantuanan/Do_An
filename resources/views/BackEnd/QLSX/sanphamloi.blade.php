@extends('BackEnd')

@section('title', 'Sản xuất lỗi')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Used Product_30px.png') }}"> Sản xuất lỗi</p>

<div class="row" style="margin-top: 15px;">
    <form class="col-8" action="{{ route('quanlysanphamloi.create') }}">
        <input type="submit" class="btn btn-success add" value="Thêm mới">
    </form>
    <form class="col-4" action="{{route('quanlysanphamloi.index')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
                <div class="form-group col-8">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên sản phẩm" name="search" value="{{  old('search') }}">
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
      <th scope="col" style="width: 7%; vertical-align: middle;">Mã SPL</th>
      <th scope="col" style="width: 7%; vertical-align: middle;">Mã TĐSX</th>
      <th scope="col" style="width: 13%; vertical-align: middle;">Sản phẩm</th>
      <th scope="col" style="width: 13%; vertical-align: middle;">Người tạo</th>
      <th scope="col" style="width: 10%; vertical-align: middle;">Số lượng</th>
      <th scope="col" style="width: 10%; vertical-align: middle;">Ngày tạo</th>
      <th scope="col" style="width: 10%; vertical-align: middle;">Ngày bắt dầu</th>
      <th scope="col" style="width: 10%; vertical-align: middle;">Ngày xong</th>
      <th scope="col" style="width: 5%; vertical-align: middle;">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-ttsx">
    @foreach ($spls as $sl)
    <tr>
      <td align="center" style="vertical-align: middle;">{{ $sl->maspl}}</td>
      <td align="center" style="vertical-align: middle;">{{ $sl->matdsx}}</td>
      <td>{{ $sl->tensp}}</td>
      <td align="center" style="vertical-align: middle;">{{ $sl->ngtao}}</td>
      <td align="center" style="vertical-align: middle;">{{ $sl->soluong }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($sl->created_at)}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($sl->ngaybd)}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($sl->ngayht)}}</td>
      <td align="center" style="vertical-align: middle;">
        <form action="{{route('quanlysanphamloi.destroy', $sl->id)}}" method="POST">
          @csrf
          {{ method_field('PUT') }}
          <input type="hidden" name="tdsx_id" value="{{ $sl->tdsx_id}}">
          <input type="hidden" name="soluong" value="{{ $sl->soluong }}">
          <button type="submit" class="btn btn-danger btn-sm"><span class="ion-trash-a tacvu-icon"></span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
