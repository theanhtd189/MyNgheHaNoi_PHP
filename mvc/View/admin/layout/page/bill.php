<div class="content-wrapper">
	<div class="page-header">
		<h3 class="page-title">Quản Lý Hóa Đơn </h3>
		<nav aria-label="breadcrumb">
			
		</nav>
	</div>
	<div class="row">
		<div class="col-lg-12 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="card-title">Danh Sách Hóa Đơn</h4>
						
					</div>
					<table class="table">
						<thead>
							<tr align="center">
								<th width="5%"></th>
								<th width="10%">Mã Bill</th>
								<th width="20%">Khách Hàng</th>
								<th width="15%">Tổng Tiền</th>
								<th width="35%">Ghi Chú</th>
								<th width="10%">Ngày Mua</th>
								<th width="10%">Trạng thái</th>
								<th width="5%"></th>
							</tr>
						</thead>
						<tbody>
							<?php if (isset($data["arr_bill"]) && count($data["arr_bill"]) > 0):?>
							<?php foreach ($data["arr_bill"] as $key):?>
								<tr>
									<td align="center"></td>
									<td align="center"><?=$key["ID"]?></td>
									<td align="center"><?=$key["customer"]["TenKh"]?></td>
									<td align="center"><?=number_format($key["TongTien"])?></td>
									<td align="center"><?=$key["GhiChu"]?></td>
									<td align="center"><?=$key["NgayTao"]?></td>
									<td align="center">
										
										<?php if($key["TrangThai"] == 0): ?>
											<span class="btn btn-dat-hang badge badge-warning" id="<?=$key["ID"]?>">Đặt hàng</span>
											<?php elseif ($key["TrangThai"] == 1):?>
												<span class="btn btn-da-mua badge badge-success" id="<?=$key["ID"]?>">Đã mua</span>
												<?php elseif ($key["TrangThai"] == 2):?>
													<span class="btn btn-giao-hang badge badge-primary" id="<?=$key["ID"]?>">Đã giao</span>
													<?php else: ?>
														<span class="btn btn-huy badge badge-danger" id="<?=$key["ID"]?>">Đã hủy</span>
													<?php endif ?>

												</td>
												<td>
													<span class="btn-edit-chi-tiet-product" style="margin-right: .2rem;" title="View" data-toggle="modal" data-target="#bill-<?=$key["ID"]?>">
														<i onclick="" class=" mdi mdi-open-in-new" style="font-size: 20px; color: green;"></i>
													</span>

													<div class="modal" id="bill-<?=$key["ID"]?>">
														<div class="modal-dialog modal-lg" >
															<div class="modal-content" style="background: #fff;">
																<!-- Modal Header -->
																<div class="modal-header">
																	<h4 class="modal-title">Thông tin hóa đơn : <?=$key["ID"]?> /   

																		<?php if($key["TrangThai"] == 0): ?>
																			<span class="btn btn-dat-hang badge badge-warning" id="<?=$key["ID"]?>">Đặt hàng</span>
																			<?php elseif ($key["TrangThai"] == 1):?>
																				<span class="btn btn-da-mua badge badge-success" id="<?=$key["ID"]?>">Đã mua</span>
																				<?php elseif ($key["TrangThai"] == 2):?>
																					<span class="btn btn-giao-hang badge badge-primary" id="<?=$key["ID"]?>">Đã giao</span>
																					<?php else: ?>
																						<span class="btn btn-huy badge badge-danger" id="<?=$key["ID"]?>">Đã hủy</span>
																					<?php endif ?>
																				</h4>
																				<button type="button" class="close" data-dismiss="modal">&times;</button>
																			</div>
																			<!-- Modal body -->
																			<div class="modal-body">
																				<div class="w-100 d-flex flex-wrap justify-content-between">
																					<div class="col-4 col-md-4">
																						<div class="infor-bill " style="white-space: initial;">
																							<p><b>Mã khách hàng : </b> <?=$key["MaKH"]?></p>
																							<p><b>Tên khách hàng : </b> <?=$key["customer"]["TenKh"]?></p>
																							<p><b>Ngày mua: </b> <?=$key["NgayTao"]?> </p>
																							<p><b>Tổng tiền : </b> <?=number_format($key["TongTien"])?> VND</p>
																							<p><b>Địa chỉ nhận : </b> <?=$key["DiaChiGiao"]?></p>
																							<p><b>Số điện thoại : </b> <?=$key["SDT"]?></p>
																							<p><b>Phương thức thanh toán : </b>Thanh toán khi nhận hàng</p>
																							<p><b>Trạng thái : </b>Đã thanh toán</p>
																							<p><b>Ghi chú : </b> <?=$key["GhiChu"]?></p>
																						</div>
																					</div>
																					<div class="col-8 col-md-8">
																						<table class="table table-bordered table-detail-bill">
																							<thead class="thead-dark">
																								<tr>
																									<th width="15%">Mã SP</th>
																									<th width="25%">Tên Sản Phẩm</th>
																									<th width="15%">Loại</th>
																									<th width="10%">SL Mua</th>
																									<th width="15%">Giá Bán(vnd)</th>
																									<th width="5%">Giảm</th>
																									<th width="15%">Tổng Tiền(vnd)</th>
																								</tr>
																							</thead>
																							<tbody class="tbody-detail-bill" >
																								<?php foreach ($key["detailsbill"] as $key_prod) :?>
																									<tr>
																										<td>
																											<?= isset($key_prod["detailproduct"]["MaSP"])?$key_prod["detailproduct"]["MaSP"]:"null"; ?>

																										</td>
																										<td style="white-space: initial;"><?= $key_prod["Ten"] ?></td>
																										<td style="white-space: initial;"> 
																											<?= isset($key_prod["detailproduct"]["LoaiSize"])?$key_prod["detailproduct"]["LoaiSize"]:"null";  ?>

																										</td>
																										<td><?= $key_prod["SoLuongMua"] ?> <?= isset($key_prod["detailproduct"]["DonViTinh"])?$key_prod["detailproduct"]["DonViTinh"]:"null";  ?></td>
																										<td><?=number_format($key_prod["GiaBan"])?></td>
																										<td><?= $key_prod["GiamGia"] ?>%</td>
																										<td><?=number_format($key_prod["ThanhTien"])?></td>
																									</tr>
																								<?php endforeach ?>
																							</tbody>
																							<tfoot>
																								<tr>
																									<td colspan="7" align="center"><b class="text-primary">Tổng Tiền Thanh Toán : </b> <?=number_format($key["TongTien"])?> VND</td>
																								</tr>
																							</tfoot>
																						</table>
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

																<?php if ($key["TrangThai"] != 2): ?>
																	<span class="btn-del-bill" onclick="deleteBill(<?=$key["ID"]?>)" title="Xóa">
																	<i onclick="" class=" mdi mdi-close-circle-outline" style="font-size: 20px; color: red;"></i>
																</span>
																<?php endif ?>
															</td>
														</tr>
													<?php endforeach?>
												<?php endif?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan="8">
														<button class="btn btn-primary btn-sm" id="check-all" type="button">Chọn tất cả</button>
														<button class="btn btn-success btn-sm" id="clear-all" type="button">Bỏ chọn tất cả
														</button>
														<button id="btn-delete" class="btn btn-primary btn-sm" type="button">Xóa các mục đã
															chọn
														</button>
													</td>
												</tr>
												<tr>
													<?php $page = (isset($_GET["page"]))?$_GET["page"]:1;?>
													<?php if ($page > 0 && $page <= $data["so_trang"]):?>
														<td colspan="8" >
															<ul class="pagination justify-content-center">
																<?php if ($page > 1):?>
																	<li class="page-item">
																		<a class="page-link" href="admin/slide&page=<?=($page-1)?>" tabindex="-1" aria-disabled="true">Previous</a>
																	</li>
																<?php endif?>
																<?php for ($i = 1; $i <= $data["so_trang"]; $i++):?>
																	<li class="page-item">
																		<a class="page-link <?=($i == $page)?'bg-dark text-light':''?>" href="admin/slide&page=<?=$i?>"><?=$i?></a>
																	</li>
																<?php endfor?>
																<?php if ($page < $data["so_trang"]):?>
																	<li class="page-item">
																		<a class="page-link" href="admin/slide&page=<?=($page+1)?>">Next</a>
																	</li>
																<?php endif?>
															</ul>
														</td>
													<?php endif?>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>

						</div>
					</div>

