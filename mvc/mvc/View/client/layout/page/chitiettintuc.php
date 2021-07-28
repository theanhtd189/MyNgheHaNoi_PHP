<div class="container sp">
	<div class="alert ketnoitrang ml-3 mr-3 mb-3" role="alert">
		<a href="#">Trang chủ</a> <span>/</span>
		<a href="#"> Tin tức</a>
	</div>

	<div class="row">
		<div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 chi-tiet-tin-tuc">
			<h1 class="title-tin-tuc"><?=$data["tintuc"]["TieuDe"]?></h1>
			<?=$data["tintuc"]["NoiDung"]?>

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
									<a href="./sanpham/get/<?=$banchay['Slug']?>"><img class="mr-3 hvr-grow" src="./public/upload/images/<?=$banchay['AnhChinh']?>"
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