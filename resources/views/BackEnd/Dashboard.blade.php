@extends('BackEnd')

@section('title', 'Hệ thống quản trị')

@section('content-backend')
<div class="row dashboard" style="margin-top: 15px;">
  @foreach($vl as $t)
    <div class="col-3">
      <div class="card" style="width: 100%;">
        <div class="card-body" >
          <div style="display: inline-block;">
            <div class="icon-donhang-dashboard row" >
              <div class="col-5">
                 <img src="{{ asset('upload/icon/Shopping Cart_96px.png') }}" style="background-color: #A8C77B;">
              </div>
              <div class="form-group col-7">
                <p>Đơn hàng</p>
                <h3><strong>{{$t->tongdh}}</strong></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card" style="width: 100%;">
        <div class="card-body" >
          <div style="display: inline-block;">
            <div class="icon-donhang-dashboard row" >
              <div class="col-5">
                 <img src="{{ asset('upload/icon/Maintenance_96px.png') }}" style="background-color: #92C3E3;">
              </div>
              <div class="form-group col-7">
                <p>Đã sản xuất</p>
                <h3><strong>{{$t->soluongsx}}</strong></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card" style="width: 100%;">
        <div class="card-body" >
          <div style="display: inline-block;">
            <div class="icon-donhang-dashboard row" >
              <div class="col-5">
                 <img src="{{ asset('upload/icon/Tags_96px.png') }}" style="background-color: #E17F90;">
              </div>
              <div class="form-group col-7">
                <p>Sản phẩm</p>
                <h3><strong>{{$t->tongsp}}</strong></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card" style="width: 100%;">
        <div class="card-body" >
          <div style="display: inline-block;">
            <div class="icon-donhang-dashboard row" >
              <div class="col-5">
                 <img src="{{ asset('upload/icon/Chat_96px.png') }}" style="background-color: #B9BABA;">
              </div>
              <div class="form-group col-7">
                <p>Phản hồi</p>
                <h3><strong>{{$t->tongph}}</strong></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>

<div class="row dashboard" style="margin-top: 25px;">

  <div class="col-9">
    <div class="card" style="width: 100%;">
      <div class="card-body" >
        <div>{!! $chart->container() !!}</div>

       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
       {!! $chart->script() !!}
      </div>
    </div>
  </div>

  <div class="col-3">
    <div class="card" style="width: 100%; max-height: 465px; overflow-y: scroll;">
      <div class="card-body" >
        <div class="row">
        @foreach($users as $user)
          <div class="col-4 " style="padding: 0px !important;">
            <div class="anh-dd">
                <img id="anh-auth" data-id="" src="{{ asset('/upload/avatarNV') }}/{{ $user->anh }}">
            </div>
          </div>
          <div class="col-8" style="padding: 0px !important;">
            <h6>{{ $user->name }}</h6>
            @if($user->isOnline())
              <p ><span class="trangthai-online">Online</span></p>
            @else
              <p ><span class="trangthai-offline">Offline</span></p>
            @endif
          </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
