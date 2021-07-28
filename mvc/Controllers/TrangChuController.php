<?php 

	/**
	 * 
	 */
	class TrangChuController extends Controller
	{
		private $slideModel;
		private $productModel;
		private $postsModel;
		private $productDetail;

		public function __construct()
		{
			$this->slideModel = $this->model("SlideModel");
			$this->productModel = $this->model("ProductModel");
			$this->postsModel = $this->model("PostsModel");
			$this->productDetail = $this->model("DetaleProductModel");
		}

		public function Index()
		{
			# code...
			$arrProduct = $this->productModel->returnProductNoiBat(0 , 10);
			$arrSlide = $this->slideModel->returnAllSlide();
			$arrProductNew = $this->productModel->returnProductNew();
			$arrPostsNew = $this->postsModel->returnPostsNew();
			$arrProductBanChay =  $this->productModel->returnProductBanChay( 5, 10 );
			// echo "<pre>";
			// var_dump($arrSlide);
			// exit();
	    	$this->view("client/index" , [
	    		"pages"=>"trangchu",
				"arrSlide"=>$arrSlide,
	    		"arrProduct"=>$arrProduct,
	    		"arrProductNew"=>$arrProductNew,
	    		"arrProductBanChay" =>$arrProductBanChay,
	    		"arrPostsNew" => $arrPostsNew,
	    		"css"=>"style",
	    		"js"=>"trangchu"
	    	]);
	    
		}
		public function loadDetailProduct($ma_sp)
		{
			# code...
			$arrDetailsProduct = [];
			$data = $this->productModel->returnInformationPorduct($ma_sp);
			echo json_encode($data);
		}
	}

 ?>