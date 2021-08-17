<div class="content container">
    <div class="row" style="background: #fff; margin-top: 2rem; padding-top: 2rem;">
        <div class="col-3 ">
            <div class="wrapper">
                <!-- Sidebar -->
                <nav id="sidebar">
                    <div class="sidebar-header">
                        <h4>Danh Mục Sản Phẩm </h4>
                    </div>

                    <?php ShowDanhMucSanPham($data["arrCategory"]); ?>
                </nav>

            </div>

            <div class="search-price" style="padding:10px; background: aliceblue;">
                <h6>Tìm Kiếm Theo Giá</h6>
                <form action="./search" method="get" accept-charset="utf-8">
                   <ul>
                    
                    <li>
                        <label style="font-size:12px;">
                            <input type="radio"  name="price" value="0-200000"> 0 - 200.000 Đ
                        </label>
                    </li>
                    <li>
                        <label  style="font-size:12px;">
                            <input type="radio"  name="price" value="200000-500000"> 200.000 Đ -> 500.000 Đ
                        </label>
                    </li>
                    <li>
                        <label style="font-size:12px;">
                            <input type="radio"  name="price" value="500000-1000000"> 500.000 Đ -> 1.000.000 Đ
                        </label>
                    </li>
                    <li>
                        <label style="font-size:12px;">
                            <input type="radio"  name="price" value="1000000-5000000"> 1.000.000 Đ -> 5.000.000 Đ
                        </label>
                    </li>
                    <li>
                        <label style="font-size:12px;">
                            <input type="radio"  name="price" value="5000000"> Trên 5.000.000 Đ
                        </label>
                    </li>
                    
                </ul>
                <button class="btn btn-success">Tìm kiếm</button>
                </form>
            </div>
        </div>
        <div class="col-9">
            <h3 class="text-center"><?= (isset($data["category"]))?$data["category"]["TenDanhMuc"]:"Sản phẩm nổi bật"?></h3>
            <div class="row">
                <?php if (isset($data["arrProduct"]) && sizeof($data["arrProduct"]) > 0) :?>
                    <?php foreach ($data["arrProduct"] as $key) :?>
                        <div class="col-4">
                            <div class="product">
                                <div class="img">
                                    <div class="img-product" style="background-image: url(./public/upload/images/<?=$key['AnhChinh']?>);"></div>
                                    <div class="information ">

                                        <div class="view">
                                            <a href="./SanPham/get/<?=$key["Slug"]?>" tabindex="0"><i class="fa fa-eye" style="font-size: 12px;"></i> Chi tiết </a>
                                            <a  class="listproduct " onclick="SweetAlterDetailProduct('<?=$key["MaSP"]?>')"><i class="fa fa-shopping-cart"></i> Giỏ Hàng </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="info">
                                    <p class="name text-center"><a href="./SanPham/get/<?=$key["Slug"]?>" tabindex="0"><?=$key["TenSp"]?></a>  </p>

                                    <p class="price  text-center m-0">
                                        <span><?=$key["XuatXu"]?></span>
                                    </p>

                                </div>

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
                                <a class="page-link" href="./danhmuc/get/<?=$data['category']['Slug']?>&page=<?=($page-1)?>" tabindex="-1" aria-disabled="true">Previous</a>
                            </li>
                        <?php endif ?>
                        <?php for($i = 1 ; $i<=$data["so_trang"] ; $i++): ?>
                            <li class="page-item">
                                <a class="page-link <?= ($i==$page)?'bg-dark text-light':'' ?>" href="./danhmuc/get/<?=$data['category']['Slug']?>&page=<?=$i?>"><?=$i?></a>
                            </li>
                        <?php endfor ?>
                        <?php if($page < $data["so_trang"]): ?>
                            <li class="page-item">
                                <a class="page-link" href="./danhmuc/get/<?=$data['category']['Slug']?>&page=<?=($page+1)?>">Next</a>
                            </li> 
                        <?php endif ?>
                    </ul>
                </div>
            <?php endif ?>

        </div>
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
              <img src="./public/upload/images/<?=$banchay['AnhChinh']?>" alt="Tủ quần &#225;o" class="img-fluid">
              <div class="information ">
                <div class="view">
                  <a href="./SanPham/get/<?=$banchay['Slug']?>"><i class="fa fa-eye" style="font-size: 12px;"></i></i> Chi tiết</a>
<!--  -->
                <a href="javascript:;" onclick="SweetAlterDetailProduct('<?=$key["MaSP"]?>')" class="listproduct" tabindex="0"><i class="fa fa-shopping-cart"></i>Thêm Vào Giỏ Hàng</a>
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