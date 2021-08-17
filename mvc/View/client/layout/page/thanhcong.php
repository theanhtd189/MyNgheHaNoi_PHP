<div class="container thanhtoan">
    <div class="alert ketnoitrang" role="alert" style="background-color:#e9ecef">
        <a href="#">Trang chủ</a> /
        <a href="#"> Thanh toán</a>
    </div>

    <h2 class="text-center">thanh toán thành công</h2>
    <form action="./ThanhToan/add" method="post" style="margin-top: 50px">
        <div class="form-group row mt-md-5 mt-3">
            <label for="ho-ten" class="col-sm-3 col-form-label">
                Họ Và Tên (<span style="color: red; font-size: 1rem;">người nhận *</span>) :
            </label>
            <div class="col-sm-9">
                <input type="text" class="form-control" required="" value="<?=(isset($_SESSION['customer']))?$_SESSION['customer']['TenKh']:'' ?>" id="ho-ten" name="ho-ten" placeholder="Username">
            </div>
        </div>
        <div class="form-group row mt-md-5 mt-3">
            <label for="sdt" class="col-sm-3 col-form-label">
                Số Điện Thoại (<span style="color: red; font-size: 1rem;">người nhận *</span>) :
            </label>
            <div class="col-sm-9">
                <input type="text" required="" value="<?=(isset($_SESSION['customer']))?$_SESSION['customer']['SDT']:'' ?>" class="form-control" id="sdt" name="sdt" placeholder="Username">
            </div>
        </div>
        <div class="form-group row mt-md-5 mt-3">
            <label for="dia-chi" class="col-sm-3 col-form-label">
                Địa Chỉ (<span style="color: red; font-size: 1rem;">người nhận *</span>) :
            </label>
            <div class="col-sm-9">
                <input type="text" required="" value="<?=(isset($_SESSION['customer']))?$_SESSION['customer']['DiaChi']:'' ?>" class="form-control" id="dia-chi" name="dia-chi"  placeholder="Username">
            </div>
        </div>
        <div class="form-group row mt-md-5 mt-3">
            <label for="ghichu" class="col-sm-3 col-form-label">
                Ghi Chú (<span style="color: red; font-size: 1rem;">*</span>):
            </label>
            <div class="col-sm-9">
                <textarea name="ghichu" required name="ghichi" id="ghichu" rows="5" class="form-control" placeholder="Ghi chú đơn hàng...">
                </textarea>    
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
            <h4 class="text-center text-danger" style="margin-top:50px">Thông tin đơn hàng </h4>
        <div class="row" style="overflow: auto;">
          
            <table class="table" >
               
                <thead>
                    <tr id="tieu-de">
                        <th scope="col">Mã</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn vị tính</th>
                        <th scope="col">Giá Bán</th>
                        <th scope="col">Thành tiền</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($_SESSION["cart"]) && sizeof($_SESSION["cart"]) > 0) : ?>
                    <?php $tong = 0 ?>
                    <?php foreach ($_SESSION["cart"] as $key) :?>
                        <?php $tong += (int)$key["TongTien"]; ?>
                        <tr>
                            <th scope="row" class="thong-tin-giohang"><span><?=$key["ID"]?></span></th>
                            <td id="anh" style="text-align: center;">
                            <div style="width: 150px; height:120px;">
                                <img src="./public/upload/images/<?=$key['AnhChinh']?>" class="w-100 h-100" id="anh-minhhoa" alt="">
                                </div>
                            </td>
                            <td class="thong-tin-giohang"><?=$key["TenSp"] ."( " . $key["LoaiSize"]." )"?></td>
                            <td class="thong-tin-giohang"><?=$key["SoLuongMua"]?></td>
                            <td class="thong-tin-giohang"><?=$key["DonViTinh"]?></td>
                            <td class="thong-tin-giohang gia">
                                <?= number_format(ceil( (int)$key["GiaBan"] - ((int)$key["GiaBan"] * ((int)$key["GiamGia"] / 100)))) ?>
                                
                            </td>
                            <td class="thong-tin-giohang gia"><?=number_format($key["TongTien"])?></td>
                            <td class="thong-tin-giohang"><i class="fa fa-trash" aria-hidden="true"></i></td>
                        </tr>
                    <?php endforeach ?>
                    <?php endif ?>

                </tbody>
            
           
                   

            </table>
     
        </div>
        <table class="table" >
            
                   <tfoot>
                       <tr>
                           <td colspan="6" align="right">Tổng Tiền</td>
                           <td colspan="2" style="color: red;"><?= (isset($tong))?number_format($tong):0 ?><sup>đ</sup></td>
                       </tr>
                       <?php if (isset($_GET["cart"])) :?>
                       <tr>
                           <td colspan="8">
                               
                               <span style="align-self: baseline ; color: red;" >Error : Giỏ hàng không được trống !!!</span>
       
                           </td>
                       </tr>
                       <?php endif ?>
                       <?php if (isset($_GET["success"])) :?>
                       <tr>
                           <td colspan="8">
                               
                               <span style="align-self: baseline ; " class="text-success" >Đặt hàng thành công !!!</span>
       
                           </td>
                       </tr>
                       <?php endif ?>

                       <tr>
                           <td colspan="8" align="right">
                               <button type="submit" id="cap-nhat">MUA HÀNG</button>
                           </td>
                       </tr>

                   </tfoot>

           </table>


        
    </form>
</div>