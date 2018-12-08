@extends('BackEnd')

@section('content-backend')
<!-- modal -->
<div class="modal fade" id="modal-suaNV" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Thông tin nhân viên</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{route('quanlynhanvien.update')}}" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id_nv" name="id" value="">
            <div class="form-group modal-ttnv">
              <div class="form-row">
                <div class="col-5" style="text-align: center;">
                  <div class="AnhNV-modal">
                    <img id="AnhNV-show" name="AnhNV_1" src="{{ asset('upload/img/default_avatar.jpg') }}">
                  </div>
                  <label for="files" class="btn-chonAnh">Select Image</label>
                  <input type="file" name="AnhNV" id="files" style="display: none;" accept="image/*" for="exampleInputPassword1" name="AnhNV">
                </div>

                <div class="col">
                  <div class="form-group">
                    <label >Tên nhân viên</label>
                    <input type="text" class="form-control" id="TenNV-md-nv" placeholder="Tên nhân viên" name="TenNV"></input>
                  </div>
                    <label for="exampleFormControlSelect2">Giới tính</label>
                    <select class="form-control" name="GioiTinh" id="GioiTinh-md-nv">
                      <option value="1">Nam</option>
                      <option value="2">Nữ</option>
                    </select>
                </div>
              </div>
            </div>

            <div class="form-group">
                <label >Quê quán</label>
                <input type="text" class="form-control" id="QueQuan-md-nv" placeholder="quê quán" name="QueQuan" value="">
            </div>

            <div class="form-group">
                <label for="password-tk">Ngày sinh</label>
                <input type="date" class="form-control" id="NgaySinh-md-nv" placeholder="Ngày sinh" name="NgaySinh">
            </div>

            <div class="form-group">
                <label for="taikhoan_confim-tk" >Dân tộc</label>
                <select class="form-control" name="DanToc" id="DanToc-md-nv">
                    <option value="Kinh" checked>Kinh</option>
                    <option value="Ba Na">Ba Na</option>
                    <option value="Brâu">Brâu</option>
                    <option value="Dao">Dao</option>
                    <option value="Tày">Tày</option>
                </select>
            </div>

            <div class="form-group">
                <label for="password-tk">CMND</label>
                <input type="text" class="form-control" id="CMND-md-nv" placeholder="Chứng minh nhân dân" name="CMND">
            </div>

            <div class="form-group">
                <label for="password-tk">Số điện thoại</label>
                <input type="text" class="form-control" id="SDT-md-nv" placeholder="Số điện thoại" name="SDT">
            </div>

            <div class="form-group">
                <label for="password-tk">Thư điện tử</label>
                <input type="mail" class="form-control" id="Mail-md-nv" placeholder="Thư điện tử" name="Mail">
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
        <button type="submit" class="btn btn-primary" id="btn-edit-nv">Lưu thay đổi</button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- nội dụng -->
<p class="h2"><img src="{{ asset('upload/icon/Businessman_30px.png') }}"> Quản lý nhân viên</p>

@include('flash::message')
<nav class="navbar navbar-light bg-light">
    <div>
        <button type="button" class="btn btn-primary" data-toggle="modal" onclick="javascript:location.href='/admin/quanlynhanvien/create'">Thêm mới</button>
        <button type="button" class="btn btn-danger" id="btn-delete-nv">Xóa</button>
    </div>
    <form class="form-inline" method="GET" action="{{ route('quanlynhanvien.index')}}">
        <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm nhân viên" aria-label="Search" name="search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
    </form>
</nav>

<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col" style="width: 2%"><input type="checkbox" name="select-all-nv" id="select-all-nv"></th>
      <th scope="col" style="width: 15%">Tên</th>
      <th scope="col" style="width: 6%">Giới tính</th>
      <th scope="col" style="width: 25%">Quê quán</th>
      <th scope="col" style="width: 8%">Ngày sinh</th>
      <th scope="col" style="width: 8%">Dân tộc</th>
      <th scope="col" style="width: 9%">CMND</th>
      <th scope="col" style="width: 8%">SĐT</th>
      <th scope="col" style="width: 17%">Mail</th>
      <th scope="col" style="width: 5%">Tác vụ</th>
    </tr>
  </thead>
  <tbody id="table-nhanvien">
    @foreach ($nhanvien as $nv)
    <tr>
      <th scope="row"><input type="checkbox" data-id="{{ $nv->id }}" name="checkbox-1"></th>
      <td>{{ $nv->TenNV }}</td>
      <td>{{ Helper::GioiTinh($nv->GioiTinh)}}</td>
      <td>{{ $nv->QueQuan }}</td>
      <td>{{ Helper::formatDate($nv->NgaySinh)}}</td>
      <td>{{ $nv->DanToc }}</td>
      <td>{{ $nv->CMND }}</td>
      <td>{{ $nv->SDT }}</td>
      <td>{{ $nv->Mail }}</td>
      <td align="center"><a href="#" id="btn-select-nv" data-id="{{ $nv->id }}"  data-toggle="modal" data-target="#modal-suaNV"><span class="ion-compose tacvu-icon"></span></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
{!! $nhanvien->links() !!}
@endsection