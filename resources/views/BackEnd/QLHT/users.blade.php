@extends('BackEnd')

@section('title', 'Quản lý tài khoản')

@section('content-backend')
    @include('flash::message')  
    <p class="h2"><img src="{{ asset('upload/icon/Businessman_30px.png') }}"> Quản lý đăng nhập</p>
    
    <div class="row">
        <form class="col-2" action="{{route('quanlytaikhoan.create')}}">
                <input type="submit" class="btn btn-success add" value="Thêm user">
                <button type="button" class="btn btn-danger" id="btn-delete-tk">Xóa</button>
        </form>
        <form class="col-10" action="{{route('quanlytaikhoan.index')}}" method="GET">
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
            <th scope="col" style="width: 2%"><input type="checkbox" name="select-all" id="select-all"></th>
            <th scope="col" class="cot">Địa chỉ email</th>
            <th scope="col" class="cot">Tên</th>
            <th scope="col" style="width: 6%">Giới tính</th>
            <th scope="col" style="width: 10%">Ngày sinh</th>
            <th scope="col" style="width: 9%">CMND</th>
            <th scope="col" style="width: 25%">Địa chỉ</th>
            <th scope="col" class="cot">Số điện thoại</th>
            <th scope="col" style="width: 5%">Sửa</th>
        </tr>
        </thead>
        <tbody id="table-taikhoan">
            @foreach ($users as $key => $user)
            <tr>
                <th scope="row"><input type="checkbox" @if (Auth::user()->id == $user->id) {{ 'disabled' }} @endif data-id="{{ $user->id }}" name="checkbox-1"></th>
                <td>{{ $user->mail_address }}</td>
                <td>{{ $user->name  }}</td>
                <td align="center">{{ Helper::GioiTinh($user->gioitinh) }}</td>
                <td align="center">{{ Helper::formatDate($user->ngaysinh) }}</td>
                <td >{{ $user->cmnd }}</td>
                <td>{{ $user->address }}</td>
                <td align="center">{{ $user->phone }}</td>
                <td align="center"><a id="btn-select-tk" data-id="{{ $user->id }}"><span class="ion-compose tacvu-icon"></span></a></td>
            </tr>
            @endforeach
      </tbody>
    </table>
    {!! $users->links() !!}
@endsection
