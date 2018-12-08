@extends('BackEnd')

@section('title', 'Thống kê xuất kho')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Pie Chart_30px.png') }}"> Thống kê xuất kho</p>
<div class="row" style="margin-top: 20px;">
    <form class="col-2" action="{{route('baocaotonkho.phieuxuat')}}" method="GET" id="form_loaitk_tkbc">
        <select class="custom-select {{ $errors->has('khohang_id') ? ' is-invalid' : '' }}" name="loai" id="select_loaitk_tkbc">
          <option value="1" {{ ($a['loai'] == 1)? 'selected' : ''}}> Theo phiếu xuất</option>
          <option value="2" {{ ($a['loai'] == 2)? 'selected' : ''}}> Theo vật tư </option>
        </select>
    </form>
    <form class="col-8" action="{{route('baocaotonkho.phieuxuat')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
            	<label for="staticEmail" class="col-sm-2 col-form-label" style="text-align: center;">Từ ngày</label>
                <div class="form-group col-3">
                    <input type="date" class="form-control" name="tungay" value="{{ $a['tungay'] }}">
                </div>
                <label for="staticEmail" class="col-sm-2 col-form-label" style="text-align: center;">Đến ngày</label>
                <div class="form-group col-3">
                    <input type="date" class="form-control" name="denngay" value="{{ $a['denngay'] }}">
                </div>
                <div class="form-group col-2">
                    <button type="submit" class="btn btn-primary form-control"><span class="ion-ios-search-strong"></span> Tìm kiếm</button> 
                </div>
                <input type="hidden" name="loai" value="{{ $a['loai'] }}">
            </div>   
        </div>
    </form>
    <form class="col-2" action="{{route('baocaotonkho.exportPX')}}" method="POST" id="form_khohang_tonkho">
    	 @csrf
    	<input type="hidden" class="form-control" name="tungay" value="{{ $a['tungay'] }}">
    	<input type="hidden" class="form-control" name="denngay" value="{{ $a['denngay'] }}">
      <input type="hidden" name="loai" value="{{ $a['loai'] }}">
        <div class="form-group col-12">
            <button type="submit" class="btn btn-success form-control"><img src="{{ asset('upload/icon/Microsoft Excel_15px.png') }}"> File Excel</button>     
        </div>
    </form>
</div>
@yield('content-1')
@endsection
