
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Quản Lý Tài Khoản </h3>
		<nav aria-label="breadcrumb">
			
		</nav>
	</div>
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="card-title">Danh Sách Tài Khoản</h4>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
							Thêm Tài Khoản
						</button>

						<!-- The Modal -->
						<div class="modal fade" id="myModal" data-backdrop="static">
							<div class="modal-dialog">
								<div class="modal-content" style="background: #fff;">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title text-success">Thêm Tài Khoản</h4>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<div class="form-group row">
											<label for="tieu-de-acount" class="col-sm-3 col-form-label text-primary">Họ Tên :</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="ho-ten-acount" placeholder="Họ tên ...................">
											</div>
										</div>
										<div class="form-group row">
											<label for="stt-acount" class="col-sm-3 col-form-label text-primary">Số Điện Thoại</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="sdt-acount" placeholder="Số điện thoại ...................">
											</div>
										</div>
										<div class="form-group row">
											<label for="tieu-de-acount" class="col-sm-3 col-form-label text-primary">Địa Chỉ</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="dia-chi-acount" placeholder="Địa chỉ ...................">
											</div>
										</div>
										<div class="form-group row">
											<label for="stt-acount" class="col-sm-3 col-form-label text-primary">Tài Khoản</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="tai-khoan-acount" placeholder="Tài khoản ...................">
											</div>
										</div>
										<div class="form-group row">
											<label for="tieu-de-acount" class="col-sm-3 col-form-label text-primary">Mật Khẩu</label>
											<div class="col-sm-9">
												<input type="password" class="form-control" id="mat-khau-acount" placeholder="Mật khẩu...................">
											</div>
										</div>
										
										
										

									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-success btn-them-acount">Thêm</button>
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
								<th width="10%">Mã</th>
								<th width="25%">Tên </th>
								<th width="10%">SĐT</th>
								<th width="20%">Địa Chỉ</th>
								<th width="20%">Tài Khoản</th>
								<th width="5%">Trạng thái</th>
								<th width="5%">

									<!-- The Modal -->

								</th>
							</tr>
						</thead>
						<tbody>
							<?php if (count($data["arr_acount"]) > 0) :?>
								<?php foreach ($data["arr_acount"] as $key) :?>
									<tr align="center">
										<td></td>
										<td class="id"><?= $key["ID"] ?></td>
										<td><?= $key["HoTen"] ?></td>
										<td><?= $key["SoDienThoai"] ?></td>
										<td><?= $key["DiaChi"] ?></td>
										<td><?= $key["TaiKhoan"] ?></td>
										<td>
											<?php if ($key["TrangThai"] == 1):?>
											<label class="badge badge-success" onclick="ChangeStatus('<?=$key["ID"]?>')">Cho Phép</label>
											<?php  else :?>
											<label class="badge badge-danger" onclick="ChangeStatus('<?=$key["ID"]?>')">Chặn</label>
											<?php endif?>
										</td>
										<td>

											<span class="btn-edit-chi-tiet-product" style="margin-right: .2rem;" data-toggle="modal" data-target="#edit_<?= $key["ID"] ?>" >
												<i class=" mdi mdi-pencil-box" style="font-size: 20px; color: #ebb53d;"></i>
											</span>

											<div class="modal fade" id="edit_<?= $key["ID"] ?>" data-backdrop="static">
												<div class="modal-dialog">
													<div class="modal-content" style="background: #fff;">

														<!-- Modal Header -->
														<div class="modal-header">
															<h4 class="modal-title text-success">Sửa Tài Khoản</h4>
														</div>

														<!-- Modal body -->
														<div class="modal-body">
															<div class="form-group row ho-ten">
																<label for="tieu-de-acount" class="col-sm-3 col-form-label text-primary">Mã :</label>
																<div class="col-sm-9 ho-ten-edit">
																	<input type="text" class="form-control id-acount-edit" value="<?= $key["ID"] ?>" readonly>
																</div>
															</div>
															<div class="form-group row ho-ten">
																<label for="tieu-de-acount" class="col-sm-3 col-form-label text-primary">Họ Tên :</label>
																<div class="col-sm-9 ho-ten-edit">
																	<input type="text" class="form-control ho-ten-acount-edit" value="<?= $key["HoTen"] ?>" placeholder="Họ tên ...................">
																</div>
															</div>
															<div class="form-group row">
																<label for="stt-acount" class="col-sm-3 col-form-label text-primary">Số Điện Thoại</label>
																<div class="col-sm-9">
																	<input type="text" class="form-control sdt-acount-edit" value="<?= $key["SoDienThoai"] ?>" placeholder="Số điện thoại ...................">
																</div>
															</div>
															<div class="form-group row">
																<label for="tieu-de-acount" class="col-sm-3 col-form-label text-primary">Địa Chỉ</label>
																<div class="col-sm-9">
																	<input type="text" class="form-control dia-chi-acount-edit" value="<?= $key["DiaChi"] ?>"  placeholder="Địa chỉ ...................">
																</div>
															</div>
															<div class="form-group row">
																<label for="stt-acount" class="col-sm-3 col-form-label text-primary">Tài Khoản</label>
																<div class="col-sm-9">
																	<input type="text" class="form-control tai-khoan-acount" value="<?= $key["TaiKhoan"] ?>" placeholder="Tài khoản ..................." disabled>
																</div>
															</div>
															<div class="form-group row">
																<label for="check" class="col-sm-3 col-form-label text-primary">Mật Khẩu 
																	<input type="checkbox" class="check" style="margin-left: 1rem;" name="">
																</label>
																<div class="col-sm-9 password">
																	<input type="password" class="form-control mat-khau-acount-edit" value="<?= $key["MatKhau"] ?>" placeholder="Mật khẩu..................." disabled>
																</div>
															</div>




														</div>

														<!-- Modal footer -->
														<div class="modal-footer">
															<button type="button" class="btn btn-warning btn-edit-acount">Sửa</button>
															<button type="button" class="btn btn-danger btn-reset" data-dismiss="modal">Close</button>
														</div>

													</div>
												</div>
											</div>

											<span class="btn-del-acount">
												<i class=" mdi mdi-close-circle-outline" style="font-size: 20px; color: red;"></i>
											</span>
										</td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
						</tbody>
						<tfoot>

							<!-- <tr>
								<td colspan="8">
									<button class="btn btn-primary btn-sm" id="check-all" type="button">Chọn tất cả</button>
									<button class="btn btn-success btn-sm" id="clear-all" type="button">Bỏ chọn tất cả
									</button>
									<button id="btn-delete" class="btn btn-primary btn-sm" type="button">Xóa các mục đã
										chọn
									</button>
								</td>
							</tr> -->
							<tr>
								<?php $page = (isset($_GET["page"]))?$_GET["page"]:1; ?>
								<?php if ($page > 0 && $page<=$data["so_trang"]):?>
									<td colspan="8" >
										<ul class="pagination justify-content-center">
											<?php if($page > 1): ?>
												<li class="page-item">
													<a class="page-link" href="admin/acount&page=<?=($page-1)?>" tabindex="-1" aria-disabled="true">Previous</a>
												</li>
											<?php endif ?>
											<?php for($i = 1 ; $i<=$data["so_trang"] ; $i++): ?>
												<li class="page-item">
													<a class="page-link <?= ($i==$page)?'bg-dark text-light':'' ?>" href="admin/acount&page=<?=$i?>"><?=$i?></a>
												</li>
											<?php endfor ?>
											<?php if($page < $data["so_trang"]): ?>
												<li class="page-item">
													<a class="page-link" href="admin/acount&page=<?=($page+1)?>">Next</a>
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

