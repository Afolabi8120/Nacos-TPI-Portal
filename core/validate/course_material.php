<?php
    include('../core/init.php');

    if(isset($_POST['btn_save'])){
        // passing data received from user into variable
        $course_code = $_POST['course_code'];
        $level = $_POST['level'];
        $title = $_POST['title'];
        $semester = $_POST['semester'];

        // Form Validation 
        if(empty($course_code) || empty($level) || empty($title)){
            $_SESSION['ErrorMessage'] = "All fields are Required";
        }else{
            $course_code = $admin->validateInput($course_code);
            $level = $admin->validateInput($level);
            $semester = $admin->validateInput($semester);
            $title = $admin->validateInput($title);
            $material = $admin->uploadCourseMaterial($_FILES['material']);

            if($admin->addCourseMaterial($title,$level,$semester,$course_code,$material)){
                $_SESSION['SuccessMessage'] = "Course Material Has Been Added Successfully";
            }else{
                $_SESSION['ErrorMessage'] = "Failed To Add Course Material";
            }
        }       
    }elseif(isset($_POST['btn_enable_material'])){
        $material_id = $_POST['material_id'];

        if ($admin->enableCourseMaterial($material_id)){
            $_SESSION['SuccessMessage'] = "Material Has Been Activated Successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed To Activate Material";
        }
    }elseif(isset($_POST['btn_disable_material'])){
        $material_id = $_POST['material_id'];

        if ($admin->disableCourseMaterial($material_id)){
            $_SESSION['SuccessMessage'] = "Material Has Been De-Activated Successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed To De-Activate Material";
        }
    }elseif(isset($_POST['btn_delete_material'])){
        $material_id = $_POST['material_id'];

        if ($admin->removeCourseMaterial($material_id)) {
                $_SESSION['SuccessMessage'] = "Material has been deleted successfully";
        }else{
               	$_SESSION['ErrorMessage'] = "Failed to delete material";
        }
    }


?>