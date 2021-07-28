<?php 
	/**
	 * 
	 */
	class CategoryController extends Controller
	{
		public $CategoryModel ;

        public $arrCategory = [];

		public $start;//vị trí bắt đầu

        public $total;//tổng số sản trang

        public $limit=5;//ở đây mình lấy 5 sản phẩm trên 1 trang

        public $next; //button next

        public $back; //button back

        public $page_current;  //trang hien tai

        public $page;  //lấy page bên file phantrang.php đưa vào

        public $nodeChildrenCategory=[]; // xử dụng list danh sách ID con khi xóa thằng cha

        function __construct()
        {
            $this->CategoryModel =  $this->model("CategoryModel");
            $this->page = 1;
            if (!isset($_SESSION["admin"])){
                $base_url = base_url();

                header("Location:$base_url/admin");
            }
            $this->setArrCategory();
        }

        public function setArrCategory(){
            $arr = $this->CategoryModel->getAllCategory();
            $this->DeQuyArrCategory($arr);
            $this->setTotalRow();
        }
        public function DeQuyArrCategory($table ,  $id = 0 , $str = '')
        {

            for ($i=0; $i < count($table); $i++) { 
                # code...
                if ($table[$i]["ParentID"] == $id) {
                    $category = $this->getFirstCategory($table[$i]["ParentID"]);
                    $table[$i]["TenDanhMuc"] = $str." ".$table[$i]["TenDanhMuc"] ;
                    $strNameParentID = (count($category)>0 && array_key_exists("TenDanhMuc", $category))?$category["TenDanhMuc"]:"";
                    $table[$i]["TenDanhMucParentID"]=$strNameParentID;
                    array_push($this->arrCategory, $table[$i]);
                    $this->DeQuyArrCategory($table, $table[$i]["ID"],$str.'--| ');
                }
            }
        }

        public function getFirstCategory($id){
            return $this->CategoryModel->getFirstCategory($id);
        }

        public function setTotalRow(){
            $count = count($this->arrCategory);
            $this->total=ceil($count/$this->limit);
        }


        public function page($val){

            if ($val < 1) {
                $this->page = 1;
            	# code...
            }
            else if($val > $this->total){
                $this->page = $this->total;
            }
            else{
                $this->page=$val;
            }

            $this->start = ($this->page-1)*$this->limit;
            $this->page_current=$this->page;
            $data = [];
            $data["html"] = $this->loadPage();
            $data["value"] = $this->get_data();
            echo json_encode($data);

        }



        public function get_data()
        {
        	# code...
            return array_slice($this->arrCategory,$this->start , $this->limit);
        }


        public function loadPage()
        {
			# code...

           $link='<ul id="phantrang" class="pagination justify-content-center page pagination-sm">';

           if($this->page_current > 1){

            $this->back=$this->page_current-1;

            $link.='<li class="page-item"><button onclick="LoadPage(this)" class="page-link" value="'.$this->back.'">Previous</button></li>';

        }
        for($i = 1 ; $i <= $this->total ; $i++){

            if($i == $this->page_current){

                $link.='<li class="page-item"><button onclick="LoadPage(this)" class="page-link bg-danger" value="'.$i.'">'.$i.'</button></li>';

            }

            else{

                $link.='<li class="page-item"><button onclick="LoadPage(this)" class="page-link" value="'.$i.'">'.$i.'</button></li>';

            }

        }

        if($this->page_current < $this->total){

            $this->next = $this->page_current+1;

            $link.='<li class="page-item"><button onclick="LoadPage(this)" class="page-link" value="'.$this->next.'">Next</button></li>';

        }
        $link.="</ul>";
        return $link;
    }



    public function index()
    {
			# code...
			// $this->total_record($this->CategoryModel->table("category")->count_data());

        $this->view("admin/index" , [
            "pages"=>"category",
            "js"=>"category",
            "value"=>$this->CategoryModel->list()
        ]);
    }

    public function get($id)
    { 
        $data = $this->CategoryModel->table("category")->get_firts("ID",$id);
        echo json_encode( $data);

		# code...
    }

    public function insert()
    {
        # code...
        $arr = [];
        if (isset($_POST["TenDanhMuc"]) && isset($_POST["Slug"]) && isset($_POST["ParentID"])) {
            # code...
            $TenDanhMuc=$_POST["TenDanhMuc"];
            $Slug = $_POST["Slug"];
            $ParentID = $_POST["ParentID"];
            $data = $this->CategoryModel->checkIssetCategory("Slug",$Slug);
            if (count($data) > 0) {
                # code...
                $arr["title"]= "Error";
                $arr["trangthai"] = "error";
                $arr["text"] = "Loại sản phẩm đã tồn tại";
                echo json_encode($arr);
                return;
            }
            try{
                $val = [
                    "TenDanhMuc"=>$TenDanhMuc,
                    "Slug"=>$Slug,
                    "ParentID"=>$ParentID
                ];
                if ($this->CategoryModel->insertCategory($val)) {
                    # code...
                    $arr["title"]= "Success";
                    $arr["trangthai"] = "success";
                    $arr["text"] = "";
                    echo json_encode($arr);
                    return;
                }
                else{
                    $arr["title"]= "Error";
                    $arr["trangthai"] = "error";
                    $arr["text"] = "Không chèn được loại sản phẩm trên";
                    echo json_encode($arr);
                    return;
                }
            }catch(Exception $ex){
                $arr["title"]= "Error";
                $arr["trangthai"] = "error";
                $arr["text"] = "Không chèn được loại sản phẩm trên";
                echo json_encode($arr);
                return;
            }
        }
        else{
            $base_url = base_url();
            header("Location:$base_url/error"); 
        }
    }

    public function edit()
    {
        $arr = [];
        if (isset($_POST["ID"]) && isset($_POST["TenDanhMuc"]) && isset($_POST["Slug"]) && isset($_POST["ParentID"])) {
            # code...
            $ID = $_POST["ID"];
            $TenDanhMuc=$_POST["TenDanhMuc"];
            $Slug = $_POST["Slug"];
            $ParentID = $_POST["ParentID"];

            $data = $this->CategoryModel->checkIssetTenCategoryUpdate("select * from category where id != $ID and slug = '$Slug'");

            if (count($data) > 0) {
                # code...
                $arr["title"]= "Error";
                $arr["trangthai"] = "error";
                $arr["text"] = "Tên loại sản phẩm đã tồn tại";
                echo json_encode($arr);
                return;
            }
            try{
                $val = [
                    "TenDanhMuc"=>$TenDanhMuc,
                    "Slug"=>$Slug,
                    "ParentID"=>$ParentID
                ];
                if ($this->CategoryModel->edit_category("ID",$ID,$val)) {
                    # code...
                    $arr["title"]= "Success";
                    $arr["trangthai"] = "success";
                    $arr["text"] = "";
                    echo json_encode($arr);
                    return;
                }
                else{
                    $arr["title"]= "Error";
                    $arr["trangthai"] = "error";
                    $arr["text"] = "Không sửa được loại sản phẩm trên";
                    echo json_encode($arr);
                    return;
                }
            }catch(Exception $ex){
                $arr["title"]= "Error";
                $arr["trangthai"] = "error";
                $arr["text"] = "Không sửa được loại sản phẩm trên";
                echo json_encode($arr);
                return;
            }
        }
        else{
            $base_url = base_url();
            header("Location:$base_url/error"); 
        }
    }



    public function delete()
    {
        # code...
        $arr_status = [];
        if (isset($_POST["danhsach"])) {
            $arr = $this->CategoryModel->getAllCategory();
            # code...
            foreach ($_POST["danhsach"] as $key) {
                # code...
                // $this->CategoryModel->delete("ID",$value);
                $this->nodeChildrenCategory=[];
                $this->arrChildrenCategory($arr , $key);
                if (count($this->nodeChildrenCategory) > 0) {
                    # code...

                    foreach ($this->nodeChildrenCategory as $value) {
                        # code...
                        $this->CategoryModel->delete("ID",$value);
                    }
                }
                $this->CategoryModel->delete("ID",$key);
                
            }
         
            $arr_status["title"]= "Success";
            $arr_status["trangthai"] = "success";
            $arr_status["text"] = "Xóa thành công";
            echo json_encode($arr_status);
            return;
        }else{
            $base_url = base_url();
            header("Location:$base_url/error"); 
        }
    }

    public function arrChildrenCategory($table , $val)
    {
        # code...
        foreach ($table as $key) {
            # code...
            if ($key["ParentID"] == $val) {  
                array_push($this->nodeChildrenCategory , $key["ID"]);
                $this->arrChildrenCategory($table, $key["ID"]);
            }
        }
    }

    public function changeState($id)
        {
            # code...
            $this->nodeChildrenCategory = [];
            $arr = $this->CategoryModel->getAllCategory();

            $this->arrChildrenCategory($arr, $id);
            echo "<pre>";
            var_dump($this->nodeChildrenCategory);
            
            $arrCate = $this->CategoryModel->getFirstCategory($id);
             
            if(sizeof($arrCate) > 0){
                if ($arrCate["TrangThai"] == 1) {
        
                    $this->CategoryModel->edit_category("ID",$id , ["TrangThai" => 0]);

                    if (sizeof($this->nodeChildrenCategory) > 0) {
                        # code...
                        foreach ($this->nodeChildrenCategory as $key) {
                            # code...
                            $this->CategoryModel->edit_category("ID" , $key , ["TrangThai" => 0] );
                        }
                    }
                    # code...
                }else{   
                    $this->CategoryModel->edit_category("ID",$id , ["TrangThai" => 1]);
                    if (sizeof($this->nodeChildrenCategory) > 0) {
                        # code...
                        foreach ($this->nodeChildrenCategory as $key) {
                            # code...
                            $this->CategoryModel->edit_category("ID" , $key , ["TrangThai" => 1] );
                        }
                    }
                }
            }
        }
}
?>