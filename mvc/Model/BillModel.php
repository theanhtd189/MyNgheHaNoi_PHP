<?php 
	
	/**
	 * 
	 */
	class BillModel extends Database
	{
		public function phan_trang($start , $limit)
		{
			# code...
            $arr= $this->table("bill")->offset($start)->limit($limit)->get();
            if (sizeof($arr)>0){
                for($i = 0 ; $i < sizeof($arr) ; $i++){
                    $arr[$i]["customer"] = $this->return_Customer($arr[$i]["MaKH"]);
                    $arr[$i]["detailsbill"] = $this->return_detailsBill($arr[$i]["ID"]);
                }
            }
          
            return $arr;
		}

        public function  return_Customer($val){
            $arr = $this->truyvan("SELECT  * FROM customer WHERE ID = $val");
            if (count($arr)>0){
                $arr = $arr[0];
            }
            return $arr;
        }

		public  function  return_detailsBill($val){
            $arr = $this->truyvan("Select * from detailsbill where detailsbill.IDBill = $val");

            if (count($arr)>0){
                for ($i = 0 ; $i < count($arr) ; $i++) {
                    $arr[$i]["detailproduct"] = $this->return_detailsproduct($arr[$i]["MaSPCT"]);
                }
            }
            return $arr;
        }
        public  function  return_detailsproduct($val){
		    $sql = "SELECT product.MaSP , product.TenSp , product.Slug , product.DonViTinh , product.XuatXu , product.AnhChinh ,
                    detailedproducts.LoaiSize , detailedproducts.SoLuong , detailedproducts.GiaBan , detailedproducts.GiamGia
                    FROM detailedproducts inner join product on detailedproducts.MaSP = product.MaSP WHERE detailedproducts.ID=$val";
		    $arr = $this->truyvan($sql);
		    return (count($arr)>0)?$arr[0]:"";
        }


		public function return_count_bill() {
		# code...
		return $this->table("customer")->count_data();
	}

	public function get_bill($val)
	{
		# code...
		return $this->return_detailsBill($val);
	}

	public function update_bill($key , $val ,$data=[])
	{
		# code...
		return $this->table("bill")->update($key,$val,$data);
	}

	public function get_frist_bill($val){
		//return $this->table("bill")->truyvan("Select * from bill where ID = $val");
		return $this->table("bill")->get_firts("ID",$val);
	}

	public function getArrDetailsBill($id)
	{
		# code...
		return $this->truyvan("Select ID from detailsbill where IDBill = '$id'");
	}
	public function deleteBill($id)
	{
		# code...
		$arr = $this->getArrDetailsBill($id);
		if(sizeof($arr) >0){
			foreach ($arr as $key ) {
				# code...
				$this->table("detailsbill")->del_category("ID",$key["ID"]);
			}
		}
		$this->table("bill")->del_category("ID", $id);
	}
	public function insertBill($arr)
	{
		# code...
		return $this->table("bill")->LastInsertId($arr);
	}
	public function insertDetailsBill($arr)
	{
		# code...
		return $this->table("detailsbill")->insert($arr);
	}
}

 ?>