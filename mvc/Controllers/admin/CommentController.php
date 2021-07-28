<?php /**
 * 
 */
	class CommentController extends Controller
	{
		
		private $CommentModel ;
		
	    public $start;//vị trí bắt đầu

	    public $total;//tổng số sản trang

	    public $limit=10;//ở đây mình lấy 10 sản phẩm trên 1 trang

	    public $page;  //lấy page bên file phantrang.php đưa vào

	    function __construct()
	    {
	        $this->CommentModel = $this->model("CommentModel");
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

	        $data  = $this->CommentModel->phan_trang($this->start , $this->limit);

	        return $data;

	    }
	    public function totalRow(){

	        $data = $this->CommentModel->return_count_comment();
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
	            "pages"=>"product/comment",
	            "css"=>"style_product",
	            "so_trang"=> $this->total,
	            "arr_comment" => $arr,
	            "js"=>"comment"
	        ]);
	    }

	} 
?>