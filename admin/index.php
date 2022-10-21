<?php
    require('../core/init.php');
    
    $getAdmin = $stu->getStudentData($_SESSION['username']);
    $getSession = $stu->getStudentData($_SESSION['username']);

	if(isset($_SESSION['username']))
    {
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: ../index');
        }
        else {
            if($getAdmin->usertype == "Admin" || $getUserData->usertype == "Super Admin"){
                header('location: dashboard');
            }else{
                header('location: ../index');
            }
        }
    }else{
        header('location: ../index');
    }
?>