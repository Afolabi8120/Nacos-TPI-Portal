<?php
    include('../core/init.php');

    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getSession = $stu->getStudentData($_SESSION['matricno']);
    $checkDue = $stu->checkStudentDue($getStudent->email);
    $isPaid = $stu->checkPaid($getStudent->email); # check if student has made payment using row count
    #$isPaid = $admin->checkIfPaid($getStudent->email); #if student has paid
    $getStudentPayment = $admin->fetchStudentPaymentRecord($getStudent->email);

    #echo var_dump($checkDue);exit();

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
	<title>Print Receipt</title>
	
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
    <?php require_once('../includes/css.php'); ?>
</head>
<body>
	<div class="wrapper">
		<?php require_once('../includes/header.php') ?>

		<?php require_once('../includes/sidebar.php') ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Receipt</h4>
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
								<a href="receipt">Print Receipt</a>
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
                                                        <th>Payment For</th>
                                                        <th>PAYMENT STATUS</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if($isPaid === true): ?>
                                                    <tr>
                                                        <td>2022/2023 NACOS DUE</td>
                                                        <td>
                                                            <span class="badge bg-success">Paid</span>
                                                        </td>
                                                        <td>
                                                            <a href="print-receipt?ref_no=<?php echo $getStudentPayment->receipt_no; ?>" target="_blank" class="btn btn-black btn-sm">Print Receipt</a>   
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
                                                    <?php if(!$isPaid): ?>
                                                    <tr>
                                                        <td class="text-bold-500">1</td>
                                                        <td>2022/2023 NACOS Due</td>
                                                        <td>
                                                            <span class="badge bg-danger">Not Paid</span>
                                                        </td>
                                                        <td>
                                                            <a href="make_payment" class="btn btn-black btn-sm">Pay</a>   
                                                        </td>
                                                    </tr>
                                                    <?php endif; ?>
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