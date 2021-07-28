
<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Quản Lý Slide </h3>
		<nav aria-label="breadcrumb">
			
		</nav>
	</div>
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="card-title">Danh Sách Slide</h4>
						<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
							Thêm Slide
						</button>

						<!-- The Modal -->
						<div class="modal fade" id="myModal" data-backdrop="static">
							<div class="modal-dialog">
								<div class="modal-content" style="background: #fff;">

									<!-- Modal Header -->
									<div class="modal-header">
										<h4 class="modal-title text-success">Thêm Slide</h4>
									</div>

									<!-- Modal body -->
									<div class="modal-body">
										<div class="form-group row">
											<label for="tieu-de-slide" class="col-sm-3 col-form-label text-primary">Tiêu đề</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" id="tieu-de-slide" placeholder="Tiêu đề ...................">
											</div>
										</div>
										<div class="form-group row">
											<label for="stt-slide" class="col-sm-3 col-form-label text-primary">Số thứ tự</label>
											<div class="col-sm-9">
												<input type="number" min=0 value="0" class="form-control" id="stt-slide">
											</div>
										</div>
										<div class="form-group row">
											<label for="exampleInputUsername2" class="col-sm-3 col-form-label text-primary">File ảnh</label>
											<div class="col-sm-9">
												<input type="file" name="file-anh-slide" id="file-anh-slide" class="file-upload-default file-upload-images-slide">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info"  placeholder="Upload Image">
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-primary" type="button">Upload</button>
													</span>
												</div>
											</div>
											<div class="show-img-insert-slide">
												
											</div>
										</div>
										

									</div>

									<!-- Modal footer -->
									<div class="modal-footer">
										<button type="button" class="btn btn-success btn-them-slide">Thêm</button>
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
								<th width="10%">Mã Slide</th>
								<th width="25%">Title</th>
								<th width="35%">Hình ảnh</th>
								<th width="10%">STT</th>
								<th width="10%">Trạng thái</th>
								<th width="5%">

									<!-- The Modal -->

								</th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($data["arr_slide"]) && count($data["arr_slide"]) > 0): ?>
							<?php foreach ($data["arr_slide"] as $key) :?>
								<tr>
									<td></td>
									<td class="id-slide"><?=$key["ID"]?></td>
									<td align="center"><?=$key["TieuDe"]?></td>
									<td align="center">
										<div class="slide-img">
											<img src="./public/upload/images/<?=$key["LinkAnh"]?>" alt="">
										</div>
									</td>

									<td align="center"><?=$key["STT"]?></td>
									<td>
										<?php if ($key["TrangThai"] == 1): ?>
											<label class="badge badge-success" onclick="ChangeStatus('<?=$key["ID"]?>')">Hiển Thị</label>
										<?php else: ?>
											<label class="badge badge-danger" onclick="ChangeStatus('<?=$key["ID"]?>')">Chặn</label>
										<?php endif ?>
										</td>
										<td>
											<span class="btn-view-chi-tiet-product" style="margin-right: .2rem;">
												<i onclick="" class=" mdi mdi-open-in-new" style="font-size: 20px; color: green;"></i>
											</span>

											<span class="btn-edit-chi-tiet-product" style="margin-right: .2rem;" data-toggle="modal" data-target="#edit-slide-<?=$key["ID"]?>">
												<i class=" mdi mdi-pencil-box" style="font-size: 20px; color: #ebb53d;"></i>
											</span>

											<div class="modal fade" id="edit-slide-<?=$key["ID"]?>" data-backdrop="static">
												<div class="modal-dialog">
													<div class="modal-content" style="background: #fff;">

														<!-- Modal Header -->
														<div class="modal-header">
															<h4 class="modal-title text-success">Sửa Slide : <?=$key["ID"]?> </h4>
														</div>

														<!-- Modal body -->
														<div class="modal-body">
															<div class="form-group row">
																<label for="tieu-de-slide" class="col-sm-3 col-form-label text-primary">ID</label>
																<div class="col-sm-9">
																	<input type="number" value="<?=$key["ID"]?>" class="form-control id-slide-edit"  readonly="readonly">
																</div>
															</div>
															<div class="form-group row">
																<label for="tieu-de-slide" class="col-sm-3 col-form-label text-primary">Tiêu đề</label>
																<div class="col-sm-9">
																	<input type="text" value="<?=$key["TieuDe"]?>" class="form-control tieu-de-slide-edit" placeholder="Tiêu đề ...................">
																</div>
															</div>
															<div class="form-group row">
																<label for="stt-slide" class="col-sm-3 col-form-label text-primary">Số thứ tự</label>
																<div class="col-sm-9">
																	<input type="number" min=0 value="<?=$key["STT"]?>" class="form-control stt-slide-edit">
																</div>
															</div>
															<div class="form-group row">
																<label for="exampleInputUsername2" class="col-sm-3 col-form-label text-primary">File ảnh</label>
																<div class="col-sm-9">
																	<input type="file" name="file-anh-slide" id="file-anh-slide-edit" class="file-upload-default file-upload-images-slide">
																	<div class="input-group col-xs-12">
																		<input type="text" class="form-control file-upload-info"  placeholder="Upload Image">
																		<span class="input-group-append">
																			<button class="file-upload-browse btn btn-primary" type="button">Upload</button>
																		</span>
																	</div>
																</div>
																<div class="show-img-insert-slide">
																	<img src="./public/upload/images/<?=$key["LinkAnh"]?>"  alt="">
																</div>
															</div>


														</div>

														<!-- Modal footer -->
														<div class="modal-footer">
															<button type="button" class="btn btn-warning btn-edit-slide">Sửa</button>
															<button type="button" class="btn btn-danger btn-reset" data-dismiss="modal">Close</button>
														</div>

													</div>
												</div>
											</div>

											<span class="btn-del-slide">
												<i class=" mdi mdi-close-circle-outline" style="font-size: 20px; color: red;"></i>
											</span>
										</td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
						</tbody>
						<tfoot>

							<tr>
								<td colspan="6">
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

<?php if (isset($_GET["success"])): ?>
	<script>
		window.onload = sweetAlterTrangThai("success" , "Success" , "" , "admin/posts");
	</script>   
<?php endif ?>
<?php if (isset($_GET["err"])): ?>
	<script>
		window.onload = sweetAlterTrangThai("error" , "Error" , "Không Sửa Được Sản Phẩm !!!" , "admin/posts");
	</script>   
<?php endif ?>
