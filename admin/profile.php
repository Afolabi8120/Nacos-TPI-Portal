<?php
    include('../core/validate/profile.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);

    if(isset($_SESSION['username'])){
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
	<title><?php echo $getAdmin->matricno; ?>'s Profile </title>
	<?php require_once('./includes/js.php') ?>
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
</head>
<body>
	<div class="wrapper">
		<?php require_once('./includes/header.php') ?>

		<?php require_once('./includes/sidebar.php') ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Profile</h4>
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
								<a href="profile">Profile</a>
							</li>
						</ul>
					</div>
					<div class="page-category">
                        <?php
                            echo ErrorMessage();
                            echo SuccessMessage();
                        ?>
						<div class="row">
                            <div class="col-md-8">
                                <div class="card card-with-nav">
                                    <div class="card-header">
                                        <div class="row row-nav-line">
                                            <ul class="nav nav-tabs nav-line nav-color-dark w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Edit Profile</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="username">Username</label>
                                                        <input name="user_id" type="hidden" class="form-control" readonly="" value="<?php echo $getAdmin->id; ?>">
                                                        <input name="username" type="text" class="form-control" readonly="" placeholder="Username" value="<?php echo $getAdmin->matricno; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input type="text" class="form-control" placeholder="Full Name" name="fullname" value="<?php echo $getAdmin->fullname; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" placeholder="Email Address" readonly="" name="email" value="<?php echo $getAdmin->email; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="username">Gender</label>
                                                        <select name="gender" class="form-control">
                                                            <?php if($getAdmin->gender == 'Male'): ?>
                                                            <option value="<?php echo $getAdmin->gender; ?>"><?php echo $getAdmin->gender; ?></option>
                                                            <option value="Female">Female</option>
                                                            <?php elseif($getAdmin->gender == 'Female'): ?>
                                                            <option value="<?php echo $getAdmin->gender; ?>"><?php echo $getAdmin->gender; ?></option>
                                                            <option value="Male">Male</option>
                                                        <?php endif; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="text-right mt-3 mb-3">
                                            <input type="submit" name="btn_update" onchange="this.form.submit();" class="btn btn-success" value="Update Account">
                                            <a href="dashboard.php" type="submit" class="btn btn-danger" hr>Back</a>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card card-with-nav">
                                    <div class="card-header">
                                        <div class="row row-nav-line">
                                            <ul class="nav nav-tabs nav-line nav-color-black w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Change Passport</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group">     
                                                <img class="img-profile rounded-circle" src="./admin_img/<?php echo $getAdmin->picture; ?>" width="150px" height="150px">
                                            </div>
                                            <div class="form-group">
                                                <label>Select Passport</label>
                                                <div class="input-group">                              
                                                    <input type="file" name="admin_img" accept=".jpg, .png, .jpeg" class="form-control" id="image_id">
                                                </div>
                                            </div>
                                            <!-- onchange="this.form.submit();" -->
                                            <div class="text-right mt-3 mb-3">
                                                <input type="submit" name="btn_update_admin_picture" class="btn btn-success" value="Upload Passport">
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