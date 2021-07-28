<?php 

function showCategories($categories , $selected = 0 , $parent_id = 0, $char = '')
{
	foreach ($categories as $key => $item)
	{
        // Nếu là chuyên mục con thì hiển thị
		if ($item['ParentID'] == $parent_id)
		{
			if ($selected== $item["ID"]) {
				echo '<option value="'.$item["ID"].'" selected>'. $char .' ' .$item["TenDanhMuc"] .' </option>';
			}else{
				echo '<option value="'.$item["ID"].'">'. $char .' ' .$item["TenDanhMuc"] .' </option>';	
			}
			 // Xóa chuyên mục đã lặp
			unset($categories[$key]);
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
			showCategories($categories, $selected , $item['ID'], $char.'--| ');
		}
	}
}

function de_quy_insert_category($table , $selected = 0 , $id = 0 , $str = '--')
{
	foreach ($table as $key) {
		if ($key->parent_id == $id) {
			if ($selected == $key->id) {
				echo '<option value="'.$key->id.'" selected >'.$str.'  '.$key->ten_mat_hang.'</option>"';
			} else {
				echo '<option value="'.$key->id.'">'.$str.'  '.$key->ten_mat_hang.'</option>"';
			}
			
			de_quy_insert_category($table,$selected,$key->id,$str.'|--');
		}
	}
}



function ShowDanhMucSanPham($categories, $parent_id = 0, $char = '', $stt = 0)
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['ParentID'] == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
    	$_class= "";
        if ($stt == 0){
            // là cấp 1
        	$_class = "cap-1";
        }
        else if ($stt == 1){
            // là cấp 2
            $_class = "cap-2";
        }
        else if ($stt == 2){
            // là cấp 3
            $_class = "cap-3";
        }
         
        echo "<ul class ='$_class'>";
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo "<li><a href='./danhmuc/get/".$item["Slug"]."' title='".$item['TenDanhMuc']."'>".$item['TenDanhMuc']."</a>";
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            ShowDanhMucSanPham($categories, $item['ID'], $char.'|---', ++$stt);
            echo '</li>';
        }
        echo '</ul>';
    }
}

// function showtableCategories($categories, $parent_id = 0, $char = '')
// {
// 	foreach ($categories as $key => $item)
// 	{
//         // Nếu là chuyên mục con thì hiển thị
// 		if ($item['ParentID'] == $parent_id)
// 		{
// 			echo "<tr>";
// 			echo '<th><input type="checkbox" name="delete[]"'.$item['ID'] .'></th>';
// 			echo '<td>'.$char.' '.$item["TenDanhMuc"].'</td>';
// 			echo '<td>'. $item["Slug"].'</td>';
// 			echo '<td>';
// 			if ($item["TrangThai"] == 0){
// 				echo '<label class="badge badge-danger">Chặn</label>';
// 			}else{
// 				echo '<label class="badge badge-success">Hiển Thị</label>';
// 			}
// 			echo '</td>';
// 			echo '<td><button type="button" class="btn btn-warning btn-sm" onclick="view_edit('.$item["ID"].')">Sửa</button></td>';
// 			echo "</tr>";
//             // Xóa chuyên mục đã lặp
// 			//unset($categories[$key]);
//             // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
// 			showtableCategories($categories, $item['ID'], $char.'|---');
// 		}
// 	}
// }


function Upload_file_image($file)
{
	# code...
	$target_dir = "./public/upload/images/";
	/// check tồn tại file trong forder:
	$file_name = $file["name"];
	while (file_exists($target_dir.$file_name) === true) {
		# code...
		$file_name = substr_replace($file_name, substr($file_name,0,strripos($file_name,"."))."_".rand(0,100), 0 , strripos($file_name,"."));
	}
	//upload
	if (move_uploaded_file($file["tmp_name"], $target_dir.$file_name)) {
		return $file_name;
	} 
	else {
		return "";
	}
}
function Unlink_file_image($val)
{
	# code...
	$file = "./public/upload/images/".$val;
	if (file_exists($file)) {
		# code...
		unlink($file);
	}
}



?>