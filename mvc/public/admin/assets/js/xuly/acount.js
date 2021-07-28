jQuery(document).ready(function($) {
	$(".btn-them-acount").click(function(event) {
		/* Act on the event */
		var hoten = $("#ho-ten-acount").val();
		var sdt = $("#sdt-acount").val();
		var diachi = $("#dia-chi-acount").val();
		var taikhoan = $("#tai-khoan-acount").val();
		var matkhau = $("#mat-khau-acount").val();
		if (hoten == "") {
			sweetAlter( "error", "Error", "Họ tên người dùng không được để trống");
			return;
		}
		if (sdt == "") {
			sweetAlter( "error", "Error", "Số điện thoại người dùng không được để trống");
			return;
		}
		if (diachi == "") {
			sweetAlter( "error", "Error", "Địa chỉ người dùng không được để trống");
			return;
		}
		if (taikhoan == "") {
			sweetAlter( "error", "Error", "Tài khoản không được để trống");
			return;
		}
		if (matkhau.length < 6 ) {
			sweetAlter( "error", "Error", "Mật khẩu phải có ít nhất 6 ký tự");
			return;
		}
		if (check_isset_column("SoDienThoai",sdt) === "true" ) {
			sweetAlter( "error", "Error", "Số điện thoại đã tồn tại");
			return;
		}
		if (check_isset_column("TaiKhoan",taikhoan) === "true" ) {
			sweetAlter( "error", "Error", "Tài khoản  đã tồn tại");
			return;
		}
		
		$.ajax({
			url: './admin/acount/add',
			type: 'POST',
			data: {
				HoTen : hoten,
				SoDienThoai: sdt,
				DiaChi: diachi,
				TaiKhoan: taikhoan,
				MatKhau: matkhau
			},
			success: function (value) {
                    // body...
                    var arr = JSON.parse(value);
                   	swal({
                        	title: arr["title"],
                        	icon:  arr["trangthai"],
                        	text: arr["text"]
                        }).then((value) => {
                        	location.href="admin/acount";
                        });
                }
            })

	});
});
function check_isset_column(key , val) {
	// body...
	var str = "";
	$.ajax({
		url: './admin/acount/check_isset_column/'+key+'/'+val,
		type: 'GET',
		async: false,
		success: function (value) {
			// body...
			str =  JSON.parse(value) ;
		}
	});
	return(str);
}

jQuery(document).ready(function($) {
	$(".check").click(function(event) {
		/* Act on the event */
		var res = $(this).is(":checked");
		var input = $(this).parent().parent().find('.password').children();
		if (res) {
			input.removeAttr('disabled');
		}else{
			input.attr('disabled', "disabled");
		}
	});
	$(".btn-edit-acount").click(function(event) {
		/* Act on the event */
		var str = "";
		var id = $(this).parent(".modal-footer").parent().find('.modal-body').children().find('.id-acount-edit').val();

		var hoten =$(this).parent(".modal-footer").parent().find('.modal-body').children().find('.ho-ten-acount-edit').val();
	
		var sdt = $(this).parent(".modal-footer").parent().find('.modal-body').children().find('.sdt-acount-edit').val();
		
		var diachi = $(this).parent(".modal-footer").parent().find('.modal-body').children().find('.dia-chi-acount-edit').val();
		
		var bool = $(this).parent(".modal-footer").parent().find('.modal-body').children().find('.check').is(":checked");
		
		if (bool) {
			
			str = $(this).parent(".modal-footer").parent().find('.modal-body').children().find('.mat-khau-acount-edit').val();
		
		}

		if (hoten == "") {
			sweetAlter( "error", "Error", "Họ tên người dùng không được để trống");
			return;
		}
		if (sdt == "") {
			sweetAlter( "error", "Error", "Số điện thoại người dùng không được để trống");
			return;
		}
		if (diachi == "") {
			sweetAlter( "error", "Error", "Địa chỉ người dùng không được để trống");
			return;
		}
		// if (taikhoan == "") {
		// 	sweetAlter( "error", "Error", "Tài khoản không được để trống");
		// 	return;
		// }
		// if (matkhau.length < 6 ) {
		// 	sweetAlter( "error", "Error", "Mật khẩu phải có ít nhất 6 ký tự");
		// 	return;
		// }
		if (check_isset_column_update(id,"SoDienThoai",sdt) === "true" ) {
			sweetAlter( "error", "Error", "Số điện thoại đã tồn tại");
			return;
		}

		if (bool) {

			if (str.length < 6 ) {
				sweetAlter( "error", "Error", "Mật khẩu phải có ít nhất 6 ký tự");
				return;
			}

		}

		
		$.ajax({
			url: './admin/acount/update',
			type: 'POST',
			data: {
				ID : id,
				HoTen : hoten,
				SoDienThoai: sdt,
				DiaChi: diachi,
				MatKhau: str
			},
			success: function (value) {
                    // body...
                    var arr = JSON.parse(value);
                   	swal({
                        	title: arr["title"],
                        	icon:  arr["trangthai"],
                        	text: arr["text"]
                        }).then((value) => {
                        	location.href="admin/acount";
                        });
                }
            })

	});


});
function check_isset_column_update( id , key  ,  val) {
	// body...
	var str = "";
	$.ajax({
		url: './admin/acount/check_isset_column_update/'+id+'/'+key+'/'+val,
		type: 'GET',
		async: false,
		success: function (value) {
			// body...
			str =  JSON.parse(value) ;
		}
	});
	return(str);
}


jQuery(document).ready(function($) {
	$(".btn-del-acount").on('click',function(event) {
		event.preventDefault();
		var id = $(this).parent().parent().find('.id').html();

		swal({
            title: "Bạn Có Muốn Xóa Không ??",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete){
               if(delete_acount(id) === "true"){
               		swal({
                            title: "Success",
                            icon:  "success",
                            text:"Xóa thành công !!!"
                        }).then((value) => {
                            location.href="admin/acount";
                        });
               }else {
               		sweetAlter( "error", "Error", "Xóa không thành !!!");
               }

            }

        });
		/* Act on the event */
	});
});
function delete_acount(id) {


	// body...
	var str = "";
	$.ajax({
		url: './admin/acount/delete_acount/'+id,
		type: 'GET',
		async: false,
		success: function (value) {
			// body...
			str =  JSON.parse(value) ;
		}
	});
	return(str);
}

function ChangeStatus(id) {
  // body...
  $.ajax({
    url: './admin/acount/ChangeStatus/'+id,
    type: 'GET',
    success: function (value) {
      // body...
      location.href="./admin/acount";
    }
  });
}