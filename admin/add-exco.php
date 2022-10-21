<?php
    include('../core/validate/exco.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $getAllExco = $admin->getAllExcos();

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
	<title>Manage Excos</title>
	
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
						<h4 class="page-title">Manage Excos</h4>
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
								<a href="profile.php">Manage Excos</a>
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
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Add Excos</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="username">Full Name</label>
                                                        <input name="fullname" type="text" class="form-control" placeholder="Username">
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label for="username">Post</label>
                                                        <select name="post" class="form-control">
                                                            <option selected="" disabled="">Select Post</option>
                                                            <option value="President">President</option>
                                                            <option value="Vice President">Vice President</option>
                                                            <option value="General Secretary">General Secretary</option>
                                                            <option value="Financial Secretary">Financial Secretary</option>
                                                            <option value="Treasurer">Treasurer</option>
                                                            <option value="Software Director 1">Software Director 1</option>
                                                            <option value="Welfare Director 1">Welfare Director 1</option>
                                                            <option value="Social Director 1">Social Director 1</option>
                                                            <option value="Sport Director 1">Sport Director 1</option>
                                                            <option value="PRO 1">PRO 1</option>
                                                            <option value="Auditor">Auditor</option>
                                                            <option value="NARC">NARC</option>
                                                            <option value="Software Director 2">Software Director 2</option>
                                                            <option value="Welfare Director 2">Welfare Director 2</option>
                                                            <option value="Social Director 2">Social Director 2</option>
                                                            <option value="Sport Director 2">Sport Director 2</option>
                                                            <option value="PRO 2">PRO 2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="form-group">
                                                        <label>Select Picture</label>
                                                        <div class="input-group">                              
                                                            <input type="file" name="exco_image" accept=".jpg, .png, .jpeg" class="form-control" id="image_id" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-right mt-3 mb-3">
                                                <input type="submit" name="btn_save_exco" class="btn btn-success" value="Save">
                                                <a href="dashboard" class="btn btn-danger">Back</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
					    </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-with-nav">
                                    <div class="card-header">
                                        <div class="row row-nav-line">
                                            <ul class="nav nav-tabs nav-line nav-color-primary w-100 pl-3" role="tablist">
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="" role="tab" aria-selected="true">List of Exco(s)</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                       <!-- table striped -->
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="display table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>PICTURE</th>
                                                        <th>FULLNAME</th>
                                                        <th>POST</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php $i =1; foreach ($getAllExco as $exco){ ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $i++;?></td>
                                                        <td>             
                                                            <img class="img-profile rounded-circle" src="../exco_img/<?php echo $exco->picture; ?>" width="40px" height="40px">
                                                        </td>
                                                        <td class="text-bold-500"><?php echo $exco->fullname; ?></td>
                                                        <td class="text-bold-500"><?php echo $exco->post; ?></td>
                                                        <td>
                                                            <form method="POST">
                                                                <input type="hidden" name="exco_id" value="<?php echo $exco->id; ?>">
                                                                <input type="submit" onclick="return confirm('Delete this record?');" class="mt-2 btn btn-sm btn-danger" value="Delete" name="btn_delete_exco">
                                                            </form>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>  
                                                </tbody>

                                            </table>
                                        </div>
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