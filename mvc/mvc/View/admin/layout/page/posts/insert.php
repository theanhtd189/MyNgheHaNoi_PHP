<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Thêm Sản Phẩm </h3>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thêm Tin Tức</h4>
                    <form class="forms-sample" method="post" action="./admin/posts/insert" onsubmit="return ValidateData()" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="tieu-de" class="text-primary">Tiêu Đề :</label>
                                    <input type="text" class="form-control" id="tieu-de" name="tieu-de" placeholder="Tiêu đề . . . . . . . . ">
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="text-primary">Slug :</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="" readonly="readonly">
                                </div>
                                <div class="form-group">
                                    <label for="mota" class="text-primary">Mô Tả :</label>
                                    <textarea class="form-control" id="mota" name="mota" rows="5"></textarea> 
                                </div>

                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="file-upload-image" class="text-primary">Ảnh Minh Họa</label>
                                    <input type="file" name="file-upload-image" id="file-upload-image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info"   placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                        </span>
                                    </div>
                                    <div class="show-image">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="noi-dung" class="text-primary">Nội Dung : </label>
                            <textarea class="form-control noi-dung" id="noi-dung"  name="noi-dung" rows="9"></textarea>
                        </div>
                         <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label text-primary">Nổi Bật :</label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input text-primary" value="1" checked name="posts-noi-bat">Có
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input text-primary" value="0" name="posts-noi-bat">Không
                                </label>
                            </div>
                        </div>
                        <button type="submit" name="btn-add-posts" class="btn btn-success mr-2">Thêm</button>
                        <button type="reset" class="btn btn-light mr-2">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_GET["err"])): ?>
    <script>
        window.onload = sweetAlterTrangThai("error" , "Error" , "", "admin/new");
    </script>   
<?php endif ?>