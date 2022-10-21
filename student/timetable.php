<?php
    include('../core/init.php');

    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $gettimetable = $admin->getTimeTableByStatus();
    $getSession = $stu->getStudentData($_SESSION['matricno']);
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
	<title>Time Table</title>
	
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
						<h4 class="page-title">Time Table</h4>
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
								<a href="timetable">Download Time Table</a>
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
                                    </div>
                                    <div class="card-body">
                                        <form action="#" method="POST">
                                            <div class="row">
                                                
                                                <?php if(!$gettimetable) { ?>
                                                <div class="col-sm-12">
                                                    <div class="text-center">
                                                        <h5 class="h5 fw-bold"><i class="fas fa-sad-cry fa-2x"></i> Not Available, Please Check Back Later.</h5>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                
                                                <?php foreach ($gettimetable as $timetable){ ?>
                                                <div class="col-sm-3">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <span class="text-center small fw-bold mt-4"><?php echo $timetable->title; ?></span>
                                                        </div>
                                                        <div class="card-body text-center">
                                                            <img src="../admin/admin_img/book-cover2.png" alt="Book Cover" height="150px" width="100px" class="card-img-top">
                                                        </div>
                                                        <div class="card-footer">
                                                            <a href="../admin/timetable/<?php echo $timetable->name; ?>" download="<?php echo $timetable->title; ?>" class="form-control btn btn-lg btn-success">Download</a>
                                                        </div> 
                                                    </div>  
                                                </div>
                                                <?php } ?>
                                                
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