<?php
    include('../core/init.php');

    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getSession = $stu->getStudentData($_SESSION['matricno']);
    $getresult = $admin->getResultWhere($getStudent->level);
    $checkDue = $stu->checkStudentDue($getStudent->email);

    if(isset($_SESSION['matricno']) AND !empty($_SESSION['matricno'])){
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: ../auth/login');
        }
    }else{
        header('location: ../auth/login');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Print Result</title>
	
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.png" type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
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
    <?php require_once('../includes/css.php') ?>
</head>
<body>
	<div class="wrapper">
		<?php require_once('../includes/header.php') ?>

		<?php require_once('../includes/sidebar.php') ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Check Result</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="dashboard">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="result">Check Result</a>
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
                                    <div class="card-header mt-3">
                                        <h6>Check/Download Result</h6>
                                    </div>
                                    <div class="card-body">
                                        <form action="#" method="POST">

                                            <div class="row">
                                                <?php if(!$getresult): ?>
                                                    <div class="col-sm-12">
                                                        <div class="text-center">
                                                            <h5 class="h5 fw-bold"><i class="fas fa-sad-cry fa-2x"></i> Not Available, Please Check Back Later.</h5>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if($getresult): ?>
                                                    <?php foreach($getresult as $result){ ?>
                                                        <div class="col-sm-3">
                                                            <div class="card">
                                                                <div class="card-header mt-3 text-dark">
                                                                    <h5 class="text-center fw-bold"><?php echo $result->course_code; ?></h5>
                                                                </div>
                                                                <div class="card-body">
                                                                    <img src="../admin/admin_img/book-cover2.png" alt="Book Cover" height="150px" width="100px" class="card-img-top">
                                                                    <div class="text-center mt-3">
                                                                        <span class="strong small"><?php echo $result->session; ?></span><br>
                                                                        <span><?php echo $result->title; ?></span>
                                                                    </div>
                                                                </div>
                                                                <div class="card-footer">
                                                                    <a href="../admin/student_result/<?php echo $result->file; ?>" download class="form-control btn btn-lg btn-success">Download</a>
                                                                </div> 
                                                            </div>  
                                                        </div>
                                                    <?php } ?>
                                                <?php endif; ?>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
					    </div>
					</div>
				</div>
			</div>

            <?php include_once('../includes/footer.php'); ?>
            <?php include_once('../includes/js.php'); ?>
		</div>
		
	</div>
  
</body>
</html>