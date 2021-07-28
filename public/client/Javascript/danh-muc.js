jQuery(document).ready(function($) {
	LoadData();
});
function LoadData() {
	// body...
	// var listLiCap1 = $(".cap-1").children();
	// console.log(listLiCap1[0]);
	// for (var i = listLiCap1.length - 1; i >= 0; i--) {
	// 	console.log();

	// }
	var arr_cap_1 = $(".cap-1").children();
	for (var i = 0; i < arr_cap_1.length; i++) {
		if( arr_cap_1[i]["children"].length > 1){
			arr_cap_1[i]["children"][0].setAttribute("href", "javascript:void(0)");
			var p = document.createElement("span");
		       //tạo phần tử text
		    p.setAttribute("class","fa fa-angle-left");
			arr_cap_1[i]["children"][0].appendChild(p);
		}
	}
	var arr_cap_2 = $(".cap-2").children();
	for (var i = 0; i < arr_cap_2.length; i++) {
		if( arr_cap_2[i]["children"].length > 1){
			arr_cap_2[i]["children"][0].setAttribute("href", "javascript:void(0)");
			var p = document.createElement("span");
		       //tạo phần tử text
		    p.setAttribute("class","fa fa-angle-left");
			arr_cap_2[i]["children"][0].appendChild(p);
		}
	}
}

jQuery(document).ready(function($) {
	$('a[href|="javascript:void(0)"]').click(function(event) {
		/* Act on the event */
		if( $(this).next().css("display") == 'none' ){
 			$(this).next().show(400);
 			$(this).children('span').css('transform' , 'translateY(-50%) rotate(-90deg)');
		    /* your code here*/
		}
		else{
		 	$(this).next().hide(400);
		    /*  alternate logic   */
		    $(this).children('span').css('transform' , 'translateY(-50%)');
		}
	});
});




// function SweetAlterDetailProduct(id) {

// 	var object = AjaxRquestDetailProduct(id);
// 	if (object.length < 0) {
// 		return;
// 	}

// 	var object_detailsproduct = new Object();
	
// 	for (var i = object.length - 1; i >= 0; i--) {
// 		object_detailsproduct[object[i]["ID"]] = " ( "+object[i]["LoaiSize"]+" ) ";
// 	}

// 	Swal.fire({
// 		title: 'Chọn Loại : '+object[0]["TenSp"],
// 		input: 'select',
// 		inputOptions: object_detailsproduct,
// 		showCancelButton: true,
		
// 	}).then(function (result) {
// 		if (result.isConfirmed) {
// 			// Swal.fire({
// 			// 	icon: 'success',
// 			// 	html: 'You selected: '+ id + " / " + result.value
// 			// });
			
// 			$.ajax({
// 				url: './giohang/add_cart/'+result.value+'/'+1,
// 				type: 'GET',
// 				async: false,
// 				success: function (value) {
// 					var arr= JSON.parse(value);
// 					Swal.fire({
// 						icon: arr["trangthai"],
// 						title: arr["title"],
// 						text: arr["text"],
// 						showLoaderOnConfirm: true,
// 						preConfirm: () => {
// 						    LoadCart();
// 						}
// 					})

// 				}
// 			});

// 		}
// 	});
// }


// 	// body..

// function AjaxRquestDetailProduct(ma_sp) {
// 	// body...
// 	var object = new Object();
// 	$.ajax({
// 		url: './trangchu/loadDetailProduct/'+ma_sp,
// 		type: 'GET',
// 		async: false,
// 		success: function (value) {
// 			// body...
// 			object =  JSON.parse(value) ;
// 		}
// 	});
// 	return object;
	
// }


// jQuery(document).ready(function($) {
// 	LoadCart();
// 	$('#myModal').on('shown.bs.modal', function (e) {
// 	  	alert('Modal is successfully shown!');
// 	});
// 	$(".btn-cart").click(function(event) {
// 		/* Act on the event */
// 		LoadCart();
// 	});
// });
// function LoadCart() {
// 	// body...
// 	$.ajax({
// 		url: './giohang/getcart',
// 		type: 'GET',
// 		success: function (value) {
// 	            // body...
// 	            var arr = JSON.parse(value);
	       
// 	            InsertProductCart(arr);
// 	        }
// 	    })

// }
// function InsertProductCart(arr){
// 	var html = "";
// 	var nf = Intl.NumberFormat();
// 	var TongTien = 0;
// 	var soluong = 0;
// 	if (arr.length > 0) {
// 		for (var i = 0; i < arr.length; i++) {
// 			html+="<tr>";
// 			html+='<td class="id-product"> '+ arr[i]["ID"] +" </td>";
// 			html+="<td> "+ arr[i]["AnhChinh"] +" </td>";
// 			html+="<td> "+ arr[i]["TenSp"]+" ( "+ arr[i]["LoaiSize"] +" ) </td>";
// 			html+="<td> "+ arr[i]["DonViTinh"] +" </td>";
// 			html+="<td> ";
// 			html+=	  '<div class="form-group">';
// 			html+=	       '<input type="number" min="1" value="'+arr[i]["SoLuongMua"]+'" onchange="changeSoLuongMua(this)" class="form-control so-luong-mua" >'
// 			html+=    '</div>';
// 			html+="</td>";
// 			html+="<td> "+  nf.format(arr[i]["GiaBan"]) +" VND </td>";
// 			html+='<td> '+ nf.format(arr[i]["TongTien"]) +" VND </td>";
// 			html+='<td> <span class="fa fa-times-circle" onclick="deleteProductCart('+i+')"></span> </td>';
// 			html+="</tr>";
// 			TongTien+=arr[i]["TongTien"];
// 			soluong+=Number( arr[i]["SoLuongMua"] );
// 		}
// 	}
// 	else{
// 		html+="<tr>";
// 		html+=	'<td colspan="8"> Chưa có sản phẩm </td>';
// 		html+="</tr>";
// 	}
// 	$(".content_cart").children('tr').remove();
// 	$(".content_cart").append(html);
// 	$(".tong-tien").html(nf.format(TongTien));
// 	$(".so-luong-hang").html(soluong);
// }


// function deleteProductCart(id) {
// 	$.ajax({
// 		url: './giohang/delete_product_cart/'+id,
// 		type: 'GET',
// 		success: function (value) {
//             // body...
//             var arr = JSON.parse(value);
//             Swal.fire({
// 				icon: arr["trangthai"],
// 				title: arr["title"],
// 				showLoaderOnConfirm: true,
// 				preConfirm: () => {
// 				    LoadCart();
// 				}
// 			})
//         }
//     })
// }

// function changeSoLuongMua(val) {
// 	// body...
// 	var id ;
// 	var arr = val.parentNode.parentNode.parentNode.getElementsByTagName('td');
// 	for (var i = 0; i < arr.length; i++) {
// 		if (arr[i].getAttribute("class") == "id-product") {
// 			id = Number(arr[i].innerHTML);
// 		}
// 	}
// 	var soluong = val.value;
// 	var arr_cart ;

// 	console.log(soluong +" "+ id);
// 	$.ajax({
// 		url: './giohang/edit_so_luong_mua/'+id+'/'+soluong,
// 		type: 'GET',
// 		success: function (value) {
// 			var arr= JSON.parse(value);
// 				if (Array.isArray(arr) == false) {
// 					Swal.fire({
// 						icon: arr["trangthai"],
// 						title: arr["title"],
// 						text: arr["text"],
// 						showLoaderOnConfirm: true,
// 						preConfirm: () => {
// 						    LoadCart();
// 						}
// 					})
// 				}else {

// 					LoadCart();
// 				}

// 			}
// 		});
// }