<?php 

	/**
	 * 
	 */
	class TinTucController extends Controller
	{
		private $productModel;

		private $postModel ;

		public $start;//vị trí bắt đầu

	    public $total = 0;//tổng số sản trang

	    public $limit=10;//ở đây mình lấy 10 sản phẩm trên 1 trang

	    public $page;  //lấy page bên file phantrang.php đưa vào

	    function __construct()
		{
			# code...
			$this->postModel = $this->model("PostsModel");
			$this->productModel = $this->model("ProductModel");

			$this->page = 1;
		}
		public function GetData()
	    {
	        # code...
	    	$this->start = ($this->page - 1) * $this->limit;
	    	
	    	$data  = $this->postModel->returnPostClient( $this->start , $this->limit );
			
	    	return $data;

	    }
	    public function totalRow(){

	    	$data = $this->postModel->returnCountPostClient();
	    	$this->total=ceil($data/$this->limit);
	    	return $this->total;

	    }
		
		public function Index()
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
	    	$arrPost = $this->GetData();
	    	$arrProductBanChay =  $this->productModel->returnProductBanChay( 0, 4 );

	    	$this->view("client/index" , [
	    		"pages"=>"tintuc",
	    		"css"=>"tin-tuc",
	    		"arrPost"=>$arrPost,
	    		"arrProductBanChay"=>$arrProductBanChay,
	    		"so_trang"=> $this->totalRow()
	    		//"js"=>"danh-muc",

	    	]);
	    }
	    public function get($slug)
	    {
	    	# code...
	    	$arrProductBanChay =  $this->productModel->returnProductBanChay( 0, 4 );

	    	$tintuc = $this->postModel->getPostsSLug($slug);
	    	$this->view("client/index" , [
	    		"pages"=>"chitiettintuc",
	    		"css"=>"tin-tuc",
	    		"arrProductBanChay"=>$arrProductBanChay,
	    		"tintuc"=>$tintuc
	    		//"js"=>"danh-muc"
	    	]);
	    }
	}

 ?>