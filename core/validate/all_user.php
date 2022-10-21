<?php
    include('../core/init.php');

    if(isset($_POST['btn_enable'])){
        $user_id = $_POST['user_id'];

        if ($admin->enableStudent($user_id)){
            $_SESSION['SuccessMessage'] = "Student Account Has Been Activated Successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed To Activate Student Account";
        }
    }elseif(isset($_POST['btn_disable'])){
        $user_id = $_POST['user_id'];

        if ($admin->disableStudent($user_id)){
            $_SESSION['SuccessMessage'] = "Student Account Has Been De-Activated Successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed To De-Activate Student Account";
        }
    }elseif(isset($_POST['btn_delete'])){
        $user_id = $_POST['user_id'];

       	if ($admin->deleteStudent($user_id)){
            $_SESSION['SuccessMessage'] = "Student Account Has Been Deleted Successfully";
        }else{
            $_SESSION['ErrorMessage'] = "Failed To Delete Student Account";
        }
    }

?>