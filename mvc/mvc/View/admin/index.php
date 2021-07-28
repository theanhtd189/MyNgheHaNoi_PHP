
<!DOCTYPE html>
<html lang="en">
<head>
  <base href="<?php echo base_url(); ?>/" target="_parent">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Thủ Công Mỹ Nghệ Việt</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./public/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./public/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="./public/admin/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="./public/admin/assets/vendors/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="./public/admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="./public/admin/assets/css/style.css">
  <?php if (isset($data["css"])): ?>
    <link rel="stylesheet" href="./public/admin/assets/css/<?=$data["css"]?>.css">
  <?php endif ?>
  <!-- End layout styles -->
  <link rel="shortcut icon" href="./public/upload/images/icon.png" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    function sweetAlter(trangthai , str_title , str_text) {
     swal({
       title: str_title,
       icon: trangthai,
       text: str_text
     });
   }
   function sweetAlterTrangThai(trangthai , str_title , str_text , href) {
     swal({
       title: str_title,
       icon: trangthai,
       text: str_text
     }).then((value) => {
        location.href=href;
      });

   }
 </script>
 <style>
   i, label {
     cursor: pointer;
   }
 </style>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php require_once "layout/_navbar.php" ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php require_once "layout/_sidebar.php" ?>
      <!-- partial -->
      <div class="main-panel">
        <?php require_once "layout/page/".$data["pages"].".php" ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php require_once "layout/_footer.php" ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./public/admin/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="./public/admin/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="./public/admin/assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="./public/admin/assets/js/off-canvas.js"></script>
  <script src="./public/admin/assets/js/hoverable-collapse.js"></script>
  <script src="./public/admin/assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <!-- End custom js for this page -->

  <script src="./public/plugins/ckeditor/ckeditor.js "></script>
  <?php if (isset($data["js"])): ?>
    <script src="./public/admin/assets/js/xuly/<?= $data["js"] ?>.js"></script>
  <?php endif ?>
</body>
</html>
