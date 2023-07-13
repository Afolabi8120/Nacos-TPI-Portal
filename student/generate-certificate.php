<?php
	header('content-type:image/png');
	include('../core/validate/change_password.php');

	$getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getSession = $stu->getStudentData($_SESSION['matricno']);
    $checkDue = $stu->checkStudentDue($getStudent->email);

    if($checkDue){
	    $font = realpath("../assets/certificate/Nunito-Bold.ttf");
	    $image = imagecreatefrompng("../assets/certificate/cert.png");
	    $color = imagecolorallocate($image, 19, 21, 22);
	    $date = date('d F, Y');
	    imagettftext($image, 50, 0, 1500, 2170, $color, $font, $date);
	    $name = ucwords($getStudent->fullname);
	    imagettftext($image, 100, 0, 450, 1120, $color, $font, $name);
	    $nacos_id = $getStudent->nacos_id;
	    imagettftext($image, 55, 0, 1550, 1460, $color, $font, $nacos_id);
	    imagepng($image, "../assets/certificate/cert_image/".$getStudent->matricno.".png");
	    imagedestroy($image);
	}else{
		header('location: dashboard');
	}

?>