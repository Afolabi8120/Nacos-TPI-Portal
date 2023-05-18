<?php
    include('../core/validate/change_password.php');

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
    <title>Certificate</title>
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
                        <h4 class="page-title">Certificate</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="flaticon-file"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="certificate">Certificate</a>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-with-nav">
                                    <div class="card-header mt-3">
                                        Download Certificate
                                    </div>
                                    <div class="card-body">
                                        <?php if($checkDue == true AND $checkDue->payment_status == "1"): ?>
                                            <img src="generate-certificate.php" alt=""> <br>
                                            <img src="../assets/certificate/cert_image/<?= $getStudent->matricno; ?>.png" alt="<?= $getStudent->fullname; ?> Certificate" height="250" width="250"> <br>
                                            <a href="../assets/certificate/cert_image/<?= $getStudent->matricno; ?>.png" class="btn btn-md btn-primary mt-3" download>
                                            Download Certificate</a>
                                        <?php else:?>
                                            <div class="text-center">
                                                <h5 class="h4 fw-bold text-danger"><i class="fas fa-sad-cry fa-2x"></i> You are yet to pay your Nacos Due.</h5>
                                            </div>
                                        <?php endif; ?>
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