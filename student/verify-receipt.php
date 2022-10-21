<?php
    include('../assets/phpqrcode/qrlib.php');
    include('../core/init.php');

        if(isset($_GET['ref_no']) AND !empty($_GET['ref_no'])){

            $refno = htmlentities($_GET['ref_no']);

            #var_dump($admin->get('tblpayment','receipt_no',$refno));exit();

            if($admin->get('tblpayment','receipt_no',$refno)){
                $getEmail = $admin->get('tblpayment','receipt_no',$refno); // get the student email based on the receipt no
                #echo var_dump($getEmail->email);exit();

                if($admin->select('tblpayment','receipt_no',$refno,$getEmail->email) === true){
                    if($getStudentReceiptInfo = $admin->fetchStudentPaymentReceipt($refno)){
                        $text = "http://localhost/nacostpi/student/verify-receipt?ref_no=".$getStudentReceiptInfo->receipt_no;
                    }else{
                        header('location: ../auth/login');
                    }
                }else{
                    header('location: ../auth/login');
                }
            }else{
                header('location: ../auth/login');
            } 
        }else{
            header('location: ../auth/login');
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Verify Receipt</title>
	
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
    <style type="text/css">
        @media print {
            .btn-print {
                display:none !important;
            }
        }
    </style>
</style>
</head>
<body>
	<div class="container">

        <div class="page-inner">	
			<div class="page-category">
				<div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card py-5">
                            <div class="card-title mb-2">
                                <center>
                                    <img src="../assets/img/poly.png" height="80px" width="80px" class="rounded-circle mb-4 mt-1">
                                    <img src="../assets/img/icon.png" height="80px" width="80px" class="rounded-circle mb-4 mt-1">
                                </center>
                                <h1 class="text-center h1 weight-900 b text-dark">Department of Computer Science</h1>
                                <h2 class="text-center h2 weight-900 b text-dark">NACOS, The Polytechnic Ibadan.</h2>
                                <h6 class="text-center h6 text-dark">&nbsp; <i class="fas fa-globe"></i> https://nacostpi.com </h6>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 ml-auto mr-auto">
                                    <div class="row table-responsive">
                                        <table class="table table-bordered mt-4">
                                            <thead class="bg-dark text-white">
                                                <tr>
                                                    <th scope="col" colspan="4" style="line-height: 2em;" class="text-center h2">Student Information <br>
                                                    Receipt No: <?php echo $getStudentReceiptInfo->receipt_no; ?></th>
                                                </tr>
                                            </thead>
                                            <tbody class="fw-bold">
                                                <tr>
                                                    <td>Full Name</td>
                                                    <td colspan="2" class="fw-bold"><?php echo $getStudentReceiptInfo->fullname; ?></td>
                                                    <td rowspan="7">
                                                        <center><img class="img-profile m-2" src="../student_img/<?php echo $getStudentReceiptInfo->picture; ?>" width="150px" height="150px"></center>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Matric/Form No</td>
                                                    <td colspan="2" class="fw-bold"><?php echo $getStudentReceiptInfo->matricno; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nacos ID</td>
                                                    <td colspan="2" class="fw-bold">
                                                        <?php echo $getStudentReceiptInfo->nacos_id; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Level/Program</td>
                                                    <td colspan="2" class="fw-bold"><?php echo $getStudentReceiptInfo->level . ' (' . $getStudentReceiptInfo->program . ') '; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Session</td>
                                                    <td colspan="2" class="fw-bold">2022/2023</td>
                                                </tr>
                                                <tr>
                                                    <td>Date Paid</td>
                                                    <td colspan="2" class="fw-bold"><?php echo $getStudentReceiptInfo->date_paid; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Payment Status</td>
                                                    <td colspan="2" class="fw-bold">
                                                        <?php if($getStudentReceiptInfo->payment_status == 1): ?>
                                                            <span class="badge bg-success">Paid</span>
                                                        <?php endif; ?>

                                                        <?php if(!$getStudentReceiptInfo->payment_status == 1): ?>
                                                            <span class="badge bg-danger">Not Paid</span>
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

	</div>
  
</body>
</html>