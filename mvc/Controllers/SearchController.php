<?php 

	/**
	 * 
	 */
	class SearchController extends Controller
	{
		private $productModel;
		private $detaleProductModel;
		private $arrProduct;
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
			$this->arrProduct = [];
			$this->page = 1;
		}
		public function GetData()
	    {
	        # code...
	    	$this->start = ($this->page - 1)*$this->limit;
	    	
	    	$data  =array_slice($this->arrProduct , $this->start , $this->limit);
			
	    	return $data;

	    }

	    public function setArrProduct($str)
	    {
	    	# code...
	    	$this->arrProduct = $this->productModel->returnProductSearch($str);
	    }

	    public function getArrProduct()
	    {
	    	# code...
	    	return $this->arrProduct;

	    }

	    public function totalRow(){

	    	$data = sizeof($this->getArrProduct());
	    	$this->total=ceil($data/$this->limit);
	    	return $this->total;

	    }
		public function Index()
		{
			# code...

			if (isset($_GET['price']) && !empty($_GET['price'])) {
				// code...
				$str ='';
				$arr = explode('-',$_GET['price']);
				if(sizeof($arr) > 1){
					$str = "AND detailedproducts.GiaBan BETWEEN $arr[0] AND $arr[1]" ;
				}else{
					$str = "AND detailedproducts.GiaBan >= $arr[0]";
				}
				$this->arrProduct = $this->productModel->returnProductSearchPrice($str);

			}
			
			if (isset($_GET["val"])) {
				# code...
				$this->setArrProduct($_GET["val"]);
			}
			if (isset($_GET["page"]) && is_int((int)$_GET["page"])) {
	            # code...
	    		$this->page = $_GET["page"];		
	    	}
	    	else
	    	{
	    		$this->page=1;
	    	}

	    	$arrProductBanChay =  $this->productModel->returnProductBanChay( 0, 10 );


	    	$this->view("client/index" , [
	    		"pages"=>"search",
	    		"css"=>"san-pham",
	    		"so_trang"=>$this->totalRow(),
	    		"arrProductBanChay" =>$arrProductBanChay,
	    		"input_search"=>(isset($_GET["val"]))?$_GET["val"]:"",
	    		"dataProduct"=>$this->GetData(),
	    		//"js"=>"danh-muc"
	    	]);

	    }
	}

?>