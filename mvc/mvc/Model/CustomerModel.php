<?php 
/**
 * 
 */
class CustomerModel extends Database
{
	
	public function phan_trang($start , $limit)
	{
		# code...
		return $this->table("customer")->offset($start)->limit($limit)->get();
	}
	public function return_count_customer()
	{
		# code...
		return $this->table("customer")->count_data();
	}
	public function check_isset_email_or_sdt($key ,$value='')
	{
		# code...
		$data = $this->table("customer")->truyvan("SELECT * FROM customer WHERE $key = '$value'");
    	if (count($data) > 0) {
    		# code...
    		return true;
    	} else {
    		# code...
    		return false;
    	}
	}
	public function ViewDetail($id) {
		$data = $this->table("customer")->truyvan("SELECT * FROM customer WHERE ID = $id");
		return $data;
	}
	
	public function update_customer($value , $data)
    {
        # code...
        return $this->table("customer")->update("ID",$value ,$data);
    }
	public function get_customer($key , $val)
	{
		# code...
		return $this->table("customer")->get_firts($key,$val);
	}
	public function insert_customer($data)
	{
		# code...
		return $this->table("customer")->insert($data);
	}

	public function delete_customer($value)
	{
		# code...
		$arrBill = $this->truyvan("SELECT ID FROM bill WHERE bill.MaKH = '$value'");
		$arr= [];

		$arrComment = $this->truyvan("SELECT ID FROM comment WHERE comment.IdKhachHang = '$value'");

		if (sizeof($arrComment) > 0) {
			# code...
			foreach ($arrComment as $keycomment) {
				# code
				$this->table("comment")->del_category("ID",$keycomment["ID"]);
			}
		}

		if (sizeof($arrBill) > 0) {
			# code...
			foreach ($arrBill as $key) {
				# code
				$arr = $this->truyvan("Select ID from detailsbill where IDBill = ".$key["ID"]);
				if(sizeof($arr) > 0){
					foreach ($arr as $keydetailbill ) {
						# code...
						$this->table("detailsbill")->del_category("ID",$keydetailbill["ID"]);
					}
					
				}
				$this->table("bill")->del_category("ID",$key["ID"]);
			}
		}

		return $this->table("customer")->del_category("ID",$value);

	}
}
 ?>