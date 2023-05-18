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
        * {
            margin: 0;
        }
        @media print {
            .btn-print {
                display:none !important;
            }
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="page-inner">    
            <div class="page-category" style="padding: 0;">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card py-0">
                            <div class="card-title mt-3" align="center">
                                <img src="../assets/img/poly.png" height="80px" width="80px" class="rounded-circle mb-4 mt-1">
                                <img src="../assets/img/icon.png" height="80px" width="80px" class="rounded-circle mb-4 mt-1">
                                <h1 class="text-center h3 weight-900 b text-dark">Department of Computer Science</h1>
                                <h2 class="text-center h4 weight-900 b text-dark">NACOS, The Polytechnic Ibadan.</h2>
                                <h6 class="text-center text-dark"> <i class="fas fa-globe"></i> &nbsp;https://nacostpi.com </h6>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <table class="table table-bordered" cellspacing="0" cellpadding="0">
                                            <thead class="text-dark">
                                                <tr>
                                                    <th colspan="4" class="text-center">Payment Receipt</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td scope="col"><strong>Matric No:</strong></td>
                                                    <td scope="col"><strong><?php echo $getStudentReceiptInfo->matricno; ?></strong></td>
                                                    <td scope="col "><strong>Fullname:</strong></td>
                                                    <td scope="col"><strong><?php echo $getStudentReceiptInfo->fullname; ?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td scope="col "><strong>NACOS ID:</strong></td>
                                                    <td scope="col"><?php echo $getStudentReceiptInfo->nacos_id; ?></td>
                                                    <td scope="col"><strong>Level/Program:</strong></td>
                                                    <td scope="col"><?php echo $getStudentReceiptInfo->level; ?> (<?php echo $getStudentReceiptInfo->program; ?>)</td>
                                                </tr>
                                                <tr>
                                                    <td scope="col "><strong>Email:</strong></td>
                                                    <td scope="col"><?php echo $getStudentReceiptInfo->email; ?></td>
                                                    <td scope="col"><strong>Phone No:</strong></td>
                                                    <td scope="col"><?php echo $getStudentReceiptInfo->phone; ?></td>
                                                </tr>
                                                <tr>
                                                    <td scope="col "><strong>Session:</strong></td>
                                                    <td scope="col"><?php echo "2022/2023"#$getStudentReceiptInfo->section; ?></td>
                                                    <td scope="col"><strong>Date Paid:</strong></td>
                                                    <td scope="col"><?php echo $getStudentReceiptInfo->date_paid; ?></td>
                                                </tr>
                                                <tr>
                                                    <td scope="col "><strong>Receipt No:</strong></td>
                                                    <td scope="col" colspan="3"><?php echo $getStudentReceiptInfo->receipt_no; ?></td>
                                                </tr>
                                                <tr>
                                                    <td scope="col" colspan="4"></td>>
                                                </tr>
                                                <tr style="font-weight: bold;">
                                                    <td scope="col">S/N</td>
                                                    <td scope="col" colspan="2">Fee Description</td>
                                                    <td scope="col">Amount Paid</td>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td colspan="2">Payment for <strong>2022/2023 NACOS Due</strong></td>
                                                    <td>₦ 1000</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td colspan="2">Payment for <strong>2022/2023 NACOS ID Card</strong></td>
                                                    <td>₦ 500</td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td class="text-right h3" colspan="2"><strong>Total:</strong></td>
                                                    <td><strong>₦ 1500</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <?php echo $admin->generateQRCode($text); ?>

                                        <div style="display: inline-flex; padding: 0;" class="mt-5">
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

                            <div class="card-footer text-center m-3" style="padding: 0;">
                                <h4 class="text-right text-center b h4 mt-2"><u>NOTE</u></h4>
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