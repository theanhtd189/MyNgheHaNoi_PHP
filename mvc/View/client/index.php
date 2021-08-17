<!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo base_url(); ?>/" target="_parent">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./public/client/data/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./public/client/css/style-header-footer.css">
  <link rel="shortcut icon" href=".\public\upload\images\icon.png" type="image/x-icon">
  <link rel="stylesheet" href="./public/client/css/font.css">
  <link rel="stylesheet" type="text/css" href="./public/client/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./public/client/font-awesome/css/fontawesome-all.css">
  <link rel="stylesheet" type="text/css" href="./public/client/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./public/client/slick/slick-theme.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title>Thủ Công Mỹ Nghệ Việt </title>
  <?php if (isset($data["css"])): ?>
    <link rel="stylesheet" href="./public/client/css/<?=$data["css"]?>.css">
  <?php endif ?>
</head>

<body>
  <?php echo isset($_GET['url'])?$_GET['url']:"chả có gì"; ?>
  <section class="main">
    <?php include_once 'layout/header.php'; ?>

    <?php require_once "layout/page/".$data["pages"].".php" ?>


    <!-- ------------------FOOter--------------------------------- -->
    <!-- Footer -->
    <?php require_once "layout/footer.php" ?>
    

    <!-- ./Footer -->
  </section>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
  crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
  crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="./public/client/jquery-3.3.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./public/client/slick/slick.js" type="text/javascript" charset="utf-8"></script>


  <?php if (isset($data["js"])): ?>
    <script src="./public/client/Javascript/<?= $data["js"] ?>.js"></script>
  <?php endif ?>

  <script type="text/javascript">
    $(document).ready(function() {

      $("[href]").each(function(){
        if(this.href==window.location.href)
        $(this).addClass("active");
      })

      $(".banner-slider").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        fade: !0,
        cssEase: 'linear',
        autoplay:true
      });

      $(".regular").slick({
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        cssEase: 'linear',
        autoplay:true,
        speed:500,
        responsive: [
        {
          breakpoint: 1199,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 575,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }

                ]
              });
    });

  </script>
  <script src="./public/client/Javascript/style.js" type="text/javascript" charset="utf-8" async defer></script>
</body>

</html>