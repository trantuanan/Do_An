@extends('layouts.default')

@section('title', 'Danh sách người dùng')

@section('content')
    @include('flash::message')  
    <p class="h2"><img src="{{ asset('upload/icon/Businessman_30px.png') }}"> Quản lý nhân viên</p>
    <div class="row">
    @can('admin')
    <form class="col-2" action="{{route('admin.create')}}">
            <input type="submit" name="create_user" class="btn btn-success add" value="Thêm user">
    </form>
    @endcan
    <form class="col-10" action="{{route('admin.index')}}" method="GET">
        <div id="search_user">
            <div class="form-row">
                <div class="form-group col-3">
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Email" name="mail_address" value="{{  old('mail_address') }}">
                </div>
                <div class="form-group col-2">
                    <input type="text" class="form-control" id="inputname4" placeholder="Tên" name="name" value="{{  old('name') }}">
                </div>
                <div class="form-group col-3">
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Địa chỉ" name="address" value="{{  old('address') }}">
                </div>
                <div class="form-group col-2">
                    <input type="text" class="form-control" id="inputPassword4" placeholder="Số điện thoại" name="phone" value="{{  old('phone') }}">
                </div>
                <div class="form-group col-2">
                    <input type="submit" name="search" class="btn btn-primary form-control" value="Tìm Kiếm">    
                </div>
            </div>   
        </div>
    </form>
    </div>
    
    <table class="table table-bordered table-dark">
        <thead>
        <tr>
            <th scope="col" class="cot">STT</th>
            <th scope="col" class="cot">Địa chỉ email</th>
            <th scope="col" class="cot">Tên</th>
            <th scope="col" class="cot">Địa chỉ</th>
            <th scope="col" class="cot">Số điện thoại</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <th scope="row">{{ $users->firstItem() + $key }}</th>
                <td>{{ $user->mail_address }}</td>
                <td>{{ Helper::toUpperCase($user->name) }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phone }}</td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {!! $users->links() !!}
@endsection
