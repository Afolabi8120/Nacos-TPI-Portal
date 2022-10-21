<?php
    include('../core/init.php');

    if(isset($_POST['btn_update'])){
        $user_id = $_POST['user_id'];
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
            
        // Form Validation 
        if(empty($username) || empty($fullname) || empty($email) || empty($gender)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{
            $user_id = $admin->validateInput($user_id);
            $fullname = $admin->validateInput($fullname);
            $email = $admin->validateInput($email);
            $gender = $admin->validateInput($gender);

            $admin->updateProfile($user_id,$fullname,$email,$gender);
            $_SESSION['SuccessMessage'] =  "Account Has Been Successfully Updated";
        } 
    }else if(isset($_POST['btn_update_user_profile'])){
        // passing data received from user into variable
        $matricno = $_POST['matricno'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $program = $_POST['program'];
        $level = $_POST['level'];

        // Form Validation 
        if(empty($matricno) || empty($fullname) || empty($email) || empty($phone) || empty($gender) || empty($program) || empty($level)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{
            $matricno = $stu->validateInput($matricno);
            $fullname = $stu->validateInput($fullname);
            $email = $stu->validateInput($email);
            $phone = $stu->validateInput($phone);
            $gender = $stu->validateInput($gender);
            $program = $stu->validateInput($program);
            $level = $stu->validateInput($level);

            $stu->updateProfile($matricno,$fullname,$email,$phone,$gender,$program,$level);
            $_SESSION['SuccessMessage'] =  "Account Has Been Successfully Updated";
        } 
    }else if(isset($_POST['btn_update_student_profile'])){
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
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
    }else if(isset($_POST['btn_update_user_picture'])){

        if(isset($_FILES['stu_image'])){
            if(!empty($_FILES['stu_image']['name'])){

                $getStudent = $stu->getStudentData($_SESSION['matricno']);

                $stu_img = $getStudent->picture;

                $image_name = $_FILES['stu_image']['name'];
                $target = '../student_img/' . $image_name;

                //specifying the supported file extension
                $validextensions = ['jpg', 'png', 'jpeg'];
                $ext = explode('.', basename($_FILES['stu_image']['name']));

                //explode file name from dot(.)
                $file_extension = end($ext);

                if($_FILES['stu_image']['size'] > 2097152){
                    $_SESSION['ErrorMessage'] = "The allowed file size is 2MB.";
                    return;
                }elseif(!in_array($file_extension, $validextensions)){ 
                    $_SESSION['ErrorMessage'] = "Please select a valid picture format";
                    return;
                }elseif($stu_img == "male.jpg" || $stu_img == "female.jpg"){
                    $fileRoot = $stu->uploadImage($_FILES['stu_image']);
                    $stu->updateImage($getStudent->id, $fileRoot);
                    header('location: change_password');
                }elseif($img_path = "../student_img/" .$stu_img){
                    unlink($img_path);
                }
                $fileRoot = $stu->uploadImage($_FILES['stu_image']);
                $stu->updateImage($getStudent->id, $fileRoot);
                $_SESSION['SuccessMessage'] = "Passport Has Been Changed Successfully";
            }
        }

    }else if(isset($_POST['btn_update_admin_picture'])){

        if(isset($_FILES['admin_img'])){
            if(!empty($_FILES['admin_img']['name'])){

                $getAdmin = $stu->getStudentData($_SESSION['username']);

                $admin_img = $getAdmin->picture;

                $image_name = $_FILES['admin_img']['name'];
                $target = '../admin/admin_img/' . $_FILES['admin_img']['name'];

                //specifying the supported file extension
                $validextensions = ['jpg', 'png', 'jpeg'];
                $ext = explode('.', basename($_FILES['admin_img']['name']));

                //explode file name from dot(.)
                $file_extension = end($ext);

                if($_FILES['admin_img']['size'] > 500000000){
                    $_SESSION['ErrorMessage'] = "This image size is too large";
                }elseif(!in_array($file_extension, $validextensions)){ 
                    $_SESSION['ErrorMessage'] = "Please select a valid picture format";
                    return;
                }elseif($admin_img == "male.jpg" || $admin_img == "female.jpg"){
                    $fileRoot = $admin->uploadImage($_FILES['admin_img']);
                    $admin->updateImage($getAdmin->id, $fileRoot);
                    #header('location: profile');
                } elseif($img_path = "../admin/admin_img/" .$admin_img){
                    unlink($img_path);
                }
                $fileRoot = $admin->uploadImage($_FILES['admin_img']);
                $admin->updateImage($getAdmin->id, $fileRoot);
                $_SESSION['SuccessMessage'] = "Passport Has Been Changed Successfully";
            }
        }

    }

?>