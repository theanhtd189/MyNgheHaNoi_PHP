<?php 

/**
 * 
 */
class AcountModel extends Database
{
	
	public function phan_trang($start , $limit)
		{
			# code...
            $arr= $this->table("users")->offset($start)->limit($limit)->get();
            return $arr;
		}
	public function return_count_acount() {
		# code...
			return $this->table("users")->count_data();
		}
	public function check_isset_column($key,$val)
	{
		# code...
		$data = $this->table("users")->truyvan("SELECT * FROM users WHERE $key = '$val'");
    	if (count($data) > 0) {
    		# code...
    		return true;
    	} else {
    		# code...
    		return false;
    	}
	}
	public function check_isset_column_update($id  , $key ,$value)
    {
        # code...
        $data = $this->table("users")->truyvan("SELECT * FROM users WHERE id != $id and $key = '$value'");
        if (count($data) > 0) {
            # code...
            return true;
        } else {
            # code...
            return false;
        }
    }
	public function insert_acount($data)
	{
		# code...
		return $this->table("users")->insert($data);
	}
	public function update_acount($_id,$arr)
	{
		# code...
		return $this->table("users")->update("ID",$_id,$arr);

	}
	public function delete_acount($id)
    {
        # code...
        return $this->table("users")->del_category("ID",$id);
    }


    public function get_first_acount($key , $value){
    	return $this->table("users")->get_firts($key,$value);
    }
}

 ?>