<div class="container gio-hang">
    <h1 class="text-center text-success gt ">Giỏ hàng của bạn</h1>
    <p class="text-dark text-center">Dưới đây là danh sách các sản phẩm trong giỏ hàng của bạn. Vui lòng xem lại
      danh sách sản phẩm, số lượng và bấm vào thanh toán</p>

    <div style="overflow: auto;">
      <table class="table table-cart table-bordered " >
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
    <div class="d-flex justify-content-end p-1 mb-2 ">
      <div class="m-1 p-1 "><button id="cap-nhat" onclick="location.href='./thanhtoan'">THANH TOÁN</button></div>
    </div>
  </div>





  <?php if (isset($data["arrProductBanChay"]) && sizeof($data["arrProductBanChay"]) >0) : ?>
<div class="container san-pham-ban-chay">
  <div class="product">
    <h2>Sản Phẩm Bán Chạy</h2>
    <div class="product-slider">
      <div class="regular slider">
        <?php foreach ($data["arrProductBanChay"] as $banchay ): ?>
        <div>
          <div class="product">
            <div class="img">
              <img src="./public/upload/images/<?=$banchay["AnhChinh"]?>" alt="Tủ quần &#225;o"c style="position: absolute ; top:0px ; left:0px;">
              <div class="information ">
                <div class="view">
                  <a href="./SanPham/get/<?=$banchay['Slug']?>"><i class="fa fa-eye" style="font-size: 12px;"></i></i> Chi tiết</a>
                  <a  class="listproduct " onclick="SweetAlterDetailProduct('<?=$banchay["MaSP"]?>')"><i class="fa fa-shopping-cart"></i> Giỏ Hàng </a>
                </div>
              </div>
            </div>
            <div class="info">
              <p class="name text-center"><a href="./SanPham/get/<?=$banchay['Slug']?>"><?=$banchay["TenSp"]?></a> </p>

              <p class="price  text-center m-0">
                ( <?=$banchay["XuatXu"]?> )
              </p>

            </div>

          </div>
        </div>
        <?php endforeach ?>
      </div>
    </div>
  </div>
</div>
<?php endif ?>