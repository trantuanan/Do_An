<!-- Đăng nhập -->
<div class="modal fade login-register" id="exampleModalCenter-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle"> ĐĂNG NHẬP TÀI KHOẢN </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email đăng nhập</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Mật khẩu</label>
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <div class="form-group form-check">
		    <input type="checkbox" class="form-check-input" id="exampleCheck1">
		    <label class="form-check-label" for="exampleCheck1">Nhớ tài khoản này?</label>
		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Đăng nhập</button>
        <a href="#">Quên mật khẩu</a>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Đăng ký -->
<div class="modal fade login-register bd-example-modal-lg" id="exampleModalCenter-register" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalCenterTitle"> ĐĂNG KÝ TÀI KHOẢN </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
      <div class="form-row">
        <div class="form-group col">
          <label for="exampleInputEmail2">Địa chỉ Email</label>
          <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Nhập email">
        </div>
        <div class="form-group col">
          <label for="exampleInputPassword4">Họ tên</label>
          <input type="text" class="form-control" id="exampleInputPassword4" placeholder="Họ tên">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col">
          <label for="exampleInputPassword2">Mật khẩu</label>
          <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Nhập mật khẩu">
        </div>
        <div class="form-group col">
          <label for="exampleInputPassword3">Nhập lại mật khẩu</label>
          <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Nhập lại mật khẩu">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col">
          <label for="exampleInputPassword5">Ngày sinh</label>
          <input type="date" class="form-control" id="exampleInputPassword5">
        </div>
        <div class="form-group col">
          <label for="exampleInputPassword5">Giới tính</label>
          <select class="form-control">
            <option checked>Nam</option>
            <option>Nữ</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword6">Địa chỉ</label>
        <input type="text" class="form-control" id="exampleInputPassword6" placeholder="Nhập địa chỉ">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword7">Số điện thoại</label>
        <input type="text" class="form-control" id="exampleInputPassword7" placeholder="Nhập số điện thoại">
      </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Đăng ký tài khoản</button>
      </div>
      </form>
    </div>
  </div>
</div>