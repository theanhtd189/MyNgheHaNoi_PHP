<?php 
	/**
	 * 
	 */
	class SlideModel extends Database
	{
		
		public function phan_trang($start , $limit){
	        $data = $this->table("slide")->offset($start)->limit($limit)->get();
	        return $data;
	    }
			public function return_count_banner(){
	        return $this->table("slide")->count_data();
	    }
		public function returnAllSlide()
		{
			# code...

			$data = $this->truyvan("SELECT * FROM `slide` WHERE TrangThai=1 ORDER BY STT ASC");
			return $data;
		}
	    public function check_isset_tieu_de_slide($value)
	    {
	    	# code...
	    	$data = $this->truyvan("SELECT * FROM slide WHERE TieuDe = '$value'");
	    	if (count($data) > 0) {
	    		# code...
	    		return true;
	    	} else {
	    		# code...
	    		return false;
	    	}
	    }
	    public function check_isset_tieu_de_slide_update( $id , $value='')
	    {
	    	# code...
	    	$data = $this->truyvan("SELECT * FROM slide WHERE ID != $id and TieuDe = '$value'");
	    	if (count($data) > 0) {
	    		# code...
	    		return true;
	    	} else {
	    		# code...
	    		return false;
	    	}
	    }
	    public function add($data=[])
	    {
	    	# code...
	    	return $this->table("slide")->insert($data);
	    }

	    public function return_slide($id){
	    	return $this->table("slide")->get_firts("ID",$id);
	    }
	    public function update_slide($id , $data=[]){
	    	return $this->table("slide")->update("ID" , $id , $data);
	    }
	    public function delete_slide($value)
	    {
	    	# code...
	    	return $this->table("slide")->del_category("ID" , $value);
	    }
	}
 ?>