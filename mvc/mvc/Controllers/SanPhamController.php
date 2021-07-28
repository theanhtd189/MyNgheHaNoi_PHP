<?php 

	/**
	 * 
	 */
	class SanPhamController extends Controller
	{
		private $productModel;
		private $detaleProductModel;
		private $commentModel;
		public $start;//vị trí bắt đầu

	    public $total = 0;//tổng số sản trang

	    public $limit=10;//ở đây mình lấy 10 sản phẩm trên 1 trang

	    public $page;  //lấy page bên file phantrang.php đưa vào

	   function __construct()
		{
			# code...
			$this->productModel = $this->model("ProductModel");
			$this->commentModel = $this->model("CommentModel");
			$this->detaleProductModel = $this->model("DetaleProductModel");
			$this->page = 1;
		}

		public function GetData($slug)
	    {
	        # code...
	    	$this->start = ($this->page - 1) * $this->limit;
	    	
	    	$data  = $this->commentModel->returnCommentProduct($slug , $this->start , $this->limit );
			
	    	return $data;

	    }
	    public function totalRow($slug)
		{
	    	$data = $this->commentModel->returnCountCommentProduct($slug);
	    	$this->total=ceil($data/$this->limit);
	    	return $this->total;

	    }
		
		public function get($slug)
		{
			# code...
			if (isset($_GET["page"]) && is_int((int)$_GET["page"])) {
	            # code...
	    		$this->page = $_GET["page"];		
	    	}
	    	else
	    	{
	    		$this->page=1;
	    	}
			$arrPorductNoiBat = $this->productModel->returnProductNoiBat(0 , 10);
			$product = $this->productModel->returnProduct("Slug" , $slug);
			$product["details"] = $this->detaleProductModel->return_detale_product($product["MaSP"]);
			$arrProductBanChay =  $this->productModel->returnProductBanChay( 0, 4 );
			$arrComment = $this->GetData($slug);
			
			$this->view("client/index" , [
	    		"pages"=>"sanpham",
	    		"css"=>"style-chi-tiet-san-pham",
	    		"product"=>$product,
	    		"arrProduct"=>$arrPorductNoiBat,
	    		"arrComment"=>$arrComment,
	    		"arrProductBanChay"=>$arrProductBanChay,
	    		"so_trang"=>$this->totalRow($slug),
	    		"js"=>"san-pham"
	    	]);
		}
		public function checkdangnhap()
		{
			# code...
			if (isset($_SESSION["customer"]) && sizeof($_SESSION["customer"])) {
				# code...
				echo json_encode("true");
			}else{
				echo json_encode("false");
			}
		}

		public function comment($slug = "")
		{
			# code...
			$product = $this->productModel->returnProduct("Slug" , $slug);
			$url = base_url();
			if (sizeof($product )> 0) {
				# code...
				if (isset($_POST["noi-dung-comment"]) && isset($_SESSION["customer"])) {
				# code...
					
					$arr = [];
					$arr["ID_SP"] = $product["MaSP"];
					$arr["NoiDung"] = $_POST["noi-dung-comment"];
					$arr["IdKhachHang"] = (isset($_SESSION["customer"]["ID"]))?$_SESSION["customer"]["ID"]:0;
					if($this->commentModel->InsertComment($arr)){
						header("Location:$url/sanpham/get/$slug?action=true");
					}else{
						header("Location:$url/sanpham/get/$slug?action=false");
					}

				}
				else{
					header("Location:$url/sanpham/get/$slug");
				}
			}
			else
			{
				header("Location:$url");
			}
		}
	}

?>