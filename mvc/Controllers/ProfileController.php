<?php 

	class ProfileController extends Controller
	{
		private $CustomerModel;
		private $url;

		public function __construct()
		{
			$this->url = base_url();
			$this->CustomerModel = $this->model("CustomerModel");
		}

		public function Index()
		{
			$account = $this->CustomerModel->get_customer("ID" , $_SESSION["customer"]['ID']);
	    	$_SESSION["customer"] = $account;		
			// echo "<pre>";
			// var_dump($account);
			// exit();
	    	$this->view("client/index" , [
	    		"pages"=>"profile",
	    		"css"=>"profile",
	    		"js"=>"trangchu"
	    	]);
		}

		public function update()
	    {
				if(!$_POST["p2"]&&!($_POST["p1"]))
				{

														$arr=[];
														$id = $_SESSION["customer"]['ID'];
														$arr["TenKh"] = $_POST["ho-ten"];
														$arr["Email"] = $_POST["email"];
														$arr["SDT"] = $_POST["sdt"];
														$arr["DiaChi"] = $_POST["dia-chi"];
														//$arr["MatKhau"] = md5($_POST["p1"]);
														if ($this->CustomerModel->update_customer($id,$arr)) {
															return header("Location:$this->url/Profile?success=Cập nhật thành công");
															//return;
														} 
														else 
														return header("Location:$this->url/Profile?success=Cập nhật thất bại");	
				}
				else
				if($_POST["p2"]!=($_POST["p1"]))
				{
					//sai pass
					return header("Location:$this->url/Profile?err=Mật khẩu bạn nhập không đúng!!!");
				}
				else{
					//change all
					if( trim($_POST["p1"])!="" && trim($_POST["p2"])!="" && trim($_POST["p2"])==trim($_POST["p1"]))
					{
														$arr=[];
														$id = $_SESSION["customer"]['ID'];
														$arr["TenKh"] = $_POST["ho-ten"];
														$arr["Email"] = $_POST["email"];
														$arr["SDT"] = $_POST["sdt"];
														$arr["DiaChi"] = $_POST["dia-chi"];
														$arr["MatKhau"] = md5($_POST["p1"]);
														if ($this->CustomerModel->update_customer($id,$arr)) {
															return header("Location:$this->url/Profile?success=Cập nhật thành công");
															//return;
														} 
														else 
														return header("Location:$this->url/Profile?success=Cập nhật thất bại");	
					}
				}
				
	    }
	}

 ?>