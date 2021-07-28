<?php 

	/**
	 * 
	 */
	class ThanhToanController extends Controller
	{
		private $modelBill;
		function __construct()
		{

	    	$this->modelBill = $this->model("BillModel");
			if (!isset($_SESSION["customer"])) {
				# code...
				$url = base_url();
				header("Location:$url/dangnhap");
			}
		}
		public function Index()
		{
			# code...
	    	$this->view("client/index" , [
	    		"pages"=>"thanhtoan",
	    		"css"=>"thanh-toan",
	    		//"js"=>"mua-hang"
	    	]);
	    }
		public function thanhcong()
		{
			# code...
	    	$this->view("client/index" , [
	    		"pages"=>"thanhcong",
	    		"css"=>"thanh-toan",
	    		//"js"=>"mua-hang"
	    	]);
	    }
	    public function add()
	    {
	    	# code...
	    	$url = base_url();
	    	if (isset($_POST["ho-ten"]) && isset($_POST["sdt"]) && isset($_POST["dia-chi"]) && isset($_POST["ghichu"]) && isset($_POST["pttt"])) {
	    		# code...
	    		if (!isset($_SESSION["cart"]) || sizeof($_SESSION["cart"]) <= 0) {
	    			# code...
	    			header("Location:$url/thanhtoan?cart=err");
	    			return;
	    		}
	    		$tong = 0 ;
	    		foreach ($_SESSION["cart"] as $key) {
	    			# code...
	    			$tong+=(int)$key["TongTien"];
	    		}
	    		
	    		$arr = [];
	    		$arr["MaKH"] = $_SESSION["customer"]["ID"];
	    		$arr["TenNguoiNhan"] = $_POST["ho-ten"];
	    		$arr["TongTien"] = $tong;
	    		$arr["DiaChiGiao"] = $_POST["dia-chi"];
	    		$arr["SDT"] = $_POST["sdt"];
	    		$arr["GhiChu"] = $_POST["ghichu"];
	    		$arr["PTTT"] = $_POST["pttt"];
	    		
	    		$id = $this->modelBill->insertBill($arr);
	    		foreach ($_SESSION["cart"]as $cart) {
	    			# code...
	    			$detailsbill=[];
	    			$detailsbill["MaSPCT"]= $cart["ID"];
	    			$detailsbill["Ten"]= $cart["TenSp"] . " ( ".$cart["LoaiSize"]." )";
	    			$detailsbill["GiaBan"]= $cart["GiaBan"];
	    			$detailsbill["GiamGia"]= $cart["GiamGia"];
	    			$detailsbill["ThanhTien"]= $cart["TongTien"];
	    			$detailsbill["SoLuongMua"]= $cart["SoLuongMua"];
	    			$detailsbill["IdBill"]= $id;
	    			$this->modelBill->insertDetailsBill($detailsbill);
	    		}
	    		unset($_SESSION["cart"]);
	    		header("Location:$url/thanhtoan?success=true");
	    		
	    	}
	    	else{
	    		header("Location:$url/thanhtoan");
	    	}
	    }
	}

 ?>