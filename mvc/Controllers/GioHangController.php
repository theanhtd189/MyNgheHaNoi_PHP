<?php 

	/**
	 * 
	 */
	class GioHangController extends Controller
	{
		
		private $detailsProductModel ;
		private $productModel;

		function __construct()
		{
			$this->detailsProductModel = $this->model("DetaleProductModel");
			$this->productModel = $this->model("ProductModel");
		}

		public function Index()
		{
			# code...
			$arr = [];
			if (isset($_SESSION["cart"])) {
				# code...
				$arr = $_SESSION["cart"];
			}
			$arrProductBanChay =  $this->productModel->returnProductBanChay( 0, 10 );

			$this->view("client/index" , [
	    		"pages"=>"giohang",
	    		"css"=>"gio-hang",
	    		"cart" => $arr,
	    		"arrProductBanChay"=>$arrProductBanChay
	    	]);
		}
		public function getCart()
		{
			# code...
			$arr = [];
			if (isset($_SESSION["cart"])) {
				# code...
				$arr = $_SESSION["cart"];
			}
			echo json_encode($arr);
		}

		public function add_cart($id , $soluongmua)
		{
			# code...
			$arr_status = [];
			$details_product = $this->detailsProductModel->GetDetailsProduct($id);
			if ($details_product["SoLuong"] < $soluongmua) {
				/// lỗi thông báo sản phẩm không đủ số lượng bán ;
				# code...
				$arr_status["title"]= "Error";
    			$arr_status["trangthai"] = "error";
    			$arr_status["text"] = "Số lượng sản phẩm không đủ bán !!!";
    			echo json_encode($arr_status);
				return;
			}else{
				$details_product["SoLuongMua"] = (int)$soluongmua;
				$gia = (int)$details_product["GiaBan"] -((int)$details_product["GiaBan"] * ($details_product["GiamGia"] / 100));
				$details_product["TongTien"] = (int)$soluongmua * $gia;
			}

			if (! isset($_SESSION["cart"]) || sizeof($_SESSION["cart"]) == 0) {
				# code...
				$_SESSION["cart"] = [];
				array_push($_SESSION["cart"], $details_product);
			}
			else{
				$check = true;
				for ($i=0; $i < sizeof($_SESSION["cart"]) ; $i++) { 
					# code...
					if ($_SESSION["cart"][$i]["ID"] == $details_product["ID"]) {
						# code...
						$tong_sl_mua = $_SESSION["cart"][$i]["SoLuongMua"] + $details_product["SoLuongMua"];
						if ($tong_sl_mua > $_SESSION["cart"][$i]["SoLuong"]) {
							# code...
							$arr_status["title"]= "Error";
    						$arr_status["trangthai"] = "error";
    						$arr_status["text"] = "Số lượng sản phẩm không đủ bán !!!";
							echo json_encode($arr_status);
							return;
						}else{
							$_SESSION["cart"][$i]["SoLuongMua"] =$tong_sl_mua;
							$giaban = (int)$_SESSION["cart"][$i]["GiaBan"] - ((int)$_SESSION["cart"][$i]["GiaBan"] * ($_SESSION["cart"][$i]["GiamGia"] / 100));
							$_SESSION["cart"][$i]["TongTien"] = $giaban * $tong_sl_mua;
						}
						$check = false;
					}
				}

				if ($check) {
					# code...
					array_push($_SESSION["cart"], $details_product);
				}
			}
			$arr_status["title"]= "Success";
    		$arr_status["trangthai"] = "success";
    		$arr_status["text"] = "";
			echo json_encode($arr_status);
		}

		public function delete_cart(){
			unset($_SESSION["cart"]);
		}
		public function delete_product_cart($i){
			$arr_status=[];
			if (isset($_SESSION["cart"][$i])) {
				# code...
				unset($_SESSION["cart"][$i]);
				$_SESSION["cart"] = array_values($_SESSION["cart"]);
				$arr_status["title"]= "Success";
	    		$arr_status["trangthai"] = "success";
				echo json_encode($arr_status);
			}else{
				$arr_status["title"]= "Error";
    			$arr_status["trangthai"] = "error";
    			echo json_encode($arr_status);
			}
		}

		public function edit_so_luong_mua($id,$value)
		{
			# code...
			$arr_status= array();
			if (isset($_SESSION["cart"])) {
				# code...
				for ( $i = 0 ; $i < sizeof($_SESSION["cart"]) ; $i++) { 
					# code...
					if ($_SESSION["cart"][$i]["ID"] == $id) {
						# code...

						if ($value > $_SESSION["cart"][$i]["SoLuong"]) {
							# code...
							$arr_status["title"]= "Error";
    						$arr_status["trangthai"] = "error";
    						$arr_status["text"] = "Số lượng sản phẩm không đủ bán !!!";
							echo json_encode($arr_status);
							return;
						}else{
							$_SESSION["cart"][$i]["SoLuongMua"] = $value;
							$giaban = (int)$_SESSION["cart"][$i]["GiaBan"] - ((int)$_SESSION["cart"][$i]["GiaBan"] * ($_SESSION["cart"][$i]["GiamGia"] / 100));
							$_SESSION["cart"][$i]["TongTien"] = $giaban * $value;
							echo json_encode($arr_status);
						}
					}
				}
				
			}
			
		}
	}

 ?>