
<?php 
$id = isset($_SESSION['customer'])?$_SESSION['customer']['ID']:header("Location: index.php"); 
?>


<div class="container profile">
    <h2 class="text-center">THÔNG TIN TÀI KHOẢN </h2>
    <?php if (isset($_GET["err"])) :?>
        <span style="align-self: baseline ; color: red;" ><?=$_GET["err"]?></span>
      <?php endif ?>
      <?php if (isset($_GET["success"])) :?>
        <span style="align-self: baseline ; color: blue;" ><?=$_GET["success"]?></span>
      <?php endif ?>
    <form action="./Profile/update" method="post" style="margin-top: 50px">
    <div>
        <div class="form-group row mt-md-5 mt-3">
            <label for="ho-ten" class="col-sm-3 col-form-label">
                Họ Và Tên :
            </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" required="" value="<?=(isset($_SESSION['customer']))?$_SESSION['customer']['TenKh']:'' ?>" id="ho-ten" name="ho-ten">
            </div>
        </div>
        <div class="form-group row mt-md-5 mt-3">
            <label for="ho-ten" class="col-sm-3 col-form-label">
                Email :
            </label>
            <div class="col-sm-9">
                <input type="email" class="form-control" required="" value="<?=(isset($_SESSION['customer']))?$_SESSION['customer']['Email']:'' ?>" id="email" name="email">
            </div>
        </div>
        <div class="form-group row mt-md-5 mt-3">
            <label for="sdt" class="col-sm-3 col-form-label">
                Số Điện Thoại :
            </label>
            <div class="col-sm-9">
                <input type="text" required="" value="<?=(isset($_SESSION['customer']))?$_SESSION['customer']['SDT']:'' ?>" class="form-control" id="sdt" name="sdt">
            </div>
        </div>
        <div class="form-group row mt-md-5 mt-3">
            <label for="dia-chi" class="col-sm-3 col-form-label">
                Địa Chỉ  :
            </label>
            <div class="col-sm-9">
                <input type="text" required="" value="<?=(isset($_SESSION['customer']))?$_SESSION['customer']['DiaChi']:'' ?>" class="form-control" id="dia-chi" name="dia-chi">
            </div>
        </div>
        <div class="form-group row mt-md-5 mt-3">
            <label for="pttt" class="col-sm-3 col-form-label">
                Phương thức thanh toán (<span style="color: red; font-size: 1rem;">*</span>):
            </label>
            <div class="col-sm-9 align-items-center d-flex">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" checked="" name="pttt" id="ttknh" value="0">
                    <label class="form-check-label" for="ttknh">Thanh toán khi nhận hàng </label>
                </div>
                <!-- <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="pttt" id="ck" value="1">
                    <label class="form-check-label" for="ck">Chuyển khoản</label>
                </div> -->

            </div>
        </div>
        <p class="text-left margin">Nhập mật khẩu mới nếu bạn muốn thay đổi mật khẩu</p>
        <div class="form-group row mt-md-5 mt-3">
            <label for="dia-chi" class="col-sm-3 col-form-label">
                Mật khẩu mới  :
            </label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="p1" name="p1">
            </div>
        </div>
        <div class="form-group row mt-md-5 mt-3">
            <label for="dia-chi" class="col-sm-3 col-form-label">
                Xác nhận mật khẩu  :
            </label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="p2" name="p2">
            </div>
        </div>
</div>
        <div class="d-flex justify-content-end p-1 mt-4 ">
          <div class="m-1 p-1 "><button class="update-btn">Cập nhật thông tin</button></div>
        </div>
    </form>
</div>
