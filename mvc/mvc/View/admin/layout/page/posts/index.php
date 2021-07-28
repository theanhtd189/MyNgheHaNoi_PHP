<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Tin Tức </h3>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Danh Sách Loại Tin Tức</h4>
                        <a href="./admin/posts/new" class="btn btn-success ">Thêm Tin Tức</a>
                    </div>
                    <?php if (isset($data["success"])): ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?= $data["success"] ?>
                        </div>
                    <?php endif ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Mã bài viết</th>
                                <th>Tên bài viết</th>
                                <th>Ngày tạo</th>
                                <th>Nổi Bật</th>
                                <th width="5%">Trạng thái</th>
                                <th width="5%">

                                    <!-- The Modal -->

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($data["arr_posts"]) > 0): ?>
                                <?php foreach ($data["arr_posts"] as $key): ?>
                                    <tr>
                                        <th class="product-checkbox">
                                            <input type="checkbox" name="delete" class="delete-list-post" value="<?=$key["ID"]?>">
                                        </th>
                                        <td class="id"><?= $key["ID"] ?></td>
                                        <td  style="white-space: inherit;"><?= $key["TieuDe"] ?></td>
                                        <td><?= $key["NgayTao"] ?></td>
                                        <td>
                                            <?php if ($key["NoiBat"] == 1): ?>
                                                <label class="badge badge-success" onclick="ChangeNoiBat(<?=$key['ID']?>)">Nổi Bật</label>
                                                <?php else: ?>
                                                    <label class="badge badge-danger" onclick="ChangeNoiBat(<?=$key['ID']?>)">Không</label>
                                                <?php endif ?>
                                            </td>
                                        <td>
                                            <?php if ($key["TrangThai"] == 1): ?>
                                                <label class="badge badge-success" onclick="ChangeStatus(<?=$key['ID']?>)">Hiển Thị</label>
                                                <?php else: ?>
                                                    <label class="badge badge-danger" onclick="ChangeStatus(<?=$key['ID']?>)">Chặn</label>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <span class="btn-edit-chi-tiet-product" style="margin-right: .2rem;">
                                                    <i onclick="" class=" mdi mdi-open-in-new" style="font-size: 20px; color: green;"></i>
                                                </span>

                                                <span class="btn-edit-chi-tiet-product" style="margin-right: .2rem;" >
                                                    <a href="./admin/posts/edit/<?=$key["ID"]?>" title=""><i onclick="" class=" mdi mdi-pencil-box" style="font-size: 20px; color: #ebb53d;"></i></a>
                                                </span>

                                                <span class="btn-del-posts">
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
