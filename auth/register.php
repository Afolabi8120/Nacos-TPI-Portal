<?php
    include('../core/validate/register.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Nacos TPI - Register</title>
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
                            <h1 class="text-center text-dark fw-bold">Create an Account</h1>
                            <h6 class="text-center">Please input all your details correctly and check well before submitting</h6>
                            <?php
                                echo ErrorMessage();
                                echo SuccessMessage();
                            ?>
                        </div>
                        <div class="card-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="login-form">
                                    <div class="form-group">
                                        <label for="username">Matric/Form No</label>
                                        <input  name="matricno" type="text" class="form-control" placeholder="Matric/Form No" value="<?php if(isset($_POST['matricno'])) echo $_POST['matricno']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Full Name</label>
                                        <input  name="fullname" type="text" class="form-control" placeholder="Full Name" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Email</label>
                                        <input  name="email" type="email" class="form-control" placeholder="Email Address" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Phone</label>
                                        <input  name="phone" type="tel" maxlength="11" class="form-control" placeholder="Phone No" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Gender</label>
                                        <select name="gender" class="form-control" required>
                                            <option disabled selected>Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Program</label>
                                        <select name="program" class="form-control" required>
                                            <option disabled selected>Select Program</option>
                                            <option value="FT">FT</option>
                                            <option value="PT">PT</option>
                                            <option value="DPP">DPP</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Level</label>
                                        <select name="level" class="form-control" required>
                                            <option disabled selected>Select Level</option>
                                            <option value="ND I">ND I</option>
                                            <option value="ND II">ND II</option>
                                            <option value="ND III">ND III</option>
                                            <option value="HND I">HND I</option>
                                            <option value="HND II">HND II</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Retype Password</label>
                                        <input name="password2" type="password" class="form-control" placeholder="Retype Password" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Select Passport</label>
                                        <div class="input-group">                              
                                            <input type="file" name="stu_image" accept=".jpg, .png, .jpeg" class="form-control" id="image_id" required>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <input type="submit" name="register" class="form-control btn btn-lg btn-success" value="Register">
                                    </div>
                                    <div class="row form-sub m-0">
                                        <p>Already have an account?<a href="index" class="link float-right mr-2">&nbsp;Click Here</a></p>
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
