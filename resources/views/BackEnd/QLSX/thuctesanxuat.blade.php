@extends('BackEnd')

@section('title', 'Thực tế sản xuất')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Deployment_30px.png') }}"> Thực tế sản xuất</p>

<div class="row" style="margin-top: 15px;">
    <form class="col-8" action="{{ route('quanlysanphamsx.create') }}">
        <input type="submit" class="btn btn-success add" value="Thêm mới">
    </form>
    <form class="col-4" action="{{route('quanlysanphamsx.index')}}" method="GET">
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
      <th scope="col" style="width: 5%; vertical-align: middle;">Mã TTSX</th>
      <th scope="col" style="width: 5%; vertical-align: middle;">Mã TĐSX</th>
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
    @foreach ($ttsxs as $tt)
    <tr>
      <td align="center" style="vertical-align: middle;">{{ $tt->mattsx}}</td>
      <td align="center" style="vertical-align: middle;">{{ $tt->matdsx}}</td>
      <td>{{ $tt->tensp}}</td>
      <td align="center" style="vertical-align: middle;">{{ $tt->ngtao}}</td>
      <td align="center" style="vertical-align: middle;">{{ $tt->soluong }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($tt->created_at)}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($tt->ngaybd)}}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($tt->ngayht)}}</td>
      <td align="center" style="vertical-align: middle;">
        <form action="{{route('quanlysanphamsx.destroy', $tt->id)}}" method="POST">
          @csrf
          {{ method_field('PUT') }}
          <input type="hidden" name="tdsx_id" value="{{ $tt->tdsx_id}}">
          <input type="hidden" name="soluong" value="{{ $tt->soluong }}">
          <button type="submit" class="btn btn-danger btn-sm"><span class="ion-trash-a tacvu-icon"></span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $ttsxs->links() !!}
@endsection
