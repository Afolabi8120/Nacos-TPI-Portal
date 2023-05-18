<?php
    include('../core/validate/all_user.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $getAllStudent = $admin->getAllStudent();

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
	<title>Pending Payment</title>
	
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
						<h4 class="page-title">Pending Payment</h4>
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
								<a href="pending-payment">Pending Payment</a>
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
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">All Pending Payment Record</a> </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- table striped -->
                                        <div class="table-responsive">
                                            <table id="basic-datatables" class="display table table-hover mb-0 data-table-export">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Picture</th>
                                                        <th>MATRIC NO</th>
                                                        <th>FULLNAME</th>
                                                        <th>LEVEL</th>
                                                        <th>PROGRAM</th>     
                                                        <th>EMAIL</th>
                                                        <th>DATE PAID</th>
                                                        <th>STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    <?php $i=1; foreach ($admin->fetchPendingPayment() as $fetchpayment) { ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $i++;?></td>
                                                        <td>             
                                                            <img class="img-profile rounded-circle" src="../student_img/<?php echo $fetchpayment->picture; ?>" width="40px" height="40px">
                                                        </td>
                                                        <td><?php echo $fetchpayment->matricno; ?></td>
                                                        <td class="text-bold-500"><?php echo $fetchpayment->fullname; ?></td>
                                                        <td class="text-bold-500"><?php echo $fetchpayment->level; ?></td>
                                                        <td class="text-bold-500"><?php echo $fetchpayment->program; ?></td>
                                                        <td><?php echo $fetchpayment->email; ?>
                                                        </td>
                                                        <td><?php echo $fetchpayment->date_paid; ?>
                                                        </td>
                                                        <?php if($fetchpayment->payment_status == '0'): ?>
                                                        <td><span class="badge bg-warning">Pending</span>
                                                        </td>
                                                        <?php endif; ?>
                                                        <td>
                                                            <?php if($fetchpayment->payment_status == '0'): ?>
                                                            <form action="" method="POST">
                                                                <input type="hidden" name="stu_id" value="<?php echo $fetchpayment->id; ?>" readonly>
                                                                <input type="submit" onclick="return confirm('Delete this student payment details?');" class="mt-2 btn btn-sm btn-danger" value="Delete" name="btn-delete-student-payment">
                                                            </form>
                                                            <?php endif; ?>
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