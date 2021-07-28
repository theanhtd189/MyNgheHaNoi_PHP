
CKEDITOR.replace( 'product-chi-tiet', {
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

  $('#product-ma').on('change', function() {
    LoadIssetProduct("Ajax_check_ma_sp",$(this).val());
    
  });
});
function LoadIssetTitleProduct(url ,val ) {
 if(val != ""){

  var xhttp = new XMLHttpRequest() || ActiveXObject();
        //Bat su kien thay doi trang thai cuar request
        xhttp.onreadystatechange = function () {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                //In ra data nhan duoc
                if (JSON.parse(this.responseText) == "true") {
                 document.getElementById("validate_title").innerHTML = "Tiêu đề sản phẩm đã tồn tại";
                 document.getElementById("validate_title").style.display = "block";
               }
               else {
                console.log(false);
                document.getElementById("validate_title").innerHTML = "";
                document.getElementById("validate_title").style.display = "none";
              }
            }
          }
        //cau hinh request
        xhttp.open('GET','admin/product/'+url+'/'+val,true);
        //gui request
        xhttp.send();
      }
  // body...
}

function LoadIssetProduct(url ,val ) {
 if(val != ""){

  var xhttp = new XMLHttpRequest() || ActiveXObject();
        //Bat su kien thay doi trang thai cuar request
        xhttp.onreadystatechange = function () {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                //In ra data nhan duoc
                if (JSON.parse(this.responseText) == "true") {
                 document.getElementById("validate_masp").innerHTML = "Mã sản phẩm đã tồn tại";
                 document.getElementById("validate_masp").style.display = "block";
               }
               else {
                console.log(false);
                document.getElementById("validate_masp").innerHTML = "";
                document.getElementById("validate_masp").style.display = "none";
              }
            }
          }
        //cau hinh request
        xhttp.open('GET','admin/product/'+url+'/'+val,true);
        //gui request
        xhttp.send();
      }
  // body...
}

/// list-img 
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

  $('.btn-add-detaileproduct').click(function(event) {
    AddDetaileproduct();

  });
});

function AddDetaileproduct() {
  var html = "<tr>";
  html+="<td></td>";
  html+='<td><input type="text" class="form-control form-control-sm" id="detaileproduct-loai" name="detaileproduct-loai[]" placeholder="Loại"></td>';
  html+='<td><input type="number" min="0" class="form-control form-control-sm" id="detaileproduct-so-luong" name="detaileproduct-so-luong[]" placeholder=""></td>';
  html+='<td><input type="number" min="0" class="form-control" id="detaileproduct-gia-nhap" name="detaileproduct-gia-nhap[]" placeholder="Giá nhập ....."></td>';
  html+='<td><input type="text" class="form-control" id="detaileproduct-gia-ban" placeholder="Giá bán ......" name="detaileproduct-gia-ban[]"></td>';
  html+='<td><input type="text" class="form-control" id="detaileproduct-giam-gia" placeholder="%" value="0" name="detaileproduct-giam-gia[]"></td>';
  html+='<td><span class=""><i class=" mdi mdi-close-circle-outline" onclick="DelDetaileproduct(this)" style="font-size: 20px;"></i></span></td>';
  html+='</tr>';

  $(".table-detaileproduct tbody").append(html);
}

function DelDetaileproduct(val) {
 var length_row = $(".table-detaileproduct tbody").children('tr');
 if (length_row.length > 1) {
  var row = val.parentElement.parentElement.parentElement.remove();
}else {
  swal({
   title: "Error",
   icon: "error",
 });
}
  // body...
}



function check_file_image(file_img) {
  // body...
  const type_image = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
  if (file_img["size"] > 2000000) {
    sweetAlter("error" , "Error" , "File ảnh size < 2MB !!!");
    return false;
  }
  if (type_image.indexOf(file_img["type"]) < 0) {
    sweetAlter("error" , "Error" , "File ảnh không hợp lệ !!!");
    return false;
  }
}

$(document).keypress(function(event){
  var keycode = (event.keyCode ? event.keyCode : event.which);
  if (keycode == '13') {
    return false;
  }
  //return false;
});


function ValidateData() {



  // body...
  var patt =/^[a-zA-Z0-9_]+$/;

  if ($("#category_id").find(":selected").val() === "") {
    sweetAlter("error" , "Error" , "Loại sản phẩm chưa được chọn !!!");
    return false;
  }


  var str = $("#product-ma").val();
  if ($("#product-ma").val() ==="") {
    sweetAlter("error" , "Error" , "Mã sản phẩm không được để trống !!!");
    return false;
  }
  if(!patt.test(str) ){
    sweetAlter("error" , "Error" , "Mã sản phẩm không được chứa ký tự đặc biệt !!!");
    return false;
  }
  if ($("#product-ma").val().length > 20) {
    sweetAlter("error" , "Error" , "Mã sản phẩm phải có độ dài từ 1 -> 20 ký tự !!!");
    return false;
  }
  var str = $("#validate_masp").text().trim();
  if (str !== "") {
    sweetAlter("error" , "Error" , "Mã sản phẩm đã tồn tại");
    return false;
  }
  

  if ($("#product-tieu-de").val() === "") {
    sweetAlter("error" , "Error" , "Tiêu đề sản phẩm không được để trống !!!");
    return false;
  }
  if ($("#product-tieu-de").val().length > 50) {
    sweetAlter("error" , "Error" , "Tiêu đề sản phẩm phải có độ dài từ 1 -> 50 ký tự !!!");
    return false;
  }
  if ($("#validate_title").text().trim() !== "") {
    sweetAlter("error" , "Error" , "Tiêu đề sản phẩm đã tồn tại");
    return false;
  }
  if ($("#product-ten").val() === "") {
    sweetAlter("error" , "Error" , "Tên đề sản phẩm không được để trống !!!");
    return false;
  }
  if ($("#product-ten").val().length > 50) {
    sweetAlter("error" , "Error" , "Tên đề sản phẩm phải có độ dài từ 1 -> 50 ký tự !!!");
    return false;
  }

  if ($("#product-xuat-xu").val() === "") {
    sweetAlter("error" , "Error" , "Xuất xứ sản phẩm không được để trống !!!");
    return false;
  }

  var file_img = $(".file-upload-default-image").prop('files');

  if (file_img.length == 0) {
    sweetAlter("error" , "Error" , "Ảnh chính sản phẩm không được để trống !!!");
    return false;
  }
  return check_file_image(file_img[0]);

  var fileSelected =$('.file-upload-default-list-img').prop('files');
  if (fileSelected.length>0) {
    for(var k = 0; k < fileSelected.length ; k++){
      return check_file_image(fileSelected[k]);
    }
  }
  return false;
  
  if ($("#product-xuat-xu").val().length > 30) {
    sweetAlter("error" , "Error" , "Xuất xứ sản phẩm phải có độ dài từ 1 -> 30 ký tự !!!");
    return false;
  }
  if ($("#product-mo-ta").val() === "") {
    sweetAlter("error" , "Error" , "Mô tả sản phẩm không được để trống !!!");
    return false;
  }

   var length_loai = document.querySelectorAll("#detaileproduct-loai");
  
  length_loai.forEach( function(element, index) {
    // statements
    if (length_loai[index].value === "") {
      sweetAlter("error" , "Error" , "Thông tin chi tiết ( Loại ["+index+"])  không được để trống !!!");
      return false;
    }
  });

  var str = "";
  for(var k = 0; k < length_loai.length; k++){
    
    for(var j = 0; j < length_loai.length; j++){
      if (j==k) {
        continue;
      }
      else{
        if ((length_loai[k].value.toLowerCase()).trim() == (length_loai[j].value.toLowerCase()).trim()) {
          sweetAlter("error" , "Error" , "Thông tin chi tiết ( Loại )  không được trùng nhau !!!");
          console.log(true);
          return false;
        }
      }
    }
    
  }

  var length_sl = document.querySelectorAll("#detaileproduct-so-luong");

  length_sl.forEach( function(element, index) {
    // statements
    if (length_sl[index].value === "") {
      sweetAlter("error" , "Error" , "Thông tin chi tiết ( Số Lượng ["+index+"])  không được để trống !!!");
      return false;
    }
  });

  var length_gia_nhap = document.querySelectorAll("#detaileproduct-gia-nhap");
  
  length_gia_nhap.forEach( function(element, index) {
    // statements
    if (length_gia_nhap[index].value === "") {
      sweetAlter("error" , "Error" , "Thông tin chi tiết ( Loại ["+index+"])  không được để trống !!!");
      return false;
    }
  });

  var length_gia_ban = document.querySelectorAll("#detaileproduct-gia-ban");
  
  length_gia_ban.forEach( function(element, index) {
    // statements
    if (length_gia_ban[index].value === "") {
      sweetAlter("error" , "Error" , "Thông tin chi tiết ( Loại ["+index+"])  không được để trống !!!");
      return false;
    }
  });

  if ($("#product-mo-ta").val().length > 255) {
    sweetAlter("error" , "Error" , "Mô tả sản phẩm phải có độ dài từ 1 -> 255 ký tự !!!");
    return false;
  }
  if ($("#product-chi-tiet").val() === "") {
    sweetAlter("error" , "Error" , "Mô tả chi tiết sản phẩm không được để trống !!!");
    return false;
  }
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