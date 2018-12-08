@extends('BackEnd')

@section('title', 'Quản lý phân quyền hệ thống')

@section('content-backend')
<div class="role-wrapper">
	<p class="h2"><img src="{{ asset('upload/icon/Checked User Male_30px.png') }}"> Quản lý phân quyền</p>
	<form>
		<div class="select-quyen">
			<label for="exampleFormControlSelect1">Nhóm quyền</label>
			<div class="form-group">
				<div class="row nhom-quyen">
					<div class="col-9">
						<select class="form-control" id="select-pq" name="id">
					    	<option value="0" checked> --- Chọn quyền --- </option>
					    	@foreach ($roles as $role )
		                        <option value="{{ $role->id }}">{{ $role->TenPQ }}</option>
		                    @endforeach
					    </select>
					</div>
					<div class="col-3">
						<button type="button" class="btn btn-success" data-toggle="modal" id="edit-pq" data-target="#modal-suaquyen">Sửa tên</button>
				    </div>		
				</div>
			</div>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-themquyen">Thêm nhóm quyền</button>
			<button type="button" class="btn btn-danger" data-token="{{ csrf_token() }}" id="delete-pq">xóa quyền</button>
		</div>
		<div class="row" id="group-checkbox-quyen">
			<div class="group-quyen col-md-4">
				<h4>Quản lý danh mục</h4>
				<div class="list-QLDM" >
					<p><input type="checkbox" disabled> Danh mục sản phẩm</p>
					<p><input type="checkbox" disabled> Quản lý tin tức</p>
					<p><input type="checkbox" disabled> Quản lý khách hàng</p>
					<p><input type="checkbox" disabled> Quản lý hình ảnh</p>
				</div>
			</div>
			<div class="group-quyen col-md-4">
				<h4>Quản lý đặt hàng</h4>
				<div class="list-QLDM">
					<p><input type="checkbox" disabled> Quản lý sản phẩm đặt</p>
					<p><input type="checkbox" disabled> Quản lý đơn hàng</p>
					<p><input type="checkbox" disabled> Quản lý bảo hành</p>
					<p><input type="checkbox" disabled> Quản lý thiết kế</p>
				</div>
			</div>
			<div class="group-quyen col-md-4">
				<h4>Quản lý sản xuất</h4>
				<div class="list-QLDM">
					<p><input type="checkbox" disabled> Yêu cầu sản xuất</p>
					<p><input type="checkbox" disabled> Quản lý vật tư</p>
					<p><input type="checkbox" disabled> Quản lý tiến độ</p>
					<p><input type="checkbox" disabled> Quản lý sản phẩm</p>
				</div>
			</div>
			<div class="group-quyen col-md-4">
				<h4>Quản lý kho hàng</h4>
				<div class="list-QLDM">
					<p><input type="checkbox" disabled> Yêu cầu nhập/xuất</p>
					<p><input type="checkbox" disabled> Quản lý nhập kho</p>
					<p><input type="checkbox" disabled> Quản lý xuất kho</p>
					<p><input type="checkbox" disabled> Quản lý tồn kho</p>
					<p><input type="checkbox" disabled> Quản lý nhà cung cấp</p>
				</div>
			</div>
			<div class="group-quyen col-md-4">
				<h4>Báo cáo thống kê</h4>
				<div class="list-QLDM">
					<p><input type="checkbox" disabled> Báo cáo tồn kho</p>
					<p><input type="checkbox" disabled> Thống kê sản xuất</p>
					<p><input type="checkbox" disabled> Thống kê website</p>
				</div>
			</div>
			<div class="group-quyen col-md-4">
				<h4>Quản lý hệ thống</h4>
				<div class="list-QLDM">
					<p><input type="checkbox" disabled> Quản lý tài khoản</p>
					<p><input type="checkbox" disabled> Quản lý phân quyền</p>
					<p><input type="checkbox" disabled> Quản lý phản hồi</p>
				</div>
			</div>
		</div>
		<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
		<button type="button" class="btn btn-primary" id="edit-quyen">Lưu lại</button>
	</form>
</div>





<!-- modal thêm quyền -->
<div class="modal fade" id="modal-themquyen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Thêm nhóm quyền</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
            <input type="text" class="form-control" id="TenPQ" name="TenPQ"  placeholder="Tên nhóm quyền">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
        <button type="button" class="btn btn-primary" id="btn-add-quyen">Thêm mới</button>
      </div>     	
      </form>
    </div>
  </div>
</div>

<!-- modal sửa tên quyền -->
<div class="modal fade" id="modal-suaquyen" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle">Sửa tên nhóm quyền</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
      <div class="modal-body">
            <input type="text" class="form-control" id="edit-TenPQ" name="TenPQ" placeholder="Tên nhóm quyền">
            <input type="hidden" value="" id="edit-id" name="id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
        <button type="button" class="btn btn-primary" id="btn-edit-quyen">Lưu thay đổi</button>
      </div>     	
      </form>
    </div>
  </div>
</div>
@endsection