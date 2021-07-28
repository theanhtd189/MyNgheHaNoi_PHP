<?php 
	/**
	 * 
	 */
	class ProductController extends Controller
	{
		public $CategoryModel ;
		public $ProductModel;
		public $DetaleProductModel;

		public $start;//vị trí bắt đầu

        public $total;//tổng số sản trang

        public $limit=10;//ở đây mình lấy 10 sản phẩm trên 1 trang

        public $page;  //lấy page bên file phantrang.php đưa vào

        function __construct()
        {
        	$this->CategoryModel = $this->model("CategoryModel");
        	$this->ProductModel = $this->model("ProductModel");
        	$this->DetaleProductModel = $this->model("DetaleProductModel");
        	$this->totalRow();
            if (!isset($_SESSION["admin"])){
                $base_url = base_url();
                header("Location:$base_url/admin");
            }
        }


        public function GetData()
        {
        	
        	$this->start = ($this->page-1)*$this->limit;

        	$data  = $this->ProductModel->phan_trang($this->start , $this->limit);

        	return $data;

        }
        public function totalRow(){

        	$data = $this->ProductModel->table("product")->count_data();
        	$this->total=ceil($data/$this->limit);
        	return $this->total;

        }




        public function index()
        {
        	if (isset($_GET["page"]) && is_int((int)$_GET["page"])) {
                
        		$this->page=$_GET["page"];
        	}
        	else
        	{
        		$this->page=1;
        	}
        	$arr_product = $this->GetData();

         

        	$this->view("admin/index" , [
        		"pages"=>"product/index",
        		"css"=>"style_product",
        		"js"=>"product_index",
        		"so_trang"=>$this->total,
        		"arr_product"=>$this->GetData()
        	]);
        }



        public function add()
        {
         
        	$this->view("admin/index" , [
        		"pages"=>"product/insert_product",
        		"css"=>"style_product",
        		"js"=>"product_add",
        		"value_category"=>$this->CategoryModel->list()
        	]);

        }
        public function Ajax_check_ma_sp($masp)
        {
         
        	$arr = $this->ProductModel->check_isset_ma_sp($masp);
        	if($arr!=null){
        		echo json_encode("true");
        	}else{
        		echo json_encode("false");
        	}
        }

        public function Ajax_check_slug($val)
        {
         
        	$arr = $this->ProductModel->checkisset_ten_sp("Slug",$val);
        	if($arr!=null){
        		echo json_encode("true");
        	}else{
        		echo json_encode("false");
        	}
        }

        public function insert()
        {
         
        	if(isset($_POST["btn_them_product"])){
        		$str_list_img = "";
        		if (!empty($_FILES["product-list-images"]["name"][0])) {
                   

        			$arr_list_img = [];
        			for ($i=0; $i < count($_FILES["product-list-images"]["name"]) ; $i++) { 
                      
        				$arr_list_img[$i]["name"] = $_FILES["product-list-images"]["name"][$i];
        				$arr_list_img[$i]["type"] = $_FILES["product-list-images"]["type"][$i];
        				$arr_list_img[$i]["tmp_name"] = $_FILES["product-list-images"]["tmp_name"][$i];
        				$arr_list_img[$i]["error"] = $_FILES["product-list-images"]["error"][$i];
        				$arr_list_img[$i]["size"] = $_FILES["product-list-images"]["size"][$i];

        			}
        			foreach ($arr_list_img as $key ) {
                      
        				$str_list_img .= Upload_file_image($key) .",";
        			}
        			$str_list_img = rtrim($str_list_img , ",");
        		}
        		$str_img_chinh =  Upload_file_image($_FILES["product-images"]);


        		$data_product = [];
        		$data_product["MaSP"] = $_POST["product-ma"];
        		$data_product["CategoryID"] = $_POST["category_id"];
        		$data_product["TenSp"] = $_POST["product-tieu-de"];
        		$data_product["Slug"] = $_POST["product-slug"]; 
        		$data_product["XuatXu"] = $_POST["product-xuat-xu"]; 
        		$data_product["AnhChinh"] = $str_img_chinh; 
        		$data_product["DonViTinh"] = $_POST["product-don-vi-tinh"];
        		$data_product["ListAnh"] = $str_list_img;
                $data_product["NoiBat"] = $_POST["product-noi-bat"];
                $data_product["MoTa"] = $_POST["product-mo-ta"]; 
                $data_product["ChiTiet"] = $_POST["product-chi-tiet"]; 

                $data_detaleProduct = [];
                $data = [];
                $data["product_loai"] = $_POST["detaileproduct-loai"]; 
                $data["product_so_luong"] = $_POST["detaileproduct-so-luong"]; 
                $data["product_gia_nhap"] = $_POST["detaileproduct-gia-nhap"]; 
                $data["product_gia_ban"] = $_POST["detaileproduct-gia-ban"]; 
                $data["product_giam_gia"] = $_POST["detaileproduct-giam-gia"]; 

                if (!$this->ProductModel->add($data_product)) {
                 Unlink_file_image($str_img_chinh);
                 $arr_unlink = explode(",",filter_var(trim($str_list_img,",")));
                 foreach ($arr_unlink as $key => $value) {
                  
                    Unlink_file_image($value);
                }
                header("Location:./add&err=true");
                return;
            }
            for ($i=0; $i < count($data["product_loai"]); $i++) { 
               
             $data_detaleProduct[$i]["LoaiSize"] = $data["product_loai"][$i];
             $data_detaleProduct[$i]["MaSP"] = $data_product["MaSP"];
             $data_detaleProduct[$i]["SoLuong"] = $data["product_so_luong"][$i];
             $data_detaleProduct[$i]["GiaNhap"] = $data["product_gia_nhap"][$i];
             $data_detaleProduct[$i]["GiaBan"] = $data["product_gia_ban"][$i];
             $data_detaleProduct[$i]["GiamGia"] = $data["product_giam_gia"][$i];

         }
         foreach ($data_detaleProduct as $key) {
           
             $this->DetaleProductModel->add($key);
         }
         header("Location:./add&success=true");
     }
     else{
      $base_url = base_url();
      header("Location:$base_url/error");
  }

}

public function edit($val)
{
   
   $product_update = $this->ProductModel->returnProduct("MaSP" , $val);
   $this->view("admin/index" , [
      "pages"=>"product/edit_product",
      "css"=>"style_product",
      "js"=>"product_edit",
      "value_category"=>$this->CategoryModel->list(),
      "value_product_old"=>$product_update ,
      "value_detaledproducts"=>$this->DetaleProductModel->return_detale_product($val)
  ]);
}


public function update($id)
{
 
   if(isset($_POST["btn_update_product"])){
      $product_update = $this->ProductModel->returnProduct("MaSP" , $id);
      $str_list_img = "";

      $arr_old_list_img = (substr_count($product_update["ListAnh"], ",") == 0)?$product_update["ListAnh"]:explode(",",$product_update["ListAnh"]);

      $old_img = $product_update["AnhChinh"];

      if (!empty($_FILES["product-list-images"]["name"][0])) {
       

        $arr_list_img = [];
        for ($i=0; $i < count($_FILES["product-list-images"]["name"]) ; $i++) {
          
            $arr_list_img[$i]["name"] = $_FILES["product-list-images"]["name"][$i];
            $arr_list_img[$i]["type"] = $_FILES["product-list-images"]["type"][$i];
            $arr_list_img[$i]["tmp_name"] = $_FILES["product-list-images"]["tmp_name"][$i];
            $arr_list_img[$i]["error"] = $_FILES["product-list-images"]["error"][$i];
            $arr_list_img[$i]["size"] = $_FILES["product-list-images"]["size"][$i];
        }
        foreach ($arr_list_img as $key ) {
          
            $str_list_img .= Upload_file_image($key) .",";
        }
        $str_list_img = rtrim($str_list_img , ",");
    }

    $str_img_chinh = "";
    if (!empty($_FILES["product-images"]["name"][0])){

        $str_img_chinh = Upload_file_image($_FILES["product-images"]);
    }

    $data_product = [];
    $data_product["CategoryID"] = $_POST["category_id"];
    $data_product["TenSp"] = $_POST["product-tieu-de"];

    $data_product["Slug"] = $_POST["product-slug"]; 
    $data_product["XuatXu"] = $_POST["product-xuat-xu"];
    if ($str_img_chinh!="") {
      
        $data_product["AnhChinh"] = $str_img_chinh;
    } 
    if ($str_list_img!="") {
      
        $data_product["ListAnh"] = $str_list_img;
    }  
    $data_product["DonViTinh"] = $_POST["product-don-vi-tinh"];

    $data_product["MoTa"] = trim($_POST["product-mo-ta"]); 
    $data_product["ChiTiet"] = $_POST["product-chi-tiet-edit"]; 



    if ($this->ProductModel->update("MaSP" , $id , $data_product)) {
        
        if ($str_img_chinh!="") {
            
            Unlink_file_image($old_img );
        }


        if ($str_list_img!="") {
            if (is_string($arr_old_list_img)) {
                
                Unlink_file_image($arr_old_list_img);
            }else{
                foreach ($arr_old_list_img as $key) {
                  
                    Unlink_file_image($key);
                }
            }
            
        }

        header("Location:../edit/$id&success=true");
    }
    else{

        if($str_list_img!=""){
            if (substr_count($str_list_img, ",")  == 0) {
                
                Unlink_file_image($str_list_img);
            }else{
                $arr = explode(",",$str_list_img);
                foreach ($arr as $key ) {
                    
                    Unlink_file_image($key);
                }
            }
        }
        if ($str_img_chinh!="") {
            
            Unlink_file_image($str_img_chinh);
        }
        header("Location:../edit/$id&err=error");
    }

}
else{
 $base_url = base_url();
 header("Location:$base_url/error");
}
}


        //// ajax edit_product :
public function check_update_isset_loai_size($id , $value ,$masp)
{
    
    if($this->DetaleProductModel->check_update_isset_loai_size($id , $value ,$masp)){
        echo json_encode("true");
    }else{
        echo json_encode("false");
    }
}
public function check_add_isset_loai_size($value , $idsp)
{
    
    if($this->DetaleProductModel->check_add_isset_loai_size($value , $idsp)){
        echo json_encode("true");
    }else{
        echo json_encode("false");
    }
}

public  function  add_detale_product($id)
{
    $arr = [];
    if (isset($_POST["Loai"]) && isset($_POST["SoLuong"]) && isset($_POST["GiaNhap"]) && isset($_POST["GiaBan"]) && isset($_POST["GiamGia"])) {
        $data = [
            "LoaiSize" => $_POST["Loai"],
            "SoLuong" =>$_POST["SoLuong"],
            "GiaNhap"=>$_POST["GiaNhap"],
            "GiaBan"=>$_POST["GiaBan"],
            "GiamGia"=>$_POST["GiamGia"],
            "MaSP"=>$id
        ];
        if($this->DetaleProductModel->add($data)){
            $arr["title"]= "Success";
            $arr["trangthai"] = "success";
            $arr["text"] = "Thêm thành công";
        }
        echo json_encode($arr);
    }
    else
    {
        $arr["title"]= "Error";
        $arr["trangthai"] = "error";
        $arr["text"] = "";
        echo json_encode($arr);
    }
}

public function update_detale_product(){
    $arr= [];
    if (isset($_POST["Loai"]) && isset($_POST["SoLuong"]) && isset($_POST["GiaNhap"]) && isset($_POST["GiaBan"]) && isset($_POST["GiamGia"])) {
       
        $id = $_POST["ID"] ;  
        $data = [
            "LoaiSize" => $_POST["Loai"],
            "SoLuong" =>$_POST["SoLuong"],
            "GiaNhap"=>$_POST["GiaNhap"],
            "GiaBan"=>$_POST["GiaBan"],
            "GiamGia"=>$_POST["GiamGia"]
        ];

        if($this->DetaleProductModel->update_product_detale("ID",$id, $data)){
            $arr["title"]= "Success";
            $arr["trangthai"] = "success";
            $arr["text"] = "Sửa thành công";
        }
        echo json_encode($arr);
    }else{
        $arr["title"]= "Error";
        $arr["trangthai"] = "error";
        $arr["text"] = "";
        echo json_encode($arr);
    }
}
public  function del_detale_product($id){
    $arr= [];
    if($this->DetaleProductModel->del_product_detale($id)){
        $arr["title"]= "Success";
        $arr["trangthai"] = "success";
        $arr["text"] = "Xóa thành công";
        echo json_encode($arr);
    }else{
        $arr["title"]= "Error";
        $arr["trangthai"] = "error";
        $arr["text"] = "";
        echo json_encode($arr);
    }

}


public function deleteArrProduct()
{
    
    if (isset($_POST["arrDelProduct"])) {
        
        if (sizeof($_POST["arrDelProduct"]) > 0) {
            
            foreach ($_POST["arrDelProduct"] as $key) {
                
                $this->ProductModel->delete_prod($key);
            }
        }
        $arr=[];
        $arr["title"]= "Success";
        $arr["trangthai"] = "success";
        $arr["text"] = "Xóa thành công";
        echo json_encode($arr);
    }else{
        $base_url = base_url();
            header("Location:$base_url/error");
    }
}

public function delete($value)
{
    
    $arr= [];
    if ($this->ProductModel->delete_prod($value) ){
        
        $arr["title"]= "Success";
        $arr["trangthai"] = "success";
        $arr["text"] = "Xóa thành công";
        echo json_encode($arr);
    }else{
        $arr["title"]= "Error";
        $arr["trangthai"] = "error";
        $arr["text"] = "";
        echo json_encode($arr);
    }
}


public function changeState($id)
{
    
    $product = $this->ProductModel->returnProduct("MaSP",$id);

    $arrDetailsProduct = $this->DetaleProductModel->return_detale_product($id);

    if ($product["TrangThai"] == 1) {

        $this->ProductModel->update_product("MaSP",$id , ["TrangThai" => 0]);

        if (sizeof($arrDetailsProduct) > 0) {
            
            foreach ($arrDetailsProduct as $key) {
                
                $this->DetaleProductModel->update_product_detale("ID" , $key["ID"] , ["TrangThai" => 0] );
            }
        }
        
    }else{   
        $this->ProductModel->update_product("MaSP" ,$id , ["TrangThai" => 1]);

        if (sizeof($arrDetailsProduct) > 0) {
            
            foreach ($arrDetailsProduct as $key) {
                
                $this->DetaleProductModel->update_product_detale("ID" , $key["ID"] , ["TrangThai" => 1] );
            }
        }
    }
}
public function ChangeNoiBaT($id)
{
    $product = $this->ProductModel->returnProduct("MaSP",$id);
    if ($product["NoiBat"] == 1) {
        $this->ProductModel->update_product("MaSP",$id , ["NoiBat" => 0]);
    }else{
        $this->ProductModel->update_product("MaSP",$id , ["NoiBat" => 1]);
    }
}
}
?>