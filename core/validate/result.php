<?php
    include('../core/init.php');

    if(isset($_POST['btn_save_result'])){
            // passing data received from user into variable
            $title = $_POST['title'];
            $level = $_POST['level'];
            $course_code = $_POST['course_code'];
            $session = $_POST['session'];

            // Form Validation 
            if(empty($title)){
                $_SESSION['ErrorMessage'] = "All fields are Required";
            }else{
            	$title = $admin->validateInput($title);
            	$file_name = $admin->uploadResult($_FILES['file_name']);

            if($admin->addResult($title,$level,$course_code,$file_name,$session)){
                $_SESSION['SuccessMessage'] = "Result Has Been Added Successfully";
            }else{
                $_SESSION['ErrorMessage'] = "Failed To Add Result";
            }
        }       
    }elseif(isset($_POST['btn_enable'])){ // to activate the result
        $result_id = $_POST['result_id'];

        if ($admin->enableResult($result_id)){
            $_SESSION['SuccessMessage'] = "Result has been Activated successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to Activate Result";
        }
    }elseif(isset($_POST['btn_disable'])){ // to deactivate result
        $result_id = $_POST['result_id'];

        if ($admin->disableResult($result_id)){
            $_SESSION['SuccessMessage'] = "Result has been De-Activated successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to De-Activate Result";
        }
    }elseif(isset($_POST['btn_delete'])){
        $result_id = $_POST['result_id'];

        if ($admin->deleteResult($result_id)) {
            $_SESSION['SuccessMessage'] = "Result has been Deleted successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to Delete Result";
        }
    }

?>