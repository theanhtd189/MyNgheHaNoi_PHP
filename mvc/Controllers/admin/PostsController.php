<?php


class PostsController extends Controller
{
    private $PostsModel ;
    public $start;//vị trí bắt đầu

    public $total;//tổng số sản trang

    public $limit=10;//ở đây mình lấy 10 sản phẩm trên 1 trang

    public $page;  //lấy page bên file phantrang.php đưa vào

    function __construct()
    {
        $this->PostsModel = $this->model("PostsModel");
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

        $data  = $this->PostsModel->phan_trang($this->start , $this->limit);

        return $data;

    }
    public function totalRow(){

        $data = $this->PostsModel->return_count_posts();
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
            "pages"=>"posts/index",
            "css"=>"style_product",
            "so_trang"=> $this->total,
            "arr_posts" => $arr,
            "js"=>"posts_index"
        ]);
    }

    public function  new(){
        $this->view("admin/index" , [
            "pages"=>"posts/insert",
            "css"=>"style_product",
            "js"=>"posts_insert"
        ]);
    }

    public function insert(){
        if (isset($_POST["btn-add-posts"])){
            $str_img = "";
            if (isset($_FILES["file-upload-image"]["name"][0])) {
                # code...
                $str_img =  Upload_file_image($_FILES["file-upload-image"]);
            }
            $arr = [];
            $arr["TieuDe"] = $_POST["tieu-de"];
            $arr["slug"] = $_POST["slug"];
            $arr["MoTa"] = $_POST["mota"];
            $arr["image"] = $str_img;
            $arr["NoiDung"] = $_POST["noi-dung"];
            $arr["NoiBat"] = $_POST["posts-noi-bat"];
            if ($this->PostsModel->insert_post($arr)) {
                # code...
                header("location:./&success=true");
            }else{
                Unlink_file_image($str_img);
                header("Location:/new&err=true");
            }
        }
        else{
            $base_url = base_url();
            header("Location:$base_url/error");
        }
    }

    public function check_isset_ten_bai_viet($val)
    {
        # code...
        if ($this->PostsModel->check_isset_ten_bai_viet($val)) {
            # code...
            echo json_encode("true");
        }else{
            echo json_encode("false");
        }
    }

    public function edit($value='')
    {
        # code...
        $data = $this->PostsModel->return_posts($value);
        $this->view("admin/index" , [
            "pages"=>"posts/edit",
            "css"=>"style_product",
            "js"=>"posts_edit",
            "posts"=>$data
        ]);
    }

    public function check_isset_ten_bai_viet_update($id , $value)
    {
        # code...
        $check = $this->PostsModel->check_isset_ten_bai_viet_update($id , $value);
        if ($check){
            # code...
            echo json_encode("true");
        }else{
            echo json_encode("false");
        }
        
    }

    public function update($value)
    {
        # code...
        if (isset($_POST["update_posts"])) {
            $str = "";

            $old_post = $this->PostsModel->return_posts($value);
          
            $old_img = $old_post["image"];
          

            if (isset($_FILES["file-upload-image"]["name"][0])) {
                # code...
                $str = Upload_file_image($_FILES["file-upload-image"]);
            }
            
            

            # code...
            $arr = [];
             $arr["TieuDe"] = $_POST["tieu-de"];
            $arr["slug"] = $_POST["slug"];
            if ($str != "") {
                # code...
                $arr["image"] = $str;
            } 
            $arr["NoiDung"] = $_POST["noi-dung"];
            if ($this->PostsModel->update_posts($value,$arr)) {
                # code...
                if ($str!="") {
                    # code...
                    Unlink_file_image($old_img);
                }
                header("Location:../&success=true");
                
            
            } else {
                if ($str!="") {
                    # code...
                    Unlink_file_image($str);
                }
                # code...
                header("Location:../&err=true");
            }
            

        } else {
            $base_url = base_url();
            header("Location:$base_url/error");
        }
        
    }

    public function delete_posts($id)
    {
        # code...
        if ($this->PostsModel->delete_posts($id)) {
            echo json_encode("true");
        }else{
            echo json_encode("false");
        }
        
    }

    public function ChangeNoiBat($id)
    {
        # code...
        $post = $this->PostsModel->return_posts($id);
        if (sizeof($post) > 0) {
            # code...
            if ($post["NoiBat"] == 0) {
                # code...
                $this->PostsModel->update_posts($id,["NoiBat"=>1]);
            }
            else
            {
                $this->PostsModel->update_posts($id,["NoiBat"=>0]);
            }
        }
        else{
            echo "error";
        }
    }
    public function ChangeStatus($id)
    {
        $post = $this->PostsModel->return_posts($id);
        if (sizeof($post) > 0) {
            # code...
            if ($post["TrangThai"] == 0) {
                # code...
                $this->PostsModel->update_posts($id,["TrangThai"=>1]);
            }
            else
            {
                $this->PostsModel->update_posts($id,["TrangThai"=>0]);
            }
        }
        else{
            echo "error";
        }
    }

    public function delArrPosts()
    {
        # code...
        if (isset($_POST["danhsach"])) {
            # code...
            if (sizeof($_POST["danhsach"]) > 0) {
                # code...
                foreach ($_POST["danhsach"] as $key) {
                    # code...
                    $this->PostsModel->delete_posts($key);
                }
                $arr=[];
                $arr["title"]= "Success";
                $arr["trangthai"] = "success";
                $arr["text"] = "Xóa thành công";
                echo json_encode($arr);
            }

        }else{
            $base_url = base_url();
            header("Location:$base_url/error");
        }
    }

}
?>