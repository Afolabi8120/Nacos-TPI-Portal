<?php
    include('../core/validate/all_user.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $getAllStudent = $admin->getAllStudent();

    if(isset($_SESSION['username']))
    {
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: ../index');
        }
    }else{
        header('location: ../index');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>All Student</title>
	
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
						<h4 class="page-title">All Registered Student</h4>
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
								<a href="all_user">All Registered Student</a>
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
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">All Registered Student(s)</a> </li>
                                            </ul>
                                            <ul class="nav nav-tabs nav-line nav-color-dark w-100 pl-3" role="tab" aria-selected="true">
                                                <a href="export" onclick="return confirm('Download All Student List?');" class="mt-2 mb-2 btn btn-md btn-success">Download List</a>
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
                                                        <th>Picture</th>
                                                        <th>MATRIC NO</th>
                                                        <th>FULLNAME</th>
                                                        <th>LEVEL</th>
                                                        <th>PROGRAM</th>
                                                        <th>EMAIL</th>
                                                        <th>NACOS ID</th>    
                                                        <th>GENDER</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php $i=1; foreach ($getAllStudent as $student) { ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $i++;?></td>
                                                        <td>             
                                                            <img class="img-profile rounded-circle" src="../student_img/<?php echo $student->picture; ?>" width="40px" height="40px">
                                                        </td>
                                                        <td><?php echo $student->matricno; ?></td>
                                                        <td class="text-bold-500"><?php echo $student->fullname; ?></td>
                                                        <td class="text-bold-500"><?php echo $student->level; ?></td>
                                                        <td class="text-bold-500"><?php echo $student->program; ?></td>
                                                        <td class="text-bold-500"><?php echo $student->email; ?></td>
                                                        <td class="text-bold-500"><?php echo $student->nacos_id; ?></td>
                                                        <td><?php echo $student->gender; ?></td>
                                                        <!-- Not Active Starts Here -->
                                                        <?php if($student->status == 'In-Active'): ?>
                                                        <td><span class="badge bg-danger"><?php echo $student->status; ?></span>
                                                        </td>
                                                        <td>
                                                            <form action="all_user.php" method="POST">
                                                                <input type="hidden" name="user_id" value="<?php echo $student->matricno; ?>">
                                                                <a href="edit_student?stuid=<?php echo $student->id; ?>" class="btn btn-sm btn-primary" target="_blank">Edit</a>
                                                                <input type="submit" onclick="return confirm('Enable this account?');" class="mt-2 btn btn-sm btn-success" value="Enable" name="btn_enable">
                                                                <input type="submit" onclick="return confirm('Delete this account?');" class="mt-2 btn btn-sm btn-danger" value="Delete" name="btn_delete">
                                                            </form>
                                                        </td>
                                                        <!-- Not Active Ends Here -->

                                                        <!-- Active Starts Here -->
                                                        <?php elseif($student->status == 'Active'): ?>
                                                        <td><span class="badge bg-success"><?php echo $student->status; ?></span>
                                                        </td>
                                                        <td>
                                                            <form action="all_user.php" method="POST">
                                                                <input type="hidden" name="user_id" value="<?php echo $student->matricno; ?>">
                                                                <a href="edit_student?stuid=<?php echo $student->id; ?>" class="btn btn-sm btn-primary" target="_blank">Edit</a>
                                                                <input type="submit" onclick="return confirm('Disable this account?');" class="mt-2 btn btn-sm btn-warning" value="Disable" name="btn_disable">
                                                                <input type="submit" onclick="return confirm('Delete this account?');" class="mt-2 btn btn-sm btn-danger" value="Delete" name="btn_delete">
                                                            </form>
                                                        </td>
                                                        <?php endif; ?>
                                                        <!-- Active Ends Here -->
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