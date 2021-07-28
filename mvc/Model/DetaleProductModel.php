<?php
	/**
	 * 
	 */
	class DetaleProductModel extends Database
	{
		
		public function add($data=[])
		{
			# code...
			return $this->table("detailedproducts")->insert($data);
		}
		public function return_detale_product($id){
		    return $this->table("detaledproducts")->truyvan("SELECT * FROM `detailedproducts` WHERE MaSP = '$id'");
        }

        public function return_thong_tin_sp($masp,$id)
        {
            return $this->table("detaledproducts")->truyvan("SELECT * FROM detailedproducts INNER JOIN product on detailedproducts.MaSP = product.MaSP WHERE detailedproducts.ID=$id AND detailedproducts.MaSP = '$masp'");
        }

        public function check_isset_detailsproduct($val)
        {
            # code...
            $arr = $this->table("detailedproducts")->truyvan("SELECT * FROM `detailedproducts` WHERE ID = '$val'");
            if (count($arr) >0) {
                # code...
                return true;
            } else {
                # code...
                return false;
            }
            
        }

        public function check_update_isset_loai_size($id , $val , $masp)
        {
        	# code...
        	$arr = $this->table("detaledproducts")->truyvan("SELECT * FROM `detailedproducts` WHERE ID!=$id and  MaSP = '$masp' and LoaiSize = '$val'");
        	if (count($arr) > 0) {
        		# code...
        		return true;
        	}else
        	{
        		return false;
        	}
        }
         public function check_add_isset_loai_size($val , $masp)
        {
        	# code...
        	$arr = $this->table("detaledproducts")->truyvan("SELECT * FROM `detailedproducts` WHERE LoaiSize = '$val' and MaSP = '$masp'" );
        	if (count($arr) > 0) {
        		# code...
        		return true;
        	}else
        	{
        		return false;
        	}
        }
        public function update_product_detale ($column, $value, $data = [])
        {
            return $this->table("detailedproducts")->update($column, $value, $data); // TODO: Change the autogenerated stub
        }

        public  function del_product_detale($id){
		    return $this->table("detailedproducts")->del_category("ID",$id);
        }

        // public function GetDetailsProduct($id){
        //     return $this->table("detailedproducts")->get_firts("ID",$id);
        // }

        public function GetDetailsProduct($id)
        {
            # code...
            return $this->truy_van_first_content("SELECT detailedproducts.ID, detailedproducts.SoLuong , detailedproducts.GiaBan , detailedproducts.GiamGia , detailedproducts.LoaiSize, detailedproducts.MaSP , product.TenSp , product.DonViTinh , product.AnhChinh  FROM detailedproducts INNER JOIN product ON detailedproducts.MaSP = product.MaSP where ID = '$id'");
        }

        public function return_detale_product_client($id){
            return $this->truyvan("SELECT * FROM detailedproducts WHERE detailedproducts.MaSP = '$id' AND detailedproducts.TrangThai = 1 GROUP BY detailedproducts.SoLuong 
                HAVING detailedproducts.SoLuong > 0");
        }

    }
 ?>