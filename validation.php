<?php 
  
  //   if(isset($_POST['mail'])) {
  //       $username = $getFromC->checkInput($_POST['username']);
  //       $email = $getFromC->checkInput($_POST['email']);
        
  //       if(!empty($username) && !empty($email)) {
  //           if($user->username != $username and $getFromC->checkUsername($username) === true) {
  //               echo '<script type="text/javascript">
  //                   $(function() {
  //                   const Toast = Swal.mixin({
  //                       toast: true,
  //                       position: "top-end",
  //                       showConfirmButton: false,
  //                       timer: 1000
  //                   });
            
  //                       Toast.fire({
  //                       type: "error",
  //                       title: "Username Existing"
  //                       })
  //                   });
  //               </script>';
  //           } else if(preg_match("/[^a-zA-Z0-9\!]/", $username)) {
  //               echo '<script type="text/javascript">
  //                   $(function() {
  //                   const Toast = Swal.mixin({
  //                       toast: true,
  //                       position: "top-end",
  //                       showConfirmButton: false,
  //                       timer: 1000
  //                   });
            
  //                       Toast.fire({
  //                       type: "error",
  //                       title: "All Characters should be Letters and Numbers"
  //                       })
  //                   });
  //               </script>';
  //           } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  //               echo '<script type="text/javascript">
  //                   $(function() {
  //                   const Toast = Swal.mixin({
  //                       toast: true,
  //                       position: "top-end",
  //                       showConfirmButton: false,
  //                       timer: 1000
  //                   });
            
  //                       Toast.fire({
  //                       type: "error",
  //                       title: "Invalid Email Address"
  //                       })
  //                   });
  //               </script>';
  //           } else if($user->email != $email and $getFromC->checkMail($email) === true) {
  //               echo '<script type="text/javascript">
  //                   $(function() {
  //                   const Toast = Swal.mixin({
  //                       toast: true,
  //                       position: "top-end",
  //                       showConfirmButton: false,
  //                       timer: 1000
  //                   });
            
  //                       Toast.fire({
  //                       type: "error",
  //                       title: "E-mail already in use"
  //                       })
  //                   });
  //               </script>';
  //           } else {
  //               $getFromC->update('signupivst', $user_id, array('username' => $username, 'email' => $email));
  //               echo "<script type='text/javascript'>
  //                       $(function() {
  //                       const Toast = Swal.mixin({
  //                           toast: true,
  //                           position: 'top-end',
  //                           showConfirmButton: false,
  //                           timer: 1000
  //                       });
                        
  //                       Toast.fire({
  //                           type: 'success',
  //                           title: 'Username & Email Updated'
  //                       })
                        
  //                       });
  //                       setInterval(() => {
  //                       window.open('profile','_self');
  //                       }, 1000);
  //                   </script>";
  //           }
  //       } else {
  //           echo '<script type="text/javascript">
  //                   $(function() {
  //                   const Toast = Swal.mixin({
  //                       toast: true,
  //                       position: "top-end",
  //                       showConfirmButton: false,
  //                       timer: 1000
  //                   });
            
  //                       Toast.fire({
  //                       type: "error",
  //                       title: "All Fields required"
  //                       })
  //                   });
  //               </script>';
  //       }
  //   }
    
    
    
    
  //     //Deposit
  //   if(isset($_POST['deposit'])) {

  //     $amount_deposit = $_POST['amount_deposit'];
  //     $deposit_date = date('d-m-Y');
  //     $depositTime = date('H:i:s');
      
  //     $sendMailto = $user->email;
  //       $subject = 'Bitcoins Crypto Investment | Deposit';
  //       $body = "
  //       <html>
  //       <head>
  //       <title>Bitcoins Crypto Investment Trading </title>
  //       </head>
  //       <body>
  //       <h3 style='color: blue; text-align: center;'>Happy Investment</h3>
  //       <hr style='width: 80px; text-align: center;'>
  //       <p style='text-align: center;'>You just deposit a sum of <span style='font-weight: 600;'>".$amount_deposit."</span> to your account with us and we will be looking forward for you to trade more with us Sir/Ma</p>
  //       <p>Your Money will get to your account immediately we confirm the payment.</p>
  //       <p>You can withdraw and invest with your money at any convenience time of your choice.</p>
  //       <p>Thanks for Trading with us.</p>
  //       <h3>Bitcoins Crypto Investment</h3>
  //       </body>
  //       </html>
  //       ";

  //       $sendMail = $getFromC->sendmail($sendMailto, $subject, $body);

  //     if(!empty($amount_deposit) || $amount_deposit != '0') {

  //       $amount_deposit = $getFromC->checkInput($amount_deposit);

  //         if(isset($_FILES['proofImage'])) {

  //             if(!empty($_FILES['proofImage']['name'][0])) {

  //               // if($sendMail) {
  //                   $fileRoot = $getFromC->uploadImage($_FILES['proofImage']);
  //                   $getFromC->create('deposit', array('amount_deposit'=>$amount_deposit, 'user_id' => $user_id, 'payment_proof' => $fileRoot, 'deposit_date' => $deposit_date, 'deposit_time' => $depositTime));
                
  //                     echo '<script type="text/javascript">
  //                         $(function() {
  //                         const Toast = Swal.mixin({
  //                             toast: true,
  //                             position: "top-end",
  //                             showConfirmButton: false,
  //                             timer: 8000
  //                         });
                  
  //                             Toast.fire({
  //                             type: "success",
  //                             title: "Deposit Successful, wait for a few seconds to be confirmed by the Admins"
  //                             })
  //                         });
                          
  //                     </script>';
  //               // }
                
  //             }
  //         }
  //     }
      
  //     else {
  //         echo '<script type="text/javascript">
  //             $(function() {
  //             const Toast = Swal.mixin({
  //                 toast: true,
  //                 position: "top-end",
  //                 showConfirmButton: false,
  //                 timer: 3000
  //             });
      
  //                 Toast.fire({
  //                 type: "error",
  //                 title: "Enter Amount to Deposit"
  //                 })
  //             });
              
  //         </script>';
  //     }

  // }

    


    
    

  //   //Invest
  //   if(isset($_POST['invest_now'])) {

  //       $amount_invest = $_POST['amount_invest'];
  //       $earning_rate = $_POST['earning_rate'];
  //       $interest_rate = $_POST['interest_rate'];
  //       $daily_interest = $_POST['daily_interest'];
  //       $timeInvest = date('H:i:s');
  //       $currentDate = date('Y-m-d H:i:s');
  //       $currentDate = strtotime($currentDate);
  //       $currentDate = strtotime("+7 day", $currentDate);
  //       $currentDate = date('Y:m:d H:i:s', $currentDate);
  //       $repi = $balance - $amount_invest;
  //       // $lastList = $lastDateInvested->dateinvest_withdraw;

  //       $sendMailto = $user->email;
  //       $subject = 'Bitcoins Crypto Investment | Trading';
  //       $body = "
  //       <html>
  //       <head>
  //       <title>Bitcoins Crypto Investment Trading </title>
  //       </head>
  //       <body>
  //       <h3 style='color: blue; text-align: center;'>Happy Investment</h3>
  //       <hr style='width: 80px; text-align: center;'>
  //       <p style='text-align: center;'>Thanks for Investing with us and we will be looking forward for you to invest more with us Sir/Ma</p>
  //       <p>We will try and always make you smile after 7 days. Have a nice day</p>
  //       <p>Thanks for Trading with us.</p>
  //       <h3>Bitcoins Crypto Investment</h3>
  //       </body>
  //       </html>
  //       ";

  //       $sendMail = $getFromC->sendmail($sendMailto, $subject, $body);
        
  //       if($amount_invest <= $balance) {
  //               //am on this to  check last date inversted before proceeding
  //               if($amount_invest >= 100 && $status == 0) {
                    
  //                   if($sendMail) {
  //                       $getFromC->create('investment', array('user_id' => $user_id, 'amount_invest'=>$amount_invest, 'earning_rate'=>$earning_rate, 'interest_rate'=>$interest_rate, 'daily_interest'=>$daily_interest, 'dateinvest_withdraw' => $currentDate));
    
  //                       $getFromC->update('signupivst', $user_id, array('balance' => $repi, 'payment' => $earning_rate, 'currentStatus' => 1));
        
  //                       echo '<script type="text/javascript">
  //                           $(function() {
  //                           const Toast = Swal.mixin({
  //                               toast: true,
  //                               position: "top-end",
  //                               showConfirmButton: false,
  //                               timer: 3000
  //                           });
        
  //                               Toast.fire({
  //                               type: "success",
  //                               title: "Investment started Successfully"
  //                               })
  //                           });
                            
  //                       </script>';
  //                   }
                    
  //               }
                
  //               else {
  //                   echo '<script type="text/javascript">
  //                   // alert("jbsdfjnewk");
  //                   $(function() {
  //                       const Toast = Swal.mixin({
  //                       toast: true,
  //                       position: "top-end",
  //                       showConfirmButton: false,
  //                       timer: 3000
  //                       });
        
  //                       Toast.fire({
  //                           type: "error",
  //                           title: "Can\'t invest less than $100 or an existing Investment is going on"
  //                       })
  //                   });
  //                   </script>';
  //               }
  //           }
            
  //           else {
  //               echo '<script type="text/javascript">
  //                   $(function() {
  //                   const Toast = Swal.mixin({
  //                       toast: true,
  //                       position: "top-end",
  //                       showConfirmButton: false,
  //                       timer: 5000
  //                   });

  //                       Toast.fire({
  //                       type: "error",
  //                       title: "You don\'t have enough Money to in your Account for this transaction"
  //                       })
  //                   });
                    
  //               </script>';
  //           }

  //   }


  //   //Withdraw
  // if(isset($_POST['withdrawal'])) {

  //   $withdrawalAmount = $_POST['withdrawalAmount'];
  //   $withdrawDate = date('d-m-Y');
  //   $withdrawTime = date('H:i:s');
  //   $repw = $balance - $withdrawalAmount;

  //       $sendMailto = $user->email;
  //       $subject = 'Bitcoins Crypto Investment | Withdraw';
  //       $body = "
  //       <html>
  //       <head>
  //       <title>Bitcoins Crypto Investment Withdrawal </title>
  //       </head>
  //       <body>
  //       <h3 style='color: blue; text-align: center;'>Happy Withdrawal</h3>
  //       <hr style='width: 80px; text-align: center;'>
  //       <p style='text-align: center;'>You placed a Withdrawal of $".$withdrawalAmount.". If is not you please quickly reply to this mail if is not you.</p>
  //       <p>We will try and always keep you smiling. Have a nice day</p>
  //       <p>Thanks for Trading with us.</p>
  //       <h3>Bitcoins Crypto Investment</h3>
  //       </body>
  //       </html>
  //       ";

  //     if(!empty($withdrawalAmount)) {
  //       if($sendMail) {
  //           $getFromC->create('withdraw', array('withdraw_amount'=>$withdrawalAmount, 'user_id' => $user_id, 'withdraw_date' => $withdrawDate, 'withdraw_time' => $withdrawTime));
  //           $getFromC->update('signupivst', $user_id, array('balance' => $repw));
  //           echo '<script type="text/javascript">
  //                   $(function() {
  //                   const Toast = Swal.mixin({
  //                       toast: true,
  //                       position: "top-end",
  //                       showConfirmButton: false,
  //                       timer: 3000
  //                   });
                    
  //                       Toast.fire({
  //                       type: "success",
  //                       title: "Withdrawal Place Successfully"
  //                       })
  //                   });
                    
  //               </script>';
  //       }
        
  //     }
      
  //     else {
  //         echo '<script type="text/javascript">
  //         $(function() {
  //         const Toast = Swal.mixin({
  //             toast: true,
  //             position: "top-end",
  //             showConfirmButton: false,
  //             timer: 3000
  //         });
  
  //             Toast.fire({
  //             type: "error",
  //             title: "Enter Amount to Withdraw"
  //             })
  //         });
          
  //     </script>';
  //     }

  // }
  
  
  // if(isset($_POST['wallet'])) {
  //     $walletAddress = $_POST['walletAddress'];
  //     if(!empty($walletAddress) || $walletAddress != 0) {
  //       $walletAddress = $getFromC->checkInput($walletAddress);
  //       $getFromC->update('signupivst', $user_id, array('walletAddress' => $walletAddress));
  //       echo '<script type="text/javascript">
  //           $(function() {
  //               const Toast = Swal.mixin({
  //                   toast: true,
  //                   position: "top-end",
  //                   showConfirmButton: false,
  //                   timer: 3000
  //               });
        
  //               Toast.fire({
  //               type: "success",
  //               title: "Wallet Address Saved Successfully"
  //               })
  //           });
  //           setInterval(() => {
  //           window.open("profile","_self");
  //           }, 1000);
  //       </script>';
  //     } else {
  //           echo '<script type="text/javascript">
  //               $(function() {
  //               const Toast = Swal.mixin({
  //                   toast: true,
  //                   position: "top-end",
  //                   showConfirmButton: false,
  //                   timer: 3000
  //               });

  //                   Toast.fire({
  //                   type: "error",
  //                   title: "An error saving Wallet Address, Network Issue"
  //                   })
  //               });
  //           </script>';
  //     }
  // }
$randomNumber = md5(rand(1000, 100000)).time();
                $generateToken = md5($randomNumber).rand()."-".md5(uniqid());
$url = "https://" .$_SERVER["HTTP_HOST"]."/auth/reset-password?token=$generateToken";
$body = '
                <a href="'.$url.'">Click here</a> to reset your password
                ';
                echo $body;

    

?>
