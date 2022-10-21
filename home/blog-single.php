<?php
    include('../core/init.php');

    if(isset($_GET['q']) AND !empty($_GET['q'])){

      $post_id = htmlentities($_GET['q']);
      
      if($admin->check('tblpost','post_id',$post_id) === true){
        $getPost = $admin->fetchPostByID($post_id);
        $admin->updatePostCount($post_id);
        $getRecommendPost = $admin->fetchPostWhereNotID($post_id);
      }else{
          header('location: index');
      } 
    }else{
        header('location: index');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title><?php echo $getPost->title; ?></title>

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
          <li class="list-inline-item text-white h3 font-secondary nasted"><?php echo $getPost->title; ?></li>
        </ul>
        <p class="text-lighten"></p>
      </div>
    </div>
  </div>
</section>
<!-- /page title -->

<!-- blog details -->
<section class="section-sm bg-gray">
  <div class="container">
    <div class="row">
      <div class="col-12 mb-4">
        <img src="images/banner/banner-11.jpg" style="height: 400px;" alt="blog-thumb" class="img-fluid w-100">
      </div>
      <div class="col-12">
        <ul class="list-inline">
          <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><span class="font-weight-bold mr-2">Post:</span>Admin</li>
          <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><?php echo $getPost->date_added; ?></li>
          <li class="list-inline-item mr-4 mb-3 mb-md-0 text-light"><i class="ti-book mr-2"></i>Read <?php echo $getPost->post_count + 1; ?></li>
        </ul>
      </div>
      <!-- border -->
      <div class="col-12 mt-4">
        <div class="border-bottom border-primary"></div>
      </div>
      <!-- blog contect -->
      <div class="col-12 mb-5 mt-3">
        <h2><?php echo $getPost->title; ?></h2>
        <p>
          <?php echo html_entity_decode($getPost->body); ?>
        </p>
      </div>
    </div>
  </div>
</section>
<!-- /blog details -->

<!-- recommended post -->
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="section-title">Recommended</h2>
      </div>
    </div>
    <div class="row justify-content-center">
  <!-- blog post -->
  <?php foreach ($getRecommendPost as $fetchRecommendpost){ ?>
  <article class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
    <div class="card rounded-0 border-bottom border-primary border-top-0 border-left-0 border-right-0 hover-shadow">
      <img class="card-img-top rounded-0 p-3" height="140px" width="80px" src="../assets/img/icon.png" alt="Post thumb">
      <div class="card-body">
        <!-- post meta -->
        <ul class="list-inline mb-3">
          <!-- post date -->
          <li class="list-inline-item mr-3 ml-0 mb-2"><?php echo $fetchRecommendpost->date_added; ?></li>
          <!-- author -->
          <li class="list-inline-item mr-3 ml-0"><strong>Admin</strong></li>
        </ul>
        <a href="blog-single.html">
          <h4 class="card-title"><?php echo $fetchRecommendpost->title; ?></h4>
        </a>
        <a href="blog-single?q=<?php echo $fetchRecommendpost->post_id; ?>" class="btn btn-primary btn-sm">read more</a>
      </div>
    </div>
  </article>
  <?php } ?>
</div>
  </div>
</section>
<!-- /recommended post -->

<!-- footer -->
<?php include('includes/footer.php'); ?>
<!-- /footer -->


</body>
</html>