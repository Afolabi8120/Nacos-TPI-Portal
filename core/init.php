<?php
	include('database/config.php');
    #include('classes/class.phpmailer.php');
    #include('classes/class.smtp.php');
	include('classes/Admin.php');
	include('classes/Student.php');

	global $pdo;

	$admin = new Admin($pdo);
	$stu = new Student($pdo);

	session_start();

    function ErrorMessage(){
        if(isset($_SESSION['ErrorMessage'])){
            $output = '<div class = "alert alert-danger bg-danger text-white" style = "text-align: center;" role = "alert">';
            $output .= htmlentities($_SESSION['ErrorMessage']);
            $output .= '</div>';
            $_SESSION['ErrorMessage'] = null;
            return $output;
        }

    }

    function SuccessMessage(){
        if(isset($_SESSION['SuccessMessage'])){
            $output = '<div class = "alert alert-success bg-success text-white" style = "text-align: center;" role = "alert">';
            $output .= htmlentities($_SESSION['SuccessMessage']);
            $output .= '</div>';
            $_SESSION['SuccessMessage'] = null;
            return $output;
        }

    }

	define("BASE_URL", "http://localhost/nacostpi/");

	date_default_timezone_set("Africa/Lagos");
    $h = date('G');

    if($h >= 5 && $h <= 11){
        $getdate = "Good Morning";
    }else if($h >= 12 && $h <= 15){
        $getdate = "Good Afternoon";
    }else if($h >= 16 && $h <= 23){
        $getdate = "Good Evening";
    }else {
        $getdate = "Good Morning";
    }
?>