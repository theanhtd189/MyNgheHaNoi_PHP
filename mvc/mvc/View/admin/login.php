
<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo base_url(); ?>/" target="_parent">
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Admin</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="./public/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="./public/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<link rel="stylesheet" href="./public/admin/assets/vendors/css/vendor.bundle.base.css">
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<!-- endinject -->
	<!-- Layout styles -->


	<link rel="stylesheet" href="./public/admin/assets/css/style.css">
	<!-- End layout styles -->
	<link rel="shortcut icon" href="./public/admin/assets/images/favicon.png" />
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script>
		function sweetAlter(trangthai , str_title , str_text) {
			swal({
				title: str_title,
				icon: trangthai,
				text: str_text
			});
		}
		function sweetAlterTrangThai(trangthai , str_title , str_text , href) {
			swal({
				title: str_title,
				icon: trangthai,
				text: str_text
			}).then((value) => {
				location.href=href;
			});

		}
	</script>

</head>
<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth">
				<div class="row flex-grow">
					<div class="col-lg-4 mx-auto">
						<div class="auth-form-light text-left p-5">

							<h4 class="text-center text-success">Đăng Nhập ADMIN</h4>

							<div class="form-group">
								<input type="text" class="form-control form-control-lg" id="username" placeholder="Username" name="username" value="<?=(isset($_COOKIE['username']))?$_COOKIE['username']:''?>">
							</div>
							<div class="form-group">
								<input type="password" class="form-control form-control-lg" id="password" placeholder="Password" name="password" value="<?=(isset($_COOKIE['password']))?$_COOKIE['password']:''?>">
							</div>
							<div class="my-2 d-flex justify-content-between align-items-center">
								<div class="form-check">
									<label class="form-check-label text-muted">Lưu thông tin đăng nhập
										<input type="checkbox" class="form-check-input" id="remember" name="remember" <?= (isset($_COOKIE["username"]))?"checked":""?> Nhớ tài khoản
									</label>
								</div> 
							</div>
							<div class="mt-3">
								<button type="submit" id="btn-login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Đăng Nhập</button> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- plugins:js -->
	<script src="./public/admin/assets/vendors/js/vendor.bundle.base.js"></script>
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->
	<!-- inject:js -->
	<script src="./public/admin/assets/js/off-canvas.js"></script>
	<script src="./public/admin/assets/js/hoverable-collapse.js"></script>
	<script src="./public/admin/assets/js/misc.js"></script>
	<script>
		jQuery(document).ready(function($) {
			$("#btn-login").click(function(event) {
				/* Act on the event */
				

				var tk = $('#username').val();
				var mk = $('#password').val();
				var ghinho = $("#remember").is(":checked");
				var format = /[ !@#$%^&*()+\-=\[\]{};':"\|,.<>\/?]/;

				if (tk == "") {
					sweetAlter("error", "Error" , "Tài khoản không được để trống !!!");
					return ;
				}

				if (format.test(tk)) {
					sweetAlter("error", "Error" , "Tài khoản không được chứa ký tự đặc biệt !!!");
					return ;
				}

				if (mk=="") {
					sweetAlter("error", "Error" , "Mật khẩu không được để trống !!!");
					return ;
				}


				$.ajax({
					url: './admin/login/check',
					type: 'POST',

					data: {
						taikhoan: tk,
						matkhau:mk,
						remember:ghinho
					},
					success: function (value) {
                        // body...
                        var arr = JSON.parse(value);
                        swal({
                        	title: arr["title"],
                        	icon:  arr["trangthai"],
                        	text: arr["text"]
                        }).then((value) => {
                        	if (arr["trangthai"]=="success") {
                                location.href = "<?php echo base_url() ?>/admin/trangchu";
                        	}
                        });

                    }
                })
			});
		});

	</script>
	<!-- endinject -->
</body>
</html>