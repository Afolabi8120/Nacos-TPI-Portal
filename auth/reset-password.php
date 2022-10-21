<?php
    include('../core/init.php');

    if(isset($_GET['token']) AND $_GET['token'] !== ""){
        $token = $_GET['token'];

        if($stu->checkIfTokenExist($token) === true){
            
            if(isset($_POST['btn-reset'])){
                // passing data received from user into variable
                $token = $_POST['token'];
                $password = $_POST['password'];
                $cpassword = $_POST['cpassword'];

                if(empty($password) || empty($cpassword) || empty($token)){
                    $_SESSION['ErrorMessage'] = "All Fields are Required";
                }
                elseif ($password != $cpassword) {
                    $_SESSION['ErrorMessage'] = "Both Password Provided Do Not Match";
                }
                else{

                    $getToken = $stu->getResetEmail($token); // use the token to access the user's email

                    $email = $getToken->email; // get the student email addres base on the token in the url

                    $newpassword = password_hash($password, PASSWORD_DEFAULT); // hash the student new password
                    $oldpassword = $stu->getStudentPasswordByEmail($email); // get the student old password

                    #echo $oldpassword->password;exit();

                    if(password_verify($password, $oldpassword->password)){
                        $_SESSION['ErrorMessage'] = "Your Old Password Cannot Be Your New Password";
                    }else{

                        if($stu->updateResetPassword($email,$newpassword) === true){
                            if($stu->updateResetPasswordStatus($email) === true){
                                $_SESSION['SuccessMessage'] = "Password Has Been Changed Successfully";
                            }
                        }else{
                            $_SESSION['ErrorMessage'] = "Failed To Change Password";
                        }
                    }
                }
            }

        }else{
            echo "Invalid Request";
            sleep(2);
            exit();
        }
    }else{
        header('location: index');
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Nacos TPI - Reset Password</title>
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
                            <h1 class="text-center text-dark fw-bold">Reset Password</h1>
                            <h6 class="text-center">Set up your new password, All Fields are required</h6>
                            <?php
                                echo ErrorMessage();
                                echo SuccessMessage();
                            ?>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                                <div class="login-form">
                                    <div class="form-group">
                                        <label for="password">New Password</label>
                                        <input name="token" type="hidden" id="email" class="form-control" readonly value="<?php echo $token; ?>">
                                        <input name="password" type="password" id="password" class="form-control" placeholder="Enter Your New Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="cpassword">Confirm New Password</label>
                                        <input name="cpassword" type="password" id="cpassword" class="form-control" placeholder="Confirm Your New Password">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="submit" name="btn-reset" class="form-control btn btn-lg btn-success" value="Submit">
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