<?php 
	
	/**
	 * 
	 */
	class LogoutController extends Controller
	{
		public function Index(){
			$url = base_url();
			unset($_SESSION["admin"]);
			header("Location:$url/admin");
		}
	}

 ?>