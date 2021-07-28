
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title"> Loại Sản Phẩm </h3>
		<nav aria-label="breadcrumb">
		</nav>
	</div>
	<div class="row">
		<div class="col-lg-8 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Danh Sách Loại Sản Phẩm</h4>
					<?php if (isset($data["success"])): ?>
						<div class="alert alert-success">
							<strong>Success!</strong> <?= $data["success"] ?>
						</div>
					<?php endif ?>
					
					<table class="table">
						<thead>
							<tr>
								<th></th>
								<th>Tên Loại Sản Phẩm</th>
								<th>Thuộc Loại</th>
								<th>Status</th>
								<th>
									
									<!-- The Modal -->

								</th>
							</tr>
						</thead>
						<tbody >
							
						</tbody>
						<tfoot>
							<tr>
								<td colspan="5" >
									<nav id="so_trang">
										
									</nav>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<button class="btn btn-primary btn-sm" id="check-all" type="button">Chọn tất cả</button>
									<button class="btn btn-success btn-sm" id="clear-all" type="button">Bỏ chọn tất cả</button>
									<button id="btn-delete" class="btn btn-primary btn-sm" type="button">Xóa các mục đã chọn</button>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<div class="col-lg-4 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Nhập Dữ Liệu</h4>
					<form accept-charset="utf-8">					
						<div class="form-group row" id="category_id" style="visibility: hidden; position: absolute; top: 0px; left: 0px;">
							<label for="ID" class="col-sm-3 col-form-label">ID</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" id="ID" min="0">
							</div>
						</div>
						<div class="form-group row">
							<label for="TenDanhMuc" class="col-sm-3 col-form-label">Tên</label>
							<div class="col-sm-9">
								<input type="text" onkeyup="ChangeToSlug(this);" class="form-control" id="TenDanhMuc" name="TenDanhMuc" placeholder="Tên Danh Mục" required="">
							</div>
						</div>
						<div class="form-group row">
							<label for="slug" class="col-sm-3 col-form-label">Slug</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="slug" name="slug" placeholder="" readonly="" required="">
							</div>
						</div>

						<div class="form-group row">
							<label for="parentID" class="col-sm-3 col-form-label"> Thuộc</label>
							<div class="col-sm-9">
								<div class="form-group">
									<select class="form-control" id="parentID" name="parentID"  required="">
										<option selected="" value="0"></option>
										<?php showCategories($data["value"]); ?>
									</select>
								</div>
							</div>
						</div>
						<?php if(isset($data["error"])): ?>
							<div class="alert alert-success">
								<strong>Error!</strong> <?= $data["error"] ?>
							</div>
						<?php endif ?>
						<div class="form-check">
							<button type="button" id="btn_them" name="btn_insert_category" class="btn btn-success mr-2">Thêm</button>
							<button type="button" id="btn_sua" name="btn_edit_category" class="btn btn-warning mr-2">Sửa</button>
							<button type="reset" id="btn_reset" class="btn btn-light">Reset</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- content-wrapper ends -->
<!-- partial:../../partials/_footer.html -->
