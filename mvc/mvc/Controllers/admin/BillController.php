<?php 

	/**
	 * 
	 */
	class BillController extends Controller
	{
		private $BillModel;

		private $DetaleProductModel;

		private $ProductModel;

		public $start;//vị trí bắt đầu

	    public $total;//tổng số sản trang

	    public $limit=10;//ở đây mình lấy 10 sản phẩm trên 1 trang

	    public $page;  //lấy page bên file phantrang.php đưa vào

	    function __construct()
	    {
	    	$this->BillModel = $this->model("BillModel");
	    	$this->ProductModel       = $this->model("ProductModel");
	    	$this->DetaleProductModel = $this->model("DetaleProductModel");
	    	$this->totalRow();
	    	if (!isset($_SESSION["admin"])){
	    		$base_url = base_url();
	    		header("Location:$base_url/admin");
	    	}
	    }


	    public function GetData()
	    {
	        # code...
	    	$this->start = ($this->page-1)*$this->limit;

	    	$data  = $this->BillModel->phan_trang($this->start , $this->limit);

	    	return $data;

	    }
	    public function totalRow(){

	    	$data = $this->BillModel->return_count_bill();
	    	$this->total=ceil($data/$this->limit);
	    	return $this->total;

	    }

	    public function Index()
	    {
	    	if (isset($_GET["page"]) && is_int((int)$_GET["page"])) {
	            # code...
	    		$this->page=$_GET["page"];
	    	}
	    	else
	    	{
	    		$this->page=1;
	    	}
	    	$arr = $this->GetData();

	    	$this->view("admin/index" , [
	    		"pages"=>"bill",
	    		"css"=>"style_product",
	    		"so_trang"=> $this->total,
	    		"arr_bill" => $arr,
	    		"js"=>"bill"
	    	]);
	    }

	    public function muahang($id , $val)
	    {
		# code...
	    	$arr=[];

	    	$bill = $this->BillModel->get_bill($id);
	    	foreach ($bill as $key) {
				# code...
	    		if ($key["SoLuongMua"]  >  $key["detailproduct"]["SoLuong"]) {
					# code...
	    			$arr["title"]= "Error";
	    			$arr["trangthai"] = "error";
	    			$arr["text"] = $key["detailproduct"]["TenSp"]."  / ". $key["detailproduct"]["LoaiSize"]." (Số lượng mua < Số lượng còn)";
	    			return json_encode($arr);

	    		} 
	    	}
	    	$soluongcon = [];
	    	foreach ($bill as $key) {
				# code...
	    		$soluongcon["SoLuong"] = $key["detailproduct"]["SoLuong"] - $key["SoLuongMua"];
	    		if($this->DetaleProductModel->check_isset_detailsproduct($key["MaSPCT"])){
	    			$this->DetaleProductModel->update_product_detale("ID" , $key["MaSPCT"] , $soluongcon);
	    		}
	    	}
	    	$trangthai=[];
	    	$trangthai["TrangThai"] = $val;
	    	$this->BillModel->update_bill("ID" , $id , $trangthai);
	    	$arr["title"]= "Success";
	    	$arr["trangthai"] = "success";
	    	$arr["text"] = "Giao hàng thành công";
	    	return json_encode($arr);
	    }

	    public function giao_hang()
	    {
		# code...
	    	if (isset($_POST["ID"])) {
				# code...
	    		$arr = $this->muahang($_POST["ID"] , 2);
	    		echo ($arr);

	    	} else {
				# code...
	    		echo "error";
	    	}
	    }

	    public function giaohangthanhcong()
	    {
		# code...

	    	if (isset($_POST["ID"])) {
				# code...
	    		$arr = [];
	    		$bill = $this->BillModel->get_frist_bill($_POST["ID"]);
	    		if ($bill["TrangThai"] == 2) {
					# code...
	    			$trangthai=[];
	    			$trangthai["TrangThai"] = 1;
	    			$this->BillModel->update_bill("ID" , $_POST["ID"] , $trangthai);
	    			$arr["title"]= "Success";
	    			$arr["trangthai"] = "success";
	    			$arr["text"] = "";
	    			echo json_encode($arr);
	    		} else {
					# code...
	    			$arr = $this->muahang($_POST["ID"],1);
	    			echo ($arr);
	    		}

	    	} else {
				# code...
	    		$base_url = base_url();
                header("Location:$base_url/error");	
	    	}


	    }

	    public function huydon($id)
	    {
		# code...
	    	$arr=[];

	    	$bill = $this->BillModel->get_bill($id);
	    	$soluongcon = [];
	    	foreach ($bill as $key) {
				# code...
	    		$soluongcon["SoLuong"] = $key["detailproduct"]["SoLuong"] + $key["SoLuongMua"];
	    		if($this->DetaleProductModel->check_isset_detailsproduct($key["MaSPCT"])){
	    			$this->DetaleProductModel->update_product_detale("ID" , $key["MaSPCT"] , $soluongcon);
	    		}
	    	}
	    	$trangthai=[];
	    	$trangthai["TrangThai"] = 0;
	    	$this->BillModel->update_bill("ID" , $id , $trangthai);
	    	$arr["title"]= "Success";
	    	$arr["trangthai"] = "success";
	    	$arr["text"] = "";
	    	return json_encode($arr);
	    }

	    public function huydonhang(){
	    	if (isset($_POST["ID"])) {
			# code...
	    		echo ($this->huydon($_POST["ID"]));
	    	} else {
			# code...
	    		echo "error";
	    	}

	    }

	//// thêm bill
	    public function loadsp()
	    {
		# code...
	    	$arr = [];
	    	if (isset($_POST["MaSP"])) {
			# code...
	    		$arr_product = $this->ProductModel->check_isset_ma_sp($_POST["MaSP"]);
	    		if ( count( $arr_product ) > 0) {
				# code...
	    			unset($arr_product["Slug"]);
	    			unset($arr_product["MoTa"]);
	    			unset($arr_product["ChiTiet"]);
	    			$arr_product["details_product"] = $this->DetaleProductModel->return_detale_product($_POST["MaSP"]);
	    			echo json_encode($arr_product);
	    		} else {
				# code...
	    			echo json_encode($arr);
	    		}

	    	} else {
			# code...
	    		echo json_encode($arr);
	    	}

	    }

	    public function thongtinsanpham($masp , $id)
	    {
		# code...
	    	$arr= $this->DetaleProductModel->return_thong_tin_sp($masp , $id);
	    	echo json_encode($arr);
	    }

	    public function deleteBill()
	    {
		# code...
	    	if (isset($_POST["ID"])) {
			# code...
	    		$this->BillModel->deleteBill($_POST["ID"]);
	    		$arr=[];
	    		$arr["title"]= "Success";
	    		$arr["trangthai"] = "success";
	    		$arr["text"] = "";
	    		echo json_encode($arr);
	    	}
	    }
	}
	?>