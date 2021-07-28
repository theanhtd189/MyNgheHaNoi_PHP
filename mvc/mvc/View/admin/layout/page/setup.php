<div class="content-wrapper">
  <div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6 grid-margin stretch-card align-items-center">
      <div class="card">
        <div class="card-body">
          <h3 class="card-title text-center">Cài Đặt</h3>
          <h4 class="card-description text-center"> Thông tin tài khoản </h4>
          <form class="forms-sample" method="post">
            <div class="form-group row">
              <label for="exampleInputUsername2" class="col-sm-3 col-form-label text-primary">Họ Tên</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="hoten" name="hotem" value="<?=(isset($_SESSION["admin"]))?$_SESSION["admin"]["HoTen"]:""?>" placeholder="Username">
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputEmail2" class="col-sm-3 col-form-label text-primary">Số Điện Thoại</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="sdt" name="sdt" value="<?=(isset($_SESSION["admin"]))?$_SESSION["admin"]["SoDienThoai"]:""?>" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputMobile" class="col-sm-3 col-form-label text-primary">Địa Chỉ</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="dia-chi" name="dia-chi" value="<?=(isset($_SESSION["admin"]))?$_SESSION["admin"]["DiaChi"]:""?>" placeholder="Mobile number">
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputMobile" class="col-sm-3 col-form-label text-primary">Tài Khoản</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="taikhoan" value="<?=(isset($_SESSION["admin"]))?$_SESSION["admin"]["TaiKhoan"]:""?>" placeholder="Mobile number" disabled>
              </div>
            </div>

            <div class="form-check form-check-flat form-check-primary">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input"> Đổi Mật Khẩu <i class="input-helper"></i>
              </label>
            </div>
            <div class="form-group row">
              <label for="exampleInputPassword2" class="col-sm-3 col-form-label text-primary">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" disabled>
              </div>
            </div>
            <div class="form-group row">
              <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label text-primary">Re Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" id="pass_confirm" name="pass_confirm" placeholder="Password" disabled>
              </div>
            </div>
            
            <button type="submit" class="btn btn-primary mr-2">Sửa</button>
            <button class="btn btn-light">Cancel</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      
    </div>
  </div>
</div>