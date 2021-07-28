<div class="container sp">
    <div class="alert ketnoitrang ml-3 mr-3 mb-3" role="alert">
      <a href="#">Tin tức</a>
    </div>

    <div class="row mt-3" >
     <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 ">
      <?php if (isset($data["arrPost"]) && sizeof($data["arrPost"]) > 0) :?>
      <?php foreach ($data["arrPost"] as $key) : ?>
        <div class="row" id="row-tintuc">
          <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-3 pl-md-0">
            <div id="img-tintuc">
              <img src="./public/upload/images/<?=$key["image"]?>" style="width:100%; height:100%" alt="">
            </div>
          </div>

          <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-9" style="text-overflow: ellipsis;">
            <div id="thongtin-tintuc">
              <a href="./tintuc/get/<?=$key["slug"]?>"><?=$key["TieuDe"]?></a>
              <p><?=$key["MoTa"]?></p>
            </div>
          </div>
        </div>
      <?php endforeach ?>
      <?php endif ?>
        
          <?php $page = (isset($_GET["page"]))?$_GET["page"]:1; ?>
            <?php if ($page > 0 && $page<=$data["so_trang"]):?>
                <div class="d-flex justify-content-center align-items-center">
                    <ul class="pagination justify-content-center">
                        <?php if($page > 1): ?>
                            <li class="page-item disabled">
                                <a class="page-link" href="./tintuc&page=<?=($page-1)?>" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                        <?php endif ?>
                        <?php for($i = 1 ; $i<=$data["so_trang"] ; $i++): ?>
                            <li class="page-item">
                                <a class="page-link <?= ($i==$page)?'bg-dark text-light':'' ?>" href="./tintuc&page=<?=$i?>"><?=$i?></a>
                            </li>
                        <?php endfor ?>
                        <?php if($page < $data["so_trang"]): ?>
                            <li class="page-item">
                                <a class="page-link" href="./tintuc&page=<?=($page+1)?>">Next</a>
                            </li> 
                        <?php endif ?>
                    </ul>
                </div>
            <?php endif ?>

     

     </div>


      <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">

        <section class="camket-right border">
          <div class="title-section">Cam kết</div>
          <ul class="list-unstyled p-3">
					<li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Xuất xứ chính hãng 100%</li>
					<li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Hoàn tiền nếu không đúng trong ảnh</li>
					<li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Dịch vụ chuyên nghiệp</li>
					<li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Được phép kiểm hàng</li>
					<li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Không hàng giả, kém chất lượng</li>
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
                            <a href="./sanpham/get/<?=$banchay['Slug']?>">
                              <img class="mr-3 hvr-grow" src="./public/upload/images/<?=$banchay['AnhChinh']?>"
                             style="width: 64px;height: 64px;object-fit: cover"></a>
                             <div class="media-body">
                                <h5 class="mt-0"><a href="./sanpham/get/<?=$banchay['Slug']?>"><?=$banchay["TenSp"]?></a></h5>
                                <a href="./sanpham/get/<?=$banchay['Slug']?>">Xem ngay</a>
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

  </div>