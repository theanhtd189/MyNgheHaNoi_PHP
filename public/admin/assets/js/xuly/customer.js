$(document).ready(function() {
	$("#check-all").click(function() {
		console.log(1);
		$(":checkbox").prop("checked", true);
	});
	$("#clear-all").click(function() {
		$(":checkbox").prop("checked", false);
	});

	$("#btn-delete").click(function() {
        /*if ($(":checked").length === 0 ) {
            sweetAlter("warning" , "Delete" , "Vui lòng chọn loại sản phẩm cần xóa");
            return;
        }*/
        var arr = [];
        var checkbox = document.getElementsByName('delete');
        for (var i = 0; i < checkbox.length; i++){
        	if (checkbox[i].checked === true){
        		arr.push(checkbox[i].value);
        	}
        }
        if (arr.length == 0) {
        	sweetAlter("warning" , "Delete" , "Vui lòng chọn loại sản phẩm cần xóa");
        	return;
        }

        swal({
        	title: "Bạn Có Muốn Xóa Không ??",
        	text: "Dữ liệu kèm theo loại sản phẩm trên sẽ bị xóa",
        	icon: "warning",
        	buttons: true,
        	dangerMode: true,
        }).then((willDelete) => {
        	if (willDelete) {
        		$.ajax({
        			url: './admin/customer/delete_list_customer',
        			type: 'POST',

        			data: {
        				danhsach: arr
        			},
        			success: function (value) {
                        // body...
                        var arr = JSON.parse(value);
                        swal({
                        	title: arr["title"],
                        	icon:  arr["trangthai"],
                        	text: arr["text"]
                        }).then((value) => {
                        	location.href="admin/customer";
                        });
                    }
                })

        	} 
        });
    });

});


jQuery(document).ready(function($) {
	$(".btn-them-customer").click(function(event) {
		/* Act on the event */
		var tenkh = $("#ten-kh").val();
		var sdt = $("#sdt").val();
		var email = $("#email").val();
		var dia_chi = $("#dia-chi").val();
		var mat_khau = $("#mat-khau").val();
		
		if (tenkh == "" || sdt == "" || email == "" || dia_chi == ""  || mat_khau == "") {
			sweetAlter("error" , "Error" , "Dữ liệu không được để trống !!!");
			return;
		}
		if (tenkh.length > 30) {
			sweetAlter("error" , "Error" , "Tên khách hàng phải có độ dài từ 0 -> 30 ký tự !!!");
			return;
		}
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 

		if (dia_chi.length > 50) {
			sweetAlter("error" , "Error" , "Địa chỉ phải có độ dài từ 0 -> 50 ký tự !!!");
			return;
		}
		
		if (mat_khau.length > 50 || mat_khau.length < 6) {
			sweetAlter("error" , "Error" , "Mật khẩu khách hàng phải có độ dài từ 6 -> 50 ký tự !!!");
			return;
		}
		if (check_insert_email_or_sdt("SDT" , sdt) === "true") {
			sweetAlter("error" , "Error" , "Số điện thoại đã tồn tại !!!");
			return;
		}
		if (check_insert_email_or_sdt("Email" , email) === "true") {
			sweetAlter("error" , "Error" , "Email đã tồn tại !!!");
			return;
		}
		//// check dạng reg expession email ,sdt;

		$.ajax({
			url: './admin/customer/add',
			type: 'POST',
			data: {
				Email : email,
				SDT: sdt,
				TenKh: tenkh,
				DiaChi: dia_chi,
				MatKhau: mat_khau
			},
			success: function (value) {
                    // body...
                    var arr = JSON.parse(value);
                   	swal({
                        	title: arr["title"],
                        	icon:  arr["trangthai"],
                        	text: arr["text"]
                        }).then((value) => {
                        	location.href="admin/customer";
                        });
                }
            })

	});


	$(".btn-del-customer").click(function(event) {
		/* Act on the event */
		var id = $(this).parent().parent().find("#customer_id").children('input').val();
		swal({
			title: "Bạn Có Muốn Xóa Không ??",
			text: "Dữ liệu kèm theo sẽ bị null !!!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
				$.ajax({
					url: './admin/customer/delete/'+id,
					type: 'GET',
					success: function (value) {
                            // body...
                            var arr = JSON.parse(value);

                            swal({
                            	title: arr["title"],
                            	icon:  arr["trangthai"],
                            	text: arr["text"]
                            }).then((value) => {
                            	location.href="admin/customer";
                            });
                        }
                    })

			} 
		});
	});
});

function ChangeStatus(id) {
  // body...
  $.ajax({
    url: './admin/customer/ChangeStatus/'+id,
    type: 'GET',
    success: function (value) {
      // body...
      location.href="./admin/customer";
    }
  });
}

function check_insert_email_or_sdt(key , val) {
	// body...
	var str = "";
	$.ajax({
		url: './admin/customer/check_isset_email_or_sdt/'+key+'/'+val,
		type: 'GET',
		async: false,
		success: function (value) {
			// body...
			str =  JSON.parse(value) ;
		}
	});
	return(str);
}