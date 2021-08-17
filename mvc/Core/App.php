<?php 
	/**
	 * 
	 */
	class App
	{
		protected $url = "" ;
		protected $controller="TrangChuController";
		protected $action="Index";
		protected $params = [];
		function __construct()
		{
			$this->url = base_url();
			$arr = $this->UrlProcess();
			//xử lý controllers

			if (isset($arr[0])) {
				if (strtolower($arr[0]) == "admin") {
					# code...
					unset($arr[0]);
					
					if (isset($arr[1])) {
						$str = $this->Method($arr[1])."Controller";
						if (file_exists("./mvc/Controllers/admin/".$str.".php")) {
							# code...
							$this->controller = $str;
							unset($arr[1]);
						}else{
							header("Location:$this->url/error#404_controller_admin");	
							return;
						} 

						
						require_once  "./mvc/Controllers/admin/".$this->controller.".php";
						$this->controller = new $this->controller();
						// Xử lý action
						if (isset($arr[2])) {
							if (method_exists($this->controller, $this->Method($arr[2]))) {
								$this->action=$this->Method($arr[2]);
								unset($arr[2]);

								if (array_count_values($arr)>0) {
									$this->params = array_values($arr);
									# code...
								}
							}else{
								header("Location:$this->url/error#404_action_admin");	
							}
							
						} else {
							# code...
							$this->action="Index";
						}
						if (method_exists($this->controller, $this->action)){
							call_user_func_array([$this->controller , $this->action],$this->params);
						}else{
							echo "Error";
						}
						
					} else{

						if (file_exists("./mvc/Controllers/admin/LoginController.php")) {
							# code...
							$this->controller = "LoginController";
						}
						require_once  "./mvc/Controllers/admin/".$this->controller.".php";
						$this->controller = new $this->controller();
						call_user_func_array([$this->controller ,"Index"],$this->params);
					}
					
				} else {
					# code...

					$str = $arr[0]."Controller";
					if (file_exists("./mvc/Controllers/".$str.".php")) {
						# code...
						$this->controller = $str;
						unset($arr[0]);
					}else{

						header("Location:$this->url/error#404_controller_$arr[0]_$str");
					} 
					require_once  "./mvc/Controllers/".$this->controller.".php";
					$this->controller = new $this->controller();


					// Xử lý action
					if (isset($arr[1])) {
						if (method_exists($this->controller, $this->Method($arr[1]))) {
							$this->action=$this->Method($arr[1]);
							unset($arr[1]);

							if (array_count_values($arr)>0) {
								$this->params = array_values($arr);
								# code...
							}
						}else{
							header("Location:$this->url/error#404_action");	
						}
					} else {
						# code...
						$this->action="Index";
					}
					if (method_exists($this->controller, $this->action)){
						call_user_func_array([$this->controller , $this->action],$this->params);
					}else{
						echo "Error";
					}

				}
				
			}
			else{
				if (file_exists("./mvc/Controllers/".$this->controller.".php")) {
							# code...
					require_once  "./mvc/Controllers/".$this->controller.".php";
					$this->controller = new $this->controller();
					call_user_func_array([$this->controller ,"Index"],$this->params);
				}	
			}

		}
		function UrlProcess()
		{
			# code...
			if (isset($_GET["url"])) {
				# code...
				return explode("/",filter_var(trim($_GET["url"],"/")));
			}
		}

		function Method($string)
		
		{
			// if (strlen($string)>0) {
			// 	$string = ucfirst(strtolower($string));
			// }
			return $string;
		}
	}
	?>