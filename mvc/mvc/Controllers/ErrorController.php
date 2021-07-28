<?php 

	/**
	 * 
	 */
	class ErrorController extends Controller
	{
		
		public function Index()
		{
			# code...
			$this->view("error_500");
		}
	}

 ?>