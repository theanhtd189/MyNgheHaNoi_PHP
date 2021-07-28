<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title"> Thêm Sản Phẩm </h3>

	</div>
	
	<form action="./admin/product/insert" method="post" onsubmit="return ValidateData()" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title text-center text-danger">Điền Thông Tin Sản Phẩm</h4>

						
						<div class="form-group">
							<label class="text-primary" for="category_id" >Loại Sản Phẩm</label>
							<select class="form-control" id="category_id" name="category_id">
								<option value="" selected="" >Thuộc loại .........</option>
								<?php showCategories($data["value_category"]); ?>
							</select>
						</div>

						<div class="form-group">
							<label class="text-primary" for="product-ma">Mã Sản Phẩm</label>
							<input type="text" class="form-control" id="product-ma" name="product-ma" placeholder="Mã sản phẩm ......" autofocus="fasle">
							<div id="validate_masp" class="invalid-feedback ">
						       
						    </div>
						</div>

						<div class="form-group">
							<label class="text-primary" for="product-tieu-de">Tên Sản Phẩm</label>
							<input type="text" class="form-control" id="product-tieu-de" name="product-tieu-de" placeholder="Tiêu đề sản phẩm ......">
							<div id="validate_title" class="invalid-feedback ">

						    </div>
						</div>
						
						<div class="form-group">
							<label class="text-primary" for="product-slug">Slug</label>
							<input type="text" class="form-control" id="product-slug" readonly="" name="product-slug" placeholder="">
						</div>
						<div class="form-group">
                            <label class="text-primary" for="product-xuat-xu">Xuất Xứ</label>
                            <input type="text" class="form-control" name="product-xuat-xu" id="product-xuat-xu" placeholder="Xuất xứ .......">
                        </div>
                        <div class="form-group">
                            <label class="text-primary" for="product-don-vi-tinh">Đơn Vị Tính</label>
                            <input type="text" class="form-control" name="product-don-vi-tinh" id="product-don-vi-tinh" placeholder="Đơn vị tính .......">
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label text-primary">Nổi Bật</label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input text-primary" value="1" checked name="product-noi-bat">Có
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input text-primary" value="0" name="product-noi-bat">Không
                                </label>
                            </div>
                        </div>
					</div>
				</div>
			</div>
			<div class="col-md-6 grid-margin stretch-card">
				<div class="card ">
					<div class="card-body">

                        <h4 class="mt-1 mb-2 text-danger text-center">File</h4>
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

							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body ">
						<h4 class="card-title text-danger tex">Thông Tin Chi Tiết</h4>

						<table class="table w-100 table-detaileproduct mb-4">
							<thead class="thead-dark">
								<tr>
									<th width="5%">#</th>
									<th width="25%">Loại/Size</th>
									<th width="10%">Số lượng (kg)</th>
									<th width="25%">Giá nhập (VND) / kg</th>
									<th width="25%">Giá bán (VND) / kg</th>
									<th width="5%">Giảm (%)</th>
									<th width="5%"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>data</td>
									<td>
										<input type="text" class="form-control form-control-sm" id="detaileproduct-loai" name="detaileproduct-loai[]" placeholder="Loại">
									</td>
									<td>
										<input type="number" min="0" class="form-control form-control-sm" id="detaileproduct-so-luong" name="detaileproduct-so-luong[]" placeholder="">
									</td>
									<td>
										<input type="number" min="0"  class="form-control" id="detaileproduct-gia-nhap" name="detaileproduct-gia-nhap[]" placeholder="Giá nhập .....">
									</td>
									<td>
										<input type="text" min="0" class="form-control" id="detaileproduct-gia-ban" placeholder="Giá bán ......" name="detaileproduct-gia-ban[]">
									</td>
									<td>
										<input type="text" value="0" class="form-control" id="detaileproduct-giam-gia" placeholder="%" name="detaileproduct-giam-gia[]">
									</td>
									<td>
										<span class="">
											<i onclick="DelDetaileproduct(this)" class=" mdi mdi-close-circle-outline" style="font-size: 20px;"></i>
										</span>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<th colspan="8" rowspan="" headers="" scope="">
									<span class="btn-add-detaileproduct"><i class="mdi mdi-plus-box" style="font-size: 20px;"></i></span>
								</th>

							</tfoot>
						</table>


						<div class="form-group">
							<label class="text-primary" for="product-mo-ta">Mô Tả Sản Phẩm</label>
							<textarea class="form-control" id="product-mo-ta" name="product-mo-ta" rows="4"></textarea>
						</div>
						<div class="form-group">
							<label class="text-primary" for="product-chi-tiet">Mô Tả Chi Tiết Sản Phẩm</label>
							<textarea class="product-chi-tiet form-control" id="product-chi-tiet" name="product-chi-tiet" rows="4"></textarea>
						</div>
						

					</div>
				</div>
			</div>
			
			<div class="col-12 grid-margin stretch-card">
				<div class="card">
					<div class="card-body ">
						<button type="submit" name="btn_them_product" class="btn btn-success mr-2">Thêm</button>
						<button class="btn btn-light">Reset</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<?php if (isset($_GET["success"])): ?>
	<script>
		window.onload = sweetAlterTrangThai("success" , "Success" , "Thêm Thành Công Sản Phẩm !!!" , "admin/product/add");
	</script>	
<?php endif ?>
<?php if (isset($_GET["err"])): ?>
	<script>
		window.onload = sweetAlterTrangThai("error" , "Error" , "Không Thêm Được Sản Phẩm !!!" , "admin/product/add");
	</script>	
<?php endif ?>
