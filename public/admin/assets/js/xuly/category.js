
$(document).ready(function() {
    $("#check-all").click(function() {
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
        }else{
            console.log(arr);
            swal({
                title: "Bạn Có Muốn Xóa Không ??",
                text: "Dữ liệu kèm theo loại sản phẩm trên sẽ bị xóa",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: './admin/category/delete',
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
                                location.href="./admin/category";
                            });
                        }
                    })

                } 
            });
        }
    });
  
});

$(document).ready(function () {
    // body...
    LoadTrang(1);

    $('#btn_them').click(function(event) {

        if($("#TenDanhMuc").val() === ""){
            sweetAlter("error" , "Error" , "Tên danh mục không được để chống");
        }
        else {
            var ten_danh_muc = $("#TenDanhMuc").val();
            if(ten_danh_muc.length > 30|| ten_danh_muc.length <=0){
                sweetAlter("error" , "Error" , "Tên danh mục phải có độ dài từ 0 đến 30 ký tự");
                return;
            }
            
            $.ajax({
                url: './admin/category/insert',
                type: 'POST',
                data: {
                    TenDanhMuc: $("#TenDanhMuc").val(),
                    Slug: $("#slug").val(),
                    ParentID: $("#parentID").val()
                },
                success: function (value) {
                    // body...
                    var arr = JSON.parse(value);
                    swal({
                        title: arr["title"],
                        icon:  arr["trangthai"],
                        text: arr["text"]
                    }).then((value) => {
                        location.href="./admin/category";
                    });
                }
            })
        }

    });
    $('#btn_sua').click(function(event) {
        if ($("#ID").val() ==="") {
            sweetAlter("warning" , "Edit" , "Mời bạn chọn loại sản phẩm cần sửa");
            return;
        }
        if($("#TenDanhMuc").val() === ""){
            sweetAlter("error" , "Error" , "Tên danh mục không được để chống");
            return;
        }
        else {
            var ten_danh_muc = $("#TenDanhMuc").val();
            if(ten_danh_muc.length > 30|| ten_danh_muc.length <=0){
                sweetAlter("error" , "Error" , "Tên danh mục phải có độ dài từ 0 đến 30 ký tự");
                return;
            }
            
            $.ajax({
                url: './admin/category/edit',
                type: 'POST',
                data: {
                    ID : $("#ID").val(),
                    TenDanhMuc: $("#TenDanhMuc").val(),
                    Slug: $("#slug").val(),
                    ParentID: $("#parentID").val()
                },
                success: function (value) {
                    // body...
                    var arr = JSON.parse(value);

                    swal({
                        title: arr["title"],
                        icon:  arr["trangthai"],
                        text: arr["text"]
                    }).then((value) => {
                        location.href="./admin/category";
                    });
                }
            })
        }
    });
    $('#btn_reset').click(function(event) {


        /*$.ajax(this.href, {
            success: function(data) {
                $('#main').html($(data).find('#main *'));
                $('#notification-bar').text('The page has been successfully loaded');
            },
            error: function() {
                $('#notification-bar').text('An error occurred');
            }
        });*/
    });
   // 
});

function LoadPage(value) {
	// body...
	var id = value.getAttribute("value");
	$("#so_trang").find("ul").remove();
	LoadTrang(id);
}

function LoadLaiTrang(id) {
    // body...
    $("#so_trang").find("ul").remove();
    LoadTrang(id);
}

function LoadTrang(page) {
        // body...
        var xhttp = new XMLHttpRequest() || ActiveXObject();
        //Bat su kien thay doi trang thai cuar request
        xhttp.onreadystatechange = function () {
            //Kiem tra neu nhu da gui request thanh cong
            if (this.readyState == 4 && this.status == 200) {
                //In ra data nhan duoc
                LoadData(this.responseText);
            }
        }
        //cau hinh request
        xhttp.open('GET','admin/category/page/'+page,true);
        //gui request
        xhttp.send();
    }

    function LoadData(text) {
    // body...
    var arr = JSON.parse(text);

    $("#so_trang").append(arr["html"]);
    LoadTable(arr["value"]);
}

function LoadTable(arr) {
	$("table tbody").find('tr').remove();
	var str = "";
	for (var i = 0; i < arr.length; i++) {
		str +="<tr>";
		str += '<th><input type="checkbox" name="delete" value="'+  arr[i]["ID"] +'"></th>';
		str+= '<td>'+arr[i]["TenDanhMuc"]+'</td>';
		str+= '<td>'+ arr[i]["TenDanhMucParentID"]+'</td>';
		str+= '<td>';
        if (arr[i]["TrangThai"] == 0){
            str+= '<label class="change-status badge badge-danger" onclick="ChangeStatus('+arr[i]["ID"]+')">Chặn</label>';
        }else{
            str+= '<label class="change-status badge badge-success" onclick="ChangeStatus('+arr[i]["ID"]+')">Hiển Thị</label>';
        }
        str+= '</td>';
        str+= '<td><button type="button" class="btn btn-warning btn-sm"  onclick="view_edit('+arr[i]["ID"]+')">Sửa</button></td>';
        str+= "</tr>";
    }
    $("table tbody").append(str);
    // body...
}

function view_edit($value) {
    // body...
    //Khoi tao doi tuong
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            addData(this.responseText)
        }
    }
    //cau hinh request
    xhttp.open('GET','admin/category/get/'+$value,true);
    //gui request
    xhttp.send();
}


function addData (data) {
    var value =  JSON.parse(data);
    document.getElementById('ID').value = value["ID"];
    document.getElementById('TenDanhMuc').value = value["TenDanhMuc"];
    document.getElementById('slug').value =  value["Slug"];
    var options = document.getElementById("parentID").getElementsByTagName('option');

    for (var i = 0; i < options.length; i++){
        if (options[i].value == value["ParentID"]){

            options[i].selected = 'selected';
        }

    }
}

function ChangeToSlug(data) {
        // body...
        document.getElementById('slug').value = removeVietnameseTones(data.value);
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


/*
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['ParentID'] == $parent_id)
        {
            echo '<option value="'.$item["ID"].'">';
            echo $char .' '. $item['TenDanhMuc'];
            echo '</option>';
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['ID'], $char.'---');
        }
    }
}*/

  /// change status
function ChangeStatus(value) {
    // body...
    var xhttp = new XMLHttpRequest() || ActiveXObject();
    //Bat su kien thay doi trang thai cuar request
    xhttp.onreadystatechange = function () {
        //Kiem tra neu nhu da gui request thanh cong
        if (this.readyState == 4 && this.status == 200) {
            //In ra data nhan duoc
            location.href="./admin/category";
        }
    }
    //cau hinh request
    xhttp.open('GET','admin/category/changeState/'+value,true);
    //gui request
    xhttp.send();
}
