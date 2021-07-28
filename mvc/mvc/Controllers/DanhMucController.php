<?php 
	
	/**
	 * 
	 */
	class DanhMucController extends Controller
	{
		private $categoryModel;
		private $productModel;
		private $detaleProductModel;

		public $start;//vị trí bắt đầu

	    public $total = 0;//tổng số sản trang

	    public $limit=10;//ở đây mình lấy 10 sản phẩm trên 1 trang

	    public $page;  //lấy page bên file phantrang.php đưa vào

	    function __construct()
		{
			# code...
			$this->categoryModel = $this->model("CategoryModel");
			$this->productModel = $this->model("ProductModel");
			$this->detaleProductModel = $this->model("DetaleProductModel");
			$this->page = 1;
		}
		public function GetData($val)
	    {
	        # code...
	    	$this->start = ($this->page - 1)*$this->limit;
	    	
	    	$data  = $this->productModel->returnProductCategory($val , $this->limit , $this->start);
			
	    	return $data;

	    }
	    public function totalRow($slug){

	    	$data = $this->productModel->returnCountProductCategory($slug);
	    	$this->total=ceil($data/$this->limit);
	    	return $this->total;

	    }

		
		public function Index()
		{
			# code...
			$arrCategory = $this->categoryModel->GetListClientCategory();
			$arrProductBanChay =  $this->productModel->returnProductBanChay( 0, 10 );
			$arrProduct = $this->productModel->returnProductNoiBat(0 , 9);
	    	$this->view("client/index" , [
	    		"pages"=>"danhmuc",
	    		"css"=>"san-pham",
	    		"title" => "Sản Phẩm Nổi Bật",
	    		"arrCategory"=>$arrCategory,
	    		"arrProduct" => $arrProduct,
	    		"arrProductBanChay"=>$arrProductBanChay,
	    		"so_trang"=> -1,
	    		// "arrProduct"=>$arrProduct,
	    		// "arrProductNew"=>$arrProductNew,
	    		// "arrPostsNew" => $arrPostsNew,
	    		"js"=>"danh-muc"
	    	]);
	    
		}

		public function get($val)
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
	    	$this->totalRow($val);
	    	$cate = $this->categoryModel->getFirstCategorySlug($val);
			$arr = $this->GetData($val);
			$arrProductBanChay =  $this->productModel->returnProductBanChay( 0, 10 );
			$arrCategory = $this->categoryModel->GetListClientCategory();

			$this->view("client/index" , [
	    		"pages"=>"danhmuc",
	    		"css"=>"san-pham",
	    		"title" => "Sản Phẩm Nổi Bật",
	    		"arrCategory"=>$arrCategory,
	    		"arrProduct" => $arr,
	    		"so_trang"=> $this->total,
	    		"category"=>$cate,
	    		"arrProductBanChay"=>$arrProductBanChay,
	    		// "arrProduct"=>$arrProduct,
	    		// "arrProductNew"=>$arrProductNew,
	    		// "arrPostsNew" => $arrPostsNew,
	    		"js"=>"danh-muc"
	    	]);
	    }
	}

?>