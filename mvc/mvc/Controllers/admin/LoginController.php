<?php 

	/**
	 * 
	 */
	class LoginController extends Controller
	{
		private $sesion;
		private $AcountModel;
		function __construct()
		{
			$this->AcountModel = $this->model("AcountModel");

		}
		public function Index()
		{
			# code...
			if(isset($_SESSION['admin']))
			$this->view("admin/index" , [
	    		"pages"=>"trangchu"
	    	]);
			else
			$this->view("admin/login");
		}
		public function check(){
			if (isset($_POST["taikhoan"]) && isset($_POST["matkhau"])){
				# code...
				$arr=[];
				$acount = $this->AcountModel->get_first_acount("TaiKhoan",$_POST["taikhoan"]);

				if (count($acount) > 0) {
					# code...
					if (md5($_POST["matkhau"]) == $acount["MatKhau"]) {

						if ($_POST["remember"] == "true") {
						 	setcookie('username', $_POST["taikhoan"], time() + (86400 * 30) , "/");
						 	setcookie('password', $_POST["matkhau"], time() + (86400 * 30) , "/");
						}
						$_SESSION['admin'] = $acount;
						$arr["title"]= "Success";
			            $arr["trangthai"] = "success";
			            $arr["text"] = "Đăng nhập thành công";
						echo json_encode($arr);

					}else{
						$arr["title"]= "Error";
			            $arr["trangthai"] = "error";
			            $arr["text"] = "Mật khẩu không đúng !!!";
						echo json_encode($arr);
					}
				}
				else{
					$arr["title"]= "Error";
			        $arr["trangthai"] = "error";
			        $arr["text"] = "Tài khoản hoặc mật khẩu không đúng !!!";
					echo json_encode($arr);
				}
			}
			else{
				$base_url = base_url();
            	header("Location:$base_url/admin/login");
			}
		}
		
	}


 ?>