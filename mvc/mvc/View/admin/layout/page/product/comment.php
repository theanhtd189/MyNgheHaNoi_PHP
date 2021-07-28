<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title"> Tin Tức </h3>
		<nav aria-label="breadcrumb">
			
		</nav>
	</div>
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="card-title">Danh Sách Bình Luận</h4>
					</div>
					<?php if (isset($data["success"])): ?>
						<div class="alert alert-success">
							<strong>Success!</strong> <?= $data["success"] ?>
						</div>
					<?php endif ?>

					<table class="table">
						<thead>
							<tr>
								<th width="5%"></th>
								<th width="25%">Mã SP / Tên Sản Phẩm</th>
								<th width="20%">Mã KH / Tên Khách hàng</th>
								<th width="40%">Nội Dung Bình Luận</th>
								<th width="5%">Trạng thái</th>
								<th width="5%">

									<!-- The Modal -->
								</th>
							</tr>
						</thead>
						<tbody>
							<?php if (count($data["arr_comment"])>0):?>
								<?php foreach ($data["arr_comment"] as $key) : ?>
									<tr>
										<td>3</td>
										<td style="white-space: normal;">
											<div class="ma-sp">
												<p class="pb-0 mb-0"><b>Mã  :  </b><?= $key["product"]["MaSP"] ?></p>
											</div>
											<div class="ten-sp">
												<p><b>Tên :  </b><?= $key["product"]["TenSp"] ?></p>
											</div>
										</td>
										<td style="white-space: normal;">
											<div class="ma-sp">
												<p class="pb-0 mb-0"><b>Mã   :  </b><?= $key["customer"]["ID"] ?></p>
											</div>
											<div class="ten-sp">
												<p><b>Tên :  </b><?= $key["customer"]["TenKh"] ?></p>
											</div>
										</td>

										<td style="white-space: normal;">
											<p style="max-height: 100px; overflow: auto;"><?= $key["NoiDung"] ?></p>
										</td>
										<td><span class="btn btn-giao-hang badge badge-success">Hiển thị</span></td>
										<td>
											<span class="btn-edit-chi-tiet-product" style="margin-right: .2rem;" title="View" data-toggle="modal" data-target="#myModal">
												<i onclick="" class=" mdi mdi-open-in-new" style="font-size: 20px; color: green;"></i>
											</span>
											<div class="modal" id="myModal">
												<div class="modal-dialog">
													<div class="modal-content">
														<!-- Modal Header -->
														<div class="modal-header">
															<h3 class="modal-title">Thông tin bình luận sản phẩm</h3>
															<button type="button" class="close" data-dismiss="modal">&times;</button>
														</div>
														<!-- Modal body -->
														<div class="modal-body">
															<div class="container-fluid">
																<h4 class="text-center">Thông tin sản phẩm</h4>
																<div class="row">
																	<div class="col-6">
																		<img src="./public/upload/images/1608020025.png" alt="">
																	</div>
																	<div class="col-6">
																		<h5 class="text-warning"><?= $key["product"]["TenSp"] ?> </h5>
																	</div>
																</div>
															</div>
															<hr style="margin: 2rem 0;">
															<div class="container-fluid">
																<h3>Thông tin bình luận</h3>
																<div class="media border p-3">
																<img src="img_avatar3.png" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
																<div class="media-body">
																	<h4>John Doe <small><i>Posted on February 19, 2016</i></small></h4>
																	<p style="white-space: normal; text-indent: 2rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
																	
																</div>
															</div>
															</div>
														</div>
														<!-- Modal footer -->
														<div class="modal-footer">
															<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											<span class="btn-del-posts" title="Xóa">
												<i onclick="" class=" mdi mdi-close-circle-outline" style="font-size: 20px; color: red;"></i>
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
												<li class="page-item disabled">
													<a class="page-link" href="admin/posts&page=<?=($page-1)?>" tabindex="-1" aria-disabled="true">Previous</a>
												</li>
											<?php endif ?>
											<?php for($i = 1 ; $i<=$data["so_trang"] ; $i++): ?>
												<li class="page-item">
													<a class="page-link <?= ($i==$page)?'bg-dark text-light':'' ?>" href="admin/posts&page=<?=$i?>"><?=$i?></a>
												</li>
											<?php endfor ?>
											<?php if($page < $data["so_trang"]): ?>
												<li class="page-item">
													<a class="page-link" href="admin/posts&page=<?=($page+1)?>">Next</a>
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


