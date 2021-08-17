<div class="container sp">
    <div class="alert ketnoitrang" role="alert">
        <a href="#">Trang chủ</a>
        <a href="#">/ Sản phẩm</a>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <div class="img-product" style="background-image: url(./public/upload/images/<?= (isset($data['product']['AnhChinh'])) ? $data['product']['AnhChinh'] : ''?>);"></div>
                </div>

                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                    <h3 id="ten-sp"><?= (isset($data["product"]["TenSp"])) ? $data["product"]["TenSp"] : ""?></h3>
                    <div class="box-info">
                        <p><strong>Xuất xứ</strong>: <?= (isset($data["product"]["XuatXu"])) ? $data["product"]["XuatXu"] : ""?></p>
                        <p>
                            <strong>Giá</strong>:
                            <?php if(isset($data["product"]["details"]) && sizeof($data["product"]["details"]) > 0): ?>
                            <?= number_format(ceil( (int)$data["product"]["details"][0]["GiaBan"] - ((int)$data["product"]["details"][0]["GiaBan"] * ((int)$data["product"]["details"][0]["GiamGia"] / 100)))) ?>
                            <sup>đ</sup>
                            <?php if ($data["product"]["details"][0]["GiamGia"] != 0 ) :?>
                                <span class="old-price"><?=$data["product"]["details"][0]["GiaBan"]?><sup>đ</sup></span>
                            <?php endif ?>
                        <?php endif ?>
                    </p>
                    <p><strong>Mã sản phẩm</strong>: <?= (isset($data["product"]["MaSP"])) ? $data["product"]["MaSP"] : ""?></p>
                    <p><strong>Đơn vị tính</strong>: <?= (isset($data["product"]["DonViTinh"])) ? $data["product"]["DonViTinh"] : ""?></p>
                    <p><strong>Tình trạng</strong>: <span class="text-primary">Còn hàng</span></p>

                </div>
                <div class="more-info">
                    Liên hệ trực tiếp hotline: <strong style="width:auto;">123 456</strong> để nhận được sự tư vấn
                    tốt nhất
                    về các sản phẩm của chúng tôi.
                </div>

                <section class="order" style="margin-top: 10px;">

                    <div class="form-group row">
                        <label for="quantity" class="col-sm-4 col-form-label">Số lượng</label>
                        <div class="col-sm-4">
                            <input type="hidden" name="temp_id" value="13">
                            <input type="number" class="form-control" id="quantity" min="1" name="quantity" value="1">
                        </div>
                    </div>
                    <div class="form-group row" style="margin-bottom: 10px;">
                        <label for="property" class="col-sm-4 col-form-label">Kích cỡ</label>
                        <div class="col-sm-8">
                            <select class="custom-select" id="property" name="property">
                                <?php if (isset($data["product"]["details"]) && sizeof($data["product"]["details"]) > 0)  : ?>
                                <?php foreach ($data["product"]["details"] as $key) :?>
                                    <option value="<?= $key['ID']?>"><?= $key["LoaiSize"]?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select> 
                    </div>
                </div>

                <div class="control">
                    <button type="submit" class="btn btn-add-cart btn-secondary"><i class="fa fa-cart-plus"
                       aria-hidden="true"></i>Thêm Giỏ Hàng
                   </button>
                   
            </div>

        </section>
    </div>
</div>

<div class="row" style=" padding-top: 2rem;">
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#mota" style="text-decoration: none; padding: .5rem;">Mô
        Tả</a></li>
        <li><a data-toggle="tab" href="#information-product" style="text-decoration: none; padding: .5rem;">Chi Tiết
        Sản Phẩm</a></li>

    </ul>

    <div class="tab-content w-100">
        <div id="mota" class="tab-pane fade in active show pt-3">

            <p><?= (isset($data["product"]["MoTa"])) ? $data["product"]["MoTa"] : ""?></p>
        </div>
        <div id="information-product" class="tab-pane fade pt-3">
            <p><?= (isset($data["product"]["ChiTiet"])) ? $data["product"]["ChiTiet"] : ""?></p>
        </div>

    </div>
</div>

<hr style="margin: 2rem 0px;">

<div class=" binh-luan" style="margin-top: 30px;">
    <h2> Bình Luận </h2>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="position: relative; display: flex;">

        <form action="./SanPham/comment/<?=$data["product"]["Slug"]?>" method="post" accept-charset="utf-8" onsubmit="return CheckSession();" class="form-control d-flex align-items-center justify-content-between">
            <label for="comment" id="lb"><img src=".\public\client\image\User.png" id="user"></label>
            <div class="input-group ">
                <input type="text" class="form-control" name="noi-dung-comment" placeholder="Đánh giá ............">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit">Go</button>
                </div>
            </div>
        </form>

    </div>

    <div class="div" style="display:block; margin-left: 1rem; margin-top: 1rem; border:0px">
        <?php if (isset($data["arrComment"]) && sizeof($data["arrComment"]) > 0) :?>
        <?php foreach ($data["arrComment"] as $key ) : ?>
            <div class="media">
                <div class="media-left">
                    <img src="./public/client/images/user/user_01.jpg" class="media-object" style="width:60px">
                </div>
                <div class="media-body ml-2">
                    <h4 class="media-heading" style="font-size: 1rem;"><?=$key["TenKh"]?></h4>
                    <p><?=$key["NoiDung"]?></p>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</div>
<?php $page = (isset($_GET["page"]))?$_GET["page"]:1; ?>
<?php if ($page > 0 && $page<=$data["so_trang"]):?>
    <div class="d-flex justify-content-center align-items-center">
        <ul class="pagination justify-content-center">
            <?php if($page > 1): ?>
                <li class="page-item disabled">
                    <a class="page-link" href="./TinTuc&page=<?=($page-1)?>" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
            <?php endif ?>
            <?php for($i = 1 ; $i<=$data["so_trang"] ; $i++): ?>
                <li class="page-item">
                    <a class="page-link <?= ($i==$page)?'bg-dark text-light':'' ?>" href="./TinTuc&page=<?=$i?>"><?=$i?></a>
                </li>
            <?php endfor ?>
            <?php if($page < $data["so_trang"]): ?>
                <li class="page-item">
                    <a class="page-link" href="./TinTuc&page=<?=($page+1)?>">Next</a>
                </li> 
            <?php endif ?>
        </ul>
    </div>
<?php endif ?>
</div>

</div>


<div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">

    <section class="camket-right border">
        <div class="title-section">Cam kết</div>
        <ul class="list-unstyled p-3">
            <li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Xuất xứ chính hãng 100%</li>
            <li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Được phép kiểm tra hàng</li>
            <li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Hoàn tiền nếu không đúng như mô tả</li>
            <li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Không hàng giả, hàng kém chất lượng</li>
            <li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Dịch vụ chuyên nghiệp</li>
            <li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Giá cả cạnh tranh</li>
        </ul>
    </section>
    <?php if (isset($data["arrProductBanChay"]) && sizeof($data["arrProductBanChay"]) >0) : ?>
    <section class="news sidebar border mb-3">
        <div class="title-section">Sản phẩm bán chạy</div>
        <ul class="list-unstyled row">
            <?php foreach ($data["arrProductBanChay"] as $banchay ): ?>
                <li class="animated zoomInUp slow delay-1 col-12 col-md-6 col-lg-12">
                    <div class="pt-3 mb-3">
                        <div class="media">
                            <a href="./SanPham/get/<?=$banchay['Slug']?>"><img class="mr-3 hvr-grow" src="./public/upload/images/<?=$banchay['AnhChinh']?>"
                             style="width: 64px;height: 64px;object-fit: cover"></a>
                             <div class="media-body">
                                <h5 class="mt-0"><a href="./SanPham/get/<?=$banchay['Slug']?>"><?=$banchay["TenSp"]?></a></h5>
                                <a href="./SanPham/get/<?=$banchay['Slug']?>">Xem ngay</a>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endforeach ?>
        </ul>
    </section>
<?php endif ?>


</div>
</div>

<?php if (isset($data["arrProduct"]) && sizeof($data["arrProduct"]) >0) : ?>
<div class="container san-pham-noi-bat">
  <div class="product">
    <h2>Sản Phẩm Nổi Bật</h2>
    <div class="product-slider">
      <div class="regular slider">
        <?php foreach ($data["arrProduct"] as $key ): ?>
          <div>
            <div class="product">
              <div class="img">
                <img src="./public/upload/images/<?=$key['AnhChinh']?>" alt="Tủ quần &#225;o" class="img-fluid">
                <div class="information ">
                  <div class="view">
                    <a href="./SanPham/get/<?=$key['Slug']?>"><i class="fa fa-eye" style="font-size: 12px;"></i></i> Chi tiết</a>
                    <a  class="listproduct " onclick="SweetAlterDetailProduct('<?=$key["MaSP"]?>')"><i class="fa fa-shopping-cart"></i> Giỏ Hàng </a>
                </div>
            </div>
        </div>
        <div class="info">
            <p class="name text-center"><a href="./SanPham/get/<?=$key['Slug']?>"> <?=$key["TenSp"]?></a>  </p>

            <p class="price  text-center m-0">
              ( <?=$key["XuatXu"]?> )
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
