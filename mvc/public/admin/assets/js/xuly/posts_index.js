$(document).ready(function() {
  $("#check-all").click(function() {
    $(":checkbox").prop("checked", true);
  });
  $("#clear-all").click(function() {
    $(":checkbox").prop("checked", false);
  });
  $("#btn-delete").click(function() {
    if ($(":checked").length === 0 ) {
      sweetAlter("warning" , "Delete" , "Vui lòng chọn bài viết cần xóa");
      return;
    }
    var arr = [];
    var checkbox = document.getElementsByName('delete');
    for (var i = 0; i < checkbox.length; i++){
      if (checkbox[i].checked === true){
        arr.push(checkbox[i].value);
      }
    }
  
      swal({
        title: "Bạn Có Muốn Xóa Không ??",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: './admin/posts/delArrPosts',
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
                location.href="./admin/posts";
              });
            }
          })

        } 
      });
    
  });
});



  jQuery(document).ready(function($) {
   $(".btn-del-posts").on('click',function(event) {
    event.preventDefault();
    var id = $(this).parent().parent().find('.id').html();
    swal({
      title: "Bạn Có Muốn Xóa Không ??",
      text: "",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete){
       if(delete_posts(id) === "true"){
         swal({
          title: "Success",
          icon:  "success",
          text:"Xóa thành công tin tức !!!"
        }).then((value) => {
          location.href="admin/posts";
        });
      }else {
       sweetAlter( "error", "Error", "Xóa không thành công tin tức !!!");
     }

   }

 });
    /* Act on the event */
  });
 });

  function delete_posts(id) {


	// body...
	var str = "";
	$.ajax({
		url: './admin/posts/delete_posts/'+id,
		type: 'GET',
		async: false,
		success: function (value) {
			// body...
			str =  JSON.parse(value) ;
		}
	});
	return(str);
}

function ChangeNoiBat(id) {
  // body...
  $.ajax({
    url: './admin/posts/ChangeNoiBat/'+id,
    type: 'GET',
    success: function (value) {
      // body...
      location.href="./admin/posts";
    }
  });
}
function ChangeStatus(id) {
  // body...
  $.ajax({
    url: './admin/posts/ChangeStatus/'+id,
    type: 'GET',
    success: function (value) {
      // body...
      location.href="./admin/posts";
    }
  });
}