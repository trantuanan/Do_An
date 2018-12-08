@extends('BackEnd')

@section('title', 'Kế hoạch vật tư')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Bulleted List_30px.png') }}"> Kế hoạch vật tư</p>

<div class="row">
    <form class="col-4" action="{{route('kehoachvattu.index')}}" method="GET" style="margin-top: 20px;">
        <div id="search_user">
            <div class="form-row">
                <div class="form-group col-7">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Tên yêu cầu" name="search" value="{{  old('search') }}">
                </div>
                <div class="form-group col-5">
                    <input type="submit" class="btn btn-primary form-control" value="Tìm Kiếm">    
                </div>
            </div>   
        </div>
    </form>
</div>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col" style="width: 5%">Mã KHVT</th>
      <th scope="col" style="width: 5%">Mã YC</th>
      <th scope="col" style="width: 15%">Tên yêu cầu</th>
      <th scope="col" style="width: 13%">Vật tư</th>
      <th scope="col" style="width: 8%">Số lượng</th>
      <th scope="col" style="width: 10%">Đơn vị</th>
      <th scope="col" style="width: 10%">Ngày tạo</th>
      <th scope="col" style="width: 10%">Trạng thái</th>
      <th scope="col" style="width: 10%">Lấy vật tư</th>
      <th scope="col" style="width: 5%">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-vattu">
    @foreach ($khvts as $kh)
    <tr>
      <td align="center" style="vertical-align: middle;">{{ $kh->makhvt}}</td>
      <td align="center" style="vertical-align: middle;">{{ $kh->maycsx}}</td>
      <td>{{ substr(strip_tags($kh->tenyc), 0, 50)}}{{ strlen(strip_tags($kh->tenyc)) > 50? '...': ''}}</td>
      <td>{{ $kh->tenvt}}</td>
      <td align="center" style="vertical-align: middle;">{{ $kh->soluong }}</td>
      <td align="center" style="vertical-align: middle;">{{ $kh->donvi }}</td>
      <td align="center" style="vertical-align: middle;">{{ Helper::formatDate($kh->created_at)}}</td>
      <td align="center" style="vertical-align: middle;">
          {!! Helper::trangthaiSX($kh->trangthai) !!}
      </td>
      <td align="center" style="vertical-align: middle;">
        <div class="col-md-7 tt_cart" style="padding-left: 0px !important; margin: auto;">
          <button type="button" class="btn btn-info btn-sm" >Lấy vật tư</button>
        </div>
      </td>
      <td align="center" style="vertical-align: middle;">
        <form action="{{route('kehoachvattu.destroy', $kh->id)}}" method="POST">
          @csrf
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger btn-sm"><span class="ion-trash-a tacvu-icon"></span></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection
