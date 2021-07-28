$(window).scroll(function () { 
    let header = $('.header').height();
    if( $(window).scrollTop() > 100 ){
        $('.list-menu').addClass('fixed_menulist');        
    }else{ 
      $('.list-menu').removeClass('fixed_menulist');  
    }
});

  jQuery(document).ready(function($) {
    var change = 1;
    $("#btn-menu").click(function(event) {
      /* Act on the event */
      if (change==1) {
        $("#span_1").css({
          transform : 'rotate(45deg)',
          top: '50%'
        });
        $("#span_2").css({
          display : 'none'
        });
        $("#span_3").css({
          transform : 'rotate(-45deg)',
          top: '50%'
        });
        $(".list-menu").css({
          left : '0px',
          opacity : '1'
        });
         change=0;
      }else{
        $("#span_1").css({
          transform : 'rotate(0deg)',
          top: '0'
        });
        $("#span_2").css({
          display : 'block'
        });
        $("#span_3").css({
          transform : 'rotate(0deg)',
          top: '100%'
        });
         $(".list-menu").css({
          left : '-100%',
          opacity : '0'
        });
         change=1;
      }
     
    });
  });

function SweetAlterDetailProduct(id) {

  var object = AjaxRquestDetailProduct(id);
  if (object.length < 0) {
    return;
  }

  var object_detailsproduct = new Object();
  
  for (var i = object.length - 1; i >= 0; i--) {
    object_detailsproduct[object[i]["ID"]] = " ( "+object[i]["LoaiSize"]+" ) ";
  }

  Swal.fire({
    title: 'Chọn Loại : '+object[0]["TenSp"],
    input: 'select',
    inputOptions: object_detailsproduct,
    showCancelButton: true,
    
  }).then(function (result) {
    if (result.isConfirmed) {
      // Swal.fire({
      //  icon: 'success',
      //  html: 'You selected: '+ id + " / " + result.value
      // });
      
      $.ajax({
        url: './giohang/add_cart/'+result.value+'/'+1,
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
                LoadCart();
            }
          })

        }
      });

    }
  });
}


  // body..

function AjaxRquestDetailProduct(ma_sp) {
  // body...
  var object = new Object();
  $.ajax({
    url: './trangchu/loadDetailProduct/'+ma_sp,
    type: 'GET',
    async: false,
    success: function (value) {
      // body...
      object =  JSON.parse(value) ;
    }
  });
  return object;
  
}


jQuery(document).ready(function($) {
  LoadCart();
  $('#myModal').on('shown.bs.modal', function (e) {
      alert('Modal is successfully shown!');
  });
  $(".btn-cart").click(function(event) {
    /* Act on the event */
    LoadCart();
  });
});
function LoadCart() {
  // body...
  $.ajax({
    url: './giohang/getcart',
    type: 'GET',
    success: function (value) {
              // body...
              var arr = JSON.parse(value);
         
              InsertProductCart(arr);
          }
      })

}
function InsertProductCart(arr){
  var html = "";
  var nf = Intl.NumberFormat();
  var TongTien = 0;
  var soluong = 0;
  if (arr.length > 0) {
    for (var i = 0; i < arr.length; i++) {
      html+="<tr>";
      html+='<td class="id-product"> '+ arr[i]["ID"] +" </td>";
      html+='<td class="img-product-cart"> <img src="./public/upload/images/'+ arr[i]["AnhChinh"] +'" class="w-100 h-100"> </td>';
      html+="<td> "+ arr[i]["TenSp"]+" ( "+ arr[i]["LoaiSize"] +") </td>";
      html+="<td> "+ arr[i]["DonViTinh"] +" </td>";
      html+="<td> ";
      html+=    '<div class="form-group">';
      html+=         '<input type="number" min="1" value="'+arr[i]["SoLuongMua"]+'" onchange="changeSoLuongMua(this)" class="form-control so-luong-mua" >'
      html+=    '</div>';
      html+="</td>";
      html+="<td> "+  nf.format(arr[i]["GiaBan"]) +" VND </td>";
      html+='<td> '+ nf.format(arr[i]["TongTien"]) +" VND </td>";
      html+='<td> <span class="fa fa-times-circle" onclick="deleteProductCart('+i+')"></span> </td>';
      html+="</tr>";
      TongTien+=arr[i]["TongTien"];
      soluong+=Number( arr[i]["SoLuongMua"] );
    }
  }
  else{
    html+="<tr>";
    html+=  '<td colspan="8"> Chưa có sản phẩm </td>';
    html+="</tr>";
  }
  $(".content_cart").children('tr').remove();
  $(".content_cart").append(html);
  $(".tong-tien").html(nf.format(TongTien));
  $(".so-luong-hang").html(soluong);
}


function deleteProductCart(id) {
  $.ajax({
    url: './giohang/delete_product_cart/'+id,
    type: 'GET',
    success: function (value) {
            // body...
            var arr = JSON.parse(value);
            Swal.fire({
        icon: arr["trangthai"],
        title: arr["title"],
        showLoaderOnConfirm: true,
        preConfirm: () => {
            LoadCart();
        }
      })
        }
    })
}

function changeSoLuongMua(val) {
  // body...
  var id ;
  var arr = val.parentNode.parentNode.parentNode.getElementsByTagName('td');
  for (var i = 0; i < arr.length; i++) {
    if (arr[i].getAttribute("class") == "id-product") {
      id = Number(arr[i].innerHTML);
    }
  }
  var soluong = val.value;
  var arr_cart ;
  $.ajax({
    url: './giohang/edit_so_luong_mua/'+id+'/'+soluong,
    type: 'GET',
    success: function (value) {
      var arr= JSON.parse(value);
        if (Array.isArray(arr) == false) {
          Swal.fire({
            icon: arr["trangthai"],
            title: arr["title"],
            text: arr["text"],
            showLoaderOnConfirm: true,
            preConfirm: () => {
                LoadCart();
            }
          })
        }else {
          LoadCart();
        }
      }
    });
}