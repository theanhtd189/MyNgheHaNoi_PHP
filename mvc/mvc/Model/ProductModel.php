
<?php 
	/**
	 * 
	 */
	class ProductModel extends Database
	{
		
		function phan_trang($start , $limit)
		{

			$data_product = $this->table("product")->offset($start)->limit($limit)->get();
			
			if (count($data_product) > 0) {
				for ($i = 0 ; $i < count($data_product) ; $i++) { 
				# code...
					$data_product[$i]["detale_product"] = $this->truyvan("SELECT * FROM detailedproducts WHERE MaSP ='".$data_product[$i]['MaSP']."'");
					$category = $this->truyvan("SELECT TenDanhMuc FROM category WHERE ID = '".$data_product[$i]["CategoryID"]."'");
					$data_product[$i]["TenCategory"] = (isset($category[0]["TenDanhMuc"])) ? $category[0]["TenDanhMuc"]: "";
				}
			}
			return $data_product;
		}
		public function check_isset_ma_sp($value)
		{
			# code...
			return $this->table("product")->get_firts("MaSP" , $value);
		}
		public function add($data=[])
		{
			# code...
			return $this->table("product")->insert($data);
		}

		public function checkisset_ten_sp($key, $val)
		{
			# code...
			$arr = $this->table("product")->get_firts($key,$val);
			if($arr!=null){
				return true;
			}else{
				return false;
			}
		}
		public function returnProduct($key , $val)
		{
			# code...
			$arr = $this->table("product")->get_firts($key,$val);
			return $arr;
		}

		public function update_product($key , $val , $data)
		{
			# code...
			return $this->table("product")->update($key , $val , $data);
		}

		public function delete_prod($value)
		{
			# code...

			$arrDetailProduct = $this->table("detailedproducts")->truyvan("SELECT ID FROM detailedproducts WHERE MaSP='".$value."'");
			if (sizeof($arrDetailProduct) > 0) {
							# code...
				foreach ($arrDetailProduct as $keydetail) {
								# code...
					$this->table("detailedproducts")->del_category("ID",$keydetail["ID"]);
				}
			}
			$this->table("comment")->del_category("ID_SP",$value);
			$this->table("product")->del_category("MaSP",$value);
			return true;
		}

		public function returnProductNoiBat( $offset , $limit)
		{
			# code...
			$data_product = $this->truyvan("
				SELECT DISTINCT product.MaSP , product.TenSp , category.TenDanhMuc , product.DonViTinh , product.Slug , product.XuatXu , product.ListAnh , product.AnhChinh , product.MoTa , product.ChiTiet FROM product 
				INNER JOIN detailedproducts on product.MaSP = detailedproducts.MaSP 
				INNER JOIN category on product.CategoryID = category.ID
				WHERE product.TrangThai=1 AND product.NoiBat = 1 AND category.TrangThai = 1 AND detailedproducts.TrangThai = 1
				GROUP BY detailedproducts.ID , detailedproducts.SoLuong 
				HAVING COUNT(detailedproducts.ID) > 0 AND detailedproducts.SoLuong > 0
				ORDER BY product.NgayTao DESC LIMIT  $offset , $limit
				");
			return $data_product;
		}


		/// client 
		public function returnInformationPorduct($val)
		{
			# code...
			$arr= $this->truyvan("SELECT product.AnhChinh , product.TenSp ,product.DonViTinh , detailedproducts.ID, detailedproducts.LoaiSize , detailedproducts.GiaBan , detailedproducts.GiamGia , detailedproducts.SoLuong FROM detailedproducts INNER JOIN product on detailedproducts.MaSP = product.MaSP WHERE product.MaSP='$val' AND product.TrangThai=1  AND detailedproducts.TrangThai = 1 GROUP BY detailedproducts.ID , detailedproducts.SoLuong HAVING detailedproducts.SoLuong>0");
			return $arr;
		}

		public function returnProductNew()
		{
			# code...

			// lấy 10 bản ghi sản phẩm mới nhất 
			$data_product = $this->truyvan("
				SELECT DISTINCT product.MaSP , product.TenSp , category.TenDanhMuc , product.DonViTinh , product.Slug , product.XuatXu , product.ListAnh , product.AnhChinh , product.MoTa , product.ChiTiet , product.NgayTao FROM product
				INNER JOIN category on product.CategoryID = category.ID 
				INNER JOIN detailedproducts ON product.MaSP = detailedproducts.MaSP 
				WHERE category.TrangThai = 1 AND product.TrangThai = 1 
				GROUP BY detailedproducts.ID , detailedproducts.SoLuong , detailedproducts.TrangThai 
				HAVING COUNT(detailedproducts.ID) > 0 AND SUM(detailedproducts.SoLuong) > 0 AND detailedproducts.TrangThai = 1
				ORDER BY product.NgayTao DESC LIMIT  0 , 10");
			return $data_product;
		}

		public function returnProductBanChay( $offset , $limit )
		{
			# code...
			return $this->truyvan("SELECT DISTINCT product.MaSP , product.TenSp , category.TenDanhMuc , product.DonViTinh , product.Slug , product.XuatXu , product.ListAnh , product.AnhChinh , product.MoTa , product.ChiTiet , product.NgayTao FROM product
				INNER JOIN category on product.CategoryID = category.ID 
				INNER JOIN detailedproducts ON product.MaSP = detailedproducts.MaSP  
				WHERE product.MaSP in ( SELECT detailedproducts.MaSP  FROM detailedproducts 
				INNER JOIN detailsbill on detailedproducts.ID = detailsbill.MaSPCT 
				GROUP BY detailedproducts.MaSP ORDER BY SUM(detailsbill.SoLuongMua) 
				DESC ) LIMIT $limit OFFSET $offset ");
		}

		public function returnProductCategory($slug , $limit , $offset)
		{
		# code...
			return $this->truyvan("SELECT product.MaSP, product.CategoryID , product.TenSp, product.Slug, product.DonViTinh, product.XuatXu, product.MoTa, product.ChiTiet, product.AnhChinh, product.ListAnh , product.NgayTao FROM product INNER JOIN category on product.CategoryID = category.ID WHERE category.TrangThai = 1 and product.TrangThai = 1 AND category.Slug = '$slug' ORDER BY product.NgayTao DESC LIMIT $limit OFFSET $offset");

		}
		public function returnCountProductCategory($slug)
		{
		# code...
			$arr =  $this->truyvan("SELECT product.MaSP, product.CategoryID , product.TenSp, product.Slug, product.DonViTinh, product.XuatXu, product.MoTa, product.ChiTiet, product.AnhChinh, product.ListAnh , product.NgayTao FROM product INNER JOIN category on product.CategoryID = category.ID WHERE category.TrangThai = 1 and product.TrangThai = 1 AND category.Slug = '$slug'");
			return sizeof($arr); 
		}

		public function returnProductSearch($str)
		{
			# code...
			$sql = "SELECT product.MaSP, product.CategoryID , product.TenSp, product.Slug, product.DonViTinh, product.XuatXu, product.MoTa, product.ChiTiet, product.AnhChinh, product.ListAnh , product.NgayTao FROM product WHERE product.TrangThai = 1 AND product.TenSp LIKE N'%$str%'";
			
			return $this->truyvan($sql);
		}

		public function returnProductSearchPrice($str)
		{
			# code...
			$sql = "SELECT product.MaSP, product.CategoryID , product.TenSp, product.Slug, product.DonViTinh, product.XuatXu, product.MoTa, product.ChiTiet, product.AnhChinh, product.ListAnh , product.NgayTao FROM detailedproducts LEFT JOIN product on product.MaSP=detailedproducts.MaSP  WHERE product.TrangThai = 1 $str ;";
			
			return $this->truyvan($sql);
		}
	}
	?>