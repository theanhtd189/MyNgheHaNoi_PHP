<?php 
	/**
	 * 
	 */
	class SlideController extends Controller
	{
		private $SlideModel;
		public $start;//vị trí bắt đầu

	    public $total;//tổng số sản trang

	    public $limit=10;//ở đây mình lấy 10 sản phẩm trên 1 trang

	    public $page;  //lấy page bên file phantrang.php đưa vào

	    function __construct()
	    {
	    	$this->SlideModel = $this->model("SlideModel");
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

	    	$data  = $this->SlideModel->phan_trang($this->start , $this->limit);

	    	return $data;

	    }
	    public function totalRow(){

	    	$data = $this->SlideModel->return_count_banner();
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
	    		"pages"=>"slide/index",
	    		"css"=>"style_product",
	    		"so_trang"=> $this->total,
	    		"arr_slide" => $arr,
	    		"js"=>"slide"
	    	]);
	    }

	    public function check_isset_tieu_de_slide($value='')
	    {
	    	# code...
	    	if ($this->SlideModel->check_isset_tieu_de_slide($value)) {
	    		# code...
	    		echo json_encode("true");
	    	} else {
	    		# code...
	    		echo json_encode("false");
	    	}
	    	
	    }

	    public function add()
	    {
	    	# code...
	    	if ( isset($_POST["TieuDe"]) && isset($_POST["STT"]) && isset($_FILES["files"]) ) {
	    		# code...
	    		$file = $_FILES["files"];
	    		$arr_status = [];
	    		$str_file = Upload_file_image($file);

	    		$arr = [];
	    		$arr["TieuDe"] = $_POST["TieuDe"];
	    		$arr["STT"] = $_POST["STT"];
	    		$arr["LinkAnh"]= $str_file;

	    		if ($this->SlideModel->add($arr)) {
	    			# code...
	    			$arr_status["title"]= "Success";
	    			$arr_status["trangthai"] = "success";
	    			$arr_status["text"] = "Thêm thành công";
	    			echo json_encode($arr_status);
	    		} else {
	    			# code...
	    			Unlink_file_image($str_file);
	    			$arr_status["title"]= "Error";
	    			$arr_status["trangthai"] = "error";
	    			$arr_status["text"] = "";
	    			echo json_encode($arr_status);
	    		}
	    		

	    	} else {
	    		# code...
	    		$base_url = base_url();
           		header("Location:$base_url/error");
	    	}
	    	
	    }

	    public function check_isset_tieu_de_slide_update($id , $value='')
	    {
	    	# code...
	    	if ($this->SlideModel->check_isset_tieu_de_slide_update($id ,$value)) {
	    		# code...
	    		echo json_encode("true");
	    	} else {
	    		# code...
	    		echo json_encode("false");
	    	}
	    	
	    }
	    public function update($id)
	    {
	    	# code...
	    	if (isset($_POST["ID"]) && isset($_POST["TieuDe"]) && isset($_POST["STT"]) ) {
	    		# code...

	    		$old_slide = $this->SlideModel->return_slide($id);
	    		
	    		$old_str = $old_slide["LinkAnh"];

	    		$new_img = "";
	    		if (isset($_FILES["files"])) {
	    			$new_img = Upload_file_image($_FILES["files"]);
	    		} 
	    		$arr = [];
	    		$arr["TieuDe"] = $_POST["TieuDe"];
	    		$arr["STT"] = $_POST["STT"];

	    		if ($new_img !="") {
	    			# code...
	    			$arr["LinkAnh"]= $new_img;
	    		} 

	    		if ($this->SlideModel->update_slide($id,$arr)) {
	    			# code...
	    			if ($new_img != "") {
	    				Unlink_file_image($old_str);
	    			} 
	    			
	    			$arr_status["title"]= "Success";
	    			$arr_status["trangthai"] = "success";
	    			$arr_status["text"] = "Sửa thành công";
	    			echo json_encode($arr_status);
	    		} else {
	    			# code...
	    			if ($new_img != "") {
	    				Unlink_file_image($new_img);
	    			}
	    			$arr_status["title"]= "Error";
	    			$arr_status["trangthai"] = "error";
	    			$arr_status["text"] = "";
	    			echo json_encode($arr_status);
	    		}
	    		
	    	} else {
	    		# code...
	    		$base_url = base_url();
           		header("Location:$base_url/error");
	    	}
	    	
	    }
	    public function delete_slide($value)
	    {
	    	# code...
	    	if ($this->SlideModel->delete_slide($value)) {
	    			# code...

	    		$arr_status["title"]= "Success";
	    		$arr_status["trangthai"] = "success";
	    		$arr_status["text"] = "Xóa thành công";
	    		echo json_encode($arr_status);
	    	} else {
	    			# code...

	    		$arr_status["title"]= "Error";
	    		$arr_status["trangthai"] = "error";
	    		$arr_status["text"] = "";
	    		echo json_encode($arr_status);
	    	}
	    }
	    public function ChangeStatus($id)
	    {
	    	$slide = $this->SlideModel->return_slide($id);
	    	if (sizeof($slide) > 0) {
            # code...
	    		if ($slide["TrangThai"] == 0) {
                # code...
	    			$this->SlideModel->update_slide($id,["TrangThai"=>1]);
	    		}
	    		else
	    		{
	    			$this->SlideModel->update_slide($id,["TrangThai"=>0]);
	    		}

	    	}
	    	else{
	    		$base_url = base_url();
           		header("Location:$base_url/error");
	    	}
	    }

	}
	?>