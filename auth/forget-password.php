<?php
    include('../core/validate/forget-password.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nacos TPI - Forget Password</title>
    <link rel="icon" href="../assets/img/icon.png" type="image/x-icon"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Files -->
    <?php require_once('../includes/css.php') ?>
</head>
<body class="login">
    <div class="wrapper wrapper-login">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <center><a href="index"><img src="../assets/img/icon.png" height="60px" width="60px" class="mb-3"></a></center>
                            <h1 class="text-center text-dark fw-bold">Forget Password</h1>
                            <h6 class="text-center">Enter the email address provided during registration</h6>
                            <?php
                                echo ErrorMessage();
                                echo SuccessMessage();
                            ?>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="login-form">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input name="email" type="email" class="form-control" placeholder="Email Address">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="submit" name="btn-forget" class="form-control btn btn-lg btn-success" value="Submit">
                                    </div>
                                    <div class="row form-sub m-0">
                                        <p>Remember your account?<a href="index" class="link float-right mr-2">&nbsp;Click Here</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <?php include_once('../includes/js.php'); ?>

</body>
</html>