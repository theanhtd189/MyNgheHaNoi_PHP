<?php if (isset($data["value_product_old"])) {
    # code...
	$old_prod = $data["value_product_old"];
} ?>

<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title"> Sửa Sản Phẩm [ <b>Mã : </b>  <?= (isset($old_prod["MaSP"]))?$old_prod["MaSP"]:''?>  / <b>Tên : </b><?= (isset($old_prod["MaSP"]))?$old_prod["MaSP"]:''?>  ]</h3>
	</div>
	<form action="./admin/product/update/<?= (isset($old_prod["MaSP"]))?$old_prod["MaSP"]:''?> " method="post"  enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title text-center text-danger"> Thông Tin Sản Phẩm</h4>

						
						<div class="form-group">
							<label class="text-primary" for="category_id" >Loại Sản Phẩm</label>
							<select class="form-control" id="category_id" name="category_id">
								<option value="" selected="" >Thuộc loại .........</option>
								<?php showCategories($data["value_category"] , $old_prod["CategoryID"] ); ?>
							</select>
						</div>

						<div class="form-group">
							<label class="text-primary" for="product-ma">Mã Sản Phẩm</label>
							<input type="text" class="form-control" readonly="readonly" id="product-ma" name="product-ma" placeholder="Mã sản phẩm ......" value="<?= (isset($old_prod["MaSP"]))?$old_prod["MaSP"]:''?>">
							<div id="validate_masp" class="invalid-feedback ">

							</div>
						</div>

						<div class="form-group">
							<label class="text-primary" for="product-tieu-de">Tên Sản Phẩm</label>
							<input type="text" class="form-control" id="product-tieu-de" name="product-tieu-de" placeholder="Tiêu đề sản phẩm ......" value="<?= (isset($old_prod["TenSp"]))?$old_prod["TenSp"]:''?>">
							<div id="validate_title" class="invalid-feedback ">

							</div>
						</div>
						
						<div class="form-group">
							<label class="text-primary" for="product-slug">Slug</label>
							<input type="text" class="form-control" id="product-slug" readonly="" name="product-slug" placeholder="" value="<?= (isset($old_prod["Slug"]))?$old_prod["Slug"]:''?>">
						</div>
						<div class="form-group">
							<label class="text-primary" for="product-xuat-xu">Xuất Xứ</label>
							<input type="text" class="form-control" name="product-xuat-xu" id="product-xuat-xu" placeholder="Xuất xứ ......." value="<?= (isset($old_prod["XuatXu"]))?$old_prod["XuatXu"]:''?>">
						</div>
						<div class="form-group" >
							<label class="text-primary" for="product-don-vi-tinh">Đơn Vị Tính</label>
							<input type="text" class="form-control" name="product-don-vi-tinh" id="product-don-vi-tinh" placeholder="Đơn vị tính ......." value="<?= (isset($old_prod["DonViTinh"]))?$old_prod["DonViTinh"]:''?>">
						</div>
						<div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label text-primary">Nổi Bật</label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input text-primary" value="1"<?=(isset($old_prod["NoiBat"]) && $old_prod["NoiBat"] ==1)?"checked":""?> name="product-noi-bat">Có
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input text-primary" <?=(isset($old_prod["NoiBat"]) && $old_prod["NoiBat"] ==0)?"checked":""?> value="0" name="product-noi-bat">Không
                                </label>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">

						<h4 class="card-title text-center text-danger">File</h4>

						<div class="form-group">
							<label class="text-primary">File Ảnh Chính</label>
							<input type="file" name="product-images" id="product-images" class="file-upload-default-image" style="position: absolute ; visibility: hidden;">
							<div class="input-group col-xs-12">
								<input type="text" class="form-control file-upload-info"  placeholder="Upload Image">
								<span class="input-group-append">
									<button class="file-upload-image btn btn-primary" type="button">Upload</button>
								</span>
							</div>
							<div class="hien-thi-image-chinh">
								<img src="./public/upload/images/<?=$old_prod['AnhChinh']?>" alt="">
							</div>
						</div>

						<div class="form-group">
							<label class="text-primary">File ảnh kèm theo</label>
							<input type="file" name="product-list-images[]" id="product-list-img" class="file-upload-default-list-img" style="position: absolute ; visibility: hidden;" multiple="multiple">
							<div class="input-group col-xs-12">
								<input type="text" class="form-control file-upload-info"  placeholder="Upload Image">
								<span class="input-group-append">
									<button class="file-upload-list-image btn btn-primary" type="button">Upload</button>
								</span>
							</div>
							<div id="hien-thi-image-kem-theo">
								<?php
								$list_img = explode(",",$old_prod["ListAnh"]);

								?>
								<?php foreach ($list_img as $key=>$val):?>
									<div>
										<img src="./public/upload/images/<?=trim($val)?>" alt="">
									</div>
								<?php endforeach; ?>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body ">
						<h4 class="card-title text-danger tex">Thông Tin Chi Tiết Sản Phẩm</h4>

						<table id="details-pro" class="table w-100 table-detaileproduct mb-4 table-detaledproducts">
							<thead class="thead-dark">
								<tr>
									<th width="5%">#</th>
									<th width="20%">Loại/Size</th>
									<th width="15%">Số lượng (kg)</th>
									<th width="20%">Giá nhập (VND) / kg</th>
									<th width="20%">Giá bán (VND) / kg</th>
									<th width="13%">Giảm (%)</th>
									<th width="5%"></th>
								</tr>
							</thead>
							<tbody>

								<?php if(count( $data["value_detaledproducts"] ) > 0): ?>
									<?php foreach ($data["value_detaledproducts"] as $detale_pro): ?>
										<tr class="">

											<td class="id" style="position: relative;"><input type="number" style="visibility: hidden; position: absolute; top: 0;left: 0;" class="id_chi_tiet form-control" value="<?=$detale_pro["ID"]?>"></td>
											<td class="loai">
												<input type="text" class="form-control form-control-sm" value="<?=$detale_pro["LoaiSize"]?>" id="detaileproduct-loai" name="detaileproduct-loai" placeholder="Loại">
											</td>
											<td class="so-luong">
												<input type="number" min="0" class="form-control form-control-sm" value="<?=$detale_pro["SoLuong"]?>" id="detaileproduct-so-luong" name="detaileproduct-so-luong" placeholder="">
											</td>
											<td class="gia-nhap">
												<input type="number" min="0" class="form-control" value="<?=substr($detale_pro["GiaNhap"] , 0 , strrpos($detale_pro["GiaNhap"], '.'))?>" id="detaileproduct-gia-nhap" name="detaileproduct-gia-nhap" placeholder="Giá nhập .....">
											</td>
											<td class="gia-ban">
												<input type="nummber" min="0" class="form-control" value="<?=substr($detale_pro["GiaBan"] , 0 , strrpos($detale_pro["GiaBan"], '.'))?>" id="detaileproduct-gia-ban" placeholder="Giá bán ......" name="detaileproduct-gia-ban">
											</td>
											<td class="giam-gia">
												<input type="number" value="<?=$detale_pro["GiamGia"]?>" class="form-control"  id="detaileproduct-giam-gia" min="0" max="100" placeholder="%" name="detaileproduct-giam-gia">
											</td>
											<td>
												<span class="btn-edit-chi-tiet-product" style="margin-right: .5rem;" >
													<i onclick="" class=" mdi mdi-pencil-box" style="font-size: 20px; color: #ebb53d;"></i>
												</span>
												<span class="btn-del-chi-tiet-product">
													<i onclick="" class=" mdi mdi-close-circle-outline" style="font-size: 20px; color: red;"></i>
												</span>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php endif;?>
							</tbody>
							<tfoot>
								<th colspan="8" rowspan="" headers="" scope="">
									<span class="btn" data-toggle="modal" data-target="#myModal"><i class="mdi mdi-plus-box" style="font-size: 30px; color: #00bb00"></i></span>
									<div class="modal fade" id="myModal">
										<div class="modal-dialog">
											<div class="modal-content" style="background: #fff!important;">

												<!-- Modal Header -->
												<div class="modal-header">
													<h4 class="modal-title text-center">Chi Tiết Sản Phẩm Muốn Thêm</h4>
													<button type="button" class="close" data-dismiss="modal">&times;</button>
												</div>

												<!-- Modal body -->
												<div class="modal-body">
													<div class="form-group row">
														<label for="loai-size-chi-tiet" class="col-sm-3 col-form-label">Loại / Size : </label>
														<div class="col-sm-9">
															<input type="text" class="form-control" id="loai-size-chi-tiet" placeholder="Loai - Size ......">
														</div>
													</div>
													<div class="form-group row">
														<label for="so-luong-chi-tiet" class="col-sm-3 col-form-label">Số Lượng :</label>
														<div class="col-sm-9">
															<input type="number" min="0" class="form-control" id="so-luong-chi-tiet" placeholder="Số lượng ......">
														</div>
													</div>
													<div class="form-group row">
														<label for="gia-nhap-chi-tiet" class="col-sm-3 col-form-label">Giá Nhập : </label>
														<div class="col-sm-9">
															<input type="number" min="0" class="form-control" id="gia-nhap-chi-tiet" placeholder="Giá nhập ......">
														</div>
													</div>
													<div class="form-group row">
														<label for="gia-ban-chi-tiet" class="col-sm-3 col-form-label">Giá Bán : </label>
														<div class="col-sm-9">
															<input type="number" min="0" class="form-control" id="gia-ban-chi-tiet" placeholder="Giá bán .......">
														</div>
													</div>
													<div class="form-group row">
														<label for="giam_gia_chi_tiet" class="col-sm-3 col-form-label">Giảm Giá : </label>
														<div class="col-sm-9">
															<input type="number" min="0" max="100" class="form-control" id="giam_gia_chi_tiet" value="0">
														</div>
													</div>
												</div>

												<!-- Modal footer -->
												<div class="modal-footer">
													<button type="button" class="btn btn-success btn_add_detailedproducts">Thêm</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>

											</div>
										</div>
									</div>

								</th>

							</tfoot>
						</table>


						<div class="form-group">
							<label class="text-primary" for="product-mo-ta">Mô Tả Sản Phẩm</label>
							<textarea class="form-control" id="product-mo-ta" name="product-mo-ta" rows="4">
								<?= (isset($old_prod["MoTa"]))?$old_prod["MoTa"]:''?>
							</textarea>
						</div>
						<div class="form-group">
							<label class="text-primary" for="product-chi-tiet-edit">Mô Tả Chi Tiết Sản Phẩm</label>
							<textarea class="product-chi-tiet-edit form-control" id="product-chi-tiet-edit" name="product-chi-tiet-edit" rows="4">
								<?= (isset($old_prod["ChiTiet"]))?$old_prod["ChiTiet"]:''?>
							</textarea>
						</div>


					</div>
				</div>
			</div>

			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body ">
						<button type="submit" name="btn_update_product" class="btn btn-success mr-2">Update</button>
						<button type="reset" class="btn btn-light">Reset</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<?php if (isset($_GET["success"])): ?>
	<script>
		var id = document.getElementById('product-ma').value;
		window.onload = sweetAlterTrangThai("success" , "Success" , "Sửa Thành Công Sản Phẩm !!!" , "admin/product/edit/"+id);
	</script>	
<?php endif ?>
<?php if (isset($_GET["err"])): ?>
	<script>
		var id = document.getElementById('product-ma').value;
		window.onload = sweetAlterTrangThai("error" , "Error" , "Không Sửa Được Sản Phẩm !!!", "admin/product/edit/"+id);
	</script>	
<?php endif ?>
