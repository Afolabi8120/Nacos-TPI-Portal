<?php
    include('../core/init.php');

    if(isset($_POST['btn_save_exco']) && !empty($_POST['btn_save_exco'])){
        // passing data received from user into variable
        $fullname = $_POST['fullname'];
        $post = $_POST['post'];

        // Form Validation 
        if(empty($fullname) || empty($post)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{
            $fullname = $stu->validateInput($fullname);
            $post = $stu->validateInput($post);

            $image_name = $_FILES['exco_image']['name'];
            $target = '../exco_img/' . $_FILES['exco_image']['name'];

            //specifying the supported file extension
            $validextensions = ['jpg', 'png', 'jpeg'];
            $ext = explode('.', basename($_FILES['exco_image']['name']));

            //explode file name from dot(.)
            $file_extension = end($ext);

            if(!in_array($file_extension, $validextensions)){ 
                $_SESSION['ErrorMessage'] = "Please select a valid picture format";
                return;
            }else{
                if($admin->registerExco($fullname,$post,$image_name)){
                    move_uploaded_file($_FILES['exco_image']['tmp_name'], $target); // move image to student_img
                    $_SESSION['SuccessMessage'] = "Added Successfully";
                }else{
                    $_SESSION['SuccessMessage'] = "Failed To Save";
                }
            }
        }

    }elseif(isset($_POST['btn_delete_exco']) && !empty($_POST['btn_delete_exco'])){ // to delete account
        $exco_id = $_POST['exco_id'];

        if($admin->deleteExco($exco_id)){
            $_SESSION['SuccessMessage'] = "Account has been deleted successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to delete account";
        }
    }else if(isset($_POST['btn_update_exco'])){
        // passing data received from user into variable
        $sid = $_POST['sid'];
        $matricno = $_POST['matricno'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $nacos_id = $_POST['nacos_id'];
        $program = $_POST['program'];
        $level = $_POST['level'];

        // Form Validation 
        if(empty($matricno) || empty($fullname) || empty($email) || empty($phone) || empty($gender) || empty($program) || empty($level)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }elseif($stu->checkMatricNo($matricno) === true){
            $_SESSION['ErrorMessage'] =  "Matric Number/Form No Already in Use";
        }elseif($stu->checkEmail($email) === true){
            $_SESSION['ErrorMessage'] =  "Email Address Already In Use";
        }else if($stu->checkPhone($phone) === true){
            $_SESSION['ErrorMessage'] =  "Phone Number Already In Use";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['ErrorMessage'] =  "Email Address is Invalid";
        }elseif(!preg_match("/^[\d]*$/", $phone)){
            $_SESSION['ErrorMessage'] =  "Please Use a Valid Phone No";
        }else{
            $sid = $stu->validateInput($sid);
            $matricno = $stu->validateInput($matricno);
            $fullname = $stu->validateInput($fullname);
            $email = $stu->validateInput($email);
            $phone = $stu->validateInput($phone);
            $gender = $stu->validateInput($gender);
            $program = $stu->validateInput($program);
            $level = $stu->validateInput($level);

            if($stu->updateStudentEditProfile($sid,$matricno,$fullname,$email,$phone,$gender,$program,$level) === true){
                $_SESSION['SuccessMessage'] =  "Account Has Been Successfully Updated";
            }else{
                $_SESSION['ErrorMessage'] =  "Failed to Update The Student Account";
            }
            
        } 
    }


?>