@extends('layouts.default')

@section('title', 'Khách hàng home')

@section('content')
<div class="customer-page">
    <div id="wrapper-website">
        <div class="row index_customer">
          <div class="col-2 tab-left">
            <div class="brg-menu">
                <div class="nav flex-column nav-pills" aria-orientation="vertical">
                  <a class="nav-link" href="/customer" aria-selected="false">Thông tin khách</a>
                  <a class="nav-link" id="go_customerbill" aria-selected="false">Đơn hàng</a>
                </div>
            </div>
          </div>
          <form method="GET" action="{{ route('customer.bills') }}" id="customer-billindex">
              <input type="hidden" name="id" value="{{ Auth::user()->id }}">
          </form>
          <div class="col-10 cont-right">
            @yield('content-1')
          </div>
        </div>
    </div>
</div>
@endsection


