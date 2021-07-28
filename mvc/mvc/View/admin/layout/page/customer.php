
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Quản Lý Khách Hàng </h3>
		<nav aria-label="breadcrumb">
			
		</nav>
	</div>
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="card-title">Danh Sách Khách Hàng</h4>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
							Thêm Khách Hàng
						</button>

						<!-- The Modal -->
						<div class="modal fade" id="myModal" data-backdrop="static">
							<div class="modal-dialog">
								<div class="modal-content" style="background: #fff;">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title text-success">Thêm Khách Hàng</h4>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										
										<div class="form-group row">
											<label for="stt-slide" class="col-sm-3 col-form-label text-primary">Tên Khách Hàng</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="ten-kh">
											</div>
										</div>
										<div class="form-group row">
											<label for="stt-slide" class="col-sm-3 col-form-label text-primary">Địa Chỉ</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="dia-chi">
											</div>
										</div>
										<div class="form-group row">
											<label for="stt-slide" class="col-sm-3 col-form-label text-primary">Số Điện Thoại</label>
											<div class="col-sm-9">
												<input type="phone" class="form-control" id="sdt">
											</div>
										</div>
										<div class="form-group row">
											<label for="stt-slide" class="col-sm-3 col-form-label text-primary">Email</label>
											<div class="col-sm-9">
												<input type="email" class="form-control" id="email">
											</div>
										</div>
										
										<div class="form-group row">
											<label for="stt-slide" class="col-sm-3 col-form-label text-primary">Mật Khẩu</label>
											<div class="col-sm-9">
												<input type="password" class="form-control" id="mat-khau">
											</div>
										</div>
										
										

									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-success btn-them-customer">Thêm</button>
										<button type="button" class="btn btn-danger btn-reset" data-dismiss="modal">Close</button>
									</div>

								</div>
							</div>
						</div>
					</div>
					<?php if (isset($data["success"])): ?>
						<div class="alert alert-success">
							<strong>Success!</strong> <?= $data["success"] ?>
						</div>
					<?php endif ?>

					<table class="table">
						<thead>
							<tr align="center">
								<th width="5%"></th>
								<th width="10%">Tên Khách Hàng</th>
								<th width="30%">Địa Chỉ</th>
								<th width="15%">SDT</th>
								<th width="25%">Email</th>
								<th width="10%">Trạng thái</th>
								<th width="5%"></th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($data["arr_customer"]) && count($data["arr_customer"]) > 0): ?>
							<?php foreach ($data["arr_customer"] as $key) :?>
								<tr>
									<td id="customer_id" >
										<input type="checkbox" name="delete" value="<?=$key["ID"]?>">
									</td>
									<td align="center"><?=$key["TenKh"]?></td>

									<td align="center"><?=$key["DiaChi"]?></td>
									<td align="center">
										<?=$key["SDT"]?>
									</td>
									<td align="center"><?=$key["Email"]?></td>
									<td>
										<?php if ($key["TrangThai"] == 1): ?>
											<label class="badge badge-success" onclick="ChangeStatus('<?=$key["ID"]?>')">Cho phép</label>
											<?php else: ?>
												<label class="badge badge-danger" onclick="ChangeStatus('<?=$key["ID"]?>')">Chặn</label>
											<?php endif ?>
										</td>
										<td>
											<span class="btn-del-customer">
												<i class=" mdi mdi-close-circle-outline" style="font-size: 20px; color: red;"></i>
											</span>
										</td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
						</tbody>
						<tfoot>

							<tr>
								<td colspan="7">
									<button class="btn btn-primary btn-sm" id="check-all" type="button">Chọn tất cả</button>
									<button class="btn btn-success btn-sm" id="clear-all" type="button">Bỏ chọn tất cả
									</button>
									<button id="btn-delete" class="btn btn-primary btn-sm" type="button">Xóa các mục đã
										chọn
									</button>
								</td>
							</tr>
							<tr>
								<?php $page = (isset($_GET["page"]))?$_GET["page"]:1; ?>
								<?php if ($page > 0 && $page<=$data["so_trang"]):?>
									<td colspan="8" >
										<ul class="pagination justify-content-center">
											<?php if($page > 1): ?>
												<li class="page-item">
													<a class="page-link" href="admin/slide&page=<?=($page-1)?>" tabindex="-1" aria-disabled="true">Previous</a>
												</li>
											<?php endif ?>
											<?php for($i = 1 ; $i<=$data["so_trang"] ; $i++): ?>
												<li class="page-item">
													<a class="page-link <?= ($i==$page)?'bg-dark text-light':'' ?>" href="admin/slide&page=<?=$i?>"><?=$i?></a>
												</li>
											<?php endfor ?>
											<?php if($page < $data["so_trang"]): ?>
												<li class="page-item">
													<a class="page-link" href="admin/slide&page=<?=($page+1)?>">Next</a>
												</li> 
											<?php endif ?>
										</ul>
									</td>
								<?php endif ?>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>

