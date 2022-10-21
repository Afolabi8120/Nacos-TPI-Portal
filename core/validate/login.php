<?php
    include('../core/init.php');

    if(isset($_POST['login']) && !empty($_POST['login'])){
        // passing data received from user into variable
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Form Validation 
        if(empty($email) || empty($password)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{
            $email = $stu->validateInput($email);
            $password = $stu->validateInput($password);

            if($stu->login($email)){
                $getStudentDetails = $stu->getStudentData($email);

                if(password_verify($password, $getStudentDetails->password)){
                    if($getStudentDetails->status == 'Active'){
                        if($getStudentDetails->usertype == 'Student'){
                            $_SESSION['session_id'] = session_id();
                            $_SESSION['matricno'] = $getStudentDetails->email;
                            $stu->updateSession($_SESSION['matricno'], $_SESSION['session_id']);
                            $_SESSION['SuccessMessage'] =  "Login Successful";
                            header('location: ../student/dashboard'); 
                        }
                        else{
                            $_SESSION['session_id'] = session_id();
                            $_SESSION['username'] = $getStudentDetails->email;
                            $stu->updateSession($_SESSION['username'], $_SESSION['session_id']);
                            header('location: ../admin/dashboard'); 
                        }

                    }elseif($getStudentDetails->status == 'In-Active'){
                        $_SESSION['ErrorMessage'] = "Your Account is In-Active";
                    }
                }elseif(!password_verify($password, $getStudentDetails->password)){
                    $_SESSION['ErrorMessage'] = "Invalid Details Provided";
                }
            }else{
                $_SESSION['ErrorMessage'] = "Invalid Details Provided";
            }
        }
    }


    
?>