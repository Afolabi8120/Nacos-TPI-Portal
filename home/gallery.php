<?php
    include('../core/init.php');

    $getAllExco = $admin->getAllExcos(); // fetch all excos from the Admin class
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>NACOS TPI | Gallery</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- animation css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- aos -->
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <!-- venobox popup -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
  

<!-- header -->
<header class="fixed-top header">
    <?php include('includes/header.php'); ?>
</header>
<!-- /header -->

<!-- page title -->
<section class="page-title-section overlay" data-background="images/banner/banner-11.jpg">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <ul class="list-inline custom-breadcrumb">
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="">Gallery</a></li>
          <li class="list-inline-item text-white h3 font-secondary "></li>
        </ul>
        <p class="text-lighten"></p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- gallery -->
<section class="section">
  <div class="container">
    <!-- gallery list -->
    <div class="row justify-content-center">
      <?php foreach ($getAllExco as $exco){ ?>
      <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top show-img rounded-0  mb-3" src="../exco_img/<?php echo $exco->picture; ?>" alt="exco" height="250px" width="150px">
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<!-- /gallery -->

<!-- footer -->
    <?php include('includes/footer.php'); ?>
<!-- /footer -->
    <script type="text/javascript">
      // $().ready(function(){
      //   //alert("Hello Temidayo");
      //   $('.show-img').hover(function(){
      //     alert("Hello Temidayo");
          
      //   });
      // });
    </script>

</body>
</html>