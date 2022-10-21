<?php
    include('../core/init.php');

    if(isset($_POST['btn_save'])){ // to save account

        $username = $admin->validateInput($_POST['username']);
        $fullname = $admin->validateInput($_POST['fullname']);
        $email = $admin->validateInput($_POST['email']);
        $usertype = $admin->validateInput($_POST['usertype']);
        $gender = $admin->validateInput($_POST['gender']);
        $status = $admin->validateInput($_POST['status']);
        $password = $admin->validateInput($_POST['password']);
        $password2 = $admin->validateInput($_POST['password2']);

        // Hashing the password provided by the user and storing it into a new variable $newpassword
        $newpassword = password_hash($password, PASSWORD_DEFAULT);

        // Form Validation 
        if(empty($username) || empty($fullname) || empty($email) || empty($usertype) || empty($gender) || empty($status) || empty($password) || empty($password2)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }elseif ($password != $password2) {
            $_SESSION['ErrorMessage'] = "Both password did not match";
        }elseif(!preg_match("/^[a-z A-Z]*$/", $fullname)){
            // Using regular expression to check if the user inputs a valid name
            $_SESSION['ErrorMessage'] = "Only Alphabet is allowed for the full name field";
        }else{

            $user_img = $admin->setImageName($gender);

            // Check if email already exist in database
            if($admin->checkEmail($email) === true){
                $_SESSION['ErrorMessage'] = "Email Address Already In Use";
            }else{
                if($admin->checkUsername($username) === true){
                    $_SESSION['ErrorMessage'] = "Username Already In Use";
                }else{
                    $admin->registerAdmin($username,$fullname,$email,$gender,$newpassword,$usertype,$user_img);
                    $_SESSION['SuccessMessage'] = "Account has been created successfully";
                }
            }
        }       
    }elseif(isset($_POST['btn_enable'])){ // to enable account
        $user_id = $_POST['user_id'];

        if ($admin->enableAdmin($user_id)){
            $_SESSION['SuccessMessage'] = "Account has been enabled successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to enable account";
        }
    }elseif(isset($_POST['btn_disable'])){ // to disable account
        $user_id = $_POST['user_id'];

        if ($admin->disableAdmin($user_id)){
            $_SESSION['SuccessMessage'] = "Account has been disabled successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to disable account";
        }
    }elseif(isset($_POST['btn_delete'])){ // to delete account
        $user_id = $_POST['user_id'];

        if($admin->deleteAdmin($user_id)){
            $_SESSION['SuccessMessage'] = "Account has been deleted successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to delete account";
        }
    }

?>