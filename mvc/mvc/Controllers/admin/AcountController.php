<?php 

	/**
	 * 
	 */
	class AcountController extends Controller
	{
		
		private $AcountModel ;

	    public $start;//vị trí bắt đầu

	    public $total;//tổng số sản trang

	    public $limit=10;//ở đây mình lấy 10 sản phẩm trên 1 trang

	    public $page;  //lấy page bên file phantrang.php đưa vào

	    function __construct()
	    {
	    	$this->AcountModel = $this->model("AcountModel");
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

	    	$data  = $this->AcountModel->phan_trang($this->start , $this->limit);

	    	return $data;

	    }
	    public function totalRow(){

	    	$data = $this->AcountModel->return_count_acount();
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
	    		"pages"=>"acount",
	    		"css"=>"style_product",
	    		"so_trang"=> $this->total,
	    		"arr_acount" => $arr,
	    		"js"=>"acount"
	    	]);
	    }

	    public function check_isset_column($key,$val)
	    {
	    	# code...

			# code...
	    	$arr = $this->AcountModel->check_isset_column($key,$val);
	    	if($arr!=null){
	    		echo json_encode("true");
	    	}else{
	    		echo json_encode("false");
	    	}

	    }
	    public function check_isset_column_update($id,$key,$val)
	    {
	    	# code...

			# code...
	    	$arr = $this->AcountModel->check_isset_column_update($id,$key,$val);
	    	if($arr!=null){
	    		echo json_encode("true");
	    	}else{
	    		echo json_encode("false");
	    	}

	    }

	    public function add()
	    {
    	# code...
	    	if (isset($_POST["HoTen"]) && isset($_POST["SoDienThoai"]) && isset($_POST["DiaChi"]) && isset($_POST["TaiKhoan"]) &&isset($_POST["MatKhau"])) {
    		# code...
	    		$arr=[];
	    		$arr["HoTen"] = $_POST["HoTen"];
	    		$arr["SoDienThoai"] = $_POST["SoDienThoai"];
	    		$arr["DiaChi"] = $_POST["DiaChi"];
	    		$arr["TaiKhoan"] = $_POST["TaiKhoan"];
	    		$arr["MatKhau"] = md5($_POST["MatKhau"]);
	    		if ($this->AcountModel->insert_acount($arr)) {
	    			$arr_status["title"]= "Success";
	    			$arr_status["trangthai"] = "success";
	    			$arr_status["text"] = "Thêm thành công";
	    			echo json_encode($arr_status);
	    		} else {
	    			# code...

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

	    public function update()
	    {
    	# code...
	    	if (isset($_POST["HoTen"]) && isset($_POST["SoDienThoai"]) && isset($_POST["DiaChi"]) && isset($_POST["ID"]) &&isset($_POST["MatKhau"])) {
    		# code...
	    		$arr=[];
	    		$arr["HoTen"] = $_POST["HoTen"];
	    		$arr["SoDienThoai"] = $_POST["SoDienThoai"];
	    		$arr["DiaChi"] = $_POST["DiaChi"];
	    		if ($_POST["MatKhau"] != "") {
	    			# code...
	    			$arr["MatKhau"] = md5($_POST["MatKhau"]);
	    		}
	    		if ($this->AcountModel->update_acount($_POST["ID"],$arr)) {
	    			$arr_status["title"]= "Success";
	    			$arr_status["trangthai"] = "success";
	    			$arr_status["text"] = "Sửa thành công";
	    			echo json_encode($arr_status);
	    		} else {
	    			# code...

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
	    public function delete_acount($id)
	    {
	        # code...
	        if ($this->AcountModel->delete_acount($id)) {
	            echo json_encode("true");
	        }else{
	            echo json_encode("false");
	        }
	        
	    }

	    public function get(){
	    	$this->view("admin/index" , [
	    		"pages"=>"setup",
	    		
	    	]);
	    }
	    public function ChangeStatus($id)
	    {
	    	$slide = $this->AcountModel->get_first_acount("ID",$id);
	    	if (sizeof($slide) > 0) {
            # code...
	    		if ($slide["TrangThai"] == 0) {
                # code...
	    			$this->AcountModel->update_acount($id,["TrangThai"=>1]);
	    		}
	    		else
	    		{
	    			$this->AcountModel->update_acount($id,["TrangThai"=>0]);
	    		}

	    	}
	    	else{
	    		$base_url = base_url();
                header("Location:$base_url/error");	
	    	}
	    }
	}

	?>