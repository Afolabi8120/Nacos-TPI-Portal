<?php
    include('../core/init.php');

    if(isset($_POST['change_password'])){
        // passing data received from user into variable
        $oldpassword = $_POST['oldpassword'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if(empty($oldpassword) || empty($password) || empty($password2)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }
        elseif ($password != $password2) {
            $_SESSION['ErrorMessage'] = "Both password did not match";
        }
        else{

            $getadmin = $stu->getStudentData($_SESSION['username']);
            $getpassword = $getadmin->password; // fetched password

            if(password_verify($oldpassword, $getpassword)){
                // Hashing the password provided by the user word
                $newpassword = password_hash($password, PASSWORD_DEFAULT);
                $admin->updatePassword($getadmin->id, $newpassword);
                $_SESSION['SuccessMessage'] = "Password Has Been Changed Successfully";
            }else{
                $_SESSION['ErrorMessage'] = "Old Password Provided is Invalid";
            }
        }
    }else if(isset($_POST['btn_user_change_password'])){
        // passing data received from user into variable
        $oldpassword = $_POST['oldpassword'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        if(empty($oldpassword) || empty($password) || empty($password2)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }
        elseif ($password != $password2) {
            $_SESSION['ErrorMessage'] = "Both password did not match";
        }
        else{

            $student = $stu->getStudentData($_SESSION['matricno']);
            $getpassword = $student->password; // fetched password
            #var_dump($student->id);exit();
            if(password_verify($oldpassword, $getpassword)){
                // Hashing the password provided by the user word
                $newpassword = password_hash($password, PASSWORD_DEFAULT);
                if($stu->updatePassword($student->id, $newpassword) === true){
                    $_SESSION['SuccessMessage'] = "Password Has Been Changed Successfully";
                }else{
                    $_SESSION['ErrorMessage'] = "Failed to Change Password";   
                }
            }
            else{
                $_SESSION['ErrorMessage'] = "Old Password Provided is Invalid";
            }
        }
    }

?>