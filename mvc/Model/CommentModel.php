<?php 
	/**
	 * 
	 */
	class CommentModel extends Database
	{
		
		public function phan_trang($start , $limit)
		{
			# code...
            $arr= $this->table("comment")->offset($start)->limit($limit)->get();
            if (count($arr)>0){
                for($i = 0 ; $i < count($arr) ; $i++){
                    $arr[$i]["customer"] = $this->return_Customer($arr[$i]["IdKhachHang"]);
                    $arr[$i]["product"] = $this->return_san_pham($arr[$i]["ID_SP"]);
                }

            }

            return $arr;
		}

        public function  return_Customer($val){
            $arr = $this->table("customer")->get_firts("ID" , $val);
            return $arr;
        }

		public  function  return_san_pham($val){
            $arr = $this->table("product")->get_firts("MaSP" , $val);
            return $arr;
        }
        public function return_count_comment() {
		# code...
			return $this->table("comment")->count_data();
		}
        public  function returnCommentProduct($slug , $offset , $limit)
        {
            # code...
            return $this->truyvan("SELECT comment.ID , comment.NoiDung , comment.TrangThai , 
                comment.ID_SP , product.TenSp , comment.IdKhachHang ,  customer.TenKh FROM comment 
                LEFT JOIN product on product.MaSP = comment.ID_SP 
                LEFT JOIN customer on customer.ID = comment.IdKhachHang 
                WHERE product.Slug = '$slug' AND comment.TrangThai = 1 
                ORDER BY comment.NgayTao DESC LIMIT $limit OFFSET $offset");
        }
        public function returnCountCommentProduct($slug)
        {
            # code..
            return sizeof($this->truyvan("SELECT comment.ID , comment.NoiDung , comment.TrangThai , 
                comment.ID_SP , product.TenSp , comment.IdKhachHang ,  customer.TenKh FROM comment 
                LEFT JOIN product on product.MaSP = comment.ID_SP 
                LEFT JOIN customer on customer.ID = comment.IdKhachHang 
                WHERE product.Slug = '$slug' AND comment.TrangThai = 1 "));
        }
        public function InsertComment($arr)
        {
            # code...
            return $this->table("comment")->insert($arr);
        }
	}

 ?>