


<section class="header">
  <div class="modal fade" id="myModal">
    <div class="modal-dialog ">
      <div class="modal-content ">

        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="modal-title text-success w-100">Giỏ Hàng</h3>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <table class="table table-cart table-bordered ">
            <thead class="table-dark">
              <tr>
                <th width="5%">Mã</th>
                <th width="15%">Hình ảnh</th>
                <th width="20%">Tên sản phẩm</th>
                <th width="10%">Đơn vị</th>
                <th width="10%">Số lượng</th>
                <th width="13%">Giá bán</th>
                <th width="13%">Tổng Tiền</th>
                <th width="5%"></th>
              </tr>
            </thead>
            <tbody class="content_cart">

            </tbody>
            <tfoot>
              <tr>
                <td colspan="5" align="right">Tổng tiền : </td>
                <td colspan="3"> <span  class="tong-tien text-danger">0</span> VND </td>
              </tr>
            </tfoot>
          </table>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">

          <button type="button" class="btn btn-success btn-thanh-toan" onclick="location.href='./thanhtoan'">Thanh Toán</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <div class="container column-one d-flex justify-content-around align-items-center">

    <div class="logo">
      <a href="index.php"><img src="./public/upload/images/icon.png" style="width:auto; height:100%;" alt=""></a>
    </div>
    <div class="search">
      <form action="./search" method="get" accept-charset="utf-8">
        <div class="input-group"> <input type="text" class="form-control input-text" name="val" id="val" placeholder="Tìm kiếm sản phẩm...." aria-label="Recipient's username" aria-describedby="basic-addon2">
          <div class="input-group-append"> <button type="submit" class="btn btn-outline-warning btn-lg" type="button"><i class="fa fa-search"></i></button> </div>
        </div>
      </form>
    </div>
    <div class="hotline">
      Liên hệ : 0123456789
    </div>
    <div class=" btn-menu-phone">
      <button id="btn-menu" class="btn-menu-fixed">
        <span id="span_1"></span>
        <span id="span_2"></span>
        <span id="span_3"></span>
      </button>
    </div>
  </div>

  <div class=" list-menu" style="background: #fff;">
    <ul class="container menu-header ">
      <li class="nav-item">
        <a class="nav-link" href="./TrangChu">Trang chủ</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="./DanhMuc">Sản phẩm</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./TinTuc">Tin tức</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="#lienhe">Liên hệ</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./GioHang">Giỏ hàng</a>
      </li>
      <?php if (!isset($_SESSION["customer"])) :?>
      <li>
        <a class="nav-link" href="./DangNhap">Đăng nhập</a>
      </li>
      <?php endif ?>
      <?php if (isset($_SESSION["customer"])) :?>
      <li class="dropdown">
        
          <a href="javascript:void(0)" style="text-decoration: none;" class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?= $_SESSION["customer"]["TenKh"] ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button" onclick="location.href='./Profile'">Cài Đặt Tài Khoản</button>
            <button class="dropdown-item" type="button" onclick="location.href='./DangXuat'">Đăng Xuất</button>
          </div>
        
      </li>
      <?php endif ?>
      <li>
        <button type="button" class="btn btn-sm btn-cart btn-lg" data-toggle="modal" data-target="#myModal">
          <i class="fa fa-shopping-cart text-success"></i>
          <span class="badge so-luong-hang badge-warning">0</span>
        </button>
      </li>
    </ul>
  </div>
</section>