<?php


class PostsModel extends Database
{
    public function return_count_posts(){
        return $this->table("posts")->count_data();
    }
    public function phan_trang($start , $limit){
        $data = $this->table("posts")->offset($start)->limit($limit)->get();
        return $data;
    }
    public function insert_post($data=[])
    {
    	# code...
    	return $this->table("posts")->insert($data);
    }
    public function check_isset_ten_bai_viet($value)
    {
    	# code...
    	$data = $this->table("posts")->truyvan("SELECT * FROM posts WHERE slug = '$value'");
    	if (count($data) > 0) {
    		# code...
    		return true;
    	} else {
    		# code...
    		return false;
    	}
    	
    }
    public function check_isset_ten_bai_viet_update($id ,$value)
    {
        # code...
        $data = $this->table("posts")->truyvan("SELECT * FROM posts WHERE id != $id and slug = '$value'");
        if (count($data) > 0) {
            # code...
            return true;
        } else {
            # code...
            return false;
        }
    }
    public function return_posts($val){
        return $this->table("posts")->get_firts("ID",$val);
    }
    public function update_posts($value , $data)
    {
        # code...
        return $this->table("posts")->update("ID",$value ,$data);
    }
    public function delete_posts($id)
    {
        # code...
        return $this->table("posts")->del_category("ID",$id);
    }

    public function returnPostsNew()
    {
        # code...
        return $this->truyvan("SELECT * FROM `posts` WHERE posts.NoiBat = 1 AND posts.TrangThai = 1 ORDER BY posts.NgayTao DESC LIMIT 4 OFFSET 0");
    }
    public function returnPostClient($offset , $limit)
    {
        return $this->truyvan("SELECT * FROM `posts` WHERE  posts.TrangThai = 1 ORDER BY posts.NgayTao DESC LIMIT $limit OFFSET $offset");
    }
    public function returnCountPostClient()
    {
        return sizeof($this->truyvan("SELECT * FROM `posts` WHERE  posts.TrangThai = 1"));
    }

    public function getPostsSLug($slug)
    {
        # code...
        return $this->table("posts")->get_firts("Slug",$slug);
    }
}