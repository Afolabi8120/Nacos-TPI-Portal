<?php
session_start();
#include 'functions.php';
require 'sendgrid/vendor/autoload.php';

if(isset($_POST['reset'])) {
    $to_email = $_POST['email'];

    $token = bin2hex(random_bytes(50));
        // $addreset = querydb("INSERT INTO password_reset(email, token) VALUES('$to_email', '$token')");
        
        $url = "https://nacostpi.com/new-pass.php?token=".$token."&email=".$to_email;
        $msg = "Hi there, click on this <a href='".$url."'>link</a> to reset your password on the portal.";

        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("no-reply@nacostpi.com", "NACOS TPI");
        $email->setSubject("Student Password Reset On NACOS TPI Portal");
        $email->addTo($to_email);
        // $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
        $email->addContent(
          "text/html", $msg
        );
        $sendgrid = new \SendGrid('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');
        $sendgrid->send($email);
        //header('location: pending?emm=' . $to_email);
        echo '<script>alert("Mail has been sent");</script>';

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - NACOS, The Polytechnic Ibadan Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="assets/images/logo/nacos-logo.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendors/fontawesome/all.min.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>

    <div class="container" style="margin-top:50px;">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div id="auth-left">
                    <div style="display:block;margin:auto;width:50%;text-align:center;">
                        <a href=""><img style="width:100px;" src="assets/images/logo/nacos-logo.png" alt="Logo"></a>
                    </div>
                    <div style="display:block;margin:auto;text-align:center;">
                       <h1 class="auth-title" style="color:#138c01;">Password Reset</h1>
                      <p class="auth-subtitle mb-5" style="width:100%;">Enter your registered email.</p>
                    </div>

                    <?php
                    if(isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                    }
                    ?>

                    <form action="" method="POST">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" name="email" placeholder="Email" required>
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <input type="submit" name="reset" class="btn btn-primary btn-block btn-lg shadow-lg mt-5" style="background:#138c01;border-color:#138c01;" value="Proceed">

                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Remember your account? <a href="login" class="font-bold">Log in</a>.
                        </p>
                    </div>
                </div>
            </div>

        </div>

    </div>


  <script src="assets/vendors/fontawesome/all.min.js"></script>    
</body>

</html>

