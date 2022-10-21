<?php
    include('../assets/phpqrcode/qrlib.php');
    include('../core/init.php');

    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getSession = $stu->getStudentData($_SESSION['matricno']);
    $checkDue = $stu->checkStudentDue($getStudent->email);

    if(isset($_SESSION['matricno']) AND !empty($_SESSION['matricno']))
    {
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: ../index');
        }

        if(isset($_GET['ref_no']) AND !empty($_GET['ref_no'])){

            $refno = htmlentities($_GET['ref_no']);

            if($admin->select('tblpayment','receipt_no',$refno,$getStudent->email) === true){
                $getStudentReceiptInfo = $admin->fetchStudentPaymentReceipt($refno);
                $text = "https://nacostpi.com/student/verify-receipt?ref_no=".$getStudentReceiptInfo->receipt_no;
            }else{
                header('location: ../auth/login');
            } 
        }else{
            header('location: receipt');
        }

    }else{
        header('location: ../auth/login');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Receipt</title>
	
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
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="text-left">
                                                <h3 class="h2 b mb-0"><?php echo $getStudentReceiptInfo->fullname; ?></h3>
                                                <p class="font-16 mb-0"><strong class="weight-600 ">Receipt No: </strong> <strong><?php echo $getStudentReceiptInfo->receipt_no; ?></strong></p>
                                                <p class="font-16 mb-0"><strong class="weight-600">Matric No:</strong> <?php echo $getStudentReceiptInfo->matricno; ?></p>
                                                <p class="font-16 mb-0"><strong class="weight-600">NACOS ID:</strong> <?php echo $getStudentReceiptInfo->nacos_id; ?></p>
                                                <p class="font-16 mb-0"><strong class="weight-600">Class:</strong> <?php echo $getStudentReceiptInfo->level; ?> (<?php echo $getStudentReceiptInfo->program; ?>)</p>
                                                <p class="font-16 mb-0"><strong class="weight-600">Email:</strong> <?php echo $getStudentReceiptInfo->email; ?></p>
                                                <p class="font-16 mb-0"><strong class="weight-600">Phone No:</strong> <?php echo $getStudentReceiptInfo->phone; ?></p>
                                                <p class="font-16 mb-0"><strong class="weight-600">Session:</strong> 2022/2023</p>
                                                <p class="font-16 mb-0"><strong class="weight-600">Date Paid:</strong> <?php echo $getStudentReceiptInfo->date_paid; ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- <div class="text-right">
                                                <h3 class="h2 b mb-0">Receipt No.</h3>
                                                <p class="font-16 mb-0"><strong class="weight-600 outline"></strong> jhsd576q35776</p>
                                            </div> -->
                                        </div>
                                    </div>

                                    <!-- Table -->
                                    <div class="row">
                                        <table class="table table-bordered mt-4">
                                            <thead class="text-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Fee Description</th>
                                                    <th scope="col">Amount Paid</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Payment for <strong>2022/2023 NACOS Due</strong></td>
                                                    <td>₦ 1000</td>
                                                </tr>
                                                <tr>
                                                    <td rowspan="2">
                                                        <?php echo $admin->generateQRCode($text); ?>
                                                    </td>
                                                    <td class="text-right"><strong>Sub Total:</strong></td>
                                                    <td><strong>₦ 1000</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right"><h3><strong>Total:</strong></h3></td>
                                                    <td><h3><strong>₦ 1000</strong></h3></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div style="display: inline-flex;" class="mt-5">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <p class="font-16 mb-0 mt-3 text-center"><strong class="weight-600">_________________<br/>Student Signature.</strong></p>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <p class="font-16 mb-0 mt-3 text-center"><strong class="weight-600">_________________<br/>Fin. Sec / Stamp</strong></p>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <p class="font-16 mb-0 mt-3 text-center"><strong class="weight-600">__________________<br/>President Signature.</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <h4 class="mb-1 text-right text-center b h4"><u>NOTE</u></h4>
                                <div>
                                    <p>Please take this Printout to the <strong>Financial Secretary</strong> at the Department for <strong>Signatory and Stamp to authenticate your payment and validate this receipt.</strong></p>
                                </div>
                                <div>
                                    <strong>President:</strong> &nbsp;08090949669
                                    <strong>Financial Secretary:</strong> &nbsp;08090949669
                                </div>
                                <div>
                                    <p class="font-16 mb-3 mt-1"><strong class="weight-600">Date Printed:</strong> <?php echo date("d M Y g:i A"); ?> </p>
                                </div>
                                <button type="submit" name="change_password" class="btn btn-black btn-print" onclick="window.print();">Print</button>
                                
                            </div>

                        </div>
                    </div>
				</div>
            </div>
		</div>

	</div>
  
</body>
</html>