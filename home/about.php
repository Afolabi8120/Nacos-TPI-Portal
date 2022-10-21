<?php
    include('../core/init.php');

    $getAllExco = $admin->getAllExcos();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>NACOS TPI | About</title>

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
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="">About Us</a></li>
          <li class="list-inline-item text-white h3 font-secondary @@nasted"></li>
        </ul>
        <p class="text-lighten"></p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- about -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <img class="img-fluid w-100 mb-4" src="images/banner/banner-11.jpg" style="height: 400px;" alt="about image">
        <h2 class="section-title">ABOUT OUR DEPARTMENT</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.dolore magna aliqua. Ut enim ad minim veniam, quis nostrud. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe ipsa illo quod veritatis, magni debitis fugiat dolore voluptates! Consequatur, aliquid. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat perferendis sint optio similique. Et amet magni facilis vero corporis quos.</p>
        <p>exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsum a, facere fugit error accusamus est officiis vero in, nostrum laboriosam corrupti explicabo, cumque repudiandae deleniti perspiciatis quae consectetur enim. Laboriosam!</p>
      </div>

      <div class="col-12">
        <img class="img-fluid w-100 mb-4" src="images/banner/banner-11.jpg" style="height: 400px;" alt="about image">
        <h2 class="section-title">ABOUT NACOS</h2>
        <h4>Welcome to NACOS TPI</h4>
        <p>
          Nigeria Association of Computing Students (NACOS) was founded by groups of students in July 1993 as Nigeria Association of Computer Science (NACOSS) with the backing of Nigerian Computer Society (NCS) as its parent body. It provides avenues for students (in any IT related field) to highlight and champion issues of interest in a coordinated and organized manner.
        </p>
        <p>
          NACOS members (NACOSites) are students studying in tertiary institutions in computer related disciplines including: Computer Science, Computer Engineering, Information Technology, etc.
        </p>
      </div>
    </div>
  </div>
</section>
<!-- /about -->

<!-- excos -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="section-title">Our Excos</h2>
      </div>
      <?php foreach ($getAllExco as $exco){ ?>
      <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="../exco_img/<?php echo $exco->picture; ?>" alt="exco" height="300px" width="300px">
          <div class="card-body">
            <h4 class="card-title text-center"><?php echo $exco->fullname; ?></h4>
            <p class="text-center"><?php echo $exco->post; ?></p>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
  <!-- /teachers -->

<!-- footer -->
  <?php include('includes/footer.php'); ?>
<!-- /footer -->

</body>
</html>