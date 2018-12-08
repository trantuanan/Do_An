@extends('layouts.default')

@section('title', 'Thông báo khách hàng')

@section('content')
<div class="container container-customer">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <h2 class="card-header" align="center">{{ __('Thông báo') }}</h2>

                <div class="card-body">

                    @if (session('alert'))
                        <div class="alert alert-success">
                            {{ session('alert') }}
                        </div>
                    @endif
                    <div class="form-group row mb-0" >
                        <a href="{{ route('customer.login') }}" style="margin: auto;" class="logout-btn">{{ __('Xác nhận') }}</a>
                    </div>
                    <form id="logout-form" action="{{ route('customer.logout') }}" method="GET" style="display: none;">
                          @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
