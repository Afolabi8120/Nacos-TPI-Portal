
<!-- Hide Response -->
<?php

    include_once('../core/init.php');

    if(isset($_SESSION['matricno']) AND !empty($_SESSION['matricno'])){
        if($_SESSION['session_id'] !== $getSession->session){
            header('location: ../auth/login');
        }    
    }
    else{
        header('location: ../auth/login');
    }

    #session_start();
    $getStudent = $stu->getStudentData($_SESSION['matricno']);
    $getSession = $stu->getStudentData($_SESSION['matricno']);
    $email = $getStudent->email;

    $ref = $_GET['reference'];

    $ref = rawurlencode($ref);

    if($ref == null || $ref == '') {
        header("Location:javascript://history.go(-1)");
    }else{
      if($admin->check('tblpayment','email',$email) === true){
        header('location: logout');
      }else{
        if($admin->savePayment($email,$ref,'1000','1','2022/2023') === true){
          echo "<script>alert('Payment Successful')</script>";
        }
          header('location: payment_complete');
      }
      
    }

  // $curl = curl_init();
  
  // curl_setopt_array($curl, array(
  //   CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($ref),
  //   CURLOPT_RETURNTRANSFER => true,
  //   CURLOPT_ENCODING => "",
  //   CURLOPT_MAXREDIRS => 10,
  //   CURLOPT_TIMEOUT => 30,
  //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  //   CURLOPT_CUSTOMREQUEST => "GET",
  //   CURLOPT_HTTPHEADER => array(
  //     "Authorization: Bearer pk_test_cad279c5049ebec698669f5d2d765aee8a95630b",
  //     "Cache-Control: no-cache",
  //   ),
  // ));
  
  // $response = curl_exec($curl);
  // $err = curl_error($curl);
  // curl_close($curl);
  
  // if ($err) {
  //   echo "cURL Error #:" . $err;
  // } else {
  //   // echo $response;
  //   $result = json_decode($response);
  // }

  // if($result->data->status == 'success') {
  //     if($admin->savePayment($email,$ref,'1000','1') === true){
  //        alert('Payment Successful');
  //     }
  //     header('location: print-receipt');
     
  // }


?>
