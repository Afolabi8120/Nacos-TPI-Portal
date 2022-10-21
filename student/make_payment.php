<?php
    include('../core/init.php');

    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getSession = $stu->getStudentData($_SESSION['matricno']);
    $checkDue = $stu->checkStudentDue($getStudent->email);
    $isPaid = $admin->isPaid($getStudent->email); #if student has paid

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
	<title>Make Payment</title>
	
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
		<?php require_once('../includes/header.php'); ?>

		<?php require_once('../includes/sidebar.php'); ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Payment</h4>
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
								<a href="make_payment">Make Payment</a>
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

                                    </div>
                                    <div class="card-body">
                                       <!-- table striped -->
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>FEE DESCRIPTION</th>
                                                        <th>AMOUNT</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-bold-500">1</td>
                                                        <td>2022/2023 NACOS DUE</td>
                                                        <td class="text-bold-500">1000</td>
                                                        <input type="hidden" class="duemoney" value="1085" class="amount" name="">
                                                        <input type="hidden" value="<?php echo $getStudent->email; ?>" class="usermail" name="">
                                                        <td>
                                                            <?php if($isPaid === true): ?>
                                                                <span class="badge bg-success">Paid</span>
                                                            <?php endif; ?>

                                                            <?php if(!$isPaid): ?>
                                                                <a href="#" type="button" data-type="dues" class="btn btn-sm btn-black paydues" onclick="payWithPaystack(1000, 'paydues', '<?php echo $getStudent->email; ?>')">
                                                                    Pay
                                                                </a>                             
                                                            <?php endif; ?>
                                                        </td>
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

            <?php include_once('../includes/footer.php'); ?>
            <?php include_once('../includes/js.php'); ?>
		</div>
		
	</div>

</body>
</html>