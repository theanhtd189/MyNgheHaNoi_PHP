<?php 
	/**
	 * 
	 */
	class TrangchuController extends Controller
	{
		function __construct()
		{
			if (!isset($_SESSION["admin"])){
	            $base_url = base_url();
	            header("Location:$base_url/admin");				
	        }
			
		}
		public function Index($value='')
		{
			# code...
	    	$this->view("admin/index" , [
	    		"pages"=>"trangchu"
	    	]);
	    
		}
		
	}
 ?>