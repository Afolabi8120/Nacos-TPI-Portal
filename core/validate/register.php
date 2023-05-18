<?php
    include('../core/init.php');

    if(isset($_POST['register']) && !empty($_POST['register'])){
        // passing data received from user into variable
        $matricno = $_POST['matricno'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $program = $_POST['program'];
        $level = $_POST['level'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $section = $_POST['section'];

        // Form Validation 
        if(empty($matricno) || empty($fullname) || empty($email) || empty($password) || empty($phone) || empty($gender) || empty($program) || empty($level) || empty($password2) || empty($password)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }if(strlen($matricno) < 6 || strlen($matricno) > 16) {
            $_SESSION['ErrorMessage'] =  "Invalid matric or form number";
        }elseif(strlen($phone) < 11 || strlen($phone) > 11) {
            $_SESSION['ErrorMessage'] =  "Please Use a Valid Phone No";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['ErrorMessage'] =  "Email Address is Invalid";
        }elseif(!preg_match("/^[a-z A-Z]*$/", $fullname)){
            $_SESSION['ErrorMessage'] =  "Fullname Details is Not Valid";
        }elseif(!preg_match("/^[a-zA-Z\d]*$/", $matricno)){
            $_SESSION['ErrorMessage'] =  "Invalid matric or form number";
        }elseif(!preg_match("/^[\d]*$/", $phone)){
            $_SESSION['ErrorMessage'] =  "Please Use a Valid Phone No";
        }elseif ($password !== $password2) {
            $_SESSION['ErrorMessage'] =  "Both Password Do Not Match";
        }else{

            $matricno = $stu->validateInput($matricno);
            $fullname = $stu->validateInput($fullname);
            $email = $stu->validateInput($email);
            $phone = $stu->validateInput($phone);
            $gender = $stu->validateInput($gender);
            $program = $stu->validateInput($program);
            $level = $stu->validateInput($level);
            $password = $stu->validateInput($password);
            $password2 = $stu->validateInput($password2);
            $section = $stu->validateInput($section);

            $email = strtolower($email);

            // get nacos id
            if(strlen($stu->getLastID()) == 1) {
                $nacos_id = 'NACOSTPI/SW/POLYIB/000'.$stu->getLastID();
            }elseif(strlen($stu->getLastID()) == 2) {
                $nacos_id = 'NACOSTPI/SW/POLYIB/00'.$stu->getLastID();
            }elseif(strlen($stu->getLastID()) == 3) {
                $nacos_id = 'NACOSTPI/SW/POLYIB/0'.$stu->getLastID();
            }else{
                $nacos_id = 'NACOSTPI/SW/POLYIB/'.$stu->getLastID();
            }

            $image_name = $_FILES['stu_image']['name'];

            //specifying the supported file extension
            $validextensions = ['jpg', 'png', 'jpeg'];
            $ext = explode('.', basename($_FILES['stu_image']['name']));

            //explode file name from dot(.)
            $file_extension = end($ext);

            $image_name = uniqid().".".$file_extension;
            $target = '../student_img/' . $image_name;

            //hashing the password
            $pass = password_hash($password, PASSWORD_DEFAULT);

            if(!in_array($file_extension, $validextensions)){ 
                $_SESSION['ErrorMessage'] = "Please select a valid picture format";
                return;
            }else if($_FILES['stu_image']['size'] > 2097152){
                $_SESSION['ErrorMessage'] = "The allowed file size is 2MB.";
                return;
            }else if($stu->checkMatricNo($matricno) === true){ // check if matric no exist
                $_SESSION['ErrorMessage'] =  "Matric Number/Form No Already in Use";
            }else{
                // check if email already exist
                if($stu->checkEmail($email) === true){
                    $_SESSION['ErrorMessage'] =  "Email Address Already In Use";
                }else if($stu->checkPhone($phone) === true){
                    $_SESSION['ErrorMessage'] =  "Phone Number Already In Use";
                }else{
                    // Register Student
                    $stu->register($matricno,$fullname,$email,$phone,$gender,$program,$level,$pass,$image_name,$nacos_id,'Student',$section);

                    move_uploaded_file($_FILES['stu_image']['tmp_name'], $target); // move image to student_img
                        
                    $_SESSION['matricno'] = $email;

                    if(isset($_SESSION['matricno'])){
                        $getStudentDetails = $stu->getStudentData($email);

                        $_SESSION['session_id'] = session_id();
                        $_SESSION['matricno'] = $getStudentDetails->email;
                        #echo var_dump($getStudentDetails->email);exit();
                        $stu->updateSession($_SESSION['matricno'], $_SESSION['session_id']);
                        $_SESSION['SuccessMessage'] =  "Account Creation Successful";
                        header('location: ../student/dashboard');    
                    }             
                }
            }
        }

    }elseif(isset($_POST['btn_save_payment']) && !empty($_POST['btn_save_payment'])){
        // passing data received from user into variable
        $email = $_POST['email'];
        $ref_no = $_POST['ref_no'];
        $amount = $_POST['amount'];

        if(empty($email) || empty($ref_no) || empty($amount)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{

        	$email = $stu->validateInput($email);
            $ref_no = $stu->validateInput($ref_no);
            $amount = $stu->validateInput($amount);

            if($stu->manualPayment($email,$ref_no,$amount,"1","2022/2023") === true){
            	$_SESSION['SuccessMessage'] =  "Payment Added Successfully";
            }else{
            	$_SESSION['ErrorMessage'] = "Failed to Add Payment";
            }

        }

    }


?>