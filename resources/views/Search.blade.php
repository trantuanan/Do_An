@extends('layouts.default')

@section('title', 'Tìm kiếm')

@section('content')
@include('layouts.slide_top')
<div id="search-page">
    <div id="wrapper-website">
        <h2 align="center">TÌM KIẾM </h2>
        <form class="form-tiemkiem">
            <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="timkiem" name="search" placeholder="Tìm kiếm">
                </div>
                <div class="form-group col-md-3">
                  <select id="select_search" class="form-control" name="value_search">
                    <option value="0"> - Chọn - </option>
                    <option value="1"> Sản phẩm </option>
                    <option value="2"> Dịch vụ </option>
                    <option value="3"> Tin tức </option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                </div>
            </div>
        </form>
{{--         <form action="{{route('services.CD')}}" method="GET" id="select_form">
        </form --}}>
        <div class="content_timkiem">
            @yield('content-1')
        </div>
    </div>
</div>
@endsection