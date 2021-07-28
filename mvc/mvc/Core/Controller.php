<?php 
	/**
	 * 
	 */
	class Controller
	{
		
		function model($model)
		{
			# code...
			require './mvc/Model/'.$model.'.php';
			return new $model;
		}
		function  view( $view , $data=[])
		{
			# code...
			require_once './mvc/View/'.$view.'.php';
			
		}
	}
 ?>