<?php
    include('../core/validate/post.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $getMaterial = $admin->getAllCourseMaterial();

    #date('d M, Y g:i A');exit();

    if(isset($_SESSION['username']))
    {
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: ../index');
            $_SESSION['ErrorMessage'] = "You have been logged out from another device";
        }
    }else{
        header('location: ../index');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Post</title>
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="./css/css/fonts.min.css">
    <link rel="stylesheet" href="./css/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/css/atlantis.css">
    <script src="css/js/tinymce1.js"></script>
    <script src="https://cdn.tiny.cloud/1/z3j2sdimcy7m3q827craloz75jih8oa4e2vo8sewkrl3l6hf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
     <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
</head>
<body>
	<div class="wrapper">
		<?php require_once('./includes/header.php') ?>

		<?php require_once('./includes/sidebar.php') ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Add Post</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								Add Post
							</li>
						</ul>
					</div>
					<div class="page-category">
                        <?php
                            echo ErrorMessage();
                            echo SuccessMessage();
                        ?>
						<div class="row">
                            <div class="col-md-12">
                                <div class="card card-with-nav">
                                    <div class="card-header">
                                        <div class="row row-nav-line">
                                            <ul class="nav nav-tabs nav-line nav-color-dark w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Add Post</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="title">Post Title</label>
                                                        <input name="post_title" type="text" class="form-control" placeholder="Post Title">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="title">Post Body</label>
                                                        <textarea id="mytextarea" placeholder="What to post goes here..." class="form-control" cols="3" name="post_body" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right mt-3 mb-3">
                                                <input type="submit" name="btn_save_post" class="textarea_editor btn btn-success" value="Save">
                                                <a href="dashboard" class="btn btn-danger">Back</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
					    </div>
					</div>
				</div>
			</div>

            <?php include_once('./includes/footer.php'); ?>
            <?php include_once('./includes/js.php'); ?>
            
		</div>
		
	</div>
  
</body>
</html>