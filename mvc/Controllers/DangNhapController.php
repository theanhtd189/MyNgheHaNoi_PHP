<?php 	

	/**
	 * 
	 */
	class DangNhapController extends Controller
	{
		private $CustomerModel;
		private $url;
		function __construct()
	    {
	    	$this->url = base_url();
	    	$this->CustomerModel = $this->model("CustomerModel");

	    }
		public function Index()
		{
			# code...
	    	$this->view("client/index" , [
	    		"pages"=>"dangnhap",
	    		"css"=>"dang-nhap",
	    		"js"=>"dang-nhap"
	    	]);
	    }
	    public function check()
	    {
	    	# code...
	    	if (isset($_POST["email"]) && isset($_POST["password"])) {
	    		# code...
	    		$account = $this->CustomerModel->get_customer("Email" , $_POST["email"]);
	    		if (sizeof($account )> 0) {
	    			# code...
	    			if ( md5($_POST["password"]) == $account["MatKhau"] ) {
	    				# code...
	    				$_SESSION["customer"] = $account;
	    				return header("Location:$this->url/");
	    			}
	    			else{
	    				return header("Location:$this->url/DangNhap?err=Password không đúng !!!");
	    			}
	    		}else{
	    			echo "tài khoản hoặc mật khẩu không đúng";
	    			return header("Location:$this->url/DangNhap?err=Email hoặc password không đúng !!!");
	    		}
	    	}
	    	else{
	    		return header("Location:$this->url/DangNhap");
	    	}
	    }
	    public function add()
	    {

	    	if (isset($_POST["email"]) && isset($_POST["ho-ten"]) && isset($_POST["dia-chi"]) && isset($_POST["phone"]) && isset($_POST["password"])) {


	    		# code...
	    		if ($this->CustomerModel->check_isset_email_or_sdt('Email' , $_POST["email"]) == true) {
	    			# code...
	    			return header("Location:$this->url/DangNhap?err_email=Email đã tồn tại!!!");
	    			
	    		}
	    		if ($this->CustomerModel->check_isset_email_or_sdt('SDT', $_POST["phone"])) {
	    			# code...
	    			return header("Location:$this->url/DangNhap?err_phone=Số điện thoại đã tồn tại!!!");
	    		}
	    		$arr=[];
	    		$arr["TenKh"] = $_POST["ho-ten"];
	    		$arr["Email"] = $_POST["email"];
	    		$arr["SDT"] = $_POST["phone"];
	    		$arr["DiaChi"] = $_POST["dia-chi"];
	    		$arr["MatKhau"] = md5($_POST["password"]);
	    		if ($this->CustomerModel->insert_customer($arr)) {
	    			return header("Location:$this->url/DangNhap?success=true");
	    			return;
	    		} else {
		    		return header("Location:$this->url/DangNhap?success=false");
	    		}
	    	}
	    	else{
	    		return header("Location:$this->url/DangNhap");
	    	}
	    }
	}
 ?>