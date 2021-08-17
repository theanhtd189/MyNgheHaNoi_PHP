<?php

	// require_once './mvc/Bridge.php';
	// define('PATH_ROOT', __DIR__);
	// $myApp = new App();
	<?php if(isset($_GET['url']))
  {
    echo $_GET['url'].'<br>'; 
    
  }
  else
  echo "chả có gì".'<br>';
  
  echo __DIR__;
    ?>
?>