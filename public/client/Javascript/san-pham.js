function CheckSession() {
	// body...
	var check = checkdangnhap();
	if (check != "true") {
		location.href="./dangnhap";
		return false;
	}
	return true; 
}
function checkdangnhap() {
	// body...
	var str = "";
	$.ajax({
		url: './SanPham/checkdangnhap',
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
	$(".btn-add-cart").click(function(event) {
		var sl = $("#quantity").val();
		var id = $("#property").val();
		$.ajax({
			url: './giohang/add_cart/'+id+'/'+sl,
			type: 'GET',
			async: false,
			success: function (value) {
				var arr= JSON.parse(value);
				Swal.fire({
					icon: arr["trangthai"],
					title: arr["title"],
					text: arr["text"],
					showLoaderOnConfirm: true,
					preConfirm: () => {
						$("#quantity").val(1);
						LoadCart();
					}
				})

			}
		});
	});
});