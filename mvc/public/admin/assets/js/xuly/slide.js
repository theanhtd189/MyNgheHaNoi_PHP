jQuery(document).ready(function($) {
	$('.file-upload-browse').click(function(event) {
		var file = $(this).parent().parent().parent().find('.file-upload-images-slide');
		file.trigger('click')

	});
	$('.file-upload-images-slide').on('change', function() {
		uploadImg($(this));
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));

	});

	

	$(".btn-them-slide").click(function(event) {
		/* Act on the event */
		var tieude = $("#tieu-de-slide").val();
		
		if ( tieude == "") {
			sweetAlter("error" , "Error" , "Tiêu đề slide không được để trống !!!");
			return;
		}
		var file_img = $("#file-anh-slide").prop('files');

	  	if (file_img.length == 0) {
	    	sweetAlter("error" , "Error" , "Ảnh slide chưa được upload !!!");
	    	return;
	  	}
	  	if (file_img[0]["size"] > 2000000) {
	  		sweetAlter("error" , "Error" , "Ảnh slide kích thước không đước quá 2MB !!!");
	    	return;
	  	}
	  	
	  	if (Check_isset_tieu_de(tieude) === "true") {
	  		sweetAlter("error" , "Error" , "Tiêu đề slide đã tồn tại !!!");
			return;
	  	}
	  	
	  	var formdata = new FormData();
	  	formdata.append('TieuDe' , tieude);
	  	formdata.append('STT' ,  $("#stt-slide").val());
	  	formdata.append('files' , file_img[0]);
	  	
	  	$.ajax({
			url: './admin/slide/add',
			type: 'POST',
			data: formdata,
			processData: false,
			contentType: false,
			success: function (value) {
                    // body...
                    var arr = JSON.parse(value);
                    sweetAlterTrangThai( arr["trangthai"], arr["title"], arr["text"] , "admin/slide");
                   
                }
            })	  	
	});

	$(".btn-edit-slide").click(function(event) {
		/* Act on the event */
		var id = $(this).parent(".modal-footer").parent().find('.modal-body').children().find('.id-slide-edit').val();
		var tieude =  $(this).parent(".modal-footer").parent().find('.modal-body').children().find('.tieu-de-slide-edit').val();
		var stt =  $(this).parent(".modal-footer").parent().find('.modal-body').children().find('.stt-slide-edit').val();
		var file = $(this).parent(".modal-footer").parent().find('.modal-body').children().find('.file-upload-default').prop('files');
		var formdata = new FormData();
		if ( tieude == "") {
			sweetAlter("error" , "Error" , "Tiêu đề slide không được để trống !!!");
			return;
		}
		if (file.length > 0) {
			if (file[0]["size"] > 2000000) {
		  		sweetAlter("error" , "Error" , "Ảnh slide kích thước không đước quá 2MB !!!");
		    	return;
		  	}
		}
		if (Check_isset_tieu_de_update(id,tieude) === "true") {
	  		sweetAlter("error" , "Error" , "Tiêu đề slide đã tồn tại !!!");
			return;
	  	}
	  	

		formdata.append('ID' , id);
	  	formdata.append('TieuDe' , tieude);
	  	formdata.append('STT' ,  stt);
	  	


	  	 if (file.length > 0) 
		  {
	  		formdata.append('files' , file[0]);
	  	}
	  	$.ajax({
			url: './admin/slide/update/'+id,
			type: 'POST',
			data: formdata,
			processData: false,
			contentType: false,
			success: function (value) {
                    // body...
                    var arr = JSON.parse(value);
                    sweetAlterTrangThai( arr["trangthai"], arr["title"], arr["text"] , "admin/slide");
                   
                }
        })
	});

	$(".btn-del-slide").click(function(event) {
		/* Act on the event */
		var id = $(this).parent().parent().find('.id-slide').html();
		swal({
            title: "Bạn Có Muốn Xóa Không ??",
            text: "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete){
                $.ajax({
                    url: './admin/slide/delete_slide/'+id,
                    type: 'GET',
                    success: function (value) {
                        // body...
                        var arr = JSON.parse(value);
                        swal({
                            title: arr["title"],
                            icon:  arr["trangthai"],
                            text: arr["text"]
                        }).then((value) => {
                            location.href="admin/slide";
                        });

                    }
                })
            }

        });
	});
});

function Check_isset_tieu_de(val) {
	// body...
	var str = "";
	$.ajax({
		url: './admin/slide/check_isset_tieu_de_slide/'+val,
		type: 'GET',
		async: false,
		success: function (value) {
			// body...
			str =  JSON.parse(value) ;
		}
	});
	return(str);
}


function Check_isset_tieu_de_update(id ,val) {
	// body...
	var str = "";
	$.ajax({
		url: './admin/slide/check_isset_tieu_de_slide_update/'+id+'/'+val,
		type: 'GET',
		async: false,
		success: function (value) {
			// body...
			str =  JSON.parse(value) ;
		}
	});
	return(str);
}

function uploadImg(el) {
	var file_data = $(el).prop('files')[0];
	var type = file_data.type;
	var fileToLoad = file_data;

	var fileReader = new FileReader();

	fileReader.onload = function(fileLoadedEvent) {
		var srcData = fileLoadedEvent.target.result;

		var newImage = document.createElement('img');

		newImage.src = srcData;
		$(".show-img-insert-slide").html(newImage.outerHTML);
	}
	fileReader.readAsDataURL(fileToLoad);

}
function ChangeStatus(id) {
  // body...
  $.ajax({
    url: './admin/slide/ChangeStatus/'+id,
    type: 'GET',
    success: function (value) {
      // body...
      location.href="./admin/slide";
    }
  });
}
function removeVietnameseTones(str) {

        //Đổi ký tự có dấu thành không dấu
        str = str.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
        str = str.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
        str = str.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
        str = str.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
        str = str.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
        str = str.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
        str = str.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
        str = str.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
        str = str.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
        str = str.replace(/\-\-\-\-\-/gi, '-');
        str = str.replace(/\-\-\-\-/gi, '-');
        str = str.replace(/\-\-\-/gi, '-');
        str = str.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
        str = '@' + str + '@';
        str = str.replace(/\@\-|\-\@|\@/gi, '');

        return str.toLowerCase();
      }