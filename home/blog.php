<?php
    include('../core/init.php');

    $getPost = $admin->getAllPost();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>NACOS TPI | Blog</title>

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
          <li class="list-inline-item"><a class="h2 text-primary font-secondary" href="">Our Blog</a></li>
          <li class="list-inline-item text-white h3 font-secondary"></li>
        </ul>
        <p class="text-lighten">Here you get some of the latest news update at the department, tech stories and tech update.</p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- blogs -->
<section class="section">
  <div class="container">
    <div class="row">
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
<!-- /blogs -->

<!-- footer -->
  <?php include('includes/footer.php'); ?>
<!-- /footer -->

</body>
</html>