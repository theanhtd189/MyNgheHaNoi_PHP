
<div class="container" id="container">
  <div class="form-container sign-up-container">
    <form action="./dangnhap/add" method="post">
      <h1>Đăng Ký</h1>
      <!-- <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span>or use your email for registration</span> -->
      <input type="text" name="ho-ten" placeholder="Họ Tên" required="" />
      <input type="text" name="dia-chi" placeholder="Địa chỉ" required="">
      <input type="text" name="phone" placeholder="Số điện thoại" required="" />
      <?php if (isset($_GET["err_phone"])) :?>
        <span style="align-self: baseline ; color: red;" ><?=$_GET["err_phone"]?></span>
      <?php endif ?>
      <input type="email" name="email" placeholder="Email" required="" />
       <?php if (isset($_GET["err_email"])) :?>
        <span style="align-self: baseline ; color: red;" ><?=$_GET["err_email"]?></span>
      <?php endif ?>
      <input type="password" name="password" placeholder="Password" required="" />
      <?php if (isset($_GET["success"]) && $_GET["success"] == "false") :?>
        <span style="align-self: baseline ; color: red;" >Error không thể thêm tài khoản</span>
      <?php endif ?>
      <?php if (isset($_GET["success"]) && $_GET["success"] == "true") :?>
        <span style="align-self: baseline ;" class="text-success" >Đăng ký thành công</span>
      <?php endif ?>
      <button type="submit">Đăng Ký</button>
    </form>
  </div>
  <div class="form-container sign-in-container">
    <form action="dangnhap/check" method="POST">
      <h1>Đăng Nhập</h1>
      <!-- <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
      </div>
      <span>or use your account</span> -->
      <input type="email" name="email" id="email" placeholder="Email" required="" />
      <input type="password" name="password" id="password" placeholder="Password" required="" />
      <?php if (isset($_GET["err"])) :?>
        <span style="align-self: baseline ; color: red;" ><?=$_GET["err"]?></span>
      <?php endif ?>
      <a href="#">Forgot your password?</a>
      <button type="submit">Đăng Nhập</button>
    </form>

  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Welcome Back!</h1>
        <p>Bạn có muốn đăng nhập không !!!</p>
        <button class="ghost" id="signIn">Đăng Nhập</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Bạn có tài khoản chưa !!!</p>
        <button class="ghost" id="signUp">Đăng ký</button>
      </div>
    </div>
  </div>
</div>

