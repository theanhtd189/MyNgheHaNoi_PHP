
var arr_product = [];

jQuery(document).ready(function($) {
	$(".btn-dat-hang").click(function(event) {
		/* Act on the event */
		var id = $(this).attr('id');
		swal(
			"Duyệt Hóa Đơn : "+id, {
				buttons: {
					catch: {
						text: "Giao Hàng ",
						value: "giao-hang",
						className:"btn-button-giao-hang"
					},
					roll: {
						text: "Đã Mua",
						value: "mua-hang",
						className: "btn-button-mua-hang"
					},

					cancel: true
				},
			})
		.then((value) => {
			switch (value) {

				case "giao-hang":
				GiaoHang(id);
				break;

				case "mua-hang":
				GiaoHangThanhCong(id);
				break;
				
			}
		});
	});

	$(".btn-da-mua").click(function(event) {
		/* Act on the event */
		var id = $(this).attr('id');
		sweetAlter("error", "Error" , "Xin lỗi hàng đã chốt đơn !!!");
	
	});

	$(".btn-giao-hang").click(function(event) {
		/* Act on the event */
		var id = $(this).attr('id');
		swal(
			
			"Giao Hàng Hóa Đơn : "+id, {
				buttons: {	
					roll: {
						text: "Giao thành công",
						value: "mua-hang",
						className: "btn-button-mua-hang"
					},
					catch: {
						text: "Hủy đơn",
						value: "huy-don",
						className:"btn-button-huy-don"
					},
					cancel: true
				},
			})
		.then((value) => {
			switch (value) {

				case "mua-hang":
				GiaoHangThanhCong(id);
				break;

				case "huy-don":
				HuyDon(id);
				break;
				
			}
		});
	});
	$(".btn-da-huy").click(function(event) {
		/* Act on the event */
		var id = $(this).attr('id');
		swal(
			
			"Duyệt Hóa Đơn : "+id, {
				buttons: {
					catch: {
						text: "Giao Hàng ",
						value: "giao-hang",
						className:"btn-button-giao-hang"
					},
					roll: {
						text: "Đã Mua",
						value: "mua-hang",
						className: "btn-button-mua-hang"
					},

					cancel: true
				},
			})
		.then((value) => {
			switch (value) {

				case "giao-hang":
				GiaoHang(id);
				break;

				case "mua-hang":
				GiaoHangThanhCong(id);
				break;
				
			}
		});
	});
});


function GiaoHang(id) {
	$.ajax({
			url: './admin/bill/giao_hang',
			type: 'POST',
			data: {
				ID : id
			},
			success: function (value) {
                    // body...
                    var arr = JSON.parse(value);
                    swal({
							title: arr["title"],
							icon:  arr["trangthai"],
							text: arr["text"]
						}).then((value) => {
							location.href="admin/bill";
					});
                }
            })
	// body...
}

function HuyDon(id) {
	$.ajax({
			url: './admin/bill/huydonhang',
			type: 'POST',
			data: {
				ID : id
			},
			success: function (value) {
                    // body...
                    var arr = JSON.parse(value);
                    swal({
                        	title: arr["title"],
                        	icon:  arr["trangthai"],
                        	text: arr["text"]
                        }).then((value) => {
                        	location.href="admin/bill";
                        });
                }
            })
	// body...
}

function GiaoHangThanhCong(id) {
	$.ajax({
			url: './admin/bill/giaohangthanhcong',
			type: 'POST',
			data: {
				ID : id
			},
			success: function (value) {
                    // body...
                    var arr = JSON.parse(value);
                    swal({
                        	title: arr["title"],
                        	icon:  arr["trangthai"],
                        	text: arr["text"]
                        }).then((value) => {
                        	location.href="admin/bill";
                        });
                }
            })
	// body...
}


function deleteBill(val) {
	// body...
	swal({
        title: "Bạn Có Muốn Xóa Không ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: './admin/bill/deleteBill',
            type: 'POST',
            data: {
              ID: val
            },
            success: function (value) {
                            // body...
              var arr = JSON.parse(value);
              swal({
                title: arr["title"],
                icon:  arr["trangthai"],
                text: arr["text"]
              }).then((value) => {
                location.href="./admin/bill";
              });
            }
          })

        } 
     });
}