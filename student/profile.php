<?php
    include('../core/validate/profile.php');

    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getSession = $stu->getStudentData($_SESSION['matricno']);
    $checkDue = $stu->checkStudentDue($getStudent->email);

    if(isset($_SESSION['matricno']) AND !empty($_SESSION['matricno']))
    {
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
	<title><?php echo $getStudent->fullname; ?> Profile </title>
	
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
						<h4 class="page-title">Profile</h4>
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
                                            <ul class="nav nav-tabs nav-line nav-color-black w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Edit Profile</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="username">Matric/Form No</label>
                                                        <input value="<?php echo $getStudent->matricno; ?>" name="matricno" type="text" class="form-control" placeholder="Matric/Form No" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Full Name</label>
                                                        <input  value="<?php echo $getStudent->fullname; ?>" type="text" class="form-control" placeholder="Full Name" name="fullname" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select name="gender" class="form-control">
                                                            <option <?php if($getStudent->gender == "Male") echo "selected"; ?> value="Male">Male</option>
                                                            <option <?php if($getStudent->gender == "Female") echo "selected"; ?> value="Female">Female</option>
                                                        <select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="username">Program</label>
                                                        <select name="program" class="form-control">
                                                            <option <?php if($getStudent->program == "FT") echo "selected"; ?> value="FT">FT</option>
                                                            <option <?php if($getStudent->program == "DPP") echo "selected"; ?> value="DPP">DPP</option>
                                                            <option <?php if($getStudent->program == "PT") echo "selected"; ?> value="PT">PT</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="username">Level</label>
                                                        <select name="level" class="form-control">
                                                            <option value="<?php #echo $getStudent->level; ?>"><?php #echo $getStudent->level; ?></option>
                                                            <option value="ND I">ND I</option>
                                                            <option value="ND II">ND II</option>
                                                            <option value="ND III">ND III</option>
                                                            <option value="HND I">HND I</option>
                                                            <option value="HND II">HND II</option>
                                                        </select>
                                                    </div>
                                                </div> -->
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label>Level</label>
                                                        <input  value="<?php echo $getStudent->level; ?>" type="email" class="form-control" placeholder="Email Address"  name="level" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input  value="<?php echo $getStudent->email; ?>" type="email" class="form-control" placeholder="Email Address"  name="email" readonly="">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input  value="<?php echo $getStudent->phone; ?>" type="text" class="form-control" placeholder="Phone No" name="phone">
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="text-right mt-3 mb-3">
                                            <input type="submit" name="btn_update_user_profile" class="btn btn-success" value="Update Account">
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
                                                <img class="img-profile rounded-circle" src="../student_img/<?php echo $getStudent->picture; ?>" width="150px" height="150px">
                                            </div>
                                            <div class="form-group">
                                                <label>Select Passport</label>
                                                <div class="input-group">                              
                                                    <input type="file" name="stu_image" accept=".jpg, .png, .jpeg" class="form-control" id="image_id">
                                                </div>
                                            </div>
                                            <!-- onchange="this.form.submit();" -->
                                            <div class="text-right mt-3 mb-3">
                                                <input type="submit" name="btn_update_user_picture" class="btn btn-success" value="Upload Passport">
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