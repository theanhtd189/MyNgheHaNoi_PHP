<?php 
/**
 * 
 */
class CustomerController extends Controller
{
	private $CustomerModel;

	public $start;//vị trí bắt đầu

    public $total;//tổng số sản trang

    public $limit=10;//ở đây mình lấy 10 sản phẩm trên 1 trang

    public $page;  //lấy page bên file phantrang.php đưa vào

    function __construct()
    {
    	$this->CustomerModel = $this->model("CustomerModel");
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

    	$data  = $this->CustomerModel->phan_trang($this->start , $this->limit);

    	return $data;

    }
    public function totalRow(){

    	$data = $this->CustomerModel->return_count_customer();
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
    		"pages"=>"customer",
    		"css"=>"style_product",
    		"so_trang"=> $this->total,
    		"arr_customer" => $arr,
    		"js"=>"customer"
    	]);
    }

    public function check_isset_email_or_sdt($key , $val)
    {
    	# code...
    	$check = $this->CustomerModel->check_isset_email_or_sdt($key , $val);
    	if ($check){
            # code...
    		echo json_encode("true");
    	}else{
    		echo json_encode("false");
    	}
    }
    public function add()
    {
    	# code...
    	if (isset($_POST["TenKh"]) && isset($_POST["Email"]) && isset($_POST["SDT"]) && isset($_POST["DiaChi"])&&isset($_POST["MatKhau"])) {
    		# code...
    		$arr=[];
    		$arr["TenKh"] = $_POST["TenKh"];
    		$arr["Email"] = $_POST["Email"];
    		$arr["SDT"] = $_POST["SDT"];
    		$arr["DiaChi"] = $_POST["DiaChi"];
    		$arr["MatKhau"] = md5($_POST["MatKhau"]);
    		if ($this->CustomerModel->insert_customer($arr)) {
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


    public function delete( $value)
    {
    	# code...
    	$arr_status = [];
    	if ($this->CustomerModel->delete_customer($value)) {
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

    
    public function delete_list_customer()
    {
    	# code...
    	$arr_status = [];
    	if (isset($_POST["danhsach"])) {
    		# code...
    		try{
    			foreach ($_POST["danhsach"] as $key) {
    			# code...
	    			$this->CustomerModel->delete_customer($key);
	    		}
	    		$arr_status["title"]= "Success";
	    		$arr_status["trangthai"] = "success";
	    		$arr_status["text"] = "Xóa thành công";
	    		echo json_encode($arr_status);
    		}catch(exception  $ex){
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

    public function ChangeStatus($id)
        {
            $customer = $this->CustomerModel->get_customer("ID" ,$id);
            if (sizeof($customer) > 0) {
            # code...
                if ($customer["TrangThai"] == 0) {
                # code...
                    $this->CustomerModel->update_customer($id,["TrangThai"=>1]);
                }
                else
                {
                    $this->CustomerModel->update_customer($id,["TrangThai"=>0]);
                }

            }
            else{
                $base_url = base_url();
                header("Location:$base_url/error");
            }
        }
}

 ?>