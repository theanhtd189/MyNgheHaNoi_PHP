$(document).ready(function() {
    $("#check-all").click(function() {
        $(":checkbox").prop("checked", true);
    });
    $("#clear-all").click(function() {
        $(":checkbox").prop("checked", false);
    });
    $("#btn-delete").click(function() {

        if ($(":checked").length === 0 ) {
            sweetAlter("warning" , "Delete" , "Vui lòng chọn loại sản phẩm cần xóa");
            return;
        }
        var arr=[];
        var checkbox = document.getElementsByName('delete');
        for (var i = 0; i < checkbox.length; i++){
            if (checkbox[i].checked === true){
                arr.push(checkbox[i].value);
            }
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
                    url: './admin/product/deleteArrProduct',
                    type: 'POST',

                    data: {
                        arrDelProduct: arr
                    },
                    success: function (value) {
                            // body...
                            var arr = JSON.parse(value);
                            swal({
                                title: arr["title"],
                                icon:  arr["trangthai"],
                                text: arr["text"]
                            }).then((value) => {
                                location.href="admin/product";
                            });

                        }
                    })

            } 
        });
        
    });



});

function Delete_Details_Pro(val) {
    // body...

    swal({
        title: "Bạn Có Muốn Xóa Không ??",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete){
            $.ajax({
                url: './admin/product/del_detale_product/'+val,
                type: 'GET',
                success: function (value) {
                        // body...
                        var arr = JSON.parse(value);
                        swal({
                            title: arr["title"],
                            icon:  arr["trangthai"],
                            text: arr["text"]
                        }).then((value) => {
                            location.href="admin/product";
                        });

                    }
                })
        }

    });
}

function DeleteProduct(val) {
    // body...
    swal({
        title: "Bạn Có Muốn Xóa Không ??",
        text: "",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete){
            $.ajax({
                url: './admin/product/delete/'+val,
                type: 'GET',
                success: function (value) {
                        // body...
                        var arr = JSON.parse(value);
                        swal({
                            title: arr["title"],
                            icon:  arr["trangthai"],
                            text: arr["text"]
                        }).then((value) => {
                            location.href="./admin/product";
                        });

                    }
                })
        }

    });
}

function ChangeStatus(value) {
    // body...
    $.ajax({
        url: './admin/product/changeState/'+value,
        type: 'GET',
        success: function (value) {
            location.href="./admin/product";
        }
    })
}

function ChangeNoiBaT(value) {
    // body...
    $.ajax({
        url: './admin/product/ChangeNoiBaT/'+value,
        type: 'GET',
        success: function (value) {
            location.href="./admin/product";
        }
    })
}
