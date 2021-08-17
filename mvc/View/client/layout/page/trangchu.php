<section id="banner-index">

  <div class="banner-slider">
    <div class="banner-slider slider">

    <?php if (isset($data["arrSlide"]) && sizeof($data["arrSlide"]) > 0):?>

      <?php foreach ($data["arrSlide"] as $new ): ?>
        <div>
          <div class="banner-item">
            <div class="img">
              <img class="d-block w-100" src="./public/upload/images/<?=$new["LinkAnh"];?>"/>
            </div>
          </div>
        </div>  
      <?php endforeach ?>

      <?php endif ?>

    </div>
  </div>
</section>



<!---------------------- Bạn nên mua hàng ở chỗ chúng tôi-------------------->
<div class="container ly-do-3">
  <h2 id="lydo-muahang">Lý do bạn nên mua hàng của chúng tôi</h2>
  <div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4 mh">
      <div class="box-muahang">
        <img src="./public/client/image/t1_3.png" alt="" id="img-muahang">
        <p class="tieude-muahang">ĐẢM BẢO CHẤT LƯỢNG</p>
        <p class="noidung-muahang">Quy trình nhập hàng, vận chuyển, bảo quản chuyên nghiệp.</p>
      </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 mh">
      <div class="box-muahang">
        <img src="./public/client/image/t1_4.png" alt="" id="img-muahang">
        <p class="tieude-muahang">ĐỔI TRẢ MIỄN PHÍ</p>
        <p class="noidung-muahang">Đổi trả miễn phí trong 24h khi khách hàng không hài lòng.</p>
      </div>
    </div>

    <div class="col-sm-12 col-md-4 col-lg-4 mh">
      <div class="box-muahang">
        <img src="./public/client/image/t1_5.png" alt="" id="img-muahang">
        <p class="tieude-muahang">GIÁ CẢ CẠNH TRANH</p>
        <p class="noidung-muahang">Chúng tôi luôn đặt lợi ích cho người tiêu dùng lên hàng đầu.</p>
      </div>
    </div>
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
                <div class="img-product" style="background-image: url(./public/upload/images/<?=$key["AnhChinh"]?>);"></div>
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

<?php if (isset($data["arrProductNew"]) && sizeof($data["arrProductNew"]) > 0):?>
<div class="container san-pham-ban-chay">
  <div class="product">
    <h2>Sản Phẩm Mới Nhất</h2>
    <div class="product-slider">
      <div class="regular slider">
        <?php foreach ($data["arrProductNew"] as $new ): ?>
        <div>
          <div class="product">
            <div class="img">
              <div class="img-product" style="background-image: url(./public/upload/images/<?=$new["AnhChinh"]?>);"></div>
              <div class="information ">
                <div class="view">
                  <a href="./SanPham/get/<?=$new['Slug']?>"><i class="fa fa-eye" style="font-size: 12px;"></i></i> Chi tiết</a>
                  <a href="javascript:;" onclick="SweetAlterDetailProduct('<?=$new["MaSP"]?>')" class="listproduct"><i class="fa fa-shopping-cart"></i> Giỏ Hàng </a>
                </div>
              </div>
            </div>
            <div class="info">
              <p class="name text-center"><a href="./SanPham/get/<?=$new['Slug']?>">   <?=$new["TenSp"]?> </a>  </p>
              <p class="price  text-center m-0">
                
                  ( <?=$new["XuatXu"]?> )
                
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
              <div class="img-product" style="background-image: url(./public/upload/images/<?=$banchay["AnhChinh"]?>);"></div>
              <div class="information ">
                <div class="view">
                  <a href="./SanPham/get/<?=$banchay['Slug']?>"><i class="fa fa-eye" style="font-size: 12px;"></i></i> Chi tiết</a>
                  <a href="javascript:;" onclick="SweetAlterDetailProduct('<?=$new["MaSP"]?>')" class="listproduct"><i class="fa fa-shopping-cart"></i> Giỏ Hàng </a>
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


<?php if (isset($data["arrPostsNew"]) && sizeof($data["arrPostsNew"]) > 0) : ?>
<div class="container tin-tuc">
  <h2> Tin tức </h2>
  <div class="row">
    <div class="col-12 col-sm-12 col-md-7">
      <?php $post = $data["arrPostsNew"][0];
        unset($data["arrPostsNew"][0]);
      ?>

      <div class="box">
        <div class="img">
        <a href="./TinTuc/get/<?=$post['slug']?>"><img src="./public/upload/images/<?=$post["image"]?>" alt="<?= $post["TieuDe"] ?>" class="w-100"></a>
        </div>
        <div class="main-content">
          <p class="title">
            <a href="./TinTuc/get/<?=$post['slug']?>">
              <?= $post["TieuDe"] ?>
            </a>
          </p>
          <div class="desc">
            <p><?= $post["MoTa"] ?> ...</p>

          </div>
        </div>
      </div>

    </div>
    <div class="col-12 col-sm-12 col-md-5">
      <ul>
        <?php foreach ($data["arrPostsNew"] as $keyposts): ?>
        <li class="d-flex">
          <div class="img"><a href="./TinTuc/get/<?=$keyposts['slug']?>">
            <img src="./public/upload/images/<?=$keyposts["image"]?>"></a>
          </div>
          <div class="content">
            <p class="title">
              <a href="./TinTuc/get/<?=$keyposts['slug']?>">
                <?= $keyposts["TieuDe"] ?>
              </a>
            </p>
            <div class="desc sub-news-content"><?php $keyposts["MoTa"] ?></div>
          </div>
        </li>
        <?php endforeach ?>
      </ul>
      <div>
        <a href="./TinTuc" class="see-more"> Xem thêm <i class="fas fa-long-arrow-alt-right"></i></a>
      </div>
    </div>
  </div>
</div>
<?php endif ?>
