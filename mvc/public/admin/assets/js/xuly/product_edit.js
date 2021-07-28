

CKEDITOR.replace( 'product-chi-tiet-edit', {
	filebrowserBrowseUrl: './public/plugins/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl: './public/plugins/ckfinder/ckfinder.html?Type=Images',
	filebrowserUploadUrl: './public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl: './public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

});

jQuery(document).ready(function($) {
  $("#product-tieu-de").keyup(function(e){
    document.getElementById("product-slug").value = removeVietnameseTones($(this).val());      
  })
  $("#product-tieu-de").change(function(e){
    document.getElementById("product-slug").value = removeVietnameseTones($(this).val());   
    LoadIssetTitleProduct("Ajax_check_slug",removeVietnameseTones($(this).val()));   
  })
});

jQuery(document).ready(function($) {
  $('.file-upload-image').click(function(event) {
    var file = $(this).parent().parent().parent().find('.file-upload-default-image');
    file.trigger('click')

  });
  $('.file-upload-default-image').on('change', function() {
    uploadImg($(this));
    $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    
  });
});

function uploadImg(el) {
  var file_data = $(el).prop('files')[0];
  var type = file_data.type;
  var fileToLoad = file_data;

  var fileReader = new FileReader();

  fileReader.onload = function(fileLoadedEvent) {
    var srcData = fileLoadedEvent.target.result;

    var newImage = document.createElement('img');
    
    newImage.src = srcData;
    $(".hien-thi-image-chinh").html(newImage.outerHTML);
  }
  fileReader.readAsDataURL(fileToLoad);

}

jQuery(document).ready(function($) {
  $('.file-upload-list-image').click(function(event) {
    var file = $(this).parent().parent().parent().find('.file-upload-default-list-img');
    file.trigger('click')

  });
  $('.file-upload-default-list-img').on('change', function() {
    $("#hien-thi-image-kem-theo").children('div').remove();
    var fileSelected = $(this).prop('files');
    var str = fileSelected.length+" files";
    $(this).parent().find('.form-control').val(str);
    if (fileSelected.length > 0) {

      for (var i = 0; i < fileSelected.length; i++) {
        var fileToLoad = fileSelected[i];
        var fileReader = new FileReader();
        fileReader.onload = function(fileLoaderEvent) {
          var srcData = fileLoaderEvent.target.result;
          var newImage = document.createElement('img');
          newImage.src = srcData;
          var div = document.createElement("div");
          div.append(newImage);
          $("#hien-thi-image-kem-theo").append(div.outerHTML) ;
        }
        fileReader.readAsDataURL(fileToLoad);
      }
    }
  });
});

jQuery(document).ready(function($) {
	$(".btn-edit-chi-tiet-product").click(function(event) {
		/* Act on the event */
		var idsp = $("#product-ma").val();
		var id = $(this).parent().parent().find('.id').children(".id_chi_tiet").val();
		var loai = $(this).parent().parent().find('.loai').children("#detaileproduct-loai").val();
		var so_luong = $(this).parent().parent().find('.so-luong').children("#detaileproduct-so-luong").val();
		var gia_nhap = $(this).parent().parent().find('.gia-nhap').children("#detaileproduct-gia-nhap").val();
		var gia_ban = $(this).parent().parent().find('.gia-ban').children("#detaileproduct-gia-ban").val();
		var giam_gia = $(this).parent().parent().find('.giam-gia').children("#detaileproduct-giam-gia").val();
		if (loai == "") {
			sweetAlter("error","Error","Loại (Size ) không được để trống !!!");
			return;
		}
		if(check_isset_loai_size(id,loai,idsp) == 'true'){
			sweetAlter("error","Error","Loại (Size ) đã tồn tại !!!");
			return;
		}
		$.ajax({
			url: './admin/product/update_detale_product',
			type: 'POST',
			data: {
				ID : id,
				Loai: loai,
				SoLuong: so_luong,
				GiaNhap: gia_nhap,
				GiaBan: gia_ban,
				GiamGia: giam_gia
			},
			success: function (value) {
                    // body...
                    var arr = JSON.parse(value);
                    sweetAlter( arr["trangthai"], arr["title"], arr["text"]);
                }
            })

	});
});

function check_isset_loai_size(id , size , masp) {
	// body...
	var str = "";
	console.log('admin/product/check_update_isset_loai_size/'+id+'/'+size+'/'+masp);
	$.ajax({
		url: 'admin/product/check_update_isset_loai_size/'+id+'/'+size+'/'+masp,
		type: 'GET',
		async: false,
		success: function (value) {
			// body...
			str =  JSON.parse(value) ;
		}
	});
	return(str);
   }

/// xử lý xóa detaleproducts
jQuery(document).ready(function($) {
	$(".btn-del-chi-tiet-product").click(function(event) {
		/* Act on the event */
		var id = $(this).parent().parent().find('.id').children(".id_chi_tiet").val();
		var idsp = $("#product-ma").val();

		swal({
			title: "Bạn Có Muốn Xóa Không ??",
			text: "",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete){
				$.ajax({
					url: './admin/product/del_detale_product/'+id,
					type: 'GET',
					success: function (value) {
						// body...
						var arr = JSON.parse(value);
						swal({
							title: arr["title"],
							icon:  arr["trangthai"],
							text: arr["text"]
						}).then((value) => {
							location.href="admin/product/edit/"+idsp;
						});
					}
				})
			}

		});
	});
});

/// xử lý thêm detaleprodcts :

jQuery(document).ready(function($) {
	$(".btn_add_detailedproducts").click(function(event) {
		/* Act on the event */
		var idsp = $("#product-ma").val();
		var loai = $('#loai-size-chi-tiet').val();
		var so_luong = $('#so-luong-chi-tiet').val();
		var gia_ban = $('#gia-ban-chi-tiet').val();
		var gia_nhap = $('#gia-nhap-chi-tiet').val();
		var giam_gia = $('#giam_gia_chi_tiet').val();
		if (loai == "") {
			sweetAlter("error","Error","Loại (Size ) không được để trống !!!");
			return;
		}
		if(check_isset_add_loai_size(loai , idsp) == "true"){
			sweetAlter("error","Error","Loại (Size ) đã tồn tại !!!");
			return;
		}

		$.ajax({
			url: './admin/product/add_detale_product/'+idsp,
			type: 'POST',
			data: {
				Loai: loai,
				SoLuong: so_luong,
				GiaNhap: gia_nhap,
				GiaBan: gia_ban,
				GiamGia: giam_gia
			},
			success: function (value) {
				// body...
				var arr = JSON.parse(value);
				swal({
					title: arr["title"],
					icon:  arr["trangthai"],
					text: arr["text"]
				}).then((value) => {
					location.href="admin/product/edit/"+idsp;
				});
			}
		})
	});
});

function check_isset_add_loai_size( size , idsp) {
	// body..
	size = size.trim();
	idsp = idsp.trim();
	$.ajax({
		url: 'admin/product/check_add_isset_loai_size/'+size+'/'+idsp,
		type: 'GET',
		async: false,
		success: function (value) {
                    // body...
                    str =  JSON.parse(value) ;     
                }
            });
	return(str);
}