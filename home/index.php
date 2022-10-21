<?php
    include('../core/init.php');

    $getPost = $admin->fetchPostDesc();
    $getAllExco = $admin->getAllExcos();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>NACOS TPI | Homepage</title>

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

<!-- hero slider -->
<section class="hero-section overlay bg-cover" data-background="images/banner/banner-11.jpg">
  <?php include('includes/slider.php'); ?>
</section>
<!-- /hero slider -->

<!-- about HOD -->
<section class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-4 order-1 order-md-2 mb-4 mb-md-0">
        <img class="img-fluid w-100" src="images/banner/banner-11.jpg" alt="about image">
      </div>
      <div class="col-md-8 order-2 order-md-1">
        <h2 class="section-title">About The HOD</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat </p>
        <p>cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem</p>
      </div>
    </div>
  </div>
</section>
<!-- /about HOD -->

<!-- about us -->
<section class="section">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6 order-2 order-md-1">
        <h2 class="section-title">About The Department</h2>
        <h4>Welcome To Computer Science Department The Polytechnic Ibadan</h4>
        <p>
          Nigeria Association of Computing Students (NACOS) was founded by groups of students in July 1993 as Nigeria Association of Computer Science (NACOSS) with the backing of Nigerian Computer Society (NCS) as its parent body. It provides avenues for students (in any IT related field) to highlight and champion issues of interest in a coordinated and organized manner.
        </p>
        <p>
          NACOS members (NACOSites) are students studying in tertiary institutions in computer related disciplines including: Computer Science, Computer Engineering, Information Technology, etc.
        </p>
      </div>
      <div class="col-md-6 order-1 order-md-2 mb-4 mb-md-0">
        <img class="img-fluid w-100" src="images/banner/banner-11.jpg" alt="about image">
      </div>
    </div>
  </div>
</section>
<!-- /about us -->

<!-- excos -->
<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h2 class="section-title">Our Excos</h2>
      </div>
      <!-- teacher -->
      <?php foreach ($getAllExco as $exco){ ?>
      <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
        <div class="card border-0 rounded-0 hover-shadow">
          <img class="card-img-top rounded-0" src="../exco_img/<?php echo $exco->picture; ?>" alt="exco" height="300px" width="300px">
          <div class="card-body">
            <h4 class="card-title h4 text-dark text-center" style="font-weight: bold;"><?php echo $exco->fullname; ?></h4>
            <p class="text-center"><?php echo $exco->post; ?></p>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<!-- /excos -->

<!-- blog -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">Latest News</h2>
      </div>
    </div>
    <div class="row justify-content-center">
  <!-- blog post -->
  <?php foreach ($getPost as $post){ ?>
  <article class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
      <img class="card-img-top rounded-0 p-3" height="200px" width="50px" src="../assets/img/icon.png" alt="Post thumb">
      <div class="card-body">
        <!-- post meta -->
        <ul class="list-inline mb-3">
          <!-- post date -->
          <li class="list-inline-item mr-3 ml-0 mb-2"><?php echo $post->date_added; ?></li>
          <!-- author -->
          <li class="list-inline-item mr-3 ml-0"><strong>Admin</strong></li>
        </ul>
        <a href="blog-single?q=<?php echo $post->post_id; ?>">
          <h4 class="card-title"><?php echo $post->title; ?></h4>
        </a>
        <a href="blog-single?q=<?php echo $post->post_id; ?>" class="btn btn-primary btn-sm">read more</a>
      </div>
    </div>
  </article>
  <?php } ?>
</div>
  </div>
</section>
<!-- /blog -->

<!-- footer -->
  <?php include('includes/footer.php'); ?>
<!-- /footer -->

</body>
</html>