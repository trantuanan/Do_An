@extends('layouts.default')

@section('title', 'Thông báo')

@section('content')
<div class="card text-center">
    <h2 class="card-header">
        403
    </h2>
    <div class="card-body">
        <h4 class="card-title">Bạn không có quyền sử dụng chức năng này!</h4>
        <a href="{{ route('home') }}" class="btn btn-primary">Trang chủ</a>
    </div>
</div>
@endsection