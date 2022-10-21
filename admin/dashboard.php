<?php
    include('../core/init.php');

    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);
    $getAllStudent = $admin->getAllStudentDESC();
    
    if(isset($_SESSION['username'])){
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: ../index');
            $_SESSION['ErrorMessage'] = "You have been logged out from another device";
        }else{

        }

    }else{
        header('location: ../index');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $getAdmin->fullname; ?>'s Dashboard </title>
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
                        <h4 class="page-title">Dashboard</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="dashboard.php">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <h4><?php echo $getdate . ", ". $getAdmin->fullname; ?></h4>
                            </li>
                        </ul>
                    </div>
                    <div class="page-category">
                    
                        <?php
                            echo ErrorMessage();
                            echo SuccessMessage();
                        ?>

                        <div class="row mt-5">

                            <div class="col-sm-4 col-md-4">
                                <div class="card card-stats card-danger card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Registered Student</p>
                                                    <h4 class="card-title">
                                                        <?php echo $admin->getStudentTotal(); ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-4 col-md-4">
                                <div class="card card-stats card-info card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-user-shield"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">No. Paid</p>
                                                    <h4 class="card-title">
                                                    <?php echo $admin->getTotalPaidCount(); ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4">
                                <div class="card card-stats card-success card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-file-alt"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Material(s)</p>
                                                    <h4 class="card-title">
                                                        <?php echo $admin->getTotalMaterial(); ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4">
                                <div class="card card-stats card-warning card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-male"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Male Student</p>
                                                    <h4 class="card-title">
                                                        <?php echo $admin->getStudentCount('tblstudent','gender','Male','usertype','Student'); ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-4 col-md-4">
                                <div class="card card-stats card-primary card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-female"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Female Student</p>
                                                    <h4 class="card-title">
                                                        <?php echo $admin->getStudentCount('tblstudent','gender','Female','usertype','Student'); ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-4 col-md-4">
                                <div class="card card-stats card-secondary card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="icon-big text-center">
                                                    <i class="fas fa-file-alt"></i>
                                                </div>
                                            </div>
                                            <div class="col-9 col-stats">
                                                <div class="numbers">
                                                    <p class="card-category">Exco(s)</p>
                                                    <h4 class="card-title">
                                                        <?php echo $admin->getTotalExcos(); ?>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
                                                <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Recently Registered Student(s)</a> </li>
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
                                                        <th>EMAIL</th>
                                                        <th>LEVEL</th>
                                                        <th>PROGRAM</th>     
                                                        <th>GENDER</th>
                                                        <th>STATUS</th>
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
                                                        <td class="text-bold-500"><?php echo $student->email; ?></td>
                                                        <td class="text-bold-500"><?php echo $student->level; ?></td>
                                                        <td class="text-bold-500"><?php echo $student->program; ?></td>
                                                        <td><?php echo $student->gender; ?></td>
                                                        <!-- Not Active Starts Here -->
                                                        <?php if($student->status == 'In-Active'): ?>
                                                        <td><span class="badge bg-danger"><?php echo $student->status; ?></span>
                                                        </td>
                                                        <!-- Not Active Ends Here -->

                                                        <!-- Active Starts Here -->
                                                        <?php elseif($student->status == 'Active'): ?>
                                                        <td><span class="badge bg-success"><?php echo $student->status; ?></span>
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
            </div>

            <?php include_once('./includes/footer.php'); ?>
            <?php include_once('./includes/js.php'); ?>



        </div>
        
    </div>

</body>
</html>