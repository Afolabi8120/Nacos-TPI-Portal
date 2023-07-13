<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php
    include('../core/init.php');

    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getMaterial = $admin->getAllLibraryMaterial(); // Get all library materials from the admin class
    $getSession = $stu->getStudentData($_SESSION['matricno']);

    if(isset($_SESSION['matricno']) AND !empty($_SESSION['matricno'])){
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: ../auth/login');
        }    
    }
    else{
        header('location: ../auth/login');
    }

?>
<body><table align='center'><tr><td><STRONG>Transaction is being processed,</STRONG></td></tr><tr><td><font color='blue'>Please wait <i class="fa fa-spinner fa-pulse fa-fw"></i>
<span class="sr-only"></font></td></tr><tr><td>(Please do not press 'Refresh' or 'Back' button )</td></tr></table><h2>
<script>
    setTimeout(function(){ window.location="print-receipt"; }, 5000);
</script>