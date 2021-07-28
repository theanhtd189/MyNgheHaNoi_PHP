<?php 

	/**
	 * 
	 */
	class DangXuatController extends Controller
	{
		
		public function Index()
		{
			# code...
			$url = base_url();
			if (isset($_SESSION["customer"])) {
				# code...
				unset($_SESSION["customer"]);
			}
			header("Location:$url/dangnhap");
		}
	}

 ?>