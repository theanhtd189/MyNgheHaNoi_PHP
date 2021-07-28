
<div class="content container" style="background: #fff;margin-top: 2rem; padding-top: 2rem;">
    <h2 class="text-center">Kết Quả Tìm Kiếm </h2>
    <div class="row">
        <?php if (isset($data["dataProduct"]) && sizeof($data["dataProduct"]) > 0) : ?>
            <?php foreach ($data["dataProduct"] as $key): ?>
                <div class="col-3 mt-3">
                    <div class="product">
                        <div class="img">
                            <img src="./public/upload/images/<?=$key["AnhChinh"]?>" alt="Tủ quần áo" class="img-fluid">
                            <div class="information ">

                                <div class="view">
                                    <a href="./sanpham/get/<?=$key["Slug"]?>" tabindex="0"><i class="fa fa-eye" style="font-size: 12px;"></i> Chi tiết</a>
                                    <a href="javascript:;" onclick="SweetAlterDetailProduct('<?=$key["MaSP"]?>')" class="listproduct" tabindex="0"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <p class="name text-center"><a href="./sanpham/get/<?=$key["Slug"]?>" tabindex="0"><?=$key["TenSp"]?></a>  </p>

                            <p class="price  text-center m-0">
                                <span><?=$key["XuatXu"]?></span>
                            </p>

                        </div>

                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <div class="col-12">
                <p class="text-center">Không tồn tại sản phẩm nào có từ khóa ( <?=$data["input_search"]?> )</p>
            </div>
        <?php endif ?>




    <?php $page = (isset($_GET["page"]))?$_GET["page"]:1; ?>
    <?php if ($page > 0 && $page<=$data["so_trang"]):?>
        <div class="col-12 d-flex justify-content-center align-items-center">
            <ul class="pagination justify-content-center">
                <?php if($page > 1): ?>
                    <li class="page-item disabled">
                        <a class="page-link" href="./search?val=<?=$data['input_search']?>&page=<?=($page-1)?>" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                <?php endif ?>
                <?php for($i = 1 ; $i<=$data["so_trang"] ; $i++): ?>
                    <li class="page-item">
                        <a class="page-link <?= ($i==$page)?'bg-dark text-light':'' ?>" href="./search?val=<?=$data['input_search']?>&page=<?=$i?>"><?=$i?></a>
                    </li>
                <?php endfor ?>
                <?php if($page < $data["so_trang"]): ?>
                    <li class="page-item">
                        <a class="page-link" href="./search?val=<?=$data['input_search']?>&page=<?=($page+1)?>">Next</a>
                    </li> 
                <?php endif ?>
            </ul>
        </div>
    <?php endif ?>


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
                  <a href="./sanpham/get/<?=$banchay['Slug']?>"><i class="fa fa-eye" style="font-size: 12px;"></i></i> Chi tiết</a>
                  <a href="javascript:;" id="156" class="listproduct"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a>
                </div>
              </div>
            </div>
            <div class="info">
              <p class="name text-center"><a href="./sanpham/get/<?=$banchay['Slug']?>"><?=$banchay["TenSp"]?></a> </p>

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