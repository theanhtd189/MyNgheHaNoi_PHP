<?php 
	/**
	 * 
	 */
	class CategoryModel extends Database
	{
		protected $db;
		protected $count_data = 0;

		public function setcount()
		{
			# code...
			$this->count_data = $this->table("category")->count_data();
		}

		public function phantrang($start , $end)
		{
			# code...
			return $this->addTenParentID($this->table("category")->offset($start)->limit($end)->get());
		}

		public function addTenParentID($arr)
		{
			# code...
			for ($i=0; $i < count($arr); $i++){
				# code...
				if($arr[$i]["ParentID"] == 0 ){
					$arr[$i]["TenParentID"] = "";
				}
				else{
					$array_name = $this->table("category")->get_firts("ID",$arr[$i]["ParentID"]);
					$arr[$i]["TenParentID"] = $array_name["TenDanhMuc"];
					
					
				}
				
			}
			
			return $arr;
		}
		public function list()
		{
			# code...

			$danhsach = $this->truyvan("select * from category");
			return $danhsach;
		}

		public function insertCategory($value=[])
		{
			# code...
			return $this->table("category")->insert($value);
		}

		public function checkIssetCategory($key , $value)
		{
			# code...
			$danhsach = $this->truyvan("select * from category WHERE $key = '$value'");
			return $danhsach;
		}

		public function checkIssetTenCategoryUpdate($sql)
		{
			# code...
			$danhsach = $this->truyvan($sql);
			return $danhsach;
		}

		public function edit_category($column , $value , $data = [])
		{
			# code...
			
			return $this->table("category")->update($column , $value , $data);
		}

		public function delete($key_table,$val)
		{
			# code...

			$arrProduct = $this->truyvan("SELECT MaSP FROM product WHERE CategoryID=$val");
			if (sizeof($arrProduct) > 0) {
					# code...

				foreach ($arrProduct as $keyProd) {
						# code...
					$arrDetailProduct = $this->table("detailedproducts")->truyvan("SELECT ID FROM detailedproducts WHERE MaSP='".$keyProd["MaSP"]."'");
					if (sizeof($arrDetailProduct) > 0) {
							# code...
						foreach ($arrDetailProduct as $keydetail) {
								# code...
							$this->table("detailedproducts")->del_category("ID",$keydetail["ID"]);
						}
					}

					$this->table("product")->del_category("MaSP",$keyProd["MaSP"]);
				}
			}
			$this->table("category")->del_category("ID",$val);
			
			
		}

		public function getFirstCategory($id)
		{
			# code...
			return $this->table("category")->get_firts("ID" , $id);
		}

		public function getAllCategory()
		{
			# code...
			$danhsach = $this->truyvan("select * from category ORDER BY NgayTao DESC");
			return $danhsach;
		}


		public function GetListClientCategory()
		{
			# code...
			return $this->truyvan("select * from category WHERE TrangThai = 1 ORDER BY NgayTao DESC");
		}
		public function getFirstCategorySlug($slug)
		{
			# code...
			return $this->table("category")->get_firts("Slug" , $slug);
		}

	}
?>