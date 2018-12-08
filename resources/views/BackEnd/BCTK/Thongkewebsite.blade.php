@extends('BackEnd')

@section('title', 'Thống kê website')

@section('content-backend')
@include('flash::message')  
<p class="h2"><img src="{{ asset('upload/icon/Pie Chart_30px.png') }}"> Thống kê website</p>
<div class="row" style="margin-top: 20px;">
    <form class="col-2" action="{{route('thongkewebsite.index')}}" method="GET" id="form_loaitk_tkbc">
        <select class="custom-select {{ $errors->has('khohang_id') ? ' is-invalid' : '' }}" name="loai" id="select_loaitk_tkbc">
          <option value="1" {{ ($a['loai'] == 1)? 'selected' : ''}}> Đơn hàng hoàn thành</option>
        </select>
    </form>
</div>
<div style="margin-top: 20px;">{!! $chart->container() !!}</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
 {!! $chart->script() !!}
@endsection
