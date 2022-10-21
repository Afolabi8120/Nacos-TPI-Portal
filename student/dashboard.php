<?php
    include('../core/init.php');

    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getSession = $stu->getStudentData($_SESSION['matricno']);
    $checkDue = $stu->checkStudentDue($getStudent->email);

    if(isset($_SESSION['matricno']) AND !empty($_SESSION['matricno'])){
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
    <title><?php echo $getStudent->fullname; ?>'s Dashboard </title>
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
        <?php require_once('../includes/header.php'); ?>

        <?php require_once('../includes/sidebar.php'); ?>

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Dashboard</h4>
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
                                <h4><?php echo $getdate . ", " . $getStudent->fullname; ?></h4>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">
                        <?php
                            echo ErrorMessage();
                            echo SuccessMessage();
                        ?>
                        <div class="row mt-5">
                            
                            <div class="col-sm-6 col-md-6">
                                <div class="card card-stats card-danger card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-user-circle"></i>
                                                </div>
                                            </div>
                                            <div class="col-10 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Full Name</p>
                                                    <h4 class="card-title">
                                                        <?php echo $getStudent->fullname; ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="card card-stats card-black card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-id-card"></i>
                                                </div>
                                            </div>
                                            <div class="col-10 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Nacos ID</p>
                                                    <h4 class="card-title">
                                                        <h4><?php echo $getStudent->nacos_id; ?></h4>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6 col-md-6">
                                <div class="card card-stats card-info card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-id-badge"></i>
                                                </div>
                                            </div>
                                            <div class="col-10 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Level</p>
                                                    <h4 class="card-title">
                                                        <?php echo $getStudent->level.' ('.$getStudent->program.')'; ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="card card-stats card-primary card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-envelope"></i>
                                                </div>
                                            </div>
                                            <div class="col-10 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Email</p>
                                                    <h4 class="card-title">
                                                        <?php echo $getStudent->email; ?>
                                                    </h4>
                                                </div>
                                            </div>
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