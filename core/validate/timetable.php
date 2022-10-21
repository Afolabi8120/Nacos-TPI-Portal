<?php
    include('../core/init.php');

    if(isset($_POST['btn_save_timetable'])){
            // passing data received from user into variable
            $title = $_POST['title'];

            // Form Validation 
            if(empty($title)){
                $_SESSION['ErrorMessage'] = "All fields are Required";
            }else{
            	$title = $admin->validateInput($title);
            	$file_name = $admin->uploadTimeTable($_FILES['file_name']);

            if($admin->addTimeTable($title,$file_name)){
                $_SESSION['SuccessMessage'] = "Time Table Has Been Added Successfully";
            }else{
                $_SESSION['ErrorMessage'] = "Failed To Add Time Table";
            }
        }       
    }elseif(isset($_POST['btn_enable'])){ // to enable account
        $material_id = $_POST['material_id'];

        if ($admin->enableTimeTable($material_id)){
            $_SESSION['SuccessMessage'] = "Time Table has been Activated successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to Activate Time Table";
        }
    }elseif(isset($_POST['btn_disable'])){ // to disable account
        $material_id = $_POST['material_id'];

        if ($admin->disableTimeTable($material_id)){
            $_SESSION['SuccessMessage'] = "Time Table has been De-Activated successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to De-Activate Time Table";
        }
    }elseif(isset($_POST['btn_delete'])){
        $material_id = $_POST['material_id'];

        if ($admin->deleteTimeTable($material_id)) {
            $_SESSION['SuccessMessage'] = "Time Table has been Deleted successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed to Delete Time Table";
        }
    }

?>