CKEDITOR.replace( 'noi-dung', {
  filebrowserBrowseUrl: './public/plugins/ckfinder/ckfinder.html',
  filebrowserImageBrowseUrl: './public/plugins/ckfinder/ckfinder.html?Type=Images',
  filebrowserUploadUrl: './public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
  filebrowserImageUploadUrl: './public/plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

});

jQuery(document).ready(function($) {
	$('.file-upload-browse').click(function(event) {
		var file = $(this).parent().parent().parent().find('.file-upload-default');
		file.trigger('click')

	});
	$('.file-upload-default').on('change', function() {
		uploadImg($(this));
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));

	});

	$("#tieu-de").on('change', function(event) {

		var str = removeVietnameseTones($(this).val());
		$("#slug").val(str);
		/* Act on the event */
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
		$(".show-image").html(newImage.outerHTML);
	}
	fileReader.readAsDataURL(fileToLoad);

}

function ValidateData() {
	// body...
	if ($("#tieu-de").val() ==="") {
	    sweetAlter("error" , "Error" , "Tiêu đề bài viết không được để trống !!!");
	    return false;
	}

	if ($("#tieu-de").val().length  < 1 || $("#tieu-de").val().length  > 100 ) {
	    sweetAlter("error" , "Error" , "Tiêu đề bài viết phải có độ dài 1=>100 ký tự !!!");
	    return false;
	}
	
	var id = ($("#posts_id").html()).replace(" ", "");
	
	if (check_isset_tieu_de_update( id ,  $("#slug").val()) ==="true") {
		sweetAlter("error" , "Error" , "Tiêu đề bài viết đã tồn tại!!!");
	    return false;
	}
	
}

function check_isset_tieu_de_update(id ,val) {
	// body...
	var str = "";
	$.ajax({
		url: './admin/posts/check_isset_ten_bai_viet_update/'+id+'/'+val,
		type: 'GET',
		async: false,
		success: function (value) {
			// body...
			str =  JSON.parse(value) ;
		}
	});
	return(str);
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
